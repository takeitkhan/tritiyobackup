<div class="nav_menu">
    <nav class="" role="navigation">
        <div class="nav toggle">
            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
        </div>
        <ul class="nav navbar-nav navbar-right">
            <?php if ($this->ion_auth->in_group('Admin')) { ?>
                <li><a href="<?php __menu('systemsettings'); ?>"><i class="fa fa-cog fa-fw"></i>System Settings</a></li>
            <?php } ?>
            <li class="">
                <a href="<?php __menu('overview'); ?>" class="user-profile dropdown-toggle" data-toggle="dropdown"
                   aria-expanded="false">
                    <?php
                    //owndebugger($loggedinuserinformation);
                    if (isset($loggedinuserinformation->UserPhoto)) {
                        $url = base_url() . "uploads/pp/" . $loggedinuserinformation->UserPhoto;
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

                    ?><?php __e((isset($loggedinuserinformation->full_name_bn) ? ' ' . $loggedinuserinformation->full_name_bn : '')); ?>
                </a>
                <ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">
                    <li><a href="<?php __menu('overview'); ?>"> Profile</a></li>
                    <li><a href="<?php __menu('logout'); ?>"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                </ul>
            </li>
        </ul>
        <?php if ($this->ion_auth->in_group('Admin')) { ?>
            <div style="display: none;" class="input-group extra10">
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
