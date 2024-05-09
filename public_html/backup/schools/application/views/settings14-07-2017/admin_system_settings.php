<div class="row">
    <div class="col-md-12 col-xs-12 col-sm-12">
        <?php $this->load->view('settings/layouts/editormenu'); ?>
        <?php echo form_start_divs($title, 'System Settings'); ?>
        <?php
        //owndebugger($sys_settings);
        ?>
        <?php echo form_open_multipart('admin_system_settings', array('class' => 'form-horizontal', 'id' => 'adminSystemSettingsForm')); ?>
        <?php
        $data = array(
            'type' => 'hidden',
            'name' => 'settingsid',
            'value' => (isset($sys_settings->SettingsId) ? $sys_settings->SettingsId : 'none')
        );
        echo form_input($data);
        ?>
        <div class="form-group">
            <label class="col-md-3">Admin Name</label>

            <div class="col-md-8">
                <?php
                $data = array(
                    'type' => 'text',
                    'name' => 'adminname',
                    'required' => 'required',
                    'id' => 'adminname',
                    'class' => 'form-control',
                    'value' => (isset($sys_settings->AdminName) ? $sys_settings->AdminName : '')
                );
                echo form_input($data);
                ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3">Admin Phone</label>

            <div class="col-md-8">
                <?php
                $data = array(
                    'type' => 'text',
                    'name' => 'adminphone',
                    'required' => 'required',
                    'id' => 'adminphone',
                    'class' => 'form-control',
                    'value' => (isset($sys_settings->AdminPhone) ? $sys_settings->AdminPhone : '')
                );
                echo form_input($data);
                ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3">Admin Email</label>

            <div class="col-md-8">
                <?php
                $data = array(
                    'type' => 'text',
                    'name' => 'adminemail',
                    'id' => 'adminemail',
                    'class' => 'form-control',
                    'value' => (isset($sys_settings->AdminEmail) ? $sys_settings->AdminEmail : '')
                );
                echo form_input($data);
                ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3">Admin Message</label>

            <div class="col-md-8">
                <?php
                $data = array(
                    'name' => 'adminmessage',
                    'id' => 'wysiwyg',
                    'required' => 'required',
                    'class' => 'form-control',
                    'rows' => 5,
                    'value' => (isset($sys_settings->AdminMessage) ? $sys_settings->AdminMessage : '')
                );
                echo form_textarea($data);
                ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3">Admin Photo</label>

            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-7">
                        <input type="file" name="admin_photo" size="20"/>

                        <div class="tenpxm"></div>
                        <?php
                        $data = array(
                            'type' => 'hidden',
                            'name' => 'admin_photo',
                            'id' => 'initiateAdminPhoto',
                            'class' => 'form-control',
                            'value' => (isset($sys_settings->AdminPhoto) ? $sys_settings->AdminPhoto : '')
                        );
                        echo form_input($data);
                        ?>
                    </div>

                    <div class="col-md-4">
                        <h6>Current Admin Photo</h6>

                        <div class="tenpxm"></div>
                        <?php
                        if (isset($sys_settings->AdminPhoto)) {
                            $url = base_url() . "uploads/settings/" . $sys_settings->AdminPhoto;
                        } else {
                            $url = '';
                        }
                        $class = 'avatar img-rounded img-thumbnail';
                        $alt = 'avatar';
                        __img($url, $class, $alt);
                        ?>

                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3">Admin Sign</label>

            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-7">
                        <input type="file" name="admin_sign" size="20"/>

                        <div class="tenpxm"></div>
                        <?php
                        $data = array(
                            'type' => 'hidden',
                            'name' => 'admin_sign',
                            'id' => 'initiateAdminSign',
                            'class' => 'form-control',
                            'value' => (isset($sys_settings->AdminSign) ? $sys_settings->AdminSign : '')
                        );
                        echo form_input($data);
                        ?>
                    </div>

                    <div class="col-md-4">
                        <h6>Current Admin Photo</h6>

                        <div class="tenpxm"></div>
                        <?php
                        if (isset($sys_settings->AdminSign)) {
                            $url = $this->initial->initial_settings()->upload_path . "/settings/" . $sys_settings->AdminSign;
                        } else {
                            $url = '';
                        }
                        $class = 'avatar img-rounded img-thumbnail';
                        $alt = 'avatar';
                        __img($url, $class, $alt);
                        ?>

                    </div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-8">
                <?php __submitbtn('adminSystemSettingsBtn'); ?>
                <span></span>
                <?php __resetbtn(); ?>
            </div>
        </div>

        <?php echo form_end_divs(); ?>
    </div>
</div>
