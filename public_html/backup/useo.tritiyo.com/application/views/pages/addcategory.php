<div class="row">
    <div class="col-md-8 col-xs-8 col-sm-8">
        <?php echo form_start_divs($title, 'Different type of posts from one place'); ?>
        <?php echo form_open_multipart('', array('class' => 'form-horizontal', 'id' => 'categoryForm')); ?>
        <?php
        $data = array(
            'type' => 'hidden',
            'name' => 'settingsid',
            'value' => (isset($inisetting->SettingsId) ? $inisetting->SettingsId : 'none')
        );
        echo form_input($data);
        ?>
		<?php
        $data = array(
            'type' => 'hidden',
            'name' => 'userid',
            'value' => (isset($userid) ? $userid : 'none')
        );
        echo form_input($data);
        ?>
        <div class="form-group">
            <label class="col-md-3">Category Name</label>

            <div class="col-md-8">
                <?php
                $data = array(
                    'type' => 'text',
                    'name' => 'settingsname',
                    'required' => 'required',
                    'id' => 'posttitle',
                    'class' => 'form-control',
                    'value' => (isset($inisetting->SettingsName) ? $inisetting->SettingsName : '')
                );
                echo form_input($data);
                ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3">Description</label>

            <div class="col-md-8">
                <?php
                $data = array(
                    'type' => 'text',
                    'name' => 'settingsdescription',
                    'id' => 'wysiwyg',
                    'class' => 'form-control',
                    'value' => (isset($inisetting->SettingsDescription) ? $inisetting->SettingsDescription : '')
                );
                echo form_textarea($data);
                ?>
            </div>
        </div>
        
        <div class="form-group">
            <div class="col-md-8">
                <?php __submitbtn('categoryBtn'); ?>
                <span></span>
                <?php __resetbtn(); ?>
            </div>
        </div>

        <?php echo form_end_divs(); ?>
    </div>
	<div class="col-md-4 col-xs-4 col-sm-4">
		
	</div>
</div>