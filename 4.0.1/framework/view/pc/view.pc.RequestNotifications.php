<div class="summaryContainer">
    <h1>Notifications (<?php if(isset($GLOBALS['result']['notifications']->notification_details)) echo count($GLOBALS['result']['notifications']->notification_details); else echo 0; ?>)
        <span class="openPopup" id="SendNotification">
            <img src="images/iconAdd.png" />
            Send Notification</span>
    </h1>
    <div>
        <script type="text/javascript">
            $(document).ready(function () {
                $("#notificationsTable").dataTable({
                    bPaginate: false,
                    "sDom": 'W<"clear">lfrtp',
                    oColumnFilterWidgets: {
                        aiExclude: [0,1,2,3,5],
                        sSeparator: ',  ',
                        "iMaxSelections": 1,
                        bGroupTerms: true,

                    },
                    "aaSorting": [[ 0, "desc" ]]
                });

                
            });
        </script>
        <table id="notificationsTable" class=" sortable" title="" cellspacing="0">
            <thead>
                <tr>
                    <th>Sent Time</th>
                    <th>Reason</th>
                    <th>Sent To</th>
                    <th>Sent By</th>
                    <th>Type</th>
                    <th>Notification</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $number=0;
                if(isset($GLOBALS['result']['notifications']->notification_details) && count($GLOBALS['result']['notifications']->notification_details) > 1){
                    $i=-1;
                    foreach($GLOBALS['result']['notifications']->notification_details as $result_c_get){
                        $number = $number+1;
                        if($number == 2){
                            $class = "dark";
                            $number = 0;
                        }
                        else{
                            $class = "light";
                        }
                ?>
                <tr class="<?php echo $class; ?>">
                    <td><?php if(isset($result_c_get->escalate_time) && $result_c_get->escalate_time != "1970-01-01T00:00:00" && strlen($result_c_get->escalate_time) > 0){ echo date('d/m/Y h:i A',strtotime($result_c_get->escalate_time)); } else { echo ""; }  ?></td>
                    <td><?php if(isset($result_c_get->reason_sent)) echo $result_c_get->reason_sent; ?></td>
                    <td><?php if(isset($result_c_get->sent_to)) echo $result_c_get->sent_to; ?></td>
                    <td><?php if(isset($result_c_get->sent_by)) echo $result_c_get->sent_by; ?></td>
                    <td class="filterTypeValue"><?php if(isset($result_c_get->officer_type)) echo $result_c_get->officer_type; ?></td>
                    <td><?php if(isset($result_c_get->comments)) echo base64_decode($result_c_get->comments); ?></td>
                </tr>
                <?php
                              
                    }
                }
                elseif(isset($GLOBALS['result']['notifications']->notification_details) && count($GLOBALS['result']['notifications']->notification_details) == 1){
                    $result_c_get = $GLOBALS['result']['notifications']->notification_details;
                ?>
                <tr class="dark" title="">
                    <td><?php if(isset($result_c_get->escalate_time) && $result_c_get->escalate_time != "1970-01-01T00:00:00" && strlen($result_c_get->escalate_time) > 0){ echo date('d/m/Y h:i A',strtotime($result_c_get->escalate_time)); } else { echo ""; }  ?></td>
                    <td><?php if(isset($result_c_get->reason_sent)) echo $result_c_get->reason_sent; ?></td>
                    <td><?php if(isset($result_c_get->sent_to)) echo $result_c_get->sent_to; ?></td>
                    <td><?php if(isset($result_c_get->sent_by)) echo $result_c_get->sent_by; ?></td>
                    <td class="filterTypeValue"><?php if(isset($result_c_get->officer_type)) echo $result_c_get->officer_type; ?></td>
                    <td><?php if(isset($result_c_get->comments)) echo base64_decode($result_c_get->comments); ?></td>
                </tr>
                <?php
                              
                }
                
                ?>
            </tbody>
        </table>

    </div>
</div>

