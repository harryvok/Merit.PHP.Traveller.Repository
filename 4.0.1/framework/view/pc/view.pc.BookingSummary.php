<?php 
if(isset($GLOBALS['result']->booking_dets->booking_details) && count($GLOBALS['result']->booking_dets->booking_details) > 0){
?> 
<script type="text/javascript">
        $(document).ready(function () {
            $("#popup").fadeIn("fast");

            $("#AddrBooking").removeAttr("disabled");

            $("#bookingService").html($("#serviceInput").val());
            $("#bookingRequest").html($("#requestInput").val());
            $("#bookingFunction").html($("#functionInput").val());

            //show rows based on user click event
            $("#bookings tbody tr ").click(function () {
                var date = $(this).find("td:first-child").html();
                $("#selectedDate").html(date);
            });
            $("#placeBookingDate").click(function () {
                if ($("#selectedDate").html() != "-") {
                    $("#duedate").html($("#selectedDate").html());
                    $("#popup").fadeOut("fast");
                } else {
                    alert("please select a date");
                }
            });

        });
</script>
<div class="summaryContainer">
    <h1>Booking Summary<span  class="closePopup"><img src="images/delete-icon.png" /> Close</span></h1>
    <b>Service:</b> <span id="bookingService"></span><br />
    <b>Request:</b> <span id="bookingRequest"></span><br />
    <b>Function:</b> <span id="bookingFunction"></span><br />
    <b>Provider:</b> <span id="bookingProvider"><?php echo $GLOBALS['result']->provider;?></span><br />
    <b>Address:</b> <span id="bookingAddress"><?php echo $GLOBALS['result']->address;?></span><br />
    <b>Area:</b> <span id="bookingArea"><?php echo $GLOBALS['result']->area;?></span><br />
    <b>Maximum:</b> <span id="bookingMaximum"><?php echo $GLOBALS['result']->max_count;?></span><br />
    <b>Response:</b> <span id="bookingResponse"><?php echo $GLOBALS['result']->response;?></span><br />
    <b>Include:</b> 
    <input type="checkbox" id="includeSaturday" name="includeSaturday" <?php if($GLOBALS['result']->include_saturday == "Y") echo "checked"; ?>  value="Saturday"><label for="includeSaturday"><b>Saturday</b></label>&nbsp
    <input type="checkbox" id="includeSunday" name="includeSunday" <?php if($GLOBALS['result']->include_sunday == "Y") echo "checked"; ?>   value="Sunday"><label for="includeSunday"><b>Sunday</b></label>&nbsp
    <input type="checkbox" id="includeHolidays" name="includeHolidays" <?php if($GLOBALS['result']->include_holidays == "Y") echo "checked"; ?>  value="Holidays"><label for="includeHolidays"><b>Holidays</b></label>&nbsp
    <input type="checkbox" id="includeSpecialHolidays" name="includeSpecialHolidays" <?php if($GLOBALS['result']->include_sholidays == "Y") echo "checked"; ?>  value="SpecialHolidays"><label for="SpecialHolidays"><b>Special Holidays</b></label>&nbsp<br />
    <b>From:</b><input type="text" name="from" id="from" class="dateField text_udf_small" size="5" maxlength="10" >
     <div  style="max-height:200px; overflow:scroll;">
     <table id="bookings" class=" sortable" title="" cellspacing="0" >
            <thead>
                <tr>
                    <th>Booked Date</th>
                    <th>Booked Count</th>
                    <th>Available No.</th>
                    <th>Still Open?</th>
                    <th>Comments</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $number=0;
                 if(isset($GLOBALS['result']->booking_dets->booking_details) && count($GLOBALS['result']->booking_dets->booking_details) > 1){
                     foreach($GLOBALS['result']->booking_dets->booking_details as $booking_detail){
                          $i=$i+1;
                            $number = $number+1;
                            if($number == 2){
                                $class = "dark";
                                $number = 0;
                            }
                            else{
                                $class = "light";
                            }
                ?>
                <tr class="<?php echo $class; ?>" id="BookingDetails<?php echo $i; ?>ParentObject">
                                 <td><?php echo $booking_detail->booking_date; ?></td>
                                 <td><?php echo $booking_detail->booked_count; ?></td>
                                 <td><?php echo $booking_detail->available_count; ?></td>
                                 <td><?php echo $booking_detail->service_stopped; ?></td>
                                 <td><?php echo $booking_detail->reason; ?></td>
                            </tr>
                <?php
                      }
                 }
                ?> 
            </tbody>
         </table>
         </div>

</div>
<input type="button" value="Place" id="placeBookingDate"/>
<input type="button" value="Details"/>
<input type="button" value="Stop"/>
<input type="button" value="Get"/>
<b>Selected Date: </b><span id="selectedDate">-</span>
<?php 
}else{
?> 
<script type="text/javascript">
    $(document).ready(function () {
        $("#AddrBooking").attr("disabled","disabled");
    });
</script>
<?php 
}
?> 