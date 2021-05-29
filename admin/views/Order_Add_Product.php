<?php 
    //load file layout
    $layout = "layout.php";
?>
<div class="col-md-12">
    <div class="panel panel-primary">
        <div class="panel-heading">List product</div>
        <div class="panel-body">
            <table class="table table-bordered table-hover">
                <tr>
                    <th style="width: 100px;">ID</th>
                    <th style="width:100px;">Image</th>
                    <th style="width: 200px;">Name</th>
                    <th style="width: 100px;">Price</th>
                    <th style="width: 100px;">Quantity</th>
                    <th style="width: 100px;"></th>
                    <th style="width:100px;"></th>
                </tr>
                <?php foreach($data as $rows): ?>
                <tr>
                    <td><?php echo $rows->productid; ?></td>
                    <td>
                        <?php if(file_exists("../frontend/assets/upload/products/".$rows->photo)): ?>
                            <img src="../frontend/assets/upload/products/<?php echo $rows->photo; ?>" style="width: 100px;">
                        <?php endif; ?>
                    </td>
                    <td><?php echo $rows->name; ?></td>
                    <td><?php echo $rows->price; ?></td>
                    <td>
    <?php 
        //truy van truc tiep
        //lay bien ket noi
        $conn = Connection::getInstance();
        //thuc thi cau truy van
        $query = $conn->query("select name from categories where categoryid=".$rows->categoryid);
        //lay mot ban ghi
        $category = $query->fetch();
        echo isset($category->name)?$category->name:"";
     ?>
                    </td>
                    <td style="text-align:center;">
                        <a href="index.php?controller=products&action=edit&id=<?php echo $rows->productid; ?>">Edit</a>&nbsp;
                        <a href="index.php?controller=products&action=delete&id=<?php echo $rows->productid; ?>" onclick="return window.confirm('Are you sure?');">Delete</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
            <style type="text/css">
                .pagination{padding:0px; margin:0px;}
            </style>
            <ul class="pagination">
                <li class="page-item disabled"><a class="page-link" href="#">Trang</a></li>
                <?php for($i = 1; $i <= $numPage; $i++): ?>
                <li class="page-item"><a class="page-link" href="index.php?controller=products&p=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                <?php endfor; ?>
            </ul>
        </div>
    </div>
</div>