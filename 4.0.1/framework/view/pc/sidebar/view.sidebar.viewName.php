
<?php if(isset($_GET['ex'])){ $ex = strip_tags($_GET['ex']); } else { $ex = ""; } ?>
<ul class="subButtons">
    <li class="sm">Options
        <ul>
             <li onclick="self.location.href='index.php?page=view-name&id=<?php echo $_GET['id']; ?>&ex=<?php echo $ex; ?>&d=summary'" <?php if(isset($_GET['d']) && $_GET['d'] == "summary" || !isset($_GET['d'])){ ?>class="act"<?php } ?>>Summary</li>
            <?php if($GLOBALS['requestCount'] > 0){ ?><li onclick="self.location.href='index.php?page=view-name&id=<?php echo $_GET['id']; ?>&ex=<?php echo $ex; ?>&d=requests'" <?php if(isset($_GET['d']) && $_GET['d'] == "requests"){ ?>class="act"<?php } ?>>Requests (<?php echo $GLOBALS['requestCount']; ?>)</li><?php } ?>
            <?php if($GLOBALS['addressCount'] > 0){ ?><li onclick="self.location.href='index.php?page=view-name&id=<?php echo $_GET['id']; ?>&ex=<?php echo $ex; ?>&d=addresses'" <?php if(isset($_GET['d']) && $_GET['d'] == "addresses"){ ?>class="act"<?php } ?>>Addresses (<?php echo $GLOBALS['addressCount']; ?>)</li><?php } ?>            
            <?php if($GLOBALS['audit_count'] > 0){ ?><li onclick="self.location.href='index.php?page=view-name&id=<?php echo $_GET['id']; ?>&d=audit'" <?php if(isset($_GET['d']) && $_GET['d'] == "audit"){ ?>class="act"<?php } ?>>Audit</li><?php } ?>
        </ul>
      </li>
    <li class="la" onclick="self.location.href='index.php?page=view-name&id=<?php echo $_GET['id']; ?>&ex=<?php echo $ex; ?>&d=summary'" <?php if(isset($_GET['d']) && $_GET['d'] == "summary" || !isset($_GET['d'])){ ?>class="act"<?php } ?>>Summary</li>
    <?php if($GLOBALS['requestCount'] > 0){ ?><li class="la" onclick="self.location.href='index.php?page=view-name&id=<?php echo $_GET['id']; ?>&ex=<?php echo $ex; ?>&d=requests'" <?php if(isset($_GET['d']) && $_GET['d'] == "requests"){ ?>class="act"<?php } ?>>Requests (<?php echo $GLOBALS['requestCount']; ?>)</li><?php } ?>
    <?php if($GLOBALS['addressCount'] > 0){ ?><li class="la" onclick="self.location.href='index.php?page=view-name&id=<?php echo $_GET['id']; ?>&ex=<?php echo $ex; ?>&d=addresses'" <?php if(isset($_GET['d']) && $_GET['d'] == "addresses"){ ?>class="act"<?php } ?>>Addresses (<?php echo $GLOBALS['addressCount']; ?>)</li><?php } ?>
    <?php if($GLOBALS['audit_count'] > 0){ ?><li onclick="self.location.href='index.php?page=view-name&id=<?php echo $_GET['id']; ?>&d=audit'" <?php if(isset($_GET['d']) && $_GET['d'] == "audit"){ ?>class="act"<?php } ?>>Audit</li><?php } ?>
</ul>