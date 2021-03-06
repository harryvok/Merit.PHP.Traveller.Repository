<a href="#" data-rel="back" data-role="button" data-theme="a" data-icon="delete" data-iconpos="notext" class="ui-btn-left">Close</a>
<div data-role="header" data-tap-toggle="false"> <h1>Address Booked Services</h1> </div>
<div data-role="content">
    <p>
        <ul data-role="listview"  data-inset="true">
            <script type="text/javascript">
                $(document).ready(function () {
                    $("#popup").popup("open");
                    $("#default").page('destroy');
                    $("#default").page();
                    $("#bookingService").html($("#serviceInput").val());
                    $("#bookingRequest").html($("#requestInput").val());
                    $("#bookingFunction").html($("#functionInput").val());
                    //alert($("#chk_showall").val());
                    if ($("#chk_showall").val() == "Yes") {            
                        $("#viewall").attr("checked", "checked");
                    }
                    var addr = $("#lno").val();
                    if ($("#lfno").val() != "" && $("#lfno").val() != null) {
                        addr += " /" + $("#lfno").val();newRe
                    }
                    addr += " " + $("#lstreet").val() + " " + $("#ltype").val() + " " + $("#lsuburb").val() + " " + $("#lpostcode").val();
                    $("#location_addr").html(addr);

                    $("#stop").click(function () {
                        $("#popup").popup("close");
                    });

                    $("#placeaAllowance").click(function () {
                        $("#process_allowance").val("Yes");
                        $("#popup").popup("close");
                    });
                });

                function getallowance() {
                    if (viewall.checked == true) {
                        var show = "Y";
                        $("#chk_showall").val("Yes");
                        getAllowanceDetails(show);
                    }
                    else {
                        var show = "N";
                        $("#chk_showall").val("No");
                        getAllowanceDetails(show);
                    }
                }
            </script>
             	
            <p><b>Service: </b> <span id="bookingService"></span>
            <p><b>Request: </b> <span id="bookingRequest"></span>
            <p><b>Function: </b> <span id="bookingFunction"></span>
            <p><b>Location address: </b> <span id="location_addr"></span>
            <p><b>Number to Allocate:  <input type="text" name="alloc_no" id="alloc_no" value="<?php if ($GLOBALS['result']->available_count > 0) echo 1; else echo 0; ?>" readonly="readonly" style="color:black"/> </b><?php echo $GLOBALS['result']->available_text; ?>  </p> 
           
            <p style="display:inline"><b>Show All:</b><input type="checkbox" name="viewall" id="viewall" style="height:18px;width:40px;margin-left:20%;margin-top:-15px;" onchange="getallowance()"/></p>
            </br>
            <br />
            <?php
            if(isset($GLOBALS['result']->allowance_history->annual_allowance_history) && count($GLOBALS['result']->allowance_history->annual_allowance_history) > 1){
                foreach($GLOBALS['result']->allowance_history->annual_allowance_history as $allowance_detail){                        
            ?>                        
                        <li>                           
                            <p><b>Description: </b><?php echo $allowance_detail->srf_description; ?></p>
                            <p><b>Used: </b><?php echo $allowance_detail->allowance_date; ?></p>
                            <p><b>Number: </b><?php echo $allowance_detail->number_used; ?></p>                                                     
                        </li>
                    <?php
                }
            }
            else if(isset($GLOBALS['result']->allowance_history->annual_allowance_history) && count($GLOBALS['result']->allowance_history->annual_allowance_history) == 1){
                ?>                        
                    <li>                           
                        <p><b>Description: </b><?php echo $GLOBALS['result']->allowance_history->annual_allowance_history->srf_description; ?></p>
                        <p><b>Used: </b><?php echo $GLOBALS['result']->allowance_history->annual_allowance_history->allowance_date; ?></p>
                        <p><b>Number: </b><?php echo $GLOBALS['result']->allowance_history->annual_allowance_history->number_used; ?></p>                                                     
                    </li>
                <?php
            }
            else{
                 ?>                        
                    <li>                           
                        <p><?php echo "No data found"; ?> </p>
                    </li>
                <?php
            }
                    ?>
            <br />
            <br />
            <p>
                <input type="button" value="    Ok    " id="placeaAllowance" <?php if ($GLOBALS['result']->available_count <= 0) echo "disabled='disabled'"; ?> />               
                <input type="button" id="stop" name="stop" value="Cancel"/>
            </p>  
        </ul>
    </p>
</div>
