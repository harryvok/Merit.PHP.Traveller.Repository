<style>
    .label {
        width:85px;
    }
    .box {
        min-width:150px;
        width:auto;
    }
</style>
<div data-role="page" id="search_data" data-dom-cache="true">
    <div data-role="header" data-tap-toggle="false" data-position="fixed">
        <h1>Search</h1>
        <script src="inc/js/pages/js.search.js"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $("#action").val("Search");
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
                    Load();
                    var url = "inc/ajax/ajax.search.php";
                    var data = "";
                    if ($("#action").val() == "Search") {
                        $.ajax({
                            url: 'inc/ajax/ajax.search.php',
                            data: {
                                search_q: $("#search").val()
                            },
                            type: 'POST',
                            success: function (data) {
                                Unload();
                                $('#search_query').html(data).trigger("create");
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
                                $('#adv_search_query').html(data).trigger("create");
                                var os = $("#adv_search_query").offset();                                
                                window.scrollTo(0, os.top);
                            }
                        });
                    }                    
                });

                $("#reset").click(function(){
                    if ($("#action").val() == "Search") {                        
                        $("#search").val("");
                        $('#search_query').html("");
                    }
                    else {
                        document.getElementById("advancedSearch").reset();
                        $("#requestInput").attr("disabled", "disabled");
                        $("#functionInput").attr("disabled", "disabled");
                        $('#adv_search_query').html("");
                    }                    
                });
            });            
        </script>
    </div>
    <div data-role="content">
        <?php include("mobile/page.navSidebar.php"); ?>
        <input type="button" id="search_basic" name="search_basic" value="Basic" />
        <input type="button" id="search_adv" name="search_adv" value="Advanced" />
        <div id="basic" <?php if(isset($_GET['action']) &&$_GET['action'] == "advanced") echo "style='display:none;'"; else echo "style='display:block;'"; ?>>            
            <form id="basicSearch">
				<h2>Basic Search</h2>
                <input type="search" name="search" id="search" value="" />
            </form>
        </div>
        <div id="advanced" class="subPageContainer" <?php if(isset($_GET['action']) && $_GET['action'] == "advanced") echo "style='display:block;'"; else echo "style='display:none;'"; ?>>
            <form id="advancedSearch">
				<h2>Advanced Search</h2>
                <div data-role="collapsible" data-collapsed="false" class="col" data-content-theme="c">
                    <h4>Type</h4>
                    <table style="width:100%" >
                        <tr>
                            <td class="label">Service:</td>
                            <td class="box"><input name='serviceInput' id="serviceInput"  placeholder="Search..." value='<?php if(isset($_SESSION['serviceInput'])){ echo $_SESSION['serviceInput']; } ?>'><input type="hidden" name='service' id="service"></td>
                        </tr>
                        <tr>
                            <td class="label">Request:</td>
                            <td class="box"><input name='requestInput' id="requestInput"  placeholder="Search..." value='<?php if(isset($_SESSION['requestInput'])){ echo $_SESSION['requestInput']; } ?>'><input type="hidden" name='request' id="request"></td>
                        </tr>
                        <tr>
                            <td class="label">Function:</td>
                            <td class="box"><input name='functionInput' id="functionInput"  placeholder="Search..." value='<?php if(isset($_SESSION['functionInput'])){ echo $_SESSION['functionInput']; } ?>'><input type="hidden" name='function' id="function"></td>
                        </tr>
                    </table>
                </div>
                <div data-role="collapsible" data-collapsed="false" class="col" data-content-theme="c">
                    <h4>Request Details</h4>
                    <table style="width:100%">
                        <tr>
                            <td class="label">From:</td>
                            <td class="box"><input type="text" class="dateField" name="dateFrom" id="dateFrom" value='<?php if(isset($_SESSION['dateFrom'])){ echo $_SESSION['dateFrom']; } ?>'></td>
                        </tr>    
                        <tr>
                            <td class="label">To:</td>
                            <td class="box"><input type="text" class="dateField" name="dateTo" id="dateTo" value='<?php if(isset($_SESSION['dateTo'])){ echo $_SESSION['dateTo']; } ?>'></td>
                        </tr>                        
                        <tr>
                            <td class="label">Request Description:</td>
                            <td><input type="text" name="requestDetails" /></td>
                        </tr> 
                        <tr>
                            <td class="label">Count Only:</td>
                            <td>
                                <select name="countOnly">
                                    <option value="N">No</option>
                                    <option value="Y">Yes</option>
                                    <option value="">All</option>
                                </select>
                            </td>
                        </tr> 
                        <tr>
                            <td class="label">Finalised:</td>
                            <td>
                                <select name="finalised">
                                    <option value="">All</option>
                                    <option value="N">No</option>
                                    <option value="Y">Yes</option>
                                </select>
                            </td>
                        </tr>                     
                    </table>
                </div>
                <div data-role="collapsible" data-collapsed="true" class="col" data-content-theme="c">
                    <h4>Name</h4>
                    <table style="width:100%">
                        <tr>
                            <td class="label">Given:</td>
                            <td class="box"><input name='nameGiven' id="nameGiven"  placeholder="Search..." value='<?php if(isset($_SESSION['nameGiven'])){ echo $_SESSION['nameGiven']; } ?>'></td>
                        </tr>
                        <tr>
                            <td class="label">Surname:</td>
                            <td class="box"><input name='nameSurname' id="nameSurname"  placeholder="Search..." value='<?php if(isset($_SESSION['nameSurname'])){ echo $_SESSION['nameSurname']; } ?>'></td>
                        </tr>
                        <tr>
                            <td class="label">Phone Number:</td>
                            <td><input type="text" name="phoneNumber"></td>
                        </tr>
                        <tr>
                            <td class="label">Email:</td>
                            <td> <input type="text" name="emailAddress"></td>
                        </tr>
                    </table>
                </div>
                <div data-role="collapsible" data-collapsed="true" class="col" data-content-theme="c">
                    <h4>Address</h4>
                    <table style="width:100%">
                        <tr>
                            <td class="label">House No:</td>
                            <td class="box"><input name='lno' id="lno"  placeholder="Search..." value='<?php if(isset($_SESSION['lno'])){ echo $_SESSION['lno']; } ?>'></td>
                        </tr>
                        <tr>
                            <td class="label">Street:</td>
                            <td class="box"><input name='lstreet' id="lstreet"  placeholder="Search..." value='<?php if(isset($_SESSION['lstreet'])){ echo $_SESSION['lstreet']; } ?>'></td>
                        </tr>
                        <tr>
                            <td class="label">Type:</td>
                            <td class="box"><input name='ltype' id="ltype"  placeholder="Search..." value='<?php if(isset($_SESSION['ltype'])){ echo $_SESSION['ltype']; } ?>'></td>
                        </tr>
                        <tr>
                            <td class="label">Suburb:</td>
                            <td class="box"><input name='lsuburb' id="lsuburb"  placeholder="Search..." value='<?php if(isset($_SESSION['lsuburb'])){ echo $_SESSION['lsuburb']; } ?>'></td>
                        </tr>
                    </table>
                </div>
                <div data-role="collapsible" data-collapsed="true" class="col" data-content-theme="c">
                    <h4>Facility</h4>
                    <table style="width:100%">                        
                        <tr>
                            <td class="label">Type:</td>
                            <td>
                                <input class="text" name='facilityTypeInput' id="facilityTypeInput"  placeholder="Search..." value='<?php if(isset($_SESSION['rem_facilityType'])){ echo $_SESSION['rem_facilityType']; } ?>'>
                                <input type="hidden" name='facilityTypeId' id="facilityTypeId">
                            </td>
                        </tr>
                        <tr>
                            <td class="label">Name:</td>
                            <td class="box"><input name='facilityInput' id="facilityInput"  placeholder="Search..." value='<?php if(isset($_SESSION['facilityInput'])){ echo $_SESSION['facilityInput']; } ?>'></td>
                        </tr>
                    </table>
                </div>                                			    
            </form>
        </div>
        <div>       
            <input type="hidden" name="action" id="action" value="" />
            <input type="submit" id="submit" value="Search" />
            <input type="reset" value="Reset" id="reset" name="reset">
        </div>
        <div id="search_query">
            <!-- resulr will be dispalyed here -->
        </div>
        <div id="adv_search_query" style="display:none">
            <!-- resulr will be dispalyed here -->
        </div>
    </div>
    <?php
    
    include("mobile/page.navFooter.php");
    ?>
</div>
