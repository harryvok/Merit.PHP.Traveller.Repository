
<?php
 $outcome_id = $_POST['outcome'];

if($outcome_id != "NORESPONSE"){
	if(isset($GLOBALS['result']->udf_details) && count($GLOBALS['result']->udf_details)>1){
		$i=0;
		
		foreach($GLOBALS['result']->udf_details as $udf){
			if($udf->udf_active_ind == "Y" && $udf->udf_action_id == $_POST['act_id']){
				if($udf->udf_action_comp == $outcome_id || $udf->udf_action_comp == ""){
				if($udf->udf_active_ind == "Y"){
					if($udf->udf_depends != 0){
						?>
                        <div id="depends_<?php echo $udf->udf_order; ?>" class="udfDependant">
                        <?php
					}
					if($udf->udf_type == "L"){
						$i=$i+1;
						//Begin Web Service Call
						//UDFs
						$wsdl2 = WEB_SERVICES_PATH.MERIT_REQUEST_FILE."?wsdl";
						$client2 = new SoapClient ($wsdl2);
						$parameters2 = new stdClass();
						$parameters2->user_id = $_COOKIE['user_id'];
						$parameters2->password = $_COOKIE['password'];
						$parameters2->look_type = $udf->udf_looktype;
						$result2 = $client2->ws_get_udf_ddlb_dets($parameters2)->ws_get_udf_ddlb_detsResult;
						$udf_ddld = array();
						?>
						<span class="graytitle"><?php echo $udf->udf_name; ?><?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "<span style='color:red;'>*</span>"; ?></span>
						<ul class="pageitem">
							<li class="select"><select class="text <?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "required"; ?>" name="udf_<?php echo $udf->udf_name; ?>" id="udf_<?php echo $udf->udf_order; ?>">
							<option value="">Select</option>
								<?php
								foreach($result2->udf_ddlb_det->string as $udf_ddld){
									?>
									<option <?php if(isset($udf->udf_data)){ if($udf->udf_data == $udf_ddld){ echo "selected"; } } ?>  value="<?php echo $udf_ddld; ?>"><?php echo $udf_ddld; ?></option>
									<?php	
								}
								?>
							</select>
							</li>
						</ul>
					<?php	
					}
					elseif($udf->udf_type == "I"){
						$i=$i+1;
					?>
						<span class="graytitle"><?php echo $udf->udf_name; ?><?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "<span style='color:red;'>*</span>"; ?></span>
						<ul class="pageitem">
							<li class="bigfield"><input type="text" name="udf_<?php echo $udf->udf_name; ?>" id="udf_<?php echo $udf->udf_order; ?>" class="text <?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "required"; ?> digits" value="<?php if(isset($udf->udf_data)) echo $udf->udf_data; ?>" size="5" maxlength="<?php if($udf->udf_fld_size > 0){ echo $udf->udf_fld_size; } ?>"></li>
						</ul>
					<?php
					}
					elseif($udf->udf_type == "A"){
						$i=$i+1;
					?>
						<span class="graytitle"><?php echo $udf->udf_name; ?> ($)</span>
						<ul class="pageitem">
							<li class="bigfield"><input type="text" name="udf_<?php echo $udf->udf_name; ?>" id="udf_<?php echo $udf->udf_order; ?>" class="text <?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "required"; ?> number" value="<?php if(isset($udf->udf_data)) echo str_ireplace("$", "", $udf->udf_data); ?>" size="5" maxlength="<?php if($udf->udf_fld_size > 0){ echo $udf->udf_fld_size; } ?>"></li>
						</ul>
					<?php
					}
					elseif($udf->udf_type == "T"){
						$i=$i+1;
					?>
						<span class="graytitle"><?php echo $udf->udf_name; ?><?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "<span style='color:red;'>*</span>"; ?></span>
							<ul class="pageitem">
								<li class="bigfield"><input type="text" name="udf_<?php echo $udf->udf_name; ?>" id="udf_<?php echo $udf->udf_order; ?>" class="text <?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "required"; ?>" value="<?php if(isset($udf->udf_data)) echo $udf->udf_data; ?>" size="<?php if($udf->udf_fld_size > 0){ echo $udf->udf_fld_size; } ?>" maxlength="<?php if($udf->udf_fld_size > 0){ echo $udf->udf_fld_size; } ?>"></li>
							</ul>
					<?php
					}
					elseif($udf->udf_type == "D"){
						$i=$i+1;
					?>
						<span class="graytitle"><?php echo $udf->udf_name; ?><?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "<span style='color:red;'>*</span>"; ?></span>
							<ul class="pageitem">
								<li class="bigfield"><input type="text" name="udf_<?php echo $udf->udf_name; ?>" id="udf_<?php echo $udf->udf_order; ?>" class="text <?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "required"; ?>" value="<?php if(isset($udf->udf_data) && strlen($udf->udf_data) > 0) echo date("d/m/Y", strtotime(str_replace("/","-",$udf->udf_data))); ?>" size="5" maxlength="10"></li>
							</ul>
					<?php
					}
					elseif($udf->udf_type == "Y"){
						$i=$i+1;
					?>
						<span class="graytitle"><?php echo $udf->udf_name; ?><?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "<span style='color:red;'>*</span>"; ?></span>
							<ul class="pageitem">
								<li class="radiobutton"><span class="name">Yes</span>
								<input class="<?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "required"; ?>" name="udf_<?php echo $udf->udf_name; ?>" id="udf_<?php echo $udf->udf_order; ?>_Y" type="radio" <?php if(isset($udf->udf_data) && $udf->udf_data == 'Y'){ echo "checked"; } ?> value="Y" /> </li>
								<li class="radiobutton"><span class="name">No</span>
								<input class="<?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "required"; ?>" name="udf_<?php echo $udf->udf_name; ?>" id="udf_<?php echo $udf->udf_order; ?>_N" type="radio" <?php if(isset($udf->udf_data) && $udf->udf_data == 'N'){ echo "checked"; } ?> value="N" /> </li>
							</ul>
					<?php
					}
					elseif($udf->udf_type == "M"){
						$i=$i+1;
					?>
						<span class="graytitle"><?php echo $udf->udf_name; ?><?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "<span style='color:red;'>*</span>"; ?></span>
						<ul class="pageitem">
							 <li class="bigfield">
								<input type="text" name="udf_<?php echo $udf->udf_name; ?>" id="udf_<?php echo $udf->udf_order; ?>" class="timeField text_udf <?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "required"; ?>"value="<?php if(isset($udf->udf_data) && strlen($udf->udf_data) > 0) echo date("h:i A", strtotime($udf->udf_data)); ?>" size="5" maxlength="10">
							</li>
						</ul>
					<?php	
					}
					elseif($udf->udf_type == "V"){
						$i=$i+1;
					?>
						<span class="graytitle"><?php echo $udf->udf_name; ?><?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "<span style='color:red;'>*</span>"; ?></span>
						<?php 
						$udfdata = explode(" ", $udf->udf_data);
						if(isset($udfdata[0]) && !isset($udfdata[1])){
							$udfdata[1] = substr($udfdata[0],10,15);
							$udfdata[0] = substr($udfdata[0],0,10);
						}
						 ?>
						<ul class="pageitem">
							<li class="smallfield">
								<span class="name">Date</span> <input type="text" name="udf_<?php echo $udf->udf_name; ?>_date" id="udf_<?php echo $udf->udf_order; ?>_date" class="dateField text_udf_small <?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "required"; ?>" value="<?php if(isset($udfdata[0]) && strlen($udfdata[0]) > 0) echo date("d/m/Y", strtotime(str_replace("/","-",$udfdata[0]))); ?>" size="5" maxlength="10">
							</li>
							<li class="smallfield">
								<span class="name">Time:</span> <input type="text" name="udf_<?php echo $udf->udf_name; ?>_time" id="udf_<?php echo $udf->udf_order; ?>_time" class="timeField text_udf_small <?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "required"; ?>"value="<?php if(isset($udfdata[1]) && strlen($udfdata[1]) > 0) echo date("h:i A", strtotime($udfdata[1])); ?>" size="5" maxlength="10">
						   </li>
						</ul>
					<?php	
					}
					elseif($udf->udf_type == "G"){
						$i=$i+1;
					?>
						<span class="graytitle"><?php echo $udf->udf_name; ?><?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "<span style='color:red;'>*</span>"; ?></span>
							<ul class="pageitem">
								<li class="bigfield"><input type="file" name="udf_<?php echo $udf->udf_name; ?>" id="udf_<?php echo $udf->udf_order; ?>" class="text_udf <?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "required"; ?>"></li>
							</ul>
					<?php
					}
					elseif($udf->udf_type == "B"){
						$i=$i+1;
					?>
						<span class="graytitle"><?php echo $udf->udf_name; ?><?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "<span style='color:red;'>*</span>"; ?></span>
							<ul class="pageitem">
								<li class="bigfield"><input type="file" name="udf_<?php echo $udf->udf_name; ?>" id="udf_<?php echo $udf->udf_order; ?>" class="text_udf <?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "required"; ?>"></li>
							</ul>
					<?php
					}
					elseif($udf->udf_type == "P"){
						$i=$i+1;
					?>
						<span class="graytitle"><?php echo $udf->udf_name; ?><?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "<span style='color:red;'>*</span>"; ?></span>
							<ul class="pageitem">
								<li class="bigfield"><input type="file" name="udf_<?php echo $udf->udf_name; ?>" id="udf_<?php echo $udf->udf_order; ?>" class="text_udf <?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "required"; ?>"></li>
							</ul>
					<?php
					}
					else{
						?>
						<input type="hidden" name="udf_<?php echo $udf->udf_name; ?>" value="<?php echo $udf->udf_data; ?>" />
						<?php	
					}
					if($udf->udf_depends != 0){
								?>
								</div>
								<script type="text/javascript">
									$(document).ready(function(){
										var rand = Math.floor(Math.random() * 10000) + 2; vo[rand] = new VarOperator("="); vo[rand].operation = "<?php echo $udf->udf_op_code; ?>";
										if($("[id^=udf_<?php echo $udf->udf_depends; ?>]").attr('type') == "radio"){
											
											if($("#udf_<?php echo $udf->udf_depends; ?>_<?php echo $udf->udf_dep_value; ?>").attr("checked") == "checked" || $("#udf_<?php echo $udf->udf_depends; ?>_<?php echo $udf->udf_dep_value; ?>").attr("checked") == true){
												$("#depends_<?php echo $udf->udf_order; ?>").fadeIn("fast");
											}
										}
										else{
											if($("[id^=udf_<?php echo $udf->udf_depends; ?>]").val() != "" && vo[rand].evaluate($("[id^=udf_<?php echo $udf->udf_depends; ?>]").val(),"<?php echo $udf->udf_dep_value; ?>")){
												$("#depends_<?php echo $udf->udf_order; ?>").fadeIn("fast");
											}
										}
										$("[id^=udf_<?php echo $udf->udf_depends; ?>]").change(function(){
											if(vo[rand].evaluate($(this).val(),"<?php echo $udf->udf_dep_value; ?>")){
												$("#depends_<?php echo $udf->udf_order; ?>").fadeIn("fast");	
											}
											else{
												$("#depends_<?php echo $udf->udf_order; ?>").fadeOut("fast");
											}
										});
									});
								</script>
								<?php
							}
				}
			}
		}
		}
		if($i==0){
			?>
			<script language="javascript">
                document.getElementById('udfs').style.display="none";
                document.getElementById('udfs_exist').value = '0';
            </script>
            <?php
		}
		else{
			?>
			<script language="javascript">
                document.getElementById('udfs_exist').value = '1';
            </script>
            <?php	
		}
	}
	elseif(isset($GLOBALS['result']->udf_details) && count($GLOBALS['result']->udf_details)== 1){
		
		$udf = $GLOBALS['result']->udf_details;
		$i=0;
		if($udf->udf_active_ind == "Y" && $udf->udf_action_id == $_POST['act_id']){
				if($udf->udf_action_comp == $outcome_id || $udf->udf_action_comp == ""){
			if($udf->udf_active_ind == "Y"){
				if($udf->udf_depends != 0){
						?>
                        <div id="depends_<?php echo $udf->udf_order; ?>" class="udfDependant">
                        <?php
					}
					if($udf->udf_type == "L"){
					$i=$i+1;
					//Begin Web Service Call
					//UDFs
					$wsdl2 = WEB_SERVICES_PATH.MERIT_REQUEST_FILE."?wsdl";
					$client2 = new SoapClient ($wsdl2);
					$parameters2 = new stdClass();
					$parameters2->user_id = $_COOKIE['user_id'];
					$parameters2->password = $_COOKIE['password'];
					$parameters2->look_type = $udf->udf_looktype;
					$result2 = $client2->ws_get_udf_ddlb_dets($parameters2)->ws_get_udf_ddlb_detsResult;
					$udf_ddld = array();
					?>
					<span class="graytitle"><?php echo $udf->udf_name; ?><?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "<span style='color:red;'>*</span>"; ?></span>
					<ul class="pageitem">
						<li class="select"><select class="text <?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "required"; ?>" name="udf_<?php echo $udf->udf_name; ?>" id="udf_<?php echo $udf->udf_order; ?>">
						<option value="">Select</option>
							<?php
							foreach($result2->udf_ddlb_det->string as $udf_ddld){
								?>
								<option <?php if(isset($udf->udf_data)){ if($udf->udf_data == $udf_ddld){ echo "selected"; } } ?>  value="<?php echo $udf_ddld; ?>"><?php echo $udf_ddld; ?></option>
								<?php	
							}
							?>
						</select>
						</li>
					</ul>
				<?php	
				}
				elseif($udf->udf_type == "I"){
					$i=$i+1;
				?>
					<span class="graytitle"><?php echo $udf->udf_name; ?><?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "<span style='color:red;'>*</span>"; ?></span>
					<ul class="pageitem">
						<li class="bigfield"><input type="text" name="udf_<?php echo $udf->udf_name; ?>" id="udf_<?php echo $udf->udf_order; ?>" class="text <?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "required"; ?> digits" value="<?php if(isset($udf->udf_data)) echo $udf->udf_data; ?>" size="5" maxlength="<?php if($udf->udf_fld_size > 0){ echo $udf->udf_fld_size; } ?>"></li>
					</ul>
				<?php
				}
				elseif($udf->udf_type == "A"){
					$i=$i+1;
				?>
					<span class="graytitle"><?php echo $udf->udf_name; ?> ($)</span>
					<ul class="pageitem">
						<li class="bigfield"><input type="text" name="udf_<?php echo $udf->udf_name; ?>" id="udf_<?php echo $udf->udf_order; ?>" class="text <?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "required"; ?> number" value="<?php if(isset($udf->udf_data)) echo str_ireplace("$", "", $udf->udf_data); ?>" size="5" maxlength="<?php if($udf->udf_fld_size > 0){ echo $udf->udf_fld_size; } ?>"></li>
					</ul>
				<?php
				}
				elseif($udf->udf_type == "T"){
					$i=$i+1;
				?>
					<span class="graytitle"><?php echo $udf->udf_name; ?><?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "<span style='color:red;'>*</span>"; ?></span>
						<ul class="pageitem">
							<li class="bigfield"><input type="text" name="udf_<?php echo $udf->udf_name; ?>" id="udf_<?php echo $udf->udf_order; ?>" class="text <?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "required"; ?>" value="<?php if(isset($udf->udf_data)) echo $udf->udf_data; ?>" size="<?php if($udf->udf_fld_size > 0){ echo $udf->udf_fld_size; } ?>" maxlength="<?php if($udf->udf_fld_size > 0){ echo $udf->udf_fld_size; } ?>"></li>
						</ul>
				<?php
				}
				elseif($udf->udf_type == "D"){
					$i=$i+1;
				?>
					<span class="graytitle"><?php echo $udf->udf_name; ?><?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "<span style='color:red;'>*</span>"; ?></span>
						<ul class="pageitem">
							<li class="bigfield"><input type="text" name="udf_<?php echo $udf->udf_name; ?>" id="udf_<?php echo $udf->udf_order; ?>" class="text <?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "required"; ?>" value="<?php if(isset($udf->udf_data)) echo date("d/m/Y", strtotime(str_replace($udf->udf_data))); ?>" size="5" maxlength="10"></li>
						</ul>
				<?php
				}
				elseif($udf->udf_type == "Y"){
					$i=$i+1;
				?>
					<span class="graytitle"><?php echo $udf->udf_name; ?><?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "<span style='color:red;'>*</span>"; ?></span>
						<ul class="pageitem">
							<li class="radiobutton"><span class="name">Yes</span>
							<input class="<?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "required"; ?>" name="udf_<?php echo $udf->udf_name; ?>" id="udf_<?php echo $udf->udf_order; ?>_Y" type="radio" <?php if(isset($udf->udf_data) && $udf->udf_data == 'Y'){ echo "checked"; } ?> value="Y" /> </li>
							<li class="radiobutton"><span class="name">No</span>
							<input class="<?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "required"; ?>" name="udf_<?php echo $udf->udf_name; ?>" id="udf_<?php echo $udf->udf_order; ?>_N" type="radio" <?php if(isset($udf->udf_data) && $udf->udf_data == 'N'){ echo "checked"; } ?>value="N" /> </li>
						</ul>
				<?php
				}
				elseif($udf->udf_type == "M"){
					$i=$i+1;
				?>
					<span class="graytitle"><?php echo $udf->udf_name; ?><?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "<span style='color:red;'>*</span>"; ?></span>
					<ul class="pageitem">
						 <li class="bigfield">
							<input type="text" name="udf_<?php echo $udf->udf_name; ?>" id="udf_<?php echo $udf->udf_order; ?>" class="timeField text_udf <?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "required"; ?>"value="<?php if(isset($udf->udf_data) && strlen($udf->udf_data) > 0) echo date("h:i A", strtotime($udf->udf_data)); ?>" size="5" maxlength="10">
						</li>
					</ul>
				<?php	
				}
				elseif($udf->udf_type == "V"){
					$i=$i+1;
				?>
					<span class="graytitle"><?php echo $udf->udf_name; ?><?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "<span style='color:red;'>*</span>"; ?></span>
					<?php 
					$udfdata = explode(" ", $udf->udf_data);
					if(isset($udfdata[0]) && !isset($udfdata[1])){
						$udfdata[1] = substr($udfdata[0],10,15);
						$udfdata[0] = substr($udfdata[0],0,10);
					}
					 ?>
					<ul class="pageitem">
						<li class="smallfield">
							<span class="name">Date</span> <input type="text" name="udf_<?php echo $udf->udf_name; ?>_date" id="udf_<?php echo $udf->udf_order; ?>_date" class="dateField text_udf_small <?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "required"; ?>" value="<?php if(isset($udfdata[0]) && strlen($udfdata[0]) > 0) echo date("d/m/Y", strtotime(str_replace("/","-",$udfdata[0]))); ?>" size="5" maxlength="10">
						</li>
						<li class="smallfield">
							<span class="name">Time:</span> <input type="text" name="udf_<?php echo $udf->udf_name; ?>_time" id="udf_<?php echo $udf->udf_order; ?>_time" class="timeField text_udf_small <?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "required"; ?>"value="<?php if(isset($udfdata[1]) && strlen($udfdata[1]) > 0) echo date("h:i A", strtotime($udfdata[1])); ?>" size="5" maxlength="10">
					   </li>
				<?php	
				}
				elseif($udf->udf_type == "G"){
					$i=$i+1;
				?>
					<span class="graytitle"><?php echo $udf->udf_name; ?><?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "<span style='color:red;'>*</span>"; ?></span>
						<ul class="pageitem">
							<li class="bigfield"><input type="file" name="udf_<?php echo $udf->udf_name; ?>" id="udf_<?php echo $udf->udf_order; ?>" class="text_udf <?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "required"; ?>"></li>
						</ul>
				<?php
				}
				elseif($udf->udf_type == "B"){
					$i=$i+1;
				?>
					<span class="graytitle"><?php echo $udf->udf_name; ?><?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "<span style='color:red;'>*</span>"; ?></span>
						<ul class="pageitem">
							<li class="bigfield"><input type="file" name="udf_<?php echo $udf->udf_name; ?>" id="udf_<?php echo $udf->udf_order; ?>" class="text_udf <?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "required"; ?>"></li>
						</ul>
				<?php
				}
				elseif($udf->udf_type == "P"){
					$i=$i+1;
				?>
					<span class="graytitle"><?php echo $udf->udf_name; ?><?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "<span style='color:red;'>*</span>"; ?></span>
						<ul class="pageitem">
							<li class="bigfield"><input type="file" name="udf_<?php echo $udf->udf_name; ?>" id="udf_<?php echo $udf->udf_order; ?>" class="text_udf <?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "required"; ?>"></li>
						</ul>
				<?php
				}
				else{
					?>
					<input type="hidden" name="udf_<?php echo $udf->udf_name; ?>" value="<?php echo $udf->udf_data; ?>" />
					<?php	
				}
				if($udf->udf_depends != 0){
								?>
								</div>
								<script type="text/javascript">
									$(document).ready(function(){
										var rand = Math.floor(Math.random() * 10000) + 2; vo[rand] = new VarOperator("="); vo[rand].operation = "<?php echo $udf->udf_op_code; ?>";
										if($("[id^=udf_<?php echo $udf->udf_depends; ?>]").attr('type') == "radio"){
											
											if($("#udf_<?php echo $udf->udf_depends; ?>_<?php echo $udf->udf_dep_value; ?>").attr("checked") == "checked" || $("#udf_<?php echo $udf->udf_depends; ?>_<?php echo $udf->udf_dep_value; ?>").attr("checked") == true){
												$("#depends_<?php echo $udf->udf_order; ?>").fadeIn("fast");
											}
										}
										else{
											if($("[id^=udf_<?php echo $udf->udf_depends; ?>]").val() != "" && vo[rand].evaluate($("[id^=udf_<?php echo $udf->udf_depends; ?>]").val(),"<?php echo $udf->udf_dep_value; ?>")){
												$("#depends_<?php echo $udf->udf_order; ?>").fadeIn("fast");
											}
										}
										$("[id^=udf_<?php echo $udf->udf_depends; ?>]").change(function(){
											if(vo[rand].evaluate($(this).val(),"<?php echo $udf->udf_dep_value; ?>")){
												$("#depends_<?php echo $udf->udf_order; ?>").fadeIn("fast");	
											}
											else{
												$("#depends_<?php echo $udf->udf_order; ?>").fadeOut("fast");
											}
										});
									});
								</script>
								<?php
							}
			}
		}
	}
	if($i==0){
			?>
			<script language="javascript">
                document.getElementById('udfs').style.display="none";
                document.getElementById('udfs_exist').value = '0';
            </script>
            <?php
		}
		else{
			?>
			<script language="javascript">
                document.getElementById('udfs_exist').value = '1';
            </script>
            <?php	
		}
}
}
elseif(isset($GLOBALS['result']->udf_details) && count($GLOBALS['result']->udf_details)== 0){
	?>
	<script language="javascript">
		document.getElementById('udfs').style.display="none";
		document.getElementById('udfs_exist').value = '0';
	</script>
	<?php
	}
?>