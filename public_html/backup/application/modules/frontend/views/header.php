<!DOCTYPE html>
<html>
    <head>
        <!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-NV4NDKB');</script>
<!-- End Google Tag Manager -->
        
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-73939162-1"></script>
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());
        
          gtag('config', 'UA-73939162-1');
        </script>
        
        <script>
            (function (i, s, o, g, r, a, m) {
                i['GoogleAnalyticsObject'] = r;
                i[r] = i[r] || function () {
                    (i[r].q = i[r].q || []).push(arguments)
                }, i[r].l = 1 * new Date();
                a = s.createElement(o),
                        m = s.getElementsByTagName(o)[0];
                a.async = 1;
                a.src = g;
                m.parentNode.insertBefore(a, m)
            })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');

            ga('create', 'UA-73939162-1', 'auto');
            ga('send', 'pageview');

        </script>


        <?php
            if ($this->uri->segment(2))
                $pageroute = $this->uri->segment(2);

            if (!empty($pageroute)) {
                if ($pageroute == 'about-us') {
                    $img = base_url() . "files/about_us.jpg";
                } elseif ($pageroute == 'our-team') {
                    $img = base_url() . "files/team.jpg";
                } elseif ($pageroute == 'smart-campus') {
                    $img = base_url() . "files/smart_campus.jpg";
                } elseif ($pageroute == 'news-rabbit') {
                    $img = base_url() . "files/news_rabbit.jpg";
                } elseif ($pageroute == '3-cart') {
                    $img = base_url() . "files/3cart.jpg";
                } elseif ($pageroute == 'ibillgen') {
                    $img = base_url() . "files/ibillgen.jpg";
                } elseif ($pageroute == 'android-development') {
                    $img = base_url() . "files/android_development.jpg";
                } elseif ($pageroute == 'web-design') {
                    $img = base_url() . "files/web_design.jpg";
                } elseif ($pageroute == 'web-development') {
                    $img = base_url() . "files/web_development.jpg";
                } elseif ($pageroute == 'cms-customization') {
                    $img = base_url() . "files/cms_customization.jpg";
                } elseif ($pageroute == 'pricing') {
                    $img = base_url() . "files/pricing.jpg";
                } elseif ($pageroute == 'portfolio') {
                    $img = base_url() . "files/portfolio.jpg";
                } elseif ($pageroute == 'contact-us') {
                    $img = base_url() . "files/contact.jpg";
                } elseif ($pageroute == 'how-to-pay') {
                    $img = base_url() . "files/how_to_pay.jpg";
                } elseif ($pageroute == 'sitemap') {
                    $img = base_url() . "files/sitemap.jpg";
                } elseif ($pageroute == 'faq') {
                    $img = base_url() . "files/faq.jpg";
                } elseif ($pageroute == 'terms-and-condition') {
                    $img = base_url() . "files/terms_and_condition.jpg";
                } elseif ($pageroute == 'blog') {
                    
                } elseif ($pageroute == 'privacy-policy') {
                    $img = base_url() . "files/privacy_policy.jpg";
                } elseif ($pageroute == 'blog') {
                    $img = base_url() . "files/blog.jpg";
                } else {
                    $img = base_url() . "files/cms_customization.jpg";
                }
            }
        ?>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,minimum-scale=1">
        <meta name="msvalidate.01" content="E24A1747B1C1EE3E6B8E36955DC1E8FF" />
        <meta name="google-site-verification" content="hnLnlNb28klOj_flo6e2ic0gkNuzOSWeQTk4PGo8DSQ" />
        <!-- TITLE OF SITE -->
        <title><?php echo!empty($SeoTitle) ? $SeoTitle : $title; ?></title>

        <meta name="description" content="<?php echo !empty($MetaDescription) ? $MetaDescription : 'Tritiyo Limited | valid reason, dynamic solution'; ?> ">
        <meta name="keywords" content="<?php echo !empty($MetaKeyword) ? $MetaKeyword : 'Tritiyo Limited, valid reason, dynamic solution'; ?>">
        <meta name="author" content="Samrat Khan @ Tritiyo Limited">

        <link rel="canonical" href="<?php echo $actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>">
        
        <!-- Facebook -->
        <meta property="og:title" content="<?php echo!empty($SeoTitle) ? $SeoTitle : $title; ?>" />
        <meta property="og:url" content="<?php echo $actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>"/>
        <meta property="og:site_name" content="Tritiyo Limited"/>
        <meta property="og:image" content="<?php echo !empty($img) ? $img : 'http://www.tritiyo.com/files/tritiyo_limited.jpg'; ?>"/>
        <meta property="og:title" content="<?php echo !empty($SeoTitle) ? $SeoTitle : $title; ?>" />
        <meta property="og:description" content="<?php echo !empty($MetaDescription) ? $MetaDescription : 'Tritiyo Limited is a software and web application development company aimed at offering high-quality, moderately priced. We view ourselves as partners with our customers, our employees, our community and our environment. We aim to become a regionally recognized brand name, capitalizing on the sustained interest in Bangladesh. Our goal is moderate growth, annual profitability and maintaining our sense of humor.'; ?>" />
        <meta property="og:type" content="website" />
        <meta property="fb:app_id" content="712694542252264" />
        
        <!-- FAVICON  -->
        <!-- Place your favicon.ico in the images directory -->
        <link rel="shortcut icon" href="<?php echo base_url('files/favicon.png'); ?>" type="image/x-icon">
        <link rel="icon" href="<?php echo base_url('files/favicon.png'); ?>" type="image/x-icon">

        <script type="application/ld+json">
            {
            "@context": "http://schema.org",
            "@type": "Organization",
            "url": "<?php echo $actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>",
            "name": "<?php echo!empty($SeoTitle) ? $SeoTitle : $title; ?>",
                "contactPoint": {
                    "@type": "ContactPoint",
                    "telephone": "+880-1821660066",
                    "contactType": "Customer service"
                }
            }
        </script>
        
        <!-- =========================
           STYLESHEETS 
        ============================== -->

        <!-- FONT ICONS -->
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <!--<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">-->

        <script type="text/javascript">var baseurl = "<?php echo base_url(); ?>"</script>
        <!-- CUSTOM STYLESHEET -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.9.0/css/lightbox.css" />        
        <link rel="stylesheet" href="<?php echo base_url('frontassets/minified.css'); ?><?php //echo base_url('frontassets/css/plugins.css'); ?>">
        <!--<link rel="stylesheet" href="<?php echo base_url('frontassets/css/style.css'); ?>">-->

        <!-- RESPONSIVE FIXES -->
        <!--<link rel="stylesheet" href="<?php echo base_url('frontassets/css/responsive.css'); ?>">-->

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->        
        <style type="text/css">.fb_hidden{position:absolute;top:-10000px;z-index:10001}.fb_reposition{overflow:hidden;position:relative}.fb_invisible{display:none}.fb_reset{background:none;border:0;border-spacing:0;color:#000;cursor:auto;direction:ltr;font-family:"lucida grande", tahoma, verdana, arial, sans-serif;font-size:11px;font-style:normal;font-variant:normal;font-weight:normal;letter-spacing:normal;line-height:1;margin:0;overflow:visible;padding:0;text-align:left;text-decoration:none;text-indent:0;text-shadow:none;text-transform:none;visibility:visible;white-space:normal;word-spacing:normal}.fb_reset>div{overflow:hidden}.fb_link img{border:none}@keyframes fb_transform{from{opacity:0;transform:scale(.95)}to{opacity:1;transform:scale(1)}}.fb_animate{animation:fb_transform .3s forwards}
.fb_dialog{background:rgba(82, 82, 82, .7);position:absolute;top:-10000px;z-index:10001}.fb_reset .fb_dialog_legacy{overflow:visible}.fb_dialog_advanced{padding:10px;-moz-border-radius:8px;-webkit-border-radius:8px;border-radius:8px}.fb_dialog_content{background:#fff;color:#333}.fb_dialog_close_icon{background:url(http://static.xx.fbcdn.net/rsrc.php/v3/yq/r/IE9JII6Z1Ys.png) no-repeat scroll 0 0 transparent;cursor:pointer;display:block;height:15px;position:absolute;right:18px;top:17px;width:15px}.fb_dialog_mobile .fb_dialog_close_icon{top:5px;left:5px;right:auto}.fb_dialog_padding{background-color:transparent;position:absolute;width:1px;z-index:-1}.fb_dialog_close_icon:hover{background:url(http://static.xx.fbcdn.net/rsrc.php/v3/yq/r/IE9JII6Z1Ys.png) no-repeat scroll 0 -15px transparent}.fb_dialog_close_icon:active{background:url(http://static.xx.fbcdn.net/rsrc.php/v3/yq/r/IE9JII6Z1Ys.png) no-repeat scroll 0 -30px transparent}.fb_dialog_loader{background-color:#f6f7f9;border:1px solid #606060;font-size:24px;padding:20px}.fb_dialog_top_left,.fb_dialog_top_right,.fb_dialog_bottom_left,.fb_dialog_bottom_right{height:10px;width:10px;overflow:hidden;position:absolute}.fb_dialog_top_left{background:url(http://static.xx.fbcdn.net/rsrc.php/v3/ye/r/8YeTNIlTZjm.png) no-repeat 0 0;left:-10px;top:-10px}.fb_dialog_top_right{background:url(http://static.xx.fbcdn.net/rsrc.php/v3/ye/r/8YeTNIlTZjm.png) no-repeat 0 -10px;right:-10px;top:-10px}.fb_dialog_bottom_left{background:url(http://static.xx.fbcdn.net/rsrc.php/v3/ye/r/8YeTNIlTZjm.png) no-repeat 0 -20px;bottom:-10px;left:-10px}.fb_dialog_bottom_right{background:url(http://static.xx.fbcdn.net/rsrc.php/v3/ye/r/8YeTNIlTZjm.png) no-repeat 0 -30px;right:-10px;bottom:-10px}.fb_dialog_vert_left,.fb_dialog_vert_right,.fb_dialog_horiz_top,.fb_dialog_horiz_bottom{position:absolute;background:#525252;filter:alpha(opacity=70);opacity:.7}.fb_dialog_vert_left,.fb_dialog_vert_right{width:10px;height:100%}.fb_dialog_vert_left{margin-left:-10px}.fb_dialog_vert_right{right:0;margin-right:-10px}.fb_dialog_horiz_top,.fb_dialog_horiz_bottom{width:100%;height:10px}.fb_dialog_horiz_top{margin-top:-10px}.fb_dialog_horiz_bottom{bottom:0;margin-bottom:-10px}.fb_dialog_iframe{line-height:0}.fb_dialog_content .dialog_title{background:#6d84b4;border:1px solid #365899;color:#fff;font-size:14px;font-weight:bold;margin:0}.fb_dialog_content .dialog_title>span{background:url(http://static.xx.fbcdn.net/rsrc.php/v3/yd/r/Cou7n-nqK52.gif) no-repeat 5px 50%;float:left;padding:5px 0 7px 26px}body.fb_hidden{-webkit-transform:none;height:100%;margin:0;overflow:visible;position:absolute;top:-10000px;left:0;width:100%}.fb_dialog.fb_dialog_mobile.loading{background:url(http://static.xx.fbcdn.net/rsrc.php/v3/ya/r/3rhSv5V8j3o.gif) white no-repeat 50% 50%;min-height:100%;min-width:100%;overflow:hidden;position:absolute;top:0;z-index:10001}.fb_dialog.fb_dialog_mobile.loading.centered{width:auto;height:auto;min-height:initial;min-width:initial;background:none}.fb_dialog.fb_dialog_mobile.loading.centered #fb_dialog_loader_spinner{width:100%}.fb_dialog.fb_dialog_mobile.loading.centered .fb_dialog_content{background:none}.loading.centered #fb_dialog_loader_close{color:#fff;display:block;padding-top:20px;clear:both;font-size:18px}#fb-root #fb_dialog_ipad_overlay{background:rgba(0, 0, 0, .45);position:absolute;bottom:0;left:0;right:0;top:0;width:100%;min-height:100%;z-index:10000}#fb-root #fb_dialog_ipad_overlay.hidden{display:none}.fb_dialog.fb_dialog_mobile.loading iframe{visibility:hidden}.fb_dialog_content .dialog_header{-webkit-box-shadow:white 0 1px 1px -1px inset;background:-webkit-gradient(linear, 0% 0%, 0% 100%, from(#738ABA), to(#2C4987));border-bottom:1px solid;border-color:#1d4088;color:#fff;font:14px Helvetica, sans-serif;font-weight:bold;text-overflow:ellipsis;text-shadow:rgba(0, 30, 84, .296875) 0 -1px 0;vertical-align:middle;white-space:nowrap}.fb_dialog_content .dialog_header table{-webkit-font-smoothing:subpixel-antialiased;height:43px;width:100%}.fb_dialog_content .dialog_header td.header_left{font-size:12px;padding-left:5px;vertical-align:middle;width:60px}.fb_dialog_content .dialog_header td.header_right{font-size:12px;padding-right:5px;vertical-align:middle;width:60px}.fb_dialog_content .touchable_button{background:-webkit-gradient(linear, 0% 0%, 0% 100%, from(#4966A6), color-stop(.5, #355492), to(#2A4887));border:1px solid #29487d;-webkit-background-clip:padding-box;-webkit-border-radius:3px;-webkit-box-shadow:rgba(0, 0, 0, .117188) 0 1px 1px inset, rgba(255, 255, 255, .167969) 0 1px 0;display:inline-block;margin-top:3px;max-width:85px;line-height:18px;padding:4px 12px;position:relative}.fb_dialog_content .dialog_header .touchable_button input{border:none;background:none;color:#fff;font:12px Helvetica, sans-serif;font-weight:bold;margin:2px -12px;padding:2px 6px 3px 6px;text-shadow:rgba(0, 30, 84, .296875) 0 -1px 0}.fb_dialog_content .dialog_header .header_center{color:#fff;font-size:16px;font-weight:bold;line-height:18px;text-align:center;vertical-align:middle}.fb_dialog_content .dialog_content{background:url(http://static.xx.fbcdn.net/rsrc.php/v3/y9/r/jKEcVPZFk-2.gif) no-repeat 50% 50%;border:1px solid #555;border-bottom:0;border-top:0;height:150px}.fb_dialog_content .dialog_footer{background:#f6f7f9;border:1px solid #555;border-top-color:#ccc;height:40px}#fb_dialog_loader_close{float:left}.fb_dialog.fb_dialog_mobile .fb_dialog_close_button{text-shadow:rgba(0, 30, 84, .296875) 0 -1px 0}.fb_dialog.fb_dialog_mobile .fb_dialog_close_icon{visibility:hidden}#fb_dialog_loader_spinner{animation:rotateSpinner 1.2s linear infinite;background-color:transparent;background-image:url(http://static.xx.fbcdn.net/rsrc.php/v3/yD/r/t-wz8gw1xG1.png);background-repeat:no-repeat;background-position:50% 50%;height:24px;width:24px}@keyframes rotateSpinner{0%{transform:rotate(0deg)}100%{transform:rotate(360deg)}}
.fb_iframe_widget{display:inline-block;position:relative}.fb_iframe_widget span{display:inline-block;position:relative;text-align:justify}.fb_iframe_widget iframe{position:absolute}.fb_iframe_widget_fluid_desktop,.fb_iframe_widget_fluid_desktop span,.fb_iframe_widget_fluid_desktop iframe{max-width:100%}.fb_iframe_widget_fluid_desktop iframe{min-width:220px;position:relative}.fb_iframe_widget_lift{z-index:1}.fb_hide_iframes iframe{position:relative;left:-10000px}.fb_iframe_widget_loader{position:relative;display:inline-block}.fb_iframe_widget_fluid{display:inline}.fb_iframe_widget_fluid span{width:100%}.fb_iframe_widget_loader iframe{min-height:32px;z-index:2;zoom:1}.fb_iframe_widget_loader .FB_Loader{background:url(http://static.xx.fbcdn.net/rsrc.php/v3/y9/r/jKEcVPZFk-2.gif) no-repeat;height:32px;width:32px;margin-left:-16px;position:absolute;left:50%;z-index:4}
.fb_invisible_flow{display:inherit;height:0;overflow-x:hidden;width:0}.fb_mobile_overlay_active{height:100%;overflow:hidden;position:fixed;width:100%}.fb_shrink_active{opacity:1;transform:scale(1, 1);transition-duration:200ms;transition-timing-function:ease-out}.fb_shrink_active:active{opacity:.5;transform:scale(.75, .75)}</style>
    </head>

    <body data-spy="scroll" data-target="#main-navbar">      
    <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NV4NDKB"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

        <div id="fb-root"></div>
        <script>(function (d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id))
                    return;
                js = d.createElement(s);
                js.id = id;
                js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.10&appId=712694542252264";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));</script>

        <!-- Preloader --> 

        <!-- <div class="loader bg-white">
             <div class="loader-inner ball-scale-ripple-multiple vh-center">
                 <div></div>
                 <div></div>
                 <div></div>
             </div>
         </div>
        -->
        <div itemscope itemtype="http://schema.org/LocalBusiness" class="main-container" id="page">
        <div class="main-container" id="page">            
            <div class="all-width">
  <header>
      <style type="text/css">
          .card {
                position: relative;
                display: inline-block;
            }
            .card .img-top {
                display: none;
                position: absolute;
                top: 0;
                left: 0;
                z-index: 99;
            }
            .card:hover .img-top {
                display: inline;
            }
      </style>
    <!-- header-top-area-start -->
      <div class="header-top-area display-none">
        <div class="container">
          <div class="row">
            <div class="col-md-7 col-sm-7">
               <div class="header-top-right text-left">
                <ul>
                  <!-- <li><a href="#"><i class="fa fa-phone" aria-hidden="true"></i> 09666-744755</a></li> -->
                   <li><a href="<?php echo base_url('page/contact-us'); ?>">NEED OUR HELP?</a></li>
                  <li><a href="javascript:void(0);" itemprop="telephone"><i class="fa fa-phone"></i>+880 1821660066</a></li>
                  <li><a href="javascript:void(0);"><i class="fa fa-skype" aria-hidden="true"></i>skydotint</a></li>
                </ul>
              </div>
            </div>

            <div class="col-md-5 col-sm-5">
              <div class="header-top-left text-right">
                <ul>
                  <li class="service.php"><a href="<?php echo base_url('services/android-development-company-in-bangladesh'); ?>">Our Services</a></li>
                  <li><a href="<?php echo base_url('page/how-to-pay'); ?>">How to pay us</a></li>
                  <li><a href="<?php echo base_url('page/faq'); ?>">FAQ</a></li>
                  <li><a hreflang="en" href="<?php echo base_url('page/pricing'); ?>" class="smooth-scroll btn btn-xs btn-success">Get Quote</a> </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    <!-- header-top-area-end -->
    <!-- header-midd-area-start -->
      <div class="header-midd-area">
        <div class="container">
          <div class="row">
            <div class="col-md-3 col-sm-3">
              <!--header-logo-start-->
              <div class="header-logo">
                <!--logo-img-here-->
                  
                  <!--logo-text-->
                 <!--  <a href="index.html"> <img src="img/logo.png" alt="Softwere Logo"> </a> -->
                   <a href="<?php echo base_url(); ?>" class="navbar-brand smooth-scroll">
                       <div class="card">
                            <img src="<?php echo base_url('frontassets/images/logo.png'); ?>" alt="Tritiyo Limited">
                            <img src="<?php echo base_url('frontassets/images/logo.png'); ?>" class="img-top" alt="Tritiyo Limited">
                        </div>
                    </a>
              </div>
            </div>
            <div class="col-md-9 col-sm-9">
              <div class="side-nav-main">
                <div id="mySidenav" class="sidenav">
                  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                  <div class="panel-group" id="accordion">
                      <div class="panel panel-default">
                            <div class="panel-heading">
                              <h4 class="panel-title">
                                <a href="<?php echo base_url(); ?>">Home</a>
                              </h4>
                            </div>
                      </div>

                      <div class="panel panel-default">
                        <div class="panel-heading">
                          <h4 class="panel-title">
                            <a href="<?php echo base_url('page/about-us'); ?>">About Us</a>
                          </h4>
                        </div>
                      </div>
                      <div class="panel panel-default">
                        <div class="panel-heading">
                          <h4 class="panel-title">
                            <a href="<?php echo base_url('page/our-team'); ?>">Team</a>
                          </h4>
                        </div>
                      </div>
                          
                          
                          <div class="panel panel-default">
                            <div class="panel-heading">
                              <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">Products <span><i class="fa fa-angle-down" aria-hidden="true"></i></span> </a>
                              </h4>
                            </div>
                            <div id="collapse1" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <li><a hreflang="en" href="<?php echo base_url('products/smart-campus/one-stop-school-management-system'); ?>">Smart Campus</a></li>
                                    <li><a hreflang="en" href="<?php echo base_url('products/news-rabbit/online-news-portal-content-management'); ?>">News Rabbit</a></li>
                                    <!--<li><a hreflang="en" href="<?php echo base_url('products/foodie/a-complete-point-of-sale-for-restaurant'); ?>">Foodie</a></li>-->
                                    <li><a hreflang="en" href="<?php echo base_url('products/3cart/ecommerce-content-management'); ?>">3Cart</a></li>
                                    <!--<li><a hreflang="en" href="<?php echo base_url('products/ibillgen/isp-billing-management'); ?>">iBillgen</a></li>-->
                                    <!--<li><a hreflang="en" href="<?php echo base_url('products/scs/smart-clinic-solution'); ?>">Smart Clinic Solution</a></li>-->
                                    <li><a hreflang="en" target="-_blank"  href="http://bizradix.com/">Bizradix</a></li>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                          <div class="panel-heading">
                            <h4 class="panel-title">
                              <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">Services <span><i class="fa fa-angle-down" aria-hidden="true"></i></span> </a>
                            </h4>
                          </div>
                          <div id="collapse2" class="panel-collapse collapse">
                            <div class="panel-body">
                                <li> <a hreflang="en" href="<?php echo base_url('services/android-development-company-in-bangladesh'); ?>">Android Development</a> </li>
                                <li> <a hreflang="en" href="<?php echo base_url('services/web-design-company-in-bangladesh'); ?>">Web Design</a> </li>
                                <li> <a hreflang="en" href="<?php echo base_url('services/web-development-company-in-bangladesh'); ?>">Web Development</a> </li>
                                <!--<li> <a hreflang="en" href="<?php echo base_url('services/cms-customization'); ?>">CMS customization</a> </li>-->
                                <!--<li> <a hreflang="en" href="<?php echo base_url('services/leading-digital-marketing-agency-in-bangladesh'); ?>">Digital Marketing</a> </li>-->
                                <li> <a hreflang="en" href="<?php echo base_url('services/api-integration'); ?>">API Integration</a> </li>
                                <li> <a hreflang="en" href="<?php echo base_url('services/ecommerce-development'); ?>">eCommerce Development</a> </li>
                                <!--<li> <a hreflang="en" href="<?php echo base_url('services/online-tv-setup-service-in-bangladesh'); ?>">>Online TV setup</a> </li>-->
                                <li> <a hreflang="en" href="https://panel.aponhost.com/cart.php?a=add&domain=register" target="_blank">Domain Registration</a> </li>
                                <li> <a hreflang="en" href="https://panel.aponhost.com/cart.php" target="_blank">Web Hosting</a> </li>
                              </div>
                              </div>
                              </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a href="<?php echo base_url('page/pricing'); ?>">Get Quote</a>
                                    </h4>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a href="<?php echo base_url('portfolio'); ?>">Portfolio</a>
                                    </h4>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a href="<?php echo base_url('blog'); ?>">Blog</a>
                                    </h4>
                                </div>
                            </div>
                            
                            
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a href="<?php echo base_url('page/contact-us'); ?>">Contact</a>
                                    </h4>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a href="http://www.tritiyo.com/page/how-to-pay">How to pay us</a>
                                    </h4>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a href="http://www.tritiyo.com/page/faq">FAQ</a>
                                    </h4>
                                </div>
                            </div>
                            
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a href="">NEED OUR HELP?</a>
                                    </h4>
                                </div>
                            </div>

                        </div>
                </div>
                <span class="list-btn" style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>
              </div>
              <script>
              function openNav() {
                  document.getElementById("mySidenav").style.width = "250px";
              }

              function closeNav() {
                  document.getElementById("mySidenav").style.width = "0";
              }
              </script>

             <div class="header-midd-menuprincipal display-none">
                <ul>
                    <li class="active"> <a hreflang="en" href="<?php echo base_url(); ?>" class="smooth-scroll">Home</a> </li>
                    <li><a hreflang="en" href="<?php echo base_url('page/about-us'); ?>" class="smooth-scroll">About Us</a></li>
                    <li><a hreflang="en" href="<?php echo base_url('page/our-team'); ?>" class="smooth-scroll">Team</a></li>
                    <li>
                        <a href="product.php" id="dLabel" data-toggle="dropdown" data-target="#">Products <span><i class="fa fa-caret-down" aria-hidden="true"></i></span> </a>
                        <ul>
                            <li><a hreflang="en" href="<?php echo base_url('products/smart-campus/one-stop-school-management-system'); ?>">Smart Campus</a></li>
                            <li><a hreflang="en" href="<?php echo base_url('products/news-rabbit/online-news-portal-content-management'); ?>">News Rabbit</a></li>
                            <!--<li><a hreflang="en" href="<?php echo base_url('products/foodie/a-complete-point-of-sale-for-restaurant'); ?>">Foodie</a></li>-->
                            <li><a hreflang="en" href="<?php echo base_url('products/3cart/ecommerce-content-management'); ?>">3Cart</a></li>
                            <!--<li><a hreflang="en" href="<?php echo base_url('products/ibillgen/isp-billing-management'); ?>">iBillgen</a></li>-->
                            <!--<li><a hreflang="en" href="<?php echo base_url('products/scs/smart-clinic-solution'); ?>">Smart Clinic Solution</a></li>-->
                            <li><a hreflang="en" target="-_blank"  href="http://bizradix.com/">Bizradix</a></li>
                        </ul>
                    </li>

                  <li>
                        <a href="service.php" id="dLabel" data-toggle="dropdown" data-target="#">Services <span><i class="fa fa-caret-down" aria-hidden="true"></i></span> </a>
                        <ul>
                            <li><a hreflang="en" href="<?php echo base_url('services/android-development-company-in-bangladesh'); ?>">Android Development</a></li>
                            <li><a hreflang="en" href="<?php echo base_url('services/web-design-company-in-bangladesh'); ?>">Web Design</a></li>
                            <li><a hreflang="en" href="<?php echo base_url('services/web-development-company-in-bangladesh'); ?>">Web Development</a></li>
                            <!--<li><a hreflang="en" href="<?php echo base_url('services/cms-customization'); ?>">CMS customization</a></li>-->
                            <!--<li><a hreflang="en" href="<?php echo base_url('services/leading-digital-marketing-agency-in-bangladesh'); ?>">Digital Marketing</a></li>-->
                            <li><a hreflang="en" href="<?php echo base_url('services/api-integration'); ?>">API Integration</a></li>
                            <li><a hreflang="en" href="<?php echo base_url('services/ecommerce-development'); ?>">eCommerce Development</a></li>
                            <li class="separator"></li>
                            <!--<li><a hreflang="en" href="<?php echo base_url('services/online-tv-setup-service-in-bangladesh'); ?>">Online TV setup</a></li>-->
                            <li class="separator"></li>
                            <li><a hreflang="en" href="https://panel.aponhost.com/cart.php?a=add&domain=register" target="_blank">Domain Registration</a></li>
                            <li><a hreflang="en" href="https://panel.aponhost.com/cart.php" target="_blank">Web Hosting</a></li>
                        </ul>
                  </li>
                  <li><a href="<?php echo base_url('portfolio'); ?>" class="smooth-scroll">Portfolio</a></li>
                  <li><a href="<?php echo base_url('blog'); ?>" class="smooth-scroll">Blog</a></li>
                  <li><a hreflang="en" href="<?php echo base_url('page/contact-us'); ?>" class="smooth-scroll">Contact Us</a></li>
                </ul>
              </div>

            </div>
          </div>
        </div>
      </div>
    <!-- header-midd-area-end -->
  </header>
</div>
            
            

            <?php if ($this->uri->segment(2)): ?>
                <section id="cta3-3" class="p-y-lg bg-img" style='background-image: url("<?php echo $img; ?>")'>
                    <div class="overlay"></div> 
                    <div class="container">
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2 text-center text-white">
                                <h3 class="f-w-900 m-b-md our_product_heading"><?php echo $title; ?></h3>
                            </div>
                        </div>
                    </div>
                </section>
                <div class="breadcum_area">
                    <div class="container">
                        <div class="row">
                            <ol class="breadcrumb">
                                <li><a href="<?php echo base_url(); ?>">Home</a></li>
                                <li class="active"><a href=""><?php echo $title; ?></a></li>        
                            </ol>
                        </div>
                    </div>
                    
                </div>
                
            <?php else: ?>
            
                <!--<section id="cta3-3" class="p-y-lg bg-img" style='background-image: url("<?php //echo $img; ?>")'>-->
                <!--    <div class="overlay"></div> -->
                <!--    <div class="container">-->
                <!--        <div class="row">-->
                <!--            <div class="col-md-8 col-md-offset-2 text-center text-white">-->
                <!--                <h3 class="f-w-900 m-b-md our_product_heading"><?php //echo $title; ?></h3>-->
                <!--            </div>-->
                <!--        </div>-->
                <!--    </div>-->
                <!--</section>-->
                <!--<div class="breadcum_area">-->
                <!--    <div class="container">-->
                <!--        <ol class="breadcrumb">-->
                <!--            <li><a href="<?php echo base_url(); ?>">Home</a></li>-->
                <!--            <li class="active"><a href=""><?php echo $title; ?></a></li>        -->
                <!--        </ol>-->
                <!--    </div>-->
                    
                    <?php //owndebugger($title); ?>
                <!--</div>-->
            
            <?php endif; ?>


