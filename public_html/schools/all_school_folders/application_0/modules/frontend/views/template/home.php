<?php if($settings->SelectedTheme === 'lightpinktheme') { ?>
	<?php $this->load->view('lightpinktheme'); ?>
<?php } elseif($settings->SelectedTheme === 'lightviolettheme') {  ?>
	<?php $this->load->view('lightviolettheme'); ?>
<?php } elseif($settings->SelectedTheme === 'bluetheme') { ?>
	<?php $this->load->view('mainhometheme'); ?>
<?php } else { ?>
	<?php $this->load->view('mainhometheme'); ?>
<?php } ?>