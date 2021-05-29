<?php 
    //ket thua layout1.php de load vao day
    $layout = "layout.php";
?>  

<div class="col-md-12"> 
    <div class="panel panel-primary">
        <div class="panel-heading">Revenue Statistic</div>
        <div class="panel-body">
        <form method="post" action="<?php echo $formAction; ?>" enctype="multipart/form-data">
            <!-- rows -->
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2">Start</div>
                <div class="col-md-10" >
                    <input type="date" name="start" class="form-control" style="width: 300px;" required >
                </div>
            </div>
            <!-- end rows -->
            <!-- rows -->
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2">End</div>
                <div class="col-md-10" >
                    <input type="date" name="end" class="form-control" style="width: 300px;" required >
                </div>
            </div>
            <!-- end rows -->
            <!-- rows -->
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2"></div>
                <div class="col-md-10">
                    <input type="submit" value="Process" class="btn btn-primary">
                </div>
            </div>
            <!-- end rows -->
        </form>
        </div>
    </div>
</div>

<?php if(isset($revenue)) { ?>                
<div class="col-md-12">    
    <div style="text-align:left;font-weight:700;font-size:20px;margin-bottom:10px;">
        Doanh thu: <?php echo $revenue; ?> VND
    </div>
    <?php if($data!=NULL) { ?>    
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
                    </tr>
                    <?php 
                        $number++;
                        endforeach; ?>
                </table>
                
            </div>
        </div>
    <?php } ?>    
</div>
<?php } ?>    

