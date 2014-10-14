<ul data-role="listview" data-inset="true" data-theme="c" data-dividertheme="f">
    <li data-role="list-divider">View Action</li>
    <li><a href="index.php?page=view-action&id=<?php echo $_GET['id']; ?>">Summary</a></li>
    <!--<?php if($_SESSION['roleSecurity']->maint_udf == "Y" && $GLOBALS['result'] > 1){ ?><li><a href="index.php?page=view-action&id=<?php echo $_GET['id']; ?>&d=udfs">User Defined Fields</a></li><?php } ?>-->
    <!--<li><a href="index.php?page=view-action&id=<?php echo $_GET['id']; ?>&d=notifications">Notifications</a></li>-->

    <?php if($_SESSION['roleSecurity']->view_comment == "Y" || $_SESSION['roleSecurity']->view_attachment == "Y"){ ?>
        <li><a href="index.php?page=view-action&id=<?php echo $_GET['id']; ?>&d=ca">Comments & Attachments</a></li><?php
      } ?>
    <?php if($_SESSION['EDMSAvailable'] == "Y" && $_SESSION['roleSecurity']->view_documents == "Y"){ ?><li><a  href="index.php?page=view-action&id=<?php echo $_GET['id']; ?>&d=documents">Documents</a></li><?php }?>
    <?php if($_SESSION['roleSecurity']->maint_reassign_action == "Y" && $_SESSION['act_finalised_ind'] != "Y"){ ?><li><a href="index.php?page=view-action&id=<?php echo $_GET['id']; ?>&d=reassign">Reassign</a></li><?php } ?>
    <?php if($_SESSION['roleSecurity']->maint_comp_action == "Y" &&  $_SESSION['act_finalised_ind'] != "Y"){ ?><li><a href="index.php?page=view-action&id=<?php echo $_GET['id']; ?>&d=complete">Complete</a></li><?php } ?>
    <?php if($_SESSION['roleSecurity']->view_audit == "Y"){ ?> <li><a href="index.php?page=view-action&id=<?php echo $_GET['id']; ?>&d=audit">Audit</a></li><?php } ?>
    <?php if($_SESSION['roleSecurity']->maint_new_action == "Y" || ($GLOBALS['act_finalised_ind'] == "Y" && $_SESSION['roleSecurity']->maint_act_reopen == "Y") || ($GLOBALS['act_finalised_ind'] == "N" && $_SESSION['roleSecurity']->maint_act_del == "Y" && $GLOBALS['action_count'] > 1)) { ?><li><a href="index.php?page=view-action&id=<?php echo $_GET['id']; ?>&d=options">Options</a></li><?php } ?>
</ul>
