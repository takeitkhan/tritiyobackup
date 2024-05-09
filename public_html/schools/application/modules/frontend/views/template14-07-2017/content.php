<?php
    switch(trim($uri1)) {
        case 'content':
            require_once 'post.php';
            break;
        case 'page' :
            require_once 'page.php';
            break;
        case 'sitemap' :
            require_once 'sitemap.php';
            break;
        default:
            require_once 'home.php';
            break;
    }
?>