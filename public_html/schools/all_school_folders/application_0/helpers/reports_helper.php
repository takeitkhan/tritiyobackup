<?php
/**
 * @property Common_model $common_model Common Model
 * @property Settings_model $settings_model Settings Model
 */
$CI = get_instance();

// You may need to load the models if it hasn't been pre-loaded
$CI->load->model('common_model');
$CI->load->model('settings_model');
function userdetails($biodata)
{
    //owndebugger($biodata);
    ?>
    <tr>
        <!-- Student Information -->
        <td width="100%" colspan="2"
            style="border: 1px solid #DDD; border-collapse: collapse; padding: 5px; font-weight: bold;">
            Details
        </td>
        <!-- Student Information -->
    </tr>
    <tr>
        <td style="border: 1px solid #DDD; width: 25%; border-collapse: collapse; padding: 5px; font-weight: bold;">
            Name
        </td>
        <td style="border: 1px solid #DDD; border-collapse: collapse; padding: 5px;"><?php __e((isset($biodata['englishname']) ? $biodata['englishname'] : '')); ?></td>
    </tr>
    <tr>
        <td width="130" style="border: 1px solid #DDD; border-collapse: collapse; padding: 5px; font-weight: bold;">
            Student ID
        </td>
        <td style="border: 1px solid #DDD; border-collapse: collapse; padding: 5px;"><?php __e((isset($biodata['user_id']) ? $biodata['user_id'] : '')); ?></td>
    </tr>
    <tr>
        <td width="130" style="border: 1px solid #DDD; border-collapse: collapse; padding: 5px; font-weight: bold;">
            Phone Number
        </td>
        <td style="border: 1px solid #DDD; border-collapse: collapse; padding: 5px; font-weight: normal;"><?php __e((isset($biodata['phone']) ? $biodata['phone'] : '')); ?></td>
    </tr>
    <tr>
        <td width="130" style="border: 1px solid #DDD; border-collapse: collapse; padding: 5px; font-weight: bold;">
            Father's Number
        </td>
        <td style="border: 1px solid #DDD; border-collapse: collapse; padding: 5px;"><?php __e((isset($biodata['phone']) ? $biodata['phone'] : '')); ?></td>
    </tr>
    <?php
    if (!empty($biodata['enstdinfo'])) {
        $bnstdinfo = $biodata['enstdinfo'];
        //owndebugger($bnstdinfo);
        $return = explode('|', $bnstdinfo);
        ?>

        <!--<tr>
            <td width="130"
                style="border: 1px solid #DDD; border-collapse: collapse; padding: 5px; font-weight: bold;">Class
            </td>
            <td style="border: 1px solid #DDD; border-collapse: collapse; padding: 5px; font-weight: normal;"><?php __e((isset($return[0]) ? ' ' . $return[0] : '')); ?></td>
        </tr>
        <tr>
            <td width="130"
                style="border: 1px solid #DDD; border-collapse: collapse; padding: 5px; font-weight: bold;">Class
                Roll
            </td>
            <td style="border: 1px solid #DDD; border-collapse: collapse; padding: 5px;"><?php __e((isset($return[1]) ? ' ' . $return[1] : '')); ?></td>
        </tr>
        <tr>
            <td width="130"
                style="border: 1px solid #DDD; border-collapse: collapse; padding: 5px; font-weight: bold;">Section
            </td>

            <td style="border: 1px solid #DDD; border-collapse: collapse; padding: 5px; font-weight: normal;"><?php __e((isset($return[2]) ? ' ' . $return[2] : '')); ?></td>
        </tr>-->
        <tr>
            <td width="130"
                style="border: 1px solid #DDD; border-collapse: collapse; padding: 5px; font-weight: bold;">
                Department
            </td>
            <td style="border: 1px solid #DDD; border-collapse: collapse; padding: 5px;"><?php __e((isset($return[4]) ? ' ' . $return[4] : 'Not Applicable')); ?></td>
        </tr>
        <tr>
            <td width="130"
                style="border: 1px solid #DDD; border-collapse: collapse; padding: 5px; font-weight: bold;">Group
            </td>
            <td style="border: 1px solid #DDD; border-collapse: collapse; padding: 5px; font-weight: normal;"><?php __e((isset($return[3]) ? ' ' . $return[3] : 'Not Applicable')); ?></td>
        </tr>
        <tr>
            <td width="130"
                style="border: 1px solid #DDD; border-collapse: collapse; padding: 5px; font-weight: bold;">Blood
                Group
            </td>
            <td style="border: 1px solid #DDD; border-collapse: collapse; padding: 5px;"><?php __e((isset($biodata['bloodgroup']) ? ' ' . $biodata['bloodgroupen'] : '')); ?></td>
        </tr>
    <?php } ?>
<?php }

