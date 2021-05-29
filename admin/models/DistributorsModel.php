<?php 
	trait DistributorsModel{
		//lay nhieu ban ghi
		//lay nhieu ban ghi
	public function modelRead($from, $recordPerPage){
		//goi ham de lay ket qua
		$data = DB::fetchAll("select * from distributors order by distributorid limit $from,$recordPerPage");
		return $data;
	}
	//dem so luong ban ghi trong table distributors
	public function modelTotalRecord(){
		$total = DB::rowCount("select distributorid from distributors");
		return $total;
	}
        //dem so luong ban ghi trong table distributors
	public function modelTotalRecordSearch($key){
		$total = DB::rowCount("select distributorid from distributors where name LIKE '%$key%'");
		return $total;
	}
        //tim kiem ban ghi
	public function modelSearch($key, $from, $recordPerPage){
		$data = DB::fetchAll("select * from distributors where name LIKE '%$key%' order by distributorid limit $from,$recordPerPage");
		return $data;
	}
	//edit
	public function modelEdit($id){		
		//lay mot ban ghi
		$record = DB::fetch("select * from distributors where distributorid=:record_id",["record_id"=>$id]);
		return $record;
	}
	//editPost
	public function modelEditPost($id){
			$name = $_POST["name"];
            $address = $_POST["address"];
            $phonenumber = $_POST["phonenumber"];
            $description = $_POST["description"];
            $email = $_POST["email"];
		//update ban ghi
		DB::execute("update distributors set name=:_name, 
            address=:_address, phonenumber=:_phonenumber,email=:_email,description=:_description where distributorid=:_distributorid",
            ["_name"=>$name,"_address"=>$address,"_phonenumber"=>$phonenumber,"_email"=>$email,
            "_description"=>$description,"_distributorid"=>$id]);
	}
	//addPost
	public function modelAddPost(){
        $name = $_POST["name"];
        $address = $_POST["address"];
        $phonenumber = $_POST["phonenumber"];
        $description = $_POST["description"];       
        $email = $_POST["email"];

		DB::execute("insert into distributors set name=:_name, 
        address=:_address, email=:_email, phonenumber=:_phonenumber,description=:_description",
        ["_name"=>$name,"_address"=>$address,"_phonenumber"=>$phonenumber,"_email"=>$email,"_description"=>$description]);
	}
	//deletePost
	public function modelDeletePost($id){	
		//-----------	
		//delete record
		DB::execute("delete from distributors where distributorid=:_id",["_id"=>$id]);
	}
	}
 ?>