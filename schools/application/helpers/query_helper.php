<?php

/**************************************************
 * Database table constant location config/Constant.php
 ***************************************************/
/**
 * @query_helper::insertRow()
 * @access:public
 * @Author: Tritiyo Limited
 * @params:$table
 * @params:$records
 */
 function globalInstance()
 {
     $CI =& get_instance();
     return $CI;
 }


function insertRow($table, $records)
{
    $sql = globalInstance()->db->insert($table, $records);

    return ($sql) ? true : false;
}

function getRecords($table, $where = null)
{
    if (!empty($where)) {
        $sql = globalInstance()->db->get_where($table, $where);

        //echo globalInstance()->db->last_query(); die();
    }else {
        $sql = globalInstance()->db->get($table);
}
    if ($sql->num_rows() > 0) {
        return $sql->result();
    } else

        return false;
}

function updateRow($table, $data, $where)
{
    $sql = globalInstance()->db->update($table, $data, $where);
    return ($sql) ? 1 : 0;
}

function getRecord($table, $where = null)
{
    if (!empty($where)) {
        $sql = globalInstance()->db->get_where($table, $where);
        //$sql = globalInstance()->db->get($table);
    } else {
        $sql = globalInstance()->db->get($table);
    }

    if ($sql->num_rows() > 0) {
        return $sql->row();
    } else
        return false;
}


?>
