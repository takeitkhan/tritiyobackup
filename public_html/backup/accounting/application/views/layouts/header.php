<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <meta name="sitename"
          content="<?php __e((isset($settings->InstituteName) ? $settings->InstituteName : 'Powered by Smart Campus')); ?>"/>
    <meta name="eiin"
          content="<?php __e((isset($settings->InstituteEIIN) ? 'ইআইআইএন # ' . $settings->InstituteEIIN : '')); ?>"/>
    <meta name="address"
          content="<?php __e((isset($settings->InstituteAddress) ? $settings->InstituteAddress : '')); ?>"/>
    <meta name="logo"
          content="<?php __e(base_url() . 'uploads/settings/' . (isset($settings->InstituteLogo) ? $settings->InstituteLogo : '')); ?>"/>

    <script type="text/javascript">var baseurl = "<?php echo base_url(); ?>";</script>
    <title><?php __e($title); ?></title>
    <?php echo put_headers(); ?>
    <link href="<?php echo base_url(); ?>/fonts/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>/footprints/js/cle/jquery.cleditor.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>/css/animate.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>/css/custom.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/css/maps/jquery-jvectormap-2.0.1.css"/>
    <link href="<?php echo base_url(); ?>/css/icheck/flat/green.css" rel="stylesheet"/>
    <link href="<?php echo base_url(); ?>/css/floatexamples.css" rel="stylesheet" type="text/css"/>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/css/bootstrap-select.min.css" />
    <link rel="stylesheet" href="<?= base_url(); ?>css/ionicons.min.css">
    <?php $this->load->view('layouts/iconsloader'); ?>
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<?php if ($this->ion_auth->logged_in()) { ?>
<body class="nav-md">
<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col"><?php $this->load->view('layouts/sidebar'); ?></div>
        <div class="top_nav"><?php $this->load->view('layouts/topnav'); ?></div>
        <div class="right_col" role="main">
            <div class="">
                <?php } else { ?>
                <body style="background:#F7F7F7;">
                <div class="">
                    <div id="wrapper">
                <?php } ?>