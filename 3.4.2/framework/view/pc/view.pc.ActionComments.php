 <?php
     if($_SESSION['roleSecurity']->view_comment == "Y") 
     {
 ?>
<?php

if(isset($_SESSION['request_id'])){
	
	?>
        <div class="summaryContainer">
             <div class="float-left">
                 <input type="hidden" name="val-c" id="val-c" value="0" />
                <div style="float:left;">
                    <span class="summaryColumnTitle"  style="float:left;">
                    <input name="comment_count" id="comment_count_v" type="hidden" value="<?php if(isset($GLOBALS['result']->request_remark_details)) echo count($GLOBALS['result']->request_remark_details); else echo 0; ?>" />
                    <div style="float:left;" id="comment_count">Comments (<?php if(isset($GLOBALS['result']->request_remark_details)) echo count($GLOBALS['result']->request_remark_details); else echo 0; ?>)</div>
                    </span>
                </div>
                <div style="float:right;" class="openPopup">
                    <a href="#commentsn" onClick="addcomment()" style="text-decoration:none;">
                    
                        <span style="text-decoration:none;">
                            <img src="images/iconAdd.png" /> 
                        </span>
                        <span  class="openPopup" id="Comments">Add Comment</span>
                    
                    </a>
                </div>
                
               
                <div id="comments" class="dropdown">
                         <input type="text" id="actionComments" class="tableSearch" placeholder="Search..." />
                        <table id="actionCommentsTable" class=" sortable" title="" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Level</th>
                                <th>Action Required</th>
                                <th>Date/Time</td>
                                <th>Officer</th>
    
                                <th>Type</th>
                               <th >Comment</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        $number=0;
                        if(isset($GLOBALS['result']->request_remark_details) && count($GLOBALS['result']->request_remark_details) > 1){
                            $i=-1;
                            foreach($GLOBALS['result']->request_remark_details as $result_c_get){
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
                                            <td><?php if($result_c_get->action_id == 0){ echo "Request"; } else { echo "Action"; } ?></td>
                                            <td> <?php if($result_c_get->action_id != 0 && isset($result_c_get->action_name)){ ?><?php if(isset($result_c_get->action_name)) echo $result_c_get->action_name; ?><?php } ?></td>
                                            <td><?php if(strlen($result_c_get->note_datetime) > 0){ echo date('d/m/Y h:i A',strtotime(str_ireplace("T","", $result_c_get->note_datetime))); }  ?></td>
                                            <td><?php echo $result_c_get->officer; ?></td>
                                            <td><?php echo $result_c_get->sub_type; ?></td>
                                            <td><?php if(isset($result_c_get->comment)){ echo base64_decode($result_c_get->comment); } ?></td>
                                        </tr>
                                        <?php
                                
                            }
                        }
                        elseif(isset($GLOBALS['result']->request_remark_details) && count($GLOBALS['result']->request_remark_details) == 1){
                            $result_c_get = $GLOBALS['result']->request_remark_details;
                            ?>
                                <tr class="dark" title="">
                                    <td><?php if($result_c_get->action_id == 0){ echo "Request"; } else { echo "Action"; } ?></td>
                                    <td> <?php if($result_c_get->action_id != 0 && isset($result_c_get->action_name)){ ?><?php if(isset($result_c_get->action_name)) echo $result_c_get->action_name; ?><?php } ?></td>
                                    <td><?php if(strlen($result_c_get->note_datetime) > 0){ echo date('d/m/Y h:i A',strtotime(str_ireplace("T","", $result_c_get->note_datetime))); }  ?></td>
                                    <td><?php echo $result_c_get->officer; ?></td>
                                     <td><?php echo $result_c_get->sub_type; ?></td>
                                    <td><?php if(isset($result_c_get->comment)){  echo base64_decode($result_c_get->comment); } ?></td>
                                <?php
                            
                        }
                        
                        ?>
                        </tbody>
                        </table>
                        
                </div>
                <a title="commentsn" name="commentsn"></a>
                <div class="popupDetail" id="CommentsPopup">
                <div class="popupTitle">
                <div style="float:left;"><h4>Add Comment</h4></div>
                
                <div id="closeNames" class="closePopup">
                    <img src="images/close.png" /> Close
                </div> 
                </div>
                <div style="float:left;width:100%;">
                    <form method="post" action="process.php" id="view-job-form">
                    <textarea  name="comment" class="required" id="comment"><?php if(isset($_SESSION['comment'])){  echo $_SESSION['comment'];  unset($_SESSION['comment']); } ?></textarea><br />
                    <label>Notify Action Officer/s?</label>
    No
        <input id="no" name="send_email" type="radio" value="N" checked />
    Yes
        <input id="yes" name="send_email" type="radio" value="Y" />
        <br /><br />
                    <input id="submit" class="button left" type='submit' value='Add Comment' />
                      <input type="hidden" name="request_id" id="request_id" value="<?php echo $_SESSION['request_id']; ?>" />
                      <input type="hidden" name="action_id" id="action_id" value="<?php echo $_GET['id']; ?>" />
                      <input type="hidden" name="ref" vaue="<?php echo $_GET['ref']; ?>" />
                    <input type="hidden" name="ref_page" vaue="<?php echo $_GET['ref_page']; ?>" />
                    <input type="hidden" name="filter" value="<?php echo $_GET['filter']; ?>" />
                    <input type="hidden" name="action_required" value="<?php echo $_SESSION['assign_name']; ?>">
                    <input type="hidden" name="action" value="AddComment" />
                    <input type="hidden" name="page" value="action" />
                    </form>
                     <script type="text/javascript">
						$(document).ready(function(){
							$("#view-job-form").validate();
							$("#view-job-form").submit(function(){
								if($(this).validate().numberOfInvalids() == 0){ $("#submit").attr("disabled", true); }
							});
						});
					</script>
                 </div>
            </div>
      
<?php
}
else{
	echo "Could not retrieve comments.";	
}
    ?>
<?php 
 }
?>