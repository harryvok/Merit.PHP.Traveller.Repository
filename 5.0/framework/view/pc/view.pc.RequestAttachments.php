<?php
   if($_SESSION['roleSecurity']->view_attachment == "Y")
    {
?>
    <div class="summaryContainer">
        <h1>Attachments (<?php if(isset($GLOBALS['result']->request_remark_details)) echo count($GLOBALS['result']->request_remark_details); else echo 0; ?>) <span class="openPopup" id="Attachments">
            <img src="images/iconAdd.png" />
            Add Attachment</span></h1>
        <div>
            <input type="hidden" name="val-at" id="val-at" value="0" />
            <input type="hidden" name="requestID" id="requestID" value="<?php echo $_GET["id"]; ?>" />
        
                <input type="text" id="requestAttachments" class="tableSearch" placeholder="Search..." />
                <table id="requestAttachmentsTable" class="sortable" title="" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Date/Time</th>
                            <th>Officer</th>
                            <th>Description</th>
                            <th>Action</th>
                            <th><?php if($_SESSION['roleSecurity']->maint_attachment == "Y" || $_SESSION['roleSecurity']->delete_attachment == "Y"){ ?>Options<?php } ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
    $number=0;
    if(isset($GLOBALS['result']->request_remark_details) && count($GLOBALS['result']->request_remark_details) > 1){
        $i=-1;
        foreach($GLOBALS['result']->request_remark_details as $result_at_get){
            $i=$i+1;
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
                            <td><?php if(strlen($result_at_get->note_datetime) > 0){ echo date('d/m/Y h:i A',strtotime(str_ireplace("T","", $result_at_get->note_datetime))); }  ?></td>
                            <td><?php echo $result_at_get->officer; ?></td>
                            <td><span><?php if(isset($result_at_get->attachment)) {
                                                echo str_ireplace(str_ireplace("/", "\\", ATTACHMENT_FOLDER), "", $result_at_get->attachment); ?>- </span><?php } ?><span><?php if(isset($result_at_get->description)){ echo " - ".base64_decode($result_at_get->description); } ?></span></td>
                            <td><?php if(isset($result_at_get->attachment)) {
                                          if(stristr($result_at_get->attachment, str_ireplace("/", "\\", ATTACHMENT_FOLDER))){ ?><a id="<?php echo $result_at_get->attachment; ?>" class="ViewFile">View</a> <?php }
                                      }  ?></td>
                                  
                            <td>
                                 <?php if($_SESSION['roleSecurity']->maint_attachment == "Y"){ ?>
                                    <a title="Edit Attachment" class="openPopup editAttachment" id="EditAttachment" data-urlid="0" data-reqid="<?php echo $GLOBALS['request_id'] ?>" data-path="<?php echo $result_at_get->attachment; ?>" data-date="<?php echo $result_at_get->note_datetime; ?>" data-subtype="<?php echo $result_at_get->sub_type; ?>">
                                    <img src="images/modify-icon.png" width="16" height="16" /></a> 
                                <?php } ?>
                                <?php if($_SESSION['roleSecurity']->delete_attachment == "Y"){ ?>
                                    <a title="Delete Attachment" class="deleteAttachment" data-action="deleteAttachment" id="deleteAttachment" data-action="deleteAttachment" data-urlid="0" data-reqid="<?php echo $GLOBALS['request_id'] ?>" data-path="<?php echo $result_at_get->attachment; ?>" data-date="<?php echo $result_at_get->note_datetime; ?>" data-subtype="<?php echo $result_at_get->sub_type; ?>"/>
                                    <img src="images/delete-icon.png" width="16" height="16" /></a>
                                <?php } ?>
                            </td>
                        </tr>
                        <?php
                                      
        }
    }
    elseif(isset($GLOBALS['result']->request_remark_details) && count($GLOBALS['result']->request_remark_details) == 1){
                        ?>
                        <?php $result_at_get = $GLOBALS['result']->request_remark_details; 
                        ?>

                        <tr class="dark" title="">
                            <td><?php if(strlen($result_at_get->note_datetime) > 0){ echo date('d/m/Y h:i A',strtotime(str_ireplace("T","", $result_at_get->note_datetime))); }  ?></td>
                            <td><?php echo $result_at_get->officer; ?></td>
                            <td><span><?php if(isset($result_at_get->attachment)) {
                                                echo str_ireplace(str_ireplace("/", "\\", ATTACHMENT_FOLDER), "", $result_at_get->attachment); ?>- </span><?php } ?><span><?php if(isset($result_at_get->description)){ echo " - ".base64_decode($result_at_get->description); } ?></td>
                            <td><?php if(isset($result_at_get->attachment)) {
                                          if(stristr($result_at_get->attachment, str_ireplace("/", "\\", ATTACHMENT_FOLDER))){ ?><a id="<?php echo $result_at_get->attachment; ?>" class="ViewFile">View</a> <?php }
                                      }  ?></td>
                            <td>
                                 <?php if($_SESSION['roleSecurity']->maint_attachment == "Y"){ ?>
                                    <a title="Edit Attachment" class="openPopup editAttachment" id="EditAttachment" data-urlid="0" data-reqid="<?php echo $GLOBALS['request_id'] ?>" data-path="<?php echo $result_at_get->attachment; ?>" data-date="<?php echo $result_at_get->note_datetime; ?>" data-subtype="<?php echo $result_at_get->sub_type; ?>">
                                    <img src="images/modify-icon.png" width="16" height="16" /></a> 
                                <?php } ?>
                                <?php if($_SESSION['roleSecurity']->delete_attachment == "Y"){ ?>
                                    <a title="Delete Attachment" class="deleteAttachment" data-urlid="0" data-reqid="<?php echo $GLOBALS['request_id'] ?>" data-path="<?php echo $result_at_get->attachment; ?>" data-date="<?php echo $result_at_get->note_datetime; ?>" data-subtype="<?php echo $result_at_get->sub_type; ?>"/>
                                    <img src="images/delete-icon.png" width="16" height="16" data-action="deleteAttachment" id="deleteAttachment"/></a>
                                <?php } ?>
                            </td>
                            <?php
                                      
    }
    
                            ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="popupDetail" id="AttachmentsPopup">
            <h1>Add Attachment<span  class="closePopup"><img src="images/delete-icon.png" /> Close</span></h1>
	    <div>
                <a title="attach"></a>
                <script type="text/javascript">
                    $(document).ready(function () {
                        // validate signup form on keyup and submit
                        $("#addattach").validate();
                    });
                </script>
                <form method="post" enctype="multipart/form-data" id="addattach" action="process.php">
                        <label for="desc">File</label>
                        <input id="attachment" type="file" name="attachment" id="attachFile" />
                        <!--<label for="desc">File 2</label>
                        <input id="attachment" type="file" name="attachment[]" id="attachFile" />
                        <label for="desc">File 3</label>
                        <input id="attachment" type="file" name="attachment[]" id="attachFile" />-->
                    <p>&nbsp;</p>
                    <label for="desc">Description</label>
                        <input type="text" id="attachDesc" maxlength="50" name="desc" />
                        <!--<label for="desc">Description 2</label>
                        <input type="text" id="attachDesc" maxlength="50" name="attachDesc[]" />
                        <label for="desc">Description 3</label>
                        <input type="text" id="attachDesc" maxlength="50" name="attachDesc[]" />-->

                    <input id="submit" class="button left" type='submit' value='Add Attachment' />
                    <input type="hidden" name="request_id" id="request_id" value="<?php echo $_GET['id']; ?>" />
                    <input type="hidden" name="ref" value="<?php echo $_GET['id']; ?>" />
                    <input type="hidden" name="ref_page" value="view-request" />
                    <input type="hidden" name="action" value="Attachment" />
                    <input type="hidden" name="method" id="method" value="attachment" />
                </form>

                <script type="text/javascript">
                    $(document).ready(function () {
                        $("#addattach").submit(function () {
                            if ($(this).validate().numberOfInvalids() == 0) { $("#submit").attr("disabled", true); }
                        });
                    });
                </script>
            </div>
        </div>
        <div class="popupDetail" id="EditAttachmentPopup">
            <h1>Edit Attachment <span  class="closePopup"><img src="images/delete-icon.png" /> Close</span></h1>
	        <div>
                <a title="attach"></a>
                <script type="text/javascript">
                    $(document).ready(function () {
                        // validate signup form on keyup and submit
                        $("#editattach").validate();
                    });
                </script>
                <form method="post" enctype="multipart/form-data" id="EditAttachment" action="process.php">
                    <label>Current Attachment</label>
                    <div id="currentAttachment"></div>
                    <label>New Attachment</label>
                    <input id="EditAttachText" type="file" class="required" name="attachment" />
                    <p>&nbsp;</p>
                    <label class="title-left" for="desc">Description</label>
                    <input type="text" id="EditAttachDesc" maxlength="50" name="desc" />
                    <input id="submit1" class="button left" type='submit' value='Edit Attachment' />
                    <input type="hidden" name="ref" value="<?php echo $_GET['id']; ?>" />
                    <input type="hidden" name="eaction_id" id="Hidden1" value="<?php echo $_GET['id']; ?>" />
                    <input type="hidden" name="request_id" id="Hidden2" value="<?php echo $_GET['id']; ?>" />
                    <input type="hidden" name="ref_page" value="view-request" />
                    <input type="hidden" name="action" value="EditAttachment" />
                    <input type="hidden" name="epath" id="epath" />
                    <input type="hidden" name="edate" id="edate" />
                    <input type="hidden" name="esubtype" id="esubtype" />
                </form>

                <script type="text/javascript">
                    $(document).ready(function () {
                        $("#addattach").submit(function () {
                            if ($(this).validate().numberOfInvalids() == 0) { $("#submit").attr("disabled", true); }
                        });
                    });
                </script>
            </div>
        </div>
    </div>
<?php
    }
?>