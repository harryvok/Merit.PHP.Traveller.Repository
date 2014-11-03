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
            $("#from").datepicker({ dateFormat: "yy-mm-dd" });
            $("#from").val("yyyy-dd-mm");
            $("#selectedDate.html").html($("#from").val());

            //show rows based on user click event
            $("#bookings tbody tr ").click(function () {
                var date = $(this).find("td:first-child").html();
                $("#from").val(date);
            });
            $("#placeBookingDate").click(function () {
                if ($("#from").val() != "yyyy/mm/dd" || $("#from").val() != "") {
                    $("#duedate").html("<label>Due Date:</label> " + $("#from").val());
                    $("#popup").fadeOut("fast");
                } else {
                    alert("please select a date");
                }
            });
            $("#get").click(function () {
                //if user clicks on any date from popup table, following function converts date in to toISOString date formate 
                //and calls getBookingSummary()
                //to ftch result for the next 10 days from the selected date
                //converted because webservice taking date in toISOString() format and returning normal date 
                if ($("#from").val() == "" || $("#from").val() == "yyyy-mm-dd") {
                    alert("Please select date");
                }
                else {
                    var d = $("#from").val();
                    var dateParts = d.split("-");
                    var yyyy = parseInt(dateParts[0], 10);
                    var mm = parseInt(dateParts[1], 10) - 1;
                    var dd = parseInt(dateParts[2], 10) + 1;
                    var date = new Date(yyyy, mm, dd);
                    var isodate = date.toISOString();
                    GetBookingSummary(isodate);
                }
            });

        });
</script>
<div class="summaryContainer">
    <h1>Booking Summary<span  class="closePopup"><img src="images/delete-icon.png" /> Close</span></h1>
    <b>Service/Request/Function:</b> <span id="bookingService"></span> / <span id="bookingRequest"></span> / <span id="bookingFunction"></span> <br />
<!--    <b>Request:</b> <br />
    <b>Function:</b> <br />-->
    <b>Provider:</b> <span id="bookingProvider"><?php echo $GLOBALS['result']->provider;?></span><br />
    <b>Address:</b> <span id="bookingAddress"><?php echo $GLOBALS['result']->address;?></span><br />
    <b>Area:</b> <span id="bookingArea"><?php echo $GLOBALS['result']->area;?></span><br />
    <b>Maximum:</b> <span id="bookingMaximum"><?php echo $GLOBALS['result']->max_count;?></span><br />
    <b>Response:</b> <span id="bookingResponse"><?php echo $GLOBALS['result']->response;?></span><br />
    <b>Include:</b> <?php if ($GLOBALS['result']->include_saturday == "Y") echo "Saturday"; if ($GLOBALS['result']->include_sunday == "Y") echo " Sunday";  if ($GLOBALS['result']->include_holidays == "Y") echo " Holidays"; if ($GLOBALS['result']->include_sholidays == "Y") echo " Special Holidays"; ?>
    <br />
    <b>From: </b><input type="text" name="from" id="from" placeholder="yyyy-mm-dd" class="dateField text_udf_small" size="5" maxlength="10" style="width:10%" ><input type="button" id="get" name="get" value="Get"/>
     <div  style="overflow:scroll;">
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
                            $datetime = $booking_detail->booking_date;
                            $date = substr($datetime,0,10);
                ?>
                <tr class="<?php echo $class; ?>" id="BookingDetails<?php echo $i; ?>ParentObject">
                                 <td><?php echo $date;  ?></td>
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
<!-- <input type="button" value="Details"/> -->
<input type="button" id="stop" value="Stop"/>
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