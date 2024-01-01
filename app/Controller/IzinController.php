<?php
namespace Krispachi\KrisnaLTE\Controller;

use Exception;
use Krispachi\KrisnaLTE\App\FlashMessage;
use Krispachi\KrisnaLTE\App\View;
use Krispachi\KrisnaLTE\Model\IzinModel;
// use Krispachi\KrisnaLTE\Model\MajorModel;
// use Krispachi\KrisnaLTE\Model\SubjectModel;



class IzinController{
    public function index() {
        View::render("izin/index");
    }   

    public function index2() {
        View::render("izin/index2");
    }   

    public function processApproval()
    {
        // Pastikan user memiliki role admin
        

        // Pastikan izin_id dan approval terdapat dalam request
        if (isset($_POST['izin_id'], $_POST['approval'])) {
            $izinId = $_POST['izin_id'];
            $approvalStatus = $_POST['approval'];

            // Buat instance ApprovalModel
            $approvalModel = new IzinModel();

            // Proses persetujuan menggunakan model
            $success = $approvalModel->processApproval($izinId, $approvalStatus);

            if ($success) {
                FlashMessage::setFlashMessage("success", "Proses perizinan berhasil");
            } else {
                FlashMessage::setFlashMessage("error", "proses perizinan gagal");
            }
        } else {
            FlashMessage::setFlashMessage("error", "Invalid request");
        }

        // Redirect kembali ke halaman izin
        header("Location: /izin"); // Gantilah dengan halaman tujuan yang sesuai
    }
    public function processApproval2()
    {
        // Pastikan user memiliki role admin
        

        // Pastikan izin_id dan approval terdapat dalam request
        if (isset($_POST['izin_id'], $_POST['approval'])) {
            $izinId = $_POST['izin_id'];
            $approvalStatus = $_POST['approval'];

            // Buat instance ApprovalModel
            $approvalModel = new IzinModel();

            // Proses persetujuan menggunakan model
            $success = $approvalModel->processApproval2($izinId, $approvalStatus);

            if ($success) {
                FlashMessage::setFlashMessage("success", "Proses perizinan berhasil");
            } else {
                FlashMessage::setFlashMessage("error", "proses perizinan gagal");
            }
        } else {
            FlashMessage::setFlashMessage("error", "Invalid request");
        }

        // Redirect kembali ke halaman izin
        header("Location: /izin2"); // Gantilah dengan halaman tujuan yang sesuai
    }

    public function create()
    {
        // Pastikan hanya user dengan role tertentu yang dapat mengakses
        // Anda dapat menambahkan pengecekan role di sini

        // Tangkap data dari formulir
        $izinData = [
            'tanggal' => $_POST['tanggal'],
            'nama' => $_POST['nama'],
            'nim' => $_POST['nim'],
            'kelas' => $_POST['kelas'],
            'jurusan' => $_POST['id_jurusan'],
            'keperluan' => $_POST['keperluan'],
            'jam_keluar' => $_POST['jam_keluar'],
            'jam_kembali' => $_POST['jam_kembali'],
            // Tambahkan field lainnya sesuai formulir
        ];

        if (empty(trim($izinData["nama"])) || empty(trim($izinData["nim"])) || empty(trim($izinData["kelas"])) || empty(trim($izinData["jurusan"])) || empty(trim($izinData["tanggal"])) || empty(trim($izinData["keperluan"])) || empty(trim($izinData["jam_keluar"])) || empty(trim($izinData["jam_kembali"]))) {
            FlashMessage::setFlashMessage("error", "Form tidak boleh kosong");
            $this->sendFormInput($izinData);
            header("Location: /izin");
            exit(0);
        }

        // Buat instance IzinModel
        $izinModel = new IzinModel();

        // Panggil metode model untuk menambahkan data izin
        $success = $izinModel->createIzin($izinData);

        if ($success) {
            // Redirect atau lakukan sesuatu jika berhasil menambahkan izin
            FlashMessage::setFlashMessage("success", "Izin berhasil di ajukan");
            header("Location: /izin"); // Gantilah dengan halaman tujuan yang sesuai
        } else {
            // Tampilkan pesan atau lakukan sesuatu jika terjadi kesalahan
            FlashMessage::setFlashMessage("error", "Izin gagal di ajukan");
            die('Error creating izin');
        }
    }

