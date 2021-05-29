<?php 
	$layout = "Layout_Trangtrong.php";
 ?>
 <div class="template-cart">
          <form action="index.php?controller=Cart&action=checkout" method="post">
            <div class="table-responsive">
              <table class="table table-cart">
                <thead>
                  <tr>
                    <th></th>
                    <th class="image">Ảnh sản phẩm</th>
                    <th class="name">Tên sản phẩm</th>
                    <th class="price">Giá bán lẻ</th>
                    <th class="price">Discount</th>
                    <th class="quantity">Số lượng</th>
                    <th class="price">Thành tiền</th>
                    <th>Xóa</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($cart as $product): 
                          $p = DB::fetch("select * from products where productid=$product->productid");
                  ?>
                    <tr>
                      <td><input type="checkbox" name="color[]" id="color" value="<?php echo $product->productid;?>"></td>
                      <td><img src="assets/upload/products/<?php echo $p->photo; ?>" class="img-responsive" /></td>
                      <td><a href="index.php?controller=products&action=detail&id=<?php echo $p->productid; ?>"><?php echo $p->name; ?></a></td>
                      <td> <?php echo number_format($p->price); ?> </td>
                      <td><p><b><?php echo number_format($p->discount); ?> %</b></p></td>
                      <td> <?php echo $product->qty; ?> </td>
                      <td><p><b><?php echo number_format($product->qty*($p->price-$p->price*$p->discount/100)); ?></b></p></td>
                      <td><a href="index.php?controller=Cart&action=delete&id=<?php echo $p->productid; ?>" data-id="2479395"><i class="fa fa-trash"></i></a></td>
                    </tr>
                  <?php endforeach; ?>  
                </tbody>
                <tfoot>
                <?php $total = $this->cartTotal();
                      if($total > 0): ?>
                  <tr>
                    <td colspan="6">
                    <!-- <a href="index.php?controller=Cart&action=destroy" class="button pull-left">Xóa toàn bộ</a>  -->
                    <!-- <a href="index.php" class="button pull-right black">Tiếp tục mua hàng</a> -->
                      <!-- <input type="submit" class="button pull-right" value="Cập nhật"></td> -->
                  </tr>
                 <?php endif; ?>
                </tfoot>
              </table>
            </div>
            <?php if($total > 0): ?>
              <div class="total-cart"> Tổng tiền thanh toán: 
                <?php echo number_format($total); ?> <br>
                <input type="submit" class="button black" value="Đặt hàng"> 
              </div>
            <?php endif; ?>
          </form>
          
        </div>