<?php
include("../../framework/controller.php");
$rand = rand(0, 100000000);
try{
	if(!is_dir("../../attachments/")){
		mkdir("../../attachments/");
	}
	if(copy($_POST['path'], "../../attachments/".$rand.basename($_POST['path']))){
		echo WEBSITE."attachments/".$rand.basename($_POST['path']);
	}
	else{
		echo WEBSITE."page.attachmentError.php";	
	}
	
}
catch(Exception $e){
	echo $e -> getMessage();
}
?>