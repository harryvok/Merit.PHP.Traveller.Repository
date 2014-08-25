<span class="graytitle">
    <b><?php if(isset($GLOBALS['result']->house_suffix) && strlen($GLOBALS['result']->house_suffix) > 0){ echo $GLOBALS['result']->house_suffix; } else { echo $GLOBALS['result']->house_number; } ?> <?php echo $GLOBALS['result']->street_name; ?> <?php echo $GLOBALS['result']->street_type; ?> <?php echo $GLOBALS['result']->locality; ?> <?php echo $GLOBALS['result']->postcode; ?></b>
</span>
<ul class="pageitem">
    <span class="graytitle">Address Details</span>
    <ul class="pageitem">
        <li class="textbox">
            <b>House Number:</b> <?php echo $GLOBALS['result']->house_number; ?> 
        </li>
        <li class="textbox">
            <b>Street Number:</b> <?php if(isset($GLOBALS['result']->house_suffix)){ echo $GLOBALS['result']->house_suffix; } ?>
        </li>
        <li class="textbox">
            <b>Property Number:</b> <?php echo $GLOBALS['result']->property_no; ?>
        </li>
        <li class="textbox">
            <b>Street:</b> <?php echo $GLOBALS['result']->street_name; ?>
        </li>
        <li class="textbox">
            <b>Type:</b> <?php echo $GLOBALS['result']->street_type; ?>
        </li>
        <li class="textbox">
            <b>Suburb:</b> <?php echo $GLOBALS['result']->locality; ?>
        </li>
        <li class="textbox">
            <b>Postcode:</b> <?php echo $GLOBALS['result']->postcode; ?>
        </li>
        <li class="textbox">
            <b>Area Group:</b> <?php echo $GLOBALS['result']->area_group; ?>
        </li>
        <li class="textbox">
            <b>Municipality:</b> <?php echo $GLOBALS['result']->municipality; ?>
        </li>
        <li class="textbox">
            <b>Melway Map:</b> <?php if(isset($GLOBALS['result']->melway_map)){ echo $GLOBALS['result']->melway_map; } ?>
        </li>
        <li class="textbox">
            <b>Melway Ref:</b> <?php if(isset($GLOBALS['result']->melway_ref)){ echo $GLOBALS['result']->melway_ref; } ?>
        </li>
        <li class="textbox">
            <b>Confidential?:</b> <?php echo $GLOBALS['result']->confidential; ?>
        </li>
    <br />
    </ul>
    </ul>
    <?php
    if(defined("INTRAMAPS_MOBILE") && strlen(INTRAMAPS_MOBILE) > 0){
                 ?>
                 <b>Intramaps</b> <br />
                 
                 <iframe width="300" height="300" frameborder="0" scrolling="yes" marginheight="0" marginwidth="0" src="<?php echo INTRAMAPS_MOBILE; ?><?php if(isset($GLOBALS['result']->mapkey)) echo $GLOBALS['result']->mapkey; ?>"></iframe><br /><small>
                 <script type="text/javascript">
		 $("iframe").css("width", $("#wrapper").css('width'));
		 </script>
                 <a href="<?php echo INTRAMAPS_MOBILE; ?><?php if(isset($GLOBALS['result']->mapkey)) echo $GLOBALS['result']->mapkey; ?>" style="color:#0000FF;text-align:left" target="_blank">View Larger Map</a></small>
             <br><br>
                 <?php
    }
    else{
             ?>
             	<b>Google Map:</b> <br /> <iframe width="300" height="300" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com.au/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=<?php echo $GLOBALS['result']->house_number; ?>+<?php echo $GLOBALS['result']->street_name; ?>+<?php echo $GLOBALS['result']->street_type; ?>+<?php echo $GLOBALS['result']->locality; ?>+<?php echo $GLOBALS['result']->postcode; ?>&amp;aq=&amp;sll=&amp;sspn=&amp;ie=UTF8&amp;hq=&amp;hnear=<?php echo $GLOBALS['result']->house_number; ?>+<?php echo $GLOBALS['result']->street_name; ?>+<?php echo $GLOBALS['result']->street_type; ?>,+<?php echo $GLOBALS['result']->locality; ?>+<?php echo $GLOBALS['result']->postcode; ?>&amp;ll=&amp;spn=&amp;t=m&amp;z=14&amp;output=embed"></iframe><br /><small><a href="http://maps.google.com.au/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=<?php echo $GLOBALS['result']->house_number; ?>+<?php echo $GLOBALS['result']->street_name; ?>+<?php echo $GLOBALS['result']->street_type; ?>+<?php echo $GLOBALS['result']->locality; ?>+<?php echo $GLOBALS['result']->postcode; ?>&amp;aq=&amp;sll=&amp;sspn=&amp;ie=UTF8&amp;hq=&amp;hnear=<?php echo $GLOBALS['result']->house_number; ?>+<?php echo $GLOBALS['result']->street_name; ?>+<?php echo $GLOBALS['result']->street_type; ?>,+<?php echo $GLOBALS['result']->locality; ?>+<?php echo $GLOBALS['result']->postcode; ?>&amp;ll=&amp;spn=&amp;t=m&amp;z=14" style="color:#0000FF;text-align:left" target="_blank">View Larger Map</a></small>
                 <script type="text/javascript">
		 $("iframe").css("width", $("#wrapper").css('width'));
		 </script>
                 <br><br>
             <?php
    }
             ?>
             
             <ul class="pageitem">
    <?php
	if(isset($GLOBALS['result']->fac_dets->facility_details) && count($GLOBALS['result']->fac_dets->facility_details) > 0){
	?>
    <span class="graytitle">Facility Details</span>
    <ul class="pageitem">
    <?php
		if(isset($GLOBALS['result']->fac_dets->facility_details) && count($GLOBALS['result']->fac_dets->facility_details) > 1){
			echo "<li class='textbox'>There are <strong>".count($GLOBALS['result']->fac_dets->facility_details)."</strong> facilities.</li>";
			$i=1;
			foreach($GLOBALS['result']->fac_dets->facility_details as $facility){
				?>
                <li class="textbox">
                    <b>Name:</b> <?php if(isset($facility->facility_name)) echo $facility->facility_name; ?>
                </li>
                <li class="textbox">
                    <b>Type:</b> <?php if(isset($facility->facility_type)){ echo $facility->facility_type; } ?>
                </li>
                <li class="textbox">
                    <b>Description:</b> <?php if(isset($facility->facility_desc)){ echo $facility->facility_desc; } ?>
                </li>
                 <?php if($i != count($GLOBALS['result']->fac_dets->facility_details)){ ?><hr /><?php }?>
				<?php
				$i++;
			}
		}
		elseif(isset($GLOBALS['result']->fac_dets->facility_details) && count($GLOBALS['result']->fac_dets->facility_details) == 1){
			$facility = $GLOBALS['result']->fac_dets->facility_details;
			?>
            <li class="textbox">
                    <b>Name:</b> <?php if(isset($facility->facility_name)) echo $facility->facility_name; ?>
                </li>
                <li class="textbox">
                    <b>Type:</b> <?php if(isset($facility->facility_type)){ echo $facility->facility_type; } ?>
                </li>
                <li class="textbox">
                    <b>Description:</b> <?php if(isset($facility->facility_desc)){ echo $facility->facility_desc; } ?>
                </li>
            <?php
		}
		else{
			echo "No facilities found";	
		}
		?>
    </ul>
	<?php
	}
	?>
    <span class="graytitle">Road Details</span>
    <ul class="pageitem">
        <li class="textbox">
            <b>Type:</b> <br /> <?php echo $GLOBALS['result']->road_type; ?>
        </li>
        <li class="textbox">
            <b>Responsibility:</b> <br /> <?php echo $GLOBALS['result']->road_responsibility; ?>
        </li>
    </ul>
</ul>
</ul>