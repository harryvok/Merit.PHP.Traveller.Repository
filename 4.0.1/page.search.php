 <script type="text/javascript">
     $(document).ready(function () {
         $("#action").val("Search");
         if ($("#search").val() == "" || $("#search").val() == null) {
         }
         else{
             get_search();
         }
        $("#search_adv").click(function () {
            $("#basic").css("display", "none");
            $("#advanced").css("display", "block");
            $("#action").val("RequestSearch");
            $('#adv_search_query').css("display", "block");
            $('#search_query').css("display", "none");
        });

        $("#search_basic").click(function () {
            $("#basic").css("display", "block");
            $("#advanced").css("display", "none");
            $("#action").val("Search");
            $('#adv_search_query').css("display", "none");
            $('#search_query').css("display", "block");
        });

        $("#submit").click(function () {
            get_search();
        });

        $("#reset").click(function () {
            if ($("#action").val() == "Search") {
                $("#search").val("");
                $('#search_query').html("");
            }
            else {
                $('#advancedSearch').find('input, textarea, select').each(function (x, field) {
                    if (field.name == "dateFrom" || field.name == "dateTo") {
                        field.value = "dd/mm/yyyy";
                    }
                    else {
                        field.value = "";
                    }
                });
                $("#requestInput").attr("disabled", "disabled");
                $("#functionInput").attr("disabled", "disabled");
                $('#adv_search_query').html("");
            }
        });
    });
     function get_search() {
         alert($("#action").val());
        Load();
        if ($("#action").val() == "Search") {
            $.ajax({
                url: 'inc/ajax/ajax.search.php',
                data: {
                    search_q: $("#search").val()
                },
                type: 'POST',
                success: function (data) {
                    Unload();
                    $('#search_query').html(data);
                }
            });
        }
        else {
            $(".dateField").each(function (index, element) {
                if ($(element).val() == "dd/mm/yyyy") {
                    $(element).val("");
                }
            });
            $(".timeField").each(function (index, element) {
                if ($(element).val() == "--:-- --") {
                    $(element).val("");
                }
            });
            $.ajax({
                url: 'inc/ajax/ajax.RequestSearch.php',
                data: $("#advancedSearch").serialize(),
                type: 'POST',
                success: function (data) {
                    Unload();
                    $('#adv_search_query').html(data);
                    window.scrollTo(0, 0);
                }
            });
        }
    }
</script>
<div id="basic" <?php if(isset($_GET['d']) &&$_GET['d'] == "advanced") echo "style='display:none;'"; else echo "style='display:block;'"; ?>>
    This form will search the database for anything that you type in the below text box.<p>&nbsp;</p>
    <div class="float-left">
        <input class="text" name='search' id="search" class="required" placeholder="Search..." value='<?php if(isset($_SESSION['search'])){ echo $_SESSION['search']; } ?>'>
    </div>    
    <div id="search_query" class="float-left">
    </div>
