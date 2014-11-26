<div data-role="collapsible">
	<h4>History of Actual Changes</h4>
    <p>
    <ul class="no-ellipses" data-role="listview" data-count-theme="b" data-inset="true">
       <?php
        if(isset($GLOBALS['result']->request_remark_details)  && count($GLOBALS['result']->request_remark_details) > 1){
            foreach($GLOBALS['result']->request_remark_details as $result_c_ar){
                if($result_c_ar->sub_type == "Change"){
                    ?>
                    <li>
                        <?php echo $result_c_ar->note_datetime; ?>- <?php echo base64_decode($result_c_ar->comment); ?>
                    </li>
                    <?php
                }
            }
        }
        elseif(isset($GLOBALS['result']->request_remark_details)  && count($GLOBALS['result']->request_remark_details) == 1){
            if($GLOBALS['result']->request_remark_details->sub_type == "Change"){
				$result_c_ar = $GLOBALS['result']->request_remark_details;
            ?>
               <li>
                        <?php echo $result_c_ar->note_datetime; ?>- <?php echo base64_decode($result_c_ar->comment); ?>
                    </li>
                <?php
            }
        }
    ?>
    </ul>
    </p>
    </div>