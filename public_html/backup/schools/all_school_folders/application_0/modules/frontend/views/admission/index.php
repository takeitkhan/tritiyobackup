<?php $this->load->view('template/header'); ?>
<?php if (!isset($_GET['step'])) { ?>
     <?php $this->load->view('student_info_part'); ?>
<?php } else if ($_GET['step'] == 'thanks') { ?>
    <?php $this->load->view('thank_you'); ?>
<?php } ?>
<?php $this->load->view('template/footer'); ?>

