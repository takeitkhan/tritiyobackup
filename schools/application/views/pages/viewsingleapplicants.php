<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <?php //owndebugger($applicantsinfo); ?>
        <?php echo form_open_multipart('', array('class' => 'form-horizontal', 'id' => 'addOnlineAdmissionForm', 'data-toggle' => 'validator')); ?>
        <?php
        owndebugger($applicantinfo);
        __e((isset($applicantinfo['Gender']) ? $applicantinfo['Gender'] : ''));
        __e((isset($applicantinfo['EnrollmentStatus']) ? $applicantinfo['EnrollmentStatus'] : ''));
        __e((isset($applicantinfo['DateOfBirth']) ? $applicantinfo['DateOfBirth'] : ''));
        __e((isset($applicantinfo['Fn_bn']) ? $applicantinfo['Fn_bn'] : ''));
        __e((isset($applicantinfo['Fn_en']) ? $applicantinfo['Fn_en'] : ''));
        __e((isset($applicantinfo['Ffn_bn']) ? $applicantinfo['Ffn_bn'] : ''));
        __e((isset($applicantinfo['Ffn_en']) ? $applicantinfo['Ffn_en'] : ''));
        __e((isset($applicantinfo['Mfn_bn']) ? $applicantinfo['Mfn_bn'] : ''));
        __e((isset($applicantinfo['Mfn_en']) ? $applicantinfo['Mfn_en'] : ''));
        __e((isset($applicantinfo['PaymentId']) ? $applicantinfo['PaymentId'] : ''));
        __e((isset($applicantinfo['Amount']) ? $applicantinfo['Amount'] : ''));
        __e((isset($applicantinfo['TransactionId']) ? $applicantinfo['TransactionId'] : ''));
        ?>
        <?php echo form_close(); ?>
        <?php echo form_end_divs(); ?>
    </div>
</div>
