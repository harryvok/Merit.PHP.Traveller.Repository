<div data-role="collapsible" data-collapsed="false">
    <h4>Options</h4>
    <p>
        <?php if($GLOBALS['finalised_ind'] == "Y" && $GLOBALS['count_only'] == "N" && $_SESSION['roleSecurity']->maint_req_reopen == "Y"){ ?>
            <a data-role="button" href="index.php?page=view-request&id=<?php echo $_GET['id']; ?>&d=reopenRequest">Reopen Request</a>
            <?php } elseif($GLOBALS['finalised_ind'] == "N" && $_SESSION['roleSecurity']->maint_recat == "Y" || $GLOBALS['count_only'] == "Y" && $_SESSION['roleSecurity']->maint_recat == "Y"){  ?>
            <a data-role="button" href="index.php?page=view-request&id=<?php echo $_GET['id']; ?>&d=recategoriseRequest">Recategorise Request</a><?php } ?>
            <?php if($_SESSION['roleSecurity']->maint_req_del == "Y") { ?><a data-role="button" href="process.php?page=DeleteRequest">Delete Request</a><?php } ?>
    </p>
</div>




