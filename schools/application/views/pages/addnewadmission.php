<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <?php echo form_open_multipart('', array('class' => 'form-horizontal', 'id' => 'addOnlineAdmissionForm', 'data-toggle' => 'validator')); ?>
        <div class="form-group">
            <label class="col-lg-3">Full Name (Bangla)</label>

            <div class="col-md-8">
                <?php
                $data = array(
                    'name' => 'full_name_bn',
                    'id' => 'full_name_bn',
                    'class' => 'form-control',
                    'data-minlength' => '2',
                    'required' => 'required');

                echo form_input($data);
                ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-3">Full Name (English)</label>

            <div class="col-md-8">
                <?php
                $data = array(
                    'name' => 'full_name_en',
                    'id' => 'full_name_en',
                    'class' => 'form-control',
                    'data-minlength' => '2',
                    'required' => 'required');

                echo form_input($data);
                ?>
            </div>
        </div>
        
         <div class="form-group">
            <label class="col-lg-3">Father's Name (Bangla)</label>

            <div class="col-md-8">
                <?php
                $data = array(
                    'name' => 'father_name_bn',
                    'id' => 'father_name_bn',
                    'class' => 'form-control',
                    'data-minlength' => '2',
                    'required' => 'required');

                echo form_input($data);
                ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-3">Father's Name (English)</label>

            <div class="col-md-8">
                <?php
                $data = array(
                    'name' => 'father_name_en',
                    'id' => 'father_name_en',
                    'class' => 'form-control',
                    'data-minlength' => '2',
                    'required' => 'required');

                echo form_input($data);
                ?>
            </div>
        </div>
        
         <div class="form-group">
            <label class="col-lg-3">Mother's Name (Bangla)</label>

            <div class="col-md-8">
                <?php
                $data = array(
                    'name' => 'mother_name_bn',
                    'id' => 'mother_name_bn',
                    'class' => 'form-control',
                    'data-minlength' => '2',
                    'required' => 'required');

                echo form_input($data);
                ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-3">Mother's Name (English)</label>

            <div class="col-md-8">
                <?php
                $data = array(
                    'name' => 'mother_name_en',
                    'id' => 'mother_name_en',
                    'class' => 'form-control',
                    'data-minlength' => '2',
                    'required' => 'required');

                echo form_input($data);
                ?>
            </div>
        </div>
        
        <div class="form-group">
            <label class="col-md-3">Date Of Birth</label>

            <div class="col-md-8">
                <?php
                $data = array(
                    'name' => 'date_of_birth',
                    'id' => 'date',
                    'class' => 'form-control');

                echo form_input($data);
                ?>
            </div>
        </div>
        
        <div class="form-group">
            <label class="col-lg-3">Mobile No</label>

            <div class="col-md-8">
                <?php
                $data = array(
                    'name' => 'mobile_no',
                    'id' => 'mobile_no',
                    'class' => 'form-control',
                    'data-minlength' => '2',
                    'required' => 'required');

                echo form_input($data);
                ?>
            </div>
        </div>
        
        <div class="form-group">
            <label class="col-lg-3">Permanent Address</label>

            <div class="col-md-8">
                <div class="col-md-3">
                    <?php
                              $data = array(
                                  'name' => 'permanent_villege', 
                                  'id' => 'permanent_villege',
                                  'class' => 'form-control',
                                  'placeholder' => 'Villege',
                                  'required' => 'required');

                              echo form_input($data);
                              ?>
                </div>
                <div class="col-md-3">
                    <?php
                              $data = array(
                                  'name' => 'permanent_post',
                                  'id' => 'permanent_post',
                                  'class' => 'form-control',
                                  'placeholder' => 'Post Office',
                                  'required' => 'required');

                              echo form_input($data);
                              ?>
                </div>
                <div class="col-md-3">
                    <?php
                              $data = array(
                                  'name' => 'permanent_upazila',
                                  'id' => 'permanent_upazila',
                                  'class' => 'form-control',
                                  'placeholder' => 'Upazila',
                                  'required' => 'required');

                              echo form_input($data);
                              ?>
                </div>
                <div class="col-md-3">
                    <?php
                              $data = array(
                                  'name' => 'permanent_district',
                                  'id' => 'permanent_district',
                                  'class' => 'form-control',
                                  'placeholder' => 'District',
                                  'required' => 'required');

                              echo form_input($data);
                              ?>
                </div>

            </div>
        </div>
        
        
        <div class="form-group">
            <label class="col-lg-3">Present Address</label>

            <div class="col-md-8">
                <div class="col-md-3">
                    <?php
                              $data = array(
                                  'name' => 'present_villege', 
                                  'id' => 'present_villege',
                                  'class' => 'form-control',
                                  'placeholder' => 'Villege',
                                  'required' => 'required');

                              echo form_input($data);
                              ?>
                </div>
                <div class="col-md-3">
                    <?php
                              $data = array(
                                  'name' => 'present_post',
                                  'id' => 'present_post',
                                  'class' => 'form-control',
                                  'placeholder' => 'Post Office',
                                  'required' => 'required');

                              echo form_input($data);
                              ?>
                </div>
                <div class="col-md-3">
                    <?php
                              $data = array(
                                  'name' => 'present_upazila',
                                  'id' => 'present_upazila',
                                  'class' => 'form-control',
                                  'placeholder' => 'Upazila',
                                  'required' => 'required');

                              echo form_input($data);
                              ?>
                </div>
                <div class="col-md-3">
                    <?php
                              $data = array(
                                  'name' => 'present_district',
                                  'id' => 'present_district',
                                  'class' => 'form-control',
                                  'placeholder' => 'District',
                                  'required' => 'required');

                              echo form_input($data);
                              ?>
                </div>

            </div>
        </div>
        
        <div class="form-group">
            <label class="col-lg-3">Guardian Except Father</label>

            <div class="col-md-8">
                <?php
                $data = array(
                    'name' => 'others_guardian',
                    'id' => 'others_guardian',
                    'class' => 'form-control',
                    'data-minlength' => '2',
                    'required' => 'required');

                echo form_input($data);
                ?>
            </div>
        </div>
        
        <div class="form-group">
            <label class="col-lg-3">Relation</label>

            <div class="col-md-8">
                <?php
                $data = array(
                    'name' => 'relation',
                    'id' => 'relation',
                    'class' => 'form-control',
                    'data-minlength' => '2',
                    'required' => 'required');

                echo form_input($data);
                ?>
            </div>
        </div>
        
        <div class="form-group">
            <label class="col-lg-3">Guardian Permanent Address</label>

            <div class="col-md-8">
                <?php
                $data = array(
                    'name' => 'others_guardian_permanent_address',
                    'id' => 'others_guardian_permanent_address',
                    'class' => 'form-control',
                    'data-minlength' => '2',
                    'required' => 'required');

                echo form_input($data);
                ?>
            </div>
        </div>
        
        <div class="form-group">
            <label class="col-lg-3">Mobile No</label>

            <div class="col-md-8">
                <?php
                $data = array(
                    'name' => 'others_guardian_present_address',
                    'id' => 'others_guardian_present_address',
                    'class' => 'form-control',
                    'data-minlength' => '2',
                    'required' => 'required');

                echo form_input($data);
                ?>
            </div>
        </div>
        
        <div class="form-group">
            <label class="col-lg-3">Guardian Mobile No</label>

            <div class="col-md-8">
                <?php
                $data = array(
                    'name' => 'guardian_mobile_no',
                    'id' => 'guardian_mobile_no',
                    'class' => 'form-control',
                    'data-minlength' => '2',
                    'required' => 'required');

                echo form_input($data);
                ?>
            </div>
        </div>
        
        <div class="form-group">
            <label class="col-lg-3">Nationality</label>

            <div class="col-md-8">
                <?php
                $data = array(
                    'name' => 'nationality',
                    'id' => 'nationality',
                    'class' => 'form-control',
                    'data-minlength' => '2',
                    'required' => 'required');

                echo form_input($data);
                ?>
            </div>
        </div>
        
        <div class="form-group">
            <label class="col-lg-3">Gender</label>

            <div class="col-md-8">
                <?php
                $data = array(
                    'name' => 'gender',
                    'id' => 'gender',
                    'class' => 'form-control',
                    'data-minlength' => '2',
                    'required' => 'required');

                echo form_input($data);
                ?>
            </div>
        </div>
        
        <div class="form-group">
            <label class="col-lg-3">Religion</label>

            <div class="col-md-8">
                <?php
                $data = array(
                    'name' => 'religion',
                    'id' => 'religion',
                    'class' => 'form-control',
                    'data-minlength' => '2',
                    'required' => 'required');

                echo form_input($data);
                ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-3">Religion</label>

            <div class="col-md-8">
                <?php
                $data = array(
                    'name' => 'religion',
                    'id' => 'religion',
                    'class' => 'form-control',
                    'data-minlength' => '2',
                    'required' => 'required');

                echo form_input($data);
                ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-3">Study Group</label>

            <div class="col-md-8">
                <?php
                $data = array(
                    'name' => 'std_group',
                    'id' => 'std_group',
                    'class' => 'form-control',
                    'data-minlength' => '2',
                    'required' => 'required');

                echo form_input($data);
                ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-3">Compulsory</label>

            <div class="col-md-8">
                <?php
                $data = array(
                    'name' => 'compulsory',
                    'id' => 'compulsory',
                    'class' => 'form-control',
                    'data-minlength' => '2',
                    'required' => 'required');

                echo form_input($data);
                ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-3">Selective Subject</label>

            <div class="col-md-8">
                <?php
                $data = array(
                    'name' => 'selective',
                    'id' => 'selective',
                    'class' => 'form-control',
                    'data-minlength' => '2',
                    'required' => 'required');

                echo form_input($data);
                ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-3">Optional</label>

            <div class="col-md-8">
                <?php
                $data = array(
                    'name' => 'optional',
                    'id' => 'optional',
                    'class' => 'form-control',
                    'data-minlength' => '2',
                    'required' => 'required');

                echo form_input($data);
                ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-3">ExamName1</label>

            <div class="col-md-8">
                <?php
                $data = array(
                    'name' => 'examname_1',
                    'id' => 'examname_1',
                    'class' => 'form-control',
                    'data-minlength' => '2',
                    'required' => 'required');

                echo form_input($data);
                ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-3">Board1</label>

            <div class="col-md-8">
                <?php
                $data = array(
                    'name' => 'board_1',
                    'id' => 'board_1',
                    'class' => 'form-control',
                    'data-minlength' => '2',
                    'required' => 'required');

                echo form_input($data);
                ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-3">Institute1</label>

            <div class="col-md-8">
                <?php
                $data = array(
                    'name' => 'institute_1',
                    'id' => 'institute_1',
                    'class' => 'form-control',
                    'data-minlength' => '2',
                    'required' => 'required');

                echo form_input($data);
                ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-3">PassYear1</label>

            <div class="col-md-8">
                <?php
                $data = array(
                    'name' => 'pass_yera_1',
                    'id' => 'pass_yera_1',
                    'class' => 'form-control',
                    'data-minlength' => '2',
                    'required' => 'required');

                echo form_input($data);
                ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-3">ExamCenterName1</label>

            <div class="col-md-8">
                <?php
                $data = array(
                    'name' => 'exam_center_name_1',
                    'id' => 'exam_center_name_1',
                    'class' => 'form-control',
                    'data-minlength' => '2',
                    'required' => 'required');

                echo form_input($data);
                ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-3">RollNo1</label>

            <div class="col-md-8">
                <?php
                $data = array(
                    'name' => 'roll_no_1',
                    'id' => 'roll_no_1',
                    'class' => 'form-control',
                    'data-minlength' => '2',
                    'required' => 'required');

                echo form_input($data);
                ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-3">RegNo1</label>

            <div class="col-md-8">
                <?php
                $data = array(
                    'name' => 'reg_no_1',
                    'id' => 'reg_no_1',
                    'class' => 'form-control',
                    'data-minlength' => '2',
                    'required' => 'required');

                echo form_input($data);
                ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-3">Session1</label>

            <div class="col-md-8">
                <?php
                $data = array(
                    'name' => 'session_1',
                    'id' => 'session_1',
                    'class' => 'form-control',
                    'data-minlength' => '2',
                    'required' => 'required');

                echo form_input($data);
                ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-3">Result1</label>

            <div class="col-md-8">
                <?php
                $data = array(
                    'name' => 'result_1',
                    'id' => 'result_1',
                    'class' => 'form-control',
                    'data-minlength' => '2',
                    'required' => 'required');

                echo form_input($data);
                ?>
            </div>
        </div>
        
        
        <div class="form-group">
            <label class="col-lg-3">ExamName2</label>

            <div class="col-md-8">
                <?php
                $data = array(
                    'name' => 'examname_2',
                    'id' => 'examname_2',
                    'class' => 'form-control',
                    'data-minlength' => '2',
                    'required' => 'required');

                echo form_input($data);
                ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-3">Board2</label>

            <div class="col-md-8">
                <?php
                $data = array(
                    'name' => 'board_2',
                    'id' => 'board_2',
                    'class' => 'form-control',
                    'data-minlength' => '2',
                    'required' => 'required');

                echo form_input($data);
                ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-3">Institute2</label>

            <div class="col-md-8">
                <?php
                $data = array(
                    'name' => 'institute_2',
                    'id' => 'institute_2',
                    'class' => 'form-control',
                    'data-minlength' => '2',
                    'required' => 'required');

                echo form_input($data);
                ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-3">PassYear2</label>

            <div class="col-md-8">
                <?php
                $data = array(
                    'name' => 'pass_yera_2',
                    'id' => 'pass_yera_2',
                    'class' => 'form-control',
                    'data-minlength' => '2',
                    'required' => 'required');

                echo form_input($data);
                ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-3">ExamCenterName2</label>

            <div class="col-md-8">
                <?php
                $data = array(
                    'name' => 'exam_center_name_2',
                    'id' => 'exam_center_name_2',
                    'class' => 'form-control',
                    'data-minlength' => '2',
                    'required' => 'required');

                echo form_input($data);
                ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-3">RollNo2</label>

            <div class="col-md-8">
                <?php
                $data = array(
                    'name' => 'roll_no_2',
                    'id' => 'roll_no_2',
                    'class' => 'form-control',
                    'data-minlength' => '2',
                    'required' => 'required');

                echo form_input($data);
                ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-3">RegNo2</label>

            <div class="col-md-8">
                <?php
                $data = array(
                    'name' => 'reg_no_2',
                    'id' => 'reg_no_2',
                    'class' => 'form-control',
                    'data-minlength' => '2',
                    'required' => 'required');

                echo form_input($data);
                ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-3">Session2</label>

            <div class="col-md-8">
                <?php
                $data = array(
                    'name' => 'session_2',
                    'id' => 'session_2',
                    'class' => 'form-control',
                    'data-minlength' => '2',
                    'required' => 'required');

                echo form_input($data);
                ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-3">Result2</label>

            <div class="col-md-8">
                <?php
                $data = array(
                    'name' => 'result_2',
                    'id' => 'result_2',
                    'class' => 'form-control',
                    'data-minlength' => '2',
                    'required' => 'required');

                echo form_input($data);
                ?>
            </div>
        </div>
        
        <div class="form-group">
            <label class="col-lg-3">ExamName3</label>

            <div class="col-md-8">
                <?php
                $data = array(
                    'name' => 'examname_3',
                    'id' => 'examname_3',
                    'class' => 'form-control',
                    'data-minlength' => '2',
                    'required' => 'required');

                echo form_input($data);
                ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-3">Board3</label>

            <div class="col-md-8">
                <?php
                $data = array(
                    'name' => 'board_3',
                    'id' => 'board_3',
                    'class' => 'form-control',
                    'data-minlength' => '2',
                    'required' => 'required');

                echo form_input($data);
                ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-3">Institute3</label>

            <div class="col-md-8">
                <?php
                $data = array(
                    'name' => 'institute_3',
                    'id' => 'institute_3',
                    'class' => 'form-control',
                    'data-minlength' => '2',
                    'required' => 'required');

                echo form_input($data);
                ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-3">PassYear3</label>

            <div class="col-md-8">
                <?php
                $data = array(
                    'name' => 'pass_yera_3',
                    'id' => 'pass_yera_3',
                    'class' => 'form-control',
                    'data-minlength' => '2',
                    'required' => 'required');

                echo form_input($data);
                ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-3">ExamCenterName3</label>

            <div class="col-md-8">
                <?php
                $data = array(
                    'name' => 'exam_center_name_3',
                    'id' => 'exam_center_name_3',
                    'class' => 'form-control',
                    'data-minlength' => '2',
                    'required' => 'required');

                echo form_input($data);
                ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-3">RollNo3</label>

            <div class="col-md-8">
                <?php
                $data = array(
                    'name' => 'roll_no_3',
                    'id' => 'roll_no_3',
                    'class' => 'form-control',
                    'data-minlength' => '2',
                    'required' => 'required');

                echo form_input($data);
                ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-3">RegNo3</label>

            <div class="col-md-8">
                <?php
                $data = array(
                    'name' => 'reg_no_3',
                    'id' => 'reg_no_3',
                    'class' => 'form-control',
                    'data-minlength' => '2',
                    'required' => 'required');

                echo form_input($data);
                ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-3">Session3</label>

            <div class="col-md-8">
                <?php
                $data = array(
                    'name' => 'session_3',
                    'id' => 'session_3',
                    'class' => 'form-control',
                    'data-minlength' => '2',
                    'required' => 'required');

                echo form_input($data);
                ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-3">Result3</label>

            <div class="col-md-8">
                <?php
                $data = array(
                    'name' => 'result_3',
                    'id' => 'result_3',
                    'class' => 'form-control',
                    'data-minlength' => '2',
                    'required' => 'required');

                echo form_input($data);
                ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-3">Class</label>

            <div class="col-md-8">
                <?php
                $data = array(
                    'name' => 'class',
                    'id' => 'class',
                    'class' => 'form-control',
                    'data-minlength' => '2',
                    'required' => 'required');

                echo form_input($data);
                ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-3">Section</label>

            <div class="col-md-8">
                <?php
                $data = array(
                    'name' => 'section',
                    'id' => 'section',
                    'class' => 'form-control',
                    'data-minlength' => '2',
                    'required' => 'required');

                echo form_input($data);
                ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-3">BkashNo</label>

            <div class="col-md-8">
                <?php
                $data = array(
                    'name' => 'bkash_no',
                    'id' => 'bkash_no',
                    'class' => 'form-control',
                    'data-minlength' => '2',
                    'required' => 'required');

                echo form_input($data);
                ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-3">Amount</label>

            <div class="col-md-8">
                <?php
                $data = array(
                    'name' => 'amount',
                    'id' => 'amount',
                    'class' => 'form-control',
                    'data-minlength' => '2',
                    'required' => 'required');

                echo form_input($data);
                ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-3">TransactionId</label>

            <div class="col-md-8">
                <?php
                $data = array(
                    'name' => 'transaction_id',
                    'id' => 'transaction_id',
                    'class' => 'form-control',
                    'data-minlength' => '2',
                    'required' => 'required');

                echo form_input($data);
                ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-3">Photo</label>

            <div class="col-md-8">
                <?php
                $data = array(
                    'name' => 'phpto',
                    'id' => 'phpto',
                    'class' => 'form-control',
                    'data-minlength' => '2',
                    'required' => 'required');

                echo form_input($data);
                ?>
            </div>
        </div>
        
        
        <div class="form-group">
            <label class="col-md-3"></label>

            <div class="col-md-8">
                <input name="addPageBtn" id="addPageBtn" class="btn btn-success" value="Save Changes"
                       type="submit">
                <span></span>
                <input class="btn btn-default" value="Cancel" type="reset">
            </div>
        </div>
        <?php echo form_close(); ?>
        <?php echo form_end_divs(); ?>
    </div>
</div>
