<script type="text/javascript">
    jQuery(document).ready(function ($) {
        $.noConflict();
        $('#payment_method').on('change', function () {
            if ($(this).val() == 1 || $(this).val() == 2 || $(this).val() == 3 || $(this).val() == 4) {
                $('#sendermobileno, #transactionid').show();
                $('#sendermobileno, #transactionid').attr({required: "required"});
                $('#instituteaccount').hide();
                $('#bankname').hide();
            } else if ($(this).val() == 5) {
                $('#bankname, #transactionid').show();
                $('#bankname, #transactionid').attr({required: "required"});
                $('#sendermobileno').hide();
                $('#instituteaccount').hide();
            } else if ($(this).val() == 6) {
                $('#instituteaccount, #transactionid').show();
                $('#instituteaccount, #transactionid').attr({required: "required"});
                $('#sendermobileno').hide();
                $('#bankname').hide();
            } else if ($(this).val() == 0) {
                $('#instituteaccount, #transactionid, #sendermobileno, #bankname').hide();
            }
        });
        ajaxImgFnFe($, '#userInformationForm', 'insertstudentinformation', '?step=3');
    });
</script>
<div class="studentinfo">
<?php echo form_open_multipart('', array('class' => 'form-horizontal', 'id' => 'userInformationForm', 'data-toggle' => 'validator')); ?>
<div class="form-group">
    <?php
    $data = array('value' => (isset($infosid) ? $infosid : 'none'), 'name' => 'infosid', 'type' => 'hidden');
    echo form_input($data);
    $data = array('value' => (isset($random) ? $random : 'none'), 'name' => 'userid', 'type' => 'hidden');
    echo form_input($data);
    $data = array('value' => (isset($random) ? $random : $_GET['getrandomid']), 'name' => 'uniquenumber', 'type' => 'hidden');
    echo form_input($data);
    $data = array('value' => 2, 'name' => 'ledgertypeid', 'type' => 'hidden');
    echo form_input($data);
    ?>
</div>
<div class="form-group">
    <label class="col-lg-1">নাম (বাংলায়)</label>

    <div class="col-md-4">
        <?php
        $data = array(
            'type' => 'full_name_bn',
            'name' => 'full_name_bn',
            'id' => 'full_name_bn',
            'class' => 'form-control',
            'value' => ''
        );
        echo form_input($data);
        ?>
    </div>
    <label class="col-lg-3">নাম (ইংরেজিতে বড় হাতের অক্ষরে)</label>

    <div class="col-md-4">
        <?php
        $data = array(
            'name' => 'full_name_en',
            'id' => 'full_name_en',
            'class' => 'form-control',
            'required' => 'required',
            'value' => ''
        );
        echo form_input($data);
        ?>
    </div>
</div>
<div class="form-group">
    <label class="col-lg-1">পিতার নাম (বাংলায়)</label>

    <div class="col-md-4">
        <?php
        $data = array(
            'name' => 'father_name_bn',
            'id' => 'father_name_bn',
            'class' => 'form-control',
            'value' => ''
        );
        echo form_input($data);
        ?>
    </div>
    <label class="col-lg-3">পিতার নাম (ইংরেজিতে বড় হাতের অক্ষরে)</label>

    <div class="col-md-4">
        <?php
        $data = array(
            'name' => 'father_name_en',
            'id' => 'father_name_en',
            'class' => 'form-control',
            'required' => 'required',
            'value' => ''
        );
        echo form_input($data);
        ?>
    </div>
</div>
<div class="form-group">
    <label class="col-lg-1">মাতার নাম (বাংলায়)</label>

    <div class="col-md-4">
        <?php
        $data = array(
            'name' => 'mother_name_bn',
            'id' => 'mother_name_bn',
            'class' => 'form-control',
            'required' => 'required',
            'value' => ''
        );
        echo form_input($data);
        ?>
    </div>
    <label class="col-lg-3">মাতার নাম (ইংরেজিতে বড় হাতের অক্ষরে)</label>

    <div class="col-md-4">
        <?php
        $data = array(
            'name' => 'mother_name_en',
            'id' => 'mother_name_en',
            'class' => 'form-control',
            'required' => 'required',
            'value' => ''
        );
        echo form_input($data);
        ?>
    </div>
</div>
<div class="form-group">
    <label class="col-lg-1">মোবাইল নম্বর</label>

    <div class="col-md-3">
        <?php
        $data = array(
            'name' => 'phone',
            'id' => 'phone',
            'class' => 'form-control',
            'required' => 'required',
            'value' => ''
        );
        echo form_input($data);
        ?>
    </div>
    <label class="col-lg-2">জন্ম তারিখ (সনদ অনুযায়ী)</label>

    <div class="col-md-4">
        <?php
        $data = array(
            'name' => 'dob',
            'id' => 'date',
            'class' => 'form-control',
            'value' => ''
        );
        echo form_input($data);
        ?>
    </div>
    <div class="col-md-2">
        <?php
        $data = array(
            'name' => 'nationality',
            'id' => 'nationality',
            'class' => 'form-control',
            'required' => 'required',
            'value' => 'বাংলাদেশি',
        );
        echo form_input($data);
        ?>
    </div>
</div>
<div class="form-group">
    <label class="col-lg-1">লিঙ্গ</label>

    <div class="col-md-2">
        <?php echo form_dropdown('gender', $gender, '', array('class' => 'form-control')); ?>
    </div>
    <label class="col-lg-1">ধর্ম</label>

    <div class="col-md-2">
        <?php echo form_dropdown('religion', $religion, set_value('religion', 182, TRUE), array('class' => 'form-control')); ?>
    </div>
    <label class="col-lg-1">ক্লাস</label>

    <div class="col-md-2">
        <?php echo form_dropdown('class', $classes, '', array('class' => 'form-control')); ?>
    </div>
    <label class="col-lg-1">সেকশন</label>

    <div class="col-md-2">
        <?php echo form_dropdown('section', $sections, '', array('class' => 'form-control')); ?>
    </div>
</div>
<div class="form-group">
    <label class="col-lg-2">ফটো নির্বাচন করুন </label>

    <div class="col-md-5">
        <input type="file" name="userfile" size="20"/>
    </div>
</div>
<div class="form-group">
    <div class="col-md-8">
        <input id="userInformationBtn" class="btn btn-success" value="Upload and Confirm" type="submit">
        <span></span>
        <input class="btn btn-default" value="Cancel" type="reset">
    </div>
</div>
<?php echo form_close(); ?>
</div>
<style>
.studentinfo{padding:25px 0;}
</style>