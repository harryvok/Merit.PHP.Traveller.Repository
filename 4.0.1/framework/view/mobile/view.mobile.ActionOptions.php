<div data-role="collapsible" data-collapsed="false">
    <h4>Options</h4>
    <p>
        <?php if($_SESSION['roleSecurity']->maint_new_action == "Y"){ ?><a data-role="button" href="index.php?page=view-request&id=<?php echo $GLOBALS['request_id']; ?>&d=add-action">Add Action</a><?php } ?>
        <?php if($GLOBALS['act_finalised_ind'] == "Y"){ ?><?php if($_SESSION['roleSecurity']->maint_act_reopen == "Y") { ?><a data-role="button" href="index.php?page=view-action&id=<?php echo $_GET['id']; ?>&d=reopenAction">Reopen Action</a><?php }
              } ?>
        <?php if($GLOBALS['act_finalised_ind'] == "N"){ ?><?php if($_SESSION['roleSecurity']->maint_act_del == "Y" && $GLOBALS['action_count'] > 1) { ?><a data-role="button" href="index.php?page=view-action&id=<?php echo $_GET['id']; ?>&d=deleteAction">Delete Action</a><?php }
              } ?>
    </p>
</div>




