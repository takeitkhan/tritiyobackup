jQuery(document).ready(function ($) {
    $.noConflict();

$('img.thumbnail').click(function () {
        $('.modal-body').empty();
        var title = $(this).parent('a').attr("title");
        $('.modal-title').html(title);
        $($(this).parents('div').html()).appendTo('.modal-body');
        $('#myModal').modal({show: true});
    });

    $('#myTabs a').click(function (e) {
        e.preventDefault()
        $(this).tab('show')
    })

    $('.bxslider').bxSlider({
        auto: true,
        autoControls: false,
        adaptiveHeight: false,
        //mode: 'fade',
        captions: true,
        pager: false
    });

    $('#photoGallaryNew').magnificPopup({
        delegate: 'a',
        type: 'image',
        image: {
            cursor: null,
            titleSrc: 'title'
        },
        gallery: {
            enabled: true,
            preload: [0, 1], // Will preload 0 - before current, and 1 after the current image
            navigateByImgClick: true
        }
    });

    $('.ticker ul').carouFredSel({
        auto: true,
        circular: true,
        infinite: true,
        scroll: {
            delay: 100,
            queue: false,
            easing: 'linear',
            duration: 0.07,
            timeoutDuration: 0,
            pauseOnHover: 'immediate'
        }
    });
    $('body').on('click', 'img.printResult', function (e) {

        $(".printDivBlock").printArea({
            mode: "popup",
            popHt: 800,
            popWd: 800,
            popX: 500,
            popY: 600,
            popClose: true,
        });
    });
    $(".se-pre-con").fadeOut("slow");

});