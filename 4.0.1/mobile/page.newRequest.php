<?php
if(isset($_SESSION['user_id'])){
?>

<div data-role="page" id="default">
    <div data-role="header" data-tap-toggle="false" data-position="fixed">
        <h1>New Request</h1>
    </div>
    <div data-role="content">
        <?php include("mobile/page.navSidebar.php"); ?>
        <div class="content-primary">
            <div data-role="popup" id="popup" class="ui-corner-all" data-rel="back">
            </div>

            <?php
            include("mobile/page.output.php");
            ?>
            <script src="inc/js/pages/js.new-request.js"></script>
            <span style="color: red;"><b><?php echo COMPULSORY ?></b></span><br />
            <div style="float: left; width: 100%; display: block;">
                
            </div>
            <form enctype='multipart/form-data' id='newrequest' name="newrequest" action='process.php' method='post'>
                <input type="hidden" id="testing" value="" />
                <input type="hidden" id="checkforWorkflow" value="" />
                <input type="hidden" id="mydetsclicked" value="N" />  
                <input type="hidden" name="lookup_enabled" id="lookup_enabled" value="<?php echo $_SESSION['roleSecurity']->maint_name_match; ?>" />
                <input type="hidden" name="countonly_bypass" id="countonly_bypass" value="<?php echo $_SESSION['meritIni']['COUNTONLY_BYPASS_MAND_UDF']; ?>" />
                <input type="hidden" name="historysearchautoopenoff" id="historysearchautoopenoff" value="<?php echo $_SESSION['meritIni']['HISTORYSEARCHAUTOOPENOFF']; ?>" />
                <input type="hidden" name="historysearchopenclosed" id="historysearchopenclosed" value="<?php echo $_SESSION['meritIni']['HISTORYSEARCHOPENCLOSED']; ?>" />
                <input type="hidden" name="historyaddrtype" id="historyaddrtype" value="<?php echo $_SESSION['meritIni']['HISTORYADDRTYPE']; ?>" />
                <div id="hoverDiv">
                    <a href="#" data-rel="back" data-role="button" data-theme="a" data-icon="delete" data-iconpos="notext" class="ui-btn-left" id="infoHoverClose">Close</a>
                    <div data-role="header" data-tap-toggle="false">
                        <h1>Help</h1>
                    </div>
                    <div data-role="content">
                        <span id="helpText_mobile"></span>
                        <br />
                        <span id="helpURL_mobile"></span>
                    </div>
                </div>

                <div data-role="collapsible" class="col" data-collapsed="false" data-content-theme="c">
                    <h4>Request Details</h4>
                    <p>
                        

                        <label>Keyword</label>
                        <input class="text" name='keyword' id="keywordSearch" maxlength='15' placeholder="Search...">

                        <input type="hidden" name='service' id="service">
                        <input type="hidden" id="service_helpText" />
                        <input type="hidden" id="service_helpURL" />
                        <div class="info">
                        <img class="infoHover" id="service_help" src="images/hoverInfo.png" />
                        </div>
                        <label>Service<span style="color: red;">*</span></label>

                        <input class="text required" name='serviceInput' id="serviceInput"  placeholder="Search..." value='<?php if(isset($_SESSION['rem_serviceInput'])){ echo $_SESSION['rem_serviceInput']; } ?>'>


                        <input type="hidden" name='request' id="request">
                        <input type="hidden" id="need_r_booking" name="need_r_booking" />
                        <input type="hidden" id="request_helpText" />
                        <input type="hidden" id="request_helpURL" />
                        <div class="info">
                            <img class="infoHover" id="request_help" src="images/hoverInfo.png" />
                        </div>
                        <label>Request<span style="color: red;">*</span></label>

                        <input class="text required" disabled="disabled" name='requestInput' placeholder="Search..." id="requestInput" value='<?php if(isset($_SESSION['rem_requestInput'])){ echo $_SESSION['rem_requestInput']; } ?>'>


                        <input type="hidden" name='function' id="function">
                        <input type="hidden" id="need_f_booking" name="need_f_booking" />
                        <input type="hidden" id="function_helpText" />
                        <input type="hidden" id="function_helpURL" />
                        <div class="info">
                            <img class="infoHover" id="function_help" src="images/hoverInfo.png" />
                        </div>
                        <label>Function<span id="functionRequired" style="color: red; display: none;">*</span></label>

                        <input class="text" disabled="disabled" name='functionInput' placeholder="Search..." id="functionInput" value='<?php if(isset($_SESSION['rem_functionInput'])){ echo $_SESSION['rem_functionInput']; } ?>'>

                        <input type="hidden" name="workflowInd" id="workflowInd">
                        <input type="hidden" name="countOnly" id="countOnly" value="0">

                        <input type="hidden" id="chkCount" val="0" />
                        
                        <?php
                        if(isset($_SESSION['roleSecurity']->show_reference_no) && $_SESSION['roleSecurity']->show_reference_no == "Y"){
                            ?>
                        <label>Reference Number<span class="refer_no_label mandLabel" style="color: red; display: none;">*</span></label>
                        <input name='refno' id="refno" maxlength='15' data-mand="refer_no" value='<?php if(isset($_SESSION['rem_refno'])){ echo $_SESSION['rem_refno']; } ?>'>
                        <?php } ?>
                        <?php
    if(isset($_SESSION['roleSecurity']->maint_priority) && $_SESSION['roleSecurity']->maint_priority == "Y"){
                        ?>
                        <label>Priority</label>
                        <?php $controller->Dropdown("Priorities", "Priorities"); 
    }
                        ?>

                        <label>Request Type<span class="request_type_label mandLabel" style="color: red; display: none;">*</span></label>
                        <?php $controller->Dropdown("RequestTypesDD", "RequestTypes"); ?>

                         <?php if($_SESSION['notify_insurance'] == "Y") { ?>
                        <label for="notifyInsuranceOfficer">Notify Insurance Officer</label>
                        <input type="checkbox" name="notifyInsuranceOfficer" value="Y" style="width: 25px;height: 25px;margin-top: -18px; margin-left:170px">
                        <?php } ?>
                        <br />
                        <span id="duedate"></span>
                        <input type="hidden" id="due" name="due" />
                        <br />

                        <b><span id="rednote"></span></b>
                        <label>Request Description<span class="request_description_label mandLabel" style="color: red; display: none;">*</span></label>
                        <textarea spellcheck="true" rows="4" class="text request-issue " data-mand="request_description" name='issue' id='textareaissue' maxlength='2000'><?php if(isset($_SESSION['rem_issue'])){ echo $_SESSION['rem_issue']; } ?></textarea>
                    </p>
                </div>
                <div id="udfs" style="display: none;">
                    <div data-role="collapsible" class="col" data-content-theme="c" data-collapsed="false">
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
                        QueryUDFs('<?php echo $_SESSION['rem_function']; ?>', '<?php echo $_SESSION['rem_request']; ?>', '<?php echo $_SESSION['rem_service']; ?>');
                        $("#udf_exist").val("1");
                    </script>
                    <?php
        }
    }
                    ?>
                </div>

                <div data-role="collapsible" class="col" data-collapsed="false" data-content-theme="c">
                    <h4>Location Details</h4>

                    <p>
                        <label>Google Maps</label>
                        <div id="map-canvas"></div>
                        <br />
                        <input type="button" value="Use This Address" id="gmaps_Use" data-role="button" />
                        <input type="button" value="Full Screen" id="gmaps_FS" onclick="fullScreen()" />
                        <input type="button" value="Close" id="gmaps_SS" onclick="    closeFullScreen()" />
                        <br />
                        <br />
                        <input type="hidden" id="address" name="address" value="<?php if(defined("DEFAULT_ADDRESS")) echo DEFAULT_ADDRESS; ?>" />
                        <input type="hidden" id="gmaps_Number" />
                        <input type="hidden" id="gmaps_FNumber" />
                        <input type="hidden" id="gmaps_StreetName" />
                        <input type="hidden" id="gmaps_StreetType" />
                        <input type="hidden" id="gmaps_Suburb" />
                        <input type="hidden" id="gmaps_PostCode" />
                        <input type="hidden" id="gmaps_x" name="gmaps_x" />
                        <input type="hidden" id="gmaps_y" name="gmaps_y" />
                        <input type="hidden" id="use_gmaps_coord" name="use_gmaps_coord" value="0" />
                        <input type="hidden" id="address_gps" name="address_gps" />
                        <input type="hidden" id="defaultLat" value="-37.814107" />
                        <input type="hidden" id="defaultLng" value="144.96328" />
                        <input type="hidden" name="loc_address" id="loc_address" value="" />

                        <label>Facility Type</label>
                        <input class="text"  placeholder="Search..." name='facilityTypeInput' id="facilityTypeInput" value='<?php if(isset($_SESSION['rem_facilityTypeInput'])){ echo $_SESSION['rem_facilityTypeInput']; } ?>'>
                        <input type="hidden" name='facilityTypeId' id="facilityTypeId" value='<?php if(isset($_SESSION['rem_facilityTypeId'])){ echo $_SESSION['rem_facilityTypeId']; } ?>'>
                        <label>Facility Name<span class="facility_label mandLabel" style="color: red; display: none;">*</span></label>
                        <input class="text"  placeholder="Search..." name='facilityInput' data-mand="facility" id="facilityInput" value='<?php if(isset($_SESSION['rem_facilityInput'])){ echo $_SESSION['rem_facilityInput']; } ?>'>
                        <input type="hidden" name='facilityId' id="facilityId" value='<?php if(isset($_SESSION['rem_facilityId'])){ echo $_SESSION['rem_facilityId']; } ?>'>
                        <input type="hidden" name='addressId' id="addressId" />
                       
                         <label>Responsible</label>
                        <input class="text" name='responsible' onChange="" readonly="readonly" id="responsible" value=''>
                        <input type="hidden" name='officerName' id="officerName" />
                            
                        <label>Facility Description</label>
                        <input class="text" name='facilitydescription' onChange="" readonly="readonly"  id="facilitydescription" value=''>
                        <input type="hidden" name='facilityDesc' id="facilityDesc" />

                        <label>Flat/Unit Number</label>
                        <input name='lfaddno' onChange="changeLocationType()" id="lfno"  maxlength='15' value='<?php if(isset($_SESSION['rem_loc_address_number'])){ echo $_SESSION['rem_loc_address_number']; } ?>'>

                        <label>Street Number</label>
                        <input name='lno' onChange="changeLocationType()" class="" id="lno"  maxlength='15' value='<?php if(isset($_SESSION['rem_loc_address_fnumber'])){ echo $_SESSION['rem_loc_address_fnumber']; } ?>'>
                        <input type="hidden" id="newLno" name="newLno" />

                        <label>Street<span class="location_address_label mandLabel" style="color: red; display: none;">*</span></label>
                        <input class="" placeholder="Search..." name='lstreet' onChange="changeLocationType()" id="lstreet" data-mand="location_address" maxlength='100' value='<?php if(isset($_SESSION['rem_lstreet'])){ echo $_SESSION['rem_lstreet']; } ?>'></label>
                                            
                        <label>Type<span class="location_address_label mandLabel" style="color: red; display: none;">*</span></label>
                        <input class="" placeholder="Search..." disabled="disabled" name='ltype' onChange="changeLocationType()" id="ltype" data-mand="location_address" maxlength='100' value='<?php if(isset($_SESSION['rem_ltype'])){ echo $_SESSION['rem_ltype']; } ?>'></label>
                                            
                        <label>Suburb<span class="location_address_label mandLabel" style="color: red; display: none;">*</span></label>
                        <input class="" placeholder="Search..."disabled="disabled" name='lsuburb' onChange="changeLocationType()" id="lsuburb" data-mand="location_address" maxlength='100' value='<?php if(isset($_SESSION['rem_lsuburb'])){ echo $_SESSION['rem_lsuburb']; } ?>'></label>
                      
                        <label>Postcode</label>
                        <input class="" name='lpostcode' onChange="" id="lpostcode" maxlength='100' value='' />

                        <label>Property Number</label>
                        <input readonly="readonly" name='property_no' id="property_no" maxlength='100'>

                        <label>Road Type</label>
                        <input class="" name='lroad_type' onChange="" id="lroad_type" maxlength='100' value=''>

                        <label>Road Responsibility</label>
                        <input class="" name='lroad_responsibility' onChange="" id="lroad_responsibility" maxlength='100' value=''>
                        <input type="hidden" name="larea_group" id="larea_group" />

                        <label>Description</label>
                        <textarea id="ldesc" name="ldesc" onchange="changeLocationType()" style="resize:none; height:3em" maxlength='1000' value='<?php if(isset($_SESSION['rem_loc_address_desc'])){ echo $_SESSION['rem_loc_address_desc']; } ?>'></textarea>
                        
