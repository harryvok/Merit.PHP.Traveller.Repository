<?php
if($_SESSION['roleSecurity']->view_attachment == "Y" || $_SESSION['roleSecurity']->add_attach == "Y") 
    {
?> 
 <div data-role="collapsible">
	<h4>Attachments <span class="ui-li-count ui-btn-up-c ui-btn-corner-all"><?php if(isset($GLOBALS['result']->request_remark_details)) echo count($GLOBALS['result']->request_remark_details); else echo 0; ?></span></h4>
    <p>
        <?php if(isset($_SESSION['roleSecurity']->add_attach) && $_SESSION['roleSecurity']->add_attach == "Y"){?>
    	<div data-role="collapsible">
    	<h4>Add Attachment</h4>
        <p>
    	 <form method="post"  enctype="multipart/form-data" data-ajax="false" id="addattach" action="process.php">
			<input type="hidden" name="request_id" id="request_id" value="<?php echo $_GET['id']; ?>" />
            <input type="hidden" name="ref" value="<?php echo $_GET['id']; ?>" />
            <input type="hidden" name="ref_page" value="view-request" />
            <input type="hidden" name="action" value="Attachment" />
            <input type="hidden" name="edms_autosave_attach" id="edms_autosave_attach" value="<?php echo $_SESSION["current_request"]->edms_autosave_attach; ?>"/>
           	<label>Attachment</label>
          	<input id="attachment" type="file" class="required" name="attachment" />
           	<label class="name">Description:</label>
            <input type="text" id="desc" maxlength="50"  name="desc" />

            <input id="submit" type='submit' value='Add' />
       </form>
       </p>
       </div>
        <?php } ?>
        <?php if($_SESSION['roleSecurity']->view_attachment == "Y") { ?>
 		<ul class="no-ellipses" data-role="listview" data-count-theme="b" data-inset="true">
                <?php
            if(isset($GLOBALS['result']->request_remark_details) && count($GLOBALS['result']->request_remark_details) > 1){
				$i=-1;
                foreach($GLOBALS['result']->request_remark_details as $result_at_get){
                    $i=$i+1;
                        ?>
                        <li>
						  <?php if(isset($result_at_get->attachment)) { if(stristr($result_at_get->attachment, str_ireplace("/", "\\", ATTACHMENT_FOLDER))){ ?><a style="font-size:14px;" href="#" id="<?php echo $result_at_get->attachment; ?>" class="ViewFile"><?php echo str_ireplace(str_ireplace("/", "\\", ATTACHMENT_FOLDER), "", $result_at_get->attachment); ?><?php } else { echo "<p style='font-size:14px;font-weight:bold;white-space:normal;'>".$result_at_get->attachment."</p>"; } } ?>
                           <p style="padding-top:10px;"><b>Date</b>: <?php if(strlen($result_at_get->note_datetime) > 0){ echo date('d/m/Y h:i A',strtotime(str_ireplace("T","", $result_at_get->note_datetime))); }  ?><br />
                           <b>Officer:</b> <?php echo $result_at_get->officer; ?><br />
                           <b>Type:</b> <?php echo $result_at_get->sub_type; ?><br />
                           <b>Description:</b> <?php if(isset($result_at_get->description)){ echo base64_decode($result_at_get->description); } ?></p>
                           </a>
                          </li>
                          <?php if($_SESSION['roleSecurity']->delete_attachment == "Y"){ ?>
                            <!--<a data-role="button" class="deleteAttachment"><img src="images/delete-icon.png" width="16" height="16" /> Delete</a>-->
                            <a data-role="button" href="#" id="DeleteAttachment" data-action="deleteAttachment" class="deleteAttachment"  data-urlid="0" data-reqid="<?php echo $GLOBALS['request_id'] ?>" data-path="<?php echo $result_at_get->attachment; ?>" data-date="<?php echo $result_at_get->note_datetime; ?>" data-subtype="<?php echo $result_at_get->sub_type; ?>"><img src="images/delete-icon.png" width="16" height="16" /> Delete</a>

                        <?php } ?>
                        <?php
                    
                }
            }
            elseif(isset($GLOBALS['result']->request_remark_details) && count($GLOBALS['result']->request_remark_details) == 1){
                $result_at_get = $GLOBALS['result']->request_remark_details;
                        ?>
                        <li>
						  <?php if(isset($result_at_get->attachment)) { if(stristr($result_at_get->attachment, str_ireplace("/", "\\", ATTACHMENT_FOLDER))){ ?><a style="font-size:14px;" href="#" id="<?php echo $result_at_get->attachment; ?>" class="ViewFile"><?php echo str_ireplace(str_ireplace("/", "\\", ATTACHMENT_FOLDER), "", $result_at_get->attachment); ?><?php } else { echo "<p style='font-size:14px;font-weight:bold;white-space:normal;'>".$result_at_get->attachment."</p>"; } } ?> 
                          <p style="padding-top:10px;"> <b>Date</b>: <?php if(strlen($result_at_get->note_datetime) > 0){ echo date('d/m/Y h:i A',strtotime(str_ireplace("T","", $result_at_get->note_datetime))); }  ?><br />
                           <b>Officer:</b> <?php echo $result_at_get->officer; ?><br />
                           <b>Type:</b> <?php echo $result_at_get->sub_type; ?><br />
                           <b>Description:</b> <?php if(isset($result_at_get->description)){ echo base64_decode($result_at_get->description); } ?></p>
                          </a>
                          </li>
                         <?php if($_SESSION['roleSecurity']->delete_attachment == "Y"){ ?>
                            <!--<a data-role="button" class="deleteAttachment"><img src="images/delete-icon.png" width="16" height="16" /> Delete</a>-->
                            <a data-role="button" href="#" class="deleteAttachment" data-action="deleteAttachment" data-urlid="0" data-reqid="<?php echo $GLOBALS['request_id'] ?>" data-path="<?php echo $result_at_get->attachment; ?>" data-date="<?php echo $result_at_get->note_datetime; ?>" data-subtype="<?php echo $result_at_get->sub_type; ?>"><img src="images/delete-icon.png" width="16" height="16" /> Delete</a>
                        <?php } ?>
                        <?php
                    
            }
            ?>
				
                </ul>
        <?php } ?>
                </p>
            </div>
            <script type="text/javascript">
					$(document).ready(function(){
						// validate signup form on keyup and submit
						$("#addattach").validate({
							rules: {
								attachment:{
									accept:'png|png|gif|jpeg|jpg|pjpeg|doc|docx|xls|xlsx|ppt|pptx|txt|xml|pdf|rtf'	
								}
							},
							messages: {
								attachment:{
									accept: "Please select a file with an appropriate file type (png, png, gif, jpeg, jpg, pjpeg, doc, docx, xls, xlsx, ppt, pptx, txt, xml, pdf, rtf)"
								}
							}
						});
					});
				</script>
        <script type="text/javascript">
		$(document).ready(function(){
			$("#addattach").submit(function(){
				if($(this).validate().numberOfInvalids() == 0){ $("#submit").attr("disabled", true); }
			});
		});
	</script>
<?php
    }
?>