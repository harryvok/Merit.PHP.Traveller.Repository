
<div class="margin-right">
    <div class="view-request" id="test">
     <div class="margin-right">
        <div class="float-left" style="width:100%;"><h5>Address Details</h5></div>
        <div class="column quarter">
            <span class="request-column-title">Unit/Flat Number</span>
            <div class="request-column"><?php if(isset($GLOBALS['result']->house_number)) echo $GLOBALS['result']->house_number; ?></div>
        </div>
        <div class="column quarter">
            <span class="request-column-title">House Number</span>
            <div class="request-column"><?php if(isset($GLOBALS['result']->house_suffix)) echo $GLOBALS['result']->house_suffix; ?></div>
        </div>
        <div class="column quarter">
            <span class="request-column-title">Property No.</span>
            <div class="request-column"><?php if(isset($GLOBALS['result']->property_no)) echo $GLOBALS['result']->property_no; ?></div>
        </div>
        <div class="float-left">
          <div class="column half">
           <span class="request-column-title">Street</span>
                <div class="request-column">
                    <?php if(isset($GLOBALS['result']->street_name)) echo $GLOBALS['result']->street_name; ?>
                </div>
            </div>
            <div class="column half"> 
                <span class="request-column-title">Type</span>
                <div class="request-column">
                    <?php if(isset($GLOBALS['result']->street_type)) echo $GLOBALS['result']->street_type; ?>
                </div>
          </div>
      </div>
      <div class="float-left">
          <div class="column half">
           <span class="request-column-title">Suburb</span>
            <div class="request-column">
              <?php if(isset($GLOBALS['result']->locality)) echo $GLOBALS['result']->locality; ?>
                </div>
            </div>
            <div class="column half"> 
                <span class="request-column-title">Postcode</span>
                <div class="request-column">
                    <?php if(isset($GLOBALS['result']->postcode)) echo $GLOBALS['result']->postcode; ?>
                </div>
          </div>
      </div>
      <div class="float-left">
          <div class="column half">
           <span class="request-column-title">Area Group</span>
            <div class="request-column">
              <?php if(isset($GLOBALS['result']->area_group)) echo $GLOBALS['result']->area_group; ?>
                </div>
            </div>
            <div class="column half"> 
                <span class="request-column-title">Confidential?</span>
                <div class="request-column">
                    <?php if(isset($GLOBALS['result']->confidential)) echo $GLOBALS['result']->confidential; ?>
                </div>
          </div>
      </div>
      <div class="float-left">
          <div class="column half">
               <span class="request-column-title">Municipality</span>
                <div class="request-column">
                  <?php if(isset($GLOBALS['result']->municipality)) echo $GLOBALS['result']->municipality; ?>
                </div>
          </div>
          <div class="column half">
                <div class="column quarter"> 
                    <span class="request-column-title">Melway Ref</span>
                    <div class="request-column">
                        <?php if(isset($GLOBALS['result']->melway_ref)){ echo $GLOBALS['result']->melway_ref; } ?>
                    </div>
              </div>
              <div class="column quarter"> 
                    <span class="request-column-title">Melway Map</span>
                    <div class="request-column">
                        <?php if(isset($GLOBALS['result']->melway_map)){ echo $GLOBALS['result']->melway_map; } ?>
                    </div>
              </div>
          </div>
      </div>
     <div class="float-left">   
     <?php
	 if(defined("INTRAMAPS") && strlen(INTRAMAPS) > 0){
		 ?>
         <span class="request-column-title">Intramaps</span>   
         <iframe width="425" height="450" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="<?php echo INTRAMAPS; ?><?php if(isset($GLOBALS['result']->mapkey)) echo $GLOBALS['result']->mapkey; ?>"></iframe><br /><small>
         <script type="text/javascript">
		 $("iframe").css("width", $("#test").css('width'));
		 </script>
         <a href="<?php echo INTRAMAPS; ?><?php if(isset($GLOBALS['result']->mapkey)) echo $GLOBALS['result']->mapkey; ?>" style="color:#0000FF;text-align:left" target="_blank">View Larger Map</a></small>
     </div>
         <?php
	 }
	 else{
	 ?>
     <span class="request-column-title">Google Map</span>   
         <iframe width="425" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com.au/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=<?php echo $GLOBALS['result']->house_number; ?>+<?php echo $GLOBALS['result']->street_name; ?>+<?php echo $GLOBALS['result']->street_type; ?>+<?php echo $GLOBALS['result']->locality; ?>+<?php echo $GLOBALS['result']->postcode; ?>&amp;aq=&amp;sll=&amp;sspn=&amp;ie=UTF8&amp;hq=&amp;hnear=<?php echo $GLOBALS['result']->house_number; ?>+<?php echo $GLOBALS['result']->street_name; ?>+<?php echo $GLOBALS['result']->street_type; ?>,+<?php echo $GLOBALS['result']->locality; ?>+<?php echo $GLOBALS['result']->postcode; ?>&amp;ll=&amp;spn=&amp;t=m&amp;z=14&amp;output=embed"></iframe><br /><small><a href="http://maps.google.com.au/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=<?php echo $GLOBALS['result']->house_number; ?>+<?php echo $GLOBALS['result']->street_name; ?>+<?php echo $GLOBALS['result']->street_type; ?>+<?php echo $GLOBALS['result']->locality; ?>+<?php echo $GLOBALS['result']->postcode; ?>&amp;aq=&amp;sll=&amp;sspn=&amp;ie=UTF8&amp;hq=&amp;hnear=<?php echo $GLOBALS['result']->house_number; ?>+<?php echo $GLOBALS['result']->street_name; ?>+<?php echo $GLOBALS['result']->street_type; ?>,+<?php echo $GLOBALS['result']->locality; ?>+<?php echo $GLOBALS['result']->postcode; ?>&amp;ll=&amp;spn=&amp;t=m&amp;z=14" style="color:#0000FF;text-align:left" target="_blank">View Larger Map</a></small>
     </div>
     <?php
	 }
	 ?>
        </div>
