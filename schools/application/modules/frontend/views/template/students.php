<?php $this->load->view('header'); ?>
<div class="row">
<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
    <div class="leftinner_content leftinner_content_sub">
        <h1 class="blue"><?php echo $title; ?></h1>
        <div class="col-md-12 col-xs-12 col-sm-12  border-class">
            <?php echo form_open_multipart('', array('class' => 'form-horizontal', 'id' => 'search-result', 'method' => 'get', 'data-toggle' => 'validator')); ?>
            <div class="form-group">
                <div class="col-md-3">
                    Class<br/>
                    <?php echo form_dropdown('classs', $classes, set_value('gender', (isset($cid) ? $cid : ''), TRUE), array('class' => 'form-control', 'id' => 'classs')); ?>
                </div>
                <div class="col-md-3">
                    Section<br/>
                    <?php echo form_dropdown('section', $sections, set_value('gender', (isset($sid) ? $sid : ''), TRUE), array('class' => 'form-control', 'id' => 'section')); ?>
                </div>

                <div class="col-md-3">
                    Group<br/>
                    <?php echo form_dropdown('groupp', $groups, set_value('gender', (isset($sgid) ? $sgid : ''), TRUE), array('class' => 'form-control', 'id' => 'groupp')); ?>
                </div>

                <div class="col-md-3">
                    <br/>
                    <input id="resultSearch" class="btn btn-success" value="Search Result" type="submit">
                    <span></span>
                    <input class="btn btn-default" value="Cancel" type="reset">
                </div>
            </div>
            <?php echo form_close(); ?>
            <?php if($students){ ?>
            <table id="table" class="table table-bordered">
                <tr id="tr">
                    <th id="td">Roll</th>
                    <th id="td">ID</th>
                    <th id="td">Name</th>
                    <th id="td">Fathers Name</th>
                    <th id="td">Mothers Name</th>
                    <th id="td">Class</th>
                    <th id="td">Section</th>
                </tr>

                <?php foreach ($students as $student) { ?>
                    <tr>
                        <td><?php echo $student['ClassRoll']; ?></td>
                        <td><?php echo $student['UserId']; ?></td>
                        <td><?php echo tableSingleColumn('users', 'full_name_en', ['id' => $student['UserId']]) ?></td>
                        <td><?php echo tableSingleColumn('users', 'father_name_en', ['id' => $student['UserId']]) ?></td>
                        <td><?php echo tableSingleColumn('users', 'mother_name_en', ['id' => $student['UserId']]) ?></td>
                        <td><?php echo tableSingleColumn('initial_settings_info', 'SettingsName', ['SettingsId' => $student['Class']]) ?></td>
                        <td><?php echo tableSingleColumn('initial_settings_info', 'SettingsName', ['SettingsId' => $student['Section']]) ?></td>
                    </tr>
                <?php  }  ?>


                <tr id="tr">
                    <th id="td">Roll</th>
                    <th id="td">ID</th>
                    <th id="td">Name</th>
                    <th id="td">Fathers Name</th>
                    <th id="td">Mothers Name</th>
                    <th id="td">Class</th>
                    <th id="td">Section</th>
                </tr>
                <?php //echo $searchresults; ?>
                <!--                        <tr>-->
                <!--                            <td>100001</td>-->
                <!--                            <td>Abdul</td>-->
                <!--                            <td>19</td>-->
                <!--                            <td>First</td>-->
                <!--                            <td>Grade</td>-->
                <!--                            <td>Cgpa</td>-->
                <!--                            <td>Action</td>-->
                <!--                        </tr>-->
            </table>
            <ul class="pagination" style="display: table;margin:auto;">
                <li class="for_active">
                    <?php echo $paging; ?>
                </li>
            </ul>
            <?php } else { ?>
                <p style="color: #ff0000;"><b>No Student Found</b></p>
            <?php } ?>
        </div>
    </div>
</div>
</div>
<?php $this->load->view('footer'); ?>

<style>
    .subpagecon ul li { list-style: disc; }
    .border-class { border: 1px solid #eee; }
</style>
