<?php
include("../../framework/controller.php");
$rand = rand(0, 100000000);
try{
	if(!is_dir("../../attachments/")){
		mkdir("../../attachments/");
	}
	if(copy($_POST['path'], "../../attachments/".$rand.basename($_POST['path']))){
		if(isset($_POST['act_id']) && $_POST['act_id'] > 0){
			echo WEBSITE."page.view-attachment.php?name=".$rand.basename($_POST['path']."&req_id=".$_POST['req_id']."&act_id=".$_POST['act_id']);
		}
		else{
			echo WEBSITE."page.view-attachment.php?name=".$rand.basename($_POST['path']."&req_id=".$_POST['req_id']);
		}
	}
	else{
		if(isset($_POST['act_id']) && $_POST['act_id'] > 0){
			echo WEBSITE."mobile/page.attachment-error.php?name=".$rand.basename($_POST['path']."&req_id=".$_POST['req_id']."&act_id=".$_POST['act_id']);
		}
		else{
			echo WEBSITE."mobile/page.attachment-error.php?name=".$rand.basename($_POST['path']."&req_id=".$_POST['req_id']);
		}
	}
}
catch(Exception $e){
	echo $e -> getMessage();
}
?>