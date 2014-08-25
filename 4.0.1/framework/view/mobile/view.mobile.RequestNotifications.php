<div data-role="collapsible">
    <h4>Notifications <span class="ui-li-count ui-btn-up-c ui-btn-corner-all"><?php if(isset($GLOBALS['result']['notifications']->notification_details)) echo count($GLOBALS['result']['notifications']->notification_details); else echo 0; ?></span></h4>
    <p>
        <strong>Filter</strong>
        <select name="filterType" id="filterChange">
            <option value="">All</option>
                <option value="Customer">Customer</option>
                <option value="Responsible">Responsible</option>
                <option value="Action">Action</option>
                <option value="Supervisor">Supervisor</option>
        </select>
        <ul class="no-ellipses" data-role="listview" data-count-theme="b" data-inset="true">
            <?php
            
            if(isset($GLOBALS['result']['notifications']->notification_details)){
                if(count($GLOBALS['result']['notifications']->notification_details) > 1){
                    $i=-1;
                    foreach($GLOBALS['result']['notifications']->notification_details as $result_c_get){
                        $i++;
                        ?>
                        <li>
                            <p><b>Sent Time:</b><?php if(isset($result_c_get->escalate_time) && $result_c_get->escalate_time != "1970-01-01T00:00:00" && strlen($result_c_get->escalate_time) > 0){ echo date('d/m/Y h:i A',strtotime($result_c_get->escalate_time)); } else { echo ""; }  ?></p>
                            <p><b>Reason:</b><?php if(isset($result_c_get->reason_sent)) echo $result_c_get->reason_sent; ?></p>
                            <p><b>Sent To:</b><?php if(isset($result_c_get->sent_to)) echo $result_c_get->sent_to; ?></p>
                            <p><b>Sent By:</b><?php if(isset($result_c_get->sent_by)) echo $result_c_get->sent_by; ?></p>
                            <p><b class="filterObject" id="filterObject<?php echo $i; ?>">Type:</b><?php if(isset($result_c_get->officer_type)) echo $result_c_get->officer_type; ?></p>
                            <p><b>Notification:</b> <?php if(isset($result_c_get->comments)) echo base64_decode($result_c_get->comments); ?></p>
                        </li>
                        <?php
                                              
                    }
                }
                elseif(count($GLOBALS['result']['notifications']->notification_details) == 1){
                    $result_c_get = $GLOBALS['result']['notifications']->notification_details;
                    ?>
                    <li>
                        <p><b>Sent Time:</b><?php if(isset($result_c_get->escalate_time) && $result_c_get->escalate_time != "1970-01-01T00:00:00" && strlen($result_c_get->escalate_time) > 0){ echo date('d/m/Y h:i A',strtotime($result_c_get->escalate_time)); } else { echo ""; }  ?></p>
                            <p><b>Reason:</b><?php if(isset($result_c_get->reason_sent)) echo $result_c_get->reason_sent; ?></p>
                            <p><b>Sent To:</b><?php if(isset($result_c_get->sent_to)) echo $result_c_get->sent_to; ?></p>
                            <p><b>Sent By:</b><?php if(isset($result_c_get->sent_by)) echo $result_c_get->sent_by; ?></p>
                            <p><b class="filterObject" id="filterObject0">Type:</b><?php if(isset($result_c_get->officer_type)) echo $result_c_get->officer_type; ?></p>
                            <p><b>Notification:</b> <?php if(isset($result_c_get->comments)) echo base64_decode($result_c_get->comments); ?></p>
                    </li>
                    <?php
                                              
                }
            }
            ?>
        </ul>
    </p>
</div>




