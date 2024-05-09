<div class="row">
    <div class="col-md-12 col-xs-12 col-sm-12">
        <?php $this->load->view('profile/layouts/editormenu'); ?>
        <?php echo form_start_divs($title, 'Work & Business Information' . (isset($userinformation->full_name_en) ? ' of ' . $userinformation->full_name_en . ', ' . (isset($groupname) ? $groupname : '') : '')); ?>
        <button type="button" class="btn btn-success" data-toggle="modal"
                data-target="#addWorkModal">Add Work & Business History
        </button>
        <?php foreach ((array)$workhistory as $userinformation): ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <h5>
                            <?php echo(isset($userinformation->Position) ? $userinformation->Position : ''); ?>
                            <?php //echo(isset($userinformation->WorkId) ? $userinformation->WorkId : ''); ?>
                        </h5>
                    </div>
                    <div class="row">
                        <span><?php echo(isset($userinformation->Organization) ? $userinformation->Organization : ''); ?></span>
                        <?php echo(isset($userinformation->StartDate) ? ' | ' . $userinformation->StartDate . ' - ' : ''); ?>
                        <?php echo(isset($userinformation->EndDate) ? $userinformation->EndDate : ''); ?>
                        <?php if (isset($userinformation->WorkId)) { ?>
                            <a href="javascript:void(0)" class="btn btn-danger pull-right"
                               onclick="ajaxRemoveFn(<?php __e($userinformation->WorkId); ?>, 'deletework/<?php __e($userinformation->WorkId); ?>')"><span
                                    class="fa fa-times"></span></a>
                        <?php } ?>
                    </div>
                    <div class="row">
                        <?php echo(isset($userinformation->Responsibilities) ? $userinformation->Responsibilities : ''); ?>
                    </div>
                    <div class="tenpxm"></div>
                </div>
            </div>
        <?php endforeach; ?>
        <?php echo form_end_divs(); ?>
    </div>
</div>
<div class="modal fade" id="addWorkModal" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <?php echo form_open_multipart('', array('class' => 'form-horizontal', 'id' => 'addWorkHistoryForm')); ?>
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"
                        aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Add New Work</h4>
            </div>
            <div class="modal-body">
                <input name="userid" type="hidden"
                       value="<?php __e((isset($userid) ? $userid : 0)); ?>">

                <div class="form-group">
                    <label class="col-md-4">Company/Organization</label>

                    <div class="col-md-7">
                        <?php
                        $data = array(
                            'name' => 'organization',
                            'id' => 'organization',
                            'class' => 'form-control',
                            'data-minlength' => '4',
                            'required' => 'required',
                            'value' => ''
                        );

                        echo form_input($data);
                        ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4">Position</label>

                    <div class="col-md-7">
                        <?php
                        $data = array(
                            'name' => 'position',
                            'id' => 'position',
                            'class' => 'form-control',
                            'required' => 'required',
                            //'type' => 'email',
                            //'readonly' => 'true',
                            'value' => ''
                        );

                        echo form_input($data);
                        ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4">Start Date</label>

                    <div class="col-md-7">
                        <?php
                        $data = array(
                            'name' => 'startdate',
                            'id' => 'date',
                            'class' => 'form-control',
                            'required' => 'required',
                            'value' => ''
                        );

                        echo form_input($data);
                        ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4">End Date</label>

                    <div class="col-md-7">
                        <?php
                        $data = array(
                            'name' => 'enddate',
                            'id' => 'date1',
                            'class' => 'form-control',
//                                                'required' => 'required',
                            'value' => ''
                        );

                        echo form_input($data);
                        ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4">Responsibilities</label>

                    <div class="col-md-7">
                        <?php
                        $data = array(
                            'name' => 'responsibilities',
                            'class' => 'form-control',
                            'id' => 'responsibilities',
                            'data-match-error' => 'Whoops, it is not an valid phone.',
                            'required' => 'required',
                            'value' => '',
                            'rows' => '5',
                            'cols' => '10'
                        );
                        echo form_textarea($data);
                        ?>
                    </div>
                </div>
                <div class="modal-footer">
                    <input id="addWorkBtn" class="btn btn-success" value="Save Changes"
                           type="submit">
                    <input class="btn btn-default" value="Cancel" type="reset">
                    <button type="button" class="btn btn-default" data-dismiss="modal">
                        Close
                    </button>
                </div>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>