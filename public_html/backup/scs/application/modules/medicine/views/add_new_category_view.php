<!--sidebar end--> 
<!--main content start-->
<section id="main-content">
    <section class="wrapper site-min-height">
        <!-- page start-->
        <section class="panel">
            <header class="panel-heading">
                <?php  
                if (!empty($medicine->id))
                    echo '<i class="fa fa-edit-circle"></i> '. lang('edit_medidine_category');
                else
                    echo '<i class="fa fa-plus-circle"></i> '. lang('add_new_medicine_category');
                ?>
            </header>
            <div class="panel-body">
                <div class="adv-table editable-table ">
                    <div class="clearfix">
                        <div class="col-lg-12">
                            <section class="panel">
                                <div class="panel-body">
                                    <?php echo validation_errors(); ?>
                                    <form role="form" action="medicine/addNewCategory" method="post" enctype="multipart/form-data">
                                        <div class="form-group"> 
                                            <label for="exampleInputEmail1"><?php echo lang('category'); ?></label>
                                            <input type="text" class="form-control" name="category" id="exampleInputEmail1" value='<?php
                                            if (!empty($medicine->category)) {
                                                echo $medicine->category;
                                            }
                                            ?>' placeholder="">    
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1"><?php echo lang('description'); ?></label>
                                            <input type="text" class="form-control" name="description" id="exampleInputEmail1" value='<?php
                                            if (!empty($medicine->description)) {
                                                echo $medicine->description;
                                            }
                                            ?>' placeholder="">
                                        </div>
                                        <input type="hidden" name="id" value='<?php
                                        if (!empty($medicine->id)) {
                                            echo $medicine->id;
                                        }
                                        ?>'>
                                        <button type="submit" name="submit" class="btn btn-info"><?php echo lang('submit'); ?></button>
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
