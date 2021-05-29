<?php
	trait CartModel{		
		public function cartAdd($id){
			$rowCount = DB::rowCount("select * from cart where productid=:_id and customerid=:_cid",
			["_id"=>$id,"_cid"=>$_SESSION["customerid"]]);
			// echo $rowCount;
			if($rowCount>0){
				$product = DB::fetch("select * from cart where productid=:_id and customerid=:_cid",
				["_id"=>$id,"_cid"=>$_SESSION["customerid"]]);
				$number = $product->qty + 1;
				DB::execute("update cart set qty=:_qty where productid=:_id and customerid=:_cid",
				["_qty"=>$number,"_id"=>$id,"_cid"=>$_SESSION["customerid"]]);
			} else {
				$product = DB::fetch("select * from products where productid=$id");
				DB::execute("insert into cart set productid=:_id, customerid=:_cid, qty=:_qty, name=:_name, price=:_price, discount=:_discount",
				["_qty"=>1,"_id"=>$id,"_cid"=>$_SESSION["customerid"],"_name"=>$product->name,"_price"=>$product->price,"_discount"=>$product->discount]);
			}
		    // if(isset($_SESSION['cart'][$id])){
		    //     //nếu đã có sp trong giỏ hàng thì số lượng lên 1
		    //     $_SESSION['cart'][$id]['number']++;
		    // } else {
		    //     //lấy thông tin sản phẩm từ CSDL và lưu vào giỏ hàng
		    //     $product = DB::fetch("select * from products where productid=$id");
		    //     //---
		        
		    //     $_SESSION['cart'][$id] = array(
		    //         'id' => $id,
		    //         'name' => $product->name,
		    //         'photo' => $product->photo,
		    //         'number' => 1,
		    //         'price' => $product->price,
			// 		'discount' => $product->discount
		    //     );
		    // }
		}
		/**
		 * Cập nhật số lượng sản phẩm
		 * @param int
		 * @param int
		 */
		public function cartUpdate($id, $number){
		    if($number==0){
				DB::execute("delete from cart where productid=:_id and customerid=:_cid",
				["_id"=>$id,"_cid"=>$_SESSION["customerid"]]);
		        // xóa sp ra khỏi giỏ hàng
		        // unset($_SESSION['cart'][$id]);
		    } else {
				DB::execute("update cart set qty=:_qty where productid=:_id and customerid=:_cid",
				["_qty"=>$number,"_id"=>$id,"_cid"=>$_SESSION["customerid"]]);
		        // $_SESSION['cart'][$id]['number'] = $number;
		    }
		}
		/**
		 * Xóa sản phẩm ra khỏi giỏ hàng
		 * @param int
		 */
		public function cartDelete($id){
			DB::execute("delete from cart where productid=:_id and customerid=:_cid",["_id"=>$id,"_cid"=>$_SESSION["customerid"]]);
		    // unset($_SESSION['cart'][$id]);
		}
		/**
		 * Tổng giá trị giỏ hàng
		 */
		public function cartTotal(){
		    $total = 0;
		    // foreach($_SESSION['cart'] as $product){
		    //     $total += $product['number'] * ($product["price"]-$product["price"]*$product["discount"]/100);
		    // }
			$carts = DB::fetchAll("select * from cart where customerid=:_cid",["_cid"=>$_SESSION["customerid"]]);
			foreach($carts as $product){
				$total += $product->qty * ( $product->price -  $product->price *  $product->discount /100);
			}
		    return $total;
		}
		/**
		 * Số sản phẩm có trong giỏ hàng
		 */
		public function cartNumber(){
		    $number = DB::rowCount("select * from cart where customerid=:_cid",["_cid"=>$_SESSION["customerid"]]);
		    return $number;
		}
		/**
		 * Danh sách sản phẩm trong giỏ hàng
		 */
		public function cartList(){
		    $carts = DB::fetchAll("select * from cart where customerid=:_cid",["_cid"=>$_SESSION["customerid"]]);
			return $carts;
		}
		/**
		 * Xóa giỏ hàng
		 */
		public function cartDestroy(){
			DB::execute("delete from cart where customerid=:_cid",
				["_cid"=>$_SESSION["customerid"]]);
		    // $_SESSION['cart'] = array();
		}
		//=============
		//checkout
		public function cartCheckOut(){
			$customerid = $_SESSION["customerid"];
			$name = $_POST["name"];
			$address = $_POST["address"];
			$phone = $_POST["phone"];
			$note = $_POST["note"];
			$total = $_POST["total"];
			$time = date('Y-m-d H:i:s');
			// //lay id vua moi insert
			// $orderid = DB::execute("insert into order set customerid=:_customerid, name=:_name, address=:_address, note=:_note, phonenumber=:_phone,total=:_total, time=:_time",
			// ["_customerid"=>$_SESSION["customerid"], "name"=>$name, "_address"=>$address, "_phone"=>$phone, "_note"=>$note, "_total"=>$total, "_time"=>$time]);
			
			// $orderid = DB::execute("insert into phone_website.order set customerid=$customerid, name=$name, 
			// address=$address, note=$note, phonenumber=$phone,total=$total, time=$time");

			// echo $orderid;
			// $orderid = ;
			$orderid = DB::execute("insert into listorder (customerid,name,address,note,phonenumber,total,time) values ('$customerid','$name','$address','$note','$phone','$total',now())");
			// echo $orderid;
			//duyet cac ban ghi trong session array de insert vao order_details
			$listid = $_POST["product"];
			foreach($listid as $id){
				// echo $id."  ";
				$product = DB::fetch("select * from products where productid = $id");
				// echo $product->productid."    ";

				$c = DB::fetch("select * from cart where productid=:_id and customerid=:_cid",
				["_id"=>$id,"_cid"=>$_SESSION["customerid"]]);
				// echo $c->qty."    ";

				DB::execute("insert into order_detail set orderid=:_orderid, productid=:_productid, name=:_name, price=:_price, qty=:_qty, discount=:_discount",
				["_orderid"=>$orderid,"_productid"=>$id,"_name"=>$product->name, "_price"=>$product->price,"_qty"=>$c->qty,"_discount"=>$product->discount]);
				
				DB::execute("delete from cart where productid=:_id and customerid=:_cid",["_id"=>$id,"_cid"=>$customerid]);
			}

		}
		//=============
	}	
?>