<?php 
	//include model
	include "models/Search1Model.php";
	class Search1Controller extends Controller{
		//ke thua ProductsModel
		use Search1Model;
		public function index(){
			$fromPrice = isset($_GET["fromPrice"])?$_GET["fromPrice"]:0;
			$toPrice = isset($_GET["toPrice"])?$_GET["toPrice"]:0;
			//xac dinh so ban ghi tren mot trang
			$recordPerpage = 15;
			//tinh tong so trang
			$totalRecord = $this->modelTotalRecord($fromPrice,$toPrice);
			//lay bien so trang truyen tu url
			$p = isset($_GET["p"])&&is_numeric($_GET["p"])?$_GET["p"]-1:0;
			//tinh so trang
			$numPage = ceil($totalRecord/$recordPerpage);
			//lay tu ban ghi nao
			$from = $p * $recordPerpage;
			//goi ham de lay du lieu truyen ra view
			$data = $this->modelRead($fromPrice,$toPrice,$from,$recordPerpage);
			//goi view
			$this->loadView("Search1View.php",["data"=>$data,"numPage"=>$numPage,"fromPrice"=>$fromPrice,"toPrice"=>$toPrice]);
		}		
	}
 ?>