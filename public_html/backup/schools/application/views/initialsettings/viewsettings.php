<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <?php echo form_start_divs($selected_category . ' Settings', 'Add static webpages'); ?>
        <div class="row mainbox">
            <table dataid="<?php __e($this->uri->segment(2)); ?>" id="allinitialsettings" class="display" cellspacing="0" width="100%"
                   class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th><?php __e($selected_category); ?> ID</th>
                    <th><?php __e($selected_category); ?> Name</th>
                    <th><?php __e($selected_category); ?> Name</th>
                    <th><?php __e($selected_category); ?> Description</th>
                    <th>Is Active</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                </thead>

                <tfoot>
                <tr>
                    <th><?php __e($selected_category); ?> ID</th>
                    <th><?php __e($selected_category); ?> Name</th>
                    <th><?php __e($selected_category); ?> Name</th>
                    <th><?php __e($selected_category); ?> Description</th>
                    <th>Is Active</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                </tfoot>
            </table>
        </div>
        <?php echo form_end_divs(); ?>
    </div>
</div>