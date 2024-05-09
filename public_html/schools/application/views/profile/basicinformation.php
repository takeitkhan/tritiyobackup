<?php //echo $groupname;//owndebugger($userinformation); die(); ?>
<div class="row">
    <div class="col-md-12 col-xs-12 col-sm-12">
        <?php //owndebugger($userinformation); ?>
        <?php $this->load->view('profile/layouts/editormenu'); ?>
        <?php echo form_start_divs($title, 'Academic Information' . (isset($userinformation->full_name_en) ? ' of ' . $userinformation->full_name_en . ', ' . (isset($groupname) ? $groupname : '') : '')); ?>
        <?php echo form_open_multipart('modifybasicprofile', array('class' => 'form-horizontal', 'id' => 'basicInformationForm', 'data-toggle' => 'validator')); ?>
        <input name="userid" type="hidden" value="<?php __e($userid); ?>">

        <!--english form data-->
        <div class="col-md-6">
            <div class="form-group">
                <label class="col-lg-3">User Id</label>
                <div class="col-md-9">
                    <?php __e((isset($userinformation->id) ? $userinformation->id : '')); ?>
                    <?php __smallnote('(Unchangeable)'); ?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-3">Full Name (English)</label>
                <div class="col-md-8">
                    <?php
                    $data = array(
                        'name' => 'full_name_en',
                        'id' => 'full_name_en',
                        'class' => 'form-control',
                        'data-minlength' => '2',
                        'required' => 'required',
                        'value' => (isset($userinformation->full_name_en) ? $userinformation->full_name_en : '')
                    );

                    echo form_input($data);
                    ?>
                </div>
            </div>
            <?php if ($groupname == 'Students') { ?>
                <div class="form-group">
                    <div class="col-md-3">
                        <input type="radio" value="1" name="setguardian" class="radio-inline" checked="checked"/> Use
                    </div>
                    <label class="col-md-9 text-danger">Use father name as guardian name</label>
                </div>
            <?php } ?>
            <div class="form-group">
                <label class="col-lg-3">Father's Name (English)</label>
                <div class="col-md-8">
                    <?php
                    $data = array(
                        'name' => 'father_name_en',
                        'id' => 'father_name_en',
                        'class' => 'form-control',
                        'data-minlength' => '2',
                        'required' => 'required',
                        'value' => (isset($userinformation->father_name_en) ? $userinformation->father_name_en : '')
                    );

                    echo form_input($data);
                    ?>
                </div>
            </div>
            <?php if ($groupname == 'Students') { ?>
                <div class="form-group">
                    <div class="col-md-3">
                        <input type="radio" value="2" name="setguardian" class="radio-inline"/> Use
                    </div>
                    <label class="col-md-9 text-danger">Use mother name as guardian name</label>
                    
                </div>
            <?php } ?>
            <div class="form-group">
                <label class="col-lg-3">Mother's Name (English)</label>

                <div class="col-md-8">
                    <?php
                    $data = array(
                        'name' => 'mother_name_en',
                        'id' => 'mother_name_en',
                        'class' => 'form-control',
                        'data-minlength' => '2',
                        'required' => 'required',
                        'value' => (isset($userinformation->mother_name_en) ? $userinformation->mother_name_en : '')
                    );

                    echo form_input($data);
                    ?>
                </div>
            </div>
            <?php if ($groupname == 'Students') { ?>
                <div class="form-group">
                    <div class="col-md-3">
                        <input type="radio" value="1" name="fphone" class="radio-inline" checked="checked"/> Yes
                        <input type="radio" value="0" name="fphone" class="radio-inline"/> No
                    </div>
                    <label class="col-md-9 text-danger">Use same phone for guardian</label>
                </div>
            <?php } ?>

            <div class="form-group">
                <label class="col-md-3">Phone</label>
                <div class="col-md-8">
                    <?php
                    $data = array(
                        'name' => 'phone',
                        'id' => 'phone',
                        'class' => 'form-control',
                        'type' => 'text',
                        'data-minlength' => '11',
                        'data-match-error' => 'Whoops, it is not an valid phone.',
                        'required' => 'required',
                        'value' => (isset($userinformation->phone) ? $userinformation->phone : '')
                    );
                    echo form_input($data);
                    ?>
                </div>
            </div>
        <?php if ($groupname == 'Students') { ?>
        <input name="infosid" type="hidden" value="<?php __e((isset($personal_info->InfosId) ? $personal_info->InfosId : 'none')); ?>">
        <div class="form-group">
            <label class="col-lg-3">Birth Certificate Number</label>
            <div class="col-md-8">
                <?php
                $data = array(
                    'name' => 'uniquenumber',
                    'id' => 'uniquenumber',
                    'class' => 'form-control',
                    'data-minlength' => '2',
                    
                    'value' => (isset($personal_info->UniqueNumber) ? $personal_info->UniqueNumber : '')
                );
                echo form_input($data);
                ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3">Address</label>

            <div class="col-lg-8">
                <?php
                $data = array(
                    'name' => 'address',
                    'class' => 'form-control',
                    'id' => 'ewysiwyg',
                    'value' => (isset($personal_info->Address) ? $personal_info->Address : ''),
                    'rows' => '2',
                    'cols' => '10'
                );
                echo form_textarea($data);
                ?>
            </div>
        </div>
                <div class="form-group">
            <label class="col-md-3">User Photo</label>

            <div class="col-lg-8">
                <div class="row">
                    <div class="col-md-7">
                        <input type="file" name="userfile" size="20"/>

                        <div class="tenpxm"></div>
                        <?php
                        $data = array(
                            'name' => 'userphoto',
                            'type' => 'hidden',
                            'id' => 'initiateUserPhoto',
                            'class' => 'form-control',
                            'value' => (isset($personal_info->UserPhoto) ? $personal_info->UserPhoto : '')
                        );
                        echo form_input($data);
                        ?>
                    </div>

                    <div class="col-md-4">
                        <h6>Current Photo</h6>

                        <div class="tenpxm"></div>
                        <?php
                        if (isset($personal_info->UserPhoto)) {
                            $url = base_url() . "uploads/pp/" . $personal_info->UserPhoto;
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
        <?php } ?>
        </div>
        <!--bangla form data-->
        <div class="col-md-6">
            <div class="form-group">
                <label class="col-lg-3">Full Name (Bangla)</label>
                <div class="col-md-8">
                    <?php
                    $data = array(
                        'name' => 'full_name_bn',
                        'id' => 'full_name_bn',
                        'class' => 'form-control',
                        'data-minlength' => '2',
                        'value' => (isset($userinformation->full_name_bn) ? $userinformation->full_name_bn : '')
                    );

                    echo form_input($data);
                    ?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-3">Father's Name (Bangla)</label>
                <div class="col-md-8">
                    <?php
                    $data = array(
                        'name' => 'father_name_bn',
                        'id' => 'father_name_bn',
                        'class' => 'form-control',
                        'data-minlength' => '2',
                        'value' => (isset($userinformation->father_name_bn) ? $userinformation->father_name_bn : '')
                    );

                    echo form_input($data);
                    ?>
                </div>
            </div>

            <div class="form-group">
                <label class="col-lg-3">Mother's Name (Bangla)</label>

                <div class="col-md-8">
                    <?php
                    $data = array(
                        'name' => 'mother_name_bn',
                        'id' => 'mother_name_bn',
                        'class' => 'form-control',
                        'data-minlength' => '2',
                        'value' => (isset($userinformation->mother_name_bn) ? $userinformation->mother_name_bn : '')
                    );

                    echo form_input($data);
                    ?>
                </div>
            </div>
            <?php if ($groupname == 'Students') { ?>

            <div class="form-group">
                <label class="col-md-3">Date Of Birth</label>
                <div class="col-md-8">
                    <?php
                    $data = array(
                        'name' => 'dateofbirth',
                        'id' => 'date1',
                        'placeholder' => 'YYYY-MM-DD',
                        'pattern' => '[0-9]{4}-(0[1-9]|1[012])-(0[1-9]|1[0-9]|2[0-9]|3[01])',
                        'class' => 'form-control',
                        'required' => 'required',
                        'value' => (isset($personal_info->DateOfBirth) ? $personal_info->DateOfBirth : '')
                    );
                    echo form_input($data);
                    ?>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3">Gender</label>
                <div class="col-md-8">
                    <?php
                    //owndebugger();
                    if ($groupid == 4) {
                        echo form_dropdown('gender', $gender, set_value('gender', (isset($personal_info->Gender) ? $personal_info->Gender : ''), TRUE), array('class' => 'form-control'));
                    } else {
                        echo form_dropdown('gender', $adultgender, set_value('gender', (isset($personal_info->Gender) ? $personal_info->Gender : ''), TRUE), array('class' => 'form-control'));
                    }

                    ?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3">Enrollment Status</label>
                <div class="col-md-8">
                    <?php
                    echo form_dropdown('enrollmentstatus', $enrollment, set_value('enrollmentstatus', (isset($personal_info->EnrollmentStatus) ? $personal_info->EnrollmentStatus : '49'), TRUE), array('class' => 'form-control'));
                    ?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3">Status</label>
                <div class="col-md-8">
                  <input type="checkbox" value="1" name="stu_status" <?php if($status_info->isActive == 1 ) echo 'checked' ; ?> data-toggle="toggle" data-on="ACTIVE" data-off="DROP" data-onstyle="success" data-offstyle="danger">
                </div>
            </div>
            <?php } ?>
        </div>


    
        <div class="form-group">
            <label class="col-md-3"></label>
            <div class="col-md-8">
                <input type="submit" id="basicInfoBtn" class="btn btn-success" value="Save Changes" >
                <span></span>
                <input class="btn btn-default" value="Cancel" type="reset">
            </div>
        </div>
        <?php echo form_close(); ?>
        <?php echo form_end_divs(); ?>
    </div>
</div>
