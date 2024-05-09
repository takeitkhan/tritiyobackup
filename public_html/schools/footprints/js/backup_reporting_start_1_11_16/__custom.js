jQuery(document).ready(function ($) {
    $.noConflict();

    commonFn($);
    ajaxFn($);
    ajaxImgFn($);
    ajaxDataGridFn($);
    valByAtt($);
    ajaxFnCheck($);
    ajaxFnRoutesCheck($);
    ajaxFnUserCheck($);
    ajaxResultsFn($);
    ajaxResultModifier($);
    Pager();
});
var delay = (function () {
    var timer = 0;
    return function (callback, ms) {
        clearTimeout(timer);
        timer = setTimeout(callback, ms);
    };
})();

/**
 *
 * @param divid
 */
printdiv =
    function (divname) {
        var prtContent = document.getElementById(divname);
        var WinPrint = window.open('', '', 'left=0,top=0,width=1200,height=900,toolbar=0,scrollbars=0,status=0');

        WinPrint.document.write('<html><head><title></title>');
        WinPrint.document.write('<link rel=\"stylesheet\" href=\"http://localhost/campus/footprints/css/print.css\" type=\"text/css\" media=\"print\"/>');
        WinPrint.document.write('</head><body >');
        WinPrint.document.write('<div style=\"width: 20%; float: left; text-align: left;\"><img src=\"http://www.satsangatapobanhighschool.edu.bd/uploads/settings/Satsango-Logo.png\" width=\"150px\" height=\"\" /></div>');
        WinPrint.document.write('<div style=\"width: 70%; float: left; text-align: left; font-family: kalpurush; margin-top: 10px;\"><h1 style=\"font-size: 30px; margin: 0px; padding: 0px;\">সৎসঙ্গ তপোবন উচ্চ বিদ্যালয়</h1><span style=\"font-size: 15px;\">ইআইআইএন # ১১৪১১৮, পাকুটিয়া, ঘাটাইল, টাঙ্গাইল</span></div><div style=\"clear: both; margin-bottom: 2px;\">&nbsp;</div>');
        WinPrint.document.write(prtContent.innerHTML);
        WinPrint.document.write('</body></html>');
        WinPrint.document.close();
        WinPrint.focus();
        WinPrint.print();
        WinPrint.close();
    };
/**
 *
 * @param tableName
 * @param itemsPerPage
 * @constructor
 */
Pager =
    function (tableName, itemsPerPage) {
        this.tableName = tableName;
        this.itemsPerPage = itemsPerPage;
        this.currentPage = 1;
        this.pages = 0;
        this.inited = false;

        this.showRecords = function (from, to) {
            var rows = document.getElementById(tableName).rows;
            // i starts from 1 to skip table header row
            for (var i = 1; i < rows.length; i++) {
                if (i < from || i > to)
                    rows[i].style.display = 'none';
                else
                    rows[i].style.display = '';
            }
        }

        this.showPage = function (pageNumber) {
            if (!this.inited) {
                alert("not inited");
                return;
            }

            var oldPageAnchor = document.getElementById('pg' + this.currentPage);
            oldPageAnchor.className = 'pg-normal';

            this.currentPage = pageNumber;
            var newPageAnchor = document.getElementById('pg' + this.currentPage);
            newPageAnchor.className = 'pg-selected';

            var from = (pageNumber - 1) * itemsPerPage + 1;
            var to = from + itemsPerPage - 1;
            this.showRecords(from, to);
        }

        this.prev = function () {
            if (this.currentPage > 1)
                this.showPage(this.currentPage - 1);
        }

        this.next = function () {
            if (this.currentPage < this.pages) {
                this.showPage(this.currentPage + 1);
            }
        }

        this.init = function () {
            var rows = document.getElementById(tableName).rows;
            var records = (rows.length - 1);
            this.pages = Math.ceil(records / itemsPerPage);
            this.inited = true;
        }

        this.showPageNav = function (pagerName, positionId) {
            if (!this.inited) {
                alert("not inited");
                return;
            }
            var element = document.getElementById(positionId);

            var pagerHtml = '<span onclick="' + pagerName + '.prev();" class="pg-normal"> &#171 Prev </span> | ';
            for (var page = 1; page <= this.pages; page++)
                pagerHtml += '<span id="pg' + page + '" class="pg-normal" onclick="' + pagerName + '.showPage(' + page + ');">' + page + '</span> | ';
            pagerHtml += '<span onclick="' + pagerName + '.next();" class="pg-normal"> Next &#187;</span>';

            element.innerHTML = pagerHtml;
        }
    };


