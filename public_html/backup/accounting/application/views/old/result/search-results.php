<div class="row">
    <div class="col-md-12 col-xs-12 col-sm-12">
        <?php echo form_start_divs($title, 'generate result here'); ?>
        <?php echo form_open_multipart('', array('class' => 'form-horizontal', 'id' => 'search-result', 'method' => 'get', 'data-toggle' => 'validator')); ?>
        <div class="form-group">
            <div class="col-md-2">
                Exam<br/>
                <?php echo form_dropdown('examm', $exams, set_value('gender', (isset($eid) ? $eid : ''), TRUE), array('class' => 'form-control', 'id' => 'examm')); ?>
            </div>
            <div class="col-md-2">
                Class<br/>
                <?php echo form_dropdown('classs', $classes, set_value('gender', (isset($cid) ? $cid : ''), TRUE), array('class' => 'form-control', 'id' => 'classs')); ?>
            </div>
            <div class="col-md-2">
                Section<br/>
                <?php echo form_dropdown('section', $sections, set_value('gender', (isset($sid) ? $sid : ''), TRUE), array('class' => 'form-control', 'id' => 'section')); ?>
            </div>
            <!--<div class="col-md-2">
                Subject<br/>
                <?php echo form_dropdown('subject', $subjects, set_value('gender', (isset($subid) ? $subid : ''), TRUE), array('class' => 'form-control', 'id' => 'subject')); ?>
            </div>
            <div class="col-md-2">
                Group<br/>
                <?php echo form_dropdown('groupp', $groups, set_value('gender', (isset($sgid) ? $sgid : ''), TRUE), array('class' => 'form-control', 'id' => 'groupp')); ?>
            </div>-->
            <div class="col-md-2">
                Year<br/>
                <!--id="year"-->
                <select name="year" class="form-control">
                    <?php for($y = date('Y'); $y > 2013; $y--) { ?>
                    <option value="<?php echo $y; ?>"><?php echo $y; ?></option>
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
    <div class="col-md-12">
    </div>
    <div id="loadmessagehere"></div>
    <?php if($students): //owndebugger($students); ?>
    <a href="javascript:void(0)" onclick="printdiv('printresults')">
        <i class="fa fa-print" style="font-size: 22px;"></i>
    </a>

    <div id="printresults" class="col-md-12">
        <div id="modifyresult" class="col-md-12 col-xs-12 col-sm-12">
                <form method="post" action="result_processor">
                    <table id="table" class="table table-bordered">
                        <tr id="tr">
                            <th id="td">ID</th>
                            <th id="td">Name</th>
                            <th id="td">Roll</th>
                            <th id="td">Semester</th>
                            <th id="td">Grade</th>
                            <th id="td">CGPA</th>
                            <th id="td">Action</th>
                        </tr>

                        <?php foreach ($students as $student) { ?>
                        <tr>
                            <td><?php echo $student['UserId']; ?></td>
                            <td><?php echo tableSingleColumn('users', 'full_name_en', ['id' => $student['UserId']]) ?></td>
                            <td><?php echo $student['ClassRoll']; ?></td>
                            <td><?php echo tableSingleColumn('initial_settings_info', 'SettingsName', ['SettingsId' => @$this->input->get('examm')]) ?></td>
                            <td><?php echo global_results($student['UserId'], $this->input->get('examm'), $this->input->get('year'), 'grade') ?></td>
                            <td><?php echo global_results($student['UserId'], $this->input->get('examm'), $this->input->get('year'), 'cgpa') ?></td>
                            <td><a class='modalcursour' data-toggle='modal' data-target='#modal_body_<?php echo $student['UserId'] ?>'><i class='fa fa-envelope'></i></a></td>
                            <div class='modal fade' id='modal_body_<?php echo $student['UserId'] ?>' tabindex='-1' role='dialog' aria-hidden='true'>
                                <div class='modal-dialog' role='document'>
                                    <div class='modal-content'>
                                        <form>
                                            <div class='modal-header'>
                                                <h5 class='modal-title' id='exampleModalLongTitle'>
                                                    Over All Result
                                                    <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                                                </h5>
                                            </div>
                                            <div class='modal-body'>
<!--                                                    <div class="col-md-2"><b>Was Absent?</b></div>-->
<!--                                                    <div class="col-md-4"><b>Subject Name</b></div>-->
<!--                                                    <div class="col-md-1"><b>Written</b></div>-->
<!--                                                    <div class="col-md-1"><b>MCQ</b></div>-->
<!--                                                    <div class="col-md-1"><b>Practical</b></div>-->
<!--                                                    <div class="col-md-1"><b>Total</b></div>-->
<!--                                                    <div class="col-md-1"><b>Grade</b></div>-->
<!--                                                    <div class="col-md-1"><b>GPA</b></div>-->
                                                <?php echo global_results($student['UserId'], $this->input->get('examm'), $this->input->get('year'), 'all') ?>
                                            </div>
                                            <div class='modal-footer'>
                                                <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
                                                <button type='button' class='btn btn-primary'>Send Message</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </tr>
                        <?php  }  ?>


                        <tr id="tr">
                            <th id="td">ID</th>
                            <th id="td">Name</th>
                            <th id="td">Roll</th>
                            <th id="td">Semester</th>
                            <th id="td">Grade</th>
                            <th id="td">CGPA</th>
                            <th id="td">Action</th>
                        </tr>
                        <?php //echo $searchresults; ?>
<!--                        <tr>-->
<!--                            <td>100001</td>-->
<!--                            <td>Abdul</td>-->
<!--                            <td>19</td>-->
<!--                            <td>First</td>-->
<!--                            <td>Grade</td>-->
<!--                            <td>Cgpa</td>-->
<!--                            <td>Action</td>-->
<!--                        </tr>-->
                    </table>
                </form>
            </div>
    </div>
        <div class="row">
            <div class="col-lg-12 col-xs-12">
                <ul class="pagination" style="display: table;margin:auto;">
                    <li class="for_active">
                        <?php echo $paging; ?>
                    </li>
                </ul>
            </div>
        </div>
    <?php endif; ?>
</div>

<style>
    .modal-body {
        overflow-x: auto;
    }
</style>