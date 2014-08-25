<div class="summaryContainer">
        <h1>Attribute Details</h1>
           <div>
  <div id="attribute_det" style="float:left; width:100%; padding: 20px 20px 20px 20px;">
      <div style="margin-right: 40px;">
          <table id="filterTableJobs" class="" title="" cellspacing="0">
          <thead>
          <tr>
			  
          	  <th>Control</th>
              <th>Description</th>
  			  <th></th>
          </tr>
          </thead>
          <tbody>
          <?php
          $number=0;
          $result_attribdets = $GLOBALS['result']->attrib_det_det;
          if(isset($result_attribdets->attrib_det_details) && count($result_attribdets->attrib_det_details) > 1){
			  $count=0;
              foreach($result_attribdets->attrib_det_details as $result_a_al){
                  $number = $number+1;
				  $count = $count+1;
                  if($number == 2){
                      $class = "dark";
                      $number = 0;
                  }
                  else{
                      $class = "light";
                  }
                  ?>
                      <tr class="<?php echo $class; ?>" onclick="display_fld('<?php echo $count; ?>')">
                          <td><?php echo $result_a_al->attrib_ctr; ?></td>
                          <td><?php echo $result_a_al->desc_txt; ?></td>
                          <td><span class="small" style="float:right;">Click to view fields</span></td>
                      </tr>
                      <tr style="display:none;" id="attrib_flds<?php echo $count; ?>">
                      	<td rowspan="3">
                      	<?php
						for($i=1;$i<=30;$i++){
							if($i<10){
								if(strlen($result_a_al->{"fld_0".$i."_txt"}) > 0){
									echo "<b>".$result_a_al->{"fld_0".$i."_txt"}."</b> ".$result_a_al->{"fld_0".$i."_data"}." | ";	
								}
							}
							else{
								if(strlen($result_a_al->{"fld_".$i."_txt"}) > 0){
									echo "<b>".$result_a_al->{"fld_".$i."_txt"}."</b> ".$result_a_al->{"fld_".$i."_data"}." | ";
								}
							}
						}
						?>
                        </td>
                      </tr>
                      <?php
              }
          }
          elseif(isset($result_attribdets->attrib_det_details) && count($result_attribdets->attrib_det_details) == 1){
              $result_a_al = $result_attribdets->attrib_det_details;
              ?>
                  <tr class="light" title="" onclick="display_fld('0')">
                          <td><?php echo $result_a_al->attrib_ctr; ?></td>
                          <td><?php echo $result_a_al->desc_txt; ?></td>
                          <td><span class="small" style="float:right;">Click to view fields</span></td>
                      </tr>
                  <tr style="display:none;" id="attrib_flds0">
					  <td rowspan="3">
                      	<table id="filterTableJobs" class="" title="" cellspacing="0" width="100%">
                          <tr>
                              
                              <th class="sortable">Field Name</th>
                              <th class="description sortable">Data</th>
                              <th></th>
                          </tr>
					  	<?php
						for($i=1;$i<=30;$i++){
							?>
                            <tr>
                            <?php
							if($i<10){
								if(strlen($result_a_al->{"fld_0".$i."_data"}) > 0){
									?>
                                    <td><?php echo $result_a_al->{"fld_0".$i."_txt"}; ?></td>
                                    <td><?php echo $result_a_al->{"fld_0".$i."_data"}; ?></td>	
                                    <?php
								}
							}
							else{
								if(strlen($result_a_al->{"fld_".$i."_data"}) > 0){
									?>
									<td><?php echo $result_a_al->{"fld_".$i."_txt"}; ?></td>
                                    <td><?php echo $result_a_al->{"fld_".$i."_data"}; ?></td>	
                                    <?php
								}
							}
							?>
                            </tr>
                            <?php
						}
						?></td>
                  </tr>
                  <?php
          }
          ?>
          </tbody>
          </table>
      </div>
  </div>
  </div>
  <script type="text/javascript">
	$(document).ready(function() {
		Unload();
	});
</script>