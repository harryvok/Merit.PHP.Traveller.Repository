<?php 
if(isset($GLOBALS['result']->booking_dets->booking_details) && count($GLOBALS['result']->booking_dets->booking_details) > 0){
?>
    <div data-role="collapsible" class="col" data-collapsed="true" data-corners="false" data-content-theme="c">
        <h4>Booking Summary</h4>
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