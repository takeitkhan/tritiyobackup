<div class="row">
    <div class="col-md-12 col-xs-12 col-sm-12">
        <?php echo form_start_divs($title, 'insert or update attendance by class'); ?>
        <?php echo form_open_multipart(base_url() . 'generateattendance', array('class' => 'form-horizontal', 'id' => 'attendanceForm', 'data-toggle' => 'validator')); ?>
        <div class="form-group">
            <div class="col-md-2">
                User Group<br/>
                <?php echo form_dropdown('usergroups', $return, set_value('usergroups', (isset($usergroup) ? $usergroup : ''), TRUE), array('class' => 'form-control', 'id' => 'usergroups')); ?>
            </div>
            <div class="col-md-2">
                Class<br/>
                <?php echo form_dropdown('classs', $classes, set_value('gender', (isset($cid) ? $cid : ''), TRUE), array('class' => 'form-control', 'id' => 'classs')); ?>
            </div>
            <div class="col-md-2">
                Section<br/>
                <?php echo form_dropdown('section', $sections, set_value('gender', (isset($sid) ? $sid : ''), TRUE), array('class' => 'form-control', 'id' => 'section')); ?>
            </div>
            <div class="col-md-2">
                Group<br/>
                <?php echo form_dropdown('groupp', $groups, set_value('gender', (isset($sgid) ? $sgid : ''), TRUE), array('class' => 'form-control', 'id' => 'groupp')); ?>
            </div>
            <!--            <div class="col-md-2">-->
            <!--                Subject<br/>-->
            <!--                --><?php //echo form_dropdown('subject', $subjects, set_value('gender', (isset($subid) ? $subid : ''), TRUE), array('class' => 'form-control', 'id' => 'subject')); ?>
            <!--            </div>-->
            <div class="col-md-3">
                <br/>
                <input id="attendanceBtn" class="btn btn-success" value="Insert or Update Attendance" type="button">
                <span></span>
                <input class="btn btn-default" value="Cancel" type="reset">
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-10">
                <?php
                __e(isset($notfound) ? $notfound : '');
                ?>
            </div>
        </div>
        <?php echo form_close(); ?>
        <?php echo form_end_divs(); ?>
    </div>
    <div class="col-md-12">
    </div>
    <div id="loadmessagehere"></div>
    <div class="col-md-12">
        <?php if (isset($usersforattendance)) { ?>
            <div class="col-md-12 col-xs-12 col-sm-12">
                <div class=" bs-example bs-example-bg-classes" style="">
                    <?php if ($_GET['usergroup'] != 100) { ?>
                        <p id="default_txt" class="bg-warning" style="display: none;">You S/D is absent today</p>
                    <?php } else { ?>
                        <p id="default_txt" class="bg-warning" style="display: none;">Inform to admin about absence</p>
                    <?php } ?>
                </div>
            </div>
            <div id="modifyattendance" class="col-md-12 col-xs-12 col-sm-12">
                <form method="post" action="result_processor">
                    <table class="table table-bordered">
                        <tr>
                            <th width="20">User ID</th>
                            <th width="5">Is Absent?</th>
                            <th width="350">Message</th>
                            <th width="80">Send</th>
                            <th width="60">
                                <?php if ($_GET['usergroup'] != 100) { ?>
                                    Guardian Phone
                                <?php } else { ?>
                                    Phone
                                <?php } ?>
                            </th>
                            <th width="150">Full Name (bn)</th>
                            <th width="150">Full Name (en)</th>
                            <?php if ($_GET['usergroup'] != 100) { ?>
                                <th width="10">Roll</th>
                                <th width="10">Class</th>
                                <th width="10">Group</th>
                                <th width="40">Department</th>
                            <?php } ?>
                        </tr>

                        <?php //owndebugger($usersforattendance); ?>
                        <?php foreach ((array)$usersforattendance as $usr) { ?>
                            <?php //owndebugger($usr); ?>
                            <tr>
                                <td>
                                    <?php __e((isset($usr['UserId']) ? $usr['UserId'] : '')); ?>
                                    <input
                                        id="stdid_<?php __e((isset($usr['AttendanceId']) ? $usr['AttendanceId'] : '')); ?>"
                                        name="stdid"
                                        data-id="<?php __e($usr['UserId']); ?>"
                                        class="form-control studentmark"
                                        value="<?php __e($usr['UserId']); ?>"
                                        type="hidden"
                                    />
                                </td>
                                <td>
                                    <input
                                        id="isabsent_<?php __e((isset($usr['AttendanceId']) ? $usr['AttendanceId'] : '')); ?>"
                                        name="isabsent"
                                        data-id="<?php __e((isset($usr['AttendanceId']) ? $usr['AttendanceId'] : '')); ?>"
                                        class="checkbox studentattendance"
                                        type="checkbox"
                                        <?php
                                        if (isset($usr['isAbsent'])) {
                                            if ($usr['isAbsent'] == 0) {
                                                __e('value="1"');
                                            } else {
                                                __e('checked');
                                            }
                                        }
                                        ?>/>
                                </td>
                                <td>
                                    <input value="<?php __e((isset($usr['Message']) ? $usr['Message'] : '')); ?>"
                                           id="message_<?php __e((isset($usr['AttendanceId']) ? $usr['AttendanceId'] : '')); ?>"
                                           name="message"
                                           data-id="<?php __e((isset($usr['AttendanceId']) ? $usr['AttendanceId'] : '')); ?>"
                                           class="form-control studentattendance"
                                           type="text"
                                    />
                                    <input
                                        id="guardianphoneno_<?php __e((isset($usr['AttendanceId']) ? $usr['AttendanceId'] : '')); ?>"
                                        name="message"
                                        data-id="<?php __e((isset($usr['AttendanceId']) ? $usr['AttendanceId'] : '')); ?>"
                                        class="form-control studentattendance"
                                        type="hidden"
                                        value="<?php __e((isset($usr['guardianpn']) ? $usr['guardianpn'] : 'none')); ?>"/>
                                </td>
                                <td>
                                    <input style="display: none;" href="javascript:void(0);" id="setmessage"
                                           class="setmessage_<?php __e((isset($usr['AttendanceId']) ? $usr['AttendanceId'] : '')); ?> btn btn-warning btn-xs"
                                           data-id="<?php __e((isset($usr['AttendanceId']) ? $usr['AttendanceId'] : '')); ?>"
                                           value="Send" type="button"/>
                                </td>
                                <td>
                                    <?php __e((isset($usr['guardianpn']) ? $usr['guardianpn'] : '')); ?>
                                </td>
                                <td>
                                    <?php __e((isset($usr['fullnamebn']) ? $usr['fullnamebn'] : '')); ?>
                                </td>
                                <td>
                                    <?php __e((isset($usr['fullnameen']) ? $usr['fullnameen'] : '')); ?>
                                </td>
                                <?php if ($_GET['usergroup'] != 100) { ?>
                                    <td>
                                        <?php __e((isset($usr['ClassRoll']) ? $usr['ClassRoll'] : '')); ?>
                                    </td>
                                    <td>
                                        <?php __e((isset($usr['Class']) ? $usr['Class'] : '')); ?>
                                    </td>
                                    <td>
                                        <?php __e((isset($usr['GroupId']) ? $usr['GroupId'] : '')); ?>
                                    </td>
                                    <td>
                                        <?php __e((isset($usr['Department']) ? $usr['Department'] : '')); ?>
                                    </td>
                                <?php } ?>
                            </tr>
                        <?php } ?>
                    </table>
                </form>
            </div>
        <?php } ?>
    </div>
</div>
