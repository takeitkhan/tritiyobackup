<div class="row">
    <div class="col-md-12 col-xs-12 col-sm-12">
        <?php echo form_start_divs($title, 'Add new Transaction ID'); ?>
        <?php echo form_open_multipart('modifybasicprofile', array('class' => 'form-horizontal', 'id' => 'transactionEntryForm', 'data-toggle' => 'validator')); ?>
        <input name="userid" type="hidden" value="<?php __e((isset($userid) ? $userid : 'none')); ?>">

        <div class="form-group">
            <label class="col-md-2">Payment Method</label>

            <div class="col-md-4">
                <?php echo form_dropdown('payment_method', (isset($pay_method) ? $pay_method : ''), '', array('class' => 'form-control')); ?>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-2">Transaction ID</label>

            <div class="col-md-4">
                <?php
                $data = array(
                    'name' => 'transactionid',
                    'id' => 'transactionid',
                    'class' => 'form-control',
                    'value' => 'accept',
                    'type' => 'number',
                );
                echo form_input($data);
                ?>
            </div>
            <div class="col-md-4">
                <div class="input-group">
                    <span class="input-group-addon">880</span>
                    <?php
                    $data = array(
                        'type' => 'number',
                        'name' => 'sendernumber',
                        'id' => 'sendernumber',
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
        <div class="form-group">
            <label class="col-md-2">Amount</label>

            <div class="col-md-4">
                <?php
                $data = array(
                    'name' => 'amount',
                    'id' => 'amount',
                    'class' => 'form-control',
                    'placeholder' => 'Enter the amount',
                    'type' => 'number',
                    'value' => ''
                );
                echo form_input($data);
                ?>
            </div>

            <?php
            $data = array(
                'name' => 'insertedtime',
                'id' => 'datewithtime',
                'class' => 'form-control',
                'type' => 'hidden',
                'value' => __now()
            );
            echo form_input($data);
            ?>
        </div>
        <div class="form-group">
            <label class="col-md-2">Payment Date</label>

            <div class="col-md-4">
                <?php
                $data = array(
                    'name' => 'transactiondate',
                    'id' => 'date',
                    'class' => 'form-control',
                    'placeholder' => 'Transaction Date',
                    'value' => ''
                );
                echo form_input($data);
                ?>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-2"></label>

            <div class="col-md-4">
                <input id="transactionEntryBtn" class="btn btn-success" value="Save Changes"
                       type="submit">
                <span></span>
                <input class="btn btn-default" value="Cancel" type="reset">
            </div>
        </div>
        <?php echo form_close(); ?>
        <?php echo form_end_divs(); ?>
    </div>
</div>
