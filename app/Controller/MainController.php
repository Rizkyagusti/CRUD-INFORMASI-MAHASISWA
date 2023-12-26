<?php
namespace Krispachi\KrisnaLTE\Controller;

use Exception;
use Krispachi\KrisnaLTE\App\FlashMessage;
use Krispachi\KrisnaLTE\App\View;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Krispachi\KrisnaLTE\Model\UserModel;



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
}
?>