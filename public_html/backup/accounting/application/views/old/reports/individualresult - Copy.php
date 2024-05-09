<div class="row">
    <div class="col-md-12 col-xs-12 col-sm-12">
        <?php echo form_start_divs($title, 'all of your students'); ?>
        <?php echo form_open_multipart(base_url() . 'getindividualresult', array('class' => 'form-horizontal', 'id' => 'getResultReportForm', 'data-toggle' => 'validator')); ?>
        <div class="form-group">
            <div class="col-md-2">
                Student ID<br/>
                <?php
                $data = array(
                    'name' => 'studentid',
                    'id' => 'studentid',
                    'class' => 'form-control',
                    'data-minlength' => '2',
                    'required' => 'required',
                    'value' => (!empty($ui) ? $ui : '')
                );
                echo form_input($data);
                ?>
            </div>
            <div class="col-md-2">
                Select Exam<br/>
                <?php
                    echo form_dropdown('examid', $exams, set_value('examid', (isset($examid) ? $examid : ''), TRUE), array('class' => 'form-control'));                
                ?>
            </div>
            <div class="col-md-2">
                Select Year<br/>
                <?php
                    $years = getYearLists();
                    echo form_dropdown('yearid', $years, set_value('yearid', (isset($yearid) ? $yearid : ''), TRUE), array('class' => 'form-control'));                
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
                                </table>
                            </td>
                            <!-- Student Information -->
                        </tr>
                        <tr>
                            <td colspan="3">
                                <table style="width: 900px;table-layout:fixed; font-size: 12px; font-family: 'Trebuchet MS', sans-serif;">
                                    <tbody>
                                        <tr style="border: 1px solid #DDD; border-collapse: collapse;">
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
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <hr style="border: 1px solid #000;"/>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <?php
                                   // owndebugger($result);

                                    // foreach($result as $key => $value) {
                                    //         $total = array($value['Written'], $value['MCQ'], $value['Practical'], $value['Listening'], $value['Writting'], $value['Speaking'], $value['Reading']);                                            
                                    //         $totalSum = array_sum($total);                                            
                                    //         $grade = makeGrade($totalSum);                                         
                                    //        echo $gpa = makeGpa($totalSum);   echo '<br>';                                            
                                    //         $gradeArr = $grade . " ";                                            
                                    //         $gpaArr = $gpa . " ";  
                                    //     }
                                    //     die();
                                ?>
                                <table style="width: 900px;table-layout:fixed; font-size: 12px; font-family: 'Trebuchet MS', sans-serif;">
                                    <tr style="border: 1px solid #DDD; border-collapse: collapse;">
                                        <th style="text-align: left;border: 1px solid #DDD; border-collapse: collapse; padding: 5px;">Was Absent?</th>
                                        <th  width="200" style="text-align: left;border: 1px solid #DDD; border-collapse: collapse; padding: 5px;">Subject Name</th>
                                        <th style="text-align: left;border: 1px solid #DDD; border-collapse: collapse; padding: 5px;">Written</th>
                                        <th style="text-align: left;border: 1px solid #DDD; border-collapse: collapse; padding: 5px;">MCQ</th>
                                        <th style="text-align: left;border: 1px solid #DDD; border-collapse: collapse; padding: 5px;">Practical</th>
                                       <!--  <th style="text-align: left;border: 1px solid #DDD; border-collapse: collapse; padding: 5px;">Listening</th>
                                       <th style="text-align: left;border: 1px solid #DDD; border-collapse: collapse; padding: 5px;">Writing</th>
                                       <th style="text-align: left;border: 1px solid #DDD; border-collapse: collapse; padding: 5px;">Speaking</th>
                                       <th style="text-align: left;border: 1px solid #DDD; border-collapse: collapse; padding: 5px;">Reading</th> -->
                                        <th style="text-align: left;border: 1px solid #DDD; border-collapse: collapse; padding: 5px;">Total</th>
                                        <th style="text-align: left;border: 1px solid #DDD; border-collapse: collapse; padding: 5px;">Grade</th>
                                        <th style="text-align: left;border: 1px solid #DDD; border-collapse: collapse; padding: 5px;">GPA</th>
                                    </tr>
                                    <?php
                                    if(!empty($result)) {
                                        foreach($result as $key => $value) {
                                            $total = array($value['Written'], $value['MCQ'], $value['Practical'], $value['Listening'], $value['Writting'], $value['Speaking'], $value['Reading']);                                            
                                            $totalSum = array_sum($total);                                            
                                            $grade = makeGrade($totalSum);                                            
                                            $gpa = makeGpa($totalSum);                                            
                                           echo $gradeArr = $grade . " "; 
                                                                     echo '<br>';                 
                                            echo $gpaArr = $gpa . " ";                                            
                                        ?>
                                    <tr>
                                        <td style="text-align: left;border: 1px solid #DDD; border-collapse: collapse; padding: 5px;">
                                            <?php
                                                if($value['IsAbsent'] == 0) {
                                                    echo 'No';
                                                } else {
                                                    echo 'Yes';
                                                }
                                            ?>
                                        </td>
                                        <td style="text-align: left;border: 1px solid #DDD; border-collapse: collapse; padding: 5px;"><?php echo $value['subject_name']; ?></td>
                                        <td style="text-align: left;border: 1px solid #DDD; border-collapse: collapse; padding: 5px;"><?php echo $value['Written']; ?></td>
                                        <td style="text-align: left;border: 1px solid #DDD; border-collapse: collapse; padding: 5px;"><?php echo $value['MCQ']; ?></td>
                                        <td style="text-align: left;border: 1px solid #DDD; border-collapse: collapse; padding: 5px;"><?php echo $value['Practical']; ?></td>
                                        <!-- <td style="text-align: left;border: 1px solid #DDD; border-collapse: collapse; padding: 5px;"><?php //echo $value['Listening']; ?></td>
                                        <td style="text-align: left;border: 1px solid #DDD; border-collapse: collapse; padding: 5px;"><?php //echo $value['Writting']; ?></td>
                                        <td style="text-align: left;border: 1px solid #DDD; border-collapse: collapse; padding: 5px;"><?php //echo $value['Speaking']; ?></td>
                                        <td style="text-align: left;border: 1px solid #DDD; border-collapse: collapse; padding: 5px;"><?php //echo $value['Reading']; ?></td> -->
                                        <td style="text-align: left;border: 1px solid #DDD; border-collapse: collapse; padding: 5px;">
                                            <?php
                                            echo $totalSum;
                                                // if ($value['IsAbsent'] != 1) {
                                                //     echo $totalSum;
                                                // }
                                            ?>
                                        </td>
                                        <td style="text-align: left;border: 1px solid #DDD; border-collapse: collapse; padding: 5px;">
                                            <?php
                                                echo $grade;
                                                // if ($value['IsAbsent'] != 1) {
                                                //     echo $grade;
                                                // }
                                            ?>
                                        </td>
                                        <td style="text-align: left;border: 1px solid #DDD; border-collapse: collapse; padding: 5px;">
                                            <?php
                                            echo $gpa;
                                                // if ($value['IsAbsent'] != 1) {
                                                //     echo $gpa;
                                                // }
                                            ?>
                                        </td>
                                    </tr>                                    
                                    <?php 
                                        }
                                    }
                                    $gradesep = explode(" ", $gradeArr);
                                    $gpasep = explode(" ", $gpaArr);
owndebugger($gradesep);
echo '<br>';
owndebugger($gpasep );

                                    if (in_array("F", $gradesep)) {
                                        $fcgpa = 0;
                                        $fgrade = "F";
                                    } else {
                                        $totalGpa = array_sum($gpasep);
                                        //echo $totalGpa; echo '<br>';
                                        $averageGpa = count($gpasep);
                                        //echo $averageGpa;
                                        $fcgpa = sprintf("%.2f", $totalGpa / $averageGpa);
                                        $fgrade = makeGpaGrade($fcgpa);
                                    }
                                    ?>
                                    <tr style="text-align: left;border: 1px solid #DDD; border-collapse: collapse; padding: 5px;">
                                        <th style="text-align: left;border: 1px solid #DDD; border-collapse: collapse; padding: 5px;" colspan="6">Total Result</th>                                        
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