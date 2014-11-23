
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
        <style>
        .datec {
            font-size: 22px;
            font-weight: 400;
            font-family: "Open Sans","Helvetica Neue",Helvetica,Arial,sans-serif;
        }
         .badge1 {
            display: inline-block;
            min-width: 10px;
            padding: 3px 7px;
            font-size: 12px;
            font-weight: 700;
            color: #fff;
            line-height: 1;
            vertical-align: baseline;
            white-space: nowrap;
            text-align: center;
            background-color: red;
            border-radius: 10px;
        }

        .badge2 {
            display: inline-block;
            min-width: 10px;
            padding: 3px 7px;
            font-size: 12px;
            font-weight: 700;
            color: #fff;
            line-height: 1;
            vertical-align: baseline;
            white-space: nowrap;
            text-align: center;
            background-color: green;
            border-radius: 10px;
        }

        .badge3 {
            display: inline-block;
            min-width: 10px;
            padding: 3px 7px;
            font-size: 12px;
            font-weight: 700;
            color: #fff;
            line-height: 1;
            vertical-align: baseline;
            white-space: nowrap;
            text-align: center;
            background-color: #FFCC00;
            border-radius: 10px;
        } 
    </style>
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
            <h3><?php if($_SESSION['roleSecurity']->allow_request == "Y") { ?><a class="header-nav" href="index.php?page=requests" style="color:black !important">BACK</a></><?php } ?></h3>
        </div>

        <div class="main-content">
            <div class="breadcrumbs" id="breadcrumbs">  
                <div style="float:left">
                    <ul class="breadcrumb">
                        <li>
                            <i class="ace-icon fa  fa-tachometer"></i>
                            <a href="#">Action Intray</a>
                        </li>
                        <li class="active"><a href="#">Calendar</a></li>
                    </ul>
                </div>
                <div style="float:right">
                    <table>
                        <tr>
                            <td onclick="taskselection_unpro();" style="cursor: pointer; width:140px;">
                                <div id="color_open"><span class="badge1">&nbsp;&nbsp;</span> &nbsp;<strong> Open </strong> </div>
                            </td>
                            <td onclick="taskselection_unfin();" style="cursor: pointer;  width:140px;">
                                <div id="color_completed"><span class="badge2">&nbsp;&nbsp;</span> &nbsp;<strong> Completed</strong></div>
                            </td>
                            <td onclick="taskselection_unapp();" style="cursor: pointer; width:140px;">
                                <div id="color_suspended"><span class="badge3">&nbsp;&nbsp;</span>&nbsp; <strong> Suspended </strong> </div>
                            </td>                               
                        </tr>
                    </table>
                </div>  
            </div>
            <div id="homemaincontent">             
                <div>
                    <script type="text/javascript">
                        $(document).ready(function () {
                            var monthNames = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
                            var date_cal = new Date();
                            date_cal.setMonth(date_cal.getMonth());
                            document.getElementById('calendar-frame').src = '/calendar/calendar_days.html?date=' + ("0" + (date_cal.getMonth() + 1)).slice(-2) + "-" + date_cal.getFullYear();
                            document.getElementById('cal_date').innerHTML = monthNames[date_cal.getMonth()] + " " + date_cal.getFullYear();
                            function call_calendar() {
                                //document.getElementById('loader1').style.display = 'block';
                                //$('#calendar-frame').on('load', function () {
                                //    $('#loader1').hide();
                                //});
                                //document.getElementById('calendar-graphbutton').innerHTML = '<button class="btn btn-primary" data-calendar-view="month" onclick="call_graph();">Graph</button>';
                                //if (yearbutton == 1) {
                                    document.getElementById('calendar-frame').src = '/Calendar_Months?date=' + ("0" + (date_cal.getMonth() + 1)).slice(-2) + "-" + date_cal.getFullYear() ;
                                //}
                                //else {
                                //    document.getElementById('calendar-frame').src = '@Url.Content("~/Dashboard/Calendar_Days?date=")' + ("0" + (date_cal.getMonth() + 1)).slice(-2) + "-" + date_cal.getFullYear() + '&unfin=' + unfin_butcheck + '&unapp=' + unapp_butcheck + '&unpro=' + unpro_butcheck + '&finis=' + finis_butcheck;

                                //}
                                document.getElementById('cal_date').innerHTML = monthNames[date_cal.getMonth()] + " " + date_cal.getFullYear();
                                //document.getElementById('color_bar').style.display = 'block';
                                ////document.getElementById('nextprev_butgroup').style.display = 'block';
                                ////document.getElementById('calendar-graphbutton').style.display = 'none';
                                ////document.getElementById('yeamonth_group').style.display = 'block';
                                ////document.getElementById('cal_date').style.display = 'block';
                                //document.getElementById('calend_div').style.display = 'block';
                                //document.getElementById('graph_div').style.display = 'none';
                            }

                        });
                    </script>
                    
                    <div class="pull-right1 form-inline" style="margin-top:10px;">
                        <div style="float:left;margin-left:10px"><span id="cal_date" class="datec"></span></div>
                        <div style="float:right;margin-right:10px;">
                        <div class="btn-group">
                            <button class="btn btn-primary" data-calendar-nav="prev" id="prev_button"><< Prev</button>
                            <button class="btn" data-calendar-nav="today" id="today_button">Today</button>
                            <button class="btn btn-primary" data-calendar-nav="next" id="next_button">Next >></button>
                        </div>
                        <div class="btn-group">
                            <button class="btn btn-warning" data-calendar-view="year">Year</button>
                            <button class="btn btn-warning active" data-calendar-view="month">Month</button>

                        </div></div>
                    </div>
                    <iframe id="calendar-frame" src="" width="90%" height="510px" scrolling="no" frameborder="1" style="margin-left:65px;margin-top:15px;"></iframe>
                </div>
            </div>                       
        </div><!-- /.main-container -->
    </div>     

 
    

</body>
