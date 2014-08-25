<span class="graytitle">Names</span>
<div id="NamesShow">
    <ul class="pageitem">
        <li class="button">
        <?php
        $result_n = $GLOBALS['result'];
        ?>
            <input type="button" value="Show (<?php if(isset($result_n->name_details)){ echo count($result_n->name_details); } else { echo 0; } ?>)" id="Names" class="openSection" />
        </li>
    </ul>
    </div>
<div id="NamesSection" style="display:none;">
    <ul class="pageitem">
        <?php
        if(isset($result_n->name_details) && count($result_n->name_details) > 1){
            foreach($result_n->name_details as $result_n_ar){
                ?>
                <li class="menu">
                    <a href="index.php?page=view-name&id=<?php echo $result_n_ar->name_id; ?>&ref=<?php echo $_GET['id']; ?>&ref_page=view-address">
                    <span class="name"><?php echo $result_n_ar->given_names; ?> <?php echo $result_n_ar->surname; ?></span><span class="arrow"></span>
                    </a>
                </li>
                <?php
            }
        }
        elseif(isset($result_n->name_details) && count($result_n->name_details) == 1){
            $result_n_ar = $result_n->name_details;
            ?>
            <li class="menu">
                <a href="index.php?page=view-name&id=<?php echo $result_n_ar->name_id; ?>&ref=<?php echo $_GET['id']; ?>&ref_page=view-address">
                    <span class="name"><?php echo $result_n_ar->given_names; ?> <?php echo $result_n_ar->surname; ?></span><span class="arrow"></span>
                </a>
            </li>
            <?php
        }
        ?>
        <li class="button">
            <input type="button" value="Hide" class="closeSection" id="Names" />
        </li>
    </ul>
    </div>