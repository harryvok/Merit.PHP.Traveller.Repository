
<?php
$count_udf = 0;
if(count($GLOBALS['result']['udfs']->udf_details) > 1){
	foreach($GLOBALS['result']['udfs']->udf_details as $udf){
			if(isset($udf->udf_active_ind) && $udf->udf_active_ind == "Y"&& $udf->udf_action_id == 0){
				$count_udf = $count_udf+1;
			}					
	}
}
elseif(count($GLOBALS['result']['udfs']->udf_details) == 1){
	$udf = $GLOBALS['result']['udfs']->udf_details;
	if(isset($udf->udf_active_ind) && $udf->udf_active_ind == "Y"&& $udf->udf_action_id == 0){
		  $count_udf = $count_udf+1;
	  }		
}
?>
<div data-role="collapsible">
	<h4>Request UDFs <span class="ui-li-count ui-btn-up-c ui-btn-corner-all"><?php echo $count_udf; ?></span></h4>
    <p>
    	<ul class="no-ellipses" data-role="listview" data-count-theme="b" data-inset="true">
			<?php
			if($count_udf > 1){
				foreach($GLOBALS['result']['udfs']->udf_details as $udf){

					if($udf->udf_active_ind == "Y"&& $udf->udf_action_id == 0){
						?>
						<li>
								 <p><?php if($udf->udf_type == "G" || $udf->udf_type == "B" || $udf->udf_type == "P"){  if(isset($udf->udf_data)) {  if(stristr(str_ireplace("\\", "/", $udf->udf_data), ATTACHMENT_FOLDER)){ ?><a href="#" id="<?php echo str_ireplace("\\", "/", $udf->udf_data); ?>" class="ViewFile"><b><?php echo $udf->udf_name; ?></b> View</a><!--<div id="imageViewer<?php echo str_ireplace("\\", "", $udf->udf_data); ?>"> </div>--> <?php } else { echo "<b>".$udf->udf_name."</b>"; } } else { echo "<b>".$udf->udf_name."</b>"; } }  else{ ?><?php if($udf->udf_type != "C" && $udf->udf_type != "E"){ ?><b><?php echo $udf->udf_name; ?></b><?php } ?> <?php if($udf->udf_type == "D"){ echo strlen($udf->udf_data) > 0 ? date("d/m/Y", strtotime(str_replace("/","-",$udf->udf_data))) : ""; } elseif($udf->udf_type == "V"){ echo strlen($udf->udf_data) > 0 ? date("d/m/Y h:i A", strtotime(str_replace("/", "-", $udf->udf_data))) : ""; } else { echo $udf->udf_data; } } ?></b></p>
                            

                            
						   </li>
						<?php  
					}
				}
			}
			elseif($count_udf == 1){
				$udf =$GLOBALS['result']['udfs']->udf_details;
				if($udf->udf_active_ind == "Y"&& $udf->udf_action_id == 0){
					?>
					<li>
								  <p><?php if($udf->udf_type == "G" || $udf->udf_type == "B" || $udf->udf_type == "P"){ if(isset($udf->udf_data)) {  if(stristr(str_ireplace("\\", "/", $udf->udf_data), ATTACHMENT_FOLDER)){ ?><a href="#" id="<?php echo str_ireplace("\\", "/", $udf->udf_data); ?>" class="ViewFile"><b><?php echo $udf->udf_name; ?></b> View</a> <?php } else { echo "<b>".$udf->udf_name."</b>"; } } else { echo "<b>".$udf->udf_name."</b>"; } } else{ ?><?php if($udf->udf_type != "C" && $udf->udf_type != "E"){ ?><b><?php echo $udf->udf_name; ?></b><?php } ?> <?php if($udf->udf_type == "D"){ echo strlen($udf->udf_data) > 0 ? date("d/m/Y", strtotime(str_replace("/","-",$udf->udf_data))) : ""; } elseif($udf->udf_type == "V"){ echo strlen($udf->udf_data) > 0 ? date("d/m/Y h:i A", strtotime(str_replace("/", "-", $udf->udf_data))) : ""; } else { echo $udf->udf_data; } } ?></b></p>
						   </li>
					<?php  
				}
			}
			?>
            </ul>
             <?php
             
             if($count_udf > 0 && $GLOBALS['finalised_ind'] == "N" && $_SESSION['roleSecurity']->mod_udf == "Y"){
				?>
           
				<a  data-role="button" href="index.php?page=<?php echo $_GET['page']; ?>&id=<?php echo $GLOBALS['id']; ?>&d=modify-udfs">Modify</a>
			
            <?php
			}
			?>
            </p>
		</div>
    <?php
