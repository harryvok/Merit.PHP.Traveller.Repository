<?php
$input = isset($_GET['term']) ? $_GET['term'] : "";
$array = array();
if(isset($GLOBALS['result']->keyword_details)){
	$i = 0;
	foreach($GLOBALS['result']->keyword_details as $result){
		
			if(strlen($input) >0){
				if(stristr(strtolower($result->keyword), strtoupper($input))){
					$array[$i] = $result->keyword;	
					$i = $i + 1;
				}
				elseif(stristr(strtoupper($result->keyword), strtoupper($input))){
					$array[$i] = $result->keyword;	
					$i = $i + 1;
				}
			}
			else{
				$array[$i] = $result->keyword;	
				$i = $i + 1;
			}
		
	}
}

echo json_encode($array);
?>