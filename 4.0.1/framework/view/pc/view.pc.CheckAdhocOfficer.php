<?php
if(isset($GLOBALS['result']->adhoc_officer_det) && count($GLOBALS['result']->adhoc_officer_det) > 0){
?>
<script type="text/javascript">

    $(document).ready(function () {
        $("#popup").fadeIn("fast");

        // This function triggers on the first click of save
        // Prompts user to select a adhoc officer
        // On clicking "submit", it renables the save button, clicks it, unbinds the submit button so multiple officers can't be added and disables savemore
        // and save/count. and then disables the save button whilst the system proccess the request.
         
        $(".newOfficerText").click();

        $("#submitAdhoc").click(function () {
            if ($(".newOfficerText").val().length > 0 && $(".officer").val().length > 0) {
                $("#adhocOfficer").html("");
                var i = 0;
                $(".adhocOfficerContent").each(function () {
                    var valu = $("#" + i + "_officer").val();
                    $("#adhocOfficer").append($(this).html());
                    $("#adhocOfficer #" + i + "_officer").val(valu);
                    i++;
                });

                $("#submit").prop('disabled', false).buttonState("enable");
                $("#newrequest").unbind("submit");
                $("#submit").click();
                
                $(this).attr("disabled", true).buttonState("disable");
                $("#saveMore").attr("disabled", true).buttonState("disable");
                $("#saveCountOnly").attr("disabled", true).buttonState("disable");
                $("#submit").prop('disabled', true).buttonState("enable");


            }
            else {
                alert("Please type and choose a valid officer");
            }
        });

    });
</script>
<h1>Adhoc Officer Required</h1>
<div>

        <?php
    if(count($GLOBALS['result']->adhoc_officer_det) > 1){
        $i=0;
        foreach($GLOBALS['result']->adhoc_officer_det as $adhoc){
        ?>
        <h2>Action Required: <?php echo $adhoc->action_reqd; ?></h2>
        <b>Assign to Officer:</b>
        <input id="<?php echo $i; ?>" class="newOfficerText" data-officer="true" placeholder="Search..." />
        <div class="adhocOfficerContent">
            <input type="hidden" id="<?php echo $i; ?>Code" class="officer" name="<?php echo $i; ?>_officer" />
            <input type="hidden" id="<?php echo $i; ?>_action_reqd" name="<?php echo $i; ?>_action_reqd" value="<?php echo $adhoc->action_reqd; ?>" />
            <input type="hidden" id="<?php echo $i; ?>_position_no" name="<?php echo $i; ?>_position_no" value="<?php echo $adhoc->position_no; ?>" />
        </div>
        <hr />
        <?php
            $i++;
        }
    }
    elseif(count($GLOBALS['result']->adhoc_officer_det) == 1){
        $adhoc = $GLOBALS['result']->adhoc_officer_det;
        ?>
        <h2>Action Required: <?php echo $adhoc->action_reqd; ?></h2>
        <b>Assign to Officer:</b>
        <input id="0" class="newOfficerText" data-officer="true" placeholder="Search..." />
        <div class="adhocOfficerContent">
            <input type="hidden" id="0Code" name="0_officer" class="officer" />
            <input type="hidden" id="0_action_reqd" name="0_action_reqd" value="<?php echo $adhoc->action_reqd; ?>" />
            <input type="hidden" id="0_position_no" name="0_position_no" value="<?php echo $adhoc->position_no; ?>" />
        </div>
        <?php
        $i=1;
    }
        ?>
        <div class="adhocOfficerContent">
            <input type="hidden" name="countAdhoc" id="countAdhoc" value="<?php echo $i; ?>" />
        </div>
        <input type="button" id="submitAdhoc" value="Submit">
        </div>

<?php
}
else{
?>
<script type="text/javascript">
    $("#submit").prop('disabled', false).buttonState("enable");
    $("#newrequest").unbind("submit");
    $("#newrequest INPUT[type=submit]").click();
    $(this).attr("disabled", true).buttonState("disable");
    $("#saveMore").attr("disabled", true).buttonState("disable");
    $("#saveCountOnly").attr("disabled", true).buttonState("disable");
</script>
<?php	
}
?>
