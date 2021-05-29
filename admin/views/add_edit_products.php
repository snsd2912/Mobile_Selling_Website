<?php 
    //load file layout
    $layout = "layout.php";
 ?>
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <h4><a href="index.php?controller=products" style="color: #b2bec3 !important;">
        <i class="fas fa-chevron-left" style="color: #b2bec3 !important;"></i>   Back
        </a></h4>
      </div>
    </div>
</section>
<div class="col-md-12">  
    <div class="panel panel-primary">
        <div class="panel-heading">Add edit product</div>
        <div class="panel-body">
        <!-- neu muon load anh thi phai cho thuoc tinh enctype="multipart/form-data" -->
        <form method="post" enctype="multipart/form-data" action="<?php echo $formAction; ?>">
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
                <div class="col-md-2">Price</div>
                <div class="col-md-10">
                    <input type="number" min=0 value="<?php echo isset($record->price)?$record->price:'0'; ?>" name="price" class="form-control" required>
                </div>
            </div>
            <!-- end rows -->
            <!-- rows -->
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2">Distributor</div>
                <div class="col-md-10">
                    <select name="distributorid" class="form-control" style="width: 300px;">
                    <?php 
                        //lay bien ket noi
                        $conn = Connection::getInstance();
                        //liet ke cap 1
                        $query1 = $conn->query("select * from distributors");
                        foreach($query1 as $rows1):
                     ?>
                            <option <?php if(isset($record->distributorid)&&$record->distributorid==$rows1->distributorid): ?> selected <?php endif; ?> value="<?php echo $rows1->distributorid; ?>"><?php echo $rows1->name; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <!-- end rows -->
            <!-- rows -->
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2">Category</div>
                <div class="col-md-10">
                    <select name="categoryid" class="form-control" style="width: 300px;">
                    <?php 
                        //lay bien ket noi
                        $conn = Connection::getInstance();
                        //liet ke cap 1
                        $query1 = $conn->query("select * from categories where parentid = 0 order by categoryid desc");
                        foreach($query1 as $rows1):
                     ?>
                            <option <?php if(isset($record->categoryid)&&$record->categoryid==$rows1->categoryid): ?> selected <?php endif; ?> value="<?php echo $rows1->categoryid; ?>"><?php echo $rows1->name; ?></option>
                            <?php 
                                //liet ke cap 2
                                $query2 = $conn->query("select * from categories where parentid=".$rows1->categoryid." order by categoryid desc");
                                foreach($query2 as $rows2):
                             ?>
                             <option <?php if(isset($record->categoryid)&&$record->categoryid==$rows2->categoryid): ?> selected <?php endif; ?> value="<?php echo $rows2->categoryid; ?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $rows2->name; ?></option>
                            <?php endforeach; ?>
                        <?php endforeach; ?>
                    </select>
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
                    <input type="checkbox" <?php if (isset($record->hot)&&$record->hot==1): ?> checked <?php endif; ?> name="hot" id="hot"> <label for="hot">Hot</label>
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