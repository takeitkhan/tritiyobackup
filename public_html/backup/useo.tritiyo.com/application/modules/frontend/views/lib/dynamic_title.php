<?php
    $actual_link = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];

    $seg = 'tritiyo/tritiyo_html/';
    $fin_seg = explode('/', $actual_link);

    switch ($fin_seg[5]) {
        case 'smart-campus.php':
            $title = "Smart Campus - one stop campus management system";
            $description = "something will be here";
            break;

        case 'newsrabbit.php':
            $title = "News Rabbit - a complete news portal management system";
            $description = "something will be here";
            break;

        case '3cart.php':
            $title = "Simply and mordern functionality, fetures and Standard Design With 3 Cart is Awesome.";
            $description = "3Cart managment";
            break;

        case 'about-us.php':
            $title = "Tritiyo Limited is a software and web application development company aimed at offering high-quality, moderately priced. We view ourselves as partners with our customers, our employees, our community and our environment. We aim to become a regionally recognized brand name, capitalizing on the sustained interest in Bangladesh. Our goal is moderate growth, annual profitability and maintaining our sense of humor.";
            $description = "something will be here";
            break;

        case 'android-api-development.php':
            $title = "WE BUILD HIGHLY INTERACTIVE AND SCALABLE ANDROID APPS";
            $description = "something will be here";
            break;

        case 'cms-customization.php':
            $title = "Our development team is highly skilled at CMS customization of popular CMS like WordPress, Joomla, Drupal, Magento, PrestaShop, OpenCart, OS Commerce etc.";
            $description = "something will be here";
            break;

        case 'contact.php':
            $title = "Want to hire the best people around to design, develop, and turn your project into reality? Well look no further! Take your business to the next level.";
            $description = "something will be here";
            break;

        case 'ebubble.php':
            $title = "eBubble is a best practice ITSM workflows software. it's give you a lot of opportunity. afterall it's easy to use.";
            $description = "something will be here";
            break;

        case 'host.php':
            $title = "Hosting price based on packages";
            $description = "something will be here";
            break;

        case 'ibillgen.php':
            $title = "iBillgen is a ISP Billing Software helps you easily run and manage your ISP.";
            $description = "something will be here";
            break;

        case 'our_team.php':
            $title = "Meet Our development team";
            $description = "something will be here";
            break;

        case '3cart.php':
            $title = "Simply and mordern functionality, fetures and Standard Design With 3 Cart is Awesome.";
            $description = "something will be here";
            break;

        case 'portfolio.php':
            $title = "Visit Our Portfolio. here you can take a idea about our skrilled";
            $description = "something will be here";
            break;

        case 'pricing.php':
            $title = "Visit our Pricing Packages";
            $description = "something will be here";
            break;

        case 'web-design.php':
            $title = "Visit our Web Design page and take a idea.";
            $description = "something will be here";
            break;

        case 'web-development.php':
            $title = "Visit our Web Development page and take a idea.";
            $description = "something will be here";
            break;
        
        default:
            $title = "Tritiyo Limited - valid reason, dynamic solution`";
            $description = "something will be here";
            break;
    }    
?>