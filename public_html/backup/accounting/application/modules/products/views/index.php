<div class="container">
    <div class="row">
        <div class="col-md-12 col-xs-12 col-sm-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2><?= @$title; ?>
                        <small>search products&nbsp;&nbsp; <a href="<?= base_url() ?>addproduct"
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
                            <div class="col-md-3">
                                <div class="form-group ">
                                    <input value="<?php echo @$this->input->get('title') ?>" class="form-control" name="title"
                                           placeholder="ID/Name/Sku/Ean/Mpn/Isbn" type="text"/>
                                    <p>&nbsp;</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <select class="form-control" name="brand">
                                    <option value="">Brands</option>
                                    <option>1</option>
                                </select>
                                <p>&nbsp;</p>
                            </div>
                            <div class="col-md-3">
                                <select class="form-control" name="manufacturer ">
                                    <option value="">Manufacturers </option>
                                    <option>1</option>
                                </select>
                                <p>&nbsp;</p>
                            </div>
                            <div class="col-md-3">
                                <select class="form-control" name="unit">
                                    <option value="">Vendors</option>
                                    <option>1</option>
                                </select>
                                <p>&nbsp;</p>
                            </div>
                            <div class="col-md-3">
                                <select class="form-control" name="status">
                                    <option value="">Status</option>
                                    <?php echo statusCheck(@$this->input->get('status')) ?>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <input class="btn btn-success" value="Search" type="submit">
                                <span></span>
                                <a class="btn btn-default" href="">Clear</a>
                            </div>
                        </div>
                    </form>
                    <div class="col-md-12 tableoutput" style="padding: 0;">
                        <div class="x_content" style="display: block;">
                            <?php if (!empty($customers)): ?>
                                <div class="table-responsive">
                                    <table class="table table-striped talbe-bordered" id="post-list">
                                        <thead class="thead-inverse">
                                        <tr>
                                            <td>ID</td>
                                            <td>Name</td>
                                            <td>Email</td>
                                            <td>Address</td>
                                            <td>Company Name</td>
                                            <td>Phone</td>
                                            <td>Action</td>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        <?php foreach ($customers as $customer): ?>
                                            <tr>
                                                <td><?= @$customer->id ?></td>
                                                <td><?= @$customer->name ?></td>
                                                <td><?= @$customer->email ?></td>
                                                <td><?= @$customer->office_address ?></td>
                                                <td><?= @$customer->company_name ?></td>
                                                <td><?= @$customer->contact ?></td>
                                                <td>
                                                    <div class="btn-group btn-xs">
                                                        <a class="btn btn-xs btn-default" data-toggle="modal"
                                                           data-target="#modal_message_body_<?= @$customer->id ?>"><i
                                                                    class="fa fa-envelope"></i></a>&nbsp;
                                                        <a class="btn btn-xs btn-warning" href="<?php echo base_url("editcustomer/$customer->id") ?>"><i
                                                                    class="fa fa-pencil fa-fw"></i></a>&nbsp;
                                                        <a class="btn btn-xs btn-info" data-toggle="modal"
                                                           data-target="#modal_preview_body_<?= @$customer->id ?>"><i
                                                                    class="fa fa-eye fa-fw"></i></a>&nbsp;&nbsp;
                                                        <a class="btn btn-xs btn-success" onclick="printdiv('printdiv_<?= @$customer->id ?>')"><i class="fa fa-print" aria-hidden="true"></i></a>&nbsp;
                                                        <a href="<?php echo base_url("deletecustomer/$customer->id") ?>" onclick="confirm('Are you Sure ?')" class="btn btn-xs btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>

                                        </tbody>
                                        <thead>
                                        <tr>
                                            <td>ID</td>
                                            <td>Name</td>
                                            <td>Email</td>
                                            <td>Address</td>
                                            <td>Company Name</td>
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
                            <?php if (!empty($customers)):$i = 1;foreach ($customers as $customer): ?>
                                <?php echo printHeader($customer->id, 'Customer Preview'); ?>
                                <table style="width:78%; float: left; font-weight: bold; border-collapse: collapse; font-size: 12px; font-family: 'Trebuchet MS', sans-serif;">
                                    <tr>
                                        <td style="border: 1px solid #DDD; padding:  5px 15px; width: 30%;">Name</td>
                                        <td style="border: 1px solid #DDD; padding:  5px 15px; width: 70%;"><?= @$customer->name ?></td>
                                    </tr>
                                    <tr>
                                        <td style="border: 1px solid #DDD; padding:  5px 15px; width: 30%;">Contact Number</td>
                                        <td style="border: 1px solid #DDD; padding:  5px 15px; width: 70%;"><?= @$customer->contact ?></td>
                                    </tr>
                                    <tr>
                                        <td style="border: 1px solid #DDD; padding:  5px 15px; width: 30%;">Email</td>
                                        <td style="border: 1px solid #DDD; padding:  5px 15px; width: 70%;"><?= @$customer->email ?></td>
                                    </tr>
                                    <tr>
                                        <td style="border: 1px solid #DDD; padding:  5px 15px; width: 30%;">
                                            Company Name </td>
                                        <td style="border: 1px solid #DDD; padding:  5px 15px; width: 70%;"><?= @$customer->company_name ?></td>
                                    </tr>
                                    <tr>
                                        <td style="border: 1px solid #DDD; padding:  5px 15px; width: 30%;">Office Address</td>
                                        <td style="border: 1px solid #DDD; padding:  5px 15px; width: 70%;"><?= @$customer->office_address ?></td>
                                    </tr>
                                    <tr>
                                        <td style="border: 1px solid #DDD; padding:  5px 15px; width: 30%;">
                                            Company Types </td>
                                        <td style="border: 1px solid #DDD; padding:  5px 15px; width: 70%;"><?= @$customer->company_type ?></td>
                                    </tr>
                                    <tr>
                                        <td style="border: 1px solid #DDD; padding:  5px 15px; width: 30%;">City</td>
                                        <td style="border: 1px solid #DDD; padding:  5px 15px; width: 70%;"><?= @$customer->city ?></td>
                                    </tr>
                                    <tr>
                                        <td style="border: 1px solid #DDD; padding:  5px 15px; width: 30%;">State</td>
                                        <td style="border: 1px solid #DDD; padding:  5px 15px; width: 70%;"><?= @$customer->state ?></td>
                                    </tr>
                                    <tr>
                                        <td style="border: 1px solid #DDD; padding:  5px 15px; width: 30%;">Zip Code</td>
                                        <td style="border: 1px solid #DDD; padding:  5px 15px; width: 70%;"><?= @$customer->zip ?></td>
                                    </tr>
                                    <tr>
                                        <td style="border: 1px solid #DDD; padding:  5px 15px; width: 30%;">Reference By</td>
                                        <td style="border: 1px solid #DDD; padding:  5px 15px; width: 70%;"><?= @$customer->refference_by ?></td>
                                    </tr>
                                    <tr>
                                        <td style="border: 1px solid #DDD; padding:  5px 15px; width: 30%;">HRR Name</td>
                                        <td style="border: 1px solid #DDD; padding:  5px 15px; width: 70%;"><?= @$customer->hrr ?></td>
                                    </tr>
                                    <tr>
                                        <td style="border: 1px solid #DDD; padding:  5px 15px; width: 30%;">Status</td>
                                        <td style="border: 1px solid #DDD; padding:  5px 15px; width: 70%;"><?= @$customer->status ?></td>
                                    </tr>
                                </table>
                                <?php echo printFooter(); ?>

                                <div class="modal fade" id="modal_message_body_<?= @$customer->id ?>"
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
                                                           value="<?= @$customer->contact ?>"
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
                                <div class="modal fade" id="modal_preview_body_<?= @$customer->id ?>"
                                     tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="exampleModalLongTitle">
                                                    Customer Preview
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
                                                            <?= @$customer->name ?>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 preview-single-row">
                                                        <div class="col-md-2 preview-lebel">
                                                            <b>Contact Number</b>
                                                        </div>
                                                        <div class="col-md-10 preview-content">
                                                            <?= @$customer->contact ?>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 preview-single-row">
                                                        <div class="col-md-2 preview-lebel">
                                                            <b>Email </b>
                                                        </div>
                                                        <div class="col-md-10 preview-content">
                                                            <?= @$customer->email ?>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 preview-single-row">
                                                        <div class="col-md-2 preview-lebel">
                                                            <b>Company Name</b>
                                                        </div>
                                                        <div class="col-md-10 preview-content">
                                                            <?= @$customer->company_name ?>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 preview-single-row">
                                                        <div class="col-md-2 preview-lebel">
                                                            <b>Office Address</b>
                                                        </div>
                                                        <div class="col-md-10 preview-content">
                                                            <?= @$customer->office_address ?>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 preview-single-row">
                                                        <div class="col-md-2 preview-lebel">
                                                            <b>Company Types</b>
                                                        </div>
                                                        <div class="col-md-10 preview-content">
                                                            <?= @$customer->company_type ?>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 preview-single-row">
                                                        <div class="col-md-2 preview-lebel">
                                                            <b>City</b>
                                                        </div>
                                                        <div class="col-md-10 preview-content">
                                                            <?= @$customer->city ?>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 preview-single-row">
                                                        <div class="col-md-2 preview-lebel">
                                                            <b>State</b>
                                                        </div>
                                                        <div class="col-md-10 preview-content">
                                                            <?= @$customer->state ?>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 preview-single-row">
                                                        <div class="col-md-2 preview-lebel">
                                                            <b>Zip Code</b>
                                                        </div>
                                                        <div class="col-md-10 preview-content">
                                                            <?= @$customer->zip ?>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 preview-single-row">
                                                        <div class="col-md-2 preview-lebel">
                                                            <b>Reference By</b>
                                                        </div>
                                                        <div class="col-md-10 preview-content">
                                                            <?= @$customer->refference_by ?>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 preview-single-row">
                                                        <div class="col-md-2 preview-lebel">
                                                            <b>HRR Name</b>
                                                        </div>
                                                        <div class="col-md-10 preview-content">
                                                            <?= @$customer->hrr ?>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 preview-single-row">
                                                        <div class="col-md-2 preview-lebel">
                                                            <b>Status</b>
                                                        </div>
                                                        <div class="col-md-10 preview-content">
                                                            <?= @$customer->status ?>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 preview-single-row last">
                                                        <div class="col-md-2 preview-lebel">
                                                            <b>Activity</b>
                                                        </div>
                                                        <div class="col-md-10 preview-content">
                                                            <?= @$customer->activity ?>
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
