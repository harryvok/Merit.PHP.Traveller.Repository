
<ul class="subButtons">
      <li onclick="self.location.href='index.php?page=view-officer&id=<?php echo $_GET['id'];?>&d=summary'"<?php if(isset($_GET['d']) && $_GET['d'] == "summary" || !isset($_GET['d'])) ?>>Summary</li>
      <?php if($GLOBALS['actionCount'] > 0){ ?><li onclick="self.location.href='index.php?page=view-officer&id=<?php echo $_GET['id']; ?>&ex=<?php echo $ex; ?>&d=act'" <?php if(isset($_GET['d']) && $_GET['d'] == "actions"){ ?>class="act"<?php } ?>>Actions (<?php echo $GLOBALS['actionCount']; ?>)</li><?php } ?>
      <?php if($GLOBALS['requestCount'] > 0){ ?><li onclick="self.location.href='index.php?page=view-officer&id=<?php echo $_GET['id']; ?>&ex=<?php echo $ex; ?>&d=req'" <?php if(isset($_GET['d']) && $_GET['d'] == "requests"){ ?>class="act"<?php } ?>>Requests (<?php echo $GLOBALS['requestCount']; ?>)</li><?php } ?>
</ul>