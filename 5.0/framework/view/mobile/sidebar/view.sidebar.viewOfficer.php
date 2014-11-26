
<a data-role="button" href="index.php?page=view-officer&id=<?php echo $_GET['id']; ?>" >Summary</a>
          <?php if($GLOBALS['actionCount'] > 0){ ?><a data-role="button" href='index.php?page=view-officer&id=<?php echo $_GET['id']; ?>&ex=<?php echo $ex; ?>&d=act' <?php if(isset($_GET['d']) && $_GET['d'] == "act") ?>>Actions (<?php echo $GLOBALS['actionCount']; ?>)</a><?php } ?>
          <?php if($GLOBALS['requestCount'] > 0){ ?><a data-role="button" href='index.php?page=view-officer&id=<?php echo $_GET['id']; ?>&ex=<?php echo $ex; ?>&d=req' <?php if(isset($_GET['d']) && $_GET['d'] == "req") ?>>Requests (<?php echo $GLOBALS['requestCount']; ?>)</a><?php } ?>
          <a data-role="button" href="#demo-links" data-rel="close" data-role="button" data-theme="c" data-icon="delete" data-inline="true">Close panel</a>
