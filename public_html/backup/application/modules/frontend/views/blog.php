<section id="cta3-3" class="p-y-lg bg-img" style="background-image: url('http://tritiyo.com/files/cms_customization.jpg')">
    <div class="overlay"></div> 
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 text-center text-white">
                <h3 class="f-w-900 m-b-md our_product_heading">Blog Post</h3>
            </div>
        </div>
    </div>
</section>

<div class="breadcum_area">
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="http://tritiyo.com/">Home</a></li>
            <li class="active"><a href="">Web Design, Software Development, Digital Marketing blog</a></li>        
        </ol>
    </div>       
</div>




<section>
  <div class="blog_area">
    <div class="container">

      
    <div class="blog_warp">
      <div class="row">
        <div class="col-md-8">
          <div class="row">
              
              
            <?php 
            //owndebugger($posts);
            
            foreach($posts as $post) : ?>
            
            
             <div class="col-md-6">
              <div class="blog_post">
                <div class="blog_img">
                  <a href="<?php echo site_url('p/' . $post->PostRoute); ?>"> 
                    <img class="img-responsive" src="<?php echo site_url('uploads/posts/' . $post->MediaFileName); ?>" alt="<?php echo $post->Title; ?>">
                  </a>
                  <span><?php echo  date('F d, Y',  strtotime( $post->create_date)); ?></span> <!--October 4, 2018 -->
                  

                </div>
                <div class="article-content">
                  <h1><a class="post-title" href="<?php echo site_url('p/' . $post->PostRoute); ?>">
                      <?php echo $post->Title; ?> 
                  </a> </h1>
                <div class="post-excerpt">
                	<p><?php echo text_limit($post->PostContent, 150); ?></p>
                </div>
                <div class="article-footer">
                <ul class="entry-meta entry-details">
                    <li data-hover="Comments"><a href="<?php echo site_url('p/' . $post->PostRoute); ?>">Details >></a></li>
                </ul>
                </div>
                </div>
              </div>
            </div>
            
   
             <?php endforeach; ?>
                    
           
            
            

          </div>
            <div class="row">
                <div class="col-lg-12 col-xs-12">
                    <ul class="pagination" style="display: table;margin:auto;">
                        <?= @$paging; ?>
                    </ul>
                </div>
             </div>
          
          
        </div>
        <div class="col-md-4">
          <div class="blog_sidebar">
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
                            <li> <a href="https://www.facebook.com/TritiyoTeam/" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a> </li>
                            <!--<li> <a href="#" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a> </li>-->
                            <li> <a href="https://plus.google.com/108999789851854062934" target="_blank"><i class="fa fa-google-plus" aria-hidden="true"></i></a> </li>
                            <!--<li> <a href="#" target="_blank"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a> </li>-->
                            <!--<li> <a href="#" target="_blank"><i class="fa fa-tumblr" aria-hidden="true"></i></a> </li>-->
                            <li> <a href="https://www.linkedin.com/company/tritiyo-limited" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a> </li>
                          </ul>
                        </div>
                    </div>
                  </div>
              </div>
            </div>
            <div class="col-md-12">
                <div class="popular_teg">
                  <div class="widget-title">
                    <h4>Popular Tags</h4>
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



    </div>
  </div>
</section>
















<style>
    /*--------------------------------------------------------------
    # Home Page
    --------------------------------------------------------------*/
    .bg_background {
    	background: #f2f2f2;
    	overflow: hidden;
    }
    .blog_post {
    	margin-bottom: 30px;
    }
    .article-content {
    	padding:15px;
      background-color: #fff;
      box-sizing: border-box;
      border-radius: 3px;
      border-bottom: 1px solid #dadada;
    }
    .article-footer {
    	background-color: #f9f9f9;
    	width: calc(91% + 60px);
    	margin-left: -15px;
    	margin-bottom: -15px;
    	padding: 5px 15px;
    	box-sizing: border-box;
    	margin-top: 30px;
        overflow: hidden;
    }
    .post-excerpt p {
    	font-size: 14px;
    	line-height: 24px;
    	color: #767676;
    }
    .article-footer .entry-date {
    	float:left;
    }
    .article-footer .entry-details{
    	float:right;
    }
    .entry-meta.entry-date li a {
    	font-size: 12px;
    	text-transform: uppercase;
    	color: green;
    	font-weight: bold;
    }
    .article-footer ul li{
        display: block;
    }
    .article-footer ul li a{
    
    }
    
    .post-title{
      font-size: 16px;
    line-height: 24px;
    font-weight: 500;
    color: #51c435 !important;
    margin-bottom: 10px;
    display: block;
    -ms-word-wrap: break-word;
    word-wrap: break-word;
    }
    .article-content h1{
      margin-top: 0px;
    }
    .entry-details li a {
    	color: #333;
    	font-size: 12px;
    	font-weight: bold;
    }
    
    
    
    
    .recent_Posts {
        background: #f9f9f9;
        padding: 15px 30px;
        box-shadow: 0px 1px 15px 1px #ddd;
    }
    
    .recent_Posts h1 {
        font-size: 24px;
        font-weight: 500;
        color: #333;
        line-height: 28px;
        margin-bottom: 20px;
        margin-top: 10px;
    }
    
    .recent_Posts .categories_list li {
        display: block;
        overflow: hidden;
        margin-bottom: 15px;
    }
    
    .recent_Posts .categories_list li .media-pull {
        width: 25%;
        float: left;
        max-height: 55px;
    }
    .recent_Posts .categories_list li .media-pull a img{
        height: 55px;
    }
    .recent_Posts .categories_list li .img-details {
        width: 75%;
        float: left;
       max-height: 55px;
    }
    
    .recent_Posts .categories_list li .img-details h2 {
        font-size: 12px;
        margin: 0px;
        color: #51c435 !important;
        line-height: 18px;
        font-weight: 500;
        padding: 0px 10px;
    }
    
    .recent_Posts .categories_list li .img-details p {
        display: block;
        font-size: 13px;
        line-height: 16px;
        letter-spacing: .42px;
        color: #aaa;
        padding: 0px 10px;
    }
    .archive_main{
        padding: 15px 30px;
    	background: #f9f9f9;
    	border-top: 1px solid #eee;
        margin-top: 15px;
        box-shadow: 0px 1px 15px 1px #ddd;
        overflow: hidden
    }
    .archive_add{
        width: 50%;
        float: left
    }
    .archive_add a img{
        width: 100%;
        height: auto;
        margin-top: 20px;
    }
    .Archives_list {
    	width: 50%;float: left;
    }
    .Archives_title h1 {
    	font-size: 24px;
    	font-weight: 500;
    	color: #333;
    	line-height: 28px;
    	margin-bottom: 10px;
    	margin-top: 10px;
        
    }
    .Archives_list ul li{
        display: block;
        margin-left: 10px;
    } 
    .Archives_list ul li a{
        font-size: 14px;
        font-weight: 500;
        line-height: 20px;
        color: #555;
    }
    /*--------------------------------------------------------------
    # Responsive
    --------------------------------------------------------------*/
    
    @media screen and (max-width: 1199px) and (min-width: 992px) {}
    
    @media screen and (max-width: 1199px) {}
    
    @media screen and (max-width: 991px) {}
    
    @media screen and (max-width: 767px) {}
    
    @media screen and (max-width: 550px) {}
    
    @media screen and (max-width: 480px) {}
    
    @media screen and (max-width: 400px) {}}

</style>