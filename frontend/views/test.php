<?php if(isset($_SESSION["message"])){
        if($_SESSION["message"]==1) { 
            echo "<script type='text/javascript'>alert('Sucess');</script>";
        } else {
            echo "<script type='text/javascript'>alert('Your username or email have been taken');</script>";
        }
    } 
?> 

// $rowCount = DB::rowCount("select * from cart where productid=:_id and customerid=:_cid",
			// ["_id"=>$id,"_cid"=>$_SESSION["customerid"]]);
			// if($rowCount>0){
			// 	$number = DB::fetch("select * from products where productid=$id");
			// 	$number++;
			// 	DB::execute("update cart set qty=:_qty where productid=:_id and customerid=:_cid",
			// 	["_qty"=>$number,"_id"=>$id,"_cid"=>$_SESSION["customerid"]]);
			// } else {
			// 	$product = DB::fetch("select * from products where productid=$id");
			// 	DB::execute("insert into cart set productid=:_id, customerid=:_cid, qty=:_qty, name=:_name, price=:_price, discount=:_discount",
			// 	["_qty"=>1,"_id"=>$id,"_cid"=>$_SESSION["customerid"],"_name"=>$product->name,"_price"=>$product->price,"_discount"=>$product->discount]);
			// }