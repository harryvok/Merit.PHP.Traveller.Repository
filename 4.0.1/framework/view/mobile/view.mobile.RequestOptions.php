<div data-role="collapsible" data-collapsed="false">
    <script type="text/javascript">
        $(document).ready(function () {

            $(".notifyOfficerOption").click(function () {
                if (confirm("A Notification will be sent to the Inusrance Officer. Do you want to proceed?")) {
                    notifyInsuranceOfficer();
                }
            });

        });
</script>
    <h4>Options</h4>
    <p>
        <?php if($GLOBALS['finalised_ind'] == "Y" && $GLOBALS['count_only'] == "N" && $_SESSION['roleSecurity']->maint_req_reopen == "Y"){ ?>
            <a data-role="button" href="index.php?page=view-request&id=<?php echo $_GET['id']; ?>&d=reopenRequest">Reopen Request</a>
            <?php } elseif($GLOBALS['finalised_ind'] == "N" && $_SESSION['roleSecurity']->maint_recat == "Y" || $GLOBALS['count_only'] == "Y" && $_SESSION['roleSecurity']->maint_recat == "Y"){  ?>
            <a data-role="button" href="index.php?page=view-request&id=<?php echo $_GET['id']; ?>&d=recategoriseRequest">Recategorise Request</a><?php } ?>
            <?php if($_SESSION['roleSecurity']->maint_req_del == "Y") { ?><a data-role="button" href="index.php?page=view-request&id=<?php echo $_GET['id']; ?>&d=deleteRequest">Delete Request</a><?php } ?>
            <a data-role="button" href="#" class="notifyOfficerOption">Notify Insurance Officer</a>
    </p>
</div>




