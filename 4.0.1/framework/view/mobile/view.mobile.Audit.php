<div data-role="collapsible">
    <h4>Audit</h4>
    <p>
        <strong>Filter</strong>
        <select name="filterType" id="filterChange">
            <option value="">All</option>
                <option value="EVENTS">Events</option>
                <option value="AUDIT">Audit</option>
        </select>
        <ul class="no-ellipses" data-role="listview" data-count-theme="b" data-inset="true">
            <?php
            
            if(isset($GLOBALS['result']->audit_details)){
                if(count($GLOBALS['result']->audit_details) > 1){
                    $i=-1;
                    foreach($GLOBALS['result']->audit_details as $result){
                        $i++;
                        ?>
                        <li>
                            <p><b>Date:</b> <?php if($result->audit_date != "0001-01-01T00:00:00"){ echo date('d/m/Y h:i A',strtotime($result->audit_date)); } ?></p>
                            <p><b>Field:</b> <?php echo isset($result->audit_field) ? $result->audit_field : ""; ?></p>
                            <p><b>Officer:</b> <?php echo isset($result->audit_officer) ? $result->audit_officer : ""; ?></p>
                            <p><b class="filterObject" id="filterObject<?php echo $i; ?>">Type:</b> <?php echo isset($result->audit_type) ? $result->audit_type : ""; ?></p>
                            <p><b>Description:</b> <?php echo isset($result->audit_description) ? $result->audit_description : ""; ?></p>
                        </li>
                        <?php
                                             
                    }
                }
                elseif(count($GLOBALS['result']->audit_details) == 1){
                    $result = $GLOBALS['result']->audit_details;
                    ?>
                    <li>
                        <p><b>Date:</b> <?php if($result->audit_date != "0001-01-01T00:00:00"){ echo date('d/m/Y h:i A',strtotime($result->audit_date)); } ?></p>
                        <p><b>Field:</b> <?php echo isset($result->audit_field) ? $result->audit_field : ""; ?></p>
                        <p><b>Officer:</b> <?php echo isset($result->audit_officer) ? $result->audit_officer : ""; ?></p>
                        <p><b class="filterObject" id="filterObject0">Type:</b> <?php echo isset($result->audit_type) ? $result->audit_type : ""; ?></p>
                        <p><b>Description:</b> <?php echo isset($result->audit_description) ? $result->audit_description : ""; ?></p>
                    </li>
                    <?php
                                             
                }
            }
            ?>
        </ul>
    </p>
</div>




