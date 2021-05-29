<ul class="list-unstyled level1">
        <?php 
            foreach($data as $rows):
         ?>
            <li><a> <?php echo $rows->name; ?></a>
            </li>
            <?php 
                //lay cac danh muc cap con
                $subCategory = DB::fetchAll("select * from categories where parentid = ".$rows->categoryid." order by categoryid desc");
                foreach($subCategory as $subRows):
             ?>
             <li><a href="index.php?controller=products&catid=<?php echo $subRows->categoryid; ?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $subRows->name; ?></a>
            </li>
         <?php endforeach; ?>
        <?php endforeach; ?>
    </ul>