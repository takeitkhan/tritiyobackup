<?php $this->load->view('template/header'); ?>
<?php $random = (isset($_GET['getrandomid']) ? $_GET['getrandomid'] : '0'); ?>
<?php if (!isset($_GET['step'])) { ?>
    <?php $this->load->view('admission/agreed_part'); ?>
<?php } else if ($_GET['step'] == 1) { ?>
    <?php $this->load->view('payment_part'); ?>
<?php } else if ($_GET['step'] == 2) { ?>
    <?php $this->load->view('student_info_part'); ?>
<?php } else if($_GET['step'] == 3) { ?>
    <?php $this->load->view('thank_you'); ?>
<?php } ?>
<?php $this->load->view('template/footer'); ?>

