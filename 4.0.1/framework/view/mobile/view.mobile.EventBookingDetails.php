<a href="#" data-rel="back" data-role="button" data-theme="a" data-icon="delete" data-iconpos="notext" class="ui-btn-left">Close</a>
<div data-role="header" data-tap-toggle="false"> <h1>Event Booking Details</h1> </div>
<div data-role="content">
    <p>
        <ul data-role="listview"  data-inset="true">
            <script type="text/javascript">
                $(document).ready(function () {
                    $("#event_booking").prop("disabled", false).buttonState("enable");
                    $("#event_booking").removeAttr("disabled");
                    $("#event_booking").removeAttr("style");
                    $("#popup").popup("open");
                    $("#default").page('destroy');
                    $("#default").page();                   
                    //$("#popup").css("width", "50%");
                    //$("#popup").css("margin", "110px auto");
                    $("#stop").click(function () {
                        $("#popup").popup("close");
                    });
                    $("#placeEvent").click(function () {
                        if ($("#attendees_no").val() != "") {
                            $("#duedate").html("<label>Due Date:</label> " + $("#evnt_date").val());
                            //$("#due").val($("#booking_date_" + id).val());
                            $("#udf_1").val($("#attendees_no").val());
                            $("#popup").popup("close");
                        } else {
                            alert("please select number of attendees.");
                        }
                    });
                });
            </script> 
            <?php
            $datetime = $GLOBALS['result']->event_date;
            $day = date("l", strtotime($datetime));
            $date = substr($datetime,0,10);
            $formated = date("d-M-Y", strtotime($date));
            ?>
            <input type="hidden" name="evnt_date" id="evnt_date" value="<?php echo $formated;?>"/>    	
            <p><b>Event:</b> <?php echo $GLOBALS['result']->event_name; ?></p>
            <p><b>Event Date:</b> <?php echo $formated; ?></p>
            <p><b>Booking Date:</b> <?php echo date("d-M-Y"); ?></p>
            <p><b>Attending: </b> <?php echo $GLOBALS['result']->total_attendees; ?>
            <p><b>Available: </b> <?php echo $GLOBALS['result']->free_slots; ?>
            <p><b>Total: </b> <?php echo $GLOBALS['result']->maximum_slot; ?>
            <p>  
                <table>
                    <tr style="font-size:small">
                        <td>
                            <b>No of Attendees:</b> 
                        </td>
                        <td>
                            <?php
                            if($GLOBALS['result']->free_slots >= 1){ ?>
                                <select name="attendees_no" id="attendees_no">
                                    <option value="0" selected="selected">Select</option>
                                    <?php 
                                    for($i = 1; $i <= $GLOBALS['result']->free_slots; $i++){ ?>
                                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option> <?php
                                    }                
                                    ?>
                                </select>
                            <?php
                            }
                            else{
                                ?>
                                No further attendees can attend this event. 
                            <?php
                            }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr style="font-size:small">
                        <td>
                            <b>Transport Reqd:</b>
                        </td>
                        <td>
                            <input type="checkbox" name="trns_req" id="trns_req" style="height:18px;width:40px;float:right"/> 
                        </td>
                    </tr>
                    <tr style="font-size:small">
                        <td></td>
                        <td>(ensure location address is entered.)</td>
                    </tr>
                </table>
            </p>
            <br />
            <br />
            <p>
                <input type="button" value="    Ok    " id="placeEvent"/>        
                <input type="button" id="stop" name="stop" value="Cancel"/>
            </p>          
        </ul>
    </p>
</div>
