<?php
if(isset($GLOBALS['result']->request_search_details)){
?>
<div class="float-left">

    
 <script type="text/javascript">
     $(document).ready(function () {
         var oTable = $('#searchTable').dataTable({
             iDisplayLength: "25"
         });
     });

</script>
    <table id="searchTable" class="sortable" title="" cellspacing="0">
        <thead>
            <tr>
                <th class="sortable">Request ID</th>
                <th class="sortable">Input Date</th>
                <th class="sortable">SRF</th>
                <th class="sortable">Finalised</th>
                <th class="sortable">Count Only</th>
                 <th class="sortable">Intime</th>
                 <th class="sortable">Escalated</th>
                <?php if($GLOBALS['result']->customer_entered == "Y") { ?><th class="sortable">Customer</th><?php } ?>
                <?php if($GLOBALS['result']->company_entered == "Y") { ?><th class="sortable">Company</th><?php } ?>
                <?php if($GLOBALS['result']->location_entered == "Y") { ?><th class="sortable">Address</th><?php } ?>
                <?php if($GLOBALS['result']->facility_entered == "Y") { ?><th class="sortable">Facility</th><?php } ?>
                <?php if($GLOBALS['result']->request_description_entered == "Y") { ?><th class="sortable">Request Description</th><?php } ?>
            </tr>
        </thead>
        <tbody>
            <?php
	
    if(count($GLOBALS['result']->request_search_details) > 1){
		$number = 0;
		$change = 0;
        foreach($GLOBALS['result']->request_search_details as $result_search){
            $number = $number+1;
            $change = $change+1;
            if($number == 2){
                $class = "dark";
                $number = 0;
            }
            else{
                $class = "light";
            }
            
            if($result_search->request_id != 0){
            ?>

            <tr class="<?php echo $class; ?>" data-new-window="index.php?page=view-request&id=<?php echo $result_search->request_id; ?>">
                <td><?php echo $result_search->request_id; ?></td>
                <td><?php echo $result_search->input_date; ?></td>
                <td><?php echo base64_decode($result_search->service_name); ?> - <?php echo base64_decode($result_search->request_name); ?> - <?php if(isset($result_search->function_name)) echo base64_decode($result_search->function_name); ?></td>
                <td><?php echo $result_search->finalised_ind == "Y" ? "Yes" : "No"; ?></td>
                <td><?php echo $result_search->count_only == "Y" ? "Yes" : "No"; ?></td>
                <td><?php echo $result_search->intime_ind == "Y" ? "Yes" : "No"; ?></td>
                <td><?php echo $result_search->escalated_ind == "Y" ? "Yes" : "No"; ?></td>
                <?php if($GLOBALS['result']->customer_entered == "Y") { ?><td><?php if(isset($result_search->given_name)){ if($result_search->given_name != "Used") echo $result_search->given_name; } if(isset($result_search->surname)){ if($result_search->surname != "Not") echo " " .base64_decode($result_search->surname); } ?></td><?php } ?>
                <?php if($GLOBALS['result']->company_entered == "Y") { ?><td><?php echo $result_search->company_name; ?></td><?php } ?>
                <?php if($GLOBALS['result']->location_entered == "Y") { ?><td><?php if(isset($result_search->house_suffix) && isset($result_search->house_no) && strlen($result_search->house_no) > 0 && strlen($result_search->house_suffix) > 0 && $result_search->house_no != $result_search->house_suffix){ echo base64_decode($result_search->house_suffix); } else{ echo $result_search->house_no; } if(isset($result_search->street_name)){ echo " " .$result_search->street_name; } if(isset($result_search->street_type)){ echo " " .$result_search->street_type; } if(isset($result_search->locality_name)){ echo " " .$result_search->locality_name; } ?></td><?php } ?>
                <?php if($GLOBALS['result']->facility_entered == "Y") { ?><td><?php echo base64_decode($result_search->facility_name); ?></td><?php } ?>
                <?php if($GLOBALS['result']->request_description_entered == "Y") { ?><td><?php echo base64_decode($result_search->request_description); ?></td><?php } ?>
            </tr>
            <?php
            }
        }
    }
    elseif(count($GLOBALS['result']->request_search_details) == 1){
        $result_search = $GLOBALS['result']->request_search_details;
            ?>
            <tr class="dark" data-new-window="index.php?page=view-request&id=<?php echo $result_search->request_id; ?>">
                <td><?php echo $result_search->request_id; ?></td>
                <td><?php echo $result_search->input_date; ?></td>
                <td><?php echo base64_decode($result_search->service_name); ?> - <?php echo base64_decode($result_search->request_name); ?> - <?php if(isset($result_search->function_name)) echo base64_decode($result_search->function_name); ?></td>
                <td><?php echo $result_search->finalised_ind == "Y" ? "Yes" : "No"; ?></td>
                <td><?php echo $result_search->count_only == "Y" ? "Yes" : "No"; ?></td>
                <td><?php echo $result_search->intime_ind == "Y" ? "Yes" : "No"; ?></td>
                <td><?php echo $result_search->escalated_ind == "Y" ? "Yes" : "No"; ?></td>
                <?php if($GLOBALS['result']->customer_entered == "Y") { ?><td><?php if(isset($result_search->given_name)){ if($result_search->given_name != "Used") echo $result_search->given_name; } if(isset($result_search->surname)){ if($result_search->surname != "Not") echo " " .base64_decode($result_search->surname); } ?></td><?php } ?>
                <?php if($GLOBALS['result']->company_entered == "Y") { ?><td><?php echo $result_search->company_name; ?></td><?php } ?>
                <?php if($GLOBALS['result']->location_entered == "Y") { ?><td><?php if(isset($result_search->house_suffix) && isset($result_search->house_no) && strlen($result_search->house_no) > 0 && strlen($result_search->house_suffix) > 0 && $result_search->house_no != $result_search->house_suffix){ echo base64_decode($result_search->house_suffix); } else{ echo $result_search->house_no; } if(isset($result_search->street_name)){ echo " " .$result_search->street_name; } if(isset($result_search->street_type)){ echo " " .$result_search->street_type; } if(isset($result_search->locality_name)){ echo " " .$result_search->locality_name; } ?></td><?php } ?>
                <?php if($GLOBALS['result']->facility_entered == "Y") { ?><td><?php echo base64_decode($result_search->facility_name); ?></td><?php } ?>
                 <?php if($GLOBALS['result']->request_description_entered == "Y") { ?><td><?php echo base64_decode($result_search->request_description); ?></td><?php } ?>
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
	echo "Either no results found or you did not enter data in any fields.";	
}
?>
