<a data-role="button" href="index.php?page=view-request&id=<?php echo $_GET['id']; ?>" >Summary</a>
<?php if($_SESSION['roleSecurity']->maint_udf == "Y" && $GLOBALS['result'] > 1){ ?><a data-role="button" href="index.php?page=view-request&id=<?php echo $_GET['id']; ?>&d=udfs" >User Defined Fields</a><?php } ?>
<a  data-role="button" href="index.php?page=view-request&id=<?php echo $_GET['id']; ?>&d=notifications" >Notifications</a>
<?php if($GLOBALS['count_only'] == "N"){ ?><a data-role="button" href="index.php?page=view-request&id=<?php echo $_GET['id']; ?>&d=actions" >Actions</a><?php } ?>
<?php if($_SESSION['roleSecurity']->view_comment == "Y" || $_SESSION['roleSecurity']->view_attachment == "Y"){ ?><a data-role="button" href="index.php?page=view-request&id=<?php echo $_GET['id']; ?>&d=ca" >Comments & Attachments</a></p><?php } ?>
<?php if($_SESSION['roleSecurity']->view_audit == "Y"){ ?><a  data-role="button" href="index.php?page=view-request&id=<?php echo $_GET['id']; ?>&d=audit" >Audit</a><?php } ?>
<?php if($GLOBALS['finalised_ind'] == "Y" && $GLOBALS['count_only'] == "N" && $_SESSION['roleSecurity']->maint_req_reopen == "Y" || $GLOBALS['finalised_ind'] == "N" && $_SESSION['roleSecurity']->maint_recat == "Y" || $GLOBALS['count_only'] == "Y" && $_SESSION['roleSecurity']->maint_recat == "Y" || $_SESSION['roleSecurity']->maint_req_del == "Y"){ ?><a data-role="button" href="index.php?page=view-request&id=<?php echo $_GET['id']; ?>&d=options">Options</a><?php } ?>
<a href="#demo-links" data-rel="close" data-role="button" data-theme="c" data-icon="delete" data-inline="true">Close panel</a>