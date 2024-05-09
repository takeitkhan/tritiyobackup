<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @property Profile_model $profile_model Profile Model
 * @property Common_model $common_model Common Model
 * @property Settings_model $settings_model Settings Model
 * @property Ion_auth $ion_auth ion_auth
 * @property panel_model $panel_model panel model
 * @property admin_model $admin_model panel model
 * @property Order_model $Order_model Order model
 */
class Order_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function place_order_params($records)
    {
        $sql = $this->db->insert('temporary_order_details', $records);
        return ($sql) ? $this->db->insert_id() : false;
    }

    public function place_order(Array $order_master, Array $order_detail_items = array())
    {
        $secret_key = random_string('sha1', 32);
        $order_master['secret_key'] = $secret_key;

        $this->db->insert('ecommerce_order_master', $order_master);
        $order_id = $this->db->insert_id();
        $this->db->update('ecommerce_order_master', array('order_id' => $order_id), " id = {$order_id} ", 1);
        foreach ($order_detail_items as $item) {
            $order_details[] = array(
                'id' => NULL,
                'master_id' => $order_id,
                'product_id' => $item['id'],
                'product_name' => $item['name'],
                'product_code' => $item['code'],
                'qty' => $item['qty'],
                'price' => $item['price'],
                'delivery_charge' => $item['delivery_charge'],
                'discount' => $item['discount'],
                'image' => $item['img'],
                'regular_price' => $item['regular_price']
            );
        }
        $this->db->insert_batch('ecommerce_order_details', $order_details);

        return array($order_id, $secret_key);
    }

    public function get_order($order_id, $secret_key = FALSE)
    {
        $this->db->where('order_id', $order_id);
        if ($secret_key == TRUE) {
            $this->db->where('secret_key', $secret_key);
        }
        if ($master = $this->db->get('ecommerce_order_master')->row_array()) {

            $details = $this->db->select('ecommerce_order_details.*, products.sku , products.pre_sku ')
                ->from('ecommerce_order_details')
                ->join('products', 'products.id = ecommerce_order_details.product_id', 'left')
                ->where('ecommerce_order_details.master_id', $master['id'])
                ->get()
                ->result_array();

            return array(
                'master' => $master,
                'details' => $details
            );
        }
        return FALSE;
    }

    public function get_order_pp($order_id)
    {
        $this->db->where('payment_parameter', $order_id);
        if ($master = $this->db->get('ecommerce_order_master')->row_array()) {
            $sql = "SELECT *, image as media_url FROM ecommerce_order_details WHERE master_id = {$master['id']}";
            $result = $this->db->query($sql);
            $details = $result->result_array();
            return array(
                'master' => $master,
                'details' => $details
            );
        }
        return FALSE;
    }

    function order_list($limit, $offset, $search, $prm)
    {


        $this->db->select('ecommerce_order_master.*, sum(ecommerce_order_details.price * ecommerce_order_details.qty) as total, sum(ecommerce_order_details.qty) as qty', false)
            ->from('ecommerce_order_master')
            ->join('ecommerce_order_details', ' ecommerce_order_details.master_id = ecommerce_order_master.id', 'left');




        if($prm == 'cash_on_delivery') {
            $this->db->where('payment_method_name', 'Cash on delivery');
        } else {
            if ($prm != 'all')
                $this->db->where('order_status', $prm);
        }






        if (!empty($search['startdate'])) {

            $this->db->where('ecommerce_order_master.order_time >=', $search['startdate']);
            $this->db->where('ecommerce_order_master.order_time <=', $search['enddate'] . ' ' . '23:59:59');

            $this->db->group_start();
            $this->db->like('ecommerce_order_master.order_id', $search['keyword']);
            $this->db->or_like('ecommerce_order_master.customer_name', $search['keyword']);
            $this->db->or_like('ecommerce_order_master.contuct_number', $search['keyword']);
            $this->db->or_like('ecommerce_order_master.alternative_mobile', $search['keyword']);
            $this->db->or_like('ecommerce_order_master.email_address', $search['keyword']);
            $this->db->group_end();
        }

        $this->db->group_by(' ecommerce_order_master.id')->order_by('ecommerce_order_master.id', 'desc');

       // $query = $this->db->get();
        $this->db->limit(200);
        $query = $this->db->get();
        $row = $query->result_array();
        //echo $this->db->last_query();

        // ->limit($limit, $offset)
//        echo '<pre>';
//        print_r($row);
//        exit();

//

        return $row;


    }

    public function get_orders(Array $options = array())
    {
        $default = [
            'order_status' => null,
            'search_key' => '',
            'offset' => 0,
            'from_date' => null,
            'to_date' => null,
            'user_id' => null
        ];

        $options = array_merge($default, array_filter($options));

        $sql = "SELECT * FROM `ecommerce_order_master` "
            . "INNER JOIN ( SELECT SUM(price*qty) AS total, `product_code`, `price`, `qty`, `master_id`, SUM(regular_price) AS reg_total FROM `ecommerce_order_details` GROUP BY master_id ) AS details "
            . " WHERE ecommerce_order_master.id = details.master_id "
            . " AND ("
            . " ecommerce_order_master.id = '{$options['search_key']}' OR "
            . " ecommerce_order_master.customer_name LIKE '%{$options['search_key']}%' OR "
            . " ecommerce_order_master.contuct_number LIKE '%{$options['search_key']}%' OR "
            . " ecommerce_order_master.order_id = '%{$options['search_key']}%' "
            . ") "
            . ($options['order_status'] ? " AND order_status = '{$options['order_status']}' " : '')
            . ($options['user_id'] ? " AND user_id = '{$options['user_id']}' " : '')
            . ($options['from_date'] && $options['to_date'] ? " AND DATE(`order_time`) BETWEEN '{$options['from_date']}' AND '{$options['to_date']}' " : '')
            . " GROUP BY order_id ORDER BY order_id DESC "
            . " LIMIT {$options['offset']},200; ";


        $x = $this->db->query($sql);
//        ob_clean();
        //owndebugger($this->db->last_query());
        return $x->result_array();
    }

    /**
     * move_to
     *
     * @param mixed group(s) to check
     * @param bool user id
     * @param bool check if all groups is present, or any of the groups
     *
     * @return bool
     * @author Phil Sturgeon
     **/

    public function move_to($order_id, $type)
    {
        return $this->db->set('order_status', $type)
            ->where('id', $order_id)
            ->update('ecommerce_order_master');
    }

    public function temporary_orders($param)
    {
        $default = array(
            'search_key' => null,
            'limit' => 100,
            'offset' => 0
        );
        $options = (object)array_merge($default, array_filter($param));

        $this->db->select('*');
        $this->db->from('temporary_order_details');
        $this->db->order_by('tmp_id', 'DESC');
        $this->db->limit($options->limit, $options->offset);
        return $this->db->get()->result_array();
    }


