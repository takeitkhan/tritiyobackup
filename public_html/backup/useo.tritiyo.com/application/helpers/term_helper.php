<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */




if (!function_exists('select_option_html')) {

    function select_option_html($category, $parent_id = 0, $seperator = '',$edited_id) {
        $html = '';
        $current_lvl_keys = array_keys(array_column($category, 'parent_id'), $parent_id);

        if (!empty($current_lvl_keys)) {
            foreach ($current_lvl_keys as $key) {
                $is_selected = ($edited_id == $category[$key]['id'])?'selected="selected"':'';
                $html .="<option ".$is_selected." value='" . $category[$key]['id'] . "'>" . $seperator . $category[$key]['name'] . "</option>";
                $html .= select_option_html($category, $category[$key]['id'], $seperator . '-',$edited_id);
            }
        }
        return $html;
    }

}

if (!function_exists('category_list_html')) {

    function category_list_html($category, $parent_id = 0) {
        $current_lvl_keys = array_keys(array_column($category, 'parent_id'), $parent_id);

        if (!empty($current_lvl_keys)) :
            ?>
            <div class="panel-group" id="accordion<?php echo $parent_id; ?>">
                <?php foreach ($current_lvl_keys as $key) : ?>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion<?php echo $parent_id; ?>" href="#category_collapse<?php echo $category[$key]['id']; ?>">
                                    <?php echo $category[$key]['name']; ?>                                
                                </a>
                            </h4>
                        </div>
                        <div id="category_collapse<?php echo $category[$key]['id']; ?>" class="panel-collapse collapse">
                            <div class="panel-body">
                                <p>
                                    <strong>Category ID:</strong><?php echo $category[$key]['id']; ?>
                                    <div class="btn-group">
                                        <a href="<?php echo site_url('edit_category/' . $category[$key]['id']); ?>" class="btn btn-primary btn-xs"> <i class="fa fa-pencil" aria-hidden="true"></i></a>
                                        <a 
                                            onclick="ajaxRemoveFn('<?php echo $category[$key]['id']; ?>', '<?php echo 'delete_category/' . $category[$key]['id']; ?>')"
                                            href="javascript:void(0)" 
                                            data-id="<?php echo $category[$key]['id']; ?>" 
                                            class="btn btn-danger btn-xs _delete_category"> <i class="fa fa-trash-o" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                </p>

                                <?php if (!empty($category[$key]['description'])) { ?>
                                    <p><strong>Category Description : </strong><?php echo $category[$key]['description']; ?> </P>
                                <?php } ?>

                                <?php echo category_list_html($category, $category[$key]['id']); ?>
                            </div>
                        </div>
                    </div>       
                <?php endforeach; ?>
            </div>
            <?php
        endif;
    }

}
if (!function_exists('category_h_checkbox_html')) {
    /*
     * @param mixed $categories        
     * @param int   $parent_id = 0  
     * @param string  $name = 'name' Name of checkbox <example><input type="checkbox" value="name[]"> </examble>
     */


     function category_h_checkbox_html($category, $parent_id = 0, $name = 'name', $selected_category_ids = array()) {
        $current_lvl_keys = array_keys(array_column($category, 'parent_id'), $parent_id);
        if (!empty($current_lvl_keys)) :
            ?>
            <ul class="ripon" id="<?php echo $name ?>-id-<?php echo $parent_id; ?>">

                <?php foreach ($current_lvl_keys as $key) : ?>
                    <li>
                        <input type="checkbox" name="<?php echo $name; ?>[]" value="<?php echo $category[$key]['id']; ?>" <?php echo (in_array($category[$key]['id'], $selected_category_ids) ? ' checked="checked" ' : ''); ?>> <?php echo $category[$key]['name']; ?> 
                         <?php echo category_h_checkbox_html($category, $category[$key]['id'], $name, $selected_category_ids); ?>
                    </li>
                   
                <?php endforeach; ?>                           
            </ul>

            <?php
        endif;
    }

}
