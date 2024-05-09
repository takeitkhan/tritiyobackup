<?php

/**
 * @property Admin_model $admin_model Administrator Model
 * @property Datatables $datatables Datatables
 * @property Common_model $common_model Common Model
 */
class Admin_model extends Common_model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getAllCategories()
    {
//        (SELECT ModuleName FROM ' . $this->_modules . ' WHERE ModuleId = ' . $this->_categories . '.ModuleId) AS ModuleName,
        $this->datatables
            ->select('*,CategoryId')
            ->from($this->_categories)
            ->join($this->_modules, $this->_modules . '.ModuleId = ' . $this->_categories . '.ModuleId')
            ->select('ModuleName')
            ->select('CategoryName')
            ->add_column('Edit', '<a href="' . base_url() . 'categories_panel/$1" target="_blank"><i class="fa fa-pencil fa-fw"></i></a>', 'CategoryId')
            ->add_column('Delete', '<a href="' . base_url() . 'categories_panel/$1"><i class="fa fa-trash-o fa-fw"></i></a>', 'CategoryId')
            ->unset_column('ModuleId')
            ->unset_column('Edit')
            ->unset_column('Delete')
            ->unset_column('CategoryId');

        $q = $this->datatables->generate();
        return $q;
    }

    public function getAllInvestors()
    {
        $this->datatables
            ->select('InvestorId,
            UserId,
            (SELECT first_name FROM ' . $this->_usersTable . ' WHERE id = ' . $this->_investors . '.UserId LIMIT 0,1) AS FirstName,
            InterestedIn,
            SubscribeAmount,
            YourAge,
            InvestedYet,
            Accredited,
            HopeToGain,
            Equity,
            StreetAddress,
            Phones,
            Emails,
            FROM_UNIXTIME(InsertedTime, "%m/%d/%Y") InsertedTime')
            ->from($this->_investors)
            ->add_column('Edit', '<a href="' . base_url() . 'investors_panel/$1" target="_blank"><i class="fa fa-pencil fa-fw"></i></a>', 'InvestorId')
            ->add_column('Delete', '<a href="' . base_url() . 'investors_panel/$1"><i class="fa fa-trash-o fa-fw"></i></a>', 'InvestorId');

        $q = $this->datatables->generate();
        return $q;
    }


    public function updateCategoryInformation($data, $where)
    {
        $data = $this->updateRecords($this->common_model->_categories, $data, $where);
        return $data;
    }

    public function myTotalFriends($id)
    {
        $result = $this->db->query('
        SELECT COUNT(*) AS TotalFriend FROM(SELECT *,
            IF(ReceiverId = "' . $id . '",
                (SELECT first_name FROM users WHERE users.id = contacts_connectivity.SenderId),
                (SELECT first_name FROM users WHERE users.id = contacts_connectivity.ReceiverId)) AS FirstName,
            IF(ReceiverId = "' . $id . '",
                (SELECT last_name FROM users WHERE users.id = contacts_connectivity.SenderId),
                (SELECT last_name FROM users WHERE users.id = contacts_connectivity.ReceiverId)) AS LastName,
            IF(ReceiverId = "' . $id . '", SenderId, ReceiverId) AS FriendId,
            IF(ReceiverId = "' . $id . '",
                (SELECT UserPhoto FROM u_basicinfos WHERE u_basicinfos.UserId = contacts_connectivity.SenderId),
                (SELECT UserPhoto FROM u_basicinfos WHERE u_basicinfos.UserId = contacts_connectivity.ReceiverId)) AS UserPhoto
            FROM contacts_connectivity
            WHERE (ReceiverId = "' . $id . '" OR SenderId = "' . $id . '")
            AND (ReceiverId OR SenderId NOT IN (SELECT (ReceiverId OR SenderId) FROM contacts_connectivity WHERE (ReceiverId OR SenderId) = "' . $id . '"))) AS A');

        $rows = $result->result_object();
        return $rows;
    }

    public function myFriendsFace($id)
    {
        $result = $this->db->query('
        SELECT *,
            IF(ReceiverId = "' . $id . '",
                (SELECT first_name FROM users WHERE users.id = contacts_connectivity.SenderId),
                (SELECT first_name FROM users WHERE users.id = contacts_connectivity.ReceiverId)) AS FirstName,
            IF(ReceiverId = "' . $id . '",
                (SELECT last_name FROM users WHERE users.id = contacts_connectivity.SenderId),
                (SELECT last_name FROM users WHERE users.id = contacts_connectivity.ReceiverId)) AS LastName,
            IF(ReceiverId = "' . $id . '",
                (SELECT NewportalURL FROM u_basicinfos WHERE u_basicinfos.UserId = contacts_connectivity.SenderId),
                (SELECT NewportalURL FROM u_basicinfos WHERE u_basicinfos.UserId = contacts_connectivity.ReceiverId)) AS NewportalURL,
            IF(ReceiverId = "' . $id . '", SenderId, ReceiverId) AS FriendId,
            IF(ReceiverId = "' . $id . '",
                (SELECT UserPhoto FROM u_basicinfos WHERE u_basicinfos.UserId = contacts_connectivity.SenderId),
                (SELECT UserPhoto FROM u_basicinfos WHERE u_basicinfos.UserId = contacts_connectivity.ReceiverId)) AS UserPhoto
            FROM contacts_connectivity
            WHERE isApproved = 1 AND (ReceiverId = "' . $id . '" OR SenderId = "' . $id . '")
            AND (ReceiverId OR SenderId NOT IN (SELECT (ReceiverId OR SenderId) FROM contacts_connectivity WHERE (ReceiverId OR SenderId) = "' . $id . '")) LIMIT 0, 5');
        //$row = $this->db->get();
        $rows = $result->result_object();
        return $rows;
    }

    public function getGenderWiseCount($cls, $genid)
    {
        $result = $this->db->query('SELECT COUNT(*) AS Total FROM (SELECT UserId, (SELECT Gender FROM u_basicinfos WHERE UserId = a.UserId) AS Gender FROM u_std_information a WHERE Class = "' . $cls . '") AS q WHERE q.Gender = "' . $genid . '"');
        $rows = $result->result_object();
        return $rows;
        //ob_clean();
        //$this->db->last_query();
    }

    public function getAllMyContacts($id)
    {
        /**
         * IF(SenderId != ' . $id . ', (SELECT ReceiverId FROM contacts_connectivity WHERE ReceiverId = ' . $id . ' LIMIT 0,1), SenderId) AS SenderId,
         * IF(SenderId != ' . $id . ', (SELECT SenderId FROM contacts_connectivity WHERE ReceiverId = ' . $id . ' LIMIT 0,1), ReceiverId) AS ReceiverId,
         * SenderId AS SendId, ReceiverId AS ReceiveId,
         **/

        $query = $this->datatables
            ->select('
                ContactId,
                ReceiverId,
                SenderId,
                IF(ReceiverId = ' . $id . ',
                    (SELECT first_name
                     FROM users
                     WHERE users.id = contacts_connectivity.SenderId),
                    (SELECT first_name
                     FROM users
                     WHERE users.id = contacts_connectivity.ReceiverId)) AS FirstName,
                IF(ReceiverId = ' . $id . ',
                    (SELECT email
                     FROM users
                     WHERE users.id = contacts_connectivity.SenderId),
                    (SELECT email
                     FROM users
                     WHERE users.id = contacts_connectivity.ReceiverId)) AS SenderEmail,
                IF(ReceiverId = ' . $id . ',
                    (SELECT phone
                     FROM users
                     WHERE users.id = contacts_connectivity.SenderId),
                    (SELECT phone
                     FROM users
                     WHERE users.id = contacts_connectivity.ReceiverId)) AS SenderPhone,
                IF(ReceiverId = ' . $id . ',
                    (SELECT company
                     FROM users
                     WHERE users.id = contacts_connectivity.SenderId),
                    (SELECT company
                     FROM users
                     WHERE users.id = contacts_connectivity.ReceiverId)) AS SenderCompany,
                ModulesId,
                (SELECT ModuleName FROM modules WHERE ModuleId = contacts_connectivity.ModulesId) AS ModuledName,
                FROM_UNIXTIME(AddedDate, "%m/%d/%Y") AddedDate')
            ->from($this->_contactsConnectivity)
            ->where("(ReceiverId=$id OR SenderId=$id) AND isApproved = 1")
            ->add_column('Edit', '<a href="' . base_url() . 'editcontact/$1" target="_blank"><i class="fa fa-pencil fa-fw"></i></a>', 'ContactId')
            ->add_column('Delete', '<a onclick="ajaxRemoveFn($1, \'deletecontact/$1\')" href="javascript:void(0)"><i class="fa fa-trash-o fa-fw"></i></a>', 'ContactId');
        $q = $this->datatables->generate();
        return $q;
    }

    /**
     * public function getAllMyContacts($id)
     *{
     *
     * $query = $this->db
     * ->query('SELECT ContactId, ReceiverId, SenderId,
     * IF(ReceiverId = ' . $id . ',
     * (SELECT first_name FROM users WHERE users.id = contacts_connectivity.SenderId),
     * (SELECT first_name FROM users WHERE users.id = contacts_connectivity.ReceiverId)) AS FirstName,
     * IF(ReceiverId = ' . $id . ',
     * (SELECT email FROM users WHERE users.id = contacts_connectivity.SenderId),
     * (SELECT email FROM users WHERE users.id = contacts_connectivity.ReceiverId)) AS SenderEmail,
     * IF(ReceiverId = ' . $id . ',
     * (SELECT phone FROM users WHERE users.id = contacts_connectivity.SenderId),
     * (SELECT phone FROM users WHERE users.id = contacts_connectivity.ReceiverId)) AS SenderPhone,
     * IF(ReceiverId = ' . $id . ',
     * (SELECT company FROM users WHERE users.id = contacts_connectivity.SenderId),
     * (SELECT company FROM users WHERE users.id = contacts_connectivity.ReceiverId)) AS SenderCompany,
     * ModulesId,
     * (SELECT ModuleName FROM modules WHERE ModuleId = contacts_connectivity.ModulesId) AS ModuledName, FROM_UNIXTIME(AddedDate, "%m/%d/%Y") AddedDate
     * FROM contacts_connectivity
     * WHERE (ReceiverId = ' . $id . ' OR SenderId = ' . $id . ')
     * AND (ReceiverId OR SenderId NOT IN (SELECT (ReceiverId OR SenderId) FROM contacts_connectivity WHERE (ReceiverId OR SenderId) = ' . $id . '))');
     * return $this->datatables->produce_output_extended($query, 'json', 'UTF-8');
     **/
    public function getAllMyUploadedContacts()
    {
        $this->datatables
            ->select('id AS AddressId, full_name_en AS Name, full_name_bn, phone AS Phone')
            ->from($this->_usersTable)
            ->add_column('Phone', '<a href="tel:$1?call">$1</a>', 'Phone')
            ->add_column('Email', '<a href="mailto:$1">$1</a>', 'Email')
            ->add_column('Edit', '<a href="' . base_url() . 'edituploadedcontact/$1" target="_blank"><i class="fa fa-pencil fa-fw"></i></a>', 'AddressId')
            ->add_column('Delete', '<a onclick="ajaxRemoveFn($1, \'deleteuploadedcontact/$1\')" href="javascript:void(0)"><i class="fa fa-trash-o fa-fw"></i></a>', 'AddressId');

        $q = $this->datatables->generate();
        return $q;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getMyUploadedContacts()
    {
        $this->db
            ->select('id AS AddressId, full_name_en AS Name, full_name_bn, phone AS Phone')
            ->from($this->_usersTable)
            ->order_by('full_name_en', 'ASC')
            ->limit(1000, 2);

        $result = $this->db->get();
        $row = $result->result_array();
        return $row;
    }

    public function getAddresses($keywords)
    {
        $this->db->select('id AS AddressId, full_name_en AS Name, full_name_bn, phone AS Phone')->from($this->_usersTable)
            ->like('full_name_en', $keywords)
            ->or_like('full_name_bn', $keywords)
            ->or_like('phone', $keywords)
            ->order_by('full_name_en', 'ASC')
            ->limit(500, 0);
        //ob_clean();
        //$this->db->last_query();
        $result = $this->db->get();
        $row = $result->result_array();
        return $row;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getMyUploadedContactsTotal()
    {
        $this->db
            ->select('COUNT(id) AS TotalAddress')
            ->from($this->_usersTable)
            ->order_by('full_name_en', 'ASC');

        $result = $this->db->get();
        $row = $result->result_array();
        return $row;
    }

    public function getSingleAddressById($aid)
    {
        $this->db->select('id AS AddressId, full_name_en AS Name, full_name_bn, phone AS Phone')
            ->from($this->_usersTable)
            ->where(array('id' => $aid));
        $result = $this->db->get();
        $row = $result->result_array();
        return $row;
    }

    public function getCallHistoryById($cid)
    {
        $this->db->select('DispositionId, CalledBy, AddressBookId, FROM_UNIXTIME(NextCallDate, \'%M %D %Y %h:%i:%s %x\') AS NextCallDate, Interests, OtherNotes, FROM_UNIXTIME(CallTime, \'%M %D %Y %h:%i:%s %x\') AS CallTime, AddedDate')
            ->from($this->_callHistory)
            ->where(array('AddressBookId' => $cid))
            ->order_by('AddedDate', 'DESC');
        $result = $this->db->get();
        $row = $result->result_array();
        return $row;
    }

    public function deleteContact($where)
    {
        $data = $this->deleteRecords($this->common_model->_contacts, $where);
        return $data;
    }

    public function deleteUploadedContact($where)
    {
        $data = $this->deleteRecords($this->common_model->_addressBook, $where);
        return $data;
    }

    public function getAllPressReleases()
    {
        $this->datatables
            ->select('PressReleaseId,
            SenderUserId,
            (SELECT first_name FROM ' . $this->_usersTable . ' WHERE id = ' . $this->_pressReleases . '.SenderUserId LIMIT 0,1) AS FirstName,
            PressReleaseTitle,
            PressReleaseContent,
            PressReleaseKeywords,
            TargetAudience,
            AnnouncementDateLocation,
            Photo,
            RandomCode,
            IF((RandomCode = 1), \'<span class="alert-success">Approved</span>\', \'<span class="alert-info">Not Approved</span>\') AS RandomCode1,
            FROM_UNIXTIME(DesirePublishDate, "%m/%d/%Y") DesirePublishDate,
            FROM_UNIXTIME(SendingDate, "%m/%d/%Y") SendingDate')
            ->from($this->_pressReleases)
            ->add_column('Approved', '<a onclick="ajaxApproveFn($1, \'approvepressrelease/$1\')" href="javascript:void(0)"><i class="fa fa-check fa-fw"></i></a>', 'PressReleaseId')
            ->add_column('Edit', '<a href="' . base_url() . 'press_releases_panel/$1" target="_blank"><i class="fa fa-pencil fa-fw"></i></a>', 'PressReleaseId')
            ->add_column('Delete', '<a href="' . base_url() . 'press_releases_panel/$1"><i class="fa fa-trash-o fa-fw"></i></a>', 'PressReleaseId');

        $q = $this->datatables->generate();
        return $q;
    }

    public function getUpcomingSchedulesTomorrow($diff_days)
    {
        $sql = 'SELECT
                    a.DispositionId,
                    a.CalledBy,
                    a.AddressBookId,
                    (SELECT full_name_en FROM users WHERE id = a.AddressBookId) AS Name,
                    (SELECT phone FROM users WHERE id = a.AddressBookId) AS Phone,
                    a.Interests,
                    a.OtherNotes,
                    FROM_UNIXTIME(a.CallTime, \'%m/%d/%Y\') AS CallDate,
                    FROM_UNIXTIME(a.CallTime, \'%h:%i:%s\') AS CallTime,
                    FROM_UNIXTIME(a.CallTime, \'%m/%d/%Y %h:%i:%s\') AS AddedDate,
                    a.NCD
                FROM (SELECT *, FROM_UNIXTIME(NextCallDate, \'%Y-%m-%d\') AS NCD FROM callhistory) AS a
                WHERE a.NCD BETWEEN CURDATE() AND DATE_ADD(CURDATE(), INTERVAL ' . $diff_days . ' DAY) ORDER BY NextCallDate ASC';

        $result = $this->db->query($sql);
        $rows = $result->result_object();
        //ob_clean();
        //echo $this->db->last_query();
        return $rows;
    }

    public function getUpcomingSchedulesNextWeek($diff_days)
    {
        $sql = 'SELECT
                    a.DispositionId,
                    a.CalledBy,
                    a.AddressBookId,
                    (SELECT full_name_en FROM users WHERE id = a.AddressBookId) AS Name,
                    (SELECT phone FROM users WHERE id = a.AddressBookId) AS Phone,
                    a.Interests,
                    a.OtherNotes,
                    FROM_UNIXTIME(a.NextCallDate, \'%m/%d/%Y\') AS CallDate,
                    FROM_UNIXTIME(a.CallTime, \'%h:%i:%s\') AS CallTime,
                    FROM_UNIXTIME(a.CallTime, \'%m/%d/%Y %h:%i:%s\') AS AddedDate,
                    a.NCD
                FROM (SELECT *, FROM_UNIXTIME(NextCallDate, \'%Y-%m-%d\') AS NCD FROM callhistory) AS a
                WHERE a.NCD BETWEEN DATE_ADD(CURDATE(), INTERVAL ' . $diff_days . ' DAY) AND DATE_ADD(DATE_ADD(CURDATE(), INTERVAL ' . $diff_days . ' DAY), INTERVAL ' . $diff_days . ' DAY) ORDER BY NextCallDate ASC';

        $result = $this->db->query($sql);
        $rows = $result->result_object();
        //ob_clean();
        //echo $this->db->last_query();
        return $rows;
    }

    public function getPressReleaseById($id)
    {
        $this->db->select('*')
            ->from($this->common_model->_pressReleases)
            ->where(array('PressReleaseId' => $id));
        $result = $this->db->get();
        $row = $result->result_array();
        return $row;
    }

    public function approvePressRelease($data, $where)
    {
        $data = $this->updateRecords($this->common_model->_pressReleases, $data, $where);
        return $data;
    }

    public function isConnected($moduleid, $userid)
    {
        $this->db->select('ModulesId, SingleItemId, SenderId')
            ->from($this->_contacts)
            ->where(array('ModulesId' => $moduleid, 'SenderId' => $userid));
        $result = $this->db->get();
        $row = $result->result_array();
        return $row;
    }

    public function isReceiverApproved($moduleid, $rid, $userid)
    {
        $this->db->select('ModulesId, ReceiverId, SingleItemId, SenderId, isApproved')
            ->from($this->_contacts)
            ->where(array('ModulesId' => $moduleid, 'ReceiverId' => $rid, 'SenderId' => $userid));
        $result = $this->db->get();
        $row = $result->result_array();
        return $row;
    }

    public function getAllMessage($id)
    {
        $this->db->select('*')
            ->from($this->_messages)
            ->where(array('to' => $id))
            ->order_by('time', 'DESC');
        $result = $this->db->get();
        $row = $result->result_array();
        return $row;

        if ($this->isRecordsExists($this->_messages, $where)) {
            return $rows;
        }
    }
    public function getStoredHybridSession($user_id, $provider = NULL) {
    	$this->db->select ( '*' )->from ( $this->common_model->_uConnections )->where ( 'user_id', $user_id )->where ( 'provider', $provider );
    
    	$result = $this->db->get ();
    	$rows = $result->result_array ();
    	return $rows;
    }
    public function getStoredHybridSessionTotal($user_id, $provider = NULL) {
    	$this->db->select ( 'COUNT(*) AS TotalAccounts' )->from ( $this->common_model->_uConnections )->where ( 'user_id', $user_id )->where ( 'provider', $provider );
    
    	$result = $this->db->get ();
    	$rows = $result->result_array ();
    	return $rows;
    }
    public function deleteStoredHybridSession($user_id, $provider = NULL) {
    	$this->db->where ( "user_id", $user_id );
    	$this->db->where ( "provider", $provider );
    	return $this->db->delete ( $this->common_model->_uConnections );
    }
    public function checkFacebookUser($id) {
    	$this->db->select ( 'OauthUid' )->from ( $this->common_model->_uSocialMedia )->where ( array (
    			'UserId' => $id,
    			'OauthProvider' => 'facebook'
    	) );
    	$this->db->limit ( 1 );
    	$result = $this->db->get ();
    	$rows = $result->result_array ();
    	return $rows;
    }
    public function getFacebookInformation($id) {
    	$this->db->select ( '*' )->from ( $this->common_model->_uSocialMedia )->where ( array (
    			'UserId' => $id,
    			'OauthProvider' => 'facebook'
    	) );
    	$this->db->limit ( 1 );
    	$result = $this->db->get ();
    	$rows = $result->result_array ();
    	return $rows;
    }
    
    

    public function insertContacts($data)
    {
        $data = $this->insertRecords($this->common_model->_contacts, $data);
        return $data;
    }

    public function insertCallHistory($data)
    {
        $data = $this->insertRecords($this->common_model->_callHistory, $data);
        return $data;
    }

    public function insertMessage($data)
    {
        $data = $this->insertRecords($this->common_model->_messages, $data);
        return $data;
    }

    public function insertContactsConnectivity($data)
    {
        $data = $this->insertRecords($this->common_model->_contactsConnectivity, $data);
        return $data;
    }

    public function insertPosts($data)
    {
        $data = $this->insertRecords($this->common_model->_usersPosts, $data);
        return $data;
    }

    //Dashboard Report Query

    /***  create view yearly report by start date to end date  ***/
    public function get_all_report_by_date($start_date, $end_date)
    {

            $result = $this->db->select('ecommerce_order_master.*, sum(ecommerce_order_details.price) as price', FALSE)
            ->from('ecommerce_order_master')
            ->join('ecommerce_order_details', 'ecommerce_order_master.id = ecommerce_order_details.master_id', 'left')
            ->where('ecommerce_order_master.order_time >=', $start_date)
            ->where('ecommerce_order_master.order_time <=', $end_date.' '.'23:59:59')
            ->where('ecommerce_order_master.param REGEXP \'"status":1\'')
            ->get()
            ->result();

        return $result;

    }

    public function get_today_sales()
    {
        $today = date("Y-m-d");
        $result = $this->db->select('ecommerce_order_master.*, sum(ecommerce_order_details.price) as price', FALSE)
            ->from('ecommerce_order_master')
            ->join('ecommerce_order_details', 'ecommerce_order_master.id = ecommerce_order_details.master_id', 'left')
            ->where('ecommerce_order_master.order_time >=', $today)
            ->where('ecommerce_order_master.order_time <=', $today.' '.'23:59:59')
            ->where('ecommerce_order_master.param REGEXP \'"status":1\'')
            ->get()
            ->result();


        return $result;
    }

    public function get_weekly_sales()
    {
        $week_start_date = date('Y-m-d',strtotime("last Saturday"));
        $week_end_date = date('Y-m-d 23:59:59',strtotime("next Saturday"));

        $result = $this->db->select('ecommerce_order_master.*, sum(ecommerce_order_details.price) as price', FALSE)
            ->from('ecommerce_order_master')
            ->join('ecommerce_order_details', 'ecommerce_order_master.id = ecommerce_order_details.master_id', 'left')
            ->where('ecommerce_order_master.order_time >=', $week_start_date)
            ->where('ecommerce_order_master.order_time <=', $week_end_date.' '.'23:59:59')
            ->where('ecommerce_order_master.param REGEXP \'"status":1\'')
            ->get()
            ->result();

        return $result;

    }

    public function get_monthly_sales()
    {
        $first_day_this_month = date('Y-m-01');
        $last_day_this_month  = date('Y-m-t');

        $result = $this->db->select('ecommerce_order_master.*, sum(ecommerce_order_details.price) as price', FALSE)
            ->from('ecommerce_order_master')
            ->join('ecommerce_order_details', 'ecommerce_order_master.id = ecommerce_order_details.master_id', 'left')
            ->where('ecommerce_order_master.order_time >=', $first_day_this_month)
            ->where('ecommerce_order_master.order_time <=', $last_day_this_month.' '.'23:59:59')
                ->where('ecommerce_order_master.param REGEXP \'"status":1\'')
            ->get()
            ->result();

        return $result;

    }

    public function get_yearly_sales()
    {
        $first_day_this_year = date('Y-01-01');
        $last_day_this_year  = date('Y-01-31');

        $result = $this->db->select('ecommerce_order_master.*, sum(ecommerce_order_details.price) as price', FALSE)
            ->from('ecommerce_order_master')
            ->join('ecommerce_order_details', 'ecommerce_order_master.id = ecommerce_order_details.master_id', 'left')
            ->where('ecommerce_order_master.order_time >=', $first_day_this_year)
            ->where('ecommerce_order_master.order_time <=', $last_day_this_year.' '.'23:59:59')
            ->where('ecommerce_order_master.param REGEXP \'"status":1\'')
            ->get()
            ->result();

        return $result;
    }

    public function get_order_by_date()
    {
        $first_day_this_year = date('Y-01-01');
        $last_day_this_year  = date('Y-12-31');

        $result = $this->db->select('*')
            ->from('ecommerce_order_master')
            ->where('order_time >=', $first_day_this_year)
            ->where('order_time <=', $last_day_this_year.' '.'23:59:59')
            ->where('param REGEXP \'"status":1\'')
            ->get()
            ->result();

        return $result;
    }

    public function get_top_selling_product($order_id){

        $result = $this->db->select('ecommerce_order_details.product_name, ecommerce_order_details.product_id ,SUM(ecommerce_order_details.qty) AS total_qty, products.sku , products.pre_sku', FALSE)
            ->from('ecommerce_order_details')
            ->join('products', 'ecommerce_order_details.product_id = products.id', 'left')
            ->where_in('master_id', $order_id)
            ->group_by(array("product_id"))
            ->order_by("total_qty", "desc")->limit(5)
            ->get()
            ->result();

        return $result;
    }

//    public function get_top_selling_product($order_id){
//
//        $result = $this->db->select('ecommerce_order_details.product_name, ecommerce_order_details.product_id , ecommerce_order_details.qty, products.sku', FALSE)
//            ->from('ecommerce_order_details')
//            ->join('products', 'ecommerce_order_details.product_id = products.id', 'left')
//            ->where_in('master_id', $order_id)
////            ->group_by(array("product_id"))
////            ->order_by("total_qty", "desc")->limit(10)
//            ->get()
//            ->result();
//
//        return $result;
//    }

}