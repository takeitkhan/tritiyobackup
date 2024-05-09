<script type="text/javascript">
    jQuery(document).ready(function ($) {
        $.noConflict();
        // $('#payment_method').on('change', function () {
        //     if ($(this).val() == 1 || $(this).val() == 2 || $(this).val() == 3 || $(this).val() == 4) {
        //         $('#sendermobileno, #transactionid').show();
        //         $('#sendermobileno, #transactionid').attr({required: "required"});
        //         $('#instituteaccount').hide();
        //         $('#bankname').hide();
        //     } else if ($(this).val() == 5) {
        //         $('#bankname, #transactionid').show();
        //         $('#bankname, #transactionid').attr({required: "required"});
        //         $('#sendermobileno').hide();
        //         $('#instituteaccount').hide();
        //     } else if ($(this).val() == 6) {
        //         $('#instituteaccount, #transactionid').show();
        //         $('#instituteaccount, #transactionid').attr({required: "required"});
        //         $('#sendermobileno').hide();
        //         $('#bankname').hide();
        //     } else if ($(this).val() == 0) {
        //         $('#instituteaccount, #transactionid, #sendermobileno, #bankname').hide();
        //     }
        // });
        ajaxImgFnFe($, '#userInformationForm', 'insertstudentinformation', '?step=3');
    });
</script>
<div class="studentinfo">
<?php echo form_open_multipart('', array('class' => 'form-horizontal', 'id' => 'userInformationForm', 'data-toggle' => 'validator')); ?>

    <?php
        //$random = __random();
        // $data = array(
        //     'name' => 'randomcode',
        //     'id' => 'randomcode',
        //     'class' => 'form-control',
        //     'required' => 'required',
        //     'type' => 'hidden',
        //     'value' => (isset($random) ? $random : '')
        // );
        // echo form_input($data);
        // $data1 = array(
        //     'name' => 'created_on',
        //     'type' => 'hidden',
        //     'value' => __now()
        // );
        // echo form_input($data1);
    ?>          
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
    <label class="col-lg-1">পুর্ন ঠিকানা (বর্তমান)</label>

    <div class="col-md-4">
        <?php
        $data = array(
            'name' => 'present_address',
            'id' => 'present_address',
            'class' => 'form-control',
            'required' => 'required',
            'value' => ''
        );
        echo form_input($data);
        ?>
    </div>
    <label class="col-lg-3">পুর্ন ঠিকানা (স্থায়ী)</label>

    <div class="col-md-4">
        <?php
        $data = array(
            'name' => 'permanent_address',
            'id' => 'permanent_address',
            'class' => 'form-control',
			'required' => 'required',
            'value' => ''
        );
        echo form_input($data);
        ?>
    </div>
</div>
<div class="form-group">
    <label class="col-lg-1">পরবর্তী প্রতিষ্ঠানের নাম</label>

    <div class="col-md-4">
        <?php
        $data = array(
            'name' => 'name_institute',
            'id' => 'name_institute',
            'class' => 'form-control',
            'required' => 'required',
            'value' => ''
        );
        echo form_input($data);
        ?>
    </div>
    <label class="col-lg-3">ঠিকানা</label>

    <div class="col-md-4">
        <?php
        $data = array(
            'name' => 'institute_address',
            'id' => 'institute_address',
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
    <label class="col-lg-1">পিতা/অবিভাবকের পেশা </label>

    <div class="col-md-4">
        <?php
        $data = array(
            'name' => 'guardian_profession',
            'id' => 'fgo',
            'class' => 'form-control',
            'required' => 'required',
            'value' => ''
        );
        echo form_input($data);
        ?>
    </div>
    <label class="col-lg-1">বার্ষিক আয়ঃ</label>

    <div class="col-md-4">
        <?php
        $data = array(
            'name' => 'annual_income',
            'id' => 'annual_income',
            'class' => 'form-control',
			'required' => 'required',
            'value' => ''
        );
        echo form_input($data);
        ?>
    </div>
    
</div>
<div class="form-group">
    <label class="col-lg-1">পিতার অবর্তমানে অবিভাবকের নাম  </label>

    <div class="col-md-4">
        <?php
        $data = array(
            'name' => 'absence_father_guardian',
            'id' => 'absence_father_guardian',
            'class' => 'form-control',
            'required' => 'required',
            'value' => ''
        );
        echo form_input($data);
        ?>
    </div>
    <label class="col-lg-1">সম্পর্ক </label>

    <div class="col-md-4">
        <?php
        $data = array(
            'name' => 'relation',
            'id' => 'relation',
            'class' => 'form-control',
			'required' => 'required',
            'value' => ''
        );
        echo form_input($data);
        ?>
    </div>
    
</div>
<div class="form-group">
	<label class="col-lg-3">অধ্যায়নকালীন সমায়ে ছাত্র/ছাত্রীর অবস্থান</label>
	<div class="col-md">
		<input type="radio" name="study_loc" value="hostel" checked>
		ছাত্রাবাস
	</div>
	<div class="col-md">
		<input type="radio" name="study_loc" value="own-house" checked>
		নিজবাড়ী
	</div>
	<div class="col-md">
		<input type="radio" name="study_loc" value="others" checked>
		 অন্যান্যঃ
		 
    </div>
	<div class="col-md-4">
        <?php
        $data = array(
            'name' => 'others',
            'id' => 'others',
            'class' => 'form-control',
			
            'value' => ''
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
.col-md {
  float: left;
  width: 7%;
}


</style>