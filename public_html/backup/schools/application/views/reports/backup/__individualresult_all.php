<?php //owndebugger($classes); //owndebugger($biodata); ?>


<div class="row">
    <div class="col-md-12 col-xs-12 col-sm-12">
        <?php echo form_start_divs('All Result by Individual Student', 'All Semester Result'); ?>
        <?php echo form_open_multipart(base_url() . 'getallindividualresult', array('class' => 'form-horizontal', 'id' => '', 'method' => 'get', 'data-toggle' => 'validator')); ?>
        <div class="form-group">
            <div class="col-md-2">
                Student ID<br/>
                <?php
                    if($this->input->get('uid')){
                        $value =(!empty($this->input->get('uid')) ? $this->input->get('uid') : '');
                    }else{
                        $value =(!empty($ui) ? $ui : '');
                    }
                    $data = array(
                        'name' => 'studentid',
                        'id' => 'studentid',
                        'class' => 'form-control',
                        'data-minlength' => '2',
                        'required' => 'required',
                        /*'value' => (!empty($ui) ? $ui : '')(!empty($this->input->get('uid')) ? $this->input->get('uid') : '')*/
                        // 'value' => (!empty($this->input->get('uid')) ? $this->input->get('uid') : '')
                        'value' => $value
                    );
                    echo form_input($data);
                ?>
            </div>
            <div class="col-md-2">
                Class<br/>
                <?php echo form_dropdown('classs', $classes, set_value('classs', (isset($cid) ? $cid : ''), TRUE), array('class' => 'form-control', 'id' => 'classs')); ?>
            </div>
            <div class="col-md-2">
                Section<br/>
                <?php echo form_dropdown('section', $sections, set_value('section', (isset($sid) ? $sid : ''), TRUE), array('class' => 'form-control', 'id' => 'section')); ?>
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
                <input  class="btn btn-success" value="Get Result Sheet" name="report" type="submit">
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
                                    <?php userdetails($biodata); ?>
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
                                <?php echo allyearly_results(@$this->input->get('studentid'), @$this->input->get('classs'), @$this->input->get('section'), @$this->input->get('yearid'))  ?>
                            </td>
                        </tr>
                    </table>
                    <br/><br/>
                </div>
            </div>
        </div>
    <?php } ?>
</div>