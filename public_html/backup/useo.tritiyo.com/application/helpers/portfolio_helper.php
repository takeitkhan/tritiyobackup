<?php

function activeInactiveStatus($chk = 0) {
    $html = '';
    $rows = ['0' => 'Inactive', '1' => 'Active'];
    foreach ($rows as $row => $rowval):
        if ($chk == $row) {
            $checked = 'checked';
        } else if (($chk == '') && ($row == 1)) {
            $checked = 'checked';
        } else {
            $checked = '';
        }

        $html .= '<label><input type="radio" name="status" value="' . $row . '" ' . $checked . '> &nbsp;' . $rowval . '</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
    endforeach;
    return $html;
}

function portfolioCats($selected = '') {
    $CI = get_instance();
    $checked = '';
    $html = '';
    $rows = $CI->db->get_where('portfolio_category', ['status' => 1])->result();
    if ($rows):
        foreach ($rows as $row):
            if (in_array($row->id, explode(',', $selected))) {
                $checked = 'checked';
            } else {
                $checked = '';
            }
            $html .= '<label><input type="checkbox" name="category[]" value="' . $row->id . '" ' . $checked . '> &nbsp;' . $row->name . '</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
        endforeach;
    endif;
    return $html;
}

function portfolioTechnos($selected = '') {
    $CI = get_instance();
    $checked = '';
    $html = '';
    $rows = $CI->db->get_where('portfolio_technology', ['status' => 1])->result();
    if ($rows):
        foreach ($rows as $row):
            if (in_array($row->id, explode(',', $selected))) {
                $checked = 'checked';
            } else {
                $checked = '';
            }
            $html .= '<label><input type="checkbox" name="technology[]" value="' . $row->id . '" ' . $checked . '> &nbsp;' . $row->name . '</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
        endforeach;
    endif;
    return $html;
}

function getPortfolioTechnology($ids = '') {
    $html = '';
    if ($ids) {
        $CI = get_instance();
        $rows = $CI->db->where_in('id', explode(',', $ids))->get('portfolio_technology')->result();
        foreach ($rows as $row):
            $html .= '<span>' . $row->name . '</span>&nbsp;, ';
        endforeach;
    }
    return substr($html, 0, -2);
}

function getPortfolioCategory($ids = '') {
    $html = '';
    if ($ids) {
        $CI = get_instance();
        $rows = $CI->db->where_in('id', explode(',', $ids))->get('portfolio_category')->result();
        foreach ($rows as $row):
            $html .= '<span>' . $row->name . '</span>&nbsp;, ';
        endforeach;
    }
    return substr($html, 0, -2);
}

?>