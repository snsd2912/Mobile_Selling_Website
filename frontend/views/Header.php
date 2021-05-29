<header id="header" >
    <div class="top-header" style="background-color: #2d3436 !important;">
            <div class="container" style="background-color: #2d3436 !important;">
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-6"> <span><i class="fa fa-phone"></i> (03) 7782 4869</span> <span><i class="fa fa-envelope-o"></i> <a href="lesang407407@mail.com">support@mail.com</a></span> </div>
                    <div class="col-xs-12 col-sm-6 col-md-6 customer">
                        <?php if(isset($_SESSION['username']) && isset($_SESSION['customerid']) && $_SESSION['username']!=null){ 
                            $check = DB::fetch("select * from customers where username=:_username", ["_username"=>$_SESSION['username']]); ?>
                            <a href="#infoModal" data-toggle="modal" data-target="#infoModal"><?php echo $_SESSION['username']?></a>&nbsp; &nbsp;<a href="index.php?controller=login&action=logout">Đăng xuất</a>
                            <div id="infoModal" class="modal fade" aria-hidden="true" style="display: none;color : black">
                                <div class="modal-dialog modal-login">
                                    <div class="modal-content">
                                        <form method="post" action="index.php?controller=login&action=changeInfo">
                                            <div class="modal-header" style="border-bottom: none !important;">
                                                <h4 class="modal-title" style="float: left">Thông tin người dùng</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <div class="clearfix">
                                                        <label style="float: left">Username</label>
                                                        <input type="text" class="form-control" value="<?php echo $check->username;?>" disabled>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label style="float: left">Email</label>
                                                    <input class="form-control" value="<?php echo $check->email;?>" required="required" disabled>
                                                </div>
                                                <div class="form-group">
                                                    <div class="clearfix">
                                                        <label style="float: left">Full name</label>
                                                        <input type="text" name="name" class="form-control" value="<?php echo $check->name;?>" required="required">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="clearfix">
                                                        <label style="float: left">Address</label>
                                                        <input type="text" name="address" class="form-control" value="<?php echo $check->address;?>" required="required">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="clearfix">
                                                        <label style="float: left">Phone number</label>
                                                        <input type="text" name="phonenumber" class="form-control" pattern="0{1}[0-9]{9}" value="<?php echo $check->phonenumber;?>" required="required">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer justify-content-between">
                                                <input type="submit" class="btn btn-primary" value="Save change">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        <?php }else{ ?>
                            <a href="index.php?controller=login">Đăng nhập</a>
                        <?php } ?>
                    </div>
                </div>
            </div>
    </div>

    <?php if(!isset($_SESSION["page"])) { ?>
    <!-- middle header -->
    <div class="mid-header">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-3 logo "> <a href="index.php"> <img src="assets/100/047/633/themes/517833/assets/logo221b.png?1481775169361" alt="DKT Store" title="DKT Store" class="img-responsive"> </a> </div>
                <div class="col-xs-12 col-sm-12 col-md-6 header-search">
                    <script type="text/javascript">
                        function search() {
                            key = document.getElementById("key").value.trim();
                            if(key.length>0){ location.href = "index.php?controller=search&key=" + key; }
                            return false;
                        }
                        function searchForm(event) {
                            //neu keypress la enter
                            if (event.keyCode == 13) {
                                key = document.getElementById("key").value.trim();
                                if(key.length>0){ location.href = "index.php?controller=search&key=" + key; }
                            }
                            return false;
                        }
                    </script>
                    <!--<form method="post" id="frm" action="">-->
                    <div style="margin-top:25px;">
                        <input type="text" onkeypress="searchForm(event);" value="" placeholder="Nhập từ khóa tìm kiếm..." id="key" class="input-control">
                        <button style="margin-top:5px;" type="submit"> <i class="fa fa-search" onclick="return search();"></i> </button>
                    </div>
                    <!--</form>-->
                </div>
                <div class="col-xs-12 col-sm-12 col-md-3 mini-cart">
                    <div class="wrapper-mini-cart">
                        <?php if(isset($_SESSION["customerid"])){ ?>
                        <span class="icon"><i class="fa fa-shopping-cart"></i></span> <a href="cart"> <span class="mini-cart-count"> 
                        <?php 
                            //dem xem co bao nhieu san pham trong gio hang
                            // include "models/CartModel.php";
                                // $obj = new CartModel();
                            
                                $number = DB::rowCount("select * from cart where customerid=:_cid",["_cid"=>$_SESSION["customerid"]]);
                                echo $number;
                         ?>
                        </span> sản phẩm <i class="fa fa-caret-down"></i></a>
                        <div class="content-mini-cart">
                            <div class="has-items">
                                <ul class="list-unstyled">
                                    <?php if($number > 0): ?>
                                        <?php 
                                            $cart = DB::fetchAll("select * from cart where customerid=:_cid",["_cid"=>$_SESSION["customerid"]]);
                                            foreach($cart as $product): ?>
                                            <li class="clearfix" id="item-1853038">
                                                <div class="info">
                                                    <h3><a href="index.php?controller=cart"><?php echo $product->name; ?></a></h3>
                                                    <p><?php echo $product->qty; ?> x <?php echo number_format($product->price); ?> VND</p>
                                                </div>
                                                <div> <a href="index.php?controller=cart&action=delete&id=<?php echo $product->productid; ?>"> <i class="fa fa-times"></i></a> </div>
                                            </li>
                                        <?php endforeach; ?>
                                    <?php endif; ?>        
                                </ul>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- end middle header -->
        <!-- bottom header -->
        <div class="bottom-header" style="background-color: #2d3436 !important;">
            <div class="container">
                <div class="clearfix">
                    <ul class="main-nav hidden-xs hidden-sm list-unstyled">
                        <li class="active"><a href="index.php">Trang chủ</a></li>
                        <li class="has-submenu">
                            <a href="/collections/all">
                            <span>Sản phẩm</span><i class="fa fa-caret-down" style="margin-left: 5px;"></i>
                            </a>
                            <?php 
                                include "controllers/CategoriesController.php";
                                $obj = new CategoriesController();
                                $obj->index();
                                 ?>
                        </li>
                        <?php if(isset($_SESSION['username']) && isset($_SESSION['customerid']) && $_SESSION['username']!=null){ ?>
                            <li><a href="index.php?controller=cart">Giỏ hàng</a></li>
                        <?php } ?>
                        <?php if(isset($_SESSION['username']) && isset($_SESSION['customerid']) && $_SESSION['username']!=null){ ?>
                            <li><a href="index.php?controller=order">Đơn hàng</a></li>
                        <?php } ?>
                        <li><a href="#">Tin tức</a></li>
                        <li><a href="#">Liên hệ</a></li>
                    </ul>
                    <a href="javascript:void(0);" class="toggle-main-menu hidden-md hidden-lg"> <i class="fa fa-bars"></i> </a>
                    <ul class="list-unstyled mobile-main-menu hidden-md hidden-lg" style="display:none">
                        <li class="active"><a href="index.php">Trang chủ</a></li>
                        <li><a href="#">Giới thiệu</a></li>
                        <li><a href="index.php?controller=tintuc">Tin tức</a></li>
                        <li><a href="index.php?controller=lienhe">Liên hệ</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- end bottom header -->

    <?php } else {
            unset($_SESSION["page"]);
        }   
    ?>

</header>