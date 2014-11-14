<!-- James Thomas 2014 -->

<!-- Navigation -->
        <div class="left col">

            <!-- Nav Header -->
            <div class="header row">
                <h1>Options</h1>
            </div>

            <!-- Nav Content -->
            <div class="body row scroll-y">
                <ul class="listview">
                    <li class="selected">Show</li>
                    <li>Options</li>
                    <li>Add</li>
                    <li>Output</li>               
                </ul>
            </div>

            <!-- Nav Footer -->
            <div class="footer row left">
               <?php if($_SESSION['roleSecurity']->allow_request == "Y") { ?><h2><a class="header-nav" href="index.php?page=requests">BACK</a></h2><?php } ?>
            </div>

        </div>

<!-- Content -->
        <div class="right col">

            <!-- Content Header -->
            <div class="header row">
                <h1>Storyboard - DRAFT v1.0</h1>
            </div>

            <div class="topfloat row">
                <!-- Float Header with page -->
                <div class="storyheader">

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
                                $( document ).ready(function() {
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

                    <div class="wrapper">
                        <div class="wrapperleft">
                            <input type="hidden" id="statuscolor" value="<?php echo $statuscode ?>" />
                            <p style="margin-bottom:10px;">As at: <b><?php echo $date; ?></b></p>
                            <p>Request ID: <b style="font-size:18px;"><?php echo $_GET['id']; ?></b><span id="reqstatus" style="font-weight:bold; font-size:18px; padding-left:120px;"><?php echo $statuscode ?></span></p>
                            <p style="-webkit-margin-before:10px;">Type: <b style="font-size:18px;"><?php echo $scode ." - ".$rcode." - ".$fcode ?></b></p>
                        </div>
                        <div class="wrapperright">
                            <img src="/images/test.png" />
                        </div>
                    </div>
                </div>
            </div>

            <!-- Content -->
            <div id="pagerightcontent" class="body row scroll-y">
                

                <!-- Expandable Div Test -->
                <div class="expandable-panel" id="cp-1">
                    <div class="expandable-panel-heading">
                        <h2>Request Details +<span class="icon-close-open"></span></h2>
                     </div>
                    <div class="expandable-panel-content">
                     <div class="wrapper">

                     </div>
                    </div>
                </div>

                <!-- Expandable Div Test -->
                <div class="expandable-panel" id="cp-2">
                    <div class="expandable-panel-heading">
                        <h2>Example Div +<span class="icon-close-open"></span></h2>
                     </div>
                    <div class="expandable-panel-content">
                     <div class="wrapper">

                     </div>
                    </div>
                </div>

                <!-- Expandable Div Test -->
                <div class="expandable-panel" id="cp-3">
                    <div class="expandable-panel-heading">
                        <h2>Example Div +<span class="icon-close-open"></span></h2>
                     </div>
                    <div class="expandable-panel-content">
                     <div class="wrapper">

                     </div>
                    </div>
                </div>

                <!-- Expandable Div Test -->
                <div class="expandable-panel" id="cp-4">
                    <div class="expandable-panel-heading">
                        <h2>Example Div +<span class="icon-close-open"></span></h2>
                     </div>
                    <div class="expandable-panel-content">
                     <div class="wrapper">

                     </div>
                    </div>
                </div>

                <!-- Expandable Div Test -->
                <div class="expandable-panel" id="cp-5">
                    <div class="expandable-panel-heading">
                        <h2>Example Div +<span class="icon-close-open"></span></h2>
                     </div>
                    <div class="expandable-panel-content">
                     <div class="wrapper">

                     </div>
                    </div>
                </div>

            </div>

            <!-- Content Footer -->
            <div class="footer row right">
                Merit Technology 2014.
            </div>
        </div>