<!--                        <input type="hidden" name="lpostcode" id="lpostcode" />-->
                        <!--<input type="button" data-role="button" value="Show On Map" onclick="showOnMap()" />-->
                        <input type="button" data-role="button" value="Clear" onclick="clearLocationAddress()" />
                        <script type="text/javascript">  var date = new Date().toISOString(); </script>
                        <input type="button" value="Booking" disabled style="visibility:hidden" id="AddrBooking" onclick="GetBookingSummary(date)"  />
                    </p>
                </div>
                <div data-role="collapsible" class="col" data-content-theme="c">
                    <h4>InfoXpert Search</h4>
                    <input class="text" name='keyword' id="searchterm"  placeholder="Search...">
                    <label for="search_type1"><b>Correspondent (surname,given)</b></label><input type="radio" id="search_type1" name="Search_type" checked value="CORRESPONDENT">
                    <label for="search_type2"><b>Document Name/Description</b></label><input type="radio" id="search_type2" name="Search_type" value="DOCNAME">
                    <label for="search_type3"><b>Document ID</b></label><input type="radio" id="search_type3" name="Search_type" value="DOCID">
                    <label for="search_type4"><b>Company</b></label><input type="radio" id="search_type4" name="Search_type" value="COMPANY">
                    <label for="search_type5"><b>Full text</b></label><input type="radio" id="search_type5" name="Search_type" value="KEYWORD">
                    <a data-role="button" class="documentSearchButton" href="#">Search...</a>

                    <div id="searchResults"></div>
                    <input type="hidden" name="selectedDocument" id="selectedDocument" />
                </div>
                <div data-role="collapsible" class="col" data-content-theme="c">
                    <h4>Customer Details</h4>
                    <p>
                        <input type="button" id="myDetails" value="My Details" data-role="button" />
                        <input type="button" id="clearDetails" value="Clear" data-role="button" />
                        <input type="button" id="customerInfoXpert" data-role="button" disabled value="infoXpert"  onclick="$('#cust_searchResults').slideToggle()"/>
                        <div id="cust_searchResults" hidden></div>


                        <label>Title<span class="pref_title_label mandLabel" style="color: red; display: none;">*</span></label>
                        <input class="getlist" name='cust_title' id='pref_title' data-mand="pref_title" maxlength='5' value='<?php if(isset($_SESSION['rem_cust_title'])){ echo $_SESSION['rem_cust_title']; } ?>'></label>
                      
                        <label>Given<span class="given_name_label mandLabel" style="color: red; display: none;">*</span></label>
                        <input class="getlist" name='cust_given' id='given' data-mand="given_name" maxlength='30' value='<?php if(isset($_SESSION['rem_cust_given'])){ echo $_SESSION['rem_cust_given']; } ?>' >

                        <label>Surname<span class="surname_label mandLabel" style="color: red; display: none;">*</span></label>
                        <input class="getlist" name='cust_surname' id='surname'  data-mand="surname" maxlength='30' value='<?php if(isset($_SESSION['rem_cust_surname'])){ echo $_SESSION['rem_cust_surname']; } ?>'>

                        <label>Phone<span class="telephone_label mandLabel" style="color: red; display: none;">*</span></label>
                        <input class="getlist" name='cust_phone' id='cust_phone' data-mand="telephone" maxlength='12' value='<?php if(isset($_SESSION['rem_cust_phone'])){ echo $_SESSION['rem_cust_phone']; } ?>'>

                        <label>Mobile<span class="mobile_no_label mandLabel" style="color: red; display: none;">*</span></label>
                        <input class="getlist" name='cust_mobile' id='cust_mobile' data-mand="mobile_no"  maxlength='12' value='<?php if(isset($_SESSION['rem_cust_mobile'])){ echo $_SESSION['rem_cust_mobile']; } ?>'>

                        <label>Work<span class="work_phone_label mandLabel" style="color: red; display: none;">*</span></label>
                        <input class="getlist" name='cust_work' id='cust_work' data-mand="work_phone" maxlength='12' value='<?php if(isset($_SESSION['rem_cust_work'])){ echo $_SESSION['rem_cust_work']; } ?>'>

                        <label>Email<span class="email_address_label mandLabel" style="color: red; display: none;">*</span></label>
                        <input class="getlist" name='cust_email' id='email_address' data-mand="email_address" maxlength='50' value='<?php if(isset($_SESSION['rem_cust_email'])){ echo $_SESSION['rem_cust_email']; } ?>'>

                        <label>Company<span class="company_name_label mandLabel" style="color: red; display: none;">*</span></label>
                        <input class="getlist" name='cust_company' id='company' data-mand="company_name" maxlength='50' value='<?php if(isset($_SESSION['rem_cust_company'])){ echo $_SESSION['rem_cust_company']; } ?>'>

                        <label>Customer Type</label>

                        <?php $controller->Dropdown("CustomerTypes", "CustomerTypes"); ?>
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
                    </p>
                </div>

            <!-- ------------------------------------------------------- -->
            <!-- Start Customer Section -->
            <!-- ------------------------------------------------------- -->

                <div data-role="collapsible" class="col" data-content-theme="c">
                    <h4>Customer Address</h4>


                    <!-- Customer Resides -->
                        <label>Customer Resides</label>
                        <select class="text" name="same" id="same" onchange="changeLocationType();">
                            <option value='i'>Inside Council Area</option>
                            <option value='o'>Outside Council Area</option>
                            <option value='s'>Same as Location</option>
                        </select>
                    <!-- Customer Resides -->



                    <!-- INSIDE -->
                        <div id="inside_ca" style="display: block;">

                            <label>Flat/Unit Number</label>
                            <input name='i_cfno' id="i_cfno"  maxlength='15' value='<?php if(isset($_SESSION['rem_cust_address_number'])){ echo $_SESSION['rem_cust_address_number']; } ?>'>

                            <label>Unit Suffix</label>
                            <input name='i_cfcode' id="i_cfcode"  maxlength='15'>

                            <label>Street Number</label>
                            <input name='i_cno' id="i_cno"  maxlength='15' value='<?php if(isset($_SESSION['rem_cust_address_fnumber'])){ echo $_SESSION['rem_cust_address_fnumber']; } ?>'>

                            <label>Street Suffix</label>
                            <input name='i_cscode' id="i_cscode"  maxlength='15'>

                            <label>Street Name<span class="customer_address_label mandLabel" style="color: red; display: none;">*</span></label>
                            <input name='i_cstreet' placeholder="Search..." id="i_cstreet" data-mand="customer_address"  maxlength='100'>
                            <input type="hidden" name="comparei_cstreet" id="comparei_cstreet" />

                            <label>Street Type<span class="customer_address_label mandLabel" style="color: red; display: none;">*</span></label>
                            <input name='i_ctype' placeholder="Search..." id="i_ctype" data-mand="customer_address"  disabled="disabled"  maxlength='100' value='<?php if(isset($_SESSION['rem_i_csuburb'])){ echo $_SESSION['rem_i_ctype']; } ?>'>
                             <input type="hidden" name="comparei_ctype" id="comparei_ctype" />

                            <label>Suburb<span class="customer_address_label mandLabel" style="color: red; display: none;">*</span></label>
                            <input  name='i_csuburb' placeholder="Search..." id="i_csuburb" data-mand="customer_address"  disabled="disabled"  maxlength='100' value='<?php if(isset($_SESSION['rem_i_csuburb'])){ echo $_SESSION['rem_i_csuburb']; } ?>'>
                            <input type="hidden" name="comparei_csuburb" id="comparei_csuburb" />

                            <label>Postcode</label>
                            <input name='i_cpostcode' id="i_cpostcode"  maxlength='6'>
                            <input type="hidden" name="comparei_cpostcode" id="comparei_cpostcode" />

                            <label>Property Number</label>
                            <input name='i_cpropertynumber' id="i_cpropertynumber" />
                            <input type="hidden" name="comparei_cpropertynumber" id="comparei_cpropertynumber" />

                            <label>Description</label>
                            <textarea id="i_cdesc" name="i_cdesc" onchange="" style="resize:none; height:3em" maxlength='1000' value='<?php if(isset($_SESSION['rem_cust_address_desc'])){ echo $_SESSION['rem_cust_address_desc']; } ?>'></textarea>

                            <input type="button" data-role="button" value="Clear" onclick="clearCustomerAddress()" />
                        </div>
                    <!-- ^^ INSIDE -->

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

                    <!-- OUTSIDE -->
                        <div id="outside_ca" style="display: none">

                            <label>Po Box / DX</label>
                            <input name='o_cpobox' id="o_cpobox" />

                            <label>Flat/Unit Number</label>
                            <input name='o_cfno' id="o_cfno"  maxlength='15'>

                            <label>Unit Suffix</label>
                            <input name='o_cfcode' id="o_cfcode"  maxlength='15'>

                            <label>Street Number</label>
                            <input name='o_cno' id="o_cno"  maxlength='15'>

                            <label>Street Suffix</label>
                            <input name='o_cscode' id="o_cscode"  maxlength='15'>

                            <label>Street Name</label>
                            <input name='o_cstreet' placeholder="Search..." id="o_cstreet">

                            <label>Street Type</label>
                            <input name='o_ctype' placeholder="Search..." id="o_ctype">

                            <label>Suburb</label>
                            <input  name='o_csuburb' placeholder="Search..." id="o_csuburb">

                            <label>Postcode</label>
                            <input name='o_cpostcode' id="o_cpostcode"  maxlength='6'>

                            

                            <label>Description</label>
                            <textarea id="o_cdesc" name="o_cdesc" onchange="" style="resize:none; height:3em" maxlength='1000'></textarea>

                            <input type="button" data-role="button" value="Clear" onclick="clearCustomerAddress()" />
                        </div>
                    <!-- ^^ OUTSIDE -->

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
                <!-- End Customer Section -->
                <!-- ------------------------------------------------------- -->



                <div data-role="collapsible" class="col" data-content-theme="c">
                    <h4>Attachment</h4>

                    <p>
                        <script>
                            $(document).ready(function () {
                                $("#attachment").click(function () {
                                    event.stopPropagation();
                                    $("#attachment").unbind();
                                });

                            });
                        </script>

                        <input type="file" name="attachment[]" id="attachment"  />
                        <label>Description:</label><input type="text" id="desc" maxlength="50" name="attachDesc[]" />
                        <input type="hidden" id="attachDesc1" name="attachDesc[]" />
                        <input type="hidden" id="attachDesc2" name="attachDesc[]" />
                    </p>
                </div>

                <input type="hidden" name="action" value="CreateRequest" />
                <div id="LC_Adress"></div>
                <div id="adhocOfficer">
                </div>
                <div id="submitButton">
                    <input name="Submit input" type="submit" data-role="button" id="submit" value="Submit" />
                    <input type="button" data-role="button" id="saveMore" value="Save & More">
                    <input type="button" data-role="button" id="saveCountOnly" value="Count Only">
                </div>

                <input type="hidden" name="saveCountOnly" id="countOnlyInd" value="N" />
                <input type="hidden" name="skipAdhoc" id="skipAdhocCount" value="0" />
                <input type="hidden" name="buttonpressed" id="buttonpressed" value="" />
                <input type="hidden" name="btnclick" id="btnclick" value="" />
                <input type="hidden" name="deviceIndicator" id="deviceIndicator" value="mobile" />
                <input type="hidden" name="documentsToLink" id="documentsToLink" />
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


