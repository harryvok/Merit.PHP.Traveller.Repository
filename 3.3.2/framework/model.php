<?php
class Model { 

	/* Generic functions */
	
		public function Remember(){
			foreach($_POST as $name => $data){
				$_SESSION["rem_".$name] = $data;	
			}
		}
		
		public function Forget(){
			foreach($_SESSION as $var => $data){
				if(stristr($var, "rem_")){
					unset($_SESSION[$var]);	
				}
			}	
		}
		
		public function WebService($file, $web_service, $parameters){
            if(defined("WEB_SERVICES_PATH")){
                try{
                    $wsdl = WEB_SERVICES_PATH.$file."?wsdl";
                    $client = new SoapClient ($wsdl, array('cache_wsdl' => WSDL_CACHE_NONE) );
                    $result = $client->{$web_service}($parameters)->{$web_service."Result"};
                    return $result;
                }
                catch(Exception $e){
                    $_SESSION['redirect'] = "index.php";
                    $_SESSION['done'] = 1;
                    $_SESSION['error'] = 1;
                    $_SESSION['error_web_service'] = 1;
                    $_SESSION['custom_error'] = $e->getMessage();
                    header("Location: index.php");
                    die();
                }
            }
		}
	
	/* */
	
	/* Sidebars */
	
		public function sidebarViewAction(){
				
		}
		
		public function sidebarViewRequest(){
				
		}
		
		public function sidebarViewOfficer(){
				
		}
		
		public function sidebarViewName(){
				
		}
		
		public function sidebarViewAnimal(){
				
		}
		public function sidebarViewAddress(){
				
		}
	
	/* */
	
	/* Actions */
	
		public function getActionFilters(){
			$filter = $this->getDefaultFilter("A");
			
			$parameters_fi = new stdClass();
			$parameters_fi->user_id = $_COOKIE['user_id'];
			$parameters_fi->password = $_COOKIE['password'];
			$parameters_fi->filter_type = "action";
			$result_fi = $this->WebService(MERIT_ACTION_FILE, "ws_get_officer_filters", $parameters_fi)->filter_det;
			
			$result_array = array("Default" => $filter, "Array" => $result_fi);
			return $result_array;
		}
		
		public function getDefaultFilter($l){
			$parameters_dfi = new stdClass();
			$parameters_dfi->user_id = $_COOKIE['user_id'];
			$parameters_dfi->password = $_COOKIE['password'];
			$parameters_dfi->responsible_code = $_COOKIE['responsible_code'];
			$result_dfi = $this->WebService(MERIT_ADMIN_FILE, "ws_get_user_options", $parameters_dfi)->user_disp;
			$action_dfilter = array();
			
			if(isset($result_dfi->user_display) && count($result_dfi->user_display) > 0){
				foreach($result_dfi->user_display as $action_dfilter){
					if($action_dfilter->window_type == $l){
						$default = $action_dfilter->init_filter_no;
						break;
					}
					
				}
			}
			elseif(isset($result_dfi->user_display) && count($result_dfi->user_display) == 1){
				$action_dfilter = $result_dfi->user_display;
				if($action_dfilter->window_type == $l){	
					$default = $action_dfilter->init_filter_no;
				}
				
			}
			
			if(empty($_GET['filter'])){
				if(isset($default)){
					$filter = $default;	
				}
				else{
					$filter = 0;
				}
			}
			else{
				$filter = $_GET['filter'];	
			}
			
			
			return $filter;	
		}
		
		public function getActionIntray(){
			$filter = $this->getDefaultFilter("A");
			$from_date = (date("o")-20)."-01-"."01T00:00:00.000";
			$to_date = (date("o")+20)."-01-"."01T00:00:00.000";
			$parameters = new stdClass();
			$parameters->user_id = $_COOKIE['user_id'];
			$parameters->password = $_COOKIE['password'];
			$parameters->data_group = $_COOKIE['data_group'];
			$parameters->filter_no = $filter;
			$parameters->from_date = $from_date;
			$parameters->to_date = $to_date;
			$result = $this->WebService(MERIT_ACTION_FILE, "ws_get_action_intray", $parameters)->action_intray_det;
			
			return $result;
		}
	
	/* */
	
	/* Requests */
	
		public function getRequestFilters(){
			$filter = $this->getDefaultFilter("C");
			$parameters_fi = new stdClass();
			$parameters_fi->user_id = $_COOKIE['user_id'];
			$parameters_fi->password = $_COOKIE['password'];
			$parameters_fi->filter_type = "complaint";
			$result_fi = $this->WebService(MERIT_ACTION_FILE, "ws_get_officer_filters", $parameters_fi)->filter_det;
			
			$result_array = array("Default" => $filter, "Array" => $result_fi);
			return $result_array;
		}
		
		public function getRequestIntray(){
			$filter = $this->getDefaultFilter("C");
			$parameters = new stdClass();
			$parameters->user_id = $_COOKIE['user_id'];
			$parameters->password = $_COOKIE['password'];
			$parameters->data_group = $_COOKIE['data_group'];
			$parameters->filter_no = $filter;
			$result = $this->WebService(MERIT_REQUEST_FILE, "ws_get_request_intray", $parameters)->action_intray_det;
			$GLOBALS['default_filter'] = $filter;
			return $result;
		}
	
	/* */
	
	/* New Request */
		
		public function getServiceTypes(){
			$parameters = new stdClass();
			$parameters->user_id = $_COOKIE['user_id'];
			$parameters->password = $_COOKIE['password'];
			$parameters->role = $_COOKIE['security_group'];
			$result = $this->WebService(MERIT_ADMIN_FILE, "ws_get_wb_service_types", $parameters)->service_types_det;
			
			return $result;
		}
		
		public function getRequestTypes(){
			$parameters = new stdClass();
			$parameters->user_id = $_COOKIE['user_id'];
			$parameters->password = $_COOKIE['password'];
			$parameters->role = $_COOKIE['security_group'];
			$result = $this->WebService(MERIT_ADMIN_FILE, "ws_get_wb_request_types", $parameters)->request_types_det;
			
			return $result;
		}
		
		public function getFunctionTypes(){
			$parameters = new stdClass();
			$parameters->user_id = $_COOKIE['user_id'];
			$parameters->password = $_COOKIE['password'];
			$parameters->role = $_COOKIE['security_group'];
			$result = $this->WebService(MERIT_ADMIN_FILE, "ws_get_wb_function_types", $parameters)->function_types_det;
			
			return $result;
		}
        
        public function getPriorities(){
			$parameters = new stdClass();
			$parameters->user_id = $_COOKIE['user_id'];
			$parameters->password = $_COOKIE['password'];
			$result = $this->WebService(MERIT_ADMIN_FILE, "ws_get_priority", $parameters)->priority_det;
			
			return $result;
		}
		
		public function getHelpNotes(){
			if(isset($_GET['service_code']) && strlen($_GET['service_code']) > 0){ $service_code = $_GET['service_code']; } else { $service_code = ''; }
			if(isset($_GET['request_code']) && strlen($_GET['request_code']) > 0){ $request_code = $_GET['request_code']; } else { $request_code = ''; }
			if(isset($_GET['function_code']) && strlen($_GET['function_code']) > 0){ $function_code = $_GET['function_code']; } else { $function_code = ''; }
			$parameters = new stdClass();
			$parameters->user_id = $_COOKIE['user_id'];
			$parameters->password = $_COOKIE['password'];
			$parameters->service = $service_code;
			$parameters->request = $request_code;
			$parameters->func = $function_code;
			$result = $this->WebService(MERIT_ADMIN_FILE, "ws_get_help_notes", $parameters);
			
			return $result;
		}
		
		public function getCountOnly(){
			if(isset($_GET['service_code']) && strlen($_GET['service_code']) > 0){ $service_code = $_GET['service_code']; } else { $service_code = ''; }
			if(isset($_GET['request_code']) && strlen($_GET['request_code']) > 0){ $request_code = $_GET['request_code']; } else { $request_code = ''; }
			if(isset($_GET['function_code']) && strlen($_GET['function_code']) > 0){ $function_code = $_GET['function_code']; } else { $function_code = ''; }
			$parameters = new stdClass();
			$parameters->user_id = $_COOKIE['user_id'];
			$parameters->password = $_COOKIE['password'];
			$parameters->s_code = $service_code;
			$parameters->r_code = $request_code;
			$parameters->f_code = $function_code;
			$result = $this->WebService(MERIT_REQUEST_FILE, "ws_chk_count_only", $parameters);
			
			return $result;
		}
        
        public function getIfWorkflow(){
			if(isset($_GET['service_code']) && strlen($_GET['service_code']) > 0){ $service_code = $_GET['service_code']; } else { $service_code = ''; }
			if(isset($_GET['request_code']) && strlen($_GET['request_code']) > 0){ $request_code = $_GET['request_code']; } else { $request_code = ''; }
			if(isset($_GET['function_code']) && strlen($_GET['function_code']) > 0){ $function_code = $_GET['function_code']; } else { $function_code = ''; }
			$parameters = new stdClass();
			$parameters->user_id = $_COOKIE['user_id'];
			$parameters->password = $_COOKIE['password'];
			$parameters->service = $service_code;
			$parameters->request = $request_code;
			$parameters->func = $function_code;
			$result = $this->WebService(MERIT_ADMIN_FILE, "ws_chk_if_workflow", $parameters);
			
			return $result;
		}
		
		public function getCheckAdhocOfficer(){
			$parameters = new stdClass();
			$parameters->user_id = $_COOKIE['user_id'];
			$parameters->password = $_COOKIE['password'];
			$parameters->s_code = $_POST['ser'];
			$parameters->r_code = $_POST['req'];
			$parameters->f_code = $_POST['func'];
			$result = $this->WebService(MERIT_REQUEST_FILE, "ws_chk_adhoc_officer", $parameters)->officer_det;
			
			return $result;
		}
		
		public function getStreets(){
			$parameters = new stdClass();
			$parameters->user_id = $_COOKIE['user_id'];
			$parameters->password = $_COOKIE['password'];
			$result = $this->WebService(MERIT_ADMIN_FILE, "ws_get_streets", $parameters)->street_det;
			
			return $result;
		}
		public function getCStreets(){
			$result = $this->getStreets();
			return $result;
		}
		
		public function getPartialStreets(){
			$parameters = new stdClass();
			$parameters->user_id = $_COOKIE['user_id'];
			$parameters->password = $_COOKIE['password'];
			$parameters->partial_street = $_GET['term'];
			$result = $this->WebService(MERIT_ADMIN_FILE, "ws_get_partial_street", $parameters)->street_det;
			
			return $result;
		}
		
		public function getStreetTypes(){
			$parameters = new stdClass();
			$parameters->user_id = $_COOKIE['user_id'];
			$parameters->password = $_COOKIE['password'];
			$result = $this->WebService(MERIT_ADMIN_FILE, "ws_get_street_types", $parameters)->street_type_det;
			
			return $result;
		}
		public function getCStreetTypes(){
			$result = $this->getStreetTypes();
			return $result;
		}
		
		public function getPartialStreetTypes(){
			$parameters = new stdClass();
			$parameters->user_id = $_COOKIE['user_id'];
			$parameters->password = $_COOKIE['password'];
			$parameters->street = $_GET['street'];
			$parameters->partial_type = $_GET['term'];
			$result = $this->WebService(MERIT_ADMIN_FILE, "ws_get_partial_street_type", $parameters)->street_type_det;
			
			return $result;
		}
		
		public function getSuburbs(){
			$parameters = new stdClass();
			$parameters->user_id = $_COOKIE['user_id'];
			$parameters->password = $_COOKIE['password'];
			$result = $this->WebService(MERIT_ADMIN_FILE, "ws_get_localities", $parameters)->locality_det;
			
			return $result;
		}
		public function getCSuburbs(){
			$result = $this->getSuburbs();
			return $result;
		}
		
