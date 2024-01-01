<?php
namespace Krispachi\KrisnaLTE\Controller;

use Exception;
use Krispachi\KrisnaLTE\App\FlashMessage;
use Krispachi\KrisnaLTE\App\View;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Krispachi\KrisnaLTE\Model\UserModel;
use Krispachi\KrisnaLTE\Model\BeritaModel;
use Krispachi\KrisnaLTE\Model\IzinModel;
use \Dompdf\Dompdf;



class MainController{
    public function index() {
        $jwt = $_COOKIE["X-KRISNALTE-SESSION"];
            $payload = JWT::decode($jwt, new Key(AuthController::$SECRET_KEY, "HS256"));
			$query = new UserModel();
			$role = $query->getRoleUserById($payload->user_id)["role"];

        if($role === "admin"){
             View::render("dashboard/index");
        }else{
            View::render("izin/index");
        }
    } 

    public function index2() {
        View::render("main-page/top-nav");
    }

    public function tentang() {
        View::render("main-page/tentangAplikasi");
    } 
    public function tentang2() {
        View::render("main-page/tentangPembuat");
    } 
    public function faq() {
        View::render("main-page/faq");
    } 
    public function berita() {
        View::render("berita/index");
    } 

    public function editberita()
    {
        // Ambil data pengguna berdasarkan ID dari model
            $model = new BeritaModel();
            

            function uploadberita()
            {
                $name = $_FILES['gambar']['name'];
                $tmpName = $_FILES['gambar']['tmp_name'];
                $error = $_FILES['gambar']['error'];
                $size = $_FILES['gambar']['size'];
    
                if ($error == 4) {
                    FlashMessage::setFlashMessage("error", "Gambar belum diberikan");
                    return false;
                }
    
                $ekstensiValid = ['jpg', 'jpeg', 'png'];
                $ekstensiFile = explode('.', $name);
                $ekstensiFile = strtolower(end($ekstensiFile));
    
                if (!in_array($ekstensiFile, $ekstensiValid)) {
                    FlashMessage::setFlashMessage("error", "Yang anda upload bukan gambar");
                    return false;
                }
    
    
                if ($size > 2000000) {
                    FlashMessage::setFlashMessage("error", "Ukuran Gambar terlalu besar");
                    return false;
                }
                $namaFileBaru = uniqid();
                $namaFileBaru .= ".";
                $namaFileBaru .= $ekstensiFile;
                move_uploaded_file($tmpName, 'img/' . $namaFileBaru);
                return $namaFileBaru;
            }
            $gambar = uploadberita();
            // Lakukan validasi dan update data pengguna di dalam model
            try {
                // Ambil data yang dikirim dari formulir
                $editedData = [
                    'id' => $_POST['id'],
                    'headline' => $_POST['headline'],
                    'deskripsi' => $_POST['deskripsi'],
                    'gambar' => $gambar
                    // Tambahkan field lainnya sesuai kebutuhan
                ];

                // Panggil method di model untuk melakukan update
                $model->updateBerita($editedData);

                // Redirect ke halaman yang sesuai setelah berhasil
                FlashMessage::setFlashMessage("success", "berita berhasil di ubah");
                header("Location: /berita");
            } catch (Exception $exception) {
                // Tangani kesalahan jika diperlukan
                FlashMessage::setFlashMessage("error", $exception->getMessage());
            }
        

        // Tampilkan view edit dengan data pengguna yang akan diubah
        // Misalnya: $this->render('users/edit', ['user' => $user]);
    }
    public function keluar() {
        $model = new IzinModel();
        $dataIzin = $model->getIzin1ById(1);
        // var_dump($dataIzin[0]['id']);
        // die;
        return View::render("surat/formkeluarmasuk", $dataIzin);
    } 
    public function cuti() {
        View::render("surat/formtidakmasuk");
    } 
    public function print() {
        $izinData = [
            'id' => $_POST['id'],
        ];
        $model = new IzinModel();
        $dataIzin = $model->getIzin1ById($izinData["id"]);
        // var_dump($dataIzin);
        // die;
        $dompdf = new Dompdf();
        $html = View::render2("surat/formkeluarmasuk", $dataIzin);
        $dompdf->loadHtml($html);
        
        // (Optional) Setup the paper size and orientation
        $dompdf->set_option('isRemoteEnabled',TRUE);
        $dompdf->setPaper('A4', 'landscape');
        // Render the HTML as PDF
        $dompdf->render();
    
        // Output the generated PDF to Browser
        $dompdf->stream();
    }
    
}
?>