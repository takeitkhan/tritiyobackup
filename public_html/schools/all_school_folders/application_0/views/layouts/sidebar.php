<div class="left_col scroll-view">
    <div class="navbar nav_title" style="border: 0;">
        <a href="<?php __menu("dashboard") ?>" class="site_title"><i class="fa fa-paw"></i> <span>Smart Campus</span></a>
    </div>
    <div class="clearfix"></div>
    <!-- sidebar menu -->
    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
        <div class="menu_section">
            <h3>General</h3>
            <ul class="nav side-menu">
                <li><a href="<?php __menu("dashboard") ?>"><i class="fa fa-home"></i> Dashboard</a></li>
                <?php if ($this->ion_auth->in_group(1)) { ?>
                    <?php $this->load->view('layouts/layouts/admin'); ?>
                <?php } else if ($this->ion_auth->in_group(3)) { ?>
                    <?php $this->load->view('layouts/layouts/teacher'); ?>
                <?php } else if ($this->ion_auth->in_group(4)) { ?>
                    <?php $this->load->view('layouts/layouts/student'); ?>
                <?php } else if ($this->ion_auth->in_group(5)) { ?>
                    <?php $this->load->view('layouts/layouts/guardian'); ?>
                <?php } else if ($this->ion_auth->in_group(6)) { ?>
                    <?php $this->load->view('layouts/layouts/staff'); ?>
                <?php } else if ($this->ion_auth->in_group(7)) { ?>
                    <?php $this->load->view('layouts/layouts/accountant'); ?>
                <?php } else if ($this->ion_auth->in_group(8)) { ?>
                    <?php $this->load->view('layouts/layouts/operator'); ?>
                <?php } else if ($this->ion_auth->in_group(9)) { ?>
                    <?php $this->load->view('layouts/layouts/resultmanager'); ?>
                <?php } else if ($this->ion_auth->in_group(10)) { ?>
                    <?php $this->load->view('layouts/layouts/secratary'); ?>
                <?php } else if ($this->ion_auth->in_group(11)) { ?>
                    <?php $this->load->view('layouts/layouts/tpo'); ?>
                <?php } else if ($this->ion_auth->in_group(12)) { ?>
                    <?php $this->load->view('layouts/layouts/deo'); ?>
                <?php } else if ($this->ion_auth->in_group(13)) { ?>
                    <?php $this->load->view('layouts/layouts/diveo'); ?>
                <?php } ?>
            </ul>

        </div>
    </div>
    <!-- /sidebar menu -->
    <!-- /menu footer buttons -->
    <div class="sidebar-footer hidden-small">
        <a data-toggle="tooltip" data-placement="top" title="Settings">
            <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
        </a>
        <a data-toggle="tooltip" data-placement="top" title="FullScreen">
            <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
        </a>
        <a data-toggle="tooltip" data-placement="top" title="Lock">
            <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
        </a>
        <a href="<?php echo base_url(); ?>logout" data-toggle="tooltip" data-placement="top" title="Logout">
            <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
        </a>
    </div>
    <!-- /menu footer buttons -->
</div>
