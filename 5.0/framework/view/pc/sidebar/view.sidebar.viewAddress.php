
<?php if(isset($_GET['ex'])){ $ex = strip_tags($_GET['ex']); } else { $ex = ""; } ?>
<ul class="subButtons">
    <li class="sm">Options
        <ul>
             <li onclick="self.location.href='index.php?page=view-address&id=<?php echo $_GET['id']; ?>&ex=<?php echo $ex; ?>&d=summary'" <?php if(isset($_GET['d']) && $_GET['d'] == "summary" || !isset($_GET['d'])){ ?>class="act"<?php } ?>>Summary</li>
            <?php if($GLOBALS['nameCount'] > 0){ ?><li onclick="self.location.href='index.php?page=view-address&id=<?php echo $_GET['id']; ?>&ex=<?php echo $ex; ?>&d=names'" <?php if(isset($_GET['d']) && $_GET['d'] == "names"){ ?>class="act"<?php } ?>>Names (<?php echo $GLOBALS['nameCount']; ?>)</li><?php } ?>
            <?php if($GLOBALS['requestCount'] > 0){ ?><li onclick="self.location.href='index.php?page=view-address&id=<?php echo $_GET['id']; ?>&ex=<?php echo $ex; ?>&d=requests'" <?php if(isset($_GET['d']) && $_GET['d'] == "requests"){ ?>class="act"<?php } ?>>Requests  (<?php echo $GLOBALS['requestCount']; ?>)</li><?php } ?>
            <?php if($GLOBALS['aliasCount'] > 0){ ?><li onclick="self.location.href='index.php?page=view-address&id=<?php echo $_GET['id']; ?>&ex=<?php echo $ex; ?>&d=aliases'" <?php if(isset($_GET['d']) && $_GET['d'] == "aliases"){ ?>class="act"<?php } ?>>Aliases</li><?php } ?>
            <?php if($GLOBALS['assocCount'] > 0){ ?><li onclick="self.location.href='index.php?page=view-address&id=<?php echo $_GET['id']; ?>&ex=<?php echo $ex; ?>&d=assoc'" <?php if(isset($_GET['d']) && $_GET['d'] == "assoc"){ ?>class="act"<?php } ?>>Associations</li><?php } ?>
            <?php if($GLOBALS['attribCount'] > 0){ ?><li onclick="self.location.href='index.php?page=view-address&id=<?php echo $_GET['id']; ?>&ex=<?php echo $ex; ?>&d=attrib'" <?php if(isset($_GET['d']) && $_GET['d'] == "attrib"){ ?>class="act"<?php } ?>>Attributes</li><?php } ?>
        </ul>
      </li>
    <li class="la" onclick="self.location.href='index.php?page=view-address&id=<?php echo $_GET['id']; ?>&ex=<?php echo $ex; ?>&d=summary'" <?php if(isset($_GET['d']) && $_GET['d'] == "summary" || !isset($_GET['d'])){ ?>class="act"<?php } ?>>Summary</li>
    <?php if($GLOBALS['nameCount'] > 0){ ?><li class="la" onclick="self.location.href='index.php?page=view-address&id=<?php echo $_GET['id']; ?>&ex=<?php echo $ex; ?>&d=names'" <?php if(isset($_GET['d']) && $_GET['d'] == "names"){ ?>class="act"<?php } ?>>Names (<?php echo $GLOBALS['nameCount']; ?>)</li><?php } ?>
    <?php if($GLOBALS['requestCount'] > 0){ ?><li class="la" onclick="self.location.href='index.php?page=view-address&id=<?php echo $_GET['id']; ?>&ex=<?php echo $ex; ?>&d=requests'" <?php if(isset($_GET['d']) && $_GET['d'] == "requests"){ ?>class="act"<?php } ?>>Requests  (<?php echo $GLOBALS['requestCount']; ?>)</li><?php } ?>
    <?php if($GLOBALS['aliasCount'] > 0){ ?><li class="la" onclick="self.location.href='index.php?page=view-address&id=<?php echo $_GET['id']; ?>&ex=<?php echo $ex; ?>&d=aliases'" <?php if(isset($_GET['d']) && $_GET['d'] == "aliases"){ ?>class="act"<?php } ?>>Aliases</li><?php } ?>
    <?php if($GLOBALS['assocCount'] > 0){ ?><li class="la" onclick="self.location.href='index.php?page=view-address&id=<?php echo $_GET['id']; ?>&ex=<?php echo $ex; ?>&d=assoc'" <?php if(isset($_GET['d']) && $_GET['d'] == "assoc"){ ?>class="act"<?php } ?>>Associations</li><?php } ?>
    <?php if($GLOBALS['attribCount'] > 0){ ?><li class="la" onclick="self.location.href='index.php?page=view-address&id=<?php echo $_GET['id']; ?>&ex=<?php echo $ex; ?>&d=attrib'" <?php if(isset($_GET['d']) && $_GET['d'] == "attrib"){ ?>class="act"<?php } ?>>Attributes</li><?php } ?>
</ul>