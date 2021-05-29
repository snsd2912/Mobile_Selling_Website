 <aside class="aside-category">
    <h3><i class="fa fa-bars"></i>&nbsp;&nbsp; Danh mục sản phẩm</h3>
    <ul class="list-unstyled">
        <?php 
            foreach($data as $rows):
         ?>
            <li><a href="index.php?controller=products&action=categories&catid=<?php echo $rows->id; ?>"> <?php echo $rows->name; ?></a>
            </li>
            <?php 
                //lay cac danh muc cap con
                $subCategory = DB::fetchAll("select * from categories where parentid = ".$rows->id." order by categoryid desc");
                foreach($subCategory as $subRows):
             ?>
             <li><a href="index.php?controller=products&action=categories&catid=<?php echo $subRows->id; ?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $subRows->name; ?></a>
            </li>
         <?php endforeach; ?>
        <?php endforeach; ?>
    </ul>
</aside>