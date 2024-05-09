<div class="container custom-container">
    <div class="row">
        <div class="col-md-5">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Apply for SMS Bundle </h2>
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
                                <label class="control-label">Quantity</label>
                                <input class="form-control" name="qty" placeholder="Quantity" required value="" type="number"/>
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
                    <h2>All Transaction History</h2>
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

                      <?php if (!empty($transaction)):
                        //owndebugger($transaction);
                        ?>
                            <table class="table table-bordered table-hover table-condensed table-striped" id="">
                                <thead>
                                  <th style="width:10%">ID</th>
	                                <th style="width:25%">Quantity</th>
	                                <th style="width:30%">Date</th>
                                  <th style="width:20%">Status</th>
	                                <th style="width:15%">Action</th>
                                </thead>
                                <tbody>
                                <?php
                              //  owndebugger($messages);
                                foreach ($transaction as $sms): ?>
                                <tr>
                                  <td><?=@$sms->id;?></td>
                                  <td><?=@$sms->qty;?></td>

                                  <td><?=@$sms->date;?></td>
                                  <td><?=@$sms->status;?></td>
                                  <td>

                                    <div class="btn-group btn-xs btn-group-broken">
                                      <?php  if(@$sms->status == 'Inactive'){ ?>
                                            <?php if($userid == '1357'){ ?>


                                            <a title="Approve" href="<?=base_url('sms-transaction-active/'.@$sms->id).'/'.@$sms->qty;?>" onclick="confirm('Are you Sure ?')" class="btn btn-xs btn-success">
                                                <i class="fa fa-thumbs-up" aria-hidden="true"></i>
                                            </a>
                                            <a title="Edit" class="btn btn-xs btn-warning" href="<?=base_url('sms-transaction-edit/'.@$sms->id);?>"><i class="fa fa-pencil fa-fw"></i></a>&nbsp;
                                            <?php } ?>
                                            <a title="Delete" href="<?=base_url('sms-transaction-delete/'.@$sms->id);?>" onclick="confirm('Are you Sure ?')" class="btn btn-xs btn-danger">
                                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                                            </a>
                                              <?php  }else {
                                          echo '  <a title="Approved" href="" class="btn btn-xs btn-success"><i class="fa fa-thumbs-up" aria-hidden="true"></i></a>';
                                              }  ?>

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
