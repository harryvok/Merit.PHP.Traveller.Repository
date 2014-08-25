
<ul class="subButtons">
    <li onclick="self.location.href='index.php?page=view-request&id=<?php echo $_GET['id']; ?>&d=summary'" <?php if(isset($_GET['d']) && $_GET['d'] == "summary" || !isset($_GET['d'])){ ?>class="act"<?php } ?>>Summary</li>
    <li onclick="self.location.href='index.php?page=view-request&id=<?php echo $_GET['id']; ?>&d=actions'" <?php if(isset($_GET['d']) && $_GET['d'] == "actions"){ ?>class="act"<?php } ?>>Actions</li>
    <?php if($_SESSION['roleSecurity']->maint_udf == "Y" && $GLOBALS['result'] > 1){ ?><li onclick="self.location.href='index.php?page=view-request&id=<?php echo $_GET['id']; ?>&d=udfs'" <?php if(isset($_GET['d']) && $_GET['d'] == "udfs"){ ?>class="act"<?php } ?>>User Defined Fields</li><?php } ?>
    <?php if($_SESSION['roleSecurity']->maint_comment == "Y" || $_SESSION['roleSecurity']->maint_attachment == "Y"){ ?><li onclick="self.location.href='index.php?page=view-request&id=<?php echo $_GET['id']; ?>&d=ca'" <?php if(isset($_GET['d']) && $_GET['d'] == "ca"){ ?>class="act"<?php } ?>>Comments and Attachments</li><?php } ?>
</ul>