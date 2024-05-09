<?php
//echo date('Y');
?>
<div class="row">
    <div class="col-md-12 col-xs-12 col-sm-12">
        <?php $this->load->view('profile/layouts/editormenu'); ?>
        <?php echo form_start_divs($title, 'Information' . (isset($userinformation2->full_name_en) ? ' of ' . $userinformation2->full_name_en . ', ' . (isset($groupname) ? $groupname : '') : '')); ?>
        <?php echo form_open_multipart('', array('class' => 'form-horizontal', 'id' => 'studentPersonalInformationForm')); ?>
        <?php
        // owndebugger($userinformation);
        $data = array(
            'type' => 'hidden',
            'name' => 'usergroupid',
            'value' => (isset($modifyuserid) ? $modifyuserid : 'none')
        );
        echo form_input($data);
        if ($modifyuserid == 4) {
            $data = array(
                'type' => 'hidden',
                'name' => 'studentpersonalinfoid',
                'value' => (isset($userinformation->StudentInfoId) ? $userinformation->StudentInfoId : 'none')
            );
            echo form_input($data);
        } else {
            $data3 = array(
                'type' => 'hidden',
                'name' => 'teacherstaffinfoid',
                'value' => (isset($userinformation1->TchStaffId) ? $userinformation1->TchStaffId : 'none')
            );
            echo form_input($data3);
        }

        ?>
        <input name="userid" type="hidden" value="<?php __e((isset($userid) ? $userid : 'none')); ?>">
        <?php if ($modifyuserid == 4) { ?>
            <div class="form-group">
                <input type="hidden" name="old_class" value="<?= (isset($userinformation->Class) ? $userinformation->Class : '')?>">
                <label class="col-md-3">Class</label>

                <div class="col-lg-3">
                    <?php echo form_dropdown('class', $class, set_value('class', (isset($userinformation->Class) ? $userinformation->Class : ''), TRUE), array('class' => 'form-control', 'readyonly' => 'readyonly')); ?>
                </div>
            </div>
            <div class="form-group">
                <input type="hidden" name="old_classroll" value="<?= (isset($userinformation->ClassRoll) ? $userinformation->ClassRoll : '')?>">
                <label class="col-md-3">Class Roll</label>

                <div class="col-lg-3">
                    <?php
                    $data = array(
                        'name' => 'classroll',
                        'class' => 'form-control',
                        'required' => 'required',
                        //'readonly' => 'readonly',
                        'value' => (isset($userinformation->ClassRoll) ? $userinformation->ClassRoll : '')
                    );
                    echo form_input($data);
                    ?>
                </div>
            </div>
            <div class="form-group">
                <input type="hidden" name="old_section" value="<?= (isset($userinformation->Section) ? $userinformation->Section : '')?>">
                <label class="col-md-3">Section</label>

                <div class="col-lg-3">
                    <?php echo form_dropdown('section', $section, set_value('section', (isset($userinformation->Section) ? $userinformation->Section : ''), TRUE), array('class' => 'form-control')); ?>
                </div>
            </div>


    <!-- This code for class 6th-8th subjects (Start) -->
        <?php if($userinformation->Class <= 8): ?>
            <?php
                $selected_mandatory_subjects = explode(',', @$selected_subject->mandatory_subjects); 
                $selected_optional_subject = explode(',', @$selected_subject->optional_subject);
                
                $subjects_mendatory = $this->db->get_where('initial_settings_info',['SettingsCategory'=> 4,'class_level'=> 1,'  subject_type'=> 1, 'status_type' => 'Active'])->result();
                $subjects_optional = $this->db->get_where('initial_settings_info',['SettingsCategory'=> 4,'class_level'=> 1,'  subject_type'=> 2])->result();
                
                $religional = array(295,296,297); 
                $optional_not_selected = array(371,372,373,374,375);
            ?>
            
            <?php  //owndebugger($subjects_mendatory); ?>
            <div class="form-group">
                <label class="col-md-3">আবশ্যিক বিষয় </label>
                <div class="col-md-6">
                    <select class="form-control subject select2" name="mandatory_subject[]" required multiple>
                        <option value="">Select</option>
                        <?php 
                           
                        foreach($subjects_mendatory as $subject): ?>
                        <?php
                            if(!empty($selected_mandatory_subjects[0]))
                            $selected = (in_array($subject->SettingsId,$selected_mandatory_subjects))? 'selected': '';
                            else
                            $selected = (in_array($subject->SettingsId, $religional))? '': 'selected';
                        ?>
                        <option <?= $selected ?> value="<?= $subject->SettingsId ?>"><?= $subject->SettingsDescription ?></option>
                        <?php endforeach; ?>
                        
                       
                    </select>
                 </div>
            </div>
            <div class="form-group">
                <label class="col-md-3">ঐচ্ছিক বিষয় </label>
                <div class="col-md-3">
                    <select class="form-control subject select2" name="optional_subject" required>
                        <option value="">Select</option>
                       <?php foreach($subjects_optional as $subject):  //owndebugger($subject);?>
                       <?php 
                            if(!empty($selected_optional_subject[0]))
                            $selected = (in_array($subject->SettingsId, $selected_optional_subject))? 'selected': '';
                            else
                            $selected = (in_array($subject->SettingsId, $optional_not_selected))? '': 'selected';
                        ?>
                        <option <?= $selected ?> value="<?= $subject->SettingsId ?>"><?= $subject->SettingsDescription ?></option>
                       <?php endforeach; ?> 
                    </select>
                 </div>
            </div>
        <?php endif; ?>
    <!-- This code for class 6th-8th subjects (end) -->
<!-- This code Only For 9,10,11,12 class (Start) -->
    <?php if($userinformation->Class > 8){ ?>
        <?php  if($userinformation->Class > 8 && $userinformation->Class < 11):  ?>
            <?php
                $selected_mandatory_subjects = explode(',', @$selected_subject->mandatory_subjects); 
                $selected_optional_subject = explode(',', @$selected_subject->optional_subject);
                $religional =  array(309,310,311);
                
                $groupid =$userinformation->GroupId;
                $level = 2;
                $this->db->select('*');
                $this->db->where(['SettingsCategory'=> 4,'class_level'=> $level]);
                $this->db->where_in('subject_type', array(1,3));
                // $this->db->where_not_in('SettingsId', array(308,309,310,311));
                if($groupid == 18){
                     $this->db->where_not_in('SettingsId', 307);
                }
                $this->db->like('groups', $groupid);
                $this->db->order_by('subject_type', 'ASC');
                $mandatory_subjects = $this->db->get('initial_settings_info')->result();

                $this->db->select('*');
                $this->db->where(['SettingsCategory'=> 4,'class_level'=> $level]);
                $this->db->where_in('subject_type', array(2,3));
                $this->db->like('groups', $groupid);
                $this->db->order_by('subject_type', 'ASC');
                $optional_subjects = $this->db->get('initial_settings_info')->result();

            ?>
            <script>
                function groupWiseSubject(){
                    var str = "";
                    jQuery( ".group-subject option:selected" ).each(function() {
                      str = jQuery( this ).val();
                    });
                    var level = 2;
                    // var selected_sub =  ;
                    // alert(str)
                    jQuery.ajax({
                        type: "POST",
                        dataType: 'json',
                        url: baseurl + 'getsubjectsbygroup',
                        data: {str:str,level:level},
                        success: function (data) {
                            console.log(data);
                            jQuery('.subject').html(data['html']);
                            jQuery('.optsubject').html(data['html2']);
                            //$('.inventory-form table tbody').append(data);
                        },
                    });
                }
            </script>
      
        <?php elseif($userinformation->Class > 10 && $userinformation->Class < 13): ?>
            <?php
                $selected_mandatory_subjects = explode(',', @$selected_subject->mandatory_subjects);
                $selected_optional_subject = explode(',', @$selected_subject->optional_subject);
                $religional = array(295,296,297);  
                $groupid =$userinformation->GroupId;
                $level = 3;
                $this->db->select('*');
                $this->db->where(['SettingsCategory'=> 4,'class_level'=> $level]);
                $this->db->where_in('subject_type', array(1,3));
                // $this->db->where_not_in('SettingsId', array(308,309,310,311));
                if($groupid == 18){
                     $this->db->where_not_in('SettingsId', 307);
                }
                $this->db->like('groups', $groupid);
                $this->db->order_by('subject_type', 'ASC');
                $mandatory_subjects = $this->db->get('initial_settings_info')->result();

                $this->db->select('*');
                $this->db->where(['SettingsCategory'=> 4,'class_level'=> $level]);
                $this->db->where_in('subject_type', array(2,3));
                $this->db->like('groups', $groupid);
                $this->db->order_by('subject_type', 'ASC');
                $optional_subjects = $this->db->get('initial_settings_info')->result();
            ?>
            <script>
                function groupWiseSubject(){
                    var str = "";
                    jQuery( ".group-subject option:selected" ).each(function() {
                      str = jQuery( this ).val();
                    });
                    var level = 3;
                    // alert(value)
                    jQuery.ajax({
                        type: "POST",
                        dataType: 'text',
                        url: baseurl + 'getsubjectsbygroup',
                        data: {str:str,level:level},
                        success: function (data) {
                            // alert(data);
                             jQuery('.subject').html(data);
                            //$('.inventory-form table tbody').append(data);
                        },
                    });
                }
            </script>
        <?php endif; ?>

            <div class="form-group">
                <input type="hidden" name="old_group" value="<?= (isset($userinformation->GroupId) ? $userinformation->GroupId : '')?>">
                <label class="col-md-3">Group</label>
                <div class="col-lg-3">
                    <?php echo form_dropdown('group', $group, set_value('group', (isset($userinformation->GroupId) ? $userinformation->GroupId : ''), TRUE), array('class' => 'form-control group-subject','onchange'=> "groupWiseSubject()")); ?>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3">Mandatory Subject</label>
                <div class="col-md-6">
                    <select class="form-control subject select2" name="mandatory_subject[]" required multiple>
                        <option value="">Select</option>
                       <?php foreach($mandatory_subjects as $subject):  //owndebugger($subject);?>
                            <?php 
                                if(!empty($selected_mandatory_subjects[0]))
                                $selected = (in_array( $subject->SettingsId, $selected_mandatory_subjects))? 'selected': '';
                                else
                                $selected = (in_array($subject->SettingsId, $religional))? '': 'selected';
                            ?>
                          <option <?= $selected ?> value="<?= $subject->SettingsId ?>"><?= $subject->SettingsDescription ?></option>
                       <?php endforeach; ?> 
                    </select>
                 </div>
            </div>

            <div class="form-group">
                <label class="col-md-3">Optional Subject</label>
                <div class="col-lg-3">
                    <select class="form-control optsubject" name="optional_subject" required>
                        <option value="">Select</option>
                        <?php foreach($optional_subjects as $subject):  //owndebugger($subject);?>
                            <?php 
                                if(!empty($selected_optional_subject[0]))
                                $selected = (in_array( $subject->SettingsId,$selected_optional_subject))? 'selected':''; 
                            ?>
                          <option <?= $selected ?> value="<?= $subject->SettingsId ?>"><?= $subject->SettingsDescription ?></option>
                        <?php endforeach; ?>
                    </select>
                 </div>
            </div>
            <div class="form-group" >
                <input type="hidden" name="old_department" value="<?= (isset($userinformation->Department) ? $userinformation->Department : '')?>">
                <label class="col-md-3">Department</label>

                <div class="col-lg-3">
                    <?php echo form_dropdown('department', $department, set_value('department', (isset($userinformation->Department) ? $userinformation->Department : ''), TRUE), array('class' => 'form-control')); ?>
                </div>
            </div>
        <?php } ?>
<!-- This code Only For 9,10,11,12 class (End) -->

            <div class="form-group">
                <label class="col-md-3">Year</label>
                <div class="col-md-3">
                    <select name="year" class="form-control">
                        <?php for($y = date('Y'); $y > 2013; $y--) { ?>
                            <option value="<?php echo $y; ?>"><?php echo $y; ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <input type="hidden" name="old_year" value="<?= (isset($userinformation->Department) ? $userinformation->Department : '')?>">
                <label class="col-md-3">Promote to next level</label>

                <div class="col-lg-8">
                    <?php echo form_radio('promote', '1', TRUE); ?> Do nothing
                    <?php echo form_radio('promote', '2', FALSE); ?> Promote                    
                </div>
            </div>
        <?php } else { ?>
            <div class="form-group">
                <label class="col-lg-3">Designation</label>

                <div class="col-md-8">
                    <select name="designation" id="" class="form-control">
                        <option value="0">Select One</option>
                        <?php //owndebugger($status_type); ?>
                        <?php foreach ($status_type as $item): ?>
                      
                        <option <?php if(!empty($userinformation1->Designation)){if($userinformation1->Designation == $item->SettingsId) echo 'selected'; } ?> value="<?php echo $item->SettingsId; ?>"><?php echo $item->SettingsName; ?></option>
                        
                        <?php endforeach; ?>
                    </select>

                    <?php // echo form_dropdown('designation', $designations, set_value('designation', (isset($userinformation1->Designation) ? $userinformation1->Designation : ''), TRUE), array('class' => 'form-control')); ?>
                </div>
            </div>

            <div class="form-group">
                <label class="col-lg-3">Salary Scale</label>

                <div class="col-md-8">
                    <?php
                    $data = array(
                        'name' => 'salaryscale',
                        'id' => 'salaryscale',
                        'class' => 'form-control',
                        'data-minlength' => '2',
                        'required' => 'required',
                        'value' => (isset($userinformation1->SalaryScale) ? $userinformation1->SalaryScale : '')
                    );

                    echo form_input($data);
                    ?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-3">Index Number</label>

                <div class="col-md-8">
                    <?php
                    $data = array(
                        'name' => 'indexnumber',
                        'id' => 'indexnumber',
                        'class' => 'form-control',
                        'data-minlength' => '2',
                        'value' => (isset($userinformation1->IndexNumber) ? $userinformation1->IndexNumber : '')
                    );

                    echo form_input($data);
                    ?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-3">Bank Account Number</label>

                <div class="col-md-8">
                    <?php
                    $data = array(
                        'name' => 'bankaccountnumber',
                        'id' => 'bankaccountnumber',
                        'class' => 'form-control',
                        'data-minlength' => '2',                        
                        'value' => (isset($userinformation1->BankAccountNumber) ? $userinformation1->BankAccountNumber : '')
                    );

                    echo form_input($data);
                    ?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-3">Bank Name</label>

                <div class="col-md-8">
                    <?php
                    $data = array(
                        'name' => 'bankname',
                        'id' => 'bankname',
                        'class' => 'form-control',
                        'data-minlength' => '2',                        
                        'value' => (isset($userinformation1->BankName) ? $userinformation1->BankName : '')
                    );

                    echo form_input($data);
                    ?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-3">Bank Branch Name</label>

                <div class="col-md-8">
                    <?php
                    $data = array(
                        'name' => 'bankbranchname',
                        'id' => 'bankbranchname',
                        'class' => 'form-control',
                        'data-minlength' => '2',                        
                        'value' => (isset($userinformation1->BankBranchName) ? $userinformation1->BankBranchName : '')
                    );

                    echo form_input($data);
                    ?>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3">Date Attended</label>

                <div class="col-md-8">
                    <?php
                    $data = array(
                        'name' => 'dateattended',
                        'id' => 'date',
                        'class' => 'form-control',
                        'value' => (isset($userinformation1->DateAttended) ? $userinformation1->DateAttended : '')
                    );

                    echo form_input($data);
                    ?>
                </div>
            </div>
        <?php } ?>

        <div class="form-group">
            <label class="col-md-3"></label>

            <div class="col-md-8">
                <input id="studentpersonalInfoBtn" class="btn btn-success" value="Save Changes"
                       type="submit">
                <span></span>
                <input class="btn btn-default" value="Cancel" type="reset">
            </div>
        </div>
        <?php echo form_close(); ?>
        <?php echo form_end_divs(); ?>
    </div>
</div>