function userdetails_by_group($ugid, $return, $be = NULL)
{
    switch ($ugid) {
        case 1:
            $row = '';
            break;
        case 2:
            $row = '';
            break;
        case 3:
            //owndebugger($return);
            $row = '<tr>';
            $row .= '<td colspan="3">';
            $row .= '<table style="width: 900px;table-layout:fixed;">';
            $row .= '<tr>';
            $row .= '<td width="180">Designation</td>';
            $row .= '<td width="10">:</td>';
            $row .= '<td colspan="4">';
            $row .= (isset($return[6]) ? ' ' . $return[6] : '');
            $row .= '</td>';
            $row .= '</tr>';
            $row .= '</table>';
            $row .= '</td>';
            $row .= '</tr>';
            $row .= '<tr><td colspan="3"><table style="width: 900px; table-layout:fixed;"><tr>';
            $row .= '<td width="180">';
            $row .= 'Salary';
            $row .= '<td width="10">:</td>';
            $row .= '<td width="260">';
            $row .= (isset($return[0]) ? ' ' . $return[0] : '');
            $row .= '</td>';
            $row .= '<td width="180">';
            $row .= 'Join';
            $row .= '</td><td width="10">:</td>';
            $row .= '<td width="260">';
            $row .= (isset($return[1]) ? $return[1] : '');
            $row .= '</td></tr>';
            $row .= '<tr>';
            $row .= '<td width="180">';
            $row .= 'Index Number';
            $row .= '<td width="10">:</td>';
            $row .= '<td width="260">';
            $row .= (isset($return[2]) ? ' ' . $return[2] : '');
            $row .= '</td>';
            $row .= '<td width="180">';
            $row .= 'Bank Account Number';
            $row .= '<td width="10">:</td>';
            $row .= '<td width="260">';
            $row .= (isset($return[3]) ? ' ' . $return[3] : '');
            $row .= '</td>';
            $row .= '</tr>';
            $row .= '<tr>';
            $row .= '<td width="180">';
            $row .= 'Bank Name';
            $row .= '<td width="10">:</td>';
            $row .= '<td width="260">';
            $row .= (isset($return[4]) ? ' ' . $return[4] : '');
            $row .= '</td>';
            $row .= '<td width="180">';
            $row .= 'Bank Branch Name';
            $row .= '<td width="10">:</td>';
            $row .= '<td width="260">';
            $row .= (isset($return[5]) ? ' ' . $return[5] : '');
            $row .= '</td>';
            $row .= '</tr>';
            $row .= '</table></td></tr>';
            break;
        case 4:
            $row = '<tr><td colspan="3"><table style="width: 900px; table-layout:fixed;"><tr>';
            $row .= '<td width="180">';
            $row .= ($be == 'b') ? 'শ্রেণী' : 'Class';
            $row .= '<td width="10">:</td>';
            $row .= '<td width="260">';
            $row .= (isset($return[0]) ? ' ' . $return[0] : '');
            $row .= '</td>';
            $row .= '<td width="180">';
            $row .= ($be == 'b') ? 'ক্লাস রোল' : 'Class Roll';
            $row .= '</td><td width="10">:</td>';
            $row .= '<td width="260">';
            $row .= ($be == 'b') ? bn2enNumber($return[1]) : $return[1];
            $row .= '</td></tr></table></td></tr>';

            $row .= '<tr><td colspan="3"><table style="width: 900px; table-layout:fixed;"><tr>';
            $row .= '<td width="180">';
            $row .= ($be == 'b') ? 'সেকশন' : 'Section';
            $row .= '<td width="10">:</td>';
            $row .= '<td width="260">';
            $row .= (isset($return[2]) ? ' ' . $return[2] : '');
            $row .= '</td>';
            $row .= '<td width="180">';
            $row .= ($be == 'b') ? 'বিভাগ' : 'Department';
            $row .= '</td><td width="10">:</td>';
            $row .= '<td width="260">';
            $row .= ($be == 'b') ? bn2enNumber((!empty($return[4]) ? $return[4] : '')) : '';
            $row .= '</td></tr></table></td></tr>';
            break;
        case 5:
            $row = '';
            break;
        case 6:
            $row = '';
            break;
        case 7:
            $row = '';
            break;
        case 8:
            $row = '';
            break;
        case 9:
            $row = '';
            break;
        case 10:
            $row = '';
            break;
        case 11:
            $row = '';
            break;
        case 12:
            $row = '';
            break;
        case 13:
            $row = '';
            break;
    }
    return $row;

}
function allyearly_results($uid = '', $class = '', $section = '', $year = ''){
     $html = '';
     $exams = get_instance()->db->distinct()->order_by('Exams', 'ASC')->select('Exams')->get_where('results', ['StudentId' => $uid, 'AddedYear' => $year])->result();
     if($exams) {
         foreach($exams as $exam){
             $html .= "<table style='width: 100%;'>
                        <tr>
                            <td colspan='8' style='border: 1px solid #DDD; border-collapse: collapse; padding: 5px; font-weight: bold;'><h4>
                            ". tableSingleColumn('initial_settings_info', 'SettingsName', ['SettingsId' => $exam->Exams]) ."
                            </h4></td>
                        </tr>
                        ". get_single_semster_result($uid, $class, $section, $exam->Exams, $year) ."
                        </table>";
         }
     }
     return $html;
}

