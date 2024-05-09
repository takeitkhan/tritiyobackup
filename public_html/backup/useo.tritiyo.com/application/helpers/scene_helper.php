<?php

/**
 * @property Common_model $common_model Common Model
 * @property Settings_model $settings_model Settings Model
 */
$CI = get_instance();

// You may need to load the models if it hasn't been pre-loaded
$CI->load->model('common_model');
$CI->load->model('settings_model');


if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * @param $var variable or array variable
 */
function owndebugger($var) {
    echo '<pre>';
    print_r($var);
    echo '</pre>';
}
function slugit($str, $replace = array(), $delimiter = '-') {
    if (!empty($replace)) {
        $str = str_replace((array) $replace, ' ', $str);
    }
    $clean = iconv('UTF-8', 'ASCII//TRANSLIT', $str);
    $clean = preg_replace("/[^a-zA-Z0-9\/_|+ -]/", '', $clean);
    $clean = strtolower(trim($clean, '-'));
    $clean = preg_replace("/[\/_|+ -]+/", $delimiter, $clean);
    return $clean;
}

function loadthemenow($var) {
    switch ($var) {
        case 'lightbluetheme':
            $theme = 'lightbluetheme';
            break;
        case 'bluetheme':
            $theme = 'bluetheme';
            break;
        case 'lightblacktheme':
            $theme = 'lightblacktheme';
            break;
        case 'lightgreentheme':
            $theme = 'lightgreentheme';
            break;
        case 'lightredtheme':
            $theme = 'lightredtheme';
            break;
    }
    return $theme;
}

/**
 * 
 * @param unknown $text
 * @param unknown $limit
 * @return string
 */
function limit_text($text, $limit) {
    if (str_word_count($text, 0) > $limit) {
        $words = str_word_count($text, 2);
        $pos = array_keys($words);
        $text = substr($text, 0, $pos[$limit]) . '...';
    }
    return $text;
}

/**
 * 
 * @param unknown $string
 * @param unknown $limit
 * @return string
 */
function text_limit($string, $limit) {
    $string = strip_tags($string);
    if (strlen($string) > $limit) {
        // truncate string
        $stringCut = substr($string, 0, $limit);
        // make sure it ends in a word so assassinate doesn't become ass...
        $string = substr($stringCut, 0, strrpos($stringCut, ' ')) . '...';
    }
    return $string;
}

/**
 * 
 * @param unknown $string
 */
function clean_special_char($string) {
    $string = str_replace(' ', '', $string); // Replaces all spaces with hyphens.
    $string = str_replace(',', ' ', $string);
    $string = str_replace('*', ' ', $string);
    $string = str_replace('+', ' ', $string);
    $string = str_replace('-', ' ', $string);
    $string = str_replace('&', ' ', $string);
    $string = str_replace('^', ' ', $string);
    $string = str_replace('%', ' ', $string);
    $string = str_replace('#', ' ', $string);
    $string = str_replace('!', ' ', $string);
    $string = str_replace('$', ' ', $string);
    $string = str_replace('.', ' ', $string);
    $string = str_replace('(', ' ', $string);
    $string = str_replace(')', ' ', $string);
    $string = str_replace('\'', ' ', $string);
    $string = str_replace('\"', ' ', $string);
    $string = str_replace('{', ' ', $string);
    $string = str_replace('}', ' ', $string);
    $string = str_replace('[', ' ', $string);
    $string = str_replace(']', ' ', $string);
    $string = str_replace('|', ' ', $string);
    $string = str_replace('@', ' ', $string);
    $string = str_replace('~', ' ', $string);
    $string = str_replace('`', ' ', $string);
    $string = str_replace('’', ' ', $string);
    $string = str_replace('”', ' ', $string);
    $string = str_replace('“', ' ', $string);
    $str = str_replace(' ', '_', $string);    

    return preg_replace('/[^A-Za-z0-9\-]/', '', $str); // Removes special chars.
}

/**
 * 
 * @param unknown $themename
 */
function load_css_file($themename) {
    switch ($themename) {
        case 'lightbluetheme':
            $theme = base_url() . 'styles/lightbluetheme/style.css';
            break;
        case 'bluetheme':
            $theme = base_url() . 'styles/bluetheme/style.css';
            break;
        case 'lighttheme':
            $theme = base_url() . 'styles/lighttheme/style.css';
            break;
        case 'greentheme':
            $theme = base_url() . 'styles/greentheme/style.css';
            break;
    }
    return $theme;
}

function get_block($id) {
    global $CI;
    $block = $CI->settings_model->getBlock($id);
    return $block;
}

/**
 * @Helper::getJsonEncode()
 * @Author: Idea Tweaker
 * @params:$data
 * @return
 */
function jsonEncode($data) {
    header('Content-Type: application/json');
    return json_encode($data);
}

/**
 * @Helper::jsonDecode()
 * @Author: Idea Tweaker
 * @params:$data
 * @return
 */
function jsonDecode($data) {
    return json_decode($data);
}

/**
 * @Helper::setSerialize()
 * @Author: Idea Tweaker
 * @params:$data
 * @return
 */
function serializeArr($data) {
    return serialize($data);
}

/**
 * @Helper::unserializeArr()
 * @Author: Idea Tweaker
 * @params:$data
 * @return
 */
function unserializeArr($data) {
    return unserialize($data);
}

