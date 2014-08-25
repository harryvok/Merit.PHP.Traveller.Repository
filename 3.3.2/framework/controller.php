<?php
include('settings.php');
include('functions.php');
include_once("model.php");  
include_once("mobile.php");

class Controller {  
     public $model;   
	 public $device;
	 public $ios;
	 public $roleSecurity;
     public $supportedOS;
	 
	 // Constructor
     public function __construct()  
     {  
			
			
          $this->model = new Model();  
		  $dev = new Mobile_Detect();
		  if($dev->isTablet() || $dev->isMobile()){
              if($dev->isAndroidOS() || $dev->isBlackBerryOS() || $dev->isWindowsMobileOS() || $dev->isPalmOS() || $dev->isSymbianOS() || $dev->isWindowsMobileOS() || $dev->isJavaOS() || $dev->isNokiaOS() || $dev->iswebOS() || $dev->isBREWOS() || $dev->isbadaOS()){
				$GLOBALS['mobile_browser'] = 2;
				$this->device ="mobile";
                $this->supportedOS = true;
			}
			elseif($dev->isiOS()){	
				$GLOBALS['mobile_browser'] = 1;
				$_SESSION['ios'] = 1;
				$this->device="mobile";
                $versionOS = preg_replace("/(.*) OS ([0-9]*)_(.*)/","$2", $_SERVER['HTTP_USER_AGENT']);
                if($versionOS > 4){
                    $this->supportedOS = true;
                   
                }
                else{
                    $this->supportedOS =  false;
                }
			}
		}
		else{
			$GLOBALS['mobile_browser'] = 0;
			$this->device="pc";	
		}
	//$GLOBALS['mobile_browser'] = 1;

				//$this->device="mobile";
				
		/* Role Security */
		if(isset($_COOKIE['user_id'])){
			if(!isset($_SESSION['roleSecurity'])) $_SESSION['roleSecurity'] = $this->Get("RoleSecurity");
			if(!isset($_SESSION['roleSecurityArray']))$_SESSION['roleSecurityArray'] = array(
			// New Request Security
				"NewRequest" => $_SESSION['roleSecurity']->maint_new_request,
				"CreateRequest" => $_SESSION['roleSecurity']->maint_new_request,
				"ServiceTypes" => $_SESSION['roleSecurity']->maint_new_request,
				"RequestTypes" => $_SESSION['roleSecurity']->maint_new_request,
				"FunctionTypes" => $_SESSION['roleSecurity']->maint_new_request,
                "Priorities" => $_SESSION['roleSecurity']->maint_priority,
				"CountOnly" => $_SESSION['roleSecurity']->maint_new_request,
				"CheckAdhocOfficer" => $_SESSION['roleSecurity']->maint_new_request,
				"NewRequest" => $_SESSION['roleSecurity']->maint_new_request,
				"Streets" => $_SESSION['roleSecurity']->maint_new_request,
				"StreetTypes" => $_SESSION['roleSecurity']->maint_new_request,
				"Suburbs" => $_SESSION['roleSecurity']->maint_new_request,
				"NameLookup" => $_SESSION['roleSecurity']->maint_new_request,
				"FacilitiesLookup" => $_SESSION['roleSecurity']->maint_new_request,
				"KeywordSearch" => $_SESSION['roleSecurity']->maint_new_request,
				"KeywordList" => $_SESSION['roleSecurity']->maint_new_request,
				"AddressLookup" => $_SESSION['roleSecurity']->maint_new_request,
			// Action Security
				"Action"=> $_SESSION['roleSecurity']->view_action,
				"view-action"=> $_SESSION['roleSecurity']->view_action,
				"ActionUDFs" => $_SESSION['roleSecurity']->maint_udf,
				"ActionComments"=> array($_SESSION['roleSecurity']->maint_comment, $_SESSION['roleSecurity']->view_action),
				"ActionAttachments"=> array($_SESSION['roleSecurity']->maint_attachment, $_SESSION['roleSecurity']->view_action),
				"ActionComplete" => array($_SESSION['roleSecurity']->maint_comp_action, $_SESSION['roleSecurity']->view_action),
				"CompleteAction" => array($_SESSION['roleSecurity']->maint_comp_action, $_SESSION['roleSecurity']->view_action),
				"ActionReassign" => array($_SESSION['roleSecurity']->maint_reassign_action, $_SESSION['roleSecurity']->view_action),
				"ReassignAction" => array($_SESSION['roleSecurity']->maint_reassign_action, $_SESSION['roleSecurity']->view_action),
				"ModifyActionUDFs" => array($_SESSION['roleSecurity']->maint_udf, $_SESSION['roleSecurity']->view_action),
				"EditActionUDFs" => array($_SESSION['roleSecurity']->maint_udf, $_SESSION['roleSecurity']->view_action),
			// Request Security
				"Request"=> $_SESSION['roleSecurity']->view_request,
				"RequestActions"=> $_SESSION['roleSecurity']->view_request,
				"AddAction" => array($_SESSION['roleSecurity']->maint_new_action, $_SESSION['roleSecurity']->view_request),
				"RequestComments"=> array($_SESSION['roleSecurity']->maint_comment, $_SESSION['roleSecurity']->view_request),
				"RequestAttachments"=> array($_SESSION['roleSecurity']->maint_attachment, $_SESSION['roleSecurity']->view_request),
				"RequestUDFs" => $_SESSION['roleSecurity']->maint_udf,
				"ModifyUDFs" => $_SESSION['roleSecurity']->maint_udf,
				"EditUDFs" => $_SESSION['roleSecurity']->maint_udf,
				"view-request"=> $_SESSION['roleSecurity']->view_request,
			// Name Security
				"Name"=> $_SESSION['roleSecurity']->view_name,
				"view-name"=> $_SESSION['roleSecurity']->view_name,
				"NameRequests"=> $_SESSION['roleSecurity']->view_name,
				"NameAddresses"=> $_SESSION['roleSecurity']->view_name,
				"NameChanges"=> $_SESSION['roleSecurity']->view_name,
				"OfficerSummary"=> $_SESSION['roleSecurity']->view_name,
				"view-officer"=> $_SESSION['roleSecurity']->view_name,
			// Address Security
				"Address"=> $_SESSION['roleSecurity']->view_address,
				"view-address"=> $_SESSION['roleSecurity']->view_address,
				"AddressRequests"=> $_SESSION['roleSecurity']->view_address,
				"AddressNames"=> $_SESSION['roleSecurity']->view_address,
				"AddressAssociations"=>  array($_SESSION['roleSecurity']->view_property, $_SESSION['roleSecurity']->view_address),
				"AddressAliases"=>  array($_SESSION['roleSecurity']->view_property, $_SESSION['roleSecurity']->view_address),
				"AddressAttributes"=>  array($_SESSION['roleSecurity']->view_property, $_SESSION['roleSecurity']->view_address),
			// Other Security
				"Search"=> $_SESSION['roleSecurity']->allow_search,
				"ChangePassword"=> $_SESSION['roleSecurity']->allow_cpwd,
			// Intray Security
				"ActionIntray"=> $_SESSION['roleSecurity']->allow_action,
				"ActionFilters"=> $_SESSION['roleSecurity']->allow_action,
				"RequestIntray"=> $_SESSION['roleSecurity']->allow_request,
				"RequestFilters"=> $_SESSION['roleSecurity']->allow_request,
				);
			if(!isset($_SESSION['roleSecurityErrorArray']))$_SESSION['roleSecurityErrorArray'] = array(
				"ActionComplete",
				"ActionReassign",
				"RequestUDFs",
				"ActionUDFs",
				"ActionComments",
				"ActionAttachments",
				"RequestComments",
				"RequestAttachments",
				"NameRequests",
				"NameAddresses",
				"AddressAssociations",
				"AddressAliases",
				"AddressAttributes",
				"ActionFilters",
				"RequestFilters",
				);
		
		
		/* --- */
		}
     }   
	 
