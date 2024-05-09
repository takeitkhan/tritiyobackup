jQuery(document).ready(function ($) {
    /** Very Basic **/
    $.noConflict();

    /*Add To cart functionality*/
    //function ($, selector, event, route, method , before, callback)
    //ajaxDataFn();

    // ajaxDataFn($,'.add_to_cart','click','add_to_cart','GET');addBlockForm



    /*******************************************************
     * 
     * Media Upload Functionality
     * 
     * */
    var loading_flag = false;
    $('#media_search').keyup(function () {
        var data = {
            'search_key': $(this).val(),
            'offset': 0
        };
        if (!loading_flag) {
            loading_flag = true;
            $.ajax({
                url: baseurl + 'get_media_list_json',
                data: data,
                success: function (data) {
                    $('.single-media').remove();
                    $('.not-found').remove();
                    for (i = 0; i < data.length; i++) {
                        var single = data[i];
                        $('.media-list').append('<div class="single-media" data-id="' + single.idno + '">' +
                                '<img src="' + baseurl + single.upload_dir + '/' + single.idno + '.' + single.extension + '">' +
                                '<p class="text-center">' + single.file_name + '</p>' +
                                '</div>');
                    }
                    if (data.length <= 0) {
                        $('.media-list').append('<h2 class="not-found"> No media found.</h2>');
                        $('#load-more-media').hide();
                    } else {
                        $('#load-more-media').show();
                    }
                    loading_flag = false;

                    $('#load-more-media').attr('data-loaded', data.length);
                }
            });
        }
    });


    $('#load-more-media').click(function () {

        var data = {
            'search_key': $('#media_search').val(),
            'offset': $(this).data('loaded')
        };

        if (!loading_flag)
        {
            loading_flag = true;
            $.ajax(
                    {
                        url: baseurl + 'get_media_list_json',
                        data: data,
                        success: function (data) {
                            $('.not-found').remove();
                            for (i = 0; i < data.length; i++)
                            {
                                var single = data[i];
                                $('.media-list').append('<div class="single-media" data-id="' + single.idno + '">' +
                                        '<img src="' + baseurl + single.upload_dir + '/' + single.idno + '.' + single.extension + '">' +
                                        '<p class="text-center">' + single.file_name + '</p>' +
                                        '</div>');
                            }
                            if (data.length <= 0) {
                                $('.media-list').append('<h2 class="not-found"> No media found.</h2>');
                                $('#load-more-media').hide();
                            }
                            loading_flag = false;
                            total = data.length + $('#load-more-media').data('loaded');

                            $('#load-more-media').data('loaded', total);
                        }
                    }
            );
        }
    });




    /**************************************************************************
     * 
     * Order Management Load More and search functionality 
     * 
     * @type int
     */

    $('#search-order-input').keyup(function () {
        var query = {
            'search_key': $(this).val(),
            'offset': 0,
            'from_date': $('#date11').val().toString(),
            'to_date': $('#date12').val().toString(),
            'type': $('#search-order-input').data('type')
        };
        if (!loading_flag) {
            loading_flag = true;
            $.ajax({
                url: baseurl + 'order/row-html',
                data: query,
                success: function (response) {
                    console.log(response);
                    if (response.total <= 0) {
                        $('#load-more-order').hide();
                    } else {
                        $('#order-table tbody').html(response.html);
                        $('#load-more-order').show();
                    }
                    loading_flag = false;

                    $('#load-more-order').attr('data-loaded', response.total);
                }
            });
        }
    });


    $('#load-more-order').click(function () {

        var query = {
            'search_key': $(this).val(),
            'offset': $('#load-more-order').data('loaded'),
            'type': $('#search-order-input').data('type')
        };
        if (!loading_flag)
        {
            loading_flag = true;
            $.ajax(
                    {
                        url: baseurl + 'order/row-html',
                        data: query,
                        success: function (response) {

                            if (response.total <= 0) {
                                $('#load-more-order').hide();
                            } else {
                                $('#order-table tbody').append(response.html);
                                $('#load-more-order').show();
                            }
                            loading_flag = false;
                            total = response.total + $('#load-more-order').data('loaded');
                            $('#load-more-order').data('loaded', total);
                        }
                    }
            );
        }
    });









    var option = {
        selector: '#_uploadmedia', //input file seletor
        route: 'uploadfile',
        before: function () {
            $('.not-found').remove();
        },
        success: function (data) {

            if (data.status == true)
            {
                $('.media-list').append('<div class="single-media" data-id="' + data.file.idno + '">' +
                        '<img  src="' + data.file.url + '">' +
                        '<p class="text-center">' + data.file.file_name + '</p>' +
                        '</div>'
                        );
            }

        },
        file_name: 'filetoupload' //file name
    }

    ajaxUploadFile($, option);

    $(document).on("click", '.single-media', function (event) {
        var media_url = $(this).children('img').attr('src');
        var media_name = $(this).children('p').text();
        var media_id = $(this).data('id');
        $('#signle_media_modal span.media-name').text(media_name);
        $('#signle_media_modal img.media-url').attr('src', media_url);
        $('#signle_media_modal input.media-id').val(media_id);
        $('#signle_media_modal input.media-url').val(media_url);
        $('#signle_media_modal input.media-name').val(media_name);
        $('#signle_media_modal .deletebutton').attr('data-mediaid', media_id);
        $('#signle_media_modal').modal("toggle");
    });

    $(document).on('click', '#signle_media_modal .deletebutton', function (event) {
        $.ajax({
            url: baseurl + 'media\\delete\\' + $('#signle_media_modal .deletebutton').attr('data-mediaid'),
            success: function (data) {
                if (data.status)
                {
                    var x = '.single-media[data-id=' + $('#signle_media_modal .deletebutton').attr('data-mediaid') + ']';
                    console.log(x);
                    $('#signle_media_modal').modal("toggle");
                }
            }
        });
    });

    /*End Media upload functionality */
    ajaxFn($, '#add_new_category', 'savecategory');
    ajaxFn($, '#fabricUploadForm', 'savefabric');
    ajaxFn($, '#addShowRoomForm', 'saveshowroom');
    ajaxFn($, '#productUploadForm', 'saveproduct');
    ajaxFn($, '#productUploadSofa', 'savesofaproduct');
    ajaxFn($, '#productEditSofa', 'saveproduct');



    /******************************************************
     *
     *  Product image upload functionality
     * 
     * */
    var option = {
        selector: '#_uploadimage', //input file seletor
        route: 'uploadfile',
        success: function (data) {

            if (data.status == true)
            {

                $('.img_list').append('<li class="list-group-item">' +
                        '<img src="' + data.file.url + '">' +
                        '<input type="hidden" name="imgs[]" value="' + data.file.idno + '">' +
                        ' <p>' + data.file.file_name + '<br>' +
                        ' <a class="btn btn-danger btn-xs remove"><i class="fa fa-remove" aria-hidden="true"></i> Remove</a>' +
                        ' </p>' +
                        ' </li>');

            }

        },
        file_name: 'filetoupload' //file name
    }
    ajaxUploadFile($, option);

    $(document).on("click", '.img_list .remove', function (event) {
        $(this).parent().parent().remove();
    });
    /*End product image upload functionalati*/





    $('#overlay-back').fadeIn(500, function () {
        $('#popup').show();
    });

    $(".close-image").on('click', function () {
        $('#popup').hide();
        $('#overlay-back').fadeOut(500);
    });
    /** Below Code for Homepage Body Extra Class **/
    var newURL = window.location.protocol + "//" + window.location.host + window.location.pathname;
    var registerURL = newURL;
    var baseregisterURL = baseurl + "auth/register";

    // Clickable Parent
    //$('.dropdown-toggle').click(function() { var location = $(this).attr('href'); window.location.href = location; return false; });
    $('.navbar .dropdown').hover(function () {
        $(this).find('.dropdown-menu').first().stop(true, true).delay(250).slideDown();

    }, function () {
        $(this).find('.dropdown-menu').first().stop(true, true).delay(100).slideUp();

    });
    $('.navbar .dropdown > a').click(function () {
        location.href = this.href;
    });
    // Clickable Parent


    /** File Field empty checking **/


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

    var fieldid = '#districts';
    var routes = 'getupazila';
    var populateoptions = '#upazilas';
    ajaxFnLoadUpazila($, fieldid, routes, populateoptions);

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
        var groups = $('#usergroups').val();

//        var dteNow1 = new Date();
//        var intYear1 = dteNow1.getFullYear();
//        var gstdid = intYear1 + groups + lastFour;
//        $('#ts_id').val(gstdid);
        $('#ts_pass').val(pass);
        $('#ts_id').val(nationalidnumber);
        $('#which_user_group').val(groups);
    });
    /** Check **/
    multiOpt($, '#multiopt');
    ajaxFnCheck($, '#guardianid', 'check', '#urlsuggestions');
    ajaxFnCheckPeoples($, '#searchaddresses', 'get_addresses', '#contact-lists');
    //ajaxFnCheck($, '#admissionid', 'checkadmission', '#urlsuggestions');
    ajaxFnCheckShowInstant($, '#admissionid', 'checkadmission', '#urlsuggestions', '#urlsuggestionsddd');
    ajaxFnCheckShowInstant($, '#resultEditForm', 'showsubjectbaseresult', '#urlsuggestions', '#urlsuggestionsddd');
    //ajaxFnCheck($, '#page_route', 'checkpageroute', '#urlsuggestions1');
    ajaxFnRoutesCheck($, '#page_title', 'checkpageroute', '#urlsuggestions1', '#newportalurl');
    ajaxFnRoutesCheck($, '#posttitle', 'checkpageroute', '#urlsuggestions1', '#postroute');
    /** Insert, Form Validation and Ajax **/
    ajaxFn($, '#generateStdGuaForm', 'generatestudentandguardian');
    ajaxFn($, '#generateTeaStaForm', 'generateteacherorstaff');
    ajaxFn($, '#addEducationHistoryForm', 'insertneweducation');
    ajaxFn($, '#addBlockForm', 'insertnewblock');
    ajaxFn($, '#categoryForm', 'insertnewcategory');
    ajaxFn($, '#addWorkHistoryForm', 'insertnewwork');
    ajaxFn($, '#addBusinessForm', 'insertnewbusiness');
    ajaxFn($, '#addClassForm', 'insertclass');
    ajaxFn($, '#addPageForm', 'insert_page');
    ajaxFn($, '#changePasswordForm', 'modifypasswordinformation');
    ajaxFn($, '#addOnlineAdmissionForm', 'insert_online_admission');
    ajaxFn($, '#dispositionForm', 'disposition');
    ajaxFn($, '#customMessageForm', 'sendmessage');
    ajaxFn($, '#addSettingsForm', 'insertInitialSettings');
    ajaxFn($, '#add_brand', 'productbrand');

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
    ajaxImgFn($, '#addMediaForm', 'uploadimage');


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
    $('#payAtOnceBtn').click(function () {
        var amount = $('#amount').val();
        var twu = $('#transactionwith_u').val();
        //var twp = $('#transactionwith_p').val();
        if (amount.length === 0 && twu.length === 0) {
            alert('Enter at least one amount, User ID or Phone Number');
        } else {
            var formid = $('#payAtOnceForm');
            var routes = $('submitpayatonce');
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

    $('#attendanceBtn').click(function () {
        var uriss = baseurl + 'generateattendance';
        var setvalues = baseurl + 'generateattendance';
        var classid = $('#attendanceForm #classs').val();
        var sid = $('#attendanceForm #section').val();
        var sgid = $('#attendanceForm #groupp').val();
        var department = $('#attendanceForm #department').val();
        var usergroups = $('#attendanceForm #usergroups').val();
        var routes = uriss + '?classs=' + classid + '&section=' + sid + '&usergroup=' + usergroups + '&groupp=' + sgid + '&department=' + department;
        var setvaluri = setvalues + '?classs=' + classid + '&section=' + sid + '&usergroup=' + usergroups + '&groupp=' + sgid + '&department=' + department;
        ajaxResultsFnCorrect($, routes, setvaluri);
    });

    var resultgenbtn = '#resultGenerateForm';
    var routes = 'generateresultsnow';
    var setvalues = 'generateresultview';
    //ajaxResultsFn($, resultgenbtn, routes, setvalues);

    ajaxResultModifier($, '#modifyresult input', 'marksinput');

    $('.checkbox').click(function () {
        var dataid = $(this).attr('data-id');
        //alert(dataid);
        if ($(this).is(':checked')) {
            var txt = $('#default_txt').html();
            $('#message_' + dataid).val(txt);

            $('.setmessage_' + dataid).toggle();
            ajaxAttendanceModifier($, '#modifyattendance #setmessage', 'attendanceinput');
        } else {
            $('#message_' + dataid).val('');
            $('.setmessage_' + dataid).toggle();
            ajaxAttendanceModifier($, '#modifyattendance #setmessage', 'attendanceinput');
        }
    });


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
    $(".studentattendance").keyup(function (event) {
        if (event.keyCode == 13) {
            textboxes = $("input.studentmark");
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

//    var colsName = [
//        {"mData": "PostId", "aTargets": [0], "bSortable": false, "sSearch": false, "bVisible": false},
//        {"mData": "Title", "aTargets": [1], "bSortable": true, "sSearch": true, "bVisible": true},
//        {"mData": "PostRoute", "aTargets": [2], "bSortable": true, "sSearch": true, "bVisible": true},
//        {"mData": "Category", "aTargets": [3], "bSortable": true, "sSearch": true, "bVisible": true},
//        {"mData": "PostContent", "aTargets": [4], "bSortable": false, "sSearch": false, "bVisible": false},
//        {"mData": "MediaFileName", "aTargets": [5], "bSortable": true, "sSearch": true, "bVisible": true},
//        {"mData": "AddedDate", "aTargets": [6], "bSortable": true, "sSearch": true, "bVisible": true},
//        {"mData": "isActive", "aTargets": [7], "bSortable": false, "sSearch": false, "bVisible": false},
//        {"mData": "Edit", "aTargets": [8], "bSortable": false, "sSearch": false, "bVisible": true},
//        {"mData": "Delete", "aTargets": [9], "bSortable": false, "sSearch": false, "bVisible": true}
//    ];
//    ajaxDataGridFn($, '#allposts', 'pages/get_all_posts_by_ajax', colsName);

    ajaxDataGridFnWithRawPhp($, '#allposts');

    var catColsName = [
        {"mData": "SettingsId", "aTargets": [0], "bSortable": true, "sSearch": true, "bVisible": true},
        {"mData": "SettingsCategory", "aTargets": [1], "bSortable": false, "sSearch": false, "bVisible": false},
        {"mData": "SettingsName", "aTargets": [2], "bSortable": true, "sSearch": true, "bVisible": true},
        {"mData": "SettingsDescription", "aTargets": [3], "bSortable": true, "sSearch": true, "bVisible": true},
        {"mData": "isActive", "aTargets": [4], "bSortable": false, "sSearch": false, "bVisible": false},
        {"mData": "Edit", "aTargets": [5], "bSortable": false, "sSearch": false, "bVisible": true},
        {"mData": "Delete", "aTargets": [6], "bSortable": false, "sSearch": false, "bVisible": true}
    ];

    ajaxDataGridFn($, '#allcategories', 'pages/get_all_categories_by_ajax', catColsName);


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


//    $(".scroll-view").niceScroll({
//        touchbehavior: true,
//        cursorcolor: "rgba(42, 63, 84, 0.35)"
//    });

    $('#foo0').carouFredSel({
        auto: {
            pauseOnHover: 'resume',
            progress: '#timer1'
        }
    }, {
        transition: true
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

    /*Loading Upazillas*/

    param = {
        field: '.districts',
        target: '.upazila',
        route: 'getupazila'};

    $(param.field).on('change', function () {
        var field_value = $(this).val();
        $(param.field).each(function () {
            $(this).val(field_value);
        });
        var $el = $(param.target);
        $el.attr("disabled", true);


        var target_url = baseurl + param.route + '/' + field_value;

        $.post(target_url, function (data) {
            $el.empty();
            $.each(data, function (k, v) {
                $el.append($("<option></option>").attr("value", v.id).text(v.name + ' ' + v.bn_name));
            });
            $el.attr("disabled", false);
        });
    });

    $('.upazila').on('change', function () {

        $.ajax({
            url: baseurl + 'get_showrooms',
            data: {upazilla_id: $(this).val()},
            success: function (data)
            {
                console.log(data)
                $('.showroomlist').empty();
                jQuery.each(data, function (index) {
                    showroom = data[index];

                    var stype;

                    if (showroom.Shoptype == 1) {
                        stype = "Regal Showrooms";
                    } else if (showroom.Shoptype == 2) {
                        stype = "Regal with best buy";

                    } else if (showroom.Shoptype == 3) {
                        stype = "Dealer";

                    }

                    var html = '<div class="panel panel-default" id="showroom' + showroom.ShowroomId + '">'
                            + '<div class="panel-heading"><span class="btn-group pull-right"> <a class="btn btn-danger btn-xs" onclick="delete_showroom(' + showroom['ShowroomId'] + ' )"><i class="fa fa-trash"></i></a>'
                            + '</span>Id# ' + showroom.ShowroomId + '</div>'
                            + ' <div class="panel-body"> '
                            + '    <p><strong>Showroom Name</strong>: ' + showroom.ShowroomName + '</p>'
                            + '    <p><strong>Showroom type</strong>: ' + stype
                            + '</p>'
                            + '    <p> <strong> Showroom Phone </strong>: ' + showroom.Phone + ' </p>'
                            + '    <p> <strong> Showroom Address </strong>: ' + showroom.ShowroomAddress + '</p>'
                            + '    <a target = "_blank" class = "btn pull-right btn-default" href = "https://www.google.com/maps/@' + showroom.Longitude + ',' + showroom.Latitude + ',15z' + '" > <i class = "fa fa-map-marker" aria - hidden = "true"> </i> Google map</a>'
                            + '     <p> <strong> Latitude </strong>: ' + showroom.Latitude + ' </p>'
                            + '     <p> <strong> Longitude </strong>: ' + showroom.Longitude + ' </p> '
                            + '  </div> '

                            + '   </div> '
                    $('.showroomlist').append(html);

                });
            }
        })
    });
});


jQuery('.order_delivery').on('click', function (e) {
    e.preventDefault();
    var elementID = jQuery(this).attr('data-id');
    var deliverDate = jQuery('#order_' + elementID).val();
    if (!deliverDate) {
        jQuery('#order_' + elementID).css({'border-color': '#ff0000'});
    } else {
        jQuery('#order_' + elementID).css({'border-color': '#ccc'});
        
        jQuery.post(baseurl + "order/updateDeliveryDate", {
            id: elementID,
            deliverDate: deliverDate
        },
        function (data) {
            window.location.href = baseurl + "order/all/list";
        });
    }
})


function getDate(str) {
    var elementID = str.getAttribute('id');
    var deliverDate = jQuery("#" + elementID).val();
    alert(elementID);

//    jQuery.post(baseurl + "order/updateDeliveryDate", {
//        id: elementID,
//        deliverDate: deliverDate
//    },
//            function (data) {
//                window.location.href = baseurl + "order/all/list";
//            });
}

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



var ajaxUploadFile = function ($, option) {

    option.file_name = (option.file_name === undefined) ? 'file' : option.file_name;
    option.success = (option.success === undefined) ? function (data) {
    } : option.success;
    option.before = (option.before === undefined) ? function (data) {
    } : option.before;

    $(option.selector).on('change', function () {
        option.before();
        var data = new FormData();
        data.append(option.file_name, $(this)[0].files[0]);
        $.ajax({
            type: 'POST',
            url: baseurl + option.route,
            data: data,
            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {
                option.success(data);
            },
            error: function (data) {
                console.log('Error:' + data);
            },
        });
    });
}


/*
 
 * Update dropdown delect box 
 * @author shahadat16061993 
 
 @param = {
 field : $selector,
 target: $target_selector,
 before: callback function,
 after : callback function,
 route : route
 }
 */

var ajaxFnLoadSelectBox = function ($, param) {

    $(param.field).on('change', function () {

        delay(function () {
            param.before();
            var field_value = $(param.field).val();
            var target_url = baseurl + param.route + '/' + field_value;

            $.post(target_url, function (data) {
                var $el = $(param.target);
                $el.empty();
                $.each(data, function (k, v) {
                    $el.append($("<option></option>").attr("value", v.value).text(v.label));
                });
            }).done(function () {
                param.after();
            })
        }, 500);
    });
}//end function ajaxFnLoadSelectBox


function delete_showroom(showroom_id)
{
    ajaxRemoveFn({id: showroom_id}, 'delete_showroom', function () {
        jQuery('#showroom' + showroom_id).remove();
    });
}

function showroom_view(showroom) {
    //alert(showroom.ShowroomId);

    var html = '<div class="panel panel-default" id="showroom' + showroom.ShowroomId + '">'
            + '<div class="panel-heading"><span class="btn-group pull-right"> <a class="btn btn-danger btn-xs" onclick="delete_showroom(' + showroom['ShowroomId'] + ' )"><i class="fa fa-trash"></i></a>'
            + '</span>Id# ' + showroom.ShowroomId + '</div>'
            + ' <div class="panel-body"> '
            + '    <p><strong>Showroom Name</strong>: ' + showroom.ShowroomName + '</p>'
            + '    <p><strong>Showroom type</strong>: ';

    switch (showroom.Shoptype) {
        case 1:
            html += "Regal Showrooms";
            break;
        case 2:
            html += "Regal with best buy";
            break;
        case 3:
            html += "Dealer";
            break;
    }

    html += '< /p> '
            + '    < p > < strong > Showroom Phone < /strong>: ' + showroom.Phone + ' </p >'
            + '    < p > < strong > Showroom Address < /strong>: ' + showroom.ShowroomAddress + '</p >'
            + '    < a target = "_blank" class = "btn pull-right btn-default" href = "https://www.google.com/maps/@' + showroom.Longitude + ',' + showroom.Latitude + ',15z' + '" > < i class = "fa fa-map-marker" aria - hidden = "true" > < /i> Google map</a >'
            + '     < p > < strong > Latitude < /strong>: <?= $showroom->Latitude ?> </p >'
            + '     < p > < strong > Longitude < /strong>: <?= $showroom->Longitude ?> </p > '
            + '  < /div> '

            + '   < /div> '
}





jQuery(document).ready(function ($) {



    $('#load-more-product-btn').click(function () {

        var sdata = {
            search_key: $('#search_key').val(),
            type: 'html',
            page_no: $(this).data('nextpage')
        }
        $('#load-more-product-btn').text('Loading..');
        $('#load-more-product-btn').attr('disabled', true);
        $.ajax({
            method: 'GET',
            data: sdata,
            url: 'get_products',
            success: function (data) {
                $('#product-list tbody').append(data.html);
                if ($('#product-list tbody tr').size() >= data.total)
                {
                    $('#load-more-product-btn').hide();
                }
                $('#load-more-product-btn').data('nextpage', sdata.page_no + 1)
                        .text('Load more...')
                        .attr('disabled', false);
            }
        });
    });

    $(document).on('click', '#move_order a', function (event) {
        event.preventDefault();
         var checked = $('input[name="id[]"]:checked').length > 0;
        if(checked){
            var x= $('input[name="id[]"]:checked').val();
            alert(x)
        }
        $.ajax({
            url: $(this).attr('href'),
            method: 'POST',
            success: function () {
                window.setTimeout('location.reload()', 300);
                jQuery('.msgbox').html(showSuccess("Status Changed")).show().delay(4000).fadeOut();
            },
            error: function () {
                window.setTimeout('location.reload()', 300);
            }
        });
    });

//.attr("href", "https://www.w3schools.com/jquery")

//   $('.checkbox').on('click',  function (event) {
//    event.preventDefault();
//    if ($('this').is(':checked')) {}
//       
//    });



    $('#action_btn').on('click',  function (event) {
        event.preventDefault();

        var checked = $('input[name="id[]"]:checked').length > 0;
        if(checked){
            var order_status = $('#ch_order_status').val();
            var sList = "";
            $('input[type=checkbox]').each(function () {
                if(this.checked ){
                    var sThisVal = $(this).val();
                    sList += (sList=="" ? sThisVal : "_" + sThisVal);
                }
            });

            var sms_checked = jQuery('input[name="sms[]"]:checked').length > 0;
            var send_msg = 0;
            if(sms_checked){
                send_msg = 2;
            }

            var route_url = baseurl+'order/bulk_move_to/'+order_status +'/'+sList;
            console.log (route_url);
            $.ajax({
                 url: route_url,
                 method: 'POST',
                 data: {send_msg: send_msg},
                 success: function (data) {
                     jQuery('.msgbox').html(showSuccess("Status Changed")).show().delay(4000).fadeOut();
                     window.setTimeout('location.reload()', 300);
                 },
                 error: function () {
                    window.setTimeout('location.reload()', 300);
                 }
             });
        }
    });
    // summernote
    $('#wysiwyg').summernote({
        height: 300, // set editor height
        minHeight: null, // set minimum height of editor
        maxHeight: null, // set maximum height of editor
        focus: true // set focus to editable area after initializing summernote
    });
    $('#wysiwyg1').summernote();
    $('#wysiwyg2').summernote();
    $('#wysiwyg3').summernote();
    $('#wysiwyg4').summernote();
    $('#wysiwyg5').summernote();
    // Rashed Vai Data Table


    $('#datatable').dataTable();
    $('#datatable-keytable').DataTable({
        keys: true
    });
    $('#datatable-responsive').DataTable();
    $('#datatable-scroller').DataTable({
        ajax: "js/datatables/json/scroller-demo.json",
        deferRender: true,
        scrollY: 380,
        scrollCollapse: true,
        scroller: true
    });
    var table = $('#datatable-fixed-header').DataTable({
        fixedHeader: true
    });
    // Rashed Vai Data Table


    $(document)
            .on('show.bs.modal', '.modal', function () {
                $(document.body).addClass('modal-open')
            })
            .on('hidden.bs.modal', '.modal', function () {
                $(document.body).removeClass('modal-open')
            });
});
var handleDataTableButtons = function () {
    "use strict";
    0 !== $(".datatable-buttons").length && $(".datatable-buttons").DataTable({
//        "bPaginate": true, //hide pagination
//        "info": false,
        "order": [[0


            , "desc"]],
        "iDisplayLength": 25,
        dom: "Bfrtip",
        buttons: [{
                extend: "copy",
                className: "btn-sm"
            }, {
                extend: "csv",
                className: "btn-sm"
            }, {
                extend: "excel",
                className: "btn-sm"
            }, {
                extend: "pdf",
                className: "btn-sm"
            }, {
                extend: "print",
                className: "btn-sm"
            }],
        responsive: !0
    })
}, TableManageButtons = function () {
    "use strict";
    return {
        init: function () {
            handleDataTableButtons()
        }
    }
}();



var handleCartButtons = function () {
    "use strict";
    0 !== $(".cart-buttons").length && $(".cart-buttons").DataTable({
        "iDisplayLength": 25,
        dom: "Bfrtip",
        buttons: [{
                text: 'Add to Cart',
                action: function (e, dt, node, config) {
                    document.getElementById("addToCart").submit();// Form submission
                }
            }]
    });
}, cartButtons = function () {
    "use strict";
    return {
        init: function () {
            handleCartButtons()
        }
    }
}();
TableManageButtons.init();
cartButtons.init();