/**
 *
 * @param $
 */
commonFn =
    function ($) {
        $('#date').datetimepicker({
            timepicker: false,
            //format: 'Y-m-d',
            format: 'm/d/Y'
        });
        $('#date1').datetimepicker({
            timepicker: false,
            format: 'm/d/Y'
        });
        $('#date2').datetimepicker({
            timepicker: false,
            format: 'm/d/Y'
        });
        $('#date3').datetimepicker({
            timepicker: false,
            format: 'm/d/Y'
        });
        $('#date_mask').datetimepicker({
            timepicker: false,
            mask: true // '9999/19/39 29:59' - digit is the maximum possible for a cell
        });
        $('#datewithtime').datetimepicker({
            timepicker: true,
            format: 'm/d/Y h:m'
        });
    };
/**
 *
 * @param $
 * @param id
 * @param attname
 */
valByAtt =
    function ($, id, attname) {
        var p = $("table#" + id).attr("dataid");
        return p;
    };

/**
 *
 * @param $
 * @param btnid
 * @param routes
 * @param fieldval
 * @param showondiv
 */
ajaxFnUserCheck =
    function ($, btnid, routes, fieldval, showondiv) {
        $(btnid).click(function () {
            delay(function () {
                var fval = $(fieldval).val();
                //var isexistscheck = baseurl + 'usersexists/' + fval + '?userpage=true';
                $.ajax({
                    url: baseurl + routes + '/' + fval + '?userpage=true',
                    success: function (data) {
                        console.log(data.msg);
                        if (data.status == 0)
                        //$(showondiv).html(data.msg);
                            alert(data.msg);
                        else
                            window.location.href = baseurl + 'overview/' + fval + '?userpage=true';
                    }
                });
            }, 200);
        });
    };

/**
 *
 * @param $
 * @param btnid
 * @param routes
 */
ajaxResultsFnCorrect =
    function ($, routes, setvaluri) {
        $.ajax({
            url: routes,
            success: function (data) {
                if (data.status == 0) {
                    var msg = data.msg;
                    //alert(msg);
                    window.location.href = setvaluri + '&msg=' + msg;
                    //$('#loadmessagehere').load(uriss + ' #loadmessagehere');
                } else {
                    var msg = data.msg;
                    //alert(msg);
                    window.location.href = setvaluri + '&msg=' + msg;
                    //$('#loadmessagehere').load(uriss + ' #loadmessagehere');
                }
            },
            error: function (data) {
                var msg = data.msg;
                //alert(msg);
                window.location.href = setvaluri + '&msg=' + msg;
                //$('#loadmessagehere').load(uriss + ' #loadmessagehere');
            }
        });
    };
/**
 *
 * @param $
 * @param btnid
 * @param routes
 */
ajaxResultsFn =
    function ($, formid, routes, setvalues) {
        $(formid).submit(function () {
            uriss = baseurl + setvalues;
            $.ajax({
                type: "POST",
                dataType: 'json',
                url: baseurl + routes,
                cache: false,
                data: $(formid).serialize(),
                success: function (data) {
                    if (data.status == 0) {
                        var msg = data.msg;
                        var exam = data.eid;
                        var classid = data.cid;
                        var sid = data.sid;
                        var subid = data.subid;
                        var sgid = data.sgid;
                        window.location.href = uriss + '?examm=' + exam + '&classs=' + classid + '&section=' + sid + '&subject=' + subid + '&groupp=' + sgid + '&msg=' + msg;
                        //$('#loadmessagehere').load(uriss + ' #loadmessagehere');
                    } else {
                        var msg = data.msg;
                        var exam = data.eid;
                        var classid = data.cid;
                        var sid = data.sid;
                        var subid = data.subid;
                        var sgid = data.sgid;
                        window.location.href = uriss + '?examm=' + exam + '&classs=' + classid + '&section=' + sid + '&subject=' + subid + '&groupp=' + sgid + '&msg=' + msg;
                        //$('#loadmessagehere').load(uriss + ' #loadmessagehere');
                    }
                },
                error: function (data) {
                    var msg = data.msg;
                    var exam = data.eid;
                    var classid = data.cid;
                    var sid = data.sid;
                    var subid = data.subid;
                    var sgid = data.sgid;
                    window.location.href = uriss + '?examm=' + exam + '&classs=' + classid + '&section=' + sid + '&subject=' + subid + '&groupp=' + sgid + '&msg=' + msg;
                    //$('#loadmessagehere').load(uriss + ' #loadmessagehere');
                }
            });
        });
    };
