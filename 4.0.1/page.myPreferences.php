<form method="post" action="process.php" id="myPreferences">
    <script type="text/javascript">
        $(document).ready(function () {
            $('input[name=availInd]').on("change", function () {
                var val = $('input[name=availInd]:checked').val();
                if (val == "Y") {
                    $("#availFromDate").prop("disabled", true);
                    $("#availToDate").prop('disabled', true);
                    $("#availFromTime").prop("disabled", true);
                    $("#availToTime").prop('disabled', true);
                    $("#availFromDate").val("");
                    $("#availFromTime").val("");
                    $("#availToDate").val("");
                    $("#availToTime").val("");
                }
                if (val == "N") {
                    $("#availFromDate").prop("disabled", false); $("#availToDate").prop('disabled', false); $("#availFromTime").prop("disabled", false); $("#availToTime").prop('disabled', false);
                    var today = new Date();
                    var dd = today.getDate();
                    var mm = today.getMonth() + 1;
                    var yyyy = today.getFullYear();
                    if (dd < 10) { dd = '0' + dd } if (mm < 10) { mm = '0' + mm }

                    var hours = today.getHours();
                    var minutes = today.getMinutes();
                    var ampm = hours >= 12 ? 'pm' : 'am';
                    hours = hours % 12;
                    hours = hours ? hours : 12; // the hour '0' should be '12'
                    minutes = minutes < 10 ? '0' + minutes : minutes;
                    var strTime = hours + ':' + minutes + ' ' + ampm;
                    today = dd + '/' + mm + '/' + yyyy;
                    $("#availFromDate").val(today);
                    $("#availFromTime").val(strTime);
                }
            });


            //since the filter dropdowns have the same name attribute when generated,
            //we need to change the names so that POST data is recognised for both
            $("#defreqfil").next().attr('name', 'defaultrequestfilter');
            $("#defactfil").next().attr('name', 'defaultactionfilter');

            //we also need to prevent default javascript behaviour on both selects
            $("#defreqfil").next().removeAttr("onchange");
            $("#defactfil").next().removeAttr("onchange");
            $("#myPreferences").validate();
            $("#myPreferences").submit(function () {
                if ($(this).validate().numberOfInvalids() == 0) { $("#submit").attr("disabled", true); }
            });
        });
    </script>
    <div class="column r50">
       <?php $test ?>     
        <div class="summaryContainer">
            <h1>Your Defaults</h1>
            <div>
                <label>Startup Screen</label>
                <select name="startupScreen">
                    <option value="Action Intray" <?php echo $_SESSION['initial_screen'] == "Action Intray" ? "selected='selected'" : '' ?>>Action Intray</option>
                    <option value="Request Intray" <?php echo $_SESSION['initial_screen'] == "Request Intray" ? "selected='selected'" : '' ?>>Request Intray</option>
                    <option value="New Request" <?php echo $_SESSION['initial_screen'] == "New Request" ? "selected='selected'" : '' ?>>New Request</option>
                </select>

                <?php if(isset($_SESSION['roleSecurity']->my_pref_how_received) && $_SESSION['roleSecurity']->my_pref_how_received == "Y"){?>
                    <label>How Received</label>
                    <?php $controller->Dropdown("HowReceived", "HowReceived",  $_SESSION['how_received_code']); ?>
                <?php } ?>

                <?php if(isset($_SESSION['roleSecurity']->my_pref_centre) && $_SESSION['roleSecurity']->my_pref_centre == "Y"){?>
                    <label>Centre</label>
                    <?php $controller->Dropdown("Centres", "Centres",  $_SESSION['centre_code']); ?>
                <?php } ?>


                <label id="defreqfil">Default Request Filter</label>
                <?php $controller->Dropdown("Filters", "Filters", array("filter" => "C", "filter_type" => "complaint")); ?>
                
                <label id="defactfil">Default Action Filter</label>
                <?php $controller->Dropdown("Filters", "Filters", array("filter" => "A", "filter_type" => "action")); ?>
                
                <!--<div class="float-left">
                    <div class="column r45">
                        <label>Available</label><br />
                        <input type="radio" name="availInd" value="Y" <?php echo $_SESSION['available_ind'] == "Y" ? "checked='checked'" : ""; ?> /> Yes <input type="radio" name="availInd" value="N" <?php echo $_SESSION['available_ind'] == "N" ? "checked='checked'" : ""; ?> /> No <br />
                    </div>
                    
                </div>
                 
               
                <div class="column r55">
                <label>Unavailable From</label><br />
                <?php
                $availFrom = explode("T", $_SESSION['avail_from']);
                $availTo = explode("T", $_SESSION['avail_to']);
  
                ?>
                Date <span style="color:red;">*</span>: <input size="8" type="text" name="availFromDate" id="availFromDate" class="inline dateField required" <?php echo $_SESSION['available_ind'] == "Y" ? "disabled='disabled'" : ""; ?> value="<?php if(strlen($availFrom[0]) > 0 && $availFrom[0] != "1900-01-01"){ echo date('d/m/Y',strtotime($availFrom[0])); }  ?>" />
                Time <span style="color:red;">*</span>: <input size="6" type="text" name="availFromTime" id="availFromTime" class="inline timeField required" <?php echo $_SESSION['available_ind'] == "Y" ? "disabled='disabled'" : ""; ?> value="<?php if(strlen($availFrom[1]) > 0 && $availFrom[1] != "00:00:00"){ echo date('h:i A',strtotime($availFrom[1])); }  ?>" />
                </div>
                <div class="column r55">
                <label>Unavailable To</label><br />
                Date: <input type="text"  size="8" name="availToDate" id="availToDate" class="inline dateField" <?php echo $_SESSION['available_ind'] == "Y" ? "disabled='disabled'" : ""; ?> value="<?php if(strlen($availTo[0]) > 0 && $availTo[0] != "1900-01-01"){ echo date('d/m/Y',strtotime($availTo[0])); }  ?>" />
                Time: <input type="text"  size="6" name="availToTime" id="availToTime" class="inline timeField" <?php echo $_SESSION['available_ind'] == "Y" ? "disabled='disabled'" : ""; ?> value="<?php if(strlen($availTo[1]) > 0 && $availTo[1] != "00:00:00"){ echo date('h:i A',strtotime($availTo[1])); }  ?>" />
                </div>
                <div class="column r100">
                <label>Alternate Officer</label>
                <input class="text ui-autocomplete-input valid" name="alternateOfficer" id="alternateOfficer" data-officer="true"  placeholder="Search..." autocomplete="off" value="<?php echo $_SESSION['alternate_officer_name'] ?>">
                <input type="hidden" name="alternateOfficerCode" id="alternateOfficerCode" value="<?php echo $_SESSION['alternate_officer'] ?>"/>
                </div>-->
                

            </div>
        </div>
        <!-- 
        <div class="summaryContainer">
            <h1>Displays</h1>
            <div>
                <label>Name as</label><br />
                <input type="radio" name="nameAs" value="FirstLast" /> First Last (e.g. John Smith)<br />
                <input type="radio" name="nameAs" value="LastFirst" /> Last First (e.g. Smith John)<br /><br />
                <label>Action Intray Status</label><br />
                <input type="radio" name="actionIntrayStatus" value="StatusOnly" /> Status Only (e.g. Open)<br />
                <input type="radio" name="actionIntrayStatus" value="StatusAssignment" /> Status and Assignment (e.g. Open, assigned to John Smith)
            </div>
        </div>
              !-->
        <?php if(isset($_SESSION['roleSecurity']->my_pref_availability) && $_SESSION['roleSecurity']->my_pref_availability == "Y"){?>
             <div class="summaryContainer">
                <h1>Availability</h1>
                <div class="float-left">
                        <div class="column r55">
                            <label>Available</label><br />
                            <input type="radio" name="availInd" value="Y" <?php echo $_SESSION['available_ind'] == "Y" ? "checked='checked'" : ""; ?> /> Yes <input type="radio" name="availInd" value="N" <?php echo $_SESSION['available_ind'] == "N" ? "checked='checked'" : ""; ?> /> No <br />
                        </div><br /><br /><br />
                        <div class="column r55">
                    <label>Unavailable From</label>
                    <?php
                    $availFrom = explode("T", $_SESSION['avail_from']);
                    $availTo = explode("T", $_SESSION['avail_to']);
                    /*echo $_SESSION['avail_from'].'<br>';
                    echo $_SESSION['avail_to'];*/
                    ?>
                    Date <span style="color:red;">*</span>: <input size="8" type="text" name="availFromDate" id="availFromDate" class="inline dateField required" <?php echo $_SESSION['available_ind'] == "Y" ? "disabled='disabled'" : ""; ?> value="<?php if(strlen($availFrom[0]) > 0 && $availFrom[0] != "1900-01-01"){ echo date('d/m/Y',strtotime($availFrom[0])); }  ?>" />
                    Time <span style="color:red;">*</span>: <input size="6" type="text" name="availFromTime" id="availFromTime" class="inline timeField required" <?php echo $_SESSION['available_ind'] == "Y" ? "disabled='disabled'" : ""; ?> value="<?php if(strlen($availFrom[1]) > 0 && $availFrom[1] != "00:00:00"){ echo date('h:i A',strtotime($availFrom[1])); }  ?>" />
                    </div>
                    <div class="column r55">
                    <label>Unavailable To</label>
                    Date: <input type="text"  size="8" name="availToDate" id="availToDate" class="inline dateField" <?php echo $_SESSION['available_ind'] == "Y" ? "disabled='disabled'" : ""; ?> value="<?php if(strlen($availTo[0]) > 0 && $availTo[0] != "1900-01-01"){ echo date('d/m/Y',strtotime($availTo[0])); }  ?>" />
                    Time: <input type="text"  size="6" name="availToTime" id="availToTime" class="inline timeField" <?php echo $_SESSION['available_ind'] == "Y" ? "disabled='disabled'" : ""; ?> value="<?php if(strlen($availTo[1]) > 0 && $availTo[1] != "00:00:00"){ echo date('h:i A',strtotime($availTo[1])); }  ?>" />
                    </div>
                    <div class="column r100">
                    <label>Alternate Officer</label>
                    <input class="text ui-autocomplete-input valid" name="alternateOfficer" id="alternateOfficer" data-officer="true"  placeholder="Search..." autocomplete="off" value="<?php echo $_SESSION['alternate_officer_name'] ?>">
                    <input type="hidden" name="alternateOfficerCode" id="alternateOfficerCode" value="<?php echo $_SESSION['alternative_officer'] ?>"/>
                    </div>
                    </div>
            </div> 
        <?php } ?>

        <p>&nbsp;</p>
        <input type="hidden" name="action" value="ChangePreferences" />
    <input type="submit" value="Submit" id="submit">
        
    </div>
    <div class="column r50">


        <?php if(defined('CHANGE_PASSWORD') && CHANGE_PASSWORD == 1 && $_SESSION['roleSecurity']->allow_cpwd == "Y"){ ?>
        <div class="summaryContainer">
            <h1>Change Password</h1>
            <div>

                <label>Current Password</label>
                <input type="password" name='current' maxlength='15' class='text'><br>
                <label>New Password</label>
                <input type="password" name='new' maxlength='15' class='text'><br>
                <label>Repeat New Password</label>
                <input type="password" name='repeat' maxlength='15' class='text'><br>
                <input type="hidden" name="changePassword" value="<?php echo CHANGE_PASSWORD; ?>" />
                <br>
            </div>
            
        </div>
        <?php
              }
            ?>
    </div>
    <!--
    <div class="column r50">
        
        <div class="summaryContainer">
            <h1>Intray Settings</h1>
            <div>
            </div>
        </div>
    </div>
    !-->
    
</form>