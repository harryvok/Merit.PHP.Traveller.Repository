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
      	 <h1>Resubmit</h1>
      </div>
      <div data-role="content">
        <div class="content-primary">
        
<style>
    input[type="date"]:hover::-webkit-calendar-picker-indicator {
    color: red;
}
input[type="date"]:hover:after {
    content: " Date Picker ";
    color: #555;
    padding-right: 20px;
}
input[type="date"]::-webkit-inner-spin-button {
    /* display: none; <- Crashes Chrome on hover */
    -webkit-appearance: none;
    margin: 0;
}
</style>
       <div data-role="collapsible" class="col" data-corners="false" data-collapsed="false" data-content-theme="c">
        <h4>Resubmit Details</h4>
            <div class="float-left">
                <div class="column Fieldx1">                             
		            <form style='display:inline;' enctype='multipart/form-data' action='process.php' id="ResubmitAction" method='post'>
                           
                         <b>Action Name:</b> <?php echo $_SESSION['reason_assigned']; ?>
                            <div>   
                                    <label  id="lab1">Date:</label><br />
                                    <input type="date" name="resubDate" style="width:40%;"  class="required"><br />

                                    <label  id="lab2">Time:</label><br />
			                        <input type="time" name="resubTime" style="width:40%;" class="required">
                                    <br /><br />
                                    <label  id="lab3">Comment:</label> 
                                    <textarea spellcheck="true" name="comment" style="width:100%; height:80px; padding:5px;" ></textarea>
                                    
                            </div>  
                                <br />
                                <input type="hidden" name="action" value="resubmitAction" />
                                <input type="submit" id="submit" value="Resubmit" />    
			       </form>
                </div>
           </div>
       </div>


<script>
    $(document).ready(function () {



        enableBeforeUnload();

        function enableBeforeUnload() {
            window.onbeforeunload = function (e) {
                return "You must enter a date and time to resubmit";
            };
        }
        function disableBeforeUnload() {
            window.onbeforeunload = null;
        }

        $("form").on("submit", function () {
            window.onbeforeunload = null;
        });

        $("#ResubmitAction").validate();
        $("#ResubmitAction").submit(function () {
            if ($(this).validate().numberOfInvalids() == 0) {
                $("#submit").attr("disabled", true);
            }
        });
    });
</script>
            </div>
          <?php include("mobile/page.navSidebar.php"); ?>
      </div>
	<?php
	
}
else{
	$_SESSION['error_not_logged_in'] = 1;
	header("Location: index.php");	
}
?>