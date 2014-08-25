<?php
        $result_n = $GLOBALS['result']->name_dets;
        ?>

    	<ul class="no-ellipses" data-role="listview" data-count-theme="b" data-inset="true" data-filter="true" data-filter-placeholder="Search names...">
        <?php
        if(isset($result_n->name_details) && count($result_n->name_details) > 1){
            foreach($result_n->name_details as $result_n_ar){
                ?>
                <li>
                    <a href="index.php?page=view-name&id=<?php echo $result_n_ar->name_id; ?>&ref=<?php echo $_GET['id']; ?>&ref_page=view-address">
                    <?php echo $result_n_ar->given_names; ?> <?php echo $result_n_ar->surname; ?>
                    </a>
                </li>
                <?php
            }
        }
        elseif(isset($result_n->name_details) && count($result_n->name_details) == 1){
            $result_n_ar = $result_n->name_details;
            ?>
            <li>
                <a href="index.php?page=view-name&id=<?php echo $result_n_ar->name_id; ?>&ref=<?php echo $_GET['id']; ?>&ref_page=view-address">
                    <?php echo $result_n_ar->given_names; ?> <?php echo $result_n_ar->surname; ?>
                </a>
            </li>
            <?php
        }
        ?>
        
    </ul>
