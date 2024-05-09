<div class="row">
    <div class="col-md-8 col-sm-8 col-xs-8">
        <?php echo form_start_divs($title, 'manage show rooms'); ?>
        <?php echo form_open_multipart('', array('class' => 'form-horizontal', 'id' => 'addShowRoomForm', 'data-toggle' => 'validator')); ?>
        <input name="infosid" type="hidden"
               value="<?php __e((isset($pageinformation->ShowroomId) ? $pageinformation->ShowroomId : 'none')); ?>">
        <div class="form-group">
            <label class="col-lg-3">District</label>

            <div class="col-md-8">
                <?php
                echo form_dropdown('district', $districts, set_value('district', (isset($userinformation->District) ? $userinformation->District : '17'), TRUE), array('id' => 'districts', 'class' => 'districts form-control'));
                ?>
            </div>
        </div>

        <div class="form-group">
            <label class="col-lg-3">Upazila</label>

            <div class="col-md-8">
                <?php
                echo form_dropdown('upazila', $upazilas, set_value('upazila', (isset($pageinformation->Upazila) ? $pageinformation->Upazila : ''), TRUE), array('id' => 'upazila', 'class' => 'upazila form-control'));
                ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-3">Showroom Type</label>

            <div class="col-md-8">
                <?php
                $showrooms = array(
                    '1' => 'Regal Showrooms',
                    '2' => 'Regal with best buy',
                    '3' => 'Dealer'
                );
                echo form_dropdown('showroomtype', $showrooms, set_value('showroomtype', (isset($pageinformation->Shoptype) ? $pageinformation->Shoptype : ''), TRUE), array('id' => 'showroomtype', 'class' => 'form-control'));
                ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3">Showroom Name</label>

            <div class="col-md-8">
                <?php
                $data = array(
                    'name' => 'showroomname',
                    'id' => 'showroomname',
                    'class' => 'form-control',
                    'data-minlength' => '2',
                    'required' => 'required',
                    'value' => (isset($pageinformation->PageTitle) ? $pageinformation->PageTitle : '')
                );

                echo form_input($data);
                ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3">Showroom Address</label>

            <div class="col-md-8">
                <?php
                $data = array(
                    'name' => 'showroomaddress',
                    'id' => 'showroomaddress',
                    'class' => 'form-control',
                    'data-minlength' => '2',
                    'required' => 'required',
                    'value' => (isset($pageinformation->ShowroomAddress) ? $pageinformation->ShowroomAddress : '')
                );

                echo form_textarea($data);
                ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3">Showroom Phone Number</label>

            <div class="col-md-8">
                <?php
                $data = array(
                    'name' => 'showroomphone',
                    'id' => 'showroomphone',
                    'class' => 'form-control',
                    'data-minlength' => '2',
                    'required' => 'required',
                    'value' => (isset($pageinformation->Phone) ? $pageinformation->Phone : '')
                );

                echo form_input($data);
                ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3">Latitude</label>

            <div class="col-md-8">
                <?php
                $data = array(
                    'name' => 'latitude',
                    'id' => 'latitude',
                    'class' => 'form-control',
                    'data-minlength' => '2',
                    'value' => (isset($pageinformation->Latitude) ? $pageinformation->Latitude : '')
                );

                echo form_input($data);
                ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3">Longitude</label>

            <div class="col-md-8">
                <?php
                $data = array(
                    'name' => 'longitude',
                    'id' => 'longitude',
                    'class' => 'form-control',
                    'data-minlength' => '2',
                    'value' => (isset($pageinformation->Longitude) ? $pageinformation->Longitude : '')
                );

                echo form_input($data);
                ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3">Note (<small>if any</small>)</label>

            <div class="col-lg-8">
                <?php
                $data = array(
                    'name' => 'note',
                    'id' => 'note',
                    'class' => 'form-control',
                    'rows' => '5',
                    'cols' => '10',
                    'value' => (isset($userinformation->Note) ? $userinformation->Note : '')
                );
                echo form_textarea($data);
                ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3"></label>

            <div class="col-md-8">
                <input id="personalInfoBtn" class="btn btn-success" value="Save Changes" type="submit">
                <span></span>
                <input class="btn btn-default" value="Cancel" type="reset">
            </div>
        </div>
        <?php echo form_close(); ?>
        <?php echo form_end_divs(); ?>
    </div>
    <div class="col-md-4 col-sm-4 col-xs-4">
        <div style="max-height:1000px;overflow: auto;">
            <div class="panel panel-default">
                <div class="panel-heading">Filter Showroom</div>
                <div class="panel-body">
                    <div class="form-group">
                        <label class="col-lg-3">District</label>

                        <div class="col-md-8">
                            <?php
                            echo form_dropdown('district', $districts, set_value('district', (isset($userinformation->District) ? $userinformation->District : '17'), TRUE), array('id' => 'districts2', 'class' => 'districts form-control'));
                            ?>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-lg-3">Upazila</label>

                        <div class="col-md-8">
                            <?php
                            echo form_dropdown('upazila', $upazilas, set_value('upazila', (isset($pageinformation->Upazila) ? $pageinformation->Upazila : ''), TRUE), array('id' => 'upazila2', 'class' => 'upazila form-control'));
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <span class="showroomlist">
            <?php
            $i = 0;
            foreach ($get_showrooms as $showroom) {
                $i++;
                if ($i > 30)
                    break;
                ?>
                <div class="panel panel-default" id="showroom<?= $showroom->ShowroomId ?>">
                    <div class="panel-heading">
                        <span class="btn-group pull-right">
                           <!-- <a class="btn btn-primary btn-xs" onclick=""><i class="fa fa-pencil"></i></a> -->
                            <a class="btn btn-danger btn-xs" onclick="delete_showroom(<?= $showroom->ShowroomId ?>)"><i class="fa fa-trash"></i></a>
                        </span>
                        Id# <?= $showroom->ShowroomId ?>
                    </div>
                    <div class="panel-body">
                        <p><strong>Showroom Name</strong>: <?= $showroom->ShowroomName ?> </p>
                        <p><strong>Showroom type</strong>: <?php
                            switch ($showroom->Shoptype) {
                                case 1:
                                    echo "Regal Showrooms";
                                    break;
                                case 2:
                                    echo "Regal with best buy";
                                    break;
                                case 3:
                                    echo "Dealer";
                                    break;
                            }
                            ?> </p>    
                        <p><strong>Showroom Phone</strong>: <?= $showroom->Phone ?> </p>

                        <p><strong>Showroom Address</strong>: <?= $showroom->ShowroomAddress ?> </p>
                        <a target="_blank" class="btn pull-right btn-default" href="<?php echo 'https://www.google.com/maps/@' . $showroom->Longitude . ',' . $showroom->Latitude . ',15z'; ?>"><i class="fa fa-map-marker" aria-hidden="true"></i> Google map</a>

                        <p><strong>Latitude</strong>: <?= $showroom->Latitude ?> </p>
                        <p><strong>Longitude</strong>: <?= $showroom->Longitude ?> </p>
                    </div>

                </div>
            <?php } ?>
            </span>


        </div>
    </div>
</div>