ajaxResultModifier =
    function ($, fieldid, routes) {
        $(fieldid).keyup(function () {
            var dataid = $(this).attr('data-id');
            var stdid = $('#stdid_' + dataid).val();
            var isabsval = $('#isabsent_' + dataid).val();
            var written = $('#written_' + dataid).val();
            var mcq = $('#mcq_' + dataid).val();
            var practical = $('#practical_' + dataid).val();
            var listening = $('#listening_' + dataid).val();
            var writting = $('#writting_' + dataid).val();
            var speaking = $('#speaking_' + dataid).val();
            var reading = $('#reading_' + dataid).val();

            //$('#marksmodified').html(dataid);
            $.ajax({
                type: "POST",
                dataType: 'json',
                url: baseurl + routes + '/' + stdid + '?dataid=' + dataid + '&absent=' + isabsval + '&written=' + written + '&mcq=' + mcq + '&practical=' + practical + '&listening=' + listening + '&writting=' + writting + '&speaking=' + speaking + '&reading=' + reading,
                cache: false,
                //data: dataid,
                success: function (data) {
                    var custommsg = 'Mark of ' + stdid + ' modified successfully.';
                    $('#marksmodified').html(custommsg);
                },
                error: function () {
                    $('#marksmodified').html('Something Went Wrong');
                }
            });
            //
        });
    };
/**
 *
 * @param $
 * @param fieldid
 * @param routes
 * @param showondiv
 */
ajaxFnCheck =
    function ($, fieldid, routes, showondiv) {
        $(fieldid).keyup(function () {
            delay(function () {
                var fval = $(fieldid).val();
                //var ifexists = fval.toLowerCase().replace(/[^a-z0-9\s]/gi, '').replace(/[_\s]/g, '');
                $.ajax({
                    url: baseurl + routes + '/' + fval,
                    //url: baseurl + 'check/' + ifexists,
                    success: function (data) {
                        $(showondiv).html(data.msg);
                        //alert(fval);
                        $('#urlsuggestionsddd').val(fval);
                        // if you want to replace the data in div, use .html()
                        //or if you want to append the data user .append()
                    }
                });
            }, 1000);
        });
    };

/**
 *
 * @param $
 * @param fieldid
 * @param routes
 * @param showondiv
 */
ajaxFnCheckShowInstant =
    function ($, fieldid, routes, showondiv, showonfield) {
        $(fieldid).keyup(function () {
            delay(function () {
                var fval = $(fieldid).val();
                //var ifexists = fval.toLowerCase().replace(/[^a-z0-9\s]/gi, '').replace(/[_\s]/g, '');
                $.ajax({
                    url: baseurl + routes + '/' + fval,
                    //url: baseurl + 'check/' + ifexists,
                    success: function (data) {
                        $(showondiv).html(data.msg);
                        //alert(fval);
                        $(showonfield).val(fval);
                        // if you want to replace the data in div, use .html()
                        //or if you want to append the data user .append()
                    }
                });
            }, 1000);
        });
    };
/**
 *
 * @param $
 * @param fieldid
 * @param routes
 * @param showondiv
 */
ajaxFnCheckShowInstant =
    function ($, fieldid, routes, showondiv, showonfield) {
        $(fieldid).keyup(function () {
            delay(function () {
                var fval = $(fieldid).val();
                //var ifexists = fval.toLowerCase().replace(/[^a-z0-9\s]/gi, '').replace(/[_\s]/g, '');
                $.ajax({
                    url: baseurl + routes + '/' + fval,
                    //url: baseurl + 'check/' + ifexists,
                    success: function (data) {
                        $(showondiv).html(data.msg);
                        //alert(fval);
                        $(showonfield).val(fval);
                        // if you want to replace the data in div, use .html()
                        //or if you want to append the data user .append()
                    }
                });
            }, 1000);
        });
    };

/**
 *
 * @param $
 * @param fieldid
 * @param routes
 * @param showondiv
 * @param showonfield
 */
