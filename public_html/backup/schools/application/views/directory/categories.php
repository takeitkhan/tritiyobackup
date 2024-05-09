<div class="row">
    <div class="row">
        <div class="col-md-3">
            <?php echo $this->load->view('layouts/sidebar'); ?>
        </div>
        <div class="col-md-9">
            <?php echo $this->load->view('layouts/profilemenu'); ?>
            <div class="clearfix"></div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <?php __e($title); ?>
                    <a href="<?php echo base_url(); ?>dashboard" class="pull-right">Back to Dashboard</a>
                </div>

                <div class="panel-body">
                    <?php //owndebugger($categories); ?>
                    <ul class="greendirectory_categories">
                        <?php foreach($categories as $cat) : ?>
                            <li><a href="<?php echo base_url(); ?>businesses/<?php __e($cat['CategoryId']); ?>">
                                    <?php __e($cat['CategoryName']); ?><?php __e('<strong>(' . $cat['TotalBusinesses'] .')</strong>'); ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>