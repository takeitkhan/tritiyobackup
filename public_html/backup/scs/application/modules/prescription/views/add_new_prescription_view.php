<!--sidebar end-->
<!--main content start-->
<section id="main-content">
    <section class="wrapper site-min-height">
        <!-- page start-->
        <section class="panel">
            <header class="panel-heading">
                <?php
                if (!empty($prescription->id))
                    echo '<i class="fa fa-edit-circle"></i> ' . lang('edit_prescription');
                else
                    echo ' <i class="fa fa-plus-circle"></i> ' . lang('add_prescription');
                ?>
            </header>
            <div class="panel-body">
                <div class="adv-table editable-table ">
                    <div class="clearfix">
                        <div class="col-lg-12">
                            <section class="panel">
                                <div class="panel-body">
                                    <?php echo validation_errors(); ?>
                                    <form role="form" action="prescription/addNewPrescription" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1"> <?php echo lang('date'); ?></label>
                                            <input type="text" class="form-control" name="date" id="exampleInputEmail1" value='<?php
                                            if (!empty($prescription->name)) {
                                                echo $prescription->name;
                                            }
                                            ?>' placeholder="">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1"> <?php echo lang('patient'); ?></label>
                                            <select class="form-control m-bot15" name="patient" value=''>
                                                <?php foreach ($patients as $patient) { ?>
                                                    <option value="<?php echo $patient->id; ?>" <?php
                                                    if (!empty($prescription->patient)) {
                                                        if ($patient->id == $prescription->patient) {
                                                            echo 'selected';
                                                        }
                                                    }
                                                    ?> > <?php echo $patient->name; ?> </option>
                                                        <?php } ?> 
                                            </select>
                                        </div>
                                        <div class="form-group"> 
                                            <label for="exampleInputEmail1"> <?php echo lang('doctor'); ?></label>
                                            <select class="form-control m-bot15" name="doctor" value=''>
                                                <?php foreach ($doctors as $doctor) { ?>
                                                    <option value="<?php echo $doctor->id; ?>" <?php
                                                    if (!empty($prescription->doctor)) {
                                                        if ($doctor->id == $prescription->doctor) {
                                                            echo 'selected';
                                                        }
                                                    }
                                                    ?> > <?php echo $doctor->name; ?> </option>
                                                        <?php } ?> 
                                            </select>
                                        </div>

                                        <div class="form-group last"> 

                                            <label for="exampleInputEmail1"> Select Item</label>

                                            <div class="col-md-12">
                                                <select name="symptom[]" id="" class="multi-select" multiple="" id="my_multi_select3" >
                                                    <?php foreach ($symptoms as $symptom) { ?>
                                                        <option class="ooppttiioonn" value="<?php echo $symptom->id; ?>">

                                                            <?php echo $symptom->name; ?>
                                                        </option>
                                                    <?php }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label for="exampleInputEmail1"> <?php echo lang('advice'); ?></label>
                                            <input type="text" class="form-control" name="advice" id="exampleInputEmail1" value='<?php
                                            if (!empty($prescription->advice)) {
                                                echo $prescription->advice;
                                            }
                                            ?>' placeholder="">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1"> <?php echo lang('dd'); ?></label>
                                            <input type="text" class="form-control" name="dd" id="exampleInputEmail1" value='<?php
                                            if (!empty($prescription->dd)) {
                                                echo $prescription->dd;
                                            }
                                            ?>' placeholder="">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1"> <?php echo lang('medicine'); ?></label>
                                            <input type="text" class="form-control" name="medicine" id="exampleInputEmail1" value='<?php
                                            if (!empty($prescription->medicine)) {
                                                echo $prescription->medicine;
                                            }
                                            ?>' placeholder="">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1"> <?php echo lang('validity'); ?></label>
                                            <input type="text" class="form-control" name="validity" id="exampleInputEmail1" value='<?php
                                            if (!empty($prescription->validity)) {
                                                echo $prescription->validity;
                                            }
                                            ?>' placeholder="">
                                        </div>


                                        <input type="hidden" name="id" value='<?php
                                        if (!empty($prescription->id)) {
                                            echo $prescription->id;
                                        }
                                        ?>'>
                                        <button type="submit" name="submit" class="btn btn-info"> <?php echo lang('submit'); ?></button>
                                    </form>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- page end-->
    </section>
</section>
<!--main content end-->
<!--footer start-->
