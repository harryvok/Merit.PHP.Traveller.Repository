<span class="graytitle">Alias Details</span>
<ul class="pageitem">
	  <?php
      $number=0;
      $result_aliasdets = $GLOBALS['result']->alias_det_det;
      if(isset($result_aliasdets->alias_det_details) && count($result_aliasdets->alias_det_details) > 1){
          foreach($result_aliasdets->alias_det_details as $result_a_al){
              ?>
                  <li class="textbox">
                  	<b>Alias Ctr:</b> <?php echo $result_a_al->alias_ctr; ?>
                  </li>
                  <li class="textbox">
                    <b>Alias Type:</b> <?php echo $result_a_al->alias_type; ?>
                  </li>
                  <li class="textbox">
                    <b>Description:</b> <?php echo $result_a_al->alias_desc; ?>
                  </li>
                  <li class="textbox">
                    <b>Alias:</b> <?php echo $result_a_al->alias_txt; ?>
                  </li>
                  <?php
          }
      }
      elseif(isset($result_aliasdets->alias_det_details) && count($result_aliasdets->alias_det_details) == 1){
          $result_a_al = $result_aliasdets->alias_det_details;
          ?>
              <li class="textbox">
                  	<b>Alias Ctr:</b> <?php echo $result_a_al->alias_ctr; ?>
                  </li>
                  <li class="textbox">
                    <b>Alias Type:</b> <?php echo $result_a_al->alias_type; ?>
                  </li>
                  <li class="textbox">
                    <b>Description:</b> <?php echo $result_a_al->alias_desc; ?>
                  </li>
                  <li class="textbox">
                    <b>Alias:</b> <?php echo $result_a_al->alias_txt; ?>
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
