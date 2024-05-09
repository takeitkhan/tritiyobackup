<div class="row">
    <div class="col-md-12 col-xs-12 col-sm-12">
        <?php echo form_start_divs($title, 'generate result here'); ?>
        <?php echo form_open_multipart('', array('class' => 'form-horizontal', 'id' => 'resultGenerateForm', 'data-toggle' => 'validator')); ?>
        
        <div class="form-group">
            <div class="col-md-2">
                Year<br/>
                <select name="year" id="year" class="form-control result-year">
                    <option value="">Select Year</option>
                    <?php for($y = date('Y'); $y > 2013; $y--) { 
                        $selected = $year == $y ? 'selected="selected"' : '' ; ?>
                    <option <?php echo $selected ; ?> value="<?php echo $y; ?>"><?php echo $y; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-md-2">
                Exam<br/>
                <?php echo form_dropdown('examm', $exams, set_value('examm', (isset($eid) ? $eid : ''), TRUE), array('class' => 'form-control exam-name', 'id' => 'examm')); ?>
            </div>
            <div class="col-md-2">
                Class<br/>
                <?php echo form_dropdown('classs', $classes, set_value('classs', (isset($cid) ? $cid : ''), TRUE), array('class' => 'form-control class-level', 'id' => 'classs')); ?>
            </div>
            <div class="col-md-2">
                Section<br/>
                <?php echo form_dropdown('section', $sections, set_value('section', (isset($sid) ? $sid : ''), TRUE), array('class' => 'form-control class-section', 'id' => 'section')); ?>
            </div>
            <div class="col-md-2">
                Group<br/>
                <?php echo form_dropdown('groupp', $groups, set_value('groupp', (isset($sgid) ? $sgid : ''), TRUE), array('class' => 'form-control group-label', 'id' => 'groupp')); ?>
            </div>
            <div class="col-md-2">
                Subject<br/>
                <?php echo form_dropdown('subject', '', set_value('subject', (isset($subid) ? $subid : ''), TRUE), array('class' => 'form-control subject', 'id' => 'subject')); ?>
                <?php //echo form_dropdown('subject', $subjects, set_value('subject', (isset($subid) ? $subid : ''), TRUE), array('class' => 'form-control subject', 'id' => 'subject')); ?>
            </div>
            <div class="col-md-12">
                <br/>
                <input id="resultGenerateBtn" class="btn btn-success result-generate" value="Generate and Edit" type="button">
                <a href="<?= base_url()?>generateresultview" class="btn btn-default">Cancel</a>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-10">
                <?php
                __e((isset($msg) == '0' ? '' : $msg));
                ?>
                <div id="marksmodified"></div>
                <div id="marksmodified_written"></div>
                <div id="marksmodified_mcq"></div>
                <div id="marksmodified_practical"></div>
            </div>
        </div>
        <?php echo form_close(); ?>
        <?php echo form_end_divs(); ?>
    </div>
    <?php if(isset($_GET['msg'])): ?>
<form method="POST" enctype="multipart/form-data">
      <input type="file" name="excelfile" class="col-md-2">
      <input type="submit" name="excelfiles" value="Import" class="btn btn-success">
</form>


    <div id="loadmessagehere"></div>
    <a href="/generateresultview?export=yes&<?= $_SERVER['QUERY_STRING'] ?>" target="_blank">
        <i class="fa fa-file-excel-o" style="font-size: 22px;" title="Export"></i>
    </a>
    <a href="javascript:void(0)" onclick="printdiv('printresults')" title="Print">
        <i class="fa fa-print" style="font-size: 22px;"></i>
    </a>
    
    <?php endif; ?>
    <div id="printresults" class="col-md-12">
        <?php if (isset($allresults)) { ?>
            <div id="modifyresult" class="col-md-12 col-xs-12 col-sm-12">
                <form method="post" action="result_processor">
                    <table id="table" class="table table-bordered">
                        <tr id="tr">
                            <th id="td">STD ID</th>
                            <th id="td">Name</th>
                            <th id="td">Roll</th>
                            <th id="td">Abs?</th>
                            <th id="td">Written</th>
                            <th id="td">MCQ</th>
                            <th id="td">Practical</th>
                        </tr>

                        <?php foreach ((array)$allresults as $result) {  //owndebugger($result);?>
                            <tr>
                                <td id="td">
                                    <?php __e($result['StudentId']); ?>
                                    <input id="stdid_<?php __e($result['ResultId']); ?>" name="stdid"
                                           data-id="<?php __e($result['ResultId']); ?>"
                                           class="form-control studentmark"
                                           value="<?php __e($result['StudentId']); ?>"
                                           type="hidden"
                                    />
                                </td>
                                <td id="td"><?= tableSingleColumn('users', 'full_name_en', ['id'=> $result['StudentId']]) ?></td>
                                <td id="td"><?php __e($result['ClassRoll']); ?></td>
                                <td id="td">
                                    <!-- <input id="isabsent_<?php __e($result['ResultId']); ?>" name="isabsent"
                                           data-id="<?php __e($result['ResultId']); ?>" class=""
                                           type="checkbox" value="1" /> -->
                                    <input class="absent" type="checkbox" name="isabsent" data-id="<?php __e($result['ResultId']); ?>" id="isabsent_<?php __e($result['ResultId']); ?>" <?php if($result['IsAbsent'] == 1) echo 'checked'; ?> >
                                </td>
                                <td id="td">
                                    <input <?php if($result['IsAbsent'] == 1) echo 'disabled'; ?> type="text"  max="<?= @tableSingleColumn('initial_settings_info', 'cq', ['SettingsId'=> @$this->input->get('subject')]) ?>" 
                                            id="written_<?php __e($result['ResultId']); ?>" 
                                            name="written"
                                            data-id="<?php __e($result['ResultId']); ?>"
                                            class="form-control studentmark written"
                                            value="<?php __e(!empty($result['Written']) ? $result['Written'] : 0); ?>" />
                                </td>
                                <td id="td">
                                    <input <?php if($result['IsAbsent'] == 1) echo 'disabled'; ?> max="<?= @tableSingleColumn('initial_settings_info', 'mcq', ['SettingsId'=> @$this->input->get('subject')]) ?>" 
                                            id="mcq_<?php __e($result['ResultId']); ?>"
                                            name="mcq"
                                            data-id="<?php __e($result['ResultId']); ?>"
                                            class="form-control studentmark mcq"
                                            value="<?php __e(!empty($result['MCQ']) ? $result['MCQ'] : 0);

                                           ?>" />
                                </td>
                                <td id="td">
                                    <input <?php if($result['IsAbsent'] == 1) echo 'disabled'; ?> max="<?= @tableSingleColumn('initial_settings_info', 'practical', ['SettingsId'=> @$this->input->get('subject')]) ?>" 
                                            id="practical_<?php __e($result['ResultId']); ?>"
                                            name="practical"
                                            data-id="<?php __e($result['ResultId']); ?>"
                                            class="form-control studentmark practical"
                                            value="<?php __e(!empty($result['Practical']) ? $result['Practical'] : 0); ?>" />
                                </td>
                       
                            </tr>
                        <?php } ?>
                    </table>
                </form>
            </div>
        <?php } ?>
    </div>
</div>
