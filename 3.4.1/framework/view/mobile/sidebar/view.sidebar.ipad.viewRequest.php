<ul data-role="listview" data-inset="true" data-theme="c" data-dividertheme="f">
			<li data-role="list-divider">View Request</li>
            <li><a href="index.php?page=view-request&id=<?php echo $_GET['id']; ?>" >Summary</a></li>
            <?php if($_SESSION['roleSecurity']->maint_udf == "Y" && $GLOBALS['result'] > 1){ ?><li><a  href="index.php?page=view-request&id=<?php echo $_GET['id']; ?>&d=udfs" >User Defined Fields</a></li><?php } ?>
           <li> <a href="index.php?page=view-request&id=<?php echo $_GET['id']; ?>&d=actions" >Actions</a></li>
            <?php if($_SESSION['roleSecurity']->maint_comment == "Y" || $_SESSION['roleSecurity']->maint_attachment == "Y"){ ?><li><a href="index.php?page=view-request&id=<?php echo $_GET['id']; ?>&d=ca" >Comments & Attachments</a></li><?php } ?>
		 </ul>   