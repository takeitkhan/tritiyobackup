<section id="cta3-3" class="p-y-lg bg-img" style="background-image: url('<?php echo base_url('files/cms_customization.jpg'); ?>')">
    <div class="overlay"></div> 
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 text-center text-white">
                <h3 class="f-w-900 m-b-md our_product_heading">Portfolio</h3>
            </div>
        </div>
    </div>
</section>
<div class="breadcum_area">
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>">Home</a></li>
            <li class="active"><a href="<?php echo base_url('portfolio'); ?>">Portfolio</a></li>        
        </ol>
    </div>       
</div>
<section id="contact3-1" class="p-y-lg" style="background: #FFFFFF !important;">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="brand-text">
                    <h1>Portfolio of Web design, Web Development, Digital Marketing, Android APP development works</h1>
                    <h2>We become happier together</h2>
                    <p class="lead">Our happy clients makes us happier too. Here some of our work we accomplished for your clients.</p>                    
                </div>
            </div>
        </div>
        <hr/>
        <div class="clearfix"></div>
        <div class="row margin-top-30">
            <div class="col-md-3">
                <div class="proto_bg">
                    <div class="porto-list-first">
                    <h3>Search Filters</h3>
                </div>
                <form class="form_style" action="<?php base_url('page/portfolio'); ?>" method="post">
                    <div class="porto-list">
                        <label class="row col-md-12">Search Terms</label>
                        <?php
                        $data = array(
                            'name' => 'search_key',
                            'id' => 'search_key',
                            'class' => 'form-control',
                            'placeholder' => 'Search by keywords',
                            'type' => 'text',
                            'value' => (isset($options['search_key']) ? $options['search_key'] : '')
                        );

                        echo form_input($data);
                        ?>
                    </div>                    
                    <div class="row porto-list">                        
                        <label class="col-md-12">Range</label>
                        <div class="col-md-6">
                            <?php
                            $data = array(
                                'name' => 'offset',
                                'id' => 'offset',
                                'class' => 'form-control',
                                'placeholder' => 'Start',
                                'type' => 'number',
                                'value' => (isset($options['offset']) ? $options['offset'] : '')
                            );

                            echo form_input($data);
                            ?>
                        </div>
                        <div class="col-md-6">                            
                            <?php
                            $data = array(
                                'name' => 'limit',
                                'id' => 'limit',
                                'class' => 'form-control',
                                'placeholder' => 'End',
                                'type' => 'number',
                                'value' => (isset($options['limit']) ? $options['limit'] : '')
                            );

                            echo form_input($data);
                            ?>
                        </div>
                    </div>
                    <div class="row porto-list">
                        <label class="col-md-12">Month Range</label>
                        <div class="col-md-12">
                            <?php
                            $time_duration = array(
                                '' => 'Select Month Range',
                                '3' => 'Last 3 Months',
                                '6' => 'Last 6 Months',
                                '12' => 'Last 12 Months',
                            );
                            echo form_dropdown('time_duration', $time_duration, set_value('time_duration', (isset($options['limit_s']) ? $options['limit_s'] : ''), TRUE), array('class' => 'form-control'));
                            ?>
                        </div>
                    </div>
                    <div class="row porto-list">
                        <label class="col-md-12">Category</label>
                        <div class="col-md-12">
                            <ul style="list-style: none; padding: 0; margin: 0;">
                                <?php foreach ($cats as $cat) { ?>
                                    <li><label class=""><input type="radio" name="category" value="<?= $cat->id ?>" <?= (($cat->id == $options['category']) ? "checked=checked" : NULL) ?>> <?= $cat->name ?></label></li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                    <div class="row porto-list">
                        <label class="col-md-12">Tags</label>
                        <div class="col-md-12">
                            <ul style="list-style: none; padding: 0; margin: 0;">
                                <?php foreach ($techs as $tech) { ?>
                                    <li><label class=""><input type="radio" name="techs" value="<?= $tech->id ?>" <?= (($tech->id == $options['techs']) ? "checked=checked" : NULL) ?>> <?= $tech->name ?></label></li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                    <input type="submit" name="submit" class="btn btn-success" value="Search" />
                </form>
                </div>
            </div>

            <div class="col-md-9 leftborder">

                <div class="row margin-top-30">

                    <?php foreach ($portfolios as $port) : ?>
                        <?php
                        //owndebugger($port);
                        $port = is_object($port) ? $port : (object) $port;
                        ?>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <div class="port-cardd">
                                <div class="port cardd-img">
                                    <?php
                                    $filename = base_url('uploads/portfolio/' . $port->thumbnail);
                                    ?>
                                    <a href="<?= base_url('happy_client/' . $port->id . '-' . slugit($port->name)); ?>"><img src="<?php echo $filename; ?>" alt=""></a>
                                </div>
                                <div class="port-card-text">
                                    <h2><a href="<?= base_url('happy_client/' . $port->id . '-' . slugit($port->name)); ?>"><?= $port->name; ?></a></h2>
                                    <p>
                                        <a href="<?= base_url('happy_client/' . $port->id . '-' . slugit($port->name)); ?>"><?= $port->description; ?></a>
                                    </p>
                                </div>
                                <div class="port-card-footer">
                                    <div class="pull-left menus-bars">
                                        <a href="<?= base_url('happy_client/' . $port->id . '-' . slugit($port->name)); ?>"><i class="fa fa-bars"></i></a>
                                    </div>
                                    <div class="pull-right">
                                        <ul class="list-inline">
                                            <li><a href="http://www.facebook.com/sharer.php?u=<?= base_url('happy_client/' . $port->id); ?>"><i class="fa fa-facebook-square"></i></a></li>
                                            <li><a href="https://plus.google.com/share?url=<?= base_url('happy_client/' . $port->id); ?>"><i class="fa fa-google-plus-square"></i></a></li>
                                            <li><a href="http://www.linkedin.com/shareArticle?mini=true&url=<?= base_url('happy_client/' . $port->id); ?>"><i class="fa fa-linkedin-square"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>


        </div>
    </div>

</section>