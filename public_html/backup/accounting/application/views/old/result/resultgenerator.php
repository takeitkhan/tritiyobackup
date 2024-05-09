<div class="row">
    <div class="col-md-12 col-xs-12 col-sm-12">
        <?php echo form_start_divs($title, 'generate result here'); ?>
        <?php echo form_open_multipart('', array('class' => 'form-horizontal', 'id' => 'resultGenerateForm', 'data-toggle' => 'validator')); ?>
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
            <div class="col-md-2">
                Subject<br/>
                <?php echo form_dropdown('subject', $subjects, set_value('gender', (isset($subid) ? $subid : ''), TRUE), array('class' => 'form-control', 'id' => 'subject')); ?>
            </div>
            <div class="col-md-2">
                Group<br/>
                <?php echo form_dropdown('groupp', $groups, set_value('gender', (isset($sgid) ? $sgid : ''), TRUE), array('class' => 'form-control', 'id' => 'groupp')); ?>
            </div>
            <div class="col-md-2">
                Year<br/>
                <select name="year" id="year" class="form-control">
                    <?php for($y = date('Y'); $y > 2013; $y--) { ?>
                    <option value="<?php echo $y; ?>"><?php echo $y; ?></option>
                    <?php } ?>
                </select>
            </div>

            <div class="col-md-2">
                <br/>
                <input id="resultGenerateBtn" class="btn btn-success" value="Generate and Edit" type="button">
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
    <a href="javascript:void(0)" onclick="printdiv('printresults')">
        <i class="fa fa-print" style="font-size: 22px;"></i>
    </a>
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
<!--                            <th id="td">Listening</th>-->
<!--                            <th id="td">Writting</th>-->
<!--                            <th id="td">Speaking</th>-->
<!--                            <th id="td">Reading</th>-->
                        </tr>

                        <?php foreach ((array)$allresults as $result) { ?>
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
                                <td id="td"><?php __e($result['StudentName']); ?></td>
                                <td id="td"><?php __e($result['ClassRoll']); ?></td>
                                <td id="td">
                                    <input id="isabsent_<?php __e($result['ResultId']); ?>" name="isabsent"
                                           data-id="<?php __e($result['ResultId']); ?>" class="studentmark"
                                           type="checkbox" value="1" />
                                </td>
                                <td id="td">
                                    <input id="written_<?php __e($result['ResultId']); ?>" name="written"
                                           data-id="<?php __e($result['ResultId']); ?>"
                                           class="form-control studentmark"
                                           value="<?php __e(!empty($result['Written']) ? $result['Written'] : 0); ?>" />
                                </td>
                                <td id="td">
                                    <input id="mcq_<?php __e($result['ResultId']); ?>" name="mcq"
                                           data-id="<?php __e($result['ResultId']); ?>"
                                           class="form-control studentmark"
                                           value="<?php __e(!empty($result['MCQ']) ? $result['MCQ'] : 0); ?>" />
                                </td>
                                <td id="td">
                                    <input id="practical_<?php __e($result['ResultId']); ?>" name="practical"
                                           data-id="<?php __e($result['ResultId']); ?>"
                                           class="form-control studentmark"
                                           value="<?php __e(!empty($result['Practical']) ? $result['Practical'] : 0); ?>" />
                                </td>
                                <!--<td id="td">
                                    <input id="listening_<?php __e($result['ResultId']); ?>" name="listening"
                                           data-id="<?php __e($result['ResultId']); ?>"
                                           class="form-control studentmark"
                                           value="<?php __e(!empty($result['Listening']) ? $result['Listening'] : 0); ?>" />
                                </td>
                                <td id="td">
                                    <input id="writting_<?php __e($result['ResultId']); ?>" name="writting"
                                           data-id="<?php __e($result['ResultId']); ?>"
                                           class="form-control studentmark"
                                           value="<?php __e(!empty($result['Writting']) ? $result['Writting'] : 0); ?>" />
                                </td>
                                <td id="td">
                                    <input id="speaking_<?php __e($result['ResultId']); ?>" name="speaking"
                                           data-id="<?php __e($result['ResultId']); ?>"
                                           class="form-control studentmark"
                                           value="<?php __e(!empty($result['Speaking']) ? $result['Speaking'] : 0); ?>" />
                                </td>
                                <td id="td">
                                    <input id="reading_<?php __e($result['ResultId']); ?>" name="reading"
                                           data-id="<?php __e($result['ResultId']); ?>"
                                           class="form-control studentmark"
                                           value="<?php __e(!empty($result['Reading']) ? $result['Reading'] : 0); ?>" />
                                </td> --->
                            </tr>
                        <?php } ?>
                    </table>
                </form>
            </div>
        <?php } ?>
    </div>
</div>
