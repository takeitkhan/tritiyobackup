jQuery(document).ready(function ($) {
    $.noConflict();

    /** Below Code for Homepage Body Extra Class **/
    var newURL = window.location.protocol + "//" + window.location.host + window.location.pathname;
    var baseregisterURL = newURL;

    //alert(newURL);
    if (newURL == 'http://www.newportal.org/' || newURL == 'http://newportal.org/') {
        $('body').addClass('bg');
        $('footer').addClass('whitetext');
    } else if (baseregisterURL == 'http://www.newportal.org/auth/register/' || baseregisterURL == 'http://newportal.org/auth/register/') {
        $('body').addClass('bg');
        $('footer').addClass('whitetext');
    }
    /** Above Code for Homepage Body Extra Class **/
    $('.dropdown-toggle').click(function () {
        //alert('dropdown clicked');
    });


    if ($(window).width() <= 320) {
        //alert('we are here');
    }
});