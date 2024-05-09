<?php 
/* 
   Template Name: Contact
*/
get_header();?>

<section class="breadcrumb-area banner-2">
   <div class="text-block">
      <div class="container">
         <div class="row">
            <div class="col-lg-12 v-center">
               <div class="bread-inner">
                  <div class="bread-menu">
                     <ul>
                        <li><a href="<?php bloginfo('url');?>">Home</a></li>
                        <li><a href="<?php the_permalink();?>"><?php echo get_the_title(); ?></a></li>
                     </ul>
                  </div>
                  <div class="bread-title">
                     <h2><?php echo get_the_title(); ?></h2>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>


<section class="contact-page pad-tb">
   <div class="container">
      <div class="row justify-content-center">
         <div class="col-lg-6 v-center">
            <div class="common-heading text-l">
               <span>Contact Now</span>
               <h2 class="mt0 mb0">Have Question?<br/> Write a Message</h2>
               <p class="mb60 mt20">We will catch you as early as we receive the message</p>
            </div>
            <div class="form-block">
               <form id="contactForm" data-toggle="validator" class="shake">
                  <div class="row">
                     <div class="form-group col-sm-6">
                        <input type="text" id="name" placeholder="Enter name" required data-error="Please fill Out">
                        <div class="help-block with-errors"></div>
                     </div>
                     <div class="form-group col-sm-6">
                        <input type="email" id="email" placeholder="Enter email" required>
                        <div class="help-block with-errors"></div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="form-group col-sm-12">
                        <input type="text" id="mobile" placeholder="Enter mobile" required data-error="Please fill Out">
                        <div class="help-block with-errors"></div>
                     </div>
                  </div>
                  <div class="form-group">
                     <textarea id="message" rows="5" placeholder="Enter your message" required></textarea>
                     <div class="help-block with-errors"></div>
                  </div>
                  <button type="submit" id="form-submit" class="btn lnk btn-main bg-btn"><span class="circle"></span>Submit</button>
                  <div id="msgSubmit" class="h3 text-center hidden"></div>
                  <div class="clearfix"></div>
               </form>
            </div>
         </div>
         <div class="col-lg-5 v-center">
            <div class="contact-details">
               <div class="contact-card wow fadeIn" data-wow-delay=".2s">
                  <div class="info-card v-center">
                     <span>Contact Information:</span>
                     <div class="info-body">
						 <p>
							 63/F(4th Floor), Lake Circus, <br/>
							 West Panthapath, Dhaka 1205
						 </p>
						 <p><a href="tel:<?php echo $options['phone'];?>"><?php echo $options['phone'];?></a></p>						 
						 <p><a href="mailto:<?php echo $options['email'];?>"><span class="__cf_email__" data-cfemail=""><?php echo $options['email'];?></span></a></p>						 
						 <p><a href="skype:<?php echo $options['skypr'];?>?call"><?php echo $options['skype'];?></a></p>
                     </div>
                  </div>
               </div>
				<!--
               <div class="email-card mt30 wow fadeIn" data-wow-delay=".5s">
                  <div class="info-card v-center">
                     <span><i class="fas fa-envelope"></i> Email:</span>
                     <div class="info-body">
                        <p>Our support team will get back to in 24-h during standard business hours.</p>
                        
                     </div>
                  </div>
               </div>
               <div class="skype-card mt30 wow fadeIn" data-wow-delay=".9s">
                  <div class="info-card v-center">
                     <span><i class="fab fa-skype"></i> Skype:</span>
                     <div class="info-body">
                        <p>We Are Online: Monday – Friday, 9 am to 5 pm</p>
                        
                     </div>
                  </div>
               </div>
				-->
            </div>
         </div>
      </div>
   </div>
</section>



<?php get_footer();?>