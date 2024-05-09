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
                                <label class="control-label">SMS Name</label>
                                <input class="form-control" name="name" placeholder="SMS Name" required value="" type="text"/>
                            </div>




                            <div class="formgroup">
                                <label class="control-label">Message</label>
                                <textarea name="message" id="" maxlength="170" cols="30" rows="3" class="form-control"><?= @$single_item->comments?></textarea>
                            </div>
                            <div class="form-group ">
                                <label class="control-label">Status</label>

                                <select class="form-control" name="status" required >
                                    <option value="">Status</option>
                                    <option value="Active">Active</option>
                                    <option value="Inactive">Inactive</option>
                                </select>
                            </div>
                            <br>
                            <div class="form-group">
                                <div class="pull-right">
                                    <button class="btn btn-success" type="submit">
                                        Submit
                                    </button>
                                </div>
                                <div>
                                   <a href="<?= base_url('sms-template')?>" class="btn btn-default">Cancel</a>
                                </div>
                            </div>
                        </form>
                </div>
            </div>
        </div>
        <?php //if(@$subjects): ?>
        <div class="col-md-7">
            <div class="x_panel">
                <div class="x_title">
                    <h2>All Stutend and Stuff</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content" style="display: block; min-height: 205px;">
                    <div class="col-md-12 pull-right">
                      <form action="" class="form-horizontal" id="product_search" method="get" data-toggle="validator"
                            enctype="multipart/form-data" accept-charset="utf-8">
                          <table class="table">
                              <tbody>
                                  <tr>
                                      <td>
                                          <div class="form-group ">
                                              <input value="<?php echo @$this->input->get('title') ?>" class="form-control" name="title"
                                                     placeholder="Name" type="text"/>

                                          </div>

                                      </td>
                                      <td>
                                          <select class="form-control" name="status">
                                              <option value="">Status</option>
                                              <?php echo statusCheck(@$this->input->get('status')) ?>
                                          </select>


                                      </td>
                                      <td>
                                          <input class="btn btn-success" value="Search" type="submit">
                                          <span></span>
                                          <a class="btn btn-default" href="">Clear</a>

                                      </td>
                                  </tr>
                              </tbody>
                          </table>
                      </form>

                      <?php if (!empty($messages)): ?>
                            <table class="table table-bordered table-hover table-condensed table-striped" id="">
                                <thead>
                                  <th style="width:10%">ID</th>
	                                <th style="width:25%">Name</th>
	                                <th style="width:50%">Message</th>
	                                <th style="width:15%">Action</th>
                                </thead>
                                <tbody>
                                <?php
                              //  owndebugger($messages);
                                foreach ($messages as $sms): ?>
                                <tr>
                                  <td><?=@$sms->id;?></td>
                                  <td><?=@$sms->name;?></td>
                                  <td><?=@$sms->message;?></td>
                                  <td>

                                      <div class="btn-group btn-xs btn-group-broken">
                                        <a class="btn btn-xs btn-warning" href="<?=base_url('sms-template-edit/'.@$sms->id);?>"><i class="fa fa-pencil fa-fw"></i></a>&nbsp;
                                        <a href="<?=base_url('sms-template-delete/'.@$sms->id);?>" onclick="confirm('Are you Sure ?')" class="btn btn-xs btn-danger">
                                                            <i class="fa fa-trash-o" aria-hidden="true"></i>
                                                        </a>
                                                    </div>
                                  </td>
                                </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                          <?php else: ?>
                              <?php set_message('warning', "Not Found") ?>
                              <?php echo message_box('warning'); ?>
                          <?php endif; ?>
                            <div class="row">
	                            <div class="col-lg-12 col-xs-12">
	                                <ul class="pagination" style="display: table;margin:auto;">
	                                    <?= @$paging; ?>
	                                </ul>
	                            </div>
	                        </div>

                    </div>

                </div>
            </div>
        </div>

        <?php //endif; ?>
    </div>

</div>
