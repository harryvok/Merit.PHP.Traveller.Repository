<script type="text/javascript">
    $(document).ready(function () {
      
        $(".notifyOfficerOption").click(function () {
            if (confirm("A Notification will be sent to the Inusrance Officer. Do you want to proceed?")) {
                notifyInsuranceOfficer();
            } 
        });
 
    });
</script> 
<ul class="subButtons">
    <li class="sm">Options
        <ul>
            <li onclick="self.location.href='index.php?page=view-request&id=<?php echo $_GET['id']; ?>&d=summary'" <?php if(isset($_GET['d']) && $_GET['d'] == "summary" || !isset($_GET['d'])){ ?>class="act"<?php } ?>>Summary</li>
            <!--<?php if($_SESSION['roleSecurity']->maint_udf == "Y" && $GLOBALS['result'] > 1){ ?><li onclick="self.location.href='index.php?page=view-request&id=<?php echo $_GET['id']; ?>&d=udfs'" <?php if(isset($_GET['d']) && $_GET['d'] == "udfs"){ ?>class="act"<?php } ?>>User Defined Fields</li><?php } ?>-->
            <?php if($_SESSION['roleSecurity']->view_notifications == "Y" || $_SESSION['roleSecurity']->add_notification == "Y"){ ?><li onclick="self.location.href='index.php?page=view-request&id=<?php echo $_GET['id']; ?>&d=notifications'" <?php if(isset($_GET['d']) && $_GET['d'] == "notifications"){ ?>class="act"<?php } ?>>Notifications</li><?php }?>
            <?php if($_SESSION['roleSecurity']->view_comment == "Y" || $_SESSION['roleSecurity']->view_attachment == "Y" || $_SESSION['roleSecurity']->add_attach == "Y" || $_SESSION['roleSecurity']->add_comment == "Y"){ ?><li onclick="self.location.href='index.php?page=view-request&id=<?php echo $_GET['id']; ?>&d=ca'" <?php if(isset($_GET['d']) && $_GET['d'] == "ca"){ ?>class="act"<?php } ?>>Comments & Attachments</li><?php } ?>
            <?php if($_SESSION['EDMSAvailable'] == "Y" && $_SESSION['roleSecurity']->view_documents == "Y"){ ?><li onclick="self.location.href='index.php?page=view-request&id=<?php echo $_GET['id']; ?>&d=documents'">Documents</li><?php }?>    
            <?php if($GLOBALS['audit_count'] > 0 && $_SESSION['roleSecurity']->view_audit == "Y"){ ?><li onclick="self.location.href='index.php?page=view-request&id=<?php echo $_GET['id']; ?>&d=audit'" <?php if(isset($_GET['d']) && $_GET['d'] == "audit"){ ?>class="act"<?php } ?> >Audit</li><?php } ?>
            <?php if(($GLOBALS['count_only'] == "N" || $GLOBALS['count_only'] == "") && $_SESSION['roleSecurity']->view_request_show_actions == "Y"){ ?><li onclick="self.location.href='index.php?page=view-request&id=<?php echo $_GET['id']; ?>&d=actions'" <?php if(isset($_GET['d']) && $_GET['d'] == "actions"){ ?>class="act"<?php } ?>>Actions</li><?php } ?>
            <?php if($GLOBALS['finalised_ind'] == "Y" && $GLOBALS['count_only'] == "N" && $_SESSION['roleSecurity']->maint_req_reopen == "Y"){ ?>
            <li onclick="self.location.href='index.php?page=view-request&id=<?php echo $_GET['id']; ?>&d=reopenRequest'">Reopen Request</li>
            <?php } elseif($GLOBALS['finalised_ind'] == "N" && $_SESSION['roleSecurity']->maint_recat == "Y" || $GLOBALS['count_only'] == "Y" && $_SESSION['roleSecurity']->maint_recat == "Y"){  ?>
            <li onclick="self.location.href='index.php?page=view-request&id=<?php echo $_GET['id']; ?>&d=recategoriseRequest'">Recategorise Request</li><?php } ?>
            <?php if($_SESSION['roleSecurity']->maint_req_del == "Y") { ?><li onclick="self.location.href='index.php?page=view-request&id=<?php echo $_GET['id']; ?>&d=deleteRequest'">Delete Request</li><?php } ?>
            <li class="notifyOfficerOption">Notify Insurance Officer</li>
        </ul>
    </li>
    <li class="la" onclick="self.location.href='index.php?page=view-request&id=<?php echo $_GET['id']; ?>&d=summary'" <?php if(isset($_GET['d']) && $_GET['d'] == "summary" || !isset($_GET['d'])){ ?>class="act"<?php } ?>>Summary</li>    
            <!--<?php if($_SESSION['roleSecurity']->maint_udf == "Y" && $GLOBALS['result'] > 1){ ?><li class="la" onclick="self.location.href='index.php?page=view-request&id=<?php echo $_GET['id']; ?>&d=udfs'" <?php if(isset($_GET['d']) && $_GET['d'] == "udfs"){ ?>class="act"<?php } ?>>User Defined Fields</li><?php } ?>-->
            <?php if($_SESSION['roleSecurity']->view_notifications == "Y" || $_SESSION['roleSecurity']->add_notification == "Y"){ ?><li class="la" onclick="self.location.href='index.php?page=view-request&id=<?php echo $_GET['id']; ?>&d=notifications'" <?php if(isset($_GET['d']) && $_GET['d'] == "notifications"){ ?>class="act"<?php } ?>>Notifications</li><?php }?>
            <?php if($_SESSION['roleSecurity']->view_comment == "Y" || $_SESSION['roleSecurity']->view_attachment == "Y" || $_SESSION['roleSecurity']->add_attach == "Y" || $_SESSION['roleSecurity']->add_comment == "Y"){ ?><li class="la" onclick="self.location.href='index.php?page=view-request&id=<?php echo $_GET['id']; ?>&d=ca'" <?php if(isset($_GET['d']) && $_GET['d'] == "ca"){ ?>class="act"<?php } ?>>Comments & Attachments</li><?php } ?>
            <?php if($_SESSION['EDMSAvailable'] == "Y" && $_SESSION['roleSecurity']->view_documents == "Y"){ ?><li class="la" onclick="self.location.href='index.php?page=view-request&id=<?php echo $_GET['id']; ?>&d=documents'">Documents</li><?php }?>
            <?php if($GLOBALS['audit_count'] > 0 && $_SESSION['roleSecurity']->view_audit == "Y"){ ?><li class="la" onclick="self.location.href='index.php?page=view-request&id=<?php echo $_GET['id']; ?>&d=audit'" <?php if(isset($_GET['d']) && $_GET['d'] == "audit"){ ?>class="act"<?php } ?>>Audit</li><?php } ?>
            <?php if(($GLOBALS['count_only'] == "N" || $GLOBALS['count_only'] == "") && $_SESSION['roleSecurity']->view_request_show_actions == "Y"){ ?><li class="la" onclick="self.location.href='index.php?page=view-request&id=<?php echo $_GET['id']; ?>&d=actions'" <?php if(isset($_GET['d']) && $_GET['d'] == "actions"){ ?>class="act"<?php } ?>>Actions</li><?php } ?>
            <?php if($GLOBALS['finalised_ind'] == "Y" && $GLOBALS['count_only'] == "N" && $_SESSION['roleSecurity']->maint_req_reopen == "Y" || $GLOBALS['finalised_ind'] == "Y" && $_SESSION['roleSecurity']->maint_recat == "Y" || $GLOBALS['count_only'] == "Y" && $_SESSION['roleSecurity']->maint_recat == "Y" || $_SESSION['roleSecurity']->maint_req_del == "Y"){ ?>
    <li class="la" id="optTop">Options  
         <script>
             $("#optTop").on("click", function () {
                 event.stopPropagation();
                 document.getElementById("optMenu").style.display = 'block';
             });
             </script>
         <ul id="optMenu" style="display:none">
            <?php if($GLOBALS['finalised_ind'] == "Y" && $GLOBALS['count_only'] == "N" && $_SESSION['roleSecurity']->maint_req_reopen == "Y"){ ?>
            <li onclick="self.location.href='index.php?page=view-request&id=<?php echo $_GET['id']; ?>&d=reopenRequest'">Reopen Request</li>
            <?php } elseif($GLOBALS['finalised_ind'] == "N" && $_SESSION['roleSecurity']->maint_recat == "Y" || $GLOBALS['count_only'] == "Y" && $_SESSION['roleSecurity']->maint_recat == "Y"){  ?>
            <li onclick="self.location.href='index.php?page=view-request&id=<?php echo $_GET['id']; ?>&d=recategoriseRequest'">Recategorise Request</li><?php } ?>
            <?php if($_SESSION['roleSecurity']->maint_req_del == "Y") { ?><li onclick="self.location.href='index.php?page=view-request&id=<?php echo $_GET['id']; ?>&d=deleteRequest'">Delete Request</li><?php } ?>
            <?php if($_SESSION['notify_insurance'] == "Y") { ?><li class="notifyOfficerOption">Notify Insurance Officer</li><?php } ?>
        </ul>
    </li>
    <?php } ?>
    
    
</ul>

<script>
    $(document).click(function (e) {
        $('#optMenu').hide();
    });
</script>
