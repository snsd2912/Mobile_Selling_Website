<?php 
	trait UsersModel{
		//lay nhieu ban ghi
		//lay nhieu ban ghi
	public function modelRead($from, $recordPerPage){
		//goi ham de lay ket qua
		$data = DB::fetchAll("select * from users where active=1 order by userid limit $from,$recordPerPage");
		return $data;
	}
	//dem so luong ban ghi trong table users
	public function modelTotalRecord(){
		$total = DB::rowCount("select userid from users where active = 1");
		return $total;
	}
        //dem so luong ban ghi trong table users
	public function modelTotalRecordSearch($key){
		$total = DB::rowCount("select userid from users where active = 1 and name LIKE '%$key%'");
		return $total;
	}
        //tim kiem ban ghi
	public function modelSearch($key, $from, $recordPerPage){
		$data = DB::fetchAll("select * from users where active = 1 and username LIKE '%$key%' order by userid limit $from,$recordPerPage");
		return $data;
	}
	//thay doi mat khau
    public function modelChangePassword($id){
        try{
            $password = md5($_POST["password"]);
            //goi ham de lay ket qua
            DB::execute("update users set password=:_password where userid=:_id",["_password"=>$password,"_id"=>$id]);
            return 1;
        } catch(PDOException $e) {
            return 0;
        } 
	}
	//thay doi  mat khau
    public function modelChangeOwnPassword($id){
        try{
			$oldpassword = md5($_POST["oldpassword"]);
            $password = md5($_POST["password"]);
			$record = DB::rowCount("select * from users where userid=:record_id and password=:_password",
			["record_id"=>$id,"_password"=>$oldpassword]);

			if($record==1){
				//goi ham de lay ket qua
				DB::execute("update users set password=:_password where userid=:_id",["_password"=>$password,"_id"=>$id]);		
				return 1;
			}else{
				return 0;
			}
        } catch(PDOException $e) {
            return 0;
        } 
	}
	//edit
	public function modelEdit($id){		
		//lay mot ban ghi
		$record = DB::fetch("select * from users where userid=:record_id",["record_id"=>$id]);
		return $record;
	}
	//editPost
	public function modelOwnEditPost($id){
		$address = $_POST["address"];
		$email = $_POST["email"];
		$phonenumber = $_POST["phonenumber"];
		$photo = "";
		//update ban ghi
		DB::execute("update users set address=:_address,email=:_email,phonenumber=:_phonenumber where userid=:_userid",
			["_address"=>$address,"_email"=>$email,"_phonenumber"=>$phonenumber,"_userid"=>$id]);
		//neu user chon anh thi thuc hien upload
		if($_FILES["photo"]["name"] != ""){
			//-----------
			//lay anh cu (neu co) de xoa
			$oldImg = DB::fetch("select photo from users where userid=$id");
			if(strcmp($oldImg->photo,"")!=0&&file_exists("assets/layout1/images/".$oldImg->photo)){
				//xoa anh
				unlink("assets/layout1/images/".$oldImg->photo);//ham unlink su dung de xoa file
			}
			//-----------
			//lay ten file
			$photo = $_FILES["photo"]["name"];
			//gan them chuoi thoi gian de cac anh khong trung ten nhau luc upload
			$photo = time().$photo;
			//upload anh
			move_uploaded_file($_FILES["photo"]["tmp_name"], "assets/layout1/images/$photo");
			//update ban ghi
			DB::execute("update users set photo=:_photo where userid=:_id",["_photo"=>$photo,"_id"=>$id]);
		}
	}
	//editPost
	public function modelEditPost($id){
			$username = $_POST["username"];
            $name = $_POST["name"];
            $dob = $_POST["dob"];
            $address = $_POST["address"];
            $email = $_POST["email"];
            $phonenumber = $_POST["phonenumber"];
            $gender = $_POST["gender"];
			$roleid = $_POST["roleid"];
			$branchid = $_POST["branchid"];
			$photo = "";
		//update ban ghi
		DB::execute("update users set username=:_username, name=:_name, dob=:_dob, 
            address=:_address,email=:_email,phonenumber=:_phonenumber,gender=:_gender,roleid=:_roleid,branchid=:_branchid where userid=:_userid",
            ["_username"=>$username,"_name"=>$name,"_dob"=>$dob,"_address"=>$address,"_email"=>$email,"_phonenumber"=>$phonenumber,
            "_gender"=>$gender,"_roleid"=>$roleid,"_branchid"=>$branchid,"_userid"=>$id]);
		//neu user chon anh thi thuc hien upload
		if($_FILES["photo"]["name"] != ""){
			//-----------
			//lay anh cu (neu co) de xoa
			$oldImg = DB::fetch("select photo from users where userid=$id");
			if(strcmp($oldImg->photo,"")!=0&&file_exists("assets/layout1/images/".$oldImg->photo)){
				//xoa anh
				unlink("assets/layout1/images/".$oldImg->photo);//ham unlink su dung de xoa file
			}
			//-----------
			//lay ten file
			$photo = $_FILES["photo"]["name"];
			//gan them chuoi thoi gian de cac anh khong trung ten nhau luc upload
			$photo = time().$photo;
			//upload anh
			move_uploaded_file($_FILES["photo"]["tmp_name"], "assets/layout1/images/$photo");
			//update ban ghi
			DB::execute("update users set photo=:_photo where userid=:_id",["_photo"=>$photo,"_id"=>$id]);
		}
	}
	//addPost
	public function modelAddPost(){
			$username = $_POST["username"];
            $password = md5($_POST["password"]);
            $name = $_POST["name"];
            $dob = $_POST["dob"];
            $address = $_POST["address"];
            $email = $_POST["email"];
            $phonenumber = $_POST["phonenumber"];
            $gender = $_POST["gender"];
			$roleid = $_POST["roleid"];
			$branchid = $_POST["branchid"];
		
			$photo = "";
			//neu user chon anh thi thuc hien upload
			if($_FILES["photo"]["name"] != ""){
				//lay ten file
				$photo = $_FILES["photo"]["name"];
				//gan them chuoi thoi gian de cac anh khong trung ten nhau luc upload
				$photo = time().$photo;
				//upload anh
				move_uploaded_file($_FILES["photo"]["tmp_name"], "assets/layout1/images/$photo");
			}

		DB::execute("insert into users set username=:_username, password=:_password, name=:_name, dob=:_dob, 
            address=:_address,email=:_email,phonenumber=:_phonenumber,gender=:_gender, photo=:_photo, roleid=:_roleid, branchid=:_branchid",
            ["_username"=>$username,"_password"=>$password,"_name"=>$name,"_dob"=>$dob,"_address"=>$address,"_email"=>$email,"_phonenumber"=>$phonenumber,
            "_gender"=>$gender,"_photo"=>$photo,"_roleid"=>$roleid,"_branchid"=>$branchid]);
	}
	//deletePost
	public function modelDeletePost($id){	
		//-----------	
		//delete record
		DB::execute("update users set active=0 where userid=:_id",["_id"=>$id]);
		if(isset($oldImg->photo)&&file_exists("assets/layout1/images/".$oldImg->photo)){
			//xoa anh
			unlink("assets/layout1/images/".$oldImg->photo);//ham unlink su dung de xoa file
		}
	}
}
 ?>