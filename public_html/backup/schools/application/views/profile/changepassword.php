<div class="row">
    <div class="col-md-12 col-xs-12 col-sm-12">
        <?php $this->load->view('profile/layouts/editormenu'); ?>
        <?php echo form_start_divs($title, 'Change Password' . (isset($userinformation1->full_name_en) ? ' of ' . $userinformation1->full_name_en . ', ' . (isset($groupname) ? $groupname : '') : '')); ?>
        <?php echo form_open_multipart('modifypassword', array('class' => 'form-horizontal', 'id' => 'changePasswordForm')); ?>
        <input name="userid" type="hidden" value="<?php __e((isset($userid) ? $userid : 'none')); ?>">

        <div class="form-group">
            <label class="col-md-3">Password</label>

            <div class="col-md-8">
                <?php
                $data = array(
                    'name' => 'password',
                    'id' => 'password',
                    'class' => 'form-control',
                    'required' => 'required',
                    'type' => 'password',
                    'placeholder' => 'New Password'
                );

                echo form_input($data);
                ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3">Confirm password</label>

            <div class="col-md-8">
                <?php
                $data = array(
                    'name' => 'confirm_password',
                    'id' => 'confirm_password',
                    'class' => 'form-control',
                    'type' => 'password',
                    'required' => 'required',
                    'placeholder' => 'Confirm New Password'
                );

                echo form_input($data);
                ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3"></label>

            <div class="col-md-8">
                <input id="changePasswordBtn" class="btn btn-success" value="Change" type="submit">
                <span></span>
                <input class="btn btn-default" value="Cancel" type="reset">
            </div>
        </div>
        <?php echo form_close(); ?>
        <?php echo form_end_divs(); ?>
    </div>
</div>