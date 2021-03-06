<?php

if(!isset($_GET['d'])){
    // If there is no tracked result, display the form to lodge requests
?>

<script src="inc/js/pages/js.new-request.js"></script>
<div id="error">
</div>

<div id="requestsCreated" class="subPageContainer" style="display:none">
     <?php $controller->Display("RequestsCreated", "RequestsCreated"); ?>
</div>

<div id="newRequest">
   
    <span style="color: red;"><b><?php echo COMPULSORY ?></b></span><br />

    <form enctype='multipart/form-data' id='newrequest' name="newrequest" action='process.php' method='post'>
        <input type="button" id="clicktrigger" name="clicktrigger" style="display:none" />
        <input type="hidden" name="lookup_enabled" id="lookup_enabled" value="<?php echo $_SESSION['roleSecurity']->maint_name_match; ?>" />
        <input type='hidden' name='udfs_exist' id='udfs_exist' value='0' />
        <input type="hidden" name="countonly_bypass" id="countonly_bypass" value="<?php echo $_SESSION['meritIni']['COUNTONLY_BYPASS_MAND_UDF']; ?>" />
        <input type="hidden" name="historysearchautoopenoff" id="historysearchautoopenoff" value="<?php echo $_SESSION['meritIni']['HISTORYSEARCHAUTOOPENOFF']; ?>" />
        <input type="hidden" name="historysearchopenclosed" id="historysearchopenclosed" value="<?php echo $_SESSION['meritIni']['HISTORYSEARCHOPENCLOSED']; ?>" />
        <input type="hidden" name="historyaddrtype" id="historyaddrtype" value="<?php echo $_SESSION['meritIni']['HISTORYADDRTYPE']; ?>" />
        <div class="summaryContainer">  
            <h1>Request Details</h1>
            <div>
                <input type="hidden" id="testing" value="" />
                <input type="hidden" id="checkforWorkflow" value="" />
                <input type="hidden" id="mydetsclicked" value="N" />           
                <input type="button" id="workflowSRF" value="Show Workflow" disabled="disabled" style="margin-top: 23px;margin-left: -25px;"/>                
                <?php if($_SESSION['EDMSAvailable'] == "Y" && $_SESSION['roleSecurity']->view_documents == "Y" && strtoupper($_SESSION['EDMSName']) != "DATAWORKS" ){ ?>
                <input type="button" value="<?php echo $_SESSION['EDMSName'];?> Search" class="openDocumentPopup" id="Documents" style="margin-top: 23px;margin-left: 5px;"/>
                
                <script type="text/javascript">
                    $(document).ready(function () {
                        $("#newDocument").change(function () {

                            var currentdocuments = $("#documentsToLink").val();
                            if (currentdocuments != "") {
                                if (currentdocuments.indexOf(selectedDocument) >= 0) {
                                    alert("You have already selected that document");
                                } else {
                                    if (confirm("Click OK to link this document when request is saved")) {
                                        $("#documentsToLink").val(currentdocuments + "-" + "_newDocument_" + $("#newDocument").val().split('\\').pop());
                                    }
                                }
                            } else {
                                if (confirm("Click OK to link this document when request is saved")) {
                                    $("#documentsToLink").val("_newDocument_" + $("#newDocument").val().split('\\').pop());
                                }
                            }
                        });

                    });
                </script>
                <input type="button" value="New <?php echo $_SESSION['EDMSName'];?> Document" onclick="$('#newDocument').click()"/>
                <input type="file" id="newDocument" name="newDocument[]" value="" style="display:none;"/>

                <input type="button" value="Booking" disabled style="visibility:hidden" id="event_booking" onclick="getEventBookingDetails()"  />
                <?php } ?>
                
                <div class="column r60">
                    <div class="column r25">
                        <label for="service">Keyword</label>
                        <input class="text" name='keyword' id="keywordSearch" maxlength='15' placeholder="Search...">
                    </div>

                    <div class="column r25">
                        <label for="service">Service<span style="color: red;"> *</span> </label>
                        <div class="info">
                            <img src="images/Info.png" class="infoHover" id="service_help" />
                        </div>

                        <input class="text required" name='serviceInput' id="serviceInput"  placeholder="Search..." value='<?php if(isset($_SESSION['rem_serviceInput'])){ echo $_SESSION['rem_serviceInput']; } ?>'>
                        <input type="hidden" name='service' id="service">
                        <input type="hidden" id="service_helpText" />
                        <input type="hidden" id="service_helpURL" />

                    </div>
                    <div class="column r25">
                        <label for="request">Request<span style="color: red;"> *</span></label>
                        <div class="info">
                            <img src="images/Info.png" class="infoHover" id="request_help" />
                        </div>
                        <input class="text required" name='requestInput' disabled="disabled" id="requestInput" value='<?php if(isset($_SESSION['rem_requestInput'])){ echo $_SESSION['rem_requestInput']; } ?>'>
                        <input type="hidden" name='request' id="request">
                        <input type="hidden" id="request_allowance" name="request_allowance" value="0"/>
                        <input type="hidden" id="need_r_booking" name="need_r_booking" />
                        <input type="hidden" id="request_helpText" />
                        <input type="hidden" id="request_helpURL" />

                    </div>
                    <div class="column r25">
                        <label for="function">Function<span id="functionRequired" style="color: red;"> *</span></label>
                        <div class="info">
                            <img src="images/Info.png" class="infoHover" id="function_help" />
                        </div>
                        <input class="text required checkNone" name='functionInput' disabled="disabled" id="functionInput" value='<?php if(isset($_SESSION['rem_functionInput'])){ echo $_SESSION['rem_functionInput']; } ?>'>
                        <input type="hidden" name='function' id="function">
                        <input type="hidden" id="need_f_booking" name="need_f_booking" />
                        <input type="hidden" id="function_allowance" name="function_allowance" value="0"/>
                        <input type="hidden" id="function_helpText" />
                        <input type="hidden" id="function_helpURL" />
                    </div>

                    <div class="float-left">
                        <?php
                        if(isset($_SESSION['roleSecurity']->show_reference_no) && $_SESSION['roleSecurity']->show_reference_no == "Y"){
                         ?>
                        <div class="column r25">
                            <label for="refno">Reference Number<span class="refer_no_label mandLabel" style="color: red; display: none;"> *</span></label>
                            <input  class="text"name='refno'id="refno" data-mand="refer_no" maxlength='15' value='<?php if(isset($_SESSION['rem_refno'])){ echo $_SESSION['rem_refno']; } ?>'>
                        </div>
                        <?php }
                        ?>
                        <?php if(isset($_SESSION['roleSecurity']->maint_priority) && $_SESSION['roleSecurity']->maint_priority == "Y"){
                        ?>
                        <div class="column r25">
                            <label for="refno">Priority</label>
                            <?php $controller->Dropdown("Priorities", "Priorities"); ?>
                        </div>
                        <?php }
                        ?>

                        <div class="column r25">
                            <?php if(isset($_SESSION['roleSecurity']->show_request_type) && $_SESSION['roleSecurity']->show_request_type == "Y"){?>                        
                                <label for="refno">Request Type<span class="request_type_label mandLabel" style="color:red;display:none;"> *</span></label>
                                <?php $controller->Dropdown("RequestTypesDD", "RequestTypes"); ?>
                            <?php } ?>

                        </div>
                        <div class="column r25">
                            <br /><br />
                            <?php if($_SESSION['notify_insurance'] == "Y") { ?>
                            <label for="notifyInsuranceOfficer">Notify Insurance Officer</label>
                            <input type="checkbox" name="notifyInsuranceOfficer" value="Y"> 
                            <?php } ?>
                            <br />
                       <!-- <label for="duedate">Due Date: </label>-->
                            <span id="duedate"></span>
                            <input type="hidden" id="due" name="due" />
                        </div>
                    </div>

                    <input type="hidden" name="workflowInd" id="workflowInd">
                    <input type="hidden" name="countOnly" id="countOnly" value="0">

                    <div class="hoverDiv">
                            <div><h1>Helpnotes <img src="images/delete-icon.png" id="infoHoverClose" style="float: right; cursor: pointer;" /></h1></div>
                            <div class="scrollText">
                                <span id="helpText"><textarea id="helpText_data" readonly="readonly" disabled="disabled" style="height:200px"></textarea></span>
                                <br />
                                <span id="helpURL"></span>
                            </div>
                    <input type="hidden" name="chkCount" id="chkCount" value="0" />
                </div>
                <br />
                <div class="float-left">
                    <b><span id="rednote"></span></b>
                </div>                     
                <div class="float-left">
                    <label for="issue">Request Description<span class="request_description_label mandLabel" style="color: red""> *</span></label>
                    <textarea rows="2" spellcheck="true" class="text request-issue" name='issue' id='textareaissue' data-mand="request_description" maxlength='2000'><?php if(isset($_SESSION['rem_issue'])){ echo $_SESSION['rem_issue']; } ?></textarea>
                </div>
            </div>
        </div>
        <div id="udfs" style="display: none;">

            <div class="summaryContainer"> <!-- global udfs go here -->
                <h1>User Defined Fields</h1>
                <div>
                    <div style="margin-right: 24px;" id="global-udfs">
                    </div>
                </div>
            </div>

        </div>
        <?php
    if(isset($_SESSION['rem_service'])){
        if(strlen($_SESSION['rem_service']) > 1){
        ?>
        <script type="text/javascript">
            QueryUDFs('<?php echo $_SESSION['rem_function']; ?>', '<?php echo $_SESSION['rem_request']; ?>', '<?php echo $_SESSION['rem_service']; ?>');
            $("#udf_exist").val("1");
        </script>
        <?php
        }
    }
        ?>
        <div class="summaryContainer">
            <h1>Location Address</h1>
            <div>
                <div class="column r50">
                    <div class="float-left">
                        <div class="column r25">
                            <label for="facilityTypeInput">Facility Type</label>
                            <input class="text" name='facilityTypeInput' id="facilityTypeInput"  placeholder="Search..." value='<?php if(isset($_SESSION['rem_facilityType'])){ echo $_SESSION['rem_facilityType']; } ?>'>
                            <input type="hidden" name='facilityTypeId' id="facilityTypeId">
                        </div>
                        <div class="column r25">
                            <label for="facilityInput">Facility Name<span class="facility_label mandLabel" style="color: red; display:none;"> *</span></label>
                            <input class="text" name='facilityInput' id="facilityInput" data-mand="facility" placeholder="Search..." value='<?php if(isset($_SESSION['rem_facility'])){ echo $_SESSION['rem_facility']; } ?>'>
                            <input type="hidden" name='facilityId' id="facilityId">
                            <input type="hidden" name='addressId' id="addressId" />
                            <input type="hidden" name='officerName' id="officerName" />
                            <input type="hidden" name='facilityDesc' id="facilityDesc" />
                        </div>
                        <div class="column r25">
                            <label for="ResponsibleInput">Responsible</label>
                            <input class="text" name='responsible' onChange="" readonly="readonly" id="responsible" value=''>
                        </div>
                        <div class="column r25">
                            <label for="ResponsibleInput">Facility Description</label>
                            <input class="text" name='facilitydescription' onChange="" readonly="readonly"  id="facilitydescription" value=''>
                        </div>
                    </div>
                    <div class="column r25">
                        <label for="lfno">Flat/Unit Number</label>
                        <input class="text" name='lfaddno' onChange=""  id="lfno" maxlength='15' value='<?php if(isset($_SESSION['rem_lfaddno'])){ echo $_SESSION['rem_lfaddno']; } ?>'>
                    </div>
                    <div class="column r25">
                        <label for="lno">Street Number</label>
                        <input class="text" name='lno' onChange="" id="lno" maxlength='15' value='<?php if(isset($_SESSION['rem_lno'])){ echo $_SESSION['rem_lno']; } ?>'>
                        <input type="hidden" id="newLno" name="newLno" />
                    </div>
                    
                    <div class="column r25">
                        <label for="lstreet">Street Name<span class="location_address_label mandLabel" style="color: red; display:none;"> *</span></label>
                        <input class="text checkNone" name='lstreet' onChange="" id="lstreet" data-mand="location_address"  maxlength='100' value='<?php if(isset($_SESSION['rem_lstreet'])){ echo $_SESSION['rem_lstreet']; } ?>'>
                    </div>
                    <div class="column r25">
                        <label for="ltype">Street Type<span class="location_address_label mandLabel" style="color: red; display:none;"> *</span></label>
                        <input class="text checkNone" name='ltype' onChange="" id="ltype" data-mand="location_address" disabled="disabled" maxlength='100' value='<?php if(isset($_SESSION['rem_ltype'])){ echo $_SESSION['rem_ltype']; } ?>'>
                        
                    </div>
                    <div class="float-left">
                        <div class="column r25">
                            <label for="lsuburb">Suburb<span class="location_address_label mandLabel" style="color: red; display:none;"> *</span></label>
                            <input class="text checkNone" name='lsuburb' onChange="" id="lsuburb" data-mand="location_address"  disabled="disabled" maxlength='100' value='<?php if(isset($_SESSION['rem_lsuburb'])){ echo $_SESSION['rem_lsuburb']; } ?>'>

                        </div>
                        <div class="column r25">
                            <label for="lpostcode">Postcode</label>
                            <input class="text checkNone" name='lpostcode' onChange="" id="lpostcode" data-mand="location_postcode" maxlength='100' value=''>
                        </div>
                        <div class="column r25">
                        <label>Property Number</label>
                        <input readonly="readonly" name='property_no' id="property_no" maxlength='100' value="">
<!--                            <input type="hidden" name="lpostcode" id="lpostcode" />-->
                        </div>
                        </div>
                    <div class="float-left">
                        <div class="column r25">
                            <label for="lroad_type">Road Type</label>
                            <input class="text checkNone" name='lroad_type' onChange="" id="lroad_type" data-mand="lroad_type" maxlength='100' value=''>
                        </div>
                        <div class="column r25">
                            <label for="lroad_responsibility">Road Responsiblity</label>
                            <input class="text checkNone" name='lroad_responsibility' onChange="" id="lroad_responsibility" data-mand="lroad_responsibility" maxlength='100' value=''>
                            <input type="hidden" name="larea_group" id="larea_group" />
                        </div>	
                        <div class="column r100">
                            <label for="ldesc">Description</label>
                            <textarea name="ldesc" id="ldesc" onChange="changeLocationType()" style="resize:none; height:4em" maxlength='1000' value='<?php if(isset($_SESSION['rem_ldesc'])){ echo $_SESSION['rem_ldesc']; } ?>'></textarea>
                        </div>

                        <div class="column r100">
                            <br />
                            <input type="button" value="Clear" onclick="clearLocationAddress()" />
                            <!--<input type="button" value="History" id="checkHistory" onclick="CheckHistoryDirect('L', 'N')" disabled="disabled" />-->
                            <input type="button" value="Summary" disabled id="AddrSummary" onclick="ViewAddressDetails()"  />
                            <script type="text/javascript">  var date = new Date().toISOString(); </script>
                            <input type="button" value="Booking" disabled style="visibility:hidden" id="AddrBooking" onclick="GetBookingSummary(date)"  />
                            <!--<input type="button" value="Fac Summary" id="FacSummary" onclick="" disabled="disabled" />-->
                        </div>
                    </div>
                </div>
                <div class="column r50">
                    <div id="map-canvas"></div>
                    <input type="hidden" id="address" name="address" value="<?php if(defined("DEFAULT_ADDRESS")) echo DEFAULT_ADDRESS; ?>" />
                    <input type="hidden" id="defaultLat" value="-37.814107" />
                    <input type="hidden" id="defaultLng" value="144.96328" />
                    <input type="button" value="Use This Address" id="gmaps_Use" />
                    <input type="button" value="Full Screen" id="gmaps_FS" onclick="fullScreen()" />
                    <input type="button" value="Close" id="gmaps_SS" onclick="closeFullScreen()" />
                    <input type="hidden" id="gmaps_Number" />
                    <input type="hidden" id="gmaps_FNumber" />
                    <input type="hidden" id="gmaps_StreetName" />
                    <input type="hidden" id="gmaps_StreetType" />
                    <input type="hidden" id="gmaps_Suburb" />
                    <input type="hidden" id="gmaps_PostCode" />
                    <input type="hidden" id="use_gmaps_coord" name="use_gmaps_coord" value="0" />
                    <input type="hidden" id="gmaps_x" name="gmaps_x" />
                    <input type="hidden" id="gmaps_y" name="gmaps_y" />
                    <input type="hidden" id="address_gps" name="address_gps" />
                    <input type="hidden" name="loc_address" id="loc_address" value="" />
                    <input type="hidden" name="loc_address_ctr" id="loc_address_ctr" />
                    <input type="hidden" name="process_allowance" id="process_allowance" value="No" /> 
                    <input type="hidden" name="chk_showall" id="chk_showall" value="No" />                   
                </div>
            </div>
        </div>

        

        <div class="float-left">
            <div class="column r50">
                <div class="summaryContainer" id="nameLookupDiv">
                    <h1>Customer Name</h1>
                    <div>
                        
                        <div class="column r50">

                            <label class="inline">Customer Type</label><br/>
                            <?php $controller->Dropdown("CustomerTypes", "CustomerTypes"); ?>
                            <input type="button" name="myDetails" id="myDetails" value="My Details" />
                            <input type="button" name="clearDetails" id="clearDetails" value="Clear" />
                            <input type="button" value="Summary" disabled id="CustSummary" onclick="ViewCustomerDetails()" />
                            <input type="hidden" id="respCode" value="" />

                            <?php if($_SESSION['EDMSAvailable'] == "Y" && $_SESSION['roleSecurity']->view_documents == "Y" && strtoupper($_SESSION['EDMSName']) != "DATAWORKS"){ ?>
                            <input type="button" class="openDocumentPopup" name="customerInfoXpert" id="customerInfoXpert" value="<?php echo $_SESSION['EDMSName'];?>" disabled="disabled" />
                            <?php } ?> 
                        </div>
                        <div class="float-left">
                            <div class="column r25">
                                <label for="pref_title">Title<span class="pref_title_label mandLabel" style="color:red; display:none;"> *</span></label>
                                <input  class="text" name='cust_title' data-mand="pref_title" id="pref_title" maxlength='5' value='<?php if(isset($_SESSION['rem_cust_title'])){ echo $_SESSION['rem_cust_title']; } ?>' onChange="capitalise('pref_title')">
                            </div>
                            <div class="column r25">
                                <label for="given">Given<span class="given_name_label mandLabel" style="color:red; display:none;"> *</span></label>
                                <input class="text" name='cust_given' data-mand="given_name" id="given" maxlength='30' value='<?php if(isset($_SESSION['rem_cust_given'])){ echo $_SESSION['rem_cust_given']; } ?>' onChange="capitalise('given')">
                            </div>
                            <div class="column r25">
                                <label for="surname">Surname<span class="surname_label mandLabel" style="color:red; display:none;"> *</span></label>
                                <input class="text getlist" name='cust_surname' data-mand="surname" id="surname" maxlength='30' value='<?php if(isset($_SESSION['rem_cust_surname'])){ echo $_SESSION['rem_cust_surname']; } ?>' onChange="capitalise('surname')">
                            </div>
                            <div class="column r25">
                                <label for="company">Company<span class="company_name_label mandLabel" style="color:red; display:none;"> *</span></label>
                                <input class="text getlist" name='cust_company' id="company" data-mand="company_name" maxlength='50' value='<?php if(isset($_SESSION['rem_cust_company'])){ echo $_SESSION['rem_cust_company']; } ?>' onChange="capitalise('company')">
                            </div>
                        </div>
                        <div class="float-left">
                            <div class="column r25">
                                <label for="mobile">Mobile<span class="mobile_no_label mandLabel" style="color:red; display:none;"> *</span></label>
                                <input class="text getlist" name='cust_mobile' id="cust_mobile" data-mand="mobile_no" maxlength='12' value='<?php if(isset($_SESSION['rem_cust_mobile'])){ echo $_SESSION['rem_cust_mobile']; } ?>'>
                            </div>
                            <div class="column r25">    
                                <label for="phone">Phone<span class="telephone_label mandLabel" style="color:red; display:none;"> *</span></label>
                                <input class="text getlist" name='cust_phone' id="cust_phone" data-mand="telephone" maxlength='12' value='<?php if(isset($_SESSION['rem_cust_phone'])){ echo $_SESSION['rem_cust_phone']; } ?>'>
                            </div>
                            <div class="column r25">    
                                <label for="work">Work<span class="work_phone_label mandLabel" style="color:red; display:none;"> *</span></label>
                                <input class="text getlist" name='cust_work' id="cust_work" data-mand="work_phone" maxlength='12' value='<?php if(isset($_SESSION['rem_cust_work'])){ echo $_SESSION['rem_cust_work']; } ?>'>
                            </div>
                            <div class="column r25">  
                                <label for="email">Email<span class="email_address_label mandLabel" style="color:red; display:none;"> *</span></label>
                                <input class="text getlist email" name='cust_email' id='email_address' data-mand="email_address" maxlength='50' value='<?php if(isset($_SESSION['rem_cust_email'])){ echo $_SESSION['rem_cust_email']; } ?>'>
                            </div>
                            <div class="column r100">
                                <br />
                                <br />
                                <br />
                                <br />
                                <br />
                            </div>
                        </div>
                        <input type="hidden" name="name_id" id="name_id"/>
                        <input type="hidden" name="name_origin" id="name_origin" />
                        <input type="hidden" name="name_ctr" id="name_ctr"  />
                        <input type="hidden" name="old_name_id" id="old_name_id" />
                        <input type="hidden" name="old_pref_title" id="old_pref_title" />
                        <input type="hidden" name="old_surname" id="old_surname" />
                        <input type="hidden" name="old_given" id="old_given" />
                        <input type="hidden" name="old_cust_phone" id="old_cust_phone" />
                        <input type="hidden" name="old_cust_work" id="old_cust_work" />
                        <input type="hidden" name="old_cust_mobile" id="old_cust_mobile" />
                        <input type="hidden" name="old_email_address" id="old_email_address" />
                        <input type="hidden" name="old_company" id="old_company" />
                    </div>
                </div>
            </div>
            

            <!-- ------------------------------------------------------- -->
            <!-- Start Customer Section -->
            <!-- ------------------------------------------------------- -->


            <div class="column r50forceright">
                <div class="summaryContainer">
                    <h1>Customer Address</h1>
                    <div>
                        <div class="float-left">
                            <div class="column r50">
                                <label for="same">Customer Resides</label>
                                <br/>
                                <select class="text" name="same" id="same" onchange="changeLocationType();" style="width:200px">

                                    <?php
                                if(isset($_SESSION['rem_same'])){
                                    if($_SESSION['rem_same'] == "s"){
                                        ?>
                                        <option value='s'>Same as Location</option>
                                        <option value='i'>Inside Council Area</option>
                                        <option value='o'>Outside Council Area</option>
                                        <?php	
                                    } elseif($_SESSION['rem_same'] == "i"){
                                        ?>
                                        <option value='i'>Inside Council Area</option>
                                        <option value='s'>Same as Location</option>
                                        <option value='o'>Outside Council Area</option>
                                        <?php	
                                    } elseif($_SESSION['rem_same'] == "o"){
                                        ?>
                                        <option value='o'>Outside Council Area</option>
                                        <option value='s'>Same as Location</option>
                                        <option value='i'>Inside Council Area</option>
                                        <?php	
                                    }
                                } else{
                                    ?>
                                    <option value='i'>Inside Council Area</option>
                                    <option value='o'>Outside Council Area</option>
                                    <option value='s'>Same as Location</option>
                                    <?php
                                 } ?>
                                </select>

                                <input type="button" value="Clear" onclick="clearCustomerAddress()" />
                                <input type="button" value="Summary" disabled id="CustAddSummary" onclick="ViewCustomerAddDetails()"  />
                            </div>
                        </div>

                        <div id="inside_ca" style="display: block;">

		                        <div class="column r20">
		                            <label for="i_cfno">Flat/Unit Number</label>
		                            <input class="text cadd" name='i_cfno' onChange="" id="i_cfno"maxlength='15' value='<?php if(isset($_SESSION['rem_i_cno'])){ echo $_SESSION['rem_i_cno']; } ?>'>
		                        </div>
		                        <div class="column r15">
		                            <label for="i_cfcode">Unit Suffix</label>
		                            <input class="text cadd" name='i_cfcode' onChange="" id="i_cfcode"maxlength='15' value='<?php if(isset($_SESSION['rem_i_cno'])){ echo $_SESSION['rem_i_cno']; } ?>'>
		                        </div>

		                        <div class="column r20">
		                            <label for="i_cno">Street Number</label>
		                            <input class="text cadd" name='i_cno' onChange="" id="i_cno"  maxlength='15' value='<?php if(isset($_SESSION['rem_i_cfaddno'])){ echo $_SESSION['rem_i_cfaddno']; } ?>'>
		                        </div>
		                        <div class="column r15">
		                            <label for="i_cscode">Street Suffix</label>
		                            <input class="text cadd" name='i_cscode' onChange="" id="i_cscode"  maxlength='15' value='<?php if(isset($_SESSION['rem_i_cfaddno'])){ echo $_SESSION['rem_i_cfaddno']; } ?>'>
		                        </div>

		                        <div class="column r25">
		                            <label for="i_cstreet">Street Name<span class="customer_address_label mandLabel" style="color: red; display:none;"> *</span></label>
		                            <input class="text cadd checkNone" name='i_cstreet'  id="i_cstreet" data-mand="customer_address"  maxlength='100' value='<?php if(isset($_SESSION['rem_i_cstreet'])){ echo $_SESSION['rem_i_cstreet']; } ?>'>
		                            <input type="hidden" name="comparei_cstreet" id="comparei_cstreet" />
		                        </div>

                            <div class="float-left">
		                        <div class="column r25">
		                            <label for="i_ctype">Street Type<span class="customer_address_label mandLabel" style="color: red; display:none;"> *</span></label>
		                            <input class="text cadd checkNone" name='i_ctype'  id="i_ctype" data-mand="customer_address" disabled="disabled" maxlength='100' value='<?php if(isset($_SESSION['rem_i_ctype'])){ echo $_SESSION['rem_i_ctype']; } ?>'>
		                            <input type="hidden" name="comparei_ctype" id="comparei_ctype" />
		                        </div>
	                            <div class="column r25">
	                                <label for="i_csuburb">Suburb<span class="customer_address_label mandLabel" style="color: red; display:none;"> *</span></label>
	                                <input class="text cadd checkNone" name='i_csuburb' onchange="" id="i_csuburb" data-mand="customer_address" disabled="disabled" maxlength='100' value='<?php if(isset($_SESSION['rem_i_csuburb'])){ echo $_SESSION['rem_i_csuburb']; }  ?>'>
	                                <input type="hidden" name="comparei_csuburb" id="comparei_csuburb" />
	                            </div>
	                            <div class="column r20">
	                                <label for="i_cpostcode">Postcode</label>
	                                <input class="text cadd" name='i_cpostcode'  id="i_cpostcode" maxlength='6'>
	                                <input type="hidden" name="comparei_cpostcode" id="comparei_cpostcode" />
	                            </div>
                                <div class="column r25">
		                                <label for="i_cpropertynumber">Property Number</label>
		                                <input class="text cadd" name='i_cpropertynumber'  id="i_cpropertynumber" >
		                                <input type="hidden" name="comparei_cpropertynumber" id="comparei_cpropertynumber" />
		                            </div>
		                        </div>
		                            
		                            <div class="column r95">
		                                <label for="i_cdesc">Description</label>
		                                <textarea id="i_cdesc" name="i_cdesc" style="resize:none; height:4em" maxlength='1000' value='<?php if(isset($_SESSION['rem_i_cdesc'])){ echo $_SESSION['rem_i_cdesc']; } ?>'></textarea>
		                            </div>
		                        
                        </div>
                        <script type="text/javascript">
                            // REGEX to CHECK INPUTS
                            $('#i_cfno').keypress(function (e) {
                                var regex = new RegExp("^[0-9-?]+$");
                                var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
                                if (regex.test(str)) {
                                    return true;
                                }

                                e.preventDefault();
                                return false;
                            });
                            $('#i_cfcode').keypress(function (e) {
                                var regex = new RegExp("^[a-zA-Z]+$");
                                var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
                                if (regex.test(str)) {
                                    return true;
                                }

                                e.preventDefault();
                                return false;
                            });
                            $('#i_cno').keypress(function (e) {
                                var regex = new RegExp("^[0-9-?]+$");
                                var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
                                if (regex.test(str)) {
                                    return true;
                                }

                                e.preventDefault();
                                return false;
                            });
                            $('#i_cscode').keypress(function (e) {
                                var regex = new RegExp("^[a-zA-Z]+$");
                                var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
                                if (regex.test(str)) {
                                    return true;
                                }

                                e.preventDefault();
                                return false;
                            });
                        </script>


                        <div id="outside_ca" style="display: none;">

                                <div class="column r20">
		                            <label for="o_cfno">Flat/Unit Number</label>
		                            <input class="text " name='o_cfno' onChange="" id="o_cfno"maxlength='15' value='<?php if(isset($_SESSION['rem_i_cno'])){ echo $_SESSION['rem_i_cno']; } ?>'>
		                        </div>
		                        <div class="column r15">
		                            <label for="o_cfcode">Unit Suffix</label>
		                            <input class="text " name='o_cfcode' onChange="" id="o_cfcode"maxlength='15' value='<?php if(isset($_SESSION['rem_i_cno'])){ echo $_SESSION['rem_i_cno']; } ?>'>
		                        </div>

		                        <div class="column r20">
		                            <label for="o_cno">Street Number</label>
		                            <input class="text " name='o_cno' onChange="" id="o_cno"  maxlength='15' value='<?php if(isset($_SESSION['rem_i_cfaddno'])){ echo $_SESSION['rem_i_cfaddno']; } ?>'>
		                        </div>
		                        <div class="column r15">
		                            <label for="o_cscode">Street Suffix</label>
		                            <input class="text" name='o_cscode' onChange="" id="o_cscode"  maxlength='15' value='<?php if(isset($_SESSION['rem_i_cfaddno'])){ echo $_SESSION['rem_i_cfaddno']; } ?>'>
		                        </div>

                             <div class="column r25">
		                            <label for="o_cstreet">Street Name<span class="customer_address_label mandLabel" style="color: red; display:none;"> *</span></label>
		                            <input class="text checkNone" name='o_cstreet'  id="o_cstreet" data-mand="customer_address"  maxlength='100' value='<?php if(isset($_SESSION['rem_i_cstreet'])){ echo $_SESSION['rem_i_cstreet']; } ?>'>
		                            <input type="hidden" name="compareo_cstreet" id="compareo_cstreet" />
		                        </div>
                            <div class="float-left">
		                        <div class="column r25">
		                            <label for="o_ctype">Street Type<span class="customer_address_label mandLabel" style="color: red; display:none;"> *</span></label>
		                            <input class="text  checkNone" name='o_ctype'  id="o_ctype" data-mand="customer_address" maxlength='100' value='<?php if(isset($_SESSION['rem_i_ctype'])){ echo $_SESSION['rem_i_ctype']; } ?>'>
		                            <input type="hidden" name="compareo_ctype" id="compareo_ctype" />
		                        </div>
		    
	                            <div class="column r25">
	                                <label for="o_csuburb">Suburb<span class="customer_address_label mandLabel" style="color: red; display:none;"> *</span></label>
	                                <input class="text checkNone" name='o_csuburb' onchange="" id="o_csuburb" data-mand="customer_address" maxlength='100' value='<?php if(isset($_SESSION['rem_i_csuburb'])){ echo $_SESSION['rem_i_csuburb']; }  ?>'>
	                                <input type="hidden" name="compareo_csuburb" id="compareo_csuburb" />
	                            </div>
	                            <div class="column r20">
	                                <label for="o_cpostcode">Postcode</label>
	                                <input class="text" name='o_cpostcode'  id="o_cpostcode" maxlength='6'>
	                                <input type="hidden" name="compareo_cpostcode" id="compareo_cpostcode" />
	                            </div>
                                <div class="column r25">
	                                <label for="o_cpobox">PO Box / DX </label>
	                                <input class="text" name='o_cpobox'  id="o_cpobox" maxlength='100'>
	                            </div>
                                </div>
                            <div class="float-left">
                                <div class="column r95">
                                    <label for="o_cdesc">Description</label>
                                    <textarea id="o_cdesc" name="o_cdesc" style="resize:none; height:4em" maxlength='1000' value='<?php if(isset($_SESSION['rem_o_cdesc'])){ echo $_SESSION['rem_o_cdesc']; } ?>'></textarea>
                                </div>
                            </div>
                        </div>

                        <script type="text/javascript">
                            // REGEX to CHECK INPUTS
                        $('#o_cfno').keypress(function (e) {
                                var regex = new RegExp("^[0-9-?]+$");
                                var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
                                if (regex.test(str)) {
                                    return true;
                                }

                                e.preventDefault();
                                return false;
                            });
                            $('#o_cfcode').keypress(function (e) {
                                var regex = new RegExp("^[a-zA-Z]+$");
                                var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
                                if (regex.test(str)) {
                                    return true;
                                }

                                e.preventDefault();
                                return false;
                            });
                            $('#o_cscode').keypress(function (e) {
                                var regex = new RegExp("^[a-zA-Z]+$");
                                var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
                                if (regex.test(str)) {
                                    return true;
                                }

                                e.preventDefault();
                                return false;
                            });
                            $('#o_cno').keypress(function (e) {
                                var regex = new RegExp("^[0-9-?]+$");
                                var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
                                if (regex.test(str)) {
                                    return true;
                                }

                                e.preventDefault();
                                return false;
                            });
                            </script>

                            <input type="hidden" name="old_custid" id="old_custid" />
		                    <input type="hidden" name="old_cstreet" id="old_cstreet" />
		                    <input type="hidden" name="old_ctype" id="old_ctype" />
		                    <input type="hidden" name="old_csuburb" id="old_csuburb" />
		                    <input type="hidden" name="old_cpostcode" id="old_cpostcode" />
		                    <input type="hidden" name="old_cpropertynumber" id="old_cpropertynumber" />
		                    <input type="hidden" name="old_cno" id="old_cno" />
		                    <input type="hidden" name="old_suffix" id="old_suffix" />

		                    <input type="hidden" name="prefixholder" id="prefixholder" />
                        
                            <input type="hidden" name="cust_address_id" id="cust_address_id" />
                            <input type="hidden" name="comparecust_address_id" id="comparecust_address_id" />

                            <input type="hidden" name="cust_address_ctr" id="cust_address_ctr" />
                            <input type="hidden" name="comparecust_address_ctr" id="comparecust_address_ctr" />

                            <input type="hidden" name="cust_address" id="cust_address" value="" />
                    </div>
                </div>
               </div>
            </div>
             <br />
            <!-- End Customer Section -->
            <!-- ------------------------------------------------------- -->

       

        <div class="summaryContainer">
            <h1>Attachment</h1>
                <div class="column r100">
                    <div class="column r25">
                        <label for="desc">File</label>
                        <input  type="file" name="attachment[]" id="attachFile" />
                        <!--<label for="desc">File 2</label>
                        <input id="attachment" type="file" name="attachment[]" id="attachFile" />
                        <label for="desc">File 3</label>
                        <input id="attachment" type="file" name="attachment[]" id="attachFile" />-->

                    </div>
                    <div class="column r70">
                        <label for="desc">Description</label>
                        <input type="text" id="attachDesc" maxlength="50" name="attachDesc[]" />
                        <input type="hidden" id="attachDesc1" name="attachDesc[]" />
                        <input type="hidden" id="attachDesc2" name="attachDesc[]" />
                        <!--<label for="desc">Description 2</label>
                        <input type="hidden" id="attachDesc1" maxlength="50" name="attachDesc[]" />
                        <label for="desc">Description 3</label>
                        <input type="hidden" id="attachDesc2" maxlength="50" name="attachDesc[]" />-->
                    </div>
                </div>
                     
        </div>
        <p>&nbsp;</p>
        <input type="hidden" name="action" value="CreateRequest" />
        <input type="hidden" id="ok" value='0' />
<!--        <div id="Div1" style="display:none;"></div>-->
        <div id="adhocOfficer" style="display:none;"></div>

        <div id="submitButton">
            <!--<input id="submit" type='submit' value='Save' />-->
            <input name="Submit input" type="submit" data-role="button" id="submit" value="Submit" />
            <input id="saveMore" type='button' value='Save & More' />
            <?php if(isset($_SESSION['roleSecurity']->show_count_only) && $_SESSION['roleSecurity']->show_count_only == "Y"){?>
                <input id="saveCountOnly" type='button' value='Count Only'  />
            <?php } ?>
            <input id="reset" type='button' value='Reset'  />
        </div>

        <input type="hidden" name="saveCountOnly" id="countOnlyInd" value="N" />
        <input type="hidden" name="skipAdhoc" id="skipAdhocCount" value="0" />
        <input type="hidden" name="documentsToLink" id="documentsToLink" />
        <input type="hidden" name="btnclick" id="btnclick" value="" />
        <input type="hidden" name="deviceIndicator" id="deviceIndicator" value="pc" />
        <input type="hidden" name="edms_autosave_attach" id="edms_autosave_attach" />
        </div>
        
        <div class="popupDetail" id="DocumentsPopup">
        <script type="text/javascript">
            $(document).ready(function () {
                //hide search button if no value
                $('#searchDocument').attr('disabled', 'disabled');
                $('#linkbutton').attr('disabled', 'disabled');
                $('#searchterm').keyup(function () {
                    if ($(this).val() != '') {
                        $('#searchDocument').removeAttr('disabled');
                    } else {
                        $('#searchDocument').attr('disabled', 'disabled');
                    }
                });
                $("#searchDocument").click(function () {
                    searchDocument();
                });
                $("#linkbutton").click(function () {
                    var selectedDocument = $("#selectedDocument").val();
                    var currentdocuments = $("#documentsToLink").val();
                    if (currentdocuments != "") {
                        if (currentdocuments.indexOf(selectedDocument) >= 0) {
                            alert("You have already selected that document");
                        } else {
                            if (confirm("Click OK to link this document when request is saved")) {
                                $("#documentsToLink").val(currentdocuments + "-" + selectedDocument);
                                if (selectedDocument.indexOf("_newDocument_") > -1) {
                                    $("#newDocument").attr("disabled", "disabled");
                                }
                            }
                        }
                    } else {
                        if (confirm("Click OK to link this document when request is saved")) {
                            $("#documentsToLink").val(selectedDocument);
                            if (selectedDocument.indexOf("_newDocument_") > -1) {
                                $("#newDocument").attr("disabled", "disabled");
                            }
                        }
                    }
                });
                $("#newDocument").change(function () {
                    if ($("#newDocument").val() != "") {
                        $("#selectedDocDesc").html("Selected: <b>" + $("#newDocument").val().split('\\').pop() + "</b>");
                        $('#linkbutton').removeAttr('disabled');
                        $("#selectedDocument").val("_newDocument_" + $("#newDocument").val().split('\\').pop());
                    } else {
                        $("#selectedDocDesc").html("Selected: <b>" + "</b>");
                        $("#selectedDocument").val("");
                    }
                });
                
            });
        </script>
      <h1>Link Document <span class="closePopup"><img src="images/delete-icon.png" /> Close</span></h1>
      <a title="Link Document"></a>
      <div>
        <?php 
            if (strtoupper ($_SESSION['EDMSName']) == 'TRIM') {?>
                <input type="radio" id="search_type1" name="Search_type" checked value="CORRESPONDENT"><label for="search_type1"><b>Author (surname,given)</b></label>&nbsp
                <input type="radio" id="search_type2" name="Search_type" value="DOCNAME"><label for="search_type2"><b>Title Word</b></label>&nbsp
                <input type="radio" id="search_type3" name="Search_type" value="DOCID"><label for="search_type3"><b>Record Number</b></label>&nbsp
                <input type="radio" id="search_type4" name="Search_type" value="COMPANY"><label for="search_type4"><b>Company</b></label>&nbsp
            <?php 
            }else if(strtoupper ($_SESSION['EDMSName']) == 'OBJECTIVE'){?>
                <input type="radio" id="search_type1" name="Search_type" checked value="CORRESPONDENT"><label for="search_type1"><b>Name ID</b></label>&nbsp
                <input type="radio" id="search_type2" name="Search_type" value="DOCNAME"><label for="search_type2"><b>Address ID</b></label>&nbsp
                <input type="radio" id="search_type3" name="Search_type" value="DOCID"><label for="search_type3"><b>Request ID</b></label>&nbsp
            <?php 
            }else { ?>
                <input type="radio" id="search_type1" name="Search_type" checked value="CORRESPONDENT"><label for="search_type1"><b>Correspondent (surname,given)</b></label>&nbsp
                <input type="radio" id="search_type2" name="Search_type" value="DOCNAME"><label for="search_type2"><b>Document Name/Description</b></label>&nbsp
                <input type="radio" id="search_type3" name="Search_type" value="DOCID"><label for="search_type3"><b>Document ID</b></label>&nbsp
                <input type="radio" id="search_type4" name="Search_type" value="COMPANY"><label for="search_type4"><b>Company</b></label>&nbsp
                <input type="radio" id="search_type5" name="Search_type" value="KEYWORD"><label for="search_type5"><b>Full text</b></label>&nbsp
            <?php 
            }
        ?>
        <input type="button" id="searchDocument" value="Search"/>
           
        <div class="column r55"><input type="text" id="searchterm" placeholder="Search...."/></div>
        <div class="summaryContainer">
            <input type="hidden" name="selectedDocument" id="selectedDocument"/>
            <div id="searchResults">

            </div>
            <input type="button" id="linkbutton" value="Link Document"/>
            <span id="selectedDocDesc">Selected Doc: </span>
        </div>
      </div>
</div>
        <div class="popupDetail" id="customerInfoXpertPopup">
        <script type="text/javascript">
            $(document).ready(function () {

                if ($("#given").val() != "" && $("#surname").val() != "") {
                    $("#cust_searchterm").val($("#surname").val() + "," + $("#given").val());
                    $('#cust_searchDocument').removeAttr('disabled');
                    
                }
                //hide search button if no value
                //$('#cust_searchDocument').attr('disabled', 'disabled');
                $('#cust_linkbutton').attr('disabled', 'disabled');
                $('#cust_searchterm').keyup(function () {
                    if ($(this).val() != '') {
                        $('#cust_searchDocument').removeAttr('disabled');
                    } else {
                        $('#cust_searchDocument').attr('disabled', 'disabled');
                    }
                });
                $("#cust_searchDocument").click(function () {
                    searchDocument($("#cust_searchterm").val(),"cust_searchResults");
                });
                $("#cust_linkbutton").click(function () {
                    var selectedDocument = $("#cust_selectedDocument").val();
                    var currentdocuments = $("#documentsToLink").val();
                    if (currentdocuments != "") {
                        if (currentdocuments.indexOf(selectedDocument) >= 0) {
                            alert("You have already selected that document");
                        } else {
                            if (confirm("Click OK to link this document when request is saved")) {
                                $("#documentsToLink").val(currentdocuments + "-" + selectedDocument);
                            }
                        }
                    } else {
                        if (confirm("Click OK to link this document when request is saved")) {
                            $("#documentsToLink").val(selectedDocument);
                        }
                    }
                });

            });
        </script>
      <h1>Link Document <span class="closePopup"><img src="images/delete-icon.png" /> Close</span></h1>
      <a title="Link Document"></a>

      <div>
        <input type="hidden" id="cust_search_type1" name="Search_type"  value="CORRESPONDENT">
        <input type="button" id="cust_searchDocument" value="Search"/>
        <div class="column r55"><input type="text" id="cust_searchterm" placeholder="Search...."/></div>
        <div class="summaryContainer">
            <input type="hidden" name="selectedDocument" id="cust_selectedDocument"/>
            <div id="cust_searchResults">

            </div>
            <input type="button" id="cust_linkbutton" value="Link Document"/>
            <span id="cust_selectedDocDesc">Selected Doc: </span>
        </div>
      </div>
    </form>
    <?php
    foreach($_SESSION as $var => $data){
        if(stristr($var, "rem_") && !stristr($var,"rem_udf")){
            unset($_SESSION[$var]);	
        }
    }
}
    ?>
</div>

