<div class="container custom-container">
    <div class="row">
        <div class="col-md-5">
            <div class="x_panel">
                <div class="x_title">
                    <h2><?= @$title?></h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content" style="display: block;">
                    <?php echo message_box('success'); ?>
                    <?php echo message_box('error'); ?>
                        <form action="" method="post">
                            <div class="form-group ">
                                <label class="control-label">Bangla Name</label>
                                <input class="form-control" name="SettingsDescription" placeholder="বিষয়ের নাম " required value="<?= @$single_item->SettingsDescription ?>" type="text"/>
                            </div>
                            <div class="form-group ">
                                <input type="hidden" name="SettingsId" value="<?= @$single_item->SettingsId ?>">
                                <label class="control-label">English Name</label>
                                <input class="form-control" name="SettingsName" placeholder="Subjects Name in English" required value="<?= @$single_item->SettingsName ?>" type="text"/>
                            </div>
                            <div class="form-group ">
                                <input type="hidden" name="subject_sl" value="<?= @$single_item->subject_sl ?>">
                                <label class="control-label">Subject SL</label>
                                <input class="form-control" name="subject_sl" placeholder="Subject Serial Number in English" required value="<?= @$single_item->subject_sl ?>" type="text"/>
                            </div>
                            <?php //owndebugger(@$single_item); ?>

                            <script>
                                /*function mergebox(){
                                    if (jQuery('#merge').is(':checked')){
                                        // jQuery('#merge').val(1);
                                        jQuery('#mergeopt').show();
                                    }else{
                                         jQuery('#mergeopt').hide();
                                    }
                                }*/

                                function checkgroup(){
                                    var str = "";
                                    jQuery( ".lavelSelect option:selected" ).each(function() {
                                      str = jQuery( this ).val();
                                    });
                                    if(str == 2){
                                        jQuery('.group-level').show();
                                    }else if(str == 3){
                                        jQuery('.group-level').show();
                                    }else{
                                        jQuery('.group-level').hide();
                                    }
                                }

                            </script>

                            <div class="form-group">
                                <label class="control-label">Subject Level</label>
                                <select class="form-control lavelSelect" name="class_level" onchange="checkgroup()" required>
                                    <option value="" selected="selected">Select</option>
                                    <?php foreach ($class_level as $item): ?>
                                    <option <?php if(@$single_item->class_level == $item->id) echo 'selected'?> value="<?= $item->id?>"><?= $item->name_bangla;?></option>
                                  <?php endforeach; ?>
                                </select>
                            </div>


                            <div class="form-group group-level" <?php if(!empty($single_item->groups)): ?> style="display: block;" <?php else: ?> style="display: none;" <?php endif; ?>>
                                <label class="control-label">Group</label><br>
                                <?php $existgroup = explode(',', @$single_item->groups); //owndebugger($groups);?>
                                <select class="form-control select2" name="groups[]" multiple>
                                    <option value="">Select</option>
                                    <?php foreach ($groups as $item): ?>
                                    <option <?php if(in_array($item->SettingsId ,$existgroup)) echo 'selected'?> value="<?= $item->SettingsId?>"><?= $item->SettingsName;?></option>
                                  <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="formgroup">
                                <label class="control-label">Subject Type :</label><br>
                                <label><input type="radio" <?php if(@$single_item->subject_type == 1) echo 'checked'?> name="subject_type" value="1"> Mandatory</label>
                                <label><input type="radio" <?php if(@$single_item->subject_type == 2) echo 'checked'?> name="subject_type" value="2"> Optional</label>
                                <label><input type="radio" <?php if(@$single_item->subject_type == 3) echo 'checked'?> name="subject_type" value="3"> Both</label>
                            </div>



                            <div class="form-group ">
                                <input type="checkbox" class="" <?php if(@$single_item->mergeable == 1) echo 'checked'; ?> name="mergeable" id="merge" value="1"> <label for="merge">Is it Mergable Subject</label><br>
                            </div>
                            <div class="form-group ">
                                <input type="checkbox" class="" <?php if(@$single_item->noeffect == 1) echo 'checked'; ?> name="noeffect" id="noeffect" value="1"> <label for="merge">Is it Not Effectable For GPA</label><br>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="formgroup">
                                        <label class="control-label">CQ Marks</label>
                                        <input type="number" class="form-control" name="cq" value="<?= @$single_item->cq ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="formgroup">
                                        <label class="control-label">CQ Pass Marks</label>
                                        <input type="number" class="form-control" name="descriptive_pass_mark" value="<?= @$single_item->descriptive_pass_mark ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="formgroup">
                                        <label class="control-label">MCQ Marks</label>
                                        <input type="number" class="form-control" name="mcq" value="<?= @$single_item->mcq ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="formgroup">
                                        <label class="control-label">MCQ Pass Marks</label>
                                        <input type="number" class="form-control" name="mcq_pass_mark" value="<?= @$single_item->mcq_pass_mark ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="formgroup">
                                        <label class="control-label">Practical Marks</label>
                                        <input type="number" class="form-control" name="practical" value="<?= @$single_item->practical ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="formgroup">
                                        <label class="control-label">Practical Pass Marks</label>
                                        <input type="number" class="form-control" name="practical_pass_mark" value="<?= @$single_item->practical_pass_mark ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="formgroup">
                                        <label class="control-label">Mergable Subject</label>
                                        <input type="number" class="form-control" name="mergeable_id" value="<?= @$single_item->mergeable_id ?>">
                                    </div>
                                </div>

                            </div>
                            <div class="formgroup">
                                <label class="control-label">Comments</label>
                                <textarea name="comments" id="" cols="30" rows="3" class="form-control"><?= @$single_item->comments?></textarea>
                            </div>
                            <div class="form-group ">
                                <label class="control-label">Status</label>
                                <select class="form-control" name="status_type" required >
                                    <option value="">Status</option>
                                    <option <?php if(@$single_item->status_type == 'Active') echo 'selected'; ?> value="Active">Active</option>
                                    <option <?php if(@$single_item->status_type == 'Inactive') echo 'selected'; ?> value="Inactive">Inactive</option>
                                </select>
                            </div>
                            <br>
                            <div class="form-group">
                                <div class="pull-right">
                                    <button class="btn btn-success" type="submit">
                                        Submit
                                    </button>
                                </div>
                                <div>
                                   <a href="<?= base_url('subjectssettings')?>" class="btn btn-default">Cancel</a>
                                </div>
                            </div>
                        </form>
                </div>
            </div>
        </div>
        <?php if(@$subjects): ?>
        <div class="col-md-7">
            <div class="x_panel">
                <div class="x_title">
                    <h2>All Subjects</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content" style="display: block; min-height: 205px;">
                    <div class="col-md-12 pull-right">
                    	<form action="" method="get">
                    		<table class="table border-none">
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="form-group">
                                            <select class="form-control" name="level">
                                                <option value="">Select</option>
                                                <?php foreach ($class_level as $item): ?>
                                                <option <?php if(@$this->input->get('level') == $item->id) echo 'selected'?> value="<?= $item->id?>"><?= $item->name_bangla;?></option>
                                              <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group ">
                                            <input value="<?php echo @$this->input->get('SettingsName') ?>" class="form-control" name="SettingsName"
                                                   placeholder="Search Subject Name" type="text"/>
                                        </div>
                                    </td>
                                     <td>
                                        <select class="form-control" name="status_type">
                                            <option value="">Status</option>
                                            <option <?php if(@$this->input->get('status_type') == 'Active') echo 'selected' ?> value="Active">Active</option>
                                            <option <?php if(@$this->input->get('status_type') == 'Inactive') echo 'selected' ?>  value="Inactive">Inactive</option>
                                        </select>
                                    </td>
                                    <td>
                                        <input class="btn btn-success" value="Search" type="submit">
                                        <span></span>
                                        <!-- <a class="btn btn-default" href="">Clear</a> -->
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    	</form>

                            <table class="table table-bordered table-hover table-condensed table-striped" id="">
                                <thead>
                                    <th>SL</th>
                                    <th>ID</th>
	                                <th>Level</th>
	                                <th>Name</th>
	                                <th>Action</th>
                                </thead>
                                <tbody>
                                <?php 
                                //owndebugger($subjects);
                                    foreach ($subjects as $item): ?>
                                <tr>
                                        <td><?= $item->subject_sl;?></td>
                                        <td><?= $item->SettingsId;?></td>
                                        <td><?= tableSingleColumn('class_level','name_bangla',['id'=>$item->class_level]);?></td>
                                        <td><?= $item->SettingsDescription;?></td>
                                        <td>
                                            <div class="btn-group btn-xs">

                                                <a class="btn btn-xs btn-warning" href="<?php echo base_url("editsubject/$item->SettingsId") ?>"><i
                                                            class="fa fa-pencil fa-fw"></i></a>
                                                <a href="<?php echo base_url("activesubject/$item->SettingsId") ?>" onclick="confirm('Are you Sure ?')" class="btn btn-xs btn-success"><i class="fa fa-check-circle-o" aria-hidden="true"></i></a>
                                                <a href="<?php echo base_url("deletesubject/$item->SettingsId") ?>" onclick="confirm('Are you Sure ?')" class="btn btn-xs btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></a>

                                            </div>
                                        </td>
                                </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                            <div class="row">
	                            <div class="col-lg-12 col-xs-12">
	                                <ul class="pagination" style="display: table;margin:auto;">
	                                    <?= @$paging; ?>
	                                </ul>
	                            </div>
	                        </div>

                    </div>

                </div>
            </div>
        </div>
        <?php else: ?>
        <!--     <div class="col-md-7">
            <div class="x_panel">
                <div class="x_title">
                    <h2>All Subjects</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content" style="display: block; min-height: 205px;">
                    <div class="col-md-12 pull-right">
                        <table class="table table-bordered table-hover table-condensed table-striped" id="">
                            <thead>
                                <th>ID</th>
                                <th>Level</th>
                                <th>Name</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td colspan="4">Not Found</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div> -->
        <?php endif; ?>
    </div>
   <!--  <div class="row">
       <div class="col-md-6">
           <div class="x_panel">
               <div class="x_title">
                   <h2>Mergable Subject</h2>
                   <ul class="nav navbar-right panel_toolbox">
                       <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                       </li>
                       <li><a class="close-link"><i class="fa fa-close"></i></a>
                       </li>
                   </ul>
                   <div class="clearfix"></div>
               </div>
               <div class="x_content" style="display: block;">
                   <?php //echo message_box('success'); ?>
                   <?php// echo message_box('error'); ?>
                   <script>
                       function mergable(){
                           var level = jQuery('.mergable-subject').val();
                            alert(level)
                          /* jQuery.ajax({
                               type: "POST",
                               dataType: 'text',
                               url: baseurl + 'getsubjectsbygroup',
                               data: {str:str,level:level},
                               success: function (data) {
                                   // alert(data);
                                    jQuery('.subject').html(data);
                                   //$('.inventory-form table tbody').append(data);
                               },
                           });*/
                       }
                   </script>
                   <form action="">
                       <div class="form-group">
                           <label class="control-label"> Level</label>
                           <select class="form-control mergable-subject" name="level" onchange="mergable()">
                               <option value="" >Select</option>
                               <?php //$i = 1; foreach ($class_level as $item):?>

                               <option <?php //if($i == 3) echo "style='display:none'"; ?> <?php //if(@$single_item->class_level == $item->id) echo 'selected'?> value="<? //$item->id?>"><? //$item->name_bangla;?></option>

                             <?php //$i++; endforeach; ?>
                           </select>
                       </div>
                       <div class="form-group">
                           <label for="">Choose Mergable 1st Subject</label>
                           <select name="" id=""  class="form-control">
                               <option value="">A</option>
                               <option value="">B</option>
                           </select>
                       </div>
                       <div class="form-group">
                            <label for="">Choose Mergable 2nd Subject</label>
                           <select name="" id="" class="form-control">
                               <option value="">A</option>
                               <option value="">B</option>
                           </select>
                       </div>
                       <div class="form-group">
                           <label for="">After Merge Subject Name</label>
                           <input type="text" class="form-control" name="">
                       </div>
                       <div class="form-group">
                           <input type="submit" class="btn btn-success" name="" value="Save">
                       </div>
                   </form>

               </div>
           </div>
       </div>
       </div>
       <div class="col-md-6"></div>
   </div> -->
</div>
