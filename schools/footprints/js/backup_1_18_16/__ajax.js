//var editor;
jQuery(document).ready(function ($) {
    /** Very Basic **/
    $.noConflict();
    /** Below Code for Homepage Body Extra Class **/
    var newURL = window.location.protocol + "//" + window.location.host + window.location.pathname;
    var registerURL = newURL;
    var baseregisterURL = baseurl + "auth/register";

    $('img.thumbnail').click(function () {
        $('.modal-body').empty();
        var title = $(this).parent('a').attr("title");
        $('.modal-title').html(title);
        $($(this).parents('div').html()).appendTo('.modal-body');
        $('#myModal').modal({show: true});
    });

    //alert(baseregisterURL);
    if (newURL == baseurl) {
        $('body').addClass('bg');
        $('footer').addClass('whitetext');
    } else if (registerURL == baseregisterURL) {
        $('body').addClass('bg');
        $('footer').addClass('whitetext');
    }
    /** Above Code for Homepage Body Extra Class **/
    var btnid = '#userInfoOpenBtn';
    var fieldval = '#modiy_user_id';
    var routes = 'usersexists';
    var showondiv = '#ifnot_user';
    ajaxFnUserCheck($, btnid, routes, fieldval, showondiv);


    var loading = $("#loading").hide();
    $(document).ajaxStart(function () {
        loading.show();
    });
    $(document).ajaxStop(function () {
        loading.hide();
    });


    $('#payment_method').on('change', function () {
        if ($(this).val() == 1 || $(this).val() == 2 || $(this).val() == 3 || $(this).val() == 4) {
            $('#sendermobileno, #transactionid').show();
            $('#sendermobileno, #transactionid').attr({required: "required"});
            $('#instituteaccount').hide();
            $('#bankname').hide();
        } else if ($(this).val() == 5) {
            $('#bankname, #transactionid').show();
            $('#bankname, #transactionid').attr({required: "required"});
            $('#sendermobileno').hide();
            $('#instituteaccount').hide();
        } else if ($(this).val() == 6) {
            $('#instituteaccount, #transactionid').show();
            $('#instituteaccount, #transactionid').attr({required: "required"});
            $('#sendermobileno').hide();
            $('#bankname').hide();
        } else if ($(this).val() == 0) {
            $('#instituteaccount, #transactionid, #sendermobileno, #bankname').hide();
        }
    });

    $('#existingguardian').click(function () {
        if ($(this).attr("value") == "accept") {
            $("#hider_box").toggle();
            $('#shower_box').toggle();
            $('#egid').attr('required', 'required');
            $('#gid').val('');
            $('#gpass').val('');
        }
    });
    $('#nonuser').click(function () {
        if ($(this).attr("value") == "accept") {
            $('#showfield').toggle();
            $("#hidefield").toggle();
        }
    });


    $('#guardianInfoBtn').click(function () {
        var pass = $('#passbox').val();
        var pass1 = $('#passbox1').val();
        var dteNow = new Date();
        var intYear = dteNow.getFullYear();
        var year = intYear.toString().substr(2, 2);
        //alert(year);

        var classroll = $('#studentclassroll').val();
        var cls = $('#class').val();
        var section = $('#section').val();
        var studygroup = $('#studygroup').val();
        var department = $('#department').val();
        var random = Math.floor(Math.random() * 2) + 1;

        var gstdid = year + cls + classroll + section + studygroup + department;
        var gguaid = year + cls + classroll + section + studygroup + department + 5;


        $('#yearer').val(year);
        $('#studentider').val(gstdid);
        $('#guardianer').val(5);
        $('#studentclsroll').val(classroll);
        $('#studentclass').val(cls);
        $('#sectionval').val(section);
        $('#studygroupval').val(studygroup);
        $('#departmentval').val(department);
        $('#studentclass').val(cls);
        $('#stdid').val(gstdid);
        $('#gid').val(gguaid);
        $('#stdpass').val(pass);
        $('#gpass').val(pass1);
    });

    $('#staffInformationBtn').click(function () {
        var pass = $('#passwordbox').val();
        var nationalidnumber = $('#nationalidnumber').val();
        var lastFour = nationalidnumber.substr(nationalidnumber.length - 4);
        var groups = $('#usergroups').val();

        var dteNow1 = new Date();
        var intYear1 = dteNow1.getFullYear();
        var gstdid = intYear1 + groups + lastFour;
        $('#ts_id').val(gstdid);
        $('#ts_pass').val(pass);
        $('#nationalidcardnumber').val(nationalidnumber);
        $('#which_user_group').val(groups);
    });
    /** Check **/
    ajaxFnCheck($, '#guardianid', 'check', '#urlsuggestions');
    //ajaxFnCheck($, '#admissionid', 'checkadmission', '#urlsuggestions');
    ajaxFnCheckShowInstant($, '#admissionid', 'checkadmission', '#urlsuggestions', '#urlsuggestionsddd');
    ajaxFnCheckShowInstant($, '#resultEditForm', 'showsubjectbaseresult', '#urlsuggestions', '#urlsuggestionsddd');
    //ajaxFnCheck($, '#page_route', 'checkpageroute', '#urlsuggestions1');
    ajaxFnRoutesCheck($, '#page_route', 'checkpageroute', '#urlsuggestions1', '#newportalurl');
    /** Insert, Form Validation and Ajax **/
    ajaxFn($, '#generateStdGuaForm', 'generatestudentandguardian');
    ajaxFn($, '#generateTeaStaForm', 'generateteacherorstaff');
    ajaxFn($, '#addEducationHistoryForm', 'insertneweducation');
    ajaxFn($, '#addBlockForm', 'insertnewblock');
    ajaxFn($, '#addWorkHistoryForm', 'insertnewwork');
    ajaxFn($, '#addBusinessForm', 'insertnewbusiness');
    ajaxFn($, '#addClassForm', 'insertclass');
    ajaxFn($, '#addPageForm', 'insert_page');
    ajaxFn($, '#changePasswordForm', 'modifypasswordinformation');
    ajaxFn($, '#addOnlineAdmissionForm', 'insert_online_admission');
    ajaxFn($, '#addSettingsForm', 'insertInitialSettings');

    /** Payments Module **/
    ajaxFn($, '#ledgerGroupForm', 'insertledgername');
    ajaxFn($, '#transactionEntryForm', 'inserttransactionid');
    ajaxFn($, '#paymentEntryForm', 'insertpayment');
    //ajaxFn($, '#', 'submitreceiveatonce');

    /** Modifications, Form Validation and Ajax **/
    ajaxFn($, '#basicInformationForm', 'modifybasicinformation');
    ajaxImgFn($, '#personalInformationForm', 'modifypersonalinformation');
    ajaxImgFn($, '#systemSettingsForm', 'modifysystemsettings');
    ajaxImgFn($, '#adminSystemSettingsForm', 'modifyadminsystemsettings');
    ajaxImgFn($, '#postUploadForm', 'postupload');

    ajaxFn($, '#studentPersonalInformationForm', 'modifystudentpersonalinformation');

    $('#receiveAtOnceBtn').click(function () {
        var amount = $('#amount').val();
        var twu = $('#transactionwith_u').val();
        //var twp = $('#transactionwith_p').val();
        if (amount.length === 0 && twu.length === 0) {
            alert('Enter at least one amount, Student ID or Phone Number');
        } else {
            var formid = $('#receiveAtOnceForm');
            var routes = $('submitreceiveatonce');
            formid.submit();
        }
    });
    $('#resultGenerateBtn').click(function () {
        var uriss = baseurl + 'generateresultsnow';
        var setvalues = baseurl + 'generateresultview';
        var msg = $('#resultGenerateForm #examm').val();
        var exam = $('#resultGenerateForm #examm').val();
        var classid = $('#resultGenerateForm #classs').val();
        var sid = $('#resultGenerateForm #section').val();
        var subid = $('#resultGenerateForm #subject').val();
        var sgid = $('#resultGenerateForm #groupp').val();

        var routes = uriss + '?examm=' + exam + '&classs=' + classid + '&section=' + sid + '&subject=' + subid + '&groupp=' + sgid;
        var setvaluri = setvalues + '?examm=' + exam + '&classs=' + classid + '&section=' + sid + '&subject=' + subid + '&groupp=' + sgid;

        ajaxResultsFnCorrect($, routes, setvaluri);

        //alert(exam);
        //alert(uriss + '?examm=' + exam + '&classs=' + classid + '&section=' + sid + '&subject=' + subid + '&groupp=' + sgid + '&msg=' + msg);
    });

    var resultgenbtn = '#resultGenerateForm';
    var routes = 'generateresultsnow';
    var setvalues = 'generateresultview';
//ajaxResultsFn($, resultgenbtn, routes, setvalues);

    ajaxResultModifier($, '#modifyresult input', 'marksinput');

    /** Result Input Field **/
    var currentBoxNumber = 0;
    $(".studentmark").keyup(function (event) {
        if (event.keyCode == 13) {
            textboxes = $("input.studentmark");
            currentBoxNumber = textboxes.index(this);
            console.log(textboxes.index(this));
            if (textboxes[currentBoxNumber + 9] != null) {
                nextBox = textboxes[currentBoxNumber + 9];
                nextBox.focus();
                nextBox.select();
                event.preventDefault();
                return false;
            }
        }
    });
    var currentBoxNumber = 0;
    $(".rao").keyup(function (event) {
        if (event.keyCode == 13) {
            textboxes = $("input.rao");
            currentBoxNumber = textboxes.index(this);
            console.log(textboxes.index(this));
            if (textboxes[currentBoxNumber + 1] != null) {
                nextBox = textboxes[currentBoxNumber + 1];
                nextBox.focus();
                nextBox.select();
                event.preventDefault();
                return false;
            }
        }
    });

    /** DataGrids **/

    var allStudentsResults = [
        {"mData": "ResultId", "aTargets": [0], "bSortable": false, "sSearch": false, "bVisible": false},
        {"mData": "StudentName", "aTargets": [1], "bSortable": true, "sSearch": true, "bVisible": true},
        {"mData": "ClassName", "aTargets": [2], "bSortable": true, "sSearch": true, "bVisible": true},
        {"mData": "SectionName", "aTargets": [3], "bSortable": true, "sSearch": true, "bVisible": true},
        {"mData": "GroupName", "aTargets": [4], "bSortable": true, "sSearch": true, "bVisible": true},
        {"mData": "ExamName", "aTargets": [5], "bSortable": true, "sSearch": true, "bVisible": true},
        {"mData": "SubjectName", "aTargets": [6], "bSortable": true, "sSearch": true, "bVisible": true},
        {"mData": "Written", "aTargets": [7], "bSortable": false, "sSearch": false, "bVisible": true},
        {"mData": "MCQ", "aTargets": [8], "bSortable": false, "sSearch": false, "bVisible": true},
        {"mData": "Practical", "aTargets": [9], "bSortable": false, "sSearch": false, "bVisible": true},
        {"mData": "Speaking", "aTargets": [10], "bSortable": false, "sSearch": false, "bVisible": true},
        {"mData": "Reading", "aTargets": [11], "bSortable": false, "sSearch": false, "bVisible": true},
        {"mData": "Listening", "aTargets": [12], "bSortable": false, "sSearch": false, "bVisible": true},
        {"mData": "AddedDate", "aTargets": [13], "bSortable": true, "sSearch": true, "bVisible": true},
        {"mData": "AddedYear", "aTargets": [14], "bSortable": true, "sSearch": true, "bVisible": true},
        {"mData": "Edit", "aTargets": [15], "bSortable": false, "sSearch": false, "bVisible": true}
        //{"mData": "Delete", "aTargets": [16], "bSortable": false, "sSearch": false, "bVisible": true}
    ];

    ajaxDataGridFn($, '#allresults', 'results/get_all_results_by_ajax', allStudentsResults);

    var collsName = [
        {"mData": "PageId", "aTargets": [0], "bSortable": false, "sSearch": false, "bVisible": false},
        {"mData": "PageTitle", "aTargets": [1], "bSortable": true, "sSearch": true},
        {"mData": "PageRoute", "aTargets": [2]},
        {"mData": "ParentPageName", "aTargets": [3]},
        {"mData": "PublishDate", "aTargets": [4]},
        {"mData": "isActive", "aTargets": [5]},
        {"mData": "Edit", "aTargets": [6], "bSortable": false, "sSearch": false},
        {"mData": "Delete", "aTargets": [7], "bSortable": false, "sSearch": false}
    ];
    ajaxDataGridFn($, '#allpages', 'pages/get_all_pages_by_ajax', collsName);
    var colsName = [
        {"mData": "PostId", "aTargets": [0], "bSortable": false, "sSearch": false, "bVisible": false},
        {"mData": "Title", "aTargets": [1], "bSortable": true, "sSearch": true, "bVisible": true},
        {"mData": "PostRoute", "aTargets": [2], "bSortable": true, "sSearch": true, "bVisible": true},
        {"mData": "Category", "aTargets": [3], "bSortable": true, "sSearch": true, "bVisible": true},
        {"mData": "PostContent", "aTargets": [4], "bSortable": true, "sSearch": true, "bVisible": true},
        {"mData": "MediaFileName", "aTargets": [5], "bSortable": true, "sSearch": true, "bVisible": true},
        {"mData": "AddedDate", "aTargets": [6], "bSortable": true, "sSearch": true, "bVisible": true},
        {"mData": "isActive", "aTargets": [7], "bSortable": false, "sSearch": false, "bVisible": false},
        {"mData": "Edit", "aTargets": [8], "bSortable": false, "sSearch": false, "bVisible": true},
        {"mData": "Delete", "aTargets": [9], "bSortable": false, "sSearch": false, "bVisible": true}
    ];
    ajaxDataGridFn($, '#allposts', 'pages/get_all_posts_by_ajax', colsName);

    var columnsN = [
        {"mData": "UserID", "aTargets": [0], "bSortable": false, "sSearch": false, "bVisible": false},
        {"mData": "Gender", "aTargets": [1], "bSortable": true, "sSearch": true},
        {"mData": "EnrollmentStatus", "aTargets": [2], "bSortable": true, "sSearch": true},
        {"mData": "DateOfBirth", "aTargets": [3], "bSortable": true, "sSearch": true},
        {"mData": "Fn_bn", "aTargets": [4], "bSortable": true, "sSearch": true},
        {"mData": "Fn_en", "aTargets": [5], "bSortable": true, "sSearch": true},
        {"mData": "Ffn_bn", "aTargets": [6], "bSortable": true, "sSearch": true},
        {"mData": "Ffn_en", "aTargets": [7], "bSortable": true, "sSearch": true},
        {"mData": "Mfn_bn", "aTargets": [8], "bSortable": true, "sSearch": true},
        {"mData": "Mfn_en", "aTargets": [9], "bSortable": false, "sSearch": false},
        {"mData": "View", "aTargets": [10], "bSortable": false, "sSearch": false},
        {"mData": "Delete", "aTargets": [11], "bSortable": false, "sSearch": false}
    ];
    ajaxDataGridFn($, '#allapplicants', 'onlineadmission/get_all_applicants_by_ajax', columnsN);

    var settingsCollsName = [
        {"mData": "SettingsId", "aTargets": [0], "bSortable": false, "sSearch": false, "bVisible": false},
        {"mData": "SettingsName", "aTargets": [1], "bSortable": true, "sSearch": true},
        {"mData": "SettingsCategory", "aTargets": [2], "bSortable": true, "sSearch": true, "bVisible": false},
        {"mData": "SettingsDescription", "aTargets": [3]},
        {"mData": "isActive", "aTargets": [4]},
        {"mData": "Edit", "aTargets": [5], "bSortable": false, "sSearch": false},
        {"mData": "Delete", "aTargets": [6], "bSortable": false, "sSearch": false}
    ];
    var inisetid = valByAtt($, 'allinitialsettings', 'dataid');
//alert(inisetid);
    ajaxDataGridFn($, '#allinitialsettings', 'initialsettings/get_initial_settings_by_category/' + inisetid, settingsCollsName);


    /** From Theme **/
    $('#sidebar-menu li ul').slideUp();
    $('#sidebar-menu li').removeClass('active');

    $('#sidebar-menu li').click(function () {
        if ($(this).is('.active')) {
            $(this).removeClass('active');
            $('ul', this).slideUp();
            $(this).removeClass('nv');
            $(this).addClass('vn');
        } else {
            $('#sidebar-menu li ul').slideUp();
            $(this).removeClass('vn');
            $(this).addClass('nv');
            $('ul', this).slideDown();
            $('#sidebar-menu li').removeClass('active');
            $(this).addClass('active');
        }
    });

    $('#menu_toggle').click(function () {
        if ($('body').hasClass('nav-md')) {
            $('body').removeClass('nav-md');
            $('body').addClass('nav-sm');
            $('.left_col').removeClass('scroll-view');
            $('.left_col').removeAttr('style');
            $('.sidebar-footer').hide();

            if ($('#sidebar-menu li').hasClass('active')) {
                $('#sidebar-menu li.active').addClass('active-sm');
                $('#sidebar-menu li.active').removeClass('active');
            }
        } else {
            $('body').removeClass('nav-sm');
            $('body').addClass('nav-md');
            $('.sidebar-footer').show();

            if ($('#sidebar-menu li').hasClass('active-sm')) {
                $('#sidebar-menu li.active-sm').addClass('active');
                $('#sidebar-menu li.active-sm').removeClass('active-sm');
            }
        }
    });

    /** Current Page **/
    var url = window.location;
    $('#sidebar-menu a[href="' + url + '"]').parent('li').addClass('current-page');
    $('#sidebar-menu a').filter(function () {
        return this.href == url;
    }).parent('li').addClass('current-page').parent('ul').slideDown().parent().addClass('active');

    /** Tooltip **/
    $('[data-toggle="tooltip"]').tooltip();

    $('#stars').on('starrr:change', function (e, value) {
        $('#count').html(value);
    });


    $('#stars-existing').on('starrr:change', function (e, value) {
        $('#count-existing').html(value);
    });

    $('table input').on('ifChecked', function () {
        check_state = '';
        $(this).parent().parent().parent().addClass('selected');
        countChecked();
    });
    $('table input').on('ifUnchecked', function () {
        check_state = '';
        $(this).parent().parent().parent().removeClass('selected');
        countChecked();
    });

    var check_state = '';
    $('.bulk_action input').on('ifChecked', function () {
        check_state = '';
        $(this).parent().parent().parent().addClass('selected');
        countChecked();
    });
    $('.bulk_action input').on('ifUnchecked', function () {
        check_state = '';
        $(this).parent().parent().parent().removeClass('selected');
        countChecked();
    });
    $('.bulk_action input#check-all').on('ifChecked', function () {
        check_state = 'check_all';
        countChecked();
    });
    $('.bulk_action input#check-all').on('ifUnchecked', function () {
        check_state = 'uncheck_all';
        countChecked();
    });


    $(".scroll-view").niceScroll({
        touchbehavior: true,
        cursorcolor: "rgba(42, 63, 84, 0.35)"
    });


    $(".expand").on("click", function () {
        $(this).next().slideToggle(200);
        $expand = $(this).find(">:first-child");

        if ($expand.text() == "+") {
            $expand.text("-");
        } else {
            $expand.text("+");
        }
    });


    if ($(".progress .progress-bar")[0]) {
        $('.progress .progress-bar').progressbar(); // bootstrap 3
    }
    /** ******  /progressbar  *********************** **/
    /** ******  switchery  *********************** **/
    if ($(".js-switch")[0]) {
        var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
        elems.forEach(function (html) {
            var switchery = new Switchery(html, {
                color: '#26B99A'
            });
        });
    }
    /** ******  /switcher  *********************** **/
    /** ******  collapse panel  *********************** **/
// Close ibox function
    $('.close-link').click(function () {
        var content = $(this).closest('div.x_panel');
        content.remove();
    });

// Collapse ibox function
    $('.collapse-link').click(function () {
        var x_panel = $(this).closest('div.x_panel');
        var button = $(this).find('i');
        var content = x_panel.find('div.x_content');
        content.slideToggle(200);
        (x_panel.hasClass('fixed_height_390') ? x_panel.toggleClass('').toggleClass('fixed_height_390') : '');
        (x_panel.hasClass('fixed_height_320') ? x_panel.toggleClass('').toggleClass('fixed_height_320') : '');
        button.toggleClass('fa-chevron-up').toggleClass('fa-chevron-down');
        setTimeout(function () {
            x_panel.resize();
        }, 50);
    });
    /** ******  /collapse panel  *********************** **/
    /** ******  iswitch  *********************** **/
    if ($("input.flat")[0]) {
        $(document).ready(function () {
            $('input.flat').iCheck({
                checkboxClass: 'icheckbox_flat-green',
                radioClass: 'iradio_flat-green'
            });
        });
    }
})
;

