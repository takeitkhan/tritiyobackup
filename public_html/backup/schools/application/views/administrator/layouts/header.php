<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript">
        var baseurl = "<?php echo base_url(); ?>";
    </script>
    <title>
        <?php __e($title); ?>
    </title>
    <?php echo put_headers(); ?>
    <script type="text/javascript" src="<?php echo base_url() . 'footprints/js/jquery-2.1.4.min.js' ?>"></script>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet"
          type="text/css"/>
    <?php $this->load->view('layouts/iconsloader'); ?>

</head>
<body>
<div class="container">
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                        aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo base_url(); ?>dashboard"><?php __e($this->initial->initial_settings()->site_title); ?></a>

                <div class="pull-right" style="margin-top: 15px;" id="loading" style="display: none;">
                    <?php __img($this->initial->initial_settings()->loading_image, 'Loading', 132); ?>
                </div>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <?php if (!$this->ion_auth->is_admin()) { ?>
                    <?php
                    $attributes = array('class' => 'navbar-form navbar-right', 'id' => 'myform');
                    echo form_open("auth/login", $attributes);
                    ?>
                    <div class="form-group">
                        <?php
                        $data = array(
                            'type' => 'text',
                            'name' => 'identity',
                            'id' => 'identity',
                            'value' => '',
                            'placeholder' => 'Email',
                            'class' => 'form-control'
                        );
                        echo form_input($data);
                        ?>
                    </div>
                    <div class="form-group">
                        <?php
                        $data = array(
                            'type' => 'password',
                            'name' => 'password',
                            'id' => 'password',
                            'placeholder' => 'Password',
                            'value' => '',
                            'class' => 'form-control'
                        );
                        echo form_input($data);
                        ?>
                    </div>
                    <div class="form-group">
                        <?php echo form_checkbox('remember', '1', FALSE, 'id="remember"'); ?>
                    </div>
                    <?php
                    $data = array(
                        'class' => 'btn btn-default'
                    );
                    echo form_submit('submit', lang('login_submit_btn'), $data);
                    ?>

                    <?php echo form_close(); ?>
                <?php } else { ?>
                    <ul class="nav navbar-nav">
                        <li><a href="<?php echo base_url(); ?>administrator"><i class="fa fa-home"></i></a></li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" aria-expanded="true" aria-haspopup="true" role="button"
                               data-toggle="dropdown" href="#">
                                Subscribers
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo base_url(); ?>subscribers">View All Subscribers</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" aria-expanded="true" aria-haspopup="true" role="button"
                               data-toggle="dropdown" href="#">
                                Initial Settings
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Add Business Categories</a></li>
                            </ul>
                        </li>
                    </ul>

                <?php } ?>
            </div>
            <!--/.nav-collapse -->
        </div>
        <!--/.container-fluid -->
    </nav>
</div>

<div class="container">
    <div class="starter-template">
        <!-- Common Start -->