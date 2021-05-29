<?php 
	include "Models/OrderModel.php";
	class OrderController extends Controller{
		use OrderModel;
		//ham tao de xac thuc dang nhap
		public function index(){
			//so ban ghi tren mot trang
			$pageSize = 4;
			//tinh tong so ban ghi
			$totalRecord = $this->totalRecord();//ham trong model
			//tinh so trang
			//ham ceil su dung de lay tran. VD: ceil(2.1)=3
			$numPage = ceil($totalRecord/$pageSize);
			//lay bien p truyen tren url
			$p = isset($_GET["p"])&&is_numeric($_GET["p"])&&$_GET["p"]>0 ? ($_GET["p"]-1) : 0;
            $id = $_SESSION["customerid"];
			//lay tu ban ghi nao
			$from = $p * $pageSize;

			// echo $totalRecord."    ";
			// echo $p;
			//lay cac ban ghi
			$data = $this->listOrder($id,$from,$pageSize);
			//goi view, truyen du lieu ra view
			$this->loadView("OrderView.php",array("data"=>$data,"numPage"=>$numPage));
		}
		//chi tiet don hang
		public function orderDetail(){
			$id = isset($_GET["id"])&&is_numeric($_GET["id"])?$_GET["id"]:0;
			$data = $this->listProduct($id);
			// echo $id;
			$order = $this->getRecord($id);
			// echo $id;
			//goi view, truyen du lieu ra view
			$this->loadView("OrderDetailView.php",array("order"=>$order,"data"=>$data));
		}
		//xac nhan giao hang
		public function sent(){
			$id = isset($_GET["id"])&&is_numeric($_GET["id"])?$_GET["id"]:0;
			$this->sentOrder($id);
			header("location:index.php?controller=Order&action=orderDetail&id=$id");
		}
        //xac nhan giao hang
		public function take(){
			$id = isset($_GET["id"])&&is_numeric($_GET["id"])?$_GET["id"]:0;
			$this->takeOrder($id);
			header("location:index.php?controller=Order&action=orderDetail&id=$id");
		}
	}
 ?>