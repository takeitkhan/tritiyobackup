<div class="row">
    <div class="col-md-12 col-xs-12 col-sm-12">
        <?php $this->load->view('settings/layouts/editormenu'); ?>
        <?php echo form_start_divs($title, 'System Settings'); ?>
        	<?php
			if ($this->session->has_userdata("MessageBox")) {
			    echo $this->session->userdata("MessageBox");
			    $this->session->unset_userdata("MessageBox");
			}
			?>
	        <?php
	        if (!empty($facebook_profile)) {
	            if (isset($facebook_profile->photoURL)) {
	                echo "<img src='" . $facebook_profile->photoURL . "' width='60'/>";
	            }
	            if (isset($facebook_profile->displayName)) {
	                echo $facebook_profile->displayName;
	            }
	            echo '<a href="'. base_url(). 'hauth/logout/Facebook' .'" class="btn btn-success">Logout Facebook</a>';
	        } else {
	        	echo '<a href="'. base_url(). 'hauth/login/Facebook' .'" class="btn btn-success">Login Facebook</a>';
	        }
	        ?>

        <?php echo form_end_divs(); ?>
    </div>
</div>
