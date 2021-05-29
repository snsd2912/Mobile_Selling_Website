<?php 
	//load file model
	include_once "models/CategoriesModel.php";
	class IncCategoriesController extends Controller{
		//ke thua UserModel
		use CategoriesModel;
		public function index(){
			if(!(isset($_SESSION["username"]) && isset($_SESSION["customerid"])))
				header("location:index.php?controller=login");
			//goi ham de lay du lieu truyen ra view
			$data = $this->modelRead();
			//goi view
			$this->loadView("IncCategoriesView.php",["data"=>$data]);
		}
	}
 ?>