    public function create2()
    {

        function uploadBukti()
        {
            $name = $_FILES['bukti']['name'];
            $tmpName = $_FILES['bukti']['tmp_name'];
            $error = $_FILES['bukti']['error'];
            $size = $_FILES['bukti']['size'];

            if ($error == 4) {
                FlashMessage::setFlashMessage("error", "bukti belum dikirim");
                return false;
            }

            $ekstensiValid = ['pdf'];
            $ekstensiFile = explode('.', $name);
            $ekstensiFile = strtolower(end($ekstensiFile));

            if (!in_array($ekstensiFile, $ekstensiValid)) {
                FlashMessage::setFlashMessage("error", "yang anda upload bukan pdf");
                return false;
            }


            if ($size > 10000000) {
                FlashMessage::setFlashMessage("error", "Ukuran PDF terlalu besar");
                return false;
            }
            $namaFileBaru = uniqid();
            $namaFileBaru .= ".";
            $namaFileBaru .= $ekstensiFile;
            move_uploaded_file($tmpName, 'bukti/' . $namaFileBaru);
            return $namaFileBaru;
        }
        $bukti = uploadBukti();
        // var_dump($bukti);
        // die;
        // Pastikan hanya user dengan role tertentu yang dapat mengakses
        // Anda dapat menambahkan pengecekan role di sini

        // Tangkap data dari formulir
        $izinData = [
            // 'tanggal' => $_POST['tanggal'],
            'nama' => $_POST['nama'],
            'nim' => $_POST['nim'],
            'kelas' => $_POST['kelas'],
            'jurusan' => $_POST['id_jurusan'],
            'tanggal' => $_POST['tanggal'],
            'keperluan' => $_POST['keperluan'],
            'bukti' => $bukti
            // Tambahkan field lainnya sesuai formulir
        ];

        if (empty(trim($izinData["nama"])) || empty(trim($izinData["nim"])) || empty(trim($izinData["kelas"])) || empty(trim($izinData["jurusan"])) || empty(trim($izinData["tanggal"])) || empty(trim($izinData["keperluan"])) || empty(trim($izinData["bukti"]))) {
            FlashMessage::setFlashMessage("error", "Form tidak boleh kosong");
            $this->sendFormInput($izinData);
            header("Location: /izin2");
            exit(0);
        }

        // Buat instance IzinModel
        $izinModel = new IzinModel();

        // Panggil metode model untuk menambahkan data izin
        $success = $izinModel->createIzin2($izinData);

        if ($success) {
            // Redirect atau lakukan sesuatu jika berhasil menambahkan izin
            // var_dump($success);
            // die;
            FlashMessage::setFlashMessage("success", "Izin berhasil di ajukan");
            header("Location: /izin2"); // Gantilah dengan halaman tujuan yang sesuai
        } else {
            // Tampilkan pesan atau lakukan sesuatu jika terjadi kesalahan
            FlashMessage::setFlashMessage("error", "Izin gagal di ajukan");
            die('Error creating izin');
        }
    }


