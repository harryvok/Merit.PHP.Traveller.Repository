
var size_calendar = 0;

function getcalendar_days(date) {
     var j = 0;
    title[j] =  "Dummy";
    url[j] = "/PermitIntray";
    classes[j] = "event-warning1";
    start[j] = date;
    end[j] = date;
    j++;
    size_calendar++;
}

function getcalendar_month(date) {
    var j = 0;
    title[j] = "Dummy";
    url[j] = "/PermitIntray";
    classes[j] = "event-warning1";
    start[j] = date;
    end[j] = date;
    j++;
    size_calendar++;
}



    //    function getcalendar_days(date, unfin, unapp, unpro, finis) {
    //    $.ajax({
    //        type: "GET",
    //        url: "../../PermitIntray/getCalendarDetailsdays",
    //        data: {
    //            Date: date
    //        },
    //        async: false,
    //        success: function (result) {
    //            //alert(result);
    //            var data1 = JSON.parse(result);
    //            var data2 = data1.Data;
    //            //alert('1');
    //            var j = 0;

    //            title[j] =  "Dummy";
    //            url[j] = "/PermitIntray";
    //            classes[j] = "event-warning1";
    //            start[j] = "10-01-1770";
    //            end[j] = "10-01-1770";
    //            j++;
    //            size_calendar++;

    //            //alert(data2.Records.length);
    //            var date1 = date.split('-');
    //            //alert(datefinal);
    //            for (var i = 0; i < data2.Records.length; i++) {
    //                var data3 = data2.Records[i];
    //                if (parseInt(data3.unapproval) == 0 && parseInt(data3.unwork) == 0 && parseInt(data3.unprocess) == 0 && parseInt(data3.finpermit) == 0)
    //                {
    //                }
    //                else {
    //                    var datefinal = date1[1] + '-' + data3.Day + '-' + date1[2];
    //                    if (parseInt(data3.unapproval) > 0 && unapp == 0)
    //                    {
    //                        //alert("Day:"+data3.Day);
    //                        //alert(1);
    //                        title[j] = parseInt(data3.unapproval) + " - Unallocated Approval";
    //                        url[j] = "/PermitIntray";
    //                        classes[j] = "event-warning1";
    //                        start[j] = datefinal;
    //                        end[j] = datefinal;
    //                        j++;
    //                        size_calendar++;
    //                    }
    //                    if (parseInt(data3.unwork) > 0 && unfin == 0) {
    //                        //alert("Day:" + data3.Day);
    //                        //alert(2);
    //                        title[j] = parseInt(data3.unwork) + " - Unfinished";
    //                        url[j] = "/PermitIntray";
    //                        classes[j] = "event-warning";
    //                        start[j] = datefinal;
    //                        end[j] = datefinal;
    //                        j++;
    //                        size_calendar++;
    //                    }
    //                    if (parseInt(data3.unprocess) > 0 && unpro == 0) {
    //                        //alert("Day:" + data3.Day);
    //                        //alert(3);
    //                        title[j] = parseInt(data3.unprocess) + " - Unallocated Processing";
    //                        url[j] = "/PermitIntray";
    //                        classes[j] = "event-warning2";
    //                        start[j] = datefinal;
    //                        end[j] = datefinal;
    //                        j++;
    //                        size_calendar++;
    //                    }
    //                    if (parseInt(data3.finpermit) > 0 && finis == 0) {
    //                        //alert("Day:" + data3.Day);
    //                        //alert(4);
    //                        title[j] = parseInt(data3.finpermit) + " - Finished";
    //                        url[j] = "/PermitIntray";
    //                        classes[j] = "event-warning3";
    //                        start[j] = datefinal;
    //                        end[j] = datefinal;
    //                        j++;
    //                        size_calendar++;
    //                    }
    //                }
    //            }
    //        }
    //    });
    //}

    //    function getcalendar_month(date, unfin, unapp, unpro, finis) {

    //        $.ajax({
    //            type: "GET",
    //            url: "../../PermitIntray/getCalendarDetailsmonths",
    //            data: {
    //                Date: date
    //            },
    //            async: false,
    //            success: function (result) {
    //                //alert(result);
    //                var data1 = JSON.parse(result);
    //                var data2 = data1.Data;
    //                //alert('1');
    //                var j = 0;

    //                title[j] = "Dummy";
    //                url[j] = "/PermitIntray";
    //                classes[j] = "event-warning1";
    //                start[j] = "10-01-1770";
    //                end[j] = "10-01-1770";
    //                j++;
    //                size_calendar++;

    //                //alert(data2.Records.length);
    //                for (var i = 0; i < data2.Records.length; i++) {
    //                    var data3 = data2.Records[i];
    //                    if (parseInt(data3.unapproval) == 0 && parseInt(data3.unwork) == 0 && parseInt(data3.unprocess) == 0 && parseInt(data3.finpermit) == 0) {
    //                    }
    //                    else {
    //                        if (parseInt(data3.unapproval) > 0 && unapp == 0) {
    //                            //alert("Day:"+data3.Day);
    //                            //alert(1);
    //                            title[j] = parseInt(data3.unapproval) + " - Unallocated Approval";
    //                            url[j] = "/PermitIntray";
    //                            classes[j] = "event-warning1";
    //                            start[j] = data3.Month + "-01" + "-2014";
    //                            end[j] = data3.Month + "-01" + "-2014";
    //                            j++;
    //                            size_calendar++;
    //                        }
    //                        if (parseInt(data3.unwork) > 0 && unfin == 0) {
    //                            //alert("Day:" + data3.Day);
    //                            //alert(2);
    //                            title[j] = parseInt(data3.unwork) + " - Unfinished";
    //                            url[j] = "/PermitIntray";
    //                            classes[j] = "event-warning";
    //                            start[j] = data3.Month + "-01" + "-2014";
    //                            end[j] = data3.Month + "-01" + "-2014";
    //                            j++;
    //                            size_calendar++;
    //                        }
    //                        if (parseInt(data3.unprocess) > 0 && unpro == 0) {
    //                            //alert("Day:" + data3.Day);
    //                            //alert(3);
    //                            title[j] = parseInt(data3.unprocess) + " - Unallocated Processing";
    //                            url[j] = "/PermitIntray";
    //                            classes[j] = "event-warning2";
    //                            start[j] = data3.Month + "-01" + "-2014";
    //                            end[j] = data3.Month + "-01" + "-2014";
    //                            j++;
    //                            size_calendar++;
    //                        }
    //                        if (parseInt(data3.finpermit) > 0 && finis == 0) {
    //                            //alert("Day:" + data3.Day);
    //                            //alert(4);
    //                            title[j] = parseInt(data3.finpermit) + " - Finished";
    //                            url[j] = "/PermitIntray";
    //                            classes[j] = "event-warning3";
    //                            start[j] = data3.Month + "-01" + "-2014";
    //                            end[j] = data3.Month + "-01" + "-2014";
    //                            j++;
    //                            size_calendar++;
    //                        }
    //                    }
    //                }
    //            }
    //        });



    //     /*$.ajax({
    //        type: "GET",
    //        url: "PermitIntray/getCalendarDetailsmonths",
    //        data: {
    //            Date: date
    //        },
    //        async: false,
    //        success: function (result) {
    //            alert(result);                                  */
    //            /*var data1 = JSON.parse(result);
    //            var data2 = data1.Data;
    //            for (var i = 0; i < data2.Records.length; i++) {
    //                var data3 = data2.Records[i];
    //                title[size_calendar] = data3.varnRef + ' - ' + data3.surname + ' ' + data3.givenName + ' (' + data3.PermitClass + ' )';
    //                url[size_calendar] = "http://www.google.com";
    //                classes[size_calendar] = "event-success";
    //                start[size_calendar] = data3.DateLodged;
    //                end[size_calendar] = data3.DateLodged;
    //                size_calendar++;  
    //            }*/
    //    /*    }
    //    }); */
    //}
