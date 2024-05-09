<!--sidebar end-->
<!--main content start-->
<section id="main-content">
    <section class="wrapper site-min-height">
        <!-- page start-->
        <section class="panel">
            <header class="panel-heading">
                <?php
                if (!empty($symptom->id))
                    echo '<i class="fa fa-edit-circle"></i> '.lang('edit_symptom');
                else
                    echo ' <i class="fa fa-plus-circle"></i> '.lang('add_symptom');
                ?>
            </header>
            <div class="panel-body">
                <div class="adv-table editable-table ">
                    <div class="clearfix">
                        <div class="col-lg-12">
                            <section class="panel">
                                <div class="panel-body">
                                    <?php echo validation_errors(); ?>
                                    <form role="form" action="prescription/symptom/addNewSymptom" method="post" enctype="multipart/form-data">
                                        
                                        
                                         <div class="form-group">
                                            <label for="exampleInputEmail1"> <?php  echo lang('patient'); ?></label>
                                            <select class="form-control m-bot15" name="patient" value=''>
                                                <?php foreach ($patients as $patient) { ?>
                                                    <option value="<?php echo $patient->id; ?>" <?php
                                                    if (!empty($symptom->patient)) {
                                                        if ($patient->id == $symptom->patient) {
                                                            echo 'selected';
                                                        }
                                                    }
                                                    ?> > <?php echo $patient->name; ?> </option>
                                                        <?php } ?> 
                                            </select>
                                        </div>
                                        
                                        
                                        <div class="form-group">
                                            <label for="exampleInputEmail1"> <?php  echo lang('name'); ?></label>
                                            <input type="text" class="form-control" name="name" id="exampleInputEmail1" value='<?php
                                            if (!empty($symptom->name)) {
                                                echo $symptom->name;
                                            }
                                            ?>' placeholder="">
                                        </div>
                                       
                                       
                                       
                                      

                                        <input type="hidden" name="id" value='<?php
                                        if (!empty($symptom->id)) {
                                            echo $symptom->id;
                                        }
                                        ?>'>
                                        <button type="submit" name="submit" class="btn btn-info"> <?php  echo lang('submit'); ?></button>
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
