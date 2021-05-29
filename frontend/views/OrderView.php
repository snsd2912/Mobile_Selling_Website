<?php 
	$layout = "Layout_Trangtrong.php";
 ?>              
<div class="col-md-12">    
    <div class="panel panel-primary">
        <div class="panel-heading">Danh sách đơn hàng</div>
        <div class="panel-body">
            <table class="table table-bordered table-hover">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Create</th>
                    <th>Status</th>
                    <th style="width:100px;"></th>
                </tr>
                <?php 
                    $number = 1;
                    foreach($data as $rows): ?>
                <tr>
                    <td><?php echo $number;?></td>
                    <td><?php echo $rows->name; ?></td>
                    <td><?php echo $rows->phonenumber; ?></td>
                    <td><?php echo $rows->address; ?></td>
                    <td><?php echo $rows->time; ?></td>
                    <td>
                    	<?php 
                    		if($rows->ship==0){
                    			echo "Chưa giao hàng";
                            } elseif($rows->ship==1){
                    			echo "Đang giao hàng";
                            } else{
                                echo "Đã nhận hàng";
                            }
                    	 ?>
                    </td>
                    <td><a href="index.php?controller=Order&action=orderDetail&id=<?php echo $rows->orderid; ?>">Chi tiết</a></td>
                </tr>
                <?php 
                    $number++;
                    endforeach; ?>
            </table>
            <style type="text/css">
                .pagination{padding:0px; margin:0px;}
            </style>
            <ul class="pagination">
                <li class="page-item disabled">
                    <a href="#" class="page-link">Trang</a>
                </li>
                <?php for($i = 1; $i <= $numPage; $i++): ?>
                <li class="page-item">
                    <a href="index.php?controller=Order&p=<?php echo $i; ?>" class="page-link"><?php echo $i; ?></a>
                </li>
                <?php endfor; ?>
            </ul>
        </div>
    </div>
</div>