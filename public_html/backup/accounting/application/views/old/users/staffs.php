<div class="row">
    <div class="col-md-12 col-xs-12 col-sm-12">
        <?php echo form_start_divs($title, 'search students&nbsp;&nbsp; <a href="'. base_url('newstaff') .'" class="btn btn-success">Add New</a>'); ?>
        <?php echo form_open_multipart(base_url() . 'staffs', array('class' => 'form-horizontal', 'id' => 'staffSearch', 'method' => 'get', 'data-toggle' => 'validator')); ?>
        <div class="form-group">
            <div class="col-md-3">
                Status<br/>
                <select class="form-control" name="status">
                    <option value="1" <?php if(@$_GET['status'] == 1) { echo 'selected'; } ?> >Active</option>
                    <option value="0" <?php if(@$_GET['status'] == 0) { echo 'selected'; } ?> >Inactive</option>
                    <option value="" <?php if(@$_GET['status'] == '') { echo 'selected'; } ?>>Choose Status</option>
                </select>
            </div>
            <div class="col-md-3">
                User ID<br/>
                <input type="text" name="userid" class="form-control" value="<?php echo @$_GET['userid'] ?>" />
            </div>
            <div class="col-md-3">
                Index Number<br/>
                <input type="text" name="index" class="form-control" value="<?php echo @$_GET['index'] ?>" />
            </div>
            <div class="col-md-2">
                <br/>
                <input  class="btn btn-success" value="Search" type="submit">
                <span></span>
                <a class="btn btn-default" href="<?php echo  base_url('staffs')  ?>">Clear</a>
            </div>
        </div>
        <?php echo form_close(); ?>
        <div class="col-md-12 tableoutput">
            <?php if($staffs): ?>
                <div class="x_content" style="display: block;">
                    <div class="table-responsive">
                        <table class="table talbe-bordered" id="post-list">
                            <thead>
                            <tr>
                                <td>ID</td>
                                <td>Name</td>
                                <td>Designation</td>
                                <td>Index Number</td>
                                <td>Salary Scale</td>
                                <td>Phone</td>
                                <td>Action</td>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($staffs as $staff) {
                                echo getStaffPrimaryInfo($staff['UserId']);
                            }
                            ?>
                            </tbody>
                            <thead>
                            <tr>
                                <td>ID</td>
                                <td>Name</td>
                                <td>Designation</td>
                                <td>Index Number</td>
                                <td>Salary Scale</td>
                                <td>Phone</td>
                                <td>Action</td>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-xs-12">
                        <ul class="pagination" style="display: table;margin:auto;">
                            <li class="for_active">
                                <?php
                                echo $paging;
                                ?>
                            </li>
                        </ul>
                    </div>
                </div>
            <?php else: ?>
                <p style="color: #ff0000; font-weight: bold;">No Student Found</p>
            <?php endif; ?>
        </div>
        <?php echo form_end_divs(); ?>


    </div>
</div>
