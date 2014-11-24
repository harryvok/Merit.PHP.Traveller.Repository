
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

        <div class="main-content">
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
                                <p>Request ID: <b style="font-size:18px;"><?php echo $_GET['id']; ?></b><span id="reqstatus" style="font-weight:bold; font-size:18px; padding-left:120px;"><?php echo $statuscode ?></span></p>
                                <p style="-webkit-margin-before:10px;">Type: <b style="font-size:18px;"><?php echo $scode ." - ".$rcode." - ".$fcode ?></b></p>
                            </div>
                        </div>

                  </div>          
                  <div class="bottomsection">
                        <!-- Request Details-->
                        <div class="expandable-panel" id="cp-1">
                            <div class="expandable-panel-heading">
                                <h2>Request Details +<span class="icon-close-open"></span></h2>
                            </div>

                            <div class="expandable-panel-content">
                                <div class="reqdets">

                                    <!-- PHP to generate correct date formats -->
                                    <?php $createddate = date('d/m/Y h:i A',strtotime(str_ireplace("00:00:00.000", "", $GLOBALS['result']->request_datetime)));  ?>
                                    <?php $duedate = date('d/m/Y h:i A',strtotime(str_ireplace("00:00:00.000", "", $GLOBALS['result']->due_datetime)));  ?>
                                    <?php $completeddate = date('d/m/Y h:i A',strtotime(str_ireplace("00:00:00.000", "", $GLOBALS['result']->status_datetime)));  ?>


                                    <div class="topcol">
                                    <p><b>Description:</b><br /><?php echo $GLOBALS['result']->request_description;?></p>
                                    <p><b>Instructions:</b><br /><?php echo $GLOBALS['result']->request_instruction;?></p>
                                        <p>
                                            <h4>
                                                <b>Created: </b><span style="padding-right:100px;"><?php echo $createddate ?></span>
                                                <b>Due: </b><span style="padding-right:100px;"><?php echo $duedate?></span>
                                                <b>Completed: </b><span><?php echo $completeddate?></span>
                                            </h4>
                                        </p>
                                    </div>
                                    <div class="leftcol">
                                       
                                    </div>
                                    <div class="rightcol">

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
                            </div>
                        </div>
                      <div class="expandable-panel" id="cp-3">
                            <div class="expandable-panel-heading">
                                <h2>Example +<span class="icon-close-open"></span></h2>
                                </div>
                            <div class="expandable-panel-content">
                                <div class="wrapper">

                                </div>
                            </div>
                        </div>
                      <div class="expandable-panel" id="cp-4">
                            <div class="expandable-panel-heading">
                                <h2>Example  +<span class="icon-close-open"></span></h2>
                                </div>
                            <div class="expandable-panel-content">
                                <div class="wrapper">

                                </div>
                            </div>
                        </div>
                      <div class="expandable-panel" id="cp-5">
                            <div class="expandable-panel-heading">
                                <h2>Example  +<span class="icon-close-open"></span></h2>
                                </div>
                            <div class="expandable-panel-content">
                                <div class="wrapper">

                                </div>
                            </div>
                        </div>
                  </div>

              </div><!-- END PAGE CONTENT -->
            </div><!-- END PAGE CONTENT -->
        </div><!-- /.main-container -->
    </div>