		public function getPartialSuburbs(){
			$parameters = new stdClass();
			$parameters->user_id = $_COOKIE['user_id'];
			$parameters->password = $_COOKIE['password'];
			$parameters->house = $_GET['house'];
			$parameters->street = $_GET['street'];
			$parameters->street_type = $_GET['street_type'];
			$parameters->partial_locality = $_GET['term'];
			$result = $this->WebService(MERIT_ADMIN_FILE, "ws_get_partial_locality", $parameters)->locality_det;
			
			return $result;
		}
		
		public function getCustomerTypes(){
			$parameters = new stdClass();
			$parameters->user_id = $_COOKIE['user_id'];
			$parameters->password = $_COOKIE['password'];
			$result = $this->WebService(MERIT_ADMIN_FILE, "ws_get_name_types", $parameters)->name_types_det;
			
			return $result;
		}
		
		public function getNameLookup(){
			if(isset($_POST['surname'])) $surname = $_POST['surname']; else $surname='';
			if(isset($_POST['given'])) $given = $_POST['given']; else $given='';
			if(isset($_POST['pref_title'])) $pref_title = $_POST['pref_title']; else $pref_title='';
			if(isset($_POST['cust_phone'])) $cust_phone = $_POST['cust_phone']; else $cust_phone='';
            if(isset($_POST['cust_work'])) $cust_work = $_POST['cust_work']; else $cust_work='';
			if(isset($_POST['cust_mobile'])) $cust_mobile = $_POST['cust_mobile']; else $cust_mobile='';
			if(isset($_POST['email_address'])) $email_address = $_POST['email_address']; else $email_address='';
			if(isset($_POST['company_name'])) $company_name = $_POST['company_name']; else $company_name='';
            
            if(strlen($cust_phone) > 0){
                $telephone =  $cust_phone;
            }
            elseif(strlen($cust_work) > 0){
                $telephone = $cust_work;   
            }
            elseif(strlen($cust_mobile) > 0){
                $telephone = $cust_mobile;   
            }
			$parameters = array(
			"user_id" => $_COOKIE['user_id'],
			"password" => $_COOKIE['password'],
				"search_param" => array(
					"name_id" => '0',
					"surname" => $surname,
					"given_names" => $given,
					"initials" => '',
					"pref_title" => $pref_title,
					"telephone" => $telephone,
					"work_phone" => '',
					"mobile_no" => '',
					"fax_no" => '',
					"email_address" => $email_address,
					"company_name" => $company_name,
					"name_ctr" => '0',
					"name_origin" => ''
				)
			);
			$parameters = array_to_objecttree($parameters);
           
			$result = $this->WebService(MERIT_TRAVELLER_FILE, "ws_name_lookup", $parameters);
            
			$_SESSION['result'] = $result;
			return $result;
		}
		
		public function getFacilitiesLookup(){
			if(isset($_GET['facilitiesType'])) $facilitiesType = $_GET['facilitiesType']; else $facilitiesType='';
			if(isset($_GET['facilitiesName'])) $facilitiesName = $_GET['facilitiesName']; else $facilitiesName='';
			$parameters = array(
			"user_id" => $_COOKIE['user_id'],
			"password" => $_COOKIE['password'],
            "facility" => $facilitiesName,
            "facility_type" => $facilitiesType,
			);
			$parameters = array_to_objecttree($parameters);
			$result = $this->WebService(MERIT_ADMIN_FILE, "ws_get_partial_facility", $parameters)->facility_det;
			return $result;
		}
        
        public function getFacilitiesTypeLookup(){
			$parameters = array(
			"user_id" => $_COOKIE['user_id'],
			"password" => $_COOKIE['password']
			);
			$parameters = array_to_objecttree($parameters);
			$result = $this->WebService(MERIT_ADMIN_FILE, "ws_get_facility_types", $parameters)->facility_type_det;
			return $result;
		}
		
		public function getKeywordSearch(){
			if(isset($_POST['keyword'])) $keyword = $_POST['keyword']; else $keyword='';
			$parameters = array(
			"user_id" => $_COOKIE['user_id'],
			"password" => $_COOKIE['password'],
			"keyword" => $keyword
			);
			$parameters = array_to_objecttree($parameters);
			$result = $this->WebService(MERIT_ADMIN_FILE, "ws_get_keyword_hits", $parameters)->keyword_result;
			return $result;
		}
		
		public function getKeywordList(){
			$parameters = array(
			"user_id" => $_COOKIE['user_id'],
			"password" => $_COOKIE['password'],
			);
			$parameters = array_to_objecttree($parameters);
			$result = $this->WebService(MERIT_ADMIN_FILE, "ws_get_keyword_list", $parameters)->keyword_det;
			return $result;
		}
		
		public function getOfficerList(){
			return $this->getRequestActionOfficers();
		}
		
		public function getAddressLookup(){
			if(isset($_POST['name_origin'])) $name_origin = $_POST['name_origin']; else $name_origin='';
			if(isset($_POST['name_id'])) $name_id = $_POST['name_id']; else $name_id='';
			if(isset($_POST['name_ctr'])) $name_ctr = $_POST['name_ctr']; else $name_ctr='';
			$parameters = new stdClass();
			$parameters->user_id = $_COOKIE['user_id'];
			$parameters->password = $_COOKIE['password'];
			$parameters->name_origin = $name_origin;
			$parameters->name_id = $name_id;
			$parameters->name_ctr = $name_ctr;
			$result = $this->WebService(MERIT_TRAVELLER_FILE, "ws_address_lookup", $parameters);
			return $result;
		}
		
		public function getSpecificAddress(){
			$parameters = new stdClass();
			$parameters->user_id = $_COOKIE['user_id'];
			$parameters->password = $_COOKIE['password'];
			$parameters->address_id = $GLOBALS['addressId'];
			$result = $this->WebService(MERIT_TRAVELLER_FILE, "ws_get_address_details", $parameters);
			return $result;
		}
	
	/* */
	
	/* View Request */
	
		public function getRequest(){
			if(isset($_GET['id'])) $id = $_GET['id']; 
			elseif(isset($_SESSION['request_id'])) $id = $_SESSION['request_id'];
			elseif(isset($GLOBALS['request_id'])) $id = $GLOBALS['request_id'];
			elseif(isset($_POST['id'])) $id = $_POST['id'];
			
			
			$parameters = new stdClass();
			$parameters->user_id = $_COOKIE['user_id'];
			$parameters->password = $_COOKIE['password'];
			$parameters->request_id = $id;
			$result = $this->WebService(MERIT_REQUEST_FILE, "ws_get_request_details", $parameters);
			return $result;	
		}
		
		public function getRequestHeader(){
			return $this->getRequest();	
		}
		
		public function getRequestCommentOfficer($officer_code){
			$parameters_of = new stdClass();
			  $parameters_of->user_id = $_COOKIE['user_id'];
			  $parameters_of->password = $_COOKIE['password'];
			  $parameters_of->officer_code =  $officer_code;
			  $result_of = $this->WebService(MERIT_TRAVELLER_FILE, "ws_get_officer_summary", $parameters_of)->officer_det;	
			  $officer_name = $result_of->given_names." ".$result_of->surname;	
			  return $officer_name;
		}
		
		public function getRequestComments(){
			if(isset($_SESSION['request_id']) && $_GET['page'] == "view-action"){
				$id = $_SESSION['request_id'];	
			}
			elseif(isset($_GET['id'])){
				$id = $_GET['id'];	
			}
			elseif(isset($_POST['request_id'])){
				$id = $_POST['request_id'];	
			}
			
			$parameters_c = new stdClass();
			$parameters_c->user_id = $_COOKIE['user_id'];
			$parameters_c->password = $_COOKIE['password'];
			$parameters_c->request_id = $id;
			$result_c = $this->WebService(MERIT_REQUEST_FILE, "ws_get_request_comments", $parameters_c)->req_remark_dets;	
			$GLOBALS['request_id'] = $id;
			return $result_c;
		}
		
		public function getRequestAttachments(){
			if(isset($_SESSION['request_id']) && $_GET['page'] == "view-action"){
				$id = $_SESSION['request_id'];	
			}
			elseif(isset($_GET['id'])){
				$id = $_GET['id'];	
			}
			elseif(isset($_POST['request_id'])){
				$id = $_POST['request_id'];	
			}
			$parameters_at = new stdClass();
			$parameters_at->user_id = $_COOKIE['user_id'];
			$parameters_at->password = $_COOKIE['password'];
			$parameters_at->request_id = $id;
			$result_at = $this->WebService(MERIT_REQUEST_FILE, "ws_get_request_attach", $parameters_at)->req_remark_dets;	
			$GLOBALS['request_id'] = $id;
			return $result_at;
		}
		public function getActionComments(){ return $this->getRequestComments(); }
		public function getActionAttachments(){ return $this->getRequestAttachments(); }
		
		public function getRequestUDFs(){
			if(isset($_GET['id'])) $id = $_GET['id'];
			elseif(isset($GLOBALS['request_id'])) $id = $GLOBALS['request_id'];
			elseif(isset($_POST['id'])) $id = $_POST['id'];
			elseif(isset($_POST['request_id'])) $id = $_POST['request_id'];
						
			$parameters_udf = new stdClass();
			$parameters_udf->user_id = $_COOKIE['user_id'];
			$parameters_udf->password = $_COOKIE['password'];
			$parameters_udf->request_id = $id;
			$result_udf = $this->WebService(MERIT_REQUEST_FILE,"ws_get_request_udfs",$parameters_udf)->udf_dets;
			$result_r = $this->getRequest();
			return array("udfs" => $result_udf, "request" => $result_r);
		}
		
		public function getOutcomeUDFs(){
			$id = $_POST['id'];
			$parameters_udf = new stdClass();
			$parameters_udf->user_id = $_COOKIE['user_id'];
			$parameters_udf->password = $_COOKIE['password'];
			$parameters_udf->request_id = $id;
			$result_udf = $this->WebService(MERIT_REQUEST_FILE,"ws_get_request_udfs",$parameters_udf)->udf_dets;
			return $result_udf;
		}
		
		public function getRequestActionOfficers(){
			$parameters_of = new stdClass();
			$parameters_of->user_id = $_COOKIE['user_id'];
			$parameters_of->password = $_COOKIE['password'];
			$result_of = $this->WebService(MERIT_ADMIN_FILE, "ws_get_officers", $parameters_of)->merit_officer_details;
			return $result_of;
		}
		
		public function getRequestActions(){
			$result_a = $this->getRequest();
			if(isset($result_a->function_code)) $func = $result_a->function_code; else $func = '';
			$GLOBALS['service_code'] = $result_a->service_code;	
			$GLOBALS['request_code'] = $result_a->request_code;	
			$GLOBALS['function_code'] = $func;	
			$result_of = $this->getRequestActionOfficers();
			$result_ar = $this->getRequestActionRequired();	
			$result_ovr = $this->getOverrideInd();
			return array("actions" => $result_a, "officers" => $result_of, "actionreq" => $result_ar, "override_ind" => $result_ovr);
		}
		
		public function getRequestActionRequired(){
			$parameters_ar = new stdClass();
			$parameters_ar->user_id = $_COOKIE['user_id'];
			$parameters_ar->password = $_COOKIE['password'];
			$parameters_ar->service = $GLOBALS['service_code'];
			$parameters_ar->request = $GLOBALS['request_code'];
			$parameters_ar->function = $GLOBALS['function_code'];
			$result_ar = $this->WebService(MERIT_ADMIN_FILE, "ws_get_action_required", $parameters_ar)->action_reqd_det;
			return $result_ar;
		}
		
		public function getAddAction(){
			$result = $this->getRequestActions();
			return $result;
		}
		