function get_single_semster_result($uid = '', $class = '', $section = '', $exam = '', $year = '') {
    $count = 1; $gradesum = 0;
    $html = '';
    $result = get_instance()->reports_model->getResultByUserByYear($uid, $class, $section, $exam, $year);
    $html .= "<tr>
                  <td style='text-align: left;border: 1px solid #DDD; border-collapse: collapse; padding: 5px;'>Was Absent?</td>
                    <td  width='200' style='text-align: left;border: 1px solid #DDD; border-collapse: collapse; padding: 5px;'>Subject Name</td>
                    <td style='text-align: left;border: 1px solid #DDD; border-collapse: collapse; padding: 5px;'>Written</td>
                    <td style='text-align: left;border: 1px solid #DDD; border-collapse: collapse; padding: 5px;'>MCQ</td>
                    <td style='text-align: left;border: 1px solid #DDD; border-collapse: collapse; padding: 5px;'>Practical</td>
                    <td style='text-align: left;border: 1px solid #DDD; border-collapse: collapse; padding: 5px;'>Total</td>
                    <td style='text-align: left;border: 1px solid #DDD; border-collapse: collapse; padding: 5px;'>Grade</td>
                    <td style='text-align: left;border: 1px solid #DDD; border-collapse: collapse; padding: 5px;'>GPA</td>
               </tr>";
    foreach($result as $key => $value) :
        //owndebugger($value);
        $total = array($value['Written'], $value['MCQ'], $value['Practical'], !empty($value['Listening']) ? $value['Listening'] : 0, !empty($value['Writting']) ? $value['Writting'] : 0, !empty($value['Speaking']) ? $value['Speaking'] : 0, !empty($value['Reading']) ? $value['Reading'] : 0);
        $totalSum = array_sum($total);
        $grade = makeGrade($totalSum);
        $gpa = makeGpa($totalSum);
        $gradesum += $gpa;
        $grades[] = $grade;

        if($value['IsAbsent'] == 0) {
            $abs =  'No';
        } else {
            $abs =  'Yes';
        }

    $html .= "<tr>
                  <td style='text-align: left;border: 1px solid #DDD; border-collapse: collapse; padding: 5px;'>$abs</td>
                    <td  width='200' style='text-align: left;border: 1px solid #DDD; border-collapse: collapse; padding: 5px;'>". $value['subject_name'] ."</td>
                    <td style='text-align: left;border: 1px solid #DDD; border-collapse: collapse; padding: 5px;'>". $value['Written'] ."</td>
                    <td style='text-align: left;border: 1px solid #DDD; border-collapse: collapse; padding: 5px;'>". $value['MCQ'] ."</td>
                    <td style='text-align: left;border: 1px solid #DDD; border-collapse: collapse; padding: 5px;'>". $value['Practical'] ."</td>
                    <td style='text-align: left;border: 1px solid #DDD; border-collapse: collapse; padding: 5px;'>". $totalSum ."</td>
                    <td style='text-align: left;border: 1px solid #DDD; border-collapse: collapse; padding: 5px;'>". $grade ."</td>
                    <td style='text-align: left;border: 1px solid #DDD; border-collapse: collapse; padding: 5px;'>". $gpa ."</td>
               </tr>";
        $count ++;
    endforeach;

    $avgcgpa = sprintf("%.2f", $gradesum/$count);
    if (@in_array("F", @$grades)) {
        $fcgpa = 0;
        $fgrade = "F";
    } else {
        $fcgpa = $avgcgpa;
        $fgrade = makeGpaGrade($fcgpa);
    }


    $html .= "<tr>
                  <th style='text-align: left;border: 1px solid #DDD; border-collapse: collapse; padding: 5px;' colspan = '6'>Total Result</th>
                    <th style='text-align: left;border: 1px solid #DDD; border-collapse: collapse; padding: 5px;'>$fgrade</th>
                    <th style='text-align: left;border: 1px solid #DDD; border-collapse: collapse; padding: 5px;'>$fcgpa</th>
               </tr>";

    return $html;
}

