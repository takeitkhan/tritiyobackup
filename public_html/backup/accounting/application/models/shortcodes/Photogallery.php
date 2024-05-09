<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class PhotoGallery extends Common_model
{
    function __construct()
    {
        parent::__construct();
    }

    public function run($params = array())
    {

        $cols = isset($params['cols']) ? $params['cols'] : '0';

        $rows = $this->getAllPostsByCatId(48);

        $str = '<div class="row">';
        foreach ((array)$rows as $row) {
            //owndebugger($row);
            $str .= '<div class="' . (isset($cols) ? 'col-lg-' . $cols . ' col-md-' . $cols . ' col-xs-' . $cols . '' : 'col-lg-3 col-md-4 col-xs-6') . ' thumb">';
            $str .= '<a class="" title="' . $row->Title . '" href="#">';
            $str .= '<img class="thumbnail img-responsive" src="' . base_url() . 'uploads/posts/' . $row->MediaFileName . '" alt="' . $row->Title . '">';
            $str .= '</a>';
            $str .= '</div>';
        }
        $str .= '</div>';
        $str .= '<div id="myModal" class="modal fade" tabindex="-1" role="dialog">
              <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h3 class="modal-title">Heading</h3>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                    <button class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
               </div>
              </div>
            </div>';
        return $str;
    }

    public function getAllPostsByCatId($id)
    {
        $where = array('Category' => $id);
        $rows = $this->getRecords($this->_posts, $where, 'all');
        return $rows;
    }

}