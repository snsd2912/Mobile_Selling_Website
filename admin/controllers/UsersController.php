<?php 
	//load file model
	include "models/UsersModel.php";
	class UsersController extends Controller{
		//ke thua UserModel
		use UsersModel;
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
				$this->loadView("user.php",["data"=>$data,"numPage"=>$numPage]);
			}
		}
		//edit
		public function edit(){
			//lay bien id truyen tu url
			$id = isset($_GET["id"])&&is_numeric($_GET["id"])?$_GET["id"]:0;
			$message = isset($_GET["message"])?$_GET["message"]:2;
			//tao bien action cho form
			$formAction = "index.php?controller=users&action=editPost";
			$record = $this->modelEdit($id);
			//load view
			$this->loadView("add_edit_user.php",["record"=>$record,"formAction"=>$formAction,"message"=>$message,"action"=>"edit"]);
		}
		//edit
		public function ownedit(){
			//tao bien action cho form
			$message = 2;
			if(isset($_SESSION["message"])){
				$message = $_SESSION["message"];
				unset($_SESSION["message"]);
			}
			$formAction = "index.php?controller=users&action=editOwnPost";
			$record = $this->modelEdit($_SESSION["userid"]);
			//load view
			$this->loadView("persona.php",["record"=>$record,"formAction"=>$formAction,"message"=>$message,"action"=>"edit"]);
		}
		//editPost
		public function editOwnPost(){
			//lay bien id truyen tu url
			$message = $this->modelOwnEditPost($_SESSION["userid"]);
			header("location:index.php?controller=users&action=ownedit");
		}
		//editPost
		public function editPost(){
			//lay bien id truyen tu url
			$id = isset($_POST["id"])&&is_numeric($_POST["id"])?$_POST["id"]:0;
			$this->modelEditPost($id);
			header("location:index.php?controller=users");
		}
		//add
		public function add(){
			//tao bien action cho form
			$formAction = "index.php?controller=users&action=addPost";
			//load view
			$this->loadView("add_edit_user.php",["formAction"=>$formAction,"action"=>"add"]);
		}
		//addPost
		public function addPost(){
			$this->modelAddPost();	
			header("location:index.php?controller=users");		
		}
		//delete
		public function delete(){
			//lay bien id truyen tu url
			$id = isset($_GET["id"])&&is_numeric($_GET["id"])?$_GET["id"]:0;
			$this->modelDeletePost($id);
			header("location:index.php?controller=users");
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
			$this->loadView("user.php",["data"=>$data,"numPage"=>$numPage]);
		}
		//search
		public function changepassword(){
			//xac dinh so ban ghi tren mot trang
			$id = isset($_POST["id"])?$_POST["id"]:0;
			
			$message = $this->modelChangePassword($id);

            //goi view
            header("location:index.php?controller=users&action=edit&id=$id&message=$message");
		}
		//search
		public function changeownpassword(){			
			$message = $this->modelChangeOwnPassword($_SESSION["userid"]);
			$_SESSION["message"]= $message;
            //goi view
            header("location:index.php?controller=users&action=ownedit");
		}
	}
 ?>