function get_result_subjects($eid = '', $cid = '', $sid = '', $y ='') {
    $CI = get_instance();
    $html = '';
    $subjects = $CI->db->select('Subjects')->order_by('Subjects', 'ASC')->distinct()->get_where('results', ['Exams' => $eid, 'Classes' => $cid, 'Sections' => $sid, 'AddedYear' => $y])->result();
    foreach ($subjects as $subject) {
        $html .= '<th>'. tableSingleColumn( 'initial_settings_info', 'SettingsDescription', ['SettingsId' => $subject->Subjects] ).'</th>';
    }

    return $html;
}
function get_result_subjects_mark($student = '', $eid = '', $cid = '', $sid = '', $y ='') {
    $CI = get_instance();
    $html = '';
    $subjects= $CI->db->select('Subjects')->order_by('Subjects', 'ASC')->distinct()->get_where('results', ['Exams' => $eid, 'Classes' => $cid, 'Sections' => $sid, 'AddedYear' => $y])->result();
    foreach ($subjects as $subject) {
        $html .= '<td class="all-type">'. get_subject_mark($student, $subject->Subjects, $eid, $cid, $sid, $y) .'</td>';
    }

    return $html;
}

function get_subject_mark($student = '', $sub = '', $eid = '', $cid = '', $sid = '', $y ='') {
    $CI = get_instance();
    $html = '';
    $pass_marks= @$CI->db->get_where('initial_settings_info', ['SettingsId' => $sub])->row();

    $cq_max_mark = $pass_marks->cq ;
    $mcq_max_mark = $pass_marks->mcq ;
    $p_max_mark = $pass_marks->practical ;

    $cq_pass_mark = $pass_marks->descriptive_pass_mark ;
    $mcq_pass_mark = $pass_marks->mcq_pass_mark ;
    $p_pass_mark = $pass_marks->practical_pass_mark ;

    $marks= @$CI->db->get_where('results', ['StudentId' => $student, 'Subjects' => $sub, 'Exams' => $eid, 'Classes' => $cid, 'Sections' => $sid, 'AddedYear' => $y])->row();

    if($marks->IsAbsent == 1){
        $absent = '<span style="color:red">Absent</span>';
    }

    if($pass_marks->cq != 0 && $pass_marks->descriptive_pass_mark != 0){
        if(passCheck(@$marks->Written, $cq_pass_mark, $cq_max_mark) == 'pass'){
            $valid_cq =  $marks->Written;
        }else {
             // $valid_cq = $marks->IsAbsent;
            if(!empty($absent)){
                $valid_cq = $absent;
            }else{
                $valid_cq = '<span style="color:red">F ('.$marks->Written.') </span>';
            }
        }
    }else{
        $valid_cq = '';
    }


    //echo $pass_marks->mcq_pass_mark;
    if(($pass_marks->mcq != 0) && ($pass_marks->mcq_pass_mark != 0)){
        if(passCheck(@$marks->MCQ, $mcq_pass_mark, $mcq_max_mark) == 'pass') {
            $valid_mcq =  $marks->MCQ ;
        }else{

            if(!empty($absent)){
               $valid_mcq = $absent;
            }else{
                $valid_mcq = '<span style="color:red">F ('.$marks->MCQ.') </span>';
            }
        }
    }else{
        $valid_mcq = '';
    }

    if( $pass_marks->practical != 0 && $pass_marks->practical_pass_mark != 0){
        if(passCheck(@$marks->Practical, $p_pass_mark, $p_max_mark) == 'pass') {
            $valid_practical =  $marks->Practical ;
        }else{
            if(!empty($absent)){
               $valid_practical = $absent;
            }else{
               $valid_practical = '<span style="color:red">F ('.$marks->Practical.') </span>';
            }
        }
    }else{
        $valid_practical = '';
    }


    $mark_html =   "<div class='col-md-4'>". $valid_cq ."</div>
                    <div class='col-md-4'>". $valid_mcq ."</div>
                    <div class='col-md-4'>". $valid_practical ."</div>";
    return $mark_html;

}

