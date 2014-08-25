
<?php
include("../../framework/controller.php");
$controller = new Controller();
$service_code = $_POST['service_code'];
?>
<script type="text/javascript">
	$(document).ready(function(){
		$('#request').change(function(){
			QueryFunction_j($(this).val(), '<?php echo $service_code; ?>');   
			$('#request').blur();
			$('#function').focus();
		}); 
		
		$('#request').change(function(){
			QueryUDFs('0',$(this).val(), '<?php echo $service_code; ?>');   
			
		}); 
		
	});

</script>
<script type="text/javascript" src="inc/js/ajax.js"></script>
<script type="text/javascript" src="inc/js/jquery-1.9.1.js"></script>

<?php
$controller->Dropdown("RequestTypes");
?>