/**
 * @Helper::base64Encode()
 * @Author: Idea Tweaker
 * @params:$data
 * @return
 */
function base64Encode($data) {
    return base64_encode($data);
}

/**
 * @Helper::base64Decode()
 * @Author: Idea Tweaker
 * @params:$data
 * @return
 */
function base64Decode($data) {
    return base64_decode($data);
}

/**
 * @Helper::implodeArr()
 * @Author: Idea Tweaker
 * @params:$separator
 * @params:$array
 * @return
 */
function implodeArr($separator, $array) {
    return implode($separator, $array);
}

/**
 * @Helper::base64Decode()
 * @Author: Idea Tweaker
 * @params:$min
 * @params:$max
 * @return
 */
function getRange($min, $max) {
    return range($min, $max);
}

/**
 * @Helper::base64Decode()
 * @Author: Idea Tweaker
 * @params:$min
 * @params:$max
 * @return
 */
function strReplace($match, $slag, $str) {
    return str_replace($match, $slag, $str);
}

/**
 * @Helper::sprtf()
 * @Author: Idea Tweaker
 * @params:$num
 * @params:$slag
 * @return
 */
function sprtf($num, $slag) {
    return sprintf('%.' . $slag . 'f', $num);
}

/**
 * @Helper::getDayLists()
 * @Author: Idea Tweaker
 * @return
 */
function getDayLists() {

    $day = '';
    $selected = '';
    $Arr = array(
        '01' => "01",
        '02' => "02",
        '03' => "03",
        '04' => "04",
        '05' => "05",
        '06' => "06",
        '07' => "07",
        '08' => "08",
        '09' => "09",
        '10' => "10",
        '11' => "11",
        '12' => "12",
        '13' => "13",
        '14' => "14",
        '15' => "15",
        '16' => "16",
        '17' => "17",
        '18' => "18",
        '19' => "19",
        '20' => "20",
        '21' => "21",
        '22' => "22",
        '23' => "23",
        '24' => "24",
        '25' => "25",
        '26' => "26",
        '27' => "27",
        '28' => "28",
        '29' => "29",
        '30' => "30",
        '31' => "31"
    );

    foreach ($Arr as $key => $values) {

        if ($values == date('d'))
            $selected = 'selected="selected"';
        else
            $selected = '';

        $day .= "<option value=\"" . $values . "\"";
        $day .= $selected;
        $day .= ">" . $values . "</option>\n";

        if ($values == date('t'))
            break;
    }

    return $day;
}

/**
 * @Helper::getMonthLists()
 * @Author: Idea Tweaker
 * @return
 */
function getMonthLists() {

    $arr = array(
        '01' => "01",
        '02' => "02",
        '03' => "03",
        '04' => "04",
        '05' => "05",
        '06' => "06",
        '07' => "07",
        '08' => "08",
        '09' => "09",
        '10' => "10",
        '11' => "11",
        '12' => "12"
    );

    $monthlist = '';

    foreach ($arr as $key => $val) {
        $monthlist .= "<option value=\"$key\"";
        $monthlist .= ($key == date('m')) ? ' selected="selected"' : '';
        $monthlist .= ">$val</option>\n";
    }

    return $monthlist;
}

/** Email Templates Functions * */
function et_header($cname = NULL) {
    return '<table border="0" cellspacing="0" cellpadding="0" style="font-family:Helvetica,Arial,sans-serif; background: #EEEEEE;" width="100%" bgcolor="#EEEEEE">
    <tr>
        <td style="height: 50px; padding: 0 0 0 20px; font-size: 22px; background: #52A028;" bgcolor="#52A028">
            <a style="text-decoration:none;border:none;display:block;min-height:21px;width:100%; color: #FFF;" href="' . base_url() . '" target="_blank">
                ' . (!empty($cname) ? $cname : '') . '
            </a>
        </td>
    </tr>';
}

function et_common_links() {
    return '<table>
                <tbody>
                <tr>
                    <td style="padding: 10px 0 10px 0px;">
                        <a target="_blank" href="#" style="text-decoration:none; font-size:13px; font-family:Helvetica,Arial,sans-serif; font-weight: normal; color:white;" target="_blank">
                        <span style="font-size: 12px;font-family:Helvetica,Arial,sans-serif;font-weight:normal;color:white;white-space:nowrap;">
                            <span style="color:#52A028;font-size: 12px">Check our privacy policy</span></span>
                        </a> |
                        <a href="#" style="text-decoration:none; font-size: 12px; font-family:Helvetica,Arial,sans-serif; font-weight:normal; color:white;" target="_blank">
                            <span style="color:#52A028;font-size: 12px;">
                                Unsubscribes
                            </span>
                        </a>
                    </td>
                </tr>
                </tbody>
            </table>';
}

/**
 * @return string
 */
function et_footer($cname = NULL, $cphone = NULL) {
    return '<tr>
            <td style="padding: 10px 20px 10px 20px; font-family:Helvetica,Arial,sans-serif;  font-size: 12px; color:
             #FFF; background: #52A028;" bgcolor="#52A028">
                &copy; '. date('Y') .' <span>' . $cname . '</span>
                 <span style="float: right;">Phone: ' . $cphone . '</span>
            </td>
        </tr>
    </table>
    ';
}

/**
 * @param $content
 * @return string
 */
