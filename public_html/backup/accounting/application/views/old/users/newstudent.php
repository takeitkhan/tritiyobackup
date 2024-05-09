<div class="row">
    <div class="col-md-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>New Student Enrollment
                    <small> student and guardian informations</small>
                </h2>
                <?php echo settings_icons(); ?>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br/>
                <?php echo form_open_multipart('', array('class' => 'form-horizontal form-label-left input_mask', 'id' => 'guardianInformationForm')); ?>
                <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                    <?php
                    $data = array(
                        'type' => 'text',
                        'name' => 'admissionid',
                        'id' => 'admissionid',
                        'class' => 'form-control',
                        'placeholder' => 'Admission ID'
                    );
                    echo form_input($data);
                    ?>
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback"></div>
                <div class="clearfix"></div>
                <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                    <div id="urlsuggestions"></div>
                </div>
                <div class="clearfix"></div>
                <div class="col-md-4 col-sm-4 col-xs-12 form-group has-feedback">
                    <?php
                    $data = array(
                        'type' => 'text',
                        'name' => 'studentclassroll',
                        'id' => 'studentclassroll',
                        'class' => 'form-control',
                        'placeholder' => 'Class Roll'
                    );
                    echo form_input($data);
                    ?>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12 form-group has-feedback">
                    <?php echo form_dropdown('class', $class, '', array('class' => 'form-control', 'id' => 'class')); ?>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12 form-group has-feedback">
                    <?php echo form_dropdown('section', $sections, '', array('class' => 'form-control', 'id' => 'section')); ?>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12 form-group has-feedback">
                    <?php echo form_dropdown('studygroup', $studygroups, '', array('class' => 'form-control', 'id' => 'studygroup')); ?>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12 form-group has-feedback">
                    <?php echo form_dropdown('department', $departments, '', array('class' => 'form-control', 'id' => 'department')); ?>
                </div>
                <?php
                if ($this->config->item('default_pass') == TRUE) {
                    $random = '12345';
                    $random1 = '12345';
                } else {
                    $random = random_string('alnum', 6);
                    $random1 = random_string('alnum', 6);
                }

                $data = array(
                    'type' => 'hidden',
                    'id' => 'passbox',
                    'value' => $random
                );
                echo form_input($data);
                $data1 = array(
                    'type' => 'hidden',
                    'id' => 'passbox1',
                    'value' => $random1
                );
                echo form_input($data1);
                ?>
                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                    <input id="guardianInfoBtn" class="btn btn-success" value="Generate" type="button">
                    <span></span>
                    <input class="btn btn-default" value="Cancel" type="reset">
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
        <div class="x_panel">
        <div class="x_title">
            <h2>Guardian or Student Information
                <small>save it for future use</small>
            </h2>
            <?php echo settings_icons(); ?>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <br/>
            <?php echo form_open_multipart('', array('class' => 'form-horizontal form-label-left input_mask', 'id' => 'generateStdGuaForm')); ?>
            <div class="form-group">
                <div class="col-md-12 col-sm-12 col-xs-12">See, how user ID generating</div>
            </div>
            <div class="form-group">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="row">
                        <div class="col-md-2 col-sm-2 col-xs-12">
                            <?php
                            $data = array(
                                'type' => 'text',
                                'name' => 'yearer',
                                'id' => 'yearer',
                                'readonly' => 'readonly',
                                'class' => 'form-control',
                                'value' => ''
                            );
                            echo form_input($data);
                            ?>
                        </div>
                        <div class="col-md-2 col-sm-2 col-xs-12">
                            <?php
                            $data = array(
                                'type' => 'text',
                                'name' => 'studentclass',
                                'id' => 'studentclass',
                                'readonly' => 'readonly',
                                'class' => 'form-control',
                                'value' => ''
                            );
                            echo form_input($data);
                            ?>
                        </div>
                        <div class="col-md-2 col-sm-2 col-xs-12">
                            <?php
                            $data = array(
                                'type' => 'text',
                                'name' => 'studentclsroll',
                                'id' => 'studentclsroll',
                                'readonly' => 'readonly',
                                'class' => 'form-control',
                                'value' => ''
                            );
                            echo form_input($data);
                            ?>
                        </div>
                        <div class="col-md-2 col-sm-2 col-xs-12">
                            <?php
                            $data = array(
                                'type' => 'text',
                                'name' => 'sectionval',
                                'id' => 'sectionval',
                                'readonly' => 'readonly',
                                'class' => 'form-control',
                                'value' => ''
                            );
                            echo form_input($data);
                            ?>
                        </div>
                        <div class="col-md-2 col-sm-2 col-xs-12">
                            <?php
                            $data = array(
                                'type' => 'text',
                                'name' => 'studygroupval',
                                'id' => 'studygroupval',
                                'readonly' => 'readonly',
                                'class' => 'form-control',
                                'value' => ''
                            );
                            echo form_input($data);
                            ?>
                        </div>
                        <div class="col-md-2 col-sm-2 col-xs-12">
                            <?php
                            $data = array(
                                'type' => 'text',
                                'name' => 'departmentval',
                                'id' => 'departmentval',
                                'readonly' => 'readonly',
                                'class' => 'form-control',
                                'value' => ''
                            );
                            echo form_input($data);
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-2 col-sm-2 col-xs-12">Student User ID</label>
                <?php
                $data = array(
                    'type' => 'hidden',
                    'name' => 'admitid',
                    'value' => 'none',
                    'id' => 'urlsuggestionsddd'
                );
                echo form_input($data);
                ?>
                <div class="col-md-10 col-sm-10 col-xs-12">
                    <?php
                    $data = array(
                        'type' => 'text',
                        'name' => 'stdid',
                        'id' => 'stdid',
                        'number' => 'number',
                        'readonly' => 'readonly',
                        'class' => 'form-control',
                        'placeholder' => 'Student ID'
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
                        'name' => 'stdpass',
                        'id' => 'stdpass',
                        'readonly' => 'readonly',
                        'class' => 'form-control',
                        'value' => ''
                    );
                    echo form_input($data);
                    ?>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-2 col-sm-2 col-xs-12">&nbsp;</label>

                <div class="col-md-10 col-sm-10 col-xs-12">
                    <?php
                    $data = array(
                        'name' => 'existingguardian',
                        'id' => 'existingguardian',
                        'value' => 'accept',
                        'style' => 'margin:10px'
                    );
                    echo form_checkbox($data);
                    ?>
                    Existing Guardian
                </div>
            </div>
            <div id="shower_box" style="display: none;">
                <div class="form-group">
                    <label class="control-label col-md-2 col-sm-2 col-xs-12">Guardian User ID</label>

                    <div class="col-md-10 col-sm-10 col-xs-12">
                        <?php
                        $data = array(
                            'type' => 'number',
                            'name' => 'egid',
                            'id' => 'egid',
                            'class' => 'form-control',
                            'placeholder' => 'Enter Guardian ID'
                        );
                        echo form_input($data);
                        ?>
                    </div>
                </div>
            </div>
            <div id="hider_box">
                <div class="form-group">
                    <div class="col-md-12 col-sm-12 col-xs-12">See, how user ID generating</div>
                </div>
                <div class="form-group">

                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="row">
                            <div class="col-md-4 col-sm-4 col-xs-12">
                                <?php
                                $data = array(
                                    'type' => 'text',
                                    'name' => 'studentider',
                                    'id' => 'studentider',
                                    'readonly' => 'readonly',
                                    'class' => 'form-control',
                                    'value' => ''
                                );
                                echo form_input($data);
                                ?>
                            </div>
                            <div class="col-md-2 col-sm-2 col-xs-12">
                                <?php
                                $data = array(
                                    'type' => 'text',
                                    'name' => 'guardianer',
                                    'id' => 'guardianer',
                                    'readonly' => 'readonly',
                                    'class' => 'form-control',
                                    'value' => ''
                                );
                                echo form_input($data);
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2 col-sm-2 col-xs-12">Guardian User ID</label>

                    <div class="col-md-10 col-sm-10 col-xs-12">
                        <?php
                        $data = array(
                            'type' => 'text',
                            'name' => 'gid',
                            'id' => 'gid',
                            'readonly' => 'readonly',
                            'class' => 'form-control',
                            'placeholder' => 'Guardian ID'
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
                            'name' => 'gpass',
                            'id' => 'gpass',
                            'readonly' => 'readonly',
                            'class' => 'form-control',
                            'value' => ''
                        );
                        echo form_input($data);
                        ?>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                <input id="generateStdGuaId" class="btn btn-success" value="Save now" type="submit">
                <span></span>
                <input class="btn btn-default" value="Cancel" type="reset">
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
    </div>
</div>