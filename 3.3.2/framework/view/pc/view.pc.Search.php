<script type="text/javascript">
function change_req(id){
	var rowId = document.getElementById(id).innerHTML;
	window.location = "index.php?page=view-request&id="+rowId;
}

function change_act(id){
	var rowId = document.getElementById(id).innerHTML;
	window.location = "index.php?page=view-action&id="+rowId;
}
function change_add(id){
	var rowId = document.getElementById(id).innerHTML;
	window.location = "index.php?page=view-address&id="+rowId;
}
function change_name(id){
	var rowId = document.getElementById(id).innerHTML;
	window.location = "index.php?page=view-name&id="+rowId;
}
function change_addex(id){
	var rowId = document.getElementById(id).innerHTML;
	window.location = "index.php?page=view-address&id="+rowId+"&ex=1";
}
function change_nameex(id){
	var rowId = document.getElementById(id).innerHTML;
	window.location = "index.php?page=view-name&id="+rowId+"&ex=1";
}
function change_off(id){
	var rowId = document.getElementById(id).innerHTML;
	window.location = "index.php?page=view-officer&id="+rowId;
}
function change_ani(id){
	var rowId = document.getElementById(id).innerHTML;
	window.location = "index.php?page=view-animal&id="+rowId;
}
</script>
<?php
if(isset($GLOBALS['result']->search_details)){
	?>
<div style="float:left; width:100%;">
    <br />
    Found <b><?php echo count($GLOBALS['result']->search_details); ?></b> results.
</div>
<div style="float:left; width:100%;">
<input type="text" id="search" class="tableSearch" placeholder="Filter..." />
<table id="searchTable" class="sortable" title="" cellspacing="0">
	<thead>
    <tr>
        <th class="auto sortable">Type</th>
        <th class="auto sortable">Description</th>
        <th class="auto sortable">Key ID</th>
    </tr>
    </thead>
    <tbody>
    <?php
	
    if(count($GLOBALS['result']->search_details) > 1){
		$number = 0;
		$change = 0;
        foreach($GLOBALS['result']->search_details as $result_search){
            $number = $number+1;
            $change = $change+1;
            if($number == 2){
                $class = "dark";
                $number = 0;
            }
            else{
                $class = "light";
            }
            ?>
            
            <tr class="<?php echo $class; ?>" onclick="
            <?php 
            if($result_search->result_type == "Request"){ ?> 
                change_req('<?php echo $change; ?>'); <?php
            } 
            elseif($result_search->result_type == "Action"){ ?> 
                change_act('<?php echo $change; ?>'); <?php 
            } 
            elseif($result_search->result_type == "Address"){ ?> 
                change_add('<?php echo $change; ?>'); <?php 
            } 
            elseif($result_search->result_type == "Name"){ ?> 
                change_name('<?php echo $change; ?>'); <?php 
            } 
            elseif($result_search->result_type == "Property&Rating Address"){ ?> 
                change_addex('<?php echo $change; ?>'); <?php 
            } 
            elseif($result_search->result_type == "Property&Rating Name"){ ?> 
                change_nameex('<?php echo $change; ?>'); <?php 
            } 
            elseif($result_search->result_type == "Officer"){ ?> 
                change_off('<?php echo $change; ?>'); <?php 
            } 
            elseif($result_search->result_type == "Property&Rating Animals"){ ?> 
                change_ani('<?php echo $change; ?>'); <?php 
            } 
            else{
                ?>
                alert('Summary not available.');
                <?php	
            }
            ?>
            ">
                
                <td><?php echo $result_search->result_type; ?></td>
                <td><?php echo $result_search->description; ?></td>
                <td <?php if($result_search->result_type == "Request"){ ?> id="<?php echo $change; ?>" <?php } elseif($result_search->result_type == "Action"){ ?> id="<?php echo $change; ?>" <?php } elseif($result_search->result_type == "Address"){ ?> id="<?php echo $change; ?>" <?php } elseif($result_search->result_type == "Name"){ ?> id="<?php echo $change; ?>" <?php } elseif($result_search->result_type == "Property&Rating Address"){ ?> id="<?php echo $change; ?>" <?php } elseif($result_search->result_type == "Property&Rating Name"){ ?> id="<?php echo $change; ?>" <?php } elseif($result_search->result_type == "Officer"){ ?> id="<?php echo $change; ?>" <?php } elseif($result_search->result_type == "Property&Rating Animals"){ ?> id="<?php echo $change; ?>" <?php } ?>><?php echo $result_search->key_id; ?></td>
            </tr>
            <?php
        }
    }
    elseif(count($GLOBALS['result']->search_details) == 1){
        ?>
        <tr class="dark" 
        onclick="
        <?php 
        if($GLOBALS['result']->search_details->result_type == "Request"){ ?> 
            change_req('1'); <?php
        } 
        elseif($GLOBALS['result']->search_details->result_type == "Action"){ ?> 
            change_act('1'); <?php 
        } 
        elseif($GLOBALS['result']->search_details->result_type == "Address"){ ?> 
            change_add('1'); <?php 
        } 
        elseif($GLOBALS['result']->search_details->result_type == "Name"){ ?> 
            change_name('1'); <?php 
        } 
        elseif($GLOBALS['result']->search_details->result_type == "Property&Rating Address"){ ?> 
            change_addex('1'); <?php 
        } 
        elseif($GLOBALS['result']->search_details->result_type == "Property&Rating Name"){ ?> 
            change_nameex('1'); <?php 
        } 
        elseif($GLOBALS['result']->search_details->result_type == "Officer"){ ?> 
            change_off('1'); <?php 
        } 
        elseif($GLOBALS['result']->search_details->result_type == "Property&Rating Animals"){ ?> 
            change_ani('1'); <?php 
        } 
        else{
            ?>
            alert('Summary not available.');
            <?php	
        }
        ?>
        ">
            
            <td><?php echo $GLOBALS['result']->search_details->result_type; ?></td>
            <td><?php echo $GLOBALS['result']->search_details->description; ?></td>
            <td <?php if($GLOBALS['result']->search_details->result_type == "Request"){ ?> id="1" <?php } elseif($GLOBALS['result']->search_details->result_type == "Action"){ ?> id="1" <?php } elseif($GLOBALS['result']->search_details->result_type == "Address"){ ?> id="1" <?php }  elseif($GLOBALS['result']->search_details->result_type == "Name"){ ?> id="1" <?php } elseif($GLOBALS['result']->search_details->result_type == "Officer"){ ?> id="1" <?php } elseif($GLOBALS['result']->search_details->result_type == "Property&Rating Animals"){ ?> id="1" <?php } elseif($GLOBALS['result']->search_details->result_type == "Property&Rating Name"){ ?> id="1" <?php } elseif($GLOBALS['result']->search_details->result_type == "Property&Rating Address"){ ?> id="1" <?php } ?>><?php echo $GLOBALS['result']->search_details->key_id; ?></td>
        </tr>
        <?php
    }
	
    ?>
    </tbody>
</table>
</div>
<?php
}
else{
	echo "<br>No results found.";	
}
?>
<script type="text/javascript">
	$(document).ready(function() {
		Unload();
	});
</script>