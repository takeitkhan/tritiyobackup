<?php

/**
 * Class Profile_model
 *
 * @property Common_model $common_model Common models navigator
 */
class Pdf_model extends Common_model {
    
    private $exam;

    public function __construct() {
        parent::__construct();
        $this->exam = $this->common_model;
    }
    
    public function result_export(array $data){
       // owndebugger($data);exit;
        $settings = $this->db->get('settings')->row();
        
        
        $html='
        <html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <style>
@font-face {
    font-family: "Kalpurush";
    src: url("http://tritiyo.com/schools/fonts/fonts/Kalpurush.eot");
    src: url("http://tritiyo.com/schools/fonts/fonts/Kalpurush.eot?#iefix") format("embedded-opentype"),
        url("http://tritiyo.com/schools/fonts/fonts/Kalpurush.woff2") format("woff2"),
        url("http://tritiyo.com/schools/fonts/fonts/Kalpurush.woff") format("woff"),
        url("http://tritiyo.com/schools/fonts/fonts/Kalpurush.ttf") format("truetype"),
        url("http://tritiyo.com/schools/fonts/fonts/Kalpurush.svg#Kalpurush") format("svg");
    font-weight: normal;
    font-style: normal;
}

table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

.border td, .border th {
  border: 1px solid #000000ddd;
  text-align: left;
  padding: 5px;
}
td,th {
  text-align: left;
  padding: 5px;
}

.stripe tr:nth-child(even) {
  background-color: #000000ddd;
}

</style>
</head>
<body style="font-family: Kalpurush;">';
        if($data){
            
            //owndebugger($settings);
        foreach($data as $info){
            $bio = $info['bio'];
            $result = $info['result'];
            if (!empty($result)) { 
           
            $bnstdinfo = @$bio[0]->enstdinfo;
			$return = explode('|', @$bnstdinfo);
			
			$insti_name = (($settings->InstituteName_en !=null) ? $settings->InstituteName_en : 'Institute Name');
			$insti_address = (($settings->InstituteAddress_en !=null) ? $settings->InstituteAddress_en : 'Institute Address');
			$insti_eiin = (($settings->InstituteEIIN_en !=null) ? $settings->InstituteEIIN_en : 'Institute EIIN');
			$examName = $this->exam->get_initial_settings_by_id($result[0]['Exams'])->SettingsName;
			$resultYear = $result[0]['AddedYear'];
			$resultPublishedDate = 	$result[0]['AddedDate'];			
							
            $html.='<div style="border: 2px solid orange;max-width: 1000px;margin: auto;">
                    <div style="border: 2px dotted orange; margin: 4px;">
                    <div style="border: 4px dotted orange; padding: 15px 15px 30px 15px;">';//BORDER START
            
            
             $html.='<div style="vertical-align: top;">
						<table style="width: 100%;table-layout:fixed; font-size: 12px;">
							<tr>
								<td style="width: 15%">
									<img src="'.base_url('uploads/settings/'. $settings->InstituteLogo).'" width="75" />
								</td>
								<td style="width: 85%">
									<div style="width: 82%; text-align: center; margin-top: 10px; font-size:12px">
										<h1 style="font-size: 22px; margin: 0px; padding: 0px;">'.$insti_name.'</h1>
										<span style="font-size: 15px;">EIIN: '.$insti_eiin.', '.$insti_address.'</span>
										<h3 style="font-size: 13px; margin-top: 5px; padding: 0px; text-transform: uppercase;">
											RESULT OF '.$examName.' EXAMINATION '.$resultYear.'<br>
											ACADEMIC TRANSCRIPT
										</h3>
									</div>
								
								</td>
							</tr>
							
						</table>
					</div>
					<hr style="color: #000000; border-top: 2px dotted #000000;" />';
							

			$html .='<div style="font-size: 20px; font-family: kalpurush, Times New Roman; vertical-align: top;">
						<table style="width: 100%;table-layout:fixed; font-size: 12px;">
							<tr>									
								<td style="width:50%">
                                    <table class="no_border">
                            
                                      <tr>
                                        <td>Name</td>
                                        <td>: '.@$bio[0]->englishname.'</td>
                                    
                                      </tr>
                                      <tr>
                                        <td>Student ID</td>
                                        <td>: '.@$bio[0]->user_id.'</td>
                                    
                                      </tr>
                                      <tr>
                                        <td>Guardian Number</td>
                                        <td>: '.@$bio[0]->phone.'</td>
                                    
                                      </tr>
                                      <tr>
                                        <td>Class</td>
                                        <td>: '. @$return[0].'</td>
                                    
                                      </tr>
                                      <tr>
                                        <td>Class Roll</td>
                                        <td>: '. @$return[1].'</td>
                                    
                                      </tr>
                                      <tr>
                                        <td>Section</td>
                                        <td>: '.$return[2].'</td>
                                
                                      </tr>
                                      <tr>
                                        <td>Group</td>
                                        <td>: </td>
                                    
                                      </tr>
                                    </table>
								</td>
								<td style="width:10%">
								</td>
								<td style="width:30%">
    								<table class="border">
                                        <tr>
                                            <th style="text-align: center;">Grade</th>
                                            <th style="text-align: center;">Interval</th>
                                            <th style="text-align: center;">Point</th>
                                        </tr>
                                        <tr>
    										<td style="text-align: center;">A+</td>
    										<td style="text-align: center;">80-100</td>
    										<td style="text-align: center;">5</td>
    									</tr>
    									<tr>
    										<td style="text-align: center;">A</td>
    										<td style="text-align: center;">70-79</td>
    										<td style="text-align: center;">4</td>
    									</tr>
    									<tr>
    										<td style="text-align: center;">A-</td>
    										<td style="text-align: center;">60-69</td>
    										<td style="text-align: center;">3.5</td>
    									</tr>
    									<tr>
    										<td style="text-align: center;">B</td>
    										<td style="text-align: center;">50-59</td>
    										<td style="text-align: center;">3</td>
    									</tr>
    									<tr>
    										<td style="text-align: center;">C</td>
    										<td style="text-align: center;">40-49</td>
    										<td style="text-align: center;">2</td>
    									</tr>
    									<tr>
    										<td style="text-align: center;">D</td>
    										<td style="text-align: center;">33-39</td>
    										<td style="text-align: center;">1</td>
    									</tr>
    									<tr>
    										<td style="text-align: center;">F</td>
    										<td style="text-align: center;">00-32</td>
    										<td style="text-align: center;">0</td>
    									</tr>
                                    </table>
						
    							</td>
    						</tr>
    		
    					</table>
					<hr style="color: #000000; border-top: 2px dotted #000000;" />
				</div>';
			$html .='<div style="font-size: 12px; font-family: kalpurush, Times New Roman; vertical-align: top; width:100%">
						 <table class="border" style="text-align: center;">
							<tr style="text-align: center;">
						    	<th style="text-align: center;">SL</th>
								<th style="text-align: center;">Subject Name</th>
								<th style="text-align: center;">Written</th>
								<th style="text-align: center;">MCQ</th>
								<th style="text-align: center;">Practical</th>
								<th style="text-align: center;">Total</th>
								<th style="text-align: center;">Grade</th>
								
							</tr>';
							//<th style="text-align: center;">Grade Point</th>
    		 $sl = 1;
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
					    $get_num = fah_individual_subject_info($value);
					     $final_array[@$bio[0]->user_id]['count'][] = @$get_num['c'];
                                        $final_array[@$bio[0]->user_id]['total'][] = @$get_num['t'];
                                        $final_array[@$bio[0]->user_id]['gpa'][] = @$get_num['g'];
                                        $final_array[@$bio[0]->user_id]['grade'][] = @$get_num['a'];
					
							
			$html .=	'<tr>
								<td style="text-align: center;">'.$sl.'</td>

								<td>
								'. tableSingleColumn('initial_settings_info', 'SettingsName', ['SettingsId' => $value['Subjects']]).'
								</td>

								<td style="text-align: center;">'.$get_num['w'].'</td>
								<td style="text-align: center;">'.$get_num['o'].'</td>
								<td style="text-align: center;">'.$get_num['p'].'</td>
								<td style="text-align: center;">'.$get_num['t'].'</td>
								<td style="text-align: center;">'.$get_num['a'].'</td>
				
							</tr>';
							//<td style="text-align: center;">'.$get_num['g'].'</td>
				$sl++; 				
			}				
			 $get_fc = @array_sum(@$final_array[@$bio[0]->user_id]['count']);
                                $get_fg = @array_sum(@$final_array[@$bio[0]->user_id]['gpa']);
                                $get_ft = @array_sum(@$final_array[@$bio[0]->user_id]['total']);
                                $get_fa = @$final_array[@$bio[0]->user_id]['grade'];

                                if (@in_array('F', @$get_fa)) {
                                    $avgcgpa = sprintf("%.2f", @$get_fg / @$get_fc);
                                    $fgrade = 'F';
                                    $fcgpa = '00';
                                } else {
                                    $avgcgpa = sprintf("%.2f", @$get_fg / @$get_fc);
                                    $fgrade = makeGpaGrade($avgcgpa);
                                    $fcgpa = $avgcgpa;

                                }
						
			$html .=		'<tr>
								<th colspan="5" style="text-align: center;">Total Number And GPA </th>
								<th style="text-align: center;">'.@$get_ft.'</th>
								<th style="text-align: center;">'.@$fgrade.'</th>
								
							</tr>';
            $html .=		'<tr>
								<th colspan="6" style="text-align: right;">GPA</th>
								<th style="text-align: center;">'.@$fcgpa.'</th>
								
							</tr>';							
						
						$html .= '</table>
					</div>';
					//<th style="text-align: center;">'.@$fcgpa.'</th>
					
				$html .=	'<div style="font-size: 12px; font-family: kalpurush, Times New Roman; vertical-align: top; color: #000000;">
								<table>
									<tr>
										<td style="width: 26%">
											<br/><br/><br/><br/>
											<p style="border-top: 1px dotted #000; padding-top: 5px; text-align: center;">Guardian</p>
										</td>
										
										<td style="10%">&nbsp;</td>
										
										<td style="width: 26%">
											<br/><br/><br/><br/>
											<p style="border-top: 1px dotted #000; padding-top: 5px; text-align: center;">Class Teacher</p>
										</td>
										
										<td style="10%">&nbsp;</td>
										
										<td style="width: 26%; text-align: center;">
										<br/><br/><br/><br/>
											<p style="border-top: 1px dotted #000; padding-top: 5px; text-align: center;">Head of Institute</p>
										</td>
									</tr>
									
									<tr>
										<td colspan="5">&nbsp;<br/></td>
									</tr>
									
									<tr>
										<td colspan="2" style="text-align: left;">
											Result Published Date: '.@date("d/m/Y",strtotime($resultPublishedDate)).'
										</td>
										<td colspan="3" style="text-align: right;">
											<small>Powered By Tritiyo Limited, C: 01821660066</small>
										</td>
									</tr>
								</table>
							</div>';


            
            
            $html.='</div></div></div>';
            
            $html .='<div style="page-break-after: always;"></div>';
            
    
        }}
        }
  $html .=' </body></html>';        
      //  exit;
 
        
        return $html;
    
        
    }


}