	 // Display Function
  	 public function Invoke($action){
           $GLOBALS['action'] = $action;
		 if(isset($_SESSION['roleSecurityArray'][$action]) && is_array($_SESSION['roleSecurityArray'][$action])){
			 $ok = 1;
			 foreach($_SESSION['roleSecurityArray'][$action] as $var){
				if($var == "N"){
					$ok = 0;
				}
			 }
			 if($ok == 1){
				 $GLOBALS['result'] = $this->model->{"get".$action}();
				include("view/".$this->device."/view.".$this->device.".".$action.".php"); 
			 }
			 else{
				 if($this->device == "mobile"){
					if(!in_array($action, $_SESSION['roleSecurityErrorArray'])){
						if(!isset($GLOBALS['roleSecurityShown'])){
							include("view/".$this->device."/view.".$this->device.".RoleSecurity.php"); 
							$GLOBALS['roleSecurityShown'] = true;
						}
					}
				}
				else{
					if(!isset($GLOBALS['roleSecurityShown'])){
						include("view/".$this->device."/view.".$this->device.".RoleSecurity.php"); 
						$GLOBALS['roleSecurityShown'] = true;
					}
				}
			 }
		 }
		 else{
			if(isset($_SESSION['roleSecurityArray'][$action]) && $_SESSION['roleSecurityArray'][$action] == "Y" || !isset($_SESSION['roleSecurityArray'][$action])){
				$GLOBALS['result'] = $this->model->{"get".$action}();
				include("view/".$this->device."/view.".$this->device.".".$action.".php"); 
			}
			else{
				if($this->device == "mobile"){
					if(!in_array($action, $_SESSION['roleSecurityErrorArray'])){
						if(!isset($GLOBALS['roleSecurityShown'])){
							include("view/".$this->device."/view.".$this->device.".RoleSecurity.php"); 
							$GLOBALS['roleSecurityShown'] = true;
						}
					}
				}
				else{
					if(!isset($GLOBALS['roleSecurityShown'])){
						include("view/".$this->device."/view.".$this->device.".RoleSecurity.php"); 
						$GLOBALS['roleSecurityShown'] = true;
					}
				}
			}
		 }
	 }
	 
