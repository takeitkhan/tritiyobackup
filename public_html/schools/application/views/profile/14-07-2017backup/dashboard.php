<?php
function settingHTML($heading)
{
    echo '<h2>' . $heading . '</h2>';
    echo settings_icons();
    echo '<div class="clearfix"></div>';
}

function icons_menu($icon, $menu, $menutext)
{
    $html = '<div class="col-md-2 dashicons">
        <a href="' . $menu . '">
            <i class="fa ' . $icon . '"></i>
            <h6>' . $menutext . '</h6>
        </a>
    </div>';
    return $html;
}

function icons_menu3($icon, $menu, $menutext)
{
    $html = '<div class="col-md-3 dashicons">
        <a href="' . $menu . '">
            <i class="fa ' . $icon . '"></i>
            <h6>' . $menutext . '</h6>
        </a>
    </div>';
    return $html;
}

function icons_menu4($icon, $menu, $menutext)
{
    $html = '<div class="col-md-4 dashicons">
        <a href="' . $menu . '">
            <i class="fa ' . $icon . '"></i>
            <h6>' . $menutext . '</h6>
        </a>
    </div>';
    return $html;
}

?>
<?php if ($this->ion_auth->in_group(1)) { ?>
    <?php $this->load->view('profile/layouts/admin'); ?>
<?php } else if ($this->ion_auth->in_group(3)) { ?>
    <?php $this->load->view('profile/layouts/common'); ?>
    <?php $this->load->view('profile/layouts/teacher'); ?>
<?php } else if ($this->ion_auth->in_group(4)) { ?>
    <?php $this->load->view('profile/layouts/common'); ?>
    <?php $this->load->view('profile/layouts/student'); ?>
<?php } else if ($this->ion_auth->in_group(5)) { ?>
    <?php $this->load->view('profile/layouts/common'); ?>
    <?php $this->load->view('profile/layouts/guardian'); ?>
<?php } else if ($this->ion_auth->in_group(6)) { ?>
    <?php $this->load->view('profile/layouts/common'); ?>
    <?php $this->load->view('profile/layouts/staff'); ?>
<?php } else if ($this->ion_auth->in_group(7)) { ?>
    <?php $this->load->view('profile/layouts/common'); ?>
    <?php $this->load->view('profile/layouts/accountant'); ?>
<?php } else if ($this->ion_auth->in_group(8)) { ?>
    <?php $this->load->view('profile/layouts/common'); ?>
    <?php $this->load->view('profile/layouts/operator'); ?>
<?php } else if ($this->ion_auth->in_group(9)) { ?>
    <?php $this->load->view('profile/layouts/common'); ?>
    <?php $this->load->view('profile/layouts/resultmanager'); ?>
<?php } else if ($this->ion_auth->in_group(10)) { ?>
    <?php $this->load->view('profile/layouts/common'); ?>
    <?php $this->load->view('profile/layouts/secratary'); ?>
<?php } else if ($this->ion_auth->in_group(11)) { ?>
    <?php $this->load->view('profile/layouts/common'); ?>
    <?php $this->load->view('profile/layouts/tpo'); ?>
<?php } else if ($this->ion_auth->in_group(12)) { ?>
    <?php $this->load->view('profile/layouts/common'); ?>
    <?php $this->load->view('profile/layouts/deo'); ?>
<?php } else if ($this->ion_auth->in_group(13)) { ?>
    <?php $this->load->view('profile/layouts/common'); ?>
    <?php $this->load->view('profile/layouts/diveo'); ?>
<?php } ?>