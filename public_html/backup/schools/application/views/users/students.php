<div class="row">
    <div class="col-md-12 col-xs-12 col-sm-12">
        <?php echo form_start_divs($title, 'search students&nbsp;&nbsp; <a href="'. base_url('newstudent') .'" class="btn btn-success">Add New</a>'); ?>

<!--        <h2>Students <small>search students</small> <a href="" class="btn btn-success">Add New</a></h2>-->
        <?php echo form_open_multipart(base_url() . 'students', array('class' => 'form-horizontal', 'id' => 'studentSearch', 'method' => 'get', 'data-toggle' => 'validator')); ?>
        <div class="form-group">
            <div class="col-md-2">
                Status<br/>
                <select class="form-control" name="status">
                    <option value="1" <?php if(@$_GET['status'] == 1) { echo 'selected'; } ?> >Active</option>
                    <option value="0" <?php if(@$_GET['status'] == 0) { echo 'selected'; } ?> >Inactive</option>
                    <option value="" <?php if(@$_GET['status'] == '') { echo 'selected'; } ?>>Choose Status</option>
                </select>
            </div>
            <div class="col-md-2">
                Class<br/>
                <?php echo form_dropdown('classs', $classes, set_value('gender', (isset($cid) ? $cid : ''), TRUE), array('class' => 'form-control', 'id' => 'classs')); ?>
            </div>
            <div class="col-md-2">
                Section<br/>
                <?php echo form_dropdown('section', $sections, set_value('gender', (isset($sid) ? $sid : ''), TRUE), array('class' => 'form-control', 'id' => 'section')); ?>
            </div>
            <div class="col-md-2">
                Group<br/>
                <?php echo form_dropdown('groupp', $groups, set_value('gender', (isset($sgid) ? $sgid : ''), TRUE), array('class' => 'form-control', 'id' => 'groupp')); ?>
            </div>
            <div class="col-md-2">
                Department<br/>
                <?php echo form_dropdown('department', $departments, set_value('gender', (isset($department) ? $department : ''), TRUE), array('class' => 'form-control', 'id' => 'department')); ?>
            </div>
            <div class="col-md-2">
                <br/>
                <input  class="btn btn-success" value="Search" type="submit">
                <span></span>
                <a class="btn btn-default" href="<?php echo  base_url('students')  ?>">Clear</a>
            </div>
        </div>
        <?php echo form_close(); ?>

        
        <?php echo message_box('success'); ?>
        <?php echo message_box('error');?>
        <div class="col-md-12 tableoutput">
            <?php if($students): ?>
                <div class="x_content" style="display: block;">
                    <div class="table-responsive">
                        <table class="table table-striped talbe-bordered" id="post-list">
                            <thead class="thead-inverse">
                            <tr>
                                <td>ID</td>
                                <td>Action</td>
                                <td>Name</td>
                                <td>Fathers Name</td>
                                <td>Mothers Name</td>
                                <td>Class</td>
                                <td>Roll</td>
                                <td>Section</td>
                                <td>Phone</td>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($students as $student) {
                                echo getStudentPrimaryInfo($student['UserId']);
                            }
                            ?>
                            </tbody>
                            <thead>
                                <tr>
                                    <td>ID</td>
                                    <td>Action</td>
                                    <td>Name</td>
                                    <td>Fathers Name</td>
                                    <td>Mothers Name</td>
                                    <td>Class</td>
                                    <td>Roll</td>
                                    <td>Section</td>
                                    <td>Phone</td>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-xs-12">
                        <ul class="pagination" style="display: table;margin:auto;">
                            <li class="for_active">
                                <?php echo $paging; ?>
                            </li>
                        </ul>
                    </div>
                </div>
            <?php else: ?>
                <p style="color: #ff0000; font-weight: bold;">No Staff Found</p>
            <?php endif; ?>
        </div>
        <?php echo form_end_divs(); ?>


    </div>
</div>