function countChecked() {
    if (check_state == 'check_all') {
        $(".bulk_action input[name='table_records']").iCheck('check');
    }
    if (check_state == 'uncheck_all') {
        $(".bulk_action input[name='table_records']").iCheck('uncheck');
    }
    var n = $(".bulk_action input[name='table_records']:checked").length;
    if (n > 0) {
        $('.column-title').hide();
        $('.bulk-actions').show();
        $('.action-cnt').html(n + ' Records Selected');
    } else {
        $('.column-title').show();
        $('.bulk-actions').hide();
    }
}

/** ******  /iswitch  *********************** **/
/** ******  star rating  *********************** **/
// Starrr plugin (https://github.com/dobtco/starrr)
var __slice = [].slice;

(function ($, window) {
    var Starrr;

    Starrr = (function () {
        Starrr.prototype.defaults = {
            rating: void 0,
            numStars: 5,
            change: function (e, value) {
            }
        };

        function Starrr($el, options) {
            var i, _, _ref,
                _this = this;

            this.options = $.extend({}, this.defaults, options);
            this.$el = $el;
            _ref = this.defaults;
            for (i in _ref) {
                _ = _ref[i];
                if (this.$el.data(i) != null) {
                    this.options[i] = this.$el.data(i);
                }
            }
            this.createStars();
            this.syncRating();
            this.$el.on('mouseover.starrr', 'span', function (e) {
                return _this.syncRating(_this.$el.find('span').index(e.currentTarget) + 1);
            });
            this.$el.on('mouseout.starrr', function () {
                return _this.syncRating();
            });
            this.$el.on('click.starrr', 'span', function (e) {
                return _this.setRating(_this.$el.find('span').index(e.currentTarget) + 1);
            });
            this.$el.on('starrr:change', this.options.change);
        }

        Starrr.prototype.createStars = function () {
            var _i, _ref, _results;

            _results = [];
            for (_i = 1, _ref = this.options.numStars; 1 <= _ref ? _i <= _ref : _i >= _ref; 1 <= _ref ? _i++ : _i--) {
                _results.push(this.$el.append("<span class='glyphicon .glyphicon-star-empty'></span>"));
            }
            return _results;
        };

        Starrr.prototype.setRating = function (rating) {
            if (this.options.rating === rating) {
                rating = void 0;
            }
            this.options.rating = rating;
            this.syncRating();
            return this.$el.trigger('starrr:change', rating);
        };

        Starrr.prototype.syncRating = function (rating) {
            var i, _i, _j, _ref;

            rating || (rating = this.options.rating);
            if (rating) {
                for (i = _i = 0, _ref = rating - 1; 0 <= _ref ? _i <= _ref : _i >= _ref; i = 0 <= _ref ? ++_i : --_i) {
                    this.$el.find('span').eq(i).removeClass('glyphicon-star-empty').addClass('glyphicon-star');
                }
            }
            if (rating && rating < 5) {
                for (i = _j = rating; rating <= 4 ? _j <= 4 : _j >= 4; i = rating <= 4 ? ++_j : --_j) {
                    this.$el.find('span').eq(i).removeClass('glyphicon-star').addClass('glyphicon-star-empty');
                }
            }
            if (!rating) {
                return this.$el.find('span').removeClass('glyphicon-star').addClass('glyphicon-star-empty');
            }
        };

        return Starrr;

    })();
    return $.fn.extend({
        starrr: function () {
            var args, option;

            option = arguments[0], args = 2 <= arguments.length ? __slice.call(arguments, 1) : [];
            return this.each(function () {
                var data;

                data = $(this).data('star-rating');
                if (!data) {
                    $(this).data('star-rating', (data = new Starrr($(this), option)));
                }
                if (typeof option === 'string') {
                    return data[option].apply(data, args);
                }
            });
        }
    });
})(window.jQuery, window);