		public function getModifyUDFs(){
			$result = $this->getRequestUDFs();
			return $result;	
		}
		public function getModifyActionUDFs(){
			$result = $this->getRequestUDFs();
			return $result;	
		}
	
	/* */
	
	/* View Action */
	
		public function getAction(){
			$parameters = new stdClass();
			$parameters->user_id = $_COOKIE['user_id'];
			$parameters->password = $_COOKIE['password'];
			$parameters->action_id = $_GET['id'];
			$result = $this->WebService(MERIT_ACTION_FILE, "ws_get_action_details", $parameters);
			
			$parameters_r = new stdClass();
			$parameters_r->user_id = $_COOKIE['user_id'];
			$parameters_r->password = $_COOKIE['password'];
			$parameters_r->request_id = $result->request_id;
			$result_r = $this->WebService(MERIT_REQUEST_FILE, "ws_get_request_details", $parameters_r);
			
			return array("action" => $result, "request" => $result_r);	
		}
		
		public function getActionHeader(){
			$result = $this->getAction();
			return $result;	
		}
		
		public function getActionOutcomes(){
			$parameters_out = new stdClass();
			$parameters_out->user_id = $_COOKIE['user_id'];
			$parameters_out->password = $_COOKIE['password'];
			$parameters_out->service = $GLOBALS['service_code'];
			$parameters_out->request = $GLOBALS['request_code'];
			$parameters_out->func = $GLOBALS['function_code'];
			$result_out = $this->WebService(MERIT_ADMIN_FILE, "ws_get_action_completed", $parameters_out)->action_completed_det;
			return $result_out;
		}
		
		public function getActionReassign(){
			$result = $this->getAction();
			$GLOBALS['action_officer_code'] = $result['action']->action_officer_code;
			$result_o = $this->getOfficer();
			return array("action" => $result, "officer" => $result_o);	
		}
		
		public function getActionComplete(){
			$result = $this->getAction();
			if(isset($result['request']->function_code)) $func = $result['request']->function_code; else $func = '';
			$GLOBALS['service_code'] = $result['request']->service_code;
			$GLOBALS['request_code'] = $result['request']->request_code;
			$GLOBALS['function_code'] = $func;
			$result_out = $this->getActionOutcomes();
			$result_ovr = $this->getOverrideInd();
			$result_udfs = $this->getRequestUDFs();
			return array("action" => $result, "outcomes" => $result_out, "override_ind" => $result_ovr, "udfs" => $result_udfs['udfs']);
		}
		
		public function getActionUDFs(){
			$parameters_udf = new stdClass();
			$parameters_udf->user_id = $_COOKIE['user_id'];
			$parameters_udf->password = $_COOKIE['password'];
			$parameters_udf->request_id = $_SESSION['request_id'];
			$result_udf = $this->WebService(MERIT_REQUEST_FILE,"ws_get_request_udfs",$parameters_udf)->udf_dets;
			$result_r = $this->getRequest();
			return array("udfs" => $result_udf, "request" => $result_r);
		}
		
		public function getRequestID($action_id){
			$parameters = new stdClass();
			$parameters->user_id = $_COOKIE['user_id'];
			$parameters->password = $_COOKIE['password'];
			$parameters->action_id = $action_id;
			$result = $this->WebService(MERIT_ACTION_FILE, "ws_get_action_details", $parameters);
			return $result->request_id;
		}
	
	/* */
	
	/* Officers */
	
		public function getOfficer(){
			if(isset($GLOBALS['action_officer_code'])){
				$code = $GLOBALS['action_officer_code'];
			}
			elseif(isset($_GET['id'])){
				$code = $_GET['id'];	
			}
			elseif(isset($GLOBALS['officer_id'])){
				$code = $GLOBALS['officer_id'];	
			}
			else{
				$code = $_COOKIE['responsible_code'];	
			}
			
			$parameters_o = new stdClass();
			$parameters_o->user_id = $_COOKIE['user_id'];
			$parameters_o->password = $_COOKIE['password'];
			$parameters_o->responsible_code = $code;
			$result_o = $this->WebService(MERIT_ADMIN_FILE, "ws_get_specific_officer", $parameters_o)->merit_officer_details->officer_details;	
			return $result_o;
		}
		
		public function getOfficerSummary(){
			$parameters_o = new stdClass();
			$parameters_o->user_id = $_COOKIE['user_id'];
			$parameters_o->password = $_COOKIE['password'];
			$parameters_o->officer_code = $_GET['id'];
			$result_o = $this->WebService(MERIT_TRAVELLER_FILE, "ws_get_officer_summary", $parameters_o);	
			return $result_o;
		}
		
		public function getOfficerHeader(){
			return $this->getOfficerSummary()->officer_det;	
		}
		
		public function getOfficerActions(){
			$result = $this->getOfficerSummary();
			return $result;
		}
		
		public function getOfficerRequests(){
			$result = $this->getOfficerSummary();
			return $result;	
		}
		
		public function getOfficers(){
			$parameters_of = new stdClass();
			$parameters_of->user_id = $_COOKIE['user_id'];
			$parameters_of->password = $_COOKIE['password'];
			$result_of = $this->WebService(MERIT_ADMIN_FILE, "ws_get_officers", $parameters_of)->merit_officer_details;
			return $result_of;
		}
		
	/* */
	
	/* View Name */
	
		public function getName(){
			$parameters = new stdClass();
			$parameters->user_id = $_COOKIE['user_id'];
			$parameters->password = $_COOKIE['password'];
            if(isset($_GET['ex'])){ $ex=$_GET['ex']; } else{ $ex=0; }
			if(isset($ex) && $ex==1){
				$parameters->external_id = $_GET['id'];
				$result = $this->WebService(MERIT_TRAVELLER_FILE, "ws_get_external_name", $parameters);
				
				if($result->ws_message = "Name ctr already exists in Merit"){
					unset($parameters->external_id);
					$parameters->name_id = $result->name_id;
					$result = $this->WebService(MERIT_TRAVELLER_FILE, "ws_get_name_details", $parameters);
				}
			}
			else{
				$parameters->name_id = $_GET['id'];
				$result = $this->WebService(MERIT_TRAVELLER_FILE, "ws_get_name_details", $parameters);
			}
			return $result;
		}
		
		public function getNameHeader(){
			return $this->getName();	
		}
		
		public function getNameRequests(){
			$parameters_a = new stdClass();
			$parameters_a->user_id = $_COOKIE['user_id'];
			$parameters_a->password = $_COOKIE['password'];
			$parameters_a->name_id = $_GET['id'];
			$result_a = $this->WebService(MERIT_TRAVELLER_FILE, "ws_get_name_details", $parameters_a)->req_dets;	
			return $result_a;
		}
		
		public function getNameAddresses(){
			$parameters_ad = new stdClass();
			$parameters_ad->user_id = $_COOKIE['user_id'];
			$parameters_ad->password = $_COOKIE['password'];
			$parameters_ad->name_id = $_GET['id'];
			$result_ad = $this->WebService(MERIT_TRAVELLER_FILE, "ws_get_name_details", $parameters_ad)->address_det;	
			return $result_ad;
		}
		
		public function getNameChanges(){
			$parameters_c = new stdClass();
			$parameters_c->user_id = $_COOKIE['user_id'];
			$parameters_c->password = $_COOKIE['password'];
			$parameters_c->name_id = $_GET['id'];
			$result_c = $this->WebService(MERIT_TRAVELLER_FILE, "ws_get_name_remarks", $parameters_c)->req_remark_dets;	
			return $result_c;
		}
	
	/* */
	
	/* View Animal */
	
		public function getAnimal(){
			$parameters = new stdClass();
			$parameters->user_id = $_COOKIE['user_id'];
			$parameters->password = $_COOKIE['password'];
			$parameters->animal_id = $name_id;
			$result = $this->WebService(MERIT_TRAVELLER_FILE, "ws_get_animal_details", $parameters)->animal_dets->animal_details;	
			return $result;
		}
	
	/* */
	
	/* View Address */
	
		public function getAddress(){
			if(isset($_GET['ex'])){ $ex=$_GET['ex']; } else{ $ex=0; }
			$parameters = new stdClass();
			$parameters->user_id = $_COOKIE['user_id'];
			$parameters->password = $_COOKIE['password'];
			if(isset($ex) && $ex==1){
				$parameters->external_id = $_GET['id'];
				$result = $this->WebService(MERIT_TRAVELLER_FILE, "ws_get_external_address", $parameters);
				if($result->ws_message = "Address ctr already exists in Merit"){
					unset($parameters->external_id);
					$parameters->address_id = $result->address_id;
					$result = $this->WebService(MERIT_TRAVELLER_FILE, "ws_get_address_details", $parameters);
				}
			}
			else{
				$parameters->address_id = $_GET['id'];
				$result = $this->WebService(MERIT_TRAVELLER_FILE, "ws_get_address_details", $parameters);
			}
			return $result;
		}
		
		public function getAddressHeader(){
			return $this->getAddress();	
		}
		
		public function getAddressRequests(){
			$result_a = $this->getAddress()->req_dets;
			return $result_a;	
		}
		
		public function getAddressNames(){
			$result_n = $this->getAddress()->name_dets;
			return $result_n;	
		}
		
		public function getAddressChanges(){
			$parameters_c = new stdClass();
			$parameters_c->user_id = $_COOKIE['user_id'];
			$parameters_c->password = $_COOKIE['password'];
			$parameters_c->address_id = $_GET['id'];
			$result_c = $this->WebService(MERIT_TRAVELLER_FILE, "ws_get_address_remarks", $parameters_c)->req_remark_dets;	
			return $result_c;
		}
		
		public function getAddressAssociations(){
			$parameters_as = new stdClass();
			$parameters_as->user_id = "admin";
			$parameters_as->password = "admin";
			$parameters_as->address_id = $_GET['id'];
			$parameters_as->history_ind = "N";
			$result_as = $this->WebService(MERIT_TRAVELLER_FILE, "ws_get_addr_assocs", $parameters_as);	
			return $result_as;
		}
		
		public function getAssociationDetails(){
			$parameters_assodet = new stdClass();
			$parameters_assodet->user_id = "admin";
			$parameters_assodet->password = "admin";
			$parameters_assodet->type_txt = $_POST['type_txt'];
			$parameters_assodet->type_desc = $_POST['type_desc'];
			$parameters_assodet->type_cnt = $_POST['type_cnt'];
			$parameters_assodet->type_key = $_POST['type_key'];
			$parameters_assodet->type_code = $_POST['type_code'];
			$parameters_assodet->form_name = $_POST['form_name'];
			$parameters_assodet->key_name = $_POST['key_name'];
			$parameters_assodet->address_id = $_POST['address_id'];
			$parameters_assodet->history_ind = 'N';
			$result_assodet = $this->WebService(MERIT_TRAVELLER_FILE, "ws_get_assoc_dets", $parameters_assodet);
			return $result_assodet;	
		}
		public function getAddressAliases(){
			$parameters_al = new stdClass();
			$parameters_al->user_id = "admin";
			$parameters_al->password = "admin";
			$parameters_al->address_id = $_GET['id'];
			$result_al = $this->WebService(MERIT_TRAVELLER_FILE, "ws_get_addr_alias", $parameters_al);	
			return $result_al;
		}
		
		public function getAliasDetails(){
			$parameters_aliasdet = new stdClass();
			$parameters_aliasdet->user_id = "admin";
			$parameters_aliasdet->password = "admin";
			$parameters_aliasdet->type_txt = $_POST['type_txt'];
			$parameters_aliasdet->type_desc = $_POST['type_desc'];
			$parameters_aliasdet->type_cnt = $_POST['type_cnt'];
			$parameters_aliasdet->type_key = $_POST['type_key'];
			$parameters_aliasdet->type_code = $_POST['type_code'];
			$parameters_aliasdet->address_id = $_POST['address_id'];
			$result_aliasdet = $this->WebService(MERIT_TRAVELLER_FILE, "ws_get_alias_dets", $parameters_aliasdet);	
			return $result_aliasdet;
		}
		