function et_row($content) {
    return '<tr>
        <td style="padding: 10px 0 10px 20px;">
        ' . $content . '
        </td>
    </tr>
        ';
}

/**
 * @Helper::setFirstLetterCapital()
 * @Author: Idea Tweaker
 * @params:$word
 * @return
 */
function setFirstLetterCapital($word) {
    return ucfirst($word);
}

/**
 * @GeneralModel::getToken()
 * @access:public
 * @params:length
 * @Author: Idea Tweaker
 * @return $code
 */
function getToken($length = "") {

    $code = uniqid(rand(), true);
    if ($length != "") {
        return substr($code, 0, $length);
    } else
        return $code;
}

/**
 * @Helper::hashSha1()
 * @Author: Idea Tweaker
 * @params:$data
 * @return
 */
function hashSha1($data) {
    return sha1($data);
}

/**
 * @Common_model::getRecords()
 * @Author: Idea Tweaker
 * @access:public
 * @params:$table
 * @params:$where
 * @params:$option
 * @return
 */
function getRecordsHelper($table, $where, $option) {

    $ci = &get_instance();

    if (!empty($where))
        $sql = $ci->db->get_where($table, $where);
    else
        $sql = $ci->db->get($table);

    if ($sql->num_rows() > 0) {

        if ($option == "all") {

            foreach ($sql->result() as $rows) {

                $data[] = $rows;
            }
        } else {

            $data = $sql->row_array();
        }

        return $data;
    } else
        return false;
}

/**
 * @package: NewPortal
 * @helper::mbConvertEncoding().
 * @Author: Idea Tweaker
 */
function mbConvertEncoding($text) {
    return mb_convert_encoding($text, 'ISO-8859-15', 'UTF-8');
}

/**
 * @package: NewPortal
 * @helper::getArraySum().
 * @Author: Idea Tweaker
 */
function getArraySum($array) {
    return array_sum($array);
}

/**
 * @package: NewPortal
 * @helper::getCount().
 * @Author: Idea Tweaker
 */
function getCount($array) {
    return count($array);
}

/**
 * @package: NewPortal
 * @helper::getArraySum().
 * @Author: Idea Tweaker
 */
function getExplode($slag, $str) {
    return explode($slag, $str);
}

/**
 * @package: NewPortal
 * @helper::getArraySum().
 * @Author: Idea Tweaker
 */
function getImplode($slag, $str) {
    return implode($slag, $str);
}

/**
 * @package: NewPortal
 * @helper::getRound().
 * @Author: Idea Tweaker
 */
function getRound($num, $decimal_num) {
    return round($num, $decimal_num);
}

/**
 * @package: NewPortal
 * @helper::add_js().
 * @Author: Idea Tweaker
 */
if (!function_exists('add_js')) {

    function add_js($file = '') {
        $str = '';
        $ci = &get_instance();
        $header_js = $ci->config->item('header_js');

        print_r($header_js);

        if (empty($file)) {
            return;
        }

        if (is_array($file)) {
            if (!is_array($file) && count($file) <= 0) {
                return;
            }
            foreach ($file AS $item) {
                $header_js[] = $item;
            }
            $ci->config->set_item('header_js', $header_js);
        } else {
            $str = $file;
            $header_js[] = $str;
            $ci->config->set_item('header_js', $header_js);
        }
    }

}
/**
 * @package: NewPortal
 * @helper::add_css().
 * @Author: Idea Tweaker
 */
if (!function_exists('add_css')) {

    function add_css($file = '') {
        $str = '';
        $ci = &get_instance();
        $header_css = $ci->config->item('header_css');

        if (empty($file)) {
            return;
        }

        if (is_array($file)) {
            if (!is_array($file) && count($file) <= 0) {
                return;
            }
            foreach ($file AS $item) {
                $header_css[] = $item;
            }
            $ci->config->set_item('header_css', $header_css);
        } else {
            $str = $file;
            $header_css[] = $str;
            $ci->config->set_item('header_css', $header_css);
        }
    }

}
/**
 * @package: NewPortal
 * @helper::put_headers().
 * @Author: Idea Tweaker
 */
if (!function_exists('put_headers')) {

    function put_headers() {
        $str = '';
        $ci = &get_instance();
        $header_css = $ci->config->item('header_css');

        foreach ($header_css AS $item) {
            $str_css[] = $item;
            $str .= '<link rel="stylesheet" href="' . base_url() . $item . '" type="text/css" />' . "\n";
        }
        return $str;
    }

}
/**
 * @package: NewPortal
 * @helper::put_footer().
 * @Author: Idea Tweaker
 */
if (!function_exists('put_footer')) {

    function put_footer() {
        $str = '';
        $ci = &get_instance();
        $footer_js = $ci->config->item('footer_js');

        foreach ($footer_js AS $item) {
            $str .= '<script  type="text/javascript"  src="' . base_url() . $item . '"></script>' . "\n";
        }

        return $str;
    }

}
/**
 * @package: NewPortal
 * @helper::put_footer().
 * @Author: Idea Tweaker
 */
if (!function_exists('front_put_footer')) {

    function front_put_footer() {
        $str = '';
        $ci = &get_instance();
        $footer_js = $ci->config->item('front_footer_js');

        foreach ($footer_js AS $item) {
            $str .= '<script  type="text/javascript"  src="' . base_url() . $item . '"></script>' . "\n";
        }

        return $str;
    }

}

