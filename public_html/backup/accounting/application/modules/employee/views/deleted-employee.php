<div class="container">
    <div class="row">
        <div class="col-md-12 col-xs-12 col-sm-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2><?= @$title; ?>
                        <small>search employee&nbsp;&nbsp; <a href="<?= base_url() ?>addcustomer"
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
                    <?php echo message_box('warning'); ?>
                    <br>
                    <form action="" class="form-horizontal" id="customer_search" method="get" data-toggle="validator"
                          enctype="multipart/form-data" accept-charset="utf-8">
                        <div class="form-group">
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <input value="<?php echo @$this->input->get('title') ?>" class="form-control" name="title"
                                           placeholder="ID or Name Or Email or Phone or Company" type="text"/>
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
                                                <td><?= @$emp->name ?></td>
                                                <td><?= @$emp->email ?></td>
                                                <td><?= @$emp->address ?></td>
                                                <td><?= @$emp->contact ?></td>
                                                <td>
                                                    <div class="btn-group btn-xs">
                                                        <a href="<?php echo base_url("aliveemployee/$emp->id") ?>" onclick="confirm('Are you Sure ?')" class="btn btn-xs btn-success"><i class="fa fa-check" aria-hidden="true"></i></a>
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
                                        <td>Phone</td>
                                        <td>Action</td>
                                    </tr>
                                    </thead>
                                </table>
                            </div>
                            <?php else: ?>
                                <?php set_message('warning',  "Not Found") ?>
                            <?php endif; ?>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-xs-12">
                                <ul class="pagination" style="display: table;margin:auto;">
                                    <?= $paging; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