		public function getAddressAttributes(){
			$parameters_at = new stdClass();
			$parameters_at->user_id = "admin";
			$parameters_at->password = "admin";
			$parameters_at->address_id = $_GET['id'];
			$parameters_at->history_ind = "N";
			$result_at = $this->WebService(MERIT_TRAVELLER_FILE, "ws_get_addr_attributes", $parameters_at);	
			return $result_at;
		}
		
		public function getAttributeDetails(){
			$parameters_attribdet = new stdClass();
			$parameters_attribdet->user_id = "admin";
			$parameters_attribdet->password = "admin";
			$parameters_attribdet->type_txt = $_POST['type_txt'];
			$parameters_attribdet->type_desc = $_POST['type_desc'];
			$parameters_attribdet->type_cnt = $_POST['type_cnt'];
			$parameters_attribdet->type_key = $_POST['type_key'];
			$parameters_attribdet->type_code = $_POST['type_code'];
			$parameters_attribdet->address_id = $_POST['address_id'];
			$parameters_attribdet->status_ind = $_POST['status_ind'];
			$result_attribdet = $this->WebService(MERIT_TRAVELLER_FILE, "ws_get_attrib_dets", $parameters_attribdet);
			return $result_attribdet;	
		}
	
	/* */
	
	/* Other */
	
		public function RememberUDFs(){
			$result_get_udfs = $this->getUDFs();
			$this->registerVariablesUDF();
			if(count($result_get_udfs->udf_details) > 1){
				$count=0;
				
				foreach($result_get_udfs->udf_details as $udf){
					if($udf->udf_active_ind == "Y"){
						$string = 'udf'.str_ireplace("-","",str_ireplace(" ", "", str_ireplace(":","",trim($udf->udf_name))));
						$udf_data = $GLOBALS[$string];
						$_SESSION['rem_'.$string] = $udf_data;
					}
				}
			}
			elseif(count($result_get_udfs->udf_details) == 1){
				$udf = $result_get_udfs->udf_details;
				if($udf->udf_active_ind == "Y"){
					$string = 'udf'.str_ireplace("-","",str_ireplace(" ", "", str_ireplace(":","",trim($udf->udf_name))));
					$udf_data = $GLOBALS[$string];
					$_SESSION['rem_'.$string] = $udf_data;
				}
			}	
		}
		
		public function registerVariablesUDF(){
			foreach($_POST as $var => $data){
				if(stristr($var, "udf")){
					$var = str_ireplace("-","",str_ireplace("_","",str_ireplace("______","",str_ireplace(":","", $var))));
					if(isset($data) && strlen($data) > 0){
						$GLOBALS[$var] = $data;	
					}
					else{
						$GLOBALS[$var] = '';	
					}
					
				}
			}	
		}
		
		public function getUDFs(){
			if(isset($_POST['service_code'])) $service = $_POST['service_code']; else $service = $_SESSION['service'];
			if(isset($_POST['request_code'])) $request = $_POST['request_code']; else $request = $_SESSION['request'];
			if(isset($_POST['function_code'])) $function = $_POST['function_code']; else $function = $_SESSION['function'];
			if(isset($_POST['service'])) $service = $_POST['service'];
			if(isset($_POST['request'])) $request = $_POST['request'];
			if(isset($_POST['function'])) $function = $_POST['function'];
			$parameters_udf = new stdClass();
			$parameters_udf->user_id = $_COOKIE['user_id'];
			$parameters_udf->password = $_COOKIE['password'];
			$parameters_udf->s_code = $service;
			$parameters_udf->r_code = $request;
			$parameters_udf->f_code = $function;
			$parameters_udf->access_type = '';
			$result_get_udfs = $this->WebService(MERIT_REQUEST_FILE, "ws_get_srf_udfs", $parameters_udf)->udf_dets;
			return $result_get_udfs;
		}
		
		public function getSearch(){
			if(isset($_GET['search'])){
				$_SESSION['search'] = $_GET['search'];
			}
			$parameters = new stdClass();
			$parameters->user_id = $_COOKIE['user_id'];
			$parameters->password = $_COOKIE['password'];
			$parameters->search_param = $_SESSION['search'];
			$parameters->search_limit = 0;
			$result =  $this->WebService(MERIT_TRAVELLER_FILE, "ws_search", $parameters)->search_dets;
			return $result;
		}
		
		public function getAddressTypes(){
			$parameters = new stdClass();
			$parameters->user_id = $_COOKIE['user_id'];
			$parameters->password = $_COOKIE['password'];
			$result = $this->WebService(MERIT_ADMIN_FILE, "ws_get_address_types", $parameters)->address_types_det;
			
			return $result;
		}
	
		public function getOverrideInd(){
			$parameters_ovr = new stdClass();
			$parameters_ovr->user_id = $_COOKIE['user_id'];
			$parameters_ovr->password = $_COOKIE['password'];
			$parameters_ovr->service = $GLOBALS['service_code'];
			$parameters_ovr->request = $GLOBALS['request_code'];
			$parameters_ovr->func = $GLOBALS['function_code'];
			$result_ovr = $this->WebService(MERIT_ADMIN_FILE, "ws_chk_override_ind", $parameters_ovr)->override_ind;	
			return $result_ovr;
		}
		
		public function getRoleSecurity(){
			$parameters_ovr = new stdClass();
			$parameters_ovr->user_id = $_COOKIE['user_id'];
			$parameters_ovr->password = $_COOKIE['password'];
			$result_ovr = $this->WebService(MERIT_ADMIN_FILE, "ws_get_role_security", $parameters_ovr);	
			return $result_ovr;
		}
	
	/* */
	
	/* Processes */
	
		public function processLogin(){
            
            
            $parameters = new stdClass();
			$parameters->user_id = AU1;
			$parameters->password = AU2;
			$parameters->server = DB_SERVER;		
			$parameters->database = DB_DATABASE;
			$parameters->db_user = DB_USER;
			$parameters->db_pwd = DB_PASS;
			$result = $this->WebService(MERIT_TRAVELLER_FILE, "ws_set_traveller_db_connection", $parameters);
			
			$parameters_pr = new stdClass();
			$parameters_pr->user_id = AU1;
			$parameters_pr->password = AU2;
			$parameters_pr->server = PROP_SERVER;		
			$parameters_pr->database = PROP_DATABASE;
			$parameters_pr->db_user = PROP_USER;
			$parameters_pr->db_pwd = PROP_PASS;
			$result_pr = $this->WebService(MERIT_TRAVELLER_FILE, "ws_set_traveller_propsys_db_connection", $parameters_pr);

            
			$user_id = strip_tags(addslashes($_POST['user_id']));
			$password = strip_tags(addslashes($_POST['password']));
			$parameters = array("user_id" => $user_id, "password" => $password);
			$parameters = array_to_objecttree($parameters);
			
            
			if($result = $this->WebService(MERIT_ADMIN_FILE, "ws_merit_login", $parameters)){
                
                if($result->ws_status == "-1" && $result->ws_message == "Error connecting to the database"){
                    $_SESSION['done'] = 1;
                    $_SESSION['error'] = 1;
                    $_SESSION['error_database'] = 1;
                    $_SESSION['resfound_login'] = 0;	
                }
                elseif($result->ws_status == "-1"){
                    $_SESSION['done'] = 1;
                    $_SESSION['error'] = 1;
                    $_SESSION['error_login'] = 1;
                    $_SESSION['resfound_login'] = 0;
                } 
                elseif($result->ws_message == "" && $result->ws_status == 0){
                    $_SESSION['resfound_login'] = 1;
                    setcookie("user_id", $user_id, 0);
                    setcookie("password", $password, 0);
                    setcookie("data_group", $result->data_group, 0);
                    setcookie("security_group", $result->security_group, 0);
                    setcookie("responsible_code", $result->responsible_code, 0);
                    setcookie("surname", $result->surname, 0);
                    setcookie("given_name", $result->given_name, 0);
                    unset($_SESSION['roleSecurity']);
                    unset($_SESSION['roleSecurityArray']);
                    unset($_SESSION['roleSecurityErrorArray']);
                    $files = glob('attachments/*'); // get all file names
                    if(count($files) >10){
                        foreach($files as $file){ // iterate files
                            if(is_file($file))
                                unlink($file); // delete file
                        }
                    }
                }
                $_SESSION['redirect'] = $_POST['url'];
                return $_SESSION['resfound_login'];
            }
		}
	
