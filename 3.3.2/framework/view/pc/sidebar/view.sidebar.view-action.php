<br>
 <hr>
<h3>View Action</h3>
<br />
 <ul class="sidebarButtons">
      <li onclick="self.location.href='index.php?page=view-action&id=<?php echo $_GET['id']; ?>&d=summary'" <?php if(isset($_GET['d']) && $_GET['d'] == "summary" || !isset($_GET['d'])){ ?>class="act"<?php } ?>>Summary</li>
      <?php if($_SESSION['roleSecurity']->maint_udf == "Y"){ ?><li onclick="self.location.href='index.php?page=view-action&id=<?php echo $_GET['id']; ?>&d=udfs'" <?php if(isset($_GET['d']) && $_GET['d'] == "udfs"){ ?>class="act"<?php } ?>>User Defined Fields</li><?php } ?>
<?php if($_SESSION['roleSecurity']->maint_comment == "Y" || $_SESSION['roleSecurity']->maint_attachment == "Y"){ ?>      <li onclick="self.location.href='index.php?page=view-action&id=<?php echo $_GET['id']; ?>&d=ca'" <?php if(isset($_GET['d']) && $_GET['d'] == "ca"){ ?>class="act"<?php } ?>>Comments and Attachments</li><?php } ?>
     <?php if($_SESSION['roleSecurity']->maint_reassign_action == "Y"){ ?> <li onclick="self.location.href='index.php?page=view-action&id=<?php echo $_GET['id']; ?>&d=reassign'" <?php if(isset($_GET['d']) && $_GET['d'] == "reassign"){ ?>class="act"<?php } ?>>Reassign</li><?php } ?>
      <?php if($_SESSION['roleSecurity']->maint_comp_action == "Y"){ ?> <li onclick="self.location.href='index.php?page=view-action&id=<?php echo $_GET['id']; ?>&d=complete'" <?php if(isset($_GET['d']) && $_GET['d'] == "complete"){ ?>class="act"<?php } ?>>Complete</li><?php } ?>