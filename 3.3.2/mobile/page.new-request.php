<script type="text/javascript" src="inc/js/pages/js.new-request-mobile.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	
	
            function check_fields(){
				var i=0;
				if(($('#given').val().length) > 0) i++;
				if(($('#surname').val().length) > 0) i++;
				if(($('#cust_mobile').val().length) > 0){ i=i+2; }
			    if(($('#cust_phone').val().length) > 0){ i=i+2; }
			    if(($("#cust_work").val().length) > 0){ i=i+2; }
			    if(($('#email_address').val().length) > 0){ i=i+2; }
				if(($('#company').val().length) > 0) i++;
				if(i>=2) return true; 
				else return false;
			}
            <?php
            if(LOOKUP_ENABLED == 1){
                ?>
            $('.getlist').change(function(){
                $('#name_id').val('0');
                $('#name_ctr').val('0');
                $('#name_origin').val('');
                if(check_fields()){
                var self = this;
            $(this).addClass("ui-autocomplete-loading");
                    var mobile = $('#cust_mobile').val();
                 var phone = $('#cust_mobile').val();
                    var work = $('#cust_mobile').val();
                    $.ajax({
                        url: 'inc/ajax/ajax.get_names.php',
                        type: 'post',
                        data: {
                            pref_title: $('#pref_title').val(), 
                            given: $('#given').val(), 
                            surname: $('#surname').val(), 
                            cust_mobile: mobile.replace(" ", ""), 
						cust_phone: phone.replace(" ", ""), 
						cust_work: work.replace(" ", ""),  
                            company_name: $('#company').val(), 
                            email_address: $('#email_address').val()
                        },
                        success: function(data) {
                            $('#popup').html(data);	
                             $(self).removeClass("ui-autocomplete-loading");
                        }
                    });
                }
                
            });	
            
            <?php
            }
            ?>
		$(".infoHover").click(function(e){
		    if($("#"+$(this).attr("id")+"Text").val().length > 0 || $("#"+$(this).attr("id")+"URL").val().length > 0){
                $("#helpText").html($("#"+$(this).attr("id")+"Text").val());
                $("#helpURL").html($("#"+$(this).attr("id")+"URL").val());
			    $(".hoverDiv").fadeIn("fast");	
		    }
	    });
	    $("#infoHoverClose").click(function(){
		    $(".hoverDiv").fadeOut("fast");	
            $("#helpText").html("");
               $("#helpURL").html("");
	    });
		
 });
    
</script>
<div id="topbar">
    <div id="title" style="padding-left: 100px;">Add Request</div>
    <div id="leftnav" href="index.php?"><a href="index.php?" href="#"><img alt="home" src="images/home.png" /></a><a href="index.php?page=requests">Back</a></div>
