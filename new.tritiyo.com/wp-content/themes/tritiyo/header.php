<?php global $options; 
$options = get_option( 'my_framework' ); ?> 
<!DOCTYPE html>
<html lang="en" class="no-js">
   <head>
      <meta charset="utf-8" />
      <title>
         <?php      
            if (is_home()) { 

                  bloginfo('name'); echo ' | '; bloginfo('description'); 

            } else { 

                  bloginfo('name'); wp_title(); 

            }
        ?>  
      </title>
      <meta name="viewport" content="width=device-width,initial-scale=1">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="theme-color" content="#c7ecff">
      <link href="<?php echo $options['favicon']['url'];?>" rel="icon">      
	  <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Squada+One&display=swap" rel="stylesheet">
      <?php wp_head();?>
   </head>
   <body>
      <div class="onloadpage" id="page_loader">
         <div class="pre-content">
            <div class="logo-pre"><img src="<?php echo get_template_directory_uri();?>/assets/images/3.png" alt="Logo" class="img-fluid" /></div>
         </div>
      </div>
      <header class="header-pr nav-bg-w main-header navfix fixed-top menu-white">
         <div class="container min m-pad">
            <div class="menu-header">
               <div class="dsk-logo">
                  <a class="nav-brand" href="<?php bloginfo('url');?>">
                     <img src="<?php echo $options['logo']['url'];?>" alt="Logo" class="mega-white-logo" xstyle="width: 14rem;" />
                     <img src="<?php echo $options['logo']['url'];?>" alt="Logo" class="mega-darks-logo" xstyle="width: 14rem;" />
                  </a>
               </div>
               <div class="custom-nav" role="navigation">
                  <?php
                     wp_nav_menu( array(
                           'theme_location'  => 'primary',
                           'depth'           => 3, // 1 = no dropdowns, 2 = with dropdowns.
                           'container'       => 'ul',
                           'container_class' => 'collapse navbar-collapse',
                           'container_id'    => 'main-nav-container',
                           'menu_class'      => 'nav-list d-lg-inline-block',
                           'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
                           'walker'          => new WP_Bootstrap_Navwalker(),
                     ) );
                  ?>
                              </div>
                                <ul class="nav-list d-lg-inline-block" style="float: right;
    line-height: 56px;">
                     <li class="d-none"><a href="#" class="menu-links right-bddr">&nbsp;</a>
                     <li class="contact-show d-inline-block">
                        <a href="#" class="btn-round- trngl btn-br bg-btn"><i class="fas fa-phone-alt"></i></a>
                        <div class="contact-inquiry">
                           <div class="contact-info-">
                              <div class="contct-heading">Contacts</div>
                              <div class="inquiry-card-nn hrbg">
                                 <div class="title-inq-c">Any Enquiries</div>
                                 <ul>
                                    <li class="mb0"><img src="<?php echo get_template_directory_uri();?>/assets/images/flags/bd.svg" alt="Bangladesh office" class="flags-size"> <a href="tel:<?php echo $options['phone'];?>"><?php echo $options['phone'];?></a></li>
                                 </ul>
                              <div xclass="inquiry-card-nn">
                                 <ul>
                                    <li><i class="fab fa-skype"></i><a href="skype:<?php echo $options['skype'];?>?call"><?php echo $options['skype'];?></a></li>
                                    <li><i class="fas fa-envelope"></i><a href=""><span class="__cf_email__" data-cfemail=""><?php echo $options['email'];?></span></a></li>
                                 </ul>
                              </div>
                           </div>
                        </div>
                     </li>
                     <li class="d-inline-block"><a href="<?php echo $options['header_button_url'];?>" class="btn-br bg-btn3 btshad-b2 lnk"><?php echo $options['header_button_label'];?> <span class="circle"></span></a> </li>
                  </ul>
               </div>

               <div class="mobile-menu2">
                  <ul class="mob-nav2">
                     <li class="navm-"> <a class="toggle" href="#"><span></span></a></li>
                  </ul>
               </div>
            </div>
            <nav id="main-nav">
               <?php
                  wp_nav_menu( array(
                        'theme_location'  => 'primary',
                        'depth'           => 3, // 1 = no dropdowns, 2 = with dropdowns.
                        'container'       => 'ul',
                        'container_class' => 'collapse navbar-collapse',
                        'container_id'    => 'main-nav-container',
                        'menu_class'      => 'first-nav',
                        'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
                  ) );
               ?>
               
               <ul class="bottom-nav">
                  <li class="prb">
                     <a href="tel:<?php echo $options['phone'] ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 384">
                           <path d="M353.188,252.052c-23.51,0-46.594-3.677-68.469-10.906c-10.719-3.656-23.896-0.302-30.438,6.417l-43.177,32.594
                              c-50.073-26.729-80.917-57.563-107.281-107.26l31.635-42.052c8.219-8.208,11.167-20.198,7.635-31.448
                              c-7.26-21.99-10.948-45.063-10.948-68.583C132.146,13.823,118.323,0,101.333,0H30.813C13.823,0,0,13.823,0,30.813
                              C0,225.563,158.438,384,353.188,384c16.99,0,30.813-13.823,30.813-30.813v-70.323C384,265.875,370.177,252.052,353.188,252.052z" />
                        </svg>
                     </a>
                  </li>
                  <li class="prb">
                     <a href="mailto:<?php echo $options['email'] ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                           <path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z" />
                           <path d="M0 0h24v24H0z" fill="none" />
                        </svg>
                     </a>
                  </li>
                  <li class="prb">
                     <a href="skype:<?php echo $options['skype'] ?>?call">
                        <svg enable-background="new 0 0 24 24" height="18" viewBox="0 0 24 24" width="18" xmlns="http://www.w3.org/2000/svg">
                           <path d="m23.309 14.547c1.738-7.81-5.104-14.905-13.139-13.543-4.362-2.707-10.17.352-10.17 5.542 0 1.207.333 2.337.912 3.311-1.615 7.828 5.283 14.821 13.311 13.366 5.675 3.001 11.946-2.984 9.086-8.676zm-7.638 4.71c-2.108.867-5.577.872-7.676-.227-2.993-1.596-3.525-5.189-.943-5.189 1.946 0 1.33 2.269 3.295 3.194.902.417 2.841.46 3.968-.3 1.113-.745 1.011-1.917.406-2.477-1.603-1.48-6.19-.892-8.287-3.483-.911-1.124-1.083-3.107.037-4.545 1.952-2.512 7.68-2.665 10.143-.768 2.274 1.76 1.66 4.096-.175 4.096-2.207 0-1.047-2.888-4.61-2.888-2.583 0-3.599 1.837-1.78 2.731 2.466 1.225 8.75.816 8.75 5.603-.005 1.992-1.226 3.477-3.128 4.253z" />
                        </svg>
                     </a>
                  </li>
               </ul>
            </nav>
         </div>
      </header>