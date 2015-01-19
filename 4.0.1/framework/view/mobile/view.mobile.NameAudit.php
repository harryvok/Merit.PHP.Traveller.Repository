<ul class="no-ellipses" data-role="listview" data-count-theme="b" data-inset="true" data-filter="true" data-filter-placeholder="Search requests...">
    <?php            
    if(isset($GLOBALS['result']->audit_details)){
        if(count($GLOBALS['result']->audit_details) > 1){
            $i=-1;
            foreach($GLOBALS['result']->audit_details as $result){
                $i++;
                ?>
                <li>
                    <p><b>Date:</b> <?php if($result->audit_date != "0001-01-01T00:00:00"){ echo date('d/m/Y h:i A',strtotime($result->audit_date)); } ?></p>
                    <p><b>Officer:</b> <?php echo isset($result->audit_officer) ? $result->audit_officer : ""; ?></p>
                    <p><b>Field:</b> <?php echo isset($result->audit_field) ? $result->audit_field : ""; ?></p>
                    <p><b>Operation:</b> <?php echo isset($result->audit_operation) ? $result->audit_operation : ""; ?></p>
                    <p><b>Before:</b><?php echo isset($result->before_data) ? $result->before_data : ""; ?></p>
                    <p><b>After:</b><?php echo isset($result->after_data) ? $result->after_data : ""; ?></p>                            
                </li>
                <?php                                             
            }
        }
        elseif(count($GLOBALS['result']->audit_details) == 1){
            $result = $GLOBALS['result']->audit_details;
            ?>
            <li>
                <p><b>Date:</b> <?php if($result->audit_date != "0001-01-01T00:00:00"){ echo date('d/m/Y h:i A',strtotime($result->audit_date)); } ?></p>
                <p><b>Officer:</b> <?php echo isset($result->audit_officer) ? $result->audit_officer : ""; ?></p>
                <p><b>Field:</b> <?php echo isset($result->audit_field) ? $result->audit_field : ""; ?></p>
                <p><b>Operation:</b> <?php echo isset($result->audit_operation) ? $result->audit_operation : ""; ?></p>
                <p><b>Before:</b><?php echo isset($result->before_data) ? $result->before_data : ""; ?></p>
                <p><b>After:</b><?php echo isset($result->after_data) ? $result->after_data : ""; ?></p>                        
            </li>
            <?php                                             
        }
    }
    ?>
</ul>
 



