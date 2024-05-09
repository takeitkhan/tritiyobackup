<div class="row">
    <div class="col-md-12 col-xs-12 col-sm-12">
        <?php echo form_start_divs('Semester Result By Student', 'individual result'); ?>
        <?php echo form_open_multipart(base_url() . 'getindividualresult', array('class' => 'form-horizontal','method' => 'get', 'id' => 'getResultReportForm', 'data-toggle' => 'validator')); ?>
        <div class="form-group">
            <div class="col-md-2">
                Student ID<br/>
                <?php
//                    if($this->input->get('studentid')){
//                        $value =(!empty($this->input->get('studentid')) ? $this->input->get('studentid') : '');
//                    }else{
//                        $value =(!empty($ui) ? $ui : '');
//                    }
                    $data = array(
                        'name' => 'studentid',
                        'id' => 'studentid',
                        'class' => 'form-control',
                        'data-minlength' => '2',
                        'required' => 'required',
                        'value' => @$this->input->get('studentid')
                    );
                    echo form_input($data);
                ?>
            </div>
            <div class="col-md-2">
                Select Exam<br/>
                <?php
                    echo form_dropdown('examid', $exams, set_value('examid', (isset($examid) ? $examid : ''), TRUE), array('class' => 'form-control', 'required' => 'required'));
                ?>
            </div>
            <div class="col-md-2">
                Class<br/>
                <?php echo form_dropdown('classs', $classes, set_value('classs', (isset($cid) ? $cid : ''), TRUE), array('class' => 'form-control', 'id' => 'classs','required' => 'required')); ?>
            </div>
            <div class="col-md-2">
                Section<br/>
                <?php echo form_dropdown('section', $sections, set_value('section', (isset($sid) ? $sid : ''), TRUE), array('class' => 'form-control', 'id' => 'section','required' => 'required')); ?>
            </div>
            <div class="col-md-2">
                Select Year<br/>
                <?php
                    $years = getYearLists();
                    echo form_dropdown('yearid', $years, set_value('yearid', (isset($yearid) ? $yearid : ''), TRUE), array('class' => 'form-control', 'required' => 'required'));
                ?>
            </div>


            <div class="col-md-3">
                <br/>
                <input id="getResultReportBtn" class="btn btn-success" value="Get Result Sheet" name="report"
                       type="submit">
                <span></span>
                <input class="btn btn-default" value="Cancel" type="reset">
            </div>
        </div>
        <?php echo form_close(); ?>
        <?php echo form_end_divs(); ?>
    </div>
    <?php if (!empty($result)) { ?>
        <div class="col-md-12 col-xs-12 col-sm-12">
            <div class="row" style="width: 900px;table-layout:fixed">
                <div class="col-md-10">
                    &nbsp;
                </div>
                <div class="col-md-2 pull-right">
                    <a href="javascript:void(0)" onclick="printdiv('result')">
                        <i class="fa fa-print" style="font-size: 22px;"></i>
                    </a>
                </div>
            </div>
            <div id="result">
                <div style="font-size: 20px; font-family: 'kalpurush', 'Times New Roman'; vertical-align: top;">
                    <table class="printtable" style="width: 900px;table-layout:fixed; font-size: 12px; font-family: 'Trebuchet MS', sans-serif;">
                        <tr>
                            <td><hr style="border: 1px solid #000;"/></td>
                        </tr>
                        <tr>
                            <td>
                                <table  style="width:78%; float: left; border-collapse: collapse; font-size: 12px; font-family: 'Trebuchet MS', sans-serif;">

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

                                  <tr>
            <td width="130"
                style="border: 1px solid #DDD; border-collapse: collapse; padding: 5px; font-weight: bold;">Class
            </td>
            <td style="border: 1px solid #DDD; border-collapse: collapse; padding: 5px; font-weight: normal;">
                <?php //__e((isset($return[0]) ? ' ' . $return[0] : '')); ?>
                <?php echo tableSingleColumn('initial_settings_info', 'SettingsName', ['SettingsId' => $this->input->get('classs')]); ?>
            </td>
        </tr>
        <tr>
            <td width="130"
                style="border: 1px solid #DDD; border-collapse: collapse; padding: 5px; font-weight: bold;">Class
                Roll
            </td>
            <td style="border: 1px solid #DDD; border-collapse: collapse; padding: 5px;">
                <?php //__e((isset($return[1]) ? ' ' . $return[1] : '')); ?>

                <?php
                $bnstdinfo = $biodata['enstdinfo'];
                $return = explode('|', $bnstdinfo);
                echo getPromotionRoll($this->input->get('studentid'), @$this->input->get('classs'), @$this->input->get('section'), @$this->input->get('yearid') , $return[1]);
                ?>

            </td>
        </tr>
        <tr>
            <td width="130"
                style="border: 1px solid #DDD; border-collapse: collapse; padding: 5px; font-weight: bold;">Section
            </td>

            <td style="border: 1px solid #DDD; border-collapse: collapse; padding: 5px; font-weight: normal;">
                <?php //__e((isset($return[2]) ? ' ' . $return[2] : '')); ?>
                <?php echo tableSingleColumn('initial_settings_info', 'SettingsName', ['SettingsId' => $this->input->get('section')]); ?>
            </td>
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


                                    <?php //userdetails($biodata); ?>
                                </table>
                                <table style="width:20%; float: right;">
                                    <tr style=" border: 1px solid #DDD; border-collapse: collapse;">
                                        <th style="text-align: left;border: 1px solid #DDD; border-collapse: collapse; padding: 5px;">Grade</th>
                                        <th style="text-align: left;border: 1px solid #DDD; border-collapse: collapse; padding: 5px;">Interval</th>
                                        <th style="text-align: left;border: 1px solid #DDD; border-collapse: collapse; padding: 5px;">Point</th>
                                    </tr>
                                    <tr>
                                        <td style="text-align: left;border: 1px solid #DDD; border-collapse: collapse; padding: 5px;">A+</td>
                                        <td style="text-align: left;border: 1px solid #DDD; border-collapse: collapse; padding: 5px;">80-100</td>
                                        <td style="text-align: left;border: 1px solid #DDD; border-collapse: collapse; padding: 5px;">5</td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: left;border: 1px solid #DDD; border-collapse: collapse; padding: 5px;">A</td>
                                        <td style="text-align: left;border: 1px solid #DDD; border-collapse: collapse; padding: 5px;">70-79</td>
                                        <td style="text-align: left;border: 1px solid #DDD; border-collapse: collapse; padding: 5px;">4</td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: left;border: 1px solid #DDD; border-collapse: collapse; padding: 5px;">A-</td>
                                        <td style="text-align: left;border: 1px solid #DDD; border-collapse: collapse; padding: 5px;">60-69</td>
                                        <td style="text-align: left;border: 1px solid #DDD; border-collapse: collapse; padding: 5px;">3.5</td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: left;border: 1px solid #DDD; border-collapse: collapse; padding: 5px;">B</td>
                                        <td style="text-align: left;border: 1px solid #DDD; border-collapse: collapse; padding: 5px;">50-59</td>
                                        <td style="text-align: left;border: 1px solid #DDD; border-collapse: collapse; padding: 5px;">3</td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: left;border: 1px solid #DDD; border-collapse: collapse; padding: 5px;">C</td>
                                        <td style="text-align: left;border: 1px solid #DDD; border-collapse: collapse; padding: 5px;">40-49</td>
                                        <td style="text-align: left;border: 1px solid #DDD; border-collapse: collapse; padding: 5px;">2</td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: left;border: 1px solid #DDD; border-collapse: collapse; padding: 5px;">D</td>
                                        <td style="text-align: left;border: 1px solid #DDD; border-collapse: collapse; padding: 5px;">33-39</td>
                                        <td style="text-align: left;border: 1px solid #DDD; border-collapse: collapse; padding: 5px;">1</td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: left;border: 1px solid #DDD; border-collapse: collapse; padding: 5px;">F</td>
                                        <td style="text-align: left;border: 1px solid #DDD; border-collapse: collapse; padding: 5px;">00-32</td>
                                        <td style="text-align: left;border: 1px solid #DDD; border-collapse: collapse; padding: 5px;">0</td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td><hr style="border: 1px solid #000;"/></td>
                        </tr>
                        <tr>
                            <td>
                                <table style="width: 900px;table-layout:fixed; font-size: 12px; font-family: 'Trebuchet MS', sans-serif;">
                                    <tr style="border: 1px solid #DDD; border-collapse: collapse;">
                                        <th style="text-align: left;border: 1px solid #DDD; border-collapse: collapse; padding: 5px;">Was Absent?</th>
                                        <th  width="200" style="text-align: left;border: 1px solid #DDD; border-collapse: collapse; padding: 5px;">Subject Name</th>
                                        <th style="text-align: left;border: 1px solid #DDD; border-collapse: collapse; padding: 5px;">Written</th>
                                        <th style="text-align: left;border: 1px solid #DDD; border-collapse: collapse; padding: 5px;">MCQ</th>
                                        <th style="text-align: left;border: 1px solid #DDD; border-collapse: collapse; padding: 5px;">Practical</th>
                                        <th style="text-align: left;border: 1px solid #DDD; border-collapse: collapse; padding: 5px;">Total</th>
                                        <th style="text-align: left;border: 1px solid #DDD; border-collapse: collapse; padding: 5px;">Grade</th>
                                        <th style="text-align: left;border: 1px solid #DDD; border-collapse: collapse; padding: 5px;">GPA</th>
                                    </tr>
                                    <?php


                                      owndebugger($result );
                                    if(!empty($result)) {

                                        $count = 0;
                                        $gradesum = 0;
                                        $total_bng = 0;
                                        $total_en = 0;
                                        $enlish_is_pass = 0;
                                        $bangla_is_pass = 0;

                                      $bangla = [];


                                        foreach($result as $key => $value) {
                                            $total = array(@$value['Written'], @$value['MCQ'], @$value['Practical'], @$value['Listening'], @$value['Writting'], @$value['Speaking'], @$value['Reading']);

                                              $subject_mdatory = $this->result_model->get_subject_info($value['Subjects']);

                                              $sutdent_sub_info = $this->result_model->get_student_subjects_info($value['StudentId']);
                                              if ($subject_mdatory->class_level == 1) {
                                                $count = 7;
                                               } elseif ($subject_mdatory->class_level == 2) {
                                                 $count = 9;
                                               }


                                              $Is_mergeable = trim($subject_mdatory->mergeable);

                                              $my_subject_id = $value['Subjects'];


                                              $my_optional_subject =trim($sutdent_sub_info->optional_subject);

                                              //owndebugger($my_optional_subject);

                                              $my_written = trim(@$value['Written']);
                                              $my_mcq = trim(@$value['MCQ']);
                                              $my_practical = @$value['Practical'];
                                              $my_grand_total = @$my_practical + @$my_mcq+ @$my_written;

                                              $my_written_pass_mark = trim($subject_mdatory->descriptive_pass_mark);
                                              $my_mcq_pass_mark = trim($subject_mdatory->mcq_pass_mark);
                                              $my_practical_pass_mark = trim($subject_mdatory->practical_pass_mark);



                                              if($value['Subjects'] == 369) {
                                                $bangla ['bn1'] = [$value['Written'],$value['MCQ']];
                                              }
                                              if($value['Subjects'] == 370) {
                                                $bangla ['bn2'] = [$value['Written'],$value['MCQ']];
                                              }
                                              $bangla_W = 0;
                                              $bangla_MCQ = 0;
                                              foreach($bangla as $values) {
                                                $bangla_W += $values[0];
                                                $bangla_MCQ += $values[1];
                                              }
                                              $Bangla_grad = makeGradeHundredFifty($bangla_MCQ+$bangla_W);
                                              $Bangla_gpa = makeGPAHundredFifty($bangla_MCQ+$bangla_W);

                                            $totalSum = array_sum($total);

                                            $grade = makeGrade($totalSum);

                                             //makeGradeHundredFifty($score);
                                            $gpa = makeGpa($totalSum);



                                          // General_Mathematics-55
                                          $math_id = array(55, 277);
                                          if (in_array(@$value['Subjects'], $math_id)) {
                                              if (($my_mcq < $my_mcq_pass_mark) || ($my_written < $my_written_pass_mark)) {
                                                  $my_total = "<span style='color:red'>" . (@$value['Written'] + @$value['MCQ']) . "</span>";
                                                 $my_grade = "<span style='color:red'>F</span>";
                                                $my_gpa = 0;
                                              } else {
                                                  $my_total = (@$value['Written'] + @$value['MCQ']);
                                                  $my_grade = makeGradeHundred(@$my_total);
                                                 $my_gpa = makeGpaHundred(@$my_total);
                                              }
                                              $grades[] = $my_grade;
                                          }
                                          // Bangla
                                          $bn1st_id = array(369, 300, 332);
                                          if (in_array(@$value['Subjects'], $bn1st_id)) {

                                            if($total_bng ==0 ){
                                                  $total_bng += $my_written +$my_mcq;
                                                  if($Is_mergeable == 1){  $my_total = '';  $my_grade = '';  $my_gpa = '';  }
                                                  if (($my_mcq < $my_mcq_pass_mark) || ($my_written < $my_written_pass_mark)) {
                                                    $bangla_is_pass += 0;
                                                  } else {
                                                    $bangla_is_pass += 1;
                                                 }


                                               }else {
                                                   $total_bng += $my_written +$my_mcq;
                                                 if (($my_mcq < $my_mcq_pass_mark) || ($my_written < $my_written_pass_mark) || ( $bangla_is_pass < 1)) {
                                                       $my_total = "<span style='color:red'>" . $total_bng . "</span>";
                                                       $my_grade = "<span style='color:red'>F</span>";
                                                       $my_gpa = 0;
                                                 } else {
                                                 if ($total_bng) {
                                                      if ($subject_mdatory->class_level == 1) {
                                                        $my_total = $total_bng;
                                                          $my_grade = makeGradeHundredFifty(@$my_total);
                                                          $my_gpa = makeGpaHundredFifty(@$my_total);
                                                       } elseif ($subject_mdatory->class_level == 2) {
                                                         $my_total = $total_bng;
                                                         $my_grade = makeGradeTwoHundred(@$my_total);
                                                         $my_gpa = makeGpaTwoHundred(@$my_total);
                                                       }

                                                   }
                                                 }
                                                  $grades[] = $my_grade;


                                               }


                                          }

                                        //  $bang_1nd_grand = $bang_1nd_totals;

                                          $bn2_id = array(333, 285, 370);
                                          if (in_array(@$value['Subjects'], $bn2_id)) {
                                            if($total_bng ==0 ){
                                                  $total_bng += $my_written +$my_mcq;
                                                  if($Is_mergeable == 1){  $my_total = '';  $my_grade = '';  $my_gpa = '';  }
                                                  if (($my_mcq < $my_mcq_pass_mark) || ($my_written < $my_written_pass_mark)) {
                                                    $bangla_is_pass += 0;
                                                  } else {
                                                    $bangla_is_pass += 1;
                                                 }


                                               }else {
                                                   $total_bng += $my_written +$my_mcq;
                                                 if (($my_mcq < $my_mcq_pass_mark) || ($my_written < $my_written_pass_mark) || ( $bangla_is_pass < 1)) {
                                                       $my_total = "<span style='color:red'>" . $total_bng . "</span>";
                                                       $my_grade = "<span style='color:red'>F</span>";
                                                       $my_gpa = 0;
                                                 } else {
                                                 if ($total_bng) {
                                                      if ($subject_mdatory->class_level == 1) {
                                                        $my_total = $total_bng;
                                                          $my_grade = makeGradeHundredFifty(@$my_total);
                                                          $my_gpa = makeGpaHundredFifty(@$my_total);
                                                       } elseif ($subject_mdatory->class_level == 2) {
                                                         $my_total = $total_bng;
                                                         $my_grade = makeGradeTwoHundred(@$my_total);
                                                         $my_gpa = makeGpaTwoHundred(@$my_total);
                                                       }

                                                   }
                                                 }
                                                  $grades[] = $my_grade;

                                               }

                                          }

                                        $eng1_id = array(298, 301, 334);
                                        if (in_array(@$value['Subjects'], $eng1_id)) {
                                        //  owndebugger($subject_mdatory);
                                          $total_en += $my_written;
                                              if($Is_mergeable == 1){ $my_total = '';  $my_grade = ''; $my_gpa = '';  }

                                              if ( ($my_written < $my_written_pass_mark)) {
                                                 $enlish_is_pass += 0;
                                              } else {
                                                  $enlish_is_pass += 1;
                                              }

                                        }

                                        $eng2_id = array(299, 302, 335);
                                        if (in_array(@$value['Subjects'], $eng2_id)) {



                                              $total_en +=$my_grand_total;

                                              //owndebugger($enlish_is_pass);

                                              if (($my_written < $my_written_pass_mark) || ( $enlish_is_pass < 1)) {
                                                  $my_total = "<span style='color:red'>" . $total_en . "</span>";
                                                 $my_grade = "<span style='color:red'>F</span>";
                                                $my_gpa = 0;
                                              } else {
                                                    if ($total_en) {
                                                        if ($subject_mdatory->class_level == 1) {
                                                            $my_total = $total_en;
                                                            $my_grade = makeGradeHundredFifty($total_en);
                                                            $my_gpa = makeGpaHundredFifty($total_en);
                                                        } elseif ($subject_mdatory->class_level == 2) {
                                                            $my_total = $total_en;
                                                            $my_grade = makeGradeTwoHundred($total_en);
                                                            $my_gpa = makeGpaTwoHundred($total_en);
                                                        }

                                                    }
                                              }
                                              $grades[] = $my_grade;

                                        }


                                        // Agricultural
                                        $agri_id = array(293);
                                        if (in_array(@$value['Subjects'], $agri_id)) {
                                            if (($my_mcq < $my_mcq_pass_mark) || ($my_written < $my_written_pass_mark)) {
                                                  $my_total = "<span style='color:red'>" .$my_grand_total. "</span>";
                                                  $my_grade = "<span style='color:red'>F</span>";
                                                  $my_gpa = 0;
                                            } else {
                                                $my_total = $my_grand_total;
                                                $my_grade = makeGradeHundred($my_grand_total);
                                                $my_gpa = makeGpaHundred($my_grand_total);
                                            }
                                            $grades[] = $my_grade;
                                        }



                                          // Religion
                                          $religion_id = array(294, 295, 296, 297, 308, 309, 310, 311);
                                          if (in_array(@$value['Subjects'], $religion_id)) {
                                              $subject_mdatory = $this->result_model->get_subject_info($value['Subjects']);
                                              $my_subject_id = $value['Subjects'];
                                              $my_written_pass_mark = trim($subject_mdatory->descriptive_pass_mark);
                                              $my_mcq_pass_mark = trim($subject_mdatory->mcq_pass_mark);
                                              $my_written = trim(@$value['Written']);
                                              $my_mcq = trim(@$value['MCQ']);

                                              if (($my_mcq < $my_mcq_pass_mark) || ($my_written < $my_written_pass_mark)) {
                                                  $my_total = "<span style='color:red'>" . (@$value['Written'] + @$value['MCQ']) . "</span>";
                                                  $my_grade = "<span style='color:red'>F</span>";
                                                  $my_gpa = 0;
                                              } else {
                                                  $my_total = (@$value['Written'] + @$value['MCQ']);
                                                  $my_grade = makeGradeHundred(@$my_total);
                                                  $my_gpa = makeGpaHundred(@$my_total);
                                              }
                                              $grades[] = $my_grade;
                                          }

                                          //Introduction_to_Bangladesh_and_World - 58
                                          $intr_bn_world = array(338, 58);
                                          if (in_array(@$value['Subjects'], $intr_bn_world)) {
                                                $subject_mdatory = $this->result_model->get_subject_info($value['Subjects']);
                                                $my_subject_id = $value['Subjects'];
                                                $my_written_pass_mark = trim($subject_mdatory->descriptive_pass_mark);
                                                $my_mcq_pass_mark = trim($subject_mdatory->mcq_pass_mark);
                                                $my_written = trim(@$value['Written']);
                                                $my_mcq = trim(@$value['MCQ']);

                                              if (($my_mcq < $my_mcq_pass_mark) || ($my_written < $my_written_pass_mark)) {
                                                    $my_total = "<span style='color:red'>" . (@$value['Written'] + @$value['MCQ']) . "</span>";
                                                    $my_grade = "<span style='color:red'>F</span>";
                                                    $my_gpa = 0;
                                              } else {
                                                  $my_total = (@$value['Written'] + @$value['MCQ']);
                                                  $my_grade = makeGradeHundred(@$my_total);
                                                  $my_gpa = makeGpaHundred(@$my_total);
                                              }
                                              $grades[] = $my_grade;
                                          }
                                          //General_Science -57
                                          $general_sci_id = array(303, 57);
                                          if (in_array(@$value['Subjects'], $general_sci_id)) {
                                                $subject_mdatory = $this->result_model->get_subject_info($value['Subjects']);
                                                $my_subject_id = $value['Subjects'];
                                                $my_written_pass_mark = trim($subject_mdatory->descriptive_pass_mark);
                                                $my_mcq_pass_mark = trim($subject_mdatory->mcq_pass_mark);
                                                $my_written = trim(@$value['Written']);
                                                $my_mcq = trim(@$value['MCQ']);

                                              if (($my_mcq < $my_mcq_pass_mark) || ($my_written < $my_written_pass_mark)) {
                                                    $my_total = "<span style='color:red'>" . (@$value['Written'] + @$value['MCQ']) . "</span>";
                                                    $my_grade = "<span style='color:red'>F</span>";
                                                    $my_gpa = 0;
                                              } else {
                                                  $my_total = (@$value['Written'] + @$value['MCQ']);
                                                  $my_grade = makeGradeHundred(@$my_total);
                                                  $my_gpa = makeGpaHundred(@$my_total);
                                              }
                                              $grades[] = $my_grade;
                                          }

                                          //ICT -291
                                          $ict_id = array(318, 291, 376);
                                          if (in_array(@$value['Subjects'], $ict_id)) {
                                              if ($subject_mdatory->class_level == 1) {

                                                  if ($my_written < $my_written_pass_mark) {
                                                      $my_total = "<span style='color:red'>" . $my_written . "</span>";
                                                      $my_grade = "<span style='color:red'>F</span>";
                                                      $my_gpa = 0;
                                                  } else {
                                                      $my_total = $my_written;
                                                      $my_grade = makeGradeFifty(@$my_total);
                                                      $my_gpa = makeGpaFifty(@$my_total);
                                                  }
                                              } elseif ($subject_mdatory->class_level == 2) { // practical_pass_mark

                                                  if ($my_mcq < $my_mcq_pass_mark || $my_practical < $my_practical_pass_mark) {
                                                      $my_total = "<span style='color:red'>" . (@$my_written + @$my_mcq + @$my_practical) . "</span>";
                                                      $my_grade = "<span style='color:red'>F</span>";
                                                      $my_gpa = 0;
                                                  } else {
                                                      $my_total = (@$my_written + @$my_mcq + @$my_practical);
                                                      $my_grade = makeGradeFifty(@$my_total);
                                                      $my_gpa = makeGpaFifty(@$my_total);
                                                  }
                                              }
                                              $grades[] = $my_grade;
                                          }
                                          //Carrier/ Work_and_Life_Oriented_Education
                                          $carrier_id = array(290, 319);
                                          if (in_array(@$value['Subjects'], $carrier_id)) {
                                            $subject_mdatory = $this->result_model->get_subject_info($value['Subjects']);
                                            $my_subject_id = $value['Subjects'];

                                              if ($subject_mdatory->class_level == 1) {
                                                  $my_written = trim(@$value['Written']);
                                                  $my_written_pass_mark = trim($subject_mdatory->descriptive_pass_mark);
                                                  if ($my_written < $my_written_pass_mark) {
                                                      $my_total = "<span style='color:red'>" . $my_written . "</span>";
                                                      $my_grade = "<span style='color:red'>F</span>";
                                                      $my_gpa = 0;
                                                  } else {
                                                      $my_total = $my_written;
                                                      $my_grade = makeGradeFifty(@$my_total);
                                                      $my_gpa = makeGpaFifty(@$my_total);
                                                  }
                                              } elseif ($subject_mdatory->class_level == 2) {
                                                  $my_practical = $value['Practical'];
                                                  $my_practical_pass_mark = trim($subject_mdatory->practical_pass_mark);

                                                  if ($my_practical < $my_practical_pass_mark) {
                                                      $my_total = "<span style='color:red'>" . $my_practical . "</span>";
                                                      $my_grade = "<span style='color:red'>F</span>";
                                                      $my_gpa = 0;
                                                  } else {
                                                      $my_total = $my_practical;
                                                      $my_grade = makeGradeTwentyFive(@$my_total);
                                                      $my_gpa = makeGpaTwentyFive(@$my_total);
                                                  }
                                              }
                                              $grades[] = $my_grade;
                                          }

                                          //Arts_and_crafts
                                          $arts_and_crafts_id = array(292, 329);
                                          if (in_array(@$value['Subjects'], $arts_and_crafts_id)) {
                                            $subject_mdatory = $this->result_model->get_subject_info($value['Subjects']);
                                                  $my_subject_id = $value['Subjects'];
                                                  $my_written_pass_mark = trim($subject_mdatory->descriptive_pass_mark);
                                                  $my_written = trim(@$value['Written']);

                                              if ($my_written < $my_written_pass_mark) {
                                                  $my_total = "<span style='color:red'>" . $my_written . "</span>";
                                                  $my_grade = "<span style='color:red'>F</span>";
                                                  $my_gpa = 0;
                                              } else {
                                                  $my_total = $my_written;
                                                  $my_grade = makeGradeFifty(@$my_total);
                                                  $my_gpa = makeGpaFifty(@$my_total);
                                              }
                                              $grades[] = $my_grade;
                                          }

                                          //Health
                                          $health_id = array(331, 289);
                                          if (in_array(@$value['Subjects'], $health_id)) {
                                              $subject_mdatory = $this->result_model->get_subject_info($value['Subjects']);
                                              $my_subject_id = $value['Subjects'];

                                            if ($subject_mdatory->class_level == 1) {


                                                  $my_written_pass_mark = trim($subject_mdatory->descriptive_pass_mark);
                                                  $my_written = trim(@$value['Written']);

                                                  if ($my_written < $my_written_pass_mark) {
                                                      $my_total = "<span style='color:red'>" . $my_written . "</span>";
                                                      $my_grade = "<span style='color:red'>F</span>";
                                                      $my_gpa = 0;
                                                  } else {
                                                      $my_total = $my_written;
                                                      $my_grade = makeGradeFifty(@$my_total);
                                                      $my_gpa = makeGpaFifty(@$my_total);
                                                  }
                                              } elseif ($subject_mdatory->class_level == 2) {
                                                $my_practical = $value['Practical'];
                                                $my_practical_pass_mark = trim($subject_mdatory->practical_pass_mark);

                                                  if ($my_practical < $my_practical_pass_mark) {
                                                      $my_total = "<span style='color:red'>" . $my_practical . "</span>";
                                                      $my_grade = "<span style='color:red'>F</span>";
                                                      $my_gpa = 0;
                                                  } else {
                                                      $my_total = $my_practical;
                                                      $my_grade = makeGpaTwentyFive(@$my_total);
                                                      $my_gpa = makeGpaTwentyFive(@$my_total);
                                                  }
                                              }
                                              $grades[] = $my_grade;
                                          }







                                    //Chemestry , physics
                                    $since_id = array(79, 127, 288, 80,304,306,314,307,316,315);

                                    if (in_array(@$value['Subjects'], $since_id)) {


                                      if (($my_written < $my_written_pass_mark) || ($my_mcq < $my_mcq_pass_mark) || ($my_practical < $my_practical_pass_mark)) {
                                          $my_total = "<span style='color:red'>" . (@$my_written + @$my_mcq + @$my_practical) . "</span>";
                                          $my_grade = "<span style='color:red'>F</span>";
                                          $my_gpa = 0;
                                      } else {
                                          $my_total = (@$my_written + @$my_mcq + @$my_practical);
                                          $my_grade = makeGradeHundred(@$my_total);
                                          $my_gpa = makeGpaHundred(@$my_total);
                                      }
                                      $grades[] = $my_grade;
                                    }






                                        ?>


                                    <tr>
                                        <td style="text-align: left;border: 1px solid #DDD; border-collapse: collapse; padding: 5px;">
                                            <?php
                                            if(@$value['IsAbsent'] ==0) {
                                                  echo 'No';
                                              } else {
                                                  echo 'Yes';
                                              }
                                              ?>
                                        </td>






                                        <td style="text-align: left;border: 1px solid #DDD; border-collapse: collapse; padding: 5px;"><?php echo tableSingleColumn('initial_settings_info', 'SettingsName', ['SettingsId' => $value['Subjects']]); ?></td>
                                        <td style="text-align: left;border: 1px solid #DDD; border-collapse: collapse; padding: 5px;">
                                          <?= @globalSubjectFailCheck(@$my_written, $value['Subjects'], 'CQ') ?>
                                        </td>
                                        <td style="text-align: left;border: 1px solid #DDD; border-collapse: collapse; padding: 5px;">

                                          <?php
                                                if($subject_mdatory->mcq != 0){
                                           echo  globalSubjectFailCheck($my_mcq, $value['Subjects'], 'MCQ') ;
                                           }
                                           ?>
                                        </td>
                                        <td style="text-align: left;border: 1px solid #DDD; border-collapse: collapse; padding: 5px;">
                                          <?php
                                                if($subject_mdatory->practical != 0){
                                           echo  globalSubjectFailCheck($my_practical, $value['Subjects'], 'PRACTICAL') ;
                                           }



                                           ?>


                                        </td>
                                        <td style="text-align: left;border: 1px solid #DDD; border-collapse: collapse; padding: 5px;">

                                            <?php
                                              //if($value['Subjects'] == 370) {echo $bangla_MCQ+$bangla_W;}elseif($value['Subjects'] == 369){
                                                //echo " ";
                                              //}else {echo @$totalSum; }

                                                echo @$my_total;

                                              ?>

                                        </td>
                                        <td style="text-align: left;border: 1px solid #DDD; border-collapse: collapse; padding: 5px;">
                                            <?php
                                              if($value['Subjects'] == 370) {echo $Bangla_grad;}elseif($value['Subjects'] == 369){
                                                echo " ";
                                              }else {echo @$my_grade; } ?>


                                        </td>
                                        <td style="text-align: left;border: 1px solid #DDD; border-collapse: collapse; padding: 5px;">

                                              <?php


                                                if($my_subject_id == $my_optional_subject){
                                                 echo $newGpa= (@$my_gpa - 2);
                                                 $gradesum += $newGpa;
                                                }else {
                                                 echo @$my_gpa;
                                                 $gradesum += $my_gpa;
                                                }
                                                ?>
                                        </td>
                                    </tr>
                                    <?php

                                          }
                                           //owndebugger($bangla);

                                         }




                                        $avgcgpa = sprintf("%.2f", $gradesum/$count);

                                          owndebugger($grades);
                                        if (@in_array("F", @$grades)) {
                                            $fcgpa = 0;
                                            $fgrade = "F";
                                        } else {
                                            $fcgpa = $avgcgpa;
                                            $fgrade = makeGpaGrade($fcgpa);

                                        }


                                    ?>
                                    <tr style="text-align: left;border: 1px solid #DDD; border-collapse: collapse; padding: 5px;">
                                        <th style="text-align: left;border: 1px solid #DDD; border-collapse: collapse; padding: 5px;" colspan="6">Total Result </th>
                                        <th style="text-align: left;border: 1px solid #DDD; border-collapse: collapse; padding: 5px;"><?php echo $fgrade; ?></th>
                                        <th style="text-align: left;border: 1px solid #DDD; border-collapse: collapse; padding: 5px;"><?php echo $fcgpa; ?></th>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                    <br/><br/>
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
