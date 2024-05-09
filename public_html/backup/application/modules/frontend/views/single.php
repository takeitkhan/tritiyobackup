<div class="row blog-wrapper">
    <div class="col-md-12 col-centered blog-left">
        <div class="bl-inner">
            <div class="item-blog-post">
                <div class="post-header clearfix">
                    <h2 class="fadeInDown  wow" data-wow-duration="0.2s" data-wow-delay=".5s">
                        <?php __e((!empty($single_post->Title) ? $single_post->Title : '')); ?>
                    </h2>
                    <div class="post-info">
                        Posted on
                        <span><?php __e((!empty($single_post->AddedDate) ? inttodate($single_post->AddedDate) : '')); ?></span>
                        <div class="share-gallery pull-right no-float-xs">
                            <a class="share-facebook" href="#"><i class="fa fa-facebook-f"></i></a>
                            <a class="share-twitter" href="#"><i class="fa fa-google"></i></a>
                        </div>
                    </div>
                </div>
                <div class="post-main-view">
                    <div class="post-lead-image wow  fadeIn  " data-wow-duration="0.2s" data-wow-delay=".6s">
                        <?php
                            if(!empty($single_post->MediaFileName)) {
                                echo '<img src="'. base_url() . 'uploads/posts/' . $single_post->MediaFileName .'" class="img-responsive" alt="G" />';
                            } else {
                                
                            }
                        ?>
                        
                    </div>
                    <div class="post-description wow  fadeIn  " data-wow-duration="0.2s" data-wow-delay=".1s">
                        <?php __e((!empty($single_post->PostContent) ? $single_post->PostContent : '')); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>