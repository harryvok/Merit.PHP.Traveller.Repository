
<ul class="no-ellipses" data-role="listview" data-inset="true" data-divider-theme="d">
  	<li data-role="list-divider">Address Details</li>
        <li>
            <p><strong>Unit/Flat Number:</strong> <?php if(isset($GLOBALS['result']->house_number) && isset($GLOBALS['result']->house_suffix) && $GLOBALS['result']->house_suffix != $GLOBALS['result']->house_number && strpos($GLOBALS['result']->house_suffix, "-") == false && !ctype_alnum($GLOBALS['result']->house_suffix)){ $flat = explode("/", $GLOBALS['result']->house_suffix); echo $flat[0]; } ?></p> 
        </li>
        <li>
            <p><strong>House Number:</strong> <?php if(isset($GLOBALS['result']->house_suffix) && strpos($GLOBALS['result']->house_suffix, "-") !== false || ctype_alnum($GLOBALS['result']->house_suffix)) echo $GLOBALS['result']->house_suffix; else echo $GLOBALS['result']->house_number; ?></p>
        </li>
        <li>
            <p><strong>Property Number:</strong> <?php echo $GLOBALS['result']->property_no; ?></p>
        </li>
        <li>
            <p><strong>Street:</strong> <?php echo $GLOBALS['result']->street_name; ?></p>
        </li>
        <li>
            <p><strong>Type:</strong> <?php echo $GLOBALS['result']->street_type; ?></p>
        </li>
        <li>
            <p><strong>Suburb:</strong> <?php echo $GLOBALS['result']->locality; ?></p>
        </li>
        <li>
            <p><strong>Postcode:</strong> <?php echo $GLOBALS['result']->postcode; ?></p>
        </li>
        <li>
            <p><strong>Area Group:</strong> <?php echo $GLOBALS['result']->area_group; ?></p>
        </li>
     </ul>
     
     <?php
     if(defined("INTRAMAPS_MOBILE") && strlen(INTRAMAPS_MOBILE) > 0){
                 ?>
                 <b>Intramaps</b> <br />
                 
                 <iframe width="300" height="300" frameborder="0" scrolling="yes" marginheight="0" marginwidth="0" src="<?php echo INTRAMAPS_MOBILE; ?><?php if(isset($GLOBALS['result']->mapkey)) echo $GLOBALS['result']->mapkey; ?>"></iframe><br /><small>
                 <script type="text/javascript">
		 $("iframe").css("width", $("#contentBox").css('width'));
		 </script>
                 <a href=<?php echo INTRAMAPS_MOBILE; ?><?php if(isset($GLOBALS['result']->mapkey)) echo $GLOBALS['result']->mapkey; ?>" style="color:#0000FF;text-align:left" target="_blank">View Larger Map</a></small>
             <br><br>
                 <?php
     }
     else{
             ?>
             	<b>Google Map:</b> <br /> <iframe width="300" height="300" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com.au/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=<?php if(isset($GLOBALS['result']->house_number) && isset($GLOBALS['result']->house_suffix) && $GLOBALS['result']->house_suffix != $GLOBALS['result']->house_number){ echo $GLOBALS['result']->house_suffix; } elseif(isset($GLOBALS['result']->house_number)){ echo $GLOBALS['result']->house_number; } ?>+<?php echo $GLOBALS['result']->street_name; ?>+<?php echo $GLOBALS['result']->street_type; ?>+<?php echo $GLOBALS['result']->locality; ?>+<?php echo $GLOBALS['result']->postcode; ?>&amp;aq=&amp;sll=&amp;sspn=&amp;ie=UTF8&amp;hq=&amp;hnear=<?php echo $GLOBALS['result']->house_suffix; ?>+<?php echo $GLOBALS['result']->street_name; ?>+<?php echo $GLOBALS['result']->street_type; ?>,+<?php echo $GLOBALS['result']->locality; ?>+<?php echo $GLOBALS['result']->postcode; ?>&amp;ll=&amp;spn=&amp;t=m&amp;z=14&amp;output=embed"></iframe><br /><small><a href="http://maps.google.com.au/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=<?php echo $GLOBALS['result']->house_suffix; ?>+<?php echo $GLOBALS['result']->street_name; ?>+<?php echo $GLOBALS['result']->street_type; ?>+<?php echo $GLOBALS['result']->locality; ?>+<?php echo $GLOBALS['result']->postcode; ?>&amp;aq=&amp;sll=&amp;sspn=&amp;ie=UTF8&amp;hq=&amp;hnear=<?php echo $GLOBALS['result']->house_suffix; ?>+<?php echo $GLOBALS['result']->street_name; ?>+<?php echo $GLOBALS['result']->street_type; ?>,+<?php echo $GLOBALS['result']->locality; ?>+<?php echo $GLOBALS['result']->postcode; ?>&amp;ll=&amp;spn=&amp;t=m&amp;z=14" style="color:#0000FF;text-align:left" target="_blank">View Larger Map</a></small>
                 <script type="text/javascript">
		 $("iframe").css("width", $("#contentBox").css('width'));
		 </script>
                 <br><br>
             <?php
     }
             ?>
             
           <ul data-role="listview" data-inset="true" data-divider-theme="d">
        <?php
        if(isset($GLOBALS['result']->fac_dets->facility_details) && count($GLOBALS['result']->fac_dets->facility_details) > 0){
	?>
    <li data-role="list-divider">Facility Details</li>
    <?php
            if(isset($GLOBALS['result']->fac_dets->facility_details) && count($GLOBALS['result']->fac_dets->facility_details) > 1){
                echo "There are <strong>".count($GLOBALS['result']->fac_dets->facility_details)."</strong> facilities.<br />";
                $i=1;
                foreach($GLOBALS['result']->fac_dets->facility_details as $facility){
				?>
                <li>
                    <p><strong>Name:</strong> <?php if(isset($facility->facility_name)) echo $facility->facility_name; ?></p>
                </li>
                <li>
                    <p><strong>Type:</strong> <?php if(isset($facility->facility_type)){ echo $facility->facility_type; } ?></p>
                </li>
                <li class="textbox">
                    <p><strong>Description:</strong> <?php if(isset($facility->facility_desc)){ echo $facility->facility_desc; } ?></p>
                </li>
                 <?php if($i != count($GLOBALS['result']->fac_dets->facility_details)){ ?><hr /><?php }?>
				<?php
                    $i++;
                }
            }
            elseif(isset($GLOBALS['result']->fac_dets->facility_details) && count($GLOBALS['result']->fac_dets->facility_details) == 1){
                $facility = $GLOBALS['result']->fac_dets->facility_details;
			?>
            <li>
                    <p><strong>Name:</strong> <?php if(isset($facility->facility_name)) echo $facility->facility_name; ?></p>
                </li>
                <li>
                    <p><strong>Type:</strong> <?php if(isset($facility->facility_type)){ echo $facility->facility_type; } ?></p>
                </li>
                <li class="textbox">
                   <p><strong>Description:</strong> <?php if(isset($facility->facility_desc)){ echo $facility->facility_desc; } ?></p>
                </li>
            <?php
            }
        }
		?>
        
    <li data-role="list-divider">Road Details</li>
        <li>
            <p><strong>Type:</strong> <br /> <?php echo $GLOBALS['result']->road_type; ?></p>
        </li>
        <li>
            <p><strong>Responsibility:</strong> <br /> <?php echo $GLOBALS['result']->road_responsibility; ?></p>
        </li>
    </ul>
