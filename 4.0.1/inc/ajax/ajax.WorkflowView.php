<?php
include("../../framework/controller.php");
include("../../inc/php/Workflow.php");
$controller = new Controller();
$result = $controller->Get("WorkflowSRF");

$workflow = new Workflow();

if(count($result->workflow_details) > 1){
    if($_GET['request_id'] == ""){
        $workflow->addNode("1", "" , "", "Service: ".$_GET['serviceName']."\nRequest: ".$_GET['requestName']."\nFunction: ".$_GET['functionName']);
        foreach($result->workflow_details as $workflowData){
            $action_notify = isset($workflowData->action_notify) ? $workflowData->action_notify : "";
            $workflow->addNode($workflowData->position_no, $workflowData->after_position_no == 0 ? "1" : $workflowData->after_position_no , '', "Action: ".$workflowData->action_name."\nType: ".$workflowData->action_type."\nID: ".$workflowData->position_no." Trigger: ".$workflowData->action_trigger."\nOfficer: ".$workflowData->officer_name."\nDue: ".$workflowData->due_date."\nNotification: ".$action_notify);
        }
    }
    else{
        $workflow->addNode("1", "" , "", "Req ID: ".$_GET['request_id']."    ".$_GET['requestDate']."\nService: ".$_GET['serviceName']."\nRequest: ".$_GET['requestName']."\nFunction: ".$_GET['functionName']);
        foreach($result->workflow_details as $workflowData){
            $action_notify = isset($workflowData->action_notify) ? $workflowData->action_notify : "";
            $status = $workflowData->action_status == "W/Flow" ? "Trigger: ".$workflowData->action_trigger : "Outcome: ".$workflowData->action_outcome;
            $workflow->addNode($workflowData->position_no, $workflowData->after_position_no == 0 ? "1" : $workflowData->after_position_no , $workflowData->action_status, $workflowData->action_name."\nDue: ".$workflowData->due_date."\nStatus: ".$workflowData->action_status."\n".$status."\nOfficer: ".$workflowData->officer_name."\nNotification: ".$action_notify);
        }
    }
}
elseif(count($result->workflow_details) == 1){
    $workflowData = $result->workflow_details;
    if($_GET['request_id'] == ""){
        $workflow->addNode("1", "" , "", "Service: ".$_GET['serviceName']."\nRequest: ".$_GET['requestName']."\nFunction: ".$_GET['functionName']);

        $action_notify = isset($workflowData->action_notify) ? $workflowData->action_notify : "";
        $workflow->addNode($workflowData->position_no, "1", '', "Action: ".$workflowData->action_name."\nType: ".$workflowData->action_type."\nID: ".$workflowData->position_no." Trigger: ".$workflowData->action_trigger."\nOfficer: ".$workflowData->officer_name."\nDue: ".$workflowData->due_date."\nNotification: ".$action_notify);
        
    }
    else{
        $workflow->addNode("1", "" , "", "Req ID: ".$_GET['request_id']."    ".$_GET['requestDate']."\nService: ".$_GET['serviceName']."\nRequest: ".$_GET['requestName']."\nFunction: ".$_GET['functionName']);
        $status = $workflowData->action_status == "W/Flow" ? "Trigger: ".$workflowData->action_trigger : "Outcome: ".$workflowData->action_outcome;
        $action_notify = isset($workflowData->action_notify) ? $workflowData->action_notify : "";
        $workflow->addNode($workflowData->position_no, "1", $workflowData->action_status, $workflowData->action_name."\nDue: ".$workflowData->due_date."\nStatus: ".$workflowData->action_status."\n".$status."\nOfficer: ".$workflowData->officer_name."\nNotification: ".$action_notify);
        
    }
}
$workflow->render();

?>