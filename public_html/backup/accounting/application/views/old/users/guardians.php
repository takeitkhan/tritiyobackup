<div class="row">
    <div class="col-md-12 col-xs-12 col-sm-12">
        <?php echo form_start_divs($title, 'search students'); ?>
        <?php echo form_open_multipart(base_url() . 'guardians', array('class' => 'form-horizontal', 'id' => 'staffSearch', 'method' => 'get', 'data-toggle' => 'validator')); ?>
        <div class="form-group">
            <div class="col-md-3">
                User ID<br/>
                <input type="text" name="userid" class="form-control" value="<?php echo @$_GET['userid'] ?>" />
            </div>
            <div class="col-md-3">
                Guardian ID<br/>
                <input type="text" name="guardianid" class="form-control" value="<?php echo @$_GET['guardianid'] ?>" />
            </div>
            <div class="col-md-2">
                <br/>
                <input  class="btn btn-success" value="Search" type="submit">
                <span></span>
                <a class="btn btn-default" href="<?php echo  base_url('guardians')  ?>">Clear</a>
            </div>
        </div>
        <?php echo form_close(); ?>
        <div class="col-md-12 tableoutput">
            <?php if($guardians): ?>
                <div class="x_content" style="display: block;">
                    <div class="table-responsive">
                        <table class="table talbe-bordered" id="post-list">
                            <thead>
                            <tr>
                                <td>ID</td>
                                <td>Name(Bangla)</td>
                                <td>Name(English)</td>
                                <td>Phone</td>
                                <td>Action</td>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($guardians as $guardian) {
                                echo getGuardianPrimaryInfo($guardian['GuardianId']);
                            }
                            ?>
                            </tbody>
                            <thead>
                            <tr>
                                <td>ID</td>
                                <td>Name(Bangla)</td>
                                <td>Name(English)</td>
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
                <p style="color: #ff0000; font-weight: bold;">No Guardian Found</p>
            <?php endif; ?>
        </div>
        <?php echo form_end_divs(); ?>


    </div>
</div>
