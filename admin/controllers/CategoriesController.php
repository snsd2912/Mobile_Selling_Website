<?php 
	//load file model
	include "models/CategoriesModel.php";
	class CategoriesController extends Controller{
		//ke thua UserModel
		use CategoriesModel;
		//ham tao -> goi ham xac thuc dang nhap
		public function __construct(){
			$this->authentication();
		}
		public function index(){
			if($_SESSION["role"]==1) { 
				//xac dinh so ban ghi tren mot trang
				$recordPerpage = 15;
				//tinh tong so trang
				$totalRecord = $this->modelTotalRecord();
				//lay bien so trang truyen tu url
				$p = isset($_GET["p"])&&is_numeric($_GET["p"])?$_GET["p"]-1:0;
				//tinh so trang
				$numPage = ceil($totalRecord/$recordPerpage);
				//lay tu ban ghi nao
				$from = $p * $recordPerpage;
				//goi ham de lay du lieu truyen ra view
				$data = $this->modelRead($from,$recordPerpage);
				//goi view
				$this->loadView("categories.php",["data"=>$data,"numPage"=>$numPage]);
			}
		}
		//edit
		public function edit(){
			//lay bien id truyen tu url
			$id = isset($_GET["id"])&&is_numeric($_GET["id"])?$_GET["id"]:0;
			//tao bien action cho form
			$formAction = "index.php?controller=Categories&action=editPost&id=$id";
			$record = $this->modelEdit($id);
			//load view
			$this->loadView("add_edit_categories.php",["record"=>$record,"formAction"=>$formAction]);
		}
		//editPost
		public function editPost(){
			//lay bien id truyen tu url
			$id = isset($_GET["id"])&&is_numeric($_GET["id"])?$_GET["id"]:0;
			$this->modelEditPost($id);
			header("location:index.php?controller=Categories");
		}
		//add
		public function add(){
			//tao bien action cho form
			$formAction = "index.php?controller=Categories&action=addPost";
			//load view
			$this->loadView("add_edit_categories.php",["formAction"=>$formAction]);
		}
		//addPost
		public function addPost(){
			$this->modelAddPost();
			header("location:index.php?controller=Categories");
		}
		//delete
		public function delete(){
			//lay bien id truyen tu url
			$id = isset($_GET["id"])&&is_numeric($_GET["id"])?$_GET["id"]:0;
			$this->modelDeletePost($id);
			header("location:index.php?controller=Categories");
		}
		//search
		public function search(){
			//xac dinh so ban ghi tren mot trang
			$key = $_POST["key"];
			$recordPerpage = 15;
			//tinh tong so trang
			$totalRecord = $this->modelTotalRecord();
			//lay bien so trang truyen tu url
			$p = isset($_GET["p"])&&is_numeric($_GET["p"])?$_GET["p"]-1:0;
			//tinh so trang
			$numPage = ceil($totalRecord/$recordPerpage);
			//lay tu ban ghi nao
			$from = $p * $recordPerpage;
			//goi ham de lay du lieu truyen ra view
			$data = $this->modelRead($from,$recordPerpage);
			//goi view
			$this->loadView("categories.php",["data"=>$data,"numPage"=>$numPage]);
		}
	}
 ?>