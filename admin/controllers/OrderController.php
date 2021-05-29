<?php 
	include "Models/OrderModel.php";
	class OrderController extends Controller{
		use OrderModel;
		//ham tao de xac thuc dang nhap
		public function __construct(){
			$this->authentication();
		}
		public function index(){
			//so ban ghi tren mot trang
			$pageSize = 10;
			//tinh tong so ban ghi
			$totalRecord = $this->totalRecord();//ham trong model
			//tinh so trang
			//ham ceil su dung de lay tran. VD: ceil(2.1)=3
			$numPage = ceil($totalRecord/$pageSize);
			//lay bien p truyen tren url
			$p = isset($_GET["p"])&&is_numeric($_GET["p"])&&$_GET["p"]>0 ? ($_GET["p"]-1) : 0;
			//lay tu ban ghi nao
			$from = $p * $pageSize;

			// echo $totalRecord."    ";
			// echo $p;
			//lay cac ban ghi
			$data = $this->listOrder($from,$pageSize);
			//goi view, truyen du lieu ra view
			$this->loadView("OrderView.php",array("data"=>$data,"numPage"=>$numPage));
		}
		public function add(){
			if(isset($_SESSION["order"]) == false)
				$_SESSION["order"] = array();
			$this->loadView("Order_Add_Product.php");
		}
		public function search(){
			$key = isset($_POST["key"])?$_POST["key"]:"";
			// echo $key;
			//tinh tong so ban ghi
			$data = $this->searchOrder($key);
			// foreach($data as $order){
			// 	echo $order->orderid;
			// }
			$numPage = 1;
			//goi view, truyen du lieu ra view
			$this->loadView("OrderView.php",array("data"=>$data,"numPage"=>$numPage,"key"=>$key));
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
	}
 ?>