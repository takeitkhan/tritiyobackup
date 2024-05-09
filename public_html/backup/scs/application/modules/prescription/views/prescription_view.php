<!--main content start-->
<section id="main-content">
    <section class="wrapper site-min-height">
        <!-- invoice start-->
        <section>
            <header class="panel-heading no-print">
                <i class="fa fa-book"></i>  <?php echo lang('prescription'); ?>
            </header>
            <div class="panel panel-primary">
                <!--<div class="panel-heading navyblue"> INVOICE</div>-->
                <div class="panel-body col-md-5" style="font-size: 10px;">
                    <div class="row invoice-list">

                        <style>

                            .panel-body {
                                padding: 15px;
                                background: #fff;
                            }

                            table{
                                box-shadow: none;
                            }

                            .table thead > tr > th, .table tbody > tr > th, .table tfoot > tr > th, .table thead > tr > td, .table tbody > tr > td, .table tfoot > tr > td {
                                padding: 10px;
                                height: 100px;
                            }

                        </style>

                        <?php $patient = $this->patient_model->getPatientById($prescription->patient); ?>



                        <?php $doctor = $this->doctor_model->getDoctorById($prescription->doctor); ?>

                        <div class="col-lg-4 col-sm-4" style="float: left;">
                            <h4><?php echo lang('patient'); ?>:</h4>
                            <p>
                                <?php
                                echo $patient->name . ' <br>';
                                echo $patient->address . '  <br/>';
                                P: echo $patient->phone
                                ?>
                            </p>
                        </div>
                        <div class="col-lg-4 col-sm-4" style="float: left;">
                            <h4><?php echo lang('doctor'); ?>:</h4>
                            <p>
                                <?php
                                echo $doctor->name . ' <br>';
                                echo $doctor->address . '  <br/>';
                                echo $doctor->phone;
                                ?>
                            </p>
                        </div>
                        <div class="col-lg-4 col-sm-4" style="float: left;">
                            <h4><?php echo lang('prescription'); ?> <?php echo lang('info'); ?></h4>
                            <ul class="unstyled">
                                <li><?php echo lang('prescription'); ?> Number		: <strong>000<?php echo $prescription->id; ?></strong></li>
                                <li>Date		: <?php echo date('m/d/Y', $prescription->date); ?></li>
                            </ul>
                        </div>

                    </div>




                    <table class="table table-striped table-hover">


                        <tbody>
                            <tr>

                                <td><?php echo lang('history'); ?> </td>
                                <td class=""><?php echo $prescription->symptom; ?> </td>
                            </tr>

                            <tr>

                                <td><?php echo lang('medication'); ?> </td>
                                <td class=""><?php echo $prescription->medicine; ?> </td>
                            </tr>

                            <tr>

                                <td><?php echo lang('note'); ?> </td>
                                <td class=""><?php echo $prescription->note; ?> </td>
                            </tr>
                        </tbody>
                    </table>

                    <div class="text-center invoice-btn no-print">
                        <a class="btn btn-info btn-lg invoice_button" onclick="javascript:window.print();"><i class="fa fa-print"></i> <?php echo lang('print'); ?> </a>
                    </div>
                </div>
            </div>
        </section>
        <!-- invoice end-->
    </section>
</section>
<!--main content end-->
<!--footer start-->

