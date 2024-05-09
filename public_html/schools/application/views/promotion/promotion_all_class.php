<div class="row">
    <div class="col-md-12 col-xs-12 col-sm-12">
        <?php echo form_start_divs($title); ?>

<!--        <h2>Students <small>search students</small> <a href="" class="btn btn-success">Add New</a></h2>-->
        <?php echo form_open_multipart(base_url() . 'promotionAll', array('class' => 'form-horizontal', 'id' => 'studentSearch', 'method' => 'get', 'data-toggle' => 'validator')); ?>
        <div class="form-group">
            <!-- <div class="col-md-2">
                Status<br/>
                <select class="form-control" name="status">
                    <option value="1" <?php if(@$_GET['status'] == 1) { echo 'selected'; } ?> >Active</option>
                    <option value="0" <?php if(@$_GET['status'] == 0) { echo 'selected'; } ?> >Inactive</option>
                    <option value="" <?php if(@$_GET['status'] == '') { echo 'selected'; } ?>>Choose Status</option>
                </select>
            </div> -->
            <div class="col-md-2">
                Class<br/>
                <?php echo form_dropdown('classs', $classes, set_value('classs', (isset($cid) ? $cid : ''), TRUE), array('class' => 'form-control', 'id' => 'classs')); ?>
            </div>
            <div class="col-md-2">
                Section<br/>
                <?php echo form_dropdown('section', $sections, set_value('section', (isset($sid) ? $sid : ''), TRUE), array('class' => 'form-control', 'id' => 'section')); ?>
            </div>
            <div class="col-md-2">
                Group<br/>
                <?php echo form_dropdown('groupp', $groups, set_value('groupp', (isset($sgid) ? $sgid : ''), TRUE), array('class' => 'form-control', 'id' => 'groupp')); ?>
            </div>
            
            <div class="col-md-4">
                <br/>
                <input  class="btn btn-success" value="Search" type="submit">
                <span></span>
                <a class="btn btn-default" href="<?php echo  base_url('promotionAll')  ?>">Clear</a>
<!--                <a class="btn btn-warning" href="">Update All</a>-->
            </div>
        </div>
        <?php echo form_close(); ?>
        <div class="col-md-12">
            <?php echo @$this->session->flashdata('message') ?>
        </div>
        <div class="col-md-12 tableoutput">
            <?php if($students): ?>
                <div class="x_content" style="display: block;">
                    <form action="promotionsubmit" method="post">
                        <div class="table-responsive">
                            <table class="table table-striped talbe-bordered" id="post-list">
                                <thead class="thead-inverse">
                                <tr>
                                    <td>ID</td>
                                    <td>Name</td>
                                    <td>Roll</td>
                                    <td>New Roll</td>
                                    <td>Section</td>
                                    <td>New Section</td>
                                    <?php if($this->input->get('groupp') == 0 && $this->input->get('classs') == 8){ ?>
                                    <td>Group</td>
                                    <?php }elseif ($this->input->get('groupp') == 0) {?>
                                    <td style="display: none">Group</td>
                                    <?php }else{ ?>
                                    <td>Group</td>
                                    <?php } ?>
                                    <td>Action</td>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                foreach ($students as $student) {
                                    echo getStudentsPromotionInfo($student['UserId']);
                                }
                                ?>
                                </tbody>
    <!--                            <thead>-->
    <!--                                <tr>-->
    <!--                                    <td>ID</td>-->
    <!--                                    <td>Name</td>-->
    <!--                                    <td>Roll</td>-->
    <!--                                    <td>New Section</td>-->
    <!--                                    <td>New Roll</td>-->
    <!--                                    <td>Action</td>-->
    <!--                                </tr>-->
    <!--                            </thead>-->
                            </table>
                            <div class="col-md-2">
                                <select name="year" class="form-control">
                                    <?php for($y = date('Y'); $y > 2013; $y--) { ?>
                                        <option value="<?php echo $y; ?>"><?php echo $y; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <input  class="btn btn-success" value="Update All" type="submit">
                            </div>
                        </div>
                    </form>
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
                <p style="color: #ff0000; font-weight: bold;">No Student Found</p>
            <?php endif; ?>
        </div>
        <?php echo form_end_divs(); ?>


    </div>
</div>
