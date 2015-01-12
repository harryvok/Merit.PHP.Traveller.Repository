<div id="basic" <?php if(isset($_GET['d']) &&$_GET['d'] == "advanced") echo "style='display:none;'"; else echo "style='display:block;'"; ?>>
    <?php
    if(isset($_GET['clear']) && $_GET['clear'] == 1){
        unset($_SESSION['search']);	
    }

    if(isset($_GET['search'])){
        $_SESSION['search'] = $_GET['search'];
    }
    ?>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#search_button').click(function (eve) {
                Search($("#search").val());
                $("#search").select();

            });
            $('#search').keydown(function (event) {
                if (event.which == 13) {
                    Search($("#search").val());
                    $("#search").select();
                }

            });

            
        });
    </script>
    This form will search the database for anything that you type in the below text box.<p>&nbsp;</p>
    <div class="float-left">
        <input class="text" name='search' id="search" class="required" placeholder="Search..." value='<?php if(isset($_SESSION['search'])){ echo $_SESSION['search']; } ?>'>
    </div>
    <input id="search_button" type='button' value='Search' />
    <div id="search_query" class="float-left">
        <?php
        if(isset($_SESSION['search'])){ 
            $search= $_SESSION['search'];
        ?>
        <script type="text/javascript">
            function change_req(id) {
                var rowId = document.getElementById(id).innerHTML;
                window.location = "index.php?page=view-request&id=" + rowId;
            }

            function change_act(id) {
                var rowId = document.getElementById(id).innerHTML;
                window.location = "index.php?page=view-action&id=" + rowId;
            }
            function change_add(id) {
                var rowId = document.getElementById(id).innerHTML;
                window.location = "index.php?page=view-address&id=" + rowId;
            }
            function change_name(id) {
                var rowId = document.getElementById(id).innerHTML;
                window.location = "index.php?page=view-name&id=" + rowId;
            }
            function change_addex(id) {
                var rowId = document.getElementById(id).innerHTML;
                window.location = "index.php?page=view-address&id=" + rowId + "&ex=1";
            }
            function change_nameex(id) {
                var rowId = document.getElementById(id).innerHTML;
                window.location = "index.php?page=view-name&id=" + rowId + "&ex=1";
            }
            function change_off(id, rowId) {
                window.location = "index.php?page=view-officer&id=" + rowId;
            }
            function change_ani(id) {
                var rowId = document.getElementById(id).innerHTML;
                window.location = "index.php?page=view-animal&id=" + rowId;
            }
        </script>
        <?php
            if(strlen($search) == 0){
                echo "Please enter a search query.";
            }
            else{
                $controller->Display("Search", "Search");
            }

        }
        ?>
    </div>
