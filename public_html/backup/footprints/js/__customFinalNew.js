jQuery(document).ready(function ($) {
    $.noConflict();
    multiOpt($);
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
    ajaxDataFn($);
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
 * @param {type} divname
 * @returns {undefined}
 */
printdiv =
        function (divname) {
//            var sitename = jQuery("meta[name=sitename]").attr("content");
//            var eiin = jQuery("meta[name=eiin]").attr("content");
//            var address = jQuery("meta[name=address]").attr("content");
//            var logo = jQuery("meta[name=logo]").attr("content");

            var prtContent = document.getElementById(divname);
            var WinPrint = window.open('', '', 'left=0,top=0,width=1200,height=900,toolbar=0,scrollbars=0,status=0');
            WinPrint.document.writeln('<html><head><title></title>');
            WinPrint.document.writeln('</head><body >');
            WinPrint.document.writeln(prtContent.innerHTML);
            WinPrint.document.writeln('</body></html>');
            WinPrint.document.close();
            WinPrint.focus();
            WinPrint.print();
            WinPrint.close();
        };
/**
 *
 * @param $
 * @param fieldid
 * @param routes
 * @param showondiv
 */
ajaxFnCheckPeoples =
        function ($, fieldid, routes, showondiv) {
            $(fieldid).keyup(function () {
                delay(function () {
                    var fval = $(fieldid).val();
                    var url = baseurl + routes + '/' + fval;
                    $.post(url, function (data) {
                        $(showondiv).load(url + ' ' + showondiv);
                    });
                }, 1000);
            });
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
multiOpt =
        function ($, id) {
            $(id).multiselect();
        };
/**
 *
 * @param $
 */
commonFn =
        function ($) {
            $('#date').datetimepicker({
                timepicker: false,
                format: 'Y-m-d'
            });
            $('#date1').datetimepicker({
                timepicker: false,
                format: 'Y-m-d'
            });
            $('#date2').datetimepicker({
                timepicker: false,
                format: 'Y-m-d'
            });
            $('#date3').datetimepicker({
                timepicker: false,
                format: 'Y-m-d'
            });
            $('#date11').datetimepicker({
                timepicker: false,
                format: 'Y-m-d'
            });
            $('#date12').datetimepicker({
                timepicker: false,
                format: 'Y-m-d'
            });








            $('.datepick').each(function () {
                $(this).datetimepicker({
                    timepicker: false,
                    format: 'Y-m-d'
                });
            });

//             $('.datepicknew').dcalendarpicker({ format: 'yyyy-mm-dd'});

            $('#date_mask').datetimepicker({
                timepicker: false,
                mask: true // '9999/19/39 29:59' - digit is the maximum possible for a cell
            });
            $('#year').datetimepicker({
                timepicker: false,
                format: 'Y'
            });
            $('#datewithtime').datetimepicker({
                timepicker: true,
                format: 'Y-m-d h:m'
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
 * @param fieldid
 * @param routes
 * @param showondiv
 */
ajaxFnLoadUpazila =
        function ($, fieldid, routes, showondiv) {
            $(fieldid).on('change', function () {
                delay(function () {
                    var fval = $(fieldid).val();
                    var url = baseurl + routes + '/' + fval;
                    $('.loading').show();
                    $.post(url, function (data) {
                        var $el = $("#upazilas");
                        $el.empty();
                        $.each(data, function (k, v) {
                            $el.append($("<option></option>")
                                    .attr("value", v.id).text(v.name + ' (' + v.bn_name + ')'));
                        });
                    }).done(function () {
                        $('.loading').hide();
                    });
                }, 1000);
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
ajaxAttendanceModifier =
        function ($, sendbtn, routes) {
            $(sendbtn).click(function () {
                var dataid = $(this).attr('data-id');
                var stdid = $('#stdid_' + dataid).val();
                var isabsval = $('#isabsent_' + dataid).val();
                var guardianpn = $('#guardianphoneno_' + dataid).val();
                var msg = $('#message_' + dataid).val();
                if (guardianpn != 0) {
                    var guardianpn = $('#guardianphoneno_' + dataid).val();
                } else {
                    var guardianpn = 'none';
                }
                $.ajax({
                    type: "POST",
                    dataType: 'json',
                    url: baseurl + routes + '/' + stdid + '?dataid=' + dataid + '&absent=' + isabsval + '&message=' + msg + '&guardianpn=' + guardianpn,
                    cache: false,
                    //data: dataid,
                    success: function (data) {
                        var custommsg = 'Attendance of ' + stdid + ' modified successfully.';
                        $('#marksmodified').html(custommsg);
                    },
                    error: function () {
                        $('#marksmodified').html('Something Went Wrong');
                    }
                });
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
                            document.getElementById(showondiv).innerHTML = data.msg;
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
                    var ifexists = fval.toLowerCase().replace(/ /g, '-').replace(/[^\w-]+/g, '');
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
            $(formid).bootstrapValidator({
                excluded: false,
                feedbackIcons: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                live: 'enabled',
                message: 'This value is not valid',
                submitHandler: function (validator, form, submitButton) {
                    var url = baseurl + 'modifybasicinformation';
                    var url = baseurl + routes;
                    $.ajax({
                        type: "post",
                        url: url,
                        cache: false,
                        data: $(formid).serialize(),
                        success: function (data) {
                            //  console.log(data);
                            setInterval(function () {
                                processing.hide($);
                                $('.msgbox').html(showSuccess(data.msg)).show().delay(3000).fadeOut(1000, function () {
                                    window.location.reload(true);
                                });
                            }, 2000);
                        },
                        error: function (data) {
                            console.log(data);
                            //$('.alert').html(data.msg).show();
                            $('.msgbox').html(data).show().addClass('alert-danger').delay(2000).fadeOut();
                        },
                        statusCode: {
                            500: function () {
                                $('.msgbox').html(showError('Produt id or product sku required unicque value')).show().delay(3000)
                                $('#postUploadBtn').attr('disabled', false);
                            }
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
                        data: $(formid).serialize(),
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
        function ($, formid, routes, editorfield) {
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
                fields: {
                    upload_media: {
                        validators: {
                            notEmpty: {
                                message: 'You must select a valid image file to upload'
                            },
                            file: {
                                extension: 'jpg,png,jpeg,gif',
                                type: 'image/jpeg,image/png,image/jpeg,image/gif'
                            }
                        }
                    }
                },
                submitHandler: function (validator, formid) {
                    var form = $(formid);
                    var formData = new FormData($(form)[0]);
                    var url = baseurl + routes;
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
                            setInterval(function () {
                                processing.hide($);
                                $('.msgbox').html(showSuccess(data.msg))
                                        .show()
                                        .delay(4000)
                                        .fadeOut();
                                //alert();
                                window.setTimeout(function () {
                                    window.location.reload(true)
                                }, 2000);
                            }, 2000)
                        },
                        error: function (data) {
                            $('.msgbox').html(data.msg).show().addClass('alert-danger').delay(2000).fadeOut();
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
                    $.ajax({
                        type: 'POST',
                        dataType: 'JSON',
                        url: url,
                        data: $(formid).serialize(),
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
        function (id, routes, callback) {
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


                            if (callback == undefined)
                                window.location.reload(true);
                            else
                                callback();



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
/**
 * Data Grid Generator
 * @param $
 * @param formid Form HTML ID
 * @param routes CI routes which I used
 */
ajaxDataGridFnWithRawPhp =
        function ($, tblid) {
            $(tblid).dataTable();
        };



/**
 * Data Grid Generator
 * @param $
 * @param selector where to perform
 * @param event whern perform
 * @param routes CI routes which I used
 * @param method request method GET or POST
 * @param method perform before
 * @param callback This call backu will perform whern done
 * 
 */

ajaxDataFn =
        function ($, selector, event, route, method, before, callback)
        {
            if (method == undefined)
                method = 'GET';

            if (callback == undefined)
                callback = function (data) {
                    console.log(data);
                }

            if (before == undefined)
                before = function (data) {
                    console.log(data);
                }

            $(document).on(event, selector, function (data) {
                // before(data);
                console.log($(this).data());
                /*
                 $.ajax({
                 method: method,
                 url: baseurl + route,
                 data : data,
                 success: function (data) {
                 // callback(data);
                 }
                 });
                 */
            });

        }


/**
 *
 * @param msg
 * @returns {string}
 */
showSuccess = function (msg) {
    var p = '<div class="alert alert-success"><strong>' + msg + '</strong></div>';
    return p;
//    var p = '<div class="sweet-alert"><div class="row"><div class="col-md-3 msgTextBox"><img src="'
//            + baseurl
//            + 'footprints/images/dancing_80_anim_gif.gif" /></div><div class="col-md-9 msgContainer"><div class="msgText">'
//            + msg + '</div></div></div></div>';
//    return p;
};
/**
 *
 * @param msg
 * @returns {string}
 */
showError = function (msg) {
    var p = '<div class="alert alert-danger"><strong>' + msg + '</strong></div>';
    return p;
};




/*
 * @Author Shahadat Hossain
 * @date 28/5/2016 7:26pm
 */

processing = {
    show: function ($) {
        var w = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
        var h = window.innerHeight || document.documentElement.clientHeight || document.body.clientHeight;
        $('#processingmassage').css({
            'display': 'block',
            width: w,
            height: h,
            'padding-top': (h / 2) - 150
        })
    },
    hide: function ($) {
        $('#processingmassage').hide();
    }
}



makeCurrency = function (input)
{
    input.value = parseFloat(input.value);
}


//jQuery('body').on('click', 'input.checkbutton', function () {
//     alert("Saddam");
//})

jQuery('span.checkbutton').click(function (e) {
    e.preventDefault;
    //alert("Saddam");
    var elementID = this.getAttribute('id');
    var deliverDate = jQuery(this).closest('td').find('.datepicknew').val();
    if (deliverDate) {
        jQuery.post(baseurl + "order/updateDeliveryDate", {
            id: elementID,
            deliverDate: deliverDate
        },
        function (data) {
            jQuery('#order_'+elementID).val(deliverDate);
             jQuery('#order_'+elementID).prop("readonly", true);
             jQuery('.msgbox').html(showSuccess("Status Changed")).show().delay(4000).fadeOut();
//            order_
            //window.location.href = baseurl + "order/all/list";
        });
    }
     return false;
});


jQuery('a.order_status_change').click(function (e) {
    e.preventDefault;

    var href = jQuery(this).attr('href');
    var status = jQuery(this).attr('data-status');
    var id = jQuery(this).attr('data-id');

    var checked = jQuery('input[name="sms[]"]:checked').length > 0;
    var send_msg = 0;
    if(checked){
        send_msg = 1;
    }
   
    //return false;
    if (href) {
        jQuery.ajax({
            type: 'post',
            dataType: 'text',
            url: href,
            data: {status: status, send_msg: send_msg},
            success: function (data) {
                processing.hide(jQuery);
                jQuery('td#order_statue_'+id).text(data);
                jQuery('.msgbox').html(showSuccess("Status Changed")).show().delay(4000).fadeOut();
                window.setTimeout('location.reload()', 300);
            },
            
        });

//        jQuery.post(href, {
//            status: status,
//        },
//        function (data) {
//             processing.hide(jQuery);
//             jQuery('.msgbox').html(showSuccess("dsd")).show().delay(4000).fadeOut();
//        });
    }
    
    return false;

    //alert("s");
//    processing.hide(jQuery);
//     jQuery('.msgbox').html(showSuccess("dsd")).show().delay(4000).fadeOut();
//    
//    return false;
//     processing.hide(jQuery);
//     jQuery('.msgbox').html(showSuccess("dsd")).show().delay(4000).fadeOut();

});
jQuery('.sofa-check-done').blur(function(e){
    var thisVal = jQuery(this).val();
    var sofaString = jQuery(this).val().toLowerCase().substring(0, 3);
    if((sofaString == 'ssc') ||  (sofaString == 'sdc') || (sofaString == 'stc') || (sofaString == 'scb') || (sofaString == 'sfc')) {
        jQuery( ".sofa-sku-check" ).slideDown( "slow" );
    } else {
        jQuery( ".sofa-sku-check" ).hide( "slow" );
    }


    if((sofaString == 'ssc') ||  (sofaString == 'sdc') || (sofaString == 'stc') || (sofaString == 'scb') || (sofaString == 'sfc')) {
        jQuery( ".sofa-sku-check" ).slideDown( "slow" );
    } else {
        jQuery( ".sofa-sku-check" ).hide( "slow" );
    }

    if(thisVal.indexOf(' ') >= 0) {
        jQuery( ".sofa-check-done" ).css( "border", "#a94442 solid 1px");
        jQuery( ".sofa-check-done" ).css( "box-shadow", "0 1px 1px rgba(0, 0, 0, 0.075) inset");
        jQuery("#postUploadBtn").hide();
        //jQuery( ".sofa-check-done" ).next('i').removeClass('glyphicon-ok').addClass('form-control-feedback
        // glyphicon glyphicon-remove');//css("display", "none");
        // jQuery( ".sofa-check-done" ).closest('i').show();
        // jQuery( ".sofa-check-done" ).closest('small.help-block').show();
    } else {
        jQuery( ".sofa-check-done" ).css( "border", "#ccc solid 1px");
        jQuery( ".sofa-check-done" ).css( "box-shadow", "0 1px 1px rgba(0, 0, 0, 0.075) inset");
        jQuery("#postUploadBtn").show();
    }


});
