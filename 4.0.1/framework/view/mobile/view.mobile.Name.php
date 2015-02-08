<script type="text/javascript">
    $(document).ready(function () {
        $(".textbox").css("height", "10px");
        $(".original").css("display", "block");
        $(".edited").css("display", "none");
        $(".edit").on(eventName, function () {
            if (confirm("Warning - Any changes to this Name Record will impact all requests associated with this name!") == true) {
                $(".textbox").css("height", "auto");
                $(".original").css("display", "none");
                $(".edited").css("display", "block");
            }
        });
        $("#close").on(eventName, function () {
            $(".textbox").css("height", "10px");
            $(".original").css("display", "block");
            $(".edited").css("display", "none");
            resetdata();
        });

        $("#submitEditName").on(eventName, function () {            
            Load();
            modifyCustomerDetails($("#name_id").val(), $("#editInitial_val").val(), $("#editPref_title_val").val(), $("#editGiven_names_val").val(), $("#editSurname_val").val(), $("#editMobile_no_val").val(), $("#editTelephone_val").val(), $("#editWork_phone_val").val(), $("#editEmail_address_val").val(), $("#editCompany_name_val").val(), $("#editFax_no_val").val(), $("#editName_ctr_val").val());                      
        });
    });
</script>
<ul class="no-ellipses" data-role="listview" data-inset="true" data-divider-theme="d">
  	<li data-role="list-divider">Name Details</li>
    <li class="textbox">
        <p style="float:left">
            <strong>Surname: &nbsp;</strong>
            <p id="editSurname" class="original" style="float:left"><?php /* Display the description */  echo $GLOBALS['result']->surname; ?></p>
        </p>
        <div class="edited">
            <br />
            <input type="text" spellcheck="true" name="EditInstructionsText" id="editSurname_val" value="<?php /* Display the description */  if(isset($GLOBALS['result']->surname)){echo $GLOBALS['result']->surname; } ?>" />            
        </div>
    </li> 
    <li class="textbox">
        <p style="float:left">
            <strong>Given Names: &nbsp;</strong>
            <p id="editGiven_names" class="original" style="float:left"><?php /* Display the description */  echo $GLOBALS['result']->given_names; ?></p>
        </p>
        <div class="edited">
            <br />
            <input type="text" spellcheck="true" name="EditInstructionsText" id="editGiven_names_val" value="<?php /* Display the description */  if(isset($GLOBALS['result']->given_names)){echo $GLOBALS['result']->sugiven_namesrname; } ?>" />            
        </div>
    </li>    
    <li class="textbox">
        <p style="float:left">
            <strong>Initials: &nbsp;</strong>
            <p id="editInitial" class="original" style="float:left"><?php /* Display the description */  echo $GLOBALS['result']->initials; ?></p>
        </p>
        <div class="edited">
            <br />
            <input type="text" spellcheck="true" name="EditInstructionsText" id="editInitial_val" value="<?php /* Display the description */  if(isset($GLOBALS['result']->initials)){echo $GLOBALS['result']->initials; } ?>" />            
        </div>
    </li> 
    <li class="textbox">
        <p style="float:left">
            <strong>Title: &nbsp;</strong>
            <p id="editPref_title" class="original" style="float:left"><?php /* Display the description */  echo $GLOBALS['result']->pref_title; ?></p>
        </p>
        <div class="edited">
            <br />
            <input type="text" spellcheck="true" name="EditInstructionsText" id="editPref_title_val" value="<?php /* Display the description */  if(isset($GLOBALS['result']->pref_title)){echo $GLOBALS['result']->pref_title; } ?>" />            
        </div>
    </li>       
    <li class="textbox">
        <p style="float:left">
            <strong>Email Address: &nbsp;</strong>
            <p id="editEmail_address" class="original" style="float:left"><?php /* Display the description */  echo $GLOBALS['result']->email_address; ?></p>
        </p>
        <div class="edited">
            <br />
            <input type="text" spellcheck="true" name="EditInstructionsText" id="editEmail_address_val" value="<?php /* Display the description */  if(isset($GLOBALS['result']->email_address)){echo $GLOBALS['result']->email_address; } ?>" />            
        </div>
    </li> 
    <li class="textbox">
        <p style="float:left">
            <strong>Company Name: &nbsp;</strong>
            <p id="editCompany_name" class="original" style="float:left"><?php /* Display the description */  echo $GLOBALS['result']->company_name; ?></p>
        </p>
        <div class="edited">
            <br />
            <input type="text" spellcheck="true" name="EditInstructionsText" id="editCompany_name_val" value="<?php /* Display the description */  if(isset($GLOBALS['result']->company_name)){echo $GLOBALS['result']->company_name; } ?>" />            
        </div>
    </li>    
    <li class="textbox">
        <p style="float:left">
            <strong>Telephone: &nbsp;</strong>
            <p id="editTelephone" class="original" style="float:left"><?php /* Display the description */  echo $GLOBALS['result']->telephone; ?></p>
        </p>
        <div class="edited">
            <br />
            <input type="text" spellcheck="true" name="EditInstructionsText" id="editTelephone_val" value="<?php /* Display the description */  if(isset($GLOBALS['result']->telephone)){echo $GLOBALS['result']->telephone; } ?>" />            
        </div>
    </li>
    <li class="textbox">
        <p style="float:left">
            <strong>Work Phone: &nbsp;</strong>
            <p id="editWork_phone" class="original" style="float:left"><?php /* Display the description */  echo $GLOBALS['result']->work_phone; ?></p>
        </p>
        <div class="edited">
            <br />
            <input type="text" spellcheck="true" name="EditInstructionsText" id="editWork_phone_val" value="<?php /* Display the description */  if(isset($GLOBALS['result']->work_phone)){echo $GLOBALS['result']->work_phone; } ?>" />            
        </div>
    </li>
    <li class="textbox">
        <p style="float:left">
            <strong>Mobile phone: &nbsp;</strong>
            <p id="editMobile_no" class="original" style="float:left"><a href="tel:+<?php echo $GLOBALS['result']->mobile_no; ?>"><?php echo $GLOBALS['result']->mobile_no; ?></a></p>
        </p>
        <div class="edited">
            <br />
            <input type="text" spellcheck="true" name="EditInstructionsText" id="editMobile_no_val" value="<?php /* Display the description */  if(isset($GLOBALS['result']->mobile_no)){echo $GLOBALS['result']->mobile_no; } ?>" />            
        </div>
    </li>
    <li class="textbox">
        <p style="float:left">
            <strong>FAX No: &nbsp;</strong>
            <p id="editFax_no" class="original" style="float:left"><?php /* Display the description */  echo $GLOBALS['result']->fax_no; ?></p>
        </p>
        <div class="edited">
            <br />
            <input type="text" spellcheck="true" name="EditInstructionsText" id="editFax_no_val" value="<?php /* Display the description */  if(isset($GLOBALS['result']->fax_no)){echo $GLOBALS['result']->fax_no; } ?>" />            
        </div>
    </li>
    <li class="textbox">
        <p style="float:left">
            <strong>NAR ID: &nbsp;</strong>
            <p id="editName_ctr" class="original" style="float:left"><?php /* Display the description */  echo $GLOBALS['result']->name_ctr; ?></p>
        </p>
        <div class="edited">
            <br />
            <input type="text" spellcheck="true" name="EditInstructionsText" id="editName_ctr_val" value="<?php /* Display the description */  if(isset($GLOBALS['result']->name_ctr)){echo $GLOBALS['result']->name_ctr; } ?>" />            
            <br />
            <input type="hidden" id="name_id" value="<?php echo $_GET['id']; ?>" />
            <input type="button" id="submitEditName" value="Save" />
            <input type="button" id="close" value="Close" />
        </div>
    </li>                
    <?php
        if($_SESSION['roleSecurity']->modify_name == "Y"){
            ?>
            <a href="#" data-role="button" title="Edit Description" class="edit" id="EditDescription" style="width:120px;margin:10px auto;"><img src="images/modify-icon.png" width="16" height="16" />Modify</a>
            <?php
        }
    ?>
</ul>