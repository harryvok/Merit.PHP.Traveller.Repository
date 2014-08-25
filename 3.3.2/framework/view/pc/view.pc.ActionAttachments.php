<?php

if(isset($_SESSION['request_id'])){
	?>
    <div class="float-left">
                 <input type="hidden" name="val-at" id="val-at" value="0" />
                <div style="float:left;">
                    <span class="request-column-title">
                    <div style="float:left;">Attachments (<?php if(isset($GLOBALS['result']->request_remark_details)) echo count($GLOBALS['result']->request_remark_details); else echo 0; ?>)</div>
                    </span>
                </div>
                <div class="openPopup" style="float:right;" >
                    <a href="#attach" onClick="addattach()" style="text-decoration:none;">
                    
                        <span style="text-decoration:none;">
                            <img src="images/page-add-icon.png" /> 
                        </span>
                        <span  class="openPopup" id="Attachments">Add Attachment</span>
                    
                    </a>
                </div>
                
               
                <div id="attachments" class="dropdown">
                	<input type="text" id="actionAttachments" class="tableSearch" placeholder="Search..." />
                        <table id="actionAttachmentsTable" class=" sortable" title="" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Date/Time</th>
                                <th>Officer</th>
                               <th>Description</th>
                               <th class="action">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        $number=0;
                        if(isset($GLOBALS['result']->request_remark_details) && count($GLOBALS['result']->request_remark_details) > 1){
                            $i=-1;
                            foreach($GLOBALS['result']->request_remark_details as $result_at_get){
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
                                            <td><?php if(isset($result_at_get->attachment)) { echo str_ireplace(str_ireplace("/", "\\", ATTACHMENT_FOLDER), "", $result_at_get->attachment); ?> - <?php } if(isset($result_at_get->description)){ echo base64_decode($result_at_get->description); } ?></td>
                                            <td><?php if(isset($result_at_get->attachment)) { if(stristr($result_at_get->attachment, str_ireplace("/", "\\", ATTACHMENT_FOLDER))){ ?><a id="<?php echo $result_at_get->attachment; ?>" class="ViewFile">View</a> <?php } } ?></td>
                                        </tr>
                                        <?php
                                
							}
                        }
                        elseif(isset($GLOBALS['result']->request_remark_details) && count($GLOBALS['result']->request_remark_details) == 1){
                            $result_at_get = $GLOBALS['result']->request_remark_details; 
                            ?>
                                <tr class="dark" title="">
                                    <td><?php if(strlen($result_at_get->note_datetime) > 0){ echo date('d/m/Y h:i A',strtotime(str_ireplace("T","", $result_at_get->note_datetime))); }  ?></td>
                                    <td><?php echo $result_at_get->officer; ?></td>
                                    <td><?php if(isset($result_at_get->attachment)) { echo str_ireplace(str_ireplace("/", "\\", ATTACHMENT_FOLDER), "", $result_at_get->attachment); ?> - <?php } if(isset($result_at_get->description)){ echo base64_decode($result_at_get->description); } ?></td>
                                    <td><?php if(isset($result_at_get->attachment)) {  if(stristr($result_at_get->attachment, str_ireplace("/", "\\", ATTACHMENT_FOLDER))){ ?><a id="<?php echo $result_at_get->attachment; ?>" class="ViewFile">View</a> <?php } } ?></td>
                                <?php
                            
                        }
                        
                        ?>
                        </tr>
                        </table>
                </div>
                <div class="popupDetail" id="AttachmentsPopup">
                    <div class="popupTitle">
                    <div style="float:left;"><h4>Add Attachment</h4></div>
                    
                    <div id="closeNames" class="closePopup">
                        <img src="images/close.png" /> Close
                    </div> 
                </div>
                 <div class="float-left">
                    <a title="attach"></a>
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
                            <input id="attachment" class="required" type="file" name="attachment"  />
                            <P>&nbsp;</P>
                            <label class="title-left" for="desc">Description</label> 
                            <input type="text" id="desc" maxlength="50"  name="desc" />

                     <input id="submit" class="button left" type='submit' value='Add Attachment' />
                       <input type="hidden" name="ref" value="<?php echo $_GET['id']; ?>" />
                       <input type="hidden" name="action_id" id="action_id" value="<?php echo $_GET['id']; ?>" />
                        <input type="hidden" name="request_id" id="request_id" value="<?php echo $_SESSION['request_id']; ?>" />
                       <input type="hidden" name="ref_page" value="view-action" />
                       <input type="hidden" name="action" value="Attachment" />
                    </div>
                   </form>
                   
                    <script type="text/javascript">
						$(document).ready(function(){
							$("#addattach").submit(function(){
								if($(this).validate().numberOfInvalids() == 0){ $("#submit").attr("disabled", true); }
							});
						});
					</script>
                </div>
            </div>
            
            </div>
        </div>
    </div>
    </div>

<?php
}
else{
	echo "Could not retrieve attachments.";	
}
?>