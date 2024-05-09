<div class="row">
    <div class="col-md-12 col-xs-12 col-sm-12">
        <?php //owndebugger($userinformation); ?>
        <?php $this->load->view('profile/layouts/editormenu'); ?>
        <?php echo form_start_divs($title, 'Academic Information' . (isset($userinformation->full_name_en) ? ' of ' . $userinformation->full_name_en . ', ' . (isset($groupname) ? $groupname : '') : '')); ?>
        <?php echo form_open_multipart('modifybasicprofile', array('class' => 'form-horizontal', 'id' => 'basicInformationForm', 'data-toggle' => 'validator')); ?>
        <input name="userid" type="hidden" value="<?php __e($userid); ?>">

        <div class="form-group">
            <label class="col-lg-3">User Id</label>

            <div class="col-md-9">
                <?php __e((isset($userinformation->id) ? $userinformation->id : '')); ?>
                <?php __smallnote('(Unchangeable)'); ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-3">Full Name (Bangla)</label>

            <div class="col-md-8">
                <?php
                $data = array(
                    'name' => 'full_name_bn',
                    'id' => 'full_name_bn',
                    'class' => 'form-control',
                    'data-minlength' => '2',
                    'required' => 'required',
                    'value' => (isset($userinformation->full_name_bn) ? $userinformation->full_name_bn : '')
                );

                echo form_input($data);
                ?>
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
                <label class="col-lg-3 text-danger">Use father name as guardian name</label>
                <div class="col-md-9">
                    <input type="radio" value="1" name="setguardian" class="radio-inline" checked="checked"/> Use
                </div>
            </div>
        <?php } ?>
        <div class="form-group">
            <label class="col-lg-3">Father's Name (Bangla)</label>

            <div class="col-md-8">
                <?php
                $data = array(
                    'name' => 'father_name_bn',
                    'id' => 'father_name_bn',
                    'class' => 'form-control',
                    'data-minlength' => '2',
                    'required' => 'required',
                    'value' => (isset($userinformation->father_name_bn) ? $userinformation->father_name_bn : '')
                );

                echo form_input($data);
                ?>
            </div>
        </div>

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
                <label class="col-lg-3 text-danger">Use mother name as guardian name</label>
                <div class="col-md-9">
                    <input type="radio" value="2" name="setguardian" class="radio-inline"/> Use
                </div>
            </div>
        <?php } ?>
        <div class="form-group">
            <label class="col-lg-3">Mother's Name (Bangla)</label>

            <div class="col-md-8">
                <?php
                $data = array(
                    'name' => 'mother_name_bn',
                    'id' => 'mother_name_bn',
                    'class' => 'form-control',
                    'data-minlength' => '2',
                    'required' => 'required',
                    'value' => (isset($userinformation->mother_name_bn) ? $userinformation->mother_name_bn : '')
                );

                echo form_input($data);
                ?>
            </div>
        </div>

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
                <label class="col-lg-3 text-danger">Use same phone for guardian</label>
                <div class="col-md-9">
                    <input type="radio" value="1" name="fphone" class="radio-inline" checked="checked"/> Yes
                    <input type="radio" value="0" name="fphone" class="radio-inline"/> No
                </div>
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

        <div class="form-group">
            <label class="col-md-3"></label>

            <div class="col-md-8">
                <input id="basicInfoBtn" class="btn btn-success" value="Save Changes"
                       type="submit">
                <span></span>
                <input class="btn btn-default" value="Cancel" type="reset">
            </div>
        </div>
        <?php echo form_close(); ?>
        <?php echo form_end_divs(); ?>
    </div>
</div>
