/*	Table OF Contents
 ==========================
 Carousel
 Customs Script [Modal Thumb | List View  Grid View + Add to Wishlist Click Event + Others ]
 Custom Parallax
 Custom Scrollbar
 Custom animated.css effect
 Equal height ( subcategory thumb)
 Responsive fix
 PRODUCT DETAILS 5 Customs Script
 */
// Create a clone of the menu, right next to original.
jQuery(document).ready(function ($) {
    $.noConflict();
    var width = $(window).width(), height = $(window).height();
    if ((width <= 768)) {
        $('.problem_menu').removeClass('menu');
    } else {
        $('.problem_menu').addClass('menu');
    }
    var navheight = $('.navbar-top').height();
    //alert(navheight);
    if ($(window).scrollTop() >= navheight) {
        $('.problem_menu').css('position', 'fixed');
        $('.problem_menu').css('top', '0');
        $('.problem_menu').css('z-index', '999');
    } else {
        $('.problem_menu').addClass('menu')
        $('.problem_menu').css('position', 'relative');
    }
    $(window).load(function () {
        // full load
        $('#modalAds').modal('show');
        $('#modalAds').removeClass('hide');

        $('li.megamenu-content ul').addClass('col-lg-2  col-sm-2 col-md-2  unstyled noMarginLeft');
        $('li.megamenu-content ul li span').css('display', 'block');
        $('li.megamenu-content ul li span').css('margin-top', '25px');
    });
    
    
    
    $('#contactForm').bootstrapValidator({
        excluded: false,
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        live: 'enabled',
        message: 'This value is not valid',
        submitHandler: function (validator, form, submitButton) {
            var data = $(form).serialize();
            var url = baseurl + 'sendcontact';
            $.ajax({
                type: "post",
                url: url,
                cache: false,
                data: data,
                success: function (data) {
                    console.log(data);
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
                    $('.msgbox').html(data.msg).show().addClass('alert-danger').delay(2000).fadeOut();
                }
            });
        },
        trigger: null
    });
    /*
     $(window).scroll(function () {
     //if you hard code, then use console
     //.log to determine when you want the 
     //nav bar to stick.  
     console.log($(window).scrollTop())
     if ($(window).scrollTop() > 100) {
     $('.navbar-tshop').css('marginTop', 0);
     $('.navbar-top').hide();
     }
     if ($(window).scrollTop() < 100) {
     $('.navbar-tshop').css('marginTop', 100);
     $('.navbar-top').show();
     }
     });
     
     /*==================================
     Carousel
     ====================================*/

    // NEW ARRIVALS Carousel

    function customPager() {

        $.each(this.owl.userItems, function (i) {

            var pagination1 = $('.owl-controls .owl-pagination > div:first-child');
            var pagination = $('.owl-controls .owl-pagination');
            $(pagination[i]).append("<div class=' owl-has-nav owl-next'><i class='fa fa-angle-right'></i>  </div>");
            $(pagination1[i]).before("<div class=' owl-has-nav owl-prev'><i class='fa fa-angle-left'></i> </div>");


        });

    }

    var latestProductSlider = $("#productslider");
    latestProductSlider.owlCarousel({
        navigation: false, // Show next and prev buttons
        items: 4,
        itemsTablet: [768, 2],
        afterInit: customPager,
        afterUpdate: customPager
    });


    // Custom Navigation Events
    $(".owl-next").click(function () {
        latestProductSlider.trigger('owl.next');
    })
    $(".owl-prev").click(function () {
        latestProductSlider.trigger('owl.prev');
    })


    // BRAND  carousel
    var owl = $(".brand-carousel");

    owl.owlCarousel({
        //navigation : true, // Show next and prev buttons
        navigation: false,
        pagination: true,
        items: 8,
        itemsTablet: [768, 4],
        itemsMobile: [400, 2]
    });

    // Custom Navigation Events
    $("#nextBrand").click(function () {
        owl.trigger('owl.next');
    })
    $("#prevBrand").click(function () {
        owl.trigger('owl.prev');
    })


    // YOU MAY ALSO LIKE  carousel

    $("#SimilarProductSlider").owlCarousel({
        navigation: false, // Show next and prev buttons
        afterInit: customPager,
        afterUpdate: customPager
    });


    var SimilarProductSlider = $("#SimilarProductSlider");
    SimilarProductSlider.owlCarousel({
        navigation: false, // Show next and prev buttons
        afterInit: customPager,
        afterUpdate: customPager
    });

    // Custom Navigation Events
    $("#SimilarProductSlider .owl-next").click(function () {
        SimilarProductSlider.trigger('owl.next');
    })

    $("#SimilarProductSlider .owl-prev").click(function () {
        SimilarProductSlider.trigger('owl.prev');
    })


    // Home Look 2 || Single product showcase 

    // productShowCase  carousel
    var pshowcase = $("#productShowCase");

    pshowcase.owlCarousel({
        autoPlay: 4000,
        stopOnHover: true,
        navigation: false,
        paginationSpeed: 1000,
        goToFirstSpeed: 2000,
        singleItem: true,
        autoHeight: true


    });

    // Custom Navigation Events
    $("#ps-next").click(function () {
        pshowcase.trigger('owl.next');
    })
    $("#ps-prev").click(function () {
        pshowcase.trigger('owl.prev');
    })


    // Home Look 3 || image Slider

    // imageShowCase  carousel
    var imageShowCase = $("#imageShowCase");

    imageShowCase.owlCarousel({
        autoPlay: 4000,
        stopOnHover: true,
        navigation: false,
        pagination: false,
        paginationSpeed: 1000,
        goToFirstSpeed: 2000,
        singleItem: true,
        autoHeight: true


    });

    // Custom Navigation Events
    $("#ps-next").click(function () {
        imageShowCase.trigger('owl.next');
    })
    $("#ps-prev").click(function () {
        imageShowCase.trigger('owl.prev');
    })


    $(document).ready(function () {

        $("#about_slider").owlCarousel({
            autoPlay: 3000, //Set AutoPlay to 3 seconds

            items: 1,
            itemsDesktop: [1199, 1],
            itemsDesktopSmall: [979, 1],
            pagination: true,
            navigation: false

        });

    });

    /*=======================================================================================
     Code for equal height - // your div will never broken if text get overflow
     ========================================================================================*/


    $(function () {
        $('.categoryProduct > .item').responsiveEqualHeightGrid()
    });

    $(function () {
        $('.thumbnail.equalheight').responsiveEqualHeightGrid(); // add class with selector class equalheight
    });

    $(function () {
        $('.featuredImgLook2 .inner').responsiveEqualHeightGrid(); // add class with selector class equalheight
    });

    $(function () {
        $('.featuredImageLook3 .inner').responsiveEqualHeightGrid(); // add class with selector class equalheight
    });


    /*==================================
     Customs Script
     ====================================*/

    // Product Details Modal Change large image when click thumb image
    $(".modal-product-thumb a").click(function () {
        var largeImage = $(this).find("img").attr('data-large');
        $(".product-largeimg").attr('src', largeImage);
        $(".zoomImg").attr('src', largeImage);
    });


    // Support

    $("#accordionNo .panel-collapse").each(function () {

        $(this).on('hidden.bs.collapse', function () {
            // do something…
            $(this).parent().find('.collapseWill').removeClass('active').addClass('hasPlus');
        });

        $(this).on('show.bs.collapse', function () {
            // do something…

            $(this).parent().find('.collapseWill').removeClass('hasPlus').addClass('active');
        });


    });


    $(".getFullSearch").on('click', function (e) {
        $('.search-full').addClass("active"); //you can list several class names 
        e.preventDefault();
    });

    $('.search-close').on('click', function (e) {
        $('.search-full').removeClass("active"); //you can list several class names 
        e.preventDefault();
    });


    // Customs tree menu script
    $(".dropdown-tree-a").click(function () { //use a class, since your ID gets mangled
        $(this).parent('.dropdown-tree').toggleClass("open-tree active"); //add the class to the clicked element
    });


    // NEW TREE MENU


    $(function () {
        var navTree = $('.nav-tree li:has(ul)');
        var navTreeA = navTree.addClass('parent_li').find(' > a');

        navTreeA.each(function () {

            if ($(this).hasClass("child-has-open")) {

            } else {
                $(this).addClass("child-has-close");
                var navTreeAchildren = $(this).parent('li.parent_li').find(' > ul > li');
                navTreeAchildren.hide();
            }

        });


        $('.nav-tree li.parent_li > a').on('click', function (e) {
            var children = $(this).parent('li.parent_li').find(' > ul > li');
            if (children.is(":visible")) {
                children.hide('fast');
                $(this).addClass('child-has-close').removeClass('child-has-open');

            } else {
                children.show('fast');
                $(this).addClass('child-has-open').removeClass('child-has-close');
            }
            e.stopPropagation();
        });
    });

    // Add to Wishlist Click Event	 // Only For Demo Purpose	

    $('.add-fav').click(function (e) {
        e.preventDefault();
        $(this).addClass("active"); // ADD TO WISH LIST BUTTON 
        $(this).attr('data-original-title', 'Added to Wishlist');// Change Tooltip text
    });

    // List view and Grid view 

    $(".change-view .list-view, .change-view-flat .list-view").click(function (e) { //use a class, since your ID gets mangled
        e.preventDefault();
        $('.categoryProduct  .item').addClass("list-view"); //add the class to the clicked element
        $('.add-fav').attr("data-placement", $(this).attr("left"));
        $('.categoryProduct > .item').detectGridColumns();


    });

    $(".change-view .grid-view, .change-view-flat .grid-view").click(function (e) { //use a class, since your ID gets mangled
        e.preventDefault();
        $('.categoryProduct  .item').removeClass("list-view"); //add the class to the clicked element


        $('.categoryProduct > .item').detectGridColumns();
        setTimeout(function () {
            //  reload function after 0.5 second
            $('.categoryProduct > .item').responsiveEqualHeightGrid();
        }
        , 500);

    });

    // v 7
    $('div.has-equal-height-child .product-item ').detectGridColumns();
    setTimeout(function () {
        //  reload function after 0.5 second
        $('div.has-equal-height-child .product-item').responsiveEqualHeightGrid();
    }
    , 500);


    $('div.has-equal-height-child > div.is-equal').responsiveEqualHeightGrid();

    // product details color switch 
    $(".swatches li").click(function () {
        $(".swatches li.selected").removeClass("selected");
        $(this).addClass('selected');
    });

    $(".product-color a").click(function () {
        $(".product-color a").removeClass("active");
        $(this).addClass('active');

    });

    // Modal thumb link selected
    $(".modal-product-thumb a").click(function () {
        $(".modal-product-thumb a.selected").removeClass("selected");
        $(this).addClass('selected');

    });


    if (/IEMobile/i.test(navigator.userAgent)) {
        // Detect windows phone//..
        $('.navbar-brand').addClass('windowsphone');
    }


    // top navbar IE & Mobile Device fix
    var isMobile = function () {
        //console.log("Navigator: " + navigator.userAgent);
        return /(iphone|ipod|ipad|android|blackberry|windows ce|palm|symbian)/i.test(navigator.userAgent);
    };


    if (isMobile()) {
        // For  mobile , ipad, tab
        $('.introContent').addClass('ismobile');


    } else {


        $(function () {

            //Keep track of last scroll
            var tshopScroll = 0;
            $(window).scroll(function (event) {
                //Sets the current scroll position
                var ts = $(this).scrollTop();
                //Determines up-or-down scrolling
                if (ts > tshopScroll) {
                    // downward-scrolling
                    $('.navbar').addClass('stuck');

                } else {
                    // upward-scrolling
                    $('.navbar').removeClass('stuck');
                }

                if (ts < 600) {
                    // downward-scrolling
                    $('.navbar').removeClass('stuck');
                    //alert()
                }


                tshopScroll = ts;

                //Updates scroll position

            });
        });


    } // end Desktop else


    /*==================================
     Parallax
     ====================================*/
    if (/iPhone|iPad|iPod/i.test(navigator.userAgent)) {
        // Detect ios User // 
        $('.parallax-section').addClass('isios');
        $('.navbar-header').addClass('isios');
        $('.blog-intro').addClass('isios');
        $('.product-story-hasbg').addClass('isios');
    }

    if (/Android|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
        // Detect Android User // 
        $('.parallax-section').addClass('isandroid');
    }

    if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
        // Detect Mobile User // No parallax
        $('.parallax-section').addClass('ismobile');
        $('.parallaximg').addClass('ismobile');


    } else {
        // All Desktop 
        $(window).bind('scroll', function (e) {
            parallaxScroll();
        });

        function parallaxScroll() {
            var scrolledY = $(window).scrollTop();
            var sc = ((scrolledY * 0.3)) + 'px';
            $('.parallaximg').css('marginTop', '' + ((scrolledY * 0.3)) + 'px');
            $('.parallax-windowz').css('background-position', 'center -' + ((scrolledY * 0.1)) + 'px');
        }


        if ($(window).width() < 768) {
        } else {
            $('.parallax-image-aboutus').parallax("50%", 0, 0.15, true);
            $('.about-3').parallax("50%", 0, 0.2, true);
            $('.parallaxbg').parallax("50%", 0, 0.2, true);
        }


    }


    /*==================================
     Custom Scrollbar for Dropdown Cart
     ====================================*/
    $(".scroll-pane").mCustomScrollbar({
        advanced: {
            updateOnContentResize: true

        },
        scrollButtons: {
            enable: false
        },
        mouseWheelPixels: "200",
        theme: "dark-2"

    });


    $(".smoothscroll").mCustomScrollbar({
        advanced: {
            updateOnContentResize: true

        },
        scrollButtons: {
            enable: false
        },
        mouseWheelPixels: "100",
        theme: "dark-2"

    });


    /*==================================
     Custom  animated.css effect
     ====================================*/

    window.onload = (function () {
        $(window).scroll(function () {
            if ($(window).scrollTop() > 86) {
                // Display something
                $('.parallax-image-aboutus .animated').removeClass('fadeInDown');
                $('.parallax-image-aboutus .animated').addClass('fadeOutUp');
            } else {
                // Display something
                $('.parallax-image-aboutus .animated').addClass('fadeInDown');
                $('.parallax-image-aboutus .animated').removeClass('fadeOutUp');


            }

            if ($(window).scrollTop() > 250) {
                // Display something
            } else {
                // Display something

            }

        })
    })


    /*=======================================================================================
     Code for tablet device || responsive check
     ========================================================================================*/

    $(window).bind('resize load', function () {
        if ($(this).width() < 767) {

            $("#accordionNo .panel-collapse:not(#collapseCategory)").collapse('hide');

        }

    }); // end resize load


    $(".tbtn").click(function () {
        $(".themeControll").toggleClass("active");
    });


    /*==================================
     Global Plugin
     ====================================*/

    // For stylish input check box 


    $(document).ready(function () {

        $('input').iCheck({
            // checkboxClass: 'icheckbox_minimal-green',
            // radioClass: 'iradio_minimal-green'

            checkboxClass: 'icheckbox_square-green iCheck-margin',
            radioClass: 'iradio_square-green iChk iCheck-margin'
        });


    });



    // customs select by select2

    // $("select").minimalect(); // REMOVED with  selct2.min.js

    $(document).ready(function () {
        $('select').select2();
    });

    // cart quantity changer sniper
    $("input[name='quanitySniper']").TouchSpin({
        buttondown_class: "btn btn-link",
        buttonup_class: "btn btn-link"
    });


    // bootstrap tooltip
    // $('.tooltipHere').tooltip();
    $('.tooltipHere').tooltip('hide')


    // dropdown-menu  Fix || Stop just one dropdown toggle from closing on click

    var options = [];

    $(".subscribe-dropdown .dropdown-menu div, .dropdown-menu input[type='radio'], .subscribe-dropdown  .dropdown-menu input[type='checkbox'], .subscribe-dropdown .dropdown-menu input[type='button']").on('click', function (event) {

        var $target = $(event.currentTarget),
                val = $target.attr('data-value'),
                $inp = $target.find('input'),
                idx;

        if ((idx = options.indexOf(val)) > -1) {
            options.splice(idx, 1);
            setTimeout(function () {
                $inp.prop('checked', false)
            }, 0);
        } else {
            options.push(val);
            setTimeout(function () {
                $inp.prop('checked', true)
            }, 0);
        }

        $(event.target).blur();

        console.log(options);
        return false;
    });


    // scroll to certain anchor/div

    $(".scrollto").click(function (event) {
        event.preventDefault();
        //calculate destination place
        var dest = 0;
        if ($(this.hash).offset().top > $(document).height() - $(window).height()) {
            dest = $(document).height() - $(window).height();
        } else {
            dest = $(this.hash).offset().top;
        }
        //go to destination
        $('html,body').animate({scrollTop: dest - 51}, 1000, 'swing');
    });

    /*=======================================================================================
     PRODUCT DETAILS 5 Customs Script
     ========================================================================================*/

    $(document).ready(function () {
        $('.swatches-rounded a').click(function () {
            var colorName = $(this).attr('title');
            $('.color-value').html(colorName)

        });


        // Modal Event


        $('#productSetailsModalAjax').on('loaded.bs.modal', function (e) {
            // Do ajax modal is loaded

            // Product Details Modal Change large image when click thumb image
            $(".modal-product-thumb a").click(function () {
                // alert();

                $(".modal-product-thumb a.selected").removeClass("selected");
                $(this).addClass('selected');
                var largeImage = $(this).find("img").attr('data-large');
                $(".product-largeimg").attr('src', largeImage);
                $(".zoomImg").attr('src', largeImage);
            });

            // product details color switch
            $(".swatches li").click(function () {
                $(".swatches li.selected").removeClass("selected");
                $(this).addClass('selected');
            });

            $('.swatches-rounded a').click(function () {
                var colorName = $(this).attr('title');
                $('.color-value').html(colorName)

            });

        })


    });


    /*=======================================================================================
     end
     ========================================================================================*/


}); // end Ready
/**
 *
 * @param msg
 * @returns {string}
 */
showSuccess = function (msg) {
    var p = '<div class="alert alert-success" ><strong>' + msg + '</strong></div>';
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
    show: function (jQuery) {
        var w = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
        var h = window.innerHeight || document.documentElement.clientHeight || document.body.clientHeight;
        jQuery('#processingmassage').css({
            'display': 'block',
            width: w,
            height: h,
            'padding-top': (h / 2) - 150
        })
    },
    hide: function (jQuery) {
        jQuery('#processingmassage').hide();
    }
}