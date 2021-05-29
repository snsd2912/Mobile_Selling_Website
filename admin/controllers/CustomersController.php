<?php 
	//load file model
	include "models/CustomersModel.php";
	class CustomersController extends Controller{
		//ke thua customerModel
		use CustomersModel;
		//ham tao -> goi ham xac thuc dang nhap
		public function __construct(){
			$this->authentication();
		}
		public function index(){
			if($_SESSION["role"]==1) { 
				//xac dinh so ban ghi tren mot trang
				$recordPerpage = 10;
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
				$this->loadView("customer.php",["data"=>$data,"numPage"=>$numPage]);
			}
		}
		//edit
		public function edit(){
			//lay bien id truyen tu url
			$id = isset($_GET["id"])&&is_numeric($_GET["id"])?$_GET["id"]:0;
            $message = isset($_GET["message"])?$_GET["message"]:2;
			//tao bien action cho form
			$formAction = "index.php?controller=customers&action=editPost&id=$id";
			$record = $this->modelEdit($id);
			//load view
			$this->loadView("add_edit_customer.php",["record"=>$record,"formAction"=>$formAction,"message"=>$message,"action"=>"edit"]);
		}
		//editPost
		public function editPost(){
			//lay bien id truyen tu url
			$id = isset($_GET["id"])&&is_numeric($_GET["id"])?$_GET["id"]:0;
			$this->modelEditPost($id);
			header("location:index.php?controller=customers");
		}
		//add
		public function add(){
			//tao bien action cho form
			$formAction = "index.php?controller=customers&action=addPost";
			//load view
			$this->loadView("add_edit_customer.php",["formAction"=>$formAction,"action"=>"add"]);
		}
		//addPost
		public function addPost(){
			$this->modelAddPost();	
			header("location:index.php?controller=customers");		
		}
		//delete
		public function delete(){
			//lay bien id truyen tu url
			$id = isset($_GET["id"])&&is_numeric($_GET["id"])?$_GET["id"]:0;
			$this->modelDeletePost($id);
			header("location:index.php?controller=customers");
		}
		//search
		public function search(){
			//xac dinh so ban ghi tren mot trang
			$key = isset($_POST["key"])?$_POST["key"]:"";
			$recordPerpage = 10;
			//tinh tong so trang
			$totalRecord = $this->modelTotalRecordSearch($key);
			//lay bien so trang truyen tu url
			$p = isset($_GET["p"])&&is_numeric($_GET["p"])?$_GET["p"]-1:0;
			//tinh so trang
			$numPage = ceil($totalRecord/$recordPerpage);
			//lay tu ban ghi nao
			$from = $p * $recordPerpage;
			//goi ham de lay du lieu truyen ra view
			$data = $this->modelSearch($key,$from,$recordPerpage);
			//goi view
			$this->loadView("customer.php",["data"=>$data,"numPage"=>$numPage]);
		}
        //search
		public function changepassword(){
			//xac dinh so ban ghi tren mot trang
			$id = isset($_POST["id"])?$_POST["id"]:0;
			
			$message = $this->modelChangePassword($id);

            //goi view
            header("location:index.php?controller=customers&action=edit&id=$id&message=$message");
		}
	}
 ?>