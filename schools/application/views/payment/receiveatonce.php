<div class="row">
    <div class="col-md-12 col-xs-12 col-sm-12">
        <?php echo form_start_divs($title, 'Add new payment'); ?>
        <?php echo form_open_multipart(base_url() . 'submitreceiveatonce', array('class' => 'form-horizontal', 'id' => 'receiveAtOnceForm', 'data-toggle' => 'validator')); ?>
        <input name="userid" type="hidden" value="<?php __e((isset($userid) ? $userid : 'none')); ?>">

        <div class="form-group">
            <label class="col-md-2">Transaction With</label>

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
                <div class="col-md-4">
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
                <div class="col-md-4">
                    <?php
                    $data = array(
                        'type' => 'number',
                        'name' => 'transactionwith_u',
                        'id' => 'transactionwith_u',
                        'class' => 'form-control',
                        'rules' => 'required',
                        'placeholder' => 'Enter the User ID',
                        'value' => ''
                    );
                    echo form_input($data);
                    ?>
                    <div class="ifnot_user" id="ifnot_user"></div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-2">Payment Date</label>

            <div class="col-md-4">
                <?php
                $data = array(
                    'name' => 'paymentdate',
                    'id' => 'datewithtime',
                    'class' => 'form-control',
                    'rules' => 'required',
                    'placeholder' => 'Payment date',
                    'value' => ''
                );
                echo form_input($data);
                ?>
            </div>

        </div>
        <div class="form-group">
            <label class="col-md-2">Payment Method</label>

            <div class="col-md-4">
                <?php //owndebugger($pay_method); ?>
                <?php echo form_dropdown('payment_method', (isset($pay_method) ? $pay_method : ''), '', array('id' => 'payment_method', 'class' => 'form-control')); ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-2">&nbsp;</label>

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
                    'rules' => 'required',
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
            <table class="table table-bordered table-responsive">
                <tr>
                    <th>Ledger Name</th>
                    <th width="170">Amount</th>
                    <th>Additional Note</th>
                </tr>
                <?php
                //owndebugger($ledgers);
                $i = 0;
                foreach ((array)$ledgers as $ledger) {
                    $i++;
                    ?>
                    <tr>
                        <td><?php __e((isset($ledger['LedgerName']) ? $ledger['LedgerName'] : '')); ?></td>
                        <td>
                            <?php
                            $data = array(
                                'type' => 'number',
                                'name' => 'data[' . $i . '][amount]',
                                'id' => 'amount',
                                'data-bv-integer-message' => 'The value is not an integer',
                                'data-id' => (isset($ledger['TypeId']) ? $ledger['TypeId'] : ''),
                                'class' => 'form-control rao'
                            );
                            echo form_input($data);
                            ?>
                        </td>

                        <?php
                        $data = array(
                            'type' => 'hidden',
                            'name' => 'data[' . $i . '][typeid]',
                            'id' => 'typeid',
                            'data-bv-integer-message' => 'The value is not an integer',
                            'data-id' => (isset($ledger['TypeId']) ? $ledger['TypeId'] : ''),
                            'class' => 'form-control rao',
                            'value' => (isset($ledger['TypeId']) ? $ledger['TypeId'] : '')
                        );
                        echo form_input($data);
                        ?>
                        <td>
                            <?php
                            $data = array(
                                'type' => 'text',
                                'name' => 'data[' . $i . '][additionalnote]',
                                'id' => 'additionalnote',
                                'data-id' => (isset($ledger['TypeId']) ? $ledger['TypeId'] : ''),
                                'class' => 'form-control rao'
                            );
                            echo form_input($data);
                            ?>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        </div>


        <div class="form-group">
            <div class="col-md-4">
                <input id="receiveAtOnceBtn" name="receiveAtOnceBtn" class="btn btn-success" value="Save Changes"
                       type="button">
                <span></span>
                <input class="btn btn-default" value="Cancel" type="reset">
            </div>
        </div>
        <?php echo form_close(); ?>
        <?php echo form_end_divs(); ?>
    </div>
</div>
