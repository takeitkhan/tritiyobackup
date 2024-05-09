<!--sidebar end-->
<!--main content start-->
<section id="main-content">
    <section class="wrapper site-min-height">
        <!-- page start-->
        <section class="panel">
            <header class="panel-heading">
                <i class="fa fa-medkit"></i>    <?php echo lang('symptom'); ?>
            </header>
            <div class="panel-body">
                <div class="adv-table editable-table ">
                    <div class="clearfix">
                        <a data-toggle="modal" href="#myModal">
                            <div class="btn-group">
                                <button id="" class="btn green">
                                    <i class="fa fa-plus-circle"></i>  <?php echo lang('add_symptom'); ?>
                                </button>
                            </div>
                        </a>
                        <button class="export" onclick="javascript:window.print();">Print</button>  
                    </div>
                    <div class="space15"></div>
                    <table class="table table-striped table-hover table-bordered" id="editable-sample">
                        <thead>
                            <tr>
                                <th> <?php echo lang('id'); ?></th>
                                 <th> <?php echo lang('patient'); ?></th>
                                <th> <?php echo lang('date'); ?></th>
                                <th> <?php echo lang('symptoms'); ?></th>
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

                        <?php foreach ($symptoms as $symptom) { ?>
                            <tr class="">
                                <td><?php echo $symptom->id; ?></td>
                                <td><?php echo $this->patient_model->getPatientById($symptom->patient)->name; ?></td>
                                 <td><?php echo date('d-m-Y', $symptom->date); ?></td>
                                <td> <?php echo $symptom->name; ?></td>


                                <td>
                                    <button type="button" class="btn btn-info btn-xs btn_width editbutton" data-toggle="modal" data-id="<?php echo $symptom->id; ?>"><i class="fa fa-edit"> <?php echo lang('edit'); ?></i></button>   
                                    <a class="btn btn-info btn-xs btn_width delete_button" href="symptom/delete?id=<?php echo $symptom->id; ?>" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash-o"> <?php echo lang('delete'); ?></i></a>
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






<!-- Add Accountant Modal-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title"><i class="fa fa-plus-circle"></i>  <?php echo lang('add_symptom'); ?></h4>
            </div>
            <div class="modal-body">
                <form role="form" action="prescription/symptom/addNewSymptom" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="exampleInputEmail1"> <?php echo lang('patient'); ?></label>
                        <select class="form-control m-bot15" name="patient" value=''>
                            <?php foreach ($patients as $patient) { ?>
                                <option value="<?php echo $patient->id; ?>" <?php
                                if (!empty($symptom->patient)) {
                                    if ($patient->id == $symptom->patient) {
                                        echo 'selected';
                                    }
                                }
                                ?> > <?php echo $patient->name; ?> </option>
                                    <?php } ?> 
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1"> <?php echo lang('symptom'); ?></label>
                        <input type="text" class="form-control" name="name" id="exampleInputEmail1" value='' placeholder="">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1"> <?php echo lang('note'); ?></label>
                        <input type="text" class="form-control" name="note" id="exampleInputEmail1" value='' placeholder="">
                    </div>

                    <input type="hidden" name="id" value=''>
                    <button type="submit" name="submit" class="btn btn-info"> <?php echo lang('submit'); ?></button>
                </form>

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- Add Accountant Modal-->







<!-- Edit Event Modal-->
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title"><i class="fa fa-edit"></i>  <?php echo lang('edit_symptom'); ?></h4>
            </div>
            <div class="modal-body">
                <form role="form" id="editSymptomForm" action="prescription/symptom/addNewSymptom" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="exampleInputEmail1"> <?php echo lang('patient'); ?></label>
                        <select class="form-control m-bot15" name="patient" value=''>
                            <?php foreach ($patients as $patient) { ?>
                                <option value="<?php echo $patient->id; ?>" <?php
                                if (!empty($symptom->patient)) {
                                    if ($patient->id == $symptom->patient) {
                                        echo 'selected';
                                    }
                                }
                                ?> > <?php echo $patient->name; ?> </option>
                                    <?php } ?> 
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1"> <?php echo lang('symptom'); ?></label>
                        <input type="text" class="form-control" name="name" id="exampleInputEmail1" value='' placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1"> <?php echo lang('note'); ?></label>
                        <input type="text" class="form-control" name="note" id="exampleInputEmail1" value='' placeholder="">
                    </div>

                    <input type="hidden" name="id" value=''>
                    <button type="submit" name="submit" class="btn btn-info"> <?php echo lang('submit'); ?></button>
                </form>

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- Edit Event Modal-->

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript">
                                    $(document).ready(function () {
                                        $(".editbutton").click(function (e) {
                                            e.preventDefault(e);
                                            // Get the record's ID via attribute  
                                            var iid = $(this).attr('data-id');
                                            $('#editSymptomForm').trigger("reset");
                                            $('#myModal2').modal('show');
                                            $.ajax({
                                                url: 'prescription/symptom/editSymptomByJason?id=' + iid,
                                                method: 'GET',
                                                data: '',
                                                dataType: 'json',
                                            }).success(function (response) {
                                                // Populate the form fields with the data returned from server
                                                $('#editSymptomForm').find('[name="id"]').val(response.symptom.id).end()
                                                 $('#editSymptomForm').find('[name="patient"]').val(response.symptom.patient).end()
                                                $('#editSymptomForm').find('[name="name"]').val(response.symptom.name).end()
                                                $('#editSymptomForm').find('[name="note"]').val(response.symptom.note).end()
                                            });
                                        });
                                    });
</script>
<script>
    $(document).ready(function () {
        $(".flashmessage").delay(3000).fadeOut(100);
    });
</script>

