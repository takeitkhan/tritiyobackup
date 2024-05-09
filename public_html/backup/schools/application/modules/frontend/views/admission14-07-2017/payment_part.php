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
        //ajaxFn($, '#paymentEntryForm', 'insertpayment');
        ajaxFnRoutesCheck($, '#transactionid', 'checktransactionid', '#urlsuggestions1', '#newportalurl');
        ajaxFnFe($, '#paymentEntryForm', 'applicationfee', '?step=2');
    });
</script>
<div class="studentinfo">
<?php echo form_open_multipart('modifybasicprofile', array('class' => 'form-horizontal', 'id' => 'paymentEntryForm', 'data-toggle' => 'validator')); ?>
<div class="form-group">
    <?php
    //owndebugger($infosid);
    if (!empty($infosid)) {
        $infos = $infosid;
    } else {
        $infos = 'none';
    }
    $data = array('value' => $infos, 'name' => 'infosid', 'type' => 'hidden');
    echo form_input($data);
    $data = array('value' => (isset($random) ? $random : 'none'), 'name' => 'userid', 'type' => 'hidden');
    echo form_input($data);
    $data = array('value' => 2, 'name' => 'ledgertypeid', 'type' => 'hidden');
    echo form_input($data);
    ?>
</div>
<div class="form-group">
    <label class="col-lg-2">প্রেরণকারী বিকাশ নম্বর</label>

    <div class="col-md-6">
        <?php
        $data = array(
            'type' => 'number',
            'name' => 'transactionwith_u',
            'id' => 'transactionwith_u',
            'class' => 'form-control',
            'value' => ''
        );
        echo form_input($data);
        ?>
    </div>
    <label class="col-lg-1">এমাউন্ট</label>

    <div class="col-md-3">
        <?php
        $data = array(
            'name' => 'amount',
            'id' => 'amount',
            'class' => 'form-control',
            'data-minlength' => '2',
            'data-maxlength' => '4',
            'required' => 'required',
            'placeholder' => 'এমাউন্ট লিখুন',
            'type' => 'number',
            'value' => ''
        );
        echo form_input($data);
        ?>
    </div>
</div>
<div class="form-group">
    <?php
    $data = array(
        'name' => 'paymentdate',
        'type' => 'hidden',
        'class' => 'form-control',
        'required' => 'required',
        'placeholder' => 'Payment date',
        'value' => __now()
    );
    echo form_input($data);
    ?>
</div>
<div class="form-group">
    <label class="col-lg-2">Payment Method</label>

    <div class="col-md-4">
        <?php echo form_dropdown('payment_method', (isset($pay_method) ? $pay_method : ''), '', array('id' => 'payment_method', 'class' => 'form-control')); ?>
    </div>
    <label class="col-lg-2">Additional Note</label>

    <div class="col-md-4">
        <?php
        $data = array(
            'name' => 'note',
            'id' => 'note',
            'class' => 'form-control',
            'required' => 'required',
            'placeholder' => 'Enter additional note',
            'value' => ''
        );
        echo form_input($data);
        ?>
    </div>
</div>
<div class="form-group">
    <label class="col-lg-2">&nbsp;</label>

    <div class="col-md-4">
        <?php
        $data = array(
            'name' => 'bankname',
            'id' => 'bankname',
            'class' => 'form-control',
            'style' => 'display:none; margin: 0px 0px 15px 0px;',
            'placeholder' => 'Bank Name',
            'value' => ''
        );
        echo form_input($data);
        ?>
        <?php
        $data = array(
            'name' => 'instituteaccount',
            'id' => 'instituteaccount',
            'class' => 'form-control',
            'style' => 'display:none; margin: 0px 0px 15px 0px;',
            'placeholder' => 'Institute',
            'value' => 'Institute',
            'readonly' => 'readonly'
        );
        echo form_input($data);
        ?>
        <?php
        $data = array(
            'name' => 'sendermobileno',
            'id' => 'sendermobileno',
            'class' => 'form-control',
            'data-minlength' => '11',
            'data-maxlength' => '11',
            'style' => 'display:none; margin: 0px 0px 15px 0px;',
            'placeholder' => 'Transaction Mobile Number',
            'value' => ''
        );
        echo form_input($data);
        ?>
        <?php
        $data = array(
            'name' => 'transactionid',
            'id' => 'transactionid',
            'class' => 'form-control',
            'data-minlength' => '4',
            'data-maxlength' => '14',
            'style' => 'display:none; margin: 0px 0px 15px 0px;',
            'placeholder' => 'Transaction ID',
            'value' => ''
        );
        echo form_input($data);
        ?>
    </div>
    <div class="col-md-5">
        <div id="urlsuggestions1"></div>
    </div>
</div>
<div class="form-group">
    <label class="col-md-2"></label>

    <div class="col-md-8">
        <input id="paymentEntryBtn" name="name" class="btn btn-success" value="Confirm" type="submit">
    </div>
</div>
<?php echo form_close(); ?>
</div>
<style>
.studentinfo{padding:25px 0;}
</style>