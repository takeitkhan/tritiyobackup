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
        $result_url = base_url(). 'getindividualresult?uid='. $userid;
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
                            <form>
                            <div class='modal-header'>
                                <h5 class='modal-title' id='exampleModalLongTitle'>
                                    Send Message
                                    <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                                </h5>
                            </div>
                            <div class='modal-body'>
                               <div class='form-group'>
                                    <label>Phone Number</label>
                                    <input name='phonenumber' value='". $result->phone ."' class='form-control' readonly='readonly' type='text'>
                                </div>
                                <div class='form-group'>
                                    <label>Message</label>
                                    <textarea name='message' placeholder='Enter Your Message' cols='40' rows='2' class='form-control'></textarea>
                                </div>
                            </div>
                            <div class='modal-footer'>
                                <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
                                <button type='button' class='btn btn-primary'>Send Message</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                 ";
    }
    return $html;
}
function getStaffPrimaryInfo($userid = '') {
    $CI = get_instance();
    $html = '';
    $CI->db->select('*');
    $CI->db->from('users');
    $CI->db->join('u_tchstaff_information', 'u_tchstaff_information.UserId=id');
    $CI->db->where(['id' => $userid]);
    $result = $CI->db->get()->row();
    if($result) {
        $preview = base_url(). 'overview/'. $userid .'?userpage=true';
        $edit = base_url(). 'basicinformation/'. $userid .'?userpage=true';
        $html .= "<tr>
                    <td>$result->id</td>
                    <td>$result->full_name_en</td>
                    <td>$result->Designation</td>
                    <td>$result->IndexNumber</td>
                    <td>$result->SalaryScale</td>
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
                            <form>
                            <div class='modal-header'>
                                <h5 class='modal-title' id='exampleModalLongTitle'>
                                    Send Message
                                    <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                                </h5>
                            </div>
                            <div class='modal-body'>
                               <div class='form-group'>
                                    <label>Phone Number</label>
                                    <input name='phonenumber' value='". $result->phone ."' class='form-control' readonly='readonly' type='text'>
                                </div>
                                <div class='form-group'>
                                    <label>Message</label>
                                    <textarea name='message' placeholder='Enter Your Message' cols='40' rows='2' class='form-control'></textarea>
                                </div>
                            </div>
                            <div class='modal-footer'>
                                <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
                                <button type='button' class='btn btn-primary'>Send Message</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                 ";
    }
    return $html;
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
                            <form>
                            <div class='modal-header'>
                                <h5 class='modal-title' id='exampleModalLongTitle'>
                                    Send Message
                                    <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                                </h5>
                            </div>
                            <div class='modal-body'>
                               <div class='form-group'>
                                    <label>Phone Number</label>
                                    <input name='phonenumber' value='". $result->phone ."' class='form-control' readonly='readonly' type='text'>
                                </div>
                                <div class='form-group'>
                                    <label>Message</label>
                                    <textarea name='message' placeholder='Enter Your Message' cols='40' rows='2' class='form-control'></textarea>
                                </div>
                            </div>
                            <div class='modal-footer'>
                                <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
                                <button type='button' class='btn btn-primary'>Send Message</button>
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