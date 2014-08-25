<span class="graytitle">Associations Details</span>
<ul class="pageitem">
	<?php
	
    $result_assocdets = $GLOBALS['result']->assoc_det_det;
	if(isset($result_assocdets->assoc_det_details)){
		if(count($result_assocdets->assoc_det_details) > 1){
			foreach($result_assocdets->assoc_det_details as $result_a_as){
				$array = array();  
				for($i=0;$i<=count($GLOBALS['result']->tag_txt->string);$i++){
				  if($i!=10){
					  if(isset($result_a_as->{"data_txt0$i"}))
					  array_push($array, $result_a_as->{"data_txt0$i"});
				  }
				  else{
					  if(isset($result_a_as->{"data_txt$i"}))
					  array_push($array, $result_a_as->{"data_txt$i"});	
				  }
				}
				?>
				<ul class="pageitem">
				<?php
				for($i=0; $i <= count($GLOBALS['result']->tag_txt->string);$i++){
					if(isset($GLOBALS['result']->tag_txt->string[$i]) && strlen($GLOBALS['result']->tag_txt->string[$i]) > 0 && isset($array[$i]) && strlen($array[$i]) > 0){
					  ?>
					  <li class="textbox">
						  <b><?php echo $GLOBALS['result']->tag_txt->string[$i]; ?>:</b> <?php echo $array[$i]; ?>
					  </li>
					  <?php
					}
				}
				?>
				</ul>
                <hr />
                <?php
			}
			
		}
		elseif(count($result_assocdets->assoc_det_details) == 1){
			$result_a_as = $result_assocdets->assoc_det_details;
			$array = array();  
			for($i=0;$i<=count($GLOBALS['result']->tag_txt->string);$i++){
			  if($i!=10){
				  if(isset($result_a_as->{"data_txt0$i"}))
				  array_push($array, $result_a_as->{"data_txt0$i"});
			  }
			  else{
				  if(isset($result_a_as->{"data_txt$i"}))
				  array_push($array, $result_a_as->{"data_txt$i"});	
			  }
			}
			?>
            <ul class="pageitem">
            <?php
			for($i=0; $i <= count($GLOBALS['result']->tag_txt->string);$i++){
				if(isset($GLOBALS['result']->tag_txt->string[$i]) && strlen($GLOBALS['result']->tag_txt->string[$i]) > 0 && isset($array[$i]) && strlen($array[$i]) > 0){
				  ?>
				  <li class="textbox">
					  <b><?php echo $GLOBALS['result']->tag_txt->string[$i]; ?>:</b> <?php echo $array[$i]; ?>
				  </li>
				  <?php
				}
			}
			?>
            </ul>
            <?php
		}
	}
    ?>
    </tr>
    <?php
    $number=0;
    ?>
</ul>
<script type="text/javascript">
	$(document).ready(function() {
		Unload();
	});
</script>