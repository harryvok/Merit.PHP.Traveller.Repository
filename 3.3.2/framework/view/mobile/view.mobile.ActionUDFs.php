<?php
if($_SESSION['roleSecurity']->{str_replace("-","_",$_GET['page'])} == "Y"){
	?>
<?php
$count_udf = 0;
if(count($GLOBALS['result']['udfs']->udf_details) > 1){
	foreach($GLOBALS['result']['udfs']->udf_details as $udf){
			if(isset($udf->udf_active_ind) && $udf->udf_active_ind == "Y" && $udf->udf_action_id == 0){
				$count_udf = $count_udf+1;
			}					
	}
}
elseif(count($GLOBALS['result']['udfs']->udf_details) == 1){
	$udf = $GLOBALS['result']['udfs']->udf_details;
	if(isset($udf->udf_active_ind) && $udf->udf_active_ind == "Y" && $udf->udf_action_id == 0){
		  $count_udf = $count_udf+1;
	  }		
}
?>
	<span class="graytitle">Request User Defined Fields</span>
<div id="UDFsShow">
	  <ul class="pageitem">
			<li class="button">
				<input type="button" value="Show (<?php echo $count_udf; ?>)" class="openSection" id="UDFs" />
			</li>
            <?php
			if($count_udf > 0 && $GLOBALS['finalised_ind'] == "N"){
				?>
            <li class="button">
				<input type="button" value="Modify" onclick="self.location='page.modify-udfs.php?req_id=<?php echo $GLOBALS['request_id']; ?>&act_id=<?php echo $_GET['id']; ?>&ref_page=view-action'" />
			</li>
            <?php
			}
			?>
		   </ul>
		</div>
	  <div id="UDFsSection" style="display:none;">
		<ul class="pageitem">
			<?php
			if(count($GLOBALS['result']['udfs']->udf_details) > 1){
				foreach($GLOBALS['result']['udfs']->udf_details as $udf){
					if($udf->udf_active_ind == "Y" && $udf->udf_action_id == 0){
						?>
						<li class="textbox">
					<?php if($udf->udf_type != "C" && $udf->udf_type != "E"){ ?><b><?php echo $udf->udf_name; ?></b><?php } ?> <?php if($udf->udf_type == "G" || $udf->udf_type == "B" || $udf->udf_type == "P"){ ?><?php if(isset($udf->udf_data)) {  if(stristr(str_ireplace("\\", "/", $udf->udf_data), ATTACHMENT_FOLDER)){ ?><a href="#" id="<?php echo str_ireplace("\\", "/", $udf->udf_data); ?>" class="ViewFile">View</a> <?php } } } elseif($udf->udf_type == "D"){ echo strlen($udf->udf_data) > 0 ? date("d/m/Y", strtotime(str_replace("/","-",$udf->udf_data))) : ""; } elseif($udf->udf_type == "V"){ echo strlen($udf->udf_data) > 0 ? date("d/m/Y h:i A", strtotime(str_replace("/", "-", $udf->udf_data))) : ""; } else{ echo $udf->udf_data; } ?>
						   </li>
						<?php  
					}
				}
			}
			elseif(count($GLOBALS['result']['udfs']->udf_details) == 1){
				$udf =$GLOBALS['result']['udfs']->udf_details;
				if($udf->udf_active_ind == "Y" && $udf->udf_action_id == 0){
				?>
				<li class="textbox">
						<?php if($udf->udf_type != "C" && $udf->udf_type != "E"){ ?><b><?php echo $udf->udf_name; ?></b><?php } ?> <?php if($udf->udf_type == "G" || $udf->udf_type == "B" || $udf->udf_type == "P"){ ?><?php if(isset($udf->udf_data)) {  if(stristr(str_ireplace("\\", "/", $udf->udf_data), ATTACHMENT_FOLDER)){ ?><a href="#" id="<?php echo str_ireplace("\\", "/", $udf->udf_data); ?>" class="ViewFile">View</a> <?php } } } elseif($udf->udf_type == "D"){ echo strlen($udf->udf_data) > 0 ? date("d/m/Y", strtotime(str_replace("/","-",$udf->udf_data))) : ""; } elseif($udf->udf_type == "V"){ echo strlen($udf->udf_data) > 0 ? date("d/m/Y h:i A", strtotime(str_replace("/", "-", $udf->udf_data))) : ""; } else{ echo $udf->udf_data; } ?>
				   </li>
				<?php  
				}
			}
			?>
			<li class="button">
				<input type="button" value="Hide" class="closeSection" id="UDFs"/>
			</li>
            <li class="button">
				<input type="button" value="Modify" onclick="self.location='page.modify-udfs.php?req_id=<?php echo $GLOBALS['request_id']; ?>&act_id=<?php echo $_GET['id']; ?>&ref_page=view-action'" />
			</li>
		</ul>
		</div>
 
 
 <?php
$count_udf = 0;
if(count($GLOBALS['result']['udfs']->udf_details) > 1){
	foreach($GLOBALS['result']['udfs']->udf_details as $udf){
			if(isset($udf->udf_active_ind) && $udf->udf_active_ind == "Y" && $udf->udf_action_id == $_GET['id']){
				$count_udf = $count_udf+1;
			}					
	}
}
elseif(count($GLOBALS['result']['udfs']->udf_details) == 1){
	$udf = $GLOBALS['result']['udfs']->udf_details;
	if(isset($udf->udf_active_ind) && $udf->udf_active_ind == "Y" && $udf->udf_action_id == $_GET['id']){
		  $count_udf = $count_udf+1;
	  }		
}
?>
	<span class="graytitle">Action User Defined Fields</span>
<div id="ActUDFsShow">
	  <ul class="pageitem">
			<li class="button">
				<input type="button" value="Show (<?php echo $count_udf; ?>)"  class="openSection" id="ActUDFs" />
			</li>
            <?php
			if($count_udf > 0 && $GLOBALS['act_finalised_ind'] == "N"){
				?>
            <li class="button">
				<input type="button" value="Modify" onclick="self.location='page.modify-act-udfs.php?req_id=<?php echo $GLOBALS['request_id']; ?>&act_id=<?php echo $_GET['id']; ?>'" />
			</li>
            <?php
			}
			?>
		   </ul>
		</div>
	  <div id="ActUDFsSection" style="display:none;">
		<ul class="pageitem">
			<?php
			if(count($GLOBALS['result']['udfs']->udf_details) > 1){
				foreach($GLOBALS['result']['udfs']->udf_details as $udf){
					if($udf->udf_active_ind == "Y" && $udf->udf_action_id == $_GET['id']){
						?>
						<li class="textbox">
								  <?php if($udf->udf_type != "C" && $udf->udf_type != "E"){ ?><b><?php echo $udf->udf_name; ?></b><?php } ?> <?php if($udf->udf_type == "G" || $udf->udf_type == "B" || $udf->udf_type == "P"){ ?><?php if(isset($udf->udf_data)) {  if(stristr(str_ireplace("\\", "/", $udf->udf_data), ATTACHMENT_FOLDER)){ ?><a href="#" id="<?php echo str_ireplace("\\", "/", $udf->udf_data); ?>" class="ViewFile">View</a> <?php } } } elseif($udf->udf_type == "D"){ echo strlen($udf->udf_data) > 0 ? date("d/m/Y", strtotime(str_replace("/","-",$udf->udf_data))) : ""; } elseif($udf->udf_type == "V"){ echo strlen($udf->udf_data) > 0 ? date("d/m/Y h:i A", strtotime(str_replace("/", "-", $udf->udf_data))) : ""; } else{ echo $udf->udf_data; } ?>
						   </li>
						<?php  
					}
				}
			}
			elseif(count($GLOBALS['result']['udfs']->udf_details) == 1){
				$udf =$GLOBALS['result']['udfs']->udf_details;
				if($udf->udf_active_ind == "Y" && $udf->udf_action_id == $_GET['id']){
				?>
				<li class="textbox">
						<?php if($udf->udf_type != "C" && $udf->udf_type != "E"){ ?><b><?php echo $udf->udf_name; ?></b><?php } ?> <?php if($udf->udf_type == "G" || $udf->udf_type == "B" || $udf->udf_type == "P"){ ?><?php if(isset($udf->udf_data)) {  if(stristr(str_ireplace("\\", "/", $udf->udf_data), ATTACHMENT_FOLDER)){ ?><a href="#" id="<?php echo str_ireplace("\\", "/", $udf->udf_data); ?>" class="ViewFile">View</a> <?php } } } elseif($udf->udf_type == "D"){ echo strlen($udf->udf_data) > 0 ? date("d/m/Y", strtotime(str_replace("/","-",$udf->udf_data))) : ""; } elseif($udf->udf_type == "V"){ echo strlen($udf->udf_data) > 0 ? date("d/m/Y h:i A", strtotime(str_replace("/", "-", $udf->udf_data))) : ""; } else{ echo $udf->udf_data; } ?>
				   </li>
				<?php  
				}
			}
			?>
			<li class="button">
				<input type="button" value="Hide" class="closeSection" id="ActUDFs" />
			</li>
            <?php
			if($count_udf > 0 && $GLOBALS['act_finalised_ind'] == "N"){
				?>
            <li class="button">
				<input type="button" value="Modify" onclick="self.location='page.modify-act-udfs.php?req_id=<?php echo $GLOBALS['request_id']; ?>&act_id=<?php echo $_GET['id']; ?>'" />
			</li>
            <?php
			}
			?>
		</ul>
		</div>
        <?php
}
?>