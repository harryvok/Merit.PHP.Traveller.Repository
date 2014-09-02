
<ul class="subButtons">
      <li onclick="self.location.href='index.php?page=view-officer&id=<?php echo $_GET['id'];?>&d=summary'"<?php if(isset($_GET['d']) && $_GET['d'] == "summary" || !isset($_GET['d'])) ?>>Summary</li>
      <li onclick="self.location.href='index.php?page=view-officer&id=<?php echo $_GET['id'];?>&d=act'"<?php if(isset($_GET['d']) && $_GET['d'] == "act") ?>>Actions</li>
      <li onclick="self.location.href='index.php?page=view-officer&id=<?php echo $_GET['id'];?>&d=req'"<?php if(isset($_GET['d']) && $_GET['d'] == "req") ?>>Requests</li>
</ul>