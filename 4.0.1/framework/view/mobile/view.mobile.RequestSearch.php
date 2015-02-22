<?php
if(isset($GLOBALS['result']->request_search_details)){
    ?>
    <p>Found <b><?php echo count($GLOBALS['result']->request_search_details); ?></b> results.</p>
    <ul class="no-ellipses" data-role="listview" data-filter="true" data-filter-placeholder="Filter.." data-inset="true">
         <?php
        if(count($GLOBALS['result']->request_search_details) > 1){            
                foreach($GLOBALS['result']->request_search_details as $result_search){
                    if($result_search->request_id != 0){
                        ?>
                        <li>
                            <a data-transition="slide" href="index.php?page=view-request&id=<?php echo $result_search->request_id; ?>&ref_page=search">
                                <p><b>Request Id: </b> <?php echo $result_search->request_id; ?> </p>
                                <p><b>Input Date: </b> <?php echo $result_search->input_date; ?> </p>
                                <p><b>SRF: </b> <?php echo base64_decode($result_search->service_name); ?> - <?php echo base64_decode($result_search->request_name); ?> - <?php if(isset($result_search->function_name)) echo base64_decode($result_search->function_name); ?></p>
                                <p><b>Finalised: </b> <?php echo $result_search->finalised_ind == "Y" ? "Yes" : "No"; ?> </p>
                                <p><b>Count Only: </b> <?php echo $result_search->count_only == "Y" ? "Yes" : "No"; ?> </p>
                                <p><b>Intime: </b> <?php echo $result_search->intime_ind == "Y" ? "Yes" : "No"; ?> </p>
                                <p><b>Escalated: </b> <?php echo $result_search->escalated_ind == "Y" ? "Yes" : "No"; ?> </p>
                                <?php if($GLOBALS['result']->customer_entered == "Y") { ?><p><b>Customer: </b> <?php if(isset($result_search->given_name)){ if($result_search->given_name != "Used") echo $result_search->given_name; } if(isset($result_search->surname)){ if($result_search->surname != "Not") echo " " .base64_decode($result_search->surname); } ?> </p> <?php } ?>
                                <?php if($GLOBALS['result']->company_entered == "Y") { ?><p><b>Company: </b> <?php echo $result_search->company_name; ?> </p> <?php } ?>
                                <?php if($GLOBALS['result']->location_entered == "Y") { ?><p><b>Address: </b> <?php echo $result_search->request_id; ?> </p> <?php } ?>
                                <?php if($GLOBALS['result']->facility_entered == "Y") { ?><p><b>Facility: </b> <?php if(isset($result_search->house_suffix) && isset($result_search->house_no) && strlen($result_search->house_no) > 0 && strlen($result_search->house_suffix) > 0 && $result_search->house_no != $result_search->house_suffix){ echo base64_decode($result_search->house_suffix); } else{ echo $result_search->house_no; } if(isset($result_search->street_name)){ echo " " .$result_search->street_name; } if(isset($result_search->street_type)){ echo " " .$result_search->street_type; } if(isset($result_search->locality_name)){ echo " " .$result_search->locality_name; } ?> </p> <?php } ?>
                                <?php if($GLOBALS['result']->request_description_entered == "Y") { ?><p><b>Request Description: </b> <?php echo base64_decode($result_search->request_description); ?> </p> <?php } ?>
                            </a>
                        </li>
                        <?php
                    }
                }                
            }        
        ?>
    </ul>
    <?php    
}
else{
    echo "not found";
}?>