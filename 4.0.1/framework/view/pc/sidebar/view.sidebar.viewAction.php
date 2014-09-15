<ul class="subButtons">
    <li class="sm">Options
        <ul>
            <li onclick="self.location.href='index.php?page=view-action&id=<?php echo $_GET['id']; ?>&d=summary'" <?php if(isset($_GET['d']) && $_GET['d'] == "summary" || !isset($_GET['d'])){ ?>class="act"<?php } ?>>Summary</li>
            <!--<?php if($_SESSION['roleSecurity']->maint_udf == "Y" && $GLOBALS['result'] > 1){ ?><li class="la" onclick="self.location.href='index.php?page=view-action&id=<?php echo $_GET['id']; ?>&d=udfs'" <?php if(isset($_GET['d']) && $_GET['d'] == "udfs"){ ?>class="act"<?php } ?>>User Defined Fields</li><?php } ?>-->
            <li onclick="self.location.href='index.php?page=view-action&id=<?php echo $_GET['id']; ?>&d=notifications'" <?php if(isset($_GET['d']) && $_GET['d'] == "notifications"){ ?>class="act"<?php } ?>>Notifications</li>
            <?php if($_SESSION['roleSecurity']->view_comment == "Y" || $_SESSION['roleSecurity']->view_attachment == "Y"){ ?><li onclick="self.location.href='index.php?page=view-action&id=<?php echo $_GET['id']; ?>&d=ca'" <?php if(isset($_GET['d']) && $_GET['d'] == "ca"){ ?>class="act"<?php } ?>>Comments & Attachments</li><?php } ?>
            <?php if($_SESSION['roleSecurity']->maint_comp_action == "Y" && $GLOBALS['act_finalised_ind'] != "Y"){ ?><li onclick="self.location.href='index.php?page=view-action&id=<?php echo $_GET['id']; ?>&d=complete'" <?php if(isset($_GET['d']) && $_GET['d'] == "complete"){ ?>class="act"<?php } ?>>Complete</li><?php } ?>
            <?php if($GLOBALS['audit_count'] > 0){ ?><li onclick="self.location.href='index.php?page=view-action&id=<?php echo $_GET['id']; ?>&d=audit'" <?php if(isset($_GET['d']) && $_GET['d'] == "audit"){ ?>class="act"<?php } ?>>Audit</li><?php } ?>
            <?php if($_SESSION['roleSecurity']->maint_reassign_action == "Y" && $GLOBALS['act_finalised_ind'] != "Y"){ ?><li onclick="self.location.href='index.php?page=view-action&id=<?php echo $_GET['id']; ?>&d=reassign'" <?php if(isset($_GET['d']) && $_GET['d'] == "reassign"){ ?>class="act"<?php } ?>>Reassign</li><?php } ?>
            <?php if($_SESSION['roleSecurity']->maint_new_action == "Y"){ ?><li onclick="self.location.href='index.php?page=view-request&id=<?php echo $GLOBALS['request_id']; ?>&d=actions&addAction=1'">Add Action</li><?php } ?>
            <?php if($GLOBALS['act_finalised_ind'] == "Y" && $_SESSION['roleSecurity']->maint_act_reopen == "Y") { ?><li onclick="self.location.href='index.php?page=view-action&id=<?php echo $_GET['id']; ?>&d=reopenAction'">Reopen Action</li><?php } ?>
            <?php if($GLOBALS['act_finalised_ind'] == "N" && $_SESSION['roleSecurity']->maint_act_del == "Y" && $GLOBALS['action_count'] > 1) { ?><li onclick="self.location.href='index.php?page=view-action&id=<?php echo $_GET['id']; ?>&d=deleteAction'">Delete Action</li><?php }?>
            
        </ul>
    </li>

    <li class="la" onclick="self.location.href='index.php?page=view-action&id=<?php echo $_GET['id']; ?>&d=summary'" <?php if(isset($_GET['d']) && $_GET['d'] == "summary" || !isset($_GET['d'])){ ?>class="act"<?php } ?>>Summary</li>
    <!--<?php if($_SESSION['roleSecurity']->maint_udf == "Y" && $GLOBALS['result'] > 1){ ?><li class="la" onclick="self.location.href='index.php?page=view-action&id=<?php echo $_GET['id']; ?>&d=udfs'" <?php if(isset($_GET['d']) && $_GET['d'] == "udfs"){ ?>class="act"<?php } ?>>User Defined Fields</li><?php } ?>-->
    <li class="la" onclick="self.location.href='index.php?page=view-action&id=<?php echo $_GET['id']; ?>&d=notifications'" <?php if(isset($_GET['d']) && $_GET['d'] == "notifications"){ ?>class="act"<?php } ?>>Notifications</li>
    <?php if($_SESSION['roleSecurity']->view_comment == "Y" || $_SESSION['roleSecurity']->view_attachment == "Y"){ ?><li class="la" onclick="self.location.href='index.php?page=view-action&id=<?php echo $_GET['id']; ?>&d=ca'" <?php if(isset($_GET['d']) && $_GET['d'] == "ca"){ ?>class="act"<?php } ?>>Comments & Attachments</li><?php } ?>
    <?php if($_SESSION['roleSecurity']->maint_comp_action == "Y" && $GLOBALS['act_finalised_ind'] != "Y"){ ?><li class="la" onclick="self.location.href='index.php?page=view-action&id=<?php echo $_GET['id']; ?>&d=complete'" <?php if(isset($_GET['d']) && $_GET['d'] == "complete"){ ?>class="act"<?php } ?>>Complete</li><?php } ?>
    <?php if($_SESSION['roleSecurity']->view_audit == "Y"){ ?><li class="la" onclick="self.location.href='index.php?page=view-action&id=<?php echo $_GET['id']; ?>&d=audit'" <?php if(isset($_GET['d']) && $_GET['d'] == "audit"){ ?>class="act"<?php } ?>>Audit</li><?php } ?>
    <?php if($_SESSION['roleSecurity']->maint_new_action == "Y" || ($GLOBALS['act_finalised_ind'] == "Y" && $_SESSION['roleSecurity']->maint_act_reopen == "Y") || ($GLOBALS['act_finalised_ind'] == "N" && $_SESSION['roleSecurity']->maint_act_del == "Y" && $GLOBALS['action_count'] > 1)){ ?>
    <li class="la">Options
        <ul>
            <?php if($_SESSION['roleSecurity']->maint_reassign_action == "Y" && $GLOBALS['act_finalised_ind'] != "Y"){ ?><li onclick="self.location.href='index.php?page=view-action&id=<?php echo $_GET['id']; ?>&d=reassign'" <?php if(isset($_GET['d']) && $_GET['d'] == "reassign"){ ?>class="act"<?php } ?>>Reassign</li><?php } ?>
            <?php if($_SESSION['roleSecurity']->maint_new_action == "Y"){ ?><li onclick="self.location.href='index.php?page=view-request&id=<?php echo $GLOBALS['request_id']; ?>&d=actions&addAction=1'">Add Action</li><?php } ?>
            <?php if($GLOBALS['act_finalised_ind'] == "Y" && $_SESSION['roleSecurity']->maint_act_reopen == "Y") { ?><li onclick="self.location.href='index.php?page=view-action&id=<?php echo $_GET['id']; ?>&d=reopenAction'">Reopen Action</li><?php } ?>
            <?php if($GLOBALS['act_finalised_ind'] == "N" && $_SESSION['roleSecurity']->maint_act_del == "Y" && $GLOBALS['action_count'] > 1) { ?><li onclick="self.location.href='index.php?page=view-action&id=<?php echo $_GET['id']; ?>&d=deleteAction'">Delete Action</li><?php }?>
        </ul>
    </li>
    <?php } ?>
    
</ul>
