<div data-role="header" data-tap-toggle="false" class="ui-header ui-bar-a" role="banner"><h1 class="ui-title" role="heading" aria-level="1">InfoXpert Login</h1></div>
<div data-role="content">
    <p>        
        <form class="normal" action="process.php" id="edms_login" method="post" style="padding-left:5%;padding-right:5%;">
            <p>Please re-enter your InfoXpert user/pswd, authentication failed! </p>
            <label class="ui-input-text" for="edms_username" style="font-weight:bold">User Name</label>
            <div class="ui-input-text ui-shadow-inset ui-corner-all ui-btn-shadow ui-body-c">
                <input class="login ui-input-text ui-body-c" autocapitalize="none" type="text" id="edms_username" name="edms_username" maxlength="100">
            </div>
             <label class="ui-input-text" for="edms_password" style="font-weight:bold">Password</label>
            <div class="ui-input-text ui-shadow-inset ui-corner-all ui-btn-shadow ui-body-c">
                <input class="login ui-input-text ui-body-c" autocapitalize="none" type="text" id="edms_password" name="edms_password" maxlength="100">
            </div>             
            <p>&nbsp;</p>
            <input type="button" id="EDMSlogin" name="EDMSlogin" value="Ok" class="ui-button ui-widget ui-state-default ui-corner-all" role="button" style="margin-left:80%;width:50px;margin-top:-20px;" aria-disabled="false">            
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
    </p>
</div>
