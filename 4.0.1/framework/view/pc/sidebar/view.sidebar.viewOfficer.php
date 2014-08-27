<ul class="subButtons">
      <li onclick="self.location.href='index.php?page=view-officer&id=<?php echo $_GET['id']; ?>&d=summary'" <?php if(isset($_GET['d']) && $_GET['d'] == "summary" || !isset($_GET['d'])){ ?>class="act"<?php } ?>>Summary</li>
      <li onclick="self.location.href='index.php?page=view-officer&id=<?php echo $_GET['id']; ?>&d=act'" <?php if(isset($_GET['d']) && $_GET['d'] == "act"){ ?>class="act"<?php } ?>>Actions</li>
      <li onclick="self.location.href='index.php?page=view-officer&id=<?php echo $_GET['id']; ?>&d=req'" <?php if(isset($_GET['d']) && $_GET['d'] == "req"){ ?>class="act"<?php } ?>>Requests</li>
  </ul>