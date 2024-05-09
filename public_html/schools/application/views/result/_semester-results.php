<div class="row">
    <div class="col-md-12 col-xs-12 col-sm-12">
        <?php echo form_start_divs('Classwise Subjects Result', 'One class, one semester with all subjects'); ?>
        <?php echo form_open_multipart('', array('class' => 'form-horizontal', 'id' => 'search-result', 'method' => 'get', 'data-toggle' => 'validator')); ?>
        <div class="form-group">
            <div class="col-md-2">
                Exam<br/>
                <?php echo form_dropdown('examm', $exams, set_value('gender', (isset($eid) ? $eid : ''), TRUE), array('class' => 'form-control', 'id' => 'examm', 'required' => 'required' )); ?>
            </div>
            <div class="col-md-2">
                Class<br/>
                <?php echo form_dropdown('classs', $classes, set_value('classs', (isset($cid) ? $cid : ''), TRUE), array('class' => 'form-control', 'id' => 'classs','required' => 'required')); ?>
            </div>
            <div class="col-md-2">
                Section<br/>
                <?php echo form_dropdown('section', $sections, set_value('section', (isset($sid) ? $sid : ''), TRUE), array('class' => 'form-control', 'id' => 'section','required' => 'required')); ?>
            </div>
            <!--<div class="col-md-2">
                Subject<br/>
                <?php echo form_dropdown('subject', $subjects, set_value('subject', (isset($subid) ? $subid : ''), TRUE), array('class' => 'form-control', 'id' => 'subject','required' => 'required')); ?>
            </div>
            <div class="col-md-2">
                Group<br/>
                <?php echo form_dropdown('groupp', $groups, set_value('groupp', (isset($sgid) ? $sgid : ''), TRUE), array('class' => 'form-control', 'id' => 'groupp','required' => 'required')); ?>
            </div>-->
            <div class="col-md-2">
                Year<br/>
                <!--id="year"-->
                <select name="year" class="form-control" required>
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
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Name</th>
                                                    <th>Roll</th>
                                                    <?php echo get_result_subjects($eid, $cid, $sid, $year); ?>
                                                    <th>Grade</th>
                                                    <th>CGPA</th>
                                                </tr>

                        <?php foreach ($students as $student) { ?>
                        <tr>
                            <td><?php echo $student['UserId']; ?></td>
                            <td><?php echo tableSingleColumn('users', 'full_name_en', ['id' => $student['UserId']]) ?></td>
                            <td><?php echo $student['ClassRoll']; ?></td>
                            <?php echo get_result_subjects_mark($student['UserId'], $eid, $cid, $sid, $year); ?>
                            <td><?php echo global_results($student['UserId'], $eid , $year, 'grade') ?></td>
                            <td><?php echo global_results($student['UserId'], $eid , $year, 'cgpa') ?></td>
                       </tr>
                        <?php  }  ?>

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
