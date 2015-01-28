
<script type="text/javascript">
    $(document).ready(function () {
        $("#popup").fadeIn("fast");
    });
</script>

<div class="summaryContainer">
    <h1>Enter Required Date Range<span id="IntrayDatePick" class="closePopup"><img src="images/delete-icon.png" />Close</span></h1>
        <div>
            <form>
                <label>From: </label>
                <input type="date" name="datefrom" id="datefrom" style="width:20%">

                <br />
                <label>To: &nbsp&nbsp&nbsp</label>
                <input type="date" name="dateto" id="dateto" style="width:20%">
            </form>
        </div>

        <div>
            <input type="hidden" id="intray" value="" />
            <input type="hidden" id="filtercode" value="" />
            <input type="button" id="SubmitIntray" value="Load Intray"/>
            <input type="button" id="Cancel" class="closePopup" value="Cancel"/>
        </div>
        
</div>

<script type="text/javascript">
    $('#SubmitIntray').on(eventName, function (event) {
        $("#popup").fadeOut("fast");

        var from = $("#datefrom").val();
        var to = $("#dateto").val();

        Load();
        $.ajax({
            url: "inc/ajax/ajax.getIntray.php",
            dataType: "html",
            data: {
                intray: "action",
                filterCode: "612371",
                from_date: from,
                to_date: to
            },
            timeout: 3000000,
            success: function (data) {
                Unload();
                $('#popup').html("");
                $("#popup").append("<h1>Results<span id='IntrayDatePick' class='closePopup'><img src='images/delete-icon.png' />Close</span></h1>");
                $('#popup').append(data);
                
                $('#popup').css('max-height', '800px');
                $("#popup").fadeIn("fast");


            },
            error: function (request, status, error) {
                Unload();
                $("#" + intray + "Intray").html("<div class='float-left'>There has been an error: " + error + ". Please try again. If it continues please contact Merit.</div>");

            }
        });
    });
</script>