function get_subject_mark_sum($student = '', $sub = '', $eid = '', $cid = '', $sid = '', $y ='') {
    $CI = get_instance();
    $html = '';
    $marks= @$CI->db->get_where('results', ['StudentId' => $student, 'Subjects' => $sub, 'Exams' => $eid, 'Classes' => $cid, 'Sections' => $sid, 'AddedYear' => $y])->row();
    $total = array(@$marks->Written, @$marks->MCQ, @$marks->Practical);
    $totalSum = array_sum($total);
    return $totalSum;
}

function getPromotionRoll($studentid = '', $classs = '', $section = '', $year = '', $croll = '') {
    $CI = get_instance();
    $roll_debug = @$CI->db->get_where('student_promotion', ['UserId' => $studentid, 'Class' => $classs, 'Section' => $section])->row()->ClassRoll;
    if($roll_debug) {
        $return  = $roll_debug;
    } else{
        $return  = $croll;
    }

    return $return;
}

function getMarksWithSubject($studentid, $classroll, $markswithsubject, $mandatorysubject, $optionalsubject){

    $man = $mandatorysubject;
    $optional = $optionalsubject;

    $man = explode(',', $man);
    $marks = $markswithsubject;
    // owndebugger($marks);
    $marksss = explode(',', $marks);
    $qq = array();
    $qs = array();

    foreach($marksss as $mks) {
        $mark = explode('|', $mks);


        // if(in_array($mark[0], $man)) {
            $qq[$mark[0]] = array(
                'subject_id' => !empty($mark[0]) ? $mark[0] : NULL,
                'subject_name' => str_replace(" ","_",trim(tableSingleColumn('initial_settings_info', 'SettingsName', ['SettingsId'=> @$mark[0]]))),
                'class_level' => tableSingleColumn('initial_settings_info', 'class_level', ['SettingsId'=> @$mark[0]]),
                'is_absent' => !empty($mark[1]) ? $mark[1] : 0,
                'written' => !empty($mark[2]) ? $mark[2] : NULL,
                'mcq' => !empty($mark[3]) ? $mark[3] : NULL,
                'practical' => !empty($mark[4]) ? $mark[4] : NULL,

                'subject_rule' => tableSingleColumn('results', 'Subject_rule', ['ResultId'=> @$mark[5]]),
                'op_subject' => tableSingleColumn('results', 'op_subject', ['ResultId'=> @$mark[5]])
          
            );
        // } else {
        //     $qs = array(
        //         'subject_id' => !empty($mark[0]) ? $mark[0] : NULL,
        //         'subject_name' => tableSingleColumn('initial_settings_info', 'SettingsName', ['SettingsId'=> @$mark[0]]),
        //         'is_absent' => !empty($mark[1]) ? $mark[1] : 0,
        //         'written' => !empty($mark[2]) ? $mark[2] : NULL,
        //         'mcq' => !empty($mark[3]) ? $mark[3] : NULL,
        //         'practical' => !empty($mark[4]) ? $mark[4] : NULL,
        //         'subject_rule' => tableSingleColumn('results', 'Subject_rule', ['ResultId'=> @$mark[5]]),
        //         'op_subject' => tableSingleColumn('results', 'op_subject', ['ResultId'=> @$mark[5]])
          
        //     );
        // }

    }


    $single_student_info = array(
        'student_id'=> $studentid,
        'class_roll'=> $classroll,
        'mandatory_subject' => $qq
        // 'optional_subject' => $qs
    );
    // owndebugger($single_student_info);
    return $single_student_info;
}

