<ul data-role="listview" data-inset="true" data-theme="c" data-dividertheme="f">
			<li data-role="list-divider">View Officer</li>
			<li><a  href="index.php?page=view-officer&id=<?php echo $_GET['id']; ?>" >Summary</a></li>
            <?php if($GLOBALS['actionCount'] > 0){ ?><li><a  href='index.php?page=view-officer&id=<?php echo $_GET['id']; ?>&ex=<?php echo $ex; ?>&d=act' <?php if(isset($_GET['d']) && $_GET['d'] == "act"){ ?>class="act"<?php } ?>>Actions (<?php echo $GLOBALS['actionCount']; ?>)</a></li><?php } ?>
            <?php if($GLOBALS['requestCount'] > 0){ ?><li><a  href='index.php?page=view-officer&id=<?php echo $_GET['id']; ?>&ex=<?php echo $ex; ?>&d=req' <?php if(isset($_GET['d']) && $_GET['d'] == "req"){ ?>class="req"<?php } ?>>Requests (<?php echo $GLOBALS['requestCount']; ?>)</a></li><?php } ?>
		 </ul>     
