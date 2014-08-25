
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
						<div class="float-left">
							<label  for="refno"><?php echo $udf->udf_name; ?><?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "<span style='color:red;'>*</span>"; ?></label>
						</div>
						<div class="float-left">
							<select class="text_udf <?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "required req_text_udf"; ?>" name="udf_<?php echo $udf->udf_name; ?>" id="udf_<?php echo $udf->udf_order; ?>">
							<option value="">Select</option>
								<?php
                        if(count($result2->udf_ddlb_det->string) > 1){
                            foreach($result2->udf_ddlb_det->string as $udf_ddld){
                                ?>
								    <option <?php if(isset($udf->udf_data)){ if($udf->udf_data == $udf_ddld){ echo "selected"; } } ?>  value="<?php echo $udf_ddld; ?>"><?php echo $udf_ddld; ?></option>
								    <?php	
                            }
                        }
                        elseif(count($result2->udf_ddlb_det->string) == 1){
                            $udf_ddld =  $result2->udf_ddlb_det->string
                                    ?>
                                <option <?php if(isset($udf->udf_data)){ if($udf->udf_data == $udf_ddld){ echo "selected"; } } ?>  value="<?php echo $udf_ddld; ?>"><?php echo $udf_ddld; ?></option>
                                <?php
                        }
                                ?>
							</select>
						</div>
					<?php	
					}
					elseif($udf->udf_type == "I"){
						$i=$i+1;
					?>
						<div class="float-left">
							<label  for="refno"><?php echo $udf->udf_name; ?><?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "<span style='color:red;'>*</span>"; ?></label>
						</div>
						<div class="float-left">
							<input type="text" name="udf_<?php echo $udf->udf_name; ?>" id="udf_<?php echo $udf->udf_order; ?>" class="text_udf <?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "required req_text_udf"; ?> digits" value="<?php if(isset($_SESSION['rem_'.'udf'.str_ireplace("-","",str_ireplace(" ", "", str_ireplace(":","",trim($udf->udf_name))))])){ echo $_SESSION['rem_'.'udf'.str_ireplace("-","",str_ireplace(" ", "", str_ireplace(":","",trim($udf->udf_name))))];  } ?>" size="5" maxlength="<?php if($udf->udf_fld_size > 0){ echo $udf->udf_fld_size; } ?>">
						</div>
					<?php
					}
					elseif($udf->udf_type == "A"){
						$i=$i+1;
					?>
						<div class="float-left">
							<label  for="refno"><?php echo $udf->udf_name; ?><?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "<span style='color:red;'>*</span>"; ?></label>
						</div>
						<div class="float-left">
							$<input type="text" name="udf_<?php echo $udf->udf_name; ?>" id="udf_<?php echo $udf->udf_order; ?>" class="text_udf <?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "required req_text_udf"; ?> number" value="<?php if(isset($_SESSION['rem_'.'udf'.str_ireplace("-","",str_ireplace(" ", "", str_ireplace(":","",trim($udf->udf_name))))])){ echo $_SESSION['rem_'.'udf'.str_ireplace("-","",str_ireplace(" ", "", str_ireplace(":","",trim($udf->udf_name))))];  } ?>" size="5" maxlength="<?php if($udf->udf_fld_size > 0){ echo $udf->udf_fld_size; } ?>">
						</div>
					<?php
					}
					elseif($udf->udf_type == "T"){
						$i=$i+1;
					?>
						<div class="float-left">
							<label  for="refno"><?php echo $udf->udf_name; ?><?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "<span style='color:red;'>*</span>"; ?></label>
						</div>
						<div class="float-left">
							<input type="text" name="udf_<?php echo $udf->udf_name; ?>" id="udf_<?php echo $udf->udf_order; ?>" class="text_udf <?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "required req_text_udf"; ?>" value="<?php if(isset($_SESSION['rem_'.'udf'.str_ireplace("-","",str_ireplace(" ", "", str_ireplace(":","",trim($udf->udf_name))))])){ echo $_SESSION['rem_'.'udf'.str_ireplace("-","",str_ireplace(" ", "", str_ireplace(":","",trim($udf->udf_name))))];  } ?>" size="<?php if($udf->udf_fld_size > 0){ echo $udf->udf_fld_size; } ?>" maxlength="<?php if($udf->udf_fld_size > 0){ echo $udf->udf_fld_size; } ?>">
						</div>
					<?php
					}
					elseif($udf->udf_type == "D"){
						$i=$i+1;
					?>
						<div class="float-left">
							<label  for="refno"><?php echo $udf->udf_name; ?><?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "<span style='color:red;'>*</span>"; ?></label>
						</div>
						<div class="float-left">
							<input type="text" name="udf_<?php echo $udf->udf_name; ?>" id="udf_<?php echo $udf->udf_order; ?>" class="dateField text_udf <?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "required req_text_date"; ?>" value="<?php if(isset($_SESSION['rem_'.'udf'.str_ireplace("-","",str_ireplace(" ", "", str_ireplace(":","",trim($udf->udf_name))))])){ echo $_SESSION['rem_'.'udf'.str_ireplace("-","",str_ireplace(" ", "", str_ireplace(":","",trim($udf->udf_name))))];  } ?>" size="5" maxlength="10"  >
						</div>
					<?php	
					}
					elseif($udf->udf_type == "Y"){
						$i=$i+1;
					?>
						<div class="float-left">
							<label  for="refno"><?php echo $udf->udf_name; ?><?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "<span style='color:red;'>*</span>"; ?></label>
						</div>
						<div class="float-left">
							<b>Yes</b> <input class="<?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "required req_text_udf"; ?>" type="radio" name="udf_<?php echo $udf->udf_name; ?>" id="udf_<?php echo $udf->udf_order; ?>_Y"  <?php if(isset($_SESSION['rem_'.'udf'.str_ireplace("-","",str_ireplace(" ", "", str_ireplace(":","",trim($udf->udf_name))))])){ if($_SESSION['rem_'.'udf'.str_ireplace("-","",str_ireplace(" ", "", str_ireplace(":","",trim($udf->udf_name))))] == 'Y'){ echo "checked"; } } ?>  value="Y" /> <b>No</b> <input class="<?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "required req_text_udf"; ?>" type="radio" <?php if(isset($_SESSION['rem_'.'udf'.str_ireplace("-","",str_ireplace(" ", "", str_ireplace(":","",trim($udf->udf_name))))])){ if($_SESSION['rem_'.'udf'.str_ireplace("-","",str_ireplace(" ", "", str_ireplace(":","",trim($udf->udf_name))))] == 'N'){ echo "checked"; } } ?> name="udf_<?php echo $udf->udf_name; ?>" id="udf_<?php echo $udf->udf_order; ?>_N"  value="N" /> 
						</div>
					<?php	
					}
					elseif($udf->udf_type == "M"){
						$i=$i+1;
					?>
						<div class="float-left">
							<label  for="refno"><?php echo $udf->udf_name; ?><?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "<span style='color:red;'>*</span>"; ?></label>
						</div>
						<div class="float-left">
							<input type="text" name="udf_<?php echo $udf->udf_name; ?>" id="udf_<?php echo $udf->udf_order; ?>" class="timeField text_udf <?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "required req_text_time"; ?>" value="<?php if(isset($_SESSION['rem_'.'udf'.str_ireplace("-","",str_ireplace(" ", "", str_ireplace(":","",trim($udf->udf_name))))])){ echo $_SESSION['rem_'.'udf'.str_ireplace("-","",str_ireplace(" ", "", str_ireplace(":","",trim($udf->udf_name))))];  } ?>" size="5" maxlength="10">
						</div>
					<?php	
					}
					elseif($udf->udf_type == "V"){
						$i=$i+1;
					?>
						<div class="float-left">
							<label  for="refno"><?php echo $udf->udf_name; ?><?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "<span style='color:red;'>*</span>"; ?></label>
						</div>
						<div class="float-left">
                        	Date: <input type="text" name="udf_<?php echo $udf->udf_name; ?>_date" id="udf_<?php echo $udf->udf_order; ?>_date" class="dateField text_udf_small <?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "required req_text_date"; ?>" value="<?php if(isset($_SESSION['rem_'.'udf'.str_ireplace("-","",str_ireplace(" ", "", str_ireplace(":","",trim($udf->udf_name))))])){ echo $_SESSION['rem_'.'udf'.str_ireplace("-","",str_ireplace(" ", "", str_ireplace(":","",trim($udf->udf_name))))];  } ?>" size="5" maxlength="10" >
							Time: <input type="text" name="udf_<?php echo $udf->udf_name; ?>_time" id="udf_<?php echo $udf->udf_order; ?>_time" class="timeField text_udf_small <?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "required req_text_time"; ?>" value="<?php if(isset($_SESSION['rem_'.'udf'.str_ireplace("-","",str_ireplace(" ", "", str_ireplace(":","",trim($udf->udf_name))))])){ echo $_SESSION['rem_'.'udf'.str_ireplace("-","",str_ireplace(" ", "", str_ireplace(":","",trim($udf->udf_name))))];  } ?>" size="5" maxlength="10">
						</div>
					<?php	
					}
					elseif($udf->udf_type == "G"){
                          $i=$i+1;
                      ?>
                          <div class="float-left">
                              <label  for="refno"><?php echo $udf->udf_name; ?><?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "<span style='color:red;'>*</span>"; ?></label>
                          </div>
                          <div class="float-left">
                          		<input type="file" name="udf_<?php echo str_ireplace("-","",str_ireplace(" ", "", str_ireplace(":","",trim($udf->udf_name)))); ?>" id="udf_<?php echo $udf->udf_order; ?>" class="text_udf <?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "required req_text_udf"; ?>" >
                          </div>
                      <?php
                      }
					  elseif($udf->udf_type == "B"){
                          $i=$i+1;
                      ?>
                          <div class="float-left">
                              <label  for="refno"><?php echo $udf->udf_name; ?><?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "<span style='color:red;'>*</span>"; ?></label>
                          </div>
                          <div class="float-left">
                          		<input type="file" name="udf_<?php echo str_ireplace("-","",str_ireplace(" ", "", str_ireplace(":","",trim($udf->udf_name)))); ?>" id="udf_<?php echo $udf->udf_order; ?>" class="text_udf <?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "required req_text_udf"; ?>" >
                          </div>
                      <?php
                      }
					  elseif($udf->udf_type == "P"){
                          $i=$i+1;
                      ?>
                          <div class="float-left">
                              <label  for="refno"><?php echo $udf->udf_name; ?><?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "<span style='color:red;'>*</span>"; ?></label>
                          </div>
                          <div class="float-left">
                          	<input type="file" name="udf_<?php echo str_ireplace("-","",str_ireplace(" ", "", str_ireplace(":","",trim($udf->udf_name)))); ?>" id="udf_<?php echo $udf->udf_order; ?>" class="text_udf <?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "required req_text_udf"; ?>" >
                          </div>
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
			<script type="text/javascript">
                
                $("#udfs").slideUp("fast");
                $("#udfs_exist").val("0");
            </script>
            <?php
		}
		else{
            ?>
            <script language="javascript">
				$("#udfs_exist").val("1");
				$("#udfs").slideDown("fast");
		
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
					$i=1;
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
					<div class="float-left">
						<label  for="refno"><?php echo $udf->udf_name; ?><?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "<span style='color:red;'>*</span>"; ?></label>
					</div>
					<div class="float-left">
						<select class="text_udf <?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "required req_text_udf"; ?>" name="udf_<?php echo $udf->udf_name; ?>" id="udf_<?php echo $udf->udf_order; ?>">
						<option value="">Select</option>
							<?php
                    if(count($result2->udf_ddlb_det->string) > 1){
                        foreach($result2->udf_ddlb_det->string as $udf_ddld){
                            ?>
								    <option <?php if(isset($udf->udf_data)){ if($udf->udf_data == $udf_ddld){ echo "selected"; } } ?>  value="<?php echo $udf_ddld; ?>"><?php echo $udf_ddld; ?></option>
								    <?php	
                        }
                    }
                    elseif(count($result2->udf_ddlb_det->string) == 1){
                        $udf_ddld =  $result2->udf_ddlb_det->string
                                    ?>
                                <option <?php if(isset($udf->udf_data)){ if($udf->udf_data == $udf_ddld){ echo "selected"; } } ?>  value="<?php echo $udf_ddld; ?>"><?php echo $udf_ddld; ?></option>
                                <?php
                    }
                                ?>
						</select>
					</div>
				<?php	
				}
				elseif($udf->udf_type == "I"){
					$i=1;
				?>
					<div class="float-left">
						<label  for="refno"><?php echo $udf->udf_name; ?><?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "<span style='color:red;'>*</span>"; ?></label>
					</div>
					<div class="float-left">
						<input type="text" name="udf_<?php echo $udf->udf_name; ?>" id="udf_<?php echo $udf->udf_order; ?>" class="text_udf <?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "required req_text_udf"; ?>  digits" value="<?php if(isset($_SESSION['rem_'.'udf'.str_ireplace("-","",str_ireplace(" ", "", str_ireplace(":","",trim($udf->udf_name))))])){ echo $_SESSION['rem_'.'udf'.str_ireplace("-","",str_ireplace(" ", "", str_ireplace(":","",trim($udf->udf_name))))];  } ?>" size="5" maxlength="<?php if($udf->udf_fld_size > 0){ echo $udf->udf_fld_size; } ?>">
					</div>
				<?php
				}
				elseif($udf->udf_type == "A"){
					$i=1;
				?>
					<div class="float-left">
						<label  for="refno"><?php echo $udf->udf_name; ?><?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "<span style='color:red;'>*</span>"; ?></label>
					</div>
					<div class="float-left">
						$<input type="text" name="udf_<?php echo $udf->udf_name; ?>" id="udf_<?php echo $udf->udf_order; ?>" class="text_udf <?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "required req_text_udf"; ?> number" value="<?php if(isset($_SESSION['rem_'.'udf'.str_ireplace("-","",str_ireplace(" ", "", str_ireplace(":","",trim($udf->udf_name))))])){ echo $_SESSION['rem_'.'udf'.str_ireplace("-","",str_ireplace(" ", "", str_ireplace(":","",trim($udf->udf_name))))];  } ?>" size="5" maxlength="<?php if($udf->udf_fld_size > 0){ echo $udf->udf_fld_size; } ?>">
					</div>
				<?php
				}
				elseif($udf->udf_type == "T"){
					$i=1;
				?>
					<div class="float-left">
						<label  for="refno"><?php echo $udf->udf_name; ?><?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "<span style='color:red;'>*</span>"; ?></label>
					</div>
					<div class="float-left">
						<input type="text" name="udf_<?php echo $udf->udf_name; ?>" id="udf_<?php echo $udf->udf_order; ?>" class="text_udf <?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "required req_text_udf"; ?>" value="<?php if(isset($_SESSION['rem_'.'udf'.str_ireplace("-","",str_ireplace(" ", "", str_ireplace(":","",trim($udf->udf_name))))])){ echo $_SESSION['rem_'.'udf'.str_ireplace("-","",str_ireplace(" ", "", str_ireplace(":","",trim($udf->udf_name))))];  } ?>" size="<?php if($udf->udf_fld_size > 0){ echo $udf->udf_fld_size; } ?>" maxlength="<?php if($udf->udf_fld_size > 0){ echo $udf->udf_fld_size; } ?>">
					</div>
				<?php
				}
				elseif($udf->udf_type == "D"){
					$i=1;
				?>
					<div class="float-left">
						<label  for="refno"><?php echo $udf->udf_name; ?><?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "<span style='color:red;'>*</span>"; ?></label>
					</div>
					<div class="float-left">
						<input type="text" name="udf_<?php echo $udf->udf_name; ?>" id="udf_<?php echo $udf->udf_order; ?>" class="dateField text_udf <?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "required req_text_date"; ?>" value="<?php if(isset($_SESSION['rem_'.'udf'.str_ireplace("-","",str_ireplace(" ", "", str_ireplace(":","",trim($udf->udf_name))))])){ echo $_SESSION['rem_'.'udf'.str_ireplace("-","",str_ireplace(" ", "", str_ireplace(":","",trim($udf->udf_name))))];  } ?>" size="5" maxlength="10" >
					</div>
				<?php	
				}
				elseif($udf->udf_type == "Y"){
					$i=1;
				?>
					<div class="float-left">
						<label  for="refno"><?php echo $udf->udf_name; ?><?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "<span style='color:red;'>*</span>"; ?></label>
					</div>
					<div class="float-left">
                        <b>Yes</b> <input class="<?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "required req_text_udf"; ?>" type="radio" name="udf_<?php echo $udf->udf_name; ?>" id="udf_<?php echo $udf->udf_order; ?>_Y"  <?php if(isset($_SESSION['rem_'.'udf'.str_ireplace("-","",str_ireplace(" ", "", str_ireplace(":","",trim($udf->udf_name))))])){ if($_SESSION['rem_'.'udf'.str_ireplace("-","",str_ireplace(" ", "", str_ireplace(":","",trim($udf->udf_name))))] == 'Y'){ echo "checked"; } } ?>  value="Y" /> <b>No</b> <input class="<?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "required req_text_udf"; ?>" type="radio" <?php if(isset($_SESSION['rem_'.'udf'.str_ireplace("-","",str_ireplace(" ", "", str_ireplace(":","",trim($udf->udf_name))))])){ if($_SESSION['rem_'.'udf'.str_ireplace("-","",str_ireplace(" ", "", str_ireplace(":","",trim($udf->udf_name))))] == 'N'){ echo "checked"; } } ?> name="udf_<?php echo $udf->udf_name; ?>" id="udf_<?php echo $udf->udf_order; ?>_N"  value="N" /> 
                    </div>
				<?php	
				}
				elseif($udf->udf_type == "M"){
					$i=1;
				?>
					<div class="float-left">
						<label  for="refno"><?php echo $udf->udf_name; ?><?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "<span style='color:red;'>*</span>"; ?></label>
					</div>
					<div class="float-left">
						<input type="text" name="udf_<?php echo $udf->udf_name; ?>" id="udf_<?php echo $udf->udf_order; ?>" class="timeField text_udf <?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "required req_text_time"; ?>" value="<?php if(isset($_SESSION['rem_'.'udf'.str_ireplace("-","",str_ireplace(" ", "", str_ireplace(":","",trim($udf->udf_name))))])){ echo $_SESSION['rem_'.'udf'.str_ireplace("-","",str_ireplace(" ", "", str_ireplace(":","",trim($udf->udf_name))))];  } ?>" size="5" maxlength="10">
					</div>
				<?php	
				}
				elseif($udf->udf_type == "V"){
					$i=$i+1;
				?>
					<div class="float-left">
						<label  for="refno"><?php echo $udf->udf_name; ?><?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "<span style='color:red;'>*</span>"; ?></label>
					</div>
					<div class="float-left">
						Date: <input type="text" name="udf_<?php echo $udf->udf_name; ?>_date" id="udf_<?php echo $udf->udf_order; ?>_date" class="dateField text_udf_small <?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "required req_text_date"; ?>" value="<?php if(isset($_SESSION['rem_'.'udf'.str_ireplace("-","",str_ireplace(" ", "", str_ireplace(":","",trim($udf->udf_name))))])){ echo $_SESSION['rem_'.'udf'.str_ireplace("-","",str_ireplace(" ", "", str_ireplace(":","",trim($udf->udf_name))))];  } ?>" size="5" maxlength="10" >
						Time: <input type="text" name="udf_<?php echo $udf->udf_name; ?>_time" id="udf_<?php echo $udf->udf_order; ?>_time" class="timeField text_udf_small <?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "required req_text_time"; ?>" value="<?php if(isset($_SESSION['rem_'.'udf'.str_ireplace("-","",str_ireplace(" ", "", str_ireplace(":","",trim($udf->udf_name))))])){ echo $_SESSION['rem_'.'udf'.str_ireplace("-","",str_ireplace(" ", "", str_ireplace(":","",trim($udf->udf_name))))];  } ?>" size="5" maxlength="10">
					</div>
				<?php	
				}
				elseif($udf->udf_type == "G"){
					  $i=$i+1;
				  ?>
					  <div class="float-left">
						  <label  for="refno"><?php echo $udf->udf_name; ?><?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "<span style='color:red;'>*</span>"; ?></label>
					  </div>
					  <div class="float-left">
						<input type="file" name="udf_<?php echo str_ireplace("-","",str_ireplace(" ", "", str_ireplace(":","",trim($udf->udf_name)))); ?>" id="udf_<?php echo $udf->udf_order; ?>" class="text_udf <?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "required req_text_udf"; ?>" >
					  </div>
				  <?php
				  }
				  elseif($udf->udf_type == "B"){
					  $i=$i+1;
				  ?>
					  <div class="float-left">
						  <label  for="refno"><?php echo $udf->udf_name; ?><?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "<span style='color:red;'>*</span>"; ?></label>
					  </div>
					  <div class="float-left">
						<input type="file" name="udf_<?php echo str_ireplace("-","",str_ireplace(" ", "", str_ireplace(":","",trim($udf->udf_name)))); ?>" id="udf_<?php echo $udf->udf_order; ?>" class="text_udf <?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "required req_text_udf"; ?>" >
					  </div>
				  <?php
				  }
				  elseif($udf->udf_type == "P"){
					  $i=$i+1;
				  ?>
					  <div class="float-left">
						  <label  for="refno"><?php echo $udf->udf_name; ?><?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "<span style='color:red;'>*</span>"; ?></label>
					  </div>
					  <div class="float-left">
						<input type="file" name="udf_<?php echo str_ireplace("-","",str_ireplace(" ", "", str_ireplace(":","",trim($udf->udf_name)))); ?>" id="udf_<?php echo $udf->udf_order; ?>" class="text_udf <?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "required req_text_udf"; ?>" >
					  </div>
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
		if($i==0){
			?>
			<script type="text/javascript">
                
                $("#udfs").slideUp("fast");
                $("#udfs_exist").val("0");
            </script>
            <?php
		}
		else{
			?>
            <script language="javascript">
				$("#udfs_exist").val("1");
				$("#udfs").slideDown("fast");
		
			</script>
            <?php	
		}
	}
	elseif(count($GLOBALS['result']->udf_details)== 0){
		?>
		<script type="text/javascript">
			
			$("#udfs").slideUp("fast");
			$("#udfs_exist").val("0");
		</script>
		<?php
		
	}
}
else{
?>
<script type="text/javascript">
	$("#udfs").slideUp("fast");
	$("#udfs_exist").val("0");
</script>
<?php
	
}
?>