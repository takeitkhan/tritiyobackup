<?php

function investor_type($label = '', $select = '', $zero = '') {
    $html = '<option value="'. @$zero .'">'. $label .'</option>';
    $types = ['Banks', 'Angel investors', 'Peer-to-peer lenders', 'Venture capitalists', 'Personal investors'];
    foreach ($types as $type) {
        $selected = (@$select == $type) ? 'selected' : '';
        $html .= "<option value='". $type ."' $selected>$type</option>";
    }

    return $html;
}
function company_type($label = '', $select = '', $zero = '') {
    $html = '<option value="'. @$zero .'">'. $label .'</option>';
    $types = ['Private', 'Limited', 'Private Public'];
    foreach ($types as $type) {
        $selected = (@$select == $type) ? 'selected' : '';
        $html .= "<option value='". $type ."' $selected>$type</option>";
    }

    return $html;
}

function customer_type($label = '', $select = '', $zero = '') {
    $html = '';
    if($label) {
        $html .= '<option value="' . @$zero . '">' . $label . '</option>';
    }
    $types = ['Customer', 'Supplier', 'Vendor', 'Manufacturer'];
    foreach ($types as $type) {
        $selected = (@$select == $type) ? 'selected' : '';
        $html .= "<option value='". $type ."' $selected>$type</option>";
    }

    return $html;
}







?>