<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Class Profile_model
 *
 */
class Product_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function save($product, Array $product_category_ids = array(), Array $product_img_ids = array()) {

        if (isset($product['id']) && $product['id'] == 'none') {
            unset($product['id']);
            return $this->_insert($product, $product_category_ids, $product_img_ids);
        } else {
            $this->_update($product, $product_category_ids, $product_img_ids);
        }
    }


    public function savesofa($product, Array $product_category_ids = array(), Array $product_img_ids = array()) {
            return $this->_insert($product, $product_category_ids, $product_img_ids);

    }




    private function _insert($product, Array $product_category_ids = array(), Array $product_img_ids = array()) {
        $this->db->insert('products', $product);
        $product_id = $this->db->insert_id();
        $this->_insert_product_category($product_id, $product_category_ids);
        $this->_insert_product_images($product_id, $product_img_ids);
        return $product_id;
    }

    private function _update($product, Array $product_category_ids = array(), Array $product_img_ids = array()) {
        $product_id = $product['id'];
        if ($this->db->update('products', $product, "`id`='{$product_id}'")) {
            $this->_remove_product_relation($product['id']);
            $this->_insert_product_category($product_id, $product_category_ids);
            $this->_insert_product_images($product_id, $product_img_ids);
            return TRUE;
        }
        return FALSE;
    }

    private function _insert_product_category($product_id = NULL, Array $product_category_ids = array()) {
        foreach ($product_category_ids as $category_id) {
            $relation[] = array(
                'id' => NULL,
                'relation_type' => 2,
                'relation_key' => $product_id,
                'relation_value' => $category_id,
                'relation_description' => 'Product Vs Categories, Relation Type 2.relation_key = Product id and relation value = Cateogro id'
            );
        }
        $this->db->insert_batch('relation', $relation);
    }

    private function _insert_product_images($product_id = NULL, Array $product_image_ids = array()) {
        foreach ($product_image_ids as $media_id) {
            $relation[] = array(
                'id' => NULL,
                'relation_type' => 3,
                'relation_key' => $product_id,
                'relation_value' => $media_id,
                'relation_description' => 'Product Vs Media, Relation Type 3.relation_key = Product id and relation value = Media id'
            );
        }
        $this->db->insert_batch('relation', $relation);
    }

    private function _remove_product_relation($product_id, $relation_rtype = FALSE) {
        if ($relation_rtype) {
            $this->db->where('relation_type', $relation_rtype);
        }
        $this->db->where('relation_key', $product_id);
        $this->db->delete('relation');
    }

    public function get_product($product_id) {
        $sql = "SELECT id,name,userid,sku,code,price,description,material,color,dimension,delivery_area,delivery_charge,delivery_time,stock_status,product_image_id ,discount,stricky ," .
                "CONCAT(CONCAT(upload_dir,'/',idno), '.', extension) AS product_image " .
                "FROM products LEFT JOIN media_file ON products.product_image_id = media_file.idno " .
                "WHERE id = '{$product_id}';";

        return $this->db->query($sql)->row_array();
    }

    public function get_product_frontend($product_id) {
        $sql = "SELECT id,name,userid,sku,code,price,description,material,color,dimension,delivery_area,delivery_charge,delivery_time,stock_status,product_image_id ,discount,stricky ," .
            "CONCAT(CONCAT(upload_dir,'/',idno), '.', extension) AS product_image " .
            "FROM products LEFT JOIN media_file ON products.product_image_id = media_file.idno " .
            "WHERE id = '{$product_id}';";

        return $this->db->query($sql)->row_array();
    }


    public function get_product_sofa($product_id) {
        $sql = "SELECT id,name,userid,pre_product,pre_sku,sku,fabrics,categorization,code,price,description,material,color,dimension,delivery_area,delivery_charge,delivery_time,stock_status,product_image_id ,discount,stricky ," .
            "CONCAT(CONCAT(upload_dir,'/',idno), '.', extension) AS product_image " .
            "FROM products LEFT JOIN media_file ON products.product_image_id = media_file.idno " .
            "WHERE id = '{$product_id}';";

        return $this->db->query($sql)->row_array();
    }


    public function get_stricky_product($limit=4)
    {
       return $this->db->select('*')
                 ->from('products')
                 ->where('stricky',1)
                 ->order_by('updated','desc')
                ->limit($limit)
                ->get()
               ->result_array();
    }

    public function get_products_dashboard(Array $options = array(), $with_total = false) {
        // . ((!empty($options->categorization)) ? " AND products.categorization = {$options->categorization}" : '' )
        // . ((!empty($options->categorization)) ? " AND products.categorization = {$options->categorization}" : '' )
        $default = array(
            'cat_id' => NULL,
            // 'categorization' => NULL,
            'search_key' => '',
            'offset' => 0,
            'limit' => 12,
            'max_price' => 0,
            'min_price' => 0
        );


        $options = (object) array_merge($default, $options);

        if ($options->min_price >= $options->max_price) {
            unset($options->max_price);
            unset($options->min_price);
        } else {
            if ($options->max_price <= 0) {
                unset($options->max_price);
            }

            if ($options->min_price <= 0) {
                unset($options->min_price);
            }
        }
        if (isset($options->page_no))
            $options->offset = (($options->page_no - 1) * $options->limit);
        $options->offset = $options->offset < 0 ? 0 : $options->offset;


        $sql = "SELECT id,name,userid,sku,code,price,description,material,color,dimension,delivery_area,delivery_charge,delivery_time,stock_status,product_image_id ,discount,"
            . " CONCAT(CONCAT(upload_dir,'/',idno), '.', extension) AS product_image "
            . " FROM products LEFT JOIN media_file ON products.product_image_id = media_file.idno "
            . " WHERE ( name LIKE  '%{$options->search_key}%' "
            . " OR sku  LIKE '%{$options->search_key}%' "
            . " OR code LIKE '%{$options->search_key}%' ) "
            . (isset($options->max_price) ? " && price <= {$options->max_price} " : '')
            . (isset($options->min_price) ? " && price >= {$options->min_price} " : '')
            . ( (is_array($options->cat_id)) ?
                (($options->cat_id) ? " && id IN ( SELECT relation_key as productid FROM relation WHERE relation_type = 2 && relation_value IN (" . join(',', $options->cat_id) . ") " : ' ' ) . ') ' :
                (($options->cat_id) ? " && id IN ( SELECT relation_key as productid FROM relation WHERE relation_type = 2 && relation_value = '{$options->cat_id}') " : ' ' )
            )
            

            . ((!empty($options->order_field)) ? " ORDER BY $options->order_field $options->order_type" : '' )
            . " LIMIT  {$options->offset},{$options->limit};";
        $products['items'] = $this->db->query($sql)->result_array();
        //echo $this->db->last_query();


        if ($with_total) {
            $sql = "SELECT count(id) as total"
                . " FROM products LEFT JOIN media_file ON products.product_image_id = media_file.idno "
                . " WHERE name LIKE  '%{$options->search_key}%' "
                . (isset($options->max_price) ? " && price <= {$options->max_price} " : '')
                . (isset($options->min_price) ? " && price >= {$options->min_price} " : '')
                
                . (($options->cat_id) ? " && id IN ( SELECT relation_key as productid FROM relation WHERE relation_type = 2 && relation_value = '{$options->cat_id}') " : ' ' );

            $products['total'] = $this->db->query($sql)->row_object()->total;

            return $products;
        }
        //echo $this->db->last_query();
        return $products['items'];
    }

    public function get_products(Array $options = array(), $with_total = false) {
        $default = array(
            'cat_id' => NULL,
            // 'categorization' => NULL,
            'search_key' => '',
            'offset' => 0,
            'limit' => 12,
            'max_price' => 0,
            'min_price' => 0   
        );
    
        $options = (object) array_merge($default, $options);

        if ($options->min_price >= $options->max_price) {
            unset($options->max_price);
            unset($options->min_price);
        } else {
            if ($options->max_price <= 0) {
                unset($options->max_price);
            }

            if ($options->min_price <= 0) {
                unset($options->min_price);
            }
        }
        if (isset($options->page_no))
            $options->offset = (($options->page_no - 1) * $options->limit);
        $options->offset = $options->offset < 0 ? 0 : $options->offset;

        $sql = "SELECT id,name,userid,sku,code,price,description,material,color,dimension,delivery_area,delivery_charge,delivery_time,stock_status,product_image_id ,discount,"
                . " CONCAT(CONCAT(upload_dir,'/',idno), '.', extension) AS product_image "
                . " FROM products LEFT JOIN media_file ON products.product_image_id = media_file.idno "
                . " WHERE ( name LIKE  '%{$options->search_key}%' "
                . " OR sku  LIKE '%{$options->search_key}%' "
                . " OR code LIKE '%{$options->search_key}%' ) "
                . (isset($options->max_price) ? " && price <= {$options->max_price} " : '')
                . (isset($options->min_price) ? " && price >= {$options->min_price} " : '')
                . ( (is_array($options->cat_id)) ?
                        (($options->cat_id) ? " && id IN ( SELECT relation_key as productid FROM relation WHERE relation_type = 2 && relation_value IN (" . join(',', $options->cat_id) . ") " : ' ' ) . ') ' :
                        (($options->cat_id) ? " && id IN ( SELECT relation_key as productid FROM relation WHERE relation_type = 2 && relation_value = '{$options->cat_id}') " : ' ' )
                )
            . " AND products.sku != ''"
            

                . ((!empty($options->order_field)) ? " ORDER BY $options->order_field $options->order_type" : '' )
                . " LIMIT  {$options->offset},{$options->limit};";
         $products['items'] = $this->db->query($sql)->result_array();
         //echo $this->db->last_query();


        if ($with_total) {
            $sql = "SELECT count(id) as total"
                    . " FROM products LEFT JOIN media_file ON products.product_image_id = media_file.idno "
                    . " WHERE name LIKE  '%{$options->search_key}%' "
                    . (isset($options->max_price) ? " && price <= {$options->max_price} " : '')
                    . (isset($options->min_price) ? " && price >= {$options->min_price} " : '')
                . " AND products.sku != ''"
                
                    . (($options->cat_id) ? " && id IN ( SELECT relation_key as productid FROM relation WHERE relation_type = 2 && relation_value = '{$options->cat_id}') " : ' ' );

            $products['total'] = $this->db->query($sql)->row_object()->total;

            return $products;
        }
        //echo $this->db->last_query();
        return $products['items'];
    }

    public function get_product_categories($product_id) {
        $product_id = (int) $product_id;
        $this->db->where("id IN ( SELECT relation_value FROM `relation` WHERE `relation_type` = 2 && `relation_key` = '{$product_id}')", NULL, FALSE);
        return $this->db->get('term')->result_array();
    }

    public function get_product_imgs($product_id) {
        $product_id = (int) $product_id;
        $this->db->select("idno, extension,file_name, CONCAT(CONCAT(upload_dir,'/',idno), '.', extension) AS url");
        $this->db->where("idno IN ( SELECT relation_value FROM `relation` WHERE `relation_type` = 3 && `relation_key` = '{$product_id}')", NULL, FALSE);
        return $this->db->get('media_file')->result_array();
    }

    public function delete($id) {
        $this->db->delete('relation', " relation_key ={$id} ");
        return $this->db->delete('products', " id ={$id} ") ? 1 : 0;
    }

    // public function delete($id) {
    //     return $this->db->delete('products', " id ={$id} ") ? 1 : 0;
    // }

}
