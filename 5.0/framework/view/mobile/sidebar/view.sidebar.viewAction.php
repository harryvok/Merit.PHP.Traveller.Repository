<a href="index.php?page=view-action&id=<?php echo $_GET['id']; ?>" data-role="button" >Summary</a>
<!--<?php if($_SESSION['roleSecurity']->maint_udf == "Y" && $GLOBALS['result'] > 1){ ?><a  data-role="button" href="index.php?page=view-action&id=<?php echo $_GET['id']; ?>&d=udfs" >User Defined Fields</a><?php } ?>-->
<!--<a  data-role="button" href="index.php?page=view-action&id=<?php echo $_GET['id']; ?>&d=notifications" >Notifications</a>-->
<?php if($_SESSION['roleSecurity']->view_comment == "Y" || $_SESSION['roleSecurity']->view_attachment == "Y"){ ?><a  data-role="button" href="index.php?page=view-action&id=<?php echo $_GET['id']; ?>&d=ca" >Comments & Attachments</a><?php } ?>
<?php if($_SESSION['EDMSAvailable'] == "Y" && $_SESSION['roleSecurity']->view_documents == "Y"){ ?><a data-role="button" href="index.php?page=view-action&id=<?php echo $_GET['id']; ?>&d=documents">Documents</a><?php }?>
<?php if($_SESSION['roleSecurity']->maint_reassign_action == "Y" && $_SESSION['act_finalised_ind'] != "Y"){ ?><a  data-role="button" href="index.php?page=view-action&id=<?php echo $_GET['id']; ?>&d=reassign" >Reassign</a><?php } ?>
<?php if($_SESSION['roleSecurity']->maint_comp_action == "Y" &&  $_SESSION['act_finalised_ind'] != "Y"){ ?><a data-role="button" href="index.php?page=view-action&id=<?php echo $_GET['id']; ?>&d=complete">Complete</a><?php } ?>
<?php if($_SESSION['roleSecurity']->view_audit == "Y"){ ?><a  data-role="button" href="index.php?page=view-action&id=<?php echo $_GET['id']; ?>&d=audit">Audit</a><?php } ?>
<?php if($_SESSION['roleSecurity']->maint_new_action == "Y" || ($GLOBALS['act_finalised_ind'] == "Y" && $_SESSION['roleSecurity']->maint_act_reopen == "Y") || ($GLOBALS['act_finalised_ind'] == "N" && $_SESSION['roleSecurity']->maint_act_del == "Y" && $GLOBALS['action_count'] > 1)) { ?><a data-role="button" href="index.php?page=view-action&id=<?php echo $_GET['id']; ?>&d=options" >Options</a><?php } ?>
        <a href="#demo-links" data-rel="close" data-role="button" data-theme="c" data-icon="delete" data-inline="true">Close panel</a>