<a href="#" data-rel="back" data-role="button" data-theme="a" data-icon="delete" data-iconpos="notext" class="ui-btn-left">Close</a>
<div data-role="header" data-tap-toggle="false"> <h1>Event Booking Details</h1> </div>
<div data-role="content">
    <p>
        <ul data-role="listview"  data-inset="true">
            <script type="text/javascript">
                $(document).ready(function () {
                    //$("#event_booking").prop("disabled", false).buttonState("enable");
                    //$("#event_booking").removeAttr("disabled");
                    //$("#event_booking").removeAttr("style");
                    $("#popup").popup("open");
                    $("#default").page('destroy');
                    $("#default").page();
                    $("#bookingService").html($("#serviceInput").val());
                    $("#bookingRequest").html($("#requestInput").val());
                    $("#bookingFunction").html($("#functionInput").val());
                    var addr = $("#lno").val();
                    if ($("#lfno").val() != "" && $("#lfno").val() != null) {
                        addr += " /" + $("#lfno").val();
                    }
                    addr += " " + $("#lstreet").val() + " " + $("#ltype").val() + " " + $("#lsuburb").val() + " " + $("#lpostcode").val();
                    $("#location_addr").html(addr);

                    $("#stop").click(function () {
                        $("#popup").popup("close");
                    });

                    $("#placeaAllowance").click(function () {
                        $("#process_allowance").val("Yes");
                        $("#popup").popup("close");
                    })                    
                });
            </script> 
            <input type="hidden" name="evnt_date" id="evnt_date" value="<?php echo $formated;?>"/>    	
            <p><b>Service: </b> <span id="bookingService"></span>
            <p><b>Request: </b> <span id="bookingRequest"></span>
            <p><b>Function: </b> <span id="bookingFunction"></span>
            <p><b>Location address: </b> <span id="location_addr"></span>
            <p><b>Number to Allocate: </b> <input type="text" name="alloc_no" id="alloc_no" value="<?php if (count($GLOBALS['result']->allowance_history->annual_allowance_history) == $GLOBALS['result']->annual_allowance_count) echo 0; else echo 1; ?>" disabled="disabled" style="width:30px;"/> <?php if (count($GLOBALS['result']->allowance_history->annual_allowance_history) > 0) echo "( ".$GLOBALS['result']->available_text." )"; else echo "( None still available )";  ?>           
            <?php
                if(isset($GLOBALS['result']->allowance_history->annual_allowance_history) && count($GLOBALS['result']->allowance_history->annual_allowance_history) > 0){
                    foreach($GLOBALS['result']->allowance_history->annual_allowance_history as $allowance_detail){                        
                        ?>                        
                        <li>                           
                            <p><b>Description: </b><?php echo $allowance_detail->srf_description; ?></p>
                            <p><b>Used: </b><?php echo $allowance_detail->allowance_date; ?></p>
                            <p><b>Number. </b><?php echo $allowance_detail->number_used; ?></p>                                                     
                        </li>
                    <?php
                    }
                }
                ?>
            <br />
            <br />
            <p>
                <input type="button" value="    Ok    " id="placeaAllowance" <?php if (count($GLOBALS['result']->allowance_history->annual_allowance_history) == $GLOBALS['result']->annual_allowance_count) echo "disabled='disabled'"; ?> />               
                <input type="button" id="stop" name="stop" value="Cancel"/>
            </p>          
        </ul>
    </p>
</div>
