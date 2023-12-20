<?php
namespace Krispachi\KrisnaLTE\Controller;

use Exception;
use Krispachi\KrisnaLTE\App\FlashMessage;
use Krispachi\KrisnaLTE\App\View;
// use Krispachi\KrisnaLTE\Model\MajorModel;
// use Krispachi\KrisnaLTE\Model\SubjectModel;



class MainController{
    public function index() {
        View::render("dashboard/index");
    } 

    public function index2() {
        View::render("main-page/top-nav");
    } 
}
?>