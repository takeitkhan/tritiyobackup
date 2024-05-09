<div class="row">
    <div class="col-md-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>New Staff Registration
                    <small> other users type</small>
                </h2>
                <?php echo settings_icons(); ?>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br/>
                <?php echo form_open_multipart('', array('class' => 'form-horizontal form-label-left input_mask', 'id' => 'staffInformationForm')); ?>
                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                    <?php
                    $data = array(
                        'type' => 'text',
                        'name' => 'nationalidnumber',
                        'id' => 'nationalidnumber',
                        'class' => 'form-control',
                        'placeholder' => 'National ID Number'
                    );
                    echo form_input($data);
                    ?>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                    <?php echo form_dropdown('usergroups', $usergroups, '', array('class' => 'form-control', 'id' => 'usergroups')); ?>
                </div>
                <?php
                if ($this->config->item('default_pass') == TRUE) {
                    $random3 = '12345';
                } else {
                    $random3 = random_string('alnum', 6);
                }
                $data = array(
                    'type' => 'hidden',
                    'id' => 'passwordbox',
                    'value' => $random3
                );
                echo form_input($data);
                ?>

                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                    <input id="staffInformationBtn" class="btn btn-success" value="Generate" type="button">
                    <span></span>
                    <input class="btn btn-default" value="Cancel" type="reset">
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>

        <div class="x_panel">
            <div class="x_title">
                <h2>Staff Informations
                    <small> save it for future use</small>
                </h2>
                <?php echo settings_icons(); ?>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br/>
                <?php echo form_open_multipart('', array('class' => 'form-horizontal form-label-left input_mask', 'id' => 'generateTeaStaForm')); ?>
                <div class="form-group">
                    <label class="control-label col-md-2 col-sm-2 col-xs-12">User ID</label>

                    <div class="col-md-10 col-sm-10 col-xs-12">
                        <?php
                        $data = array(
                            'type' => 'text',
                            'name' => 'ts_id',
                            'id' => 'ts_id',
                            'number' => 'number',
                            'readonly' => 'readonly',
                            'class' => 'form-control',
                            'placeholder' => 'Teacher or Staff User ID'
                        );
                        echo form_input($data);
                        ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2 col-sm-2 col-xs-12">Password</label>

                    <div class="col-md-10 col-sm-10 col-xs-12">
                        <?php
                        $data = array(
                            'type' => 'text',
                            'name' => 'ts_pass',
                            'id' => 'ts_pass',
                            'readonly' => 'readonly',
                            'class' => 'form-control',
                            'value' => ''
                        );
                        echo form_input($data);
                        ?>
                        <?php
                        $data = array(
                            'type' => 'hidden',
                            'name' => 'which_user_group',
                            'id' => 'which_user_group',
                            'value' => ''
                        );
                        echo form_input($data);
                        $data = array(
                            'type' => 'hidden',
                            'name' => 'nationalidcardnumber',
                            'id' => 'nationalidcardnumber',
                            'value' => ''
                        );
                        echo form_input($data);
                        ?>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                    <input id="generateTeaStaBtn" class="btn btn-success" value="Save now" type="submit">
                    <span></span>
                    <input class="btn btn-default" value="Cancel" type="reset">
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>