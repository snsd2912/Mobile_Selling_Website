<?php

trait LoginModel
{
    //ham kiem tra dang nhap
    public function modelCheckLogin()
    {
        if(isset($_SESSION["message"])){
            unset($_SESSION["message"]);
        } 
        $email = $_POST["email"];
        $password = $_POST["password"];
        //ma hoa password bang ham md5
        $password = md5($password);
        //truy van csdl
        $check = DB::fetch("select * from customers where email=:_email and password=:_password", ["_email" => $email, "_password" => $password]);
        if ($check->email == $email && $check->password == $password) {
            //dang nhap thanh cong
            //set session
            $_SESSION["username"]= $check->username;
            $_SESSION["customerid"] = $check->customerid;
            if(isset($_SESSION["error"])){
                unset($_SESSION["error"]);
            } 
            header("location:index.php");
        }else{
            $_SESSION["error"] = 1;
            header("location:index.php?controller=login");
        }
    }

    public function modelRegister()
    {   
        if(isset($_SESSION["message"])){
            unset($_SESSION["message"]);
        } 
        $name = $_POST["name"];
        $username = $_POST["username"];
        $password = md5($_POST["password"]);
        $address = $_POST["address"];
        $phonenumber = $_POST["phonenumber"];
        $email = $_POST["email"];
        $rowCount = DB::rowCount("select * from customers where email=:_email or username=:_username",["_email"=>$email,"_username"=>$username]);
        if($rowCount == 0){
            DB::execute("insert into customers set name=:_name, username=:_username, password=:_password,email=:_email,phonenumber=:_phonenumber,address=:_address",
            ["_username"=>$username, "_address"=>$address,"_password"=>$password,"_name"=>$name,"_phonenumber"=>$phonenumber,"_email"=>$email]);
            $_SESSION["message"] = 1;
        } else {
            $_SESSION["message"] = 0;
        }
        header("location:index.php?controller=login");
    }

    // public function register()
    // {
    //     $password = md5($_POST["password"]);
    //     $name = $_POST["name"];
    //     $email = $_POST["email"];
    //     DB::execute("insert into users set name=:_name, password=:_password,email=:_email",
    //         ["_email"=>$email,"_password"=>$password,"_name"=>$name]);

    // }
}

?>