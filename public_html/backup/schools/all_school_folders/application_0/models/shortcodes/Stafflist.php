<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Stafflist extends Common_model
{
    function __construct()
    {
        parent::__construct();
    }

    public function run($params = array())
    {
        //owndebugger($params);

        //$cols = isset($params['cols']) ? $params['cols'] : '0';
        $rows = $this->getAllUsersByGroupId(6, 'all');
        //owndebugger($rows);
        if(!empty($rows)) {
            $str = '<table class="table table-bordered table-responsive specialtable" id="teachlists">';
            $str .= '<tr>';
            $str .= '<th width="280">Names</th>';
            $str .= '<th width="280">Personal Informations</th>';
            $str .= '<th>Job & Contact Informations</th>';
            $str .= '<th>Photo</th>';
            $str .= '</tr>';

            foreach ((array)$rows as $row) {
                $str .= '<tr>';
                $str .= '<td>';
                $str .= (isset($row->banglaname) ? '<label style="font-weight: bold;">Name(BN): </label><br/>' . $row->banglaname . '<br/>' : '');
                $str .= (isset($row->englishname) ? '<label style="font-weight: bold;">Name(EN): </label><br/>' . $row->englishname . '<br/>' : '');
                $str .= (isset($row->banglafname) ? '<label style="font-weight: bold;">Father Name(BN): </label><br/>' . $row->banglafname . '<br/>' : '');
                $str .= (isset($row->englishfname) ? '<label style="font-weight: bold;">Father Name(EN): </label><br/>' . $row->englishfname . '<br/>' : '');
                $str .= (isset($row->banglamname) ? '<label style="font-weight: bold;">Mother Name(BN): </label><br/>' . $row->banglamname . '<br/>' : '');
                $str .= (isset($row->englishmname) ? '<label style="font-weight: bold;">Mother Name(EN): </label><br/>' . $row->englishmname . '<br/>' : '');
                $str .= '</td>';
                $str .= '<td>';
                $str .= (isset($row->gender) ? '<label style="font-weight: bold;">Gender: </label><br/>' . $row->gender . '<br/>' : '');
                $str .= (isset($row->bloodgroupbn) ? '<label style="font-weight: bold;">Blood Group: </label><br/>' . $row->bloodgroupbn . '<br/>' : '');
                $str .= (isset($row->religionbn) ? '<label style="font-weight: bold;">Religion: </label><br/>' . $row->religionbn . '<br/>' : '');
                $str .= (isset($row->dob) ? '<label style="font-weight: bold;">DOB: </label><br/>' . $row->dob . '<br/>' : '');
                $str .= (isset($row->maritalstatusbn) ? '<label style="font-weight: bold;">Marital Status: </label><br/>' . $row->maritalstatusbn . '<br/>' : '');
                $str .= (isset($row->uniquenumber) ? '<label style="font-weight: bold;">National ID: </label><br/>' . $row->uniquenumber . '<br/>' : '');
                $str .= '</td>';
                $str .= '<td>';
                $str .= (isset($row->user_id) ? '<label style="font-weight: bold;">User ID: </label><br/>' . $row->user_id . '<br/>' : '');
                $str .= (isset($row->designationbn) ? '<label style="font-weight: bold;">Designation: </label><br/>' . $row->designationbn . '<br/>' : '');
                $str .= (isset($row->joindate) ? '<label style="font-weight: bold;">Join Date: </label><br/>' . $row->joindate . '<br/>' : '');
                $str .= (isset($row->districtbn) ? '<label style="font-weight: bold;">District: </label><br/>' . $row->districtbn . '<br/>' : '');
                $str .= (isset($row->upazilabn) ? '<label style="font-weight: bold;">Upazila: </label><br/>' . $row->upazilabn . '<br/>' : '');
                $str .= (isset($row->address) ? '<label style="font-weight: bold;">Address: </label><br/>' . $row->address . '<br/>' : '');
                $str .= '</td>';
                $str .= '<td>';
                $str .= (isset($row->userphoto) ? '<img style="max-width: 160px; max-height: 180px;" src="' . base_url() . '/uploads/pp/' . $row->userphoto . '" />' : '');
                $str .= '</td>';
                $str .= '</tr>';
            }
            $str .= '</table>';
            $str .= '<div id="pageNavPosition"></div>';

            //$str = owndebugger($rows);
            return $str;
        } else {
            $str = 'কোন তথ্য এখনো হালনাগাদ করা হয়নি';
        }
    }

    public function getAllUsersByGroupId($id, $option = NULL)
    {
        $this->db->select('*,
               (SELECT full_name_bn FROM users WHERE id = user_id) AS banglaname,
               (SELECT full_name_en FROM users WHERE id = user_id) AS englishname,
               (SELECT father_name_bn FROM users WHERE id = user_id) AS banglafname,
               (SELECT father_name_en FROM users WHERE id = user_id) AS englishfname,
               (SELECT mother_name_bn FROM users WHERE id = user_id) AS banglamname,
               (SELECT mother_name_en FROM users WHERE id = user_id) AS englishmname,
               (SELECT phone FROM users WHERE id = user_id) AS phone,
               (SELECT Gender FROM u_basicinfos WHERE UserId = user_id) AS gendernum,
               (SELECT (SELECT SettingsName FROM initial_settings_info WHERE SettingsId = Gender) AS gender FROM u_basicinfos WHERE UserId = user_id) AS genderen,
               (SELECT (SELECT SettingsDescription FROM initial_settings_info WHERE SettingsId = Gender) AS gender FROM u_basicinfos WHERE UserId = user_id) AS genderbn,
               (SELECT UniqueNumber FROM u_basicinfos WHERE UserId = user_id) AS uniquenumber,
               (SELECT Religion FROM u_basicinfos WHERE UserId = user_id) AS religion,
               (SELECT (SELECT SettingsName FROM initial_settings_info WHERE SettingsId = Religion) AS gender FROM u_basicinfos WHERE UserId = user_id) AS religionen,
               (SELECT (SELECT SettingsDescription FROM initial_settings_info WHERE SettingsId = Religion) AS gender FROM u_basicinfos WHERE UserId = user_id) AS religionbn,
               (SELECT Address FROM u_basicinfos WHERE UserId = user_id) AS address,
               (SELECT Upazila FROM u_basicinfos WHERE UserId = user_id) AS upazila,
               (SELECT (SELECT name FROM upazilas WHERE id = Upazila) AS upazilaname FROM u_basicinfos WHERE UserId = user_id) AS upazilaen,
               (SELECT (SELECT bn_name FROM upazilas WHERE id = Upazila) AS upazilaname FROM u_basicinfos WHERE UserId = user_id) AS upazilabn,
               (SELECT District FROM u_basicinfos WHERE UserId = user_id) AS district,
               (SELECT (SELECT name FROM districts WHERE id = District) AS districtname FROM u_basicinfos WHERE UserId = user_id) AS districten,
               (SELECT (SELECT bn_name FROM districts WHERE id = District) AS districtname FROM u_basicinfos WHERE UserId = user_id) AS districtbn,
               (SELECT DateOfBirth FROM u_basicinfos WHERE UserId = user_id) AS dob,
               (SELECT FROM_UNIXTIME(JoinDate, \'%Y-%m-%d\') FROM u_basicinfos WHERE UserId = user_id) AS joindate,
               (SELECT BloodGroup FROM u_basicinfos WHERE UserId = user_id) AS bloodgroup,
               (SELECT (SELECT SettingsName FROM initial_settings_info WHERE SettingsId = BloodGroup) AS bloodgroup FROM u_basicinfos WHERE UserId = user_id) AS bloodgroupen,
               (SELECT (SELECT SettingsDescription FROM initial_settings_info WHERE SettingsId = BloodGroup) AS bloodgroup FROM u_basicinfos WHERE UserId = user_id) AS bloodgroupbn,
               (SELECT CountryId FROM u_basicinfos WHERE UserId = user_id) AS country,
               (SELECT Biography FROM u_basicinfos WHERE UserId = user_id) AS biography,
               (SELECT UserPhoto FROM u_basicinfos WHERE UserId = user_id) AS userphoto,
               (SELECT IF(MaritalStatus = 1, \'Married\', \'Unmarried\') FROM u_basicinfos WHERE UserId = user_id) AS maritalstatusen,
               (SELECT IF(MaritalStatus = 1, \'বিবাহিত\', \'অবিবাহিত \') FROM u_basicinfos WHERE UserId = user_id) AS maritalstatusbn,
               (SELECT EnrollmentStatus FROM u_basicinfos WHERE UserId = user_id) AS enrollmentstatus,
               (SELECT Designation FROM u_tchstaff_information WHERE UserId = user_id) AS designation,
               (SELECT (SELECT SettingsName FROM initial_settings_info WHERE SettingsId = Designation) AS gender FROM u_basicinfos WHERE UserId = user_id) AS designationen,
               (SELECT (SELECT SettingsDescription FROM initial_settings_info WHERE SettingsId = Designation) AS gender FROM u_basicinfos WHERE UserId = user_id) AS designationbn,
               (SELECT DateAttended FROM u_tchstaff_information WHERE UserId = user_id) AS dateattended
        FROM users_groups
        WHERE group_id = "' . $id . '"');

        $sql = $this->db->get();
        if ($sql->num_rows() > 0) {
            if ($option == 'all') {
                foreach ($sql->result() as $rows) {
                    $data[] = $rows;
                }
            } else {
                $data = $sql->row_array();
            }
            return $data;
        } else {
            return false;
        }
    }


}