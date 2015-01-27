<script type="text/javascript">
    $(document).ready(function () {
        $("#popup").fadeIn("fast");
        $("#popup").css("width", "50%");
        $("#popup").css("margin", "110px auto");
        $("#event_booking").removeAttr("disabled");
        $("#event_booking").removeAttr("style");
        $("#stop").click(function () {
            $("#popup").fadeOut("fast");
        });
        $("#placeEvent").click(function () {
            if ($("#attendees_no").val() != "") {
                $("#duedate").html("<label>Due Date:</label> " + $("#evnt_date").val());
                $("#due").val($("#actual_due").val());
                $("#udf_1").val($("#attendees_no").val());
                $("#popup").fadeOut("fast");
            } else {
                alert("please select number of attendees.");
            }
        });
    });
</script>
<div class="summaryContainer">
    <?php
    $datetime = $GLOBALS['result']->event_date;
    $day = date("l", strtotime($datetime));
    $date = substr($datetime,0,10);
    $formated = date("d-M-Y", strtotime($date));
    ?>
    <h1>Event Booking Details<span  class="closePopup"><img src="images/delete-icon.png" /> Close</span></h1>
    <br /><br /><br /><br />
    <b>Event: </b><?php echo $GLOBALS['result']->event_name; ?>
    <br /><br />
    <b>Event Date: </b><?php echo $formated; ?>
    <input type="hidden" name="actual_due" id="actual_due" value="<?php echo $date; ?>" />
    <input type="hidden" name="evnt_date" id="evnt_date" value="<?php echo $formated;?>"/>
    <br /><br />
    <b>Booking Date: </b><?php echo date("d-M-Y"); ?>
    <br /><br />
    <div>
        <table id="event_bookings" title="" cellspacing="0" style="width:50%;float:right">
            <thead>
                <tr>
                    <th style="width:170px; text-align:center">Attending</th>
                    <th style="width:150px; text-align:center">Available</th>
                    <th style="width:150px; text-align:center">Total</th>                    
                </tr>
            </thead>
            <tbody> 
                <tr class="light">                                   
                    <td style="text-align:center"><?php echo $GLOBALS['result']->total_attendees; ?></td>
                    <td style="text-align:center"><?php echo $GLOBALS['result']->free_slots; ?></td>
                    <td style="text-align:center"><?php echo $GLOBALS['result']->maximum_slot; ?></td>                                
                </tr>                
            </tbody>
        </table>
    </div>
    <div>
        <b>No of Attendees: </b>
        <?php
        if($GLOBALS['result']->free_slots >= 1){ ?>
        <select name="attendees_no" id="attendees_no" style="width:78px;">
            <option value="" selected="selected">Select</option>
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
    </div>      
    <div>
        <br /><br />
        <b>Transport Reqd: </b><input type="checkbox" name="trns_req" id="trns_req" style="height:18px;width:40px;"/> (ensure location address is entered.)
        <br /><br />
        <input type="button" value="    Ok    " id="placeEvent"/>        
        <input type="button" id="stop" name="stop" value="Cancel"/>
    </div>
</div>

