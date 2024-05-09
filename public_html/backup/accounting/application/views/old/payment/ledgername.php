<div class="row">
    <div class="col-md-12 col-xs-12 col-sm-12">
        <?php echo form_start_divs($title, 'Add new payment'); ?>
        <?php echo form_open_multipart('modifybasicprofile', array('class' => 'form-horizontal', 'id' => 'ledgerGroupForm', 'data-toggle' => 'validator')); ?>
        <div class="form-group">
            <label class="col-lg-3">Ledger Type</label>

            <div class="col-md-8">
                <?php echo form_dropdown('ledgertype', $ledgertype, '', array('class' => 'form-control')); ?>
            </div>
        </div>

        <div class="form-group">
            <label class="col-lg-3">Ledger Name</label>

            <div class="col-md-8">
                <?php
                $data = array(
                    'name' => 'ledgername',
                    'id' => 'ledgername',
                    'class' => 'form-control',
                    'required' => 'required',
                    'value' => ''
                );
                echo form_input($data);
                ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-3">Ledger Name (in Bengali)</label>

            <div class="col-md-8">
                <?php
                $data = array(
                    'name' => 'ledgernamebn',
                    'id' => 'ledgernamebn',
                    'class' => 'form-control',
                    'required' => 'required',
                    'value' => ''
                );
                echo form_input($data);
                ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3"></label>

            <div class="col-md-8">
                <input id="ledgerGroupBtn" class="btn btn-success" value="Save Changes"
                       type="submit">
                <span></span>
                <input class="btn btn-default" value="Cancel" type="reset">
            </div>
        </div>
        <?php echo form_close(); ?>
        <?php echo form_end_divs(); ?>
    </div>
</div>
