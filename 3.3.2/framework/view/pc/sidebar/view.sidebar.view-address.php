<br>
<hr>
<h3>View Address</h3>
<br />
<?php if(isset($_GET['ex'])){ $ex = strip_tags($_GET['ex']); } else { $ex = ""; } ?>
<ul class="sidebarButtons">
    <li onclick="self.location.href='index.php?page=view-address&id=<?php echo $_GET['id']; ?>&ex=<?php echo $ex; ?>&d=summary'" <?php if(isset($_GET['d']) && $_GET['d'] == "summary" || !isset($_GET['d'])){ ?>class="act"<?php } ?>>Summary</li>
    <li onclick="self.location.href='index.php?page=view-address&id=<?php echo $_GET['id']; ?>&ex=<?php echo $ex; ?>&d=names'" <?php if(isset($_GET['d']) && $_GET['d'] == "names"){ ?>class="act"<?php } ?>>Names</li>
    <li onclick="self.location.href='index.php?page=view-address&id=<?php echo $_GET['id']; ?>&ex=<?php echo $ex; ?>&d=requests'" <?php if(isset($_GET['d']) && $_GET['d'] == "requests"){ ?>class="act"<?php } ?>>Requests</li>
    <li onclick="self.location.href='index.php?page=view-address&id=<?php echo $_GET['id']; ?>&ex=<?php echo $ex; ?>&d=aliases'" <?php if(isset($_GET['d']) && $_GET['d'] == "aliases"){ ?>class="act"<?php } ?>>Aliases</li>
    <li onclick="self.location.href='index.php?page=view-address&id=<?php echo $_GET['id']; ?>&ex=<?php echo $ex; ?>&d=assoc'" <?php if(isset($_GET['d']) && $_GET['d'] == "assoc"){ ?>class="act"<?php } ?>>Associations</li>
    <li onclick="self.location.href='index.php?page=view-address&id=<?php echo $_GET['id']; ?>&ex=<?php echo $ex; ?>&d=attrib'" <?php if(isset($_GET['d']) && $_GET['d'] == "attrib"){ ?>class="act"<?php } ?>>Attributes</li>
</ul>