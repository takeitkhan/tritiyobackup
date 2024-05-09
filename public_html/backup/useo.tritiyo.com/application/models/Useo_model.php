<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Useo_model extends CI_Model
{
    
    
    function get_counts_useo($db) {
        $sql = 'SELECT * FROM (
        	(SELECT COUNT(*) AS teachers FROM users_groups WHERE group_id = 3) AS teachers,
        	(SELECT COUNT(*) AS students FROM users_groups WHERE group_id = 4) AS students,
        	(SELECT COUNT(*) AS boys FROM users_groups LEFT JOIN u_basicinfos ON users_groups.user_id = u_basicinfos.UserId  WHERE users_groups.group_id = 4 AND u_basicinfos.Gender = 21) AS boys,
        	(SELECT COUNT(*) AS girls FROM users_groups LEFT JOIN u_basicinfos ON users_groups.user_id = u_basicinfos.UserId  WHERE users_groups.group_id = 4 AND u_basicinfos.Gender = 22) AS girls,
        	(SELECT COUNT(*) AS guardians FROM users_groups WHERE group_id = 5) AS guardians,
        	(SELECT COUNT(*) AS staffs FROM users_groups WHERE group_id = 6) AS staffs,
        	(SELECT COUNT(*) AS operators FROM users_groups WHERE group_id = 8) AS operators,
        	(SELECT COUNT(*) AS alumnis FROM users_groups WHERE group_id = 10) AS alumnis,	
        	(SELECT COUNT(*) AS slideshows FROM posts WHERE Category = 46) AS slideshows,
        	(SELECT COUNT(*) AS photos FROM posts WHERE Category = 48) AS photos,
        	(SELECT COUNT(*) AS webpages FROM webpages) AS webpages,
	        (SELECT COUNT(*) AS presents FROM attendance WHERE AttDate = CURDATE()) AS presents
        )';
        
        $query = $db->query($sql);
        if ($query->num_rows() > 0) {
            return $query->result();
        }
    }
    
    function get_admin_info($db) {
        $sql = 'SELECT * FROM settings';
        
        $query = $db->query($sql);
        if ($query->num_rows() > 0) {
            return $query->result();
        }
    }
    
}