$count_udf = 0;
if(count($GLOBALS['result']['udfs']->udf_details) > 1){
	foreach($GLOBALS['result']['udfs']->udf_details as $udf){
			if(isset($udf->udf_active_ind) && $udf->udf_active_ind == "Y"&& $udf->udf_action_id != 0){
				$count_udf = $count_udf+1;
			}					
	}
}
elseif(count($GLOBALS['result']['udfs']->udf_details) == 1){
	$udf = $GLOBALS['result']['udfs']->udf_details;
	if(isset($udf->udf_active_ind) && $udf->udf_active_ind == "Y"&& $udf->udf_action_id != 0){
		  $count_udf = $count_udf+1;
	  }		
}
?>
<div data-role="collapsible">
	<h4>Action UDFs <span class="ui-li-count ui-btn-up-c ui-btn-corner-all"><?php echo $count_udf; ?></span></h4>
    <p>
    	<ul data-role="listview" data-count-theme="b" data-inset="true">
			<?php
			if($count_udf > 1){
				foreach($GLOBALS['result']['udfs']->udf_details as $udf){

						if($udf->udf_active_ind == "Y"&& $udf->udf_action_id != 0){
							?>
							<li>
                            	<?php if($udf->udf_type == "G" || $udf->udf_type == "B" || $udf->udf_type == "P"){ ?><?php if(isset($udf->udf_data)) {  if(stristr(str_ireplace("\\", "/", $udf->udf_data), ATTACHMENT_FOLDER)){ ?><a id="<?php echo str_ireplace("\\", "/", $udf->udf_data); ?>" href="#" class="ViewFile"> <?php } } } ?><p>
                            	<?php if($udf->udf_type != "C" && $udf->udf_type != "E"){ ?><b><?php echo $udf->udf_name; ?></b><?php } ?>
								<b><?php if($udf->udf_action_id == 0){ echo "(Request)</b>"; } else { echo "(Action ".$udf->udf_action_id.") - </b>".$udf->action_required; } ?><br />
								  <?php if($udf->udf_type == "D"){ echo strlen($udf->udf_data) > 0 ? date("d/m/Y", strtotime(str_replace("/","-",$udf->udf_data))) : ""; } elseif($udf->udf_type == "V"){ echo strlen($udf->udf_data) > 0 ? date("d/m/Y h:i A", strtotime(str_replace("/", "-", $udf->udf_data))) : ""; } else{ echo $udf->udf_data;} ?>
                                  </p></a>
							   </li>
							<?php  
						}
				}
			}
			elseif($count_udf == 1){
				$udf =$GLOBALS['result']['udfs']->udf_details;
                foreach($GLOBALS['result']['udfs']->udf_details as $udf){

                    if($udf->udf_active_ind == "Y"&& $udf->udf_action_id != 0){
                            ?>
                            <li>
							<?php if($udf->udf_type == "G" || $udf->udf_type == "B" || $udf->udf_type == "P"){ ?><?php if(isset($udf->udf_data)) {
                                                                                                                           if(stristr(str_ireplace("\\", "/", $udf->udf_data), ATTACHMENT_FOLDER)){ ?><a id="<?php echo str_ireplace("\\", "/", $udf->udf_data); ?>" href="#" class="ViewFile"> <?php }
                                                                                                                       }
                                                                                                                                                 } ?><p>
                            	<?php if($udf->udf_type != "C" && $udf->udf_type != "E"){ ?><b><?php echo $udf->udf_name; ?></b><?php } ?>
								<b><?php if($udf->udf_action_id == 0){ echo "(Request)</b>"; } else { echo "(Action ".$udf->udf_action_id.") - </b>".$udf->action_required; } ?><br />
								   <?php if($udf->udf_type == "D"){ echo strlen($udf->udf_data) > 0 ? date("d/m/Y", strtotime(str_replace("/","-",$udf->udf_data))) : ""; } elseif($udf->udf_type == "V"){ echo strlen($udf->udf_data) > 0 ? date("d/m/Y h:i A", strtotime(str_replace("/", "-", $udf->udf_data))) : ""; } else{ echo $udf->udf_data;} ?>
                                  </p></a>
							   </li>
							<?php  
                    }
                }
			}
			?>
		</ul>
    </p>
</div>