/**
 * @package: NewPortal
 * @helper::setOutPut().
 * @Author: Idea Tweaker
 */
function setOutPut() {
    $ci = &get_instance();
    $ci->output->set_output('YES');
}

/**
 * @package: NewPortal
 * @helper::isSession().
 * @Author: Idea Tweaker
 */
function isSession() {
    $ci = &get_instance();
    $isSession = $ci->session->userdata("token");

    return
            ($isSession) ? $isSession : 0;
}

/**
 * @package: NewPortal
 * @helper::isArray().
 * @Author: Idea Tweaker
 */
function isArray($array) {
    return is_array($array);
}

/**
 * @package: NewPortal
 * @helper::isModerator().
 * @Author: Idea Tweaker
 */
function isModerator() {
    return (getSession('token') == 1) ? 1 : 0;
}

/**
 * @package: NewPortal
 * @helper::isTeacher().
 * @Author: Idea Tweaker
 */
function isTeacher() {
    return (getPriority() == 5) ? 1 : 0;
}

/**
 * @package: NewPortal
 * @helper::isStaff().
 * @Author: Idea Tweaker
 */
function isStaff() {
    return (getPriority() == 3) ? 1 : 0;
}

/**
 * @package: NewPortal
 * @helper::isStudent().
 * @Author: Idea Tweaker
 */
function isStudent() {
    return (getPriority() == 9) ? 1 : 0;
}

/**
 * @package: NewPortal
 * @helper::getPriority().
 * @Author: Idea Tweaker
 */
function getPriority() {
    $ci = getInstance();
    return $ci->session->userdata("priority");
}

/**
 * @package: NewPortal
 * @helper::getInstance().
 * @Author: Idea Tweaker
 */
function getInstance() {
    $ci = &get_instance();
    return $ci;
}

function loadCommon_model() {
    $ci = getInstance();
    return $ci->load->model("admin/common_model");
}

/**
 * @package: NewPortal
 * @getOrientedDecision::getMaxArrayValue().
 * @Author: Idea Tweaker
 */
function getMaxArrayValue($array) {
    return max($array);
}

/**
 * @package: NewPortal
 * @getOrientedDecision::getMinArrayValue().
 * @Author: Idea Tweaker
 */
function getMinArrayValue($array) {
    return min($array);
}

/**
 * @package: NewPortal
 * @helper::getTime().
 * @Author: Idea Tweaker
 */
function getTime() {
    return date("Y-m-d H:i:s");
}

/**
 * @package: NewPortal
 * @helper::setRules()
 * @access:private
 * @params:$config
 * @Author: Idea Tweaker
 * @return
 */
function setRules($config) {

    $ci = getInstance();
    return $ci->form_validation->set_rules($config);
}

/**
 * @package: NewPortal
 * @helper::setCookies()
 * @access:private
 * @Author: Idea Tweaker
 */
function setCookies($cookie) {
    $ci = getInstance();
    $ci->input->set_cookie($cookie);
}

/**
 * @package: NewPortal
 * @helper::getCookie()
 * @access:private
 * @Author: Idea Tweaker
 * @return:cookie
 */
function getCookie($name) {
    $ci = getInstance();
    return ($ci->input->cookie($name)) ? $ci->input->cookie($name) : 0;
}

/**
 * @package: NewPortal
 * @helper::storeLogHistory()
 * @params:$data
 * @Author: Idea Tweaker
 * @return:void
 */
function storeLogHistory($data) {
    $ci = getInstance();
    $ci->common_model->insertRecords($ci->common_model->_logTable, $data);
}

/**
 * @helper::getUserIp()
 * @Author: Idea Tweaker
 */
function getUserIp() {
    $ci = getInstance();
    return $ci->input->ip_address();
}

/**
 * @helper::alertShutdown()
 * @Author: Idea Tweaker
 */
function alertShutdown() {
    $ci = getInstance();
    $session = $ci->auth_model->getSession();
    $data = array();
    $data['logout_time'] = getTime();
    $data['logout_type'] = 'Auto';
    $data['ip_address'] = getUserIp();
    $data['userid'] = $session['token'];

    if (connection_aborted())
        storeLogHistory($data);
}

/**
 * @package: NewPortal
 * @helper::getCurrentsUrl().
 * @Author: Idea Tweaker
 */
