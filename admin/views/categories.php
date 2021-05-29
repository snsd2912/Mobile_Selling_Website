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
            <a href="index.php?controller=categories&action=add" class="btn btn-primary">Add Category</a>
        </div>
      </div>
    </div>
</section>
<div class="col-md-12">
    <div class="panel panel-primary">
        <div class="panel-heading">List Category</div>
        <div class="panel-body">
            <table class="table table-bordered table-hover">
                <tr>
                    <th>Category name</th>
                    <th style="width:100px;"></th>
                </tr>
                <?php foreach($data as $rows): ?>
                <tr>
                    <td><?php echo $rows->name; ?></td>
                    <td style="text-align:center;">
                        <a href="index.php?controller=categories&action=edit&id=<?php echo $rows->categoryid; ?>">Edit</a>&nbsp;
                        <a href="index.php?controller=categories&action=delete&id=<?php echo $rows->categoryid; ?>" onclick="return window.confirm('Are you sure?');">Delete</a>
                    </td>
                </tr>
                <?php 
                    //liet ke cac danh muc cap con thuoc danh muc nay
                    $subCategory = DB::fetchAll("select * from categories where parentid=".$rows->categoryid." order by categoryid desc");
                 ?>
                     <?php foreach($subCategory as $subRows): ?>
                        <tr>
                            <td style="padding-left: 35px;"><?php echo $subRows->name; ?></td>
                            <td style="text-align:center;">
                                <a href="index.php?controller=categories&action=edit&id=<?php echo $subRows->categoryid; ?>">Edit</a>&nbsp;
                                <a href="index.php?controller=categories&action=delete&id=<?php echo $subRows->categoryid; ?>" onclick="return window.confirm('Are you sure?');">Delete</a>
                            </td>
                        </tr>
                     <?php endforeach; ?>    
                <?php endforeach; ?>
            </table>
            <style type="text/css">
                .pagination{padding:0px; margin:0px;}
            </style>
            <ul class="pagination">
                <li class="page-item disabled"><a class="page-link" href="#">Trang</a></li>
                <?php for($i = 1; $i <= $numPage; $i++): ?>
                <li class="page-item"><a class="page-link" href="index.php?controller=categories&p=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                <?php endfor; ?>
            </ul>
        </div>
    </div>
</div>