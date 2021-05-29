<?php 
	trait ProductsModel{
		//lay nhieu ban ghi
		public function modelRead($catid, $from, $recordPerPage){
			//lay bien findPrice truyen tu url
			//$findPrice = isset($_GET["findPrice"])?$_GET["findPrice"]:"";
			$orderBy = isset($_GET["orderBy"])?$_GET["orderBy"]:"";
			$sqlOrder = "order by productid desc";
			switch ($orderBy) {
				case 'priceAsc':
					$sqlOrder = "order by price asc";
					break;
				case 'priceDesc':
					$sqlOrder = "order by price desc";
					break;
				case 'nameAsc':
					$sqlOrder = "order by name asc";
					break;
				case 'nameDesc':
					$sqlOrder = "order by name desc";
					break;
				default:
					# code...
					break;
			}
			//lay so ban ghi hien thi
			$recordPerPage = isset($_GET["recordPerPage"])?$_GET["recordPerPage"]:$recordPerPage;
			$data = DB::fetchAll("select * from products where categoryid= $catid $sqlOrder limit $from,$recordPerPage");

			/*switch ($findPrice) {
				case '1tr-5tr':
					$data = DB::fetchAll("select * from products where category_id = $catid and price >= 1000000 and price <= 5000000 order by id desc limit $from,$recordPerPage");
					break;
				case '5tr-10tr':
					$data = DB::fetchAll("select * from products where category_id = $catid and price >= 5000000 and price <= 10000000 order by id desc limit $from,$recordPerPage");
					break;
				case '10tr-15tr':
					$data = DB::fetchAll("select * from products where category_id = $catid and price >= 10000000 and price <= 15000000 order by id desc limit $from,$recordPerPage");
					break;
				case '20tr-25tr':
					$data = DB::fetchAll("select * from products where category_id = $catid and price >= 20000000 and price <= 25000000 order by id desc limit $from,$recordPerPage");
					break;
				case '25tr-30tr':
					$data = DB::fetchAll("select * from products where category_id = $catid and price >= 25000000 and price <= 30000000 order by id desc limit $from,$recordPerPage");
					break;
			}*/		
			return $data;
		}
		//dem so luong ban ghi trong table users
		public function modelTotalRecord($catid){
			$total = DB::rowCount("select * from products where categoryid=:_categoryid",["_categoryid"=>$catid]);
			return $total;
		}
		//lay mot ban ghi
		public function modelGetProduct($id){
			//goi ham de lay ket qua
			$record = DB::fetch("select * from products where productid = $id");
			return $record;
		}
	}
 ?>