function getCurrentsUrl() {
    return (isset($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : base_url();
}

/**
 * @package: NewPortal
 * @helper::getCurrentsUrl().
 * @Author: Idea Tweaker
 */
function getSession($session = NULL) {
    $ci = getInstance();
    $ci->status_ = $ci->session->userdata("token");

    if ($session)
        $session = $ci->session->userdata($session);
    else
        $session = $ci->session->all_userdata();

    return ($ci->status_ && $session) ? $session : 0;
}

/**
 * @package: NewPortal
 * @helper::getCurrentsUrl().
 * @Author: Idea Tweaker
 */
function getUserPhoto() {
    $allsession = getSession();
    return $allsession['user_photo'];
}

/**
 * @package: NewPortal
 * @helper::getCurrentsUrl().
 * @Author: Idea Tweaker
 */
function getMesgNum() {

    $ci = getInstance();
    $allsession = getSession();
    $where = array("id" => $allsession['token']);
    $user_infos = $ci->common_model->getRecords($ci->common_model->_usersTable, $where, 's');

    return $ci->common_model->getNumRows($ci->common_model->_messageTable, array('account' => $user_infos['mailbox']));
}

/**
 * @package: NewPortal
 * @helper::getUsers().
 * @Author: Idea Tweaker
 */
function getUsers() {
    $ci = getInstance();
    return $ci->common_model->getRecords($ci->common_model->_usersTable, '', 'all');
}

/**
 * @package: NewPortal
 * @helper::getUserById().
 * @Author: Idea Tweaker
 */
function getUserById($id) {
    $ci = getInstance();
    return $ci->common_model->getRecords($ci->common_model->_usersTable, array('id' => $id), 's');
}

/**
 * @package: NewPortal
 * @helper::getUsersNum()().
 * @Author: Idea Tweaker
 */
function getUsersNum() {

    $ci = getInstance();
    return $ci->common_model->getNumRows($ci->common_model->_usersTable, '');
}

/**
 * @package: NewPortal
 * @helper::getUsersNum()().
 * @Author: Idea Tweaker
 */
function isForceChangePwd() {
    $allsession = getSession();
    return (isset($allsession['force_to_change_password']) && $allsession['force_to_change_password'] == 1) ? 1 : 0;
}

function __menu($name) {
    echo base_url() . $name;
}

function __fmenu($url, $title, $cls = null) {
    echo '<a href="' . base_url() . $url . '" class="' . (isset($cls) ? $cls : '') . '">' . $title . '</a>';
}

/**
 * @param $var
 */
function __e($var) {
    echo $var;
}

/**
 * 
 * @param type $blockid
 * @return type
 */
function __block($blockid) {
    echo (!empty($blockid['BlockContent']) ? $blockid['BlockContent'] : '');
}

function limit_words($string, $word_limit) {
    $words = explode(" ", $string);
    return implode(" ", array_splice($words, 0, $word_limit));
}

function __injectadcode($content, $adcode) {
    $after_character = 500;
    if (!empty($content)) {

        $before_content = substr($content, 0, $after_character);
        $after_content = substr($content, $after_character);
        $after_content = explode(' ', $after_content);
        array_splice($after_content, 1, 0, '<div style="float: right; margin: 10px 0 10px 10px;">' . $adcode . '</div>');
        $after_content = implode(' ', $after_content);
        return $before_content . $after_content;
    }
}

function __random() {
    srand(make_seed());
    $randval = rand();
    return $randval;
}
function rand_string($length) {
    $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    $size = strLen($chars);
    $str = "";
    for ($i = 0; $i < $length; $i++) {
        $str .= $chars[rand(0, $size - 1)];
    }
    return $str;
}

function make_seed() {
    list($usec, $sec) = explode(' ', microtime());
    return (float) $sec + ((float) $usec * 100000);
}

/**
 * @param      $url Pass the img src
 * @param null $id Pass the id for css
 * @param null $cls pass the class for css
 * @param null $alt alternative tag
 * @param null $w width if any
 * @param null $h height if any
 */
function __img($url, $id = NULL, $cls = NULL, $alt = NULL, $w = NULL, $h = NULL) {
    $html = '<img ';
    $html .= 'src="' . $url . '"';
    $html .= ' alt="' . $alt . '"';
    if (isset($id))
        $html .= ' class="' . $id . '"';
    else
        $html .= '';
    if (isset($cls))
        $html .= ' class="' . $cls . '"';
    else
        $html .= '';
    if (isset($w))
        $html .= ' width="' . $w . '"';
    else
        $html .= '';
    if (isset($h))
        $html .= ' height="' . $h . '"';
    else
        $html .= '';
    $html .= '/>';

    echo $html;
}

/**
 *
 * @param unknown $fileurl
 * @param unknown $blankavatar
 * @return unknown
 */
function __checkimgavailable($fileurl, $blankavatar) {
    if (@getimagesize($fileurl) !== false) {
        $url = $fileurl;
    } else {
        $url = $blankavatar;
    }
    return $url;
}

/**
 * @param $note string pass variable string and get output
 */
function __smallnote($note) {
    echo '<small class="small_note">' . $note . '</small>';
}

function __pullright() {
    echo '<span class="pull-right msgbox" style="display: block;"></span>';
}

/**
 * @param $btnid
 */
function __submitbtn($btnid) {
    $data = array(
        'type' => 'submit',
        'id' => $btnid, //'systemSettingsBtn',
        'class' => 'btn btn-success',
        'value' => 'Save Changes'
    );
    echo form_submit($data);
}

/**
 *
 */
function __resetbtn() {
    $data = array(
        'type' => 'reset',
        'class' => 'btn btn-default',
        'value' => 'Cancel'
    );
    echo form_reset($data);
}

/**
 * @param $url string pass the routes
 * @param $cls string pass the css classes with spaces
 */
function __abtn($url, $cls, $btnname) {
    echo '<a href="' . $url . '" class="' . $cls . '">' . $btnname . '</a>';
}

/**
 * @param null $param
 * @return bool|string
 */
function __now($param = null) {
    # date_default_timezone_set('Asia/Dhaka');
    switch ($param) {
        case 'time':
            return date('H:i:s A');
            break;

        case 'date':
            return date('Y-m-d');
            break;

        default:
            return date('Y-m-d H:i:s');
            break;
    }
}

/**
 * @param $extrasstring
 * @param $var
 */
function ifchecks($extrasstring, $var) {
    if ($var) {
        echo $extrasstring;
        echo $var;
    }
}

/**
 * @param $date Formatted date
 * @return int Input as Integer to database
 */
function datetoint($date) {
    $d = strtotime($date);
    return $d;
}

/**
 * @param $intvalue Pass integer value
 * @return bool|string return as date. e.g 03/27/2015
 */
function inttodate($intvalue) {
    // ১১:৫১ এএম, ১৭ এপ্রিল ২০১৬, রোববার
    $d = date('a g:i, j F Y, D', $intvalue);
    return $d;
}

function inttodateYY($int) {
    $y = date('Y', strtotime($int));
    return $y;
}

function inttodateYMD($int) {
    $y = date('Y-m-d', strtotime($int));
    return $y;
}

function inttodateYMDHS($int) {
    $y = date('Y-m-d H:i:s', $int);
    return $y;
}

function bn2enSomeCommonString($string) {
    $search_array = array("Female", "Male", "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December", "pm", "am", "Sat", "Sun", "Mon", "Tue", "Wed", "Thu", "Fri");
    $replace_array = array("মহিলা", "পুরুষ", "জানুয়ারী", "ফেব্রুয়ারি", "মার্চ", "এপ্রিল", "মে", "জুন", "জুলাই", "আগস্ট", "সেপ্টেম্বর", "অক্টোবর", "নভেম্বর", "ডিসেম্বর", "বিকাল", "সকাল", "শনিবার", "রোববার", "সোমবার", "মঙ্গলবার", "বুধবার", "বৃহস্পতিবার", "শুক্রবার");
    $en_number = str_replace($search_array, $replace_array, $string);
    return $en_number;
}

function bn2enNumber($number) {
    $search_array = array("১", "২", "৩", "৪", "৫", "৬", "৭", "৮", "৯", "০", "-");
    $replace_array = array("1", "2", "3", "4", "5", "6", "7", "8", "9", "0", "-");
    $en_number = str_replace($replace_array, $search_array, $number);
    return $en_number;
}

/**
 * @param $intvalue
 * @return bool|string
 */
function inttodatebdy($intvalue) {
    $d = date('Y-M-d', $intvalue);
    return $d;
}

/**
 * @param $intvalue
 * @return bool|string
 */
function inttodatebdm($intvalue, $opt = TRUE) {
    if ($opt = TRUE) {
        $d = date('M', $intvalue);
        return $d;
    } else {
        $d = date('m', $intvalue);
        return $d;
    }
}

/**
 * 
 */
function inttodateyear($intvalue, $opt = TRUE) {
    if ($opt = TRUE) {
        $d = date('Y', $intvalue);
        return $d;
    } else {
        $d = date('y', $intvalue);
        return $d;
    }
}

/**
 * @param $intvalue
 * @return bool|string
 */
function inttodatebdd($intvalue) {
    $d = date('d', $intvalue);
    return $d;
}

/**
 * Get URL from youtube embed code
 *
 * @param $string
 * @return mixed
 */
function graburl($string) {
    preg_match('/<iframe.*src=\"(.*)\".*><\/iframe>/isU', $string, $matches);
    //echo ($matches[0]); //only the <iframe ...></iframe> part
    return $matches[1];
}

function form_start_divs($m, $s = '') {

    return '<div class="x_panel">
            <div class="x_title">
                <h2>' . $m . ' <small>' . $s . '</small></h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br/>';
}

function form_end_divs() {
    return '</div></div>';
}

function settings_icons() {
    return '
    <ul class="nav navbar-right panel_toolbox">
        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
        </li>
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
               aria-expanded="false"><i class="fa fa-wrench"></i></a>
            <ul class="dropdown-menu" role="menu">
                <li><a href="#">Settings 1</a></li>
                <li><a href="#">Settings 2</a></li>
            </ul>
        </li>
        <li><a class="close-link"><i class="fa fa-close"></i></a>
        </li>
    </ul>';
}

function settings_url() {
    
}

// function sendSms($message, $receiver) {
//     $smscontent = urlencode($message);
//     //$url = "http://app.planetgroupbd.com/api/sendsms/plain?user=habibkhan&password=01673771316&sender=Friend&SMSText=" . $smscontent . "&GSM=88" . $receiver . "";
//     $url = "http://45.125.222.100/boomcast/WebFramework/boomCastWebService/externalApiSendTextMessage.php?masking=NOMASK&userName=PRAN-RFL&password=6650fda4da3483960e430b0701edba0b&MsgType=TEXT&receiver=".$receiver."&message=".$smscontent."";
//     $ch = curl_init();
//     curl_setopt($ch, CURLOPT_URL, $url);
//     curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
//     curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//     curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
//     curl_setopt($ch, CURLOPT_TIMEOUT, 30);
//     $data = curl_exec($ch);
//     $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
//     curl_close($ch);
// }

function send_mail($message, $receiver, $subject = null) {
    $ci = getInstance();
    $ci->load->library('email');
    $ci->email->from('skydotint@gmail.com','Samrat Khan');
    $ci->email->to($receiver);
    $ci->email->subject($subject);
    $ci->email->message($message);
    $ci->email->send();

    if ($ci->email->send()) {
        return true;
    } else {
        return false;
    }
}

function sendSms($message, $receiver) {

   
    $smscontent = urlencode($message);
    //$url = "https://api.mobireach.com.bd/SendTextMessage?Username=prgsms&Password=Abcd@2018&From=RFL%20Door&To=". $receiver ."&Message=" . $smscontent;

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
    curl_setopt($ch, CURLOPT_TIMEOUT, 30);
    $data = curl_exec($ch);
    $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
}

function makeGrade($score) { //just a rewrite of your own code, exactly the same purpose
    if ($score >= 80)
        return 'A+';
    if ($score >= 70)
        return 'A';
    if ($score >= 60)
        return 'A-';
    if ($score >= 50)
        return 'B';
    if ($score >= 40)
        return 'C';
    if ($score >= 33)
        return 'D';
    return 'F';
}

function makeGpa($score) { //just a rewrite of your own code, exactly the same purpose
    if ($score >= 80)
        return 5;
    if ($score >= 70)
        return 4;
    if ($score >= 60)
        return 3.5;
    if ($score >= 50)
        return 3;
    if ($score >= 40)
        return 2;
    if ($score >= 33)
        return 1;
    return 0;
}

function makeGpaGrade($score) { //just a rewrite of your own code, exactly the same purpose
    if ($score >= 5)
        return 'A+';
    if ($score >= 4)
        return 'A';
    if ($score >= 3.5)
        return 'A-';
    if ($score >= 3)
        return 'B';
    if ($score >= 2)
        return 'C';
    if ($score >= 1)
        return 'D';
    return 'F';
}

//
//function dynamic_sidebar($array, $title = NULL)
//{
//    foreach ((array)$array as $block) {
//        owndebugger($block);
////        if (isset($title)) {
////            $html = $block[2];
////            $html .= $block[3];
////        } else {
////            $html .= $block[3];
////        }
//    }
//    return $html;
//}


function currency($number) {
    $num = (int)$number;
    return makeCurrency($num);
}

function makeCurrency($number) {
    $num= (int)$number;
    return number_format($num);
}

if (!function_exists('money_format')) {

    function money_format($format, $number) {
        $regex = '/%((?:[\^!\-]|\+|\(|\=.)*)([0-9]+)?' .
                '(?:#([0-9]+))?(?:\.([0-9]+))?([in%])/';
        if (setlocale(LC_MONETARY, 0) == 'C') {
            setlocale(LC_MONETARY, '');
        }
        $locale = localeconv();
        preg_match_all($regex, $format, $matches, PREG_SET_ORDER);
        foreach ($matches as $fmatch) {
            $value = floatval($number);
            $flags = array(
                'fillchar' => preg_match('/\=(.)/', $fmatch[1], $match) ?
                        $match[1] : ' ',
                'nogroup' => preg_match('/\^/', $fmatch[1]) > 0,
                'usesignal' => preg_match('/\+|\(/', $fmatch[1], $match) ?
                        $match[0] : '+',
                'nosimbol' => preg_match('/\!/', $fmatch[1]) > 0,
                'isleft' => preg_match('/\-/', $fmatch[1]) > 0
            );
            $width = trim($fmatch[2]) ? (int) $fmatch[2] : 0;
            $left = trim($fmatch[3]) ? (int) $fmatch[3] : 0;
            $right = trim($fmatch[4]) ? (int) $fmatch[4] : $locale['int_frac_digits'];
            $conversion = $fmatch[5];

            $positive = true;
            if ($value < 0) {
                $positive = false;
                $value *= -1;
            }
            $letter = $positive ? 'p' : 'n';

            $prefix = $suffix = $cprefix = $csuffix = $signal = '';

            $signal = $positive ? $locale['positive_sign'] : $locale['negative_sign'];
            switch (true) {
                case $locale["{$letter}_sign_posn"] == 1 && $flags['usesignal'] == '+':
                    $prefix = $signal;
                    break;
                case $locale["{$letter}_sign_posn"] == 2 && $flags['usesignal'] == '+':
                    $suffix = $signal;
                    break;
                case $locale["{$letter}_sign_posn"] == 3 && $flags['usesignal'] == '+':
                    $cprefix = $signal;
                    break;
                case $locale["{$letter}_sign_posn"] == 4 && $flags['usesignal'] == '+':
                    $csuffix = $signal;
                    break;
                case $flags['usesignal'] == '(':
                case $locale["{$letter}_sign_posn"] == 0:
                    $prefix = '(';
                    $suffix = ')';
                    break;
            }
            if (!$flags['nosimbol']) {
                $currency = $cprefix .
                        ($conversion == 'i' ? $locale['int_curr_symbol'] : $locale['currency_symbol']) .
                        $csuffix;
            } else {
                $currency = '';
            }
            $space = $locale["{$letter}_sep_by_space"] ? ' ' : '';

            $value = number_format($value, $right, $locale['mon_decimal_point'], $flags['nogroup'] ? '' : $locale['mon_thousands_sep']);
            $value = @explode($locale['mon_decimal_point'], $value);

            $n = strlen($prefix) + strlen($currency) + strlen($value[0]);
            if ($left > 0 && $left > $n) {
                $value[0] = str_repeat($flags['fillchar'], $left - $n) . $value[0];
            }
            $value = implode($locale['mon_decimal_point'], $value);
            if ($locale["{$letter}_cs_precedes"]) {
                $value = $prefix . $currency . $space . $value . $suffix;
            } else {
                $value = $prefix . $value . $space . $currency . $suffix;
            }
            if ($width > 0) {
                $value = str_pad($value, $width, $flags['fillchar'], $flags['isleft'] ?
                                STR_PAD_RIGHT : STR_PAD_LEFT);
            }

            $format = str_replace($fmatch[0], $value, $format);
        }
        return substr($format,3);
    }

}

function getParentFabrics($product_id = 0) {
    $html = '';
    $CI = get_instance();
    $pre_products = $CI->db->where(['pre_product' => $product_id])->or_where(['id' => $product_id])->get('products')->result();
    //$pre_products = $CI->db->where(['pre_product' => $product_id])->or_where(['id' => $product_id])->get('products')
        //->result();
    if ($pre_products) :
            $html .= '<div class="fabrics"><h3>You may choice fabric from here.</h3><ul>';
            foreach($pre_products as $pre_product):
                if($product_id == $pre_product->id) { $active = 'proactive'; } else { $active = '';    }
                $pro_url = base_url('product/' . $pre_product->id . '-' . url_title($pre_product->name, '-', TRUE));

                $fab = @$CI->db->get_where('fabrics', ['id' => $pre_product->fabrics])->row();

                //owndebugger($pre_product->fabrics);
                $image = @$fab->fabric_image;
                $icon =  @$fab->fabric_icon;

                
                $febric_img = @$CI->db->get_where('media_file', ['idno' => $image])->row();
                $febric_icon = @$CI->db->get_where('media_file', ['idno' => $icon])->row();
                if($febric_img) {
                    $image_url = base_url($febric_img->upload_dir . '/' . $febric_img->idno . '.' . $febric_img->extension);
                    $icon_url = base_url($febric_icon->upload_dir . '/' . $febric_icon->idno . '.' . $febric_icon->extension);
                    $html .= '<li class="'. $active .'">
                <a class="sm-image" href="' . $pro_url . '">
                <img class="small-image  img-responsive" src="'. $image_url .'">
                <span><img class="full-image  img-responsive" src="'. $icon_url .'"></span>
                </a>
                </li><style>.fabrics h3 { display: block!important; }</style>';
                }
            endforeach;
            $html .= '</ul></div>';
        endif;
    return $html;
}


function getChildFabrics($pre_product_id = 0, $pro_id = 0) {
    //$active = '';
    $html = '';
    $CI = get_instance();
    //$pre_products = $CI->db->get_where('products', ['pre_product' => $pre_product_id])->result();


    $pre_products = $CI->db->where('pre_product',$pre_product_id)->or_where('id',
        $pre_product_id)->get('products')->result();

    if ($pre_products) :
        $html .= '<div class="fabrics"><h3>You may choice fabric from here.</h3><ul>';
        foreach($pre_products as $pre_product):
            if($pro_id == $pre_product->id) { $active = 'proactive'; } else { $active = '';    }
            $pro_url = base_url('product/' . $pre_product->id . '-' . url_title($pre_product->name, '-', TRUE));
            @$fab = $CI->db->get_where('fabrics', ['id' => $pre_product->fabrics])->row();
            //owndebugger($fab);
            $image = @$fab->fabric_image;
            $icon =  @$fab->fabric_icon;
            $febric_img = @$CI->db->get_where('media_file', ['idno' => $image])->row();
            $febric_icon = @$CI->db->get_where('media_file', ['idno' => $icon])->row();
            if($febric_img) {
                $image_url = base_url($febric_img->upload_dir . '/' . $febric_img->idno . '.' . $febric_img->extension);
                $icon_url = base_url($febric_icon->upload_dir . '/' . $febric_icon->idno . '.' . $febric_icon->extension);
               $html .= '<li class="'. $active .'">
                <a class="sm-image" href="' . $pro_url . '">
                <img class="small-image  img-responsive" src="'. $image_url .'">
                <span><img class="full-image  img-responsive" src="'. $icon_url .'"></span>
                </a>
                </li><style>.fabrics h3 { display: block!important; }</style>';
            }
        endforeach;
        $html .= '</ul></div>';
    endif;
    return $html;
}

function getFabricsImg($pro_url, $id, $fabrics) {
    $html = '';
    $CI = get_instance();
    $febric_img = $CI->db->get_where('media_file', ['idno' => $fabrics])->row();
    owndebugger($febric_img);
    if($febric_img) {
        $image_url = base_url($febric_img->upload_dir . '/' . $febric_img->idno . '.' . $febric_img->extension);
        $html .= '<li><a href="'. $pro_url .'"><div class="picZoomer">'. $image_url .'</div></a></li>';
    }
    return $html;
}

function frontView($filename = '', $data = '') {
    $CI = get_instance();
    $html = '';

    $html .= $CI->load->view('header', $data, true);
    $html .= $CI->load->view($filename, $data, true);
    $html .= $CI->load->view('footer', $data, true);

    echo $html;
}

function countPortfolio($cat_id) {
    $CI = get_instance();
    $sql ="SELECT COUNT(*) AS `numrows` FROM `portfolio` WHERE `category` LIKE '%$cat_id,%'";
    return $result = $CI->db->query($sql)->row_object()->numrows;
}

function getCategoriesCommaSep($ids) {
    $CI = get_instance();
    $sql = "SELECT GROUP_CONCAT(`name`) AS name FROM portfolio_category WHERE id IN ($ids)";    
    $result = $CI->db->query($sql)->row_object();
    //echo $CI->db->last_query();
    return $result;
}