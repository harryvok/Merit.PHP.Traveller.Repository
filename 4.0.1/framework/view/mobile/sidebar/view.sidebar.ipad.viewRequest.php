<ul data-role="listview" data-inset="true" data-theme="c" data-dividertheme="f">
    <li data-role="list-divider">View Request</li>
    <li><a href="index.php?page=view-request&id=<?php echo $_GET['id']; ?>" >Summary</a></li>
    <!--<?php if($_SESSION['roleSecurity']->maint_udf == "Y" && $GLOBALS['result'] > 1){ ?><li><a  href="index.php?page=view-request&id=<?php echo $_GET['id']; ?>&d=udfs" >User Defined Fields</a></li><?php } ?>-->
    <?php if($_SESSION['roleSecurity']->view_notifications == "Y" || $_SESSION['roleSecurity']->add_notification == "Y"){ ?><li><a href="index.php?page=view-request&id=<?php echo $_GET['id']; ?>&d=notifications">Notifications</a></li><?php } ?>
    <?php if(($GLOBALS['count_only'] == "N" || $GLOBALS['count_only'] == "") && $_SESSION['roleSecurity']->view_request_show_actions == "Y"){ ?><li><a href="index.php?page=view-request&id=<?php echo $_GET['id']; ?>&d=actions" >Actions</a></li><?php } ?>
    <?php if($_SESSION['roleSecurity']->view_comment == "Y" || $_SESSION['roleSecurity']->view_attachment == "Y" || $_SESSION['roleSecurity']->add_attach == "Y" || $_SESSION['roleSecurity']->add_comment == "Y"){ ?><li><a href="index.php?page=view-request&id=<?php echo $_GET['id']; ?>&d=ca" >Comments & Attachments</a></li><?php } ?>
    <?php if($_SESSION['EDMSAvailable'] == "Y" && $_SESSION['roleSecurity']->view_documents == "Y"){ ?><li><a  href="index.php?page=view-request&id=<?php echo $_GET['id']; ?>&d=documents">Documents</a></li><?php }?>
    <?php if($_SESSION['roleSecurity']->view_audit == "Y"){ ?><li><a href="index.php?page=view-request&id=<?php echo $_GET['id']; ?>&d=audit">Audit</a></li><?php } ?>
    <?php if($GLOBALS['finalised_ind'] == "Y" && $GLOBALS['count_only'] == "N" && $_SESSION['roleSecurity']->maint_req_reopen == "Y" || $GLOBALS['finalised_ind'] == "N" && $_SESSION['roleSecurity']->maint_recat == "Y" || $GLOBALS['count_only'] == "Y" && $_SESSION['roleSecurity']->maint_recat == "Y" || $_SESSION['roleSecurity']->maint_req_del == "Y" || $_SESSION['notify_insurance'] == "Y"){ ?><a data-role="button" href="index.php?page=view-request&id=<?php echo $_GET['id']; ?>&d=options">Options</a><?php } ?>
</ul>
