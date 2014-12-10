<?php
include("../../framework/controller.php");
$controller = new Controller();
$r = $controller->Process("ModifyNameDetails", false);
if ($r->name_id != "")
    $new_name_id = $r->name_id;
else
    $new_name_id = "";

echo json_encode($new_name_id);
?>