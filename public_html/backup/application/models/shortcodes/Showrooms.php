<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Showrooms extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function run($params = array()) {
        $x = new Frontend();
        return $x->showrooms();

        /*

          $str = '<div class="row">
          <div class="col-lg-3 col-md-3 col-sm-12 s_left">
          <div class="shop fix">
          <div class="shop_title fix"><h4>Shop</h4></div>
          <div class="shop_radiobox fix">
          <form action="demo_form.asp" method="get"><input name="vehicle" type="checkbox" value="Bike" /> Regal Showrooms<br />
          <input name="vehicle" type="checkbox" value="Bike" /> Regal with best buy<br />
          <input name="vehicle" type="checkbox" value="Bike" /> Dealer</form>
          </div>
          </div>

          <div class="division fix">
          <div class="divison_title fix"><h4>Division</h4></div>

          <div class="division1 fix">
          <select>
          <option value="volvo">Shylet</option>
          <option value="saab">Khulna</option>
          <option value="vw">Barishal</option>
          <option selected="selected" value="audi">Dhaka</option>
          </select>
          </div>
          </div>

          <div class="District fix">
          <div class="District_title fix"><h4>District</h4></div>

          <div class="division2 fix">
          <select>
          <option value="volvo">Shylet</option>
          <option value="saab">Khulna</option>
          <option value="vw">Barishal</option>
          <option selected="selected" value="audi">Gopalgonj</option>
          </select>
          </div>
          </div>

          <div class="search fix"><a class="btn btn-info" href="#">Search</a></div></div>

          <div class="col-lg-3 co-md-3 col-sm-12">
          <div class="room_right_inner fix">
          <div class="list1 fix">
          <ul>
          <li>1. Orange Traders</li>
          <li>Mokeshdpur, Gopalgonj,Dhaka</li>
          <li>Phone: 326521321</li>
          </ul>
          </div>
          </div>
          </div>

          <div class="col-lg-6 co-md-6 col-sm-12">
          <div class="room_map_inner fix">
          <div id="googleMap" style="width:100%;height:400px;"><iframe height="450" src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d14606.93030142689!2d90.360714!3d23.756914000000002!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sbd!4v1465382795751" style="border:0" width="600"></iframe></div>
          </div>
          </div>
          </div>';
          return $str;
         * 
         * 
         */
    }

    public function getShowrooms($id, $option = NULL) {
        $sql = $this->db->query('SELECT * FROM posts WHERE FIND_IN_SET("' . $id . '", replace(Category, " ", "")) <> 0 ORDER BY PostId DESC');

        //$sql = $this->db->get();
        //owndebugger($sql);
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
?>


