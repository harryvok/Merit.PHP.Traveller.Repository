<div class="summaryContainer">
    
    
    <script type="text/javascript">

        $(document).ready(function () {
            /* What to parse with regEx */
            var tocheck = $('#placeholder').val();

            /* Parse to variables */
            var prefixOut = tocheck.match(/(\D{0,7})\s?(\d{0,5})\s?-?\s?(\d{0,5})\s?(\D{0,1})\s?[/]?\s?(\d{0,5})\s?-?\s?(\d{0,5})\s?(\D{0,1})$/)[1];
            var unitFromOut = tocheck.match(/(\D{0,7})\s?(\d{0,5})\s?-?\s?(\d{0,5})\s?(\D{0,1})\s?[/]?\s?(\d{0,5})\s?-?\s?(\d{0,5})\s?(\D{0,1})$/)[2];
            var unitToOut = tocheck.match(/(\D{0,7})\s?(\d{0,5})\s?-?\s?(\d{0,5})\s?(\D{0,1})\s?[/]?\s?(\d{0,5})\s?-?\s?(\d{0,5})\s?(\D{0,1})$/)[3];
            var unitCodeOut = tocheck.match(/(\D{0,7})\s?(\d{0,5})\s?-?\s?(\d{0,5})\s?(\D{0,1})\s?[/]?\s?(\d{0,5})\s?-?\s?(\d{0,5})\s?(\D{0,1})$/)[4];
            var streetFromOut = tocheck.match(/(\D{0,7})\s?(\d{0,5})\s?-?\s?(\d{0,5})\s?(\D{0,1})\s?[/]?\s?(\d{0,5})\s?-?\s?(\d{0,5})\s?(\D{0,1})$/)[5];
            var streetToOut = tocheck.match(/(\D{0,7})\s?(\d{0,5})\s?-?\s?(\d{0,5})\s?(\D{0,1})\s?[/]?\s?(\d{0,5})\s?-?\s?(\d{0,5})\s?(\D{0,1})$/)[6];
            var streetCodeOut = tocheck.match(/(\D{0,7})\s?(\d{0,5})\s?-?\s?(\d{0,5})\s?(\D{0,1})\s?[/]?\s?(\d{0,5})\s?-?\s?(\d{0,5})\s?(\D{0,1})$/)[7];
            alert(prefixOut);

            /* Catch exceptions */
            var unitNumber = "";
            var streetNumber = "";

            var trimmed = $.trim(prefixOut);
            /* Catch PO or DX */
            if (trimmed == "PO Box:" || trimmed == "DX:") {
                var poboxNumb = prefixOut + " " + unitFromOut + " " + unitCodeOut;
                $('#postOfficeBox').html(poboxNumb);
            } else {

                /* If prefix is empty */
                if (prefixOut == "") {

                    /* Set Unit values to Street values */
                    if (streetFromOut == "") {
                        streetFromOut = unitFromOut;
                        streetToOut = unitToOut;
                        streetCodeOut = unitCodeOut;
                        unitFromOut = "";
                        unitToOut = "";
                        unitCodeOut = "";
                    }
                }

                /* So "-"'s aren't added to empty fields */
                if (unitFromOut != "") {
                    if (unitToOut != "") {
                        unitNumber = unitFromOut + '-' + unitToOut;
                    }
                    else {
                        unitNumber = unitFromOut;
                    }
                }
                if (streetFromOut != "") {
                    if (streetToOut != "") {
                        streetNumber = streetFromOut + '-' + streetToOut;
                    }
                    else {
                        streetNumber = streetFromOut;
                    }
                }

                /* If no unit code the regEx will take this "/" from string, clear it */
                if (unitCodeOut == "/") {
                    unitCodeOut = "";
                }

                /* Create the Strings to feed into output */
                unitNumber = unitNumber + unitCodeOut;
                streetNumber = streetNumber + streetCodeOut;

            }

            $('#unitFlatNumber').html(unitNumber);
            $('#streetHouseNumber').html(streetNumber);
        });
    </script>
    
    
    
    
    
    
    
    
    
    
    
    <h1>Address Details</h5>
        <div>
            <div class="float-left">
                <div class="column r15">
                    <input type="hidden" id="placeholder" value="<?php echo $GLOBALS['result']->house_suffix ?>"/>
                    <span class="summaryColumnTitle">Unit/Flat Number</span>
                    <div class="summaryColumn" id="unitFlatNumber"></div>
                </div>
                <div class="column r15">
                    <span class="summaryColumnTitle">Street Number</span>
                    <div class="summaryColumn" id="streetHouseNumber"></div>
                </div>
                <div class="column r15">
                    <span class="summaryColumnTitle">PO / DX Box</span>
                    <div class="summaryColumn" id="postOfficeBox"></div>
                </div>
            </div>
            <div class="float-left">
                <div class="column r15">
                    <span class="summaryColumnTitle">Street</span>
                    <div class="summaryColumn">
                        <?php if(isset($GLOBALS['result']->street_name)) echo $GLOBALS['result']->street_name; ?>
                    </div>
                </div>
                <div class="column r15">
                    <span class="summaryColumnTitle">Type</span>
                    <div class="summaryColumn">
                        <?php if(isset($GLOBALS['result']->street_type)) echo $GLOBALS['result']->street_type; ?>
                    </div>
                </div>
                <div class="column r15">
                    <span class="summaryColumnTitle">Suburb</span>
                    <div class="summaryColumn">
                        <?php if(isset($GLOBALS['result']->locality)) echo $GLOBALS['result']->locality; ?>
                    </div>
                </div>
                <div class="column r15">
                    <span class="summaryColumnTitle">Postcode</span>
                    <div class="summaryColumn">
                        <?php if(isset($GLOBALS['result']->postcode)) echo $GLOBALS['result']->postcode; ?>
                    </div>
                </div>
            </div>
            <div class="float-left">
                <div class="column r15">
                    <span class="summaryColumnTitle">Area Group</span>
                    <div class="summaryColumn">
                        <?php if(isset($GLOBALS['result']->area_group)) echo $GLOBALS['result']->area_group; ?>
                    </div>
                </div>
                <div class="column r15">
                    <span class="summaryColumnTitle">Property No.</span>
                    <div class="summaryColumn"><?php if(isset($GLOBALS['result']->property_no)) echo $GLOBALS['result']->property_no; ?></div>
                </div>
                <div class="column r15">
                    <span class="summaryColumnTitle">X Coord</span>
                    <div class="summaryColumn"><?php if(isset($GLOBALS['result']->gis_x_coord)) echo $GLOBALS['result']->gis_x_coord; ?></div>
                </div>
                <div class="column r15">
                    <span class="summaryColumnTitle">Y Coord</span>
                    <div class="summaryColumn"><?php if(isset($GLOBALS['result']->gis_y_coord)) echo $GLOBALS['result']->gis_y_coord; ?></div>
                </div>
            </div>
            <div class="float-left">
                <?php
                if(defined("INTRAMAPS") && strlen(INTRAMAPS) > 0){
                ?>
                <span class="summaryColumnTitle">Intramaps</span>
                <iframe width="425" height="450" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="<?php echo INTRAMAPS; ?><?php if(isset($GLOBALS['result']->mapkey)) echo $GLOBALS['result']->mapkey; ?>"></iframe>
                <br />
                <small>
                    <script type="text/javascript">
                        $("iframe").css("width", $("#test").css('width'));
                    </script>
                    <a href="<?php echo INTRAMAPS; ?><?php if(isset($GLOBALS['result']->mapkey)) echo $GLOBALS['result']->mapkey; ?>" style="color:#0000FF;text-align:left" target="_blank">View Larger Map</a></small>
            </div>
            <?php
                }
                else{
            ?>
            <span class="summaryColumnTitle">Google Map</span>
            <iframe width="425" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com.au/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=<?php if(isset($GLOBALS['result']->house_number) && isset($GLOBALS['result']->house_suffix) && $GLOBALS['result']->house_suffix != $GLOBALS['result']->house_number){ echo $GLOBALS['result']->house_suffix; } elseif(isset($GLOBALS['result']->house_number)){ echo $GLOBALS['result']->house_number; } ?>+<?php echo $GLOBALS['result']->street_name; ?>+<?php echo $GLOBALS['result']->street_type; ?>+<?php echo $GLOBALS['result']->locality; ?>+<?php echo $GLOBALS['result']->postcode; ?>&amp;aq=&amp;sll=&amp;sspn=&amp;ie=UTF8&amp;hq=&amp;hnear=<?php echo $GLOBALS['result']->house_suffix; ?>+<?php echo $GLOBALS['result']->street_name; ?>+<?php echo $GLOBALS['result']->street_type; ?>,+<?php echo $GLOBALS['result']->locality; ?>+<?php echo $GLOBALS['result']->postcode; ?>&amp;ll=&amp;spn=&amp;t=m&amp;z=14&amp;output=embed"></iframe>
            <br />
            <small><a href="http://maps.google.com.au/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=<?php echo $GLOBALS['result']->house_suffix; ?>+<?php echo $GLOBALS['result']->street_name; ?>+<?php echo $GLOBALS['result']->street_type; ?>+<?php echo $GLOBALS['result']->locality; ?>+<?php echo $GLOBALS['result']->postcode; ?>&amp;aq=&amp;sll=&amp;sspn=&amp;ie=UTF8&amp;hq=&amp;hnear=<?php echo $GLOBALS['result']->house_suffix; ?>+<?php echo $GLOBALS['result']->street_name; ?>+<?php echo $GLOBALS['result']->street_type; ?>,+<?php echo $GLOBALS['result']->locality; ?>+<?php echo $GLOBALS['result']->postcode; ?>&amp;ll=&amp;spn=&amp;t=m&amp;z=14" style="color:#0000FF;text-align:left" target="_blank">View Larger Map</a></small>
        </div>
    <?php
                }
    ?>
