<?php 
    $layout = "layout.php";
 ?>
 <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <h4><a href="index.php?controller=distributors" style="color: #b2bec3 !important;">
        <i class="fas fa-chevron-left" style="color: #b2bec3 !important;"></i>   Back
        </a></h4>
      </div>
    </div>
</section>

<div class="col-md-12"> 
    <div class="panel panel-primary">
        <div class="panel-heading">
            <?php if($action=="add") { ?>
                Add Distributor
            <?php } else { ?>
                Edit Distributor
            <?php } ?>
        </div>
        <div class="panel-body">
        <form method="post" action="<?php echo $formAction; ?>" enctype="multipart/form-data">

            <input type="hidden" value="<?php echo isset($record->distributorid)?$record->distributorid:''; ?>" name="id" class="form-control">

            <div class="row" style="margin-top:5px;">
                <div class="col-md-2">Name</div>
                <div class="col-md-10">
                    <input type="text" value="<?php echo isset($record->name)?$record->name:''; ?>" name="name" class="form-control" required>
                </div>
            </div>

            <div class="row" style="margin-top:5px;">
                <div class="col-md-2">Address</div>
                <div class="col-md-10" >
                    <input type="text" value="<?php echo isset($record->address)?$record->address:''; ?>" name="address" class="form-control" style="width: 300px;" required >
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
            <!-- end rows -->
            <!-- rows -->
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2">Descripition</div>
                <div class="col-md-10">
                    <textarea name="description" id="description"><?php echo isset($record->description)?$record->description:''; ?></textarea>
                    <script type="text/javascript">
                        CKEDITOR.replace('description');
                    </script>
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

