<?php
    if(isset($GLOBALS['result']->property_details)){
?>
    <script type="text/javascript">
		$(document).ready(function(){
			$('.address_row').click(function(){
				var id = $(this).attr('id');
				//$('#same').val('i');
				$('#lno').val(" <?php $result_n_ar->unit_number; ?>"); // Unit number
			    $('#property_no').val("<?php $result_n_ar->property_no; ?>").removeClass("ui-autocomplete-loading");;
			    $('#address_id').val("<?php $result_n_ar->address_id; ?>"); 			
			    $('#address').val("<?php $result_n_ar->address_id; ?>"); 	
				$('#popup').fadeOut("fast");
			});   
            
		});
	</script>
    <h1>Found Properties<span  class="closePopup"><img src="images/delete-icon.png" /> Close</span></h1>
	<div>
    <table id="propertyLookupTable" class=" sortable" title="" cellspacing="0" style="color:black;">
    <thead>
    <tr>
        <!--<th class="job-id sortable">Unit/Flat Number</th>-->
        <!--<th class="job-id sortable">Unit</th>
        <th class="job-id sortable">Unit Suffix</th>-->
        <th class="job-id sortable">House/th>
        <th class="job-id sortable">Suffix</th>
        <th class="job-id sortable">Street Name</th>
        <th class="job-id sortable">Locality</th>
        <th class="job-id sortable">Postcode</th>
        <th class="job-id sortable">Legal Description</th>
        <th class="job-id sortable">Property No</th>
        <th class="job-id sortable">Assessment No</th>
        <th class="job-id sortable">Status</th>
        <th class="job-id sortable">Property Type</th>
        <th class="job-id sortable">Rate Analysis</th>        
    </tr>
    </thead>
    <tbody>
    <?php
    $number=0;
    if(isset($GLOBALS['result']->property_details) && count($GLOBALS['result']->property_details) > 1){
        foreach($GLOBALS['result']->property_details as $result_n_ar){
            $set = $result_n_ar->address_id;
            $number = $number+1;
            if($number == 2){
                $class = "dark";
                $number = 0;
            }
            else{
                $class = "light";
            }
            ?>     
                <tr class="<?php echo $class; ?> address_row" id="<?php echo $set; ?>" title="">
                    <!--<td>  <?php # echo "0"; ?></td>
                    <td><?php  # echo ""; ?></td>-->
                    <td><?php if(isset($result_n_ar->house_number)){ echo $result_n_ar->house_number; } else { echo ""; } ?></td>
                    <td><?php if(isset($result_n_ar->house_suffix)){ echo $result_n_ar->house_suffix; } else { echo ""; } ?></td>
                    <td><?php if(isset($result_n_ar->street_name) && ($result_n_ar->street_type )){ echo $result_n_ar->street_name." ".$result_n_ar->street_type; } else { echo ""; } ?></td>
                    <td><?php if(isset($result_n_ar->locality)){ echo $result_n_ar->locality; } else { echo ""; } ?></td>
                    <td><?php if(isset($result_n_ar->postcode)){ echo $result_n_ar->postcode; } else { echo ""; } ?></td>
                    <td><?php if(isset($result_n_ar->legal_description)){ echo $result_n_ar->legal_description; } else { echo ""; } ?></td>
                    <td><?php if(isset($result_n_ar->property_no)){ echo $result_n_ar->property_no; } else { echo ""; } ?></td>
                    <td><?php if(isset($result_n_ar->assessment_no)){ echo $result_n_ar->assessment_no; } else { echo ""; } ?></td>
                    <td><?php echo "Current"; ?></td>
                    <td><?php if(isset($result_n_ar->prop_type)){ echo $result_n_ar->prop_type; } else { echo ""; } ?></td>
                    <td><?php if(isset($result_n_ar->rate_analysis)){ echo $result_n_ar->rate_analysis; } else { echo ""; } ?></td>                
                </tr>
                <?php
        }
    }
    ?>
    </tbody>
    </table>
    </div>
<?php
}
?>