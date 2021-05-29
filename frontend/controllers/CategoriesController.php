<?php 
	//load file model
	include "models/CategoriesModel.php";
	class CategoriesController extends Controller{
		//ke thua UserModel
		use CategoriesModel;
		public function index(){
			//goi ham de lay du lieu truyen ra view
			$data = $this->modelRead();
			//goi view
			$this->loadView("CategoriesView.php",["data"=>$data]);
		}
	}
 ?>