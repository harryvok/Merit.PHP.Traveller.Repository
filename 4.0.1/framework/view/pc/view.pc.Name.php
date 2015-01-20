<script type="text/javascript">
    $(document).ready(function () {
        $(".summaryColumn").css("display", "block");
        //$(".EditNameEdit").css("display", "none");
        $(".edit").on(eventName, function () {
            $(".summaryColumn").css("display", "none");
            $(".EditNameEdit").css("display", "block");
        });

        $("#close").on(eventName, function () {
            $(".summaryColumn").css("display", "block");
            $(".EditNameEdit").css("display", "none");
            $("#editInitial_val").val($("#editInitial").html().replace(/^\s+|\s+$/g, ''));
            $("#editPref_title_val").val($("#editPref_title").html().replace(/^\s+|\s+$/g, ''));
            $("#editGiven_names_val").val($("#editGiven_names").html().replace(/^\s+|\s+$/g, ''));
            $("#editSurname_val").val($("#editSurname").html().replace(/^\s+|\s+$/g, ''));
            $("#editMobile_no_val").val($("#editMobile_no").html().replace(/^\s+|\s+$/g, ''));
            $("#editTelephone_val").val($("#editTelephone").html().replace(/^\s+|\s+$/g, ''));
            $("#editWork_phone_val").val($("#editWork_phone").html().replace(/^\s+|\s+$/g, ''));
            $("#editEmail_address_val").val($("#editEmail_address").html().replace(/^\s+|\s+$/g, ''));
            $("#editCompany_name_val").val($("#editCompany_name").html().replace(/^\s+|\s+$/g, ''));
            $("#editFax_no_val").val($("#editFax_no").html().replace(/^\s+|\s+$/g, ''));
            $("#editName_ctr_val").val($("#editName_ctr").html().replace(/^\s+|\s+$/g, ''));
        });

        $("#submitEditName").on(eventName, function () {
            alert("Warning - Any changes to this Name Record will impact all requests associated with this name!");
            Load();
            $.ajax({
                url: 'inc/ajax/ajax.modifyNameDetails.php',
                type: 'post',
                data: {
                    name_id: $("#name_id").val(),
                    initial: $("#editInitial_val").val(),
                    pref_title: $("#editPref_title_val").val(),
                    given: $("#editGiven_names_val").val(),
                    surname: $("#editSurname_val").val(),
                    cust_mobile: $("#editMobile_no_val").val(),
                    cust_phone: $("#editTelephone_val").val(),
                    cust_work: $("#editWork_phone_val").val(),
                    email_address: $("#editEmail_address_val").val(),
                    company: $("#editCompany_name_val").val(),
                    fax: $("#editFax_no_val").val(),
                    name_ctr: $("#editName_ctr_val").val(),
                    new_name: "N"
                },
                success: function (data) {
                    location.reload();                    
                }
            });
        });
    });
