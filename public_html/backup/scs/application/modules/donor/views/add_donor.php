<!--sidebar end-->
<!--main content start-->
<section id="main-content">
    <section class="wrapper site-min-height">
        <!-- page start-->
        <section class="panel">
            <header class="panel-heading">
                <?php
                if (!empty($donor->id))
                    echo '<i class="fa fa-edit"></i> '. lang('add_donor');
                else
                    echo '<i class="fa fa-plus-circle"></i> '. lang('add_new_donor');
                ?>
            </header>
            <div class="panel-body">
                <div class="adv-table editable-table ">
                    <div class="clearfix">
                        <div class="col-lg-12">
                            <section class="panel">
                                <div class="panel-body">
                                    <?php echo validation_errors(); ?>
                                    <form role="form" action="donor/addDonor" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1"><?php echo lang('name'); ?></label>
                                            <input type="text" class="form-control" name="name" id="exampleInputEmail1" value='<?php
                                            if (!empty($donor->name)) {
                                                echo $donor->name;
                                            }
                                            ?>' placeholder="">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1"><?php echo lang('blood_group'); ?></label>
                                            <select class="form-control m-bot15" name="group" value=''>
                                                <?php foreach ($groups as $group) { ?>
                                                    <option value="<?php echo $group->group; ?>" <?php
                                                    if (!empty($donor->group)) {
                                                        if ($group->group == $donor->group) {
                                                            echo 'selected';
                                                        }
                                                    }
                                                    ?> > <?php echo $group->group; ?> </option>
                                                        <?php } ?> 
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1"><?php echo lang('age'); ?></label>
                                            <input type="text" class="form-control" name="age" id="exampleInputEmail1" value='<?php
                                            if (!empty($donor->age)) {
                                                echo $donor->age;
                                            }
                                            ?>' placeholder="">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1"><?php echo lang('sex'); ?></label>
                                            <select class="form-control m-bot15" name="sex" value=''>
                                                <option value="Male" <?php
                                                if (!empty($donor->sex)) {
                                                    if ($donor->sex == 'Male') {
                                                        echo 'selected';
                                                    }
                                                }
                                                ?> > Male </option>
                                                <option value="Female" <?php
                                                if (!empty($donor->sex)) {
                                                    if ($donor->sex == 'Female') {
                                                        echo 'selected';
                                                    }
                                                }
                                                ?> > Female </option>
                                                <option value="Others" <?php
                                                if (!empty($donor->sex)) {
                                                    if ($donor->sex == 'Others') {
                                                        echo 'selected';
                                                    }
                                                }
                                                ?> > Others </option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1"><?php echo lang('last_donation_date'); ?></label>
                                            <input class="form-control form-control-inline input-medium default-date-picker" type="text" name="ldd" value="<?php
                                            if (!empty($donor->ldd)) {
                                                echo $donor->ldd;
                                            }
                                            ?>" placeholder="">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1"><?php echo lang('phone'); ?></label>
                                            <input type="text" class="form-control" name="phone" id="exampleInputEmail1" value='<?php
                                            if (!empty($donor->phone)) {
                                                echo $donor->phone;
                                            }
                                            ?>' placeholder="">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1"><?php echo lang('email'); ?></label>
                                            <input type="text" class="form-control" name="email" id="exampleInputEmail1" value='<?php
                                            if (!empty($donor->email)) {
                                                echo $donor->email;
                                            }
                                            ?>' placeholder="">
                                        </div>

                                        <input type="hidden" name="id" value='<?php
                                        if (!empty($donor->id)) {
                                            echo $donor->id;
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
