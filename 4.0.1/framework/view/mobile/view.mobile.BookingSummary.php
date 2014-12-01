<?php 
if(isset($GLOBALS['result']->booking_dets->booking_details) && count($GLOBALS['result']->booking_dets->booking_details) > 0){
    ?>
    <a href="#" data-rel="back" data-role="button" data-theme="a" data-icon="delete" data-iconpos="notext" class="ui-btn-left">Close</a>
    <div data-role="header" data-tap-toggle="false"> <h1>Booking Summary</h1> </div>
    <div data-role="content">
        <p>
        <ul data-role="listview" data-filter="true" data-filter-placeholder="Search keywords..." data-inset="true">
        <script type="text/javascript">
            $(document).ready(function () {
                $("#AddrBooking").prop("disabled", false).buttonState("enable");
                $("#AddrBooking").removeAttr("disabled");
                $("#AddrBooking").removeAttr("style");
                $("#popup").popup("open");
                $("#default").page('destroy');
                $("#default").page();
                $("#bookingService").html($("#serviceInput").val());
                $("#bookingRequest").html($("#requestInput").val());
                $("#bookingFunction").html($("#functionInput").val());
                $("#from").datepicker({ dateFormat: "dd-M-yy" });
                $("#from").val("dd-mmm-yyyy");

                $("#get").click(function () {
                    //if user clicks on any date from popup table, following function converts date in to toISOString date formate 
                    //and calls getBookingSummary()
                    //to ftch result for the next 10 days from the selected date
                    //converted because webservice taking date in toISOString() format and returning normal date 
                    if ($("#from").val() == "" || $("#from").val() == "dd-mmm-yyyy") {
                        alert("Please select date");
                    }
                    else {
                        var d = $("#from").val();
                        var months = { 'jan': '01', 'feb': '02', 'mar': '03', 'apr': '04', 'may': '05', 'jun': '06', 'jul': '07', 'aug': '08', 'sep': '09', 'oct': '10', 'nov': '11', 'dec': '12' };
                        var splitArr = d.split('-'); // split based on '-'
                        var yyyy = parseInt(splitArr[2], 10); // add '20' before year
                        var mm = parseInt(months[splitArr[1].toLowerCase()], 10) - 1; // convert month into lower
                        var dd = parseInt(splitArr[0], 10) + 1;
                        var date = new Date(yyyy, mm, dd);
                        var isodate = date.toISOString();
                        GetBookingSummary(isodate);
                    }
                });

                $(".address_row").click(function () {
                    id = $(this).attr('id');
                    for (i = 1; i <= 10; i++) {
                        if ($("#booking" + i).css("display", "block")) {
                            $("#booking" + i).css("display", "none")
                        }
                    }
                    var disp_date = $("#display_date_BookingDetails" + id + "ParentObject").val();
                    $("#from").val(disp_date);
                    if ($("#available" + id).val() == 0) {
                        $("#placeBookingDate" + id).prop("disabled", "disabled");
                    }

                    $("#booking" + id).css("display", "block");

                    if ($("#startstop" + id).val() == "Stopped")
                        $("#stop" + id).val("Start");
                    else
                        $("#stop" + id).val("Stop");

                    $("#placeBookingDate" + id).click(function () {
                        if ($("#from").val() != "yyyy/mm/dd" || $("#from").val() != "") {
                            $("#duedate").html("<label>Due Date: </label> " + $("#from").val());
                            $("#due").val($("#booking_date_BookingDetails" + id + "ParentObject").val());
                            $("#popup").fadeOut("fast");
                        } else {
                            alert("please select a date");
                        }
                    });

                    $("#stop" + id).click(function () {
                        var d = "";
                        d = $("#booking_date_BookingDetails" + id + "ParentObject").val();
                        var act = "";
                        if ($("#stop" + id).val() == "Start") {
                            act = "START";
                        }
                        else if ($("#stop" + id).val() == "Stop") {
                            act = "STOP"
                        }
                        var date = new Date(d);
                        var isodate = date.toISOString();
                        bookingStartStop(act, isodate);
                    });
                });
            });
        </script>     	
                <p><b>Service:</b> <span id="bookingService"></span></p>
                <p><b>Request:</b> <span id="bookingRequest"></span></p>
                <p><b>Function:</b> <span id="bookingFunction"></span></p>
                <p><b>Provider:</b> <span id="bookingProvider"><?php echo $GLOBALS['result']->provider;?></span></p>
                <p><b>Address:</b> <span id="bookingAddress"><?php echo $GLOBALS['result']->address;?></span></p>
                <p><b>Area:</b> <span id="bookingArea"><?php echo $GLOBALS['result']->area;?></span></p>
                <p><b>Maximum:</b> <span id="bookingMaximum"><?php echo $GLOBALS['result']->max_count;?></span></p>
                <p><b>Response:</b> <span id="bookingResponse"><?php echo $GLOBALS['result']->response;?></span></p>
                <p><b>Include:</b> <?php if ($GLOBALS['result']->include_saturday == "Y") echo "Saturday"; if ($GLOBALS['result']->include_sunday == "Y") echo " Sunday";  if ($GLOBALS['result']->include_holidays == "Y") echo " Holidays"; if ($GLOBALS['result']->include_sholidays == "Y") echo " Special Holidays"; ?></p>
                <p><b>From: </b><input type="text" name="from" id="from" class="dateField" size="5" maxlength="10" style="width:100%" ><input type="button" id="get" name="get" value="Get"/></p>
                
                <?php
                $set = 0;
                $i = 0;
                if(isset($GLOBALS['result']->booking_dets->booking_details) && count($GLOBALS['result']->booking_dets->booking_details) > 1){
                    foreach($GLOBALS['result']->booking_dets->booking_details as $booking_detail){
                        $set++;                        
                        $datetime = $booking_detail->booking_date;
                        $day = date("l", strtotime($datetime));
                        $date = substr($datetime,0,10);
                        $formated = date("d-M-Y", strtotime($date));
                        ?>
                        <li class="address_row ui-li-has-arrow" id="<?php echo $set; ?>">
                            <input type="hidden" id="booking_date_BookingDetails<?php echo $set; ?>ParentObject" value="<?php echo $date; ?>" />
                            <input type="hidden" id="display_date_BookingDetails<?php echo $set; ?>ParentObject" value="<?php echo $formated; ?>" />
                            <input type="hidden" id="startstop<?php echo $set; ?>" value="<?php echo $booking_detail->service_stopped; ?>" />
                            <input type="hidden" id="available<?php echo $set; ?>" value="<?php echo $booking_detail->available_count; ?>" />
                            <p><b>Booked Date: </b><?php echo $day." ".$formated; ?></p>
                            <p><b>Booked Count: </b><?php echo $booking_detail->booked_count; ?></p>
                            <p><b>Available No. </b><?php echo $booking_detail->available_count; ?></p>
                            <p><b>Still open: </b><?php echo $booking_detail->service_stopped; ?></p>
                            <p><b>Comments: </b><?php echo $booking_detail->reason; ?></p>
                            <p id="booking<?php echo $set; ?>" style="display:none">
                                <input type="button" value="Place" id="placeBookingDate<?php echo $set; ?>"/>
                                <input type="button" id="stop<?php echo $set; ?>" name="stop" value=""/>                    
                            </p>
                        </li>
                    <?php
                    }
                }
                ?>
            </ul>
    	</p>
    </div>
<?php
}else{
?>
<script type="text/javascript">
    $(document).ready(function () {
        $("#AddrBooking").css("visibility", "hidden");
    });
</script>
<?php 
}
?>