<?php 
	//load file model
	include "models/LoginModel.php";
	class LoginController extends Controller{
		//ke thua class LoginModel
		use LoginModel;
		public function index(){
			//load view
			$this->loadView("login.php");
		}
		//khi an nut submit -> se den action=checkLogin
		public function checkLogin(){
			//goi ham modelCheckLogin de kiem tra
			$this->modelCheckLogin();
		}
		//ham thuc hien dang xuat
		public function logOut(){
			//huy session
			unset($_SESSION["emname"]);
			unset($_SESSION["userid"]);
			unset($_SESSION["photo"]);
			unset($_SESSION["role"]);
			header("location:index.php");
		}
	}
 ?>