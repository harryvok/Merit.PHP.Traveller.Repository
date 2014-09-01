
<?php
// Otherwise, display the "stars are complusory message"
?>
<span style="color: red;"><b><?php echo COMPULSORY ?></b></span><br />


<script type="text/javascript" src="inc/js/pages/js.new-request.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        // Get Names Lookup
        
    if ($("#lookup_enabled").val() == "Y") {
        function check_fields() {
            var i = 0;
            if (($('#given').val().length) > 0) i++;
            if (($('#surname').val().length) > 0) i++;
            if (($('#cust_mobile').val().length) > 0) { i = i + 2; }
            if (($('#cust_phone').val().length) > 0) { i = i + 2; }
            if (($("#cust_work").val().length) > 0) { i = i + 2; }
            if (($('#email_address').val().length) > 0) { i = i + 2; }
            if (($('#company').val().length) > 0) i++;
            if (i >= 2) return true;
            else return false;
        }
        $('.getlist').change(function () {
            $('#name_id').val('0');
            $('#name_ctr').val('0');
            $('#name_origin').val('');
            if (check_fields()) {
                var self = this;
                $(this).addClass("ui-autocomplete-loading");
                var mobile = $('#cust_mobile').val();
                var phone = $('#cust_mobile').val();
                var work = $('#cust_mobile').val();
                $.ajax({
                    url: 'inc/ajax/ajax.getNameLookup.php',
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
                    success: function (data) {
                        $('#popup').html(data);
                        $(self).removeClass("ui-autocomplete-loading");

                    }
                });
            }

        });


       
	}


        $(".infoHover").click(function (e) {
            if ($("#" + $(this).attr("id") + "Text").val().length > 0 || $("#" + $(this).attr("id") + "URL").val().length > 0) {
                $('.hoverDiv').css({
                    left: e.pageX - 315,
                    top: e.pageY + 15
                });
                $("#helpText").html($("#" + $(this).attr("id") + "Text").val());
                $("#helpURL").html($("#" + $(this).attr("id") + "URL").val());
                $(".hoverDiv").fadeIn("fast");
            }
        });
        $("#infoHoverClose").click(function () {
            $(".hoverDiv").fadeOut("fast");
            $("#helpText").html("");
            $("#helpURL").html("");
        });
    });
</script>
<div id="error">

