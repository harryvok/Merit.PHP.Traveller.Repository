<?php
    if($_SESSION['roleSecurity']->view_comment == "Y") 
    {
 ?>
    <div class="summaryContainer">
        <h1>Comments (<?php if(isset($GLOBALS['result']->request_remark_details)) echo count($GLOBALS['result']->request_remark_details); else echo 0; ?>) <span class="openPopup" id="Comments">
            <img src="images/iconAdd.png" />
            Add Comment</span></h1>
        <div>
            <input type="hidden" name="requestID" id="requestID" value="<?php echo $_GET["id"]; ?>" />
            <input type="hidden" name="val-c" id="val-c" value="0" />

            <input type="text" id="requestComments" class="tableSearch" placeholder="Search..." />
            <table id="requestCommentsTable" class=" sortable" title="" cellspacing="0">
                <thead>
                    <tr>
                        <th>Level</th>
                        <th>Action Required</th>
                        <th>Date/Time</th>
                        <th>Officer</th>
                        <th>Type</th>
                        <th>Comment</th>
                        <th><?php if($_SESSION['roleSecurity']->maint_comment == "Y" || $_SESSION['roleSecurity']->delete_comment == "Y" ){ ?>Options<?php } ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $number=0;
                    if(isset($GLOBALS['result']->request_remark_details) && count($GLOBALS['result']->request_remark_details) > 1){
                        $i=-1;
                        foreach($GLOBALS['result']->request_remark_details as $result_c_get){
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
                    <tr class="<?php echo $class; ?>" id="Comment<?php echo $i; ?>ParentObject">
                        <td><?php if($result_c_get->action_id == 0){ echo "Request"; } else { echo "Action"; } ?></td>
                        <td><?php if($result_c_get->action_id != 0 && isset($result_c_get->action_name)){ ?><?php if(isset($result_c_get->action_name)) echo $result_c_get->action_name; echo " (".$result_c_get->action_id.")"?><?php } ?></td>
                        <td><?php if(strlen($result_c_get->note_datetime) > 0){ echo date('d/m/Y h:i A',strtotime(str_ireplace("T","", $result_c_get->note_datetime))); }  ?></td>
                        <td><?php echo $result_c_get->officer; ?></td>
                        <td><?php echo $result_c_get->sub_type; ?></td>
                        <td>
                            <div id="Comment<?php echo $i; ?>Label"><?php if(isset($result_c_get->comment)) echo base64_decode($result_c_get->comment); ?></div>
                            <div class="editTextDiv" id="Comment<?php echo $i; ?>Edit">
                                <textarea spellcheck="true" id="Comment<?php echo $i; ?>TextVal" data-mode="MODIFY" data-request-id="<?php echo $_GET['id']; ?>" data-note-id="<?php echo $result_c_get->note_id; ?>" data-action-id="<?php echo $result_c_get->action_id; ?>" data-note-class="<?php echo $result_c_get->note_class; ?>"><?php if(isset($result_c_get->comment)){ echo base64_decode($result_c_get->comment); } ?></textarea>
                                <input type="button" id="Comment<?php echo $i; ?>Submit" value="Save" data-action="Comment" />
                                <a class="editClose" id="Comment<?php echo $i; ?>Close">Close</a>
                            </div>
                        </td>
                    
                        <td>
                            <?php if($_SESSION['roleSecurity']->maint_comment == "Y"){ ?>
                                <a title="Edit Comment" class="edit" id="Comment<?php echo $i; ?>">
                                <img src="images/modify-icon.png" width="16" height="16" /></a>
                            <?php } ?>
                            <?php if($_SESSION['roleSecurity']->delete_comment == "Y"){ ?>
                                <a title="Delete Comment" class="delete" id="Comment<?php echo $i; ?>Parent" data-action="Comment" data-mode="DELETE" data-request-id="<?php echo $_GET['id']; ?>" data-note-id="<?php echo $result_c_get->note_id; ?>" data-action-id="<?php echo $result_c_get->action_id; ?>" data-note-class="<?php echo $result_c_get->note_class; ?>">
                                <img src="images/delete-icon.png" width="16" height="16" /></a>
                            <?php } ?>
                        </td>
                
                    </tr>
                    <?php
                                                                                                                                                                                                                                                                                                          
                        }
                    }
                    elseif(isset($GLOBALS['result']->request_remark_details) && count($GLOBALS['result']->request_remark_details) == 1){
                        $result_c_get = $GLOBALS['result']->request_remark_details;
                    ?>
                    <tr class="dark" title="" id="CommentParentObject">
                        <td><?php if($result_c_get->action_id == 0){ echo "Request"; } else { echo "Action"; } ?></td>
                        <td><?php if($result_c_get->action_id != 0 && isset($result_c_get->action_name)){ ?><?php if(isset($result_c_get->action_name)) echo $result_c_get->action_name; ?><?php } echo " (".$result_c_get->action_id.")" ?></td>
                        <td><?php if(strlen($result_c_get->note_datetime) > 0){ echo date('d/m/Y h:i A',strtotime(str_ireplace("T","", $result_c_get->note_datetime))); }  ?></td>
                        <td><?php echo $result_c_get->officer; ?></td>
                        <td><?php echo $result_c_get->sub_type; ?></td>
                        <td>
                            <div id="CommentLabel"><?php if(isset($result_c_get->comment)) echo base64_decode($result_c_get->comment); ?></div>
                            <div class="editTextDiv" id="CommentEdit">
                                <textarea spellcheck="true" id="CommentTextVal" data-mode="MODIFY" data-request-id="<?php echo $_GET['id']; ?>" data-note-id="<?php echo $result_c_get->note_id; ?>" data-action-id="<?php echo $result_c_get->action_id; ?>" data-note-class="<?php echo $result_c_get->note_class; ?>"><?php if(isset($result_c_get->comment)){ echo base64_decode($result_c_get->comment); } ?></textarea>
                                <input type="button" id="CommentSubmit" value="Save" data-action="Comment" />
                                <a class="editClose" id="CommentClose">Close</a>
                            </div>
                        </td>
                        <td>
                            <?php if($_SESSION['roleSecurity']->maint_comment == "Y"){ ?>
                                <a title="Edit Comment" class="edit" id="Comment<?php echo $i; ?>">
                                <img src="images/modify-icon.png" width="16" height="16" /></a>
                            <?php } ?>
                            <?php if($_SESSION['roleSecurity']->delete_comment == "Y"){ ?>
                                <a title="Delete Comment" class="delete" id="Comment<?php echo $i; ?>Parent" data-action="Comment" data-mode="DELETE" data-request-id="<?php echo $_GET['id']; ?>" data-note-id="<?php echo $result_c_get->note_id; ?>" data-action-id="<?php echo $result_c_get->action_id; ?>" data-note-class="<?php echo $result_c_get->note_class; ?>">
                                <img src="images/delete-icon.png" width="16" height="16" /></a>
                            <?php } ?>
                        </td>
                        <?php
                    }
                
                        ?>
                </tbody>
            </table>

        </div>
    </div>
    </div>
    <a title="commentsn" name="commentsn"></a>
    <div class="popupDetail" id="CommentsPopup">
        <h1>Add Comment<span class="closePopup"><img src="images/delete-icon.png" />
            Close</span></h1>
        <div>
            <form method="post" action="process.php" id="addcomment">
                <textarea spellcheck="true" name="comment" class="required" id="comment"><?php if(isset($_SESSION['comment'])){  echo $_SESSION['comment'];  unset($_SESSION['comment']); } ?></textarea><br />
                <label>Notify Action Officer/s?</label>
                No
            <input id="no" name="send_email" type="radio" value="N" checked />
                Yes
            <input id="yes" name="send_email" type="radio" value="Y" />
                <br />
                <br />
                <input id="submit" class="button left" type='submit' value='Add Comment' />
                <input type="hidden" name="request_id" id="request_id" value="<?php echo $_GET['id']; ?>" />
                <input type="hidden" name="ref" value="<?php echo $_GET['ref']; ?>" />
                <input type="hidden" name="ref_page" value="<?php echo $_GET['ref_page']; ?>" />
                <input type="hidden" name="filter" value="<?php echo $_GET['filter']; ?>" />
                <input type="hidden" name="action" value="AddComment" />
                <input type="hidden" name="page" value="request" />
            </form>
            <script type="text/javascript">
                $(document).ready(function () {
                    $("#addcomment").validate();
                    $("#addcomment").submit(function () {
                        if ($(this).validate().numberOfInvalids() == 0) { $("#submit").attr("disabled", true); }
                    });
                });
            </script>
        </div>
    </div>

<?php
    }
?>