//    public function query_runner()
//    {
//        error_reporting(0);
//        $xs = $this->db->get("products")->result();
//        foreach ($xs as $x) {
//            $sku = explode('-', $x->sku);
//            $s = $sku[1];
//            if ($s) {
//                if ($s > 99 && $s < 200) {
//                    $categorization = 1;
//                } else if ($s > 199 && $s < 300) {
//                    $categorization = 2;
//                } else if ($s > 299 && $s < 400) {
//                    $categorization = 3;
//                } else {
//                    $categorization = 0;
//                }
//                $this->db->update('products', ['categorization' => $categorization], ['id' => $x->id]);
//            }
//
//            $sku2 = explode(' ', $x->sku);
//            $s2 = $sku2[1];
//            if ($s2) {
//                if ($s2 > 99 && $s2 < 200) {
//                    $categorization1 = 1;
//                } else if ($s2 > 199 && $s2 < 300) {
//                    $categorization1 = 2;
//                } else if ($s2 > 299 && $s2 < 400) {
//                    $categorization = 3;
//                } else {
//                    $categorization = 0;
//                }
//                $this->db->update('products', ['categorization' => $categorization1], ['id' => $x->id]);
//            }
//        }
//
//        $xs2 = $this->db->get("products")->result();
//        foreach ($xs2 as $s) {
//            echo $s->sku . '    ' . $s->categorization . '<br />';
//        }
//    }

    public function query_runner()
    {

//        $x1 = $this->db->query("ALTER TABLE `products` RENAME `sku` TO `skuold`");
//        $x2 = $this->db->query("ALTER TABLE `products` RENAME `code` TO `codeold`");


        $x1 = $this->db->query("ALTER TABLE `products` CHANGE `sku` `skuold` VARCHAR(255)");
        $x2 = $this->db->query("ALTER TABLE `products` CHANGE `code` `codeold` VARCHAR(255)");

        $x3 = $this->db->query("ALTER TABLE `products` CHANGE `sku1` `sku` VARCHAR(255)");
        $x4 = $this->db->query("ALTER TABLE `products` CHANGE `code1` `code` VARCHAR(255)");


//        $x = $this->db->query("ALTER TABLE `products`
//	RENAME COLUMN `code` TO  `codeold`");

//        $x = $this->db->query("ALTER TABLE `products`
//	RENAME COLUMN `sku1` TO  `sku`");
//
//        $x = $this->db->query("ALTER TABLE `products`
//	RENAME COLUMN `code1` TO  `code`");

        $x = $this->db->query("SELECT * FROM `products` order by id desc");
        return $x->result_array();
        die();


//                $x = $this->db->query("ALTER TABLE `products`
//	ADD COLUMN `sku1` VARCHAR (255) NULL AFTER `sku`");
//
//
//        $x = $this->db->query("ALTER TABLE `products`
//	ADD COLUMN `code1` VARCHAR (255) NULL AFTER `code`");
//
//
//        $x = $this->db->query("ALTER TABLE `products`
//	ADD COLUMN `sku2` VARCHAR (255) NULL AFTER `sku1`");
//
//        $x = $this->db->query("ALTER TABLE `products`
//	ADD COLUMN `code2` VARCHAR (255) NULL AFTER `code1`");
//
//
//        $x = $this->db->query("update `products`
//set `sku1` = `sku`");
//
//        $x = $this->db->query("update `products`
//set `code1` = `code`");
//
//        $x = $this->db->query("update `products`
//set `sku2` = `sku`");
//
//        $x = $this->db->query("update `products`
//set `code2` = `code`");






//        $x = $this->db->query("INSERT INTO `products` (`userid`, `SKU`, `pre_sku`, `pre_product`, `categorization`, `name`, `code`,
// `price`, `discount`, `material`, `color`, `dimension`, `delivery_area`, `delivery_charge`, `delivery_time
//`, `fabrics`, `stricky`, `stock_status`, `description`, `product_image_id`) VALUES ('1357', '', 'SSC-099-2-1-44'
//, '549', '1', 'Demo3', '100001', '3', '50', 'Wood', 'Black', 'N/A', 'Mirpur', '10', '12 hours', '5',
// '0', '1', '<p>TEST Product</p>', '1754')");
//
//        echo $x;



//        $x = $this->db->query("ALTER TABLE `posts`
//	ADD COLUMN `ConnectionLink` VARCHAR (255) NULL AFTER `Title`");


        $html = '';
//        $res = mysqli_query('DESCRIBE country');
//        while($row = mysqli_fetch_array($res)) {
//            echo "{$row['Field']} - {$row['Type']}\n";
//        }

//        $qs = $this->db->query("SHOW COLUMNS FROM products")->result();
//        foreach($qs as $q) {
//            $html .= $q->Field .'&nbsp&nbsp&nbsp&nbsp'. $q->Type .'&nbsp&nbsp&nbsp&nbsp'. $q->Null;
//            $html .= '<br />';
//        }
//
//        echo $html;

        //$query = $this->db->list_tables();
        //$s = $query->execute();
        //owndebugger($query);

//        while($rows = $query->fetch(PDO::FETCH_ASSOC)){
//            var_dump($rows);
//        }


        //$x = $this->db->list_tables();
        //$x = $this->db->query("SELECT * FROM users LIMIT 0,1");
//        $this->db->query("SELECT * FROM groups");

//      $this->db->query("ALTER TABLE `products` ADD COLUMN `stock_status` INT NULL DEFAULT '1' AFTER `delivery_time`");                
//      $this->db->query("ALTER TABLE `temporary_order_details`
//	ADD COLUMN `user_details` LONGTEXT NOT NULL AFTER `user_id`,
//	ADD COLUMN `payment_details` LONGTEXT NOT NULL AFTER `user_details`,
//	ADD COLUMN `items_details` LONGTEXT NOT NULL AFTER `payment_details`,
//	CHANGE COLUMN `btn_paynow` `btn_paynow` LONGTEXT NOT NULL AFTER `items_details`,
//	CHANGE COLUMN `success_params` `success_params` LONGTEXT NOT NULL AFTER `btn_paynow`;
//");                
//        $x = $this->db->query("CREATE TABLE `temporary_order_details` (
//	`tmp_id` INT NOT NULL AUTO_INCREMENT,
//	`user_id` INT NOT NULL,
//	`btn_paynow` TEXT NOT NULL,
//	`success_params` TEXT NOT NULL,
//	`inserted_time` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
//	PRIMARY KEY (`tmp_id`)
//)
//COLLATE='latin1_swedish_ci'
//ENGINE=InnoDB");                
//        $x = $this->db->query("ALTER TABLE `temporary_order_details` CHANGE COLUMN `success_params` `success_params` LONGTEXT NULL AFTER `prepare_params`");
//        $x = $this->db->query("UPDATE `users` SET `password`='$2y$08\$H1aHgAFYdKEUhdk3qHEVmOOfhml9.VhT0rMWU9xrZ8K9DDUnkTUMe' WHERE  `id`=201735714");
//        $x = $this->db->query("UPDATE `users` SET `active`=1 WHERE  `id`=201735714");
//        $x = $this->db->query("UPDATE `ecommerce_order_master` SET `param`='{\"status\": 2}' WHERE  `id`=102");
//        $x = $this->db->query("DELETE FROM `ecommerce_order_master` WHERE  `id` = 93");
//        $x = $this->db->query("DELETE FROM `ecommerce_order_details` WHERE  `master_id` = 93");
//        $x = $this->db->query("DELETE FROM `ecommerce_order_master` WHERE  `id` BETWEEN 48 and 55");
//        $x = $this->db->query("DELETE FROM `ecommerce_order_details` WHERE  `master_id` BETWEEN 48 and 55");        
//        $x = $this->db->query("SELECT  * FROM ecommerce_order_master ORDER BY id DESC LIMIT 0,50");
//        $x = $this->db->query("TRUNCATE TABLE `districts`");
//        $x = $this->db->query("ALTER TABLE `districts` CHANGE COLUMN `bn_name` `bn_name` VARCHAR(50) NOT NULL COLLATE 'utf8_unicode_ci' AFTER `name`;");          
//        $x = $this->db->query("SELECT * FROM users ORDER BY id DESC LIMIT 0,50");
//        $x = $this->db->query("SELECT * FROM temporary_order_details ORDER BY tmp_id DESC LIMIT 0, 50");
//        return $x->result_array();        
        //$this->db->query("ALTER TABLE `products` CHANGE COLUMN `discount` `discount` INT NOT NULL AFTER `name`;");
//        $this->db->query("ALTER TABLE `products` ALTER `price` DROP DEFAULT");
//        $this->db->query("ALTER TABLE `products` CHANGE COLUMN `price` `price` INT NOT NULL AFTER `code`");
//        $x = $this->db->query("SELECT * FROM users ORDER BY id DESC LIMIT 0, 100");
//        $x = $this->db->query("SELECT * FROM `ecommerce_order_master` INNER JOIN ( SELECT SUM(price) AS total, SUM(regular_price) AS reg_total, master_id FROM `ecommerce_order_details` GROUP BY master_id ) AS details  
//        WHERE ecommerce_order_master.id = details.master_id  AND ( ecommerce_order_master.id = '' OR  ecommerce_order_master.customer_name LIKE '%%' OR  
//        ecommerce_order_master.contuct_number LIKE '%%' OR  ecommerce_order_master.order_id = '%%' )  GROUP BY order_id ORDER BY order_id DESC  LIMIT 0,20;");
//        $x = $this->db->query("SELECT * FROM `ecommerce_order_master` INNER JOIN (SELECT SUM(price) AS total, master_id FROM `ecommerce_order_details` GROUP BY master_id) AS details  
//        WHERE ecommerce_order_master.id = details.master_id  AND ( ecommerce_order_master.id = '' OR  ecommerce_order_master.customer_name LIKE '%%' OR  
//        ecommerce_order_master.contuct_number LIKE '%%' OR  ecommerce_order_master.order_id = '%%' )  GROUP BY order_id ORDER BY order_id DESC  LIMIT 0,20;");
        //echo $this->db->last_query();
//       $x = $this->db->query("SELECT * FROM `ecommerce_order_details` WHERE master_id = 186");
//        $x = $this->db->query("SELECT * FROM `ecommerce_order_master` INNER JOIN ( SELECT SUM(price*qty) AS total, master_id, SUM(regular_price) AS reg_total FROM `ecommerce_order_details` GROUP BY master_id ) AS details  WHERE ecommerce_order_master.id = details.master_id  AND ( ecommerce_order_master.id = '' OR  ecommerce_order_master.customer_name LIKE '%%' OR  ecommerce_order_master.contuct_number LIKE '%%' OR  ecommerce_order_master.order_id = '%%' )  GROUP BY order_id ORDER BY order_id DESC  LIMIT 0,20;");
//        $x = $this->db->query("SELECT * FROM `products` WHERE id = 288");
        //return $x->result_array();
//        die();
    }

}
