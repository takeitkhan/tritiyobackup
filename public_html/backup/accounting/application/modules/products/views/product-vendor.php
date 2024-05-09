<div class="container custom-container">
    <div class="row">
        <div class="col-md-5">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Add Vendor</h2>
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
                        <form action="<?= base_url()?>addvendors" method="post">
                            <div class="form-group ">
                                <label class="control-label">
                                    Name
                                </label>
                                <input class="form-control" name="name" placeholder="Vendor Name" required value="<?= @$vendor->name?>" type="text"/>
                            </div>
                            <div class="form-group ">
                                <label class="control-label">
                                    Status
                                </label>
                                <select name="status" class="form-control" id="">
                                    <?php echo statusCheck($vendor->status); ?>
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
                    <h2>Active Unit List</h2>
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
                        <?php if(@$vendors): ?>
                            <table class="table table-bordered table-hover table-condensed table-striped" id="">
                                <thead>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Action</th>
                                </thead>
                                <tbody>
                                <tr>
                                    <?php foreach ($vendors as $unit): ?>
                                        <td><?= $unit->id;?></td>
                                        <td><?= $unit->name;?></td>
                                        <td>
                                            <div class="btn-group btn-xs">

                                                <a class="btn btn-xs btn-warning" href="<?php echo base_url("editvendors/$unit->id") ?>"><i
                                                            class="fa fa-pencil fa-fw"></i></a>&nbsp;
                                                <a href="<?php echo base_url("deletevendors/$unit->id") ?>" onclick="confirm('Are you Sure ?')" class="btn btn-xs btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                            </div>
                                        </td>
                                    <?php endforeach; ?>
                                </tr>
                                </tbody>
                            </table>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Inactive Vendor List</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content" style="display: block;">
                    <div class="col-md-12 pull-right">
                        <?php if(@$deleted_units_list): ?>
                            <table class="table table-bordered table-hover table-condensed table-striped" id="">
                                <thead>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Active</th>
                                </thead>
                                <tbody>
                                <tr>
                                    <?php foreach ($deleted_vendors_list as $unit): ?>
                                        <td><?= $unit->id;?></td>
                                        <td><?= $unit->name;?></td>
                                        <td>
                                            <div class="btn-group btn-xs">
                                                <a href="<?php echo base_url("alivevendors/$unit->id") ?>" onclick="confirm('Are you Sure ?')" class="btn btn-xs btn-success"><i class="fa fa-check" aria-hidden="true"></i></a>
                                            </div>
                                        </td>
                                    <?php endforeach; ?>
                                </tr>
                                </tbody>
                            </table>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>