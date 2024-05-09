<?php

/**
 * Class Panel_model $panel_model
 * @property Common_model $common_model Common Model
 */
class Panel_model extends Common_model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getAllUsers()
    {
        $this->datatables
            ->select('first_name, last_name, FROM_UNIXTIME(created_on, "%Y-%m-%d") created_on, email, company, phone, id')
            ->from($this->_usersTable);
        $q = $this->datatables->generate();
        return $q;
    }

    public function getAllPages()
    {
        //        (SELECT ModuleName FROM ' . $this->_modules . ' WHERE ModuleId = ' . $this->_categories . '.ModuleId) AS ModuleName,
        $this->datatables
            ->select('PageId, PageTitle, PageRoute, (SELECT PageTitle FROM ' . $this->_webpages . ' c WHERE c.PageId = ' . $this->_webpages . '.ParentId LIMIT 0,1) AS ParentPageName, PublishDate, isActive')
            ->from($this->_webpages)
            ->add_column('Edit', '<a href="' . base_url() . 'addnewpage/$1" target="_blank"><i class="fa fa-pencil fa-fw"></i></a>', 'PageId')
            ->add_column('Delete', '<a onclick="ajaxRemoveFn($1,\'deletepage/$1\')" href="javascript:void(0)"><i class="fa fa-trash-o fa-fw"></i></a>', 'PageId');

        $q = $this->datatables->generate();      
        return $q;
    }

    public function getAllPosts()
    {
        //, (SELECT SettingsName FROM initial_settings_info WHERE SettingsId = Category) AS CategoryName,
        $this->datatables
            ->select('PostId, Title, PostRoute, (SELECT SettingsName FROM initial_settings_info WHERE SettingsId = Category) AS Category, PostContent, MediaFileName, FROM_UNIXTIME(AddedDate, "%Y-%m-%d") AddedDate,, isActive')
            ->from($this->_posts)
            ->add_column('MediaFileName', '<img width="60px" style="max-height: 60px;" src="' . base_url() . 'uploads/posts/$1">', 'MediaFileName')
            ->add_column('Edit', '<a href="' . base_url() . 'editpost/$1" target="_blank"><i class="fa fa-pencil fa-fw"></i></a>', 'PostId')
            ->add_column('Delete', '<a onclick="ajaxRemoveFn($1,\'deletepost/$1\')" href="javascript:void(0)"><i class="fa fa-trash-o fa-fw"></i></a>', 'PostId');

        $q = $this->datatables->generate();
        return $q;
    }

    public function getAllApplicants()
    {
        //        (SELECT ModuleName FROM ' . $this->_modules . ' WHERE ModuleId = ' . $this->_categories . '.ModuleId) AS ModuleName,
        $this->datatables
            ->select('UserID,
                (SELECT Gender FROM u_basicinfos WHERE UserId = acc_payments.UserId) AS Gender,
                (SELECT EnrollmentStatus FROM u_basicinfos WHERE UserId = acc_payments.UserId) AS EnrollmentStatus,
                (SELECT FROM_UNIXTIME(DateOfBirth, "%Y-%m-%d") FROM u_basicinfos WHERE UserId = acc_payments.UserId) AS DateOfBirth,
                (SELECT full_name_bn FROM users WHERE id = acc_payments.UserId) AS Fn_bn,
                (SELECT full_name_en FROM users WHERE id = acc_payments.UserId) AS Fn_en,
                (SELECT father_name_bn FROM users WHERE id = acc_payments.UserId) AS Ffn_bn,
                (SELECT father_name_en FROM users WHERE id = acc_payments.UserId) AS Ffn_en,
                (SELECT mother_name_bn FROM users WHERE id = acc_payments.UserId) AS Mfn_bn,
                (SELECT mother_name_en FROM users WHERE id = acc_payments.UserId) AS Mfn_en,
                PaymentId,
                LedgerNameId,
                Amount,
                PaymentDate,
                TransactionId')
            ->from($this->_paymentsentries)
            ->add_column('View', '<a class="btn btn-success btn-sm" href="' . base_url() . 'singleapplicants/$1" target="_blank"><i class="fa fa-eye"></i></a>', 'UserID')
            ->add_column('Delete', '<a class="btn btn-danger btn-sm" onclick="ajaxRemoveFn($1,\'deleteapplicants/$1\')" href="javascript:void(0)"><i class="fa fa-trash-o fa-fw"></i></a>', 'UserID');

        $q = $this->datatables->generate();
        return $q;
    }

    public function getInitialSettingsByCategory($cat)
    {
        $this->datatables
            ->select(
                'SettingsId,
    	    SettingsCategory,
    	    SettingsName,
    	    SettingsDescription,
    	    isActive'
            )
            ->where("SettingsCategory", $cat)
            ->from($this->_initialSettings)
            ->add_column('Edit', '<a href="' . base_url() . 'addnewclass/$1" target="_blank"><i class="fa fa-pencil fa-fw"></i></a>', 'SettingsId')
            ->add_column('Delete', '<a onclick="return confirm(\'Are you sure want to delete?\')" href="' . base_url() . 'addnewclass/$1"><i class="fa fa-trash-o fa-fw"></i></a>', 'SettingsId');

        $q = $this->datatables->generate();
        return $q;
    }

    public function ifAttendanceExists($cid, $sid, $sgid, $department)
    {
        //$sql = 'SELECT COUNT(*) AS Total FROM ' . $this->_attendance . ' WHERE (Exams = ' . $eid . ' AND Classes = ' . $cid . ' AND Sections = ' . $sid . ' AND Subjects = ' . $subid . '  AND StudyGroups = ' . $sgid . ')';
        $sql = 'SELECT  COUNT(*) AS Total FROM attendance q LEFT JOIN u_std_information AS p ON p.UserId = q.UserId WHERE p.Class = ' . $cid . '  AND p.Section = ' . $sid . ' AND p.GroupId = IF(p.GroupId = ' . $sgid . ', ' . $sgid . ', 0 ) AND p.Department = IF(Department = ' . $department . ', ' . $department . ', 0 ) AND q.AttDate = CURDATE()';
        $query = $this->db->query($sql);
        $record = $query->row();
        return $record;

//        $this->db->select('*')
//            ->from($this->_results)
//            ->where('Exams', ($eid !== 0) ? $eid : 0)
//            ->where('Classes', ($cid !== 0) ? $cid : 0)
//            ->where('Sections', ($sid !== 0) ? $sid : 0)
//            ->where('Subjects', ($subid !== 0) ? $subid : 0)
//            ->where('StudyGroups', ($sgid !== 0) ? $sgid : 0);
//
//        $query = $this->db->get();
//        return $query;
    }

    public function ifAttendanceExistsTchStaffs()
    {
        //$sql = 'SELECT COUNT(*) AS Total FROM ' . $this->_attendance . ' WHERE (Exams = ' . $eid . ' AND Classes = ' . $cid . ' AND Sections = ' . $sid . ' AND Subjects = ' . $subid . '  AND StudyGroups = ' . $sgid . ')';
        $sql = 'SELECT COUNT(*) AS Total FROM ' . $this->_attendance . ' q
            LEFT JOIN ' . $this->_usersGroups . ' AS m ON m.user_id = q.UserId
            WHERE q.AttDate = CURDATE() AND m.group_id NOT IN (1, 2, 4, 5, 10, 11, 12, 13)';
        $query = $this->db->query($sql);
        $record = $query->row();
        return $record;

//        $this->db->select('*')
//            ->from($this->_results)
//            ->where('Exams', ($eid !== 0) ? $eid : 0)
//            ->where('Classes', ($cid !== 0) ? $cid : 0)
//            ->where('Sections', ($sid !== 0) ? $sid : 0)
//            ->where('Subjects', ($subid !== 0) ? $subid : 0)
//            ->where('StudyGroups', ($sgid !== 0) ? $sgid : 0);
//
//        $query = $this->db->get();
//        return $query;
    }


    public function insertOrUpdateAttendance($cid = NULL, $sid = NULL, $sgid = NULL, $department = NULL)
    {

        $this->db->query('INSERT INTO ' . $this->_attendance . ' (UserId, SubjectId, isAbsent, Message, AttDate, InTime, OutTime, AddedDate)
            SELECT p.user_id, NULL, 0, NULL, CURDATE(), NOW(), NOW(), CURDATE()
            FROM ' . $this->_usersGroups . ' AS p
            LEFT JOIN ' . $this->_studentInformation . ' AS si
            ON p.user_id = si.UserId
            WHERE
                p.group_id = 4
                AND si.Class = ' . $cid . '
                AND si.Section = ' . $sid . '
                AND si.GroupId = IF(si.GroupId = ' . $sgid . ', ' . $sgid . ', 0 )
                AND si.Department = IF(si.Department = ' . $department . ', ' . $department . ', 0 )
                AND
                (
                    SELECT  COUNT(*) AS Total FROM ' . $this->_attendance . ' q LEFT JOIN ' . $this->_studentInformation . ' AS p ON p.UserId = q.UserId
                    WHERE p.Class = ' . $cid . '
                    AND p.Section = ' . $sid . '
                    AND p.GroupId = IF(p.GroupId = ' . $sgid . ', ' . $sgid . ', 0 )
                    AND p.Department = IF(Department = ' . $department . ', ' . $department . ', 0 )
                    AND q.AttDate = CURDATE()
                ) = 0');
        return $this->db->affected_rows();

        /**INSERT INTO attendance (UserId, SubjectId, isAbsent, Message, AttDate, InTime, OutTime, AddedDate)
         * SELECT p.user_id, NULL, 1, 'Your son is absent today', CURDATE(), NOW(), NOW(), CURDATE()
         * FROM users_groups AS p
         * LEFT JOIN u_std_information AS si
         * ON p.user_id = si.UserId
         * WHERE p.group_id = 4 AND si.Class = 1 AND si.Section = 13 AND (SELECT COUNT(*) AS Total FROM attendance q LEFT JOIN u_std_information AS p ON p.UserId = q.UserId WHERE p.Class = 1 AND p.Section = 13 AND q.AttDate = CURDATE()) = 0**/
    }

    public function insertOrUpdateAttendanceTchStaffs()
    {

        $this->db->query('INSERT INTO ' . $this->_attendance . ' (UserId, SubjectId, isAbsent, Message, AttDate, InTime, OutTime, AddedDate)
            SELECT p.user_id, NULL, 0, NULL, CURDATE(), NOW(), NOW(), CURDATE()
            FROM ' . $this->_usersGroups . ' AS p
            LEFT JOIN ' . $this->_tchstaff_information . ' AS si
            ON p.user_id = si.UserId
            WHERE p.group_id != 4 AND p.group_id NOT IN (1, 2, 4, 5, 10, 11, 12, 13)
            AND (SELECT COUNT(*) AS Total FROM ' . $this->_attendance . ' q
            LEFT JOIN ' . $this->_usersGroups . ' AS m ON m.user_id = q.UserId
            WHERE q.AttDate = CURDATE() AND m.group_id NOT IN (1, 2, 4, 5, 10, 11, 12, 13)) = 0
        ');
        return $this->db->affected_rows();

        /**INSERT INTO attendance (UserId, SubjectId, isAbsent, Message, AttDate, InTime, OutTime, AddedDate)
         * SELECT p.user_id, NULL, 1, 'Your son is absent today', CURDATE(), NOW(), NOW(), CURDATE()
         * FROM users_groups AS p
         * LEFT JOIN u_std_information AS si
         * ON p.user_id = si.UserId
         * WHERE p.group_id = 4 AND si.Class = 1 AND si.Section = 13 AND (SELECT COUNT(*) AS Total FROM attendance q LEFT JOIN u_std_information AS p ON p.UserId = q.UserId WHERE p.Class = 1 AND p.Section = 13 AND q.AttDate = CURDATE()) = 0**/
    }

    public function getUsersForAttendance($cid = NULL, $sid = NULL, $sgid = NULL, $department = NULL)
    {
        $sql = 'SELECT *,
                (SELECT full_name_bn FROM users WHERE id = q.UserId) AS fullnamebn,
                (SELECT full_name_en FROM users WHERE id = q.UserId) AS fullnameen,
                (SELECT (SELECT phone FROM users WHERE id = GuardianId) FROM users_relation WHERE StudentId = q.UserId) AS guardianpn
                FROM ' . $this->_attendance . ' AS q
                LEFT JOIN ' . $this->_studentInformation . ' AS p ON p.UserId = q.UserId
                WHERE
                p.Class = ' . $cid . '
                AND p.Section = ' . $sid . '
                AND p.GroupId = IF(p.GroupId = ' . $sgid . ', ' . $sgid . ', 0)
                AND p.Department = IF(Department = ' . $department . ', ' . $department . ', 0)
                AND q.AttDate = CURDATE()';

        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $rows = $query->result_array();
            return $rows;
        }
    }

    public function getUsersForAttendanceTchStaffs()
    {
        $sql = 'SELECT *,
                (SELECT full_name_bn FROM users WHERE id = q.UserId) AS fullnamebn,
                (SELECT full_name_en FROM users WHERE id = q.UserId) AS fullnameen
                FROM ' . $this->_attendance . ' q
                LEFT JOIN ' . $this->_usersGroups . ' AS m ON m.user_id = q.UserId
                WHERE q.AttDate = CURDATE() AND m.group_id NOT IN (1, 2, 4, 5, 10, 11, 12, 13)';

        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $rows = $query->result_array();
            return $rows;
        }
    }


    public function deleteApplicant($where)
    {
        $data = $this->deleteRecords($this->common_model->_usersTable, $where);
        return $data;
    }

    public function deletePayments($where)
    {
        $data = $this->deleteRecords($this->common_model->_paymentsentries, $where);
        return $data;
    }

    public function deleteUserBasicInformation($where)
    {
        $data = $this->deleteRecords($this->common_model->_uBasicInfos, $where);
        return $data;
    }

    public function modify_single_attendance($data, $where)
    {
        $data = $this->updateRecords($this->common_model->_attendance, $data, $where);
        return $data;
    }
}