</div>
<div id="wrapper">
    <div id="scroller">
        <div id="content">
            <ul class='pageitem'>
                <li class='textbox'><?php echo COMPULSORY; ?></li>
            </ul>
            <?php
            include("mobile/page.output.php");
            ?>
            <form  enctype='multipart/form-data' action='process.php' id='newrequest' method='post'>
                <span class="graytitle">Keyword</span>
                <ul class="pageitem">
                    <li class="bigfield">
                        <input  class="text" name='keyword' id="keywordSearch" maxlength='15' placeholder="Search...">
                    </li>
                </ul>
                
                <span class="graytitle">Service<span style="color:red;">*</span></span>
                <div class="info">
    	           <img src="images/Info.png" class="infoHover" id="service_help" />
            </div>
                <ul class="pageitem">
                    <li class="bigfield">
                        <input class="text required" name='serviceInput' id="serviceInput"  placeholder="Search..." value='<?php if(isset($_SESSION['rem_serviceInput'])){ echo $_SESSION['rem_serviceInput']; } ?>'>
                        <input type="hidden" name='service' id="service" >
                    </li>
                    
                </ul>
                     <input type="hidden" id="service_helpText" />
                    <input type="hidden" id="service_helpURL" />
                
                <span class="graytitle">Request<span style="color:red;">*</span></span>
                <div class="info">
    	           <img src="images/Info.png" class="infoHover" id="request_help" />
            </div>
                <ul class="pageitem">
                    <li class="bigfield">
                        <input class="text required" name='requestInput' id="requestInput" disabled="disabled" placeholder="Search..." value='<?php if(isset($_SESSION['rem_requestInput'])){ echo $_SESSION['rem_requestInput']; } ?>'>
                         <input type="hidden" name='request' id="request" >
                    </li>
                    
                </ul>
                     <input type="hidden" id="request_helpText" />
                    <input type="hidden" id="request_helpURL" />
                <span class="graytitle">Function<span id="functionRequired" style="color:red; display:none;">*</span></span>
                <div class="info">
    	           <img src="images/Info.png" class="infoHover" id="function_help" />
            </div>
            <input type="hidden" name="workflowInd" id="workflowInd">
            <input type="hidden" name="countOnly" id="countOnly" value="0">
                <ul class="pageitem">
                    <li class="bigfield">
                        <input class="text" name='functionInput' id="functionInput" disabled="disabled"  placeholder="Search..." value='<?php if(isset($_SESSION['rem_functionInput'])){ echo $_SESSION['rem_functionInput']; } ?>'>
                     <input type="hidden" name='function' id="function" >
                    </li>
                    
                </ul>
                     <input type="hidden" id="function_helpText" />
                    <input type="hidden" id="function_helpURL" />
                <div class="hoverDiv">
                	<img src="images/close.png" id="infoHoverClose" style="float:right;" width="32" height="32" />
                    <div class="hoverScroll">
    	                <span id="helpText"></span><br />
                        <span id="helpURL"></span>
                    </div>
                </div>
                <input type="hidden" id="chkCount" val="0" />
                <span class="graytitle">Reference Number</span>
                <ul class="pageitem">
                    <li class="bigfield"><input name='refno' maxlength='15' value='<?php if(isset($_SESSION['rem_refno'])){ echo $_SESSION['rem_refno']; } ?>'></li>
                </ul>
                <?php
                if(isset($_SESSION['roleSecurity']->maint_priority) && $_SESSION['roleSecurity']->maint_priority == "Y"){
                    ?>
                <span class="graytitle">Priority</span>
                <ul class="pageitem">
                    <li class="select"><?php $controller->Dropdown("Priorities"); ?><</li>
                </ul>
                <?php 
                }
                ?>
                <span class="graytitle">Request Description<span style="color:red;">*</span></span>
                <ul class="pageitem">
                    <li class="textbox"><textarea id="add-request-textarea" rows="4" class="text request-issue required" name='issue' id='textareaissue' maxlength='2000'><?php if(isset($_SESSION['rem_issue'])){ echo $_SESSION['rem_issue']; } ?></textarea></li>
                </ul>
                <div id="udfs" style="display:none;">
                <span class="graytitle">User Defined Fields</span>
                <ul class="pageitem">
                    <li class="textbox" id="global-udfs"></li>
                </ul>
                </div>
                <input type='hidden' name='udfs_exist' id='udfs_exist' value='0' />
                <?php
                if(isset($_SESSION['rem_service'])){
                    if(strlen($_SESSION['rem_service']) > 1){
                        ?>
                        <script type="text/javascript">
                            QueryUDFs('<?php echo $_SESSION['rem_function']; ?>','<?php echo $_SESSION['rem_request']; ?>','<?php echo $_SESSION['rem_service']; ?>');  	
                            document.getElementById('udfs_exist').value = '1';
                        </script>
                        <?php
                    }
                }
                ?>
                <span class="graytitle">Location Address</span>
                <ul class="pageitem">
                    <span class="graytitle" style="display:none;">GPS Map</span>
                    <li class="textbox" style="display:none;">
                        <div id="message" style="width:256px; height: 256px;"></div>
                    </li>
                    <span class="graytitle" style="display:none;">Address</span>
                    <li class="textbox" style="display:none;">
                        <div id="text"></div>
                    </li>
                    <li class="textbox">
                        <ul class="pageitem">
                            <span class="graytitle">Facility Type</span>
                            <li class="bigfield"><input class="text"  placeholder="Search..." name='facilityTypeInput' id="facilityTypeInput" value='<?php if(isset($_SESSION['rem_facilityTypeInput'])){ echo $_SESSION['rem_facilityTypeInput']; } ?>'></li>
                            <input class="hidden" name='facilityTypeId' id="facilityTypeId" value='<?php if(isset($_SESSION['rem_facilityId'])){ echo $_SESSION['rem_facilityTypeId']; } ?>'>
                            
                             <span class="graytitle">Facility Name</span>
                            <li class="bigfield"><input class="text"  placeholder="Search..." name='facilityInput' id="facilityInput" value='<?php if(isset($_SESSION['rem_facilityInput'])){ echo $_SESSION['rem_facilityInput']; } ?>'></lI>
                            <input class="hidden" name='facilityId' id="facilityId" value='<?php if(isset($_SESSION['rem_facilityId'])){ echo $_SESSION['rem_facilityId']; } ?>'>
                            <input type="hidden" name='addressId' id="addressId" /></li>
                            <hr>
                            <span class="graytitle">Flat/Unit Number</span>
                            <li class="bigfield"><input name='lno' onChange="custadd()" id="lno" maxlength='15' value='<?php if(isset($_SESSION['rem_loc_address_number'])){ echo $_SESSION['rem_loc_address_number']; } ?>'></li>
                            <hr>
                            <span class="graytitle">Street Number<span style="color:red;">*</span></span>
                            <li class="bigfield"><input name='lfaddno' class="required" onChange="custadd()" id="lfno" maxlength='15' value='<?php if(isset($_SESSION['rem_loc_address_fnumber'])){ echo $_SESSION['rem_loc_address_fnumber']; } ?>'></li>
                            <hr>
                            <span class="graytitle">Street<span style="color:red;">*</span></span>
                            <li class="bigfield">
                                <input class="required" placeholder="Search..." name='lstreet' onChange="custadd()" id="lstreet" maxlength='100' value='<?php if(isset($_SESSION['rem_lstreet'])){ echo $_SESSION['rem_lstreet']; } ?>'><span class="arrow"></span>
                            </li>
                            <hr>
                            <span class="graytitle">Type<span style="color:red;">*</span></span>
                            <li class="bigfield">
                                <input class="required" placeholder="Search..." disabled="disabled" name='ltype' onChange="custadd()" id="ltype" maxlength='100' value='<?php if(isset($_SESSION['rem_ltype'])){ echo $_SESSION['rem_ltype']; } ?>'><span class="arrow"></span>
                            </li>
                            <hr>
                            <span class="graytitle">Suburb<span style="color:red;">*</span></span>
                            <li class="bigfield">
                                <input class="required" placeholder="Search..."disabled="disabled" name='lsuburb' onChange="custadd()" id="lsuburb" maxlength='100' value='<?php if(isset($_SESSION['rem_lsuburb'])){ echo $_SESSION['rem_lsuburb']; } ?>'><span class="arrow"></span>
                            </li>
                            <hr>
                            <span class="graytitle">Description</span>
                            <li class="bigfield"><input name='ldesc' onChange="custadd()" id="ldesc" maxlength='50' value='<?php if(isset($_SESSION['rem_loc_address_desc'])){ echo $_SESSION['rem_loc_address_desc']; } ?>'></li>
                        </ul>
                    </li>
                </ul>
                <span class="graytitle">Customer</span>
                <ul class="pageitem">
                    <li class="textbox">
                        <ul class="pageitem">
                            <li class="button"><input type="button" id="myDetails" value="My Details" /></li>
                            <li class="button"><input type="button" id="clearDetails" value="Clear" /></li>
                            <hr>
                            <span class="graytitle">Title</span>
                            <li class="bigfield"><input class="getlist" name='cust_title' id='pref_title' maxlength='5' value='<?php if(isset($_SESSION['rem_cust_title'])){ echo $_SESSION['rem_cust_title']; } ?>'></span></li>
                            <hr>
                            <span class="graytitle">Given</span>
                            <li class="bigfield"><input class="getlist" name='cust_given' id='given' maxlength='30' value='<?php if(isset($_SESSION['rem_cust_given'])){ echo $_SESSION['rem_cust_given']; } ?>' ></li>
                            <hr>
                            <span class="graytitle">Surname</span>
                            <li class="bigfield"><input class="getlist" name='cust_surname' id='surname' maxlength='30' value='<?php if(isset($_SESSION['rem_cust_surname'])){ echo $_SESSION['rem_cust_surname']; } ?>'></li>  
                            <hr>
                            <span class="graytitle">Phone</span>
                            <li class="bigfield"><input class="getlist" name='cust_phone' id='cust_phone' maxlength='12' value='<?php if(isset($_SESSION['rem_cust_phone'])){ echo $_SESSION['rem_cust_phone']; } ?>'></li>
                            <hr>
                            <span class="graytitle">Mobile</span>
                            <li class="bigfield"><input class="getlist" name='cust_mobile' id='cust_mobile'  maxlength='12' value='<?php if(isset($_SESSION['rem_cust_mobile'])){ echo $_SESSION['rem_cust_mobile']; } ?>'></li>
                            <hr>
                            <span class="graytitle">Work Number</span>
                            <li class="bigfield"><input class="getlist" name='cust_work' id='cust_work' maxlength='12' value='<?php if(isset($_SESSION['rem_cust_work'])){ echo $_SESSION['rem_cust_work']; } ?>'></li>
                            <hr>
                            <span class="graytitle">Email Address</span>
                            <li class="bigfield"><input class="getlist" name='cust_email' id='email_address' maxlength='50' value='<?php if(isset($_SESSION['rem_cust_email'])){ echo $_SESSION['rem_cust_email']; } ?>'></li>
                            <hr>
                            <span class="graytitle">Company Name</span>
                            <li class="bigfield"><input class="getlist" name='cust_company' id='company' maxlength='50' value='<?php if(isset($_SESSION['rem_cust_company'])){ echo $_SESSION['rem_cust_company']; } ?>'></li>
                            <hr>
                            <span class="graytitle">Customer Type</span>
                            <li class="select">
                                <?php $controller->Dropdown("CustomerTypes"); ?>
                                <span class="arrow"></span>
                            </li>
                            <input type="hidden" name="name_id" id="name_id" value="0" />
                             <input type="hidden" name="name_origin" id="name_origin" value="" />
                            <input type="hidden" name="name_ctr" id="name_ctr" value="0" />
                        </ul>
                    </li>
                </ul>
                <span class="graytitle">Customer Address</span>
                <ul class="pageitem">
                    <li class="textbox">
                        <ul class="pageitem">
                            <span class="graytitle">Customer Resides</span>
                            <li class="select">
                                <select class="text" name="same" id="same" onChange="changeLocationType();">
                                        <option value='i'>Inside Council Area</option>
                                        <option value='o'>Outside Council Area</option>
                                        <option value='s'>Same as Location</option>
                                </select>
                                <span class="arrow"></span>
                            </li>
                            <hr>
                            <div id="inside_ca" style="display:block;">
                                <span class="graytitle">Flat/Unit Number</span>
                                <li class="bigfield"><input name='i_cno' id="i_cno" maxlength='15' value='<?php if(isset($_SESSION['rem_cust_address_number'])){ echo $_SESSION['rem_cust_address_number']; } ?>'></li>
                                <hr>
                                <span class="graytitle">Street Number</span>
                                <li class="bigfield"><input name='i_cfaddno' id="i_cfno" maxlength='15' value='<?php if(isset($_SESSION['rem_cust_address_fnumber'])){ echo $_SESSION['rem_cust_address_fnumber']; } ?>'></li>
                                <hr>
                                <span class="graytitle">Street</span>
                                <li class="bigfield">
                                    <input name='i_cstreet' placeholder="Search..." id="i_cstreet" maxlength='100' value='<?php if(isset($_SESSION['rem_i_cstreet'])){ echo $_SESSION['rem_i_cstreet']; } ?>'>
                                </li>
                                <hr>
                                <span class="graytitle">Type</span>
                                <li class="bigfield">
                                    <input name='i_ctype' placeholder="Search..." id="i_ctype"disabled="disabled"  maxlength='100' value='<?php if(isset($_SESSION['rem_i_csuburb'])){ echo $_SESSION['rem_i_ctype']; } ?>'>
                                </li>
                                <hr>
                                <span class="graytitle">Suburb</span>
                                <li class="bigfield">
                                    <input  name='i_csuburb' placeholder="Search..." id="i_csuburb"disabled="disabled"  maxlength='100' value='<?php if(isset($_SESSION['rem_i_csuburb'])){ echo $_SESSION['rem_i_csuburb']; } ?>'>
                                </li>
                                <hr>
                                <span class="graytitle">Description</span>
                                <li class="bigfield"><input name='i_cdesc' id="i_cdesc" maxlength='50' value='<?php if(isset($_SESSION['rem_cust_address_desc'])){ echo $_SESSION['rem_cust_address_desc']; } ?>'></li>
                                <hr>
                                <input type="hidden" name="cust_address_id" id="cust_address_id" value="0" />
                                <input type="hidden" name="cust_address_ctr" id="cust_address_ctr" value="0" />
                            </div>
                            <div id="outside_ca" style="display:none">
                                <span class="graytitle">Flat/Unit Number</span>
                                <li class="bigfield"><input name='o_cno' onChange="custadd()" id="o_cno" maxlength='15' value='<?php if(isset($_SESSION['rem_cust_address_number'])){ echo $_SESSION['rem_cust_address_number']; } ?>'></li>
                                <hr>
                                <span class="graytitle">Street Number</span>
                                <li class="bigfield"><input name='o_cfaddno' onChange="custadd()" id="o_cfno" maxlength='15' value='<?php if(isset($_SESSION['rem_cust_address_fnumber'])){ echo $_SESSION['rem_cust_address_fnumber']; } ?>'></li>
                                <hr>
                                <span class="graytitle">Street</span>
                                <li class="bigfield"><input name='o_cstreet' id="o_cstreet" onChange="custadd()" maxlength='50' value='<?php if(isset($_SESSION['rem_cust_address_street'])){ echo $_SESSION['rem_cust_address_street']; } ?>'></li>
                                <hr>
                               <span class="graytitle">Type</span>
                                <li class="bigfield"><input name='o_ctype' id="o_ctype" onChange="custadd()" maxlength='50' value='<?php if(isset($_SESSION['rem_cust_address_streettype'])){ echo $_SESSION['rem_cust_address_streettype']; } ?>'></li>
                                <hr>
                                <span class="graytitle">Suburb</span>
                                <li class="bigfield"><input name='o_csuburb' id="o_csuburb" onChange="custadd()" maxlength='50' value='<?php if(isset($_SESSION['rem_cust_address_suburb'])){ echo $_SESSION['rem_cust_address_suburb']; } ?>'></li>
                                <hr>
                                <span class="graytitle">Description</span>
                                <li class="bigfield"><input name='o_cdesc' id="o_cdesc" onChange="custadd()" maxlength='50' value='<?php if(isset($_SESSION['rem_cust_address_desc'])){ echo $_SESSION['rem_cust_address_desc']; } ?>'></li>
                            </div>
                        </ul>
                    </li>
                </ul>

              <span class="graytitle">Attachment</span>
                <ul class="pageitem">
                <li class="bigfield"><input id="attachment" type="file" name="attachment" /></li>
                <li class="smallfield"><span class="name">Description:</span><input type="text" id="desc" maxlength="50"  name="desc" /></li>
                </ul>
                <input name="address_gps" id="address_gps" type="hidden" value='0' />
                <input name="geo_x_coord" id="geo_x_coord" type="hidden" value='0' />
                <input name="geo_y_coord" id="geo_y_coord" type="hidden" value='0' />
                <input type="hidden" name="action" value="CreateRequest" />
                <div id="adhocOfficer">
    
                </div>
                <ul class="pageitem" id="submitButton">
                </li>
                    <li class="button"><input name="Submit input" type="submit" id="submitButtonn" value="Submit" /></li>
                </ul>
            </form>
        </div>
    </div>
</div>
<?php
foreach($_SESSION as $var => $data){
    if(stristr($var, "rem_") && !stristr($var,"rem_udf")){
        unset($_SESSION[$var]);	
    }
}
?>

