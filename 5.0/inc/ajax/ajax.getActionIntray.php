<?php

/**
 * ajax short summary.
 *
 * ajax description.
 *
 * @version 1.0
 * @author phirpara
 */
session_start();
include("../../framework/controller.php");
$controller = new Controller();
$controller->Get("ActionIntray", "ActionIntray");

?>
