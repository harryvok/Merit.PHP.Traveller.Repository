<a data-role="button" href="index.php?page=view-officer&id=<?php echo $_GET['id']; ?>" >Summary</a>
          <a data-role="button" href="index.php?page=view-officer&id=<?php echo $_GET['id']; ?>&ex=<?php echo $ex; ?>&d=act'" <?php if(isset($_GET['d']) && $_GET['d'] == "action"){ ?>class="act"<?php } ?>>Actions (<?php echo $GLOBALS['actionCount']; ?>)</a>
          <a data-role="button" href="index.php?page=view-officer&id=<?php echo $_GET['id']; ?>&ex=<?php echo $ex; ?>&d=act'" <?php if(isset($_GET['d']) && $_GET['d'] == "requests"){ ?>class="act"<?php } ?>>Requests (<?php echo $GLOBALS['requestCount']; ?>)</a>
          <a data-role="button" href="#demo-links" data-rel="close" data-role="button" data-theme="c" data-icon="delete" data-inline="true">Close panel</a>


