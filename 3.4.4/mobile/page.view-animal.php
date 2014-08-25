
<?php
$name_id = strip_tags($_GET['id']);
if(isset($_GET['ex'])){ $ex = strip_tags($_GET['ex']); }
?>
<div data-role="page" id="view-request">
  <div data-role="header" data-position="fixed">
  	<?php if(!isset($_GET['d'])){ ?><a href="<?php echo $_SESSION['backLink']; ?>" data-role="button" data-icon="arrow-l" data-theme="a" data-transition="fade" data-iconpos="notext">Back</a>
     <?php } else { ?><a href="index.php?page=view-animal&id=<?php echo $name_id; ?>" data-role="button" data-icon="arrow-l" data-theme="a" data-transition="fade" data-iconpos="notext">Back</a><?php } ?>
     <h1>View Animal</h1>
  </div>
  <div data-role="content">
			 <?php
			 $controller->Display("Animal", "Animal", $name_id);
			 ?>
		</div>

