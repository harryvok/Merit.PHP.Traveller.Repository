<?php
if(isset($GLOBALS['result']->adhoc_officer_det) && count($GLOBALS['result']->adhoc_officer_det) >0){
?>
<script type="text/javascript">

    $(document).ready(function () {
        $("#popup").fadeIn("fast");

        $("#submitButton").hide();

        $("#submitAdhoc").click(function () {
            if ($(".newOfficerText").val().length > 0 && $(".officer").val().length > 0) {

                $("#submit").attr("disabled", false).button("enable");
                $("#newrequest").unbind("submit");
                $("#newrequest INPUT[type=submit]").trigger("click");
                $("#saveMore").attr("disabled", true).button("disable");
                $("#saveCountOnly").attr("disabled", true).button("disable");
                $("#submit").prop('disabled', true).button("disable");

            }
            else {
                alert("Please type and choose a valid officer");
            }
        });

        $('html, body').animate({
            scrollTop: $('#adhocOfficer').offset().top
        });

    });
</script>
<div data-role="collapsible" data-collapsed="false">
    <h4>Adhoc Officer Required</h4>
    <p>
        <ul data-role="listview" data-count-theme="b" data-inset="true">
            <?php
    if(count($GLOBALS['result']->adhoc_officer_det) > 1){
        $i=0;
        foreach($GLOBALS['result']->adhoc_officer_det as $adhoc){
            ?>
            <li><strong>Action Required:</strong> <?php echo $adhoc->action_reqd; ?></li>
            <li>Assign to Officer: 
                   <input type="text" id="<?php echo $i; ?>" class="newOfficerText" placeholder="Search..." data-officer="true" /></li>
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
            <li><strong>Action Required:</strong> <?php echo $adhoc->action_reqd; ?></li>
            <li>Assign to Officer:
                <input type="text" id="0" class="newOfficerText" placeholder="Search..." data-officer="true" /></li>
        </ul>
        <div class="adhocOfficerContent">
            <input type="hidden" id="0Code" name="0_officer" class="officer" />
            <input type="hidden" id="0_action_reqd" name="0_action_reqd" value="<?php echo $adhoc->action_reqd; ?>" />
            <input type="hidden" id="0_position_no" name="0_position_no" value="<?php echo $adhoc->position_no; ?>" />
        </div>
        <?php
        $i=1;
    }
        ?>
        </ul>
        <div class="adhocOfficerContent">
            <input type="hidden" name="countAdhoc" id="countAdhoc" value="<?php echo $i; ?>" />
        </div>

        <input type="button" id="submitAdhoc" value="Submit">
    </p>
</div>

<?php
}
else{
?>
<script type="text/javascript">
    $("#submit").attr("disabled", false).button("enable");
    $("#newrequest").unbind("submit");
    $("#newrequest INPUT[type=submit]").trigger("click");
    $("#saveMore").attr("disabled", true).button("disable");
    $("#saveCountOnly").attr("disabled", true).button("disable");
    $("#submit").prop('disabled', true).button("disable");  
</script>
<?php	
}
?>
