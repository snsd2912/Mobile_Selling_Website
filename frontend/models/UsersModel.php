<?php

trait UsersModel
{
    public function modelEditPost()
    {
        $id = $_SESSION["customerid"];
        $phonenumber = $_POST["phonenumber"];
        $address = $_POST["address"];
        $name = $_POST["name"];
        DB::execute("update customers set name=:_name, phonenumber=:_phonenumber, address=:_address where customerid=:_id",
        ["_address"=>$address,"_name"=>$name,"_phonenumber"=>$phonenumber,"_id"=>$id]);
    }

    public function getById($id){
        //lay mot ban ghi
        $record = DB::fetch("select * from users where userid=:record_id",["record_id"=>$id]);
        return $record;
    }

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
}

?>