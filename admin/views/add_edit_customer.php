<?php 
    $layout = "layout.php";
 ?>
 <section class="content-header" style="margin-bottom: 20px!important;">
    <div class="container-fluid">
      <div class="row mb-2">
        <h4><a href="index.php?controller=customers" style="color: #b2bec3 !important;">
        <i class="fas fa-chevron-left" style="color: #b2bec3 !important;"></i>   Back
        </a></h4>
      </div>
    </div>
</section>

<div class="col-md-12"> 
    <?php if(isset($_GET["email"])): ?>
        <div class="alert alert-warning">Email đã tồn tại</div> 
    <?php endif; ?>
    <div class="panel panel-primary">
        <div class="panel-heading">
            
        </div>
        <div class="panel-body">
        <form method="post" action="<?php echo $formAction; ?>" enctype="multipart/form-data">

            <input type="hidden" value="<?php echo isset($record->customerid)?$record->customerid:''; ?>" name="id" class="form-control">

            <div class="row" style="margin-top:5px;">
                <div class="col-md-2">Userame</div>
                <div class="col-md-10">
                    <input type="text" value="<?php echo isset($record->username)?$record->username:''; ?>" name="username" class="form-control" required>
                </div>
            </div>
            
            <?php if($action=="add"){ ?>
                <div class="row" style="margin-top:5px;">
                    <div class="col-md-2">Password</div>
                    <div class="col-md-10" >
                        <input type="password" value="<?php echo isset($record->password)?$record->password:''; ?>" name="password" class="form-control" style="width: 300px;" required >
                    </div>
                </div>
            <?php } ?>
            

            <div class="row" style="margin-top:5px;">
                <div class="col-md-2">Full name</div>
                <div class="col-md-10">
                    <input type="text" value="<?php echo isset($record->name)?$record->name:''; ?>" name="name" class="form-control" required>
                </div>
            </div>


            <div class="row" style="margin-top:5px;">
                <div class="col-md-2">Email</div>
                <div class="col-md-10" >
                    <input type="email" value="<?php echo isset($record->email)?$record->email:''; ?>" name="email" class="form-control" style="width: 300px;" required >
                </div>
            </div>

            <div class="row" style="margin-top:5px;">
                <div class="col-md-2">Phone number</div>
                <div class="col-md-10" >
                    <input type="text"  pattern="0{1}[0-9]{9}" value="<?php echo isset($record->phonenumber)?$record->phonenumber:''; ?>" name="phonenumber" class="form-control" style="width: 300px;" required >
                </div>
            </div>

            <div class="row" style="margin-top:5px;">
                <div class="col-md-2">Address</div>
                <div class="col-md-10" >
                    <input type="text" value="<?php echo isset($record->address)?$record->address:''; ?>" name="address" class="form-control" style="width: 300px;" required >
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

<!-- change password -->
<?php if($action=="edit"){ ?>
    <div class="col-md-12">
        <p>
            <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                Change password
            </button>
        </p>
        <div class="collapse" id="collapseExample">
            <div class="panel panel-primary">
                <div class="panel-body">
                    <form method="post" action="index.php?controller=customers&action=changepassword" enctype="multipart/form-data">

                        <input type="hidden" value="<?php echo isset($record->customerid)?$record->customerid:''; ?>" name="id" class="form-control">
                        <!-- rows -->
                        <div class="row" style="margin-top:5px;">
                            <div class="col-md-2">New password</div>
                            <div class="col-md-2">
                                <input type="password" name="password" class="form-control" required>
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

        <!-- message -->
        <?php if ($message == 1){ ?>
            <p>Change successfully</p>
        <?php } elseif ($message==0){  ?>
            <p>Error</p>
        <?php } else { ?>

        <?php } ?>
    </div>
<?php } ?>


