<div class="left_col scroll-view">
    <div class="navbar nav_title" style="border: 0;">
        <a href="<?php __menu("dashboard") ?>" class="site_title"><i class="fa fa-shopping-cart"></i> <span>3Cart</span></a>
    </div>
    <div class="clearfix"></div>    
    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
        <div class="menu_section">            
            <ul class="nav side-menu">
                <li><a href="<?php __menu("dashboard") ?>"><i class="fa fa-home"></i> Dashboard</a></li>
                <?php $this->load->view('layouts/sidebar_menus'); ?>                
            </ul>
        </div>
    </div>
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
