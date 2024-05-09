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

<?php if(!empty($all_students_info)):?>
<form action="<?=base_url('send-result-all-sms')?>" method="post">
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
            $exam_sub_arr = (explode(",", $exam_sub));

            ?>
                                <table class="printtable" style="width: 100%;border: 0;">
                                    <tr>
                                        <td style="width: 15%; border: 0px">
                                            <img src="<?php echo base_url('uploads/settings/'. $settings->InstituteLogo); ?>" width="75" />
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
                                                  Class# <?=@tableSingleColumn('initial_settings_info', 'SettingsName', ['SettingsId' => @$cid]); ?>,
                                                  Section# <?=@tableSingleColumn('initial_settings_info', 'SettingsName', ['SettingsId' => @$sid]); ?>,
                                                  Group# <?=@tableSingleColumn('initial_settings_info', 'SettingsName', ['SettingsId' => @$sgid]); ?>,
                                                  Exam# <?=@tableSingleColumn('initial_settings_info', 'SettingsName', ['SettingsId' => @$eid]); ?>,
                                                  Year# <?= @$year; ?>


                                                </p>
                                            </div>
                                        </td>
                                    </tr>
                                </table>


            <table class="table table-striped"  style="font-size: 12px; border: 1px solid #DDD; border-collapse: collapse;">

                <tr style="font-size: 12px; border: 1px solid #DDD">
                    <th style="font-size: 12px; border: 1px solid #DDD"></th>
                    <th style="font-size: 12px; border: 1px solid #DDD"></th>

                    <?php  foreach ($exam_sub_arr as $e_sub):  ?>
                        <?php //if (!in_array($e_sub, $religion_subs)): ?>

                            <th colspan="6" style="font-size: 12px; border: 1px solid #DDD">
                                <?php echo @tableSingleColumn('initial_settings_info', 'SettingsName', ['SettingsId' => $e_sub]);?>

                            </th>

                         <?php //endif; ?>
                    <?php endforeach; ?>

                    <th colspan="6" style="font-size: 12px; border: 1px solid #DDD">Total</th>
                    
                </tr>
                <tr class="heading">
                    <td style="font-size: 12px; border: 1px solid #DDD">Roll</td>
                    <td style="font-size: 12px; border: 1px solid #DDD">Name</td>
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
                    <!--<td style="font-size: 12px; border: 1px solid #DDD" title="Objective">O</td>
                    <td style="font-size: 12px; border: 1px solid #DDD" title="Written">W</td>
                    <td style="font-size: 12px; border: 1px solid #DDD" title="Practical">P</td>
                    <td style="font-size: 12px; border: 1px solid #DDD" title="Total">T</td>
                    <td style="font-size: 12px; border: 1px solid #DDD" title="Grade">G</td>
                    <td style="font-size: 12px; border: 1px solid #DDD" title="GPA">GPA</td>-->
                    <td style="font-size: 12px; border: 1px solid #DDD">Total</td>
                    <td style="font-size: 12px; border: 1px solid #DDD">GPA</td>
                    <td style="font-size: 12px; border: 1px solid #DDD">Grade</td>
                </tr>

                <?php foreach ($all_students_info as $student): ?>
                    <tr class="heading">

                        <td style="font-size: 12px; border: 1px solid #DDD"><?= $student['class_roll']; ?></td>
                        <td style="font-size: 12px; border: 1px solid #DDD">
                            <?php
                            $student_id = $student['student_id'];
                            echo $student_id;
                            ?>
                        </td>

                        <?php
                        //$religion_marks = array();
                        ?>

                        <?php foreach ($exam_sub_arr as $e_sub) : ?>
                            <?php
                            $sng_subject = @$student['mandatory_subject'][$e_sub];
                            $subject_rull = json_decode($sng_subject['subject_rule'], true);


                            $mcq = '';
                            $cq = '';
                            $practical = '';

                            $total = '';
                            $grade = '';
                            $gpa = '';
                            $pp = '';
                            ?>
                            <?php  if (array_key_exists(@$e_sub, $student['mandatory_subject'])): ?>

                            <?php

                                $cq_p = $subject_rull['descriptive_pass_mark'];
                                $mcq_p = $subject_rull['mcq_pass_mark'];
                                $pra_p = $subject_rull['practical_pass_mark'];
                                $cq_f = $subject_rull['cq'];
                                $mcq_f = $subject_rull['mcq'];
                                $pra_f = $subject_rull['practical'];
                                $rule_total = $cq_f + $mcq_f + $pra_f;
                                $count = '';
                                $op_subject = $sng_subject['op_subject'];

                                if ($sng_subject['is_absent'] != 0) {

                                    $mcq = 'AB';
                                    $cq = 'AB';
                                    $practical = 'AB';
                                    $total = '';
                                    $gpa = 0;
                                    $grade = 'F';

                                } else {


                                    if ($subject_rull['mergeable'] != 1) {

                                        $cq_v = (($cq_f != 0) ? $sng_subject['written'] : 0);
                                        $mcq_v = (($mcq_f != 0) ? $sng_subject['mcq'] : 0);
                                        $pra_v = (($pra_f != 0) ? $sng_subject['practical'] : 0);
                                        $total_v = $cq_v + $mcq_v + $pra_v;
                                        $mcq = @globalSubjectFailCheck2($mcq_v, $e_sub, $sng_subject['subject_rule'], $sng_subject['op_subject'], 'MCQ');
                                        $cq = @globalSubjectFailCheck2($cq_v, $e_sub, $sng_subject['subject_rule'], $sng_subject['op_subject'], 'CQ');
                                        $practical = @globalSubjectFailCheck2($pra_v, $e_sub, $sng_subject['subject_rule'], $sng_subject['op_subject'], 'PRACTICAL');


                                        if (($cq_v < $cq_p) || ($mcq_v < $mcq_p) || ($pra_v < $pra_p)) {

                                            $gpa_v = 0;
                                            if (@$e_sub != @$op_subject) {
                                                $total = "<span style='color:red'>" . $total_v . "</span>";
                                                $grade_v = 'F';
                                                $gpa = "<span style='color:red'>0</span>";
                                                $grade = "<span style='color:red'>F</span>";
                                                $final_gread[$student_id][] = $grade_v;
                                                $final_count[$student_id][] = 1;
                                            } else {
                                                $total = $total_v;
                                                $grade_v = '';
                                                $gpa = 0;
                                                $grade = "F";
                                                $final_gread[$student_id][] = $grade_v;
                                                $final_count[$student_id][] = '';

                                            }
                                            // $final_count[$student_id][] = 1;
                                        } else {

                                            $total = $total_v;
                                            $grade = GradeGenerate($rule_total, $total_v);
                                            $gpa = GpaGenerate($rule_total, $total_v);

                                            $grade_v = $grade;
                                            if (@$e_sub != @$op_subject) {
                                                $gpa_v = $gpa;
                                                $final_count[$student_id][] = 1;

                                            } else {
                                                if ($gpa < 2) {
                                                    $gpa_v = 0;
                                                } else {

                                                    $gpa_v = $gpa - 2;
                                                }
                                                $final_count[$student_id][] = '';
                                            }


                                        }

                                        $final_gread[$student_id][] = $grade_v;
                                        $final_gpag[$student_id][] = $gpa_v;






                                    } else {

                                        if (($subject_rull['mergeable_id'] != '') || ($subject_rull['mergeable_id'] != null)) {

                                            $mergeable_id = $subject_rull['mergeable_id'];
                                            $cq_v = (($cq_f != 0) ? $sng_subject['written'] : 0);
                                            $mcq_v = (($mcq_f != 0) ? $sng_subject['mcq'] : 0);
                                            $pra_v = (($pra_f != 0) ? $sng_subject['practical'] : 0);
                                            $total_v = $cq_v + $mcq_v + $pra_v;

                                            $mcq = @globalSubjectFailCheck2($mcq_v, $e_sub, $sng_subject['subject_rule'], $sng_subject['op_subject'], 'MCQ');
                                            $cq = @globalSubjectFailCheck2($cq_v, $e_sub, $sng_subject['subject_rule'], $sng_subject['op_subject'], 'CQ');
                                            $practical = @globalSubjectFailCheck2($pra_v, $e_sub, $sng_subject['subject_rule'], $sng_subject['op_subject'], 'PRACTICAL');


                                            $ex_magre = @json_decode($marg_arr[$student_id][$mergeable_id], true);

                                           // owndebugger($ex_magre);
                                            $mg_total = $ex_magre['total'];

                                            $totals = $mg_total + $total_v;
                                            $rule_totals = $rule_total + $ex_magre['full'];

                                            if ($ex_magre['is_pass'] == 'F') {
                                                $grade = 'F';
                                                $total = "<span style='color:red'>" . $totals . "</span>";
                                                $grade_v = 'F';
                                                $gpa_v = 0;
                                                $gpa = "<span style='color:red'>0</span>";
                                                $grade = "<span style='color:red'>F</span>";


                                            } else {
                                                if (($cq_v < $cq_p) || ($mcq_v < $mcq_p) || ($pra_v < $pra_p)) {

                                                    if (@$e_sub != @$op_subject) {
                                                        $total = "<span style='color:red'>" . $totals . "</span>";
                                                        $grade_v = 'F';
                                                        $gpa_v = 0;
                                                        $gpa = "<span style='color:red'>0</span>";
                                                        $grade = "<span style='color:red'>F</span>";

                                                        $final_gread[$student_id][] = $grade_v;
                                                        $final_count[$student_id][] = 1;


                                                    } else {
                                                        $total = $total_v;
                                                        $grade_v = '';
                                                        $gpa_v = 0;
                                                        $gpa = 0;
                                                        $grade = "F";
                                                        $final_gread[$student_id][] = $grade_v;
                                                        $final_count[$student_id][] = '';

                                                    }


                                                } else {
                                                    $total = $totals;
                                                    $grade = GradeGenerate($rule_totals, $totals);
                                                    $gpa = GpaGenerate($rule_totals, $totals);

                                                    $gpa_v = $gpa;

                                                    if (@$e_sub != @$op_subject) {
                                                        $grade_v = $grade;
                                                        $final_count[$student_id][] = 1;
                                                    } else {
                                                        if ($grade < 2) {
                                                            $grade_v = 0;
                                                        } else {

                                                            $grade_v = 0;
                                                        }
                                                        $final_count[$student_id][] = '';
                                                    }


                                                }


                                            }
                                             $final_gread[$student_id][] = $grade_v;
                                             $final_gpag[$student_id][] = $gpa_v;

                                        } else {

                                            $cq_v = (($cq_f != 0) ? $sng_subject['written'] : 0);
                                            $mcq_v = (($mcq_f != 0) ? $sng_subject['mcq'] : 0);
                                            $pra_v = (($pra_f != 0) ? $sng_subject['practical'] : 0);
                                            $total_v = $cq_v + $mcq_v + $pra_v;

                                            $mcq = @globalSubjectFailCheck2($mcq_v, $e_sub, $sng_subject['subject_rule'], $sng_subject['op_subject'], 'MCQ');
                                            $cq = @globalSubjectFailCheck2($cq_v, $e_sub, $sng_subject['subject_rule'], $sng_subject['op_subject'], 'CQ');
                                            $practical = @globalSubjectFailCheck2($pra_v, $e_sub, $sng_subject['subject_rule'], $sng_subject['op_subject'], 'PRACTICAL');

                                            if (($cq_v < $cq_p) || ($mcq_v < $mcq_p) || ($pra_v < $pra_p)) {
                                                $total = '';
                                                $grade_v = 'F';
                                                $gpa_v = 0;
                                                $gpa = '';
                                                $grade = '';
                                                $marg_pass = array(
                                                    'is_pass' => 'F',
                                                    'total' => $total_v,
                                                    'full' => $rule_total
                                                );
                                            } else {
                                                $total = '';
                                                $grade = '';
                                                $gpa = '';
                                                $marg_pass = array(
                                                    'is_pass' => 'Y',
                                                    'total' => $total_v,
                                                    'full' => $rule_total
                                                );

                                            }
                                            $marg_arr[$student_id][@$e_sub] = json_encode($marg_pass);
                                            $final_count[$student_id][] = '';

                                        }



                                    }

                                }

                                // if (!in_array($e_sub, $religion_subs)){
                                       // $religion_marks[$student_id]['O'] = $mcq;
                                       // $religion_marks[$student_id]['W'] = $cq;
                                       // $religion_marks[$student_id]['P'] = $practical;
                                       // $religion_marks[$student_id]['T'] = $total;
                                       // $religion_marks[$student_id]['GR'] = $grade;
                                        //$religion_marks[$student_id]['G'] = $gpa;


                                   /// }
                                    $final_total_mark[$student_id][] = $total;


                                ?>

                               <?php endif; ?>









                            <?php //if (!in_array($e_sub, $religion_subs)): ?>
                                <td style="font-size: 12px; border: 1px solid #DDD" title="Objective"><?php echo $mcq; ?></td>
                                <td style="font-size: 12px; border: 1px solid #DDD" title="Written"><?php echo $cq; ?></td>
                                <td style="font-size: 12px; border: 1px solid #DDD" title="Practical"><?php echo $practical; ?></td>
                                <td style="font-size: 12px; border: 1px solid #DDD" title="Total">
                                    <?php

                                    echo $total;
                                    ?>
                                </td>
                                <td style="font-size: 12px; border: 1px solid #DDD" title="Grade"><?php echo $grade; ?></td>
                                <td style="font-size: 12px; border: 1px solid #DDD" title="GPA"><?php echo $gpa; ?></td>
                            <?php // endif; ?>




                        <?php endforeach;  ?>





                        <?php
                        $total_count = @array_sum(@$final_count[$student_id]);
                        $total_grade = @$final_gread[$student_id];
                        $total_gpa = @array_sum(@$final_gpag[$student_id]);

                        if (@$total_count > 0) {
                            $total_mark = @array_sum($final_total_mark[$student_id]);
                            if (@in_array('F', @$total_grade)) {
                                $avgcgpa = sprintf("%.2f", @$total_gpa / @$total_count);
                                $fgrade = 'F';
                                $fcgpa = "<span style='color:red'>" . $avgcgpa . "</span>";
                            } else {
                                $avgcgpa = sprintf("%.2f", @$total_gpa / @$total_count);

                                $fgrade = $fgrade = makeGpaGrade($avgcgpa);
                                $fcgpa = "<span style='color:green'>" . $avgcgpa . "</span>";

                            }
                        } else {
                            $total_mark = '';
                            $fgrade = '';
                            $fcgpa = '';
                        }


                        ?>

                        <td style="font-size: 12px; border: 1px solid #DDD"><?= @$total_mark; ?></td>

                        <td style="font-size: 12px; border: 1px solid #DDD"> <?= @$fcgpa; ?></td>

                        <td style="font-size: 12px; border: 1px solid #DDD"> <?= @$fgrade; ?></td>
                    </tr>
                  <?php
                  $sms[$student_id] = array(
                                        'gpa' => @$avgcgpa,
                                        'grade' => @makeGpaGrade($avgcgpa)
                                      );
                  ?>
                <?php endforeach; ?>
              <?php
              $sms_json = json_encode(@$sms);
            //  echo $sms_json;
               ?>


            </table>




        </div>
    </div>
</div>
<input type="hidden" value='<?=$sms_json;?>' name="sms_json">


</form>
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
