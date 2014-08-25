<?php
if($_SESSION['roleSecurity']->{str_replace("-","_",$_GET['page'])} == "Y"){
	?>
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
<span class="graytitle">Request User Defined Fields</span>
<div id="UDFsShow">
	  <ul class="pageitem">
			<li class="button">
				<input type="button" value="Show (<?php echo $count_udf; ?>)"  class="openSection" id="UDFs"/>
			</li>
            <?php
			if($count_udf > 0 && $GLOBALS['finalised_ind'] == "N"){
				?>
            <li class="button">
				<input type="button" value="Modify" onclick="self.location='page.modify-udfs.php?req_id=<?php echo $GLOBALS['request_id']; ?>&ref_page=view-request'" />
			</li>
            <?php
			}
			?>
		   </ul>
		</div>
	  <div id="UDFsSection" style="display:none;">
		<ul class="pageitem">
			<?php
			if($count_udf > 1){
				foreach($GLOBALS['result']['udfs']->udf_details as $udf){

						if($udf->udf_active_ind == "Y"&& $udf->udf_action_id == 0){
							?>
							<li class="textbox">
								  <?php if($udf->udf_type != "C" && $udf->udf_type != "E"){ ?><b><?php echo $udf->udf_name; ?></b><?php } ?> <?php if($udf->udf_type == "G" || $udf->udf_type == "B" || $udf->udf_type == "P"){ ?><?php if(isset($udf->udf_data)) {  if(stristr(str_ireplace("\\", "/", $udf->udf_data), ATTACHMENT_FOLDER)){ ?><a href="#" id="<?php echo str_ireplace("\\", "/", $udf->udf_data); ?>" class="ViewFile">View</a> <?php } } } elseif($udf->udf_type == "D"){ echo strlen($udf->udf_data) > 0 ? date("d/m/Y", strtotime(str_replace("/","-",$udf->udf_data))) : ""; } elseif($udf->udf_type == "V"){ echo strlen($udf->udf_data) > 0 ? date("d/m/Y h:i A", strtotime(str_replace("/", "-", $udf->udf_data))) : ""; } else{ echo $udf->udf_data; } ?>
							   </li>
							<?php  
						}
				}
			}
			elseif($count_udf == 1){
				$udf =$GLOBALS['result']['udfs']->udf_details;
						if($udf->udf_active_ind == "Y"&& $udf->udf_action_id == 0){
							?>
							<li class="textbox">
								  <?php if($udf->udf_type != "C" && $udf->udf_type != "E"){ ?><b><?php echo $udf->udf_name; ?></b><?php } ?> <?php if($udf->udf_type == "G" || $udf->udf_type == "B" || $udf->udf_type == "P"){ ?><?php if(isset($udf->udf_data)) {  if(stristr(str_ireplace("\\", "/", $udf->udf_data), ATTACHMENT_FOLDER)){ ?><a href="#" id="<?php echo str_ireplace("\\", "/", $udf->udf_data); ?>" class="ViewFile">View</a> <?php } } } elseif($udf->udf_type == "D"){ echo strlen($udf->udf_data) > 0 ? date("d/m/Y", strtotime(str_replace("/","-",$udf->udf_data))) : ""; } elseif($udf->udf_type == "V"){ echo strlen($udf->udf_data) > 0 ? date("d/m/Y h:i A", strtotime(str_replace("/", "-", $udf->udf_data))) : ""; } else{ echo $udf->udf_data; } ?>
							   </li>
							<?php  
						}
			}
			?>
			<li class="button">
				<input type="button" value="Hide" class="closeSection" id="UDFs" />
			</li>
             <?php
			if($count_udf > 0 && $GLOBALS['finalised_ind'] == "N"){
				?>
            <li class="button">
				<input type="button" value="Modify" onclick="self.location='page.modify-udfs.php?req_id=<?php echo $GLOBALS['request_id']; ?>&ref_page=view-request'" />
			</li>
            <?php
			}
			?>
		</ul>
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
<span class="graytitle">Action User Defined Fields</span>
<div id="ActUDFsShow">
	  <ul class="pageitem">
			<li class="button">
				<input type="button" value="Show (<?php echo $count_udf; ?>)" class="openSection" id="ActUDFs" />
			</li>
		   </ul>
		</div>
	  <div id="ActUDFsSection" style="display:none;">
		<ul class="pageitem">
			<?php
			if($count_udf > 1){
				foreach($GLOBALS['result']['udfs']->udf_details as $udf){

						if($udf->udf_active_ind == "Y"&& $udf->udf_action_id != 0){
							?>
							<li class="textbox">
								<b><?php if($udf->udf_action_id == 0){ echo "(Request)</b>"; } else { echo "(Action ".$udf->udf_action_id.") - </b>".$udf->action_required; } ?><br />
								 <?php if($udf->udf_type != "C" && $udf->udf_type != "E"){ ?><b><?php echo $udf->udf_name; ?></b><?php } ?> <?php if($udf->udf_type == "G" || $udf->udf_type == "B" || $udf->udf_type == "P"){ ?><?php if(isset($udf->udf_data)) {  if(stristr(str_ireplace("\\", "/", $udf->udf_data), ATTACHMENT_FOLDER)){ ?><a id="<?php echo str_ireplace("\\", "/", $udf->udf_data); ?>" href="#" class="ViewFile">View</a> <?php } } }  elseif($udf->udf_type == "D"){ echo strlen($udf->udf_data) > 0 ? date("d/m/Y", strtotime(str_replace("/","-",$udf->udf_data))) : ""; } elseif($udf->udf_type == "V"){ echo strlen($udf->udf_data) > 0 ? date("d/m/Y h:i A", strtotime(str_replace("/", "-", $udf->udf_data))) : ""; } else{ echo $udf->udf_data; } ?>
							   </li>
							<?php  
						}
				}
			}
			elseif($count_udf == 1){
				$udf =$GLOBALS['result']['udfs']->udf_details;
						if($udf->udf_active_ind == "Y"&& $udf->udf_action_id != 0){
							?>
							<li class="textbox">
								 <b><?php if($udf->udf_action_id == 0){ echo "(Request)</b>"; } else { echo "(Action ".$udf->udf_action_id.") - </b>".$udf->action_required; } ?><br />
								 <?php if($udf->udf_type != "C" && $udf->udf_type != "E"){ ?><b><?php echo $udf->udf_name; ?></b><?php } ?> <?php if($udf->udf_type == "G" || $udf->udf_type == "B" || $udf->udf_type == "P"){ ?><?php if(isset($udf->udf_data)) {  if(stristr(str_ireplace("\\", "/", $udf->udf_data), ATTACHMENT_FOLDER)){ ?><a id="<?php echo str_ireplace("\\", "/", $udf->udf_data); ?>" href="#" class="ViewFile">View</a> <?php } } }  elseif($udf->udf_type == "D"){ echo strlen($udf->udf_data) > 0 ? date("d/m/Y", strtotime(str_replace("/","-",$udf->udf_data))) : ""; } elseif($udf->udf_type == "V"){ echo strlen($udf->udf_data) > 0 ? date("d/m/Y h:i A", strtotime(str_replace("/", "-", $udf->udf_data))) : ""; } else{ echo $udf->udf_data; } ?>
							   </li>
							<?php  
						}
			}
			?>
			<li class="button">
				<input type="button" value="Hide" class="closeSection" id="ActUDFs" />
			</li>
		</ul>
		</div>
        <?php
}
?>
