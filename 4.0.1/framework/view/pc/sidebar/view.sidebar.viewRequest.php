 <ul class="subButtons">
    <li class="sm">Options
        <ul>
            <li onclick="self.location.href='index.php?page=view-request&id=<?php echo $_GET['id']; ?>&d=summary'" <?php if(isset($_GET['d']) && $_GET['d'] == "summary" || !isset($_GET['d'])){ ?>class="act"<?php } ?>>Summary</li>
            <?php if($GLOBALS['count_only'] == "N" && $_SESSION['roleSecurity']->view_request_show_actions == "Y"){ ?><li onclick="self.location.href='index.php?page=view-request&id=<?php echo $_GET['id']; ?>&d=actions'" <?php if(isset($_GET['d']) && $_GET['d'] == "actions"){ ?>class="act"<?php } ?>>Actions</li><?php } ?>
            <?php if($_SESSION['roleSecurity']->maint_udf == "Y" && $GLOBALS['result'] > 1){ ?><li onclick="self.location.href='index.php?page=view-request&id=<?php echo $_GET['id']; ?>&d=udfs'" <?php if(isset($_GET['d']) && $_GET['d'] == "udfs"){ ?>class="act"<?php } ?>>User Defined Fields</li><?php } ?>
            <li onclick="self.location.href='index.php?page=view-request&id=<?php echo $_GET['id']; ?>&d=notifications'" <?php if(isset($_GET['d']) && $_GET['d'] == "notifications"){ ?>class="act"<?php } ?>>Notifications</li>
            <?php if($_SESSION['roleSecurity']->view_comment == "Y" || $_SESSION['roleSecurity']->view_attachment == "Y"){ ?><li onclick="self.location.href='index.php?page=view-request&id=<?php echo $_GET['id']; ?>&d=ca'" <?php if(isset($_GET['d']) && $_GET['d'] == "ca"){ ?>class="act"<?php } ?>>Comments & Attachments</li><?php } ?>
            <?php if($GLOBALS['audit_count'] > 0){ ?><li onclick="self.location.href='index.php?page=view-request&id=<?php echo $_GET['id']; ?>&d=audit'" <?php if(isset($_GET['d']) && $_GET['d'] == "audit"){ ?>class="act"<?php } ?>>Audit</li><?php } ?>
            <?php if($GLOBALS['finalised_ind'] == "Y" && $GLOBALS['count_only'] == "N" && $_SESSION['roleSecurity']->maint_req_reopen == "Y"){ ?>
            <li onclick="self.location.href='index.php?page=view-request&id=<?php echo $_GET['id']; ?>&d=reopenRequest'">Reopen Request</li>
            <?php } elseif($GLOBALS['finalised_ind'] == "N" && $_SESSION['roleSecurity']->maint_recat == "Y" || $GLOBALS['count_only'] == "Y" && $_SESSION['roleSecurity']->maint_recat == "Y"){  ?>
            <li onclick="self.location.href='index.php?page=view-request&id=<?php echo $_GET['id']; ?>&d=recategoriseRequest'">Recategorise Request</li><?php } ?>
            <?php if($_SESSION['roleSecurity']->maint_req_del == "Y") { ?><li onclick="self.location.href='process.php?action=DeleteRequest'">Delete Request</li><?php } ?>
        </ul>
    </li>


    <li class="la" onclick="self.location.href='index.php?page=view-request&id=<?php echo $_GET['id']; ?>&d=summary'" <?php if(isset($_GET['d']) && $_GET['d'] == "summary" || !isset($_GET['d'])){ ?>class="act"<?php } ?>>Summary</li>
    <?php if($GLOBALS['count_only'] == "N" && $_SESSION['roleSecurity']->view_request_show_actions == "Y"){ ?><li class="la" onclick="self.location.href='index.php?page=view-request&id=<?php echo $_GET['id']; ?>&d=actions'" <?php if(isset($_GET['d']) && $_GET['d'] == "actions"){ ?>class="act"<?php } ?>>Actions</li><?php } ?>
    <?php if($_SESSION['roleSecurity']->maint_udf == "Y" && $GLOBALS['result'] > 1){ ?><li class="la" onclick="self.location.href='index.php?page=view-request&id=<?php echo $_GET['id']; ?>&d=udfs'" <?php if(isset($_GET['d']) && $_GET['d'] == "udfs"){ ?>class="act"<?php } ?>>User Defined Fields</li><?php } ?>
    <li class="la" onclick="self.location.href='index.php?page=view-request&id=<?php echo $_GET['id']; ?>&d=notifications'" <?php if(isset($_GET['d']) && $_GET['d'] == "notifications"){ ?>class="act"<?php } ?>>Notifications</li>
    <?php if($_SESSION['roleSecurity']->view_comment == "Y" || $_SESSION['roleSecurity']->view_attachment == "Y"){ ?><li class="la" onclick="self.location.href='index.php?page=view-request&id=<?php echo $_GET['id']; ?>&d=ca'" <?php if(isset($_GET['d']) && $_GET['d'] == "ca"){ ?>class="act"<?php } ?>>Comments & Attachments</li><?php } ?>
    <?php if($_SESSION['roleSecurity']->view_audit == "Y"){ ?><li class="la" onclick="self.location.href='index.php?page=view-request&id=<?php echo $_GET['id']; ?>&d=audit'" <?php if(isset($_GET['d']) && $_GET['d'] == "audit"){ ?>class="act"<?php } ?>>Audit</li><?php } ?>
    <?php if($GLOBALS['finalised_ind'] == "Y" && $GLOBALS['count_only'] == "N" && $_SESSION['roleSecurity']->maint_req_reopen == "Y" || $GLOBALS['finalised_ind'] == "Y" && $_SESSION['roleSecurity']->maint_recat == "Y" || $GLOBALS['count_only'] == "Y" && $_SESSION['roleSecurity']->maint_recat == "Y" || $_SESSION['roleSecurity']->maint_req_del == "Y"){ ?>
    <li class="la">Options
        <ul>
            <?php if($GLOBALS['finalised_ind'] == "Y" && $GLOBALS['count_only'] == "N" && $_SESSION['roleSecurity']->maint_req_reopen == "Y"){ ?>
            <li onclick="self.location.href='index.php?page=view-request&id=<?php echo $_GET['id']; ?>&d=reopenRequest'">Reopen Request</li>
            <?php } elseif($GLOBALS['finalised_ind'] == "N" && $_SESSION['roleSecurity']->maint_recat == "Y" || $GLOBALS['count_only'] == "Y" && $_SESSION['roleSecurity']->maint_recat == "Y"){  ?>
            <li onclick="self.location.href='index.php?page=view-request&id=<?php echo $_GET['id']; ?>&d=recategoriseRequest'">Recategorise Request</li><?php } ?>
            <?php if($_SESSION['roleSecurity']->maint_req_del == "Y") { ?><li onclick="self.location.href='process.php?action=DeleteRequest'">Delete Request</li><?php } ?>
        </ul>
    </li>
    <?php } ?>
    
    
</ul>
