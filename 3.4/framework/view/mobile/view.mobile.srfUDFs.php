
<?php
if(isset($GLOBALS['result']->udf_details)){
	
	if(count($GLOBALS['result']->udf_details)> 1){
		$i=0;
		foreach($GLOBALS['result']->udf_details as $udf){
			if($udf->udf_action_id == 0){
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
						$parameters2->user_id = $_SESSION['user_id'];
						$parameters2->password = $_SESSION['password'];
						$parameters2->look_type = $udf->udf_looktype;
						$result2 = $client2->ws_get_udf_ddlb_dets($parameters2)->ws_get_udf_ddlb_detsResult;
						$udf_ddld = array();
						?>
						<label><?php echo $udf->udf_name; ?><?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "<span style='color:red;'>*</span>"; ?></label>
						
							<select class="<?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "required"; ?>" name="udf_<?php echo $udf->udf_name; ?>" id="udf_<?php echo $udf->udf_order; ?>">
							<option value="">Select</option>
								<?php
								foreach($result2->udf_ddlb_det->string as $udf_ddld){
									?>
									<option <?php if(isset($_SESSION['rem_'.'udf'.str_ireplace("-","",str_ireplace(" ", "", str_ireplace(":","",trim($udf->udf_name))))])){ if($_SESSION['rem_'.'udf'.str_ireplace("-","",str_ireplace(" ", "", str_ireplace(":","",trim($udf->udf_name))))] == $udf_ddld){ echo "selected"; } } ?> value="<?php echo $udf_ddld; ?>"><?php echo $udf_ddld; ?></option>
									<?php	
								}
								?>
							</select>
							
						
					<?php	
					}
					elseif($udf->udf_type == "I"){
						$i=$i+1;
					?>
						<label><?php echo $udf->udf_name; ?><?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "<span style='color:red;'>*</span>"; ?></label>
						
							<input type="text" name="udf_<?php echo $udf->udf_name; ?>" id="udf_<?php echo $udf->udf_order; ?>" class="<?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "required"; ?> digits" value="<?php if(isset($_SESSION['rem_'.'udf'.str_ireplace("-","",str_ireplace(" ", "", str_ireplace(":","",trim($udf->udf_name))))])){ echo $_SESSION['rem_'.'udf'.str_ireplace("-","",str_ireplace(" ", "", str_ireplace(":","",trim($udf->udf_name))))];  } ?>"  maxlength="<?php if($udf->udf_fld_size > 0){ echo $udf->udf_fld_size; } ?>">
						
					<?php
					}
					elseif($udf->udf_type == "A"){
						$i=$i+1;
					?>
						<label><?php echo $udf->udf_name; ?><?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "<span style='color:red;'>*</span>"; ?> ($)</label>
						
							<input type="text" name="udf_<?php echo $udf->udf_name; ?>" id="udf_<?php echo $udf->udf_order; ?>" class="<?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "required"; ?> number" value="<?php if(isset($_SESSION['rem_'.'udf'.str_ireplace("-","",str_ireplace(" ", "", str_ireplace(":","",trim($udf->udf_name))))])){ echo $_SESSION['rem_'.'udf'.str_ireplace("-","",str_ireplace(" ", "", str_ireplace(":","",trim($udf->udf_name))))];  } ?>"  maxlength="<?php if($udf->udf_fld_size > 0){ echo $udf->udf_fld_size; } ?>">
						
					<?php
					}
					elseif($udf->udf_type == "T"){
						$i=$i+1;
					?>
						<label><?php echo $udf->udf_name; ?><?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "<span style='color:red;'>*</span>"; ?></label>
							
								<input type="text" name="udf_<?php echo $udf->udf_name; ?>" id="udf_<?php echo $udf->udf_order; ?>" class="<?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "required"; ?>" value="<?php if(isset($_SESSION['rem_'.'udf'.str_ireplace("-","",str_ireplace(" ", "", str_ireplace(":","",trim($udf->udf_name))))])){ echo $_SESSION['rem_'.'udf'.str_ireplace("-","",str_ireplace(" ", "", str_ireplace(":","",trim($udf->udf_name))))];  } ?>"  maxlength="<?php if($udf->udf_fld_size > 0){ echo $udf->udf_fld_size; } ?>">
							
					<?php
					}
					elseif($udf->udf_type == "D"){
						$i=$i+1;
					?>
						<label><?php echo $udf->udf_name; ?><?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "<span style='color:red;'>*</span>"; ?></label>
							
								<input type="text" name="udf_<?php echo $udf->udf_name; ?>" id="udf_<?php echo $udf->udf_order; ?>" class="<?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "required"; ?>" value="<?php if(isset($_SESSION['rem_'.'udf'.str_ireplace("-","",str_ireplace(" ", "", str_ireplace(":","",trim($udf->udf_name))))])){ echo $_SESSION['rem_'.'udf'.str_ireplace("-","",str_ireplace(" ", "", str_ireplace(":","",trim($udf->udf_name))))];  } ?>"  maxlength="10"y>
								
									
								
							
					<?php
					}
					elseif($udf->udf_type == "Y"){
						$i=$i+1;
					?>
						<label><?php echo $udf->udf_name; ?><?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "<span style='color:red;'>*</span>"; ?></label>
							
								<label for="udf_<?php echo $udf->udf_order; ?>_Y">Yes</label>
								<input class="<?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "required"; ?>" name="udf_<?php echo $udf->udf_name; ?>" id="udf_<?php echo $udf->udf_order; ?>_Y" type="radio" <?php if(isset($_SESSION['rem_'.'udf'.str_ireplace("-","",str_ireplace(" ", "", str_ireplace(":","",trim($udf->udf_name))))])){ if($_SESSION['rem_'.'udf'.str_ireplace("-","",str_ireplace(" ", "", str_ireplace(":","",trim($udf->udf_name))))] == 'Y'){ echo "checked"; } } ?> value="Y" /> 
								<label for="udf_<?php echo $udf->udf_order; ?>_N">No</label>
								<input class="<?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "required"; ?>" name="udf_<?php echo $udf->udf_name; ?>" id="udf_<?php echo $udf->udf_order; ?>_N" type="radio" <?php if(isset($_SESSION['rem_'.'udf'.str_ireplace("-","",str_ireplace(" ", "", str_ireplace(":","",trim($udf->udf_name))))])){ if($_SESSION['rem_'.'udf'.str_ireplace("-","",str_ireplace(" ", "", str_ireplace(":","",trim($udf->udf_name))))] == 'N'){ echo "checked"; } } ?> value="N" /> 
							
					<?php
					}
					elseif($udf->udf_type == "M"){
						$i=$i+1;
					?>
						<label><?php echo $udf->udf_name; ?><?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "<span style='color:red;'>*</span>"; ?></label>
						
							 
								<input type="text" name="udf_<?php echo $udf->udf_name; ?>" id="udf_<?php echo $udf->udf_order; ?>" class="text_udf <?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "required"; ?>"value="<?php if(isset($_SESSION['rem_'.'udf'.str_ireplace("-","",str_ireplace(" ", "", str_ireplace(":","",trim($udf->udf_name))))])){ echo $_SESSION['rem_'.'udf'.str_ireplace("-","",str_ireplace(" ", "", str_ireplace(":","",trim($udf->udf_name))))];  } ?>"  maxlength="10">
							
						
					<?php	
					}
					elseif($udf->udf_type == "V"){
						$i=$i+1;
					?>
						<label><?php echo $udf->udf_name; ?><?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "<span style='color:red;'>*</span>"; ?></label>
						
                        	
								<label>Date</label> <input type="text" name="udf_<?php echo $udf->udf_name; ?>_date" id="udf_<?php echo $udf->udf_order; ?>_date" class="dateField text_udf_small <?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "required"; ?>" value="<?php if(isset($_SESSION['rem_'.'udf'.str_ireplace("-","",str_ireplace(" ", "", str_ireplace(":","",trim($udf->udf_name))))])){ echo $_SESSION['rem_'.'udf'.str_ireplace("-","",str_ireplace(" ", "", str_ireplace(":","",trim($udf->udf_name))))];  } ?>"  maxlength="10">
                            
                            
                            	
                            
							
								<label>Time:</label> <input type="text" name="udf_<?php echo $udf->udf_name; ?>_time" id="udf_<?php echo $udf->udf_order; ?>_time" class="timeField text_udf_small <?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "required"; ?>"value="<?php if(isset($_SESSION['rem_'.'udf'.str_ireplace("-","",str_ireplace(" ", "", str_ireplace(":","",trim($udf->udf_name))))])){ echo $_SESSION['rem_'.'udf'.str_ireplace("-","",str_ireplace(" ", "", str_ireplace(":","",trim($udf->udf_name))))];  } ?>"  maxlength="10">
                           
						
					<?php	
					}
					elseif($udf->udf_type == "G"){
						$i=$i+1;
					?>
						<label><?php echo $udf->udf_name; ?><?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "<span style='color:red;'>*</span>"; ?></label>
							
								<input type="file" name="udf_<?php echo $udf->udf_name; ?>" id="udf_<?php echo $udf->udf_order; ?>" class="text_udf <?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "required"; ?>">
							
					<?php
					}
					elseif($udf->udf_type == "B"){
						$i=$i+1;
					?>
						<label><?php echo $udf->udf_name; ?><?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "<span style='color:red;'>*</span>"; ?></label>
							
								<input type="file" name="udf_<?php echo $udf->udf_name; ?>" id="udf_<?php echo $udf->udf_order; ?>" class="text_udf <?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "required"; ?>">
							
					<?php
					}
					elseif($udf->udf_type == "P"){
						$i=$i+1;
					?>
						<label><?php echo $udf->udf_name; ?><?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "<span style='color:red;'>*</span>"; ?></label>
							
								<input type="file" name="udf_<?php echo $udf->udf_name; ?>" id="udf_<?php echo $udf->udf_order; ?>" class="text_udf <?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "required"; ?>">
							
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
		document.getElementById('udfs').style.display="block";
	</script>
	<?php
		}	
	}
	elseif(count($GLOBALS['result']->udf_details)== 1){
		$udf = $GLOBALS['result']->udf_details;
		$i=0;
		if($udf->udf_action_id == 0){
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
					$parameters2->user_id = $_SESSION['user_id'];
					$parameters2->password = $_SESSION['password'];
					$parameters2->look_type = $udf->udf_looktype;
					$result2 = $client2->ws_get_udf_ddlb_dets($parameters2)->ws_get_udf_ddlb_detsResult;
					$udf_ddld = array();
					?>
					<label><?php echo $udf->udf_name; ?><?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "<span style='color:red;'>*</span>"; ?></label>
					
						<select class="<?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "required"; ?>" name="udf_<?php echo $udf->udf_name; ?>" id="udf_<?php echo $udf->udf_order; ?>">
						<option value="">Select</option>
							<?php
							foreach($result2->udf_ddlb_det->string as $udf_ddld){
								?>
								<option <?php if(isset($_SESSION['rem_'.'udf'.str_ireplace("-","",str_ireplace(" ", "", str_ireplace(":","",trim($udf->udf_name))))])){ if($_SESSION['rem_'.'udf'.str_ireplace("-","",str_ireplace(" ", "", str_ireplace(":","",trim($udf->udf_name))))] == $udf_ddld){ echo "selected"; } } ?> value="<?php echo $udf_ddld; ?>"><?php echo $udf_ddld; ?></option>
								<?php	
							}
							?>
						</select>
						
					
				<?php	
				}
				elseif($udf->udf_type == "I"){
					$i=$i+1;
				?>
					<label><?php echo $udf->udf_name; ?><?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "<span style='color:red;'>*</span>"; ?></label>
					
						<input type="text" name="udf_<?php echo $udf->udf_name; ?>" id="udf_<?php echo $udf->udf_order; ?>" class="<?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "required"; ?> digits" value="<?php if(isset($_SESSION['rem_'.'udf'.str_ireplace("-","",str_ireplace(" ", "", str_ireplace(":","",trim($udf->udf_name))))])){ echo $_SESSION['rem_'.'udf'.str_ireplace("-","",str_ireplace(" ", "", str_ireplace(":","",trim($udf->udf_name))))];  } ?>"  maxlength="<?php if($udf->udf_fld_size > 0){ echo $udf->udf_fld_size; } ?>">
					
				<?php
				}
				elseif($udf->udf_type == "A"){
					$i=$i+1;
				?>
					<label><?php echo $udf->udf_name; ?><?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "<span style='color:red;'>*</span>"; ?> ($)</label>
					
						<input type="text" name="udf_<?php echo $udf->udf_name; ?>" id="udf_<?php echo $udf->udf_order; ?>" class="<?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "required"; ?> number" value="<?php if(isset($_SESSION['rem_'.'udf'.str_ireplace("-","",str_ireplace(" ", "", str_ireplace(":","",trim($udf->udf_name))))])){ echo $_SESSION['rem_'.'udf'.str_ireplace("-","",str_ireplace(" ", "", str_ireplace(":","",trim($udf->udf_name))))];  } ?>"  maxlength="<?php if($udf->udf_fld_size > 0){ echo $udf->udf_fld_size; } ?>">
					
				<?php
				}
				elseif($udf->udf_type == "T"){
					$i=$i+1;
				?>
					<label><?php echo $udf->udf_name; ?><?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "<span style='color:red;'>*</span>"; ?></label>
						
							<input type="text" name="udf_<?php echo $udf->udf_name; ?>" id="udf_<?php echo $udf->udf_order; ?>" class="<?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "required"; ?>" value="<?php if(isset($_SESSION['rem_'.'udf'.str_ireplace("-","",str_ireplace(" ", "", str_ireplace(":","",trim($udf->udf_name))))])){ echo $_SESSION['rem_'.'udf'.str_ireplace("-","",str_ireplace(" ", "", str_ireplace(":","",trim($udf->udf_name))))];  } ?>"  maxlength="<?php if($udf->udf_fld_size > 0){ echo $udf->udf_fld_size; } ?>">
						
				<?php
				}
				elseif($udf->udf_type == "D"){
					$i=$i+1;
				?>
					<label><?php echo $udf->udf_name; ?><?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "<span style='color:red;'>*</span>"; ?></label>
						
							<input type="text" name="udf_<?php echo $udf->udf_name; ?>" id="udf_<?php echo $udf->udf_order; ?>" class="<?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "required"; ?>" value="<?php if(isset($_SESSION['rem_'.'udf'.str_ireplace("-","",str_ireplace(" ", "", str_ireplace(":","",trim($udf->udf_name))))])){ echo $_SESSION['rem_'.'udf'.str_ireplace("-","",str_ireplace(" ", "", str_ireplace(":","",trim($udf->udf_name))))];  } ?>"  maxlength="10">
							
								
							
						
				<?php
				}
				elseif($udf->udf_type == "Y"){
					$i=$i+1;
				?>
					<label><?php echo $udf->udf_name; ?><?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "<span style='color:red;'>*</span>"; ?></label>
						
							<label for="udf_<?php echo $udf->udf_order; ?>_N">No</label>
							<input class="<?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "required"; ?>" name="udf_<?php echo $udf->udf_name; ?>" id="udf_<?php echo $udf->udf_order; ?>_N" type="radio" <?php if(isset($_SESSION['rem_'.'udf'.str_ireplace("-","",str_ireplace(" ", "", str_ireplace(":","",trim($udf->udf_name))))])){ if($_SESSION['rem_'.'udf'.str_ireplace("-","",str_ireplace(" ", "", str_ireplace(":","",trim($udf->udf_name))))] == 'Y'){ echo "checked"; } } ?> value="Y" /> 
							<label for="udf_<?php echo $udf->udf_order; ?>_Y">Yes</label>
							<input class="<?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "required"; ?>" name="udf_<?php echo $udf->udf_name; ?>" id="udf_<?php echo $udf->udf_order; ?>_Y" type="radio" <?php if(isset($_SESSION['rem_'.'udf'.str_ireplace("-","",str_ireplace(" ", "", str_ireplace(":","",trim($udf->udf_name))))])){ if($_SESSION['rem_'.'udf'.str_ireplace("-","",str_ireplace(" ", "", str_ireplace(":","",trim($udf->udf_name))))] == 'N'){ echo "checked"; } } ?> value="N" /> 
						
				<?php
				}
				elseif($udf->udf_type == "M"){
					$i=1;
				?>
					<label><?php echo $udf->udf_name; ?><?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "<span style='color:red;'>*</span>"; ?></label>
					
						 
							<input type="text" name="udf_<?php echo $udf->udf_name; ?>" id="udf_<?php echo $udf->udf_order; ?>" class="text_udf <?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "required"; ?>"value="<?php if(isset($_SESSION['rem_'.'udf'.str_ireplace("-","",str_ireplace(" ", "", str_ireplace(":","",trim($udf->udf_name))))])){ echo $_SESSION['rem_'.'udf'.str_ireplace("-","",str_ireplace(" ", "", str_ireplace(":","",trim($udf->udf_name))))];  } ?>"  maxlength="10">
						
					
				<?php	
				}
				elseif($udf->udf_type == "V"){
					$i=$i+1;
				?>
					<label><?php echo $udf->udf_name; ?><?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "<span style='color:red;'>*</span>"; ?></label>
					
						
							<label>Date</label> <input type="text" name="udf_<?php echo $udf->udf_name; ?>_date" id="udf_<?php echo $udf->udf_order; ?>_date" class="dateField text_udf_small <?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "required"; ?>" value="<?php if(isset($_SESSION['rem_'.'udf'.str_ireplace("-","",str_ireplace(" ", "", str_ireplace(":","",trim($udf->udf_name))))])){ echo $_SESSION['rem_'.'udf'.str_ireplace("-","",str_ireplace(" ", "", str_ireplace(":","",trim($udf->udf_name))))];  } ?>"  maxlength="10">
						
                        
                        
                        
						
							<label>Time:</label> <input type="text" name="udf_<?php echo $udf->udf_name; ?>_time" id="udf_<?php echo $udf->udf_order; ?>_time" class="timeField text_udf_small <?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "required"; ?>"value="<?php if(isset($_SESSION['rem_'.'udf'.str_ireplace("-","",str_ireplace(" ", "", str_ireplace(":","",trim($udf->udf_name))))])){ echo $_SESSION['rem_'.'udf'.str_ireplace("-","",str_ireplace(" ", "", str_ireplace(":","",trim($udf->udf_name))))];  } ?>"  maxlength="10">
					   
					
				<?php	
				}
				elseif($udf->udf_type == "G"){
					$i=$i+1;
				?>
					<label><?php echo $udf->udf_name; ?><?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "<span style='color:red;'>*</span>"; ?></label>
						
							<input type="file" name="udf_<?php echo $udf->udf_name; ?>" id="udf_<?php echo $udf->udf_order; ?>" class="text_udf <?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "required"; ?>">
						
				<?php
				}
				elseif($udf->udf_type == "B"){
					$i=$i+1;
				?>
					<label><?php echo $udf->udf_name; ?><?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "<span style='color:red;'>*</span>"; ?></label>
						
							<input type="file" name="udf_<?php echo $udf->udf_name; ?>" id="udf_<?php echo $udf->udf_order; ?>" class="text_udf <?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "required"; ?>">
						
				<?php
				}
				elseif($udf->udf_type == "P"){
					$i=$i+1;
				?>
					<label><?php echo $udf->udf_name; ?><?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "<span style='color:red;'>*</span>"; ?></label>
						
							<input type="file" name="udf_<?php echo $udf->udf_name; ?>" id="udf_<?php echo $udf->udf_order; ?>" class="text_udf <?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "required"; ?>">
						
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
										$("[id^=udf_<?php echo $udf->udf_depends; ?>]").change(function(){
											if($(this).val() == "<?php echo $udf->udf_dep_value; ?>"){
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
		document.getElementById('udfs').style.display="block";
	</script>
	<?php
		}
	}
	elseif(count($GLOBALS['result']->udf_details)== 0){
	?>
	<script language="javascript">
		document.getElementById('udfs').style.display="none";
		document.getElementById('udfs_exist').value = '0';
	</script>
	<?php
	}
}
else{
?>
<script language="javascript">
	document.getElementById('udfs').style.display="none";
	document.getElementById('udfs_exist').value = '0';
</script>
<?php
}