<?php

setcookie("user_id", "", time() - 3600);	
setcookie("password", "", time() - 3600);
setcookie("data_group", "", time() - 3600);
setcookie("security_group", "", time() - 3600);
setcookie("responsible_code", "", time() - 3600);
setcookie("surname", "", time() - 3600);
setcookie("given_name", "", time() - 3600);
unset($_SESSION['roleSecurity']);
unset($_SESSION['roleSecurityArray']);
unset($_SESSION['roleSecurityErrorArray']);
header("Location: index.php");

?>