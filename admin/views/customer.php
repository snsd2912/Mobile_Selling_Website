<?php 
    //load file layout
    $layout = "layout.php";
 ?>
<!-- Content Header  -->
<section class="content-header" style="margin-bottom: 20px!important;">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <!-- add user  -->
            <a href="index.php?controller=customers&action=add" class="btn btn-primary">Add Customer</a>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="nav-item" style="background-color: rgb(206, 206, 206)!important; border-radius: 25px; float: right!important;">                
                    <!-- search section  -->
                    <form class="form-inline" method="post" action="index.php?controller=customers&action=search">
                        <input name="key" class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search" style="background-color: inherit!important; border:none;">
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
        <div class="panel-heading">List User</div>
        <div class="panel-body">
            <table class="table table-bordered table-hover">
                <tr>
                    <th>#</th>
                    <th>Username</th>
                    <th>Full Name</th>
                    <th>Address</th>
                    <th>Phonenumber</th>
                    <th></th>
                    <th></th>
                </tr>
                <?php
                    $number = 1; 
                    foreach($data as $rows): ?>
                <tr>
                    <td><?php echo $number; ?></td>
                    <td><?php echo $rows->username; ?></td>
                    <td><?php echo $rows->name; ?></td>
                    <td><?php echo $rows->address; ?></td>
                    <td><?php echo $rows->phonenumber; ?></td>
                    <td style="text-align:center;">
                        <a href="index.php?controller=customers&action=edit&id=<?php echo $rows->customerid; ?>">Edit</a>&nbsp;
                        <a href="index.php?controller=customers&action=delete&id=<?php echo $rows->customerid; ?>" onclick="return window.confirm('Are you sure?');">Delete</a>
                    </td>
                </tr>
                <?php 
                    $number++;
                    endforeach; ?>
            </table>
            <style type="text/css">
                .pagination{padding:0px; margin:0px;}
            </style>
            <ul class="pagination">
                <li class="page-item disabled"><a class="page-link" href="#">Trang</a></li>
                <?php for($i = 1; $i <= $numPage; $i++): ?>
                <li class="page-item"><a class="page-link" href="index.php?controller=customers&p=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                <?php endfor; ?>
            </ul>
        </div>
    </div>
</div>