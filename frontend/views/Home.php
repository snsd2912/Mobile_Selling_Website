<?php 
	$layout = "Layout_Trangchu.php";
 ?>
 <div class="special-collection">
    <div class="tabs-container">
        <div class="row" style="margin-top:10px;">
            <div class="col-lg-10">
                <h2>Sản phẩm nổi bật</h2>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="tabs-content row">
        <div id="content-tabb1" class="content-tab content-tab-proindex" style="display:none">
            <div class="clearfix">
                <?php 
                    //san pham noi bat
                    $data = DB::fetchAll("select * from products where hot=1 order by productid desc limit 0,6");
                 ?>
                 <?php foreach($data as $rows): ?>
                <!-- box product -->
                <div class="col-xs-6 col-md-2 col-sm-6 ">
                    <div class="product-grid" id="product-1168979">
                        <div class="image"> <a href="index.php?controller=products&action=detail&id=<?php echo $rows->productid; ?>"><img src="assets/upload/products/<?php echo $rows->photo; ?>" title="<?php echo $rows->name; ?>" alt="<?php echo $rows->name; ?>" class="img-responsive"></a> </div>
                        <div class="info">
                            <h3 class="name"><a href="index.php?controller=products&action=detail&id=<?php echo $rows->productid; ?>"><?php echo $rows->name; ?></a></h3>
                                <p class="price-box">
                                    <span class="special-price">
                                        <span class="price product-price" style="text-decoration:line-through;"> <?php echo number_format($rows->price); ?> </span>
                                    </span>
                                </p>
                                <p class="price-box">
                                    <span class="special-price">
                                        <span class="price product-price"> 
    <?php 
        //neu co giam gia (truong discount > 0) thi tinh lai gia
        if($rows->discount > 0){
            $newPrice = ($rows->price*$rows->discount)/100;
            echo number_format($rows->price - $newPrice);
        }else{
            //discount = 0
            echo $rows->price;
        }
     ?>
                                        </span>
                                    </span>
                                </p>
                            <div class="action-btn">
                                    <a <?php if(!isset($_SESSION['username'])){ ?> 
                                                href="index.php?controller=login" 
                                            <?php }else{ ?> 
                                                href="index.php?controller=cart&action=add&id=<?php echo $rows->productid; ?>" 
                                            <?php } ?> class="button">
                                        Cho vào giỏ hàng
                                    </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end box product -->
                <?php endforeach; ?>

            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-md-12">
        <img src="assets/images/adv1.jpg" class="img-thumbnail">
    </div>
</div>




 <div class="special-collection">
    <div class="tabs-container">
        <div class="row" style="margin-top:10px;">
            <div class="col-lg-10">
                <h2>Sản phẩm mới</h2>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="tabs-content row">
        <div id="content-tabb1" class="content-tab content-tab-proindex">
            <div class="clearfix">
                <?php 
                    //san pham noi bat
                    $data = DB::fetchAll("select * from products order by productid desc limit 0,6");
                 ?>
                 <?php foreach($data as $rows): ?>
                <!-- box product -->
                <div class="col-xs-6 col-md-2 col-sm-6 ">
                    <div class="product-grid" id="product-1168979">
                        <div class="image"> <a href="index.php?controller=products&action=detail&id=<?php echo $rows->productid; ?>"><img src="assets/upload/products/<?php echo $rows->photo; ?>" title="<?php echo $rows->name; ?>" alt="<?php echo $rows->name; ?>" class="img-responsive"></a> </div>
                        <div class="info">
                            <h3 class="name"><a href="index.php?controller=products&action=detail&id=<?php echo $rows->productid; ?>"><?php echo $rows->name; ?></a></h3>
                                <p class="price-box">
                                    <span class="special-price">
                                        <span class="price product-price" style="text-decoration:line-through;"> <?php echo number_format($rows->price); ?> </span>
                                    </span>
                                </p>
                                <p class="price-box">
                                    <span class="special-price">
                                        <span class="price product-price"> <?php echo number_format($rows->price); ?> </span>
                                    </span>
                                </p>
                            <div class="action-btn">
                                    <a class="button" <?php if(!isset($_SESSION['username'])){ ?> data-toggle="modal" data-target="#loginModal" href="#loginModal" <?php }else{ ?> href="index.php?controller=cart&action=add&id=<?php echo $rows->productid; ?>" <?php } ?> >Cho vào giỏ hàng</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end box product -->
                <?php endforeach; ?>

            </div>
        </div>
    </div>
</div>






