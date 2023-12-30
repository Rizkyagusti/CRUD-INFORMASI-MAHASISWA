<?php

namespace Krispachi\KrisnaLTE\Controller;

use Exception;
use Krispachi\KrisnaLTE\App\FlashMessage;
use Krispachi\KrisnaLTE\App\View;
use Krispachi\KrisnaLTE\Model\MahasiswaModel;
use Krispachi\KrisnaLTE\Model\MajorModel;
use Krispachi\KrisnaLTE\Model\SubjectModel;

class MahasiswaController {
    public function index() {
        $model = new MahasiswaModel();
        View::render("dashboard", $model->getAllMahasiswa());
    }

    public function create() {
        $model = new MajorModel();
        View::render("mahasiswa/create", $model->getAllMajor());
    }

    public function store() {
        $data = [
            "nim" => $_POST["nim"],
            "nama" => $_POST["nama"],
            "gender" => $_POST["gender"],
            "id_jurusan" => $_POST["id_jurusan"],
            "kelas" => $_POST["kelas"],
            "asal_sekolah" => $_POST["asal_sekolah"],
            "tahun_ajaran" => $_POST["tahun_ajaran"],
            "no_hp" => $_POST["no_hp"],
            "email" => $_POST["email"]
        ];

        $dataPribadi = [
            "nama_pribadi" => $_POST["nama_pribadi"],
            "agama" => $_POST["agama"],
            "nik" => $_POST["nik"],
            "nama_ibu_kandung" => $_POST["nama_ibu_kandung"],
            "npwp" => $_POST["npwp"],
            "no_bpjs" => $_POST["no_bpjs"],
            "alamat" => $_POST["alamat"],
            "golongan_darah" => $_POST["golongan_darah"]
        ];

        if(empty(trim($data["nim"])) || empty(trim($data["nama"])) || empty(trim($data["email"])) || empty(trim($data["no_hp"])) || empty(trim($data["id_jurusan"]))  || empty(trim($data["gender"])) || empty(trim($data["asal_sekolah"])) || empty(trim($data["kelas"]))|| empty(trim($data["tahun_ajaran"]))) {
            FlashMessage::setFlashMessage("error", "Form tidak boleh kosong");
            $this->sendFormInput($data);
            header("Location: /mahasiswas/create");
            exit(0);
        }

        $model = new MahasiswaModel();
        try {
            $model->createMahasiswa($data, $dataPribadi);
            FlashMessage::setFlashMessage("success", "Mahasiswa berhasil ditambah");
            header("Location: /mahasiswas");
            exit(0);
        } catch (Exception $exception) {
            FlashMessage::setFlashMessage("error", $exception->getMessage());
            $this->sendFormInput($data);
            header("Location: /mahasiswas/create");
            exit(0);
        }
    }

    public function update($id) {
        
        $result = [];
        $model = new MahasiswaModel();
        $result += [
            "mahasiswa" => $model->getMahasiswaById($id)
        ];
        if(empty($result["mahasiswa"])) {
            FlashMessage::setFlashMessage("error", "Mahasiswa tidak ditemukan");
            header("Location: /mahasiswas");
            exit(0);
        }
        $model = new MajorModel();
        $result += [
            "majors" => $model->getAllMajor()
        ];
        View::render("mahasiswa/update", $result);
    }

    public function edit($id) {
        // echo "<script>console.log($id)</script>";
        $data = [
            "id_mahasiswa" => $id,
            "nim" => $_POST["nim"],
            "nama" => $_POST["nama"],
            "gender" => $_POST["gender"],
            "id_jurusan" => $_POST["id_jurusan"],
            "kelas" => $_POST["kelas"],
            "asal_sekolah" => $_POST["asal_sekolah"],
            "tahun_ajaran" => $_POST["tahun_ajaran"],
            "no_hp" => $_POST["no_hp"],
            "email" => $_POST["email"]
        ];
        
        $dataPribadi = [
            "id_mahasiswa" => $id,
            "nama_pribadi" => $_POST["nama_pribadi"],
            "agama" => $_POST["agama"],
            "nik" => $_POST["nik"],
            "nama_ibu_kandung" => $_POST["nama_ibu_kandung"],
            "npwp" => $_POST["npwp"],
            "no_bpjs" => $_POST["no_bpjs"],
            "alamat" => $_POST["alamat"],
            "golongan_darah" => $_POST["golongan_darah"]
        ];
        
        // Debugging: Print or log the form data
        // echo '<pre>';
        // print_r($data);
        // print_r($dataPribadi);
        // echo '</pre>';


        if (empty(trim($data["nim"])) ) {
            FlashMessage::setFlashMessage("error", "Form tidak boleh kosong");
            $this->sendFormInput($data);
            header("Location: /mahasiswas/update/{$id}");
            exit(0);
        }
        

        $model = new MahasiswaModel();
        try {
            $model->updateMahasiswa($data);
            $model->updateMahasiswa2($dataPribadi);
            FlashMessage::setFlashMessage("success", "Mahasiswa berhasil diubah");
            header("Location: /mahasiswas");
            exit(0);
        } catch (Exception $exception) {
            FlashMessage::setFlashMessage("error", $exception->getMessage());
            $this->sendFormInput($data);
            header("Location: /mahasiswas/update/{$id}");
            exit(0);
        }
    }

    public function delete($id) {
        $model = new MahasiswaModel();
        try {
            $model->deleteMahasiswa($id);
            FlashMessage::setFlashMessage("success", "Mahasiswa berhasil dihapus");
            header("Location: /mahasiswas");
            exit(0);
        } catch (Exception $exception) {
            if (preg_match("/23000/", $exception->getMessage())) {
                $message = "Hapus dibatalkan, data terdaftar sebagai Foreign Key di tabel lain";
            } else {
                $message = $exception->getMessage();
            }
            FlashMessage::setFlashMessage("error", $message);
            header("Location: /mahasiswas/create");
            exit(0);
        }
    }

    

    public function sendFormInput(array $data) : void {
        $_SESSION["form-input"] = [];
        foreach($data as $key => $input) {
            if(!empty(trim($input))) {
                $_SESSION["form-input"] += [
                    "$key" => trim($input)
                ];
            }
        }
    }
}