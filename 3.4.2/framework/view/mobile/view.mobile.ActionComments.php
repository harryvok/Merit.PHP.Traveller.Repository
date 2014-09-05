 <?php
     if($_SESSION['roleSecurity']->view_comment == "Y") 
     {
 ?> 
  <div data-role="collapsible">
	<h4>Comments <span class="ui-li-count ui-btn-up-c ui-btn-corner-all"><?php if(isset($GLOBALS['result']->request_remark_details)) echo count($GLOBALS['result']->request_remark_details); else echo 0; ?></span></h4>
    <p>
    	<div data-role="collapsible">
    	<h4>Add Comment</h4> 
        <p>
        <form id="view-job-form" method="post"  enctype="multipart/form-data" data-ajax="false"  action="process.php">
        <textarea class="required"  name="comment"><?php if(isset($_SESSION['comment'])){  echo $_SESSION['comment'];  unset($_SESSION['comment']); } ?></textarea>
        <label>Notify Action Officer/s?</label>
    <label for="no">No</label>
        <input id="no" name="send_email" type="radio" value="N" checked />
    <label for="yes">Yes</label>
        <input id="yes" name="send_email" type="radio" value="Y" />
        <input type="hidden" name="action" value="AddComment" />
        <input type="hidden" name="request_id" id="request_id" value="<?php echo $GLOBALS['request_id']; ?>" />
                  <input type="hidden" name="action_id" id="action_id" value="<?php echo $_GET['id']; ?>" />
                  <input type="hidden" name="ref" vaue="<?php echo $_GET['ref']; ?>" />
                <input type="hidden" name="ref_page" vaue="<?php echo $_GET['ref_page']; ?>" />
                <input type="hidden" name="action_required" value="<?php echo $_SESSION['assign_name']; ?>">
                <input type="hidden" name="filter" value="<?php echo $_GET['filter']; ?>" />
          <input type="hidden" name="page" value="action" />
       <input name="Submit input" type="submit" id="submit" value="Add" />
        </form>
        </p>
        </div>
        <ul class="no-ellipses" data-role="listview" data-count-theme="b" data-inset="true">
        <?php
		
    if(isset($GLOBALS['result']->request_remark_details)){
        if(count($GLOBALS['result']->request_remark_details) > 1){
			$i=-1;
            foreach($GLOBALS['result']->request_remark_details as $result_c_get){
                if($result_c_get->note_type == "Comment"){
                    ?>
                    <li>
                    <p><b>Level:</b> <?php if($result_c_get->action_id == 0){ echo "Request"; } else { echo "Action"; } ?></p>
                     <?php if($result_c_get->action_id != 0 && isset($result_c_get->action_name)){ ?><p><b>Action Required:</b> <?php if(isset($result_c_get->action_name)) echo $result_c_get->action_name; ?></p><?php } ?>
                    <p><b>Date</b>: <?php if(strlen($result_c_get->note_datetime) > 0){ echo date('d/m/Y h:i A',strtotime(str_ireplace("T","", $result_c_get->note_datetime))); }  ?></p>
                     <p><b>Officer:</b> <?php echo $result_c_get->officer; ?></p>
                     <p><b>Type:</b> <?php echo $result_c_get->sub_type; ?></p>
                     <p><b>Comment:</b> <?php if(isset($result_c_get->comment)){ echo base64_decode($result_c_get->comment); } ?></a></p>
                    </li>
                        <?php
                }
            }
        }
        elseif(count($GLOBALS['result']->request_remark_details) == 1){
            $result_c_get = $GLOBALS['result']->request_remark_details;
                ?>
                <li>
                <p><b>Level:</b> <?php if($result_c_get->action_id == 0){ echo "Request"; } else { echo "Action"; } ?></p>
                 <?php if($result_c_get->action_id != 0 && isset($result_c_get->action_name)){ ?><p><b>Action Required:</b> <?php if(isset($result_c_get->action_name)) echo $result_c_get->action_name; ?></p><?php } ?>
                    <p><b>Date</b>: <?php if(strlen($result_c_get->note_datetime) > 0){ echo date('d/m/Y h:i A',strtotime(str_ireplace("T","", $result_c_get->note_datetime))); }  ?></p>
                     <p><b>Officer:</b> <?php echo $result_c_get->officer; ?></p>
                     <p><b>Type:</b> <?php echo $result_c_get->sub_type; ?></p>
                     <p><b>Comment:</b> <?php if(isset($result_c_get->comment)){ echo base64_decode($result_c_get->comment); } ?></a></p>
                </li>
                    <?php
            
        }
    }
    ?>
    </ul>
     <script type="text/javascript">
		$(document).ready(function(){
			$("#view-job-form").validate();
			$("#view-job-form").submit(function(){
				if($(this).validate().numberOfInvalids() == 0){ $("#submit").attr("disabled", true); }
			});
		});
	</script>
    </p>
    </div>
<?php 
 }
?>
        

    
   