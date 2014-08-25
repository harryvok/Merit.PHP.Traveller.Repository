<br>
<div class="float-left">
  <div style="float:left;">
      <span class="summaryColumnTitle"  style="float:left; width:180px;">
      <div style="float:left;">Associations Details</div>
      </span>
  </div>
  <div id="association_det" style="float:left; width:100%; padding: 20px 20px 20px 20px;">
      <div style="margin-right: 40px;">
          <table id="filterTableJobs" class="sortable" title="" cellspacing="0">
          <thead>
          <tr>
          	  <?php
			  foreach($GLOBALS['result']->tag_txt->string as $title){
					?>
                    <th class="sortable"><?php echo $title; ?></th>
                    <?php  
			  }
			  ?>
          </tr>
          </thead>
          <tbody>
          <?php
          $number=0;
          $result_assocdets = $GLOBALS['result']->assoc_det_det;
          if(isset($result_assocdets->assoc_det_details) && count($result_assocdets->assoc_det_details) > 1){
              foreach($result_assocdets->assoc_det_details as $result_a_as){
				  $array = array();  
				  for($i=1;$i<=count($GLOBALS['result']->tag_txt->string);$i++){
					if($i<10){
						if(isset($result_a_as->{"data_txt0$i"})) array_push($array, $result_a_as->{"data_txt0$i"}); else array_push($array, " ");
					}
					else{
						if(isset($result_a_as->{"data_txt$i"})) array_push($array, $result_a_as->{"data_txt$i"});	else array_push($array, " ");
						
					}
				  }
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
                      	<?php
						foreach($array as $data){

						?>
                          <td><?php if(strlen($data) > 0){ echo $data; } else { echo "N/A"; } ?></td>
                          <?php
						}
						?>
                      </tr>
                      <?php
              }
          }
          elseif(isset($result_assocdets->assoc_det_details) && count($result_assocdets->assoc_det_details) == 1){
              $result_a_as = $result_assocdets->assoc_det_details;
			  $array = array();  
				  for($i=1;$i<=count($GLOBALS['result']->tag_txt->string);$i++){
                      if($i<10){
                          if(isset($result_a_as->{"data_txt0$i"})) array_push($array, $result_a_as->{"data_txt0$i"}); else array_push($array, " ");
                      }
                      else{
                          if(isset($result_a_as->{"data_txt$i"})) array_push($array, $result_a_as->{"data_txt$i"});	else array_push($array, " ");
                          
                      }
				  }
              ?>
                  <tr class="light_nocur" title="">
                          <?php
						foreach($array as $data){
						?>
                          <td><?php if(strlen($data) > 0){ echo $data; } else { echo "N/A"; } ?></td>
                          <?php
						}
						?>
                      </tr>
                  <?php
          }
          ?>
          </tbody>
          </table>
      </div>
  </div>
  
  <script type="text/javascript">
	$(document).ready(function() {
		Unload();
	});
</script>