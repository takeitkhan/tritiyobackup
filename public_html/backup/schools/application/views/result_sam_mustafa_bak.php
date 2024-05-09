<div class="col-md-12 col-xs-12 col-sm-12">
    <?php echo form_start_divs('Search', 'All class cgpa,grade'); ?>
    <?php echo form_open_multipart('', array('class' => 'form-horizontal', 'id' => 'search-result', 'method' => 'get', 'data-toggle' => 'validator')); ?>
    <div class="form-group">
        <div class="col-md-2">
            Exam<br/>
            <?php echo form_dropdown('examm', $exams, set_value('examm', (isset($eid) ? $eid : ''), TRUE), array('class' => 'form-control', 'id' => 'examm', 'required' => 'required')); ?>
        </div>
        <div class="col-md-2">
            Class<br/>
            <?php echo form_dropdown('classs', $classes, set_value('classs', (isset($cid) ? $cid : ''), TRUE), array('class' => 'form-control', 'id' => 'classs', 'required' => 'required')); ?>
        </div>
        <div class="col-md-2">
            Section<br/>
            <?php echo form_dropdown('section', $sections, set_value('section', (isset($sid) ? $sid : ''), TRUE), array('class' => 'form-control', 'id' => 'section', 'required' => 'required')); ?>
        </div>
        <!-- <div class="col-md-2">
            Subject<br/>
            <?php echo form_dropdown('subject', $subjects, set_value('subject', (isset($subid) ? $subid : ''), TRUE), array('class' => 'form-control', 'id' => 'subject')); ?>
        </div> -->
        <div class="col-md-2">
            Group<br/>
            <?php echo form_dropdown('groupp', $groups, set_value('groupp', (isset($sgid) ? $sgid : ''), TRUE), array('class' => 'form-control', 'id' => 'groupp')); ?>
        </div>
        <div class="col-md-2">
            Year<br/>
            <!--id="year"-->
            <select name="year" class="form-control" required>
                <?php for ($y = date('Y'); $y > 2013; $y--) { ?>
                    <option <?php echo $year == $y ? 'selected="selected"' : ''; ?>
                            value="<?php echo $y; ?>"><?php echo $y; ?></option>
                <?php } ?>
            </select>
        </div>

        <div class="col-md-3">
            <br/>
            <input id="resultSearch" class="btn btn-success" value="Search Result" type="submit">
            <span></span>
            <input class="btn btn-default" value="Cancel" type="reset">
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-10">
            <?php
            __e((isset($msg) == '0' ? '' : $msg));
            ?>
            <div id="marksmodified"></div>
        </div>
    </div>
    <?php echo form_close(); ?>
    <?php echo form_end_divs(); ?>
</div>
<?php echo form_start_divs('Results', ''); ?>