</div>
<div id="advanced" class="subPageContainer" <?php if(isset($_GET['d']) && $_GET['d'] == "advanced") echo "style='display:block;'"; else echo "style='display:none;'"; ?>>
    <script src="inc/js/pages/js.search.js"></script>
    <div id="searchResults">
    </div>
    <div id="form">
        <script type="text/javascript">
            $(document).ready(function () {
                $("#submit").click(function () {
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
                    submit();
                });

                $('body').on('keyup', function (e) {
                    if (e.which == 13) {
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
                        submit();
                    }
                });
                $("input[type='reset']").click(function () {
                    $("input[type=text],textarea,select").val("");
                    $("#global-udfs").html("");
                    $("#udfs").hide();
                    $("#service").val("");
                    $("#request").val("");
                    $("#function").val("");
                });

                function submit() {

                    Load();
                    $.ajax({
                        url: 'inc/ajax/ajax.RequestSearch.php',
                        data: $("#advancedSearch").serialize(),
                        type: 'POST',
                        timeout: 1000000,
                        success: function (data) {
                            Unload();
                            $("#searchResults").html(data);
                            window.scrollTo(0, 0);
                        },
                        error: function (x, t, m) {
                            Unload();
                            if (t == "timeout") {
                                alert("Please narrow your search.");
                            }
                            else {
                                alert("There was an error with the search.");
                            }

                        }
                    });
                }

                $("#reset").click(function () {
                    $("#searchResults").html("");
                });

                

            });

        </script>


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
                                    <input type="text" name="nameGiven">
                                </div>
                                <div class="column r30">
                                    <label>Surname:</label>
                                    <input type="text" name="nameSurname">
                                </div>                            

                                <div class="column r25">
                                    <label>Company:</label>
                                    <input type="text" name="company">
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
                                        <input type="text" name="phoneNumber">
                                 </div>
                                 <!--<div class="column r20">
                                        <label>Mobile:</label>
                                        <input type="text" name="mobileNumber">
                                 </div>-->
                                 <div class="column r30">
                                        <label>Email:</label>
                                        <input type="text" name="emailAddress">
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
                                <input class="text required" name='lno' id="lno" maxlength='15' value='<?php if(isset($_SESSION['rem_lno'])){ echo $_SESSION['rem_lno']; } ?>'>
                            </div>
                            <div class="column r30">
                                <label>Street:</label>
                                <input class="text required checkNone" name='lstreet' id="lstreet"  maxlength='100' value='<?php if(isset($_SESSION['rem_lstreet'])){ echo $_SESSION['rem_lstreet']; } ?>'>
                            </div>
                            <div class="column r15">
                                <label>Type</label>
                                <input class="text required checkNone" name='ltype' id="ltype"  maxlength='100' value='<?php if(isset($_SESSION['rem_ltype'])){ echo $_SESSION['rem_ltype']; } ?>'>
                            </div>
                            <div class="column r30">
                                <label>Suburb:</label>
                                <input class="text required checkNone" name='lsuburb' id="lsuburb"  maxlength='100' value='<?php if(isset($_SESSION['rem_lsuburb'])){ echo $_SESSION['rem_lsuburb']; } ?>'>
                            </div>
                            <div class="column r25">
                                <label>X Coord:</label>
                                <input type="text" name="addressX">
                            </div>
                            <div class="column r25">
                                <label>Y Coord:</label>
                                <input type="text" name="addressY">
                            </div>


                            <div class="float-left">
                                <label>Addr Dets:</label>
                                <input type="text" name="addressDets">
                            </div>
                        </div>
                    </div>
                    <div class="summaryContainer">
                        <h1>Facility</h1>
                        <div>
                            <div class="column r25">
                                <label>Type:</label>
                                <input class="text" name='facilityTypeInput' id="facilityTypeInput"  placeholder="Search..." value='<?php if(isset($_SESSION['rem_facilityType'])){ echo $_SESSION['rem_facilityType']; } ?>'>
                                <input type="hidden" name='facilityTypeId' id="facilityTypeId">
                            </div>
                            <div class="column r60">
                                <label>Name:</label>
                                <input class="text" name='facilityInput' id="facilityInput"   value='<?php if(isset($_SESSION['rem_facility'])){ echo $_SESSION['rem_facility']; } ?>'>
                                <input type="hidden" name='facilityId' id="facilityId">
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
                                <input class="text required" name='serviceInput' id="serviceInput"  placeholder="Search..." value='<?php if(isset($_SESSION['rem_serviceInput'])){ echo $_SESSION['rem_serviceInput']; } ?>'>
                                <input type="hidden" name='service' id="service">
                            </div>
                            <div class="column r33">
                                <label>Request:</label>
                                <input class="text required" name='requestInput' disabled="disabled" id="requestInput" value='<?php if(isset($_SESSION['rem_requestInput'])){ echo $_SESSION['rem_requestInput']; } ?>'>
                                <input type="hidden" name='request' id="request">
                            </div>
                            <div class="column r33">
                                <label>Function:</label>
                                <input class="text checkNone" name='functionInput' disabled="disabled" id="functionInput" value='<?php if(isset($_SESSION['rem_functionInput'])){ echo $_SESSION['rem_functionInput']; } ?>'>
                                <input type="hidden" name='function' id="function">
                            </div>
                            <div class="float-left">
                                <label>Request Description:</label>
                                <input name="requestDetails" />
                            </div>
                        </div>
                    </div>
                    <div class="summaryContainer">
                        <h1>Request Details</h1>
                        <div>
                            <div class="float-left">
                                <div class="column r25">
                                    <label>From:</label>
                                    <input type="text" class="dateField" name="dateFrom">
                                </div>
                                <div class="column r25">
                                    <label>To:</label>
                                    <input type="text" class="dateField" name="dateTo">
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
                                        <option value="N">No</option>
                                        <option value="Y">Yes</option>
                                        <option value="">All</option>
                                    </select>
                                </div>
                                <div class="column r20">
                                    <label>Finalised</label>
                                    <select name="finalised">
                                        <option value="">All</option>
                                        <option value="N">No</option>
                                        <option value="Y">Yes</option>
                                    </select>
                                </div>
                                <div class="column r20">
                                    <label>Intime</label>
                                    <select name="intime">
                                        <option value="">All</option>
                                        <option value="N">No</option>
                                        <option value="Y">Yes</option>
                                    </select>
                                </div>
                                <div class="column r20">
                                    <label>Escalated</label>
                                    <select name="escalated">
                                        <option value="">All</option>
                                        <option value="N">No</option>
                                        <option value="Y">Yes</option>
                                    </select>
                                </div>

                            </div>
                            <div class="float-left">
                                <div class="column r30">
                                    <label>Input Officer:</label>
                                    <input type="text" name="typeInputOffr" id="typeInputOffr" data-officer="true">
                                    <input type="hidden" name="typeInputOffrCode" id="typeInputOffrCode">
                                </div>
                                <div class="column r30">
                                    <label>Action Officer:</label>
                                    <input type="text" name="actionOfficer" id="actionOfficer" data-officer="true">
                                    <input type="hidden" name="actionOfficerCode" id="actionOfficerCode">
                                </div>
                                <div class="column r30">
                                    <label>Request Officer:</label>
                                    <input type="text" name="responsibleOfficer" id="responsibleOfficer" data-officer="true">
                                    <input type="hidden" name="responsibleOfficerCode" id="responsibleOfficerCode">
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

                <input type="hidden" name="action" value="RequestSearch" />
                <div class="column r100">
                    <br />
                    <input type="button" id="submit" data-ajax="true" value="Search">
                    <input type="reset" value="Reset" id="reset" name="reset">
                </div>
        </form>
    </div>
</div>
