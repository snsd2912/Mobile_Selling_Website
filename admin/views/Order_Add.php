<?php 
	$layout = "layout.php";
 ?>
 <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <h4><a href="index.php?controller=order" style="color: #b2bec3 !important;">
        <i class="fas fa-chevron-left" style="color: #b2bec3 !important;"></i>   Back
        </a></h4>
      </div>
    </div>
</section>
 <div class="row" style="margin-top: 30px;">
 	<div class="col-md-12">
 		<div class="panel panel-primary">
 			<div class="panel-heading">Add Order</div>
 			<div class="panel-body">
 				<form method="post" action="index.php?controller=order&action=doAdd">
				 	
				 	<div class="panel-body">
					 	<div style="text-transform:uppercase;font-weight:700;font-size:15px;margin-bottom: 20px;">ĐỊA CHỈ NHẬN HÀNG</div>
						<div class="row" style="margin-bottom: 5px;">
							<div class="col-md-2">Name</div>
							<div class="col-md-10">
								<input type="text" required name="name" class="form-control" value="<?php echo "";?>">
							</div>
						</div>
						<div class="row" style="margin-bottom: 5px;">
							<div class="col-md-2">Address</div>
							<div class="col-md-10">
								<input type="text" required name="address" class="form-control" value="<?php echo "";?>">
							</div>
						</div>
						<div class="row" style="margin-bottom: 5px;">
							<div class="col-md-2">Phone number</div>
							<div class="col-md-10">
								<input type="text" required name="phone" class="form-control" value="<?php echo "";?>">
							</div>
						</div>
					</div>
			
					<div class="panel-body">
						<div style="text-transform:uppercase;font-weight:700;font-size:15px;">DANH SÁCH SẢN PHẨM </div>
						<table class="table table-cart" style="margin-top: 20px!important;">
							<thead>
							<tr>
								<th>#</th>
								<th class="image">Ảnh sản phẩm</th>
								<th class="name">Tên sản phẩm</th>
								<th class="price">Giá bán lẻ</th>
								<th class="price">Discount</th>
								<th class="quantity">Số lượng</th>
								<th class="price">Thành tiền</th>
							</tr>
							</thead>
							<tbody>
								<?php 
									$number = 1;
									$total = 0;
									foreach($cart as $product): 
										$p = DB::fetch("select * from products where productid=$product->productid");
										$total += $product->qty*($p->price-$p->price*$p->discount/100);
								?>
								<tr>
									<td><input type="text" name="product[]" value="<?php echo $product->productid;?>" hidden> <?php echo $number;?></td>
									<td><img src="assets/upload/products/<?php echo $p->photo; ?>" class="img-responsive" /></td>
									<td><?php echo $p->name; ?></td>
									<td> <?php echo number_format($p->price); ?> </td>
									<td><p><b><?php echo number_format($p->discount); ?> %</b></p></td>
									<td> <?php echo $product->qty; ?> </td>
									<td><p><b><?php echo number_format($product->qty*($p->price-$p->price*$p->discount/100)); ?></b></p></td>
									
								</tr>
								<?php 
									$number++;
									endforeach; ?>  
							</tbody>
						</table>

						<div class="panel-body">
							<div style="text-transform:uppercase;font-weight:700;font-size:15px;margin-bottom: 20px;">GHI CHÚ</div>
							<textarea id="note" name="note" rows="5" style="width: 100%;"></textarea> <br> <br>
						</div>

						<?php 
							// $total = $this->cartTotal();
							if($total > 0): ?>
							<div style="text-align:right;text-transform:uppercase;font-weight:700;font-size:20px;"> Tổng tiền thanh toán: 
								<?php echo number_format($total); ?>
								<input type="text" name="total" value="<?php echo $total;?>" hidden>
								<br>
								<!-- <input type="submit" class="button black" value="Thanh toán">  -->
							</div>
						<?php endif; ?>
					</div>

					

					<div class="row" style="margin-bottom: 5px; float: right;">
						<div class="col-md-2"></div>
						<div class="col-md-10"><input type="submit" class="btn btn-primary" value="Lưu"></div>
					</div>
 				</form>
 		</div>
 	</div>
 </div>