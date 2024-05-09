
<section>
    <div class="blog_area">
        <div class="container">
            <div class="row">
          <div class="col-md-8">
            <div class="singlepost">
        		<figure>
        		    <img alt="<?php echo @$single_post->Title;?>" style="max-width:100%;" class="img-fluid" src="<?= base_url('uploads/posts/'.$single_post->MediaFileName);?>">
        		</figure>
        		<h1><?php echo @$single_post->Title;?></h1>
        		<div class="postmeta">
        			<ul>
        				<li><a href="#"><i class="fa fa-folder-o" aria-hidden="true"></i> Category</a></li>
        				<li><a href="#"><i class="fa fa-calendar" aria-hidden="true"></i> <?= date("d/m/Y", $single_post->AddedDate);?></a></li>
        				<li><a href="#"><i class="fa fa-user" aria-hidden="true"></i> Admin</a></li>
        			</ul>
        		</div>
        		<!-- /post meta -->
        		<div class="post-content">
        		    <?php echo @$single_post->PostContent;?>
        		</div>
        		<!-- /post -->
        	</div>
        
            <div class="share_blog">
              <div class="row">
                  <div class="col-md-6">
                    <div class="sochel-text">
                      <h1><i class="fa fa-share-alt" aria-hidden="true"></i> Share this post, Choose Your Platform</h1>
                    </div>
                  </div>
                  <div class="col-md-6">
                      <div class="Social-share">
                        <ul>
                          <li><a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo base_url('/p/' . $single_post->PostRoute); ?>"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                          <li><a href="https://twitter.com/home?status=<?php echo $single->PostTitle; ?>"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                          <li><a href="https://plus.google.com/share?url=<?php echo base_url('/p/' . $single_post->PostRoute); ?>"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                          <li><a href="https://pinterest.com/pin/create/button/?url=<?php echo base_url('/p/' . $single_post->PostRoute); ?>&media=<?= base_url('uploads/posts/'.$single_post->MediaFileName);?>&description=<?php echo $single->PostTitle; ?>"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a></li>
                          <li><a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo base_url('/p/' . $single_post->PostRoute); ?>&title=<?php echo $single->PostTitle; ?>&summary=&source="><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                        </ul>
                      </div>
                  </div>
                </div>
            </div>
        
          </div>
          <div class="col-md-4">
                <div class="row">
              <div class="col-md-12">
              <div class="recent_Posts">
                <h1>Recent Posts</h1>
                <ul class="categories_list">
                    
                <?php foreach($recent_posts as $recent): ?>
                  <li>
                    <div class="media-pull">
        
                      <a href="<?= base_url('p/'.$recent->PostRoute); ?>"> <img alt="<?php echo @$recent->Title;?>" style="max-width:100%;" class="img-fluid" src=" <?= base_url('uploads/posts/'.$recent->MediaFileName);?>"> </a>
                    </div>
                    <div class="img-details">
                      <a href="<?= base_url('p/'.$recent->PostRoute); ?>"><h2><?= $recent->Title; ?></h2></a>
                      <p> <span><?= date("F d,Y", $recent->AddedDate);?> </span> </p>
                    </div>
                 </li>
                 <?php endforeach; ?>
        
                </ul>
              </div>
            </div>
        
        
                <div class="col-md-12">
                  <div class="social_blog">
                    <div class="row">
                        <div class="col-md-12">
                          <div class="sochel_text_a">
                            <h1>Follow Us</h1>
                          </div>
                        </div>
                        <div class="col-md-12">
                            <div class="Social_share_B">
                              <ul>
                                 <li><a href="https://www.facebook.com/TritiyoTeam/" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                <li><a href="https://plus.google.com/108999789851854062934" target="_blank"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                                <li><a href="https://www.linkedin.com/company/tritiyo-limited" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                              </ul>
                            </div>
                        </div>
                      </div>
                  </div>
                </div>
                <div class="col-md-12">
                    <div class="popular_teg">
                    	<div class="widget-title">
                    		<h4>Our Services</h4>
                    	</div>
                    	<div class="tags">
                    		<a hreflang="en" href="https://www.tritiyo.com/services/android-development-company-in-bangladesh">Android Development</a>
                    		<a hreflang="en" href="https://www.tritiyo.com/services/web-design-company-in-bangladesh">Web Design</a>
                    		<a hreflang="en" href="https://www.tritiyo.com/services/web-development-company-in-bangladesh">Web Development</a>
                    		<a hreflang="en" href="https://www.tritiyo.com/services/cms-customization">CMS customization</a>
                    		<a hreflang="en" href="https://www.tritiyo.com/services/leading-digital-marketing-agency-in-bangladesh">Digital Marketing</a>
                    		<a hreflang="en" href="https://www.tritiyo.com/services/api-integration">API Integration</a>
                    		<a hreflang="en" href="https://www.tritiyo.com/services/ecommerce-development">eCommerce Development</a>
                    		<a hreflang="en" href="https://www.tritiyo.com/services/online-tv-setup-service-in-bangladesh">Online TV setup</a>
                    		<a hreflang="en" href="https://panel.aponhost.com/cart.php?a=add&amp;domain=register" target="_blank">Domain Registration</a>
                    		<a hreflang="en" href="https://panel.aponhost.com/cart.php" target="_blank">Web Hosting</a>
                    	</div>
                    </div>
                </div>
            </div>
          </div>
    </div>
        </div>
    </div>
</section>