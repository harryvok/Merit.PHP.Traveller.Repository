<ul data-role="listview" data-inset="true" data-theme="c" data-dividertheme="f">
		<li data-role="list-divider">View Name</li>
        <li><a href="index.php?page=view-name&id=<?php echo $_GET['id']; ?>&ex=<?php echo $_GET['ex']; ?>" >Summary</a></li>
       <?php if($GLOBALS['requestCount'] > 0){ ?><li><a href="index.php?page=view-name&id=<?php echo $_GET['id']; ?>&ex=<?php echo $_GET['ex']; ?>&d=requests" >Requests (<?php echo $GLOBALS['requestCount']; ?>)</a></li><?php } ?>
       <?php if($GLOBALS['addressCount'] > 0){ ?><li><a href="index.php?page=view-name&id=<?php echo $_GET['id']; ?>&ex=<?php echo $_GET['ex']; ?>&d=addresses" >Addresses (<?php echo $GLOBALS['addressCount']; ?>)</a></li><?php } ?>
       </ul>