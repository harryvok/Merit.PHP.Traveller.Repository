<div class="summaryContainer">
    <h1>InfoXpert Login</h1>
    <!--<table style="background-color:none;">
        <tr>
            <td><label>Username:</label></td>
            <td><input type="text" id="edms_username" name="edms_username" maxlength="100" /></td>
        </tr>
        <tr>
            <td><label>Password:</label></td>
            <td><input type="password" id="edms_password" name="edms_password" maxlength="50" /></td>
        </tr>
    </table>-->
    <form class="normal" action="process.php" id="edms_login" method="post">
        Please re-enter your InfoXpert user/pswd, authentication failed! 
        <label class="titleLogin" for="edms_username">User Name</label>
        <input class="login required" type="text" id="edms_username" name="edms_username" maxlength='100' />
        <label class="titleLogin" for="edms_password">Password</label>
        <input class="login required" type="password" id="edms_password"name="edms_password" maxlength='50' />
        <p>&nbsp;</p>
        <input type="button" id="EDMSlogin" name="EDMSlogin" value="Ok"/>
        <!-- <input type="button" value="Details"/> -->
        <!--<input type="button" id="EDMScancel" name="EDMScancel" value="Cancel"/>       -->
    </form>
    <script type="text/javascript">
        $("#EDMScancel").click(function () {            
            $.ajax({
                url: 'inc/ajax/ajax.inforExpertLoginCancel.php',
                type: 'POST',
                success: function (data) {
                    $('#popup').html("");
                    $('#popup').css("margin", "");
                    $('#popup').css("overflow", "");
                    $('#popup').css("width", "auto");
                    $('#popup').css("display", "none");
                },
            });
        });
        $("#EDMSlogin").click(function () {
            Load();
            $("#EDMSlogin").prop("disbaled", "disabled");
            $("#EDMScancel").prop("disbaled", "disabled");
            $.ajax({
                url: 'inc/ajax/ajax.inforExpertLoginSave.php',
                type: 'POST',
                data:{
                    edms_user_id: $("#edms_username").val(),
                    edms_password: $("#edms_password").val()
                },
                success: function (data) {
                    $('#popup').html("");
                    $('#popup').css("margin", "");
                    $('#popup').css("overflow", "");
                    $('#popup').css("width", "auto");
                    $('#popup').css("display", "none");
                    location.reload();
                },
            });
        });
        $("#edms_login").validate();
	</script>
</div>