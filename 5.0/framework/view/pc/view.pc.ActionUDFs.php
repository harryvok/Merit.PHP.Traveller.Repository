
      <div class="summaryContainer">

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
  <input type="hidden" name="val-u" id="val-u" value="0" />
    <h1>Request User Defined Fields (<?php echo $count_udf; ?>) <?php
                                                                if($count_udf > 0 && $GLOBALS['finalised_ind'] == "N" && $_SESSION['roleSecurity']->mod_udf == "Y"){
			  ?> <span  class="openPopup" id="ActionUDFs"><img src="images/iconAdd.png" /> Modify</span><?php
                                                                }
		  ?></h1>
    <div>
<div id="udf" class="dropdown">

      <table id="filterTableJobs" class=" sortable" title="" cellspacing="0">
        <tr>
           <th>Name</th>
           <th >Value</th>
        </tr>
        <?php
        $number=0;
        if(count($GLOBALS['result']['udfs']->udf_details) > 1){
            foreach($GLOBALS['result']['udfs']->udf_details as $udf){
                    if($udf->udf_active_ind == "Y"  && $udf->udf_action_id == 0){
                        $number = $number+1;
                        if($number == 2){
                            $class = "dark";
                            $number = 0;
                        }
                        else{
                            $class = "light";
                        }
                        ?>
                        <tr class="<?php echo $class; ?>_nocur">
                          <?php if($udf->udf_type != "C" && $udf->udf_type != "E"){ ?><td><?php echo $udf->udf_name; ?><?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "<span style='color:red;'>*</span>"; ?></td><?php } ?>
                          <td <?php if($udf->udf_type == "C" || $udf->udf_type == "E"){ ?>colspan="2"<?php } ?>><?php if($udf->udf_type == "G" || $udf->udf_type == "B" || $udf->udf_type == "P"){ ?><?php if(isset($udf->udf_data)) {  if(stristr(str_ireplace("\\", "/", $udf->udf_data), ATTACHMENT_FOLDER)){ ?><a id="<?php echo str_ireplace("\\", "/", $udf->udf_data); ?>" class="ViewFile">View</a> <?php } } } elseif($udf->udf_type == "D"){ echo strlen($udf->udf_data) > 0 ? date("d/m/Y", strtotime(str_replace("/","-",$udf->udf_data))) : ""; } elseif($udf->udf_type == "V"){ echo strlen($udf->udf_data) > 0 ? date("d/m/Y h:i A", strtotime(str_replace("/", "-", $udf->udf_data))) : ""; } else{ echo $udf->udf_data; } ?></td>
                        </tr>
                        <?php  
                    }
				
            }
        }
        elseif(count($GLOBALS['result']['udfs']->udf_details) == 1){
            $udf = $GLOBALS['result']['udfs']->udf_details;
            if($udf->udf_active_ind == "Y"){
            ?>
            <tr class="light_nocur">
              <?php if($udf->udf_type != "C" && $udf->udf_type != "E"){ ?><td><?php echo $udf->udf_name; ?><?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "<span style='color:red;'>*</span>"; ?></td><?php } ?>
              <td <?php if($udf->udf_type == "C" || $udf->udf_type == "E"){ ?>colspan="2"<?php } ?>><?php if($udf->udf_type == "G" || $udf->udf_type == "B" || $udf->udf_type == "P"){ ?><?php if(isset($udf->udf_data)) {  if(stristr(str_ireplace("\\", "/", $udf->udf_data), ATTACHMENT_FOLDER)){ ?><a id="<?php echo str_ireplace("\\", "/", $udf->udf_data); ?>" class="ViewFile">View</a> <?php } } } elseif($udf->udf_type == "D"){ echo strlen($udf->udf_data) > 0 ? date("d/m/Y", strtotime(str_replace("/","-",$udf->udf_data))) : ""; } elseif($udf->udf_type == "V"){ echo strlen($udf->udf_data) > 0 ? date("d/m/Y h:i A", strtotime(str_replace("/", "-", $udf->udf_data))) : ""; } else{ echo $udf->udf_data; } ?></td>
            </tr>
            <?php
            }
        }
        ?>
      </table>
    </div>
</div>
</div>
<div class="popupDetail" id="ActionUDFsPopup">
    <h1>Modify Request User Defined Fields <span  class="closePopup"><img src="images/delete-icon.png" /> Close</span></h1>
	    <div>
     <script type="text/javascript">
      $(document).ready(function(){
          // validate signup form on keyup and submit
          $("#actionudf").validate();
      });
    </script>
    
    <form method="post"  enctype="multipart/form-data" id="actionudf" action="process.php">
