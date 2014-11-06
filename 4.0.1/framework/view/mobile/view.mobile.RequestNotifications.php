<div data-role="collapsible" class="col" data-collapsed="true" data-corners="false" data-content-theme="c">
    <h4>Notifications <span class="ui-li-count ui-btn-up-c ui-btn-corner-all"><?php if(isset($GLOBALS['result']['notifications']->notification_details)) echo count($GLOBALS['result']['notifications']->notification_details); else echo 0; ?></span></h4>
    <p>
        <strong>Filter</strong>
        <select name="filterType" id="filterChange">
            <option value="">All</option>
                <option value="Customer">Customer</option>
                <option value="Responsible">Responsible</option>
                <option value="Action">Action</option>
                <option value="Supervisor">Supervisor</option>
        </select>
        <ul class="no-ellipses" data-role="listview" data-count-theme="b" data-inset="true">
            <?php
            
            if(isset($GLOBALS['result']['notifications']->notification_details)){
                if(count($GLOBALS['result']['notifications']->notification_details) > 1){
                    $i=-1;
                    foreach($GLOBALS['result']['notifications']->notification_details as $result_c_get){
                        $i++;
                        ?>
                        <li>
                            <p><b>Sent Time:</b><?php if(isset($result_c_get->escalate_time) && $result_c_get->escalate_time != "1970-01-01T00:00:00" && strlen($result_c_get->escalate_time) > 0){ echo date('d/m/Y h:i A',strtotime($result_c_get->escalate_time)); } else { echo ""; }  ?></p>
                            <p><b>Reason:</b><?php if(isset($result_c_get->reason_sent)) echo $result_c_get->reason_sent; ?></p>
                            <p><b>Sent To:</b><?php if(isset($result_c_get->sent_to)) echo $result_c_get->sent_to; ?></p>
                            <p><b>Sent By:</b><?php if(isset($result_c_get->sent_by)) echo $result_c_get->sent_by; ?></p>
                            <p><b class="filterObject" id="filterObject<?php echo $i; ?>">Type:</b><?php if(isset($result_c_get->officer_type)) echo $result_c_get->officer_type; ?></p>
                            <p><b>Notification:</b> <?php if(isset($result_c_get->comments)) echo base64_decode($result_c_get->comments); ?></p>
                        </li>
                        <?php
                                              
                    }
                }
                elseif(count($GLOBALS['result']['notifications']->notification_details) == 1){
                    $result_c_get = $GLOBALS['result']['notifications']->notification_details;
                    ?>
                    <li>
                        <p><b>Sent Time:</b><?php if(isset($result_c_get->escalate_time) && $result_c_get->escalate_time != "1970-01-01T00:00:00" && strlen($result_c_get->escalate_time) > 0){ echo date('d/m/Y h:i A',strtotime($result_c_get->escalate_time)); } else { echo ""; }  ?></p>
                            <p><b>Reason:</b><?php if(isset($result_c_get->reason_sent)) echo $result_c_get->reason_sent; ?></p>
                            <p><b>Sent To:</b><?php if(isset($result_c_get->sent_to)) echo $result_c_get->sent_to; ?></p>
                            <p><b>Sent By:</b><?php if(isset($result_c_get->sent_by)) echo $result_c_get->sent_by; ?></p>
                            <p><b class="filterObject" id="filterObject0">Type:</b><?php if(isset($result_c_get->officer_type)) echo $result_c_get->officer_type; ?></p>
                            <p><b>Notification:</b> <?php if(isset($result_c_get->comments)) echo base64_decode($result_c_get->comments); ?></p>
                    </li>
                    <?php
                                              
                }
            }
            ?>
        </ul>
    </p>
</div>




