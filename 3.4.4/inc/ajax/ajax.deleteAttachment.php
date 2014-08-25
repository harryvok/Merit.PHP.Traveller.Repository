<?php
include("../../framework/controller.php");
unlink(LOCAL_LINK."attachments/".basename($_POST['path']));
?>