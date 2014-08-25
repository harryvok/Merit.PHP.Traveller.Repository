<?php
$input = $_GET['term'];
$array = array();
if(isset($GLOBALS['result']->officer_details)){
	$i = 0;
	foreach($GLOBALS['result']->officer_details as $result){

			if(strlen($input) >0){
				if(isset($result->surname) && stristr(strtolower($result->surname), strtolower($input)) || isset($result->given_names) && stristr(strtolower($result->given_names), strtolower($input)) ){
					if(isset($result->given_names)){
						$array[$i] = array("label" => $result->surname.", ".$result->given_names, "index" => $result->responsible_code);
						$i = $i + 1;
					}
					else{
						$array[$i] = array("label" => $result->surname, "index" => $result->responsible_code);	
						$i = $i + 1;
					}
				}
			}
			else{
				if(isset($result->given_names)){
					$array[$i] = array("label" => $result->surname.", ".$result->given_names, "index" => $result->responsible_code);
					$i = $i + 1;
				}
				else{
					$array[$i] = array("label" => $result->surname, "index" => $result->responsible_code);
					$i = $i + 1;	
				}
			}

	}
}

echo json_encode($array);
?>