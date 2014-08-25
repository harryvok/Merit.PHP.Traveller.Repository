<script type="text/javascript" src="inc/js/pages/js.adhocOfficer.js"></script>

<?php
if(isset($_SESSION['user_id'])){
	if($_SESSION['adhoc-true'] == 1){
		?>
		Please choose an officer to be assigned to the next action.
			<form  enctype='multipart/form-data' action='process.php' id="adhocOfficer" method='post'>
			<br />
			<b>Action Name:</b> <?php echo $_SESSION['reason_assigned']; ?>
			<div class="float-left">
			<label  for="resp_officer">Officer<span style="color:red;">*</span></label>
			</div>
			<div class="float-left">
			<input id="new_officer_text" class="required" placeholder="Search..." />
		  <input type="hidden" id="new_officer_code" name="resp_officer"  class="required" />
			</div>
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
			<input id="submit" class="button left" type='submit' value='Submit' />
		</form>
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

