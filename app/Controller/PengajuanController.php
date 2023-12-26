<?php

namespace Krispachi\KrisnaLTE\Controller;

use Exception;
use Krispachi\KrisnaLTE\App\FlashMessage;
use Krispachi\KrisnaLTE\App\View;
use Krispachi\KrisnaLTE\Model\PengajuanModel;
use Krispachi\KrisnaLTE\Model\KelasModel;
use Krispachi\KrisnaLTE\Model\MajorModel;


class PengajuanController
{
    public function index()
    {
        View::render("mahasiswa-pengajuan/index");
    }
    public function gotoCreate($nama)
    {
        $model = new PengajuanModel();
        $cekData = $model->getMahasiswaByNim($nama);
        if($cekData){
            FlashMessage::setFlashMessage("error", "Data sudah diajukan, tunggu disetujui");
            header("Location: /pengajuan");
            exit(0);
        }else{
            View::render("mahasiswa-pengajuan/create");
        }
        
    }
    public function gotoUpdate()
    {
        View::render("mahasiswa-pengajuan/update");
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
            header("Location: /mahasiswa-pengajuan/create");
            exit(0);
        }

        $model = new PengajuanModel();
        try {
            $model->createMahasiswa($data, $dataPribadi);
            FlashMessage::setFlashMessage("success", "Mahasiswa berhasil ditambah");
            header("Location: /pengajuan"); 
            exit(0);
        } catch (Exception $exception) {
            FlashMessage::setFlashMessage("error", $exception->getMessage());
            $this->sendFormInput($data);
            header("Location: /mahasiswa-pengajuan/create");
            exit(0);
        }
    }

    public function update($id) {
        $model = [];
    
        try {
            $pengajuanModel = new PengajuanModel();
            $majorModel = new MajorModel();
            $kelasModel = new KelasModel();
    
            // Ambil data mahasiswa dari model MahasiswaModel
            $model["mahasiswa"] = $pengajuanModel->getMahasiswaById($id);
            
            // Ambil data pribadi mahasiswa dari model PengajuanModel
            $model["mahasiswa_pribadi"] = $pengajuanModel->getMahasiswaPribadiById($id);
    
            // Ambil data jurusan dan kelas dari model PengajuanModel
            $model["majors"] = $majorModel->getAllMajor();
            $model["kelas"] = $kelasModel->getKelasByJurusanId($model["mahasiswa"]["jurusan"]);
    
        } catch (Exception $e) {
            // Handle exception, misalnya tampilkan pesan kesalahan atau lakukan tindakan lain
            echo "Error: " . $e->getMessage();
        }
        
        // Load view dengan menggunakan $model
        View::render("mahasiswa-pengajuan/update", $model);
    }
    

    public function edit($id) {
       

        // // Ambil data jurusan dan kelas dari model PengajuanModel
        // $model["majors"] = $pengajuanModel->getAllMajor();
        // $model["kelas"] = $pengajuanModel->getKelasByJurusanId($model["mahasiswa"]["jurusan"]);
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
            header("Location: /mahasiswa-pengajuan/update{$id}");
            exit(0);
        }
        

        $model = new PengajuanModel();
        try {
            $model->updateMahasiswa($data);
            $model->updateMahasiswa2($dataPribadi);
            FlashMessage::setFlashMessage("success", "Mahasiswa berhasil diubah");
            header("Location: /pengajuan");
            exit(0);
        } catch (Exception $exception) {
            FlashMessage::setFlashMessage("error", $exception->getMessage());
            $this->sendFormInput($data);
            header("Location: /pengajuan");
            exit(0);
        }
    }

    public function delete($id) {
        $model = new PengajuanModel();
        try {
            $model->deleteMahasiswa($id);
            FlashMessage::setFlashMessage("success", "Mahasiswa berhasil dihapus");
            header("Location: /pengajuan");
            exit(0);
        } catch (Exception $exception) {
            if (preg_match("/23000/", $exception->getMessage())) {
                $message = "Hapus dibatalkan, data terdaftar sebagai Foreign Key di tabel lain";
            } else {
                $message = $exception->getMessage();
            }
            FlashMessage::setFlashMessage("error", $message);
            header("Location: /mahasiswa-pengajuan/create");
            exit(0);
        }
    }

    public function approve($id)
    {
       
        try {
            // Dapatkan data dari model PengajuanModel atau sumber lain
            $pengajuanModel = new PengajuanModel();
            $dataToApprove = $pengajuanModel->getMahasiswaById($id);
            
            $dataToApprove2 = $pengajuanModel->getMahasiswaPribadiById($id);
            
            // Panggil metode approveDataToDatabase untuk menyimpan data ke dalam tabel
            // $approvalModel = new ApprovalModel();
            $pengajuanModel->approveDataToDatabase($dataToApprove, $dataToApprove2);

            // Respond dengan sukses
            FlashMessage::setFlashMessage("success", "Mahasiswa berhasil ditambah");
            header("Location: /pengajuan");
            exit(0);
        } catch (\Exception $exception) {
            // Respond dengan pesan kesalahan
            $message = $exception->getMessage();
            FlashMessage::setFlashMessage("error", $message);
            header("Location: /pengajuan");
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