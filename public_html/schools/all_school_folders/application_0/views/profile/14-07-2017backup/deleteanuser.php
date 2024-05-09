<div class="row">
    <div class="col-md-12 col-xs-12 col-sm-12">
        <?php echo form_start_divs($title, ''); ?>
        <?php echo form_open_multipart('modifypersonalprofile', array('class' => 'form-horizontal', 'id' => 'personalInformationForm')); ?>
        <input name="infosid" type="hidden"
               value="<?php __e((isset($userinformation->InfosId) ? $userinformation->InfosId : 'none')); ?>">
        <input name="userid" type="hidden" value="<?php __e((isset($userid) ? $userid : 'none')); ?>">

        <div class="col-md-5">
            <div style="color: red;">
                <h3>Think again and again before you delete</h3>
                <h6>System are going to delete following information-</h6>
                <ul>
                    <li>User ID</li>
                    <li>User Basic Information</li>
                    <li>User Personal Information Information</li>
                    <li>User Guardian Information</li>
                    <li>If user is guardian then system will delete of his student information</li>
                    <li>If user is student then system will delete of his results</li>
                    <li>If user is student then system will delete of his payment history</li>
                </ul>
            </div>
            <hr/>
        </div>
        <div class="clearfix"></div>
        <div class="form-group">
            <div class="col-md-2">
                <?php
                $q = $this->uri->segment(2);
                if (isset($_GET['userpage']) == true AND isset($q)) {
                    $uri2 = $this->uri->segment(2);
                }
                $data = array(
                    'type' => 'text',
                    'name' => 'userid',
                    'id' => 'modiy_user_id',
                    'class' => 'form-control',
                    'placeholder' => 'Enter User ID'
                );
                echo form_input($data);
                ?>
            </div>
            <div class="col-md-2">
                <button id="userInfoOpenBtn" class="btn btn-danger" type="button">Confirm Delete</button>
            </div>
        </div>
        <div class="form-group">

        </div>
        <?php echo form_close(); ?>
        <?php echo form_end_divs(); ?>
    </div>
</div>