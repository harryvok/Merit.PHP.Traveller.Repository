<?php
// If a request ID has been selected,select it from the sr_web_input table
$action_id = strip_tags($_GET['id']);
$GLOBALS['id'] = strip_tags($_GET['id']);
if(isset($_GET['ex'])){ $ex = strip_tags($_GET['ex']); }
if(isset($_GET['filter'])){ $filter = strip_tags($_GET['filter']); }
$_SESSION['act_back_filter'] = $filter;
if(isset($_GET['d'])){ $_SESSION["act"] = strip_tags($_GET['d']); } else { $_SESSION["act"] = "";}
if(isset($_GET['addAction'])){ $_SESSION["addAct"] = strip_tags($_GET['addAction']); } else { $_SESSION["addAct"] = "";}
?>

<div data-role="page" id="view-action">
  <div data-role="header" data-tap-toggle="false" data-position="fixed">
  	<?php if(!isset($_GET['d'])){ ?><a href="<?php echo $_SESSION['backLink']; ?>" data-role="button" data-icon="arrow-l" data-theme="a" data-transition="fade" data-iconpos="notext">Back</a>
     <?php } else { ?><a href="index.php?page=view-action&id=<?php echo $action_id; ?>" data-role="button" data-icon="arrow-l" data-theme="a" data-transition="fade" data-iconpos="notext">Back</a><?php } ?>
      <h1>View Action</h1>
      <a href="#actionPanel" class="iphone" data-role="button" data-icon="bars" data-iconpos="notext">Menu</a>
  </div>
  <div data-role="content">    
    <div class="content-primary">
  	<div data-role="popup" id="popup" class="ui-corner-all photopopup" data-overlay-theme="a" data-theme="c"  data-tolerance="15,15" data-rel="back">
    		<a href="#" data-rel="back" data-role="button" data-theme="a" data-icon="delete" data-iconpos="notext" class="ui-btn-right">Close</a>
            <div data-role="content" class="ui-corner-bottom ui-content">
          <div id="popupContent">
          
          </div>
          </div>
     </div>
		<?php
        include("mobile/page.output.php");
        include_once("model.php");  
        
        $model = new Model();  
        $dev = new Mobile_Detect();
        if($dev->isTablet() || $dev->isMobile()){
            
            if($dev->isAndroidOS() || $dev->isBlackBerryOS() || $dev->isWindowsMobileOS() || $dev->isPalmOS() || $dev->isSymbianOS() || $dev->isWindowsMobileOS() || $dev->isJavaOS() || $dev->isNokiaOS() || $dev->iswebOS() || $dev->isBREWOS() || $dev->isbadaOS()){
                $GLOBALS['mobile_browser'] = 2;
                $device ="mobile";
                $supportedOS = true;
            }
            elseif($dev->isiOS()){	
                $GLOBALS['mobile_browser'] = 1;
                $_SESSION['ios'] = 1;
                $device="mobile";
                $versionOS = preg_replace("/(.*) OS ([0-9]*)_(.*)/","$2", $_SERVER['HTTP_USER_AGENT']);
                if($versionOS > 4){
                    $supportedOS = true;
                    
                }
                else{
                    $supportedOS =  false;
                }
            }
        }
        else{
            $GLOBALS['mobile_browser'] = 0;
            $device="pc";	
        }
        // $GLOBALS['mobile_browser'] = 1;
        // $this->device="mobile";

        /* Role Security */
        if(isset($_SESSION['user_id'])){
            if(!isset($_SESSION['roleSecurity'])) $_SESSION['roleSecurity'] = Get("RoleSecurity");
            if(!isset($_SESSION['roleSecurityArray']))$_SESSION['roleSecurityArray'] = array(
            // New Request Security
                "newRequest" => $_SESSION['roleSecurity']->maint_new_request,
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
                "RequestsCreated" => $_SESSION['roleSecurity']->maint_new_request,
                "BookingStartStop" => $_SESSION['roleSecurity']->maint_new_request,
            // Action Security
                "Action"=> $_SESSION['roleSecurity']->view_action,
                "viewaction"=> $_SESSION['roleSecurity']->view_action,
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
                "viewrequest"=> $_SESSION['roleSecurity']->view_request,
            // Name Security
                "Name"=> $_SESSION['roleSecurity']->view_name,
                "viewname"=> $_SESSION['roleSecurity']->view_name,
                "NameRequests"=> $_SESSION['roleSecurity']->view_name,
                "NameAddresses"=> $_SESSION['roleSecurity']->view_name,
                "NameChanges"=> $_SESSION['roleSecurity']->view_name,
                "Officer"=> $_SESSION['roleSecurity']->view_name,
                "viewofficer"=> $_SESSION['roleSecurity']->view_name,
            // Address Security
                "Address"=> $_SESSION['roleSecurity']->view_address,
                "viewaddress"=> $_SESSION['roleSecurity']->view_address,
                "AddressRequests"=> $_SESSION['roleSecurity']->view_address,
                "AddressNames"=> $_SESSION['roleSecurity']->view_address,
                "AddressAssociations"=>  array($_SESSION['roleSecurity']->view_property, $_SESSION['roleSecurity']->view_address),
                "AddressAliases"=>  array($_SESSION['roleSecurity']->view_property, $_SESSION['roleSecurity']->view_address),
                "AddressAttributes"=>  array($_SESSION['roleSecurity']->view_property, $_SESSION['roleSecurity']->view_address),
            // Other Security
                "Search"=> $_SESSION['roleSecurity']->allow_search,
                "ChangePassword"=> $_SESSION['roleSecurity']->allow_cpwd,
                "modifySettings"=> $_SESSION['roleSecurity']->allow_settings,
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

        $parameters = new stdClass();
        $parameters->user_id = $_SESSION['user_id'];
        $parameters->password = $_SESSION['password'];
        $parameters->action_id = $_GET['id'];
        $actionData= $model->WebService(MERIT_ACTION_FILE, "ws_get_action_details", $parameters);

        $parameters_r = new stdClass();
        $parameters_r->user_id = $_SESSION['user_id'];
        $parameters_r->password = $_SESSION['password'];
        $parameters_r->request_id = $actionData->request_id;
        $requestData = $model->WebService(MERIT_REQUEST_FILE, "ws_get_request_details", $parameters_r);
        
		Display("Action", "ActionHeader",$model,$device,$actionData, $requestData);
		if(isset($_GET['d']) && $_GET['d'] == "summary" || !isset($_GET['d'])){
			Display("Action", "Action",$model,$device,$actionData, $requestData);
		}
		if(isset($_GET['d']) && $_GET['d'] == "udfs"){
			Display("RequestUDFs", "ActionUDFs",$model,$device,$actionData, $requestData, $GLOBALS['request_id']);		
		}
		if(isset($_GET['d']) && $_GET['d'] == "modify-udfs"){
			Display("RequestUDFs", "ModifyUDFs",$model,$device,$actionData, $requestData, $GLOBALS['request_id']);			
		}
		if(isset($_GET['d']) && $_GET['d'] == "modify-act-udfs"){
			Display("RequestUDFs", "ModifyActionUDFs",$model,$device,$actionData, $requestData, $GLOBALS['request_id']);	
		}
		if(isset($_GET['d']) && $_GET['d'] == "ca"){
			Display("Comments", "ActionComments",$model,$device,$actionData, $requestData);
			Display("Attachments", "ActionAttachments",$model,$device,$actionData, $requestData);
		}
		if(isset($_GET['d']) && $_GET['d'] == "reassign"){
			Display("ActionReassign", "ActionReassign",$model,$device,$actionData, $requestData);
		}
		if(isset($_GET['d']) && $_GET['d'] == "complete"){
			Display("ActionComplete", "ActionComplete",$model,$device,$actionData, $requestData);
		}
        if(isset($_GET['d']) && $_GET['d'] == "options"){
            Display("Options", "ActionOptions",$model,$device,$actionData, $requestData);
        }
        if(isset($_GET['d']) && $_GET['d'] == "reopenAction"){
            Display("ActionReopen", "ActionReopen",$model,$device,$actionData, $requestData);
        }
        if(isset($_GET['d']) && $_GET['d'] == "deleteAction"){
            Display("ActionDelete", "ActionDelete",$model,$device,$actionData, $requestData);
        }
        if(isset($_GET['d']) && $_GET['d'] == "audit"){
            Display("Audit", "Audit",$model,$device,$actionData, $requestData,"A");
        }
        if(isset($_GET['d']) && $_GET['d'] == "notifications"){
            Display("ActionNotifications", "ActionNotifications",$model,$device,$actionData, $requestData);
        }
        if(isset($_GET['d']) && $_GET['d'] == "documents"){
            Display("ActionDocuments", "ActionDocuments",$model,$device,$actionData, $requestData);
        }
        
        function Display($action, $view, $model, $device,$actionData, $requestData, $params = NULL){
            $GLOBALS['action'] = $action;
            if(isset($_SESSION['roleSecurityArray'][$action]) && is_array($_SESSION['roleSecurityArray'][$action])){
                $ok = 1;
                foreach($_SESSION['roleSecurityArray'][$action] as $var){
                    if($var == "N"){
                        $ok = 0;
                    }
                }
                if($ok == 1){
                    if($action=="Action"){
                        $parameters_udf = new stdClass();
                        $parameters_udf->user_id = $_SESSION['user_id'];
                        $parameters_udf->password = $_SESSION['password'];
                        $parameters_udf->request_id = $requestData->request_id;
                        $result_udf = $model->WebService(MERIT_REQUEST_FILE,"ws_get_request_udfs",$parameters_udf)->udf_dets;
                        $GLOBALS['result'] = array("action" => $actionData, "request" => $requestData, "udfs" =>$result_udf);
                    }else if($action=="RequestUDFs"){
                        $parameters_udf = new stdClass();
                        $parameters_udf->user_id = $_SESSION['user_id'];
                        $parameters_udf->password = $_SESSION['password'];
                        $parameters_udf->request_id = $requestData->request_id;
                        $result_udf = $model->WebService(MERIT_REQUEST_FILE,"ws_get_request_udfs",$parameters_udf)->udf_dets;
                        $GLOBALS['result'] = array("udfs" => $result_udf, "request" => $requestData);
                    }else if($action=="Comments"){
                        $id = $requestData->request_id;
                        $parameters_c = new stdClass();
                        $parameters_c->user_id = $_SESSION['user_id'];
                        $parameters_c->password = $_SESSION['password'];
                        $parameters_c->request_id = $id;
                        $result_c = $model->WebService(MERIT_REQUEST_FILE, "ws_get_request_comments", $parameters_c)->req_remark_dets;
                        $GLOBALS['request_id'] = $id;
                        $GLOBALS['result']= $result_c;
                    }else if($action == "Attachments"){
                        $id = $requestData->request_id;
                        $parameters_at = new stdClass();
                        $parameters_at->user_id = $_SESSION['user_id'];
                        $parameters_at->password = $_SESSION['password'];
                        $parameters_at->request_id = $id;
                        $result_at = $model->WebService(MERIT_REQUEST_FILE, "ws_get_request_attach", $parameters_at)->req_remark_dets;
                        $GLOBALS['request_id'] = $id;
                        $GLOBALS['result'] = $result_at;
                    }else if($action == "ActionReassign"){
                        $GLOBALS['action_officer_code'] = $actionData->action_officer_code;
                        $result_o = $model->getSpecificOfficer();
                        $GLOBALS['result'] =  array("action" => $actionData, "officer" => $result_o);
                    }else if($action == "ActionDocuments"){
                        $parameters = new stdClass();
                        $parameters->user_id = $_SESSION['user_id'];
                        $parameters->password = $_SESSION['password'];
                        $result = $model->WebService(MERIT_TRAVELLER_FILE, "ws_edms_available", $parameters);
                        $rere = $result->ws_status;
                        if($result->ws_status != "0")
                            $GLOBALS['result']= array("action" => $actionData, "request" => $requestData, "errorConnecting" => true);
                        else{
                            $parameters = new stdClass();
                            $parameters->user_id = $_SESSION['user_id'];
                            $parameters->password = $_SESSION['password'];
                            $parameters->request_id =$_SESSION['request_id'];
                            $result = $model->WebService(MERIT_TRAVELLER_FILE, "ws_get_edms_links", $parameters)->doc_dets;
                            $GLOBALS['result']= array("action" => $actionData, "request" => $requestData, "docdets" => $result);
                        }
                    }else if($action == "ActionComplete"){
                        $parameters_out = new stdClass();
                        $parameters_out->user_id = $_SESSION['user_id'];
                        $parameters_out->password = $_SESSION['password'];
                        $parameters_out->request_id =$_SESSION['request_id'];
                        $parameters_out->action_id =$_GET['id'];
                        $result_out = $model->WebService(MERIT_ACTION_FILE, "ws_get_action_completed", $parameters_out);
                        //$result_udfs = $model->getRequestUDFs($_SESSION['request_id']);
                        $GLOBALS['result'] = array("action"=>$actionData ,"outcomes" => $result_out/*, "udfs" => $result_udfs['udfs']*/);
                        
                        
                    }
                    else
                        $GLOBALS['result'] = $model->{"get".$action}($params);
                    
                    $temp = "framework/view/".$device."/view.".$device.".".$view.".php";
                    include("framework/view/".$device."/view.".$device.".".$view.".php"); 
                }
                else{
                    if($device == "mobile"){
                        if(!in_array($action, $_SESSION['roleSecurityErrorArray'])){
                            if(!isset($GLOBALS['roleSecurityShown'])){
                                include("framework/view/".$device."/view.".$device.".RoleSecurity.php"); 
                                $GLOBALS['roleSecurityShown'] = true;
                            }
                        }
                    }
                    else{
                        if(!isset($GLOBALS['roleSecurityShown'])){
                            include("framework/view/".$this->device."/view.".$this->device.".RoleSecurity.php"); 
                            $GLOBALS['roleSecurityShown'] = true;
                        }
                    }
                }
            }
            else{
                if(isset($_SESSION['roleSecurityArray'][$action]) && $_SESSION['roleSecurityArray'][$action] == "Y" || !isset($_SESSION['roleSecurityArray'][$action])){
                    if($action=="Action"){
                        $parameters_udf->user_id = $_SESSION['user_id'];
                        $parameters_udf->password = $_SESSION['password'];
                        $parameters_udf->request_id = $requestData->request_id;
                        $result_udf = $model->WebService(MERIT_REQUEST_FILE,"ws_get_request_udfs",$parameters_udf)->udf_dets;
                        $GLOBALS['result'] = array("action" => $actionData, "request" => $requestData, "udfs" => $result_udf);
                    }else if($action=="RequestUDFs"){
                        $parameters_udf = new stdClass();
                        $parameters_udf->user_id = $_SESSION['user_id'];
                        $parameters_udf->password = $_SESSION['password'];
                        $parameters_udf->request_id = $requestData->request_id;
                        $result_udf = $model->WebService(MERIT_REQUEST_FILE,"ws_get_request_udfs",$parameters_udf)->udf_dets;
                        $GLOBALS['result'] = array("udfs" => $result_udf, "request" => $requestData);
                    }else if($action=="Comments"){
                        $id = $requestData->request_id;
                        $parameters_c = new stdClass();
                        $parameters_c->user_id = $_SESSION['user_id'];
                        $parameters_c->password = $_SESSION['password'];
                        $parameters_c->request_id = $id;
                        $result_c = $model->WebService(MERIT_REQUEST_FILE, "ws_get_request_comments", $parameters_c)->req_remark_dets;
                        $GLOBALS['request_id'] = $id;
                        $GLOBALS['result']= $result_c;
                    }else if($action == "Attachments"){
                        $id = $requestData->request_id;
                        $parameters_at = new stdClass();
                        $parameters_at->user_id = $_SESSION['user_id'];
                        $parameters_at->password = $_SESSION['password'];
                        $parameters_at->request_id = $id;
                        $result_at = $model->WebService(MERIT_REQUEST_FILE, "ws_get_request_attach", $parameters_at)->req_remark_dets;
                        $GLOBALS['request_id'] = $id;
                        $GLOBALS['result'] = $result_at;
                    }else if($action == "ActionReassign"){
                        $GLOBALS['action_officer_code'] = $actionData->action_officer_code;
                        $result_o = $model->getSpecificOfficer();
                        $GLOBALS['result'] =  array("action" => $actionData, "officer" => $result_o);
                    }else if($action == "ActionDocuments"){
                        $parameters = new stdClass();
                        $parameters->user_id = $_SESSION['user_id'];
                        $parameters->password = $_SESSION['password'];
                        $result = $model->WebService(MERIT_TRAVELLER_FILE, "ws_edms_available", $parameters);
                        $rere = $result->ws_status;
                        if($result->ws_status != "0")
                            $GLOBALS['result']= array("action" => $actionData, "request" => $requestData, "errorConnecting" => true);
                        else{
                            $parameters = new stdClass();
                            $parameters->user_id = $_SESSION['user_id'];
                            $parameters->password = $_SESSION['password'];
                            $parameters->request_id =$_SESSION['request_id'];
                            $result = $model->WebService(MERIT_TRAVELLER_FILE, "ws_get_edms_links", $parameters)->doc_dets;
                            $GLOBALS['result']= array("action" => $actionData, "request" => $requestData, "docdets" => $result);
                        }
                    }else if($action == "ActionComplete"){
                        $parameters_out = new stdClass();
                        $parameters_out->user_id = $_SESSION['user_id'];
                        $parameters_out->password = $_SESSION['password'];
                        $parameters_out->request_id =$_SESSION['request_id'];
                        $parameters_out->action_id =$_GET['id'];
                        $result_out = $model->WebService(MERIT_ACTION_FILE, "ws_get_action_completed", $parameters_out);
                        $GLOBALS['result'] = array("outcomes" => $result_out);
                    }
                    else
                        $GLOBALS['result'] = $model->{"get".$action}($params);
                    
                    $temp = "framework/view/".$device."/view.".$device.".".$view.".php";
                    include("framework/view/".$device."/view.".$device.".".$view.".php"); 
                }
                else{
                    if($device == "mobile"){
                        if(!in_array($action, $_SESSION['roleSecurityErrorArray'])){
                            if(!isset($GLOBALS['roleSecurityShown'])){
                                include("framework/view/".$device."/view.".$device.".RoleSecurity.php"); 
                                $GLOBALS['roleSecurityShown'] = true;
                            }
                        }
                    }
                    else{
                        if(!isset($GLOBALS['roleSecurityShown'])){
                            include("framework/view/".$device."/view.".$device.".RoleSecurity.php"); 
                            $GLOBALS['roleSecurityShown'] = true;
                        }
                    }
                }
            }
        }
        ?>
	</div>
    <div class="content-secondary">
        <?php $controller->Sidebar("viewaction", "ipad"); ?>        
    </div>
    <div class="iphone" data-role="panel" id="actionPanel" data-position="right" data-display="overlay" data-dismissible="true" data-theme="b">
        <h3>Menu</h3>
        <p>
        <?php $controller->Sidebar("viewaction"); ?>
    </div>
    </div>

