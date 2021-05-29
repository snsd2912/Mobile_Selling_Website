<?php 
	trait ProductsModel{
		//lay nhieu ban ghi
		public static function modelRead($from, $recordPerPage){
			//goi ham de lay ket qua
			$data = DB::fetchAll("select * from products order by productid limit $from,$recordPerPage");
			return $data;
		}
		//dem so luong ban ghi trong table users
		public static function modelTotalRecord(){
			$total = DB::rowCount("select productid from products");
			return $total;
		}
        //dem so luong ban ghi trong table users
		public static function modelTotalRecordSearch($key){
			$total = DB::rowCount("select productid from products where name LIKE '$key%'");
			return $total;
		}
        //tim kiem ban ghi
		public static function modelSearch($key, $from, $recordPerPage){
			$data = DB::fetchAll("select * from products where name LIKE '%$key%' order by productid limit $from,$recordPerPage");
			return $data;
		}
		//edit
		public static function modelEdit($id){			
			//lay mot ban ghi
			$record = DB::fetch("select * from products where productid=:record_id",["record_id"=>$id]);
			return $record;
		}
		//editPost
		public static function modelEditPost($id){
			$name = $_POST["name"];
			$price = $_POST["price"];
			$distributorid = $_POST["distributorid"];
			$categoryid = $_POST["categoryid"];
			$description = $_POST["description"];
			$hot = isset($_POST["hot"]) ? 1 : 0;
			//update ban ghi
			DB::execute("update products set name=:_name, distributorid=:_distributorid, price=:_price, categoryid=:_categoryid,description=:_description,hot=:_hot where productid=:_productid",["_name"=>$name,"_distributorid"=>$distributorid,"_price"=>$price,"_categoryid"=>$categoryid,"_description"=>$description,"_hot"=>$hot,"_productid"=>$id]);
			//neu user chon anh thi thuc hien upload
			if($_FILES["photo"]["name"] != ""){
				//-----------
				//lay anh cu (neu co) de xoa
				$oldImg = DB::fetch("select photo from products where productid=$id");
				if(strcmp($oldImg->photo,"")!=0&&file_exists("../frontend/assets/upload/products/".$oldImg->photo)){
					//xoa anh
					unlink("../frontend/assets/upload/products/".$oldImg->photo);//ham unlink su dung de xoa file
				}
				//-----------
				//lay ten file
				$photo = $_FILES["photo"]["name"];
				//gan them chuoi thoi gian de cac anh khong trung ten nhau luc upload
				$photo = time().$photo;
				//upload anh
				move_uploaded_file($_FILES["photo"]["tmp_name"], "../frontend/assets/upload/products/$photo");
				//update ban ghi
				DB::execute("update products set photo=:_photo where productid=:_id",["_photo"=>$photo,"_id"=>$id]);
			}
		}
		//addPost
		public static function modelAddPost(){
			$name = $_POST["name"];
			$price = $_POST["price"];
			$distributorid = $_POST["distributorid"];
			$categoryid = $_POST["categoryid"];
			$description = $_POST["description"];
			$hot = isset($_POST["hot"]) ? 1 : 0;
			$photo = "";
			//neu user chon anh thi thuc hien upload
			if($_FILES["photo"]["name"] != ""){
				//lay ten file
				$photo = $_FILES["photo"]["name"];
				//gan them chuoi thoi gian de cac anh khong trung ten nhau luc upload
				$photo = time().$photo;
				//upload anh
				move_uploaded_file($_FILES["photo"]["tmp_name"], "../frontend/assets/upload/products/$photo");
			}
			//update ban ghi
			DB::execute("insert into products set name=:_name,distributorid=:_distributorid, price=:_price, categoryid=:_categoryid,
			description=:_description,hot=:_hot,photo=:_photo",["_name"=>$name,"_distributorid"=>$distributorid,"_price"=>$price,
			"_categoryid"=>$categoryid,"_description"=>$description,"_hot"=>$hot,"_photo"=>$photo]);

			// $record = DB::fetch("select * from products order by productid desc limit 1");
			// return $record->productid;
		}
		//deletePost
		public static function modelDeletePost($id){	
			//-----------
			//lay anh cu (neu co) de xoa
			$oldImg = DB::fetch("select photo from products where productid=$id");
			if(isset($oldImg->photo)&&file_exists("../frontend/assets/upload/products/".$oldImg->photo)){
				//xoa anh
				unlink("../frontend/assets/upload/products/".$oldImg->photo);//ham unlink su dung de xoa file
			}
			//-----------		
			//delete record
			DB::execute("delete from products where productid=:_id",["_id"=>$id]);
		}
	}
 ?>