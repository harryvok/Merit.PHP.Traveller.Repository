
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
       <div class="summaryContainer">
           <h1>Resubmit Details</h1>
            <div class="float-left">
                <div class="column Fieldx1">                             
		            <form style='display:inline;' enctype='multipart/form-data' action='process.php' id="ResubmitAction" method='post'>
                           
                         <b>Action Name:</b> <?php echo $_SESSION['assign_name']; ?>
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