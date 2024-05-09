<div class="row">
    <div class="col-md-12 col-xs-12 col-sm-12">
        <?php echo form_start_divs($title, 'search staff&nbsp;&nbsp; <a href="'. base_url('newstaff') .'" class="btn btn-success">Add New</a>'); ?>
        <?php echo form_open_multipart(base_url() . 'staffs', array('class' => 'form-horizontal', 'id' => 'staffSearch', 'method' => 'get', 'data-toggle' => 'validator')); ?>
        <div class="form-group"  style="display: none;">
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
            <?php   if($staffs): ?>
                <div class="x_content" style="display: block;">
                    <div class="table-responsive">
                        <table class="table talbe-bordered" id="post-list">
                            <thead>
                            <tr>
                                <td>ID</td>
                                <td>Name</td>
                                <td>Designation</td>
                                <td>Join Date</td>
                                <td>Action</td>
                            </tr>
                            </thead>
                            <tbody>
                            <?php //owndebugger($staffs);
                            //die;
                            foreach ($staffs as $staff) {
                                 $preview = base_url(). 'overview/'. $staff['user_id'] .'?userpage=true';
                                 $edit = base_url(). 'basicinformation/'. $staff['user_id']  .'?userpage=true';
                                 //echo getStaffPrimaryInfo($staff['user_id']);
                                // die();
                                ?>

                                <tr>
                                    <td><?php echo $staff['user_id'] ?></td>
                                    <td><?php echo tableSingleColumn('users', 'full_name_en', ['id'=> $staff['user_id']]); ?></td>
                                    <td>
                                        <?php 
                                            $teacher_info = $this->db->get_where('u_tchstaff_information', array('UserId' => $staff['user_id'] ))->result();
                                            foreach ($teacher_info as $info) {
                                                echo tableSingleColumn('initial_settings_info', 'SettingsName', ['SettingsId'=> $info->Designation]);
                                            }
                                        ?>
                                        
                                    </td>
                                    <td>
                                        <?php
                                            $teacher_info = $this->db->get_where('u_basicinfos', array('UserId' => $staff['user_id'] ))->result();
                                            foreach ($teacher_info as $info) {
                                                if(!empty($info->JoinDate))
                                                echo date('d-m-Y', $info->JoinDate);
                                            }
                                        ?>
                                        
                                    </td>
                                    <td><a href='<?php echo $preview; ?>'><i class='fa fa-search-plus'></i></a>&nbsp;&nbsp;
                                        <a class='modalcursour' data-toggle='modal' data-target='#modal_body_<?php echo $staff['user_id'] ?>'><i class='fa fa-envelope'></i></a>&nbsp;&nbsp;
                                        <a href='<?php echo $edit;  ?>'><i class='fa fa-pencil fa-fw'></i></a>
                                    </td>
                                    <div class='modal fade' id='modal_body_<?php echo $staff['user_id'] ?>' tabindex='-1' role='dialog' aria-hidden='true'>
                                        <div class='modal-dialog' role='document'>
                                            <div class='modal-content'>
                                                <form>
                                                    <div class='modal-header'>
                                                        <h5 class='modal-title' id='exampleModalLongTitle'>
                                                            Send Message
                                                            <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                                                        </h5>
                                                    </div>
                                                    <div class='modal-body'>
                                                        <div class='form-group'>
                                                            <label>Phone Number</label>
                                                            <input name='phonenumber' value='<?php echo tableSingleColumn('users', 'phone', ['id'=> $staff['user_id']]); ?>' class='form-control' readonly='readonly' type='text'>
                                                        </div>
                                                        <div class='form-group'>
                                                            <label>Message</label>
                                                            <textarea name='message' placeholder='Enter Your Message' cols='40' rows='2' class='form-control'></textarea>
                                                        </div>
                                                    </div>
                                                    <div class='modal-footer'>
                                                        <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
                                                        <button type='button' class='btn btn-primary'>Send Message</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </tr>



                            <?php } ?>
                            </tbody>
                            <thead>
                            <tr>
                                <td>ID</td>
                                <td>Name</td>
                                <td>Designation</td>
                                <td>Join Date</td>
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
                                //echo $paging;
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
