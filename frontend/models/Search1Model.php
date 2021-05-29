<?php 
	trait Search1Model{
		//lay nhieu ban ghi
		public function modelRead($fromPrice,$toPrice, $from, $recordPerPage){
			$data = DB::fetchAll("select * from products where price >= $fromPrice and price <= $toPrice limit $from,$recordPerPage");			
			return $data;
		}
		//dem so luong ban ghi trong table users
		public function modelTotalRecord($fromPrice,$toPrice){
			$total = DB::rowCount("select id from products where price >= $fromPrice and price <= $toPrice");
			return $total;
		}
	}
 ?>