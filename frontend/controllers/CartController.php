<?php 
	// load model
	include "models/CartModel.php";
	class CartController extends Controller{
		// ke thua model
		use CartModel;
		// ham hien thi gioi hang
		public function index(){
			// kiem tra neu gioi hang (session $_SESSION["cart"]) chua ton tai thi khoi tao
			// if(isset($_SESSION["cart"]) == false)
			// 	$_SESSION["cart"] = array();
			$cart = $this->cartList();
			$this->loadView("CartView.php",["cart"=>$cart]);
		}
		// them mot san pham moi vao gio hang
		public function add(){
			// lay if tu url
			$id = isset($_GET["id"]) ? $_GET["id"] : 0;
			
			// goi ham cartAdd tu model
			$this->cartAdd($id);
			// di chuyen den trang gioi hang
			header("location:index.php?controller=cart");
		}
		// xoa san pham khoi gio hang
		public function delete(){
			// lay if tu url
			$id = isset($_GET["id"]) ? $_GET["id"] : 0;
			// goi ham cartDelete tu model
			$this->cartDelete($id);
			// di chuyen den trang gioi hang
			header("location:index.php?controller=cart");
		}
		// xoa toan bo gio hang
		public function destroy(){
			// goi ham cartDestroy tu model
			$this->cartDestroy();
			// di chuyen den trang gioi hang
			header("location:index.php?controller=cart");
		}
		// cap nhat so luowng san pham trong gio hang
		public function update(){
			// duyet cac phan tu trong session array de lay gia tri cua input
			foreach($_SESSION["cart"] as $product){
				$inputName = "product_".$product["id"];
				$qty = $_POST[$inputName];
				// goi ham update de update lai thuoc tinh number trong session $_SESSION["cart"]
				$this->cartUpdate($product["id"],$qty);
				// di chuyen den trang gio hang
				header("location:index.php?controller=cart");
			}
		}
		// thanh toan toan bi gioi hang
		public function checkout(){
			// load view de user nhap thong tin
			if(isset($_POST['color'])) {
				$name = $_POST['color'];
				$id = "";
				// echo "You chose the following color(s): <br>";
				foreach ($name as $color){
					$id = "{$id}or productid = {strval($color)} ";
				} // end brace for if(isset
				$param = substr($id, 3);
				$cart = DB::fetchAll("select * from cart where customerid=:_id and ( $param )",["_id"=>$_SESSION["customerid"]]);
				$customer = DB::fetch("select * from customers where customerid=:_id",["_id"=>$_SESSION["customerid"]]);
				$_SESSION["page"] = 2;
				$this->loadView("CheckoutView.php",["cart"=>$cart,"customer"=>$customer]);
			} else {
				header("location:index.php?controller=cart");
			}

			// $customer = DB::fetch("select * from customers where customerid=:_id",["_id"=>$_SESSION["customerid"]]);
			// $_SESSION["page"] = 2;
			// $this->loadView("CheckoutView.php",["cart"=>$cart,"customer"=>$customer]);
		}
		// khi an nut submit thanh toan
		public function doCheckout(){
			// goi ham cartCheckout tu model de insert thong tin vaof csdl
			$this->cartCheckout();
			header("location:index.php?controller=cart");
		}
	}
 ?>