		public function processCreateRequest(){
			$parameters_at = new stdClass();
			$parameters_at->user_id = $_COOKIE['user_id'];
			$parameters_at->password = $_COOKIE['password'];
			$result_at = $this->WebService(MERIT_ADMIN_FILE, "ws_get_address_types", $parameters_at)->address_types_det;
			
			foreach($_POST as $var => $data){
				$$var = strip_tags(addslashes($data));	
			}
	
			//Customer details
			$cust_initials = substr($cust_given,0,1).substr($cust_surname,0,1);
			
			if($_POST['same'] == "i" || $_POST['same'] == "s"){
				$cust_address_number = strip_tags(addslashes($_POST['i_cno']));
			}
			elseif($_POST['same'] == "o"){
				$cust_address_number = strip_tags(addslashes($_POST['o_cno']));
			}
			else{
				$cust_address_number = strip_tags(addslashes($_POST['cno']));
			}
			if($_POST['same'] == "i" || $_POST['same'] == "s"){
				$cust_address_fnumber = strip_tags(addslashes($_POST['i_cfaddno']));
			}
			elseif($_POST['same'] == "o"){
				$cust_address_fnumber = strip_tags(addslashes($_POST['o_cfaddno']));
			}
			else{
				$cust_address_fnumber = strip_tags(addslashes($_POST['cfaddno']));
			}
			if($_POST['same'] == "i" || $_POST['same'] == "s"){
				$cust_address_street = $_POST['i_cstreet'];
			}
			elseif($_POST['same'] == "o"){
				$cust_address_street = $_POST['o_cstreet'];
			}
			else{
				$cust_address_street = $_POST['cstreet'];
			}
			if($_POST['same'] == "i" || $_POST['same'] == "s"){
				$cust_address_streettype = $_POST['i_ctype'];
			}
			elseif($_POST['same'] == "o"){
				$cust_address_streettype = $_POST['o_ctype'];
			}
			else{
				$cust_address_streettype = $_POST['ctype'];
			}
			if($_POST['same'] == "i" || $_POST['same'] == "s"){
				$cust_address_suburb = $_POST['i_csuburb'];
			}
			elseif($_POST['same'] == "o"){
				$cust_address_suburb = $_POST['o_csuburb'];
			}
			else{
				$cust_address_suburb = $_POST['csuburb'];
			}
			if($_POST['same'] == "i" || $_POST['same'] == "s"){	
				$cust_address_desc = strip_tags(addslashes($_POST['i_cdesc']));
			}
			elseif($_POST['same'] == "o"){
				$cust_address_desc = strip_tags(addslashes($_POST['o_cdesc']));
			}
			else{	
				$cust_address_desc = strip_tags(addslashes($_POST['cdesc']));
			}
			echo $cust_address_desc;
			
			$facility_id = $_POST['facilityId'] != "" ? $_POST['facilityId'] : 0;
			
			//Location details
			$lno = preg_replace("/[^0-9\/]/","",$_POST['lno']);
			$lfaddno = strip_tags(addslashes($_POST['lfaddno']));
			$lstreet = $_POST['lstreet'];
			$ltype = $_POST['ltype'];
			$lsuburb = $_POST['lsuburb'];
			$ldesc = strip_tags(addslashes($_POST['ldesc']));
			if(!isset($geo_x_coord)){ $geo_x_coord='0'; }
			if(!isset($geo_y_coord)){ $geo_y_coord='0'; }
			if(!isset($address)){ $address='0'; }
			$parameters = array(
				'user_id' => $_COOKIE['user_id'],
				'password' => $_COOKIE['password'],
				'req_input' => array(
					'request_id' => 0,
					'service_type' => $service,
					'request_type' => $request,
					'function_type' => $function,
					'issue_type' => '',
					'request_datetime' => date("Y-m-d") . "T" . date("H:i:s"),
					'due_datetime' => date("Y-m-d") . "T" . date("H:i:s"),
					'count_only' => '',
					'centre' => 'WEB',
					'priority' => $priority,
					'refer_no' => $refno,
					'input_by' => $_COOKIE['responsible_code'],
					'how_received' => 'TRAVELLER',
					'request_description' => $issue,
					'request_instruction' => $instructions,
					'customer_name_det' => array(
						'customer_name_details' => array(
							array(
								"name_id" => $name_id,
								"surname" => $cust_surname,
								"given_names" => $cust_given,
								"initials" => $cust_initials,
								"pref_title" => $cust_title,
								"telephone" => str_replace(" ","",$cust_phone),
								"work_phone" => str_replace(" ","",$cust_work),
								"mobile_no" => str_replace(" ","",$cust_mobile),
								"fax_no" => 0,
								"email_address" => $cust_email,
								"company_name" => $cust_company,
								"name_ctr" => $name_ctr,
								"name_type" => $cust_type
							),
						)
					),
					'address_det' => array(
						'address_details' => array(
							array(
								"address_id" => $cust_address_id,
								"house_number" => $cust_address_number,
								"house_suffix" => $cust_address_fnumber,
								"street_name" => $cust_address_street,
								"street_type" => $cust_address_streettype,
								"locality" => $cust_address_suburb,
								"postcode" => '',
								"property_number" => '',
								"gis_x_coord" => '',
								"gis_y_coord" => '',
								"address_ctr" => $cust_address_ctr,
								"melway_map" => '',
								"melway_ref" => '',
								"address_type" => 'Customer',
								"address_desc" => $cust_address_desc,
								"address_type_code" => 'Customer',
								"ws_status" => 1,
								"ws_message" => '',
								"confidential" => '',
								"area_group" => '',
								"municipality" => '',
								"road_type" => '',
								"road_responsibility" => '',
								"street_id" => '',
								"facility_id" => 0
							),
							array(
								"address_id" => $addressId,
								"house_number" => $lno,
								"house_suffix" => $lfaddno,
								"street_name" => $lstreet,
								"street_type" => $ltype,
								"locality" => $lsuburb,
								"postcode" => '',
								"property_number" => '',
								"gis_x_coord" => '',
								"gis_y_coord" => '',
								"address_ctr" => 0,
								"melway_map" => '',
								"melway_ref" => '',
								"address_type" => 'Location',
								"address_desc" => $ldesc,
								"address_type_code" => 'Location',
								"ws_status" => 1,
								"ws_message" => '',
								"confidential" => '',
								"area_group" => '',
								"municipality" => '',
								"road_type" => '',
								"road_responsibility" => '',
								"street_id" => '',
								"facility_id" => $facility_id
							)
						)
					),
					'req_points' => array(
						'request_point_details' => array(
							array(
								"x_coord" => $geo_x_coord,
								"y_coord" => $geo_y_coord,
								"nearest_addr" => $address,
								"point_desc" => '',
							),
						)
					),
					'adhoc_officer' => array(
						'adhoc_officer_det' => array(
							array(
								'position_no' => 0,
								 'action_reqd' => '',
								 'officer' => '',
							 ),
						),
					),
					'ws_status' => 0,
					'ws_message' => ''
				)
			);
			
			$array = array();
			if(isset($countAdhoc) && $countAdhoc > 0){
				for($i = 0; $i < $countAdhoc; $i++){
					$position_no = $_POST[$i . "_position_no"];
					$action_reqd = $_POST[$i . "_action_reqd"];
					$officer = $_POST[$i . "_officer"];
					$adhoc_officer_det = array(
						  'position_no' => $position_no,
						  'action_reqd' => $action_reqd,
						  'officer' => $officer,
					  );
					  array_push($array, $adhoc_officer_det);
				}
				$parameters['req_input']['adhoc_officer']['adhoc_officer_det'] = $array;
			}
			$parameters = array_to_objecttree($parameters);
			
			try {
				$result = $this->WebService(MERIT_REQUEST_FILE, "ws_create_request", $parameters);
				
				$ws_status = $result->ws_status;
				$ws_message = $result->ws_message;
				if($ws_status != -1){
					$attachment = $_FILES['attachment'];
					
					$GLOBALS['request_id'] = $result->request_id;
					if(strlen($attachment['tmp_name'])>0){
						$this->processUploadAttachment($attachment);
					}
					
					if($_POST['udfs_exist'] == 1){
						$GLOBALS['udf-create'] = 1;
						$GLOBALS['udf-request-create'] = 1;
						$this->processEditUDFs();
					}
					
					// Tells the user that the request has been successfully submitted.
					$_SESSION['request_id_fin'] = $GLOBALS['request_id'];
					$_SESSION['done'] = 1;
					$_SESSION['success'] = 1;
					$_SESSION['success_request'] = 1;
					
					
					if($result->email_sent == true) $_SESSION['success_email'] = 1;
                    if(strlen($result->email_message) > 0) $_SESSION['email_msg'] = $result->email_message;
                    if(strlen($result->sms_message) > 0) $_SESSION['sms_msg'] = $result->sms_message;
					if($result->sms_sent == true) $_SESSION['success_sms'] = 1;
					
					// Redirect to the request
					$_SESSION['redirect'] = "index.php?page=view-request&id=".$GLOBALS['request_id'];
				}
				else{
					$_SESSION['done'] = 1;
					$_SESSION['error'] = 1;
					$_SESSION['error_web_service'] = 1;
					$_SESSION['custom_error'] = $ws_message;
					$_SESSION['redirect'] = "index.php?page=new-request";
				}
			}
			catch (Exception $e) {
				echo $e -> getMessage ();
				echo "<br>Error Code: 3. Please pass this on to the administrator.";
				
				// There is a problem.
				$_SESSION['done'] = 1; 
				$_SESSION['error'] = 1;
				$_SESSION['error_web_service'] = 1;
				
				// Redirect to the form.
				$_SESSION['redirect'] = "index.php?page=new-request";
			}

		}
		
		public function processAttachment(){
			$request_id = $_POST['request_id'];
			if(isset($_POST['action_id'])){ $action_id = $_POST['action_id']; }
			if(isset($_POST['act_officer'])){$act_officer = $_POST['act_officer']; }
			if(isset($_POST['comment'])){$comment = strip_tags(addslashes($_POST['comment'])); }
			$attachment = $_FILES["attachment"];
			if(isset($_POST['ref'])){ $ref = strip_tags($_POST['ref']); }
			if(isset($_POST['ref_page'])){ $page = strip_tags($_POST['ref_page']); }
			if(isset($_POST['filter'])){ $filter = strip_tags($_POST['filter']); }
			
			$rand = rand(0,100);
			$description = strip_tags(addslashes($_POST['desc']));
			if(isset($filter)){
				$_SESSION['redirect'] = 'index.php?page='.$page.'&id='.$ref.'&filter='.$filter."&d=ca";
			}
			else{
				$_SESSION['redirect'] = 'index.php?page='.$page.'&id='.$ref."&d=ca";
			}
			
			try {
				if ($attachment['type'] == "image/jpeg" 
				|| $attachment['type'] == "image/png"
				|| $attachment['type'] == "image/gif")
				{
					if($attachment['size'] > 300000){
						imagejpeg($attachment['tmp_name'], $attachment['tmp_name'], 75);
					}
				}
				if(move_uploaded_file($attachment['tmp_name'], ATTACHMENT_FOLDER.str_ireplace(" ", "_", $request_id."-".$rand."-".$attachment['name']))){
					$parameters = new stdClass();
					$parameters->user_id = $_COOKIE['user_id'];
					$parameters->password = $_COOKIE['password'];
					$parameters->request_id = $request_id;		
					$parameters->filename = str_ireplace('/', '\\', ATTACHMENT_FOLDER).str_ireplace(" ", "_", $request_id."-".$rand."-".$attachment['name']);
					$parameters->description = $description;
					
					$this->WebService(MERIT_TRAVELLER_FILE,"ws_attach_req_file",$parameters);
					
					$_SESSION['success'] = 1;
					$_SESSION['success_attach'] = 1;
					$_SESSION['done'] = 1;
				}
				else{
					$_SESSION['error'] = 1;
					$_SESSION['error_attach'] = 1;
					$_SESSION['done'] = 1;
                    $_SESSION['error_custom'] = 1;
                    $_SESSION['custom_error'] = "Please ensure your attachment's file size is below ".$upload_mb."MB";
				}
				
			}
			catch (Exception $e) {
				$_SESSION['error'] = 1;
				$_SESSION['error_attach'] = 1;
				$_SESSION['done'] = 1;
                $_SESSION['error_custom'] = 1;
                $_SESSION['custom_error'] = "Please ensure your attachment's file size is below ".$upload_mb."MB";
			}
	
			
		}
		
		public function processUploadAttachment($attachment){
			$rand = rand(0,100);
			$description = strip_tags(addslashes($_POST['desc']));
			$max_upload = (int)(ini_get('upload_max_filesize'));
            $max_post = (int)(ini_get('post_max_size'));
            $memory_limit = (int)(ini_get('memory_limit'));
            $upload_mb = min($max_upload, $max_post, $memory_limit);
			if ($attachment['type'] == "image/jpeg" 
				|| $attachment['type'] == "image/png"
				|| $attachment['type'] == "image/gif")
				{
					if($attachment['size'] > 300000){
						imagejpeg($attachment['tmp_name'], $attachment['tmp_name'], 75);
					}
				}
			if(move_uploaded_file($attachment['tmp_name'], ATTACHMENT_FOLDER.str_ireplace(" ", "_", $GLOBALS['request_id']."-".$rand."-".$attachment['name']))){
				
				$parameters_att = new stdClass();
				$parameters_att->user_id = $_COOKIE['user_id'];
				$parameters_att->password = $_COOKIE['password'];
				$parameters_att->request_id = $GLOBALS['request_id'];		
				$parameters_att->filename = str_ireplace('/', '\\', ATTACHMENT_FOLDER).str_ireplace(" ", "_", $GLOBALS['request_id']."-".$rand."-".$attachment['name']);		
				$parameters_att->description = $description;
				try {
					$result = $this->WebService(MERIT_TRAVELLER_FILE, "ws_attach_req_file", $parameters_att);
					$_SESSION['success'] = 1;
					$_SESSION['success_attach'] = 1;
					$_SESSION['done'] = 1;
				}
				catch(Exception $e){
					$_SESSION['error'] = 1;
					$_SESSION['error_attach'] = 1;
					$_SESSION['done'] = 1;
                    $_SESSION['error_custom'] = 1;
                    $_SESSION['custom_error'] = $e->getMessage();
				}
			}
			else{
				$_SESSION['error'] = 1;
				$_SESSION['error_attach'] = 1;
				$_SESSION['done'] = 1;
                $_SESSION['error_custom'] = 1;
                $_SESSION['custom_error'] = "Please ensure your attachment's file size is below ".$upload_mb."MB";
			}
		}