ajaxFnRoutesCheck =
    function ($, fieldid, routes, showondiv, showonfield) {
        $(fieldid).keyup(function () {
            delay(function () {
                var fval = $(fieldid).val();
                var ifexists = fval.toLowerCase().replace(/[^a-z0-9\s]/gi, '').replace(/[_\s]/g, '');
                $(showonfield).val(ifexists);
                $(showonfield).html(ifexists);
                $.ajax({
                    url: baseurl + routes + '/' + ifexists,
                    //url: baseurl + 'check/' + ifexists,
                    success: function (data) {
                        $(showondiv).html(data.msg);
                        // if you want to replace the data in div, use .html()
                        //or if you want to append the data user .append()
                    }
                });
            }, 1000);
        });
    };
/**
 *
 * @param $
 * @param formid
 * @param routes
 *
 */
ajaxFn =
    function ($, formid, routes) {
        //$('#basicInformationForm').bootstrapValidator({
        $(formid).bootstrapValidator({
            excluded: false,
            //excluded: [':disabled', ':hidden', ':not(:visible)'],
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            live: 'enabled',
            message: 'This value is not valid',
            //submitButtons: ,
            submitHandler: function (validator, form, submitButton) {
                //var url = baseurl + 'modifybasicinformation';
                var url = baseurl + routes;
                $.ajax({
                    type: "post",
                    url: url,
                    cache: false,
                    //data: $('#basicInformationForm').serialize(),

                    data: $(form).serialize(),
                    success: function (data) {
                        console.log(data);
                        $('.msgbox').html(data.msg).show().addClass('alert-success').delay(2000).fadeOut();
                        //alert();
                        window.location.reload(true);
                    },
                    error: function (data) {
                        console.log(data);
                        //$('.alert').html(data.msg).show();
                        $('.msgbox').html(data.msg).show().addClass('alert-danger').delay(2000).fadeOut();
                    }
                });
            },
            trigger: null
        });
    };
/**
 *
 * @param $
 * @param formid
 * @param routes
 *
 */
ajaxFnFe =
    function ($, formid, routes, getparams) {
        //$('#basicInformationForm').bootstrapValidator({
        $(formid).bootstrapValidator({
            excluded: false,
            //excluded: [':disabled', ':hidden', ':not(:visible)'],
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            live: 'enabled',
            message: 'This value is not valid',
            //submitButtons: ,
            submitHandler: function (validator, form, submitButton) {
                //var url = baseurl + 'modifybasicinformation';
                var url = baseurl + routes;
                $.ajax({
                    type: "post",
                    url: url,
                    cache: false,
                    //data: $('#basicInformationForm').serialize(),
                    data: $(form).serialize(),
                    success: function (data) {
                        console.log(data);
                        $('.msgbox').html(data.msg).show().addClass('alert-success').delay(2000).fadeOut();
                        //alert();
                        var url1 = window.location.href;
                        if (data.status == 1) {
                            if (getparams == '?step=1') {
                                url1 += getparams + '&getrandomid=' + data.randomcode;
                            } else if (getparams == '?step=2') {
                                url1 = getparams + '&getrandomid=' + data.randomcode;
                            }
                        }
                        window.location.href = url1;
                    },
                    error: function (data) {
                        console.log(data);
                        //$('.alert').html(data.msg).show();
                        $('.msgbox').html(data.msg).show().addClass('alert-danger').delay(2000).fadeOut();
                    }
                });
            },
            trigger: null
        });
    };

/**
 *
 * @param $
 * @param formid
 * @param routes
 */
ajaxImgFn =
    function ($, formid, routes) {
        //$('#basicInformationForm').bootstrapValidator({
        $(formid).bootstrapValidator({
            excluded: false,
            //excluded: [':disabled', ':hidden', ':not(:visible)'],
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            live: 'enabled',
            message: 'This value is not valid',
            //submitButtons: ,
            submitHandler: function (validator, formid) {
                //var url = baseurl + 'modifybasicinformation';
                var url = baseurl + routes;
                var form = $(formid);
                var formData = new FormData($(form)[0]);
                $.ajax({
                    type: 'POST',
                    dataType: 'JSON',
                    url: url,
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function (data) {
                        console.log(data);
                        $(".msgbox").html(data.msg).show().delay(3000).fadeOut();
                        //alert();
                        window.location.reload(true);
                    },
                    error: function (data) {
                        $(".msgbox").html(data.msg).show().delay(3000).fadeOut();
                    },
                });
            },
            trigger: null
        });
    };
