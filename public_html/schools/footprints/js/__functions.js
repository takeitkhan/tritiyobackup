jQuery(document).ready(function ($) {
    $.noConflict();


    var newURL = window.location.protocol + "//" + window.location.host + window.location.pathname;
    var baseregisterURL = newURL;

    if (newURL == 'http://www.newportal.org/' || newURL == 'http://newportal.org/') {
        $('body').addClass('bg');
        $('footer').addClass('whitetext');
    } else if (baseregisterURL == 'http://www.newportal.org/auth/register/' || baseregisterURL == 'http://newportal.org/auth/register/') {
        $('body').addClass('bg');
        $('footer').addClass('whitetext');
    }

    $('.dropdown-toggle').click(function () {
        //alert('dropdown clicked');
    });


    if ($(window).width() <= 320) {
        //alert('we are here');
    }

    //alert("s");


    $('.roll-change').blur(function (e) {
        e.preventDefault();
        var currentID = $(this).attr("id").split('_')[1];
        var currentVal = $(this).val();
        var changeField = '#newdata_'+currentID;
        var oldVal = $(changeField).val();
        var nid = oldVal.split('_')[0];
        var roll = oldVal.split('_')[1];
        var section = oldVal.split('_')[2];
        var class1 = oldVal.split('_')[3];
        var group1 = oldVal.split('_')[4];
        var newEntry = nid + '_' + currentVal + '_' + section + '_' + class1 + '_' + group1;
        $(changeField).val(newEntry);
    });

    $('.section-change').change(function (e) {
        e.preventDefault();
        var currentID = $(this).attr("id").split('_')[1];
        var currentVal = $(this).val();
        var changeField = '#newdata_'+currentID;
        var oldVal = $(changeField).val();
        var nid = oldVal.split('_')[0];
        var roll = oldVal.split('_')[1];
        var section = oldVal.split('_')[2];
        var class1 = oldVal.split('_')[3];
        var group1 = oldVal.split('_')[4];
        var newEntry = nid + '_' + roll + '_' + currentVal + '_' + class1+ '_' + group1;
        $(changeField).val(newEntry);
    });

    $('.group-change').change(function (e) {
        e.preventDefault();
        var currentID = $(this).attr("id").split('_')[1];
        var currentVal = $(this).val();
        var changeField = '#newdata_'+currentID;
        var oldVal = $(changeField).val();
        var nid = oldVal.split('_')[0];
        var roll = oldVal.split('_')[1];
        var section = oldVal.split('_')[2];
        var class1 = oldVal.split('_')[3];
        var group1 = oldVal.split('_')[4];
        var newEntry = nid + '_' + roll + '_' + section + '_' + class1+ '_' + currentVal;
        $(changeField).val(newEntry);
    });



});