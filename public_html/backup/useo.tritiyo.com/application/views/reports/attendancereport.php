<div class="row">
    <div class="col-md-12 col-xs-12 col-sm-12">
        <?php echo form_start_divs($title, 'all of your students'); ?>
        <?php echo form_open_multipart(base_url() . 'getstdattendancereport', array('class' => 'form-horizontal', 'id' => 'getAttendanceReportForm', 'data-toggle' => 'validator')); ?>
        <div class="form-group">
            <div class="col-md-2">
                Student ID<br/>
                <?php
                $data = array(
                    'name' => 'studentid',
                    'id' => 'studentid',
                    'class' => 'form-control',
                    'data-minlength' => '2',
                    'required' => 'required'
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
                <input id="getFeeReportBtn" class="btn btn-success" value="Get Attendance Report" name="report"
                       type="submit">
                <span></span>
                <input class="btn btn-default" value="Cancel" type="reset">
            </div>
        </div>
        <?php echo form_close(); ?>
        <?php echo form_end_divs(); ?>
    </div>
    <?php
//    if (!empty($attendance)) {
//        owndebugger($attendance);
//    }
    ?>
    <?php if (!empty($attendance)) { ?>
        <div class="col-md-12 col-xs-12 col-sm-12">
            <div class="row" style="width: 900px;table-layout:fixed">
                <div class="col-md-10">
                    &nbsp;
                </div>
                <div class="col-md-2 pull-right">
                    <a href="javascript:void(0)" onclick="printdiv('attendance')">
                        <i class="fa fa-print" style="font-size: 22px;"></i>
                    </a>
                </div>
            </div>
            <div id="attendance">
                <div style="font-size: 20px; font-family: 'kalpurush', 'Times New Roman'; vertical-align: top;">
                    <table class="printtable"
                           style="width: 900px;
                           table-layout:fixed;
                           font-size: 12px;
                           font-family: 'Trebuchet MS', sans-serif;">
                        <tr>
                            <td colspan="3">
                                <hr style="border: 1px solid #000;"/>
                            </td>
                        </tr>
                        <tr>
                            <!-- Student Information -->
                            <td colspan="3"
                                style="border-collapse: collapse;
                                font-weight: bold;">
                                <table width="100%"
                                       style="border-collapse: collapse;
                                       font-size: 12px;
                                       font-family: 'Trebuchet MS', sans-serif;">
                                    <?php userdetails($biodata); ?>
                                    <tr>
                                        <!-- Pay Slip For -->
                                        <td width="130"
                                            style="border: 1px solid #DDD; border-collapse: collapse; padding: 5px; font-weight: bold;">
                                            Report
                                        </td>
                                        <td colspan="3"
                                            style="border: 1px solid #DDD;
                                            border-collapse: collapse;
                                            padding: 5px;
                                            font-weight: bold;
                                            color: green;">
                                            From <?php __e($sd); ?> To <?php __e($ed); ?>
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
                                       style="border: 1px solid #DDD;
                                       border-collapse: collapse;
                                       font-size: 12px;
                                       font-family: 'Trebuchet MS', sans-serif;">
                                    <thead>
                                    <tr style="border: 1px solid #DDD;
                                        border-collapse: collapse;">
                                        <th width="130"
                                            style="text-align: left;
                                            border: 1px solid #DDD;
                                            border-collapse: collapse;
                                            padding: 5px;">
                                            Date
                                        </th>
                                        <th width="180"
                                            style="text-align: left;
                                            border: 1px solid #DDD;
                                            border-collapse: collapse;
                                            padding: 5px;">
                                            Message
                                        </th>
                                        <th width="130"
                                            style="text-align: left;border: 1px solid #DDD; border-collapse: collapse; padding: 5px;">
                                            Status
                                        </th>
                                        <th width="40"
                                            style="text-align: left;border: 1px solid #DDD; border-collapse: collapse; padding: 5px;">
                                            Is Absent
                                        </th>
                                    </tr>
                                    </thead>

                                    <?php
                                    $sum = 0;
                                    foreach ((array)$attendance as $key => $value) {
                                        $receivedby = $this->ion_auth->user($value['UserId'])->row();
                                        //owndebugger();
                                        $sum += $value['isAbsent'];
                                        ?>
                                        <tr>
                                            <td style="text-align: left;border: 1px solid #DDD; border-collapse: collapse; padding: 5px;"><?php __e((isset($value['AttDate']) ? $value['AttDate'] : '')); ?></td>
                                            <td style="text-align: left;border: 1px solid #DDD; border-collapse: collapse; padding: 5px;"><?php __e((isset($value['Message']) ? $value['Message'] : '')); ?></td>
                                            <td style="text-align: left;border: 1px solid #DDD; border-collapse: collapse; padding: 5px;"><?php __e((isset($value['PrsStatus']) ? $value['PrsStatus'] : '0')); ?></td>
                                            <td style="text-align: right;border: 1px solid #DDD; border-collapse: collapse; padding: 5px;">
                                                <?php __e($value['isAbsent'] == 0 ? '<a href="javascript:void(0);"  style="color: green; text-decoration: none;">No</a>' : '<a href="javascript:void(0);" style="color: red; text-decoration: none;">Yes</a>'); ?>
                                            </td>
                                        </tr>
                                        <?php
                                        //owndebugger($value);
                                    }
                                    ?>

                                    <tfoot>
                                    <tr>
                                        <td colspan="3"
                                            style="text-align: right;border: 1px solid #DDD; border-collapse: collapse; padding: 5px;">
                                            Total Absent
                                        </td>
                                        <td width="40"
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