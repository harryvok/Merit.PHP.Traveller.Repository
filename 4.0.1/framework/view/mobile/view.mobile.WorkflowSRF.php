<?php
if(isset($GLOBALS['result']->workflow_details) && count($GLOBALS['result']->workflow_details) > 0){
    ?>
<script type="text/javascript">

    $(document).ready(function () {
        $("#popup").fadeIn("fast");
    });

    $('#closeWorkflow').click(function () {
        $('#popup').fadeOut("fast");
    });
</script>
<h1>Workflow <span  class="closePopup"><img src="images/delete-icon.png" /> Close</span></h1>
	<div>
    <iframe src="inc/ajax/ajax.WorkflowView.php?service_code=<?php echo $_GET['service_code']; ?>&request_code=<?php echo $_GET['request_code']; ?>&function_code=<?php echo $_GET['function_code']; ?>&serviceName=<?php echo $_GET['serviceName']; ?>&requestName=<?php echo $_GET['requestName']; ?>&functionName=<?php echo $_GET['functionName']; ?>&request_id=<?php echo $_GET['request_id']; ?>&requestDate=<?php echo $_GET['requestDate']; ?>" id="iframe" seamless="seamless"></iframe>
    <script type="text/javascript">$("#iframe").attr("width", "100%");</script>
</div>
<?php
}
else{
    echo "None";   
}
?>