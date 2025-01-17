<div class="animate form" id="login">

    <section class="login_content">
        <?php echo $message; ?>
        <div id="infoMessage"></div>
        <img src="http://www.tritiyo.com/schools/footprints/images/logo.png"/>
        <?php echo form_open("login"); ?>

        <div class="form-group has-feedback">
            <?php
            $data = array(
                'name' => 'identity',
                'class' => 'form-control',
                'id' => 'identity',
                'type' => 'text',
                'required' => 'required'
            );
            echo form_input($data);
            ?>
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
            <?php
            $data = array(
                'name' => 'password',
                'class' => 'form-control',
                'id' => 'password',
                'type' => 'password'
            );
            echo form_input($data);
            ?>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <?php echo form_checkbox('remember', '1', FALSE, 'id="remember" class="flat"'); ?>
        <?php echo form_submit('submit', lang('login_submit_btn'), 'class="btn btn-sm btn-success"'); ?>
        <a href="forgot_password"><?php echo lang('login_forgot_password'); ?></a>

        <div>
            <div class="clearfix"></div>
            <p>&copy; 2015 All Rights Reserved by Tritiyo Limited</p>
        </div>
</div>
<?php echo form_close(); ?>
<!-- form -->
</section>
<!-- content -->
</div>