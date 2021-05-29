<?php 
	trait StatisticModel{
		//lay danh sach cac ban ghi: tu ban ghi nao den ban ghi nao
		public function revenue($start, $end){
			//thuc thi truy van
			// $query = DB::fetchAll("select *,order.id as orderID from order inner join customers on order.customerid=customers.customerid order by order.orderid desc limit $from, $pageSize");
			$query = DB::fetch("select sum(total) as revenue from listorder where Date(time) >= '$start' and Date(time) <= '$end'");

			//lay tat ca ket qua tra ve
			return $query->revenue;
		}

        //lay danh sach cac ban ghi: tu ban ghi nao den ban ghi nao
		public function listOrder($start, $end){
			//thuc thi truy van
			// $query = DB::fetchAll("select *,order.id as orderID from order inner join customers on order.customerid=customers.customerid order by order.orderid desc limit $from, $pageSize");
			$query = DB::fetchAll("select * from listorder where Date(time) >= '$start' and Date(time) <= '$end' order by orderid desc");
			//lay tat ca ket qua tra ve
			return $query;
		}
	}
 ?>