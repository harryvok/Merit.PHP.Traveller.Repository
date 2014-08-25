
<?php
include("../../framework/controller.php");
$controller = new Controller();
$service_code = $_POST['service_code'];
$request_code = $_POST['request_code'];
?>
<script type="text/javascript">
$(document).ready(function(){
	
			$('#function').change(function(){
                QueryUDFs($(this).val(), '<?php echo $request_code; ?>','<?php echo $service_code; ?>');   
                
            }); 
            
        });
</script>
<script type="text/javascript" src="inc/js/ajax.js"></script>
<script type="text/javascript" src="inc/js/jquery-1.9.1.js"></script>
<?php
$controller->Dropdown("FunctionTypes");
?>