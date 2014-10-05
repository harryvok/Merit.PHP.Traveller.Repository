<?php
if(isset($GLOBALS['result']->search_details)){
	?>
    <p>Found <b><?php echo count($GLOBALS['result']->search_details); ?></b> results.</p>
    <ul class="no-ellipses" data-role="listview" data-filter="true" data-filter-placeholder="Filter.." data-inset="true">
        <?php
        if(count($GLOBALS['result']->search_details) > 1){
            $i=0;
            foreach($GLOBALS['result']->search_details as $result_search){
                if($result_search->result_type == "Request"){
                    ?>
                    <li>
                        <a data-transition="slide" href="index.php?page=view-request&id=<?php echo $result_search->key_id; ?>&ref_page=search">
                         <b><?php echo $result_search->result_type; ?>:</b> <?php echo $result_search->key_id; ?>  - <?php echo $result_search->description; ?><br />
                        </a>
                    </li>
                    <?php
                }
                elseif($result_search->result_type == "Action"){
                    ?>
                    <li>
                        <a data-transition="slide" href="index.php?page=view-action&id=<?php echo $result_search->key_id; ?>&ref_page=search">
                         <b><?php echo $result_search->result_type; ?>:</b> <?php echo $result_search->key_id; ?>  - <?php echo $result_search->description; ?><br />
                        </a>
                    </li>
                    <?php
                }
                elseif($result_search->result_type == "Address" || $result_search->result_type == "Linked Address"){
                    ?>
                    <li>
                        <a data-transition="slide" href="index.php?page=view-address&id=<?php echo $result_search->key_id; ?>&ref_page=search">
                         <b><?php echo $result_search->result_type; ?>:</b> <?php echo $result_search->key_id; ?>  - <?php echo $result_search->description; ?><br />
                        </a>
                    </li>
                    <?php
                }
                elseif($result_search->result_type == "Name" || $result_search->result_type == "Linked Name"){
                    ?>
                    <li>
                        <a data-transition="slide" href="index.php?page=view-name&id=<?php echo $result_search->key_id; ?>&ref_page=search">
                         <b><?php echo $result_search->result_type; ?>:</b> <?php echo $result_search->key_id; ?>  - <?php echo $result_search->description; ?><br />
                        </a>
                    </li>
                    <?php
                }
                elseif($result_search->result_type == "Property&Rating Address"){
                    ?>
                    <li>
                        <a data-transition="slide" href="index.php?page=view-address&id=<?php echo $result_search->key_id; ?>&ref_page=search">
                         <b><?php echo $result_search->result_type; ?>:</b> <?php echo $result_search->key_id; ?>  - <?php echo $result_search->description; ?><br />
                        </a>
                    </li>
                    <?php
                }
                elseif($result_search->result_type == "Property&Rating Name"){
                    ?>
                    <li>
                        <a data-transition="slide" href="index.php?page=view-name&id=<?php echo $result_search->key_id; ?>&ref_page=search">
                         <b><?php echo $result_search->result_type; ?>:</b> <?php echo $result_search->key_id; ?>  - <?php echo $result_search->description; ?><br />
                        </a>
                    </li>
                    <?php
                }
                elseif($result_search->result_type == "Officer"){
                    ?>
                    <li>
                        <a data-transition="slide" href="index.php?page=view-officer&id=<?php echo $result_search->key_id; ?>&ref_page=search">
                         <b><?php echo $result_search->result_type; ?>:</b> <?php echo $result_search->description; ?><br />
                        </a>
                    </li>
                    <?php
                }
                else{
                    ?>
                    <li>
                        <a data-transition="slide" href="javascript:alert('Summary not available.');">
                        <b><?php echo $result_search->result_type; ?>:</b> <?php echo $result_search->key_id; ?> -  <?php echo $result_search->description; ?> 
                        </a>
                    </li>
                    <?php
                }
                $i++;
            }
        }
        elseif(count($GLOBALS['result']->search_details) == 1){
            $result_search = $GLOBALS['result']->search_details;
           if($result_search->result_type == "Request"){
                    ?>
                    <li>
                        <a data-transition="slide" href="index.php?page=view-request&id=<?php echo $result_search->key_id; ?>&ref_page=search">
                         <b><?php echo $result_search->result_type; ?>:</b> <?php echo $result_search->key_id; ?>  - <?php echo $result_search->description; ?><br />
                        </a>
                    </li>
                    <?php
                }
                elseif($result_search->result_type == "Action"){
                    ?>
                    <li>
                        <a data-transition="slide" href="index.php?page=view-action&id=<?php echo $result_search->key_id; ?>&ref_page=search">
                         <b><?php echo $result_search->result_type; ?>:</b> <?php echo $result_search->key_id; ?>  - <?php echo $result_search->description; ?><br />
                        </a>
                    </li>
                    <?php
                }
                elseif($result_search->result_type == "Address" || $result_search->result_type == "Linked Address"){
                    ?>
                    <li>
                        <a data-transition="slide" href="index.php?page=view-address&id=<?php echo $result_search->key_id; ?>&ref_page=search">
                         <b><?php echo $result_search->result_type; ?>:</b> <?php echo $result_search->key_id; ?>  - <?php echo $result_search->description; ?><br />
                        </a>
                    </li>
                    <?php
                }
                elseif($result_search->result_type == "Name" || $result_search->result_type == "Linked Name"){
                    ?>
                    <li>
                        <a data-transition="slide" href="index.php?page=view-name&id=<?php echo $result_search->key_id; ?>&ref_page=search">
                         <b><?php echo $result_search->result_type; ?>:</b> <?php echo $result_search->key_id; ?>  - <?php echo $result_search->description; ?><br />
                        </a>
                    </li>
                    <?php
                }
                elseif($result_search->result_type == "Property&Rating Address"){
                    ?>
                    <li>
                        <a data-transition="slide" href="index.php?page=view-address&id=<?php echo $result_search->key_id; ?>&ex=1&ref_page=search">
                         <b><?php echo $result_search->result_type; ?>:</b> <?php echo $result_search->key_id; ?>  - <?php echo $result_search->description; ?><br />
                        </a>
                    </li>
                    <?php
                }
                elseif($result_search->result_type == "Property&Rating Name"){
                    ?>
                    <li>
                        <a data-transition="slide" href="index.php?page=view-name&id=<?php echo $result_search->key_id; ?>&ex=1&ref_page=search">
                         <b><?php echo $result_search->result_type; ?>:</b> <?php echo $result_search->key_id; ?>  - <?php echo $result_search->description; ?><br />
                        </a>
                    </li>
                    <?php
                }
                elseif($result_search->result_type == "Officer"){
                    ?>
                    <li>
                        <a data-transition="slide" href="index.php?page=view-officer&id=<?php echo $result_search->key_id; ?>&ref_page=search">
                         <b><?php echo $result_search->result_type; ?>:</b> <?php echo $result_search->description; ?><br />
                        </a>
                    </li>
                    <?php
                }
            else{
                ?>
               <li>
                        <a data-transition="slide" href="javascript:alert('Summary not available.');">
                        <b><?php echo $result_search->result_type; ?>:</b> <?php echo $result_search->key_id; ?> -  <?php echo $result_search->description; ?> 
                        </a>
                    </li>
                <?php
            }
        }
        ?>
    </ul>
<?php
}
else{
	echo "No results found.";	
}
?>