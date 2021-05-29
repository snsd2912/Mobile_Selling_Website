<?php 
	trait OrderModel{
		//lay danh sach cac ban ghi: tu ban ghi nao den ban ghi nao
		public function listOrder($from, $pageSize){
			//thuc thi truy van
			// $query = DB::fetchAll("select *,order.id as orderID from order inner join customers on order.customerid=customers.customerid order by order.orderid desc limit $from, $pageSize");
			$query = DB::fetchAll("select * from listorder order by orderid desc limit $from, $pageSize");
			//lay tat ca ket qua tra ve
			return $query;
		}
		//lay danh sach cac ban ghi: tu ban ghi nao den ban ghi nao
		public function searchAll($key, $from, $pageSize){
			//thuc thi truy van
			// $query = DB::fetchAll("select *,order.id as orderID from order inner join customers on order.customerid=customers.customerid order by order.orderid desc limit $from, $pageSize");
			$query = DB::fetchAll("select * from listorder where name LIKE '%$key%' order by orderid desc limit $from, $pageSize");
			//lay tat ca ket qua tra ve
			return $query;
		}
		//lay danh sach cac ban ghi: tu ban ghi nao den ban ghi nao
		public function searchOrder($key){
			//thuc thi truy van
			// $query = DB::fetchAll("select *,order.id as orderID from order inner join customers on order.customerid=customers.customerid order by order.orderid desc limit $from, $pageSize");
			$query = DB::fetchAll("select * from listorder where name LIKE '%$key%' order by orderid");
			//lay tat ca ket qua tra ve
			return $query;
		}
		//tinh tong so luong ban ghi
		public function totalRecord(){
			//thuc thi truy van			
			$rows = DB::rowCount("select * from listorder");
			//tra ve tong so luong ban ghi
			return $rows;
		}
		//tinh tong so luong ban ghi
		public function getRecord($id){
			//thuc thi truy van			
			$rows = DB::fetch("select * from listorder where orderid=$id");
			//tra ve tong so luong ban ghi
			return $rows;
		}
		public function listProduct($id){
			//thuc thi truy van
			// $query = DB::fetchAll("select * from order_detail inner join products on order_details.product_id=products.id where order_details.order_id=$id");
			$query = DB::fetchAll("select * from order_detail where orderid=$id");
			//tra ve tong so luong ban ghi
			return $query;
		}
		public function sentOrder($id){
			DB::execute("update listorder set ship=1 where orderid=$id");
		}
	}
 ?>