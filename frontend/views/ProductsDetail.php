<?php 
	$layout = "Layout_Trangchu.php";
 ?>
 <div class="product-detail" itemscope itemtype="http://schema.org/Product">
            <div class="top">
                <div class="row">
                    <div class="col-xs-12 col-md-6 product-image">
                        <div class="featured-image">
                            <img src="assets/upload/products/<?php echo $record->photo; ?>" class="img-responsive" id="large-image" itemprop="image" data-zoom-image="assets/upload/Products/<?php echo $record->photo; ?>" alt="<?php echo $record->name; ?>" />
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-6 info">
                        <h1 itemprop="name"><?php echo $record->name; ?></h1>
                        <p class="sku">Tên sản phẩm:&nbsp; <span><?php echo $record->name; ?></span></p>
                        <p itemprop="price" class="price-box product-price-box"> <span class="special-price"> <span class="price product-price" style="text-decoration:line-through;"> <?php echo number_format($record->price); ?>₫ </span> </span> </p>
                        <p itemprop="price" class="price-box product-price-box"> <span class="special-price"> <span class="price product-price"> 
                        	<?php 
						        //neu co giam gia (truong discount > 0) thi tinh lai gia
						        if($record->discount > 0){
						            $newPrice = ($record->price*$record->discount)/100;
						            echo number_format($record->price - $newPrice);
						        }else{
						            //discount = 0
						            echo $record->price;
						        }
						     ?>
                        </span>VND</span> </p>
                    </p>

                    <a <?php if(!isset($_SESSION['username'])){ ?> 
                                                href="index.php?controller=login" 
                                            <?php }else{ ?> 
                                                href="index.php?controller=cart&action=add&id=<?php echo $record->productid; ?>" 
                                            <?php } ?> class="button">
                                        Cho vào giỏ hàng
                    </a>
                </div>
            </div>
        </div>
        <div class="middle">
            <ul class="list-unstyled navtabs">
                <li><a href="#tab1" class="head-tabs head-tab1 active" data-src=".head-tab1">Chi tiết sản phẩm</a></li>
            </ul>
            <div class="tab-container">
                <!-- chi tiet -->
                <?php echo $record->description; ?>

                <!-- chi tiet -->
                <!-- <div class="fb-comments" data-href="https://developers.facebook.com/docs/plugins/comments#configurator" data-width="" data-numposts="5"></div> -->
            </div>
        </div>
    </div>