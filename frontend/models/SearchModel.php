<?php 
	trait SearchModel{
		//lay nhieu ban ghi
		public function modelRead($key, $from, $recordPerPage){
			$data = DB::fetchAll("select * from products where name like '%$key%' limit $from,$recordPerPage");			
			return $data;
		}
		//dem so luong ban ghi trong table users
		public function modelTotalRecord($key){
			$total = DB::rowCount("select productid from products where name like '%$key%'");
			return $total;
		}
	}
 ?>