<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<?php echo form_start_divs($selected_category.' Settings', 'Add static webpages'); ?>
        <?php echo form_open_multipart('', array('class' => 'form-horizontal', 'id' => 'addSettingsForm', 'data-toggle' => 'validator')); ?>
        <?php if (isset($settingsinformation->SettingsId)) { ?>
            <input name="SettingsId" type="hidden"
                   value="<?php __e((isset($settingsinformation->SettingsId) ? $settingsinformation->SettingsId : 'none')); ?>">
        <?php } ?>
        <input name="SettingsCategory" type="hidden" value="<?php __e($selected_category); ?>">
        <div class="form-group">
            <label class="col-lg-3"><?php __e($selected_category); ?> Name</label>

            <div class="col-md-8">
                <?php
                $data = array(
                    'name' => 'SettingsName',
                    'id' => 'SettingsCategory',
                    'class' => 'form-control',
                    'data-minlength' => '2',
                    'required' => 'required',
                    'value' => (isset($settingsinformation->SettingsName) ? $settingsinformation->SettingsName : '')
                );

                echo form_input($data);
                ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3"><?php __e($selected_category); ?> Description<br/>
            </label>

            <div class="col-lg-8">
                <?php
                $data = array(
                    'name' => 'SettingsDescription',
                    'id' => 'SettingsDescription',
                    'class' => 'form-control',
                    'rows' => '5',
                    'cols' => '10',
                    'value' => (isset($settingsinformation->SettingsDescription) ? $settingsinformation->SettingsDescription : '')
                );
                echo form_textarea($data);
                ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3">Is Active?</label>

            <div class="col-lg-8">
                <label class="radio-inline">
                    <input type=checkbox
                           name="isActive" id="isActive" checked="checked"
                           value="1"
                        <?php echo set_checkbox('isActive', '1', (isset($settingsinformation->isActive) ? $settingsinformation->isActive == '1' : '')); ?> />
                </label>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3"></label>

            <div class="col-md-8">
                <input name="addInitialSettingsBtn" id="addInitialSettingsBtn" class="btn btn-success" value="Save Changes"
                       type="submit">
                <span></span>
                <input class="btn btn-default" value="Cancel" type="reset">
            </div>
        </div>
        <?php echo form_close(); ?>
        <?php echo form_end_divs(); ?>
	</div>
</div>