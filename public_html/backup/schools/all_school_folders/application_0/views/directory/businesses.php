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
                    <a href="<?php echo base_url(); ?>dashboard" class="pull-right">Dashboard</a>
                    <span class="pull-right">&nbsp; &nbsp;| &nbsp;&nbsp;</span>
                    <a href="<?php echo base_url(); ?>directory" class="pull-right">Green Directory Categories</a>
                </div>

                <div class="panel-body">
                    <?php //owndebugger($businessesbyid); ?>

                    <?php foreach ($businessesbyid as $business) : ?>
                        <div class="bs-docs-example">
                            <h4>
                                <a href="<?php __e($business['OrganizationURL']); ?>" target="_blank">
                                    <?php __e($business['OrganizationName']); ?>
                                </a>
                            </h4>
                            <p><?php __e($business['Services']); ?></p>
                        </div>
                        <span class="prettyprint">
                            Business Category: <?php __e($business['CategoryId']); ?>, Started Date: <?php __e($business['StartDate']); ?>, Business City: <?php __e($business['OrganizationCity']); ?>
                        </span>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>