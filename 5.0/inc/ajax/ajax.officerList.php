<?php
include("../../framework/controller.php");
$controller = new Controller();
$controller->Get("Officers");

$input = $_GET['term'];
$act = $_SESSION["act"];
$addAct = $_SESSION["addAct"];
$page =  $_SESSION['page'];

$array = array();
if(isset($GLOBALS['result']->officer_details)){
	$i = 0;
	foreach($GLOBALS['result']->officer_details as $result){
        if(strlen($input) >0){
            if(isset($result->surname) && stristr(strtolower($result->surname), strtolower($input)) || isset($result->given_names) && stristr(strtolower($result->given_names), strtolower($input)) ){
                if(isset($result->given_names)){
                    if($act == "reassign" || $act == "reopenAction" || $act == "reopenRequest" ||  $addAct == 1 || $page == "myPreferences"){
                        if($result->terminate_ind == "N"){
                            $array[$i] = array("label" => $result->surname.", ".$result->given_names, "index" => $result->responsible_code);
                            $i = $i + 1;
                        }
                    }
                    else{
                        $array[$i] = array("label" => $result->surname.", ".$result->given_names, "index" => $result->responsible_code);
                        $i = $i + 1;
                    }
                }
                else{
                    if($act == "reassign" || $act == "reopenAction" || $act == "reopenRequest" ||  $addAct == 1 || $page == "myPreferences"){
                        if($result->terminate_ind == "N"){
                            $array[$i] = array("label" => $result->surname, "index" => $result->responsible_code);	
                            $i = $i + 1;
                        }
                    }
                    else{
                        $array[$i] = array("label" => $result->surname, "index" => $result->responsible_code);
                        $i = $i + 1;
                    }
                }
            }
        }
        else{
            if(isset($result->given_names)){
                if($act == "reassign" || $act == "reopenAction" || $act == "reopenRequest" ||  $addAct == 1 || $page == "myPreferences"){
                    if($result->terminate_ind == "N"){
                        $array[$i] = array("label" => $result->surname.", ".$result->given_names, "index" => $result->responsible_code);
                        $i = $i + 1;
                    }
                }
                else{
                    $array[$i] = array("label" => $result->surname.", ".$result->given_names, "index" => $result->responsible_code);
                    $i = $i + 1;
                }
            }
            else{
                if($act == "reassign" || $act == "reopenAction" || $act == "reopenRequest" ||  $addAct == 1 || $page == "myPreferences"){
                    if($result->terminate_ind == "N"){
                        $array[$i] = array("label" => $result->surname, "index" => $result->responsible_code);
                        $i = $i + 1;
                    }
                }
                else{
                    $array[$i] = array("label" => $result->surname, "index" => $result->responsible_code);
                    $i = $i + 1;
                }	
            }
        }		
	}
}
echo json_encode($array);
?>