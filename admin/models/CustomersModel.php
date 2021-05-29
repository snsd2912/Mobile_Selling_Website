<?php 
	trait CustomersModel{
		//lay nhieu ban ghi
		//lay nhieu ban ghi
	public function modelRead($from, $recordPerPage){
		//goi ham de lay ket qua
		$data = DB::fetchAll("select * from customers order by customerid limit $from,$recordPerPage");
		return $data;
	}
	//dem so luong ban ghi trong table customers
	public function modelTotalRecord(){
		$total = DB::rowCount("select customerid from customers");
		return $total;
	}
        //dem so luong ban ghi trong table customers
	public function modelTotalRecordSearch($key){
		$total = DB::rowCount("select customerid from customers where name LIKE '%$key%'");
		return $total;
	}
        //tim kiem ban ghi
	public function modelSearch($key, $from, $recordPerPage){
		$data = DB::fetchAll("select * from customers where username LIKE '%$key%' order by customerid limit $from,$recordPerPage");
		return $data;
	}
    //thay doi mat khau
    public function modelChangePassword($id){
        try{
            $password = md5($_POST["password"]);
            //goi ham de lay ket qua
            DB::execute("update customers set password=:_password where customerid=:_id",["_password"=>$password,"_id"=>$id]);
            return 1;
        } catch(PDOException $e) {
            return 0;
        } 
	}
	//edit
	public function modelEdit($id){		
		//lay mot ban ghi
		$record = DB::fetch("select * from customers where customerid=:record_id",["record_id"=>$id]);
		return $record;
	}
	//editPost
	public function modelEditPost($id){
			$username = $_POST["username"];
            $name = $_POST["name"];
            $address = $_POST["address"];
            $email = $_POST["email"];
            $phonenumber = $_POST["phonenumber"];
		//update ban ghi
		DB::execute("update customers set username=:_username, name=:_name, 
            address=:_address,email=:_email,phonenumber=:_phonenumber where customerid=:_customerid",
            ["_username"=>$username,"_name"=>$name,"_address"=>$address,"_email"=>$email,"_phonenumber"=>$phonenumber,
            "_customerid"=>$id]);
		
	}
	//addPost
	public function modelAddPost(){
			$username = $_POST["username"];
            $password = md5($_POST["password"]);
            $name = $_POST["name"];
            $address = $_POST["address"];
            $email = $_POST["email"];
            $phonenumber = $_POST["phonenumber"];

		DB::execute("insert into customers set username=:_username, password=:_password, name=:_name, 
            address=:_address,email=:_email,phonenumber=:_phonenumber",
            ["_username"=>$username,"_password"=>$password,"_name"=>$name,"_address"=>$address,"_email"=>$email,"_phonenumber"=>$phonenumber]);
	}
	//deletePost
	public function modelDeletePost($id){	
		//-----------	
		//delete record
		DB::execute("delete from customers where customerid=:_id",["_id"=>$id]);
	}
	}
 ?>