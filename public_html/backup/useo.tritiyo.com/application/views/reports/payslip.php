<div class="row">
    <div class="col-md-12 col-xs-12 col-sm-12">
        <?php echo form_start_divs($title, 'your salary or other payment history'); ?>
        <?php echo form_open_multipart(base_url() . 'getpayslip', array('class' => 'form-horizontal', 'id' => 'getPaySlipForm', 'data-toggle' => 'validator')); ?>
        <div class="form-group">
            <div class="col-md-2">
                User ID<br/>
                <?php
                $data = array(
                    'name' => 'userid',
                    'id' => 'userid',
                    'class' => 'form-control',
                    'data-minlength' => '2',
                    'required' => 'required',
                    'value' => $userid
                );
                echo form_input($data);
                ?>
            </div>
            <div class="col-md-2">
                From Date<br/>
                <?php
                $data = array(
                    'name' => 'startdate',
                    'id' => 'date11',
                    'class' => 'form-control',
                    'required' => 'required'
                );
                echo form_input($data);
                ?>
            </div>
            <div class="col-md-2">
                To Date<br/>
                <?php
                $data = array(
                    'name' => 'enddate',
                    'id' => 'date12',
                    'class' => 'form-control',
                    'required' => 'required'
                );
                echo form_input($data);
                ?>
            </div>

            <div class="col-md-3">
                <br/>
                <input id="getPaySlipBtn" class="btn btn-success" value="Get Pay Slip" name="report" type="submit">
                <span></span>
                <input class="btn btn-default" value="Cancel" type="reset">
            </div>
        </div>
        <?php echo form_close(); ?>
        <?php echo form_end_divs(); ?>
    </div>
    <?php if (!empty($payslip)) { ?>
        <div class="col-md-12 col-xs-12 col-sm-12">
            <div class="row" style="width: 900px;table-layout:fixed">
                <div class="col-md-10">
                    &nbsp;
                </div>
                <div class="col-md-2 pull-right">
                    <a href="javascript:void(0)" onclick="printdiv('payslip')">
                        <i class="fa fa-print" style="font-size: 22px;"></i>
                    </a>
                </div>
            </div>
            <div id="payslip">
                <div style="font-size: 20px; font-family: 'kalpurush', 'Times New Roman'; vertical-align: top;">
                    <table class="printtable"
                           style="width: 900px;table-layout:fixed; font-size: 12px; font-family: 'Trebuchet MS', sans-serif;">
                        <tr>
                            <td colspan="3">
                                <hr style="border: 1px solid #000;"/>
                            </td>
                        </tr>
                        <tr>
                            <!-- Student Information -->
                            <td colspan="3"
                                style="border-collapse: collapse; font-weight: bold;">
                                <table width="100%"
                                       style="border-collapse: collapse; font-size: 12px; font-family: 'Trebuchet MS', sans-serif;">
                                    <?php userdetails($biodata); ?>
                                    <tr>
                                        <!-- Pay Slip For -->
                                        <td width="130"
                                            style="border: 1px solid #DDD; border-collapse: collapse; padding: 5px; font-weight: bold;">
                                            Report
                                        </td>
                                        <td colspan="3"
                                            style="border: 1px solid #DDD; border-collapse: collapse; padding: 5px; font-weight: bold; color: green;">
                                            From <?php __e(inttodate($sd)); ?> To <?php __e(inttodate($ed)); ?>
                                        </td>
                                        <!-- Student Information -->
                                    </tr>
                                </table>
                            </td>
                            <!-- Student Information -->
                        </tr>
                        <tr>
                            <td colspan="3">
                                <hr style="border: 1px solid #000;"/>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <table width="100%"
                                       style="border: 1px solid #DDD; border-collapse: collapse; font-size: 12px; font-family: 'Trebuchet MS', sans-serif;">
                                    <thead>
                                    <tr style="border: 1px solid #DDD; border-collapse: collapse;">
                                        <th width="130"
                                            style="text-align: left;border: 1px solid #DDD; border-collapse: collapse; padding: 5px;">
                                            Payment Date
                                        </th>
                                        <th width="130"
                                            style="text-align: left;border: 1px solid #DDD; border-collapse: collapse; padding: 5px;">
                                            Payment Method
                                        </th>
                                        <th width="200"
                                            style="text-align: left;border: 1px solid #DDD; border-collapse: collapse; padding: 5px;">
                                            Received By
                                        </th>
                                        <th width="350"
                                            style="text-align: left;border: 1px solid #DDD; border-collapse: collapse; padding: 5px;">
                                            Description
                                        </th>
                                        <th width="130"
                                            style="text-align: left;border: 1px solid #DDD; border-collapse: collapse; padding: 5px;">
                                            Amount
                                        </th>
                                    </tr>
                                    </thead>

                                    <?php
                                    $sum = 0;
                                    foreach ((array)$payslip as $key => $value) {
                                        $receivedby = $this->ion_auth->user($value['UserId'])->row();
                                        //owndebugger();
                                        $sum += $value['Amount'];
                                        ?>
                                        <tr>
                                            <td style="text-align: left;border: 1px solid #DDD; border-collapse: collapse; padding: 5px;"><?php __e((isset($value['PaymentDate']) ? inttodate($value['PaymentDate']) : '')); ?></td>
                                            <td style="text-align: left;border: 1px solid #DDD; border-collapse: collapse; padding: 5px;"><?php __e((isset($value['PaymentMethod']) ? $pay_method[$value['PaymentMethod']] : '')); ?></td>
                                            <td style="text-align: left;border: 1px solid #DDD; border-collapse: collapse; padding: 5px;"><?php __e((isset($value['UserId']) ? $receivedby->full_name_en : '')); ?></td>
                                            <td style="text-align: left;border: 1px solid #DDD; border-collapse: collapse; padding: 5px;"><?php __e((isset($value['LedgerName']) ? $value['LedgerName'] : '')); ?></td>
                                            <td style="text-align: right;border: 1px solid #DDD; border-collapse: collapse; padding: 5px;"><?php __e((isset($value['Amount']) ? $value['Amount'] : '0')); ?></td>
                                        </tr>
                                        <?php
                                        //owndebugger($value);
                                    }
                                    ?>

                                    <tfoot>
                                    <tr>
                                        <td colspan="3"
                                            style="border: 1px solid #DDD; border-collapse: collapse; padding: 5px;">In
                                            Word:
                                            <?php
                                            $CI = &get_instance();
                                            $CI->load->library('numbertowords');
                                            //echo ;
                                            __e('<strong>' . $CI->numbertowords->convert_number($sum) . ' Taka Only</strong>');
                                            ?>
                                        </td>
                                        <td
                                            style="text-align: right;border: 1px solid #DDD; border-collapse: collapse; padding: 5px;">
                                            Total
                                        </td>
                                        <td width="120"
                                            style="text-align: right;border: 1px solid #DDD; border-collapse: collapse; padding: 5px;"><?php __e($sum); ?></td>
                                    </tr>
                                    </tfoot>
                                </table>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    <?php } ?>
    <?php
    if (isset($biodata)) {
        //owndebugger($biodata);
    }
    ?>
</div>