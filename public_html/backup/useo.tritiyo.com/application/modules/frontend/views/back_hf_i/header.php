<!DOCTYPE html>
<html>
    <head>
        <!-- Google Tag Manager -->
        <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
                            new Date().getTime(), event: 'gtm.js'});
                var f = d.getElementsByTagName(s)[0],
                        j = d.createElement(s), dl = l != 'dataLayer' ? '&l=' + l : '';
                j.async = true;
                j.src =
                        'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
                f.parentNode.insertBefore(j, f);
            })(window, document, 'script', 'dataLayer', 'GTM-MHZ95RL');</script>
        <!-- End Google Tag Manager -->
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
                    $img = base_url() . "files/how_to_pay.jpg";
                }
            }
        ?>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- TITLE OF SITE -->
        <title><?php echo!empty($SeoTitle) ? $SeoTitle : $title; ?></title>

        <meta name="description" content="<?php echo !empty($MetaDescription) ? $MetaDescription : 'Tritiyo Limited'; ?> ">
        <meta name="keywords" content="<?php echo !empty($MetaKeyword) ? $MetaKeyword : 'Tritiyo Limited'; ?>">
        <meta name="author" content="Samrat Khan @ Tritiyo Limited">

        
        <!-- Facebook -->
        <meta property="og:title" content="<?php echo!empty($SeoTitle) ? $SeoTitle : $title; ?>" />
        <meta property="og:url" content="<?php echo $actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>"/>
        <meta property="og:site_name" content="Tritiyo Limited"/>
        <meta property="og:image" content="<?php echo !empty($img) ? $img : 'http://www.tritiyo.com/files/tritiyo_team.jpg'; ?>"/>
        <meta property="og:title" content="<?php echo !empty($SeoTitle) ? $SeoTitle : $title; ?>" />
        <meta property="og:description" content="<?php echo !empty($MetaDescription) ? $MetaDescription : 'Tritiyo Limited is a software and web application development company aimed at offering high-quality, moderately priced. We view ourselves as partners with our customers, our employees, our community and our environment. We aim to become a regionally recognized brand name, capitalizing on the sustained interest in Bangladesh. Our goal is moderate growth, annual profitability and maintaining our sense of humor.'; ?>" />
        <meta property="og:type" content="software company" />
        <meta property="fb:app_id" content="712694542252264" />
        
        <!-- FAVICON  -->
        <!-- Place your favicon.ico in the images directory -->
        <link rel="shortcut icon" href="<?php echo base_url('files/favicon.png'); ?>" type="image/x-icon">
        <link rel="icon" href="<?php echo base_url('files/favicon.png'); ?>" type="image/x-icon">

        <!-- =========================
           STYLESHEETS 
        ============================== -->

        <!-- FONT ICONS -->
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">

        <script type="text/javascript">var baseurl = "<?php echo base_url(); ?>"</script> 
         

        <!-- CUSTOM STYLESHEET -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.9.0/css/lightbox.css" />        
        <link rel="stylesheet" href="<?php echo base_url('frontassets/css/plugins.css'); ?>">
        <link rel="stylesheet" href="<?php echo base_url('frontassets/css/style.css'); ?>">

        <!-- RESPONSIVE FIXES -->
        <link rel="stylesheet" href="<?php echo base_url('frontassets/css/responsive.css'); ?>">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->        
    </head>











    <body data-spy="scroll" data-target="#main-navbar">        
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
        <div class="main-container" id="page">            
            <header id="nav5-1" class="navbg">
                <nav class="navbar nav-2">
                    <div class="container">
                        <div class="navbar-header">
                            <!-- Menu Button for Mobile Devices -->
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>                            
                            <a href="<?php echo base_url(); ?>" class="navbar-brand smooth-scroll"><img src="<?php echo base_url('frontassets/images/logo.png'); ?>" alt="logo"></a>                            
                        </div>

                        <div class="collapse navbar-collapse" id="navbar-collapse">
                            <div class="navbar-right">
                                <span style="font-family: 'Roboto Condensed', sans-serif; color: #FFF;">Need Our Help?</span>                                
                                <span style="font-family: 'Roboto Condensed', sans-serif; color: #DDD; font-weight: 200;"><i class="fa fa-phone"></i> +8801821660066</span>
                                <span style="font-family: 'Roboto Condensed', sans-serif; color: #DDD; font-weight: 200;"> Or <i class="fa fa-skype"></i> skydotint</span>                                                                
                                <br/>
                                <hr style="margin-bottom: 15px !important;"/>
                            </div>
                            <ul class="nav navbar-nav navbar-right custom_margin">
                                <li><a href="<?php echo base_url(); ?>" class="smooth-scroll">Home</a></li>
                                <li><a href="<?php echo base_url('page/about-us'); ?>" class="smooth-scroll">About</a></li>
                                <li><a href="<?php echo base_url('page/our-team'); ?>" class="smooth-scroll">Team</a></li>
                                <!-- Dropdown Menu -->
                                <li class="dropdown">
                                    <a href="product.php" id="dLabel" data-toggle="dropdown" data-target="#" href="#">
                                        Products <span class="caret"></span>
                                    </a>
                                    <ul class="list-unstyled" role="menu">
                                        <li><a href="<?php echo base_url('page/smart-campus'); ?>">Smart Campus</a></li>
                                        <li><a href="<?php echo base_url('page/news-rabbit'); ?>">News Rabbit</a></li>
                                        <li><a href="<?php echo base_url('page/3-cart'); ?>">3Cart</a></li>
                                        <li><a href="<?php echo base_url('page/ibillgen'); ?>">iBillgen</a></li>                                        
                                    </ul>
                                </li>
                                <li class="dropdown">
                                    <a href="service.php" id="dLabel" data-toggle="dropdown" data-target="#" href="#">
                                        Services <span class="caret"></span>
                                    </a>
                                    <ul class="list-unstyled" role="menu">
                                        <li><a href="<?php echo base_url('page/android-development'); ?>">Android Development</a></li>
                                        <li><a href="<?php echo base_url('page/web-design'); ?>">Web Design</a></li>
                                        <li><a href="<?php echo base_url('page/web-development'); ?>">Web Development</a></li>
                                        <li><a href="<?php echo base_url('page/cms-customization'); ?>">CMS customization</a></li>
                                        <li><a href="<?php echo base_url('page/leading-digital-marketing-agency-in-bangladesh'); ?>">Digital Marketing</a></li>
                                        <li><a href="<?php echo base_url('page/api-integration'); ?>">API Integration</a></li>
                                        <li><a href="<?php echo base_url('page/ecommerce-development'); ?>">eCommerce Development</a></li>
                                        <li><a href="https://panel.aponhost.com/cart.php?a=add&domain=register" target="_blank">Domain Registration</a></li>
                                        <li><a href="https://panel.aponhost.com/cart.php" target="_blank">Web Hosting</a></li>                                        
                                    </ul>
                                </li>                                
                                <li><a href="<?php echo base_url('page/pricing'); ?>" class="smooth-scroll">Get Quote</a></li>

                                <li><a href="<?php echo base_url('portfolio'); ?>" class="smooth-scroll">Portfolio</a></li>
                                <li><a href="<?php echo base_url('page/contact-us'); ?>" class="smooth-scroll">Contact</a></li>
                            </ul>
                        </div><!-- /End Navbar Collapse -->
                    </div><!-- /End Container -->
                </nav><!-- /End Nav -->
            </header>

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
                        <ol class="breadcrumb">
                            <li><a href="<?php echo base_url(); ?>">Home</a></li>
                            <li class="active"><a href=""><?php echo $title; ?></a></li>        
                        </ol>
                    </div>       
                </div>
            <?php endif; ?>


