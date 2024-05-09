<div class="row">
    <div class="col-md-12 col-xs-12 col-sm-12">
        <?php $this->load->view('settings/layouts/editormenu'); ?>
        <?php echo form_start_divs($title, 'System Settings'); ?>
        <?php
            //owndebugger($sys_settings);
        ?>
        <?php echo form_open_multipart('system_settings', array('class' => 'form-horizontal', 'id' => 'systemSettingsForm')); ?>
        <?php
        $data = array(
            'type' => 'hidden',
            'name' => 'settingsid',
            'value' => (isset($sys_settings->SettingsId) ? $sys_settings->SettingsId : 'none')
        );
        echo form_input($data);
        ?>
        <div class="form-group">
            <label class="col-md-3">Portal Name</label>

            <div class="col-md-8">
                <?php
                $data = array(
                    'type' => 'text',
                    'name' => 'institutename',
                    'required' => 'required',
                    'id' => 'institutename',
                    'class' => 'form-control',
                    'value' => (isset($sys_settings->InstituteName) ? $sys_settings->InstituteName : '')
                );
                echo form_input($data);
                ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3">Portal Slogan</label>

            <div class="col-md-8">
                <?php
                $data = array(
                    'type' => 'text',
                    'name' => 'instituteslogan',
                    'id' => 'instituteslogan',
                    'class' => 'form-control',
                    'value' => (isset($sys_settings->InstituteSlogan) ? $sys_settings->InstituteSlogan : '')
                );
                echo form_input($data);
                ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3">Portal Established</label>

            <div class="col-md-8">
                <?php
                $data = array(
                    'type' => 'text',
                    'name' => 'instituteestablished',
                    'required' => 'required',
                    'id' => 'instituteestablished',
                    'class' => 'form-control',
                    'value' => (isset($sys_settings->InstituteEstablished) ? $sys_settings->InstituteEstablished : '')
                );
                echo form_input($data);
                ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3">Portal Registration Number</label>

            <div class="col-md-8">
                <?php
                $data = array(
                    'type' => 'text',
                    'name' => 'instituteeiin',
                    'required' => 'required',
                    'id' => 'instituteeiin',
                    'class' => 'form-control',
                    'value' => (isset($sys_settings->InstituteEIIN) ? $sys_settings->InstituteEIIN : '')
                );
                echo form_input($data);
                ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3">Portal Logo</label>
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-7">
                        <input type="file" name="institute_logo" size="20"/>
                        <div class="tenpxm"></div>
                        <?php
                        $data = array(
                            'type' => 'hidden',
                            'name' => 'institute_logo',
                            'id' => 'initiateInstituteLogo',
                            'class' => 'form-control',
                            'value' => (isset($sys_settings->InstituteLogo) ? $sys_settings->InstituteLogo : '')
                        );
                        echo form_input($data);
                        ?>
                    </div>

                    <div class="col-md-4">
                        <h6>Current Logo</h6>

                        <div class="tenpxm"></div>
                        <?php
                        if (isset($sys_settings->InstituteLogo)) {
                            $url = base_url() . "uploads/settings/" . $sys_settings->InstituteLogo;
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
            <label class="col-md-3">Address</label>

            <div class="col-md-8">
                <?php
                $data = array(
                    'type' => 'text',
                    'name' => 'instituteaddress',
                    'required' => 'required',
                    'id' => 'instituteaddress',
                    'class' => 'form-control',
                    'value' => (isset($sys_settings->InstituteAddress) ? $sys_settings->InstituteAddress : '')
                );
                echo form_input($data);
                ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3">Phone</label>

            <div class="col-md-8">
                <?php
                $data = array(
                    'type' => 'text',
                    'name' => 'institutephone',
                    'required' => 'required',
                    'id' => 'institutephone',
                    'class' => 'form-control',
                    'value' => (isset($sys_settings->InstitutePhone) ? $sys_settings->InstitutePhone : '')
                );
                echo form_input($data);
                ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3">Email</label>

            <div class="col-md-8">
                <?php
                $data = array(
                    'type' => 'text',
                    'name' => 'instituteemail',
                    'id' => 'instituteemail',
                    'class' => 'form-control',
                    'value' => (isset($sys_settings->InstituteEmail) ? $sys_settings->InstituteEmail : '')
                );
                echo form_input($data);
                ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3">Facebook Link</label>

            <div class="col-md-8">
                <?php
                $data = array(
                    'type' => 'text',
                    'name' => 'institutewebsite',
                    'required' => 'required',
                    'id' => 'institutewebsite',
                    'class' => 'form-control',
                    'value' => (isset($sys_settings->InstituteWebsite) ? $sys_settings->InstituteWebsite : '')
                );
                echo form_input($data);
                ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3">Youtube Channel Link</label>

            <div class="col-md-8">
                <?php
                $data = array(
                    'type' => 'text',
                    'name' => 'institutekeywords',
                    'id' => 'institutekeywords',
                    'class' => 'form-control',
                    'value' => (isset($sys_settings->InstituteKeywords) ? $sys_settings->InstituteKeywords : '')
                );
                echo form_input($data);
                ?>
            </div>
        </div>
                <div class="form-group">
            <label class="col-md-3">Google Maps</label>

            <div class="col-md-8">
                <?php
                $data = array(
                    'type' => 'text',
                    'name' => 'institutegooglemaps',
                    'id' => 'institutegooglemaps',
                    'class' => 'form-control',
                    'value' => (isset($sys_settings->InstituteGoogleMaps) ? $sys_settings->InstituteGoogleMaps : '')
                );
                echo form_input($data);
                ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3">Short Information</label>

            <div class="col-md-8">
                <?php
                $data = array(
                    'type' => 'text',
                    'name' => 'shortinformation',
                    'required' => 'required',
                    'id' => 'shortinformation',
                    'class' => 'form-control',
                    'value' => (isset($sys_settings->ShortInformation) ? $sys_settings->ShortInformation : '')
                );
                echo form_input($data);
                ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3">Choose Theme</label>
            <div class="col-md-8">
                <?php
                $options = array(
                    'bluetheme' => 'Blue Theme',
                    'lightblacktheme' => 'Light Black Theme',
                    'lightbluetheme' => 'Light Blue Theme',
                    'lightgreentheme' => 'Light Green Theme',
                    'lightredtheme' => 'Light Red Theme'
                );
                echo form_dropdown('theme', $options, set_value('theme', (isset($sys_settings->SelectedTheme) ? $sys_settings->SelectedTheme : ''), TRUE), array('class' => 'form-control'));
                ?>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3">Header BG</label>
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-7">
                        <input type="file" name="HeaderStyle" size="20"/>
                        <div class="tenpxm"></div>
                        <?php
                        $data = array(
                            'type' => 'hidden',
                            'name' => 'HeaderStyle',
                            'id' => 'HeaderStyle',
                            'class' => 'form-control',
                            'value' => (isset($sys_settings->HeaderStyle) ? $sys_settings->HeaderStyle : '')
                        );
                        echo form_input($data);
                        ?>
                    </div>

                    <div class="col-md-4">
                        <h6>Current Header BG</h6>
                        <div class="tenpxm"></div>
                        <?php
                        if (isset($sys_settings->HeaderStyle)) {
                            $url = base_url() . "uploads/settings/" . $sys_settings->HeaderStyle;
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

        <!--<div class="form-group">
            <label class="col-md-3">Header Style</label>
            <div class="col-md-8">
                <label><input type="radio" name="HeaderStyle"  value="1" <?php if (@$sys_settings->HeaderStyle == 1)  { echo 'checked=checked'; }; ?>> Style 1 </label><br/>
                <label><input type="radio" name="HeaderStyle"  value="2" <?php if (@$sys_settings->HeaderStyle == 2)  { echo 'checked=checked'; }; ?>> Style 2 </label><br/>
                <label><input type="radio" name="HeaderStyle"  value="3" <?php if (@$sys_settings->HeaderStyle == 3)  { echo 'checked=checked'; };?>> Style 3 </label><br/>
            </div>
        </div>-->

        <div class="form-group">
            <div class="col-md-8">
                <?php __submitbtn('systemSettingsBtn'); ?>
                <span></span>
                <?php __resetbtn(); ?>
            </div>
        </div>

        <?php echo form_end_divs(); ?>
    </div>
</div>
