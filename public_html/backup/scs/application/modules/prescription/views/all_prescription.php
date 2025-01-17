<!--sidebar end-->
<!--main content start-->
<section id="main-content">
    <section class="wrapper site-min-height">
        <!-- page start-->
        <section class="panel">
            <header class="panel-heading">
                <i class="fa fa-medkit"></i>    <?php echo lang('prescription'); ?>
            </header>
            <?php if ($this->ion_auth->in_group(array('admin', 'Doctor'))) { ?>
                <div class="panel-body">
                    <a class="btn btn-info btn_width" data-toggle="modal" href="#myModa3">
                        <i class="fa fa-plus-circle"> </i> <?php echo lang('add_new'); ?> 
                    </a>
                </div>
            <?php } ?>
            <div class="panel-body">
                <div class="adv-table editable-table ">
                    <div class="space15"></div>
                    <table class="table table-striped table-hover table-bordered" id="editable-sample">
                        <thead>
                            <tr>
                                <th> <?php echo lang('date'); ?></th>
                                <th> <?php echo lang('doctor'); ?></th>
                                <th> <?php echo lang('patient'); ?></th>
                                <th> <?php echo lang('options'); ?></th>
                            </tr>
                        </thead>
                        <tbody>

                        <style>

                            .img_url{
                                height:20px;
                                width:20px;
                                background-size: contain; 
                                max-height:20px;
                                border-radius: 100px;
                            }

                        </style>

                        <?php foreach ($prescriptions as $prescription) { ?>
                            <tr class="">
                                <td><?php echo date('d-m-Y', $prescription->date); ?></td>
                                <td> <?php echo $this->doctor_model->getDoctorById($prescription->doctor)->name; ?></td>
                                <td> <?php echo $this->patient_model->getPatientById($prescription->patient)->name; ?></td>

                                <td>
                                    <a class="btn btn-info btn-xs" title="<?php echo lang('view'); ?>" href="prescription/viewPrescription?id=<?php echo $prescription->id; ?>"><i class="fa fa-eye"> </i></a>   
                                    <a class="btn btn-info btn-xs editPrescription" title="<?php echo lang('edit'); ?>" data-toggle="modal" data-id="<?php echo $prescription->id; ?>"><i class="fa fa-edit"></i></a>
                                    <a class="btn btn-info btn-xs delete_button" href="prescription/delete?id=<?php echo $prescription->id; ?>&admin=1" title="<?php echo lang('delete'); ?>" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash-o"> </i></a>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
        <!-- page end-->
    </section>
</section>
<!--main content end-->
<!--footer start-->



<?php
$current_user = $this->ion_auth->get_user_id();
if ($this->ion_auth->in_group('Doctor')) {
    $doctor_id = $this->db->get_where('doctor', array('ion_user_id' => $current_user))->row()->id;
}
?>

<!-- Add Prescription Modal-->
<div class="modal fade" id="myModa3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">  
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title"><i class="fa fa-plus-circle"></i> <?php echo lang('add_prescription'); ?></h4>
            </div> 
            <div class="modal-body">
                <form role="form" action="prescription/addNewPrescription" class="clearfix" method="post" enctype="multipart/form-data">
                    
                    <div class="form-group col-md-4">
                        <label for="exampleInputEmail1"><?php echo lang('date'); ?></label>
                        <input type="text" class="form-control form-control-inline input-medium default-date-picker" name="date" id="exampleInputEmail1" value='' placeholder="">
                    </div>
                     <div class="form-group col-md-4">
                        <label for="exampleInputEmail1"><?php echo lang('doctor'); ?></label>
                        <select class="form-control m-bot15" name="doctor" value=''> 
                            <option value="">Select .....</option>
                            <?php foreach ($doctors as $doctor) { ?>
                                <option value="<?php echo $doctor->id; ?>" <?php
                                if (!empty($prescription->doctor)) {
                                    if ($prescription->doctor == $doctor->id) {
                                        echo 'selected';
                                    }
                                }
                                ?> ><?php echo $doctor->name; ?> </option>
                                    <?php } ?>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="exampleInputEmail1"><?php echo lang('patient'); ?></label>
                        <select class="form-control m-bot15" name="patient" value=''> 
                            <option value="">Select .....</option>
                            <?php foreach ($patients as $patientss) { ?>
                                <option value="<?php echo $patientss->id; ?>" <?php
                                if (!empty($prescription->patient)) {
                                    if ($prescription->patient == $patientss->id) {
                                        echo 'selected';
                                    }
                                }
                                ?> ><?php echo $patientss->name; ?> </option>
                                    <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3"><?php echo lang('history'); ?></label>
                        <div class="col-md-9">
                            <textarea class="ckeditor form-control" name="symptom" value="" rows="10"></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3"><?php echo lang('medication'); ?></label>
                        <div class="col-md-9">
                            <textarea class="ckeditor form-control" name="medicine" value="" rows="10"></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3"><?php echo lang('note'); ?></label>
                        <div class="col-md-9">
                            <textarea class="ckeditor form-control" name="note" value="" rows="10"></textarea>
                        </div>
                    </div>

                    <input type="hidden" name="patient_id" value='<?php echo $patient->id; ?>'>
                    <input type="hidden" name="admin" value='admin'>
                    <input type="hidden" name="id" value=''>
                    <section class="">
                        <button type="submit" name="submit" class="btn btn-info submit_button">Submit</button>
                    </section>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- Add Prescription Modal-->


<!-- Edit Prescription Modal-->
<div class="modal fade" id="myModal5" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">  
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title"><i class="fa fa-plus-circle"></i> <?php echo lang('edit_prescription'); ?></h4>
            </div> 
            <div class="modal-body">
                <form role="form" id="prescriptionEditForm" class="clearfix" action="prescription/addNewPrescription" method="post" enctype="multipart/form-data">
                    <div class="form-group col-md-4">
                        <label for="exampleInputEmail1"><?php echo lang('date'); ?></label>
                        <input type="text" class="form-control form-control-inline input-medium default-date-picker" name="date" id="exampleInputEmail1" value='' placeholder="">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="exampleInputEmail1"><?php echo lang('doctor'); ?></label>
                        <select class="form-control m-bot15" name="doctor" value=''> 
                            <option value="">Select .....</option>
                            <?php foreach ($doctors as $doctor) { ?>
                                <option value="<?php echo $doctor->id; ?>" <?php
                                if (!empty($prescription->doctor)) {
                                    if ($prescription->doctor == $doctor->id) {
                                        echo 'selected';
                                    }
                                }
                                ?> ><?php echo $doctor->name; ?> </option>
                                    <?php } ?>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="exampleInputEmail1"><?php echo lang('patient'); ?></label>
                        <select class="form-control m-bot15" name="patient" value=''> 
                            <option value="">Select .....</option>
                            <?php foreach ($patients as $patientss) { ?>
                                <option value="<?php echo $patientss->id; ?>" <?php
                                if (!empty($prescription->patient)) {
                                    if ($prescription->patient == $patientss->id) {
                                        echo 'selected';
                                    }
                                }
                                ?> ><?php echo $patientss->name; ?> </option>
                                    <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3"><?php echo lang('history'); ?></label>
                        <div class="col-md-9">
                            <textarea class="ckeditor form-control" id="editor1" name="symptom" value="" rows="10"></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3"><?php echo lang('medication'); ?></label>
                        <div class="col-md-9">
                            <textarea class="ckeditor form-control" id="editor2" name="medicine" value="" rows="10"></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3"><?php echo lang('note'); ?></label>
                        <div class="col-md-9">
                            <textarea class="ckeditor form-control" id="editor3" name="note" value="" rows="10"></textarea>
                        </div>
                    </div>

                    <input type="hidden" name="admin" value='admin'>
                    <input type="hidden" name="id" value=''>
                    <section class="">
                        <button type="submit" name="submit" class="btn btn-info submit_button"><?php echo lang('submit'); ?></button>
                    </section>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- Edit Prescription Modal-->


<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

<script type="text/javascript">
                                    $(document).ready(function () {
                                        $(".editPrescription").click(function (e) {
                                            e.preventDefault(e);
                                            // Get the record's ID via attribute  
                                            var iid = $(this).attr('data-id');
                                            $('#myModal5').modal('show');
                                            $.ajax({
                                                url: 'prescription/editPrescriptionByJason?id=' + iid,
                                                method: 'GET',
                                                data: '',
                                                dataType: 'json',
                                            }).success(function (response) {

                                                var de = response.prescription.date * 1000;
                                                var d = new Date(de);
                                                var da = (d.getDate() + 1) + '-' + (d.getMonth() + 1) + '-' + d.getFullYear();
                                                // Populate the form fields with the data returned from server
                                                $('#prescriptionEditForm').find('[name="id"]').val(response.prescription.id).end()
                                                $('#prescriptionEditForm').find('[name="date"]').val(da).end()
                                                $('#prescriptionEditForm').find('[name="patient"]').val(response.prescription.patient).end()
                                                $('#prescriptionEditForm').find('[name="doctor"]').val(response.prescription.doctor).end()
                                                $('#prescriptionEditForm').find('[name="doctor"]').val(response.prescription.doctor).end()

                                                CKEDITOR.instances['editor1'].setData(response.prescription.symptom)
                                                CKEDITOR.instances['editor2'].setData(response.prescription.medicine)
                                                CKEDITOR.instances['editor3'].setData(response.prescription.note)
                                            });
                                        });
                                    });
</script>





<script>
    $(document).ready(function () {
        $(".flashmessage").delay(3000).fadeOut(100);
    });
</script>

