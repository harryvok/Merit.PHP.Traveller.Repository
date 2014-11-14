
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
                    <p>As at:</p>
                    <h4>Request ID:</h4>
                    <h4>Type: - -</h4>
                    <h4>Status:</h4>
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
                     
                    </div>
                </div>

                <!-- Expandable Div Test -->
                <div class="expandable-panel" id="cp-2">
                    <div class="expandable-panel-heading">
                        <h2>Example Div +<span class="icon-close-open"></span></h2>
                     </div>
                    <div class="expandable-panel-content">
                     
                    </div>
                </div>

                <!-- Expandable Div Test -->
                <div class="expandable-panel" id="cp-3">
                    <div class="expandable-panel-heading">
                        <h2>Example Div +<span class="icon-close-open"></span></h2>
                     </div>
                    <div class="expandable-panel-content">
                     
                    </div>
                </div>

                <!-- Expandable Div Test -->
                <div class="expandable-panel" id="cp-4">
                    <div class="expandable-panel-heading">
                        <h2>Example Div +<span class="icon-close-open"></span></h2>
                     </div>
                    <div class="expandable-panel-content">
                     
                    </div>
                </div>

                <!-- Expandable Div Test -->
                <div class="expandable-panel" id="cp-5">
                    <div class="expandable-panel-heading">
                        <h2>Example Div +<span class="icon-close-open"></span></h2>
                     </div>
                    <div class="expandable-panel-content">
                     
                    </div>
                </div>

            </div>

            <!-- Content Footer -->
            <div class="footer row right">
                Merit Technology 2014.
            </div>
        </div>


