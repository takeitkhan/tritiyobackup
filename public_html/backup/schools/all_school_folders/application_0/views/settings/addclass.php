<div class="msgbox"></div>
<div class="">

    <div class="row top_tiles" style="margin: 10px 0;">
        <div class="sidebar-widget">
            <h4><?php __e($title); ?></h4>

            <?php echo form_open_multipart('', array('class' => 'form-horizontal', 'id' => 'addClassForm')); ?>

            <div class="form-group">
                <label class="col-md-3">Class Name</label>

                <div class="col-lg-8">
                    <?php
                    $data = array(
                        'name' => 'classname',
                        'class' => 'form-control',
                        'id' => 'classname',
                        'required' => 'required',
                        'value' => ''
                    );
                    echo form_input($data);
                    ?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3">Class Description</label>

                <div class="col-lg-8">
                    <?php
                    $data = array(
                        'name' => 'classdescription',
                        'class' => 'form-control',
                        'id' => 'classdescription',
                        'required' => 'required',
                        'value' => '',
                        'rows' => '2',
                        'cols' => '10'
                    );
                    echo form_textarea($data);
                    ?>
                </div>
            </div>


            <input id="addClassBtn" class="btn btn-success" value="Save Changes"
                   type="submit">
            <input class="btn btn-default" value="Cancel" type="reset">
            <button type="button" class="btn btn-default" data-dismiss="modal">
                Close
            </button>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
</div>
</div>
<br/>