</div>
<div id="advanced" class="subPageContainer" <?php if(isset($_GET['d']) && $_GET['d'] == "advanced") echo "style='display:block;'"; else echo "style='display:none;'"; ?>>
    <script src="inc/js/pages/js.search.js"></script>
    <div id="adv_search_query" style="display:none">
    </div>
    <div id="form">
        <form id="advancedSearch">
            <input type='hidden' name='udfs_exist' id='udfs_exist' value='0' />
            <div class="float-left">
                <div class="column r50">
                    <div class="summaryContainer">
                        <h1>Name</h1>
                        <div>
                            <div class="column r100">
                                <div class="column r30">
                                    <label>Given:</label>
                                    <input type="text" name="nameGiven" value='<?php if(isset($_SESSION['nameGiven'])){ echo $_SESSION['nameGiven']; } ?>'>
                                </div>
                                <div class="column r30">
                                    <label>Surname:</label>
                                    <input type="text" name="nameSurname" value='<?php if(isset($_SESSION['nameSurname'])){ echo $_SESSION['nameSurname']; } ?>'>
                                </div>                            

                                <div class="column r25">
                                    <label>Company:</label>
                                    <input type="text" name="company" value='<?php if(isset($_SESSION['company'])){ echo $_SESSION['company']; } ?>'>
                                </div>
                                <div class="column r15">
                                    <label>Only Officers?</label>
                                    <select name="nameOnlyOfficers">
                                        <option value="">No</option>
                                        <option value="Y">Yes</option>
                                    </select>
                                </div>
                            </div>
                            <div class="float-left">
                                 <div class="column r20">
                                        <label>Phone:</label>
                                        <input type="text" name="phoneNumber" value='<?php if(isset($_SESSION['phoneNumber'])){ echo $_SESSION['phoneNumber']; } ?>'>
                                 </div>
                                 <div class="column r30">
                                        <label>Email:</label>
                                        <input type="text" name="emailAddress" value='<?php if(isset($_SESSION['emailAddress'])){ echo $_SESSION['emailAddress']; } ?>'>
                                 </div>
                                 <div class="column r20">
                                        <label>Customer Type:</label>
                                        <?php $controller->Dropdown("CustomerTypes", "CustomerTypes"); ?>
                                 </div>
                             </div>
                        </div>
                    </div>
                    <div class="summaryContainer">
                        <h1>Address</h1>
                        <div>
                            <div class="column r15">
                                <label>House No:</label>
                                <input class="text required" name='lno' id="lno" maxlength='15' value='<?php if(isset($_SESSION['lno'])){ echo $_SESSION['lno']; } ?>'>
                            </div>
                            <div class="column r30">
                                <label>Street:</label>
                                <input class="text required checkNone" name='lstreet' id="lstreet"  maxlength='100' value='<?php if(isset($_SESSION['lstreet'])){ echo $_SESSION['lstreet']; } ?>'>
                            </div>
                            <div class="column r15">
                                <label>Type</label>
                                <input class="text required checkNone" name='ltype' id="ltype"  maxlength='100' value='<?php if(isset($_SESSION['ltype'])){ echo $_SESSION['ltype']; } ?>'>
                            </div>
                            <div class="column r30">
                                <label>Suburb:</label>
                                <input class="text required checkNone" name='lsuburb' id="lsuburb"  maxlength='100' value='<?php if(isset($_SESSION['lsuburb'])){ echo $_SESSION['lsuburb']; } ?>'>
                            </div>
                            <div class="column r25">
                                <label>X Coord:</label>
                                <input type="text" name="addressX" value='<?php if(isset($_SESSION['addressX'])){ echo $_SESSION['addressX']; } ?>'>
                            </div>
                            <div class="column r25">
                                <label>Y Coord:</label>
                                <input type="text" name="addressY" value='<?php if(isset($_SESSION['addressY'])){ echo $_SESSION['addressY']; } ?>'>
                            </div>
                            <div class="float-left">
                                <label>Addr Dets:</label>
                                <input type="text" name="addressDets" value='<?php if(isset($_SESSION['addressDets'])){ echo $_SESSION['addressDets']; } ?>'>
                            </div>
                        </div>
                    </div>
                    <div class="summaryContainer">
                        <h1>Facility</h1>
                        <div>
                            <div class="column r25">
                                <label>Type:</label>
                                <input class="text" name='facilityTypeInput' id="facilityTypeInput"  placeholder="Search..." value='<?php if(isset($_SESSION['facilityTypeInput'])){ echo $_SESSION['facilityTypeInput']; } ?>'>
                                <input type="hidden" name='facilityTypeId' id="facilityTypeId" value='<?php if(isset($_SESSION['facilityTypeId'])){ echo $_SESSION['facilityTypeId']; } ?>'>
                            </div>
                            <div class="column r60">
                                <label>Name:</label>
                                <input class="text" name='facilityInput' id="facilityInput"   value='<?php if(isset($_SESSION['facilityInput'])){ echo $_SESSION['facilityInput']; } ?>'>
                                <!--<input type="hidden" name='facilityId' id="facilityId">-->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="column r50">
                    <div class="summaryContainer">
                        <h1>Type</h1>
                        <div>
                            <div class="column r33">
                                <label>Service:</label>
                                <input class="text required" name='serviceInput' id="serviceInput"  placeholder="Search..." value='<?php if(isset($_SESSION['serviceInput'])){ echo $_SESSION['serviceInput']; } ?>'>
                                <input type="hidden" name='service' id="service" value='<?php if(isset($_SESSION['service'])){ echo $_SESSION['service']; } ?>'>
                            </div>
                            <div class="column r33">
                                <label>Request:</label>
                                <input class="text required" name='requestInput' disabled="disabled" id="requestInput" value='<?php if(isset($_SESSION['requestInput'])){ echo $_SESSION['requestInput']; } ?>'>
                                <input type="hidden" name='request' id="request" value='<?php if(isset($_SESSION['request'])){ echo $_SESSION['request']; } ?>'>
                            </div>
                            <div class="column r33">
                                <label>Function:</label>
                                <input class="text checkNone" name='functionInput' disabled="disabled" id="functionInput" value='<?php if(isset($_SESSION['functionInput'])){ echo $_SESSION['functionInput']; } ?>'>
                                <input type="hidden" name='function' id="function" value='<?php if(isset($_SESSION['function'])){ echo $_SESSION['function']; } ?>'>
                            </div>
                            <div class="float-left">
                                <label>Request Description:</label>
                                <input name="requestDetails" value='<?php if(isset($_SESSION['requestDetails'])){ echo $_SESSION['requestDetails']; } ?>'/ />
                            </div>
                        </div>
                    </div>
                    <div class="summaryContainer">
                        <h1>Request Details</h1>
                        <div>
                            <div class="float-left">
                                <div class="column r25">
                                    <label>From:</label>
                                    <input type="text" class="dateField" name="dateFrom" value='<?php if(isset($_SESSION['dateFrom'])){ echo $_SESSION['dateFrom']; } ?>'>
                                </div>
                                <div class="column r25">
                                    <label>To:</label>
                                    <input type="text" class="dateField" name="dateTo" value='<?php if(isset($_SESSION['dateTo'])){ echo $_SESSION['dateTo']; } ?>'>
                                </div>

                                <div class="column r20">
                                    <label>How Received</label>
                                    <?php $controller->Dropdown("HowReceived", "HowReceived"); ?>
                                </div>
                            </div>
                            <div class="float-left">
                                <div class="column r20">
                                    <label>Count Only</label>
                                    <select name="countOnly">
                                         <option <?php if(isset($_SESSION['countOnly'])){if ($_SESSION['countOnly'] == "N") { echo "selected"; }} ?> value="N">No</option>
                                        <option <?php if(isset($_SESSION['countOnly'])){if ($_SESSION['countOnly'] == "Y") { echo "selected"; }} ?> value="Y">Yes</option>
                                        <option <?php if(isset($_SESSION['countOnly'])){if ($_SESSION['countOnly'] == "") { echo "selected"; }} ?> value="">All</option>
                                    </select>
                                </div>
                                <div class="column r20">
                                    <label>Finalised</label>
                                    <select name="finalised">
                                        <option <?php if(isset($_SESSION['finalised'])){if ($_SESSION['finalised'] == "") { echo "selected"; }} ?> value="">All</option>
                                        <option <?php if(isset($_SESSION['finalised'])){if ($_SESSION['finalised'] == "N") { echo "selected"; }} ?> value="N">No</option>
                                        <option <?php if(isset($_SESSION['finalised'])){if ($_SESSION['finalised'] == "Y") { echo "selected"; }} ?> value="Y">Yes</option>
                                    </select>
                                </div>
                                <div class="column r20">
                                    <label>Intime</label>
                                    <select name="intime">
                                        <option <?php if(isset($_SESSION['intime'])){if ($_SESSION['intime'] == "") { echo "selected"; }} ?> value="">All</option>
                                        <option <?php if(isset($_SESSION['intime'])){if ($_SESSION['intime'] == "N") { echo "selected"; }} ?> value="N">No</option>
                                        <option <?php if(isset($_SESSION['intime'])){if ($_SESSION['intime'] == "Y") { echo "selected"; }} ?> value="Y">Yes</option>
                                    </select>
                                </div>
                                <div class="column r20">
                                    <label>Escalated</label>
                                    <select name="escalated">
                                        <option <?php if(isset($_SESSION['escalated'])){if ($_SESSION['escalated'] == "") { echo "selected"; }} ?> value="">All</option>
                                        <option <?php if(isset($_SESSION['escalated'])){if ($_SESSION['escalated'] == "N") { echo "selected"; }} ?> value="N">No</option>
                                        <option <?php if(isset($_SESSION['escalated'])){if ($_SESSION['escalated'] == "Y") { echo "selected"; }} ?> value="Y">Yes</option>
                                    </select>
                                </div>

                            </div>
                            <div class="float-left">
                                <div class="column r30">
                                    <label>Input Officer:</label>
                                    <input type="text" name="typeInputOffr" id="typeInputOffr" data-officer="true" value='<?php if(isset($_SESSION['typeInputOffr'])){ echo $_SESSION['typeInputOffr']; } ?>'>
                                    <input type="hidden" name="typeInputOffrCode" id="typeInputOffrCode">
                                </div>
                                <div class="column r30">
                                    <label>Action Officer:</label>
                                    <input type="text" name="actionOfficer" id="actionOfficer" data-officer="true" value='<?php if(isset($_SESSION['actionOfficer'])){ echo $_SESSION['actionOfficer']; } ?>'>
                                    <input type="hidden" name="actionOfficerCode" id="actionOfficerCode">
                                </div>
                                <div class="column r30">
                                    <label>Request Officer:</label>
                                    <input type="text" name="responsibleOfficer" id="responsibleOfficer" data-officer="true" value='<?php if(isset($_SESSION['responsibleOfficer'])){ echo $_SESSION['responsibleOfficer']; } ?>'>
                                    <input type="hidden" name="responsibleOfficerCode" id="responsibleOfficerCode">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="udfs" style="display: none;">
                        <div class="summaryContainer">
                            <h1>User Defined Fields</h1>
                            <div>
                                <div style="margin-right: 24px;" id="global-udfs">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="column r100" id="button_grp">       
    <br />
    <input type="hidden" name="action" id="action" value="" />
    <input type="submit" id="submit" value="Search" />
    <input type="reset" value="Reset" id="reset" name="reset">
</div>
