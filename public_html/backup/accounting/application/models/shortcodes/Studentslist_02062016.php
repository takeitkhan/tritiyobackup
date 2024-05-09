<?php
if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );
class StudentsList extends Common_model {
	function __construct() {
		parent::__construct ();
	}
	public function run($params = array()) {
		$rows = $this->getAllUsersByGroupId ( 4, 'all' );
		$classes = $this->getAllEnteredClasses ();
		// owndebugger($classes);
		if (! empty ( $rows )) {
			$str = '<ul class="list-inline">';
			foreach ( $classes as $cls ) {
				$str .= '<li style="border: 1px solid #DDD; margin: 4px;">';
				$str .= '<a href=' . base_url () . 'page/StudentList?page_id=72&Class=' . $cls->Class . '>' . $cls->ClassNameEn . '</a>';
				$str .= '</li>';				
			}
			$str .= '<li class="pull-right">';
			$str .= '<a href="javascript:void(0)" onclick="printdiv("biodataen")">';
			$str .= '<i class="fa fa-print" style="font-size: 26px;"></i>';
			$str .= '</a>';
			$str .= '</li>';
			$str .= '</ul>';			
			
			if (! empty ( $_GET ['Class'] )) {
				$cls = $_GET ['Class'];
				$rows = $this->getAllUsersByClass ( $cls, 'all' );
				foreach ( ( array ) $rows as $row ) {
					$str .= '<a href="' . base_url () . 'page/StudentsList?page_id=72&student_id=' . $row->UserId . '">';
					$str .= '<div class="bs-glyphicons"><ul class="bs-glyphicons-list"><li>';
					$str .= (! empty ( $row->userphoto ) ? ($row->gendernum == 22 ? '<img class="img-circle" style="max-width: 60px; max-height: 80px;" src="' . base_url () . '/uploads/pp/blankavatar.jpg" />' : '<img class="img-circle" style="max-width: 60px; max-height: 80px;" src="' . base_url () . '/uploads/pp/' . $row->userphoto . '" />') : '<img class="img-circle" style="max-width: 60px; max-height: 80px;" src="' . base_url () . '/uploads/pp/blankavatar.jpg" />');
					$str .= '<br/><span class="glyphicon-class">' . $row->banglaname . '</span></li></ul></div >';
					$str .= '</a>';
				}
			} else if (! empty ( $_GET ['Class'] ) and ! empty ( $_GET ['student_id'] )) {				
				$biodata = $this->get_user_single_informations_by_user_id ( $_GET ['student_id'] );
				
				$str .= '<div id="biodata">';
				$str .= '<div class="panel panel-success">';
				$str .= '<div class="panel-heading">';
				$str .= '<h3 class="panel-title">' . $biodata ['englishname'] . '<a class="pull-right" href="' . base_url () . 'page/StudentsList?page_id=72">Back to lists</a></h3>';
				$str .= '</div>';
				$str .= '<div class="panel-body">';
				$str .= '<ul class="list-group">';				
				$str .= '<li>' . (isset($biodata['genderen']) ? ' Gender: ' . $biodata['genderen'] : '') . '</li>';
				$str .= '<li>' . (isset($biodata['dob']) ? ' Date of Birth: ' . $biodata['dob'] : '') . '</li>';
				$str .= '<li>' . (isset($biodata['phone']) ? ' Phone: ' . $biodata['phone'] : '') . '</li>';
				$str .= '</ul>';
				$str .= '</div>';
				$str .= '</div>';
				$str .= '</div>';
			} else if (! empty ( $_GET ['student_id'] )) {
				$biodata = $this->get_user_single_informations_by_user_id ( $_GET ['student_id'] );
				
				$str .= '<div id="biodata">';
				$str .= '<div class="panel panel-success">';
				$str .= '<div class="panel-heading">';
				$str .= '<h3 class="panel-title">' . $biodata ['englishname'] . '<a class="pull-right" href="' . base_url () . 'page/StudentsList?page_id=72">Back to lists</a></h3>';
				$str .= '</div>';
				$str .= '<div class="panel-body">';
				$str .= '<ul class="list-group">';				
				$str .= '<li>' . (isset($biodata['genderen']) ? ' Gender: ' . $biodata['genderen'] : '') . '</li>';
				$str .= '<li>' . (isset($biodata['dob']) ? ' Date of Birth: ' . $biodata['dob'] : '') . '</li>';
				$str .= '<li>' . (isset($biodata['phone']) ? ' Phone: ' . $biodata['phone'] : '') . '</li>';
				$str .= '</ul>';
				$str .= '</div>';
				$str .= '</div>';
				$str .= '</div>';
			} else {
				foreach ( ( array ) $rows as $row ) {
					$str .= '<a href="' . base_url () . 'page/StudentsList?page_id=72&student_id=' . $row->user_id . '">';
					$str .= '<div class="bs-glyphicons"><ul class="bs-glyphicons-list"><li>';
					$str .= (! empty ( $row->userphoto ) ? ($row->gendernum == 22 ? '<img class="img-circle" style="max-width: 60px; max-height: 80px;" src="' . base_url () . '/uploads/pp/blankavatar.jpg" />' : '<img class="img-circle" style="max-width: 60px; max-height: 80px;" src="' . base_url () . '/uploads/pp/' . $row->userphoto . '" />') : '<img class="img-circle" style="max-width: 60px; max-height: 80px;" src="' . base_url () . '/uploads/pp/blankavatar.jpg" />');
					$str .= '<br/><span class="glyphicon-class">' . $row->banglaname . '</span></li></ul></div >';
					$str .= '</a>';
				}
			}
			
			return $str;
		} else {
			$str = 'কোন তথ্য এখনো হালনাগাদ করা হয়নি';
		}
		return $str;
	}
	public function getAllEnteredClasses() {
		$this->db->select ( 'Class,
            (SELECT SettingsName FROM initial_settings_info WHERE SettingsId = Class) AS ClassNameEn,
            (SELECT SettingsDescription FROM initial_settings_info WHERE SettingsId = Class) AS ClassNameBn' )->from ( $this->_studentInformation )->group_by ( 'Class' );
		
		$sql = $this->db->get ();
		if ($sql->num_rows () > 0) {
			foreach ( $sql->result () as $rows ) {
				$data [] = $rows;
			}
			return $data;
		} else {
			return false;
		}
	}
	public function get_user_single_informations_by_user_id($userid) {
		$this->db->select ( '*,
                (SELECT name FROM groups WHERE id = group_id) AS groupname,
                (
                    CASE
                        group_id
                            WHEN 3 THEN ((SELECT GROUP_CONCAT(CONCAT_WS(\'|\', m.InstituteName, m.Degree, m.Concentrations, m.GPA, FROM_UNIXTIME(m.PassingYear, \'%d-%m-%Y\'), m.Board, m.PSession, m.IsGraduated) SEPARATOR \',\') AS eduhis FROM u_educationhistory AS m WHERE m.UserId = user_id))
                            WHEN 4 THEN ((SELECT GROUP_CONCAT(CONCAT_WS(\'|\', m.InstituteName, m.Degree, m.Concentrations, m.GPA, FROM_UNIXTIME(m.PassingYear, \'%d-%m-%Y\'), m.Board, m.PSession, m.IsGraduated) SEPARATOR \',\') AS eduhis FROM u_educationhistory AS m WHERE m.UserId = user_id))
                            WHEN 5 THEN ((SELECT GROUP_CONCAT(CONCAT_WS(\'|\', m.InstituteName, m.Degree, m.Concentrations, m.GPA, FROM_UNIXTIME(m.PassingYear, \'%d-%m-%Y\'), m.Board, m.PSession, m.IsGraduated) SEPARATOR \',\') AS eduhis FROM u_educationhistory AS m WHERE m.UserId = user_id))
                            WHEN 6 THEN ((SELECT GROUP_CONCAT(CONCAT_WS(\'|\', m.InstituteName, m.Degree, m.Concentrations, m.GPA, FROM_UNIXTIME(m.PassingYear, \'%d-%m-%Y\'), m.Board, m.PSession, m.IsGraduated) SEPARATOR \',\') AS eduhis FROM u_educationhistory AS m WHERE m.UserId = user_id))
                            WHEN 7 THEN ((SELECT GROUP_CONCAT(CONCAT_WS(\'|\', m.InstituteName, m.Degree, m.Concentrations, m.GPA, FROM_UNIXTIME(m.PassingYear, \'%d-%m-%Y\'), m.Board, m.PSession, m.IsGraduated) SEPARATOR \',\') AS eduhis FROM u_educationhistory AS m WHERE m.UserId = user_id))
                            WHEN 8 THEN ((SELECT GROUP_CONCAT(CONCAT_WS(\'|\', m.InstituteName, m.Degree, m.Concentrations, m.GPA, FROM_UNIXTIME(m.PassingYear, \'%d-%m-%Y\'), m.Board, m.PSession, m.IsGraduated) SEPARATOR \',\') AS eduhis FROM u_educationhistory AS m WHERE m.UserId = user_id))
                            WHEN 9 THEN ((SELECT GROUP_CONCAT(CONCAT_WS(\'|\', m.InstituteName, m.Degree, m.Concentrations, m.GPA, FROM_UNIXTIME(m.PassingYear, \'%d-%m-%Y\'), m.Board, m.PSession, m.IsGraduated) SEPARATOR \',\') AS eduhis FROM u_educationhistory AS m WHERE m.UserId = user_id))
                            WHEN 10 THEN ((SELECT GROUP_CONCAT(CONCAT_WS(\'|\', m.InstituteName, m.Degree, m.Concentrations, m.GPA, FROM_UNIXTIME(m.PassingYear, \'%d-%m-%Y\'), m.Board, m.PSession, m.IsGraduated) SEPARATOR \',\') AS eduhis FROM u_educationhistory AS m WHERE m.UserId = user_id))
                            WHEN 11 THEN ((SELECT GROUP_CONCAT(CONCAT_WS(\'|\', m.InstituteName, m.Degree, m.Concentrations, m.GPA, FROM_UNIXTIME(m.PassingYear, \'%d-%m-%Y\'), m.Board, m.PSession, m.IsGraduated) SEPARATOR \',\') AS eduhis FROM u_educationhistory AS m WHERE m.UserId = user_id))
                            WHEN 12 THEN ((SELECT GROUP_CONCAT(CONCAT_WS(\'|\', m.InstituteName, m.Degree, m.Concentrations, m.GPA, FROM_UNIXTIME(m.PassingYear, \'%d-%m-%Y\'), m.Board, m.PSession, m.IsGraduated) SEPARATOR \',\') AS eduhis FROM u_educationhistory AS m WHERE m.UserId = user_id))
                        END
                ) AS educationhistory,
                (
                    CASE
                        group_id
                            WHEN 4 THEN (SELECT
                                CONCAT_WS(\'|\',
                                    (SELECT SettingsName FROM initial_settings_info WHERE SettingsId = Class),
                                    ClassRoll,
                                    (SELECT SettingsName FROM initial_settings_info WHERE SettingsId = Section),
                                    (SELECT SettingsName FROM initial_settings_info WHERE SettingsId = GroupId),
                                    (SELECT SettingsName FROM initial_settings_info WHERE SettingsId = Department)
                                )
                            FROM u_std_information AS p WHERE p.UserId = user_id)
                            WHEN 3 THEN (SELECT
                                CONCAT_WS(\'|\',                                    
                                    SalaryScale,
                                    DateAttended,
        							IndexNumber,
					        		BankAccountNumber,
					        		BankName,
					        		BankBranchName,
        							(SELECT SettingsName FROM initial_settings_info WHERE SettingsId = Designation),
                                    (SELECT SettingsDescription FROM initial_settings_info WHERE SettingsId = Designation)
                                )
                            FROM u_tchstaff_information AS p WHERE p.UserId = user_id)
                        END
                ) AS enstdinfo,
                (
                    CASE
                        group_id
                            WHEN 4 THEN (SELECT
                                CONCAT_WS(\'|\',
                                    (SELECT SettingsDescription FROM initial_settings_info WHERE SettingsId = Class),
                                    ClassRoll,
                                    (SELECT SettingsDescription FROM initial_settings_info WHERE SettingsId = Section),
                                    (SELECT SettingsDescription FROM initial_settings_info WHERE SettingsId = GroupId),
                                    (SELECT SettingsDescription FROM initial_settings_info WHERE SettingsId = Department)
                                )
                            FROM u_std_information AS p WHERE p.UserId = user_id)
                            WHEN 3 THEN (SELECT
                                CONCAT_WS(\'|\',
                                    SalaryScale,
                                    DateAttended,
        							IndexNumber,
					        		BankAccountNumber,
					        		BankName,
					        		BankBranchName,
        							(SELECT SettingsName FROM initial_settings_info WHERE SettingsId = Designation),
                                    (SELECT SettingsDescription FROM initial_settings_info WHERE SettingsId = Designation)
                                )
                            FROM u_tchstaff_information AS p WHERE p.UserId = user_id)
                        END
                ) AS bnstdinfo,
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
                (SELECT FROM_UNIXTIME(DateOfBirth, \'%Y-%m-%d\') FROM u_basicinfos WHERE UserId = user_id) AS dob,
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
                (SELECT (SELECT SettingsName FROM initial_settings_info WHERE SettingsId = EnrollmentStatus) AS enrollmentstatus FROM u_basicinfos WHERE UserId = user_id) AS enrollmentstatus,
                (SELECT (SELECT SettingsDescription FROM initial_settings_info WHERE SettingsId = EnrollmentStatus) AS enrollmentstatus FROM u_basicinfos WHERE UserId = user_id) AS enrollmentstatus
        FROM users_groups
        WHERE user_id = "' . $userid . '"' );
		$sql = $this->db->get ();
		if ($sql->num_rows () > 0) {
			$data = $sql->row_array ();
			return $data;
		} else {
			return false;
		}
	
	/**
	 * SELECT *,
	 * (SELECT name FROM groups WHERE id = group_id) AS groupname,
	 * (
	 * CASE
	 * group_id
	 * WHEN 3 THEN ((SELECT GROUP_CONCAT(CONCAT_WS('|', m.InstituteName, m.Degree, m.Concentrations, FROM_UNIXTIME(m.StartDate, '%d-%m-%Y'), FROM_UNIXTIME(m.EndDate, '%d-%m-%Y'), m.GPA, m.IsGraduated) SEPARATOR ',') AS eduhis FROM u_educationhistory AS m WHERE m.UserId = user_id))
	 * WHEN 4 THEN ((SELECT GROUP_CONCAT(CONCAT_WS('|', m.InstituteName, m.Degree, m.Concentrations, FROM_UNIXTIME(m.StartDate, '%d-%m-%Y'), FROM_UNIXTIME(m.EndDate, '%d-%m-%Y'), m.GPA, m.IsGraduated) SEPARATOR ',') AS eduhis FROM u_educationhistory AS m WHERE m.UserId = user_id))
	 * WHEN 5 THEN ((SELECT GROUP_CONCAT(CONCAT_WS('|', m.InstituteName, m.Degree, m.Concentrations, FROM_UNIXTIME(m.StartDate, '%d-%m-%Y'), FROM_UNIXTIME(m.EndDate, '%d-%m-%Y'), m.GPA, m.IsGraduated) SEPARATOR ',') AS eduhis FROM u_educationhistory AS m WHERE m.UserId = user_id))
	 * WHEN 6 THEN ((SELECT GROUP_CONCAT(CONCAT_WS('|', m.InstituteName, m.Degree, m.Concentrations, FROM_UNIXTIME(m.StartDate, '%d-%m-%Y'), FROM_UNIXTIME(m.EndDate, '%d-%m-%Y'), m.GPA, m.IsGraduated) SEPARATOR ',') AS eduhis FROM u_educationhistory AS m WHERE m.UserId = user_id))
	 * WHEN 7 THEN ((SELECT GROUP_CONCAT(CONCAT_WS('|', m.InstituteName, m.Degree, m.Concentrations, FROM_UNIXTIME(m.StartDate, '%d-%m-%Y'), FROM_UNIXTIME(m.EndDate, '%d-%m-%Y'), m.GPA, m.IsGraduated) SEPARATOR ',') AS eduhis FROM u_educationhistory AS m WHERE m.UserId = user_id))
	 * WHEN 8 THEN ((SELECT GROUP_CONCAT(CONCAT_WS('|', m.InstituteName, m.Degree, m.Concentrations, FROM_UNIXTIME(m.StartDate, '%d-%m-%Y'), FROM_UNIXTIME(m.EndDate, '%d-%m-%Y'), m.GPA, m.IsGraduated) SEPARATOR ',') AS eduhis FROM u_educationhistory AS m WHERE m.UserId = user_id))
	 * WHEN 9 THEN ((SELECT GROUP_CONCAT(CONCAT_WS('|', m.InstituteName, m.Degree, m.Concentrations, FROM_UNIXTIME(m.StartDate, '%d-%m-%Y'), FROM_UNIXTIME(m.EndDate, '%d-%m-%Y'), m.GPA, m.IsGraduated) SEPARATOR ',') AS eduhis FROM u_educationhistory AS m WHERE m.UserId = user_id))
	 * WHEN 10 THEN ((SELECT GROUP_CONCAT(CONCAT_WS('|', m.InstituteName, m.Degree, m.Concentrations, FROM_UNIXTIME(m.StartDate, '%d-%m-%Y'), FROM_UNIXTIME(m.EndDate, '%d-%m-%Y'), m.GPA, m.IsGraduated) SEPARATOR ',') AS eduhis FROM u_educationhistory AS m WHERE m.UserId = user_id))
	 * WHEN 11 THEN ((SELECT GROUP_CONCAT(CONCAT_WS('|', m.InstituteName, m.Degree, m.Concentrations, FROM_UNIXTIME(m.StartDate, '%d-%m-%Y'), FROM_UNIXTIME(m.EndDate, '%d-%m-%Y'), m.GPA, m.IsGraduated) SEPARATOR ',') AS eduhis FROM u_educationhistory AS m WHERE m.UserId = user_id))
	 * WHEN 12 THEN ((SELECT GROUP_CONCAT(CONCAT_WS('|', m.InstituteName, m.Degree, m.Concentrations, FROM_UNIXTIME(m.StartDate, '%d-%m-%Y'), FROM_UNIXTIME(m.EndDate, '%d-%m-%Y'), m.GPA, m.IsGraduated) SEPARATOR ',') AS eduhis FROM u_educationhistory AS m WHERE m.UserId = user_id))
	 * END
	 * ) AS educationhistory,
	 * (
	 * CASE
	 * group_id
	 * WHEN 4 THEN (SELECT
	 * CONCAT_WS('|',
	 * (SELECT SettingsName FROM initial_settings_info WHERE SettingsId = Class),
	 * ClassRoll,
	 * (SELECT SettingsName FROM initial_settings_info WHERE SettingsId = Section),
	 * (SELECT SettingsName FROM initial_settings_info WHERE SettingsId = GroupId),
	 * (SELECT SettingsName FROM initial_settings_info WHERE SettingsId = Department)
	 * )
	 * FROM u_std_information AS p WHERE p.UserId = user_id)
	 * WHEN 3 THEN (SELECT
	 * CONCAT_WS('|',
	 * (SELECT SettingsName FROM initial_settings_info WHERE SettingsId = Designation),
	 * SalaryScale,
	 * DateAttended
	 * )
	 * FROM u_tchstaff_information AS p WHERE p.UserId = user_id)
	 * END
	 * ) AS enstdinfo,
	 * (
	 * CASE
	 * group_id
	 * WHEN 4 THEN (SELECT
	 * CONCAT_WS('|',
	 * (SELECT SettingsDescription FROM initial_settings_info WHERE SettingsId = Class),
	 * ClassRoll,
	 * (SELECT SettingsDescription FROM initial_settings_info WHERE SettingsId = Section),
	 * (SELECT SettingsDescription FROM initial_settings_info WHERE SettingsId = GroupId),
	 * (SELECT SettingsDescription FROM initial_settings_info WHERE SettingsId = Department)
	 * )
	 * FROM u_std_information AS p WHERE p.UserId = user_id)
	 * WHEN 3 THEN (SELECT
	 * CONCAT_WS('|',
	 * (SELECT SettingsDescription FROM initial_settings_info WHERE SettingsId = Designation),
	 * SalaryScale,
	 * DateAttended
	 * )
	 * FROM u_tchstaff_information AS p WHERE p.UserId = user_id)
	 * END
	 * ) AS bnstdinfo,
	 * (SELECT full_name_bn FROM users WHERE id = user_id) AS banglaname,
	 * (SELECT full_name_en FROM users WHERE id = user_id) AS englishname,
	 * (SELECT father_name_bn FROM users WHERE id = user_id) AS banglafname,
	 * (SELECT father_name_en FROM users WHERE id = user_id) AS englishfname,
	 * (SELECT mother_name_bn FROM users WHERE id = user_id) AS banglamname,
	 * (SELECT mother_name_en FROM users WHERE id = user_id) AS englishmname,
	 * (SELECT phone FROM users WHERE id = user_id) AS phone,
	 * (SELECT Gender FROM u_basicinfos WHERE UserId = user_id) AS gendernum,
	 * (SELECT (SELECT SettingsName FROM initial_settings_info WHERE SettingsId = Gender) AS gender FROM u_basicinfos WHERE UserId = user_id) AS genderen,
	 * (SELECT (SELECT SettingsDescription FROM initial_settings_info WHERE SettingsId = Gender) AS gender FROM u_basicinfos WHERE UserId = user_id) AS genderbn,
	 * (SELECT UniqueNumber FROM u_basicinfos WHERE UserId = user_id) AS uniquenumber,
	 * (SELECT Religion FROM u_basicinfos WHERE UserId = user_id) AS religion,
	 * (SELECT (SELECT SettingsName FROM initial_settings_info WHERE SettingsId = Religion) AS gender FROM u_basicinfos WHERE UserId = user_id) AS religionen,
	 * (SELECT (SELECT SettingsDescription FROM initial_settings_info WHERE SettingsId = Religion) AS gender FROM u_basicinfos WHERE UserId = user_id) AS religionbn,
	 * (SELECT Address FROM u_basicinfos WHERE UserId = user_id) AS address,
	 * (SELECT Upazila FROM u_basicinfos WHERE UserId = user_id) AS upazila,
	 * (SELECT (SELECT name FROM upazilas WHERE id = Upazila) AS upazilaname FROM u_basicinfos WHERE UserId = user_id) AS upazilaen,
	 * (SELECT (SELECT bn_name FROM upazilas WHERE id = Upazila) AS upazilaname FROM u_basicinfos WHERE UserId = user_id) AS upazilabn,
	 * (SELECT District FROM u_basicinfos WHERE UserId = user_id) AS district,
	 * (SELECT (SELECT name FROM districts WHERE id = District) AS districtname FROM u_basicinfos WHERE UserId = user_id) AS districten,
	 * (SELECT (SELECT bn_name FROM districts WHERE id = District) AS districtname FROM u_basicinfos WHERE UserId = user_id) AS districtbn,
	 * (SELECT FROM_UNIXTIME(DateOfBirth, '%d-%m-%Y') FROM u_basicinfos WHERE UserId = user_id) AS dob,
	 * (SELECT FROM_UNIXTIME(JoinDate, '%d-%m-%Y') FROM u_basicinfos WHERE UserId = user_id) AS joindate,
	 * (SELECT BloodGroup FROM u_basicinfos WHERE UserId = user_id) AS bloodgroup,
	 * (SELECT (SELECT SettingsName FROM initial_settings_info WHERE SettingsId = BloodGroup) AS bloodgroup FROM u_basicinfos WHERE UserId = user_id) AS bloodgroupen,
	 * (SELECT (SELECT SettingsDescription FROM initial_settings_info WHERE SettingsId = BloodGroup) AS bloodgroup FROM u_basicinfos WHERE UserId = user_id) AS bloodgroupbn,
	 * (SELECT CountryId FROM u_basicinfos WHERE UserId = user_id) AS country,
	 * (SELECT Biography FROM u_basicinfos WHERE UserId = user_id) AS biography,
	 * (SELECT UserPhoto FROM u_basicinfos WHERE UserId = user_id) AS userphoto,
	 * (SELECT IF(MaritalStatus = 1, 'Married', 'Unmarried') FROM u_basicinfos WHERE UserId = user_id) AS maritalstatusen,
	 * (SELECT IF(MaritalStatus = 1, 'বিবাহিত', 'অবিবাহিত ') FROM u_basicinfos WHERE UserId = user_id) AS maritalstatusbn,
	 * (SELECT EnrollmentStatus FROM u_basicinfos WHERE UserId = user_id) AS enrollmentstatus,
	 * (SELECT (SELECT SettingsName FROM initial_settings_info WHERE SettingsId = EnrollmentStatus) AS enrollmentstatus FROM u_basicinfos WHERE UserId = user_id) AS enrollmentstatus,
	 * (SELECT (SELECT SettingsDescription FROM initial_settings_info WHERE SettingsId = EnrollmentStatus) AS enrollmentstatus FROM u_basicinfos WHERE UserId = user_id) AS enrollmentstatus
	 * FROM users_groups
	 * WHERE user_id = 16111300
	 */
	}
	public function getAllUsersByClass($cls, $option = NULL) {
		$this->db->select ( '*,(SELECT full_name_bn FROM users WHERE id = UserId) AS banglaname,
               (SELECT full_name_en FROM users WHERE id = UserId) AS englishname,' )->from ( $this->_studentInformation )->where ( 'Class', $cls );
		$sql = $this->db->get ();
		if ($sql->num_rows () > 0) {
			if ($option == 'all') {
				foreach ( $sql->result () as $rows ) {
					$data [] = $rows;
				}
			} else {
				$data = $sql->row_array ();
			}
			return $data;
		} else {
			return false;
		}
	}
	public function getAllUsersByGroupId($id, $option = NULL) {
		$this->db->select ( '*,
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
               (SELECT FROM_UNIXTIME(DateOfBirth, \'%Y-%m-%d\') FROM u_basicinfos WHERE UserId = user_id) AS dob,
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
               (SELECT DateAttended FROM u_tchstaff_information WHERE UserId = user_id) AS dateattended,
               (SELECT Class FROM u_std_information WHERE UserId = user_id) AS Class
        FROM users_groups
        WHERE group_id = "' . $id . '"' );
		
		$sql = $this->db->get ();
		if ($sql->num_rows () > 0) {
			if ($option == 'all') {
				foreach ( $sql->result () as $rows ) {
					$data [] = $rows;
				}
			} else {
				$data = $sql->row_array ();
			}
			return $data;
		} else {
			return false;
		}
	}
}