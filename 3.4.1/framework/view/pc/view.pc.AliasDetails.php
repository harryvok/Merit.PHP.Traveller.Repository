<br>
<div class="float-left">
  <div style="float:left;">
      <span class="summaryColumnTitle"  style="float:left; width:180px;">
      <div style="float:left;">Alias Details</div>
      </span>
  </div>
  <div id="alias_det" style="float:left; width:100%; padding: 20px 20px 20px 20px;">
      <div style="margin-right: 40px;">
          <table id="filterTableJobs" class="" title="" cellspacing="0">
          <thead>
          <tr>
          	  <th class="sortable">Alias Ctr</th>
              <th class="sortable">Alias Type</th>
              <th class="description sortable">Description</th>
              <th class="sortable">Alias</th>
          </tr>
          </thead>
          <tbody>
          <?php
          $number=0;
          $result_aliasdets = $GLOBALS['result']->alias_det_det;
          if(isset($result_aliasdets->alias_det_details) && count($result_aliasdets->alias_det_details) > 1){
              foreach($result_aliasdets->alias_det_details as $result_a_al){
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
                          <td><?php echo $result_a_al->alias_ctr; ?></td>
                          <td><?php echo $result_a_al->alias_type; ?></td>
                          <td><?php echo $result_a_al->alias_desc; ?></td>
                          <td><?php echo $result_a_al->alias_txt; ?></td>
                      </tr>
                      <?php
              }
          }
          elseif(isset($result_aliasdets->alias_det_details) && count($result_aliasdets->alias_det_details) == 1){
              $result_a_al = $result_aliasdets->alias_det_details;
              ?>
                  <tr class="light_nocur" title="">
                          <td><?php echo $result_a_al->alias_ctr; ?></td>
                          <td><?php echo $result_a_al->alias_type; ?></td>
                          <td><?php echo $result_a_al->alias_desc; ?></td>
                          <td><?php echo $result_a_al->alias_txt; ?></td>
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