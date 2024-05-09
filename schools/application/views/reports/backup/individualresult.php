<div class="row">
    <div class="col-md-12 col-xs-12 col-sm-12">
        <?php echo form_start_divs('Semester Result By Student', 'individual result'); ?>
        <?php echo form_open_multipart(base_url() . 'getindividualresult', array('class' => 'form-horizontal','method' => 'get', 'id' => 'getResultReportForm', 'data-toggle' => 'validator')); ?>
        <div class="form-group">
            <div class="col-md-2">
                Student ID<br/>
                <?php
//                    if($this->input->get('studentid')){
//                        $value =(!empty($this->input->get('studentid')) ? $this->input->get('studentid') : '');
//                    }else{
//                        $value =(!empty($ui) ? $ui : '');
//                    }
                    $data = array(
                        'name' => 'studentid',
                        'id' => 'studentid',
                        'class' => 'form-control',
                        'data-minlength' => '2',
                        'required' => 'required',
                        'value' => @$this->input->get('studentid')
                    );
                    echo form_input($data);
                ?>
            </div>
            <div class="col-md-2">
                Select Exam<br/>
                <?php
                    echo form_dropdown('examid', $exams, set_value('examid', (isset($examid) ? $examid : ''), TRUE), array('class' => 'form-control', 'required' => 'required'));
                ?>
            </div>
            <div class="col-md-2">
                Class<br/>
                <?php echo form_dropdown('classs', $classes, set_value('classs', (isset($cid) ? $cid : ''), TRUE), array('class' => 'form-control', 'id' => 'classs','required' => 'required')); ?>
            </div>
            <div class="col-md-2">
                Section<br/>
                <?php echo form_dropdown('section', $sections, set_value('section', (isset($sid) ? $sid : ''), TRUE), array('class' => 'form-control', 'id' => 'section','required' => 'required')); ?>
            </div>
            <div class="col-md-2">
                Select Year<br/>
                <?php
                    $years = getYearLists();
                    echo form_dropdown('yearid', $years, set_value('yearid', (isset($yearid) ? $yearid : ''), TRUE), array('class' => 'form-control', 'required' => 'required'));
                ?>
            </div>


            <div class="col-md-3">
                <br/>
                <input id="getResultReportBtn" class="btn btn-success" value="Get Result Sheet" name="report"
                       type="submit">
                <span></span>
                <input class="btn btn-default" value="Cancel" type="reset">
            </div>
        </div>
        <?php echo form_close(); ?>
        <?php echo form_end_divs(); ?>
    </div>
    <?php if (!empty($result)) { ?>
        <div class="col-md-12 col-xs-12 col-sm-12">
            <div class="row" style="width: 900px;table-layout:fixed">
                <div class="col-md-10">
                    &nbsp;
                </div>
                <div class="col-md-2 pull-right">
                    <a href="javascript:void(0)" onclick="printdiv('result')">
                        <i class="fa fa-print" style="font-size: 22px;"></i>
                    </a>
                </div>
            </div>
            <div id="result" style="margin: 20px;">
				<div style="border: 2px solid orange;max-width: 1000px;margin: auto;">
					<div style="border: 2px dotted orange; margin: 4px;">
						<div style="border: 4px dotted orange; padding: 15px 15px 30px 15px;">
							<?php //owndebugger($settings); ?>
                
							<div style="font-size: 20px; font-family: 'kalpurush', 'Times New Roman'; vertical-align: top;">
								<table class="printtable" style="width: 100%;table-layout:fixed; font-size: 12px; font-family: 'Trebuchet MS', sans-serif;">
									<tr>
										<td style="width: 15%">
											<img src="<?php echo base_url('uploads/settings/'. $settings->InstituteLogo); ?>" width="75" />
										</td>
										<td style="width: 85%">
											<div style="width: 82%; float: left; text-align: center; font-family: kalpurush; margin-top: 10px; color: black;">
												<h1 style="font-size: 30px; margin: 0px; padding: 0px;"><?php echo $settings->InstituteName; ?></h1>
												<span style="font-size: 15px;">EIIN: <?php echo $settings->InstituteEIIN; ?>, <?php echo $settings->InstituteAddress; ?></span>
											</div>
										</td>
									</tr>
									<tr>
										<td style="width: 15%">
											&nbsp;
										</td>
										<td style="85%">
											<div style="width: 82%; float: left; text-align: center; font-family: kalpurush; margin-top: 10px; color: black;">
												<h3 style="font-size: 18px; margin: 0px; padding: 0px; text-transform: uppercase;">
													Result of
													<?php
													$info_exam = $this->common_model->get_initial_settings_by_id($examid);
													echo $info_exam->SettingsName;
													?> -
													<?php echo $yearid; ?>
												</h3>
											</div>
										</td>
									</tr>
								</table>
							</div>
							<hr style="color: #DDD; border-top: 2px dotted #DDD;" />
							
							<div style="font-size: 20px; font-family: 'kalpurush', 'Times New Roman'; vertical-align: top;">
								<table class="printtable" style="width: 100%;table-layout:fixed; font-size: 12px; font-family: 'Trebuchet MS', sans-serif;">
									<tr>									
										<td>
											<table  style="width:65%; float: left; border-collapse: collapse; font-size: 12px; font-family: 'Trebuchet MS', sans-serif;">

												<tr>
													<!-- Student Information -->
													<td width="100%" colspan="2"
														style="border: 1px solid #DDD; border-collapse: collapse; padding: 5px; font-weight: bold;">
														Details
													</td>
													<!-- Student Information -->
												</tr>
												<tr>
													<td style="border: 1px solid #DDD; width: 25%; border-collapse: collapse; padding: 5px; font-weight: bold;">
														Name
													</td>
													<td style="border: 1px solid #DDD; border-collapse: collapse; padding: 5px;"><?=@$biodata[0]->englishname; ?></td>
												</tr>
												<tr>
													<td width="130" style="border: 1px solid #DDD; border-collapse: collapse; padding: 5px; font-weight: bold;">
														Student ID
													</td>
													<td style="border: 1px solid #DDD; border-collapse: collapse; padding: 5px;"><?=@$biodata[0]->user_id; ?></td>
												</tr>
												<tr>
													<td width="130" style="border: 1px solid #DDD; border-collapse: collapse; padding: 5px; font-weight: bold;">
														Guardian Number
													</td>
													<td style="border: 1px solid #DDD; border-collapse: collapse; padding: 5px;"><?=@$biodata[0]->phone; ?></td>
												</tr>

											  <tr>
						<td width="130"
							style="border: 1px solid #DDD; border-collapse: collapse; padding: 5px; font-weight: bold;">Class
						</td>
						<td style="border: 1px solid #DDD; border-collapse: collapse; padding: 5px; font-weight: normal;">
							<?php $bnstdinfo = @$biodata[0]->enstdinfo;
							$return = explode('|', @$bnstdinfo);
							echo @$return[0];
							?>
						
						</td>
					</tr>
					<tr>
						<td width="130"
							style="border: 1px solid #DDD; border-collapse: collapse; padding: 5px; font-weight: bold;">Class
							Roll
						</td>
						<td style="border: 1px solid #DDD; border-collapse: collapse; padding: 5px;">
							<?= @$return[1]; ?>

							

						</td>
					</tr>
					<tr>
						<td width="130"
							style="border: 1px solid #DDD; border-collapse: collapse; padding: 5px; font-weight: bold;">Section
						</td>

						<td style="border: 1px solid #DDD; border-collapse: collapse; padding: 5px; font-weight: normal;">
							<?php echo $return[2]; ?>
						</td>
					</tr>
												<tr>
													<td width="130"
														style="border: 1px solid #DDD; border-collapse: collapse; padding: 5px; font-weight: bold;">
														Department
													</td>
													<td style="border: 1px solid #DDD; border-collapse: collapse; padding: 5px;"><?php __e((isset($return[4]) ? ' ' . $return[4] : 'Not Applicable')); ?></td>
												</tr>
												<tr>
													<td width="130"
														style="border: 1px solid #DDD; border-collapse: collapse; padding: 5px; font-weight: bold;">Group
													</td>
													<td style="border: 1px solid #DDD; border-collapse: collapse; padding: 5px; font-weight: normal;"><?php __e((isset($return[3]) ? ' ' . $return[3] : 'Not Applicable')); ?></td>
												</tr>

												<?php //userdetails($biodata); ?>
											</table>
											<table style="width: 25%; float: right;border-collapse: collapse;">
												<tr style=" border: 1px solid #DDD; border-collapse: collapse;">
													<th style="text-align: left;border: 1px solid #DDD; border-collapse: collapse; padding: 5px;">Grade</th>
													<th style="text-align: left;border: 1px solid #DDD; border-collapse: collapse; padding: 5px;">Interval</th>
													<th style="text-align: left;border: 1px solid #DDD; border-collapse: collapse; padding: 5px;">Point</th>
												</tr>
												<tr>
													<td style="text-align: left;border: 1px solid #DDD; border-collapse: collapse; padding: 5px;">A+</td>
													<td style="text-align: left;border: 1px solid #DDD; border-collapse: collapse; padding: 5px;">80-100</td>
													<td style="text-align: left;border: 1px solid #DDD; border-collapse: collapse; padding: 5px;">5</td>
												</tr>
												<tr>
													<td style="text-align: left;border: 1px solid #DDD; border-collapse: collapse; padding: 5px;">A</td>
													<td style="text-align: left;border: 1px solid #DDD; border-collapse: collapse; padding: 5px;">70-79</td>
													<td style="text-align: left;border: 1px solid #DDD; border-collapse: collapse; padding: 5px;">4</td>
												</tr>
												<tr>
													<td style="text-align: left;border: 1px solid #DDD; border-collapse: collapse; padding: 5px;">A-</td>
													<td style="text-align: left;border: 1px solid #DDD; border-collapse: collapse; padding: 5px;">60-69</td>
													<td style="text-align: left;border: 1px solid #DDD; border-collapse: collapse; padding: 5px;">3.5</td>
												</tr>
												<tr>
													<td style="text-align: left;border: 1px solid #DDD; border-collapse: collapse; padding: 5px;">B</td>
													<td style="text-align: left;border: 1px solid #DDD; border-collapse: collapse; padding: 5px;">50-59</td>
													<td style="text-align: left;border: 1px solid #DDD; border-collapse: collapse; padding: 5px;">3</td>
												</tr>
												<tr>
													<td style="text-align: left;border: 1px solid #DDD; border-collapse: collapse; padding: 5px;">C</td>
													<td style="text-align: left;border: 1px solid #DDD; border-collapse: collapse; padding: 5px;">40-49</td>
													<td style="text-align: left;border: 1px solid #DDD; border-collapse: collapse; padding: 5px;">2</td>
												</tr>
												<tr>
													<td style="text-align: left;border: 1px solid #DDD; border-collapse: collapse; padding: 5px;">D</td>
													<td style="text-align: left;border: 1px solid #DDD; border-collapse: collapse; padding: 5px;">33-39</td>
													<td style="text-align: left;border: 1px solid #DDD; border-collapse: collapse; padding: 5px;">1</td>
												</tr>
												<tr>
													<td style="text-align: left;border: 1px solid #DDD; border-collapse: collapse; padding: 5px;">F</td>
													<td style="text-align: left;border: 1px solid #DDD; border-collapse: collapse; padding: 5px;">00-32</td>
													<td style="text-align: left;border: 1px solid #DDD; border-collapse: collapse; padding: 5px;">0</td>
												</tr>
											</table>
										</td>
									</tr>
									<tr>
										<td>
											<hr style="color: #DDD; border-top: 2px dotted #DDD;" />
										</td>
									</tr>
									<tr>
										<td>
											<table style="width: 100%;table-layout:fixed; border-collapse: collapse; font-size: 12px; font-family: 'Trebuchet MS', sans-serif;">
												<tr style="border: 1px solid #DDD; border-collapse: collapse;">
													<th style="text-align: left;border: 1px solid #DDD; border-collapse: collapse; padding: 5px;">Was Absent?</th>
													<th  width="200" style="text-align: left;border: 1px solid #DDD; border-collapse: collapse; padding: 5px;">Subject Name</th>
													<th style="text-align: left;border: 1px solid #DDD; border-collapse: collapse; padding: 5px;">Written</th>
													<th style="text-align: left;border: 1px solid #DDD; border-collapse: collapse; padding: 5px;">MCQ</th>
													<th style="text-align: left;border: 1px solid #DDD; border-collapse: collapse; padding: 5px;">Practical</th>
													<th style="text-align: left;border: 1px solid #DDD; border-collapse: collapse; padding: 5px;">Total</th>
													<th style="text-align: left;border: 1px solid #DDD; border-collapse: collapse; padding: 5px;">Grade</th>
													<th style="text-align: left;border: 1px solid #DDD; border-collapse: collapse; padding: 5px;">GPA</th>
												</tr>
												<?php


												 // owndebugger($biodata);
				if(!empty($result)) {

					 $count = 0;
					 $gradesum = 0;
					 $my_total_marks = 0;
					foreach($result as $key => $value) {
					    $subject_mdatory = $this->result_model->get_subject_info($value['Subjects']);
					    
					    $Subject_role_json = @$value['Subject_rule'];
					    $Subject_role = json_decode($Subject_role_json);
					    $role_descriptive_pass_mark = $Subject_role->descriptive_pass_mark;
					    $role_mcq_pass_mark = $Subject_role->mcq_pass_mark;
					    $role_practical_pass_mark = $Subject_role->practical_pass_mark;
					    $role_cq = $Subject_role->cq;
					    $role_mcq = $Subject_role->mcq;
					    $role_practical = $Subject_role->practical;													 
					    $role_mergeable = $Subject_role->mergeable;
					    $mergeable_id = @$Subject_role->mergeable_id;
					    $role_subject_type = $Subject_role->subject_type;
					    
					    owndebugger($Subject_role);exit;
					    
					    if($mergeable_id != null){					    	
					    	$marge_number = $marg_arr[$mergeable_id];
					    }
						if($role_cq != 0){$my_written = trim(@$value['Written']);}else{$my_written = 0;}
						if($role_mcq != 0){$my_mcq = trim(@$value['MCQ']);}else{$my_mcq = 0;}
						if($role_practical != 0){$my_practical = trim(@$value['Practical']);}else{$my_practical = 0;}
														


		  if (($my_mcq < $role_mcq_pass_mark) || ($my_practical < $role_practical_pass_mark) || ($my_written < $role_descriptive_pass_mark)) {

			   if($role_mergeable == 1){
			   		if(($mergeable_id == null) || ($mergeable_id == '')){
			   			$marg_pass = array(
						    		'is_pass' => 'F', 
						    		'total' => (@$value['Written'] + @$value['MCQ'] + @$value['Practical']),
						    		'full' => $role_cq + $role_mcq + $role_practical
						    		);

			    	$marg_arr[@$value['Subjects']] = json_encode($marg_pass);
			    	$my_total = "<span style='color:red'>" . (@$value['Written'] + @$value['MCQ']) . "</span>";
			   		}else{

			   			$my_grade = "<span style='color:red'>F</span>";
			   			$my_gpa = 0;
			   			$grades[] = 'F'; 	
			   		}

			   }else{
			   		if(@$value['IsAbsent'] ==0) {

				   		 if($value['Subjects'] != $value['op_subject']){
					   		$my_total = "<span style='color:red'>" . (@$value['Written'] + @$value['MCQ'] +  @$value['Practical']) . "</span>";
						    $my_grade = "<span style='color:red'>F</span>";
						    $my_gpa = 0;
						    $grades[] = @$my_grade; 
						}else{
							$my_total = "<span>" . (@$value['Written'] + @$value['MCQ'] +  @$value['Practical']) . "</span>";
						    $my_grade = "";
						    $my_gpa = 0;
						}


					    if($value['Subjects'] != $value['op_subject']){
						    $count += 1;
						}
					}else{
						$my_grade = "<span style='color:red'>AB</span>";
						 $my_gpa = 0;
						 $grades[] = @$my_grade; 
					}
			   }

			  
		
		  }else {

		  	if($role_mergeable == 1){
		  		if(($mergeable_id == null) || ($mergeable_id == ''))
		  		{
					$marg_pass = array(
						    		'is_pass' => 'Y', 
						    		'total' => (@$value['Written'] + @$value['MCQ'] + @$value['Practical']),
						    		'full' => $role_cq + $role_mcq + $role_practical
						    		);
			    	$marg_arr[@$value['Subjects']] = json_encode($marg_pass);
			    	$my_total = (@$value['Written'] + @$value['MCQ'] + @$value['Practical']);
			    	$my_grade = '';
			    	$my_gpa = '';

		  		}else{
		  			 if($value['Subjects'] != $value['op_subject']){
					    $count += 1;
					}
		  			$ex_magre = json_decode($marg_arr[$mergeable_id], true);
		  			@$my_total =(@$value['Written'] + @$value['MCQ'] + @$value['Practical']);

		  			if($ex_magre['is_pass'] == 'F'){
			    		$my_grade = "<span style='color:red'>F</span>";
			    		$my_gpa = 0;
			    		$grades[] = 'F';


			    	}else{
			    		$intotal = (@$role_cq + @$role_mcq + @$role_practical +@$ex_magre['full']);
			    		$getMark = (@$value['Written'] + @$value['MCQ'] + @$value['Practical'] +@$ex_magre['total']);
			    		
			    		if($intotal == 200){
			    			$my_grade = makeGradeTwoHundred($getMark);
			    			$my_gpa = makeGpaTwoHundred($getMark);
			    		}
			    		if($intotal == 150){
			    			$my_grade = makeGradeHundredFifty($getMark);
			    			$my_gpa = makeGpaHundredFifty($getMark);
			    		}

			    		if($intotal == 100){
			    			$my_grade = makeGradeHundred($getMark);
			    			$my_gpa = makeGpaHundred($getMark);
			    		}															  	

			    		if($intotal == 50){
			    			$my_grade = makeGradeFifty($getMark);
			    			$my_gpa = makeGpaFifty($getMark);
			    		}
			    		if($intotal == 25){
			    			$my_grade = makeGradeTwentyFive($getMark);
			    			$my_gpa = makeGpaTwentyFive($getMark);
			    		}
			    		$grades[] = @$my_grade;


			    	}
			    	
		  		}
		  	}else{
		  		 if($value['Subjects'] != $value['op_subject']){
					    $count += 1;
					}
		  		$intotal = (@$role_cq + @$role_mcq + @$role_practical);
			    $my_total = (@$value['Written'] + @$value['MCQ'] + @$value['Practical']);
		  				if($intotal == 200){
			    			$my_grade = makeGradeTwoHundred($my_total);
			    			$my_gpa = makeGpaTwoHundred($my_total);
			    		}
			    		if($intotal == 150){
			    			$my_grade = makeGradeHundredFifty($my_total);
			    			$my_gpa = makeGpaHundredFifty($my_total);
			    		}

			    		if($intotal == 100){
			    			$my_grade = makeGradeHundred($my_total);
			    			$my_gpa = makeGpaHundred($my_total);
			    		}															  	

			    		if($intotal == 50){
			    			$my_grade = makeGradeFifty($my_total);
			    			$my_gpa = makeGpaFifty($my_total);
			    		}
			    		if($intotal == 25){
			    			$my_grade = makeGradeTwentyFive($my_total);
			    			$my_gpa = makeGpaTwentyFive($my_total);
			    		}
			    		
			    	$grades[] = @$my_grade;

			    		
		  		

		  	}

			    

			  
		  }

		  
		  $my_total_marks += $my_total;
														  



													?>


												<tr>
													<td style="text-align: left;border: 1px solid #DDD; border-collapse: collapse; padding: 5px;">
														<?php
														if(@$value['IsAbsent'] ==0) {
															  echo 'No';
														  } else {
															  echo 'Yes';
														  }
														  ?>
													</td>






													<td style="text-align: left;border: 1px solid #DDD; border-collapse: collapse; padding: 5px;"><?php echo tableSingleColumn('initial_settings_info', 'SettingsName', ['SettingsId' => $value['Subjects']]); ?></td>

													<td style="text-align: left;border: 1px solid #DDD; border-collapse: collapse; padding: 5px;">
													   <?php
													   if(@$value['IsAbsent'] ==0) {													   
															if(@$role_cq != 0){
													   		echo @globalSubjectFailCheck2(@$my_written, $value['Subjects'],$Subject_role_json, $value['op_subject'], 'CQ');
														  }
														}else{
															echo "<span style='color:red'>AB</span>";
														}
												

													   ?>
													</td>
													<td style="text-align: left;border: 1px solid #DDD; border-collapse: collapse; padding: 5px;">

													  <?php
													  	if(@$value['IsAbsent'] ==0) {
															if(@$role_mcq != 0){
													   			echo  globalSubjectFailCheck2($my_mcq, $value['Subjects'],$Subject_role_json, $value['op_subject'], 'MCQ') ;
													 		 }
												 		 }else{
															echo "<span style='color:red'>AB</span>";
														}
											 		 

													   ?>
													</td>
													<td style="text-align: left;border: 1px solid #DDD; border-collapse: collapse; padding: 5px;">
													  <?php
													  	if(@$value['IsAbsent'] ==0) {
															if(@$role_practical != 0){
																echo globalSubjectFailCheck2($my_practical, $value['Subjects'], $Subject_role_json, $value['op_subject'], 'PRACTICAL'); 
															}
														}else{
															echo "<span style='color:red'>AB</span>";
														}
												

													 ?>


													</td>
													<td style="text-align: left;border: 1px solid #DDD; border-collapse: collapse; padding: 5px;">

														<?php
														
															if(@$value['IsAbsent'] ==0) {
																echo @$my_total;
															}else{
																echo "<span style='color:red'>0</span>";
															}
														  ?>

													</td>
													<td style="text-align: left;border: 1px solid #DDD; border-collapse: collapse; padding: 5px;">
														<?php 
															
																echo @$my_grade; 
															
														?>


													</td>
													<td style="text-align: left;border: 1px solid #DDD; border-collapse: collapse; padding: 5px;">

														  <?php

														  
																if($value['Subjects'] == $value['op_subject']){
																	if(@$my_gpa > 2){
																		echo $newGpa= (@$my_gpa - 2);
																 		$gradesum += $newGpa;
																	}else{
																		echo 0;
																 		$gradesum += 0;
																	}
																 
																}else {
																 echo @$my_gpa;
																 $gradesum += @$my_gpa;
																}
														

														 
															?>
													</td>
												</tr>
												<?php

													  }
													   
													 }
													 if(@$count > 0){

														$avgcgpa = sprintf("%.2f", @$gradesum/@$count);
														}
													if (@in_array('F', @$grades)) {
														$fcgpa = 0;
														$fgrade = "F";
													}else {
														
														$fcgpa = @$avgcgpa;
														$fgrade = makeGpaGrade($fcgpa);

													}


												?>
												<tr style="text-align: left;border: 1px solid #DDD; border-collapse: collapse; padding: 5px;">
													<th style="text-align: left;border: 1px solid #DDD; border-collapse: collapse; padding: 5px;" colspan="5">Total Result </th>
													<th style="text-align: left;border: 1px solid #DDD; border-collapse: collapse; padding: 5px;"><?php 
													  echo $my_total_marks; ?></th>
													<th style="text-align: left;border: 1px solid #DDD; border-collapse: collapse; padding: 5px;"><?php 
													echo $fgrade; ?></th>
													<th style="text-align: left;border: 1px solid #DDD; border-collapse: collapse; padding: 5px;"><?php
													  echo $fcgpa; ?></th>
												</tr>
											</table>
										</td>
									</tr>
								</table>
					
								<br/><br/><br/><br/>
							</div>
							
							<div style="font-size: 20px; font-family: 'kalpurush', 'Times New Roman'; vertical-align: top;">
								<table class="printtable" style="width: 100%;table-layout:fixed; font-size: 12px; font-family: 'Trebuchet MS', sans-serif;">
									<tr>
										<td style="width: 26%">
											<br/><br/>
											<p style="border-top: 1px dotted #000; padding-top: 5px; text-align: center;">Guardian</p>
										</td>
										<td style="10%">&nbsp;</td>
										<td style="width: 26%">
											<br/><br/>
											<p style="border-top: 1px dotted #000; padding-top: 5px; text-align: center;">Class Teacher</p>
										</td>
										<td style="10%">&nbsp;</td>
										<td style="width: 26%; text-align: center;">
											<img src="<?php echo base_url('uploads/settings/' . $settings->AdminSign); ?>" height="35"/>
											<p style="border-top: 1px dotted #000; padding-top: 5px; text-align: center;">Head of Institute</p>
										</td>
									</tr>
									
									<tr>
										<td colspan="5"><br/>&nbsp;<br/></td>
									</tr>
									
									<tr>
										<td colspan="2" style="text-align: left;">
											Result Published Date: <?php echo date('d M, Y'); ?>
										</td>
										<td colspan="3" style="text-align: right;">
											<small>Powered By Tritiyo Limited, C: 01821660066</small>
										</td>
									</tr>
								</table>
							</div>
                
                
						</div>
					</div>
				</div>
			</div>
        </div>
    <?php } ?>
    <?php
    if (isset($biodata)) {
        //owndebugger($biodata);
    }
    ?>
</div>