		public function processUDFAttachment($attachment){
            $max_upload = (int)(ini_get('upload_max_filesize'));
            $max_post = (int)(ini_get('post_max_size'));
            $memory_limit = (int)(ini_get('memory_limit'));
            $upload_mb = min($max_upload, $max_post, $memory_limit);
			if(strlen($attachment['tmp_name']) > 0){
				$rand = rand(0,1000000000);
				try{
					if ($attachment['type'] == "image/jpeg" 
					|| $attachment['type'] == "image/png"
					|| $attachment['type'] == "image/gif")
					{
						if($attachment['size'] > 300000){
							imagejpeg($attachment['tmp_name'], $attachment['tmp_name'], 75);
						}
					}
					move_uploaded_file($attachment['tmp_name'], ATTACHMENT_FOLDER.str_ireplace(" ", "_", $rand."-".$attachment['name']));
					return str_ireplace("/", "\\", ATTACHMENT_FOLDER).str_ireplace(" ", "_", $rand."-".$attachment['name']);
				}
				catch(Exception $e){
					$_SESSION['error'] = 1;
					$_SESSION['error_attach'] = 1;
					$_SESSION['done'] = 1;
                    $_SESSION['error_custom'] = 1;
                    $_SESSION['custom_error'] = "Please ensure your attachment's file size is below ".$upload_mb."MB";
					return "Error with uploaded file: ".$e;
				}
			}
		}
		
		public function processEditActionUDFs(){
			if(isset($_POST['id'])) $id = $_POST['id'];
			else $id = $GLOBALS['request_id'];
			$result_get_udfs = $this->getRequestUDFs();
			$result_get_udfs = $result_get_udfs['udfs'];	

			$this->registerVariablesUDF();
			$parameters_udfs = array(
				'user_id' => $_COOKIE['user_id'],
				'password' => $_COOKIE['password'],
				'request_id' => $id,
				'a_data' => array(
					'ws_status' => '',
					'ws_message' => '',
					'request_id' => $id,
					'udf_dets' => array(
						'udf_details' => array(
						
						)
					)
				)
			);
	
			$udf = array();
			$array = array();
			if(count($result_get_udfs->udf_details) > 1){
				$count=0;
				foreach($result_get_udfs->udf_details as $udf){
					if($udf->udf_active_ind == "Y" && $udf->udf_action_id == $_POST['act_id']){
						
						$count=$count+1;
						$string = 'udf'.str_ireplace("-","",str_ireplace(" ", "", str_ireplace(":","",trim($udf->udf_name))));
						$ok=0;
						if($udf->udf_type == "A"){
							$udf_data = "$".number_format($GLOBALS[$string], 2);
							$ok=1;
						}
						elseif($udf->udf_type == "V"){
                            echo $GLOBALS[$string."date"];
                            $date = strlen($GLOBALS[$string."date"]) > 0 ? date('Y-m-d',strtotime(str_replace("/","-",$GLOBALS[$string."date"]))) : "";
                            $time = strlen($GLOBALS[$string."time"]) > 0 ? " ".date('h:i A',strtotime($GLOBALS[$string."time"])) : "";
							$udf_data = $date.$time;
							$ok=1;
						}
                        elseif($udf->udf_type == "M"){
							$udf_data = strlen($GLOBALS[$string]) > 0 ? date('h:i A',strtotime($GLOBALS[$string])) : "";	
							$ok=1;
						}
                        elseif($udf->udf_type == "D"){
							$udf_data = strlen($GLOBALS[$string]) > 0 ? date('Y-m-d',strtotime(str_replace("/","-",$GLOBALS[$string]))) : "";	
							$ok=1;
						}
						elseif($udf->udf_type == "G"){
							$udf_data = $this->processUDFAttachment($_FILES['udf_'.str_ireplace(" ", "_", $udf->udf_name)]);
							$ok=1;
						}
						elseif($udf->udf_type == "B"){
							$udf_data = $this->processUDFAttachment($_FILES['udf_'.str_ireplace(" ", "_", $udf->udf_name)]);
							$ok=1;
						}
						elseif($udf->udf_type == "P"){
							$udf_data = $this->processUDFAttachment($_FILES['udf_'.str_ireplace(" ", "_", $udf->udf_name)]);
							$ok=1;
						}
						else{
							$udf_data = $GLOBALS[$string];
							$ok=1;
						}
						if($ok==1){
							$udf_details = array(
								'udf_number' => $udf->udf_number,
								'udf_order' => $udf->udf_order,
								'udf_name' => $udf->udf_name,
								'udf_type' => $udf->udf_type,
								'udf_looktype' => $udf->udf_looktype,
								'udf_depends' => $udf->udf_depends,
								'udf_op_code' => $udf->udf_op_code,
								'udf_dep_value' => $udf->udf_dep_value,
								'udf_fld_size' => $udf->udf_fld_size,
								'udf_mandatory_ind' => $udf->udf_mandatory_ind,
								'udf_active_ind' => $udf->udf_active_ind,
								'udf_action_reqd' => $udf->udf_action_reqd,
								'udf_action_comp' => $udf->udf_action_comp,
								'udf_action_id' => $udf->udf_action_id,
								'udf_data' => $udf_data,
								'udf_level' => $udf->udf_level,
								'action_required' =>  $udf->action_required,
								'action_required_code' =>  $udf->action_required_code
							);
							array_push($array, $udf_details);
						}
						else{
							$udf_details = array(
								'udf_number' => $udf->udf_number,
								'udf_order' => $udf->udf_order,
								'udf_name' => $udf->udf_name,
								'udf_type' => $udf->udf_type,
								'udf_looktype' => $udf->udf_looktype,
								'udf_depends' => $udf->udf_depends,
								'udf_op_code' => $udf->udf_op_code,
								'udf_dep_value' => $udf->udf_dep_value,
								'udf_fld_size' => $udf->udf_fld_size,
								'udf_mandatory_ind' => $udf->udf_mandatory_ind,
								'udf_active_ind' => $udf->udf_active_ind,
								'udf_action_reqd' => $udf->udf_action_reqd,
								'udf_action_comp' => $udf->udf_action_comp,
								'udf_action_id' => $udf->udf_action_id,
								'udf_data' => '',
								'udf_level' => $udf->udf_level,
								'action_required' =>  $udf->action_required,
								'action_required_code' =>  $udf->action_required_code
							);
							array_push($array, $udf_details);
						}
						unset($udf_details);
					}
				}
				$parameters_udfs['a_data']['udf_dets']['udf_details'] = $array;
			}
			elseif(count($result_get_udfs->udf_details) == 1){
				$udf = $result_get_udfs->udf_details;
				if($udf->udf_active_ind == "Y" && $udf->udf_action_id == $_POST['act_id']){
					$string = 'udf'.str_ireplace("-","",str_ireplace(" ", "", str_ireplace(":","",trim($udf->udf_name))));
					$ok=0;
					if($udf->udf_type == "A"){
						$udf_data = "$".number_format($GLOBALS[$string], 2);
						$ok=1;
					}
					elseif($udf->udf_type == "V"){
                        $udf_data = date('Y-m-d',strtotime($GLOBALS[$string."date"]))." ".date('h:i A',strtotime($GLOBALS[$string."time"]));	
                        $ok=1;
                    }
                    elseif($udf->udf_type == "M"){
                        $udf_data = date('h:i A',strtotime($GLOBALS[$string]));	
                        $ok=1;
                    }
                    elseif($udf->udf_type == "D"){
                        $udf_data = date('Y-m-d',strtotime($GLOBALS[$string]));	
                        $ok=1;
                    }
					elseif($udf->udf_type == "G"){
						$udf_data = $this->processUDFAttachment($_FILES['udf_'.str_ireplace(" ", "_", $udf->udf_name)]);
						$ok=1;
					}
					elseif($udf->udf_type == "B"){
						$udf_data = $this->processUDFAttachment($_FILES['udf_'.str_ireplace(" ", "_", $udf->udf_name)]);
						$ok=1;
					}
					elseif($udf->udf_type == "P"){
						$udf_data = $this->processUDFAttachment($_FILES['udf_'.str_ireplace(" ", "_", $udf->udf_name)]);
						$ok=1;
					}
					else{
						$udf_data = $GLOBALS[$string];
						$ok=1;
					}
					if($ok==1){
						$udf_details = array(
							'udf_number' => $udf->udf_number,
							'udf_order' => $udf->udf_order,
							'udf_name' => $udf->udf_name,
							'udf_type' => $udf->udf_type,
							'udf_looktype' => $udf->udf_looktype,
							'udf_depends' => $udf->udf_depends,
							'udf_op_code' => $udf->udf_op_code,
							'udf_dep_value' => $udf->udf_dep_value,
							'udf_fld_size' => $udf->udf_fld_size,
							'udf_mandatory_ind' => $udf->udf_mandatory_ind,
							'udf_active_ind' => $udf->udf_active_ind,
							'udf_action_reqd' => $udf->udf_action_reqd,
							'udf_action_comp' => $udf->udf_action_comp,
							'udf_action_id' => $udf->udf_action_id,
							'udf_data' => $udf_data,
							'udf_level' => $udf->udf_level,
							'action_required' =>  $udf->action_required,
							'action_required_code' =>  $udf->action_required_code
						);
						
					}
					else{
						$udf_details = array(
							'udf_number' => $udf->udf_number,
							'udf_order' => $udf->udf_order,
							'udf_name' => $udf->udf_name,
							'udf_type' => $udf->udf_type,
							'udf_looktype' => $udf->udf_looktype,
							'udf_depends' => $udf->udf_depends,
							'udf_op_code' => $udf->udf_op_code,
							'udf_dep_value' => $udf->udf_dep_value,
							'udf_fld_size' => $udf->udf_fld_size,
							'udf_mandatory_ind' => $udf->udf_mandatory_ind,
							'udf_active_ind' => $udf->udf_active_ind,
							'udf_action_reqd' => $udf->udf_action_reqd,
							'udf_action_comp' => $udf->udf_action_comp,
							'udf_action_id' => $udf->udf_action_id,
							'udf_data' => '',
							'udf_level' => $udf->udf_level,
							'action_required' =>  $udf->action_required,
							'action_required_code' =>  $udf->action_required_code
						);
					}
					$array = $udf_details;
				}
				$parameters_udfs['a_data']['udf_dets']['udf_details'] = $array;
			}
			
			$parameters_udfs = array_to_objecttree($parameters_udfs);
			
			try{
				$result_udfs = $this->WebService(MERIT_REQUEST_FILE, "ws_update_req_udfs", $parameters_udfs);	
				
				$_SESSION['done']=1;
				$_SESSION['success']=1;
				$_SESSION['success_udfs']=1;
			}
			catch(Exception $e){
				
				$_SESSION['done']=1;
				$_SESSION['error']=1;
				$_SESSION['error_udfs']=1;

			}
			
			$_SESSION['redirect'] = 'index.php?page=view-action&id='.$_POST['act_id'].'&d=udfs';
		}
		
