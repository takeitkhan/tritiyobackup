<div class="container custom-container">
    <div class="row">
        <div class="col-md-5">
            <div class="x_panel">
                <div class="x_title">
                    <h2><?= @$title?></h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content" style="display: block;">
                    <?php echo message_box('success'); ?>
                    <?php echo message_box('error'); ?>
                        <form action="" method="post">
                            <div class="form-group ">
                                <label class="control-label">
                                    Designation
                                </label>
                                <input type="hidden" name="SettingsId" value="<?= @$single_item->SettingsId?>">
                                <input class="form-control" name="SettingsName" placeholder="Designation" required value="<?= @$single_item->SettingsName?>" type="text"/>
                            </div>
                            <div class="form-group ">
                                <label class="control-label">Type</label>
                                <select class="form-control" name="status_type">
                                    <option value="">Select</option>
                                    <option <?php if(@$single_item->status_type == 'teacher') echo 'selected'; ?> value="teacher">Teacher</option>
                                    <option <?php if(@$single_item->status_type == 'staff') echo 'selected'; ?> value="staff">Staff</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <div>
                                    <button class="btn btn-success" type="submit">
                                        Submit
                                    </button>
                                </div>
                            </div>
                        </form>
                </div>
            </div>
        </div>
        <div class="col-md-7">
            <div class="x_panel">
                <div class="x_title">
                  <ul class="nav nav-tabs navbar-left" style="border: 0;">
                    <li class="active"><a data-toggle="tab" href="#staff">Staff</a></li>
                    <li><a data-toggle="tab" href="#teachers">Teacher</a></li>
                  </ul>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content" style="display: block; min-height: 205px;">
                  <div class="tab-content">
                    <div id="staff" class="tab-pane fade in active">
                          <div class="col-md-12 pull-right" style="padding: 0">
                            <?php if(@$staffs): ?>
                                <table class="table table-bordered table-hover table-condensed table-striped" id="">
                                    <thead>
                                    <th>ID</th>
                                    <th>Designation</th>
                                 <!--    <th>Tax Amount</th>
                                    <th>Status</th> -->
                                    <th>Action</th>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($staffs as $item): ?>
                                    <tr>
                                            <td><?= $item->SettingsId;?></td>
                                            <td><?= $item->SettingsName;?></td>
                                            <td>
                                                <div class="btn-group btn-xs">
                                            
                                                    <a class="btn btn-xs btn-warning" href="<?php echo base_url("editdesignation/$item->SettingsId") ?>"><i class="fa fa-pencil fa-fw"></i></a>
                                                    <!-- <a href="<?php echo base_url("delete-tax/$item->id") ?>" onclick="confirm('Are you Sure ?')" class="btn btn-xs btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></a> -->
                                                </div>
                                            </td>
                                    </tr>
                                    <?php endforeach; ?>
                                    </tbody>
                                </table>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div id="teachers" class="tab-pane fade">
                        <div class="col-md-12 pull-right"  style="padding: 0; height: 400px;overflow: auto;" >
                            <?php if(@$teachers): ?>
                                <table class="table table-bordered table-hover table-condensed table-striped" id="">
                                    <thead>
                                    <th>ID</th>
                                    <th>Designation</th>
                                    <!-- <th>Tax Amount</th>
                                    <th>Status</th> -->
                                    <th>Action</th>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($teachers as $item): ?>
                                    <tr>
                                            <td><?= $item->SettingsId;?></td>
                                            <td><?= $item->SettingsName;?></td>
                                            <td>
                                                <div class="btn-group btn-xs">

                                                    <a class="btn btn-xs btn-warning" href="<?php echo base_url("editdesignation/$item->SettingsId") ?>"><i class="fa fa-pencil fa-fw"></i></a>
                                                    <!-- <a href="<?php echo base_url("delete-tax/$item->id") ?>" onclick="confirm('Are you Sure ?')" class="btn btn-xs btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></a> -->
                                                </div>
                                            </td>
                                    </tr>
                                    <?php endforeach; ?>
                                    </tbody>
                                </table>
                            <?php endif; ?>
                        </div>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>