</script>
<div class="summaryContainer">
    <h1>Details <span class="summaryColumnTitle" style="float:right"><a class="edit" id="EditNameDetails" style="color:white"><img src="images/modify-icon.png">Modify</a> </span></h1>
    <div> 
        <div class="float-left">
            <div class="column r50">
                <span class="summaryColumnTitle">Surname</span>
                <div class="summaryColumn" id="editSurname">
                    <?php echo $GLOBALS['result']->surname; ?>
                </div>
                <div class="EditNameEdit">
                    <input type="text" spellcheck="true" name="EditDescriptionText" id="editSurname_val" value="<?php /* Display the surname */  if(isset($GLOBALS['result']->surname)){ echo $GLOBALS['result']->surname; } ?>" />
                </div>
            </div>
            <div class="column r50">
                <div class="column r25"> 
                    <span class="summaryColumnTitle">Title</span>
                    <div class="summaryColumn" id="editPref_title">
                        <?php echo $GLOBALS['result']->pref_title; ?>
                    </div>
                    <div class="EditNameEdit">
                    <input type="text" spellcheck="true" name="EditDescriptionText" id="editPref_title_val" value="<?php /* Display the pref_title */  if(isset($GLOBALS['result']->pref_title)){ echo $GLOBALS['result']->pref_title; } ?>" />
                </div>
                </div>
                <div class="column r25"> 
                    <span class="summaryColumnTitle">Initials</span>
                    <div class="summaryColumn" id="editInitial">
                        <?php echo $GLOBALS['result']->initials; ?>
                    </div>
                    <div  class="EditNameEdit">
                    <input type="text" spellcheck="true" name="EditDescriptionText" id="editInitial_val" value="<?php /* Display the initials */  if(isset($GLOBALS['result']->initials)){ echo $GLOBALS['result']->initials; } ?>" />
                </div>
                </div>
            </div>
        </div>      
        <div class="float-left">
            <div class="column r50">
                <span class="summaryColumnTitle">Given Name</span>
                <div class="summaryColumn" id="editGiven_names" style="width:100%;">
                    <?php echo $GLOBALS['result']->given_names; ?>
                </div>
                <div class="EditNameEdit">
                    <input type="text" spellcheck="true" name="EditDescriptionText" id="editGiven_names_val" value="<?php /* Display the given_names */  if(isset($GLOBALS['result']->given_names)){ echo $GLOBALS['result']->given_names; } ?>" />
                </div>
            </div>
            <div class="column r50"> 
                <span class="summaryColumnTitle">Email Address</span>
                <div class="summaryColumn" id="editEmail_address" style="width:100%;">
                    <?php echo $GLOBALS['result']->email_address; ?>
                </div>
                <div class="EditNameEdit">
                    <input type="text" spellcheck="true" name="EditDescriptionText" id="editEmail_address_val" value="<?php /* Display the email_address */  if(isset($GLOBALS['result']->email_address)){ echo $GLOBALS['result']->email_address; } ?>" />
                </div>
            </div>
        </div>
        <div style="float:left;width:100%;">
            <div class="column r50">
                <span class="summaryColumnTitle">Company Name</span>
                <div class="summaryColumn" id="editCompany_name"  style="width:100%;">
                    <?php echo $GLOBALS['result']->company_name; ?>
                </div>
                <div class="EditNameEdit">
                    <input type="text" spellcheck="true" name="EditDescriptionText" id="editCompany_name_val" value="<?php /* Display the company_name */  if(isset($GLOBALS['result']->company_name)){ echo $GLOBALS['result']->company_name; } ?>" />
                </div>
            </div>
        </div>
        <div class="column r25">
            <span class="summaryColumnTitle">Telephone</span>
            <div class="summaryColumn" id="editTelephone" ><?php echo $GLOBALS['result']->telephone; ?></div>
            <div class="EditNameEdit">
                <input type="text" spellcheck="true" name="EditDescriptionText" id="editTelephone_val" value="<?php /* Display the telephone */  if(isset($GLOBALS['result']->telephone)){ echo $GLOBALS['result']->telephone; } ?>" />
            </div>
            <span class="summaryColumnTitle">Mobile No</span>
            <div class="summaryColumn" id="editMobile_no"><?php echo $GLOBALS['result']->mobile_no; ?></div>
            <div class="EditNameEdit">
                <input type="text" spellcheck="true" name="EditDescriptionText" id="editMobile_no_val" value="<?php /* Display the mobile_no */  if(isset($GLOBALS['result']->mobile_no)){ echo $GLOBALS['result']->mobile_no; } ?>" />
            </div>
        </div>
        <div class="column r25">
            <span class="summaryColumnTitle">Work Phone</span>
            <div class="summaryColumn" id="editWork_phone"><?php echo $GLOBALS['result']->work_phone; ?></div>
            <div class="EditNameEdit">
                <input type="text" spellcheck="true" name="EditDescriptionText" id="editWork_phone_val" value="<?php /* Display the work_phone */  if(isset($GLOBALS['result']->work_phone)){ echo $GLOBALS['result']->work_phone; } ?>" />
            </div>
            <span class="summaryColumnTitle">FAX No</span>
            <div class="summaryColumn" id="editFax_no"><?php echo $GLOBALS['result']->fax_no; ?></div>
            <div class="EditNameEdit">
                <input type="text" spellcheck="true" name="EditDescriptionText" id="editFax_no_val" value="<?php /* Display the fax_no */  if(isset($GLOBALS['result']->fax_no)){ echo $GLOBALS['result']->fax_no; } ?>" />
            </div>
        </div>
        <div class="column r25">
            <span class="summaryColumnTitle">NAR ID</span>
            <div class="summaryColumn" id="editName_ctr"> <?php echo $GLOBALS['result']->name_ctr; ?></div>
            <div class="EditNameEdit">
                <input type="text" spellcheck="true" name="EditDescriptionText" id="editName_ctr_val" value="<?php /* Display the name_ctr */  if(isset($GLOBALS['result']->name_ctr)){ echo $GLOBALS['result']->name_ctr; } ?>" />
            </div>
        </div> 
        <div class="float-left">
            <div class="EditNameEdit">
                <br />
                <br />
                <input type="hidden" id="name_id" value="<?php echo $_GET['id']; ?>" />
                <input type="button" id="submitEditName" value="Save" />
                <input type="button" id="close" value="Close" />
            </div> 
        </div>       
    </div> 
</div>