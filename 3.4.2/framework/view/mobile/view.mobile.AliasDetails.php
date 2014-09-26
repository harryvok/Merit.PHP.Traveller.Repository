<h4>Alias Details</h4>
<ul data-role="listview" data-count-theme="b" data-inset="true" data-filter="false">
	  <?php
      $number=0;
      $result_aliasdets = $GLOBALS['result']->alias_det_det;
      if(isset($result_aliasdets->alias_det_details) && count($result_aliasdets->alias_det_details) > 1){
          foreach($result_aliasdets->alias_det_details as $result_a_al){
              ?>
                  <li>
                  	<p><b>Alias Ctr:</b> <?php echo $result_a_al->alias_ctr; ?></p>
                  </li>
                  <li>
                    <p><b>Alias Type:</b> <?php echo $result_a_al->alias_type; ?></p>
                  </li>
                  <li>
                   <p> <b>Description:</b> <?php echo $result_a_al->alias_desc; ?></p>
                  </li>
                  <li>
                    <p><b>Alias:</b> <?php echo $result_a_al->alias_txt; ?></p>
                  </li>
                  <?php
          }
      }
      elseif(isset($result_aliasdets->alias_det_details) && count($result_aliasdets->alias_det_details) == 1){
          $result_a_al = $result_aliasdets->alias_det_details;
          ?>
              <li>
                  	<p><b>Alias Ctr:</b> <?php echo $result_a_al->alias_ctr; ?></p>
                  </li>
                  <li>
                    <p><b>Alias Type:</b> <?php echo $result_a_al->alias_type; ?></p>
                  </li>
                  <li>
                    <p><b>Description:</b> <?php echo $result_a_al->alias_desc; ?></p>
                  </li>
                  <li>
                    <p><b>Alias:</b> <?php echo $result_a_al->alias_txt; ?></p>
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