/**
 *
 * @param $
 * @param formid
 * @param routes
 */
ajaxImgFnFe =
    function ($, formid, routes, getparams) {
        //$('#basicInformationForm').bootstrapValidator({
        $(formid).bootstrapValidator({
            excluded: false,
            //excluded: [':disabled', ':hidden', ':not(:visible)'],
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            live: 'enabled',
            message: 'This value is not valid',
            //submitButtons: ,
            submitHandler: function (validator, formid) {
                //var url = baseurl + 'modifybasicinformation';
                var url = baseurl + routes;
                var form = $(formid);
                var formData = new FormData($(form)[0]);
                $.ajax({
                    type: 'POST',
                    dataType: 'JSON',
                    url: url,
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function (data) {
                        console.log(data);
                        $('.msgbox').html(data.msg).show().addClass('alert-success').delay(2000).fadeOut();
                        //alert();
                        var url1 = window.location.href;
                        if (data.status == 1) {
                            //url1 += '?param=1'
                            if (getparams == '?step=3') {
                                url1 = getparams + '&getrandomid=' + data.randomcode;
                            }
                        }
                        window.location.href = url1;
                    },
                    error: function (data) {
                        $(".msgbox").html(data.msg).show().delay(3000).fadeOut();
                    },
                });
            },
            trigger: null
        });
    };
ajaxRemoveFn =
    function (id, routes) {
        bootbox.confirm("Are you sure?", function (result) {
            if (result == true) {
                var url = baseurl + routes;
                jQuery.ajax({
                    type: 'GET',
                    dataType: 'JSON',
                    url: url,
                    data: id,
                    success: function (data) {
                        jQuery('.msgbox').html(data.msg).show().addClass('alert-success').delay(2000).fadeOut();
                        //$(loadclass).load(window.location + " " + loadclass);
                        window.location.reload(true);
                        //alert('Success');
                    },
                    error: function (data) {
                        jQuery("#errormsg").html(data.msg + " Failed to Delete").show().delay(3000).fadeOut();
                    }
                });
            } else {
                return false;
            }
        });
    };
/**
 * Its for direct use
 * Use as follows
 * <a href="javascript:void(0)" class="btn btn-danger pull-right"
 * onclick="ajaxDeleteFn($, <?php __e($userinformation->EducationID); ?>, 'deleteeducation/<?php __e($userinformation->EducationID); ?>')">
 *     <span class="fa fa-times"></span>
 * </a>
 * @param $
 * @param id
 * @param routes
 */
ajaxDeleteFn =
    function ($, id, routes) {
        bootbox.confirm("Are you sure?", function (result) {
            if (result == true) {
                var url = baseurl + routes;
                jQuery.ajax({
                    type: 'GET',
                    dataType: 'JSON',
                    url: url,
                    data: id,
                    success: function (data) {
                        $('.msgbox').html(data.msg).show().addClass('alert-success').delay(2000).fadeOut();
                        //$(loadclass).load(window.location + " " + loadclass);
                        window.location.reload(true);
                    },
                    error: function (data) {
                        $("#errormsg").html(data.msg + " Failed to Delete").show().delay(3000).fadeOut();
                    }
                });
            } else {
                return false;
            }
        });
    };
/**
 * Data Grid Generator
 * @param $
 * @param formid Form HTML ID
 * @param routes CI routes which I used
 */
ajaxDataGridFn =
    function ($, formid, routes, colsarr) {
        $(formid).dataTable({
            "serverSide": true,
            "processing": true,
            "searching": false,
            "ajax": {
                "url": baseurl + routes,
                "type": "POST"
            },
            "aoColumnDefs": colsarr
        });

    };
///**
// *
// * @param $
// * @param editableobject
// */
//ajaxShowEdit =
//    function ($, editableobject) {
//        $(editableobject).css("background", "#FFF");
//    };
///**
// *
// * @param $
// * @param editableobject
// * @param column
// * @param id
// */
//ajaxSaveToDatabase =
//    function ($, editableobject, column, routes, id) {
//        $(editableobject).css("background", "#FFF url(loaderIcon.gif) no-repeat right");
//        $.ajax({
//            url: baseurl + routes + '/' + id,
//            type: "POST",
//            data: 'column=' + column + '&editval=' + editableobject.innerHTML + '&id=' + id,
//            success: function (data) {
//                $(editableobject).css("background", "#FDFDFD");
//            }
//        });
//    };