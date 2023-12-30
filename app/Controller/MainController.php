<?php
namespace Krispachi\KrisnaLTE\Controller;

use Exception;
use Krispachi\KrisnaLTE\App\FlashMessage;
use Krispachi\KrisnaLTE\App\View;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Krispachi\KrisnaLTE\Model\UserModel;
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