<?php
function activeInactiveStatus($status = '') {
    $html = '';
    $sts = ['Choose Status' => '000', 'Active' => 1, 'Inactive' => 0];
    foreach ($sts as $key => $value) {
        if($value == $status) {
            $selected = 'selected';
        } else {
            $selected = '';
        }
        $html .= '<option value="'. $value .'" '.  $selected .' >'. $key .'</option>';
    }
    return $html;
}

function sectionName($id){

    $html = '';
    $sections = get_instance()->db->order_by('SettingsId', 'ASC')->get_where('initial_settings_info', ['SettingsCategory' => 2])->result();

    if($sections) {
        foreach ($sections as $section){
            $html .= "<option value=". $section->SettingsId .">$section->SettingsName</option>";
        }
    }

    $return = '<select id="section_'. $id .'"  name="section[]" required class="form-control section-change">';
    $return .=  '<option value="" selected="selected">Select Section</option> ';
    $return .=  $html;
    $return .=  '</select>';

    return $return;

}

function groupName($id){
    $html = '';
    $groups = get_instance()->db->order_by('SettingsId', 'ASC')->get_where('initial_settings_info', ['SettingsCategory' => 6])->result();

    if($groups) {
        foreach ($groups as $group){
            $html .= "<option value=". $group->SettingsId .">$group->SettingsName</option>";
        }
    }

    $return = '<select id="group_'. $id .'"  name="group_name[]" required class="form-control group-change" id="section">';
    $return .=  '<option value="" selected="selected">Select Group</option> ';
    $return .=  $html;
    $return .=  '</select>';

    return $return;
}

function getStudentPrimaryInfo($userid = '') {
    $CI = get_instance();
    $html = '';

    $CI->db->select('*');
    $CI->db->from('users');
    $CI->db->join('u_std_information', 'u_std_information.UserId=id');
    $CI->db->where(['id' => $userid]);
    $result = $CI->db->get()->row();


    //owndebugger($result);


    //$result = $CI->db->get_where('users', ['id' => $userid])->row();
    if($result) {
        $preview = base_url(). 'overview/'. $userid .'?userpage=true';
        $edit = base_url(). 'basicinformation/'. $userid .'?userpage=true';
        $result_url = base_url(). 'getindividualresult?studentid='. $userid;
        $html .= "<tr>
                    <td>$result->id</td>
                    <td>
                        <a href='". $preview ."'><i class='fa fa-search-plus'></i></a>&nbsp;&nbsp;
                        <a class='modalcursour' data-toggle='modal' data-target='#modal_body_". $userid ."'><i class='fa fa-envelope'></i></a>&nbsp;&nbsp;
                        <a href='". $edit ."'><i class='fa fa-pencil fa-fw'></i></a>
                        <a href='". $result_url ."'><i class='fa fa-eye fa-fw'></i></a>
                    </td>
                    <td>$result->full_name_en</td>
                    <td>$result->father_name_en</td>
                    <td>$result->mother_name_en</td>
                    <td>". tableSingleColumn('initial_settings_info', 'SettingsName', ['SettingsId' => $result->Class]) ."</td>
                    <td>$result->ClassRoll</td>
                    <td>". tableSingleColumn('initial_settings_info', 'SettingsName', ['SettingsId' => $result->Section]) ."</td>
                    <td>$result->phone</td>
                 </tr>
                 <div class='modal fade' id='modal_body_". $userid ."' tabindex='-1' role='dialog' aria-hidden='true'>
                    <div class='modal-dialog' role='document'>
                        <div class='modal-content'>
                            <form action='".base_url('send-single-compose')."' method='post'>
                            <div class='modal-header'>
                                <h5 class='modal-title' id='exampleModalLongTitle'>
                                    Send Message
                                    <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                                </h5>
                            </div>
                            <div class='modal-body'>
                               <div class='form-group'>
                                    <label>Phone Number</label>
                                    <input name='send_number' value='".$result->phone ."' class='form-control' readonly='readonly'  type='text'>

                                    <input name='user_id' value='".$userid."' type='hidden'>
                                    <input name='post_url_routs' value='students' type='hidden'>

                                </div>
                                <div class='form-group'>
                                    <label>Message</label>
                                    <textarea name='messages' placeholder='Enter Your Message' cols='40' rows='2' class='form-control' maxlength='170'></textarea>
                                </div>
                            </div>
                            <div class='modal-footer'>
                                <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
                                <button type='submit' class='btn btn-primary'>Send Message</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                 ";
    }
    return $html;
}
function getStudentsPromotionInfo($userid = '') {
    $CI = get_instance();
    $html = '';

    $CI->db->select('*');
    $CI->db->from('users');
    $CI->db->join('u_std_information', 'u_std_information.UserId=id');
    $CI->db->where(['id' => $userid]);
    $result = $CI->db->get()->row();

    if($CI->input->get('groupp') == 0 && $CI->input->get('classs') == 8){
        $group = "<td width='18%'>".groupName($result->id)."</td>";
    }elseif($CI->input->get('groupp') == 0){
        $group = '';
    }else{
        $group = "<td width='18%'>".groupName($result->id)."</td>";
    }

    if($result) {
        $preview = base_url(). 'overview/'. $userid .'?userpage=true';
        $edit = base_url(). 'studentpersonalinformation/'. $userid .'?userpage=true';
        $html .= "<tr>
                    <td>$result->id</td>
                    <td>$result->full_name_en</td>
                    <td width='10%'>$result->ClassRoll</td>
                    <td>
                        <input type='number' min='1' max='300' id='roll_". $result->id ."'  name='ClassRoll[]' class='roll-change'  value='' required/>
                        <input type='hidden' id='olddata_". $result->id ."'  name='oid_roll_section_class_group[]' value='". $result->id ."_". $result->ClassRoll ."_". $result->Section ."_". $result->Class ."_". $result->GroupId ."' />
                        <input type='hidden' id='newdata_". $result->id ."' name='nid_roll_section_class_group[]' value='". $result->id ."_". $result->ClassRoll ."_". $result->Section ."_". ($result->Class+1) ."_".$result->GroupId ."' />
                    </td>
                    <td width='10%'>". tableSingleColumn( 'initial_settings_info', 'SettingsName', ['SettingsId' => $result->Section]). "</td>
                    <td width='18%'>".sectionName($result->id)."</td>".$group."
                    <td>
                        <a target='_blank' class='btn btn-xs btn-warning' href='". $edit ."'>Update</a>
                    </td>
                 </tr>";
    }
    return $html;
}

