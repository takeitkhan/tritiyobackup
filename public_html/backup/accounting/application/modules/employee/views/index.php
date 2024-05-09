<div class="container">
    <div class="row">
        <div class="col-md-12 col-xs-12 col-sm-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2><?= @$title; ?>
                        <small>search employee&nbsp;&nbsp; <a href="<?= base_url() ?>addemployee"
                                                               class="btn btn-success">Add New</a></small>
                    </h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content" style="display: block;">
                    <?php echo message_box('success'); ?>
                    <?php echo message_box('error'); ?>
                    
                    <br>
                    <form action="" class="form-horizontal" id="customer_search" method="get" data-toggle="validator"
                          enctype="multipart/form-data" accept-charset="utf-8">
                        <div class="form-group">
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <input value="<?php echo @$this->input->get('title') ?>" class="form-control" name="title"
                                           placeholder="ID or Name Or Email or Phone or Address" type="text"/>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <select class="form-control" name="status">
                                    <?php echo statusCheck(@$this->input->get('status')) ?>
                                </select>
                            </div>

                            <div class="col-md-3">
                                <input class="btn btn-success" value="Search" type="submit">
                                <span></span>
                                <a class="btn btn-default" href="">Clear</a>
                            </div>
                        </div>
                    </form>
                    <div class="col-md-12 tableoutput" style="padding: 0;">
                        <div class="x_content" style="display: block;">
                            <?php if (!empty($emps)): ?>
                                <div class="table-responsive">
                                    <table class="table table-striped talbe-bordered" id="post-list">
                                        <thead class="thead-inverse">
                                        <tr>
                                            <td>ID</td>
                                            <td>Employee Number</td>
                                            <td>Name</td>
                                            <td>Email</td>
                                            <td>Address</td>
                                            <td>Phone</td>
                                            <td>Action</td>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        <?php foreach ($emps as $emp): ?>
                                            <tr>
                                                <td><?= @$emp->id ?></td>
                                                <td><?= @$emp->employee_no ?></td>
                                                <td><?= @$emp->name ?></td>
                                                <td><?= @$emp->email ?></td>
                                                <td><?= @$emp->address ?></td>
                                                <td><?= @$emp->contact ?></td>
                                                <td>
                                                    <div class="btn-group btn-xs">
                                                        <a class="btn btn-xs btn-default" data-toggle="modal"
                                                           data-target="#modal_message_body_<?= @$emp->id ?>"><i
                                                                    class="fa fa-envelope"></i></a>&nbsp;
                                                        <a class="btn btn-xs btn-warning" href="<?php echo base_url("editemployee/$emp->id") ?>"><i
                                                                    class="fa fa-pencil fa-fw"></i></a>&nbsp;
                                                        <a class="btn btn-xs btn-info" data-toggle="modal"
                                                           data-target="#modal_preview_body_<?= @$emp->id ?>"><i
                                                                    class="fa fa-eye fa-fw"></i></a>&nbsp;&nbsp;
                                                        <a class="btn btn-xs btn-success" onclick="printdiv('printdiv_<?= @$emp->id ?>')"><i class="fa fa-print" aria-hidden="true"></i></a>&nbsp;
                                                        <a href="<?php echo base_url("deleteemployee/$emp->id") ?>" onclick="confirm('Are you Sure ?')" class="btn btn-xs btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>

                                        </tbody>
                                        <thead>
                                        <tr>
                                            <td>ID</td>
                                            <td>Employee Number</td>
                                            <td>Name</td>
                                            <td>Email</td>
                                            <td>Address</td>
                                            <td>Phone</td>
                                            <td>Action</td>
                                        </tr>
                                        </thead>
                                    </table>
                                </div>
                            <?php else: ?>
                                <?php set_message('warning',  "Not Found") ?>
                                <?php echo message_box('warning'); ?>
                            <?php endif; ?>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-xs-12">
                                <ul class="pagination" style="display: table;margin:auto;">
                                    <?= $paging; ?>
                                </ul>
                            </div>
                        </div>
                        <div class="row">
                            <?php if (!empty($emps)):$i = 1;foreach ($emps as $emp): ?>
                                <?php echo printHeader($emp->id, 'Employee Preview'); ?>
                                <table style="width:78%; float: left; font-weight: bold; border-collapse: collapse; font-size: 12px; font-family: 'Trebuchet MS', sans-serif;">
                                    <tr>
                                        <td style="border: 1px solid #DDD; padding:  5px 15px; width: 30%;">Name</td>
                                        <td style="border: 1px solid #DDD; padding:  5px 15px; width: 70%;"><?= @$emp->name ?></td>
                                    </tr>
                                    <tr>
                                        <td style="border: 1px solid #DDD; padding:  5px 15px; width: 30%;">Employee No.</td>
                                        <td style="border: 1px solid #DDD; padding:  5px 15px; width: 70%;"><?= @$emp->employee_no ?></td>
                                    </tr>
                                    <tr>
                                        <td style="border: 1px solid #DDD; padding:  5px 15px; width: 30%;">Contact Number</td>
                                        <td style="border: 1px solid #DDD; padding:  5px 15px; width: 70%;"><?= @$emp->contact ?></td>
                                    </tr>
                                    <tr>
                                        <td style="border: 1px solid #DDD; padding:  5px 15px; width: 30%;">Email</td>
                                        <td style="border: 1px solid #DDD; padding:  5px 15px; width: 70%;"><?= @$emp->email ?></td>
                                    </tr>

                                    <tr>
                                        <td style="border: 1px solid #DDD; padding:  5px 15px; width: 30%;">Address</td>
                                        <td style="border: 1px solid #DDD; padding:  5px 15px; width: 70%;"><?= @$emp->address ?></td>
                                    </tr>

                                    <tr>
                                        <td style="border: 1px solid #DDD; padding:  5px 15px; width: 30%;">City</td>
                                        <td style="border: 1px solid #DDD; padding:  5px 15px; width: 70%;"><?= @$emp->city ?></td>
                                    </tr>
                                    <tr>
                                        <td style="border: 1px solid #DDD; padding:  5px 15px; width: 30%;">State</td>
                                        <td style="border: 1px solid #DDD; padding:  5px 15px; width: 70%;"><?= @$emp->state ?></td>
                                    </tr>
                                    <tr>
                                        <td style="border: 1px solid #DDD; padding:  5px 15px; width: 30%;">Zip Code</td>
                                        <td style="border: 1px solid #DDD; padding:  5px 15px; width: 70%;"><?= @$emp->zip ?></td>
                                    </tr>


                                    <tr>
                                        <td style="border: 1px solid #DDD; padding:  5px 15px; width: 30%;">Status</td>
                                        <td style="border: 1px solid #DDD; padding:  5px 15px; width: 70%;"><?= @$emp->status ?></td>
                                    </tr>
                                </table>
                                <?php echo printFooter(); ?>

                                <div class="modal fade" id="modal_message_body_<?= @$emp->id ?>"
                                     tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="exampleModalLongTitle">
                                                    Send Message
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close"><span
                                                                aria-hidden="true">×</span></button>
                                                </h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label>Phone Number</label>
                                                    <input name="phonenumber"
                                                           value="<?= @$emp->contact ?>"
                                                           class="form-control" readonly="readonly"
                                                           type="text">
                                                </div>
                                                <div class="form-group">
                                                    <label>Message</label>
                                                    <textarea name="message"
                                                              placeholder="Enter Your Message" cols="40"
                                                              rows="2" class="form-control"></textarea>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Close
                                                </button>
                                                <button type="button" class="btn btn-primary">Send Message
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal fade" id="modal_preview_body_<?= @$emp->id ?>"
                                     tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="exampleModalLongTitle">
                                                    Employee Preview
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close"><span
                                                                aria-hidden="true">×</span></button>
                                                </h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="preview-data">
                                                    <div class="col-md-12 preview-single-row">
                                                        <div class="col-md-2 preview-lebel">
                                                            <b>Name</b>
                                                        </div>
                                                        <div class="col-md-10 preview-content">
                                                            <?= @$emp->name ?>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 preview-single-row">
                                                        <div class="col-md-2 preview-lebel">
                                                            <b>Employee No.</b>
                                                        </div>
                                                        <div class="col-md-10 preview-content">
                                                            <?= @$emp->employee_no ?>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 preview-single-row">
                                                        <div class="col-md-2 preview-lebel">
                                                            <b>Contact Number</b>
                                                        </div>
                                                        <div class="col-md-10 preview-content">
                                                            <?= @$emp->contact ?>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 preview-single-row">
                                                        <div class="col-md-2 preview-lebel">
                                                            <b>Email </b>
                                                        </div>
                                                        <div class="col-md-10 preview-content">
                                                            <?= @$emp->email ?>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12 preview-single-row">
                                                        <div class="col-md-2 preview-lebel">
                                                            <b>Address</b>
                                                        </div>
                                                        <div class="col-md-10 preview-content">
                                                            <?= @$emp->address ?>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12 preview-single-row">
                                                        <div class="col-md-2 preview-lebel">
                                                            <b>City</b>
                                                        </div>
                                                        <div class="col-md-10 preview-content">
                                                            <?= @$emp->city ?>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 preview-single-row">
                                                        <div class="col-md-2 preview-lebel">
                                                            <b>State</b>
                                                        </div>
                                                        <div class="col-md-10 preview-content">
                                                            <?= @$emp->state ?>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 preview-single-row">
                                                        <div class="col-md-2 preview-lebel">
                                                            <b>Zip Code</b>
                                                        </div>
                                                        <div class="col-md-10 preview-content">
                                                            <?= @$emp->zip ?>
                                                        </div>
                                                    </div>


                                                    <div class="col-md-12 preview-single-row">
                                                        <div class="col-md-2 preview-lebel">
                                                            <b>Status</b>
                                                        </div>
                                                        <div class="col-md-10 preview-content">
                                                            <?= @$emp->status ?>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 preview-single-row last">
                                                        <div class="col-md-2 preview-lebel">
                                                            <b>Activity</b>
                                                        </div>
                                                        <div class="col-md-10 preview-content">
                                                            <?= @$emp->activity ?>
                                                        </div>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Close
                                                </button>
                                                <button type="button" class="btn btn-primary">Send Message
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach;endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