function fah_excel_subject_info($sub, $all_sub){
    $sub_id = $sub['subject_id'];
    $absent = $sub['is_absent'];
    $sub_opt = $sub['op_subject'];
    $w_g = $sub['written'];
    $o_g = $sub['mcq'];
    $p_g = $sub['practical'];
    $t_g = $w_g+$o_g+$p_g;

    $rull = json_decode($sub['subject_rule'], true);
    $non_eff = @$rull['noeffect'];
    $separate = @$rull['s_pass'];
    $sub_type = $rull['subject_type'];
    $merg = $rull['mergeable'];
    $merg_id = $rull['mergeable_id'];

    $w_p = $rull['descriptive_pass_mark'];
    $o_p = $rull['mcq_pass_mark'];
    $p_p = $rull['practical_pass_mark'];
    $t_p = $w_p+$p_p+$o_p;

    $w_m = $rull['cq'];
    $p_m = $rull['mcq'];
    $o_m = $rull['practical'];
    $t_m = $w_m+$p_m+$o_m;


    if($non_eff !=1){
        if($absent != 1){
            if($separate ==1){
                if($t_p > $t_g){
                    $sng_subinfo = array(
                        'w' => $w_g,
                        'o' => $o_g,
                        'p' => $p_g,
                        't' => $t_g,
                        'g' => 0,
                        'a' => 'F',
                        'c' => 1
                    );
                }
                else{
                    $new_a = GradeGenerate($t_m, $t_g);
                    $new_g = GpaGenerate($t_m, $t_g);
                    $sng_subinfo = array(
                        'w' => $w_g,
                        'o' => $o_g,
                        'p' => $p_g,
                        't' => $t_g,
                        'g' => $new_g,
                        'a' => $new_a,
                        'c' => 1
                    );
                }

            }else{
                if($merg !=1){
                    if($w_p > $w_g || $o_p > $o_g || $p_p > $p_g){
                        $sng_subinfo = array(
                            'w' => $w_g,
                            'o' => $o_g,
                            'p' => $p_g,
                            't' => $t_g,
                            'g' => 0,
                            'a' => 'F',
                            'c' => 1
                        );
                    }else{
                        $new_a = GradeGenerate($t_m, $t_g);
                        $new_g = GpaGenerate($t_m, $t_g);
                        $sng_subinfo = array(
                            'w' => $w_g,
                            'o' => $o_g,
                            'p' => $p_g,
                            't' => $t_g,
                            'g' => $new_g,
                            'a' => $new_a,
                            'c' => 1
                        );
                    }

                }else{
                    if($merg_id !=''){
                        $m_sub = @$all_sub[300];
                        $mr_w = $m_sub['written'];
                        $mr_o = $m_sub['mcq'];
                        $mr_p = $m_sub['practical'];
                        $mr_t = $mr_w+$mr_o+$mr_p;
                        $mr_rull = json_decode($m_sub['subject_rule'], true);
                        $mrp_w = $mr_rull['descriptive_pass_mark'];
                        $mrp_o = $mr_rull['mcq_pass_mark'];
                        $mrp_p = $mr_rull['practical_pass_mark'];



                        $ps_t = $mr_rull['cq']+$mr_rull['mcq']+$mr_rull['practical'];
                        $new_a = GradeGenerate(($t_m+$ps_t), ($t_g+$mr_t));
                        $new_g = GpaGenerate(($t_m+$ps_t), ($t_g+$mr_t));

                        if(($w_p+$mrp_w) > ($w_g+$mr_w) || ($o_p+$mrp_o) > ($o_g+$mr_o) || ($p_p+$mrp_p) > ($p_g+$mr_p)){
                            $sng_subinfo = array(
                                'w' => $w_g,
                                'o' => $o_g,
                                'p' => $p_g,
                                't' => $p_p,
                                't' => $t_g+$mr_t,
                                'a' => 'F',
                                'c' => 1
                            );
                        }else{
                            $sng_subinfo = array(
                                'w' => $w_g,
                                'o' => $o_g,
                                'p' => $p_g,
                                't' => $t_g+$mr_t,
                                'g' => $new_g,
                                'a' => $new_a,
                                'c' => 1
                            );
                        }



                    }else{
                        $sng_subinfo = array(
                            'w' => $w_g,
                            'o' => $o_g,
                            'p' => $p_g,
                            't' => null,
                            'g' => null,
                            'a' => null,
                            'c' => null
                        );
                    }
                }
            }
        }else{
            $sng_subinfo = array(
                'w' => $w_g,
                'o' => $o_g,
                'p' => $p_g,
                't' => $t_g,
                'g' => 0,
                'a' => 'F',
                'c' => 1
            );
        }

    }else{
        $sng_subinfo = array(
            'w' => $w_g,
            'o' => $o_g,
            'p' => $p_g,
            't' => $t_g,
            'g' => null,
            'a' => null,
            'c' => null
        );

    }
    return @$sng_subinfo;




}

