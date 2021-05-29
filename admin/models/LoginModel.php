<?php 
	trait LoginModel{
		//ham kiem tra dang nhap
		public function modelCheckLogin(){
			$username = $_POST["username"];
			$password = $_POST["password"];
			//ma hoa password bang ham md5
			$password = md5($password);
			//truy van csdl
			$check = DB::fetch("select * from users where username=:_username and password=:_password",["_username"=>$username,"_password"=>$password]);
			if($check->username == $username && $check->password==$password){
				//dang nhap thanh cong
				//set session
				$_SESSION["userid"]= $check->userid;
				$_SESSION["emname"]= $username;
				$_SESSION["role"]= $check->roleid;
				$_SESSION["photo"]= 'assets/layout1/images/'.$check->photo;
			}
			//quay tro lai trang index
			header("location:index.php");
		}
	}
 ?>