<?php
  if(isset($GLOBALS['result']['udfs']->udf_details)){
      if(count($GLOBALS['result']['udfs']->udf_details)> 1){
          $i=0;
          foreach($GLOBALS['result']['udfs']->udf_details as $udf){
                  if($udf->udf_active_ind == "Y" && $udf->udf_action_id == 0){
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
                              <select class="text_udf <?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "required"; ?>" name="udf_<?php echo $udf->udf_name; ?>" id="udf_<?php echo $udf->udf_order; ?>">
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
                              <input type="text" name="udf_<?php echo $udf->udf_name; ?>" id="udf_<?php echo $udf->udf_order; ?>" class="text_udf <?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "required"; ?> digits" value="<?php if(isset($udf->udf_data)) echo $udf->udf_data; ?>" size="5" maxlength="<?php if($udf->udf_fld_size > 0){ echo $udf->udf_fld_size; } ?>">
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
                              $<input type="text" name="udf_<?php echo $udf->udf_name; ?>" id="udf_<?php echo $udf->udf_order; ?>" class="text_udf <?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "required"; ?> number" value="<?php if(isset($udf->udf_data)) echo str_ireplace("$","",$udf->udf_data); ?>" size="5" maxlength="<?php if($udf->udf_fld_size > 0){ echo $udf->udf_fld_size; } ?>">
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
                              <input type="text" name="udf_<?php echo $udf->udf_name; ?>" id="udf_<?php echo $udf->udf_order; ?>" class="text_udf <?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "required"; ?>" value="<?php if(isset($udf->udf_data)) echo $udf->udf_data; ?>" size="<?php if($udf->udf_fld_size > 0){ echo $udf->udf_fld_size; } ?>" maxlength="<?php if($udf->udf_fld_size > 0){ echo $udf->udf_fld_size; } ?>">
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
                              <input type="text" name="udf_<?php echo $udf->udf_name; ?>" id="udf_<?php echo $udf->udf_order; ?>" class="dateField text_udf <?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "required"; ?>" value="<?php if(isset($udf->udf_data) && strlen($udf->udf_data) > 0) echo date("d/m/Y", strtotime(str_replace("/","-",$udf->udf_data))); ?>" size="5" maxlength="10"  >
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
                              <b>Yes</b> <input class="<?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "required"; ?>" type="radio" name="udf_<?php echo $udf->udf_name; ?>" id="udf_<?php echo $udf->udf_order; ?>_Y" <?php if(isset($udf->udf_data) && $udf->udf_data == 'Y'){ echo "checked"; } ?>  value="Y" /> <b>No</b> <input class="<?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "required"; ?>" type="radio" <?php if(isset($udf->udf_data) && $udf->udf_data == 'N'){ echo "checked"; } ?> name="udf_<?php echo $udf->udf_name; ?>" id="udf_<?php echo $udf->udf_order; ?>_N"  value="N" /> 
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
                              <input type="text" name="udf_<?php echo $udf->udf_name; ?>" id="udf_<?php echo $udf->udf_order; ?>" class="timeField text_udf <?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "required"; ?>" value="<?php if(isset($udf->udf_data) && strlen($udf->udf_data) > 0) echo date("h:i A", strtotime($udf->udf_data)); ?>" size="5" maxlength="10">
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
                              <?php 
                              $udfdata = explode(" ", $udf->udf_data);
                              if(isset($udfdata[0]) && !isset($udfdata[1])){
                                  $udfdata[1] = substr($udfdata[0],10,15);
                                  $udfdata[0] = substr($udfdata[0],0,10);
                              }
                               ?>
                          Date: <input type="text" name="udf_<?php echo $udf->udf_name; ?>_date" id="udf_<?php echo $udf->udf_order; ?>_date" class="dateField text_udf_small <?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "required"; ?>" value="<?php if(isset($udfdata[0]) && strlen($udfdata[0]) > 0) echo date("d/m/Y", strtotime(str_replace("/","-",$udfdata[0]))); ?>" size="5" maxlength="10" >
						Time: <input type="text" name="udf_<?php echo $udf->udf_name; ?>_time" id="udf_<?php echo $udf->udf_order; ?>_time" class="timeField text_udf_small <?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "required"; ?>" value="<?php if(isset($udfdata[1]) && strlen($udfdata[1]) > 0) echo date("h:i A", strtotime($udfdata[1])); ?>" size="5" maxlength="10">
					
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
                          		<?php if(isset($udf->udf_data)){ if(stristr(str_ireplace("\\", "/", $udf->udf_data), ATTACHMENT_FOLDER)){ ?><a id="<?php echo str_ireplace("\\", "/", $udf->udf_data); ?>" class="ViewFile">View Attachment</a> <?php } else{ echo $udf->udf_data; } }  ?><br />
                              <strong>Upload New:</strong> <input type="file" name="udf_<?php echo str_ireplace("-","",str_ireplace(" ", "", str_ireplace(":","",trim($udf->udf_name)))); ?>" id="udf_<?php echo $udf->udf_order; ?>" class="text_udf <?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "required"; ?>" >
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
                          		<?php if(isset($udf->udf_data)){
                                            if(stristr(str_ireplace("\\", "/", $udf->udf_data), ATTACHMENT_FOLDER)){ ?><a id="<?php echo str_ireplace("\\", "/", $udf->udf_data); ?>" class="ViewFile">View Attachment</a> <?php } else{ echo $udf->udf_data; }
                                        }  ?><br />
                              <strong>Upload New:</strong> <input type="file" name="udf_<?php echo str_ireplace("-","",str_ireplace(" ", "", str_ireplace(":","",trim($udf->udf_name)))); ?>" id="udf_<?php echo $udf->udf_order; ?>" class="text_udf <?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "required"; ?>" >
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
                          		<?php if(isset($udf->udf_data)){
                                            if(stristr(str_ireplace("\\", "/", $udf->udf_data), ATTACHMENT_FOLDER)){ ?><a id="<?php echo str_ireplace("\\", "/", $udf->udf_data); ?>" class="ViewFile">View Attachment</a> <?php } else{ echo $udf->udf_data; }
                                        }  ?><br />
                              <strong>Upload New:</strong> <input type="file" name="udf_<?php echo str_ireplace("-","",str_ireplace(" ", "", str_ireplace(":","",trim($udf->udf_name)))); ?>" id="udf_<?php echo $udf->udf_order; ?>" class="text_udf <?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "required"; ?>" >
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
      elseif(count($GLOBALS['result']['udfs']->udf_details)== 1){
          $udf = $GLOBALS['result']['udfs']->udf_details;
          $i=0;
          
          if($udf->udf_active_ind == "Y" && $udf->udf_action_id == 0){
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
                          <select class="text_udf <?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "required"; ?>" name="udf_<?php echo $udf->udf_name; ?>" id="udf_<?php echo $udf->udf_order; ?>">
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
                          <input type="text" name="udf_<?php echo $udf->udf_name; ?>" id="udf_<?php echo $udf->udf_order; ?>" class="text_udf <?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "required"; ?> digits" value="<?php if(isset($udf->udf_data)) echo $udf->udf_data; ?>" size="5" maxlength="<?php if($udf->udf_fld_size > 0){ echo $udf->udf_fld_size; } ?>">
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
                          $<input type="text" name="udf_<?php echo $udf->udf_name; ?>" id="udf_<?php echo $udf->udf_order; ?>" class="text_udf <?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "required"; ?> number" value="<?php if(isset($udf->udf_data)) echo str_ireplace("$","",$udf->udf_data); ?>" size="5" maxlength="<?php if($udf->udf_fld_size > 0){ echo $udf->udf_fld_size; } ?>">
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
                          <input type="text" name="udf_<?php echo $udf->udf_name; ?>" id="udf_<?php echo $udf->udf_order; ?>" class="text_udf <?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "required"; ?>" value="<?php if(isset($udf->udf_data)) echo $udf->udf_data; ?>" size="<?php if($udf->udf_fld_size > 0){ echo $udf->udf_fld_size; } ?>" maxlength="<?php if($udf->udf_fld_size > 0){ echo $udf->udf_fld_size; } ?>">
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
                          <input type="text" name="udf_<?php echo $udf->udf_name; ?>" id="udf_<?php echo $udf->udf_order; ?>" class="dateField text_udf <?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "required"; ?>" value="<?php if(isset($udf->udf_data) && strlen($udf->udf_data) > 0) echo date("d/m/Y", strtotime(str_replace("/","-",$udf->udf_data))); ?>" size="5" maxlength="10"  >
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
                          <b>Yes</b> <input class="<?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "required"; ?>" type="radio" name="udf_<?php echo $udf->udf_name; ?>" id="udf_<?php echo $udf->udf_order; ?>_Y" <?php if(isset($udf->udf_data) && $udf->udf_data == 'Y'){ echo "checked"; } ?>  value="Y" /> <b>No</b> <input class="<?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "required"; ?>" type="radio" <?php if(isset($udf->udf_data) && $udf->udf_data == 'N'){ echo "checked"; } ?> name="udf_<?php echo $udf->udf_name; ?>" id="udf_<?php echo $udf->udf_order; ?>_N"  value="N" /> 
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
                          <input type="text" name="udf_<?php echo $udf->udf_name; ?>" id="udf_<?php echo $udf->udf_order; ?>" class="timeField text_udf <?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "required"; ?>" value="<?php if(isset($udf->udf_data) && strlen($udf->udf_data) > 0) echo date("h:i A", strtotime($udf->udf_data)); ?>" size="5" maxlength="10">
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
                          <?php 
                              $udfdata = explode(" ", $udf->udf_data);
                              if(isset($udfdata[0]) && !isset($udfdata[1])){
                                  $udfdata[1] = substr($udfdata[0],10,15);
                                  $udfdata[0] = substr($udfdata[0],0,10);
                              }
                               ?>
                           Date: <input type="text" name="udf_<?php echo $udf->udf_name; ?>_date" id="udf_<?php echo $udf->udf_order; ?>_date" class="dateField text_udf_small <?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "required"; ?>" value="<?php if(isset($udfdata[0]) && strlen($udfdata[0]) > 0) echo date("d/m/Y", strtotime(str_replace("/","-",$udfdata[0]))); ?>" size="5" maxlength="10" >
						Time: <input type="text" name="udf_<?php echo $udf->udf_name; ?>_time" id="udf_<?php echo $udf->udf_order; ?>_time" class="timeField text_udf_small <?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "required"; ?>" value="<?php if(isset($udfdata[1]) && strlen($udfdata[1]) > 0) echo date("h:i A", strtotime($udfdata[1])); ?>" size="5" maxlength="10">
					
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
							<?php if(isset($udf->udf_data)){ if(stristr(str_ireplace("\\", "/", $udf->udf_data), ATTACHMENT_FOLDER)){ ?><a id="<?php echo str_ireplace("\\", "/", $udf->udf_data); ?>" class="ViewFile">View Attachment</a> <?php } else{ echo $udf->udf_data; } }  ?><br />
						  <strong>Upload New:</strong> <input type="file" name="udf_<?php echo str_ireplace("-","",str_ireplace(" ", "", str_ireplace(":","",trim($udf->udf_name)))); ?>" id="udf_<?php echo $udf->udf_order; ?>" class="text_udf <?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "required"; ?>" >
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
							<?php if(isset($udf->udf_data)){ if(stristr(str_ireplace("\\", "/", $udf->udf_data), ATTACHMENT_FOLDER)){ ?><a id="<?php echo str_ireplace("\\", "/", $udf->udf_data); ?>" class="ViewFile">View</a> <?php } else{ echo $udf->udf_data; }
                                  } ?>
						  <strong>Upload New:</strong> <input type="file" name="udf_<?php echo str_ireplace("-","",str_ireplace(" ", "", str_ireplace(":","",trim($udf->udf_name)))); ?>" id="udf_<?php echo $udf->udf_order; ?>" class="text_udf <?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "required"; ?>" >
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
							<?php if(isset($udf->udf_data)){
                                      if(stristr(str_ireplace("\\", "/", $udf->udf_data), ATTACHMENT_FOLDER)){ ?><a id="<?php echo str_ireplace("\\", "/", $udf->udf_data); ?>" class="ViewFile">View Attachment</a> <?php } else{ echo $udf->udf_data; }
                                  }  ?><br />
						  <strong>Upload New:</strong> <input type="file" name="udf_<?php echo str_ireplace("-","",str_ireplace(" ", "", str_ireplace(":","",trim($udf->udf_name)))); ?>" id="udf_<?php echo $udf->udf_order; ?>" class="text_udf <?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "required"; ?>" >
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
                                ?>
  <p>&nbsp;</p>
    <input id="submit" class="button left" type='submit' value='Save' />
    <input type="hidden" name="page" value="action" />
      <input type="hidden" name="id" id="id" value="<?php echo $_SESSION['request_id']; ?>" />
      <input type="hidden" name="act_id" id="act_id" value="<?php echo $_GET['id']; ?>" />
       <input type="hidden" name="service" value="<?php echo $GLOBALS['result']['request']->service_code; ?>" />
      <input type="hidden" name="request" value="<?php echo $GLOBALS['result']['request']->request_code; ?>" />
      <input type="hidden" name="function" value="<?php echo $GLOBALS['result']['request']->function_code; ?>" />
      <input type="hidden" name="action" value="EditUDFs" />
   </form>
  </div>

 </div>


<div class="summaryContainer">
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
<h1>Action User Defined Fields (<?php echo $count_udf; ?>) <?php
                                                           if($count_udf > 0 && $GLOBALS['act_finalised_ind'] == "N" && $_SESSION['roleSecurity']->mod_udf == "Y"){
                                                           ?><span  class="openPopup" id="RequestUDFs"><img src="images/iconAdd.png" /> Modify</span><?php
                                                           }
                                                                                              ?></h1>
 <div>

<input type="hidden" name="val-u" id="val-u" value="0" />

<div id="udf" class="dropdown">

<table id="filterTableJobs" class=" sortable" title="" cellspacing="0">
<tr>
 <th>Name</th>
 <th >Value</th>
</tr>
<?php
$number=0;
if(count($GLOBALS['result']['udfs']->udf_details) > 1){
    foreach($GLOBALS['result']['udfs']->udf_details as $udf){
        if($udf->udf_active_ind == "Y" && $udf->udf_action_id == $_GET['id']){
            $number = $number+1;
            if($number == 2){
                $class = "dark";
                $number = 0;
            }
            else{
                $class = "light";
            }
?>
              <tr class="<?php echo $class; ?>_nocur">
                <td><?php echo $udf->udf_name; ?><?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "<span style='color:red;'>*</span>"; ?></td>
                <td><?php if($udf->udf_type == "G" || $udf->udf_type == "B" || $udf->udf_type == "P"){ ?><?php if(isset($udf->udf_data)) {
                                                                                                                   if(stristr(str_ireplace("\\", "/", $udf->udf_data), ATTACHMENT_FOLDER)){ ?><a id="<?php echo str_ireplace("\\", "/", $udf->udf_data); ?>" class="ViewFile">View</a> <?php }
                                                                                                               }
                                                                                                                                 } elseif($udf->udf_type == "D"){ echo strlen($udf->udf_data) > 0 ? date("d/m/Y", strtotime(str_replace("/","-",$udf->udf_data))) : ""; } elseif($udf->udf_type == "V"){ echo strlen($udf->udf_data) > 0 ? date("d/m/Y h:i A", strtotime(str_replace("/", "-", $udf->udf_data))) : ""; } else{ echo $udf->udf_data; } ?></td>
              </tr>
              <?php  
        }
        
    }
}
elseif(count($GLOBALS['result']['udfs']->udf_details) == 1){
    $udf = $GLOBALS['result']['udfs']->udf_details;
    if($udf->udf_active_ind == "Y" && $udf->udf_action_id == $_GET['id']){
              ?>
  <tr class="light_nocur">
    <td><?php echo $udf->udf_name; ?><?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "<span style='color:red;'>*</span>"; ?></td>
    <td><?php if($udf->udf_type == "G" || $udf->udf_type == "B" || $udf->udf_type == "P"){ ?><?php if(isset($udf->udf_data)) {
                                                                                                       if(stristr(str_ireplace("\\", "/", $udf->udf_data), ATTACHMENT_FOLDER)){ ?><a id="<?php echo str_ireplace("\\", "/", $udf->udf_data); ?>" class="ViewFile">View</a> <?php }
                                                                                                   }
                                                                                                         } elseif($udf->udf_type == "D"){ echo strlen($udf->udf_data) > 0 ? date("d/m/Y", strtotime(str_replace("/","-",$udf->udf_data))) : ""; } elseif($udf->udf_type == "V"){ echo strlen($udf->udf_data) > 0 ? date("d/m/Y h:i A", strtotime(str_replace("/", "-", $udf->udf_data))) : ""; } else{ echo $udf->udf_data; } ?></td>
  </tr>
  <?php
    }
}
  ?>
</table>
</div>
</div>
</div>
<div class="popupDetail" id="RequestUDFsPopup">
    <h1>Modify Action User Defined Fields <span  class="closePopup"><img src="images/delete-icon.png" /> Close</span></h1>
	    <div>
     <script type="text/javascript">
      $(document).ready(function(){
          // validate signup form on keyup and submit
          $("#actionudf1").validate();
      });
    </script>
    
    <form method="post"  enctype="multipart/form-data" id="actionudf1" action="process.php">
<?php
if(isset($GLOBALS['result']['udfs']->udf_details)){
    if(count($GLOBALS['result']['udfs']->udf_details)> 1){
        $i=0;
        foreach($GLOBALS['result']['udfs']->udf_details as $udf){
            if($udf->udf_active_ind == "Y" && $udf->udf_action_id == $_GET['id'] && $udf->udf_action_comp == ""){
                if($udf->udf_depends != 0){
?>
                        <div id="act_depends_<?php echo $udf->udf_order; ?>" class="udfDependant">
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
                              <select class="text_udf <?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "required"; ?>" name="udf_<?php echo $udf->udf_name; ?>" id="act_udf_<?php echo $udf->udf_order; ?>">
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
                              <input type="text" name="udf_<?php echo $udf->udf_name; ?>" id="act_udf_<?php echo $udf->udf_order; ?>" class="text_udf <?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "required"; ?> digits" value="<?php if(isset($udf->udf_data)) echo $udf->udf_data; ?>" size="5" maxlength="<?php if($udf->udf_fld_size > 0){ echo $udf->udf_fld_size; } ?>">
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
                              $<input type="text" name="udf_<?php echo $udf->udf_name; ?>" id="act_udf_<?php echo $udf->udf_order; ?>" class="text_udf <?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "required"; ?> number" value="<?php if(isset($udf->udf_data)) echo str_ireplace("$","",$udf->udf_data); ?>" size="5" maxlength="<?php if($udf->udf_fld_size > 0){ echo $udf->udf_fld_size; } ?>">
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
                              <input type="text" name="udf_<?php echo $udf->udf_name; ?>" id="act_udf_<?php echo $udf->udf_order; ?>" class="text_udf <?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "required"; ?>" value="<?php if(isset($udf->udf_data)) echo $udf->udf_data; ?>" size="<?php if($udf->udf_fld_size > 0){ echo $udf->udf_fld_size; } ?>" maxlength="<?php if($udf->udf_fld_size > 0){ echo $udf->udf_fld_size; } ?>">
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
                              <input type="text" name="udf_<?php echo $udf->udf_name; ?>" id="act_udf_<?php echo $udf->udf_order; ?>" class="text_udf <?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "required"; ?>" value="<?php if(isset($udf->udf_data)) echo date("h:i A", strtotime($udf->udf_data)); ?>" size="5" maxlength="10"  >
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
                              <b>Yes</b> <input class="<?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "required"; ?>" type="radio" name="udf_<?php echo $udf->udf_name; ?>" id="act_udf_<?php echo $udf->udf_order; ?>_Y" <?php if(isset($udf->udf_data) && $udf->udf_data == 'Y'){ echo "checked"; } ?>  value="Y" /> <b>No</b> <input class="<?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "required"; ?>" type="radio" <?php if(isset($udf->udf_data) && $udf->udf_data == 'N'){ echo "checked"; } ?> name="udf_<?php echo $udf->udf_name; ?>" id="act_udf_<?php echo $udf->udf_order; ?>_N"  value="N" /> 
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
                              <input type="text" name="udf_<?php echo $udf->udf_name; ?>" id="udf_<?php echo $udf->udf_order; ?>" class="timeField text_udf <?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "required"; ?>" value="<?php if(isset($udf->udf_data) && strlen($udf->udf_data) > 0) echo date("h:i A", strtotime($udf->udf_data)); ?>" size="5" maxlength="10">
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
                              <?php 
                    $udfdata = explode(" ", $udf->udf_data);
                    if(isset($udfdata[0]) && !isset($udfdata[1])){
                        $udfdata[1] = substr($udfdata[0],10,15);
                        $udfdata[0] = substr($udfdata[0],0,10);
                    }
                              ?>
                           Date: <input type="text" name="udf_<?php echo $udf->udf_name; ?>_date" id="act_udf_<?php echo $udf->udf_name; ?>_date" class="dateField text_udf  <?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "required"; ?>" value="<?php if(isset($udfdata[0])) echo date("d/m/Y", strtotime(str_replace("/","-",$udfdata[0]))); ?>" size="5" maxlength="10" >
						Time: <input type="text" name="udf_<?php echo $udf->udf_name; ?>_time" id="act_udf_<?php echo $udf->udf_name; ?>_time" class="timeField text_udf_small <?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "required"; ?>" value="<?php if(isset($udfdata[1]) && strlen($udfdata[1]) > 0) echo date("h:i A", strtotime($udfdata[1])); ?>" size="5" maxlength="10">
					
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
								<?php if(isset($udf->udf_data)){
                                          if(stristr(str_ireplace("\\", "/", $udf->udf_data), ATTACHMENT_FOLDER)){ ?><a id="<?php echo str_ireplace("\\", "/", $udf->udf_data); ?>" class="ViewFile">View Attachment</a> <?php } else{ echo $udf->udf_data; }
                                      }  ?><br />
							  <strong>Upload New:</strong> <input type="file" name="udf_<?php echo str_ireplace("-","",str_ireplace(" ", "", str_ireplace(":","",trim($udf->udf_name)))); ?>" id="act_udf_<?php echo $udf->udf_order; ?>" class="text_udf <?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "required"; ?>" >
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
								<?php if(isset($udf->udf_data)){
                                          if(stristr(str_ireplace("\\", "/", $udf->udf_data), ATTACHMENT_FOLDER)){ ?><a id="<?php echo str_ireplace("\\", "/", $udf->udf_data); ?>" class="ViewFile">View Attachment</a> <?php } else{ echo $udf->udf_data; }
                                      }  ?><br />
							  <strong>Upload New:</strong> <input type="file" name="udf_<?php echo str_ireplace("-","",str_ireplace(" ", "", str_ireplace(":","",trim($udf->udf_name)))); ?>" id="act_udf_<?php echo $udf->udf_order; ?>" class="text_udf <?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "required"; ?>" >
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
								<?php if(isset($udf->udf_data)){
                                          if(stristr(str_ireplace("\\", "/", $udf->udf_data), ATTACHMENT_FOLDER)){ ?><a id="<?php echo str_ireplace("\\", "/", $udf->udf_data); ?>" class="ViewFile">View Attachment</a> <?php } else{ echo $udf->udf_data; }
                                      }  ?><br />
							  <strong>Upload New:</strong> <input type="file" name="udf_<?php echo str_ireplace("-","",str_ireplace(" ", "", str_ireplace(":","",trim($udf->udf_name)))); ?>" id="act_udf_<?php echo $udf->udf_order; ?>" class="text_udf <?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "required"; ?>" >
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
										if($("[id^=act_udf_<?php echo $udf->udf_depends; ?>]").attr('type') == "radio"){
											
											if($("#act_udf_<?php echo $udf->udf_depends; ?>_<?php echo $udf->udf_dep_value; ?>").attr("checked") == true){
												$("#act_depends_<?php echo $udf->udf_order; ?>").fadeIn("fast");
											}
										}
										else{
											if($("[id^=act_udf_<?php echo $udf->udf_depends; ?>]").val() != "" && vo[rand].evaluate($("[id^=act_udf_<?php echo $udf->udf_depends; ?>]").val(),"<?php echo $udf->udf_dep_value; ?>")){
												$("#act_depends_<?php echo $udf->udf_order; ?>").fadeIn("fast");
											}
										}
										$("[id^=act_udf_<?php echo $udf->udf_depends; ?>]").change(function(){
											if(vo[rand].evaluate($(this).val(),"<?php echo $udf->udf_dep_value; ?>")){
												$("#act_depends_<?php echo $udf->udf_order; ?>").fadeIn("fast");	
											}
											else{
												$("#act_depends_<?php echo $udf->udf_order; ?>").fadeOut("fast");
											}
										});
									});
								</script>
								<?php
                }
            }
        }
        
    }
    elseif(count($GLOBALS['result']['udfs']->udf_details)== 1){
        $udf = $GLOBALS['result']['udfs']->udf_details;
        $i=0;
        
        if($udf->udf_active_ind == "Y" && $udf->udf_action_id == $_GET['id'] && $udf->udf_action_comp == ""){
            if($udf->udf_depends != 0){
                                ?>
                        <div id="act_depends_<?php echo $udf->udf_order; ?>" class="udfDependant">
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
                          <select class="text_udf <?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "required"; ?>" name="udf_<?php echo $udf->udf_name; ?>" id="act_udf_<?php echo $udf->udf_order; ?>">
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
                          <input type="text" name="udf_<?php echo $udf->udf_name; ?>" id="act_udf_<?php echo $udf->udf_order; ?>" class="text_udf <?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "required"; ?> digits" value="<?php if(isset($udf->udf_data)) echo $udf->udf_data; ?>" size="5" maxlength="<?php if($udf->udf_fld_size > 0){ echo $udf->udf_fld_size; } ?>">
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
                          $<input type="text" name="udf_<?php echo $udf->udf_name; ?>" id="act_udf_<?php echo $udf->udf_order; ?>" class="text_udf <?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "required"; ?> number" value="<?php if(isset($udf->udf_data)) echo str_ireplace("$","",$udf->udf_data); ?>" size="5" maxlength="<?php if($udf->udf_fld_size > 0){ echo $udf->udf_fld_size; } ?>">
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
                          <input type="text" name="udf_<?php echo $udf->udf_name; ?>" id="act_udf_<?php echo $udf->udf_order; ?>" class="text_udf <?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "required"; ?>" value="<?php if(isset($udf->udf_data)) echo $udf->udf_data; ?>" size="<?php if($udf->udf_fld_size > 0){ echo $udf->udf_fld_size; } ?>" maxlength="<?php if($udf->udf_fld_size > 0){ echo $udf->udf_fld_size; } ?>">
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
                          <input type="text" name="udf_<?php echo $udf->udf_name; ?>" id="act_udf_<?php echo $udf->udf_order; ?>" class="text_udf <?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "required"; ?>" value="<?php if(isset($udf->udf_data)) echo date("h:i A", strtotime($udf->udf_data)); ?>" size="5" maxlength="10"  >
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
                          <b>Yes</b> <input class="<?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "required"; ?>" type="radio" name="udf_<?php echo $udf->udf_name; ?>" id="act_udf_<?php echo $udf->udf_order; ?>_Y" <?php if(isset($udf->udf_data) && $udf->udf_data == 'Y'){ echo "checked"; } ?>  value="Y" /> <b>No</b> <input class="<?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "required"; ?>" type="radio" <?php if(isset($udf->udf_data) && $udf->udf_data == 'N'){ echo "checked"; } ?> name="udf_<?php echo $udf->udf_name; ?>" id="act_udf_<?php echo $udf->udf_order; ?>_N"  value="N" /> 
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
                          <input type="text" name="udf_<?php echo $udf->udf_name; ?>" id="act_udf_<?php echo $udf->udf_order; ?>" class="text_udf <?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "required"; ?>" value="<?php if(isset($udf->udf_data) && strlen($udf->udf_data) > 0) echo date("h:i A", strtotime($udf->udf_data)); ?>" size="5" maxlength="10">
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
                          <?php 
                              $udfdata = explode(" ", $udf->udf_data);
                              if(isset($udfdata[0]) && !isset($udfdata[1])){
                                  $udfdata[1] = substr($udfdata[0],10,15);
                                  $udfdata[0] = substr($udfdata[0],0,10);
                              }
                               ?>
                          Date: <input type="text" name="udf_<?php echo $udf->udf_name; ?>_date" id="act_udf_<?php echo $udf->udf_name; ?>_date" class="dateField text_udf <?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "required"; ?>" value="<?php if(isset($udfdata[0])) echo date("d/m/Y",$udfdata[0]); ?>" size="5" maxlength="10" >
						Time: <input type="text" name="udf_<?php echo $udf->udf_name; ?>_time" id="act_udf_<?php echo $udf->udf_name; ?>_time" class="timeField text_udf_small <?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "required"; ?>" value="<?php if(isset($udfdata[1]) && strlen($udfdata[1]) > 0) echo date("h:i A", strtotime($udfdata[1])); ?>" size="5" maxlength="10">
					
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
							<?php if(isset($udf->udf_data)){ if(stristr(str_ireplace("\\", "/", $udf->udf_data), ATTACHMENT_FOLDER)){ ?><a id="<?php echo str_ireplace("\\", "/", $udf->udf_data); ?>" class="ViewFile">View Attachment</a> <?php } else{ echo $udf->udf_data; } }  ?><br />
						  <strong>Upload New:</strong> <input type="file" name="udf_<?php echo str_ireplace("-","",str_ireplace(" ", "", str_ireplace(":","",trim($udf->udf_name)))); ?>" id="act_udf_<?php echo $udf->udf_order; ?>" class="text_udf <?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "required"; ?>" >
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
							<?php if(isset($udf->udf_data)){ if(stristr(str_ireplace("\\", "/", $udf->udf_data), ATTACHMENT_FOLDER)){ ?><a id="<?php echo str_ireplace("\\", "/", $udf->udf_data); ?>" class="ViewFile">View Attachment</a> <?php } else{ echo $udf->udf_data; } }  ?><br />
						  <strong>Upload New:</strong> <input type="file" name="udf_<?php echo str_ireplace("-","",str_ireplace(" ", "", str_ireplace(":","",trim($udf->udf_name)))); ?>" id="act_udf_<?php echo $udf->udf_order; ?>" class="text_udf <?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "required"; ?>" >
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
							<?php if(isset($udf->udf_data)){ if(stristr(str_ireplace("\\", "/", $udf->udf_data), ATTACHMENT_FOLDER)){ ?><a id="<?php echo str_ireplace("\\", "/", $udf->udf_data); ?>" class="ViewFile">View Attachment</a> <?php } else{ echo $udf->udf_data; } }  ?><br />
						  <strong>Upload New:</strong> <input type="file" name="udf_<?php echo str_ireplace("-","",str_ireplace(" ", "", str_ireplace(":","",trim($udf->udf_name)))); ?>" id="act_udf_<?php echo $udf->udf_order; ?>" class="text_udf <?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "required"; ?>" >
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
										if($("[id^=act_udf_<?php echo $udf->udf_depends; ?>]").val() == "<?php echo $udf->udf_dep_value; ?>"){
											$("#act_depends_<?php echo $udf->udf_order; ?>").fadeIn("fast");
										}
										$("[id^=act_udf_<?php echo $udf->udf_depends; ?>]").change(function(){
											if($(this).val() == "<?php echo $udf->udf_dep_value; ?>"){
												$("#act_depends_<?php echo $udf->udf_order; ?>").fadeIn("fast");	
											}
											else{
												$("#act_depends_<?php echo $udf->udf_order; ?>").fadeOut("fast");
											}
										});
									});
								</script>
								<?php
							}
              }
          }
      
  }
  ?>
  <p>&nbsp;</p>
    <input id="submit" class="button left" type='submit' value='Save' />
    <input type="hidden" name="page" value="action" />
      <input type="hidden" name="id" id="id" value="<?php echo $_SESSION['request_id']; ?>" />
      <input type="hidden" name="act_id" id="act_id" value="<?php echo $_GET['id']; ?>" />
       <input type="hidden" name="service" value="<?php echo $GLOBALS['result']['request']->service_code; ?>" />
      <input type="hidden" name="request" value="<?php echo $GLOBALS['result']['request']->request_code; ?>" />
      <input type="hidden" name="function" value="<?php echo $GLOBALS['result']['request']->function_code; ?>" />
      <input type="hidden" name="action" value="EditActionUDFs" />
   </form>

   </div>

 </div>
<div class="summaryContainer">
<?php
$count_udf = 0;
if(count($GLOBALS['result']['udfs']->udf_details) > 1){
    foreach($GLOBALS['result']['udfs']->udf_details as $udf){
        if(isset($udf->udf_active_ind) && $udf->udf_active_ind == "Y" && $udf->udf_action_id != 0){
            $count_udf = $count_udf+1;
        }					
    }
}
elseif(count($GLOBALS['result']['udfs']->udf_details) == 1){
    $udf = $GLOBALS['result']['udfs']->udf_details;
    if(isset($udf->udf_active_ind) && $udf->udf_active_ind == "Y" && $udf->udf_action_id != 0){
        $count_udf = $count_udf+1;
    }		
}
      ?>
        <h1>All Action User Defined Fields For Request (<?php echo $count_udf; ?>)</h1>
           <div>
       
  <input type="hidden" name="val-u" id="Hidden1" value="0" />
<div id="Div1" class="dropdown">

      <table id="Table1" class=" sortable" title="" cellspacing="0">
        <tr>
          <th class="id">Type</th>
          <th>Required Name</th>
           <th>Name</th>
           <th >Value</th>
        </tr>
        <?php
        $number=0;
        if(count($GLOBALS['result']['udfs']->udf_details) > 1){
            foreach($GLOBALS['result']['udfs']->udf_details as $udf){
                    if($udf->udf_active_ind == "Y" && $udf->udf_action_id != 0){
                        $number = $number+1;
                        if($number == 2){
                            $class = "dark";
                            $number = 0;
                        }
                        else{
                            $class = "light";
                        }
                        ?>
                        <tr class="<?php echo $class; ?>_nocur">
                          <td><?php echo "Action ".$udf->udf_action_id; ?></td>
                          <td><?php echo $udf->action_required; ?></td>
                          <?php if($udf->udf_type != "C" && $udf->udf_type != "E"){ ?><td><?php echo $udf->udf_name; ?><?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "<span style='color:red;'>*</span>"; ?></td><?php } ?>
                          <td <?php if($udf->udf_type == "C" || $udf->udf_type == "E"){ ?>colspan="2"<?php } ?>><?php if($udf->udf_type == "G" || $udf->udf_type == "B" || $udf->udf_type == "P"){ ?><?php if(isset($udf->udf_data)) {  if(stristr(str_ireplace("\\", "/", $udf->udf_data), ATTACHMENT_FOLDER)){ ?><a id="A1" class="ViewFile">View</a> <?php } } } elseif($udf->udf_type == "D"){ echo strlen($udf->udf_data) > 0 ? date("d/m/Y", strtotime(str_replace("/","-",$udf->udf_data))) : ""; } elseif($udf->udf_type == "V"){ echo strlen($udf->udf_data) > 0 ? date("d/m/Y h:i A", strtotime(str_replace("/", "-", $udf->udf_data))) : ""; } else{ echo $udf->udf_data; } ?></td>
                        </tr>
                        <?php  
                    }
            }
        }
        elseif(count($GLOBALS['result']['udfs']->udf_details) == 1){
            $udf = $GLOBALS['result']['udfs']->udf_details;
            if($udf->udf_active_ind == "Y" && $udf->udf_action_id == 0){
            ?>
            <tr class="light_nocur">
              <td><?php echo "Action ".$udf->udf_action_id; ?></td>
              <td><?php echo $udf->action_required;  ?></td>
              <?php if($udf->udf_type != "C" && $udf->udf_type != "E"){ ?><td><?php echo $udf->udf_name; ?><?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "<span style='color:red;'>*</span>"; ?></td><?php } ?>
              <td <?php if($udf->udf_type == "C" || $udf->udf_type == "E"){ ?>colspan="2"<?php } ?>><?php if($udf->udf_type == "G" || $udf->udf_type == "B" || $udf->udf_type == "P"){ ?><?php if(isset($udf->udf_data)) {  if(stristr(str_ireplace("\\", "/", $udf->udf_data), ATTACHMENT_FOLDER)){ ?><a id="A2" class="ViewFile">View</a> <?php } } } elseif($udf->udf_type == "D"){ echo strlen($udf->udf_data) > 0 ? date("d/m/Y", strtotime(str_replace("/","-",$udf->udf_data))) : ""; } elseif($udf->udf_type == "V"){ echo strlen($udf->udf_data) > 0 ? date("d/m/Y h:i A", strtotime(str_replace("/", "-", $udf->udf_data))) : ""; } else{ echo $udf->udf_data; } ?></td>
            </tr>
            <?php
            }
        }
        ?>
      </table>

</div>
</div>