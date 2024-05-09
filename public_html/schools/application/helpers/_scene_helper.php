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
function owndebugger($var)
{
    echo '<pre>';
    print_r($var);
    echo '</pre>';
}

function dd($var)
{
    echo '<pre>';
    print_r($var);
    echo '</pre>';
    die();
}

function loadthemenow($var)
{
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
        case 'lightpinktheme':
            $theme = 'lightpinktheme';
            break;
        case 'lightviolettheme':
            $theme = 'lightviolettheme';
            break;
    }
    return $theme;
}

function load_css_file($themename)
{
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

function get_block($id)
{
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
function jsonEncode($data)
{
    header('Content-Type: application/json');
    return json_encode($data);
}

/**
 * @Helper::jsonDecode()
 * @Author: Idea Tweaker
 * @params:$data
 * @return
 */
function jsonDecode($data)
{
    return json_decode($data);
}

/**
 * @Helper::setSerialize()
 * @Author: Idea Tweaker
 * @params:$data
 * @return
 */
function serializeArr($data)
{
    return serialize($data);
}

/**
 * @Helper::unserializeArr()
 * @Author: Idea Tweaker
 * @params:$data
 * @return
 */
function unserializeArr($data)
{
    return unserialize($data);
}

/**
 * @Helper::base64Encode()
 * @Author: Idea Tweaker
 * @params:$data
 * @return
 */
function base64Encode($data)
{
    return base64_encode($data);
}

/**
 * @Helper::base64Decode()
 * @Author: Idea Tweaker
 * @params:$data
 * @return
 */
function base64Decode($data)
{
    return base64_decode($data);
}

/**
 * @Helper::implodeArr()
 * @Author: Idea Tweaker
 * @params:$separator
 * @params:$array
 * @return
 */
function implodeArr($separator, $array)
{
    return implode($separator, $array);
}

/**
 * @Helper::base64Decode()
 * @Author: Idea Tweaker
 * @params:$min
 * @params:$max
 * @return
 */
function getRange($min, $max)
{
    return range($min, $max);
}

/**
 * @Helper::base64Decode()
 * @Author: Idea Tweaker
 * @params:$min
 * @params:$max
 * @return
 */
function strReplace($match, $slag, $str)
{
    return str_replace($match, $slag, $str);
}

/**
 * @Helper::sprtf()
 * @Author: Idea Tweaker
 * @params:$num
 * @params:$slag
 * @return
 */
function sprtf($num, $slag)
{
    return sprintf('%.' . $slag . 'f', $num);
}

/**
 * @Helper::getDayLists()
 * @Author: Idea Tweaker
 * @return
 */
function getDayLists()
{

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

function getYearLists($limit = NULL) {
    $years = array_combine(range(date('Y')-(!empty($limit) ? $limit : 1), date('Y')+ (!empty($limit) ? $limit : 20)), range(date('Y')-(!empty($limit) ? $limit : 1), date('Y')+(!empty($limit) ? $limit : 20)));
    return $years;
}

/**
 * @Helper::getMonthLists()
 * @Author: Idea Tweaker
 * @return
 */
function getMonthLists()
{

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

/**
 * @Helper::setFirstLetterCapital()
 * @Author: Idea Tweaker
 * @params:$word
 * @return
 */
function setFirstLetterCapital($word)
{
    return ucfirst($word);
}

/**
 * @GeneralModel::getToken()
 * @access:public
 * @params:length
 * @Author: Idea Tweaker
 * @return $code
 */
function getToken($length = "")
{

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
function hashSha1($data)
{
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
function getRecordsHelper($table, $where, $option)
{

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
function mbConvertEncoding($text)
{
    return mb_convert_encoding($text, 'ISO-8859-15', 'UTF-8');
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
    return strip_tags($text);
}

/**
 * @package: NewPortal
 * @helper::getArraySum().
 * @Author: Idea Tweaker
 */
function getArraySum($array)
{
    return array_sum($array);
}

/**
 * @package: NewPortal
 * @helper::getCount().
 * @Author: Idea Tweaker
 */
function getCount($array)
{
    return count($array);
}

/**
 * @package: NewPortal
 * @helper::getArraySum().
 * @Author: Idea Tweaker
 */
function getExplode($slag, $str)
{
    return explode($slag, $str);
}

/**
 * @package: NewPortal
 * @helper::getArraySum().
 * @Author: Idea Tweaker
 */
function getImplode($slag, $str)
{
    return implode($slag, $str);
}

/**
 * @package: NewPortal
 * @helper::getRound().
 * @Author: Idea Tweaker
 */
function getRound($num, $decimal_num)
{
    return round($num, $decimal_num);
}

/**
 * @package: NewPortal
 * @helper::add_js().
 * @Author: Idea Tweaker
 */
if (!function_exists('add_js')) {

    function add_js($file = '')
    {
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

    function add_css($file = '')
    {
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

    function put_headers()
    {
        $str = '';
        $ci = &get_instance();
        $header_css = $ci->config->item('header_css');

        foreach ($header_css AS $item) {
            $str_css[] = $item;
            $str .= '<link rel="stylesheet" href="' . base_url($item) . '" type="text/css" />' . "\n";
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

    function put_footer()
    {
        $str = '';
        $ci = &get_instance();
        $footer_js = $ci->config->item('footer_js');

        foreach ($footer_js AS $item) {
            $str .= '<script  type="text/javascript"  src="' . base_url($item)  . '"></script>' . "\n";
        }

        return $str;
    }

}

/**
 * @package: NewPortal
 * @helper::setOutPut().
 * @Author: Idea Tweaker
 */
function setOutPut()
{
    $ci = &get_instance();
    $ci->output->set_output('YES');
}

/**
 * @package: NewPortal
 * @helper::isSession().
 * @Author: Idea Tweaker
 */
function isSession()
{
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
function isArray($array)
{
    return is_array($array);
}

/**
 * @package: NewPortal
 * @helper::isModerator().
 * @Author: Idea Tweaker
 */
function isModerator()
{
    return (getSession('token') == 1) ? 1 : 0;
}

/**
 * @package: NewPortal
 * @helper::isTeacher().
 * @Author: Idea Tweaker
 */
function isTeacher()
{
    return (getPriority() == 5) ? 1 : 0;
}

/**
 * @package: NewPortal
 * @helper::isStaff().
 * @Author: Idea Tweaker
 */
function isStaff()
{
    return (getPriority() == 3) ? 1 : 0;
}

/**
 * @package: NewPortal
 * @helper::isStudent().
 * @Author: Idea Tweaker
 */
function isStudent()
{
    return (getPriority() == 9) ? 1 : 0;
}

/**
 * @package: NewPortal
 * @helper::getPriority().
 * @Author: Idea Tweaker
 */
function getPriority()
{
    $ci = getInstance();
    return $ci->session->userdata("priority");
}

/**
 * @package: NewPortal
 * @helper::getInstance().
 * @Author: Idea Tweaker
 */
function getInstance()
{
    $ci = &get_instance();
    return $ci;
}

function loadCommon_model()
{
    $ci = getInstance();
    return $ci->load->model("admin/common_model");
}

/**
 * @package: NewPortal
 * @getOrientedDecision::getMaxArrayValue().
 * @Author: Idea Tweaker
 */
function getMaxArrayValue($array)
{
    return max($array);
}

/**
 * @package: NewPortal
 * @getOrientedDecision::getMinArrayValue().
 * @Author: Idea Tweaker
 */
function getMinArrayValue($array)
{
    return min($array);
}

/**
 * @package: NewPortal
 * @helper::getTime().
 * @Author: Idea Tweaker
 */
function getTime()
{
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
function setRules($config)
{

    $ci = getInstance();
    return $ci->form_validation->set_rules($config);
}

/**
 * @package: NewPortal
 * @helper::setCookies()
 * @access:private
 * @Author: Idea Tweaker
 */
function setCookies($cookie)
{
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
function getCookie($name)
{
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
function storeLogHistory($data)
{
    $ci = getInstance();
    $ci->common_model->insertRecords($ci->common_model->_logTable, $data);
}

/**
 * @helper::getUserIp()
 * @Author: Idea Tweaker
 */
function getUserIp()
{
    $ci = getInstance();
    return $ci->input->ip_address();
}

/**
 * @helper::alertShutdown()
 * @Author: Idea Tweaker
 */
function alertShutdown()
{
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
function getCurrentsUrl()
{
    return (isset($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : base_url();
}

/**
 * @package: NewPortal
 * @helper::getCurrentsUrl().
 * @Author: Idea Tweaker
 */
function getSession($session = NULL)
{
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
function getUserPhoto()
{
    $allsession = getSession();
    return $allsession['user_photo'];
}

/**
 * @package: NewPortal
 * @helper::getCurrentsUrl().
 * @Author: Idea Tweaker
 */
function getMesgNum()
{

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
function getUsers()
{
    $ci = getInstance();
    return $ci->common_model->getRecords($ci->common_model->_usersTable, '', 'all');
}

/**
 * @package: NewPortal
 * @helper::getUserById().
 * @Author: Idea Tweaker
 */
function getUserById($id)
{
    $ci = getInstance();
    return $ci->common_model->getRecords($ci->common_model->_usersTable, array('id' => $id), 's');
}

/**
 * @package: NewPortal
 * @helper::getUsersNum()().
 * @Author: Idea Tweaker
 */
function getUsersNum()
{

    $ci = getInstance();
    return $ci->common_model->getNumRows($ci->common_model->_usersTable, '');
}

/**
 * @package: NewPortal
 * @helper::getUsersNum()().
 * @Author: Idea Tweaker
 */
function isForceChangePwd()
{
    $allsession = getSession();
    return (isset($allsession['force_to_change_password']) && $allsession['force_to_change_password'] == 1) ? 1 : 0;
}

function __menu($name)
{
    echo base_url() . $name;
}

function __fmenu($url, $title, $cls = null)
{
    echo '<a href="' . base_url() . $url . '" class="' . (isset($cls) ? $cls : '') . '">' . $title . '</a>';
}

/**
 * @param $var
 */
function __e($var)
{
    echo $var;
}

function __random()
{
    srand(make_seed());
    $randval = rand();
    return $randval;
}

function make_seed()
{
    list($usec, $sec) = explode(' ', microtime());
    return (float)$sec + ((float)$usec * 100000);
}

/**
 * @param      $url Pass the img src
 * @param null $id Pass the id for css
 * @param null $cls pass the class for css
 * @param null $alt alternative tag
 * @param null $w width if any
 * @param null $h height if any
 */
function __img($url, $id = NULL, $cls = NULL, $alt = NULL, $w = NULL, $h = NULL)
{
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
 * @param $note string pass variable string and get output
 */
function __smallnote($note)
{
    echo '<small class="small_note">' . $note . '</small>';
}

function __pullright()
{
    echo '<span class="pull-right msgbox" style="display: block;"></span>';
}

/**
 * @param $btnid
 */
function __submitbtn($btnid)
{
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
function __resetbtn()
{
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
function __abtn($url, $cls, $btnname)
{
    echo '<a href="' . $url . '" class="' . $cls . '">' . $btnname . '</a>';
}

/**
 * @param null $param
 * @return bool|string
 */
function __now($param = null)
{
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
 * @param $extrasstring
 * @param $var
 */

function ifchecks($extrasstring, $var)
{
    if ($var) {
        echo $extrasstring;
        echo $var;
    }
}

/**
 * @param $date Formatted date
 * @return int Input as Integer to database
 */
function datetoint($date)
{
    $d = strtotime($date);
    return $d;
}

/**
 * @param $intvalue Pass integer value
 * @return bool|string return as date. e.g 03/27/2015
 */
function inttodate($intvalue)
{
    $d = date('Y-m-d', $intvalue);
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
/**
 * @param $intvalue
 * @return bool|string
 */
function inttodatebdy($intvalue)
{
    $d = date('Y-M-d', $intvalue);
    return $d;
}
/**
 * @param $intvalue
 * @return bool|string
 */
function inttodatebdm($intvalue, $opt = TRUE)
{
    if($opt = TRUE) {
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
function inttodateyear($intvalue, $opt = TRUE)
{
	if($opt = TRUE) {
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
function inttodatebdd($intvalue)
{
    $d = date('d', $intvalue);
    return $d;
}

/**
 * Get URL from youtube embed code
 *
 * @param $string
 * @return mixed
 */
function graburl($string)
{
    preg_match('/<iframe.*src=\"(.*)\".*><\/iframe>/isU', $string, $matches);
    //echo ($matches[0]); //only the <iframe ...></iframe> part
    return $matches[1];
}

function form_start_divs($m, $s = '')
{

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

function form_end_divs()
{
    return '</div></div>';
}

function settings_icons()
{
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

function settings_url()
{

}

function bn2enSomeCommonString($string) {
    $search_array = array("Female", "Male", "January", "February", "March", "April", "June", "July", "August", "September", "October", "November", "December");
    $replace_array = array("মহিলা", "পুরুষ", "জানুয়ারী", "ফেব্রুয়ারি", "মার্চ", "এপ্রিল", "মে", "জুন", "জুলাই", "আগস্ট", "সেপ্টেম্বর", "অক্টোবর", "নভেম্বর", "ডিসেম্বর");
    $en_number = str_replace($search_array, $replace_array, $string);
    return $en_number;
}
function bn2enNumber($number) {
    $search_array = array("১", "২", "৩", "৪", "৫", "৬", "৭", "৮", "৯", "০", "-");
    $replace_array = array("1", "2", "3", "4", "5", "6", "7", "8", "9", "0", "-");
    $en_number = str_replace($replace_array, $search_array, $number);
    return $en_number;
}

function sendSms($message, $receiver) {
    $smscontent = urlencode($message);
    $url = "http://app.planetgroupbd.com/api/sendsms/plain?user=habibkhan&password=01673771316&sender=Friend&SMSText=" . $smscontent . "&GSM=88" . $receiver . "";
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
    if($score>=80)
        return 'A+';
    if($score>=70)
        return 'A';
    if($score>=60)
        return 'A-';
    if($score>=50)
        return 'B';
    if($score>=40)
        return 'C';
    if($score>=33)
        return 'D';
    return 'F';
}
function makeGpa($score) { //just a rewrite of your own code, exactly the same purpose
    if($score>=80)
        return 5;
    if($score>=70)
        return 4;
    if($score>=60)
        return 3.5;
    if($score>=50)
        return 3;
    if($score>=40)
        return 2;
    if($score>=33)
        return  1;
    return 0;
}
function makeGpaGrade($score) { //just a rewrite of your own code, exactly the same purpose
    if($score>=5)
        return 'A+';
    if($score>=4)
        return 'A';
    if($score>=3.5)
        return 'A-';
    if($score>=3)
        return 'B';
    if($score>=2)
        return 'C';
    if($score>=1)
        return 'D';
    return 'F';
}


function newView($filename = '', $data = '') {
    $CI = get_instance();
    $html = '';
    $html .= $CI->load->view('layouts/header', $data, true);
    $html .= $CI->load->view($filename, $data, true);
    $html .= $CI->load->view('layouts/footer', $data, true);

    echo $html;
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



function tableSingleColumn($table = '', $column = '', $where = []) {
    $CI = get_instance();
    $html = '';
    $return = @$CI->db->get_where($table, $where)->row()->$column;
    return $return;
}

function global_results($user_id = '', $exam = '', $year = '', $return = '') {
    $CI = get_instance();
    $html = '';
    $cgpa = '';
    $grade = '';
    $all = '';
    $rs = $CI->reports_model->getResultByUserByYear($user_id, $exam, $year);
    $all .= '<div class="result-table">
            <div class="col-md-2"><b>Was Absent?</b></div>
            <div class="col-md-4"><b>Subject Name</b></div>
            <div class="col-md-1"><b>Written</b></div>
            <div class="col-md-1"><b>MCQ</b></div>
            <div class="col-md-1"><b>Practical</b></div>
            <div class="col-md-1"><b>Total</b></div>
            <div class="col-md-1"><b>Grade</b></div>
            <div class="col-md-1"><b>GPA</b></div>';
    $count = 1; $gradesum = 0;
    foreach($rs as $key => $value) {
        $total = array($value['Written'], $value['MCQ'], $value['Practical'], $value['Listening'], $value['Writting'], $value['Speaking'], $value['Reading']);
        $totalSum = array_sum($total);
        $grade = makeGrade($totalSum);
        $gpa = makeGpa($totalSum);
        $gradesum += $gpa;
        $grades[] = $grade;

        if($value['IsAbsent'] == 0) {
            $abs = 'No';
        } else {
            $abs = 'Yes';
        }

        $all .= '<div class="col-md-2"><b>'. $abs .'</div>
            <div class="col-md-4">'. $value['subject_name'] .'</div>
            <div class="col-md-1">'. $value['Written'] .'</div>
            <div class="col-md-1">'. $value['MCQ'] .'</div>
            <div class="col-md-1">'. $value['Practical'] .'</div>
            <div class="col-md-1">'. $totalSum .'</div>
            <div class="col-md-1">' . $grade .'</div>
            <div class="col-md-1">'. $gpa .'</div>
            ';

        $count ++;
    }
    $avgcgpa = sprintf("%.2f", $gradesum/$count);
    if (in_array("F", @$grades)) {
        $fcgpa = 0;
        $fgrade = "F";
    } else {
        $fcgpa = $avgcgpa;
        $fgrade = makeGpaGrade($fcgpa);
    }

    $all .= '<div class="col-md-10"><b>Total Result</b></div>
            <div class="col-md-1"><b>'. $fgrade .'</b></div>
            <div class="col-md-1"><b>'. $fcgpa .'</b></div></div>';

    if($return == 'grade') {
        $return = $fgrade;
    }else if($return == 'cgpa') {
        $return = $fcgpa;
    } else {
        $return = $all;
    }

    return $return;
}
function global_results_old($user_id = '', $exam = '', $year = '', $return = '') {
    $CI = get_instance();
    $html = '';
    $cgpa = '';
    $grade = '';
    $all = '';
    $rs = $CI->reports_model->getResultByUserByYear($user_id, $exam, $year);

    /*$all .= '<table style="width: 900px;table-layout:fixed; font-size: 12px; font-family: \'Trebuchet MS\', sans-serif;">
                <tr style="border: 1px solid #DDD; border-collapse: collapse;">
                    <th style="text-align: left;border: 1px solid #DDD; border-collapse: collapse; padding: 5px;">Was Absent?</th>
                    <th  width="200" style="text-align: left;border: 1px solid #DDD; border-collapse: collapse; padding: 5px;">Subject Name</th>
                    <th style="text-align: left;border: 1px solid #DDD; border-collapse: collapse; padding: 5px;">Written</th>
                    <th style="text-align: left;border: 1px solid #DDD; border-collapse: collapse; padding: 5px;">MCQ</th>
                    <th style="text-align: left;border: 1px solid #DDD; border-collapse: collapse; padding: 5px;">Practical</th>
                    <th style="text-align: left;border: 1px solid #DDD; border-collapse: collapse; padding: 5px;">Total</th>
                    <th style="text-align: left;border: 1px solid #DDD; border-collapse: collapse; padding: 5px;">Grade</th>
                    <th style="text-align: left;border: 1px solid #DDD; border-collapse: collapse; padding: 5px;">GPA</th>
                </tr>';
   */

    $all .= '<div class="result-table">
            <div class="col-md-2"><b>Was Absent?</b></div>
            <div class="col-md-4"><b>Subject Name</b></div>
            <div class="col-md-1"><b>Written</b></div>
            <div class="col-md-1"><b>MCQ</b></div>
            <div class="col-md-1"><b>Practical</b></div>
            <div class="col-md-1"><b>Total</b></div>
            <div class="col-md-1"><b>Grade</b></div>
            <div class="col-md-1"><b>GPA</b></div>';



    $count = 1; $gradesum = 0;
    foreach($rs as $key => $value) {
        $total = array($value['Written'], $value['MCQ'], $value['Practical'], $value['Listening'], $value['Writting'], $value['Speaking'], $value['Reading']);
        $totalSum = array_sum($total);
        $grade = makeGrade($totalSum);
        $gpa = makeGpa($totalSum);
        $gradesum += $gpa;
        $grades[] = $grade;

        if($value['IsAbsent'] == 0) {
            $abs = 'No';
        } else {
            $abs = 'Yes';
        }
        /*$all .= '<tr>
                    <td style="text-align: left;border: 1px solid #DDD; border-collapse: collapse; padding: 5px;">'. $abs .'</td>
                    <td style="text-align: left;border: 1px solid #DDD; border-collapse: collapse; padding: 5px;">'. $value['subject_name'] .'</td>
                    <td style="text-align: left;border: 1px solid #DDD; border-collapse: collapse; padding: 5px;">'. $value['Written'] .'</td>
                    <td style="text-align: left;border: 1px solid #DDD; border-collapse: collapse; padding: 5px;">'. $value['MCQ'] .'</td>
                    <td style="text-align: left;border: 1px solid #DDD; border-collapse: collapse; padding: 5px;">'. $value['Practical'] .'</td>
                    <td style="text-align: left;border: 1px solid #DDD; border-collapse: collapse; padding: 5px;">'. $totalSum .'</td>
                    <td style="text-align: left;border: 1px solid #DDD; border-collapse: collapse; padding: 5px;">' . $grade .'</td>
                    <td style="text-align: left;border: 1px solid #DDD; border-collapse: collapse; padding: 5px;">'. $gpa .'</td>
                </tr>';*/

        $all .= '<div class="col-md-2"><b>'. $abs .'</div>
            <div class="col-md-4">'. $value['subject_name'] .'</div>
            <div class="col-md-1">'. $value['Written'] .'</div>
            <div class="col-md-1">'. $value['MCQ'] .'</div>
            <div class="col-md-1">'. $value['Practical'] .'</div>
            <div class="col-md-1">'. $totalSum .'</div>
            <div class="col-md-1">' . $grade .'</div>
            <div class="col-md-1">'. $gpa .'</div>
            </div>
            ';

        $count ++;
    }
    $avgcgpa = sprintf("%.2f", $gradesum/$count);
    if (in_array("F", @$grades)) {
        $fcgpa = 0;
        $fgrade = "F";
    } else {
        $fcgpa = $avgcgpa;
        $fgrade = makeGpaGrade($fcgpa);
    }



    /*$all .= '<tr style="text-align: left;border: 1px solid #DDD; border-collapse: collapse; padding: 5px;">
                    <th style="text-align: left;border: 1px solid #DDD; border-collapse: collapse; padding: 5px;" colspan="6">Total Result </th>
                    <th style="text-align: left;border: 1px solid #DDD; border-collapse: collapse; padding: 5px;">'. $fgrade .'</th>
                    <th style="text-align: left;border: 1px solid #DDD; border-collapse: collapse; padding: 5px;">'. $fcgpa .'</th>
                </tr>
            </table>';*/


    $all .= '<div class="col-md-10"><b>Total Result</b></div>
            <div class="col-md-1"><b>'. $fgrade .'</b></div>
            <div class="col-md-1"><b>'. $fcgpa .'</b></div>';


    //$all_res = "<table><tr><td>Ame</td><td>Tume</td><td>Se</td></tr></table>";
    //$all_res = "<div><table><tr><td>Ame</td><td>Tume</td><td>Se</td></tr></table></div>";
    //$all_res = '<div><table><tr><td>Ame</td><td>Tume</td><td>Se</td></tr></table></div>';

    if($return == 'grade') {
        $return = $fgrade;
    }else if($return == 'cgpa') {
        $return = $fcgpa;
    } else {
        $return = $all;
    }

    return $return;

}

?>