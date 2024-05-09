<?php
$uri2 = $this->uri->segment(2);
$admin = 'Admin';
$teachers = 'Teachers';
$students = 'Students';
$guardians = 'Guardians';
$staffs = 'Staffs';
$members = 'Members';
?>
<div class="row">
    <div class="col-md-12 col-xs-12 col-sm-12">
        <?php
        $this->load->view('profile/layouts/editormenu'); ?>
        <?php echo form_start_divs($title, 'Personal Information' . (isset($userinformation1->full_name_en) ? ' of ' . $userinformation1->full_name_en . ', ' . (isset($groupname) ? $groupname : '') : '')); ?>
        <?php echo form_open_multipart('modifypersonalprofile', array('class' => 'form-horizontal', 'id' => 'personalInformationForm')); ?>
        <input name="infosid" type="hidden"
               value="<?php __e((isset($userinformation->InfosId) ? $userinformation->InfosId : 'none')); ?>">
        <input name="userid" type="hidden" value="<?php __e((isset($userid) ? $userid : 'none')); ?>">

        <div class="form-group">
            <?php if ($modifyuserid == 4) { ?>
                <label class="col-lg-3">Birth Certificate Number</label>
            <?php } else { ?>
                <label class="col-lg-3">National ID Card Number</label>
            <?php } ?>
            <div class="col-md-8">
                <?php
                $data = array(
                    'name' => 'uniquenumber',
                    'id' => 'uniquenumber',
                    'class' => 'form-control',
                    'data-minlength' => '2',
                    'required' => 'required',
                    'value' => (isset($userinformation->UniqueNumber) ? $userinformation->UniqueNumber : '')
                );

                echo form_input($data);
                ?>
            </div>
        </div>
            <div class="form-group">
                <label class="col-md-3">Date Of Birth</label>
                
                <div class="col-md-8">
                    <?php
                   // owndebugger($userinformation);
                    $data = array(
                        'name' => 'dateofbirth',
                        'id' => 'date1',
                        'placeholder' => 'YYYY-MM-DD',
                        'pattern' => '[0-9]{4}-(0[1-9]|1[012])-(0[1-9]|1[0-9]|2[0-9]|3[01])',
                        'class' => 'form-control',
                        'value' => (isset($userinformation->DateOfBirth) ? $userinformation->DateOfBirth : '')
                    );
                    echo form_input($data);
                    ?>
                </div>
            </div>

<!--         <div class="form-group">
            <label class="col-lg-3">Blood Group</label>

            <div class="col-md-8">
                <?php
                echo form_dropdown('bloodgroup', $bloodgroups, set_value('bloodgroup', (isset($userinformation->BloodGroup) ? $userinformation->BloodGroup : ''), TRUE), array('class' => 'form-control'));
                ?>
            </div>
        </div> -->

        <div class="form-group">
            <label class="col-lg-3">Religion</label>

            <div class="col-md-8">
                <?php
                //owndebugger($userinformation);
                echo form_dropdown('religion', $religions, set_value('religion', (isset($userinformation->Religion) ? $userinformation->Religion : ''), TRUE), array('class' => 'form-control'));
                ?>
            </div>
        </div>
