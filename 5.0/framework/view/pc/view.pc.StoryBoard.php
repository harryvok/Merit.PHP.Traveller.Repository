
    <!-- bootstrap & fontawesome --> 
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">
    <!-- page specific plugin styles -->

    
    
    <!-- inline styles related to this page -->

  
    <div class="main-container" id="main-container">

        <div id="sidebar" class="sidebar responsive">
            <ul class="nav nav-list" style="top: 0px;">
                <li class="active">
                    <a href="#">
                        <i class="menu-icon fa fa-desktop"></i>
                        <span class="menu-text">Show</span>
                    </a>
                </li>

                <li class="hsub ">
                    <a href="#">
                        <i class="menu-icon fa fa-pencil-square-o"></i>
                        <span class="menu-text">Options</span>
                    </a>
                </li>

                <li class="hsub " onclick="getPaging(this.id);">
                    <a href="#">
                    <i class="menu-icon fa fa-fighter-jet"></i>
                    <span class="menu-text">Actions</span>
                    </a>
                </li>

                <li class="hsub " onclick="getPaging(this.id);">
                    <a href="#">
                    <i class="menu-icon fa fa-envelope"></i>
                    <span class="menu-text">Output</span>
                    </a>
                </li>

                <li class="hsub" onclick="getPaging(this.id);">
                    <?php if($_SESSION['roleSecurity']->allow_request == "Y") { ?><a class="header-nav" href="index.php?page=requests" ><?php } ?>
                    <i class="menu-icon fa fa-sign-out"></i>
                    <span class="menu-text">Back</span>
                    </a>
                </li>


            </ul>
        </div>

        <div class="main-content" style="min-width:960px;">
            <div class="breadcrumbs" id="breadcrumbs">
                <ul class="breadcrumb">
                    <li>
                        <i class="ace-icon fa  fa-tachometer"></i>
                        <a href="#">Request Intray</a>
                    </li>
                    <li class="active"><a href="#">Storyboard</a></li>
                </ul>

            </div>


            <!-- PAGE CONTENT GOES HERE -->
            <div class="page-content-outer">
                <div class="page-content-inner">

                    <!-- PHP code to generate stuff for the header -->
                        <?php $date = date('d-M-Y H:i a');

                              if(isset($GLOBALS['result']->request_id) && $GLOBALS['result']->status_code == "OPEN"){ 
                                  $statuscode = "OPEN";   
                              } 
                              elseif(isset($GLOBALS['result']->request_id) && $GLOBALS['result']->status_code == "SUSPENDED"){ 
                                  $statuscode = "SUSPENDED";  
                              } 
                              else { 
                                  $statuscode = "CLOSED"; 
                              } 
                              
                            $scode=$GLOBALS['result']->service_name;
                            $rcode=$GLOBALS['result']->request_name;
                            if(isset($GLOBALS['result']->function_name) && $GLOBALS['result']->function_name != '') {
                                   $fcode=$GLOBALS['result']->function_name; 
                            }
                        ?>
                     <!-- PHP END -->

                     <!-- javascript code to generate stuff for the header -->
                        <script type="text/javascript">
                            $(document).ready(function () {

                              

                                if ($("#statuscolor").val() == "OPEN") {
                                    $("#reqstatus").css("color", "green");
                                }
                                else if ($("#statuscolor").val() == "SUSPENDED") {
                                    $("#reqstatus").css("color", "orange");
                                }
                                else {
                                    $("#reqstatus").css("color", "red");
                                }
                            });
                        </script>
                     <!-- JS END -->

                
                  <div class="topsection">
                       <!-- Header -->
                        <div class="storyheader">
                            <div class="storyheadleft">
                                <input type="hidden" id="statuscolor" value="<?php echo $statuscode ?>" />
                                <p style="margin-bottom:10px;">As at: <b><?php echo $date; ?></b></p>
                                <p>Request ID: <b style="font-size:18px;"><a href='index.php?page=view-request&id=<?php echo $_GET['id'];?>'><?php echo $_GET['id']; ?></a></b>
                                    
                                    
                                    <span id="reqstatus" style="font-weight:bold; font-size:18px; padding-left:214px;"><?php echo $statuscode ?></span></p>
                                <p style="-webkit-margin-before:10px;">Type: <b style="font-size:18px;"><?php echo $scode ." - ".$rcode." - ".$fcode ?></b></p>
                            </div>
                        </div>

                  </div>          
                  <div class="bottomsection">

                        <!-- Request Details-->
                        <div class="expandable-panel" id="cp-1">
                            <div class="expandable-panel-heading">
                                <h2 id="initalheader">Request Details +<span class="icon-close-open"></span></h2>
                            </div>

                            <div class="expandable-panel-content">
                                <div class="reqdets">

                                    <!-- PHP to generate correct date formats -->
                                    <?php $createddate = date('d/m/Y h:i A',strtotime(str_ireplace("00:00:00.000", "", $GLOBALS['result']->request_datetime)));  ?>
                                    <?php $duedate = date('d/m/Y h:i A',strtotime(str_ireplace("00:00:00.000", "", $GLOBALS['result']->due_datetime)));  ?>
                                    <?php $completeddate = date('d/m/Y h:i A',strtotime(str_ireplace("00:00:00.000", "", $GLOBALS['result']->status_datetime)));  ?>

                                    <?php if ($GLOBALS['result']->status != "completed"){
                                            $completeddate = "Incomplete";
                                          }
                                    ?>

                                    <!-- PHP to generate officer div/dept -->
                                    <?php 
                                    $rdivdept = "(".$GLOBALS['result']->resp_officer_div." / ".$GLOBALS['result']->resp_officer_dep.")";
                                    $idivdept = "(".$GLOBALS['result']->input_officer_div." / ".$GLOBALS['result']->input_officer_dep.")";
                                    
                                    $fillertext = ("At the species level, the pattern is considerably different to that seen for genera. With the exception of alpine and highly disturbed areas, 
                                                  many regions of Australia have similar numbers of species, commonly between 80 and 100 belonging to 15 to 50 genera. 
                                                  This is because rainforest genera tend to contain only a small number of species while many of the arid zone genera include many species. 
                                                  Thus it would seem that while relatively few genera have been able to invade the Australian arid zone, they nonetheless have been very successful.");
                                    ?>

                                    <div class="topcol">
                                        <p style="margin-bottom:10px"><b>Description:</b><br /><?php echo base64_decode($GLOBALS['result']->request_description);?></p>
                                        <p><b>Instructions:</b><br /><?php echo $GLOBALS['result']->request_instruction;?><?php echo $fillertext; ?></p>

                                                <p style="margin-top:10px; margin-bottom:10px">
                                                    Created: <span style="padding-right:100px;"><b style="font-size:16px"><?php echo $createddate ?></b></span>
                                                    Due: <span style="padding-right:100px;"><b style="font-size:16px"><?php echo $duedate?></b></span>
                                                    Completed: <span><b style="font-size:16px"><?php echo $completeddate?></b></span>
                                                </p>

                                                <div style="float:left; width:120px;">
                                                    <p><a href='index.php?page=view-officer&id=<?php echo $GLOBALS['result']->officer_responsible_code;?>'>Responsible:</a></p>
                                                    <p><a href='index.php?page=view-officer&id=<?php echo $GLOBALS['result']->input_by_code;?>'>Input: </a></p>
                                                </div>
                                                <div style="float:left; width:85%;">
                                                    <p><b><?php echo $GLOBALS['result']->officer_responsible_name; ?></b><?php echo " - ".$rdivdept ?></p>
                                                    <p><b><?php echo $GLOBALS['result']->input_by_name ?></b><?php echo " - ".$idivdept ?></p>
                                                </div>
                                        <div style="clear: both;"></div>
                                    </div>
                                    
                                    <div class="botcol">
                                           <div style="float:left; width:120px;">
                                               <p>Request Type: </p>
                                               <p>Priority: </p>
                                               <p>Provider: </p>
                                           </div>
                                           <div style="float:left; width:16%;">
                                               <p id="reqtypecont"><b><?php echo $GLOBALS['result']->request_type ?></b></p>
                                               <p id="prioritycont"><b><?php echo $GLOBALS['result']->priority ?></b></p>
                                               <p id="provnamecont"><b><?php echo $GLOBALS['result']->provider_name ?></b></p>
                                           </div>
                                           <div style="float:left; width:120px;">
                                               <p>How Received: </p>
                                               <p>Outcome: </p>
                                           </div>
                                            <div style="float:left; width:16%;">
                                                <p id="howreccont"><b><?php echo $GLOBALS['result']->how_received_name ?></b></p>
                                                <p id="outcomecont"><b><?php echo $GLOBALS['result']->outcome ?></b></p>
                                            </div>
                                            <div style="float:left; width:120px;">
                                                <p>Centre: </p>
                                                <p>Reference No: </p>
                                            </div>
                                            <div style="float:left; width:16%;">
                                                <p id="centrenamecont"><b><?php echo $GLOBALS['result']->centre_name ?></b></p>
                                                <p id="refernocont"><b><?php echo $GLOBALS['result']->refer_no ?></b></p>
                                            </div>
                                        <div style="clear: both;"></div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>


                      <div class="expandable-panel" id="cp-2">
                            <div class="expandable-panel-heading">
                                <h2>Example +<span class="icon-close-open"></span></h2>
                                </div>
                            <div class="expandable-panel-content">
                                <div class="wrapper">

                                </div>
                                <div style="clear: both;"></div>
                            </div>
                        </div>

                      <div class="expandable-panel" id="cp-3">
                            <div class="expandable-panel-heading">
                                <h2>Example +<span class="icon-close-open"></span></h2>
                                </div>
                            <div class="expandable-panel-content">
                                <div class="wrapper">

                                </div>
                                <div style="clear: both;"></div>
                            </div>
                        </div>

                      <div class="expandable-panel" id="cp-4">
                            <div class="expandable-panel-heading">
                                <h2>Example  +<span class="icon-close-open"></span></h2>
                                </div>
                            <div class="expandable-panel-content">
                                <div class="wrapper">

                                </div>
                                <div style="clear: both;"></div>
                            </div>
                        </div>

                      <div class="expandable-panel" id="cp-5">
                            <div class="expandable-panel-heading">
                                <h2>Example  +<span class="icon-close-open"></span></h2>
                                </div>
                            <div class="expandable-panel-content">
                                <div class="wrapper">

                                </div>
                                <div style="clear: both;"></div>
                            </div>
                        </div>

                  </div>

              </div><!-- END PAGE CONTENT -->
            </div><!-- END PAGE CONTENT -->
        </div><!-- /.main-container -->
    </div>