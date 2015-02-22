<style>
    .label {
        width:85px;
    }
    .box {
        min-width:150px;
        width:auto;
    }
</style>
<script type="text/javascript">
    $(document).ready(function () {
        $("#disp_search").html("");
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
        $("#search_basic").click(function () {
            $("#basic").css("display", "block");
            $("#advance").css("display", "none");
        });
        $("#search_adv").click(function () {
            $("#basic").css("display", "none");
            $("#advance").css("display", "block");
            $("#disp_search").html("");
        });
        $("#reset_basic").click(function () {
            alert("rst bsc");
        });
    });
   
</script>
<?php
if(isset($_SESSION['user_id'])){
	if(isset($_GET['clear']) && $_GET['clear'] == 1){
		unset($_SESSION['search']);	
	}
   
	if(isset($_GET['search'])){
		$_SESSION['search'] = $_GET['search'];
	}    
?>
	<div data-role="page" id="default" data-dom-cache="true">
        <div data-role="header" data-tap-toggle="false" data-position="fixed">
            <h1>Search</h1>
        </div>
        <div data-role="content">
            <?php include("mobile/page.navSidebar.php"); ?>
            <input type="button" id="search_basic" name="search_basic" value="Basic" />
            <input type="button" id="search_adv" name="search_adv" value="Advance" />
            <div class="content-primary" id="basic" <?php if(isset($_GET['d']) && $_GET['d'] == "advanced") echo "style='display:none;'"; else echo "style='display:block;'"; ?>>
                <form action='index.php' method='get'>
				    <h2>Basic Search</h2>
				    <input type="hidden" name="page" value="search" />
                    <input type="hidden" name="d" value="basic" />
				    <input type="search" name="search" id="searchBasic" value="<?php if(isset($_SESSION['search'])){ echo $_SESSION['search']; } ?>" />
				    <input type="submit"  value="Search" />
                    <input type="reset" value="Reset" id="reset_basic" name="reset">
			    </form>
			    <?php
			    if(isset($_SESSION['search'])){
				    $search = $_SESSION['search'];

				    if(strlen($search) == 0){
					    echo "Please enter a search query.";
				    }
				    else{
					    $controller->Display("Search", "Search");
				    }
			    }
			    ?>
            </div>
            <div class="content-primary" id="advance" <?php if(isset($_GET['d']) &&$_GET['d'] == "advanced") echo "style='display:block;'"; else echo "style='display:none;'"; ?>>
                <script src="inc/js/pages/js.search.js"></script> 
                <script type="text/javascript">
                    $(document).ready(function () {
                        $("#disp_search").html("");
                        $("#advance_sub").click(function () {                            
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
                                success: function (data) {
                                    Unload();
                                    alert(data);
                                    $('#disp_search').html(data).trigger("create");
                                    $('#disp_search').show();
                                    window.scrollTo(0, 0);
                                },
                                error: function (x, t, m) {
                                    Unload();
                                    if (t == "timeout") {
                                        alert("Search timed out. Please narrow your search.");
                                    }
                                    else {
                                        alert("There was an error with the search. Please Narrow your search and try again.");
                                    }
                                }
                            });
                        }

                        $("#reset").click(function () {                            
                            $("#disp_search").html("");
                        });
                    });


            </script>
                <form id="advancedSearch">
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
                                <td class="label">To:</td>
                                <td class="box"><input type="text" class="dateField" name="dateTo" id="dateTo" value='<?php if(isset($_SESSION['dateTo'])){ echo $_SESSION['dateTo']; } ?>'></td>
                            </tr>
                            <tr>
                                <td class="label">From:</td>
                                <td class="box"><input type="text" class="dateField" name="dateFrom" id="dateFrom" value='<?php if(isset($_SESSION['dateFrom'])){ echo $_SESSION['dateFrom']; } ?>'></td>
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
                                <td class="label">Name:</td>
                                <td class="box"><input name='facilityInput' id="facilityInput"  placeholder="Search..." value='<?php if(isset($_SESSION['facilityInput'])){ echo $_SESSION['facilityInput']; } ?>'></td>
                            </tr>
                            <!--<tr>
                                <td>Request:</td>
                                <td><input size="80%" name='adv_requestInput' id="Text11"  placeholder="Search..." value='<?php if(isset($_SESSION['adv_requestInput'])){ echo $_SESSION['adv_requestInput']; } ?>'></td>
                            </tr>
                            <tr>
                                <td>Function:</td>
                                <td><input size="80%" name='adv_functionInput' id="Text12"  placeholder="Search..." value='<?php if(isset($_SESSION['adv_functionInput'])){ echo $_SESSION['adv_functionInput']; } ?>'></td>
                            </tr>-->
                        </table>
                    </div>
                    <input type="hidden" name="d" value="advanced" />
				    <input type="hidden" name="page" value="search" />				    
				    <input type="submit" id="advance_sub" value="Search" />
                    <input type="hidden" name="action" value="RequestSearch" />
                    <input type="reset" value="Reset" id="reset" name="reset">
			    </form>
            </div>
            <div id="disp_search">

            </div>
        </div>
    </div>
	<?php	
}
else{
	$_SESSION['error_not_logged_in'] = 1;
	header("Location: index.php");	
}
?>
