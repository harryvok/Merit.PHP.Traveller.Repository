  <?php
  if($_SESSION['roleSecurity']->view_attachment == "Y") 
  {
  ?>
<div data-role="collapsible">
	<h4>Attachments <span class="ui-li-count ui-btn-up-c ui-btn-corner-all"><?php if(isset($GLOBALS['result']->request_remark_details)) echo count($GLOBALS['result']->request_remark_details); else echo 0; ?></span></h4>
    <p>
     <div data-role="collapsible">
    	<h4>Add Attachment</h4>
        <p>
<form method="post"  enctype="multipart/form-data" data-ajax="false" id="addattach" action="process.php">
  <input type="hidden" name="action_id" id="action_id" value="<?php echo $_GET['id']; ?>" />
   <input type="hidden" name="request_id" id="request_id" value="<?php echo $_SESSION['request_id']; ?>" />
   <input type="hidden" name="ref" value="<?php echo $_GET['id']; ?>" />
   <input type="hidden" name="ref_page" value="view-action" />
    <input type="hidden" name="action" value="Attachment" />
    <?php $dev = new Mobile_Detect(); if(!$dev->isWindowsMobileOS()){?>
<label>Attachment</label>
  <input id="attachment" type="file" class="required" name="attachment"/></li>
  <label>Description:</label><input type="text"  id="desc" maxlength="50"  name="desc" /></li>
 <input id="submit" class="button left" type='submit' value='Submit' />
  <?php } ?>
</form>
</p>
</div>
	<ul class="no-ellipses" data-role="listview" data-count-theme="b" data-inset="true">
      <?php
      if(isset($GLOBALS['result']->request_remark_details)){
  if(count($GLOBALS['result']->request_remark_details) > 1){
	  $i=-1;
      foreach($GLOBALS['result']->request_remark_details as $result_at_get){
			   
              ?>
              <li>
              <?php if(isset($result_at_get->attachment)) { if(stristr($result_at_get->attachment, str_ireplace("/", "\\", ATTACHMENT_FOLDER))){ ?><a style="font-size:14px;" href="#" id="<?php echo $result_at_get->attachment; ?>" class="ViewFile"><?php echo str_ireplace(str_ireplace("/", "\\", ATTACHMENT_FOLDER), "", $result_at_get->attachment); ?><?php } else { echo "<p style='font-size:14px;font-weight:bold;white-space:normal;'>".$result_at_get->attachment."</p>"; } } ?>
               <p style="padding-top:10px;"><b>Date</b>: <?php if(strlen($result_at_get->note_datetime) > 0){ echo date('d/m/Y h:i A',strtotime(str_ireplace("T","", $result_at_get->note_datetime))); }  ?><br />
               <b>Officer:</b> <?php echo $result_at_get->officer; ?><br />
               <b>Type:</b> <?php echo $result_at_get->sub_type; ?><br />
               <b>Description:</b> <?php if(isset($result_at_get->description)){ echo base64_decode($result_at_get->description); } ?></p>
               </a>
              </li>
              <?php
          
      }
  }
  elseif(count($GLOBALS['result']->request_remark_details) == 1){
      $result_at_get = $GLOBALS['result']->request_remark_details;
              ?>
              <li>
              <?php if(isset($result_at_get->attachment)) { if(stristr($result_at_get->attachment, str_ireplace("/", "\\", ATTACHMENT_FOLDER))){ ?><a  style="font-size:14px;" href="#" id="<?php echo $result_at_get->attachment; ?>" class="ViewFile"><?php echo str_ireplace(str_ireplace("/", "\\", ATTACHMENT_FOLDER), "", $result_at_get->attachment); ?><?php } else { echo "<p style='font-size:14px;font-weight:bold;white-space:normal;'>".$result_at_get->attachment."</p>"; } } ?>
               <p style="padding-top:10px;"><b>Date</b>: <?php if(strlen($result_at_get->note_datetime) > 0){ echo date('d/m/Y h:i A',strtotime(str_ireplace("T","", $result_at_get->note_datetime))); }  ?><br />
               <b>Officer:</b> <?php echo $result_at_get->officer; ?><br />
               <b>Type:</b> <?php echo $result_at_get->sub_type; ?><br />
               <b>Description:</b> <?php if(isset($result_at_get->description)){ echo base64_decode($result_at_get->description); } ?></p>
               </a>
              </li>
              <?php
          
  }
 }
  ?>
  
  </ul>
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
  
  </p>
  </div>

<?php
  }
?>