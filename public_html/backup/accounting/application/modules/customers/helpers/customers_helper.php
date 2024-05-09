<?php

function customer_type($cus_type = '') {
    $html = '';
    $types = ['Fresher', 'Intermideate', 'Honurs'];
    foreach ($types as $type) {
        $selected = (@$cus_type == $type) ? 'selected' : '';
        $html .= "<option value='". $type ."' $selected>$type</option>";
    }

    return $html;
}


?>