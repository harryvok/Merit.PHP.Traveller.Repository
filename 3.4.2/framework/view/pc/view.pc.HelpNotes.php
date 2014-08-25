<?php
if(isset($GLOBALS['result']->help_text) && strlen($GLOBALS['result']->help_text) > 0){ $helpText = base64_decode($GLOBALS['result']->help_text); } else{ $helpText =  ""; }

$url = strpos($GLOBALS['result']->help_url, "www") !==  false ? strpos($GLOBALS['result']->help_url, "http://") !== false ? $GLOBALS['result']->help_url : "http://".$GLOBALS['result']->help_url :  $GLOBALS['result']->help_url;


if(strlen($GLOBALS['result']->help_url) > 0 && strpos($url, "http://") !== false){ $helpURL = "<a href='".$url ."' target='_blank'>".$GLOBALS['result']->help_url."</a>"; } else{ $helpURL =  ""; }

echo json_encode(array("helpText" => $helpText, "helpURL" => $helpURL));
?>