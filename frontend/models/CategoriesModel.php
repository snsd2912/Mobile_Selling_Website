<?php 
	trait CategoriesModel{
		//lay nhieu ban ghi
		public function modelRead(){
			//goi ham de lay ket qua
			$data = DB::fetchAll("select * from categories where parentid = 0");
			return $data;
		}
	}
 ?>