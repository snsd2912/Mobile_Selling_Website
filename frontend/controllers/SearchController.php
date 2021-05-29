<?php 
	//include model
	include "models/SearchModel.php";
	class SearchController extends Controller{
		//ke thua ProductsModel
		use SearchModel;
		public function index(){
			$key = isset($_GET["key"])?$_GET["key"]:"";
			//xac dinh so ban ghi tren mot trang
			$recordPerpage = 15;
			//tinh tong so trang
			$totalRecord = $this->modelTotalRecord($key);
			//lay bien so trang truyen tu url
			$p = isset($_GET["p"])&&is_numeric($_GET["p"])?$_GET["p"]-1:0;
			//tinh so trang
			$numPage = ceil($totalRecord/$recordPerpage);
			//lay tu ban ghi nao
			$from = $p * $recordPerpage;
			//goi ham de lay du lieu truyen ra view
			$data = $this->modelRead($key,$from,$recordPerpage);
			//goi view
			$this->loadView("SearchView.php",["data"=>$data,"numPage"=>$numPage,"key"=>$key]);
		}		
	}
 ?>