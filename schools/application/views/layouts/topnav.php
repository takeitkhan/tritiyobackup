<div class="nav_menu">
    <nav class="" role="navigation">
        <div class="nav toggle">
            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
        </div>
        <ul class="nav navbar-nav navbar-right">
            <?php if ($this->ion_auth->in_group('Admin')) { ?>
                <li class="dropdown messages-menu">
                    <a href="#" class="dropdown-toggle" aria-expanded="false" data-toggle="dropdown"
                       href="javascript:;">
                        <i class="fa fa-cog fa-fw"></i>&nbsp;Initial Settings
                    </a>
                    <ul class="dropdown-menu">
<!--                        <li><a href="<?php __menu('addnewclass'); ?>">Add New Class</a></li>
                        <li><a href="<?php __menu('ini_set/1'); ?>">Classes</a></li>
                        <li><a href="<?php __menu('addnewsection'); ?>">Add New Section</a></li>
                        <li><a href="<?php __menu('ini_set/2'); ?>">Sections</a></li>
                        <li><a href="<?php __menu('addnewdepartment'); ?>">Add New Department</a></li>
                        <li><a href="<?php __menu('ini_set/3'); ?>">All Department</a></li>
                        <li><a href="<?php __menu('addnewsubject'); ?>">Add New Subject</a></li>
                        <li><a href="<?php __menu('ini_set/4'); ?>">Subjects</a></li>
                        <li><a href="<?php __menu('addnewexam'); ?>">Add New Exam</a></li>
                        <li><a href="<?php __menu('ini_set/5'); ?>">Exams</a></li>
                        <li><a href="<?php __menu('addnewshift'); ?>">Add New Shift</a></li>
                        <li><a href="<?php __menu('ini_set/6'); ?>">Shift</a></li>
                        <li class="divider"></li>-->
                        <li><a href="<?php __menu('deleteanuser'); ?>">Delete user</a></li>
                    </ul>
                </li>
                
                <li class="dropdown messages-menu">
                    <a href="#" class="dropdown-toggle" aria-expanded="false" data-toggle="dropdown"
                       href="javascript:;">
                        <i class="fa fa-cog fa-fw"></i>&nbsp;Pages Manager</a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php __menu('addnewpage'); ?>">Add New</a></li>
                        <li><a href="<?php __menu('viewpages'); ?>">All Pages</a></li>
                        <li class="divider"><a href="#">&nbsp;</a></li>
                        <li><a href="<?php __menu('blockmanager'); ?>">Block Manager</a></li>
                    </ul>
                </li>
                <li class="dropdown messages-menu">
                    <a href="#" class="dropdown-toggle" aria-expanded="false" data-toggle="dropdown"
                       href="javascript:;">
                        <i class="fa fa-cog fa-fw"></i>&nbsp;Academic Admin
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo base_url(); ?>" target="_blank">Visit Website</a></li>
                        <li><a href="<?php __menu('systemsettings'); ?>"><i class="fa fa-cog fa-fw"></i>System Settings</a></li>
                        <li><a href="<?php __menu('crm_panel'); ?>"><i class="fa fa-cog fa-fw"></i>Contacts Management</a></li>                        
                        <li><a href="#">Tools</a></li>
                        <li><a href="#">Send a support ticket</a></li>
                        <li><a href="#">Take a backup</a></li>
                    </ul>
                </li>
            <?php } ?>
            <?php
            //owndebugger($userinformation);
            ?>
            <li class="">
                <a href="<?php __menu('overview'); ?>" class="user-profile dropdown-toggle" data-toggle="dropdown"
                   aria-expanded="false">
                    <?php
                       //owndebugger($loggedinuserinformation);
                       //if(!empty($loggedinuserinformation))
                       $user = $this->ion_auth->user()->row();
                       $this->load->model('profile_model');
                       //dd($user);
                       $personal_info= $this->profile_model->getPersonalInformation($user->id);
                       //owndebugger($personal_info);
                       if (isset($personal_info->UserPhoto)) {
                           $url = base_url() . "uploads/pp/" . @$personal_info->UserPhoto;
                       } else {
                           $url = base_url() . "uploads/pp/blankavatar.jpg";
                       }
                       $id = '';
                       $class = 'avatar img-rounded img-thumbnail fb-image-profile thumbnail';
                       $alt = 'avatar';
                       $w = '20px';
                       __img($url, $id, $class, $alt, $w);
                       __e('<span class=" fa fa-angle-down"></span>');
                       //echo '<img src="'.$url.'" />';
                       ?><?php __e((isset($user->full_name_bn) ? ' ' . $user->full_name_bn : '')); ?>
                </a>
                <ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">
                    <li><a href="<?php __menu('overview'); ?>"> Profile</a></li>
                    <li><a href="<?php __menu('logout'); ?>"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                </ul>
            </li>
        </ul>
        <?php if ($this->ion_auth->in_group('Admin')) { ?>
            <div class="input-group extra10">
                <?php
                $q = $this->uri->segment(2);
                if (isset($_GET['userpage']) == true AND isset($q)) {
                    $uri2 = $this->uri->segment(2);
                }
                $data = array(
                    'type' => 'text',
                    'name' => 'userid',
                    'id' => 'modiy_user_id',
                    'class' => 'form-control',
                    'placeholder' => 'Enter User ID',
                    'value' => (isset($uri2) ? $uri2 : $userid)
                );
                echo form_input($data);
                ?>
                <span class="input-group-btn">
                <button id="userInfoOpenBtn" class="btn btn-success" type="button">Go!</button>
                <a class="btn btn-default" href="<?php __menu('usergenerator'); ?>">ID Generator</a>
                </span>
            </div>
        <?php } ?>

    </nav>
</div>