<?php if (!empty($all_students_info)): ?>
    <form action="<?= base_url('send_result_all_sms') ?>" method="post">
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-12">
                    <button type="submit" title="Send SMS Result">
                        <i class="fa fa-commenting" style="font-size: 22px;"></i>
                    </button>
                    <a class="pull-right" href="javascript:void(0)" onclick="printdiv('result')" title="Print Result">
                        <i class="fa fa-print" style="font-size: 22px;"></i>
                    </a>
                </div>

                <div id="result" class="excel-view">
                    <?php
                    $religion_subs = array(309, 310, 311, 308);

                    $exam_sub = '';
                    foreach ($result_subject as $value) {
                        $exam_sub = $value->rs_exam_sub;
                    }
                    
                    //owndebugger($exam_sub);
                    
                    $exam_sub_arr = (explode(",", $exam_sub));

                    ?>
                    <table class="printtable" style="width: 100%;border: 0;">
                        <tr>
                            <td style="width: 15%; border: 0px">
                                <img src="<?php echo base_url('uploads/settings/' . $settings->InstituteLogo); ?>"
                                     width="75"/>
                            </td>
                            <td style="width: 85%; border: 0px;">
                                <div style="width: 82%; float: left; text-align: center; font-family: kalpurush; margin-top: 10px; color: black;">
                                    <h1 style="font-size: 30px; margin: 0px; padding: 0px;"><?php echo $settings->InstituteName; ?></h1>
                                    <span style="font-size: 15px;">EIIN: <?php echo $settings->InstituteEIIN; ?>, <?php echo $settings->InstituteAddress; ?></span>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 15%;  border: 0px;">
                                &nbsp;
                            </td>
                            <td style="width:85%;  border: 0px;">
                                <div style="width: 82%; float: left; text-align: center; font-family: kalpurush; margin-top: 10px; color: black;">
                                    <h3 style="font-size: 18px; margin: 0px; padding: 0px; text-transform: uppercase;">
                                        Result of
                                    </h3>
                                    <p>
                                        Class# <?= @tableSingleColumn('initial_settings_info', 'SettingsName', ['SettingsId' => @$cid]); ?>
                                        ,
                                        Section# <?= @tableSingleColumn('initial_settings_info', 'SettingsName', ['SettingsId' => @$sid]); ?>
                                        ,
                                        Group# <?= @tableSingleColumn('initial_settings_info', 'SettingsName', ['SettingsId' => @$sgid]); ?>
                                        ,
                                        Exam# <?= @tableSingleColumn('initial_settings_info', 'SettingsName', ['SettingsId' => @$eid]); ?>
                                        ,
                                        Year# <?= @$year; ?>


                                    </p>
                                </div>
                            </td>
                        </tr>
                    </table>


                    <table class="table table-striped"
                           style="font-size: 12px; border: 1px solid #DDD; border-collapse: collapse;">

                        <tr style="font-size: 12px; border: 1px solid #DDD">
                            <th style="font-size: 12px; border: 1px solid #DDD"></th>
                            <th style="font-size: 12px; border: 1px solid #DDD"></th>

                            <?php foreach ($exam_sub_arr as $e_sub): ?>
                                <?php //if (!in_array($e_sub, $religion_subs)): ?>

                                <th colspan="6" style="font-size: 12px; border: 1px solid #DDD">
                                    <?php echo @tableSingleColumn('initial_settings_info', 'SettingsName', ['SettingsId' => $e_sub]); ?>
                                </th>

                                <?php //endif; ?>
                            <?php endforeach; ?>

                            <th colspan="6" style="font-size: 12px; border: 1px solid #DDD">Total</th>

                        </tr>
                        <tr class="heading">
                            <td style="font-size: 12px; border: 1px solid #DDD">Roll</td>
                            <td style="font-size: 12px; border: 1px solid #DDD; width: 120px;">Name</td>
                            <?php foreach ($exam_sub_arr as $e_sub): ?>
                                <?php //if (!in_array($e_sub, $religion_subs)): ?>
                                <td title="Objective" style="font-size: 12px; border: 1px solid #DDD">O</td>
                                <td title="Written" style="font-size: 12px; border: 1px solid #DDD">W</td>
                                <td title="Practical" style="font-size: 12px; border: 1px solid #DDD">P</td>
                                <td title="Total" style="font-size: 12px; border: 1px solid #DDD">T</td>
                                <td title="Grade" style="font-size: 12px; border: 1px solid #DDD">G</td>
                                <td title="GPA" style="font-size: 12px; border: 1px solid #DDD">GPA</td>
                                <?php //endif; ?>
                            <?php endforeach; ?>

                            <td style="font-size: 12px; border: 1px solid #DDD">Total</td>
                            <td style="font-size: 12px; border: 1px solid #DDD">GPA</td>
                            <td style="font-size: 12px; border: 1px solid #DDD">Grade</td>
                        </tr>

                        <?php foreach ($all_students_info as $student): ?>
                        
                            <?php //owndebugger($student); ?>
                            
                            <tr class="heading">
                                <td style="font-size: 12px; border: 1px solid #DDD"><?= $student['class_roll']; ?></td>
                                <td style="font-size: 12px; border: 1px solid #DDD">
                                    <?php
                                    $student_id = $student['student_id'];
                                    
                                    $this->db->select('full_name_en, phone');
                                    $this->db->where('id', $student_id);
                                    $result = $this->db->get('users')->row();
                                    
                                    echo !empty($result->full_name_en) ? $result->full_name_en : null;
                                    ?>
                                </td>
                                <?php foreach ($exam_sub_arr as $e_sub) : ?>
                                    <?php if (array_key_exists(@$e_sub, $student['mandatory_subject'])): ?>
                                    
                                        <?php
                                            $sng_subject = @$student['mandatory_subject'][$e_sub];
                                            $subject_rull = json_decode($sng_subject['subject_rule'], true);
    
                                            $get_num = fah_excel_subject_info($sng_subject, @$student['mandatory_subject']);
                                            //owndebugger(@$student['mandatory_subject'][$e_sub]);
                                            $final_array[$student_id]['count'][] = @$get_num['c'];
                                            $final_array[$student_id]['total'][] = @$get_num['t'];
                                            $final_array[$student_id]['gpa'][] = @$get_num['g'];
                                            $final_array[$student_id]['grade'][] = @$get_num['a'];
                                            //owndebugger($get_num['a']);
                                        ?>
                                        <td style="font-size: 12px; border: 1px solid #DDD;" title="Objective"><?= @$get_num['o']; ?></td>
                                        <td style="font-size: 12px; border: 1px solid #DDD" title="Written"><?= @$get_num['w']; ?></td>
                                        <td style="font-size: 12px; border: 1px solid #DDD" title="Practical"><?= @$get_num['p']; ?></td>
                                        <td style="font-size: 12px; border: 1px solid #DDD" title="Total">
                                            <?= @$get_num['t']; ?>
                                        </td>
                                        <td style="font-size: 12px; border: 1px solid #DDD; <?= ((@$get_num['a'] == 'F') ? 'color:red' : '') ?>" title="Grade"><?= @$get_num['a']; ?></td>
                                        <td style="font-size: 12px; border: 1px solid #DDD;  <?= ((@$get_num['a'] == 'F') ? 'color:red' : '') ?>" title="GPA"><?= @$get_num['g']; ?></td>

                                    <?php  else: ?>
                                        <?php
                                            $final_array[$student_id]['count'][] = null;
                                            $final_array[$student_id]['total'][] = null;
                                            $final_array[$student_id]['gpa'][] = null;
                                            $final_array[$student_id]['grade'][] = null;
                                        ?>
                                        <td style="font-size: 12px; border: 1px solid #DDD;" title="Objective"></td>
                                        <td style="font-size: 12px; border: 1px solid #DDD" title="Written"></td>
                                        <td style="font-size: 12px; border: 1px solid #DDD" title="Practical"></td>
                                        <td style="font-size: 12px; border: 1px solid #DDD" title="Total"></td>
                                        <td style="font-size: 12px; border: 1px solid #DDD;" title="Grade"></td>
                                        <td style="font-size: 12px; border: 1px solid #DDD;" title="GPA"></td>
                                    <?php endif; ?>
                                    
                                <?php endforeach; ?>
                                    <?php
                                    //owndebugger(@$final_array[$student_id]);
                                    $get_fc = @array_sum(@$final_array[$student_id]['count']);
                                    $get_fg = @array_sum(@$final_array[$student_id]['gpa']);
                                    $get_ft = @array_sum(@$final_array[$student_id]['total']);
                                    $get_fa = @$final_array[$student_id]['grade'];
                                    
                                    //owndebugger($get_fa);
    
                                    if (@in_array('F', @$get_fa)) {
                                        $avgcgpa = sprintf("%.2f", @$get_fg / @$get_fc);
                                        $fgrade = 'F';
                                        $fcgpa = $avgcgpa;
                                    } else {
                                        $avgcgpa = sprintf("%.2f", @$get_fg / @$get_fc);
                                        $fgrade = makeGpaGrade($avgcgpa);
                                        $fcgpa = $avgcgpa;
                                    }
                                    ?>
                                <td style="font-size: 12px; border: 1px solid #DDD"><?= @$get_ft; ?></td>

                                <td style="font-size: 12px; border: 1px solid #DDD; <?=((@$fgrade == 'F')? 'color:red' : 'color:green')?>">
                                    <?= @$fgrade; ?>
                                </td>

                                <td style="font-size: 12px; border: 1px solid #DDD; <?=((@$fgrade == 'F')? 'color:red' : 'color:green')?>"><?= @$fcgpa; ?>
                           
                                    <?php
                                    
                                    $student_id = $student['student_id'];
                                            
                                    $this->db->select('full_name_en, phone');
                                    $this->db->where('id', $student_id);
                                    $result = $this->db->get('users')->row();
                                    
                                    $phone = !empty($result->phone) ? $result->phone : null;
                                    
                                    $sms = array(
                                        'gpa' => @$avgcgpa,
                                        'grade' => @makeGpaGrade($avgcgpa),
                                        'phone' => @$phone,
                                        'sid' => $student_id
                                    );
                                     $sms_json = json_encode(@$sms);
                                    ?>
                                    <input type="hidden" value='<?= $sms_json; ?>' name="sms_json[]">
                                </td>
                            </tr>
                        <?php endforeach; ?>
                      


                    </table>


                </div>
            </div>
        </div>
        
    </form>

    <?php //owndebugger($get_num); ?>
<?php else: ?>
    <?php set_message('warning', "Not Found") ?>
    <?php echo message_box('warning'); ?>
<?php endif; ?>
<?php echo form_end_divs(); ?>
<style>
    table {
        border-collapse: collapse;
        border-spacing: 0;
        width: 100%;
        border: 1px solid #ddd;
    }

    table th, td {
        border: 1px solid #ccc;
        text-align: center;
        padding: 8px;
    }

    .heading {
        font-size: 14px;
        font-weight: bold;
    }

    .excel-view {
        overflow-x: auto;
        width: 100%;
    }
</style>
