<div class="summaryContainer">
    <h1>Audit</h1>
    <div>
        <script type="text/javascript">
            $(document).ready(function () {
                var table = $("#auditTable").dataTable({
                    bPaginate: true,
                    iDisplayLength: 25,
                    "aoColumns": [
                        null,
                        { "sType": "date-euro" },
                        null,
                        null,
                        null,
                        null,
                    ],

                });
                table.fnSort([[1, 'desc']]);
            });
        </script>
        <table id="auditTable" class=" sortable" title="" cellspacing="0">
            <thead>
                <tr>
                    <th>Level</th>
                    <th class="sortable">Date</th>
                    <th class="sortable">Field</th>
                    <th class="sortable">Officer</th>
                    <th class="sortable">Type</th>
                    <th class="sortable">Description</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $number=0;
                if(isset($GLOBALS['result']->audit_details) && count($GLOBALS['result']->audit_details) > 1){
                    foreach($GLOBALS['result']->audit_details as $result){
                        $change = $result->action_id;
                        $number = $number+1;
                        if($number == 2){
                            $class = "dark";
                            $number = 0;
                        }
                        else{
                            $class = "light";
                        }
                        ?>
                <tr class="<?php echo $class; ?>"title="">
                    <td><?php echo $result->audit_level == "R" ? "Request" : "Action"; ?></td>
                    <td><?php if($result->audit_date != "0001-01-01T00:00:00"){ echo date('d/m/Y h:i A',strtotime($result->audit_date)); } ?></td>
                    <td><?php echo isset($result->audit_field) ? $result->audit_field : ""; ?></td>
                    <td><?php echo isset($result->audit_officer) ? $result->audit_officer : ""; ?></td>
                    <td><?php echo isset($result->audit_type) ? $result->audit_type : ""; ?></td>
                    <td><?php echo isset($result->audit_description) ? str_replace(";","<br/>",$result->audit_description)  : ""; ?></td>
                </tr>
                <?php
                    }
                }
                if(isset($GLOBALS['result']->audit_details) && count($GLOBALS['result']->audit_details) == 1){
                    $result = $GLOBALS['result']->audit_details;
                ?>
                <tr class="dark" title="">
                    <td><?php echo $result->audit_level == "R" ? "Request" : "Action"; ?></td>
                    <td><?php if($result->audit_date != "0001-01-01T00:00:00"){ echo date('d/m/Y h:i A',strtotime($result->audit_date)); } ?></td>
                    <td><?php echo isset($result->audit_field) ? $result->audit_field : ""; ?></td>
                    <td><?php echo isset($result->audit_officer) ? $result->audit_officer : ""; ?></td>
                    <td><?php echo isset($result->audit_type) ? $result->audit_type : ""; ?></td>
                    <td><?php echo isset($result->audit_description) ? str_replace(";","<br/>",$result->audit_description) : ""; ?></td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