function fah_individual_subject_info($sub) {
    
    $all_sub = null;
    $sub_id = $sub['Subjects'];
    $absent = $sub['IsAbsent'];
    $sub_opt = $sub['op_subject'];
    $w_g = $sub['Written'];
    $o_g = $sub['MCQ'];
    $p_g = $sub['Practical'];
    $t_g = $w_g + $o_g + $p_g;

    $rull = json_decode($sub['Subject_rule'], true);
    $non_eff = @$rull['noeffect'];
    $separate = @$rull['s_pass'];
    $sub_type = $rull['subject_type'];
    $merg = $rull['mergeable'];
    $merg_id = $rull['mergeable_id'];

    $w_p = $rull['descriptive_pass_mark'];
    $o_p = $rull['mcq_pass_mark'];
    $p_p = $rull['practical_pass_mark'];
    $t_p = $w_p + $p_p + $o_p;

    $w_m = $rull['cq'];
    $p_m = $rull['mcq'];
    $o_m = $rull['practical'];
    $t_m = $w_m + $p_m + $o_m;


    if($non_eff !=1) {

        if($absent != 1) {

            if($separate == 1) {

                if($t_p > $t_g) {

                    $sng_subinfo = array(
                        'w' => $w_g,
                        'o' => $o_g,
                        'p' => $p_g,
                        't' => $t_g,
                        'g' => 0,
                        'a' => 'F',
                        'c' => 1
                    );
                    
                } else {

                    $new_a = GradeGenerate($t_m, $t_g);
                    $new_g = GpaGenerate($t_m, $t_g);
                    $sng_subinfo = array(
                        'w' => $w_g,
                        'o' => $o_g,
                        'p' => $p_g,
                        't' => $t_g,
                        'g' => $new_g,
                        'a' => $new_a,
                        'c' => 1
                    );
                    
                }

            } else {
                
                // if($merg !=1){
                //     if($w_p > $w_g || $o_p > $o_g || $p_p > $p_g){
                //         $sng_subinfo = array(
                //             'w' => $w_g,
                //             'o' => $o_g,
                //             'p' => $p_g,
                //             't' => $t_g,
                //             'g' => 0,
                //             'a' => 'F',
                //             'c' => 1
                //         );
                //     }else{
                //         $new_a = GradeGenerate($t_m, $t_g);
                //         $new_g = GpaGenerate($t_m, $t_g);
                //         $sng_subinfo = array(
                //             'w' => $w_g,
                //             'o' => $o_g,
                //             'p' => $p_g,
                //             't' => $t_g,
                //             'g' => $new_g,
                //             'a' => $new_a,
                //             'c' => 1
                //         );
                //     }

                // }else{
                //     if($merg_id !=''){
                //         $m_sub = @$all_sub[300];
                //         $mr_w = $m_sub['written'];
                //         $mr_o = $m_sub['mcq'];
                //         $mr_p = $m_sub['practical'];
                //         $mr_t = $mr_w+$mr_o+$mr_p;
                //         $mr_rull = json_decode($m_sub['subject_rule'], true);
                //         $mrp_w = $mr_rull['descriptive_pass_mark'];
                //         $mrp_o = $mr_rull['mcq_pass_mark'];
                //         $mrp_p = $mr_rull['practical_pass_mark'];



                //         $ps_t = $mr_rull['cq']+$mr_rull['mcq']+$mr_rull['practical'];
                //         $new_a = GradeGenerate(($t_m+$ps_t), ($t_g+$mr_t));
                //         $new_g = GpaGenerate(($t_m+$ps_t), ($t_g+$mr_t));

                //         if(($w_p+$mrp_w) > ($w_g+$mr_w) || ($o_p+$mrp_o) > ($o_g+$mr_o) || ($p_p+$mrp_p) > ($p_g+$mr_p)){
                //             $sng_subinfo = array(
                //                 'w' => $w_g,
                //                 'o' => $o_g,
                //                 'p' => $p_g,
                //                 't' => $p_p,
                //                 't' => $t_g+$mr_t,
                //                 'a' => 'F',
                //                 'c' => 1
                //             );
                //         }else{
                //             $sng_subinfo = array(
                //                 'w' => $w_g,
                //                 'o' => $o_g,
                //                 'p' => $p_g,
                //                 't' => $t_g+$mr_t,
                //                 'g' => $new_g,
                //                 'a' => $new_a,
                //                 'c' => 1
                //             );
                //         }



                //     }else{
                //         $sng_subinfo = array(
                //             'w' => $w_g,
                //             'o' => $o_g,
                //             'p' => $p_g,
                //             't' => null,
                //             'g' => null,
                //             'a' => null,
                //             'c' => null
                //         );
                //     }
                // }
                
            }
        } else {
            $sng_subinfo = array(
                'w' => $w_g,
                'o' => $o_g,
                'p' => $p_g,
                't' => $t_g,
                'g' => 0,
                'a' => 'F',
                'c' => 1
            );
        }

    } else {
        $sng_subinfo = array(
            'w' => $w_g,
            'o' => $o_g,
            'p' => $p_g,
            't' => $t_g,
            'g' => null,
            'a' => null,
            'c' => null
        );

    }
    return @$sng_subinfo;
}


?>
