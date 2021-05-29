<?php 
	$layout = "Layout_Trangtrong.php";
 ?>      
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <h4><a href="index.php?controller=order" style="color: #b2bec3 !important;">
        <i style="color: #b2bec3 !important;"></i>   Back
        </a></h4>
      </div>
    </div>
</section>             
<div class="col-md-12">
    <div style="margin-bottom:5px;">
        <?php if($order->ship == 2): ?>
            <a class="btn btn-danger">Đã nhận hàng</a>
        <?php elseif($order->ship == 0): ?>
            <a class="btn btn-danger">Chưa giao hàng</a>
        <?php else: ?>
            <a href="index.php?controller=Order&action=take&id=<?php echo $order->orderid; ?>" class="btn btn-primary">Xác nhận đã nhận hàng</a>
        <?php endif; ?>
    </div>
    <div class="panel panel-primary">
        <div class="panel-heading">Chi tiết đơn hàng</div>
        <div class="panel-body">
			<div style="text-transform:uppercase;font-weight:700;font-size:15px;margin-bottom: 20px;">ĐỊA CHỈ NHẬN HÀNG</div>
			<div class="row" style="margin-bottom: 5px;">
				<div class="col-md-2">Name</div>
				<div class="col-md-10">
					<?php echo $order->name;?>
				</div>
			</div>
			<div class="row" style="margin-bottom: 5px;">
				<div class="col-md-2">Address</div>
				<div class="col-md-10">
					<?php echo $order->address;?>
				</div>
			</div>
			<div class="row" style="margin-bottom: 5px;">
				<div class="col-md-2">Phone number</div>
				<div class="col-md-10">
					<?php echo $order->phonenumber;?>
				</div>
			</div>
		</div>
        <div class="panel-body">
            <div style="text-transform:uppercase;font-weight:700;font-size:15px;margin-bottom: 20px;">DANH SÁCH SẢN PHẨM</div>
            <table class="table table-bordered table-hover">
                <tr>
                    <th>#</th>
                    <th>Tên sản phẩm</th>
                    <th>Giá</th>
                    <th>Discount</th>
                    <th>Số lượng</th>
                    <th>Thành tiền</th>
                </tr>
                <?php 
                    $number = 1;
                    $total = 0;
                    foreach($data as $product):
                        $price = $product->qty*($product->price - $product->price * $product->discount /100);
                        $total += $price;
                ?>
                <tr>    
                    <td><?php echo $number;?></td>
                    <!-- <td style="width: 100px;"><img src="../frontend/assets/upload/products/" style="width:100px;"></td> -->
                    <td><?php echo $product->name; ?></td>
                    <td><?php echo number_format($product->price); ?></td>
                    <td><?php echo $product->discount; ?></td>
                    <td><?php echo $product->qty; ?></td>
                    <td><?php echo number_format($price); ?></td>
                </tr>
                <?php 
                    $number++;
                    endforeach;?>
            </table>
        </div>
        <div class="panel-body">
			<div style="text-transform:uppercase;font-weight:700;font-size:15px;margin-bottom: 20px;">GHI CHÚ</div>
			<!-- <textarea id="note" name="note" rows="5" style="width: 100%;"></textarea> <br> <br> -->
            <?php echo $order->note; ?>
            <br>
            <div style="text-align:right;font-weight:700;font-size:20px;"> Tổng tiền: 
			    <?php echo number_format($total); ?>
            </div>
		</div>
		
    </div>
</div>