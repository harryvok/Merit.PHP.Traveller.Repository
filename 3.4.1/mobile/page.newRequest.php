

<?php
if(isset($_SESSION['user_id'])){
	?>
  	
    <div data-role="page" id="default">
      <div data-role="header" data-position="fixed">
      	 <h1>New Request</h1>
      </div>
      <div data-role="content">
      <?php include("mobile/page.navSidebar.php"); ?>
        <div class="content-primary">
      	 <div data-role="popup" id="popup" class="ui-corner-all" data-rel="back">
                
            </div>
      	<script type="text/javascript" src="inc/js/pages/js.new-request.js"></script>
		<script type="text/javascript">
        $(document).on('pageinit', function(){
			
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
            $(document).on("click", ".infoHover", function(){
		        if($("#"+$(this).attr("id")+"Text").val().length > 0 || $("#"+$(this).attr("id")+"URL").val().length > 0){
                    $("#helpText").html($("#"+$(this).attr("id")+"Text").val());
                    $("#helpURL").html($("#"+$(this).attr("id")+"URL").val());
			        $("#popup").html($("#hoverDiv").html()).popup("open");
                    $("#default").page("destroy");
                    $("#default").page();
                    $("#popup").css("top", "100px");
                    
		        }
	        });
	        $(document).on("click", "#infoHoverClose", function(){
                $("#helpText").html("");
               $("#helpURL").html("");
	        });
		});
		
        </script>
	 <?php echo COMPULSORY; ?>
      <?php
      include("mobile/page.output.php");
      ?>
      <form  enctype='multipart/form-data' id='newrequest' name="newrequest" action='process.php' method='post'>
      <div id="hoverDiv">
        <a href="#" data-rel="back" data-role="button" data-theme="a" data-icon="delete" data-iconpos="notext" class="ui-btn-left" id="infoHoverClose">Close</a>
        <div data-role="header">
        <h1>Help</h1>
        </div>
        <div data-role="content">
    	    <span id="helpText"></span><br />
            <span id="helpURL"></span>
        </div>
      </div>
      
     	 <div data-role="collapsible" class="col" data-collapsed="false" data-content-theme="c">
         	<h4>Request Details</h4>
            <p>
              <label>Keyword</label>
              
                      <input  class="text" name='keyword' id="keywordSearch" maxlength='15' placeholder="Search...">
                  
              <input type="hidden" name='service' id="service" >
                    <input type="hidden" id="service_helpText" />
                <input type="hidden" id="service_helpURL" />
    	        <div class="info"><img class="infoHover" id="service_help" src="images/hoverInfo.png"  /></div>
              <label>Service<span style="color:red;">*</span></label>
              
                      <input class="text required" name='serviceInput' id="serviceInput"  placeholder="Search..." value='<?php if(isset($_SESSION['rem_serviceInput'])){ echo $_SESSION['rem_serviceInput']; } ?>'>
                     
                      
                      <input type="hidden" name='request' id="request" >
                    <input type="hidden" id="request_helpText" />
                <input type="hidden" id="request_helpURL" />
    	        <div class="info"><img class="infoHover" id="request_help" src="images/hoverInfo.png"  /></div>
              <label>Request<span style="color:red;">*</span></label>
              
                      <input class="text required" disabled="disabled" name='requestInput' placeholder="Search..." id="requestInput" value='<?php if(isset($_SESSION['rem_requestInput'])){ echo $_SESSION['rem_requestInput']; } ?>'>
                     
                      
                      <input type="hidden" name='function' id="function" >
                   <input type="hidden" id="function_helpText" />
                <input type="hidden" id="function_helpURL" />
    	        <div class="info"><img class="infoHover" id="function_help" src="images/hoverInfo.png"  /></div>
              <label>Function<span id="functionRequired" style="color:red; display:none;">*</span></label>
              
                      <input class="text" disabled="disabled" name='functionInput' placeholder="Search..." id="functionInput" value='<?php if(isset($_SESSION['rem_functionInput'])){ echo $_SESSION['rem_functionInput']; } ?>'>
                   
    <input type="hidden" name="workflowInd" id="workflowInd">
    <input type="hidden" name="countOnly" id="countOnly" value="0">
    
              <input type="hidden" id="chkCount" val="0" />
              <label>Reference Number</label>
              <input name='refno' maxlength='15' value='<?php if(isset($_SESSION['rem_refno'])){ echo $_SESSION['rem_refno']; } ?>'>
              <?php
                if(isset($_SESSION['roleSecurity']->maint_priority) && $_SESSION['roleSecurity']->maint_priority == "Y"){
                    ?>
                   <label>Priority</label>
                  <?php $controller->Dropdown("Priorities", "Priorities"); ?>
              <?php
                }
                ?>
              <label>Request Description<span style="color:red;">*</span></label>
              <textarea id="add-request-textarea" rows="4" class="text request-issue required" name='issue' id='textareaissue' maxlength='2000'><?php if(isset($_SESSION['rem_issue'])){ echo $_SESSION['rem_issue']; } ?></textarea>
              </p>
         </div>
		<div id="udfs" style="display:none;">
             <div data-role="collapsible" class="col" data-content-theme="c">
                <h4>User Defined Fields</h4>
                <p id="global-udfs">
                </p>
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
       </div>
        
       <div data-role="collapsible" class="col" data-content-theme="c">
         	<h4>Location Details</h4>
           
          <P>
           <label>Google Maps</label>
               <div id="map-canvas"></div>
                <input type="button" value="Use This Address" id="gmaps_Use" data-role="button" />
                <input type="hidden" id="address" name="address" value="<?php if(defined("DEFAULT_ADDRESS")) echo DEFAULT_ADDRESS; ?>" />
                <input type="hidden" id="gmaps_Number" />
                <input type="hidden" id="gmaps_FNumber" />
                <input type="hidden" id="gmaps_StreetName" />
                <input type="hidden" id="gmaps_StreetType" />
                <input type="hidden" id="gmaps_Suburb" />
                <input type="hidden" id="gmaps_x" name="gmaps_x" />
                <input type="hidden" id="gmaps_y" name="gmaps_y" />
                <input type="hidden" id="use_gmaps_coord" name="use_gmaps_coord" value="0" />
                <input type="hidden" id="address_gps" name="address_gps"/>
                <input type="hidden" id="defaultLat" value="-37.814107" />
                 <input type="hidden" id="defaultLng" value="144.96328" />
                <label>Facility Type</label>
                      <input class="text"  placeholder="Search..." name='facilityTypeInput' id="facilityTypeInput" value='<?php if(isset($_SESSION['rem_facilityTypeInput'])){ echo $_SESSION['rem_facilityTypeInput']; } ?>'>
                      <input type="hidden" name='facilityTypeId' id="facilityTypeId" value='<?php if(isset($_SESSION['rem_facilityTypeId'])){ echo $_SESSION['rem_facilityTypeId']; } ?>'>
                      <label>Facility Name</label>
                      <input class="text"  placeholder="Search..." name='facilityInput' id="facilityInput" value='<?php if(isset($_SESSION['rem_facilityInput'])){ echo $_SESSION['rem_facilityInput']; } ?>'>
                      <input type="hidden" name='facilityId' id="facilityId" value='<?php if(isset($_SESSION['rem_facilityId'])){ echo $_SESSION['rem_facilityId']; } ?>'>
                      <input type="hidden" name='addressId' id="addressId" />
                      
                      <label>Flat/Unit Number</label>
                      <input name='lfaddno' onChange="changeLocationType()" id="lfno" maxlength='15' value='<?php if(isset($_SESSION['rem_loc_address_number'])){ echo $_SESSION['rem_loc_address_number']; } ?>'>
                      
                      <label>Street Number<span style="color:red;">*</span></label>
                      <input name='lno' onChange="changeLocationType()" class="required" id="lno" maxlength='15' value='<?php if(isset($_SESSION['rem_loc_address_fnumber'])){ echo $_SESSION['rem_loc_address_fnumber']; } ?>'>
                      
                      <label>Street<span style="color:red;">*</span></label>
                      
                          <input class="required" placeholder="Search..." name='lstreet' onChange="changeLocationType()" id="lstreet" maxlength='100' value='<?php if(isset($_SESSION['rem_lstreet'])){ echo $_SESSION['rem_lstreet']; } ?>'></label>
                      
                      
                      <label>Type<span style="color:red;">*</span></label>
                      
                          <input class="required" placeholder="Search..." disabled="disabled" name='ltype' onChange="changeLocationType()" id="ltype" maxlength='100' value='<?php if(isset($_SESSION['rem_ltype'])){ echo $_SESSION['rem_ltype']; } ?>'></label>
                      
                      
                      <label>Suburb<span style="color:red;">*</span></label>
                      
                          <input class="required" placeholder="Search..."disabled="disabled" name='lsuburb' onChange="changeLocationType()" id="lsuburb" maxlength='100' value='<?php if(isset($_SESSION['rem_lsuburb'])){ echo $_SESSION['rem_lsuburb']; } ?>'></label>
                      
                      
                      <label>Description</label>
                      <input name='ldesc' onChange="changeLocationType()" id="ldesc" maxlength='50' value='<?php if(isset($_SESSION['rem_loc_address_desc'])){ echo $_SESSION['rem_loc_address_desc']; } ?>'>
            </P>
           </div>
           <div data-role="collapsible" class="col" data-content-theme="c">
         	<h4>Customer Details</h4>
            <p>
          		<input type="button" id="myDetails" value="My Details" data-role="button" />
                <input type="button" id="clearDetails" value="Clear" data-role="button" />
                      
                      <label>Title</label>
                      <input class="getlist" name='cust_title' id='pref_title' maxlength='5' value='<?php if(isset($_SESSION['rem_cust_title'])){ echo $_SESSION['rem_cust_title']; } ?>'></label>
                      
                      <label>Given</label>
                      <input class="getlist" name='cust_given' id='given' maxlength='30' value='<?php if(isset($_SESSION['rem_cust_given'])){ echo $_SESSION['rem_cust_given']; } ?>' >
                      
                      <label>Surname</label>
                      <input class="getlist" name='cust_surname' id='surname' maxlength='30' value='<?php if(isset($_SESSION['rem_cust_surname'])){ echo $_SESSION['rem_cust_surname']; } ?>'>  
                      
                      <label>Phone</label>
                      <input class="getlist" name='cust_phone' id='cust_phone' maxlength='12' value='<?php if(isset($_SESSION['rem_cust_phone'])){ echo $_SESSION['rem_cust_phone']; } ?>'>
                      
                      <label>Mobile</label>
                      <input class="getlist" name='cust_mobile' id='cust_mobile'  maxlength='12' value='<?php if(isset($_SESSION['rem_cust_mobile'])){ echo $_SESSION['rem_cust_mobile']; } ?>'>
                      
                      <label>Work</label>
                      <input class="getlist" name='cust_work' id='cust_work' maxlength='12' value='<?php if(isset($_SESSION['rem_cust_work'])){ echo $_SESSION['rem_cust_work']; } ?>'>
                      
                      <label>Email</label>
                      <input class="getlist" name='cust_email' id='email_address' maxlength='50' value='<?php if(isset($_SESSION['rem_cust_email'])){ echo $_SESSION['rem_cust_email']; } ?>'>
                      
                      <label>Company</label>
                      <input class="getlist" name='cust_company' id='company' maxlength='50' value='<?php if(isset($_SESSION['rem_cust_company'])){ echo $_SESSION['rem_cust_company']; } ?>'>
                      
                      <label>Customer Type</label>
                   
                          <?php $controller->Dropdown("CustomerTypes", "CustomerTypes"); ?>
                         
                    
                      <input type="hidden" name="name_id" id="name_id" value="0" />
                       <input type="hidden" name="name_origin" id="name_origin" value="" />
                      <input type="hidden" name="name_ctr" id="name_ctr" value="0" />
                  </ul>
              </p>
            </div>
           <div data-role="collapsible" class="col" data-content-theme="c">
         	<h4>Customer Address</h4>
            
          <p>
               
                      <label>Customer Resides</label>
                      
                          <select class="text" name="same" id="same" onChange="changeLocationType();">
                                  <option value='i'>Inside Council Area</option>
                                  <option value='o'>Outside Council Area</option>
                                  <option value='s'>Same as Location</option>
                          </select>
                          </label>
                      
                      
                      <div id="inside_ca" style="display:block;">
                          <label>Flat/Unit Number</label>
                          <input name='i_cfaddno' id="i_cfno" maxlength='15' value='<?php if(isset($_SESSION['rem_cust_address_number'])){ echo $_SESSION['rem_cust_address_number']; } ?>'>
                          
                          <label>Street Number</label>
                          <input name='i_cno' id="i_cno" maxlength='15' value='<?php if(isset($_SESSION['rem_cust_address_fnumber'])){ echo $_SESSION['rem_cust_address_fnumber']; } ?>'>
                          
                          <label>Street</label>
                          
                              <input name='i_cstreet' placeholder="Search..." id="i_cstreet" maxlength='100' value='<?php if(isset($_SESSION['rem_i_cstreet'])){ echo $_SESSION['rem_i_cstreet']; } ?>'>
                          
                          
                          <label>Type</label>
                          
                              <input name='i_ctype' placeholder="Search..." id="i_ctype"disabled="disabled"  maxlength='100' value='<?php if(isset($_SESSION['rem_i_csuburb'])){ echo $_SESSION['rem_i_ctype']; } ?>'>
                          
                          
                          <label>Suburb</label>
                          
                              <input  name='i_csuburb' placeholder="Search..." id="i_csuburb"disabled="disabled"  maxlength='100' value='<?php if(isset($_SESSION['rem_i_csuburb'])){ echo $_SESSION['rem_i_csuburb']; } ?>'>
                          
                          
                          <label>Description</label>
                          <input name='i_cdesc' id="i_cdesc" maxlength='50' value='<?php if(isset($_SESSION['rem_cust_address_desc'])){ echo $_SESSION['rem_cust_address_desc']; } ?>'>
                          
                          <input type="hidden" name="cust_address_id" id="cust_address_id" value="0" />
                          <input type="hidden" name="cust_address_ctr" id="cust_address_ctr" value="0" />
                      </div>
                      <div id="outside_ca" style="display:none">
                          <label>Flat/Unit Number</label>
                          <input name='o_cfaddno' onChange="changeLocationType()" id="o_cfno" maxlength='15' value='<?php if(isset($_SESSION['rem_cust_address_number'])){ echo $_SESSION['rem_cust_address_number']; } ?>'>
                          
                          <label>Street Number</label>
                          <input name='o_cno' onChange="changeLocationType()" id="o_cno" maxlength='15' value='<?php if(isset($_SESSION['rem_cust_address_fnumber'])){ echo $_SESSION['rem_cust_address_fnumber']; } ?>'>
                          
                          <label>Street</label>
                          <input name='o_cstreet' id="o_cstreet" onChange="changeLocationType()" maxlength='50' value='<?php if(isset($_SESSION['rem_cust_address_street'])){ echo $_SESSION['rem_cust_address_street']; } ?>'>
                          
                         <label>Type</label>
                          <input name='o_ctype' id="o_ctype" onChange="changeLocationType()" maxlength='50' value='<?php if(isset($_SESSION['rem_cust_address_streettype'])){ echo $_SESSION['rem_cust_address_streettype']; } ?>'>
                          
                          <label>Suburb</label>
                          <input name='o_csuburb' id="o_csuburb" onChange="changeLocationType()" maxlength='50' value='<?php if(isset($_SESSION['rem_cust_address_suburb'])){ echo $_SESSION['rem_cust_address_suburb']; } ?>'>
                          
                          <label>Description</label>
                          <input name='o_cdesc' id="o_cdesc" onChange="changeLocationType()" maxlength='50' value='<?php if(isset($_SESSION['rem_cust_address_desc'])){ echo $_SESSION['rem_cust_address_desc']; } ?>'>
                      </div>
                  </ul>
              </p>
			</div>
             <?php
            $dev = new Mobile_Detect();
            if(!$dev->isWindowsMobileOS()){
                ?>
          <div data-role="collapsible" class="col" data-content-theme="c">
         	<h4>Attachment</h4>
            
          <p>
          <input id="attachment" type="file" name="attachment" />
         <label>Description:</label><input type="text" id="desc" maxlength="50"  name="desc" />
          </p>
          </div>
          <?php
            }
                ?>
          <input type="hidden" name="action" value="CreateRequest" />
          <div id="adhocOfficer">

          </div>
          <div id="submitButton"><input name="Submit input" type="submit" data-role="button" id="submit" value="Submit" /></div>
          
         
      
      </div>
      </form>
	<?php
	
}
else{
	$_SESSION['error_not_logged_in'] = 1;
	header("Location: index.php");	
}

foreach($_SESSION as $var => $data){
if(stristr($var, "rem_") && !stristr($var,"rem_udf")){
    unset($_SESSION[$var]);	
}
}
?>
	
</div>