		public function processEditUDFs(){
			if(isset($_POST['id'])) $id = $_POST['id'];
			else $id = $GLOBALS['request_id'];
			if(isset($GLOBALS['udf-create']) && $GLOBALS['udf-create'] == 1){
				$result_get_udfs = $this->getUDFs();
				unset($GLOBALS['udf-create']);
			}
			else{
				$result_get_udfs = $this->getRequestUDFs();
				$result_get_udfs = $result_get_udfs['udfs'];	
			}
			$this->registerVariablesUDF();
			$parameters_udfs = array(
				'user_id' => $_COOKIE['user_id'],
				'password' => $_COOKIE['password'],
				'request_id' => $id,
				'a_data' => array(
					'ws_status' => '',
					'ws_message' => '',
					'request_id' => $id,
					'udf_dets' => array(
						'udf_details' => array(
						
						)
					)
				)
			);
	
			$udf = array();
			$array = array();
			if(count($result_get_udfs->udf_details) > 1){
				$count=0;
				print_r($_FILES);
				foreach($result_get_udfs->udf_details as $udf){
					if($udf->udf_active_ind == "Y" && $udf->udf_action_id == 0){
						
						$count=$count+1;
						$string = 'udf'.str_ireplace("-","",str_ireplace(" ", "", str_ireplace(":","",trim($udf->udf_name))));
						$ok=0;
						if($udf->udf_type == "A"){
							$udf_data = "$".number_format($GLOBALS[$string], 2);
							$ok=1;
						}
						elseif($udf->udf_type == "V"){
                            echo $GLOBALS[$string."date"];
                            $date = strlen($GLOBALS[$string."date"]) > 0 ? date('Y-m-d',strtotime(str_replace("/","-",$GLOBALS[$string."date"]))) : "";
                            $time = strlen($GLOBALS[$string."time"]) > 0 ? " ".date('h:i A',strtotime($GLOBALS[$string."time"])) : "";
							$udf_data = $date.$time;
							$ok=1;
						}
                        elseif($udf->udf_type == "M"){
							$udf_data = strlen($GLOBALS[$string]) > 0 ? date('h:i A',strtotime($GLOBALS[$string])) : "";	
							$ok=1;
						}
                        elseif($udf->udf_type == "D"){
							$udf_data = strlen($GLOBALS[$string]) > 0 ? date('Y-m-d',strtotime(str_replace("/","-",$GLOBALS[$string]))) : "";	
							$ok=1;
						}
						elseif($udf->udf_type == "G"){
							$udf_data = $this->processUDFAttachment($_FILES['udf_'.str_ireplace(" ", "_", $udf->udf_name)]);	
							$ok=1;
						}
						elseif($udf->udf_type == "B"){
							$udf_data = $this->processUDFAttachment($_FILES['udf_'.str_ireplace(" ", "_", $udf->udf_name)]);	
							$ok=1;
						}
						elseif($udf->udf_type == "P"){
							$udf_data = $this->processUDFAttachment($_FILES['udf_'.str_ireplace(" ", "_", $udf->udf_name)]);	
							$ok=1;
						}
						else{
							$udf_data = $GLOBALS[$string];
							$ok=1;
						}
						if($ok==1){
							$udf_details = array(
								'udf_number' => $udf->udf_number,
								'udf_order' => $udf->udf_order,
								'udf_name' => $udf->udf_name,
								'udf_type' => $udf->udf_type,
								'udf_looktype' => $udf->udf_looktype,
								'udf_depends' => $udf->udf_depends,
								'udf_op_code' => $udf->udf_op_code,
								'udf_dep_value' => $udf->udf_dep_value,
								'udf_fld_size' => $udf->udf_fld_size,
								'udf_mandatory_ind' => $udf->udf_mandatory_ind,
								'udf_active_ind' => $udf->udf_active_ind,
								'udf_action_reqd' => $udf->udf_action_reqd,
								'udf_action_comp' => $udf->udf_action_comp,
								'udf_action_id' => $udf->udf_action_id,
								'udf_data' => $udf_data,
								'udf_level' => $udf->udf_level,
								'action_required' =>  $udf->action_required,
								'action_required_code' =>  $udf->action_required_code
							);
							array_push($array, $udf_details);
						}
						else{
							$udf_details = array(
								'udf_number' => $udf->udf_number,
								'udf_order' => $udf->udf_order,
								'udf_name' => $udf->udf_name,
								'udf_type' => $udf->udf_type,
								'udf_looktype' => $udf->udf_looktype,
								'udf_depends' => $udf->udf_depends,
								'udf_op_code' => $udf->udf_op_code,
								'udf_dep_value' => $udf->udf_dep_value,
								'udf_fld_size' => $udf->udf_fld_size,
								'udf_mandatory_ind' => $udf->udf_mandatory_ind,
								'udf_active_ind' => $udf->udf_active_ind,
								'udf_action_reqd' => $udf->udf_action_reqd,
								'udf_action_comp' => $udf->udf_action_comp,
								'udf_action_id' => $udf->udf_action_id,
								'udf_data' => '',
								'udf_level' => $udf->udf_level,
								'action_required' =>  $udf->action_required,
								'action_required_code' =>  $udf->action_required_code
							);
							array_push($array, $udf_details);
						}
						unset($udf_details);
					}
				}
				$parameters_udfs['a_data']['udf_dets']['udf_details'] = $array;
			}
			elseif(count($result_get_udfs->udf_details) == 1){
				$udf = $result_get_udfs->udf_details;
				if($udf->udf_active_ind == "Y" && $udf->udf_action_id == 0){
					$string = 'udf'.str_ireplace("-","",str_ireplace(" ", "", str_ireplace(":","",trim($udf->udf_name))));
					$ok=0;
					if($udf->udf_type == "A"){
						$udf_data = "$".number_format($GLOBALS[$string], 2);
						$ok=1;
					}
					elseif($udf->udf_type == "V"){
                        $udf_data = date('Y-m-d',strtotime($GLOBALS[$string."date"]))." ".date('h:i A',strtotime($GLOBALS[$string."time"]));	
                        $ok=1;
                    }
                    elseif($udf->udf_type == "M"){
                        $udf_data = date('h:i A',strtotime($GLOBALS[$string]));	
                        $ok=1;
                    }
                    elseif($udf->udf_type == "D"){
                        $udf_data = date('Y-m-d',strtotime($GLOBALS[$string]));	
                        $ok=1;
                    }
					elseif($udf->udf_type == "G"){
						$udf_data = $this->processUDFAttachment($_FILES['udf_'.str_ireplace(" ", "_", $udf->udf_name)]);
						$ok=1;
					}
					elseif($udf->udf_type == "B"){
						$udf_data = $this->processUDFAttachment($_FILES['udf_'.str_ireplace(" ", "_", $udf->udf_name)]);
						$ok=1;
					}
					elseif($udf->udf_type == "P"){
						$udf_data = $this->processUDFAttachment($_FILES['udf_'.str_ireplace(" ", "_", $udf->udf_name)]);
						$ok=1;
					}
					else{
						$udf_data = $GLOBALS[$string];
						$ok=1;
					}
					if($ok==1){
						$udf_details = array(
							'udf_number' => $udf->udf_number,
							'udf_order' => $udf->udf_order,
							'udf_name' => $udf->udf_name,
							'udf_type' => $udf->udf_type,
							'udf_looktype' => $udf->udf_looktype,
							'udf_depends' => $udf->udf_depends,
							'udf_op_code' => $udf->udf_op_code,
							'udf_dep_value' => $udf->udf_dep_value,
							'udf_fld_size' => $udf->udf_fld_size,
							'udf_mandatory_ind' => $udf->udf_mandatory_ind,
							'udf_active_ind' => $udf->udf_active_ind,
							'udf_action_reqd' => $udf->udf_action_reqd,
							'udf_action_comp' => $udf->udf_action_comp,
							'udf_action_id' => $udf->udf_action_id,
							'udf_data' => $udf_data,
							'udf_level' => $udf->udf_level,
							'action_required' =>  $udf->action_required,
							'action_required_code' =>  $udf->action_required_code
						);
						
					}
					else{
						$udf_details = array(
							'udf_number' => $udf->udf_number,
							'udf_order' => $udf->udf_order,
							'udf_name' => $udf->udf_name,
							'udf_type' => $udf->udf_type,
							'udf_looktype' => $udf->udf_looktype,
							'udf_depends' => $udf->udf_depends,
							'udf_op_code' => $udf->udf_op_code,
							'udf_dep_value' => $udf->udf_dep_value,
							'udf_fld_size' => $udf->udf_fld_size,
							'udf_mandatory_ind' => $udf->udf_mandatory_ind,
							'udf_active_ind' => $udf->udf_active_ind,
							'udf_action_reqd' => $udf->udf_action_reqd,
							'udf_action_comp' => $udf->udf_action_comp,
							'udf_action_id' => $udf->udf_action_id,
							'udf_data' => '',
							'udf_level' => $udf->udf_level,
							'action_required' =>  $udf->action_required,
							'action_required_code' =>  $udf->action_required_code
						);
					}
					$array = $udf_details;
				}
				$parameters_udfs['a_data']['udf_dets']['udf_details'] = $array;
			}
			
			$parameters_udfs = array_to_objecttree($parameters_udfs);
			try{
				$result_udfs = $this->WebService(MERIT_REQUEST_FILE, "ws_update_req_udfs", $parameters_udfs);	
				
				$_SESSION['done']=1;
				$_SESSION['success']=1;
				if($GLOBALS['udf-request-create'] != 1) $_SESSION['success_udfs']=1;
			}
			catch(Exception $e){
				
				echo $e;
				$_SESSION['done']=1;
				$_SESSION['error']=1;
				$_SESSION['error_udfs']=1;

			}
			if(isset($_POST['act_id'])) $_SESSION['redirect'] = 'index.php?page=view-action&id='.$_POST['act_id'].'&d=udfs';
			else $_SESSION['redirect'] = 'index.php?page=view-request&id='.$_POST['id'].'&d=udfs';
		}
		
		public function processAddAction(){
			$required_code = $_POST['required'];
		
			if(strlen($_POST['date']) == 0){
				$date = date("Y-m-d")."T".date("H:i:s.B");
			}
			else{
				$date = date("Y-m-d",strtotime($_POST['date']))."T".date("H:i:s.B");
			}
			
			$request_id = $_POST['id'];
			$reason = strip_tags(addslashes($_POST['reason']));
			$send_email = $_POST['send_email'];
			$officer = $_POST['officer'];
			$parameters = new stdClass();
			$parameters->user_id = $_COOKIE['user_id'];
			$parameters->password = $_COOKIE['password'];
			$parameters->request_id = $request_id;	
			$parameters->action_reqd_code = $required_code;			
			$parameters->due_date = $date;
			$parameters->reason = $reason;
			$parameters->send_email = $send_email;
			$parameters->officer = $officer;
		
			try {
				$result = $this->WebService(MERIT_ACTION_FILE, "ws_add_new_action", $parameters);
				$_SESSION['done'] = 1;
				$_SESSION['success'] = 1;
				$_SESSION['success_action'] = 1;
			}
			catch (Exception $e) {
				echo $e -> getMessage ();
				$_SESSION['error'] = 1;
				$_SESSION['error_action'] = 1;
				$_SESSION['done'] = 1;
			}
			$_SESSION['redirect'] = "index.php?page=view-request&id=".$request_id."&d=actions";	
		}
		
		public function processChangePassword(){
			
			if($_POST['current'] == $_COOKIE['password']){
				if($_POST['new'] == $_POST['repeat']){
					$parameters = new stdClass();
					$parameters->user_id = $_COOKIE['user_id'];
					$parameters->password = $_COOKIE['password'];
					$parameters->new_password = $_POST['new'];	
					

					try {
						$result = $this->WebService(MERIT_ADMIN_FILE, "ws_change_password", $parameters);
						$_SESSION['done'] = 1;
						$_SESSION['success'] = 1;
						$_SESSION['success_change_password'] = 1;
						setcookie("password", $_POST['new'], 0);
						$_SESSION['redirect'] = "index.php?";	
					}
					catch (Exception $e) {
						echo $e -> getMessage ();
						$_SESSION['error'] = 1;
						$_SESSION['error_change_password'] = 1;
						$_SESSION['done'] = 1;
						$_SESSION['redirect'] = "index.php?page=change-password";	
					} 
				}
				else{
					$_SESSION['done'] = 1;
					$_SESSION['error'] = 1;
					$_SESSION['error_repeat'] = 1;
					$_SESSION['redirect'] = "index.php?page=change-password";	
				}
			}
			else{
				$_SESSION['done'] = 1;
				$_SESSION['error'] = 1;
				$_SESSION['error_current'] = 1;
				$_SESSION['redirect'] = "index.php?page=change-password";	
			}
		}
		
