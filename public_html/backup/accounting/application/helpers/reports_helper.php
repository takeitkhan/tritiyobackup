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
        <tr>
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
        </tr>
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
function allyearly_results($uid = '', $year = ''){
     $html = '';
     $exams = get_instance()->db->distinct()->order_by('Exams', 'ASC')->select('Exams')->get_where('results', ['StudentId' => $uid, 'AddedYear' => $year])->result();
     if($exams) {
         foreach($exams as $exam){
             $html .= "<table style='width: 100%;'>
                        <tr>
                            <td colspan='8' style='border: 1px solid #DDD; border-collapse: collapse; padding: 5px; font-weight: bold;'>
                            ". tableSingleColumn('initial_settings_info', 'SettingsName', ['SettingsId' => $exam->Exams]) ."
                            </td>
                        </tr>
                        ". get_single_semster_result($uid, $exam->Exams, $year) ."
                        </table>";
         }
     }
     return $html;
}

function get_single_semster_result($uid = '', $exam = '', $year = '') {
    $count = 1; $gradesum = 0;
    $html = '';
    $result = get_instance()->reports_model->getResultByUserByYear($uid, $exam, $year);
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
    foreach($result as $key => $value):
        $total = array($value['Written'], $value['MCQ'], $value['Practical'], $value['Listening'], $value['Writting'], $value['Speaking'], $value['Reading']);
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
    if (in_array("F", @$grades)) {
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



?>