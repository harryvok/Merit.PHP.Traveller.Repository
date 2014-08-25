<span class="graytitle">Attribute Details</span>
<ul class="pageitem">
	  <?php
      $number=0;
      $result_attribdets = $GLOBALS['result']->attrib_det_det;
	  if(isset($result_attribdets->attrib_det_details) && count($result_attribdets->attrib_det_details) > 1){
		  $count=0;
		  foreach($result_attribdets->attrib_det_details as $result_a_al){
			  $count=$count+1;
			  $rand = rand(0,20000000);
              ?>
              
              <li class="textbox">
                <b>Control:</b> <?php echo $result_a_al->attrib_ctr; ?><br />
              </li>
              <li class="textbox">
                <b>Description:</b> <?php echo $result_a_al->desc_txt; ?>
              </li>
              <li  id="button<?php echo $_GET['id'].$rand.$count; ?>">
                <input type="button" value="Show Fields" onclick="display_fld('<?php echo $_GET['id'].$rand.$count; ?>')" />
              </li>
              <li class="textbox" id="attrib_flds<?php echo $_GET['id'].$rand.$count; ?>" style="display:none;">
              	<ul class="pageitem">
                	<?php
					for($i=1;$i<=30;$i++){
						if($i<10){
							if(strlen($result_a_al->{"fld_0".$i."_data"}) > 0){
								?>
                                <li class="textbox">
                                <?php
								echo "<b>".$result_a_al->{"fld_0".$i."_txt"}."</b> ".$result_a_al->{"fld_0".$i."_data"};	
								?>
                                </li>
                                <?php
							}
						}
						else{
							if(strlen($result_a_al->{"fld_".$i."_data"}) > 0){
								?>
								<li class="textbox">
                                <?php
								echo "<b>".$result_a_al->{"fld_".$i."_txt"}."</b> ".$result_a_al->{"fld_".$i."_data"};	
								?>
                                </li>
                                <?php
							}
						}
					}
					?>
                </ul>
              </li>
              <?php
          }
      }
       elseif(isset($result_attribdets->attrib_det_details) && count($result_attribdets->attrib_det_details) == 1){
              $result_a_al = $result_attribdets->attrib_det_details;
			  $rand = rand(0,20000000);
			  echo $address_id.$rand;
          ?>
              <li class="textbox">
                <b>Control:</b> <?php echo $result_a_al->attrib_ctr; ?>
              </li>
              <li class="textbox">
                <b>Description:</b> <?php echo $result_a_al->desc_txt; ?>
              </li>
              <li  id="button<?php echo $_GET['id'].$rand; ?>">
                <input type="button" value="Show Fields" onclick="display_fld('<?php echo $_GET['id'].$rand; ?>')" />
              </li>
              <li class="textbox" id="attrib_flds<?php echo $_GET['id'].$rand; ?>" style="display:none;">
              	<ul class="pageitem">
                	<?php
					for($i=1;$i<=30;$i++){
						if($i<10){
							if(strlen($result_a_al->{"fld_0".$i."_data"}) > 0){
								?>
                                <li class="textbox">
                                <?php
								echo "<b>".$result_a_al->{"fld_0".$i."_txt"}."</b> ".$result_a_al->{"fld_0".$i."_data"};	
								?>
                                </li>
                                <?php
							}
						}
						else{
							if(strlen($result_a_al->{"fld_".$i."_data"}) > 0){
								?>
								<li class="textbox">
                                <?php
								echo "<b>".$result_a_al->{"fld_".$i."_txt"}."</b> ".$result_a_al->{"fld_".$i."_data"};	
								?>
                                </li>
                                <?php
							}
						}
					}
					?>
                </ul>
              </li>
              <?php
      }
      ?>
</ul>
<script type="text/javascript">
	$(document).ready(function() {
		Unload();
	});
</script>