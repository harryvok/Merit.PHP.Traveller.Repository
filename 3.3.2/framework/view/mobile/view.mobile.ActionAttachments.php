  <span class="graytitle">Attachments</span>
  <div id="AttachmentsShow">
  <ul class="pageitem">
      <li class="button">
          <input type="button" value="Show (<?php if(isset($GLOBALS['result']->request_remark_details)) echo count($GLOBALS['result']->request_remark_details); else echo 0; ?>)" class="openSection" id="Attachments" />
      </li>
  </ul>
  </div>
  <div class="sectionDetail" id="AttachmentsSection" style="display:none;">
  <ul class="pageitem">
            <li class="bigfield">
                <input type="text" placeholder="Search..." id="searchText" />
            </li>
        </ul>
  <ul class="pageitem">
      <?php
	  $count = 0;
      if(isset($GLOBALS['result']->request_remark_details)){
  if(count($GLOBALS['result']->request_remark_details) > 1){
	  $i=-1;
      foreach($GLOBALS['result']->request_remark_details as $result_at_get){
			   
              ?>
               <li class="textbox searchObject"  id="searchObject<?php echo $count; ?>">
               <b>Date</b>: <?php if(strlen($result_at_get->note_datetime) > 0){ echo date('d/m/Y h:i A',strtotime(str_ireplace("T","", $result_at_get->note_datetime))); }  ?><br />
               <b>Officer:</b> <?php echo $result_at_get->officer; ?><br />
               <b>Type:</b> <?php echo $result_at_get->sub_type; ?><br />
               <b>Description:</b> <?php if(isset($result_at_get->description)){ echo base64_decode($result_at_get->description); } ?> <br />
               <b>Attachment:</b> <?php if(isset($result_at_get->attachment)) { if(stristr($result_at_get->attachment, str_ireplace("/", "\\", ATTACHMENT_FOLDER))){ ?><a href="#" id="<?php echo $result_at_get->attachment; ?>" class="ViewFile"><?php echo str_ireplace(str_ireplace("/", "\\", ATTACHMENT_FOLDER), "", $result_at_get->attachment); ?></a><?php } else { echo $result_at_get->attachment; } } ?>
              </li>
              <?php
			  $count = $count + 1;
          
      }
  }
  elseif(count($GLOBALS['result']->request_remark_details) == 1){
      $result_at_get = $GLOBALS['result']->request_remark_details;
              ?>
               <li class="textbox searchObject"  id="searchObject0">
              <b>Date</b>: <?php if(strlen($result_at_get->note_datetime) > 0){ echo date('d/m/Y h:i A',strtotime(str_ireplace("T","", $result_at_get->note_datetime))); }  ?><br />
               <b>Officer:</b> <?php echo $result_at_get->officer; ?><br />
               <b>Type:</b> <?php echo $result_at_get->sub_type; ?><br />
               <b>Description:</b> <?php if(isset($result_at_get->description)){ echo base64_decode($result_at_get->description); } ?><br />
             <b>Attachment:</b> <?php if(isset($result_at_get->attachment)) { if(stristr($result_at_get->attachment, str_ireplace("/", "\\", ATTACHMENT_FOLDER))){ ?><a href="#" id="<?php echo $result_at_get->attachment; ?>" class="ViewFile"><?php echo str_ireplace(str_ireplace("/", "\\", ATTACHMENT_FOLDER), "", $result_at_get->attachment); ?></a><?php } else { echo $result_at_get->attachment; } } ?>
              </li>
              <?php
          
  }
 }
  ?>
  <li class="button">
          <input type="button" value="Hide" class="closeSection" id="Attachments" />
      </li>
  </ul>
  </div>
  </li>
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
  <input type="hidden" name="action_id" id="action_id" value="<?php echo $_GET['id']; ?>" />
   <input type="hidden" name="request_id" id="request_id" value="<?php echo $_SESSION['request_id']; ?>" />
   <input type="hidden" name="ref" value="<?php echo $_GET['id']; ?>" />
   <input type="hidden" name="ref_page" value="view-action" />
    <input type="hidden" name="action" value="Attachment" />
<span class="graytitle">Attachment</span>
  <ul class="pageitem">
  <li class="bigfield"><input id="attachment" type="file" class="required" name="attachment"/></li>
  <li class="smallfield"><span class="name">Description:</span><input type="text"  id="desc" maxlength="50"  name="desc" /></li>
  <li class="button"><input id="submit" class="button left" type='submit' value='Submit' /></li>
  </ul>
</form>

 <script type="text/javascript">
		$(document).ready(function(){
			$("#addattach").submit(function(){
				if($(this).validate().numberOfInvalids() == 0){ $("#submit").attr("disabled", true); }
			});
		});
	</script>