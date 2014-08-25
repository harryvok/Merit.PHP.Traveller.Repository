<br>
<hr>
<h3>View Name</h3>
<br />
<?php if(isset($_GET['ex'])){ $ex = strip_tags($_GET['ex']); } else { $ex = ""; } ?>
<ul class="sidebarButtons">
    <li onclick="self.location.href='index.php?page=view-name&id=<?php echo $_GET['id']; ?>&ex=<?php echo $ex; ?>&d=summary'" <?php if(isset($_GET['d']) && $_GET['d'] == "summary" || !isset($_GET['d'])){ ?>class="act"<?php } ?>>Summary</li>
    <li onclick="self.location.href='index.php?page=view-name&id=<?php echo $_GET['id']; ?>&ex=<?php echo $ex; ?>&d=requests'" <?php if(isset($_GET['d']) && $_GET['d'] == "requests"){ ?>class="act"<?php } ?>>Requests</li>
    <li onclick="self.location.href='index.php?page=view-name&id=<?php echo $_GET['id']; ?>&ex=<?php echo $ex; ?>&d=addresses'" <?php if(isset($_GET['d']) && $_GET['d'] == "addresses"){ ?>class="act"<?php } ?>>Addresses</li>
</ul>