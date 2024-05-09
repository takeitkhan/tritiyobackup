<div class="row">
    <div class="col-md-12 col-xs-12 col-sm-12">
        <?php echo form_start_divs($title, 'Add new payment'); ?>
        <?php echo form_open_multipart('modifybasicprofile', array('class' => 'form-horizontal', 'id' => 'paymentEntryForm', 'data-toggle' => 'validator')); ?>
        <input name="userid" type="hidden" value="<?php __e((isset($userid) ? $userid : 'none')); ?>">

        <div class="form-group">
            <label class="col-lg-3">Ledger Name</label>

            <div class="col-md-8">
                <?php //owndebugger($ledgernames); ?>
                <?php echo form_dropdown('ledgertypeid', (isset($ledgernames) ? $ledgernames : ''), '', array('class' => 'form-control')); ?>
            </div>
        </div>

        <div class="form-group">
            <label class="col-lg-3">Transaction With</label>

            <div class="col-md-2">
                <?php
                $data = array(
                    'name' => 'nonuser',
                    'id' => 'nonuser',
                    'value' => 'accept',
                    'checked' => FALSE,
                    'style' => 'margin:10px'
                );
                echo form_checkbox($data);
                ?>
                Not Applicable
            </div>
            <div id="showfield" style="display: none;">
                <div class="col-md-6">
                    <div class="input-group">
                        <span class="input-group-addon">880</span>
                        <?php
                        $data = array(
                            'type' => 'number',
                            'name' => 'transactionwith_p',
                            'id' => 'transactionwith_p',
                            'class' => 'form-control',
                            'pattern' => ".{10,10}",
                            'placeholder' => 'Enter phone number',
                            'value' => ''
                        );
                        echo form_input($data);
                        ?>
                    </div>
                </div>
            </div>
            <div id="hidefield">
                <div class="col-md-6">
                    <?php
                    $data = array(
                        'type' => 'number',
                        'name' => 'transactionwith_u',
                        'id' => 'transactionwith_u',
                        'class' => 'form-control',
                        'placeholder' => 'Enter the User ID',
                        'value' => ''
                    );
                    echo form_input($data);
                    ?>
                </div>
            </div>

        </div>

        <div class="form-group">
            <label class="col-lg-3">Amount</label>

            <div class="col-md-8">
                <?php
                $data = array(
                    'name' => 'amount',
                    'id' => 'mobileno',
                    'class' => 'form-control',
                    'data-minlength' => '2',
                    'data-maxlength' => '4',
                    'required' => 'required',
                    'placeholder' => 'Enter the amount',
                    'type' => 'number',
                    'value' => ''
                );
                echo form_input($data);
                ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-3">Payment Date</label>

            <div class="col-md-8">
                <?php
                $data = array(
                    'name' => 'paymentdate',
                    'id' => 'datewithtime',
                    'class' => 'form-control',
                    'required' => 'required',
                    'placeholder' => 'Payment date',
                    'value' => ''
                );
                echo form_input($data);
                ?>
            </div>
        </div>

        <div class="form-group">
            <label class="col-lg-3">Additional Note</label>

            <div class="col-md-8">
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
            <label class="col-lg-3">Payment Method</label>

            <div class="col-md-8">
                <?php //owndebugger($pay_method); ?>
                <?php echo form_dropdown('payment_method', (isset($pay_method) ? $pay_method : ''), '', array('id' => 'payment_method', 'class' => 'form-control')); ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-3">&nbsp;</label>

            <div class="col-md-8">
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
        </div>

        <div class="form-group">
            <label class="col-md-3"></label>

            <div class="col-md-8">
                <input id="paymentEntryBtn" class="btn btn-success" value="Save Changes"
                       type="submit">
                <span></span>
                <input class="btn btn-default" value="Cancel" type="reset">
            </div>
        </div>
        <?php echo form_close(); ?>
        <?php echo form_end_divs(); ?>
    </div>
</div>