<div class="popupDetail" id="SendNotificationPopup">
    <h1>Send Notification<span class="closePopup"><img src="images/delete-icon.png" />
        Close</span></h1>
    <div>
        <script type="text/javascript" src="inc/js/pages/js.sendNotification.js"></script>
        <form method="post" action="process.php" enctype='multipart/form-data'>
            <div class="summaryContainer">
                <h1>Send</h1>
                <div>
                    <div class="float-left">
                        <div class="column r50">
                            <table border="0" cellpadding="3">
                                <thead>
                                    <tr>
                                        <th>Full Name</th>
                                        <th>Email</th>
                                        <th>SMS</th>
                                    </tr>
                                </thead>
                                <tbody>
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
                                            <input type="checkbox" class="hiddenCheckbox" <?php if(!isset($result->officer_email) || strlen($result->officer_email) == 0) echo "disabled='disabled'"; ?> name="email_name_type[]" id="officerEmail<?php echo $i; ?>Type" value="<?php echo $result->officer_type; ?>" />
                                            <input type="checkbox" class="hiddenCheckbox" <?php if(!isset($result->officer_email) || strlen($result->officer_email) == 0) echo "disabled='disabled'"; ?> name="email_name[]" id="officerEmail<?php echo $i; ?>Name" value="<?php echo $result->officer_name; ?>" />
                                            <input type="checkbox" class="hiddenCheckbox" <?php if(!isset($result->officer_email) || strlen($result->officer_email) == 0) echo "disabled='disabled'"; ?> name="email_to[]" id="officerEmail<?php echo $i; ?>Email" value="<?php echo $result->officer_email; ?>" />
                                        </td>
                                        <td>
                                            <input type="checkbox" <?php if(!isset($result->officer_mobile) || strlen($result->officer_mobile) == 0) echo "class='hiddenCheckbox'"; ?> name="sms_name_code[]" id="officerSMS<?php echo $i; ?>" value="<?php echo $result->officer_code; ?>" data-name="<?php if(isset($result->officer_name)) echo $result->officer_name; ?>" data-type="SMS" />
                                            <input type="checkbox" class="hiddenCheckbox" <?php if(!isset($result->officer_mobile) || strlen($result->officer_mobile) == 0) echo "disabled='disabled'"; ?> name="sms_name_type[]" id="officerSMS<?php echo $i; ?>Type" value="<?php echo $result->officer_type; ?>" />
                                            <input type="checkbox" class="hiddenCheckbox" <?php if(!isset($result->officer_mobile) || strlen($result->officer_mobile) == 0) echo "disabled='disabled'"; ?> name="sms_name[]" id="officerSMS<?php echo $i; ?>Name" value="<?php echo $result->officer_name; ?>" />
                                            <input type="checkbox" class="hiddenCheckbox" <?php if(!isset($result->officer_mobile) || strlen($result->officer_mobile) == 0) echo "disabled='disabled'"; ?> name="sms_mobile_no[]" id="officerSMS<?php echo $i; ?>Email" value="<?php echo $result->officer_mobile; ?>" />

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
                                            <input type="checkbox" <?php if(!isset($result->officer_email) || strlen($result->officer_email) == 0) echo "class='hiddenCheckbox'"; ?> name="email_name_code[]" id="officerEmail<?php echo $i; ?>" value="<?php echo $result->officer_code; ?>" data-name="<?php if(isset($result->officer_name)) echo $result->officer_name; ?>" data-type="Email" />
                                            <input type="checkbox" class="hiddenCheckbox" <?php if(!isset($result->officer_email) || strlen($result->officer_email) == 0) echo "disabled='disabled'"; ?> name="email_name_type[]" id="officerEmail<?php echo $i; ?>Type" value="<?php echo $result->officer_type; ?>" />
                                            <input type="checkbox" class="hiddenCheckbox" <?php if(!isset($result->officer_email) || strlen($result->officer_email) == 0) echo "disabled='disabled'"; ?> name="email_name[]" id="officerEmail<?php echo $i; ?>Name" value="<?php echo $result->officer_name; ?>" />
                                            <input type="checkbox" class="hiddenCheckbox" <?php if(!isset($result->officer_email) || strlen($result->officer_email) == 0) echo "disabled='disabled'"; ?> name="email_to[]" id="officerEmail<?php echo $i; ?>Email" value="<?php echo $result->officer_email; ?>" />
                                        </td>
                                        <td>
                                            <input type="checkbox" <?php if(!isset($result->officer_mobile) || strlen($result->officer_mobile) == 0) echo "class='hiddenCheckbox'"; ?> name="sms_name_code[]" id="officerSMS<?php echo $i; ?>" value="<?php echo $result->officer_code; ?>" data-name="<?php if(isset($result->officer_name)) echo $result->officer_name; ?>" data-type="SMS" />
                                            <input type="checkbox" class="hiddenCheckbox"" <?php if(!isset($result->officer_mobile) || strlen($result->officer_mobile) == 0) echo "disabled='disabled'"; ?> name="sms_name_type[]" id="officerSMS<?php echo $i; ?>Type" value="<?php echo $result->officer_type; ?>" />
                                            <input type="checkbox" class="hiddenCheckbox" <?php if(!isset($result->officer_mobile) || strlen($result->officer_mobile) == 0) echo "disabled='disabled'"; ?> name="sms_name[]" id="officerSMS<?php echo $i; ?>Name" value="<?php echo $result->officer_name; ?>" />
                                            <input type="checkbox" class="hiddenCheckbox" <?php if(!isset($result->officer_mobile) || strlen($result->officer_mobile) == 0) echo "disabled='disabled'"; ?> name="sms_mobile_no[]" id="officerSMS<?php echo $i; ?>Email" value="<?php echo $result->officer_mobile; ?>" />
                                        </td>
                                    </tr>
                                    <?php          
                                    }
                                    ?>
                                </tbody>
                            </table>
                            <input type="hidden" value="<?php echo $i; ?>" name="officerCount" />
                        </div>
                        <div class="column r25">
                            <span class="summaryColumnTitle">Email:</span>
                            <div class="summaryColumn" id="listEmail"></div>
                            <input type="button" value="+ Email" id="emailAdd"/>
                            <input type="button" value="+ Officer" id="emailOfficerAdd"/>
                        </div>
                        <div class="column r25">
                            <span class="summaryColumnTitle">SMS:</span>
                            <div class="summaryColumn" id="listSMS"></div>
                            <input type="button" value="+ Mobile" id="smsAdd" />
                            <input type="button" value="+ Officer" id="smsOfficerAdd" />
                        </div>
                    </div>
                </div>
            </div>
            <p>&nbsp;</p>
            <div class="summaryContainer">
                <h1>Email Details</h1>
                <div>
                    <div class="float-left">
                        <div class="column r25">
                            <label for="from">From:</label>
                        </div>
                    </div>
                    <div class="float-left">
                        <input class="inline" readonly="readonly" name='from' id="from" size="60" value="<?php echo $_SESSION['meritIni']['NOTIFYCUSTOMERFROMEMAIL']; ?>" <?php if($_SESSION['meritIni']['NOTIFYCUSTOMERFROMEMAIL'] == "") echo "disabled='disabled'"; ?>>
                        <label for="from">From my email address: </label>
                        <input type="checkbox" name='fromEmail' id="fromEmail" value="PERSONAL" <?php if($_SESSION['meritIni']['NOTIFYCUSTOMERFROMEMAIL'] == "") echo "checked='checked'"; ?>>
                    </div>
                    <div class="float-left">
                        <label for="from">Subject:</label>
                        <input class="text" name='subject' id="subject" value="Request: <?php echo $_GET['id']; ?>">
                    </div>
                    <div class="float-left">
                        <label for="from">Message:</label>
                        <textarea name="message"></textarea>
                    </div>
                    <div class="float-left">
                        <div class="column r25">
                            <label for="desc">File</label>
                            <input id="attachment" type="file" name="attachment" id="attachFile" />
                        </div>
                        <div class="column r25">
                            <!--<label for="desc">Merit Link</label>
                            <select name="meritLink">
                                <option value="">No Link</option>
                                <option value="Request Summary">View Request</option>
                            </select>-->
                        </div>
                    </div>
                </div>
            </div>
            <p>&nbsp;</p>
            <div class="summaryContainer">
                <h1>SMS Details</h1>
                <div>
                    <div class="float-left">
                        <label for="from">Message:</label>
                        <textarea name="SMSmessage"></textarea>
                    </div>
                </div>
            </div>
            <p>&nbsp;</p>
            <span <?php if($_SESSION['meritIni']['NOTIFYCUSTOMERFROMEMAIL'] == ""){ ?> style="color: red; font-weight: bold; display: none;" <?php } else { ?> style="color: red; font-weight: bold;" <?php } ?> id="note">NOTE: Email will be sent via Merit Engine for the selected From email address.</span>
            <div class="float-right">
                <input type="submit" value="Send" id="sendbutton"/>
                <input type="reset" value="Reset" />
            </div>
            <input type="hidden" name="request_id" value="<?php echo $_GET['id']; ?>" />
            <input type="hidden" name="action_id" value="" />
            <input type="hidden" name="page" value="request" />
            <input type="hidden" name="action" value="SendNotification" />
        </form>
    </div>
</div>
