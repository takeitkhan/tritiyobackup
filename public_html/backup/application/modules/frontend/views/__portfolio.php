<section class="p-y-lg">
    
<div class="container">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="brand-text">
                <h2>We become happier together</h2>
                <p class="lead">Our happy clients makes us happier too. Here some of our work we accomplished for your clients.</p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="select-wrapper">
                <div class="dropdown">
                  <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">Project Type
                    <i class="fa fa-angle-down"></i>
                </button>
                  <ul class="dropdown-menu sort-menuu">
                    <li class=""><a href="#">HTML</a><span><i class="fa fa-circle"></i></span></li>
                    <li><a href="#">CSS<span><i class="fa fa-circle"></i></span></a></li>
                    <li><a href="#">JavaScript<span><i class="fa fa-circle"></i></span></a></li>
                  </ul>
                </div>
                <div class="dropdown">
                  <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">Filter By
                    <i class="fa fa-angle-down"></i>
                </button>
                  <ul class="dropdown-menu sort-menuu">
                    <li><a href="#">HTML</a><span><i class="fa fa-circle"></i></span></li>
                    <li><a href="#">CSS<span><i class="fa fa-circle"></i></span></a></li>
                    <li><a href="#">JavaScript<span><i class="fa fa-circle"></i></span></a></li>
                  </ul>
                </div>
                <div class="dropdown">
                  <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">Service
                    <i class="fa fa-angle-down"></i>
                </button>
                  <ul class="dropdown-menu sort-menuu">
                    <li><a href="#">HTML</a><span><i class="fa fa-circle"></i></span></li>
                    <li><a href="#">CSS<span><i class="fa fa-circle"></i></span></a></li>
                    <li><a href="#">JavaScript<span><i class="fa fa-circle"></i></span></a></li>
                  </ul>
                </div>
<!--                <div class="dropdown pull-right">
                  <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown"><span class="sortby">Sort By  :</span> Tecnology
                    <i class="fa fa-angle-down"></i>
                </button>
                  <ul class="dropdown-menu sort-menuu">
                    <li><a href="#">HTML</a><span><i class="fa fa-circle"></i></span></li>
                  </ul>
                </div>-->
            </div>  
        </div>
        <div class="col-md-12">
            <div class="tag-boxs">
                <ul class="list-inline tag-list-item">
                    <li></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="row margin-top-30">
        <div class="col-md-3">
            <div class="porto-list">
                <h4>Category</h4>
                    <?php
                        foreach($cats as $cat) {
                            //owndebugger($cat->name);
                            
                            echo '<div class="radio">
                                    <label>
                                      <input type="radio" name="o1" value="" checked="">
                                      <span class="cr"><i class="cr-icon fa fa-circle"></i></span>
                                      '. $cat->name .' <span class="badge">12</span>
                                    </label>
                                  </div>';
                        }
                    ?>                    
                </div>
                <div class="porto-list">
                    <?php
                        //owndebugger($portfolios);
                    ?>
                    <h4>Tags</h4>
                    <div class="checkbox">
                      <label>
                        <input type="checkbox" name="o1" value="" checked="">
                        <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                        HTML
                      </label>
                    </div>
                </div>
<!--             <div class="list-group portfolio_category">
                    <a href="<?= base_url()?>page/portfolio" class="list-group-item <?php if(empty($this->uri->segment(3))) echo 'active'; ?>" >All <span class="badge"><?php echo $count_all_portfolio; ?></span></a>
                <?php foreach ($cats as $cat): ?>
                    <?php if($this->uri->segment(3)): ?>
                        <a href="<?= base_url()?>page/portfolio/<?= $cat->id ?>" class="list-group-item <?php if($this->uri->segment(3) == $cat->id) echo 'active'?>" ><?php echo ucfirst($cat->name) ?><span class="badge"><?php /*echo $cat->id; */ echo countPortfolio($cat->id) ?></span></a>
                    <?php  else:?>
                        <a href="<?= base_url()?>page/portfolio/<?= $cat->id ?>" class="list-group-item" ><?php echo ucfirst($cat->name) ?><span class="badge"><?php /*echo $cat->id;*/ echo countPortfolio($cat->id) ?></span></a>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div> -->
        </div>
        <div class="col-md-9">


            <div class="row margin-top-30">
                <?php foreach($portfolios as $port) : ?>
                <?php
                    //owndebugger($port);
                ?>
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="port-cardd">
                        <a href="<?= base_url('happy_client/'. $port->id); ?>">
                            <div class="port cardd-img">
                                <img src="<?= base_url('uploads/portfolio/'. $port->img); ?>" alt="">
                            </div>
                            <div class="port-card-text">
                                <h2><?= $port->name; ?></h2>
                                <p><?= $port->description; ?></p>
                            </div>
                            <div class="port-card-footer">
                                <div class="pull-left menus-bars">
                                    <a href=""><i class="fa fa-bars"></i></a>
                                </div>
                                <div class="pull-right">
                                    <ul class="list-inline">
                                        <li><a href="http://www.facebook.com/sharer.php?u=<?= base_url('happy_client/'. $port->id); ?>"><i class="fa fa-facebook-square"></i></a></li>
                                        <li><a href="https://plus.google.com/share?url=<?= base_url('happy_client/'. $port->id); ?>"><i class="fa fa-google-plus-square"></i></a></li>
                                        <li><a href="http://www.linkedin.com/shareArticle?mini=true&url=<?= base_url('happy_client/'. $port->id); ?>"><i class="fa fa-linkedin-square"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>


<!--             <section id="indy-masonry-container" class="indy-masonry-container">
                <?php foreach ($portfolios as $portfolio): ?>
                    <figure class="indy-masonry">
                        <img src="<?= base_url() ?>uploads/portfolio/<?= $portfolio->img; ?>" alt="">
                        <div class="masonary-hover">
                            <a href="<?= $portfolio->link; ?>" target="_blank"><i class="fa fa-link"></i></a>
                        </div>
                    </figure>
                <?php endforeach; ?>
            </section> -->
        </div>
    </div>
    .
    <div class="row">
        <div class="col-md-12">
            <div class="pagination-custom">
                <ul class="pagination">
                  <li><a href="#">1</a></li>
                  <li class="active"><a href="#">2</a></li>
                  <li><a href="#">3</a></li>
                  <li><a href="#">4</a></li>
                  <li><a href="#">5</a></li>
                  <li><a href="#">6</a></li>
                  <li><a href="#">7</a></li>
                  <li><a href="#">8</a></li>
                  <li><a href="#">8</a></li>
                  <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</div>



</section>
