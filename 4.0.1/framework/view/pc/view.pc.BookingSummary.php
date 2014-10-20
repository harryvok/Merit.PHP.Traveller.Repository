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
    <b>Maximum:</b> <span id="bookingMaximum"></span><br />
    <b>Response:</b> <span id="bookingResponse"></span><br />
    <b>Include:</b> 
    <input type="radio" id="includeSaturday" name="includeSaturday" checked value="Saturday"><label for="includeSaturday"><b>Saturday</b></label>&nbsp
    <input type="radio" id="includeSunday" name="includeSunday"  value="Sunday"><label for="includeSunday"><b>Sunday</b></label>&nbsp
    <input type="radio" id="includeHolidays" name="includeHolidays"  value="Holidays"><label for="includeHolidays"><b>Holidays</b></label>&nbsp
    <input type="radio" id="includeSpecialHolidays" name="includeSpecialHolidays"  value="SpecialHolidays"><label for="SpecialHolidays"><b>Special Holidays</b></label>&nbsp<br />
    <b>From:</b><input type="text" name="from" id="from" class="dateField text_udf_small" size="5" maxlength="10" >

     <table id="requestDocumentTable" class=" sortable" title="" cellspacing="0">
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
                 }
                ?> 
            </tbody>
         </table>

</div>
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