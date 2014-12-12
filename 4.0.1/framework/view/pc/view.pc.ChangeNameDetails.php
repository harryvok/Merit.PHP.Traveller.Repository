<script src="../inc/js/pages/js.new-request.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $("#popup").fadeIn("fast");
        $("#pc_name_change_close").click(function () {
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
<div class="summaryContainer">
    <br />
    <h1>Name Details Changed<span id="pc_name_change_close" class="closePopup"><img src="images/delete-icon.png" /> Close</span></h1>
    <br />
    <b>You have changed the surname/given name details for an existing name record.</b>
    <br />
    <br />
    <table>
        <thead>
            <tr><th>Name Item:</th><th>Original Data</th><th>New Data</th></tr>
        </thead>
        <tbody>
            <?php 
            $result_n_ar = $GLOBALS['parameters'];
            ?>
            <input type="hidden" id="new_pref_title" name="new_pref_title" value="<?php echo $_POST["pref_title"]; ?>" />
            <input type="hidden" id="new_given" name="new_given" value="<?php echo $_POST["given"]; ?>" />
            <input type="hidden" id="new_surname" name="new_surname" value="<?php echo $_POST["surname"]; ?>" />
            <input type="hidden" id="new_cust_phone" name="new_cust_phone" value="<?php echo $_POST["cust_phone"]; ?>" />
            <input type="hidden" id="new_cust_work" name="new_cust_work" value="<?php echo $_POST["cust_work"]; ?>" />
            <input type="hidden" id="new_cust_mobile" name="new_cust_mobile" value="<?php echo $_POST["cust_mobile"]; ?>" />
            <input type="hidden" id="new_email_address" name="new_email_address" value="<?php echo $_POST["email_address"]; ?>" />
            <input type="hidden" id="new_company" name="new_comapany" value="<?php echo $_POST["company"]; ?>" />
            <input type="hidden" id="name_id" name="name_id" value="<?php echo $_POST["name_id"]; ?>" />
            <?php
            ?>
            <tr class="light">
                <td><b>Title:</b></td>
                <td><?php if($_POST["old_pref_title"] != "") echo $_POST["old_pref_title"]; else echo "-"; ?></td>
                <td><?php if($_POST["pref_title"] != "") echo $_POST["pref_title"]; else echo "-";?></td>
            </tr>
            <tr class="light">
                <td><b>Surname:</b></td>
                <td><?php if($_POST["old_surname"] != "") echo $_POST["old_surname"]; else echo "-"; ?></td>
                <td><?php if($_POST["surname"] != "") echo $_POST["surname"]; else echo "-"; ?></td>
            </tr>
            <tr class="light">
                <td><b>Given:</b></td>
                <td><?php if($_POST["old_given"] != "") echo $_POST["old_given"]; else echo "-"; ?></td>
                <td><?php if($_POST["given"] != "") echo $_POST["given"]; else echo "-";?></td>
            </tr>
            <tr class="light">
                <td><b>Phone No:</b></td>
                <td><?php if($_POST["old_cust_phone"] != "") echo $_POST["old_cust_phone"]; else echo "-"; ?></td>
                <td><?php if($_POST["cust_phone"] != "") echo $_POST["cust_phone"]; else echo "-"; ?></td>
            </tr>
            <tr class="light">
                <td><b>Work No:</b></td>
                <td><?php if($_POST["old_cust_work"] != "") echo $_POST["old_cust_work"]; else echo "-"; ?></td>
                <td><?php if($_POST["cust_work"] != "") echo $_POST["cust_work"]; else echo "-"; ?></td>
            </tr>
            <tr class="light">
                <td><b>Mobile No:</b></td>
                <td><?php if($_POST["old_cust_mobile"] != "") echo $_POST["old_cust_mobile"]; else echo "-"; ?></td>
                <td><?php if($_POST["cust_mobile"] != "") echo $_POST["cust_mobile"]; else echo "-"; ?></td>
            </tr>
            <tr class="light">
                <td><b>Email:</b></td>
                <td><?php if($_POST["old_email_address"] != "") echo $_POST["old_email_address"]; else echo "-"; ?></td>
                <td><?php if($_POST["email_address"] != "") echo $_POST["email_address"]; else echo "-"; ?></td>
            </tr>
            <tr class="light">
                <td><b>Company:</b></td>
                <td><?php if($_POST["old_company"] != "") echo $_POST["old_company"]; else echo "-"; ?></td>
                <td><?php if($_POST["company"] != "") echo $_POST["company"]; else echo "-"; ?></td>
            </tr>
        </tbody>
    </table>
    <br />
    <b>Do you want to update the original name with the new data?</b>
    <br /><br />
    <p>Tip: To Update the original name choose "Yes", or to create a new name record using these details choose "No".</p>
    <br />
    <input type="button" id="existing" name="existing" value="Yes" />
    <input type="button" id="new" name="new" value="No" />
</div>