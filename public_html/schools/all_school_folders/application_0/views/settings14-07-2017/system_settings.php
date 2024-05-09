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
            <label class="col-md-3">Institute Name</label>

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
            <label class="col-md-3">Institute Slogan</label>

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
            <label class="col-md-3">Institute Established</label>

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
            <label class="col-md-3">Institute EIIN</label>

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
            <label class="col-md-3">Institute EIIN</label>

            <div class="col-md-8">
                <?php
                    $options = array(
                        '' => 'Select a value',
                        'Yes' => 'Yes',
                        'No' => 'No'
                    );
                    echo form_dropdown('instituteismpo', $options, set_value('instituteismpo', (isset($userinformation->InstituteIsMPO) ? $userinformation->InstituteIsMPO : ''), TRUE), array('class' => 'form-control'));
                ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3">Institute Logo</label>

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
            <label class="col-md-3">Institute Header</label>

            <div class="col-md-8">
                <?php
                $data = array(
                    'type' => 'text',
                    'name' => 'instituteheader',
                    'id' => 'instituteheader',
                    'class' => 'form-control',
                    'value' => (isset($sys_settings->InstituteHeader) ? $sys_settings->InstituteHeader : '')
                );
                echo form_input($data);
                ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3">Institute Address</label>

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
            <label class="col-md-3">Institute Phone</label>

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
            <label class="col-md-3">Institute Email</label>

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
            <label class="col-md-3">Institute Website</label>

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
            <label class="col-md-3">Institute Keywords</label>

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
            <label class="col-md-3">Institute Time</label>

            <div class="col-md-8">
                <?php
                $data = array(
                    'type' => 'text',
                    'name' => 'institutetime',
                    'required' => 'required',
                    'id' => 'institutetime',
                    'class' => 'form-control',
                    'value' => (isset($sys_settings->InstituteTime) ? $sys_settings->InstituteTime : '')
                );
                echo form_input($data);
                ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3">Institute Google Maps</label>

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
            <div class="col-md-8">
                <?php __submitbtn('systemSettingsBtn'); ?>
                <span></span>
                <?php __resetbtn(); ?>
            </div>
        </div>

        <?php echo form_end_divs(); ?>
    </div>
</div>
