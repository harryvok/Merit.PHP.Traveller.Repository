<?php
if(isset($_SESSION['done']) && $_SESSION['done'] == 1){
	unset($_SESSION['done']);
	?>
    <ul class="pageitem">
		<li class="textbox">
			<?php
            if(isset($_SESSION['error']) && $_SESSION['error'] == 1){
                unset($_SESSION['error']);
                ?>
                    The following errors occurred:
                    <p>
                    <?php
                    foreach($_SESSION as $var => $data){
                        if(stristr($var, "error_")){
                            if($data == 1 || strlen($data) > 0){
                                echo '<b> - '.$error_array[$var].'</b><br>';
                                unset($_SESSION[$var]);	
                            }
                        }
                    }
                    ?>
                    </p>
                <?php
            }
            if(isset($_SESSION['success']) && $_SESSION['success'] == 1){
                unset($_SESSION['success']);
                ?>
                    The following actions have been completed:
                    <p>
                    <?php
                    foreach($_SESSION as $var => $data){
                        if(stristr($var, "success_")){
                            if($data == 1 || strlen($data) > 0){
                                echo '<b> - '.$success_array[$var].'</b><br>';
                                unset($_SESSION[$var]);	
                            }
                        }
                    }
                    ?>
                    </p>
                <?php
            }
            ?>
    	</li>
    </ul>
    <?php
}
?>