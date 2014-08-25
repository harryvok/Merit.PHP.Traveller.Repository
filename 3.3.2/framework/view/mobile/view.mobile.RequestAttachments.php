
 <span class="graytitle">Attachments</span>
    <div id="AttachmentsShow">
            <ul class="pageitem">
                <li class="button">
                    <input type="button" value="Show (<?php if(isset($GLOBALS['result']->request_remark_details)) echo count($GLOBALS['result']->request_remark_details); else echo 0; ?>)" class="openSection" id="Attachments" />
                </li>
            </ul>
            </div>
        <div id="AttachmentsSection" style="display:none;">
      
            <ul class="pageitem">
                <?php
            if(isset($GLOBALS['result']->request_remark_details) && count($GLOBALS['result']->request_remark_details) > 1){
				$i=-1;
                foreach($GLOBALS['result']->request_remark_details as $result_at_get){
                    $i=$i+1;
                        ?>
                        <li class="textbox">
                        <b>Date</b>: <?php if(strlen($result_at_get->note_datetime) > 0){ echo date('d/m/Y h:i A',strtotime(str_ireplace("T","", $result_at_get->note_datetime))); }  ?><br />
                         <b>Officer:</b> <?php echo $result_at_get->officer; ?><br />
                         <b>Type:</b> <?php echo $result_at_get->sub_type; ?><br />
                          <b>Description:</b> <?php if(isset($result_at_get->description)){ echo base64_decode($result_at_get->description); } ?><br />
                         <b>Attachment:</b> <?php  if(stristr($result_at_get->attachment, str_ireplace("/", "\\", ATTACHMENT_FOLDER))){ ?><a href="#" id="<?php echo $result_at_get->attachment; ?>" class="ViewFile"><?php echo str_ireplace(str_ireplace("/", "\\", ATTACHMENT_FOLDER), "", $result_at_get->attachment); ?></a><?php } else { echo $result_at_get->attachment; } ?>
                        </li>
                        <?php
                    
                }
            }
            elseif(isset($GLOBALS['result']->request_remark_details) && count($GLOBALS['result']->request_remark_details) == 1){
                $result_at_get = $GLOBALS['result']->request_remark_details;
                        ?>
                        <li class="textbox">
                        <b>Date</b>: <?php if(strlen($result_at_get->note_datetime) > 0){ echo date('d/m/Y h:i A',strtotime(str_ireplace("T","", $result_at_get->note_datetime))); }  ?><br />
                         <b>Officer:</b> <?php echo $result_at_get->officer; ?><br />
                         <b>Type:</b> <?php echo $result_at_get->sub_type; ?><br />
                          <b>Description:</b> <?php if(isset($result_at_get->description)){ echo base64_decode($result_at_get->description); } ?><br />
                         <b>Attachment:</b> <?php  if(stristr($result_at_get->attachment, str_ireplace("/", "\\", ATTACHMENT_FOLDER))){ ?><a href="#" id="<?php echo $result_at_get->attachment; ?>" class="ViewFile"><?php echo str_ireplace(str_ireplace("/", "\\", ATTACHMENT_FOLDER), "", $result_at_get->attachment); ?></a><?php } else { echo $result_at_get->attachment; } ?>
                        </li>
                        <?php
                    
            }
            ?>
            <li class="button">
                    <input type="button" value="Hide" class="closeSection" id="Attachments" />
                </li>
                </ul>
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
    <form method="post"  enctype="multipart/form-data" id="addattach" action="process.php">
<input type="hidden" name="request_id" id="request_id" value="<?php echo $_GET['id']; ?>" />
                   <input type="hidden" name="ref" value="<?php echo $_GET['id']; ?>" />
                   <input type="hidden" name="ref_page" value="view-request" />
                   <input type="hidden" name="action" value="Attachment" />
          <span class="graytitle">Attachment</span>
            <ul class="pageitem">
            <li class="bigfield"><input id="attachment" type="file" class="required" name="attachment" /></li>
            <li class="smallfield"><span class="name">Description:</span><input type="text" id="desc" maxlength="50"  name="desc" /></li>
            <li class="button"><input id="submit" class="button left" type='submit' value='Submit' /></li>
       </form>
       
       
        <script type="text/javascript">
		$(document).ready(function(){
			$("#addattach").submit(function(){
				if($(this).validate().numberOfInvalids() == 0){ $("#submit").attr("disabled", true); }
			});
		});
	</script>