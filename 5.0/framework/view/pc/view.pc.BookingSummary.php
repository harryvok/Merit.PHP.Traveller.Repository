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
            $("#from").datepicker({ dateFormat: "dd-M-yy" });
            $("#from").val("dd-mmm-yyyy");
            $("#selectedDate.html").html($("#from").val());
            $("#stop").val("Stop");

            //show rows based on user click event
            $("#bookings tbody tr ").click(function () {
                $("#placeBookingDate").prop("disabled", "");
                var id = "";
                id = $(this).attr('id');                
                var disp_date = $("#display_date_" + id).val();
                var startStop = $(this).find("td:nth-child(6)").html();
                if (startStop == "Stopped") {
                    $("#stop").val("Start");
                }
                else {
                    $("#stop").val("Stop");
                }
                $("#from").val(disp_date);

                var avail = $(this).find("td:nth-child(5)").html();
                if (avail == 0) {
                    $("#placeBookingDate").prop("disabled", "disabled");
                }                
                //start stop booking
                $("#stop").click(function () {
                    var d = "";
                    d = $("#booking_date_" + id).val();
                    var act = "";
                    if ($("#stop").val() == "Start") {
                        act = "START";
                    }
                    else if ($("#stop").val() == "Stop") {
                        act = "STOP"
                    }                    
                    var date = new Date(d);
                    var isodate = date.toISOString();
                    bookingStartStop(act, isodate);
                }); 
                
                //place booking
                $("#placeBookingDate").click(function () {
                    if ($("#from").val() != "yyyy/mm/dd" || $("#from").val() != "") {
                        $("#duedate").html("<label>Due Date:</label> " + $("#from").val());
                        $("#due").val($("#booking_date_" + id).val());
                        $("#popup").fadeOut("fast");
                    } else {
                        alert("please select a date");
                    }
                });                
            });           

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
                    var yyyy = parseInt(splitArr[2],10); // add '20' before year
                    var mm = parseInt(months[splitArr[1].toLowerCase()],10) - 1; // convert month into lower
                    var dd = parseInt(splitArr[0],10) + 1;                   
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
    <b>From: </b><input type="text" name="from" id="from" class="dateField text_udf_small" size="5" maxlength="10" style="width:10%" ><input type="button" id="get" name="get" value="Get"/>
     <div>
     <table id="bookings" class="sortable" title="" cellspacing="0" >
            <thead>
                <tr>
                    <th style="width:170px; text-align:center">Booked Date</th>
                    <th style="width:150px; text-align:center">Booked Count</th>
                    <th style="width:150px; text-align:center">Available No.</th>
                    <th style="width:170px; text-align:center">Still Open?</th>
                    <th style="text-align:center">Comments</th>
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
                            $day = date("l", strtotime($datetime));
                            $date = substr($datetime,0,10);
                            $formated = date("d-M-Y", strtotime($date));
                ?>
                <tr class="<?php echo $class; ?>" id="BookingDetails<?php echo $i; ?>ParentObject">
                    <input type="hidden" id="booking_date_BookingDetails<?php echo $i; ?>ParentObject" value="<?php echo $date; ?>" />
                    <input type="hidden" id="display_date_BookingDetails<?php echo $i; ?>ParentObject" value="<?php echo $formated; ?>" />
                                 <td style="text-align:right"><?php echo $day." ".$formated; ?></td>
                                 <td style="text-align:center"><?php echo $booking_detail->booked_count; ?></td>
                                 <td style="text-align:center"><?php echo $booking_detail->available_count; ?></td>
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
<input type="button" id="stop" name="stop" value=""/>
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