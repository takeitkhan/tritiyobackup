<div class="row">
    <div class="col-md-12 col-xs-12 col-sm-12">

        <?php $this->load->view('profile/layouts/editormenu'); ?>
        <?php echo form_start_divs($title, 'Business Information' . (isset($userinformation->full_name_en) ? ' of ' . $userinformation->full_name_en . ', ' . (isset($groupname) ? $groupname : '') : '')); ?>
        <button type="button" class="btn btn-success" data-toggle="modal"
                data-target="#addEducationModal">Add Business
        </button>
        <?php foreach ((array)$businesses as $userinformation): ?>
            <?php if (isset($userinformation)) { ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <h5>
                                <strong>
                                    <a href="<?php echo(isset($userinformation->OrganizationURL) ? $userinformation->OrganizationURL : ''); ?>"
                                       target="_blank">
                                        <?php echo(isset($userinformation->OrganizationName) ? $userinformation->OrganizationName : ''); ?>
                                    </a>
                                </strong>
                            </h5>
                        </div>
                        <div class="row">

                            <span><?php echo(isset($userinformation->OrganizationCity) ? $userinformation->OrganizationCity : ''); ?></span>
                            <?php echo(isset($userinformation->StartDate) ? ' | ' . $userinformation->StartDate : ''); ?>
                            <?php if (isset($userinformation->BusinessId)) { ?>
                                <a href="javascript:void(0)"
                                   class="btn btn-danger pull-right"
                                   onclick="ajaxRemoveFn(<?php __e($userinformation->BusinessId); ?>, 'deletebusiness/<?php __e($userinformation->BusinessId); ?>')"><span
                                        class="fa fa-times"></span></a>
                            <?php } ?>
                        </div>
                        <div class="tenpxm"></div>
                        <div class="row">
                            <?php echo(isset($userinformation->Services) ? $userinformation->Services : ''); ?>
                        </div>
                    </div>
                </div>
                <hr/>
            <?php } ?>
        <?php endforeach; ?>
        <?php echo form_end_divs(); ?>
    </div>
</div>


<div class="modal fade" id="addEducationModal" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <?php echo form_open_multipart('', array('class' => 'form-horizontal', 'id' => 'addBusinessForm')); ?>
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"
                        aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Add New Business</h4>
            </div>
            <div class="modal-body">
                <input name="userid" type="hidden" value="<?php __e((isset($userid) ? $userid : 0)); ?>">

                <div class="form-group">
                    <label class="col-md-4">Green Directory Category</label>

                    <div class="col-md-7">
                        <?php echo form_dropdown('categoryid', $categories, set_value('countryid', (isset($categories->CategoryId) ? $categories->CategoryId : ''), TRUE), array('class' => 'form-control')); ?>
                        <?php //__smallnote('Choose a Category for your project to be seen in our Green Directory'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4">Organization Name</label>

                    <div class="col-md-7">
                        <?php
                        $data = array(
                            'name' => 'organizationname',
                            'id' => 'organizationname',
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
                    <label class="col-md-4">Organization Website</label>

                    <div class="col-md-7">
                        <?php
                        $data = array(
                            'name' => 'organizationurl',
                            'id' => 'organizationurl',
                            'class' => 'form-control',
                            //'required' => 'required',
                            'type' => 'url',
                            'value' => ''
                        );

                        echo form_input($data);
                        ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4">Organization City</label>

                    <div class="col-md-7">
                        <?php
                        $data = array(
                            'name' => 'organizationcity',
                            'id' => 'organizationcity',
                            'class' => 'form-control',
                            'required' => 'required',
                            //'type' => 'email',
                            //'readonly' => 'true',
                            'value' => ''
                        );

                        echo form_input($data);
                        ?>
                        <?php //echo form_dropdown('countryid', $countries, set_value('countryid', (isset($userinformation->CountryId) ? $userinformation->CountryId : ''), TRUE), array('class' => 'form-control')); ?>
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
                    <label
                        class="col-md-4">Services <?php __smallnote('(Comma Separated)') ?></label>

                    <div class="col-md-7">
                        <?php
                        $data = array(
                            'name' => 'services',
                            'class' => 'form-control',
                            'id' => 'services',
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
                <div class="form-group">
                    <label class="col-md-4">Notes</label>

                    <div class="col-md-7">
                        <?php
                        $data = array(
                            'name' => 'notes',
                            'class' => 'form-control',
                            'id' => 'notes',
                            'data-match-error' => 'Whoops, it is not an valid phone.',
                            'value' => '',
                            'rows' => '3',
                            'cols' => '10'
                        );
                        echo form_textarea($data);
                        ?>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <input id="addEducationBtn" class="btn btn-success" value="Save Changes"
                       type="submit">
                <input class="btn btn-default" value="Cancel" type="reset">
                <button type="button" class="btn btn-default" data-dismiss="modal">
                    Close
                </button>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
