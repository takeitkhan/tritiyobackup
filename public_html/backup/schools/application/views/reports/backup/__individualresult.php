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
                                    if(!empty($result)) {
                                        $count = 1; $gradesum = 0;
                                        foreach($result as $key => $value) {
                                            $total = array(@$value['Written'], @$value['MCQ'], @$value['Practical'], @$value['Listening'], @$value['Writting'], @$value['Speaking'], @$value['Reading']);
                                            $totalSum = array_sum($total);
                                            $grade = makeGrade($totalSum);
                                            $gpa = makeGpa($totalSum);
                                            $gradesum += $gpa;
                                            $grades[] = $grade;
                                        ?>
                                    <tr>
                                        <td style="text-align: left;border: 1px solid #DDD; border-collapse: collapse; padding: 5px;">
                                            <?php
                                                if(@$value['IsAbsent'] == 0) {
                                                    echo 'No';
                                                } else {
                                                    echo 'Yes';
                                                }
                                            ?>
                                        </td>
                                        <td style="text-align: left;border: 1px solid #DDD; border-collapse: collapse; padding: 5px;"><?php echo tableSingleColumn('initial_settings_info', 'SettingsName', ['SettingsId' => $value['Subjects']]); ?></td>
                                        <td style="text-align: left;border: 1px solid #DDD; border-collapse: collapse; padding: 5px;"><?php echo @$value['Written']; ?></td>
                                        <td style="text-align: left;border: 1px solid #DDD; border-collapse: collapse; padding: 5px;"><?php echo @$value['MCQ']; ?></td>
                                        <td style="text-align: left;border: 1px solid #DDD; border-collapse: collapse; padding: 5px;"><?php echo @$value['Practical']; ?></td>
                                        <td style="text-align: left;border: 1px solid #DDD; border-collapse: collapse; padding: 5px;">
                                            <?php echo @$totalSum; ?>
                                        </td>
                                        <td style="text-align: left;border: 1px solid #DDD; border-collapse: collapse; padding: 5px;">
                                            <?php echo @$grade; ?>
                                        </td>
                                        <td style="text-align: left;border: 1px solid #DDD; border-collapse: collapse; padding: 5px;">
                                            <?php echo @$gpa; ?>
                                        </td>
                                    </tr>
                                    <?php
                                            $count ++; }
                                         }

                                        $avgcgpa = sprintf("%.2f", $gradesum/$count);
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