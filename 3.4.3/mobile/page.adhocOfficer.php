<script type="text/javascript" src="inc/js/pages/js.adhocOfficer.js"></script>

<?php
if(isset($_SESSION['user_id'])){
	if($_SESSION['adhoc-true'] == 1){
	?>
	<div data-role="page" id="default">
      <div data-role="header" data-position="fixed">
          <h1>Adhoc Officer</h1>
      </div>
      <div data-role="content">
      	Please choose an adhoc officer which will be associated with the next action.<br />
            <strong>Action Name:</strong> <?php echo $_SESSION['reason_assigned']; ?><br />
            <form  enctype='multipart/form-data' action='process.php' id="adhocOfficer" method='post'>
                <label>Officer<span style="color:red;">*</span></label>
                <input id="new_officer_text" id="new_officer_text" class="required"  placeholder="Search..." /> 
                <input type="hidden" id="new_officer_code" name="resp_officer"  class="required" />
                <input type="hidden" name="page" value="action" />
                <input type="hidden" name="action" value="AdhocOfficer" />
                <input type="hidden" name="action_id" id="action_id" value="<?php echo $_SESSION['action_id']; ?>" />
                <input type="hidden" name="request_id" id="request_id" value="<?php echo $_SESSION['request_id']; ?>" />
                <input type="hidden" name="bypass" id="bypass" value="<?php echo $_SESSION['bypass']; ?>" />
                <input type="hidden" name="reason_assigned" id="reason_assigned" value="<?php echo $_SESSION['reason_assigned']; ?>" />
                <input type="hidden" name="email" id="email" value="<?php echo $_SESSION['email']; ?>" />
                <input type="hidden" name="due_datetime" id="due_datetime" value="<?php echo $_SESSION['due_date']; ?>" />
                <input type="hidden" name="priority" id="priority" value="<?php echo $_SESSION['priority']; ?>" />
                <input type="hidden" name="officer_type" id="officer_type" value="<?php echo $_SESSION['officer_type']; ?>" />
                <input type="hidden" name="position_no" id="position_no" value="<?php echo $_SESSION['position_no']; ?>" />
                <input name="Submit input" type="submit" id="submit"  value="Submit" />
            </form>
		</div>
	</div>
	<?php
	}
	else{
		header("Location: page.error.php");
	}
	
}
else{
	$_SESSION['not_logged_in'] = 1;
	header("Location: index.php");	
}
?>

