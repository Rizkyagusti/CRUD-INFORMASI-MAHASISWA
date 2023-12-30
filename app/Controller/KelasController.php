<?php
namespace Krispachi\KrisnaLTE\Controller;

use Exception;
use Krispachi\KrisnaLTE\App\FlashMessage;
use Krispachi\KrisnaLTE\App\View;
use Krispachi\KrisnaLTE\Model\KelasModel;
// use Krispachi\KrisnaLTE\Model\MajorModel;
// use Krispachi\KrisnaLTE\Model\SubjectModel;



class KelasController{
    public function index() {
        View::render("kelas/index");
    }

    public function create()
    {
        // Pastikan hanya user dengan role tertentu yang dapat mengakses
        // Anda dapat menambahkan pengecekan role di sini

        // Tangkap data dari formulir
        $dataKelas = [
            'id_jurusan' => $_POST['id_jurusan'],
            'nama' => $_POST['kelas'],
            // Tambahkan field lainnya sesuai formulir
        ];

        // Buat instance IzinModel
        $kelasModel = new KelasModel();

        // Panggil metode model untuk menambahkan data izin
        $success = $kelasModel->tambahKelas($dataKelas);

        if ($success) {
            // Redirect atau lakukan sesuatu jika berhasil menambahkan izin
            FlashMessage::setFlashMessage("success", "Kelas berhasil dibuat");
            header("Location: /kelas"); // Gantilah dengan halaman tujuan yang sesuai
            exit(0);
        } else {
            // Tampilkan pesan atau lakukan sesuatu jika terjadi kesalahan
            FlashMessage::setFlashMessage("error", "Kelas gagal dibuat");
            header("Location: /kelas");

        }
    }


    public function delete()
    {
        // Pastikan hanya user dengan role tertentu yang dapat mengakses
        // Anda dapat menambahkan pengecekan role di sini
        $dataKelas = [
            'id_kelas' => $_POST['id_kelas'],
            // Tambahkan field lainnya sesuai formulir
        ];
        // Buat instance KelasModel
        $kelasModel = new KelasModel();

        // Panggil metode model untuk menghapus kelas
        $success = $kelasModel->hapusKelas($dataKelas);

        if ($success) {
            // Redirect atau lakukan sesuatu jika berhasil menghapus kelas
            FlashMessage::setFlashMessage("success", "Kelas berhasil dihapus");
            header("Location: /kelas"); // Gantilah dengan halaman tujuan yang sesuai
            exit(0);
        } else {
            // Tampilkan pesan atau lakukan sesuatu jika terjadi kesalahan
            FlashMessage::setFlashMessage("error", "Kelas Gagal dihapus");
            die('Error deleting kelas');
        }
    }

    public function edit()
    {
    $dataKelas = [
        'id_kelas' => $_POST['id_kelas'],
        'kelas' => $_POST['kelas'],
    ];
    
    if(empty(trim($dataKelas["kelas"])) ) {
        FlashMessage::setFlashMessage("error", "Form tidak boleh kosong");
        header("Location: /kelas");
        exit(0);
    }

    $model = new KelasModel();
    try {
        $model->updateKelas($dataKelas);
        FlashMessage::setFlashMessage("success", "Kelas berhasil diubah");
        header("Location: /kelas");
        exit(0);
    } catch (Exception $exception) {
        FlashMessage::setFlashMessage("error", $exception->getMessage());
        header("Location: /kelas");
        exit(0);
    }
    
    }
    

    
}

?>