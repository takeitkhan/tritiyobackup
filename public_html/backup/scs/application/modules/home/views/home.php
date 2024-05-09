<!--sidebar end-->
<!--main content start-->
<section id="main-content">
    <section class="wrapper site-min-height">
        <!--state overview start-->
        <div class="row state-overview" style="padding: 23px 19px;">
            <div class="col-lg-3 col-sm-6">
                <?php if ($this->ion_auth->in_group('admin')) { ?>
                    <a href="doctor">
                    <?php } ?>
                    <section class="panel">
                        <div class="symbol terques">
                            <i class="fa fa-stethoscope"></i>
                        </div>
                        <div class="value"> 
                            <h1 class="">
                                <?php echo $this->db->count_all('doctor'); ?>
                            </h1>
                            <p><?php echo lang('doctor'); ?></p>
                        </div>
                    </section>
                    <?php if (!$this->ion_auth->in_group('admin')) { ?>
                    </a>
                <?php } ?>
            </div>
            <div class="col-lg-3 col-sm-6">
                <?php if ($this->ion_auth->in_group('admin')) { ?>
                    <a href="patient">
                    <?php } ?>
                    <section class="panel">
                        <div class="symbol blue">
                            <i class="fa fa-users"></i>
                        </div>
                        <div class="value">
                            <h1 class="">
                                <?php echo $this->db->count_all('patient'); ?>
                            </h1>
                            <p><?php echo lang('patient'); ?></p>
                        </div>
                    </section>
                    <?php if ($this->ion_auth->in_group('admin')) { ?>
                    </a>
                <?php } ?>
            </div>
            <div class="col-lg-3 col-sm-6">
                <?php if ($this->ion_auth->in_group('admin')) { ?>
                    <a href="nurse">
                    <?php } ?>
                    <section class="panel">
                        <div class="symbol yellow">
                            <i class="fa fa-female"></i>
                        </div>
                        <div class="value">
                            <h1 class="">
                                <?php echo $this->db->count_all('nurse'); ?>
                            </h1>
                            <p><?php echo lang('nurse'); ?></p>
                        </div>
                    </section>
                    <?php if ($this->ion_auth->in_group('admin')) { ?>
                    </a>
                <?php } ?>
            </div>
            <div class="col-lg-3 col-sm-6">
                <?php if ($this->ion_auth->in_group('admin')) { ?>
                    <a href="pharmacist">
                    <?php } ?>
                    <section class="panel">
                        <div class="symbol terques">
                            <i class="fa  fa-medkit"></i>
                        </div>
                        <div class="value">
                            <h1 class="">
                                <?php echo $this->db->count_all('pharmacist'); ?>
                            </h1>
                            <p><?php echo lang('pharmacist'); ?></p>
                        </div>
                    </section>
                    <?php if ($this->ion_auth->in_group('admin')) { ?>
                    </a>
                <?php } ?>
            </div>
            <div class="col-lg-3 col-sm-6">
                <?php if ($this->ion_auth->in_group('admin')) { ?>
                    <a href="laboratorist">
                    <?php } ?>
                    <section class="panel">
                        <div class="symbol blue">
                            <i class="fa fa-user"></i>
                        </div>
                        <div class="value">
                            <h1 class="">
                                <?php echo $this->db->count_all('laboratorist'); ?>
                            </h1>
                            <p><?php echo lang('laboratorist'); ?></p>
                        </div>
                    </section>
                    <?php if ($this->ion_auth->in_group('admin')) { ?>
                    </a>
                <?php } ?>
            </div>
            <div class="col-lg-3 col-sm-6">
                <?php if ($this->ion_auth->in_group('admin')) { ?>
                    <a href="accountant">
                    <?php } ?>
                    <section class="panel">
                        <div class="symbol yellow">
                            <i class="fa fa-money"></i>
                        </div>
                        <div class="value">
                            <h1 class="">
                                <?php echo $this->db->count_all('accountant'); ?>
                            </h1>
                            <p><?php echo lang('accountant'); ?></p>
                        </div>
                    </section>
                    <?php if ($this->ion_auth->in_group('admin')) { ?>
                    </a>
                <?php } ?>
            </div>
            <div class="col-lg-3 col-sm-6">
                <?php if ($this->ion_auth->in_group('admin')) { ?>
                    <a href="finance/payment">
                    <?php } ?>
                    <section class="panel">
                        <div class="symbol blue">
                            <i class="fa fa-list-alt"></i>
                        </div>
                        <div class="value">
                            <h1 class="">
                                <?php echo $this->db->count_all('payment'); ?>
                            </h1>
                            <p><?php echo lang('payment'); ?></p>
                        </div>
                    </section>
                    <?php if ($this->ion_auth->in_group('admin')) { ?>
                    </a>
                <?php } ?>
            </div>
            <div class="col-lg-3 col-sm-6">
                <?php if ($this->ion_auth->in_group('admin')) { ?>
                    <a href="medicine">
                    <?php } ?>
                    <section class="panel">
                        <div class="symbol yellow">
                            <i class="fa fa-plus-square-o"></i>
                        </div>
                        <div class="value">
                            <h1 class="">
                                <?php echo $this->db->count_all('medicine'); ?>
                            </h1>
                            <p>Medicine</p>
                        </div>
                    </section>
                    <?php if ($this->ion_auth->in_group('admin')) { ?>
                    </a>
                <?php } ?>
            </div>
            <div class="col-lg-3 col-sm-6">
                <?php if ($this->ion_auth->in_group('admin')) { ?>
                    <a href="report/operation">
                    <?php } ?>
                    <section class="panel">
                        <div class="symbol terques">
                            <i class="fa  fa-wheelchair"></i>
                        </div>
                        <div class="value">
                            <h1 class="">
                                <?php
                                echo $this->db
                                        ->where('report_type', 'operation')
                                        ->count_all_results('report');
                                ?>
                            </h1>
                            <p><?php echo lang('operation_report'); ?></p>
                        </div>
                    </section>
                    <?php if ($this->ion_auth->in_group('admin')) { ?>
                    </a>
                <?php } ?>
            </div>
            <div class="col-lg-3 col-sm-6">
                <?php if ($this->ion_auth->in_group('admin')) { ?>
                    <a href="report/birth">
                    <?php } ?>
                    <section class="panel">
                        <div class="symbol blue">
                            <i class="fa fa-smile-o"></i>
                        </div>
                        <div class="value">
                            <h1 class="">
                                <?php
                                echo $this->db
                                        ->where('report_type', 'birth')
                                        ->count_all_results('report');
                                ?>
                            </h1>
                            <p><?php echo lang('birth_report'); ?></p>
                        </div>
                    </section>
                    <?php if ($this->ion_auth->in_group('admin')) { ?>
                    </a>
                <?php } ?>
            </div>
            <div class="col-lg-3 col-sm-6">
                <?php if ($this->ion_auth->in_group('admin')) { ?>
                    <a href="donor">
                    <?php } ?>
                    <section class="panel">
                        <div class="symbol yellow">
                            <i class="fa fa-briefcase"></i>
                        </div>
                        <div class="value">
                            <h1 class="">
                                <?php echo $z = $this->db->count_all('donor'); ?>
                            </h1>
                            <p><?php echo lang('donor'); ?></p>
                        </div>
                    </section>
                    <?php if ($this->ion_auth->in_group('admin')) { ?>
                    </a>
                <?php } ?>
            </div>
            <div class="col-lg-3 col-sm-6">
                <?php if ($this->ion_auth->in_group('admin')) { ?>
                    <a href="bed">
                    <?php } ?>
                    <section class="panel">
                        <div class="symbol terques">
                            <i class="fa fa-home"></i>
                        </div>
                        <div class="value">
                            <h1 class=" count13">
                                <?php echo $z = $this->db->count_all('bed'); ?>
                            </h1>
                            <p><?php echo lang('total_bed'); ?></p>
                        </div>
                    </section>
                    <?php if ($this->ion_auth->in_group('admin')) { ?>
                    </a>
                <?php } ?>
            </div>
            <div class="col-lg-3 col-sm-6">
                <?php if ($this->ion_auth->in_group('admin')) { ?>
                    <a href="medicine">
                    <?php } ?>
                    <section class="panel">
                        <div class="symbol blue">
                            <i class="fa fa-medkit"></i>
                        </div>
                        <div class="value">
                            <h1 class="">
                                <?php echo $this->db->count_all('medicine'); ?>
                            </h1>
                            <p><?php echo lang('medicine'); ?></p>
                        </div>
                    </section>
                    <?php if ($this->ion_auth->in_group('admin')) { ?>
                    </a>
                <?php } ?>
            </div>
            <?php if ($this->ion_auth->in_group('admin')) { ?>
                <div class="col-lg-6 col-sm-6">    
                    <a href="finance/payment">
                        <section class="panel">
                            <div class="symbol terques">
                                <i class="fa fa-bar-chart-o"></i>
                            </div>
                            <div class="value">
                                <h1 class=" count14">
                                    <?php echo $settings->currency; ?> <?php echo number_format($sum[0]->gross_total, 2); ?>
                                </h1>
                                <p><?php echo lang('total_payment'); ?></p>
                            </div>
                        </section>         
                    </a>     
                </div>
            <?php } ?>
            <div class="col-lg-3 col-sm-6">
                <?php if ($this->ion_auth->in_group('admin')) { ?>
                    <a href="department">
                    <?php } ?>
                    <section class="panel">
                        <div class="symbol blue">
                            <i class="fa fa-dashboard"></i>
                        </div>
                        <div class="value">
                            <h1 class="">
                                <?php echo $this->db->count_all('department'); ?>
                            </h1>
                            <p><?php echo lang('departments'); ?></p>
                        </div>
                    </section>
                    <?php if ($this->ion_auth->in_group('admin')) { ?>
                    </a>
                <?php } ?>
            </div>
        </div>

        <aside>
            <section class="panel">
                <div class="panel-body">
                    <div id="calendar" class="has-toolbar calendar_view"></div>
                </div>
            </section>
        </aside>

        <style>


            .panel-body{
                background: #fff;
            }


        </style>


        <!--state overview end-->
    </section>
</section>
<!--main content end-->
<!--footer start-->
<!--footer end-->
</section>

<!-- js placed at the end of the document so the pages load faster -->

<script src="common/js/jquery.sparkline.js" type="text/javascript"></script>
<script src="common/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
<script src="common/js/owl.carousel.js" ></script>
<script src="common/js/jquery.customSelect.min.js" ></script>
<script src="common/js/respond.min.js" ></script>

<!--common script for all pages-->
<script src="common/js/common-scripts.js"></script>

<!--script for this page-->
<script src="common/js/sparkline-chart.js"></script>
<script src="common/js/easy-pie-chart.js"></script>
<script src="common/js/count.js"></script>

<script>

    //owl carousel

    $(document).ready(function () {
        $("#owl-demo").owlCarousel({
            navigation: true,
            slideSpeed: 300,
            paginationSpeed: 400,
            singleItem: true,
            autoPlay: true

        });
    });

    //custom select box

    $(function () {
        $('select.styled').customSelect();
    });

</script>

</body>
</html>