<!-- Send Notification Div -->
    <div data-role="collapsible" class="col" data-corners="false" data-collapsed="false" data-content-theme="c">
        <h4>Send Notification</h4>

    <!-- Start Form -->
        <script type="text/javascript" src="inc/js/pages/js.sendNotificationMobile.js"></script>
        <form id="notificationForm" method="post" action="process.php" enctype='multipart/form-data'>
        <input type="hidden" value="<?php echo $i; ?>" name="officerCount" />
            
        <!-- Select Recipients Div -->
            <div data-role="collapsible" class="col" data-collapsed="false" data-corners="false" data-content-theme="b" data-theme="b" style="overflow:hidden;" >
                <h4>Select Recipients</h4>


                <!-- Usefull Styling Code for Insets
                    padding-top: 10px;
                    padding-right: 0px;
                    padding-bottom: 0px;
                    padding-left: 0px;
                    border-right-width: 0px;
                    border-left-width: 0px;
                    border-bottom-width: 0px;
                -->


                    <!-- Table Start -->
                            <table class="mobileNotifyTable">
                                <thead>
                                    <tr>
                                        <th>Full Name</th>
                                        <th>Email</th>
                                        <th>SMS</th>
                                    </tr>
                                </thead>
                                <tbody id="officers">
                                    
                                    <!-- More than one included Recipient -->
                                    <?php
                                        $number=0;
                                        if(isset($GLOBALS['result']['notify_officers']->officer_notify_details) && count($GLOBALS['result']['notify_officers']->officer_notify_details) > 1){
                                            $i=0;
                                            foreach($GLOBALS['result']['notify_officers']->officer_notify_details as $result){
                                                $number = $number+1;
                                                $i++;
                                                if($number == 2){
                                                    $class = "dark";
                                                    $number = 0;
                                                }
                                                else{
                                                    $class = "light";
                                                }
                                    ?>

                                        <tr class="<?php echo $class; ?>">
                                            <td><?php if(isset($result->officer_type_name)) echo $result->officer_type_name; ?> (<?php if(isset($result->officer_name)) echo $result->officer_name; ?>)</td>
                                            <td>
                                                <input type="checkbox" <?php if(!isset($result->officer_email) || strlen($result->officer_email) == 0) echo "class='hiddenCheckbox''"; ?> name="email_name_code[]" id="officerEmail<?php echo $i; ?>" value="<?php echo $result->officer_code; ?>" data-name="<?php if(isset($result->officer_name)) echo $result->officer_name; ?>" data-type="Email" />
                                                <input type="checkbox" class="hiddenCheckbox" style="z-index:0" <?php if(!isset($result->officer_email) || strlen($result->officer_email) == 0) echo "disabled='disabled'"; ?> name="email_name_type[]" id="officerEmail<?php echo $i; ?>Type" value="<?php echo $result->officer_type; ?>" data-type="Email"/>
                                                <input type="checkbox" class="hiddenCheckbox" style="z-index:0" <?php if(!isset($result->officer_email) || strlen($result->officer_email) == 0) echo "disabled='disabled'"; ?> name="email_name[]" id="officerEmail<?php echo $i; ?>Name" value="<?php echo $result->officer_name; ?>" data-type="Email"/>
                                                <input type="checkbox" class="hiddenCheckbox" style="z-index:0" <?php if(!isset($result->officer_email) || strlen($result->officer_email) == 0) echo "disabled='disabled'"; ?> name="email_to[]" id="officerEmail<?php echo $i; ?>Email" value="<?php echo $result->officer_email; ?>" data-type="Email"/>
                                            </td>
                                            <td>
                                                <input type="checkbox" <?php if(!isset($result->officer_mobile) || strlen($result->officer_mobile) == 0) echo "class='hiddenCheckbox'"; ?> name="sms_name_code[]" id="officerSMS<?php echo $i; ?>" value="<?php echo $result->officer_code; ?>" data-name="<?php if(isset($result->officer_name)) echo $result->officer_name; ?>" data-type="SMS" />
                                                <input type="checkbox" class="hiddenCheckbox" style="z-index:0" <?php if(!isset($result->officer_mobile) || strlen($result->officer_mobile) == 0) echo "disabled='disabled'"; ?> name="sms_name_type[]" id="officerSMS<?php echo $i; ?>Type" value="<?php echo $result->officer_type; ?>" data-type="SMS"/>
                                                <input type="checkbox" class="hiddenCheckbox" style="z-index:0" <?php if(!isset($result->officer_mobile) || strlen($result->officer_mobile) == 0) echo "disabled='disabled'"; ?> name="sms_name[]" id="officerSMS<?php echo $i; ?>Name" value="<?php echo $result->officer_name; ?>" data-type="SMS"/>
                                                <input type="checkbox" class="hiddenCheckbox" style="z-index:0" <?php if(!isset($result->officer_mobile) || strlen($result->officer_mobile) == 0) echo "disabled='disabled'"; ?> name="sms_mobile_no[]" id="officerSMS<?php echo $i; ?>Email" value="<?php echo $result->officer_mobile; ?>" data-type="SMS"/>

                                            </td>
                                        </tr>
                                    <?php   
                                        }
                                    }
                                    elseif(isset($GLOBALS['result']['notify_officers']->officer_notify_details) && count($GLOBALS['result']['notify_officers']->officer_notify_details) == 1){
                                        $result = $GLOBALS['result']['notify_officers']->officer_notify_details;
                                        $i= 1;
                                    ?>
                                    <tr class="dark" title="">
                                        <td><?php if(isset($result->officer_name)) echo $result->officer_name; ?></td>
                                        <td>
                                            <input type="checkbox" onchange="handleChange(this)" <?php if(!isset($result->officer_email) || strlen($result->officer_email) == 0) echo "class='hiddenCheckbox'"; ?> name="email_name_code[]" id="Checkbox1" value="<?php echo $result->officer_code; ?>" data-name="<?php if(isset($result->officer_name)) echo $result->officer_name; ?>" data-type="Email" />
                                            <input type="checkbox" class="hiddenCheckbox" style="z-index:0" <?php if(!isset($result->officer_email) || strlen($result->officer_email) == 0) echo "disabled='disabled'"; ?> name="email_name_type[]" id="Checkbox2" value="<?php echo $result->officer_type; ?>" data-type="Email"/>
                                            <input type="checkbox" class="hiddenCheckbox" style="z-index:0" <?php if(!isset($result->officer_email) || strlen($result->officer_email) == 0) echo "disabled='disabled'"; ?> name="email_name[]" id="Checkbox3" value="<?php echo $result->officer_name; ?>" data-type="Email"/>
                                            <input type="checkbox" class="hiddenCheckbox" style="z-index:0" <?php if(!isset($result->officer_email) || strlen($result->officer_email) == 0) echo "disabled='disabled'"; ?> name="email_to[]" id="Checkbox4" value="<?php echo $result->officer_email; ?>" data-type="Email"/>
                                        </td>
                                        <td>
                                            <input type="checkbox" <?php if(!isset($result->officer_mobile) || strlen($result->officer_mobile) == 0) echo "class='hiddenCheckbox'"; ?> name="sms_name_code[]" id="Checkbox5" value="<?php echo $result->officer_code; ?>" data-name="<?php if(isset($result->officer_name)) echo $result->officer_name; ?>" data-type="SMS" />
                                            <input type="checkbox" class="hiddenCheckbox" style="z-index:0" <?php if(!isset($result->officer_mobile) || strlen($result->officer_mobile) == 0) echo "disabled='disabled'"; ?> name="sms_name_type[]" id="Checkbox6" value="<?php echo $result->officer_type; ?>" data-type="SMS"/>
                                            <input type="checkbox" class="hiddenCheckbox" style="z-index:0" <?php if(!isset($result->officer_mobile) || strlen($result->officer_mobile) == 0) echo "disabled='disabled'"; ?> name="sms_name[]" id="Checkbox7" value="<?php echo $result->officer_name; ?>" data-type="SMS"/>
                                            <input type="checkbox" class="hiddenCheckbox" style="z-index:0" <?php if(!isset($result->officer_mobile) || strlen($result->officer_mobile) == 0) echo "disabled='disabled'"; ?> name="sms_mobile_no[]" id="Checkbox8" value="<?php echo $result->officer_mobile; ?>" data-type="SMS"/>
                                        </td>
                                    </tr>
                                    <?php          
                                    }
                                    ?>
                                </tbody>
                            </table>
                        
                        
                            
                        <table class="mobileNotifyTable" style="margin-top:10px">
                                <thead>
                                    <tr>
                                        <th>Email</th>
                                        <th>SMS</th>
                                    </tr>
                                </thead>
                                <tbody>
                                     <tr>
                                        <td class="manualDiv"><span>Manual Email Contacts:</span>
                                            <div class="summaryColumn" id="listEmail"></div>
                                            <div data-role="button" id="emailAdd">+ Email</div>
                                            <div data-role="button" id="emailOfficerAdd">+ Officer</div>
                                        </td>
                                        <td class="manualDiv"><span>Manual SMS Contacts:</span>
                                            <div class="summaryColumn" id="listSMS"></div>
                                            <div data-role="button" id="smsAdd">+ Mobile</div>
                                            <div data-role="button" id="smsOfficerAdd">+ Officer</div>
                                        </td>
                                    </tr>
                                </tbody>
                        </table>
                        
                </div>
                <!-- End Select Div -->
                    <div style="clear:both"></div>



            <!-- Start Email Div -->
            <div id="emailContainer" data-role="collapsible" class="col" data-collapsed="true" data-corners="false" data-content-theme="b" data-theme="b" style="overflow:hidden;">
                <h4>Email Message</h4>

                <?php 
                // Fill header variable with subject prefix.
                $header = EMAIL_SUBJECT_PREFIX;  
                ?>

                    <table class="mobileNotifyTable">
                                <thead>
                                    <tr>
                                        <th> <span <?php if($_SESSION['meritIni']['NOTIFYCUSTOMERFROMEMAIL'] == ""){ ?> style="color: red; font-weight: bold; display: none;" <?php } else { ?> style="color: red; font-weight: bold;" <?php } ?> id="note">NOTE: Email will be sent via Merit Engine.</span></th>
                                    </tr>
                                </thead>
                                <tbody>
                                     <tr>
                                        <td>
                                            <label for="from">From my email address: </label>
                                            <input type="checkbox" style="position:relative !important;" name='fromEmail' id="fromEmail" value="PERSONAL" <?php if($_SESSION['meritIni']['NOTIFYCUSTOMERFROMEMAIL'] == "") echo "checked='checked'"; ?> />
                    
                                            <label for="from">From:</label>
                                            <input class="inline" readonly="readonly" name='from' id="from" size="60" value="<?php echo $_SESSION['meritIni']['NOTIFYCUSTOMERFROMEMAIL']; ?>" <?php if($_SESSION['meritIni']['NOTIFYCUSTOMERFROMEMAIL'] == "") echo "disabled='disabled'"; ?>>                     

                                            <label for="from">Subject:</label>
                                            <input class="text" name='subject' id="subject" value="<?php echo $header. " Request: ".$_SESSION['request_id']; ?>">

                                            <label for="from">Message:</label>
                                            <textarea id="message" name="message" required></textarea>

                                            <label for="desc">File</label>
                                            <input id="attachment" type="file" name="attachment" id="attachFile" />
                                        </td>
                                    </tr>
                                </tbody>
                        </table>  
            </div> <!-- End Email Div -->



            <!-- Start SMS Div -->
            <div id="smsContainer" data-role="collapsible" class="col" data-collapsed="true" data-corners="false" data-content-theme="b" data-theme="b" style="overflow:hidden;">
                <h4>SMS Message</h4>
                         <table class="mobileNotifyTable">
                                <thead>
                                    <tr>
                                        <th>Message</th>
                                    </tr>
                                </thead>
                                <tbody>
                                     <tr>
                                        <td>
                                            <label for="from">Message:</label>
                                            <textarea name="SMSmessage" required></textarea>
                                        </td>
                                    </tr>
                                </tbody>
                        </table>
            </div> <!-- End SMS Div -->

            <table class="mobileNotifyTable" style="margin-top:10px">
                                <thead>
                                    <tr>
                                        <th>Options</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                     <tr>
                                        <td>
                                            <div data-role="button" id="sendbutton">Send</div>                                          
                                        </td>
                                         <td>
                                            <div data-role="button" id="reset" style="color:rgb(255, 0, 0);"> Reset</div> 
                                        </td>
                                    </tr>
                                </tbody>
                        </table>


            <!-- Hidden Fields -->
                        <input type="hidden" name="request_id" value="<?php echo $_SESSION['request_id']; ?>" />
                        <input type="hidden" name="action_id" value="<?php echo $_GET['id']; ?>" />
                        <input type="hidden" name="page" value="action" />
                        <input type="hidden" name="action" value="SendNotification" />
                        <input type="hidden" name="emailCount" id="emailCount" value="0"/>
                        <input type="hidden" name="smsCount" id="smsCount" value="0"/>

            <!-- Form End -->
                </form>

                <?php $_SESSION['typecode'] = 1; ?>


                    <script>
                        var email = "<?php echo $email ?>";
                        var sms = "<?php echo $sms ?>";
                        $(document).ready(function () {
                            $("#notificationForm").validate();
                            $("#notificationForm").submit(function () {
                                if ($(this).validate().numberOfInvalids() == 0) { $("#sendbutton").attr("disabled", true); }
                            });
                        });
                        if (email < 1) {
                            $("#message").rules("remove", "required");
                        }
                        else if (sms < 1) {
                            $("#SMSmessage").rules("remove", "required");
                        }
                    </script>
            </div>

        