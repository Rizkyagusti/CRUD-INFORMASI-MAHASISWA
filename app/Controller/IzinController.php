<?php
namespace Krispachi\KrisnaLTE\Controller;

use Exception;
use Krispachi\KrisnaLTE\App\FlashMessage;
use Krispachi\KrisnaLTE\App\View;
// use Krispachi\KrisnaLTE\Model\MajorModel;
// use Krispachi\KrisnaLTE\Model\SubjectModel;



class IzinController{
    public function index() {
        View::render("izin/index");
    }   

    public function index2() {
        View::render("izin/index2");
    }   
}
?>