    public function edit(){
        
        $dataIzin = [
            'id' => $_POST['id'],
            'nama' => $_POST['nama'],
            'nim' => $_POST['nim'],
            'kelas' => $_POST['kelas'],
            'jurusan' => $_POST['jurusan'],
            'keperluan' => $_POST['keperluan'],
            'jam_keluar' => $_POST['jam_keluar'],
            'jam_masuk' => $_POST['jam_masuk'],
        ];

        // var_dump($dataIzin);
        // die;
        
        if(empty(trim($dataIzin["id"])) || empty(trim($dataIzin["nama"])) || empty(trim($dataIzin["nim"])) || empty(trim($dataIzin["kelas"])) || empty(trim($dataIzin["jurusan"]))  || empty(trim($dataIzin["keperluan"])) || empty(trim($dataIzin["jam_keluar"]))  || empty(trim($dataIzin["jam_masuk"]))) {
            FlashMessage::setFlashMessage("error", "Form tidak boleh kosong");
            header("Location: /izin");
            exit(0);
        }
    
        $model = new IzinModel();
        try {
            $model->updateIzin($dataIzin);
            FlashMessage::setFlashMessage("success", "Izin berhasil diubah");
            header("Location: /izin");
            exit(0);
        } catch (Exception $exception) {
            FlashMessage::setFlashMessage("error", $exception->getMessage());
            header("Location: /izin");
            exit(0);
        }
    }
    public function edit2(){
        function uploadBukti2()
        {
            $name = $_FILES['bukti']['name'];
            $tmpName = $_FILES['bukti']['tmp_name'];
            $error = $_FILES['bukti']['error'];
            $size = $_FILES['bukti']['size'];

            if ($error == 4) {
                FlashMessage::setFlashMessage("error", "bukti belum dikirim");
                return false;
            }

            $ekstensiValid = ['pdf'];
            $ekstensiFile = explode('.', $name);
            $ekstensiFile = strtolower(end($ekstensiFile));

            if (!in_array($ekstensiFile, $ekstensiValid)) {
                FlashMessage::setFlashMessage("error", "yang anda upload bukan pdf");
                return false;
            }


            if ($size > 10000000) {
                FlashMessage::setFlashMessage("error", "Ukuran PDF terlalu besar");
                return false;
            }
            $namaFileBaru = uniqid();
            $namaFileBaru .= ".";
            $namaFileBaru .= $ekstensiFile;
            move_uploaded_file($tmpName, 'bukti/' . $namaFileBaru);
            return $namaFileBaru;
        }
        $bukti = uploadBukti2();
        $dataIzin = [
            'id' => $_POST['id'],
            'nama' => $_POST['nama'],
            'nim' => $_POST['nim'],
            'kelas' => $_POST['kelas'],
            'jurusan' => $_POST['jurusan'],
            'keperluan' => $_POST['keperluan'],
            'tanggal_izin' => $_POST['tanggal_izin'],
            'bukti' => $bukti,
        ];

        // var_dump($dataIzin);die;
        
        if(empty(trim($dataIzin["id"])) || empty(trim($dataIzin["nama"])) || empty(trim($dataIzin["nim"])) || empty(trim($dataIzin["kelas"])) || empty(trim($dataIzin["jurusan"]))  || empty(trim($dataIzin["keperluan"])) || empty(trim($dataIzin["tanggal_izin"]))  || empty(trim($dataIzin["bukti"]))) {
            FlashMessage::setFlashMessage("error", "Form tidak boleh kosong");
            header("Location: /izin2");
            exit(0);
        }
    
        $model = new IzinModel();
        try {
            $model->updateIzin2($dataIzin);
            FlashMessage::setFlashMessage("success", "Izin berhasil diubah");
            header("Location: /izin2");
            exit(0);
        } catch (Exception $exception) {
            FlashMessage::setFlashMessage("error", $exception->getMessage());
            header("Location: /izin2");
            exit(0);
        }
    }

    public function delete($id)
    {
        $model = new IzinModel();
        try {
            $model->deleteIzin($id);
            FlashMessage::setIfNotFlashMessage("success", "Izin berhasil dihapus");
            header("Location: /izin");
            exit(0);
        } catch (Exception $exception) {
            FlashMessage::setFlashMessage("error", $exception->getMessage());
            header("Location: /izin");
            exit(0);
        }
    }
    public function delete2($id)
    {
        $model = new IzinModel();
        try {
            $model->deleteIzin2($id);
            FlashMessage::setIfNotFlashMessage("success", "Izin berhasil dihapus");
            header("Location: /izin2");
            exit(0);
        } catch (Exception $exception) {
            FlashMessage::setFlashMessage("error", $exception->getMessage());
            header("Location: /izin2");
            exit(0);
        }
    }

    public function sendFormInput(array $data): void
    {
        $_SESSION["form-input"] = [];
        foreach ($data as $key => $input) {
            if (!empty(trim($input))) {
                $_SESSION["form-input"] += [
                    "$key" => trim($input)
                ];
            }
        }
    }
}
?>