	 // Display Dropdown Function
	 public function Dropdown($action){
		 if(isset($_SESSION['roleSecurityArray'][$action]) && is_array($_SESSION['roleSecurityArray'][$action])){
			 $ok = 1;
			 foreach($_SESSION['roleSecurityArray'][$action] as $var){
				if($var == "N"){
					$ok = 0;
				}
			 }
			 if($ok == 1){
				 $GLOBALS['result'] = $this->model->{"get".$action}();
				include("view/".$this->device."/dropdown/view.".$this->device.".".$action.".php");
			 }
		 }
		 else{
			if(isset($_SESSION['roleSecurityArray'][$action]) && $_SESSION['roleSecurityArray'][$action] == "Y" || !isset($_SESSION['roleSecurityArray'][$action])){
				$GLOBALS['result'] = $this->model->{"get".$action}();
				include("view/".$this->device."/dropdown/view.".$this->device.".".$action.".php"); 
			}
		 }
	 }
	 
	 // Get Data
	 public function Get($action){
		return $GLOBALS['result'] = $this->model->{"get".$action}();
	 }
	 
	 // Sidebar
	 public function Sidebar($action){
		 if(isset($_SESSION['roleSecurityArray'][$action]) && is_array($_SESSION['roleSecurityArray'][$action])){
			 $ok = 1;
			 foreach($_SESSION['roleSecurityArray'][$action] as $var){
				if($var == "N"){
					$ok = 0;
				}
			 }
			 if($ok == 1){
				 if(stristr($action, "view")){
					$GLOBALS['result'] = $this->model->{"sidebar".str_ireplace("-","",$action)}();
					include("view/".$this->device."/sidebar/view.sidebar.".$action.".php"); 
				 }
			 }
		 }
		 else{
			 if(isset($_SESSION['roleSecurityArray'][$action]) && $_SESSION['roleSecurityArray'][$action] == "Y" || !isset($_SESSION['roleSecurityArray'][$action])){
				 if(stristr($action, "view")){
					$GLOBALS['result'] = $this->model->{"sidebar".str_ireplace("-","",$action)}();
					include("view/".$this->device."/sidebar/view.sidebar.".$action.".php"); 
				 }
			 }
		 }
	 }
	 
	// Process function
	 public function Process($action)
	 {
		  if(isset($_SESSION['roleSecurityArray'][$action]) && is_array($_SESSION['roleSecurityArray'][$action])){
			 $ok = 1;
			 foreach($_SESSION['roleSecurityArray'][$action] as $var){
				if($var == "N"){
					$ok = 0;
				}
			 }
			 if($ok == 1){
				 $result = $this->model->{"process".$action}();	
				header("Location: ".$_SESSION['redirect']); 
			 }
		 }
		 else{
			if(isset($_SESSION['roleSecurityArray'][$action]) && $_SESSION['roleSecurityArray'][$action] == "Y" || !isset($_SESSION['roleSecurityArray'][$action])){
				$result = $this->model->{"process".$action}();	
				header("Location: ".$_SESSION['redirect']);
			}
			else{
				$_SESSION['error'] = 1;
				$_SESSION['done'] = 1;
				$_SESSION['error_role_security'] = 1;
				header("Location: index.php");	
			}
		 }
	 }
	 
	 // Login function
	 public function Login(){
		$result = $this->model->processLogin();	
		header("Location: ".$_SESSION['redirect']);
	 }
	 
	 // Generic Web Service
	 public function WebService($file, $web_service, $parameters){
		$this->model->WebService($file,$web_service,$parameters); 
	 }
}  
?>