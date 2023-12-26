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
                FlashMessage::setFlashMessage("success", "Approval processed successfully");
            } else {
                FlashMessage::setFlashMessage("error", "Error processing approval");
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
                FlashMessage::setFlashMessage("success", "Approval processed successfully");
            } else {
                FlashMessage::setFlashMessage("error", "Error processing approval");
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

        // Buat instance IzinModel
        $izinModel = new IzinModel();

        // Panggil metode model untuk menambahkan data izin
        $success = $izinModel->createIzin($izinData);

        if ($success) {
            // Redirect atau lakukan sesuatu jika berhasil menambahkan izin
            header("Location: /izin"); // Gantilah dengan halaman tujuan yang sesuai
        } else {
            // Tampilkan pesan atau lakukan sesuatu jika terjadi kesalahan
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

        // Buat instance IzinModel
        $izinModel = new IzinModel();

        // Panggil metode model untuk menambahkan data izin
        $success = $izinModel->createIzin2($izinData);

        if ($success) {
            // Redirect atau lakukan sesuatu jika berhasil menambahkan izin
            // var_dump($success);
            // die;
            header("Location: /izin2"); // Gantilah dengan halaman tujuan yang sesuai
        } else {
            // Tampilkan pesan atau lakukan sesuatu jika terjadi kesalahan
            die('Error creating izin');
        }
    }
}
?>