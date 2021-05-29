<?php 
	trait CategoriesModel{
		//lay nhieu ban ghi
		public function modelRead($from, $recordPerPage){
			//goi ham de lay ket qua
			$data = DB::fetchAll("select * from categories where parentid = 0 order by categoryid desc limit $from,$recordPerPage");
			return $data;
		}
		//dem so luong ban ghi trong table categories
		public function modelTotalRecord(){
			$total = DB::rowCount("select categoryid from categories");
			return $total;
		}
		//dem so luong ban ghi trong table categories
		public function modelTotalRecordSearch($key){
			$total = DB::rowCount("select categoryid from categories where name LIKE '%$key%'");
			return $total;
		}
			//tim kiem ban ghi
		public function modelSearch($key, $from, $recordPerPage){
			$data = DB::fetchAll("select * from categories where name LIKE '%$key%' order by categoryid limit $from,$recordPerPage");
			return $data;
		}
		//edit
		public function modelEdit($id){			
			//lay mot ban ghi
			$record = DB::fetch("select * from categories where categoryid=:record_id",["record_id"=>$id]);
			return $record;
		}
		//editPost
		public function modelEditPost($id){
			$name = $_POST["name"];
			$parentid = $_POST["parentid"];
			//update ban ghi
			DB::execute("update categories set name=:_name,parentid=:_parentid where categoryid=:_id",["_name"=>$name,"_parentid"=>$parentid,"_id"=>$id]);			
		}
		//addPost
		public function modelAddPost(){
			$name = $_POST["name"];
			$parentid = $_POST["parentid"];
			//echo "insert into categories set name='$name', parentid=$parentid";			
			//update ban ghi
			DB::execute("insert into categories set name=:_name, parentid=:_parentid",["_name"=>$name,"_parentid"=>$parentid]);
		}
		//deletePost
		public function modelDeletePost($id){	
			$row = DB::rowCount("select * from categories where parentid=$id");
			if($row != NULL){
				DB::execute("delete from categories where parentid=:_id",["_id"=>$id]);
			}
			//delete record
			DB::execute("delete from categories where categoryid=:_id",["_id"=>$id]);
		}
	}
 ?>