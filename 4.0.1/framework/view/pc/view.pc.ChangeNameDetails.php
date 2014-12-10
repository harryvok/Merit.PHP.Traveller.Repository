<script type="text/javascript">
    $(document).ready(function () {
        $("#popup").fadeIn("fast");
        
        $("#existing").click(function () {
            $("#namechange").val("Yes");
            $.ajax({
                url: 'inc/ajax/ajax.chooseAdhocOfficer.php',
                type: 'post',
                data: {
                    ser: $("#service").val(),
                    req: $("#request").val(),
                    func: $("#function").val()
                },
                success: function (data) {

                    if ($("#deviceIndicator").val() == "pc") {
                        $('#popup').html(data);
                    } else {
                        $("#adhocOfficer").html(data).trigger("create");
                    }
                }
            });
        });

        $("#new").click(function () {
            $.ajax({
                url: 'inc/ajax/ajax.modifyNameDetails.php',
                type: 'post',
                data: {
                    name_id: $("#name_id").val(),
                    pref_title: $("#new_pref_title").val(),
                    given: $("#new_given").val(),
                    surname: $("#new_surname").val(),
                    cust_mobile: $("#new_cust_mobile").val(),
                    cust_phone: $("#new_cust_phone").val(),
                    cust_work: $("#new_cust_work").val(),
                    email_address: $("#new_email_address").val(),
                    company: $("#new_company").val()
                },
                success: function (data) {
                    //alert(data);
                    $('#popup').html("");
                    $('#popup').fadeOut("fast");
                    if (data != "") {
                        $("#name_id").val(data);
                    }
                    $.ajax({
                        url: 'inc/ajax/ajax.chooseAdhocOfficer.php',
                        type: 'post',
                        data: {
                            ser: $("#service").val(),
                            req: $("#request").val(),
                            func: $("#function").val()
                        },
                        success: function (data) {

                            if ($("#deviceIndicator").val() == "pc") {
                                $('#popup').html(data);
                            } else {
                                $("#adhocOfficer").html(data).trigger("create");
                            }
                        }
                    });
                }
            });
        });
    });
</script>
<div class="summaryContainer">
    <br />
    <h1>Name Details Changed<span  class="closePopup"><img src="images/delete-icon.png" /> Close</span></h1>
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