function getStaffPrimaryInfo($userid = '') {
    $CI = get_instance();
    $html = '';
//    $CI->db->select('*');
//    $CI->db->from('users');
//    $CI->db->join('u_tchstaff_information', 'u_tchstaff_information.UserId=users.id');


    $CI->db->select('*');
    $CI->db->from('users');
    $CI->db->join('u_tchstaff_information', 'u_tchstaff_information.UserId=users.id');
    $CI->db->where(['users.id' => $userid]);




    //$CI->db->where(['id' => $userid]);
    $result = $CI->db->get()->row();
    //owndebugger($result);

    //owndebugger($result);



//    if($result) {
//        $preview = base_url(). 'overview/'. $userid .'?userpage=true';
//        $edit = base_url(). 'basicinformation/'. $userid .'?userpage=true';
//        $html .= "<tr>
//                    <td>$result->user_id</td>
//                    <td>$result->full_name_en</td>
//                    <td>$result->Designation</td>
//                    <td>$result->IndexNumber</td>
//                    <td>$result->SalaryScale</td>
//                    <td>$result->phone</td>
//                    <td>
//                        <a href='". $preview ."'><i class='fa fa-search-plus'></i></a>&nbsp;&nbsp;
//                        <a class='modalcursour' data-toggle='modal' data-target='#modal_body_". $userid ."'><i class='fa fa-envelope'></i></a>&nbsp;&nbsp;
//                        <a href='". $edit ."'><i class='fa fa-pencil fa-fw'></i></a>
//                    </td>
//                 </tr>
//                 <div class='modal fade' id='modal_body_". $userid ."' tabindex='-1' role='dialog' aria-hidden='true'>
//                    <div class='modal-dialog' role='document'>
//                        <div class='modal-content'>
//                            <form>
//                            <div class='modal-header'>
//                                <h5 class='modal-title' id='exampleModalLongTitle'>
//                                    Send Message
//                                    <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
//                                </h5>
//                            </div>
//                            <div class='modal-body'>
//                               <div class='form-group'>
//                                    <label>Phone Number</label>
//                                    <input name='phonenumber' value='". $result->phone ."' class='form-control' readonly='readonly' type='text'>
//                                </div>
//                                <div class='form-group'>
//                                    <label>Message</label>
//                                    <textarea name='message' placeholder='Enter Your Message' cols='40' rows='2' class='form-control'></textarea>
//                                </div>
//                            </div>
//                            <div class='modal-footer'>
//                                <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
//                                <button type='button' class='btn btn-primary'>Send Message</button>
//                            </div>
//                            </form>
//                        </div>
//                    </div>
//                </div>
//                 ";
//    }
    return $CI->db->last_query();
}
function getGuardianPrimaryInfo($userid = '') {
    $CI = get_instance();
    $html = '';
    $result = $CI->db->get_where('users', ['id' => $userid])->row();
    if($result) {
        $preview = base_url(). 'overview/'. $userid .'?userpage=true';
        $edit = base_url(). 'basicinformation/'. $userid .'?userpage=true';
        $html .= "<tr>
                    <td>$result->id</td>
                    <td>$result->full_name_bn</td>
                    <td>$result->full_name_en</td>
                    <td>$result->phone</td>
                    <td>
                        <a href='". $preview ."'><i class='fa fa-search-plus'></i></a>&nbsp;&nbsp;
                        <a class='modalcursour' data-toggle='modal' data-target='#modal_body_". $userid ."'><i class='fa fa-envelope'></i></a>&nbsp;&nbsp;
                        <a href='". $edit ."'><i class='fa fa-pencil fa-fw'></i></a>
                    </td>
                 </tr>
                 <div class='modal fade' id='modal_body_". $userid ."' tabindex='-1' role='dialog' aria-hidden='true'>
                    <div class='modal-dialog' role='document'>
                        <div class='modal-content'>
                          <form action='".base_url('send-single-compose')."' method='post'>
                            <div class='modal-header'>
                                <h5 class='modal-title' id='exampleModalLongTitle'>
                                    Send Message
                                    <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                                </h5>
                            </div>
                            <div class='modal-body'>
                               <div class='form-group'>
                                    <label>Phone Number</label>
                                    <input name='send_number' value='". $result->phone ."' class='form-control' readonly='readonly' type='text'>
                                    <input name='user_id' value='".$userid."' type='hidden'>
                                    <input name='post_url_routs' value='guardians' type='hidden'>
                                </div>
                                <div class='form-group'>
                                    <label>Message</label>
                                    <textarea name='messages' placeholder='Enter Your Message' cols='40' rows='2' class='form-control' maxlength='170'></textarea>
                                </div>
                            </div>
                            <div class='modal-footer'>
                                <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
                                <button type='submit' class='btn btn-primary'>Send Message</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                 ";
    }
    return $html;
}
?>
