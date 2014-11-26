<?php 
if(isset($GLOBALS['result']->booking_dets->booking_details) && count($GLOBALS['result']->booking_dets->booking_details) > 0){
?>
    <script type="text/javascript">
        $(document).ready(function () {
            $("#AddrBooking").removeAttr("disabled");
            $("#popup").popup("open");
            $("#default").page('destroy').page();
            $("#bookingService").html($("#serviceInput").val());
            $("#bookingRequest").html($("#requestInput").val());
            $("#bookingFunction").html($("#functionInput").val());
            $("#from").datepicker({ dateFormat: "dd-M-yy" });
            $("#from").val("dd-mmm-yyyy");
            $("#selectedDate.html").html($("#from").val());
            $("#stop").val("Stop");
        });
    </script>
    <a href="#" data-rel="back" data-role="button" data-theme="a" data-icon="delete" data-iconpos="notext" class="ui-btn-left">Close</a>
    <div data-role="header" data-tap-toggle="false"> <h1>Booking Summary</h1> </div>
    <div data-role="content">
    	<p>
            <ul data-role="listview" data-filter="true" data-filter-placeholder="Search keywords..." data-inset="true">
                <li>
                    <p><b>Service:</b> <span id="bookingService"></span></p>
                    <p><b>Request:</b> <span id="bookingRequest"></span></p>
                    <p><b>Function:</b> <span id="bookingFunction"></span></p>
                    <p><b>Provider:</b> <span id="bookingProvider"><?php echo $GLOBALS['result']->provider;?></span></p>
                    <p><b>Address:</b> <span id="bookingAddress"><?php echo $GLOBALS['result']->address;?></span></p>
                    <p><b>Area:</b> <span id="bookingArea"><?php echo $GLOBALS['result']->area;?></span></p>
                    <p><b>Maximum:</b> <span id="bookingMaximum"><?php echo $GLOBALS['result']->max_count;?></span></p>
                    <p><b>Response:</b> <span id="bookingResponse"><?php echo $GLOBALS['result']->response;?></span></p>
                    <p><b>Include:</b> <?php if ($GLOBALS['result']->include_saturday == "Y") echo "Saturday"; if ($GLOBALS['result']->include_sunday == "Y") echo " Sunday";  if ($GLOBALS['result']->include_holidays == "Y") echo " Holidays"; if ($GLOBALS['result']->include_sholidays == "Y") echo " Special Holidays"; ?></p>
                </li>
            </ul>
    	</p>
    </div>
<?php
}else{
?>
<script type="text/javascript">
    $(document).ready(function () {
        $("#AddrBooking").attr("disabled", "disabled");
    });
</script>
<?php 
}
?>