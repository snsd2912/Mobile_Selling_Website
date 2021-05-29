<?php
include "models/LoginModel.php";
include "models/UsersModel.php";

class LoginController extends Controller
{

    use LoginModel;
    use UsersModel;

    public function index()
    {
        $this->loadView("login.php");
    }

    public function checkLogin()
    {
        $this->modelCheckLogin();
    }

    public function register()
    {
        $this->modelRegister();
    }

    public function logout()
    {
        //huy session
		unset($_SESSION["customerid"]);
        unset($_SESSION["username"]);
        header("location:index.php");
    }

    public function changeInfo()
    {
        $this->modelOwnEditPost($_POST['id']);
        header("location:index.php");
    }

    public function getInfo(){
        return $this->getById($_POST['id']);
    }
}

?>