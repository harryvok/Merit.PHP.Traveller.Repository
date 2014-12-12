<a id="name_change_close" href="#" data-rel="back" data-role="button" data-theme="a" data-icon="delete" data-iconpos="notext" class="ui-btn-left">Close</a>
<div data-role="header" data-tap-toggle="false"> <h1>Name Details Changed</h1></div>
<div data-role="content">
    <p>
        <ul data-role="listview" data-inset="true">
            <script type="text/javascript">
                $(document).ready(function () {
                    $("#popup").popup("open");
                    $("#default").page('destroy');
                    $("#default").page();

                    $("#name_change_close").click(function () {
                        $("#submit").prop('disabled', false).buttonState("enable");
                        $("#saveMore").prop("disabled", false).buttonState("enable");
                    });

                    $("#existing").click(function () {
                        var new_name = "N";
                        modify_name(new_name);
                    });

                    $("#new").click(function () {
                        var new_name = "Y";
                        modify_name(new_name);
                    });
                });
            </script>
            <p><b>Surname/given name has changed for</b></p>
            <p><b>an existing name record.</b></p>
            <br />    
            <p><b>Name Item: Original Data / New Data</b></p>  
            <input type="hidden" id="new_pref_title" name="new_pref_title" value="<?php echo $_POST["pref_title"]; ?>" />
            <input type="hidden" id="new_given" name="new_given" value="<?php echo $_POST["given"]; ?>" />
            <input type="hidden" id="new_surname" name="new_surname" value="<?php echo $_POST["surname"]; ?>" />
            <input type="hidden" id="new_cust_phone" name="new_cust_phone" value="<?php echo $_POST["cust_phone"]; ?>" />
            <input type="hidden" id="new_cust_work" name="new_cust_work" value="<?php echo $_POST["cust_work"]; ?>" />
            <input type="hidden" id="new_cust_mobile" name="new_cust_mobile" value="<?php echo $_POST["cust_mobile"]; ?>" />
            <input type="hidden" id="new_email_address" name="new_email_address" value="<?php echo $_POST["email_address"]; ?>" />
            <input type="hidden" id="new_company" name="new_comapany" value="<?php echo $_POST["company"]; ?>" />
            <input type="hidden" id="name_id" name="name_id" value="<?php echo $_POST["name_id"]; ?>" />  
                  
            <p><b>Title: </b><?php if($_POST["old_pref_title"] != "") echo " ".$_POST["old_pref_title"]. " / "; else echo "- / "; if($_POST["pref_title"] != "") echo $_POST["pref_title"]; else echo "-";?></p>
            
            <p><b>Surname: </b><?php if($_POST["old_surname"] != "") echo " ".$_POST["old_surname"]. " / "; else echo "- / "; if($_POST["surname"] != "") echo $_POST["surname"]; else echo "-"; ?></p>
            
            <p><b>Given: </b><?php if($_POST["old_given"] != "") echo " ".$_POST["old_given"]. " / "; else echo "- / "; if($_POST["given"] != "") echo $_POST["given"]; else echo "-";?></p>
           
            <p><b>Phone No:</b><?php if($_POST["old_cust_phone"] != "") echo " ".$_POST["old_cust_phone"]. " / "; else echo "- / "; if($_POST["cust_phone"] != "") echo $_POST["cust_phone"]; else echo "-"; ?></p>
            
            <p><b>Work No :</b><?php if($_POST["old_cust_work"] != "") echo " ".$_POST["old_cust_work"]. " / "; else echo "- / "; if($_POST["cust_work"] != "") echo $_POST["cust_work"]; else echo "-"; ?></p>
            
            <p><b>Mobile No :</b><?php if($_POST["old_cust_mobile"] != "") echo " ".$_POST["old_cust_mobile"]. " / "; else echo "- / ";if($_POST["cust_mobile"] != "") echo $_POST["cust_mobile"]; else echo "-"; ?></p>
            
            <p><b>Email :</b><?php if($_POST["old_email_address"] != "") echo " ".$_POST["old_email_address"]. " / "; else echo "- / "; if($_POST["email_address"] != "") echo $_POST["email_address"]; else echo "-"; ?></p>
            
            <p><b>Company :</b><?php if($_POST["old_company"] != "") echo " ".$_POST["old_company"]. " / "; else echo "- / "; if($_POST["company"] != "") echo $_POST["company"]; else echo "-"; ?></p>
           
            <br />
            <p><b>Do you want to update the original name</b></p>
            <p><b> with the new data?</b></p>
            <p>Tip: Update original name choose "Yes",</p>
            <p>or create new name choose "No".</p>
            <br />
            <p style="align-content:center"><input type="button" id="existing" name="existing" value="Yes" /> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="button" id="new" name="new" value="No" /></p>
        </ul>
    </p>
</div>