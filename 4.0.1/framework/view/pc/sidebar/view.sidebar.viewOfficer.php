<?php if(isset($_GET['ex'])){ $ex = strip_tags($_GET['ex']); } else { $ex = ""; } ?>
<ul class="subButtons">
      <li onclick="self.location.href='index.php?page=view-officer&id=<?php echo $_GET['id']; ?>&d=summary'" <?php if(isset($_GET['d']) && $_GET['d'] == "summary" || !isset($_GET['d'])){ ?>class="act"<?php } ?>>Summary</li>
      <li onclick="self.location.href='index.php?page=view-officer&id=<?php echo $_GET['id']; ?>&d=act'" <?php if(isset($_GET['d']) && $_GET['d'] == "act"){ ?>class="act"<?php } ?>>Actions (<?php echo $GLOBALS['actionCount']; ?>)</li>
      <li onclick="self.location.href='index.php?page=view-officer&id=<?php echo $_GET['id']; ?>&d=req'" <?php if(isset($_GET['d']) && $_GET['d'] == "req"){ ?>class="req"<?php } ?>>Requests  (<?php echo $GLOBALS['requestCount']; ?>)</li>
</ul>
