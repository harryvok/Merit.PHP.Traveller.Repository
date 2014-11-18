
<!DOCTYPE html>
<head>
    <title>Calendar - Actions</title>
    <link rel="stylesheet" href="/calendar/css/calendar.css" />
    <link rel="stylesheet" href="/calendar/components/bootstrap3/css/bootstrap.min.css" />
    <link rel="stylesheet" href='/calendar/components/bootstrap2/css/bootstrap.css'>
    <link rel="stylesheet" href='/calendar/components/bootstrap2/css/bootstrap-responsive.css'>
    <script src='/calendar/js/eventslist.js'></script>
</head>
<body>
    <div class="main-container" id="main-container">

        <div id="sidebar" class="sidebar responsive">
            <ul class="nav nav-list" style="top: 0px;">
                <li class="active">
                    <a href="#">
                        <i class="menu-icon fa fa-tachometer"></i>
                        <span class="menu-text"> Dashboard </span>
                    </a>
                    <b class="arrow"></b>
                </li>

                <li class="hsub ">
                    <a href="#">
                        <i class="menu-icon fa fa-desktop"></i>
                        <span class="menu-text"> Visa Registration </span>
                    </a>
                    <b class="arrow"></b>
                </li>

                <li class="hsub " onclick="getPaging(this.id);">
                    <a href="#">
                    <i class="menu-icon fa fa-fighter-jet"></i>
                    <span class="menu-text">Permits</span>
                    </a>
                    <b class="arrow"></b>
                </li>

                <li class="hsub " onclick="getPaging(this.id);">
                    <a href="#">
                    <i class="menu-icon fa fa-envelope"></i>
                    <span class="menu-text">Messages</span>
                    </a>
                    <b class="arrow"></b>
                </li>

                <li class="hsub" onclick="getPaging(this.id);">
                    <a href="#">
                    <i class="menu-icon fa fa-sign-out"></i>
                    <span class="menu-text">Log Out</span>
                    </a>
                    <b class="arrow"></b>
                </li>

                <li class="hsub">
                    <a href="#" class="dropdown-toggle">
                        <i class="menu-icon fa fa-pencil-square-o"></i>
                        <span class="menu-text"> Administration </span>
                    </a>
                    <b class="arrow"></b>
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
            <div class="">
                    <div id="homemaincontent">
                    
                                <div id="button-content">
                                    <div class="btn-group1">
                                        <table>
                                            <tr>
                                                <td onclick="taskselection_unpro();" style="cursor: pointer; width:5%;">
                                                    <div id="unpro_seldiv"><small class="cal-events-num badge3 badge-important1 pull-left">&nbsp;&nbsp;</small> &nbsp;&nbsp;<strong> Open </strong> </div>
                                                </td>
                                                <td onclick="taskselection_unfin();" style="cursor: pointer; width: 5%;">
                                                    <div id="unfin_seldiv"><small class="cal-events-num badge badge-important pull-left">&nbsp;&nbsp;</small> &nbsp;&nbsp;<strong> Completed</strong></div>
                                                </td>
                                                <td onclick="taskselection_unapp();" style="cursor: pointer; width: 5%;">
                                                    <div id="unapp_seldiv"><small class="cal-events-num badge2 badge-important1 pull-left">&nbsp;&nbsp;</small>&nbsp;&nbsp; <strong> Suspended </strong> </div>
                                                </td>                               
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <div>
                                    <iframe id="calendar-frame" width="1270" height="650" frameborder="1" scrolling="no" style="margin-left:20%;"> 
            </iframe>
                                </div>
                            </div>
                       
            </div><!-- /.main-content -->
        </div><!-- /.main-container -->
    </div>     

 
    <h3><?php if($_SESSION['roleSecurity']->allow_request == "Y") { ?><a class="header-nav" href="index.php?page=requests" style="color:black !important">BACK</a></><?php } ?></h3>

</body>
