<?php
include("../../framework/controller.php");
$controller = new Controller();
$result = $controller->Get("EDMSDocument");
$data = base64_decode($result->base64_string);
try{
    if(!is_dir("../../attachments/")){
        mkdir("../../attachments/");
    }
    if(is_writable("../../attachments/")){
        $myfile = fopen("../../attachments/".$result->file_name, "w");
        fwrite($myfile, $data);
        fclose($myfile);
        echo WEBSITE."attachments/".$result->file_name;
    }
    else{
        echo WEBSITE."page.attachmentError.php";	
    }
    
}
catch(Exception $e){
    echo $e -> getMessage();
}


?>