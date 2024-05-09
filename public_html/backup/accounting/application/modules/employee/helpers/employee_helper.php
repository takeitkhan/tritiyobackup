<?php

function employee_type($cus_type = '') {
    $html = '';
    $types = ['HR', 'Admin', 'Officer'];
    foreach ($types as $type) {
        $selected = (@$cus_type == $type) ? 'selected' : '';
        $html .= "<option value='". $type ."' $selected>$type</option>";
    }

    return $html;
}


?>