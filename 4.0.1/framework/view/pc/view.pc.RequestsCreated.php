
<?php
if(isset($GLOBALS['result']->requests_created_details) && count($GLOBALS['result']->requests_created_details) > 1){
?>
<script type="text/javascript">
    $(document).ready(function () {
        var oTable = $('#addressRequestsTable').dataTable({
            iDisplayLength: 50,
            "aaSorting": [[0, "desc"]],
            "oLanguage": {
                "sSearch": "Intray Filter: "
            }
        });
    });
</script>
  <div class="summaryContainer">
    <h1>Requests Created Today (<?php echo count($GLOBALS['result']->requests_created_details); ?>)</h1>
    <div>
   <div class="float-left">
          <input type="hidden" name="val" id="val" value="0" />
          
          	<!-- <input type="text" id="addressRequests" class="tableSearch" placeholder="Search..." /> -->
                  <table id="addressRequestsTable" class=" sortable" title="" cellspacing="0">
                  <thead>
                  <tr>
                      <th class="sortable">Request ID</th>
                      <th class="sortable">Service - Request - Function</th>
                      <th class="sortable">Location Address</th>
                      <th class="sortable">Customer Name</th>
                      <th class="sortable">Count Only</th>
                     
                  </tr>
                  </thead>
                  <tbody>
                  <?php
    $number=0;
    if(isset($GLOBALS['result']->requests_created_details) && count($GLOBALS['result']->requests_created_details) > 1){
        foreach($GLOBALS['result']->requests_created_details as $result){
            $change = $result->request_id;
            $number = $number+1;
            if($number == 2){
                $class = "dark";
                $number = 0;
            }
            else{
                $class = "light";
            }
                  ?>
                              <tr class="<?php echo $class; ?>" data-new-window="index.php?page=view-request&id=<?php echo $result->request_id; ?>">
                                  <td><?php if(strlen($result->request_id) > 0){ echo $result->request_id; } else { echo ""; } ?></td>
                                  <td><?php if(strlen($result->service_name) > 0){ echo $result->service_name; } else { echo ""; } ?><?php if(strlen($result->request_name) > 0){ echo " / ".$result->request_name; } else { echo ""; } ?><?php if(strlen($result->function_name) > 0){ echo " / ".$result->function_name; } else { echo ""; } ?></td>
                                  <td><?php if(isset($result->location_address)) echo $result->location_address; ?></td>
                                  <td><?php if(isset($result->customer_name)) echo $result->customer_name; ?></td>
                                <td><?php if(isset($result->count_only)){ echo $result->count_only == "Y" ? "Yes": "No"; } ?></td>
                              </tr>
                              <?php
        }
        
    }
    elseif(isset($GLOBALS['result']->requests_created_details) && count($GLOBALS['result']->requests_created_details) == 1){
        $change = $GLOBALS['result']->requests_created_details;
                              ?>
                         <tr class="dark" data-new-window="index.php?page=view-request&id=<?php echo $result->request_id; ?>">
                                  <td><?php if(strlen($result->request_id) > 0){ echo $result->request_id; } else { echo ""; } ?></td>
                                  <td><?php if(strlen($result->service_name) > 0){ echo $result->service_name; } else { echo ""; } ?><?php if(strlen($result->request_name) > 0){ echo " / ".$result->request_name; } else { echo ""; } ?><?php if(strlen($result->function_name) > 0){ echo " / ".$result->function_name; } else { echo ""; } ?></td>
                                  <td><?php if(isset($result->location_address)) echo $result->location_address; ?></td>
                                  <td><?php if(isset($result->customer_name)) echo $result->customer_name; ?></td>
                                <td><?php if(isset($result->count_only)){ echo $result->count_only == "Y" ? "Yes": "No"; } ?></td>
                              </tr>
                          <?php
    }
                          ?>
                  </tbody>
                  </table>
          </div>
      </div>
   </div>
<?php
}
else{
    ?>
    <script type="text/javascript">
        $(document).ready(function () { $("#requestsTab").hide(); });
    </script>
    <?php   
}
?>