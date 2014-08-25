<a href="#" data-rel="back" data-role="button" data-theme="a" data-icon="delete" data-iconpos="notext" class="ui-btn-left">Close</a>
    <div data-role="header" data-tap-toggle="false">
        <h1>Association Details</h1>
    </div>
    <div data-role="content">
    <p>
	<?php
	
    $result_assocdets = $GLOBALS['result']->assoc_det_det;
	if(isset($result_assocdets->assoc_det_details)){
		if(count($result_assocdets->assoc_det_details) > 1){
			foreach($result_assocdets->assoc_det_details as $result_a_as){
				$array = array();  
				for($i=1;$i<=count($GLOBALS['result']->tag_txt->string);$i++){
                    if($i<10){
						if(isset($result_a_as->{"data_txt0$i"})) array_push($array, array($GLOBALS['result']->tag_txt->string[$i-1],$result_a_as->{"data_txt0$i"})); else array_push($array, array($GLOBALS['result']->tag_txt->string[$i-1]," "));
					}
					else{
						if(isset($result_a_as->{"data_txt$i"})) array_push($array, array($GLOBALS['result']->tag_txt->string[$i-1],$result_a_as->{"data_txt$i"}));	else array_push($array, array($GLOBALS['result']->tag_txt->string[$i-1]," "));
						
					}
				}
				?>
                <ul data-role="listview" data-count-theme="b" data-inset="true" data-filter="false">
				<?php
				foreach($array as $a){
					  ?>
					  <li>
						  <p><b><?php echo $a[0]; ?>:</b> <?php echo $a[1]; ?></p>
					  </li>
					  <?php
                }
				?>
                </ul>
                <?php
			}
			
		}
		elseif(count($result_assocdets->assoc_det_details) == 1){
			$result_a_as = $result_assocdets->assoc_det_details;
			$array = array();  
			for($i=1;$i<=count($GLOBALS['result']->tag_txt->string);$i++){
                if($i<10){
                    if(isset($result_a_as->{"data_txt0$i"})) array_push($array, array($GLOBALS['result']->tag_txt->string[$i-1],$result_a_as->{"data_txt0$i"})); else array_push($array, array($GLOBALS['result']->tag_txt->string[$i-1]," "));
                }
                else{
                    if(isset($result_a_as->{"data_txt$i"})) array_push($array, array($GLOBALS['result']->tag_txt->string[$i-1],$result_a_as->{"data_txt$i"}));	else array_push($array, array($GLOBALS['result']->tag_txt->string[$i-1]," "));
                    
                }
            }
			?>
            <ul data-role="listview" data-count-theme="b" data-inset="true" data-filter="false">
            <?php
			foreach($array as $a){
					  ?>
					  <li>
						  <p><b><?php echo $a[0]; ?>:</b> <?php echo $a[1]; ?></p>
					  </li>
					  <?php
            }
			?>
            </ul>
            <?php
		}
	}
    ?>
    <?php
    $number=0;
    ?>
    </P>
</div>
<script type="text/javascript">
	$(document).ready(function() {
		Unload();
	});
</script>