</div>
</div>
</div>
<div id="push">
    <p>&nbsp;</p>
</div>
<?php
if(isset($GLOBALS['result']->fac_dets->facility_details) && count($GLOBALS['result']->fac_dets->facility_details) > 0){
?>
<div class="summaryContainer">
    <h1>Facility Details</h5>
        <div>
            <?php
    if(isset($GLOBALS['result']->fac_dets->facility_details) && count($GLOBALS['result']->fac_dets->facility_details) > 1){
        echo "There are <strong>".count($GLOBALS['result']->fac_dets->facility_details)."</strong> facilities.<br />";
        $i=1;
        foreach($GLOBALS['result']->fac_dets->facility_details as $facility){
            ?>
            <div class="column r50">
                <span class="summaryColumnTitle">Facility Name</span>
                <div class="summaryColumn" style="width: 100%;">
                    <?php if(isset($facility->facility_name)) echo $facility->facility_name; ?>
                </div>
            </div>
            <div class="column r50">
                <span class="summaryColumnTitle">Facility Type</span>
                <div class="summaryColumn" style="width: 100%;">
                    <?php if(isset($facility->facility_type)){ echo $facility->facility_type; } ?>
                </div>
            </div>
            <div class="float-left">
                <span class="summaryColumnTitle">Facility Description</span>
                <div class="summaryColumn" style="width: 100%;">
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
            <div class="column r50">
                <span class="summaryColumnTitle">Facility Name</span>
                <div class="summaryColumn" style="width: 100%;">
                    <?php if(isset($facility->facility_name)) echo $facility->facility_name; ?>
                </div>
            </div>
            <div class="column r50">
                <span class="summaryColumnTitle">Facility Type</span>
                <div class="summaryColumn" style="width: 100%;">
                    <?php if(isset($facility->facility_type)){ echo $facility->facility_type; } ?>
                </div>
            </div>
            <div class="float-left">
                <span class="summaryColumnTitle">Facility Description</span>
                <div class="summaryColumn" style="width: 100%;">
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
</div>
<?php
}
?>
</div>

<div class="summaryContainer">
    <h1>Road Details</h5>
        <div>
            <span class="summaryColumnTitle">Type</span>
            <div class="summaryColumn" style="width: 100%;">
                <?php if(isset($GLOBALS['result']->road_type)) echo $GLOBALS['result']->road_type; ?>
            </div>
            <span class="summaryColumnTitle">Responsibility</span>
            <div class="summaryColumn" style="width: 100%;">
                <?php if(isset($GLOBALS['result']->road_responsibility)){ echo $GLOBALS['result']->road_responsibility; } ?>
            </div>

        </div>