<?php
if(isset($GLOBALS['result']->search_details)){
	?>
<script type="text/javascript">
    $(document).ready(function () {
        var oTable = $('#searchTable').dataTable({
            "aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
            "iDisplayLength": 50
        });

        $("#export").click(function () {
            $("#export").prop({ disabled: true });

            var oSettings = oTable.fnSettings();
            var current = oSettings._iDisplayLength;
            oSettings._iDisplayLength = 1000;
            oTable.fnDraw();

            var rowsArray = {};
            var i = 0;
            $('#searchTable tr').each(function () {
                var i2 = 0;
                rowsArray[i] = {};
                $(this).find("th").each(function () {
                    rowsArray[i][i2] = $(this).html();
                    i2++;
                });
                $(this).find("td").each(function () {
                    rowsArray[i][i2] = $(this).html();
                    i2++;
                });
                i++;
            });

            oSettings._iDisplayLength = current;
            oTable.fnDraw();
            $("#tableArray").val(JSON.stringify(rowsArray));
            $("#exportForm").submit();
        });

        Unload();
        });
</script>
<div class="float-right">
    <br /><br /><form method="post" id="exportForm" action="process.export.php"><input type="hidden" name="tableArray" id="tableArray" /><input type="hidden" name="name" id="name" value="search-Intray" /></form><input type="button" id="export" value="Export to Excel">
</div>

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
            elseif($result_search->result_type == "Address" || $result_search->result_type == "Linked Address"){ ?> 
                change_add('<?php echo $change; ?>'); <?php 
            } 
            elseif($result_search->result_type == "Name" || $result_search->result_type == "Linked Name"){ ?> 
                change_name('<?php echo $change; ?>'); <?php 
            } 
            elseif($result_search->result_type == "Property&Rating Address"){ ?> 
                change_addex('<?php echo $change; ?>'); <?php 
            } 
            elseif($result_search->result_type == "Property&Rating Name"){ ?> 
                change_nameex('<?php echo $change; ?>'); <?php 
            } 
            elseif($result_search->result_type == "Officer"){ ?> 
                change_off('<?php echo $change; ?>', '<?php echo $result_search->key_id; ?>'); <?php 
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
                <td id="<?php echo $change; ?>"><?php if($result_search->result_type != "Officer") echo $result_search->key_id; ?></td>
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
        elseif($GLOBALS['result']->search_details->result_type == "Address" || $GLOBALS['result']->search_details->result_type == "Linked Address"){ ?> 
            change_add('1'); <?php 
        } 
        elseif($GLOBALS['result']->search_details->result_type == "Name" || $GLOBALS['result']->search_details->result_type == "Linked Name"){ ?> 
            change_name('1'); <?php 
        } 
        elseif($GLOBALS['result']->search_details->result_type == "Property&Rating Address"){ ?> 
            change_addex('1'); <?php 
        } 
        elseif($GLOBALS['result']->search_details->result_type == "Property&Rating Name"){ ?> 
            change_nameex('1'); <?php 
        } 
        elseif($GLOBALS['result']->search_details->result_type == "Officer"){ ?> 
            change_off('1', '<?php echo $GLOBALS["result"]->search_details->key_id; ?>'); <?php 
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
            <td id="1"><?php if($GLOBALS['result']->search_details->result_type != "Officer") echo $GLOBALS['result']->search_details->key_id; ?></td>
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
