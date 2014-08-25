<ul class="pageitem">
    <li class="textbox">
    Found <b><?php echo count($GLOBALS['result']->search_details); ?></b> results.
    </li>
    <li class="bigfield">
        <input type="text" placeholder="Filter..." id="searchText"/>
    </li>
</ul>
<ul class="pageitem">
    <?php
    if(count($GLOBALS['result']->search_details) > 1){
		$i=0;
        foreach($GLOBALS['result']->search_details as $result_search){
			?>
            <div id="searchObject<?php echo $i; ?>" class="searchObject">
            <?php
            if($result_search->result_type == "Request"){
                ?>
                <li class="textbox">
                    <b><?php echo $result_search->result_type; ?>:</b> <a href="index.php?page=view-request&id=<?php echo $result_search->key_id; ?>&ref_page=search"><?php echo $result_search->key_id; ?></a> - <?php echo $result_search->description; ?>
                </li>
                <?php
            }
            elseif($result_search->result_type == "Action"){
                ?>
                <li class="textbox">
                    <b><?php echo $result_search->result_type; ?>:</b> <a href="index.php?page=view-action&id=<?php echo $result_search->key_id; ?>&ref_page=search"><?php echo $result_search->key_id; ?></a> - <?php echo $result_search->description; ?>
                </li>
                <?php
            }
            elseif($result_search->result_type == "Address"){
                ?>
                <li class="textbox">
                    <b><?php echo $result_search->result_type; ?>:</b> <a href="index.php?page=view-address&id=<?php echo $result_search->key_id; ?>&ref_page=search"><?php echo $result_search->key_id; ?></a> - <?php echo $result_search->description; ?>
                </li>
                <?php
            }
            elseif($result_search->result_type == "Name"){
                ?>
                <li class="textbox">
                    <b><?php echo $result_search->result_type; ?>:</b> <a href="index.php?page=view-name&id=<?php echo $result_search->key_id; ?>&ref_page=search"><?php echo $result_search->key_id; ?></a> - <?php echo $result_search->description; ?>
                </li>
                <?php
            }
            elseif($result_search->result_type == "Property&Rating Address"){
                ?>
                <li class="textbox">
                    <b><?php echo $result_search->result_type; ?>:</b> <a href="index.php?page=view-address&id=<?php echo $result_search->key_id; ?>&ex=1&ref_page=search"><?php echo $result_search->key_id; ?></a> - <?php echo $result_search->description; ?>
                </li>
                <?php
            }
            elseif($result_search->result_type == "Property&Rating Name"){
                ?>
                <li class="textbox">
                    <b><?php echo $result_search->result_type; ?>:</b> <a href="index.php?page=view-name&id=<?php echo $result_search->key_id; ?>&ex=1&ref_page=search"><?php echo $result_search->key_id; ?></a> - <?php echo $result_search->description; ?>
                </li>
                <?php
            }
            elseif($result_search->result_type == "Officer"){
                ?>
                <li class="textbox">
                    <b><?php echo $result_search->result_type; ?>:</b> <a href="index.php?page=view-officer&id=<?php echo $result_search->key_id; ?>&ref_page=search"><?php echo $result_search->key_id; ?></a> - <?php echo $result_search->description; ?>
                </li>
                <?php
            }
            elseif($result_search->result_type == "Property&Rating Animals"){
                ?>
                <li class="textbox">
                    <b><?php echo $result_search->result_type; ?>:</b> <a href="index.php?page=view-animal&id=<?php echo $result_search->key_id; ?>&ref_page=search"><?php echo $result_search->key_id; ?></a> - <?php echo $result_search->description; ?>
                </li>
                <?php
            }
            else{
                ?>
                <li class="textbox">
                    <b><?php echo $result_search->result_type; ?>:</b> <a href="javascript:alert('Summary not yet available.');"><?php echo $result_search->key_id; ?></a> -  <?php echo $result_search->description; ?>
                </li>
                <?php
            }
			?>
            </div>
            <?php
			$i++;
        }
    }
    elseif(count($GLOBALS['result']->search_details) == 1){
        if($GLOBALS['result']->search_details->result_type == "Request"){
            ?>
            <li class="textbox">
                <b><?php echo $GLOBALS['result']->search_details->result_type; ?>:</b> <a href="index.php?page=view-request&id=<?php echo $GLOBALS['result']->search_details->key_id; ?>&ref_page=search"><?php echo $GLOBALS['result']->search_details->key_id; ?></a> - <?php echo $GLOBALS['result']->search_details->description; ?>
            </li>
            <?php
        }
        elseif($GLOBALS['result']->search_details->result_type == "Action"){
            ?>
            <li class="textbox">
                <b><?php echo $GLOBALS['result']->search_details->result_type; ?>:</b> <a href="index.php?page=view-action&id=<?php echo $GLOBALS['result']->search_details->key_id; ?>&ref_page=search"><?php echo $GLOBALS['result']->search_details->key_id; ?></a> - <?php echo $GLOBALS['result']->search_details->description; ?>
            </li>
            <?php
        }
        elseif($GLOBALS['result']->search_details->result_type == "Address"){
            ?>
            <li class="textbox">
                <b><?php echo $GLOBALS['result']->search_details->result_type; ?>:</b> <a href="index.php?page=view-address&id=<?php echo $GLOBALS['result']->search_details->key_id; ?>&ref_page=search"><?php echo $GLOBALS['result']->search_details->key_id; ?></a> - <?php echo $GLOBALS['result']->search_details->description; ?>
            </li>
            <?php
        }
        elseif($GLOBALS['result']->search_details->result_type == "Name"){
            ?>
            <li class="textbox">
                <b><?php echo $GLOBALS['result']->search_details->result_type; ?>:</b> <a href="index.php?page=view-name&id=<?php echo $GLOBALS['result']->search_details->key_id; ?>&ref_page=search"><?php echo $GLOBALS['result']->search_details->key_id; ?></a> - <?php echo $GLOBALS['result']->search_details->description; ?>
            </li>
            <?php
        }
        elseif($GLOBALS['result']->search_details->result_type == "Property&Rating Address"){
            ?>
            <li class="textbox">
                <b><?php echo $GLOBALS['result']->search_details->result_type; ?>:</b> <a href="index.php?page=view-address&id=<?php echo $GLOBALS['result']->search_details->key_id; ?>&ex=1&ref_page=search"><?php echo $GLOBALS['result']->search_details->key_id; ?></a> - <?php echo $GLOBALS['result']->search_details->description; ?>
            </li>
            <?php
        }
        elseif($GLOBALS['result']->search_details->result_type == "Property&Rating Name"){
            ?>
            <li class="textbox">
                <b><?php echo $GLOBALS['result']->search_details->result_type; ?>:</b> <a href="index.php?page=view-name&id=<?php echo $GLOBALS['result']->search_details->key_id; ?>&ex=1&ref_page=search"><?php echo $GLOBALS['result']->search_details->key_id; ?></a> - <?php echo $GLOBALS['result']->search_details->description; ?>
            </li>
            <?php
        }
        elseif($GLOBALS['result']->search_details->result_type == "Officer"){
            ?>
            <li class="textbox">
                <b><?php echo $GLOBALS['result']->search_details->result_type; ?>:</b> <a href="index.php?page=view-officer&id=<?php echo $GLOBALS['result']->search_details->key_id; ?>&ref_page=search"><?php echo $GLOBALS['result']->search_details->key_id; ?></a> - <?php echo $GLOBALS['result']->search_details->description; ?>
            </li>
            <?php
        }
        elseif($GLOBALS['result']->search_details->result_type == "Property&Rating Animals"){
            ?>
            <li class="textbox">
                <b><?php echo $GLOBALS['result']->search_details->result_type; ?>:</b> <a href="index.php?page=view-animal&id=<?php echo $GLOBALS['result']->search_details->key_id; ?>&ref_page=search"><?php echo $GLOBALS['result']->search_details->key_id; ?></a> - <?php echo $GLOBALS['result']->search_details->description; ?>
            </li>
            <?php
        }
        else{
            ?>
            <li class="textbox">
                <b><?php echo $GLOBALS['result']->search_details->result_type; ?>:</b> <a href="javascript:alert('Summary available in version 2.');"><?php echo $GLOBALS['result']->search_details->key_id; ?></a> -  <?php echo $GLOBALS['result']->search_details->description; ?>
            </li>
            <?php
        }
    }
    ?>
</ul>