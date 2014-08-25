<?php include("../framework/controller.php"); ?>

<frameset rows="40,100%" border="0" frameborder="0" framespacing="0" noresize>
	<?php
	if(strlen($_GET['req_id']) > 1){
		?>
        <frame src="page.view-attachment.php" name="Back" border="0" frameborder="0" framespacing="0" scrolling="no" noresize>
        <?php
	}
	elseif(strlen($_GET['act_id']) > 1){
		?>
        <frame src="page.view-attachment.php" name="Back" border="0" frameborder="0" framespacing="0" scrolling="no" noresize>
        <?php
	}
	?>
	
	<frame src="<?php echo str_ireplace("/", "\\", ATTACHMENT_FOLDER).$_GET['f']; ?>" name="Attachment" border="0" frameborder="0" framespacing="0" scrolling="yes" noresize>
		
</frameset>

<noframes><?php echo str_ireplace("/", "\\", ATTACHMENT_FOLDER).$_GET['f']; ?></noframes>