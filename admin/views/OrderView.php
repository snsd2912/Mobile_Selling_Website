<?php 
    //ket thua layout1.php de load vao day
    $layout = "layout.php";
?>    
<!-- Content Header  -->
<section class="content-header" style="margin-bottom: 20px!important;">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <!-- add user  -->
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="nav-item" style="background-color: rgb(206, 206, 206)!important; border-radius: 25px; float: right!important;">                
                    <!-- search section  -->
                    <form class="form-inline" method="post" action="index.php?controller=order&action=search">
                        <input value="<?php if(isset($key)){ echo $key;}?>" name="key" class="form-control form-control-navbar" placeholder="Search" style="background-color: inherit!important; border:none;">
                        <button class="btn btn-navbar" type="submit"><i class="fas fa-search"></i></button>
                    </form>
                </li>
            </ol>
        </div>
      </div>
    </div>
</section>          
<div class="col-md-12">    
    <div class="panel panel-primary">
        <div class="panel-heading">Danh sách đơn hàng</div>
        <div class="panel-body">
            <table class="table table-bordered table-hover">
                <tr>
                    <th>#</th>
                    <th>ID</th>
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
                    <td><?php echo $rows->orderid;?></td>
                    <td><?php echo $rows->name; ?></td>
                    <td><?php echo $rows->phonenumber; ?></td>
                    <td><?php echo $rows->address; ?></td>
                    <td><?php echo $rows->time; ?></td>
                    <td>
                    	<?php 
                    		if($rows->ship==0){ ?>
                    	    <p style="color:#d63031;">Chưa giao hàng</p>
                        <?php    } elseif($rows->ship==1) { ?>
                    		<p style="color:blue;">Đã giao hàng</p>
                        <?php     } else{ ?>
                            <p style="color:#00b894;">Đã nhận hàng</p>
                        <?php     }
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