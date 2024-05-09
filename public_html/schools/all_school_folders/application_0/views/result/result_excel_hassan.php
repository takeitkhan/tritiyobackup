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
                    <option <?php  echo $year == $y ? 'selected="selected"' : ''; ?> value="<?php echo $y; ?>"><?php echo $y; ?></option>
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
<div class="row">
    <div class="col-md-12">
        <div class="excel-view">
            <?php 
            $exam_sub = '';
            foreach ($result_subject as $value) {
                $exam_sub = $value->rs_exam_sub;
            }
            $exam_sub_arr = (explode(",",$exam_sub));

            ?>


            <table class="table table-striped">

                <tr>
                    <th></th>
                    <th></th>
                   <?php  foreach ($exam_sub_arr as $e_sub): 
                        
                    ?>

                         <th colspan="6"><?php if($e_sub == 308){ echo 'Religion';}else{ echo @tableSingleColumn('initial_settings_info', 'SettingsName', ['SettingsId' => $e_sub]);}?></th>
               
                    <?php  endforeach; ?>
                    

                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
                 <tr class="heading">
                    <td>Roll</td>
                    <td>Name</td>
                   <?php  foreach ($exam_sub_arr as $e_sub): 

                    ?>
                    <td title="Objective">O</td>
                    <td title="Written">W</td>
                    <td title="Practical">P</td>
                    <td title="Total">T</td>
                    <td title="Grade">G</td>
                    <td title="GPA">GPA</td>
               
                    <?php  endforeach; ?>
                    <td>(+2)</td>
                    <td>Total</td>
                    <td>GPA</td>
                    <td>Grade</td>
                </tr>
                
                <?php  foreach ($all_students_info as $student): ?>
                <tr class="heading">

                    <td><?= $student['class_roll']; ?></td>
                    <td><?php $student_id =  $student['student_id']; echo $student_id; ?></td>
                    
                   <?php   foreach ($exam_sub_arr as $e_sub): 
                        $sng_subject =  @$student['mandatory_subject'][$e_sub];
                        $subject_rull = json_decode($sng_subject['subject_rule'], true);

                    $mcq = '';
                    $cq = '';
                    $practical = '';
  
                    $total = ''; 
                    $grade = '';
                    $gpa = '';
                     $pp = '';

                         if (array_key_exists(@$e_sub, $student['mandatory_subject'])) {
                            $cq_p = $subject_rull['descriptive_pass_mark'];
                            $mcq_p = $subject_rull['mcq_pass_mark'];
                            $pra_p = $subject_rull['practical_pass_mark'];
                            $cq_f = $subject_rull['cq'];
                            $mcq_f = $subject_rull['mcq'];
                            $pra_f = $subject_rull['practical'];
                            $rule_total = $cq_f+$mcq_f+$pra_f;
                            $count = '';
                            $op_subject = $sng_subject['op_subject'];

                        if($sng_subject['is_absent'] != 0){
                            $mcq = 'AB';
                            $cq = 'AB';
                            $practical = 'AB';
                            $total = '';
                            $gpa = 0;
                            $grade = 'F';

                        }else{ 
                            if($subject_rull['mergeable'] !=1)  {
                                $cq_v = (($cq_f != 0)? $sng_subject['written'] : 0);
                                $mcq_v = (($mcq_f != 0)? $sng_subject['mcq'] : 0);
                                $pra_v = (($pra_f != 0)? $sng_subject['practical'] : 0);
                                $total_v = $cq_v +$mcq_v+$pra_v;
                                $mcq = @globalSubjectFailCheck2($mcq_v, $e_sub, $sng_subject['subject_rule'], $sng_subject['op_subject'], 'MCQ');
                                $cq = @globalSubjectFailCheck2($cq_v, $e_sub, $sng_subject['subject_rule'], $sng_subject['op_subject'], 'CQ');
                                $practical = @globalSubjectFailCheck2($pra_v, $e_sub, $sng_subject['subject_rule'], $sng_subject['op_subject'], 'PRACTICAL');

                                                                
                                
                                         if (($cq_v < $cq_p) || ($mcq_v < $mcq_p) || ($pra_v < $pra_p)) {
                                            
                                            $gpa_v = 0;
                                            if(@$e_sub != @$op_subject){   
                                                $total = "<span style='color:red'>".$total_v."</span>";
                                                 $grade_v = 'F';                                                 
                                                 $gpa = "<span style='color:red'>0</span>";
                                                 $grade = "<span style='color:red'>F</span>";
                                                 $final_gread[$student_id][] = $grade_v;
                                                 $final_count[$student_id][] = 1;
                                               }else{
                                                $total = $total_v;
                                                $grade_v = '';
                                                 $gpa = 0;
                                                 $grade = "F";
                                                 $final_gread[$student_id][] = $grade_v;
                                                 $final_count[$student_id][] = '';

                                              }
                                            // $final_count[$student_id][] = 1;
                                         }else{

                                            $total = $total_v;
                                            $grade = GradeGenerate($rule_total, $total_v);
                                            $gpa =  GpaGenerate($rule_total, $total_v);
                                            
                                             $grade_v = $grade;
                                                if(@$e_sub != @$op_subject){                                                
                                                   $gpa_v = $gpa;
                                                   $final_count[$student_id][] = 1;

                                                }else{
                                                    if($gpa < 2 ){
                                                       $gpa_v = 0;
                                                    }else{
                                                        
                                                         $gpa_v = $gpa - 2;
                                                    }
                                                    $final_count[$student_id][] = '';
                                                }
                                                
                                            
                                         }
                                        
                                         $final_gread[$student_id][] = $grade_v;
                                         $final_gpag[$student_id][] = $gpa_v; 
                                         
                               
                                 
                            }else{
                                if(($subject_rull['mergeable_id'] !='') || ($subject_rull['mergeable_id'] != null)){
                                    $mergeable_id = $subject_rull['mergeable_id'];
                                    $cq_v = (($cq_f != 0)? $sng_subject['written'] : 0);
                                    $mcq_v = (($mcq_f != 0)? $sng_subject['mcq'] : 0);
                                    $pra_v = (($pra_f != 0)? $sng_subject['practical'] : 0);
                                    $total_v = $cq_v +$mcq_v+$pra_v;

                                    $mcq = @globalSubjectFailCheck2($mcq_v, $e_sub, $sng_subject['subject_rule'], $sng_subject['op_subject'], 'MCQ');
                                    $cq = @globalSubjectFailCheck2($cq_v, $e_sub, $sng_subject['subject_rule'], $sng_subject['op_subject'], 'CQ');
                                    $practical = @globalSubjectFailCheck2($pra_v, $e_sub, $sng_subject['subject_rule'], $sng_subject['op_subject'], 'PRACTICAL');

                                    
                                    $ex_magre = @json_decode($marg_arr[$student_id][$mergeable_id], true);
                                    $mg_total = $ex_magre['total'];

                                    $totals = $mg_total+$total_v;
                                    $rule_totals = $rule_total +$ex_magre['full'];
                                    
                                        if($ex_magre['is_pass'] == 'F'){                                    
                                            $grade = 'F';
                                            $total = "<span style='color:red'>".$totals."</span>";
                                            $grade_v = 'F';
                                            $gpa_v = 0;
                                            $gpa = "<span style='color:red'>0</span>";
                                            $grade = "<span style='color:red'>F</span>";


                                        }else{
                                           if (($cq_v < $cq_p) || ($mcq_v < $mcq_p) || ($pra_v < $pra_p)) {

                                             if(@$e_sub != @$op_subject){   
                                                $total = "<span style='color:red'>".$totals."</span>";
                                                $grade_v = 'F';
                                                $gpa_v = 0;
                                                $gpa = "<span style='color:red'>0</span>";
                                                $grade = "<span style='color:red'>F</span>";

                                                $final_gread[$student_id][] = $grade_v;
                                                $final_count[$student_id][] = 1;


                                               }else{
                                                $total = $total_v;
                                                $grade_v = '';
                                                 $gpa_v = 0;
                                                 $gpa = 0;
                                                 $grade = "F";
                                                 $final_gread[$student_id][] = $grade_v;
                                                 $final_count[$student_id][] = '';

                                              }


                                               
                                           }else{
                                            $total = $totals;
                                            $grade = GradeGenerate($rule_totals, $totals);
                                            $gpa =  GpaGenerate($rule_totals, $totals);

                                            $gpa_v = $gpa;

                                              if(@$e_sub != @$op_subject){ 
                                                    $grade_v = $grade;
                                                    $final_count[$student_id][] = 1;
                                                }else{
                                                    if($grade < 2 ){
                                                        $grade_v = 0;
                                                    }else{
                                                        
                                                        $grade_v = 0;
                                                    }
                                                    $final_count[$student_id][] = '';
                                                }
                                                $final_gread[$student_id][] = $grade_v;
                                                $final_gpag[$student_id][] = $gpa_v; 

                                           }
                                           
                                        }
                                }else{
                                    
                                    $cq_v = (($cq_f != 0)? $sng_subject['written'] : 0);
                                    $mcq_v = (($mcq_f != 0)? $sng_subject['mcq'] : 0);
                                    $pra_v = (($pra_f != 0)? $sng_subject['practical'] : 0);
                                    $total_v = $cq_v +$mcq_v+$pra_v;

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
                                            'total' =>  $total_v,
                                            'full' =>  $rule_total
                                            );
                                    }else{
                                        $total = '';
                                        $grade = '';
                                        $gpa =  '';
                                         $marg_pass = array(
                                            'is_pass' => 'Y', 
                                            'total' =>  $total_v,
                                            'full' =>  $rule_total
                                            );

                                    }
                                     $marg_arr[$student_id][@$e_sub] = json_encode($marg_pass);
                                     $final_count[$student_id][] = '';
                                   
                                }
                            }                
                            
                           
                        }
                    }
                    $general_sci_id = array(309, 310, 311,308);

                        if (!in_array($e_sub, $general_sci_id)) {
          
                            
                    ?>


                     <td title="Objective"><?php echo $mcq;?></td>
                     <td title="Written"><?php echo $cq;?></td>
                     <td title="Practical"><?php echo $practical;?></td>
  
                    <td title="Total"><?php $final_total_mark[$student_id][] = $total; echo  $total;  ?></td>
                    <td title="Grade"><?php echo  $grade; ?></td>
                    <td title="GPA"><?php echo  $gpa; ?></td>
               
                    <?php } else{

                        $religion[$student_id]['O'] = $mcq;
                        $religion[$student_id]['W'] =  $cq;
                        $religion[$student_id]['P'] =  $practical;
                        $religion[$student_id]['T'] =  $total;
                        $religion[$student_id]['GR'] =  $grade;
                        $religion[$student_id]['G'] =  $gpa;

                    } 
                    ?>
                <?php
                    endforeach;  
                owndebugger($religion); 
                ?>



                    <td title="Objective"><?php echo $religion[$student_id]['O'];?></td>
                    <td title="Written"><?php echo $religion[$student_id]['W'];?></td>
                    <td title="Practical"><?php echo $religion[$student_id]['P'];?></td>
  
                    <td title="Total"><?php echo  $religion[$student_id]['T'];  ?></td>
                    <td title="Grade"><?php echo  $religion[$student_id]['GR']; ?></td>
                    <td title="GPA"><?php echo  $religion[$student_id]['G']; ?></td>

                    <?php 
                    $total_count = @array_sum(@$final_count[$student_id]);
                    $total_grade = @$final_gread[$student_id];
                    $total_gpa = @array_sum(@$final_gpag[$student_id]);
                   
                    if(@$total_count > 0){
                       $total_mark =  @array_sum($final_total_mark[$student_id]);
                        if (@in_array('F', @$total_grade)) {
                             $avgcgpa = sprintf("%.2f",@$total_gpa/@$total_count);
                            $fgrade = 'F';
                             $fcgpa = "<span style='color:red'>".$avgcgpa."</span>";                                         
                        }else{                     
                    $avgcgpa = sprintf("%.2f", @$total_gpa/@$total_count);
                           
                            $fgrade = $fgrade = makeGpaGrade($avgcgpa);
                            $fcgpa =  "<span style='color:green'>".$avgcgpa."</span>";

                         }
                     }else{
                        $total_mark =  '';
                         $fgrade = '';
                         $fcgpa =  '';
                     }



                        ?>
                    <td></td>
                    <td><?=@$total_mark;?></td>
                    
                    <td> <?= @$fcgpa;?></td>
                   
                    <td> <?= @$fgrade;?></td>
                </tr>
                 <?php 

                    endforeach;// owndebugger($religion);?>




             
            </table>


        </div>
    </div>
</div
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
