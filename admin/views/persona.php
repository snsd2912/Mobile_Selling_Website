<?php 
    $layout = "layout.php";
?>

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
                    <form method="post" action="index.php?controller=users&action=changeownpassword" enctype="multipart/form-data">
                        <!-- rows -->
                        <div class="row" style="margin-top:5px;">
                            <div class="col-md-2">Old password</div>
                            <div class="col-md-2">
                                <input type="password" name="oldpassword" class="form-control" required>
                            </div>
                        </div>
                        <!-- end rows -->
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
        <?php if (isset($message)){ 
                if($message == 1){ ?>
                    <p>Change successfully</p>
                <?php } elseif ($message==0){  ?>
                    <p>Old password is wrong</p>
                <?php } ?>
        <?php } ?>
    </div>
<?php } ?>

<div class="col-md-12"> 
    <div class="panel panel-primary">
        <div class="panel-heading">Edit your information</div>
        <div class="panel-body">
        <form method="post" action="<?php echo $formAction; ?>" enctype="multipart/form-data">
            <?php if($action=="edit"){ ?>
                <div class="row" style="margin-top:5px;">
                    <?php if(file_exists("assets/layout1/images/".$record->photo)): ?>
                        <img src="assets/layout1/images/<?php echo $record->photo; ?>" style="width: 200px;display: block; margin-left: auto; margin-right: auto;">
                    <?php endif; ?>
                </div>
            <?php } ?>

            <input type="hidden" value="<?php echo isset($record->userid)?$record->userid:''; ?>" name="id" class="form-control">

            <div class="row" style="margin-top:5px;">
                <div class="col-md-2">Userame</div>
                <div class="col-md-10">
                    <input type="text" value="<?php echo isset($record->username)?$record->username:''; ?>" class="form-control" readonly>
                </div>
            </div>            

            <div class="row" style="margin-top:5px;">
                <div class="col-md-2">Full name</div>
                <div class="col-md-10">
                    <input type="text" value="<?php echo isset($record->name)?$record->name:''; ?>" class="form-control" readonly>
                </div>
            </div>

            <div class="row" style="margin-top:5px;">
                <div class="col-md-2">DOB</div>
                <div class="col-md-10" >
                    <input type="date" value="<?php echo isset($record->dob)?$record->dob:''; ?>" class="form-control" style="width: 300px;" readonly>
                </div>
            </div>

            <div class="row" style="margin-top:5px;">
                <div class="col-md-2">Gender</div>
                <div class="col-md-10" >
                    <?php if(isset($record->gender)&&$record->gender=="1"){ ?>
                        <input type="text" value="Male" class="form-control" readonly>
                    <?php } elseif(isset($record->gender)&&$record->gender=="0"){ ?> 
                        <input type="text" value="Female" class="form-control" readonly>
                    <?php } else { ?> 
                        <input type="text" value="Other" class="form-control" readonly>
                    <?php } ?> 
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

            <div class="row" style="margin-top:5px;">
                <div class="col-md-2">Role</div>
                <div class="col-md-10" >
                    <?php 
                        //lay bien ket noi
                        $conn = Connection::getInstance();
                        //liet ke cap 1
                        $query = $conn->query("select * from role");
                        foreach($query as $rows):
                            if(isset($record->roleid)&&$record->roleid==$rows->roleid): ?> 
                            <input type="text" value="<?php echo $rows->name;?>" class="form-control" readonly>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="row" style="margin-top:5px;">
                <div class="col-md-2">Branch</div>
                <div class="col-md-10" >
                    <?php 
                        //lay bien ket noi
                        $conn = Connection::getInstance();
                        //liet ke cap 1
                        $query3 = $conn->query("select * from branch");
                        foreach($query3 as $rows3):
                            if(isset($record->branchid)&&$record->branchid==$rows3->branchid): ?> 
                                <input type="text" value="<?php echo $rows3->name;?>" class="form-control" readonly>
                            <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>                                  
            <!-- end rows -->
            <!-- rows -->
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2">Upload image</div>
                <div class="col-md-10">
                    <input type="file" name="photo">
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

