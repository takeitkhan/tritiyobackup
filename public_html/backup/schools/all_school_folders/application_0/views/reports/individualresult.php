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
     <form action="<?= base_url('send_result_all_sms') ?>" method="post">
        <div class="col-md-12 col-xs-12 col-sm-12">
            <div class="row" style="width: 900px;table-layout:fixed">
                <div class="col-md-10">
                    &nbsp;
                </div>
                <div class="col-md-2 pull-right">
                    <button type="submit" title="Send SMS Result">
                        <i class="fa fa-commenting" style="font-size: 22px;"></i>
                    </button>
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
											<img src="<?php echo base_url('uploads/settings/'. $settings->InstituteLogo); ?>" width="100" style="margin-top: 20px;" />
										</td>
										<td style="width: 85%">
											<div style="width: 82%; float: left; text-align: center; font-family: kalpurush; margin-top: 0px; color: black;">
												<h1 style="font-size: 35px; margin: 0px; padding: 0px;"><?php echo $settings->InstituteName; ?></h1>
												<span style="font-size: 20px;">EIIN: <?php echo $settings->InstituteEIIN; ?>, <?php echo $settings->InstituteAddress; ?></span>
											</div>
										</td>
									</tr>
									
									<tr>
										<td style="width: 15%">
											&nbsp;
										</td>
										<td style="85%">
											<div style="width: 82%; float: left; text-align: center; font-family: kalpurush; margin-top: 10px; color: black;">
												<h3 style="font-size: 22px;  font-weight: bold; margin: 0px; padding: 0px; text-transform: uppercase;">
													Result of
													<?php
													$info_exam = $this->common_model->get_initial_settings_by_id($examid);
													echo $info_exam->SettingsName;
													?> Examinaiton 
													<?php echo $yearid; ?>
												</h3>
											</div>
										</td>
									</tr>
									<tr>
										<td style="width: 15%">
											&nbsp;
										</td>
										<td style="85%">
											<div style="width: 82%; float: left; text-align: center; font-family: arial; margin-top: 10px; color: black;">
												<h3 style="font-size: 22px;  font-weight: bold;margin: 0px; padding: 0px; text-transform: uppercase;">
													ACADEMIC TRANSCRIPT
												</h3>
											</div>
										</td>
									</tr>
								</table>
							</div>
							<hr style="color: #000000; border-top: 2px dotted #555555;" />
							
							<div style="color: #000000; font-size: 14px; font-family: 'kalpurush', 'Times New Roman'; vertical-align: top;">
								<table>
								    <tr>
								        <td>
								            <table style="width: 100%;">
								                <tr>									
            										<td style="width: 60%; vertical-align: top;">
            											<table style="width: 100%;">
            												<!--<tr>-->
            												<!--	<td width="100%" colspan="2"-->
            												<!--		style="border: 1px solid #555555; border-collapse: collapse; padding: 5px; font-weight: bold;">-->
            												<!--	   Student Information-->
            												<!--	</td>-->
            												<!--</tr>-->
            												<tr>
            													<td style="border: 1px solid #555555; width: 45%; border-collapse: collapse; padding: 8px; font-weight: bold;">
            														Name
            													</td>
            													<td style="border: 1px solid #555555; border-collapse: collapse; padding: 8px;"><?=@$biodata[0]->englishname; ?></td>
            												</tr>
            												<tr>
            													<td width="130" style="border: 1px solid #555555; border-collapse: collapse; padding: 8px; font-weight: bold;">
            														Student ID
            													</td>
            													<td style="border: 1px solid #555555; border-collapse: collapse; padding: 8px;"><?=@$biodata[0]->user_id; ?></td>
            												</tr>
            												<tr>
            													<td width="200" style="border: 1px solid #555555; border-collapse: collapse; padding: 8px; font-weight: bold;">
            														Guardian Number
            													</td>
            													<td style="border: 1px solid #555555; border-collapse: collapse; padding: 8px;"><?=@$biodata[0]->phone; ?></td>
            												</tr>
            
            											  <tr>
                                    						<td width="160"
                                    							style="border: 1px solid #555555; border-collapse: collapse; padding: 5px; font-weight: bold;">Class
                                    						</td>
                                    						<td style="border: 1px solid #555555; border-collapse: collapse; padding: 5px; font-weight: normal;">
                                    							<?php $bnstdinfo = @$biodata[0]->enstdinfo;
                                    							$return = explode('|', @$bnstdinfo);
                                    							echo @$return[0];
                                    							?>
                                    						
                                    						</td>
                                    					</tr>
                                    					<tr>
                                    						<td width="130"
                                    							style="border: 1px solid #555555; border-collapse: collapse; padding: 5px; font-weight: bold;">Class
                                    							Roll
                                    						</td>
                                    						<td style="border: 1px solid #555555; border-collapse: collapse; padding: 5px;">
                                    							<?= @$return[1]; ?>
                                    						</td>
                                    					</tr>
                                    					<tr>
                                    						<td width="130"
                                    							style="border: 1px solid #555555; border-collapse: collapse; padding: 5px; font-weight: bold;">Section
                                    						</td>
                                    
                                    						<td style="border: 1px solid #555555; border-collapse: collapse; padding: 5px; font-weight: normal;">
                                    							<?php echo $return[2]; ?>
                                    						</td>
                                    					</tr>
            												<!--<tr>
            													<td width="130"
            														style="border: 1px solid #555555; border-collapse: collapse; padding: 5px; font-weight: bold;">
            														Department
            													</td>
            													<td style="border: 1px solid #555555; border-collapse: collapse; padding: 5px;"><?php __e((isset($return[4]) ? ' ' . $return[4] : 'Not Applicable')); ?></td>
            												</tr>
            												<tr>
            													<td width="130"
            														style="border: 1px solid #555555; border-collapse: collapse; padding: 5px; font-weight: bold;">Group
            													</td>
            													<td style="border: 1px solid #555555; border-collapse: collapse; padding: 5px; font-weight: normal;"><?php __e((isset($return[3]) ? ' ' . $return[3] : 'Not Applicable')); ?></td>
            												</tr>-->
            
            												<?php //userdetails($biodata); ?>
            											</table>
            										</td>
            										<td style="width: 25%;">
            										    &nbsp;
            										</td>
            										<td style="text-align: right;">
            										    <table style="float: right;border-collapse: collapse; font-size: 14px;">
            												<tr style=" border: 1px solid #555555; border-collapse: collapse;">
            													<th style="text-align: center;border: 1px solid #555555; font-weight: bold; border-collapse: collapse; padding: 2px; min-width: 80px;">Grade</th>
            													<th style="text-align: center;border: 1px solid #555555; font-weight: bold; border-collapse: collapse; padding: 2px; min-width: 80px;">Interval</th>
            													<th style="text-align: center;border: 1px solid #555555; font-weight: bold; border-collapse: collapse; padding: 2px; min-width: 80px;">Point</th>
            												</tr>
            												<tr>
            													<td style="text-align: center;border: 1px solid #555555; border-collapse: collapse; padding: 2px;">A+</td>
            													<td style="text-align: center;border: 1px solid #555555; border-collapse: collapse; padding: 2px;">80-100</td>
            													<td style="text-align: center;border: 1px solid #555555; border-collapse: collapse; padding: 2px;">5</td>
            												</tr>
            												<tr>
            													<td style="text-align: center;border: 1px solid #555555; border-collapse: collapse; padding: 2px;">A</td>
            													<td style="text-align: center;border: 1px solid #555555; border-collapse: collapse; padding: 2px;">70-79</td>
            													<td style="text-align: center;border: 1px solid #555555; border-collapse: collapse; padding: 2px;">4</td>
            												</tr>
            												<tr>
            													<td style="text-align: center;border: 1px solid #555555; border-collapse: collapse; padding: 2px;">A-</td>
            													<td style="text-align: center;border: 1px solid #555555; border-collapse: collapse; padding: 2px;">60-69</td>
            													<td style="text-align: center;border: 1px solid #555555; border-collapse: collapse; padding: 2px;">3.5</td>
            												</tr>
            												<tr>
            													<td style="text-align: center;border: 1px solid #555555; border-collapse: collapse; padding: 2px;">B</td>
            													<td style="text-align: center;border: 1px solid #555555; border-collapse: collapse; padding: 2px;">50-59</td>
            													<td style="text-align: center;border: 1px solid #555555; border-collapse: collapse; padding: 2px;">3</td>
            												</tr>
            												<tr>
            													<td style="text-align: center;border: 1px solid #555555; border-collapse: collapse; padding: 2px;">C</td>
            													<td style="text-align: center;border: 1px solid #555555; border-collapse: collapse; padding: 2px;">40-49</td>
            													<td style="text-align: center;border: 1px solid #555555; border-collapse: collapse; padding: 2px;">2</td>
            												</tr>
            												<tr>
            													<td style="text-align: center;border: 1px solid #555555; border-collapse: collapse; padding: 2px;">D</td>
            													<td style="text-align: center;border: 1px solid #555555; border-collapse: collapse; padding: 2px;">33-39</td>
            													<td style="text-align: center;border: 1px solid #555555; border-collapse: collapse; padding: 2px;">1</td>
            												</tr>
            												<tr>
            													<td style="text-align: center;border: 1px solid #555555; border-collapse: collapse; padding: 2px;">F</td>
            													<td style="text-align: center;border: 1px solid #555555; border-collapse: collapse; padding: 2px;">00-32</td>
            													<td style="text-align: center;border: 1px solid #555555; border-collapse: collapse; padding: 2px;">0</td>
            												</tr>
            												<tr>
            												    <td colspan="3"></td>
            												</tr>
            												<tr>
            												    <td colspan="3"></td>
            												</tr>
            												<tr>
            												    <td colspan="3"></td>
            												</tr>
            											</table>
            										</td>
            									</tr>
								            </table>
								            
								        </td>
								    </tr>
									
									<tr>
										<td>
											<hr style="color: #000000; border-top: 2px dotted #555555;" />
										</td>
									</tr>
									<tr>
										<td>
											<table style="width: 100%;table-layout:fixed;  font-size: 12px; font-family: 'Trebuchet MS', sans-serif;">
												<tr style="border: 1px solid #555555; border-collapse: collapse;">
													<th style="text-align: center;border: 1px solid #555555; border-collapse: collapse; padding: 5px;">SL</th>
													<th  width="300" style="text-align: center;border: 1px solid #555555; border-collapse: collapse; padding: 5px;">Subject Name</th>
													<th style="text-align: center;border: 1px solid #555555; border-collapse: collapse; padding: 5px;">Written</th>
													<th style="text-align: center;border: 1px solid #555555; border-collapse: collapse; padding: 5px;">MCQ</th>
													<th style="text-align: center;border: 1px solid #555555; border-collapse: collapse; padding: 5px;">Practical</th>
													<th style="text-align: center;border: 1px solid #555555; border-collapse: collapse; padding: 5px;">Total</th>
													<th style="text-align: center;border: 1px solid #555555; border-collapse: collapse; padding: 5px;">Grade</th>
													<th style="text-align: center;border: 1px solid #555555; border-collapse: collapse; padding: 5px;">GPA</th>
												</tr>
                                				<?php
                                				$sl = 1;
                                				if(!empty($result)): ?>

                                				<?php
                                				    $count = 0;
                                					 $gradesum = 0;
                                					 $my_total_marks = 0;
                                					 
                                					//owndebugger($result);

                                				?>
					                            <?php foreach($result as $key => $value) : ?>
                            					<?php
                            					    $subject_mdatory = $this->result_model->get_subject_info($value['Subjects']);
                            					    
                            					    //owndebugger($subject_mdatory);
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
                            					    
                            					    //owndebugger($value);
                            					    $get_num = fah_individual_subject_info($value);
                            					    
                            					    
                            					    //owndebugger($get_num);
                            					    
                            					 
                            					    
                            					    
                            					    $final_array['count'][] = @$get_num['c'];
                                                    $final_array['total'][] = @$get_num['t'];
                                                    $final_array['gpa'][] = @$get_num['g'];
                                                    $final_array['grade'][] = @$get_num['a'];
                            					?>
					    
	


												<tr>
													<td style="text-align: center;border: 1px solid #555555; border-collapse: collapse; padding: 5px;">
														<?php
                                                            // if(@$value['IsAbsent'] ==0) {
                                                            //     echo 'No';
                                                            // } else {
                                                            //     echo 'Yes';
                                                            // }
                                                            echo $sl;
														?>
													</td>
													<td style="text-align: left;border: 1px solid #555555; border-collapse: collapse; padding: 5px;"><?php echo tableSingleColumn('initial_settings_info', 'SettingsName', ['SettingsId' => $value['Subjects']]); ?></td>
													<td style="text-align: center;border: 1px solid #555555; border-collapse: collapse; padding: 5px;">
													   <?php
													    //owndebugger($get_num['w']);
													    echo $get_num['w'];
													   ?>
													</td>
													<td style="text-align: center;border: 1px solid #555555; border-collapse: collapse; padding: 5px;">
													  <?php
													    //owndebugger($get_num['o']);
													    echo $get_num['o'];
													  ?>
													</td>
													<td style="text-align: center;border: 1px solid #555555; border-collapse: collapse; padding: 5px;">
													   <?php
													    //owndebugger($get_num['p']);
													    echo $get_num['p'];
													   ?>
													</td>
													<td style="text-align: center;border: 1px solid #555555; border-collapse: collapse; padding: 5px;">
														 <?php echo $get_num['t']; ?>
													</td>
													<td style="text-align: center;border: 1px solid #555555; border-collapse: collapse; padding: 5px;">
														 <?php echo $get_num['a']; ?>
													</td>
													<td style="text-align: center;border: 1px solid #555555; border-collapse: collapse; padding: 5px;">
														  <?php echo $get_num['g']; ?>
													</td>
												</tr>
                        					<?php 
                            					$sl++; 
                            					endforeach;
                        					?>
													   
						                    <?php endif; ?>
						
                						    <?php
                                               // owndebugger(@$final_array[$student_id]);
                                                $get_fc = @array_sum(@$final_array['count']);
                                                $get_fg = @array_sum(@$final_array['gpa']);
                                                $get_ft = @array_sum(@$final_array['total']);
                                                $get_fa = @$final_array['grade'];
                
                                                if (@in_array('F', @$get_fa)) {
                                                    $avgcgpa = sprintf("%.2f", @$get_fg / @$get_fc);
                                                    $fgrade = 'F';
                                                    $fcgpa = $avgcgpa;
                                                } else {
                                                    if($get_fc != 0) {
                                                        $avgcgpa = sprintf("%.2f", @$get_fg / @$get_fc); 
                                                    } else {
                                                        $avgcgpa = sprintf("%.2f", @$get_fg / 1);   
                                                    }
                                                    
                                                    $fgrade = makeGpaGrade($avgcgpa);
                                                    $fcgpa = $avgcgpa;
                                                }
                
                                            ?>
												<tr style="text-align: left;border: 1px solid #555555; border-collapse: collapse; padding: 5px;">
													<th style="text-align: right;border: 1px solid #555555; border-collapse: collapse; padding: 5px;" colspan="5">Total Result </th>
													<th style="text-align: center;border: 1px solid #555555; border-collapse: collapse; padding: 5px;"><?= @$get_ft; ?></th>
													<th style="text-align: center;border: 1px solid #555555; border-collapse: collapse; padding: 5px;">
													<?php 
													    echo $fgrade; 
													?>
													</th>
												<th style="text-align: center;border: 1px solid #555555; border-collapse: collapse; padding: 5px;">
												<?php echo @$fcgpa; ?>
												</th>
												</tr>
											</table>
										</td>
									</tr>
								</table>
							
								<?php
								$sms = array(
                                    'gpa' => @$fcgpa,
                                    'grade' => @$fgrade,
                                    'phone' => @$biodata[0]->phone,
                                    'sid' => @$biodata[0]->user_id
                                );
                                $sms_json = json_encode(@$sms);
                            ?>
								<input type="hidden" value='<?= $sms_json; ?>' name="sms_json[]">
					
								<br/><br/><br/><br/>
							</div>
							
							<div style="color: #000000; font-size: 20px; font-family: 'kalpurush', 'Times New Roman'; vertical-align: top;">
								<table class="printtable" style="color: #000000; width: 100%;table-layout:fixed; font-size: 12px; font-family: 'Trebuchet MS', sans-serif;">
									<tr>
										<td style="width: 26%">
											<br/><br/>
											<p style="color: #000000; border-top: 1px dotted #000; padding-top: 5px; text-align: center;">Guardian</p>
										</td>
										<td style="10%">&nbsp;</td>
										<td style="width: 26%">
											<br/><br/>
											<p style="color: #000000; border-top: 1px dotted #000; padding-top: 5px; text-align: center;">Class Teacher</p>
										</td>
										<td style="10%">&nbsp;</td>
										<td style="width: 26%; text-align: center;">
										    <br/><br/>
											<!--<img src="<?php //echo base_url('uploads/settings/' . $settings->AdminSign); ?>" height="35"/>-->
											<p style="color: #000000; border-top: 1px dotted #000; padding-top: 5px; text-align: center;">Head of Institute</p>
										</td>
									</tr>
									
									<tr>
										<td colspan="5"><br/>&nbsp;<br/></td>
									</tr>
									
									<tr>
										<td colspan="2" style="text-align: left;color: #000000; ">
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
    </form>
    <?php } ?>
    <?php
    if (isset($biodata)) {
        //owndebugger($biodata);
    }
    ?>
</div>
