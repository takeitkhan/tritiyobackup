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
                                <input class="form-control" name="name" placeholder="SMS Name" required value="<?= @$template->name;?>" type="text"/>
                                <input  name="id" placeholder="SMS Name" value="<?= @$template->id;?>" type="hidden"/>
                            </div>




                            <div class="formgroup">
                                <label class="control-label">Message</label>
                                <textarea name="message" id="" maxlength="160" cols="30" rows="3" class="form-control"><?= @$template->message;?></textarea>
                            </div>
                            <div class="form-group ">
                                <label class="control-label">Status</label>

                                <select class="form-control" name="status" required >

                                      <option value="">Status</option>
                                      <option <?php if(@$template->status == 'Active') echo 'selected'; ?> value="Active">Active</option>
                                      <option <?php if(@$template->status == 'Inactive') echo 'selected'; ?> value="Inactive">Inactive</option>

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

    </div>

</div>