<!--         <div class="form-group">
            <label class="col-md-3">Country</label>

            <div class="col-lg-8">
                <?php //owndebugger($countries); ?>
                <?php echo form_dropdown('countryid', $countries, set_value('countryid', (isset($userinformation->CountryId) ? $userinformation->CountryId : '22'), TRUE), array('class' => 'form-control')); ?>
            </div>
        </div> -->
    <?php if ($groupname != 'Students') { ?>
        <div class="form-group">
            <label class="col-lg-3">District</label>

            <div class="col-md-8">
                <?php
                echo form_dropdown('district', $districts, set_value('district', (isset($userinformation->District) ? $userinformation->District : '17'), TRUE), array('id' => 'districts', 'class' => 'form-control'));
                ?>
            </div>
        </div>

        <div class="form-group">
            <label class="col-lg-3">Upazila</label>

            <div class="col-md-8">
                <div class="loading" style="display: none;">Loading...</div>
                <?php
                echo form_dropdown('upazila', $upazilas, set_value('upazila', (isset($userinformation->Upazila) ? $userinformation->Upazila : ''), TRUE), array('id' => 'upazilas', 'class' => 'form-control'));
                ?>
            </div>
        </div>
    <?php } ?>
        <div class="form-group">
            <label class="col-md-3">Gender</label>

            <div class="col-md-8">
                <?php
                //owndebugger();
                if ($groupid == 4) {
                    echo form_dropdown('gender', $gender, set_value('gender', (isset($userinformation->Gender) ? $userinformation->Gender : ''), TRUE), array('class' => 'form-control'));
                } else {
                    echo form_dropdown('gender', $adultgender, set_value('gender', (isset($userinformation->Gender) ? $userinformation->Gender : ''), TRUE), array('class' => 'form-control'));
                }

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
                    'value' => (isset($userinformation->Address) ? $userinformation->Address : ''),
                    'rows' => '2',
                    'cols' => '10'
                );
                echo form_textarea($data);
                ?>
            </div>
        </div>

        <?php
        $group = 'Students';
        if (!$this->ion_auth->in_group($group)) {
            ?>
            <?php if ($groupname != 'Students') { ?>
            <div class="form-group">
                <label class="col-md-3">Marital Status</label>

                <div class="col-lg-8">
                    <label class="radio-inline">
                        <input type="radio" name="maritalstatus" id="inlineRadio1" value="1"
                            <?php echo set_radio('maritalstatus', '1', (isset($userinformation->MaritalStatus) ? $userinformation->MaritalStatus == '1' : '')); ?> />
                        Married
                    </label>
                    <label class="radio-inline">
                        <input type="radio" id="level2" name="maritalstatus" value="2"
                            <?php echo set_radio('maritalstatus', '2', (isset($userinformation->MaritalStatus) ? $userinformation->MaritalStatus == '2' : '')); ?> />
                        Unmarried
                    </label>
                </div>
            </div>
            <?php } ?>
        <?php } ?>
        <?php if ($modifyuserid == 5) { ?>
        <div class="form-group">
            <label class="col-lg-3">Yearly Income</label>            
            <div class="col-md-8">
                <?php
                $data = array(
                    'name' => 'yearlyincome',
                    'id' => 'yearlyincome',
                    'class' => 'form-control',
                    'data-minlength' => '2',
                    'placeholder' => 'e.g. 800000',
                    'value' => (isset($userinformation->YearlyIncome) ? $userinformation->YearlyIncome : '')
                );

                echo form_input($data);
                ?>
            </div>
        </div>
        <?php } ?>
        <?php if ($groupname != 'Students') { ?>
        <div class="form-group">
            <label class="col-md-3">Write Biography</label>

            <div class="col-lg-8">
                <?php
                $data = array(
                    'name' => 'biography',
                    'id' => 'ewysiwyg1',
                    'class' => 'form-control',
                    'rows' => '5',
                    'cols' => '10',
                    'value' => (isset($userinformation->Biography) ? $userinformation->Biography : '')
                );
                echo form_textarea($data);
                ?>
            </div>
        </div>
         
        <div class="form-group">
            <label class="col-lg-3">Join Date</label>

            <?php //owndebugger($userinformation); ?>
            <div class="col-md-8">
                <?php
                //owndebugger($userinformation->JoinDate);
                $data = array(
                    'name' => 'joindate',
                    'id' => 'date',
                    'class' => 'form-control',
                    'data-minlength' => '2',
                    'required' => 'required',
                    'value' => (isset($userinformation->JoinDate) ? inttodate($userinformation->JoinDate) : '')
                );

                echo form_input($data);
                ?>
            </div>
        </div>
        <?php } ?>
        <?php if ($groupname == 'Students') { ?>
        <div class="form-group">
            <label class="col-md-3">Enrollment Status</label>

            <div class="col-md-8">
                <?php
                echo form_dropdown('enrollmentstatus', $enrollment, set_value('enrollmentstatus', (isset($userinformation->EnrollmentStatus) ? $userinformation->EnrollmentStatus : '49'), TRUE), array('class' => 'form-control'));
                ?>
            </div>
        </div>
        <?php } ?>
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
                            'value' => (isset($userinformation->UserPhoto) ? $userinformation->UserPhoto : '')
                        );
                        echo form_input($data);
                        ?>
                    </div>

                    <div class="col-md-4">
                        <h6>Current Photo</h6>

                        <div class="tenpxm"></div>
                        <?php
                        if (isset($userinformation->UserPhoto)) {
                            $url = base_url() . "uploads/pp/" . $userinformation->UserPhoto;
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
            <label class="col-md-3"></label>

            <div class="col-md-8">
                <input id="personalInfoBtn" class="btn btn-success" value="Save Changes" type="submit">
                <span></span>
                <input class="btn btn-default" value="Cancel" type="reset">
            </div>
        </div>
        <?php echo form_close(); ?>
        <?php echo form_end_divs(); ?>
    </div>
</div>