</div>
</div>
<div id="push"><p>&nbsp;</p></div>
<?php
if(isset($GLOBALS['result']->fac_dets->facility_details) && count($GLOBALS['result']->fac_dets->facility_details) > 0){
	?>
    <div class="view-request">
        <h5>Facility Details</h5>
        <?php
		if(isset($GLOBALS['result']->fac_dets->facility_details) && count($GLOBALS['result']->fac_dets->facility_details) > 1){
			echo "There are <strong>".count($GLOBALS['result']->fac_dets->facility_details)."</strong> facilities.<br />";
			$i=1;
			foreach($GLOBALS['result']->fac_dets->facility_details as $facility){
				?>
				<div class="column half"> 
				<span class="request-column-title">Facility Name</span>
				<div class="request-column" style="width:100%;">
				  <?php if(isset($facility->facility_name)) echo $facility->facility_name; ?>
				</div>
                </div>
                <div class="column half"> 
				<span class="request-column-title">Facility Type</span>
				<div class="request-column" style="width:100%;">
				  <?php if(isset($facility->facility_type)){ echo $facility->facility_type; } ?>
				</div>
                </div>
                <div class="float-left"> 
				<span class="request-column-title">Facility Description</span>
				<div class="request-column" style="width:100%;">
				  <?php if(isset($facility->facility_desc)){ echo $facility->facility_desc; } ?>
                  
				</div>
                <?php if($i != count($GLOBALS['result']->fac_dets->facility_details)){ ?><hr /><?php }?>
                </div>
                
                
				<?php
				$i++;
			}
		}
		elseif(isset($GLOBALS['result']->fac_dets->facility_details) && count($GLOBALS['result']->fac_dets->facility_details) == 1){
			$facility = $GLOBALS['result']->fac_dets->facility_details;
			?>
            <div class="column half"> 
				<span class="request-column-title">Facility Name</span>
				<div class="request-column" style="width:100%;">
				  <?php if(isset($facility->facility_name)) echo $facility->facility_name; ?>
				</div>
                </div>
                <div class="column half"> 
				<span class="request-column-title">Facility Type</span>
				<div class="request-column" style="width:100%;">
				  <?php if(isset($facility->facility_type)){ echo $facility->facility_type; } ?>
				</div>
                </div>
                <div class="float-left"> 
				<span class="request-column-title">Facility Description</span>
				<div class="request-column" style="width:100%;">
				  <?php if(isset($facility->facility_desc)){ echo $facility->facility_desc; } ?>
				</div>
                </div>
            <?php
		}
		else{
			echo "No facilities found";	
		}
		?>
     </div>
     <?php
}
?>
</div>

<div id="push"><p>&nbsp;</p></div>
    <div class="view-request">
        <h5>Road Details</h5>
        <span class="request-column-title">Type</span>
        <div class="request-column" style="width:100%;">
          <?php if(isset($GLOBALS['result']->road_type)) echo $GLOBALS['result']->road_type; ?>
        </div>
        <span class="request-column-title">Responsibility</span>
        <div class="request-column" style="width:100%;">
          <?php if(isset($GLOBALS['result']->responsibility)){ echo $GLOBALS['result']->responsibility; } ?>
        </div>
        
     </div>
</div>
 