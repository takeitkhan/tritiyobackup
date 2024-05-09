<div class="row">
    <div class="col-md-12 col-xs-12 col-sm-12">
        <?php echo form_start_divs('Student Admit Card', 'individual'); ?>
        <?php echo form_open_multipart(base_url() . 'getindividualadmitcart', array('class' => 'form-horizontal','method' => 'get', 'id' => 'getResultReportForm', 'data-toggle' => 'validator')); ?>
        <div class="form-group">
            <div class="col-md-2">
                Student ID<br/>
                <?php
                    $data = array(
                        'name' => 'studentid',
                        'id' => 'studentid',
                        'class' => 'form-control',
                        'data-minlength' => '2',

                        'value' => @$this->input->get('studentid')
                    );
                    echo form_input($data);
                ?>
            </div>

            <div class="col-md-2">
                Type<br>
                <select name="g_title" class="form-control" required="required">
                    <option value="0">Select one</option>
                    <option value="1" <?php echo ($g_title == 1) ? 'selected="selected"' : null; ?>>Admit Card</option>
                    <option value="2" <?php echo ($g_title == 2) ? 'selected="selected"' : null; ?>>Testimonial</option>
                    <option value="3" <?php echo ($g_title == 3) ? 'selected="selected"' : null; ?>>ID Card</option>
                    <option value="4" <?php echo ($g_title == 4) ? 'selected="selected"' : null; ?>>Seat Plan</option>
                  </select>
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
                <input id="getResultReportBtn" class="btn btn-success" value="Get" name="report"
                       type="submit">
                <span></span>
                <input class="btn btn-default" value="Cancel" type="reset">
            </div>
        </div>
        <?php echo form_close(); ?>
        <?php echo form_end_divs(); ?>
    </div>
    <?php
      //owndebugger(@$report);

    if (@$report) {


      ?>
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
            <?php if($g_title == 1){
            //  owndebugger($report);

              ?>
            <div id="result">
                <style>
                    @media all {
                    	.page-break	{ display: none; }
                    }
                    @media print {
                    	.page-break	{ display: block; page-break-before: always; }
                    }
                </style>

              <?php $counter = 0;?>
            <?php foreach($report as $admit):?>
    				<div style="border: 2px solid orange;  width: 600px;margin: 20px">
    					<div style="border: 2px dotted orange; margin: 4px;">
    						<div style="border: 4px dotted orange; padding: 15px 15px 5px 15px;">
    							<div style="font-size: 20px; font-family: 'kalpurush', 'Times New Roman'; vertical-align: top;">
    								<table class="printtable" style="width: 100%;table-layout:fixed; font-size: 12px; font-family: 'Trebuchet MS', sans-serif;">
    									<tr>
    										<td style="width: 15%">

    											<img src="<?php echo base_url('uploads/settings/'. $settings->InstituteLogo); ?>" width="75" />
    										</td>
    										<td style="width: 85%">
    											<div style="width: 82%; float: left; text-align: center; font-family: kalpurush; margin-top: 10px; color: black;">
    												<h1 style="font-size: 30px; margin: 0px; padding: 0px; line-height:16px;"><?php echo $settings->InstituteName; ?></h1>
    												<span style="font-size: 15px;">EIIN: <?php echo $settings->InstituteEIIN; ?>, <?php echo $settings->InstituteAddress; ?></span>
    											</div>
    										</td>
    									</tr>
    									<tr>
    										<td style="width: 15%">
    											&nbsp;
    										</td>
    										<td style="85%">
    											<div style="width: 82%; float: left; text-align: center; font-family: kalpurush; margin-top: 10px; color: black;margin:0px">
    												<h3 style="font-size: 18px; margin: 0px; padding: 0px; text-transform: uppercase;">
    													Admit Card of
    													<?php
    													$info_exam = $this->common_model->get_initial_settings_by_id($examid);
    													echo @$info_exam->SettingsName;
    													?> -
    													<?php echo @$yearid; ?>
    												</h3>
    											</div>
    										</td>
    									</tr>
    								</table>
    							</div>

    							<hr style="color: #DDD; border-top: 2px dotted #DDD;margin: 10px 0;" />

    							<div style="font-size: 20px; font-family: 'kalpurush', 'Times New Roman'; vertical-align: top;">
    								<table class="printtable" style="width: 100%;table-layout:fixed; font-size: 12px; font-family: 'Trebuchet MS', sans-serif;">

    									<tr>
    										<td>
    											<table  style="width:70%; float: left; border-collapse: collapse; font-size: 12px; font-family: 'Trebuchet MS', sans-serif;">


    												<tr>
    													<td style="border: 1px solid #DDD; width: 25%; border-collapse: collapse; padding: 5px; font-weight: bold;">
    														Name
    													</td>
    													<td style="border: 1px solid #DDD; border-collapse: collapse; padding: 5px;"><?php echo tableSingleColumn('users', 'full_name_en', ['id' => @$admit->UserId]); ?></td>
    												</tr>
    												<tr>
    													<td width="130" style="border: 1px solid #DDD; border-collapse: collapse; padding: 5px; font-weight: bold;">
    														Student ID
    													</td>
    													<td style="border: 1px solid #DDD; border-collapse: collapse; padding: 5px;"><?=@$admit->UserId;?></td>
    												</tr>



    											  <tr>
    											  <td width="130"
    												  style="border: 1px solid #DDD; border-collapse: collapse; padding: 5px; font-weight: bold;">Class
    											  </td>
    											  <td style="border: 1px solid #DDD; border-collapse: collapse; padding: 5px; font-weight: normal;">
    												  <?php //__e((isset($return[0]) ? ' ' . $return[0] : '')); ?>
    												  <?php echo tableSingleColumn('initial_settings_info', 'SettingsName', ['SettingsId' => @$admit->Class, 'SettingsCategory' => 1]); ?>
    												  </td>
    												</tr>
    												<tr>
    													<td width="130"
    														style="border: 1px solid #DDD; border-collapse: collapse; padding: 5px; font-weight: bold;">Class
    														Roll
    													</td>
    													<td style="border: 1px solid #DDD; border-collapse: collapse; padding: 5px;">
    													     <?=@$admit->ClassRoll;?>
    													</td>
    												</tr>
    												<tr>
    													<td width="130"
    														style="border: 1px solid #DDD; border-collapse: collapse; padding: 5px; font-weight: bold;">Section
    													</td>

    													<td style="border: 1px solid #DDD; border-collapse: collapse; padding: 5px; font-weight: normal;">

    														<?php echo tableSingleColumn('initial_settings_info', 'SettingsName', ['SettingsId' => $this->input->get('section')]); ?>
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
    											<table  style="width:15%; float: left; border-collapse: collapse; font-size: 12px; font-family: 'Trebuchet MS', sans-serif;">

    												<tr>
    													<!-- Student Information -->
    													<td width="100%" colspan="2" style="border: 0; border-collapse: collapse; padding: 5px; font-weight: bold; text-align: center; font-size: 40px;">
                                <?php  $profile_photo = tableSingleColumn('u_basicinfos', 'UserPhoto', ['UserId' => @$admit->UserId]); ?>
    													  <img style="border: 7px solid #ededed; width: 120px;  margin: auto;" src="<?= base_url('uploads/pp/'.$profile_photo); ?>" alt="avatar">



    													</td>

    												</tr>
    											  </table>


    										</td>
    									</tr>


    								</table>



    							</div>
    							<br>

    							<div style="font-size: 20px; font-family: 'kalpurush', 'Times New Roman'; vertical-align: top;">
    								<table class="printtable" style="width: 100%;table-layout:fixed; font-size: 12px; font-family: 'Trebuchet MS', sans-serif;">
    									<tr>
    										<td style="width: 26%">
    											<br/><br/>
    											<p style="border-top: 1px dotted #000; padding-top: 5px; text-align: center;">Class Teacher</p>
    										</td>
    										<td style="10%">&nbsp;</td>
    										<td style="width: 26%">
    											<br/><br/>
    											<p style="padding-top: 5px; text-align: center;">&nbsp;</p>
    										</td>
    										<td style="10%">&nbsp;</td>
    										<td style="width: 26%; text-align: center;">
    											<img src="<?php echo base_url('uploads/settings/' . $settings->AdminSign); ?>" height="35"/>
    											<p style="border-top: 1px dotted #000; padding-top: 5px; text-align: center;">Head of Institute</p>
    										</td>
    									</tr>



    									<tr>
    										<td colspan="2" style="text-align: left;">
    											&nbsp;
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
              <?php
                ++$counter;
                if($counter % 2 == 0){
                  echo '<div class="page-break"></div>';
                }
              ?>

          <?php endforeach;?>
            </div>

            <div class="row">
              <div class="col-lg-12 col-xs-12">
                  <ul class="pagination" style="display: table;margin:auto;">
                      <?= @$paging; ?>
                  </ul>
              </div>
            </div><br><br><b>


            <?php
          } elseif($g_title == 2) { ?>

            <!-- ############## Testimonial Coding Start  -->
            <div id="result">
              <style>
                  @media all {
                    .page-break	{ display: none; }
                  }
                  @media print {
                    .page-break	{ display: block; page-break-before: always; }
                  }
              </style>

                <?php
                  //owndebugger($report);
                foreach($report as $testimonial):?>

				          <div style="border: 2px solid orange;  width: 1000px; margin: 20px">
					               <div style="border: 2px dotted orange; margin: 4px;">
						                <div style="border: 4px dotted orange; padding: 15px 15px 30px 15px;">
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
						</table>

							                   <div style="font-size: 20px; font-family: 'kalpurush', 'Times New Roman'; vertical-align: top;">
								<table class="printtable" style="width: 100%;table-layout:fixed; font-size: 12px; font-family: 'Trebuchet MS', sans-serif;">


									<h2 style="font-size: 30px;  text-align: center; margin: 20px 0 40px 0; font-style: italic;">Testimonial</h2>
								   <span style="text-align: right; float: right; margin-top: -50px;"> Date: <span style="font-size: 20px;  border-bottom: 2px dotted;  padding: 0 50px;"><?=date("Y-M-d");?></span></span>

									 <div class="Testimonial_in" style="font-size: 17px;  font-style: italic;  font-weight: bold; line-height: 40px;">
									   This is to certify that <span style="font-size: 20px;  border-bottom: 2px dotted;  padding: 0 50px;"><?php echo tableSingleColumn('users', 'full_name_en', ['id' => @$testimonial->UserId]); ?></span>
									   Son/Daughter of <span style="font-size: 20px;  border-bottom: 2px dotted;  padding: 0 50px;"><?php echo tableSingleColumn('users', 'father_name_en', ['id' => @$testimonial->UserId]); ?></span>
                     & <span style="font-size: 20px;  border-bottom: 2px dotted;  padding: 0 50px;"><?php echo tableSingleColumn('users', 'mother_name_en', ['id' => @$testimonial->UserId]); ?></span>

									   Address  <span style="font-size: 20px;  border-bottom: 2px dotted;  padding: 0 50px;"><?php echo tableSingleColumn('u_basicinfos', 'Address', ['UserId' => @$testimonial->UserId]); ?></span>
									  is / was a student of the institution. He/ She Passed the JSC/S.S.C Examination in the
									   year ...........
									   and G.P.A ..........
									   from B.J.S.E sylhet of Science/Humanities group. His/Her
									   Student ID  <span style="font-size: 20px;  border-bottom: 2px dotted;  padding: 0 50px;"><?=@$testimonial->UserId;?></span>
									   Session  <span style="font-size: 20px;  border-bottom: 2px dotted;  padding: 0 50px;"><?php echo tableSingleColumn('initial_settings_info', 'SettingsName', ['SettingsId' => $this->input->get('section')]); ?></span>
									   Roll No  <span style="font-size: 20px;  border-bottom: 2px dotted;  padding: 0 50px;"><?=@$testimonial->ClassRoll;?></span>
									   His/ Her date of Birth as recorded in the Admission Register is / was  <span style="font-size: 20px;  border-bottom: 2px dotted;  padding: 0 50px;"><?php echo tableSingleColumn('u_basicinfos', 'DateOfBirth', ['UserId' => @$testimonial->UserId]); ?></span>
									   He/She did not take part in any actiuites which is subuersive to the state or of discipline. He/She bears a good moral character
									   <br>
									   I wish him/her success in life.

										<span style="border-top: 2px dotted;  padding: 0 50px; float: right; margin-top: 100px;">Head of Institute</span>
									</div>
								</table>
							</div>
						                      <br/>

						                    <div style="font-size: 20px; font-family: 'kalpurush', 'Times New Roman'; vertical-align: top;">
						                            <table class="printtable" style="width: 100%;table-layout:fixed; font-size: 12px; font-family: 'Trebuchet MS', sans-serif;">



							<tr>
								<td colspan="2" style="text-align: left;">
									&nbsp;
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


                  <div class="page-break"></div>

              <?php endforeach;?>

            </div>
            <div class="row">
              <div class="col-lg-12 col-xs-12">
                  <ul class="pagination" style="display: table;margin:auto;">
                      <?= @$paging; ?>
                  </ul>
              </div>
            </div><br><br><b>

          <!-- ############## End of Testimonial Coding Start  -->




        <?php  } elseif($g_title == 3) { ?>

          <div id="result">

              <style>
                  @media all {
                     .page-break-table { page-break-inside:auto }
                  }
                  @media print {
                  .page-break  { page-break-inside:avoid; page-break-after:auto }
                  }
              </style>
              <table class="page-break-table">
                <tr class="page-break">

                  <?php $counter = 0;?>
                <?php foreach($report as $admit):?>
                  <td>

                      <div style="border: 2px solid orange; padding: 5px;width: 204px; height: 323px; margin: 20px">

                        <div style="font-size: 20px; font-family: 'kalpurush', 'Times New Roman'; vertical-align: top;">
                          <table class="printtable" style="width: 100%;table-layout:fixed; font-size: 12px; font-family: 'Trebuchet MS', sans-serif;">
                            <tr>
                              <td style="width:20%; text-align:center;">

                                <img src="<?php echo base_url('uploads/settings/'. $settings->InstituteLogo); ?>" style="width:100%" />
                              </td>

                              <td style="width: 80%">
                                <div style="width: 100%; font-size: 8px; text-align: center; font-family: kalpurush; color: black;">
                                  <h1 style="font-size: 12px; margin: 0px; padding: 0px;"><?php echo $settings->InstituteName; ?></h1>
                                 <?php echo $settings->InstituteAddress; ?></span>

                                </div>
                              </td>
                            </tr>

                            <tr>
                              <td colspan="2" style="width: 100%; text-align:center;">

                                <?php  $profile_photo = tableSingleColumn('u_basicinfos', 'UserPhoto', ['UserId' => @$admit->UserId]); ?>

                                <?php if($profile_photo ==''|| $profile_photo == null ): ?>
                                  <img style="border: 4px solid #ededed;width: 75px;margin: auto;height: 90px;" src="https://dummyimage.com/75x90/ebebeb/383438.jpg&text=++PHOTO++"/>

                                <?php else: ?>
                                  <img style="border: 4px solid #ededed;width: 75px;margin: auto;height: 90px;" src="<?= base_url('uploads/pp/'.$profile_photo); ?>" alt="avatar">

                                <?php endif; ?>





                                <br><span style="font-size: 20px; font-weight: bold;">ID Card</span>
                              </td>

                            </tr>
                            <tr>
                              <td colspan="2" style="width: 100%; border-collapse: collapse; padding: 5px; font-weight: bold;">
                                Name: <?php echo tableSingleColumn('users', 'full_name_en', ['id' => @$admit->UserId]); ?>
                                <br>Student ID: <?=@$admit->UserId;?>
                                <br>Class: <?php echo tableSingleColumn('initial_settings_info', 'SettingsName', ['SettingsId' => @$admit->Class, 'SettingsCategory' => 1]); ?>
                                <br>Roll: <?=@$admit->ClassRoll;?>
                              </td>
                            </tr>



                          </table>
                        </div>

                        <div style="font-size: 20px; font-family: 'kalpurush', 'Times New Roman'; vertical-align: top;">
                          <table class="printtable" style="width: 100%;table-layout:fixed; font-size: 12px; font-family: 'Trebuchet MS', sans-serif;">
                            <tr>

                              <td style="width: 50%">&nbsp;</td>
                              <td style="width:50%; text-align: center;;;">
                                <img src="<?php echo base_url('uploads/settings/' . $settings->AdminSign); ?>" height="30"/>
                                <p style="border-top: 1px dotted #000; padding-top: 5px; text-align: center;">Head of Institute</p>
                              </td>
                            </tr>



                            <tr>

                              <td colspan="2" style="text-align: center;font-size: 8px;">
                                Powered By Tritiyo Limited, C: 01821660066
                              </td>
                            </tr>
                          </table>
                        </div>

                      </div>
                  </td>
                  <?php
                    ++$counter;
                    if($counter % 2 == 0){
                      //echo '<div class="page-break"></div>';
                      echo '</tr><tr class="page-break">';
                    }
                  ?>
                  <?php
                    // ++$counter;
                    // if($counter % 4 == 0){
                    //   echo '<tr class="page-break"></tr>';
                    //   // echo '</tr><tr>';
                    // }
                  ?>

              <?php endforeach;?>
            </tr>
            </table>
          </div>

          <div class="row">
            <div class="col-lg-12 col-xs-12">
                <ul class="pagination" style="display: table;margin:auto;">
                    <?= @$paging; ?>
                </ul>
            </div>
          </div><br><br><b>



      <?php  } elseif($g_title == 4) { ?>
        <div id="result">

            <style>
                @media all {
                   .page-break-table { page-break-inside:auto }
                }
                @media print {
                .page-break  { page-break-inside:avoid; page-break-after:auto }
                }
            </style>
            <table class="page-break-table">
              <tr class="page-break">

                <?php $counter = 0;?>
              <?php foreach($report as $admit):?>
                <td>

                    <div style="border: 5px solid orange; padding: 5px;width: 250px; height: 250px; margin: 20px">

                      <div style="font-size: 20px; font-family: 'kalpurush', 'Times New Roman'; vertical-align: top;">
                        <table class="printtable" style="width: 100%;table-layout:fixed; font-size: 12px; font-family: 'Trebuchet MS', sans-serif;">

                          <tr>
                            <td colspan="2" style="width: 100%; text-align:center;"><br>
                                <span style="font-size: 20px; font-weight: bold;">Seat Plan</span><hr>
                            </td>

                          </tr>
                          <tr>
                            <td colspan="2" style="font-size: 16px; line-height: 25px;width: 100%; border-collapse: collapse; padding: 5px; font-weight: bold;">
                              Name: <?php echo tableSingleColumn('users', 'full_name_en', ['id' => @$admit->UserId]); ?>
                              <br>Student ID: <?=@$admit->UserId;?>
                              <br>Class: <?php echo tableSingleColumn('initial_settings_info', 'SettingsName', ['SettingsId' => @$admit->Class, 'SettingsCategory' => 1]); ?>
                              <br>Roll: <?=@$admit->ClassRoll;?>
                            </td>
                          </tr>



                        </table>
                      </div>

                      <div style="font-size: 20px; font-family: 'kalpurush', 'Times New Roman'; vertical-align: top;">
                        <table class="printtable" style="width: 100%;table-layout:fixed; font-size: 12px; font-family: 'Trebuchet MS', sans-serif;">

                          <tr>

                            <td colspan="2" style="text-align: center;font-size: 8px;"><br><br>
                              Powered By Tritiyo Limited, C: 01821660066
                            </td>
                          </tr>
                        </table>
                      </div>

                    </div>
                </td>
                <?php
                  ++$counter;
                  if($counter % 3 == 0){
                    //echo '<div class="page-break"></div>';
                    echo '</tr><tr class="page-break">';
                  }
                ?>
                <?php
                  // ++$counter;
                  // if($counter % 4 == 0){
                  //   echo '<tr class="page-break"></tr>';
                  //   // echo '</tr><tr>';
                  // }
                ?>

            <?php endforeach;?>
          </tr>
          </table>
        </div>

        <div class="row">
          <div class="col-lg-12 col-xs-12">
              <ul class="pagination" style="display: table;margin:auto;">
                  <?= @$paging; ?>
              </ul>
          </div>
        </div><br><br><b>

      <?php  } ?>
        </div>


    <?php
     }
    if (isset($biodata)) {
        //owndebugger($biodata);
    }
    ?>
</div>