</div>

	<form  enctype='multipart/form-data' id='newrequest' name="newrequest" action='process.php' method='post'>
	
     <input type="hidden" name="lookup_enabled" id="lookup_enabled" value="<?php echo $_SESSION['roleSecurity']->maint_name_match; ?>" />
	 <input type='hidden' name='udfs_exist' id='udfs_exist' value='0' />
     <div class="float-left">
	     
        <div class="column 60">
            <div class="column quarter">
	        <label  for="service">Keyword</label>
	
	        <input  class="text" name='keyword' id="keywordSearch" maxlength='15'  placeholder="Search...">
	        </div>
	        <div class="column quarter">
	            <label  for="service">Service<span style="color:red;">*</span></label>
                <div class="info">
    	            <img src="images/Info.png" class="infoHover" id="service_help" />
                </div>
	            <input class="text required" name='serviceInput' id="serviceInput"  placeholder="Search..." value='<?php if(isset($_SESSION['rem_serviceInput'])){ echo $_SESSION['rem_serviceInput']; } ?>'>
	            <input type="hidden" name='service' id="service" >
                <input type="hidden" id="service_helpText" />
                <input type="hidden" id="service_helpURL" />
        
	        </div>
	        <div class="column quarter">
	        <label  for="request">Request<span style="color:red;">*</span></label>
            <div class="info">
    	               <img src="images/Info.png" class="infoHover" id="request_help" />
                </div>
		        <input class="text required" name='requestInput' disabled="disabled" id="requestInput" value='<?php if(isset($_SESSION['rem_requestInput'])){ echo $_SESSION['rem_requestInput']; } ?>'>
		        <input type="hidden" name='request' id="request">
                <input type="hidden" id="request_helpText" />
                <input type="hidden" id="request_helpURL" />
        
	        </div>
	        <div class="column quarter">
	        <label  for="function">Function<span id="functionRequired" style="color:red; display:none;">*</span></label>
            <div class="info">
    	            <img src="images/Info.png" class="infoHover" id="function_help" />
                </div>
		        <input class="text checkNone" name='functionInput' disabled="disabled" id="functionInput" value='<?php if(isset($_SESSION['rem_functionInput'])){ echo $_SESSION['rem_functionInput']; } ?>'>
		        <input type="hidden" name='function' id="function">
                <input type="hidden" id="function_helpText" />
                <input type="hidden" id="function_helpURL" />
        
	        </div>
            
            <br/>
            <div class="float-left">
            <div class="column quarter">
	        <label  for="refno">Reference Number</label>
            <input  class="text"name='refno' maxlength='15' value='<?php if(isset($_SESSION['rem_refno'])){ echo $_SESSION['rem_refno']; } ?>'>
	        </div>
            <?php
            if(isset($_SESSION['roleSecurity']->maint_priority) && $_SESSION['roleSecurity']->maint_priority == "Y"){
                 ?>
                <div class="column quarter">
	            <label  for="refno">Priority</label>
                <?php $controller->Dropdown("Priorities", "Priorities"); ?>
	        </div>
            <?php
            }
             ?>
            </div>
            <input type="hidden" name="workflowInd" id="workflowInd">
            <input type="hidden" name="countOnly" id="countOnly" value="0">
            <div class="hoverDiv">
                <img src="images/close.png" id="infoHoverClose" style="float:right; cursor:pointer;" />
                <div class="scrollText">
    	            <span id="helpText"></span><br />
                    <span id="helpURL"></span>
                </div>
            </div>
	        <input type="hidden" name="chkCount" id="chkCount" value="0" />
	    </div>
    </div>

	<br />
    <div class="float-left">
	<label  for="issue">Request Description<span style="color:red;">*</span></label>
	<textarea  rows="4" class="text request-issue required" name='issue' id='textareaissue' maxlength='2000'><?php if(isset($_SESSION['rem_issue'])){ echo $_SESSION['rem_issue']; } ?></textarea>
    </div>
	<div id="udfs" style="display:none;">
	<div class="float-left">
    
	<label >User Defined Fields</label>
	</div>
		<div class="summaryContainer">
			 <div style="margin-right:24px;" id="global-udfs"> 
			</div>
		</div>
	
	
	
	</div>
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
    <div class="float-left">
    
	<label >Location Address</label>
    </div>
		<div class="summaryContainer">
        	<div class="column half">
			<div class="float-left">
				<div class="small-fieldset">
                 <label  for="facilityTypeInput">Facility Type</label> 
				    <input class="text" name='facilityTypeInput' id="facilityTypeInput"  placeholder="Search..." value='<?php if(isset($_SESSION['rem_facilityType'])){ echo $_SESSION['rem_facilityType']; } ?>'>
				    <input type="hidden" name='facilityTypeId' id="facilityTypeId">
                 </div>
                 <div class="large-fieldset">
                 <label  for="facilityInput">Facility Name</label> 
				    <input class="text" name='facilityInput' id="facilityInput"  placeholder="Search..." value='<?php if(isset($_SESSION['rem_facility'])){ echo $_SESSION['rem_facility']; } ?>'>
				    <input type="hidden" name='facilityId' id="facilityId">
				    <input type="hidden" name='addressId' id="addressId" />
                    </div>
                 
			</div>
			<div class="small-fieldset">
				<label  for="lno">Flat/Unit Number</label>
				<input class="text" name='lfaddno' onChange="changeLocationType()" id="lfno" maxlength='15' value='<?php if(isset($_SESSION['rem_lfaddno'])){ echo $_SESSION['rem_lfaddno']; } ?>'>
			</div>
			<div class="small-fieldset">
				<label  for="lfno">Street Number</label>
				<input class="text" name='lno' onChange="changeLocationType()" id="lno" maxlength='15' value='<?php if(isset($_SESSION['rem_lno'])){ echo $_SESSION['rem_lno']; } ?>'>
			</div>
			
			<div class="float-left">
            	<div class="small-fieldset">
				   <label  for="lstreet">Street Name<span style="color:red;">*</span></label>
				   <input class="text required checkNone" name='lstreet' onChange="changeLocationType()" id="lstreet"  maxlength='100' value='<?php if(isset($_SESSION['rem_lstreet'])){ echo $_SESSION['rem_lstreet']; } ?>'>
                   </div>
                   <div class="small-fieldset">
				   <label  for="ltype">Street Type<span style="color:red;">*</span></label>
				   <input class="text required checkNone" name='ltype' onChange="changeLocationType()" id="ltype" disabled="disabled" maxlength='100' value='<?php if(isset($_SESSION['rem_ltype'])){ echo $_SESSION['rem_ltype']; } ?>'>
					</div>
                   <div class="small-fieldset">
					<label  for="lsuburb">Suburb<span style="color:red;">*</span></label>
				   <input class="text required checkNone" name='lsuburb' onChange="changeLocationType()" id="lsuburb" disabled="disabled" maxlength='100' value='<?php if(isset($_SESSION['rem_lsuburb'])){ echo $_SESSION['rem_lsuburb']; } ?>'>
					</div>
                    <div class="large-fieldset">
                    <label  for="ldesc">Description</label>
                        <textarea id="ldesc" onChange="changeLocationType()" style="resize:none; height:3em; width:430px" maxlength='1000' value='<?php if(isset($_SESSION['rem_ldesc'])){ echo $_SESSION['rem_ldesc']; } ?>'></textarea>
                </div>
			</div>
            </div>
            <div class="column half">
            	<div id="map-canvas"></div>
                <input type="hidden" id="address" name="address" value="<?php if(defined("DEFAULT_ADDRESS")) echo DEFAULT_ADDRESS; ?>" />
                <input type="hidden" id="defaultLat" value="-37.814107" />
                 <input type="hidden" id="defaultLng" value="144.96328" />
                <input type="button" value="Use This Address" id="gmaps_Use" />
                <input type="hidden" id="gmaps_Number" />
                <input type="hidden" id="gmaps_FNumber" />
                <input type="hidden" id="gmaps_StreetName" />
                <input type="hidden" id="gmaps_StreetType" />
                <input type="hidden" id="gmaps_Suburb" />
                <input type="hidden" id="use_gmaps_coord" name="use_gmaps_coord" value="0" />
                <input type="hidden" id="gmaps_x" name="gmaps_x" />
                <input type="hidden" id="gmaps_y" name="gmaps_y" />
                <input type="hidden" id="address_gps" name="address_gps" />
               </div>
		</div>
        <div class="float-left">
            <div class="column half">
                <div class="float-left">
                
	            <label >Customer Name</label>
                </div>
                <div class="summaryContainer" id="nameLookupDiv">
			    <div class="float-left">
				    <div style="float:left;">
					    <input type="button"  name="myDetails" id="myDetails" value="My Details" />  <input type="button"  name="clearDetails" id="clearDetails" value="Clear" /> </div>
                        <div style="margin-left:20px; float:left;"><label>Customer Type</label>
			    <?php $controller->Dropdown("CustomerTypes", "CustomerTypes"); ?></div>
				    
			    </div>
			    <div class="small-fieldset">
                
			    <label  for="pref_title">Title</label>
			    <input  class="text getlist" name='cust_title' id="pref_title" maxlength='5' value='<?php if(isset($_SESSION['rem_cust_title'])){ echo $_SESSION['rem_cust_title']; } ?>' onChange="capitalise('pref_title')">
			    </select>
			    <label  for="given">Given</label>
			    <input class="text getlist" name='cust_given' id="given" maxlength='30' value='<?php if(isset($_SESSION['rem_cust_given'])){ echo $_SESSION['rem_cust_given']; } ?>' onChange="capitalise('given')">
			    <label  for="surname">Surname</label>
			    <input class="text getlist" name='cust_surname' id="surname" maxlength='30' value='<?php if(isset($_SESSION['rem_cust_surname'])){ echo $_SESSION['rem_cust_surname']; } ?>' onChange="capitalise('surname')">
			    <label  for="company">Company Name</label>
			    <input class="text getlist" name='cust_company' id="company" maxlength='50' value='<?php if(isset($_SESSION['rem_cust_company'])){ echo $_SESSION['rem_cust_company']; } ?>' onChange="capitalise('company')">
			    </div>
			
			    <div class="small-fieldset last-child">
			    <label  for="mobile">Mobile</label>
			    <input class="text getlist" name='cust_mobile' id="cust_mobile" maxlength='12' value='<?php if(isset($_SESSION['rem_cust_mobile'])){ echo $_SESSION['rem_cust_mobile']; } ?>'>
			    <label  for="phone">Phone</label>
			    <input class="text getlist" name='cust_phone' id="cust_phone" maxlength='12' value='<?php if(isset($_SESSION['rem_cust_phone'])){ echo $_SESSION['rem_cust_phone']; } ?>'>
			    <label  for="work">Work</label>
			    <input class="text getlist" name='cust_work' id="cust_work" maxlength='12' value='<?php if(isset($_SESSION['rem_cust_work'])){ echo $_SESSION['rem_cust_work']; } ?>'>
			    <label  for="email">Email</label>
			    <input class="text getlist email" name='cust_email' id='email_address' maxlength='50' value='<?php if(isset($_SESSION['rem_cust_email'])){ echo $_SESSION['rem_cust_email']; } ?>'>
			    </div>
			    <input type="hidden" name="name_id" id="name_id" value="0" />
			    <input  type="hidden" name="name_origin" id="name_origin" value="" />
			    <input  type="hidden" name="name_ctr" id="name_ctr" value="0" />
           </div>
           </div>
            <div class="column half">
                <div class="float-left">
	                
	                <label>Customer Address</label>
                    </div>
		                <div class="summaryContainer">
        	                <div class="float-left">
                
        	                    <div class="fieldset">
			                    <label  for="same">Customer Resides</label>
			                    <select class="text" name="same" id="same" onChange="changeLocationType();">
				                    <?php
				                    if(isset($_SESSION['rem_same'])){
					                    if($_SESSION['rem_same'] == "s"){
						                    ?>
						                    <option value='s'>Same as Location</option>
						                    <option value='i'>Inside Council Area</option>
						                    <option value='o'>Outside Council Area</option>
						                    <?php	
					                    }
					                    elseif($_SESSION['rem_same'] == "i"){
						                    ?>
						                    <option value='i'>Inside Council Area</option>
						                    <option value='s'>Same as Location</option>
						                    <option value='o'>Outside Council Area</option>
						                    <?php	
					                    }
					                    elseif($_SESSION['rem_same'] == "o"){
						                    ?>
						                    <option value='o'>Outside Council Area</option>
						                    <option value='s'>Same as Location</option>
						                    <option value='i'>Inside Council Area</option>
						                    <?php	
					                    }
				                    }
				                    else{
					                    ?>
					                    <option value='i'>Inside Council Area</option>
					                    <option value='o'>Outside Council Area</option>
					                    <option value='s'>Same as Location</option>
					                    <?php
				                    }
				                    ?>
			                    </select>
                                </div>
                                </div>
			                    <div id="inside_ca" style="display:block;">
				                    <div class="small-fieldset">
					                    <label  for="i_cfno">Flat/Unit Number</label>
					                    <input class="text cadd" name='i_cfaddno' onChange="" id="i_cfno" maxlength='15' value='<?php if(isset($_SESSION['rem_i_cno'])){ echo $_SESSION['rem_i_cno']; } ?>'>
				                    </div>
				                    <div class="small-fieldset">
					                    <label  for="i_cno">Street Number</label>
					                    <input class="text cadd" name='i_cno' onChange="" id="i_cno" maxlength='15' value='<?php if(isset($_SESSION['rem_i_cfaddno'])){ echo $_SESSION['rem_i_cfaddno']; } ?>'>
				                    </div>
				                    <div class="float-left">
                	                    <div class="small-fieldset">
				                        <label  for="i_cstreet">Street Name</label>
				                       <input class="text cadd checkNone" name='i_cstreet' onChange="remstname();" id="i_cstreet" maxlength='100' value='<?php if(isset($_SESSION['rem_i_cstreet'])){ echo $_SESSION['rem_i_cstreet']; } ?>'>
                                       </div>
                                       <div class="small-fieldset">
				                       <label  for="i_ctype">Street Type</label>
				                       <input class="text cadd checkNone" name='i_ctype' onChange="" id="i_ctype" disabled="disabled" maxlength='100' value='<?php if(isset($_SESSION['rem_i_ctype'])){ echo $_SESSION['rem_i_ctype']; } ?>'>
					                    </div>
                                       <div class="small-fieldset">
					                    <label  for="i_csuburb">Suburb</label>
				                       <input class="text cadd checkNone" name='i_csuburb' onChange="" id="i_csuburb" disabled="disabled" maxlength='100' value='<?php if(isset($_SESSION['rem_i_csuburb'])){ echo $_SESSION['rem_i_csuburb']; } ?>'>
					                    </div>
                                      <div class="large-fieldset last-child">
					                    <label  for="i_cdesc">Description</label>
                                        <textarea id="i_cdesc" onChange="changeLocationType()" style="resize:none; height:3em" maxlength='1000' value='<?php if(isset($_SESSION['rem_i_cdesc'])){ echo $_SESSION['rem_i_cdesc']; } ?>'></textarea>
					      
				                    </div>
                                    </div>
			                    </div>
			                    <div id="outside_ca" style="display:none;">
				                    <div class="small-fieldset">
					                    <label  for="o_cfno">Flat/Unit Number</label>
					                    <input class="text" name='o_cfaddno' onChange="changeLocationType()" id="o_cfno" maxlength='15' value='<?php if(isset($_SESSION['rem_o_cno'])){ echo $_SESSION['rem_o_cno']; } ?>'>
				                    </div>
				                    <div class="small-fieldset">
					                    <label  for="o_cno">Street Number</label>
					                    <input class="text" name='o_cno' onChange="changeLocationType()" id="o_cno" maxlength='15' value='<?php if(isset($_SESSION['rem_o_cfaddno'])){ echo $_SESSION['rem_o_cfaddno']; } ?>'>
				                    </div>
				                    <div class="float-left">
                	                    <div class="small-fieldset">
				                       <label  for="o_cstreet">Street Name</label>
				                       <input class="text" name='o_cstreet' onChange="changeLocationType();remstname();" id="o_cstreet" maxlength='100' value='<?php if(isset($_SESSION['rem_o_cstreet'])){ echo $_SESSION['rem_o_cstreet']; } ?>'>
                                       </div>
                                       <div class="small-fieldset">
				                       <label  for="o_ctype">Street Type</label>
				                       <input class="text" name='o_ctype' onChange="changeLocationType()" id="o_ctype" maxlength='100' value='<?php if(isset($_SESSION['rem_o_ctype'])){ echo $_SESSION['rem_o_ctype']; } ?>'>
                                       </div>
                                       <div class="small-fieldset">
					                    <label  for="o_csuburb">Suburb</label>
				                       <input class="text" name='o_csuburb' onChange="changeLocationType()" id="o_csuburb" maxlength='100' value='<?php if(isset($_SESSION['rem_o_csuburb'])){ echo $_SESSION['rem_o_csuburb']; } ?>'>
                                       </div>
                                       <div class="large-fieldset last-child">
					                    <label  for="o_cdesc">Description</label>
					                    <input class="text" name='o_cdesc' onChange="changeLocationType()" id="o_cdesc" maxlength='1000' value='<?php if(isset($_SESSION['rem_o_cdesc'])){ echo $_SESSION['rem_o_cdesc']; } ?>'>
                                       </div>
				                    </div>
			                    </div>
			                    <input type="hidden" name="cust_address_id" id="cust_address_id" value="0" />
			                    <input type="hidden" name="cust_address_ctr" id="cust_address_ctr" value="0" />
		                </div>
            </div>
            </div>
	<br />
    
	<div class="float-left">
				       	
	<label  for="">Add Attachment</label>
    </div>
		<div class="summaryContainer">
        	<div class="column half">
				<label for="desc">File</label>
                <input id="attachment" type="file" name="attachment"  />
			</div>
            <div class="column half">
				<label for="desc">Description</label> 
				<input type="text" id="desc" maxlength="50"  name="desc" />
              </div>
		 </div>
	
	<input type="hidden" name="action" value="CreateRequest" />
               <input type="hidden" id="ok" value='0' />
	<div id="adhocOfficer" style="display:none;">
	
	</div>
    <div id="submitButton"></div>
	<input id="submit" class="button left" type='submit' value='Submit' />
</form>
<?php
foreach($_SESSION as $var => $data){
    if(stristr($var, "rem_") && !stristr($var,"rem_udf")){
        unset($_SESSION[$var]);	
    }
}
?>

