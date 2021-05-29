<?php 
    $layout = "Layout_Trangtrong.php";
 ?>

 <div class="special-collection">
        <div class="tabs-container">
            <div class="row" style="margin-top:10px;">
                <div class="head-tabs head-tab1 col-lg-3">
                    <h2>
                        <?php 
                            $catid = isset($_GET["catid"])?$_GET["catid"]:0;
                            //lay mot ban ghi
                            $category = DB::fetch("select name from categories where categoryid = $catid");
                            echo isset($category)?$category->name:"";
                         ?>
                    </h2>
                </div>
                <div class="col-lg-3 text-right">
                    <select class="form-control" onchange="location.href = 'index.php?controller=products&catid=<?php echo $catid; ?>&orderBy='+this.value;">
                        <option value="0">Sắp xếp theo thứ tự</option>
                        <option value="priceAsc">Giá tăng dần</option>
                        <option value="priceDesc">Giá giảm dần</option>
                        <option value="nameAsc">Sắp xếp A-Z</option>
                        <option value="nameDesc">Sắp xếp Z-A</option>
                    </select>
                </div>
                <div class="col-lg-2">
                    <select class="form-control" onchange="location.href = 'index.php?controller=products&catid=<?php echo $catid; ?>&recordPerPage='+this.value;">
                        <option value="0">Số bản ghi</option>
                        <option value="2">2</option>
                        <option value="4">4</option>
                        <option value="6">6</option>
                    </select>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <div class="tabs-content row">
            <div id="content-tabb1" class="content-tab content-tab-proindex" style="display:none">
                <div class="clearfix">
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
                    
                    <!-- paging -->
                    <div style="clear: both;"></div>
                    <div class="&#x70;&#x61;&#x67;&#x69;&#x6E;&#x61;&#x74;&#x69;&#x6F;&#x6E;&#x2D;&#x63;&#x6F;&#x6E;&#x74;&#x61;&#x69;&#x6E;&#x65;&#x72;">
                        <ul class="pagination">
                            <li class="page-item"><span>Trang</span></li>
                            <?php for($i = 1; $i <= $numPage; $i++): ?>
                            <li class="page-item"><a href="index.php?controller=products&catid=<?php echo $catid ?>&p=<?php echo $i; ?>" class="page-link"><?php echo $i; ?></li>
                            <?php endfor; ?>
                        </ul></div>
                    <!-- end paging -->
                </div>
            </div>
        </div>
    </div>