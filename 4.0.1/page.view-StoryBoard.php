
<?php
$name_id = strip_tags($_GET['id']);
if(isset($_GET['ref'])){ $ref = strip_tags($_GET['ref']); }
if(isset($_GET['ref_page'])){ $page = strip_tags($_GET['ref_page']); }
if(isset($_GET['d']) && $_GET['d'] == "StoryBoard" || !isset($_GET['d'])){
	$controller->Display("StoryBoard","Storyboard");
}

?>
