<?php 
    $layout = "layout.php";
 ?>
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <h4><a href="index.php?controller=categories" style="color: #b2bec3 !important;">
        <i class="fas fa-chevron-left" style="color: #b2bec3 !important;"></i>   Back
        </a></h4>
      </div>
    </div>
</section>
<div class="col-md-12">  
    <div class="panel panel-primary">
        <div class="panel-heading">Add edit category</div>
        <div class="panel-body">
        <form method="post" action="<?php echo $formAction; ?>">
            <!-- rows -->
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2">Name</div>
                <div class="col-md-10">
                    <input type="text" value="<?php echo isset($record->name)?$record->name:''; ?>" name="name" class="form-control" required>
                </div>
            </div>
            <!-- end rows -->
            <!-- rows -->
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2">Danh mục cha</div>
                <div class="col-md-10">
                    <select name="parentid">
                        <option value="0"></option>
                        <?php 
                            //lay cac danh muc cap cha
                            $categories = DB::fetchAll("select * from categories where parentid = 0 order by categoryid desc");
                         ?>
                         <?php foreach($categories as $rows): ?>
                        <option <?php if(isset($record->parentid) && $rows->parentid==$record->parentid): ?> selected <?php endif; ?> value="<?php echo $rows->categoryid; ?>"><?php echo $rows->name; ?></option>
                           
                         <?php endforeach; ?>
                    </select>
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