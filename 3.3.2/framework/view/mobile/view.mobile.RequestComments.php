 <span class="graytitle">Comments</span>
    <div id="CommentsShow">
            <ul class="pageitem">
                <li class="button">
                    <input type="button" value="Show (<?php if(isset($GLOBALS['result']->request_remark_details)) echo count($GLOBALS['result']->request_remark_details); else echo 0; ?>)" class="openSection" id="Comments" />
                </li>
            </ul>
            </div>
        <div id="CommentsSection" style="display:none;">
      
            <ul class="pageitem">
                <?php
            if(isset($GLOBALS['result']->request_remark_details) && count($GLOBALS['result']->request_remark_details) > 1){
				$i=-1;
                foreach($GLOBALS['result']->request_remark_details as $result_c_get){
                    $i=$i+1;
                        ?>
                        <li class="textbox">
                        <b>Level:</b> <?php if($result_c_get->action_id == 0){ echo "Request"; } else { echo "Action"; } ?><br />
                        <b>Date</b>: <?php if(strlen($result_c_get->note_datetime) > 0){ echo date('d/m/Y h:i A',strtotime(str_ireplace("T","", $result_c_get->note_datetime))); }  ?><br />
                         <b>Officer:</b> <?php echo $result_c_get->officer; ?><br />
                         <b>Type:</b> <?php echo $result_c_get->sub_type; ?><br />
                            <span class="name"><b>Comment:</b></span> <?php echo base64_decode($result_c_get->comment); ?></a>
                        </li>
                            <?php
                    
                }
            }
            elseif(isset($GLOBALS['result']->request_remark_details) && count($GLOBALS['result']->request_remark_details) == 1){
                $result_c_get = $GLOBALS['result']->request_remark_details;
                    ?>
                    <li class="textbox">
                    <b>Level:</b> <?php if($result_c_get->action_id == 0){ echo "Request"; } else { echo "Action"; } ?><br />
                    <b>Date</b>: <?php if(strlen($result_c_get->note_datetime) > 0){ echo date('d/m/Y h:i A',strtotime(str_ireplace("T","", $result_c_get->note_datetime))); }  ?><br />
                         <b>Officer:</b> <?php echo $result_c_get->officer; ?><br />
                         <b>Type:</b> <?php echo $result_c_get->sub_type; ?><br />
                        <span class="name"><b>Comment:</b></span> <?php echo base64_decode($result_c_get->comment); ?></a>
                    </li>
                        <?php
                
            }
            ?>
            <li class="button">
                    <input type="button" value="Hide" class="closeSection" id="Comments" />
                </li>
            </ul>
            </div>
        
    <span class="graytitle">Add Comment</span>
        <ul class="pageitem">
            <li class="textbox">
            <form id="view-job-form" method="post"  enctype="multipart/form-data"  action="process.php">
            <textarea  name="comment" class="required"><?php if(isset($_SESSION['comment'])){  echo $_SESSION['comment'];  unset($_SESSION['comment']); } ?></textarea>
           <input type="hidden" name="action" value="AddComment" />
            <input type="hidden" name="request_id" id="request_id" value="<?php echo $GLOBALS['request_id']; ?>" />
             <input type="hidden" name="ref" vaue="<?php echo $_GET['ref']; ?>" />
                <input type="hidden" name="ref_page" vaue="<?php echo $_GET['ref_page']; ?>" />
                <input type="hidden" name="filter" value="<?php echo $_GET['filter']; ?>" />
            <input type="hidden" name="page" value="request" />
            <span class="graytitle">Notify Action Officer/s?</span>
            <ul class="pageitem">
                <li class="radiobutton"><span class="name">No</span>
                <input name="send_email" type="radio" value="N" checked /> </li>
                <li class="radiobutton"><span class="name">Yes</span>
                <input name="send_email" type="radio" value="Y" /> </li>
            </ul>
			</li>
        <li class="button"><input name="Submit input" type="submit" id="submit"  value="Add" />
            </form></li>
        </ul>
    </form>
    
    <script type="text/javascript">
		$(document).ready(function(){
			$("#view-job-form").validate();
			$("#view-job-form").submit(function(){
				if($(this).validate().numberOfInvalids() == 0){ $("#submit").attr("disabled", true); }
			});
		});
	</script>