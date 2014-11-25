
<!DOCTYPE html>
<head>
    <title>Calendar - Actions</title>
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">

</head>
<body>
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
            </div>
            <div id="homemaincontent">             
                <div>
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
                        <script type="text/javascript">
                            var monthNames = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
                            var date_cal = new Date();
                            $(document).ready(function () {
                                date_cal.setMonth(date_cal.getMonth());
                                document.getElementById('calendar-frame').src = 'calendar/calendar_days.html?date=' + ("0" + (date_cal.getMonth() + 1)).slice(-2) + "-" + date_cal.getFullYear();
                                document.getElementById('cal_date').innerHTML = monthNames[date_cal.getMonth()] + " " + date_cal.getFullYear();                                
                            });

                            function call_calendar() {
                                document.getElementById('calendar_div').style.display = 'block';
                                document.getElementById('graph_div').style.display = 'none';
                                document.getElementById('calendar-frame').src = 'calendar/calendar_days.html?date=' + ("0" + (date_cal.getMonth() + 1)).slice(-2) + "-" + date_cal.getFullYear();
                                document.getElementById('cal_date').innerHTML = monthNames[date_cal.getMonth()] + " " + date_cal.getFullYear();
                            }

                            function prev_click() {
                                date_cal.setMonth(date_cal.getMonth() - 1);
                                document.getElementById('cal_date').innerHTML = monthNames[date_cal.getMonth()] + " " + date_cal.getFullYear();
                                document.getElementById('calendar-frame').src = 'calendar/calendar_days.html?date=' + ("0" + (date_cal.getMonth() + 1)).slice(-2) + "-" + date_cal.getFullYear();
                            }

                            function next_click() {
                                date_cal.setMonth(date_cal.getMonth() + 1);
                                document.getElementById('cal_date').innerHTML = monthNames[date_cal.getMonth()] + " " + date_cal.getFullYear();
                                document.getElementById('calendar-frame').src = 'calendar/calendar_days.html?date=' + ("0" + (date_cal.getMonth() + 1)).slice(-2) + "-" + date_cal.getFullYear();
                            }

                            function call_year() {
                                document.getElementById('cal_date').innerHTML = date_cal.getFullYear();
                                document.getElementById('calendar-frame').src = 'calendar/calendar_months.html?date=' + ("0" + (date_cal.getMonth() + 1)).slice(-2) + "-" + date_cal.getFullYear();
                                document.getElementById('nextprev_butgroup').innerHTML = '<button class="btn btn-primary" data-calendar-nav="prev" id="prev_button" onclick="prevYear_click();"><< Prev</button><button class="btn" data-calendar-nav="today" id="today_button" onclick="call_today();">Today</button><button class="btn btn-primary" data-calendar-nav="next" id="next_button" onclick="nextYear_click();">Next >></button>';
                            }

                            function prevYear_click() {
                                date_cal.setYear(date_cal.getFullYear() - 1);
                                document.getElementById('cal_date').innerHTML = date_cal.getFullYear();
                                document.getElementById('calendar-frame').src = 'calendar/calendar_months.html?date=' + ("0" + (date_cal.getMonth() + 1)).slice(-2) + "-" + date_cal.getFullYear();
                            }

                            function nextYear_click() {
                                date_cal.setYear(date_cal.getFullYear() + 1);
                                document.getElementById('cal_date').innerHTML = date_cal.getFullYear();
                                document.getElementById('calendar-frame').src = 'calendar/calendar_months.html?date=' + ("0" + (date_cal.getMonth() + 1)).slice(-2) + "-" + date_cal.getFullYear();
                            }

                            function call_month() {
                                document.getElementById('calendar-frame').src = 'calendar/calendar_days.html?date=' + ("0" + (date_cal.getMonth() + 1)).slice(-2) + "-" + date_cal.getFullYear();
                                document.getElementById('cal_date').innerHTML = monthNames[date_cal.getMonth()] + " " + date_cal.getFullYear();
                                document.getElementById('nextprev_butgroup').innerHTML = '<button class="btn btn-primary" data-calendar-nav="prev" id="prev_button" onclick="prev_click();"><< Prev</button><button class="btn" data-calendar-nav="today" id="today_button" onclick="call_today();">Today</button><button class="btn btn-primary" data-calendar-nav="next" id="next_button" onclick="next_click();">Next >></button>';                           
                            }

                            function call_today() {
                                date_cal = new Date();
                                date_cal.setMonth(date_cal.getMonth());
                                document.getElementById('cal_date').innerHTML = monthNames[date_cal.getMonth()] + " " + date_cal.getFullYear();
                                document.getElementById('calendar-frame').src = 'calendar/calendar_days.html?date=' + ("0" + (date_cal.getMonth() + 1)).slice(-2) + "-" + date_cal.getFullYear();
                                document.getElementById('nextprev_butgroup').innerHTML = '<button class="btn btn-primary" data-calendar-nav="prev" id="prev_button" onclick="prev_click();"><< Prev</button><button class="btn" data-calendar-nav="today" id="today_button" onclick="call_today();">Today</button><button class="btn btn-primary" data-calendar-nav="next" id="next_button" onclick="next_click();">Next >></button>';
                            }

                            function call_graph() {
                                document.getElementById('calendar-graphbutton').innerHTML = '<button class="btn btn-primary" data-calendar-view="year" onclick="call_calendar();">Calendar</button>';
                                document.getElementById('calendar-frame').src = '/Highcharts-4.0.4/examples/column-stacked-and-grouped/index.htm';
                                document.getElementById('calendar_div').style.display = 'none';
                                document.getElementById('graph_div').style.display = 'block';
                            }

                            function open_requests() {
                                window.location = "index.php?page=actions";
                            }

                            function completed_requests() {
                                window.location = "index.php?page=actions";
                            }

                            function suspended_requests() {
                                window.location = "index.php?page=actions";
                            }

                        </script>                                        
                        <div class="pull-right1 form-inline" style="margin-top:10px;" id="calendar_div">
                            <div style="float:left;margin-left:10px">
                                <div class="btn-group" id="Div1">
                                    <button class="btn btn-primary" data-calendar-view="month" onclick="call_graph();">Graph</button>
                                </div>
                                <div class="btn-group">
                                    <button class="btn btn-warning" data-calendar-view="year" onclick="call_year();">Year</button>
                                    <button class="btn btn-warning active" data-calendar-view="month" onclick="call_month();">Month</button>
                                </div>
                                <span id="cal_date" class="datec"></span>
                                <div class="btn-group" id="nextprev_butgroup">
                                    <button class="btn btn-primary" data-calendar-nav="prev" id="prev_button" onclick="prev_click();"><< Prev</button>
                                    <button class="btn" data-calendar-nav="today" id="today_button" onclick="call_today();">Today</button>
                                    <button class="btn btn-primary" data-calendar-nav="next" id="next_button" onclick="next_click();">Next >></button>
                                </div>                               
                            </div>
                            <div style="float:right">
                                <table>
                                    <tr>
                                        <td onclick="open_requests();" style="cursor: pointer; width:140px;">
                                            <div id="color_open"><span class="badge1">&nbsp;&nbsp;</span> &nbsp;<strong> Open </strong> </div>
                                        </td>
                                        <td onclick="completed_requests();" style="cursor: pointer;  width:140px;">
                                            <div id="color_completed"><span class="badge2">&nbsp;&nbsp;</span> &nbsp;<strong> Completed</strong></div>
                                        </td>
                                        <td onclick="suspended_requests();" style="cursor: pointer; width:140px;">
                                            <div id="color_suspended"><span class="badge3">&nbsp;&nbsp;</span>&nbsp; <strong> Suspended </strong> </div>
                                        </td>                               
                                    </tr>
                                </table>
                            </div>  
                        </div>
                        <div class="pull-right1 form-inline" id="graph_div" style="display:none; margin-top:10px;">
                            <div class="btn-group" id="calendar-graphbutton" style="float:right;margin-right:10px;">
                                <button class="btn btn-primary" data-calendar-view="month" onclick="call_calendar();">Calendar</button>
                            </div>
                            <span>&nbsp;&nbsp;</span>
                            <span class="datec"> My Pending Tasks Graph </span>
                            <br /><br />
                        </div>
                    <iframe id="calendar-frame" src="" width="90%" height="560px" scrolling="no" frameborder="0" style="margin-left:65px;margin-top:15px;"></iframe>
                </div>
            </div>                       
        </div><!-- /.main-container -->
    </div>     
</body>
