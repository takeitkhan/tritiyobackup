<div class="container custom-container">
    <div class="row">
        <div class="col-md-7">
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
                    <?php echo message_box('success');
                    //  owndebugger($mysetting);
                     ?>
                    <?php echo message_box('error');  ?>
                        <form action="" method="post">

                            <div class="form-group ">
                                <label class="control-label">API Username</label>
                                <input class="form-control" name="api_user" placeholder="API Username" required value="<?= @$mysetting->api_user; ?>" type="text"/>
                            </div>
                            <div class="form-group ">

                                <label class="control-label">API Password</label>
                                <input class="form-control" name="api_pass" placeholder="API Password" required value="<?= @$mysetting->api_pass; ?>" type="text"/>
                            </div>
                            <div class="form-group ">

                                <label class="control-label">API SID</label>
                                <input class="form-control" name="api_sid" placeholder="API SID" required value="<?= @$mysetting->api_sid; ?>" type="text"/>
                            </div>
                            <div class="form-group ">
                                <label class="control-label">API url</label>
                                <input class="form-control" name="api_url" placeholder="API url" required value="<?= @$mysetting->api_url; ?>" type="text"/>
                            </div>

                            <div class="form-group ">
                                <label class="control-label">Status</label>
                                <select class="form-control" name="status" required >
                                    <option value="">Status</option>
                                    <option <?php if(@$mysetting->status == 'Active') echo 'selected'; ?> value="Active">Active</option>
                                    <option <?php if(@$mysetting->status == 'Inactive') echo 'selected'; ?> value="Inactive">Inactive</option>
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
                                   <a href="<?= base_url('subjectssettings')?>" class="btn btn-default">Cancel</a>
                                </div>
                            </div>
                        </form>
                </div>
            </div>
        </div>



    </div>

</div>
