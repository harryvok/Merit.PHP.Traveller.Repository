<ul data-role="listview" data-inset="true" data-theme="c" data-dividertheme="f">
	<li data-role="list-divider">View Address</li>
       <li><a href="index.php?page=view-address&id=<?php echo $_GET['id']; ?>&ex=<?php echo $ex; ?>" >Summary</a></li>
       <?php if($GLOBALS['nameCount'] > 0){ ?><li><a href="index.php?page=view-address&id=<?php echo $_GET['id']; ?>&ex=<?php echo $ex; ?>&d=names" >Names (<?php echo $GLOBALS['nameCount']; ?>)</a></li><?php } ?>
       <?php if($GLOBALS['requestCount'] > 0){ ?><li><a href="index.php?page=view-address&id=<?php echo $_GET['id']; ?>&ex=<?php echo $ex; ?>&d=requests" >Requests (<?php echo $GLOBALS['requestCount']; ?>)</a></li><?php } ?>
       <?php if($_SESSION["allowance_count"] > 0){ ?><li><a href="index.php?page=view-address&id=<?php echo $_GET['id']; ?>&ex=<?php echo $ex; ?>&d=allowance">Allowance</a></li><?php } ?>
       <?php if($GLOBALS['aliasCount'] > 0){ ?><li><a href="index.php?page=view-address&id=<?php echo $_GET['id']; ?>&ex=<?php echo $ex; ?>&d=aliases" >Aliases</a></li><?php } ?>
       <?php if($GLOBALS['assocCount'] > 0){ ?><li><a href="index.php?page=view-address&id=<?php echo $_GET['id']; ?>&ex=<?php echo $ex; ?>&d=assoc" >Associations</a></li><?php } ?>
       <?php if($GLOBALS['attribCount'] > 0){ ?><li><a href="index.php?page=view-address&id=<?php echo $_GET['id']; ?>&ex=<?php echo $ex; ?>&d=attribs" >Attributes</a></li><?php } ?>
       
        </uL>  