		public function processReassignAction(){
			if(strlen($_POST['new_officer']) > 0){
				$new_officer = strip_tags(addslashes($_POST['new_officer']));
				$old_officer = strip_tags(addslashes($_POST['action_officer_code']));
				
				$reason = strip_tags(addslashes($_POST['reason']));
				$reassign_type = $_POST['reassign_type'];
				$reassign_to_type = $_POST['reassign_to_type'];
				$request_id = $_POST['request_id'];
				$action_id = $_POST['action_id'];
				
				$GLOBALS['action_officer_code'] = $old_officer;
				$result_o = $this->getOfficer();
				
				$GLOBALS['action_officer_code'] = $new_officer;
				$result_oo = $this->getOfficer();
	
				$parameters = new stdClass();
				$parameters->user_id = $_COOKIE['user_id'];
				$parameters->password = $_COOKIE['password'];
				$parameters->action_id = $action_id;
				$parameters->request_id = $request_id;				
				$parameters->new_officer = $new_officer;
				$parameters->reassign_type = $reassign_type;
				$parameters->reassign_to_type = $reassign_to_type;
				$parameters->email_responsible_officer = $_SESSION['email'];
				$parameters->email_old_action_officer = $result_o->mail_id;
				$parameters->email_new_action_officer = $result_oo->mail_id;
				$parameters->reason = $reason;
	
				$result = $this->WebService(MERIT_ACTION_FILE, "ws_reassign_action", $parameters);
				if(stristr($result, "Error")){
					$_SESSION['done']= 1;
					$_SESSION['error_action_submit_message'] = $result;
					$_SESSION['error'] = 1;
				}
				else{
					$_SESSION['done']= 1;
					$_SESSION['success_reassigned'] = 1;
					$_SESSION['success'] = 1;
				}
				$_SESSION['redirect'] = "index.php?page=view-action&id=".$action_id."&d=reassign";
			}
		}
		
		public function processCompleteAction(){
			$datetime = date("Y-m-d") . "T" . date("H:i:s");
			$comment = strip_tags(addslashes($_POST['comment_act']));
			$completed_code = strip_tags(addslashes($_POST['requirement']));
			$status_code = $_POST['status_code'];
			$assign_name = strip_tags(addslashes($_POST['assign_name']));
			$request_id = $_POST['request_id'];
			$action_id = $_POST['action_id'];
			
			//Begin completion of action
			if(!empty($completed_code)){
				if($status_code == "OPEN"){
					$parameters = new stdClass();
					$parameters->user_id = $_COOKIE['user_id'];
					$parameters->password = $_COOKIE['password'];
					$parameters->action_id = $action_id;
					$parameters->request_id = $request_id;				
					$parameters->completed_code = $completed_code;
					$parameters->comments = $comment;			
					$parameters->completed_date = $datetime;
					
					$result = $this->WebService(MERIT_ACTION_FILE, "ws_complete_action", $parameters);
					if($_POST['udfs_exist'] == 1) $this->processEditActionUDFs();
					
                    if($result->email_sent == true) $_SESSION['success_email'] = 1;
                    if(strlen($result->email_msg) > 0) $_SESSION['email_msg'] = $result->email_msg;
                    if(strlen($result->sms_msg) > 0) $_SESSION['sms_msg'] = $result->sms_msg;
					if($result->sms_sent == true) $_SESSION['success_sms'] = 1;
                    
					if($result->email_sent_on_comp == true) $_SESSION['success_email'] = 1;
                    if(strlen($result->email_msg_on_comp) > 0) $_SESSION['email_msg'] = $result->email_msg_on_comp;
                    if(strlen($result->sms_msg_on_comp) > 0) $_SESSION['sms_msg'] = $result->sms_msg_on_comp;
					if($result->sms_sent_on_comp == true) $_SESSION['success_sms'] = 1;
					
					if($result->ws_message == "adhoc" && $result->ws_status == 2){
						$_SESSION['action_id'] = $result->action_id;
						$_SESSION['request_id'] = $result->request_id;
						$_SESSION['bypass'] = $result->bypass;
						$_SESSION['reason_assigned'] = $result->reason_assigned;
						$_SESSION['email'] = $result->email;
						$_SESSION['due_date'] = $result->due_date;
						$_SESSION['priority'] = $result->priority;
						$_SESSION['officer_type'] = $result->officer_type;
						$_SESSION['position_no'] = $result->position_no;
						
						$_SESSION['position_no_arr'] = array();
		
						foreach($result->position_no_arr as $int){
							array_push($_SESSION['position_no_arr'], $int);	
						}
		
						
						$_SESSION['act_level_arr'] = array();
		
						foreach($result->act_level_arr as $string){
							array_push($_SESSION['act_level_arr'], $string);	
						}
		
						$_SESSION['completed_code'] = $completed_code;
						$_SESSION['adhoc-true'] = 1;
						$_SESSION['redirect'] = "index.php?page=adhoc-officer&id=".$action_id;
					}
					else{
						$_SESSION['action-id'] = $action_id;
						$_SESSION['request-id'] = $request_id;
						$_SESSION['assign_name'] = $assign_name;
						
						if($completed_code != "NORESPONSE"){
							$_SESSION['success_action_submit'] = 1;
							$_SESSION['done'] = 1;
							$_SESSION['success'] = 1;
							$_SESSION['redirect'] = "index.php?page=actions";
						}
						else{
							$_SESSION['redirect'] = "index.php?page=view-action&id=".$action_id."&d=complete";
						}
					}
				}
				else{
					$_SESSION['action-id'] = $action_id;
					$_SESSION['request-id'] = $request_id;
					$_SESSION['assign_name'] = $assign_name;
					$_SESSION['redirect'] = "index.php?page=view-action&id=".$action_id."&d=complete";
				}
			}
			else{
				$_SESSION['error_no_outcome'] = 1;
				$_SESSION['redirect'] = "index.php?page=view-action&id=".$action_id."&d=complete";
			}
		}
		
		public function processAdhocOfficer(){
			$parameters = array(
				'user_id' => $_COOKIE['user_id'],
				'password' => $_COOKIE['password'],
				'request_id' => $_POST['request_id'],
				'action_id' => $_POST['action_id'],
				'resp_officer' => $_POST['resp_officer'],
				'bypass' => "N",
				'position_no_arr' => array(
				),
				'action_type_arr' => array(
				),
				'position_no' => $_POST['position_no'],
				'officer_type' => $_POST['officer_type'],
				'due_datetime' => $_POST['due_datetime']
			);
			$count=0;
			for($i=0;$i<count($_SESSION['position_no_arr']);$i++){
				$ll_pos_no = $_SESSION['position_no_arr'][$i];
				$lstr_act_level = $_SESSION['act_level_arr'][$i];
				if($ll_pos_no != $_POST['position_no']){
					$count=$count+1;
					$parameters['position_no_arr'][$count] = $ll_pos_no;
					$parameters['action_type_arr'][$count] = $lstr_act_level;
				}
				elseif($ll_pos_no == $_POST['position_no']){
					$act_type = $lstr_act_level;
				}
			}
			$parameters['act_type'] = $act_type;
			
			$parameters = array_to_objecttree($parameters);
			
			$result = $this->WebService(MERIT_ACTION_FILE, "ws_triggerdependant_action", $parameters);
			
			if($result->ws_message == "adhoc" && $result->ws_status == 2){
				$_SESSION['action_id'] = $result->action_id;
				$_SESSION['request_id'] = $result->request_id;
				$_SESSION['bypass'] = $result->bypass;
				$_SESSION['reason_assigned'] = $result->reason_assigned;
				$_SESSION['email'] = $result->email;
				$_SESSION['due_date'] = $result->due_date;
				$_SESSION['priority'] = $result->priority;
				$_SESSION['officer_type'] = $result->officer_type;
				$_SESSION['position_no'] = $result->position_no;
				
				$_SESSION['position_no_arr'] = array();
				foreach($result->position_no_arr as $int){
					array_push($_SESSION['position_no_arr'], $int);	
				}
				$_SESSION['act_level_arr'] = array();
				foreach($result->act_level_arr as $string){
					array_push($_SESSION['position_no_arr'], $string);	
				}
				
				$_SESSION['adhoc-true'] = 1;
				$_SESSION['redirect'] = "index.php?page=adhoc-officer&id=".$action_id;
			}
			else{
				$_SESSION['action-id'] = $_POST['action_id'];
				$_SESSION['request-id'] = $_POST['request_id'];
				$_SESSION['assign_name'] = $_POST['reason_assigned'];
				
				if($_SESSION['completed_code'] != "NORESPONSE"){
					$_SESSION['done'] = 1;
					$_SESSION['success'] = 1;
					$_SESSION['success_action_submit'] = 1;
					$_SESSION['redirect'] = "index.php?page=actions";
				}
				else{
					$_SESSION['redirect'] = "index.php?page=view-action&id=".$result->action_id."&d=summary";
				}
			}	
		}
		
		public function processAddComment(){
			$comment = strip_tags(addslashes($_POST['comment']));
			if(strlen($comment) > 0){
				$request_id = $_POST['request_id'];
				$action_id = $_POST['action_id'];
	
				if(isset($_POST['ref'])){ $ref = strip_tags($_POST['ref']); }
				if(isset($_POST['ref_page'])){ $page = strip_tags($_POST['ref_page']); }
				if(isset($_POST['filter'])){ $filter = strip_tags($_POST['filter']); }
				
				if($_POST['page'] == "action"){
					$parameters = new stdClass();
					$parameters->user_id = $_COOKIE['user_id'];
					$parameters->password = $_COOKIE['password'];
					$parameters->action_id = $action_id;
					$parameters->request_id = $request_id;		
					$parameters->comment_text = $comment;
					$parameters->email_act_officer = $_POST['send_email'];
					$parameters->email_resp_officer = "N";
					$parameters->email_all_officer = "N";
					$parameters->action_required = $_POST['action_required'];
					$parameters->t_action = 'Action';
					
					try {
						$result = $this->WebService(MERIT_ACTION_FILE, "ws_add_action_comment",$parameters);
						$_SESSION['done'] = 1;
						$_SESSION['success'] = 1;
						$_SESSION['success_comment'] = 1;
					}
					catch (Exception $e) {
						echo $e -> getMessage ();
						$_SESSION['done'] = 1;
						$_SESSION['error'];
						$_SESSION['error_comment'] = 1;
					}
					if(isset($ref_page) && isset($ref) && isset($filter)){
						$_SESSION['redirect'] = "index.php?page=view-action&id=".$_POST['action_id']."&ref_page=".$ref_page."&ref=".$ref."&filter=".$filter;
					}
					else{
						$_SESSION['redirect'] = "index.php?page=view-action&id=".$_POST['action_id']."&d=ca";
					}
					
				}
				elseif($_POST['page'] == "request"){
					$parameters = new stdClass();
					$parameters->user_id = $_COOKIE['user_id'];
					$parameters->password = $_COOKIE['password'];
					$parameters->request_id = $request_id;		
					$parameters->comment_text = $comment;
					$parameters->email_resp_officer = "N";
					$parameters->email_current_act_officers = $_POST['send_email'];
					
					try {
						$result = $this->WebService(MERIT_REQUEST_FILE, "ws_add_req_comment",$parameters);
						$_SESSION['done'] = 1;
						$_SESSION['success'] = 1;
						$_SESSION['success_comment'] = 1;
					}
					catch (Exception $e) {
						echo $e -> getMessage ();
						$_SESSION['done'] = 1;
						$_SESSION['error'];
						$_SESSION['error_comment'] = 1;
					}
					if(isset($ref_page) && isset($ref) && isset($filter)){
						$_SESSION['redirect'] = "index.php?page=view-request&id=".$request_id."&ref_page=".$ref_page."&ref=".$ref."&filter=".$filter;
					}
					else{
						$_SESSION['redirect'] = "index.php?page=view-request&id=".$request_id."&d=ca";
					}
				}
			}	
		}
	
	/* */
}  
?>