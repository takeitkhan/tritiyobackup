<?php
define('tbl_account_tools','account-tools');
define('tbl_account_types','account-types');
define('tbl_brands','brands');
define('tbl_ci_sessions','ci_sessions');
define('tbl_customers','customers');
define('tbl_districts','districts');
define('tbl_divisions','divisions');
define('tbl_employee_info','employee_info');
define('tbl_groups','groups');
define('tbl_manufacturers','manufacturers');
define('tbl_products','products');
define('tbl_settings','settings');
define('tbl_units','units');
define('tbl_upazilas','upazilas');
define('tbl_users','users');
define('tbl_users_groups','users_groups');
define('tbl_vendors','vendors');


/**
 * @query_helper::insertRow()
 * @access:public
 * @Author: Tritiyo Limited
 * @params:$table
 * @params:$records
 */


function insertRow($table, $records) {
    $sql = globalInstance()->db->insert($table, $records);
    return ($sql) ? true : false;
}

/**
 * @query_helper::updateRow()
 * @access:public
 * @Author: Tritiyo Limited
 * @params:$table
 * @params:$records
 */
function updateRow($table, $data, $where){
    $sql = globalInstance()->db->update($table, $data, $where);
    return ($sql) ? 1 : 0;
}

/**
 * @query_helper::isRowExist()
 * @access:public
 * @Author: Tritiyo Limited
 * @params:$table
 * @params:$records
 */
function isRowExist($table, $where){
    if($where) {
        $sql = globalInstance()->db->get_where($table, $where)->row();
    } else {
        $sql = globalInstance()->db->get($table)->row();
    }

    return ($sql) ? 1 : 0;
}

/**
 * @query_helper::rowCount()
 * @access:public
 * @Author: Tritiyo Limited
 * @params:$table
 * @params:$records
 */
function rowCount($table, $where){
    if($where) {
        $sql = globalInstance()->db->get_where($table, $where);
    } else {
        $sql = globalInstance()->db->get($table);
    }
    $rowcount = $sql->num_rows();
    return $rowcount;
}

/**
 * @query_helper::insertBatch()
 * @access:public
 * @Author: Tritiyo Limited
 * @params:$table
 * @params:$records
 */
function insertBatch($table, $records){
    $sql = globalInstance()->db->insert_batch($table, $records);
    return ($sql) ? true : false;
}

/**
 * @query_helper::updateBatch()
 * @access:public
 * @Author: Tritiyo Limited
 * @params:$table
 * @params:$records
 */

function updateBatch($table, $records, $id){
    $sql = globalInstance()->db->update_batch($table, $records, $id);
    return ($sql) ? true : false;
}

/**
 * @query_helper::lastId()
 * @access:public
 * @Author: Tritiyo Limited
 * @params:$table
 * @params:$records
 */
function lastId(){
    $sql = globalInstance()->db->insert_id();
    return $sql;
}

/**
 * @query_helper::deleteRow()
 * @access:public
 * @Author: Tritiyo Limited
 * @params:$table
 * @params:$records
 */

function deleteRow($table, $where = ''){
    if (empty($where))
        $del = globalInstance()->db->empty_table($table);
    else
        $del = globalInstance()->db->delete($table, $where);
    return ($del) ? 1 : 0;
}

/**
 * @query_helper::getRecords()
 * @access:public
 * @Author: Tritiyo Limited
 * @params:$table
 * @params:$records
 */

function getRecords($table, $where){
    if (!empty($where))
        $sql = globalInstance()->db->get_where($table, $where);
    else
        $sql = globalInstance()->db->get($table);
    if ($sql->num_rows() > 0) {
        return $sql->result();
    } else

    return false;
}
/**
 * @query_helper::getRecord()
 * @access:public
 * @Author: Tritiyo Limited
 * @params:$table
 * @params:$records
 */

function getRecord($table, $where){
    if (!empty($where))
        $sql = globalInstance()->db->get_where($table, $where);
    else
        $sql = globalInstance()->db->get($table);
    if ($sql->num_rows() > 0) {
        return $sql->row();
    } else
        return false;
}
/**
 * @query_helper::getRecordsLimit()
 * @access:public
 * @Author: Tritiyo Limited
 * @params:$table
 * @params:$records
 */
 function getRecordsLimit($table, $limit, $start, $order = 'id', $order_by = 'desc', $where){
     if($limit) {
         globalInstance()->db->limit($limit, $start);
     }

     if($order_by) {
         globalInstance()->db->order_by($order, $order_by);
     }

     if (!empty($where))
         $sql = globalInstance()->db->get_where($table, $where);
     else
         $sql = globalInstance()->db->get($table);
     if ($sql->num_rows() > 0) {
         return $sql->result();
     }
}

/**
 * @query_helper::rowCountLimit()
 * @access:public
 * @Author: Tritiyo Limited
 * @params:$table
 * @params:$records
 */
function rowCountLimit($table, $limit, $start, $order = 'id', $order_by = 'desc', $where){
    if($limit) {
        globalInstance()->db->limit($limit, $start);
    }

    if($order_by) {
        globalInstance()->db->order_by($order, $order_by);
    }

    if($where) {
        $sql = globalInstance()->db->get_where($table, $where);
    } else {
        $sql = globalInstance()->db->get($table);
    }

    $rowcount = $sql->num_rows();
    return $rowcount;
}

?>