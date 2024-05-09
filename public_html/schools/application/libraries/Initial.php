<?php

/**
 * Created by Samrat Khan.
 * User: Dell
 * Date: 9/14/2015
 * Time: 12:42 PM
 */
class Initial
{
    var $static_url = 'http://static.domain.com';

    # application settings
    function initial_settings()
    {
        $settings = new stdClass();
        $settings->site_title = 'Smart Campus';
        $settings->domain_name = 'ideatweaker.com';
        $settings->site_slogan = 'One Stop Campus Management System';


        $settings->site_url = 'http://localhost/smartcampus/';
        $settings->upload_path = $settings->site_url . 'uploads';
        $settings->loading_image = $settings->site_url . 'footprints/img/loading.gif';


        $settings->site_url_prefix = 'http://ideatweaker.com/';
        $settings->admin_url_prefix = '//';
        $settings->email_from = 'skydotint@gmail.com';
        $settings->support_email = 'skydotint@gmail.com';
        $settings->secondary_host = '';
        $settings->secondary_username = 'root';
        $settings->secondary_password = '';
        $settings->secondary_database = '';

        return $settings;
    }

    function get_customer_service_contact($param = null, $class = null)
    {
        # $class = css class
        $phone = '';
        $email = 'skydotint@gmail.com';
        $address = 'Dhaka, Bangladesh';
        switch ($param) {
            case 'phone':
                return '<span class="' . $class . '">' . $phone . '</span>';
                break;
            case 'email':
                return '<span class="' . $class . '">' . $email . '</span>';
                break;
            case 'both_br':
                return '<span class="' . $class . '">' . $phone . '<br />' . $email . '</span>';
                break;
            case 'full':
                return '<span class="' . $class . '">' . $phone . ', ' . $email . '</span><br />' . $address;
                break;
            default:
                return '<span class="' . $class . '">' . $phone . ', ' . $email . '</span>';
                break;
        }
    }

    function now($param = null)
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

    function formated_date($param = null, $format = null, $type = null)
    {
        if (!$param || $param == '' || substr($param, 0, 4) == '0000') return false;
        if ($format) {
            return date($format, strtotime($param));

        } elseif ($type == 'full') {
            return date("F d, Y h:i a", strtotime($param));

        } elseif ($type == 'time') {
            return date("h:i a", strtotime($param));

        } else {
            return date("F d, Y", strtotime($param));
        }
    }

    function first_of_month($year = 'Y', $month = 'm')
    {
        return date($year . "-" . $month . "-d", strtotime(date($month) . '/01/' . date($year) . ' 00:00:00'));
    }

    function last_of_month($year = 'Y', $month = 'm')
    {
        return date($year . "-" . $month . "-d", strtotime('-1 second', strtotime('+1 month', strtotime(date($month) . '/01/' . date($year) . ' 00:00:00'))));
    }

    function encrypt_decrypt($key, $type)
    {
        # type = encrypt/decrypt
        $secret = "XxOx*4e!hQqG5b~9a";
        if (!$key) {
            return false;
        }

        if ($type == 'decrypt') {
            $key = strtr(urldecode($key), '-_,', '+/=');
            $original = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($secret), base64_decode($key), MCRYPT_MODE_CBC, md5(md5($secret))), "\0");
            return $original;

        } elseif ($type == 'encrypt') {
            $verification_key = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($secret), $key, MCRYPT_MODE_CBC, md5(md5($secret))));
            return urlencode(strtr($verification_key, '+/=', '-_,'));
        }

        return FALSE;    # if function is not used properly
    }

    function special_char_escape($val)
    {
        return preg_replace('/[^a-zA-Z0-9._-]+/', ' ', $val);
    }

    function get_seo_title($value = null)
    {
        return htmlspecialchars($this->special_char_escape($value));
    }

    function get_item_url($id = null, $category = null, $title = null, $param = null)
    {
        $url_prefix = $this->settings()->site_url_prefix;
        $item_url = null;
        $safe_category = trim(preg_replace('/[^a-zA-Z0-9]+/', '-', strtolower($category)), '-');
        $safe_title = trim(preg_replace('/[^a-zA-Z0-9]+/', '-', strtolower($title)), '-');
        switch ($param) {
            case 'category':
                $item_url = $url_prefix . "product_catalog/category/{$safe_category}/{$id}.html";
                break;
            case 'product':
                $item_url = $url_prefix . "product_details/{$safe_category}/{$id}-{$safe_title}.html";
                break;
            case 'keyword':
                $item_url = $url_prefix . "product_catalog/keyword/";
                break;
            default:
                $item_url = $url_prefix . "product_details/{$safe_category}/{$id}-{$safe_title}.html";
        }

        return $item_url;
    }

    function get_safe_url($value)
    {
        $safe_title = trim(preg_replace('/[^a-zA-Z0-9.]+/', '-', strtolower($value)), '-');
        return "{$safe_title}";
    }


    # call this function to upload images
    # Maximum 5 images are allowed, one large and one small image is created along with the original image
    function process_image_multiple($content_name, $image_name, $image_path, $max_image, $process_function = 'thumb')
    {
        $image_path = $this->get_path($image_path);
        $width_small = 100;
        $height_small = 100;
        $width_mid = 260;
        $height_mid = 260;
        $width_large = 460;
        $height_large = 460;


        foreach ($_FILES[$content_name]['tmp_name'] as $k => $v) {
            if ($v && $k < $max_image) {
                /*image does not replaced on exist image*/
                $img_count = 0;
                for ($key = 0; $key < $max_image; $key++) {
                    $file = $image_path . "{$image_name}_{$key}_small.jpg";
                    if (!file_exists($file)) {
                        break;
                    }
                    $img_count++;
                }
                if ($img_count >= $max_image) {
                    return FALSE;
                }

                $img_original = $image_path . "{$image_name}_{$key}_original.jpg";
                $img_small = $image_path . "{$image_name}_{$key}_small.jpg";
                $img_mid = $image_path . "{$image_name}_{$key}_mid.jpg";
                $img_large = $image_path . "{$image_name}_{$key}_large.jpg";

                if (!$this->image_upload($v, $img_original)) {
                    return FALSE;
                }

                $this->image_resize($img_original, $img_small, $width_small, $height_small, $process_function);
                $this->image_resize($img_original, $img_mid, $width_mid, $height_mid, $process_function);
                $this->image_resize($img_original, $img_large, $width_large, $height_large, $process_function);
                unlink($img_original);
            }
        }
        return TRUE;
    }

    /*single image process*/
    function process_image_single($content_name, $image_name, $image_path_prefix, $image_width, $image_height, $process_function = 'thumb', $master_dim = null)
    {
        if ($_FILES[$content_name]['tmp_name']) {
            $info = getimagesize($_FILES[$content_name]['tmp_name']);
            if ($info['mime'] != 'image/gif' && $info['mime'] != 'image/jpeg' && $info['mime'] != 'image/png' && $info['mime'] != 'image/bmp') {
                return FALSE;
            }

            $new_file_name = $this->get_path($image_path_prefix) . $image_name . '.jpg';
            $this->image_upload($_FILES[$content_name]['tmp_name'], $new_file_name);
            $this->image_resize($new_file_name, $new_file_name, $image_width, $image_height, $process_function, $master_dim);
            return true;
        }

        return false;
    }

    # upload a single image
    function image_upload($source, $save_as)
    {
        $info = getimagesize($source);

        if (!copy($source, $save_as)) {
            move_uploaded_file($source, $save_as);
        }

        return TRUE;
    }

    # upload file(s) with default file name
    function upload_file($SourceContainer, $Destination, $NamePrefix)
    {
        if (!isset($_FILES[$SourceContainer]['name']) || !$_FILES[$SourceContainer]['name']) {
            return false;
        }

        if (is_array($_FILES[$SourceContainer]['name']) && $_FILES[$SourceContainer]['name'][0]) {
            foreach ($_FILES[$SourceContainer]['name'] as $k => $v) {
                $FileName = $NamePrefix . $_FILES[$SourceContainer]['name'][$k];
                //$FileName = $this->get_safe_url($FileName);
                move_uploaded_file($_FILES[$SourceContainer]['tmp_name'][$k], $Destination . $FileName);
            }
            return true;
        }

        $FileName = $NamePrefix . $_FILES[$SourceContainer]['name'];
        //$FileName = $this->get_safe_url($FileName);
        move_uploaded_file($_FILES[$SourceContainer]['tmp_name'], $Destination . $FileName);
        return true;
    }

    # rezie and crop a single image
    function image_resize($oldFile, $newFile, $width, $height, $process_function = 'thumb', $master_dim = 'width')
    {
        $CI =& get_instance();

        //load library if not previously loaded
        if (!isset($CI->image_lib)) {
            $CI->load->library('image_lib');
        }

        if ($process_function == 'crop') {
            /*crop image*/
            $img = getimagesize($oldFile);
            $size = Array('width' => $img['0'], 'height' => $img['1']);
            unset($config);

            //Crop image  in weight, height
            $config['image_library'] = 'gd2';
            $config['source_image'] = $newFile;
            $config['maintain_ratio'] = FALSE;
            $config['width'] = $width;
            $config['height'] = $height;
            $config['y_axis'] = round(($size['height'] - $height) / 2);
            $config['x_axis'] = 0;
            $CI->image_lib->clear();
            $CI->image_lib->initialize($config);
            if (!$CI->image_lib->crop()) {
                return FALSE;
            }
            return true;

        } elseif ($process_function == 'both') {
            /*resize and crop image*/
            $config['image_library'] = 'gd2';
            $config['source_image'] = $oldFile;
            $config['new_image'] = $newFile;
            $config['maintain_ratio'] = TRUE;
            $config['master_dim'] = 'width';
            $config['width'] = $width;
            $config['height'] = $height;
            $CI->image_lib->clear();
            $CI->image_lib->initialize($config);
            $CI->image_lib->resize();

            $img = getimagesize($newFile);
            $size = Array('width' => $img['0'], 'height' => $img['1']);
            unset($config);

            //Crop image  in weight, height
            $config['image_library'] = 'gd2';
            $config['source_image'] = $newFile;
            $config['maintain_ratio'] = FALSE;
            $config['width'] = $width;
            $config['height'] = $height;
            $config['y_axis'] = round(($size['height'] - $height) / 2);
            $config['x_axis'] = 0;
            $CI->image_lib->clear();
            $CI->image_lib->initialize($config);
            if (!$CI->image_lib->crop()) {
                return FALSE;
            }
            return true;
        }

        //By default: Image will be resized in thumb format
        $config['image_library'] = 'gd2';
        $config['source_image'] = $oldFile;
        $config['new_image'] = $newFile;
        $config['maintain_ratio'] = TRUE;
        //$config['master_dim'] = $master_dim; /*commented for thumbnail style*/
        $config['width'] = $width;
        $config['height'] = $height;
        $CI->image_lib->clear();
        $CI->image_lib->initialize($config);
        $CI->image_lib->resize();

        return TRUE;
    }

    # check uploaded file format
    function check_file_type(array $file_type, $source_container, $AdditionalData, $ViewName)
    {
        $is_ok = FALSE;
        $CI =& get_instance();

        if (!$_FILES || !isset($_FILES[$source_container])) {
            echo 'No file posted!';
            exit;
        }

        # multiple image uploader
        if (is_array($_FILES[$source_container]['name']) && $_FILES[$source_container]['name'][0]) {
            foreach ($_FILES[$source_container]['type'] as $k => $v) {
                $type = $_FILES[$source_container]['type'][$k];
                foreach ($file_type as $k => $v) {
                    switch ($v) {
                        case 'doc':
                            if ($type == 'application/msword') {
                                $is_ok = TRUE;
                            }
                            break;
                        case 'docx':
                            if ($type == 'application/vnd.openxmlformats-officedocument.wordprocessingml.document') {
                                $is_ok = TRUE;
                            }
                            break;
                        case 'zip':
                            if ($type == 'application/zip') {
                                $is_ok = TRUE;
                            }
                            break;
                        case 'pdf':
                            if ($type == 'application/pdf' || $type == 'application/htm') {
                                $is_ok = TRUE;
                            }
                            break;
                        case 'xls':
                            if ($type == 'application/vnd.ms-excel') {
                                $is_ok = TRUE;
                            }
                            break;
                        case 'xlsx':
                            if ($type == 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet') {
                                $is_ok = TRUE;
                            }
                            break;
                        case 'jpg':
                            if ($type == 'image/jpeg') {
                                $is_ok = TRUE;
                            }
                            break;
                        case 'jpeg':
                            if ($type == 'image/jpeg') {
                                $is_ok = TRUE;
                            }
                            break;
                        case 'png':
                            if ($type == 'image/png') {
                                $is_ok = TRUE;
                            }
                            break;
                        case 'bmp':
                            if ($type == 'image/bmp') {
                                $is_ok = TRUE;
                            }
                            break;
                        case 'gif':
                            if ($type == 'image/gif') {
                                $is_ok = TRUE;
                            }
                            break;
                        case 'sql':
                            if ($type == 'text/x-sql') {
                                $is_ok = TRUE;
                            }
                            break;
                        case 'csv':
                            if ($type == 'text/csv') {
                                $is_ok = TRUE;
                            }
                            break;
                        case 'txt':
                            if ($type == 'text/plain') {
                                $is_ok = TRUE;
                            }
                            break;
                        case 'xml':
                            if ($type == 'text/xml') {
                                $is_ok = TRUE;
                            }
                            break;
                    }
                }
            }

            if (!$is_ok) {
                $this->message_board('File Type Invalid or File is too large. Please change your attachment file.');
                $string = $CI->load->view($ViewName, $AdditionalData, true);
                echo $string;
                exit;
            }
        }

        # single image uploader
        $type = $_FILES[$source_container]['type'];
        foreach ($file_type as $k => $v) {
            switch ($v) {
                case 'doc':
                    if ($type == 'application/msword') {
                        $is_ok = TRUE;
                    }
                    break;
                case 'docx':
                    if ($type == 'application/vnd.openxmlformats-officedocument.wordprocessingml.document') {
                        $is_ok = TRUE;
                    }
                    break;
                case 'zip':
                    if ($type == 'application/zip') {
                        $is_ok = TRUE;
                    }
                    break;
                case 'pdf':
                    if ($type == 'application/pdf' || $type == 'application/htm') {
                        $is_ok = TRUE;
                    }
                    break;
                case 'xls':
                    if ($type == 'application/vnd.ms-excel') {
                        $is_ok = TRUE;
                    }
                    break;
                case 'xlsx':
                    if ($type == 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet') {
                        $is_ok = TRUE;
                    }
                    break;
                case 'jpg':
                    if ($type == 'image/jpeg' || $type == 'image/pjpeg') {
                        $is_ok = TRUE;
                    }
                    break;
                case 'jpeg':
                    if ($type == 'image/jpeg' || $type == 'image/pjpeg') {
                        $is_ok = TRUE;
                    }
                    break;
                case 'png':
                    if ($type == 'image/png' || $type == 'image/x-png') {
                        $is_ok = TRUE;
                    }
                    break;
                case 'bmp':
                    if ($type == 'image/bmp' || $type == 'image/x-windows-bmp') {
                        $is_ok = TRUE;
                    }
                    break;
                case 'gif':
                    if ($type == 'image/gif') {
                        $is_ok = TRUE;
                    }
                    break;
                case 'sql':
                    if ($type == 'text/x-sql') {
                        $is_ok = TRUE;
                    }
                    break;
                case 'csv':
                    if ($type == 'text/csv') {
                        $is_ok = TRUE;
                    }
                    break;
                case 'txt':
                    if ($type == 'text/plain') {
                        $is_ok = TRUE;
                    }
                    break;
                case 'xml':
                    if ($type == 'text/xml') {
                        $is_ok = TRUE;
                    }
                    break;
            }
        }

        if (!$is_ok) {
            $this->message_board('File Type Invalid or File is too large. Please change your attachment file.');
            $string = $CI->load->view($ViewName, $AdditionalData, true);
            echo $string;
            exit;
        }
    }

    # excell reader and uploader
    function excel_reader($FileName, $SheetIndex = 0, array $FieldCaption)
    {
        # $ExcutionType = return/execute
        # $FileName - need to add \\ before file name if we enter file name manually - Ex: FCPATH."application\libraries\php-excel\\test.xls"

        error_reporting(E_ALL ^ E_NOTICE);

        # load plugin
        require_once 'php-excel/excel_reader2.php';

        $data = new Spreadsheet_Excel_Reader($FileName, false);
        if (!$data) {
            return false;
        }

        $GetCaption = $data->sheets[(int)$SheetIndex]['cells'][1];
        foreach ($GetCaption as $k => $v) {
            if (count($FieldCaption) != count($GetCaption)) {
                return false;
            } elseif ($FieldCaption[$k] != $GetCaption[$k + 1]) {
                return false;
            }
        }

        unset($data->sheets[(int)$SheetIndex]['cells'][1]);
        return $data->sheets[(int)$SheetIndex]['cells'];
    }

    # get time difference
    function time_since($start_date, $end_date)
    {
        if ($start_date > $end_date) {
            return false;
        }

        $start_date = strtotime($start_date);
        $end_date = strtotime($end_date);
        $seconds = $end_date - $start_date;

        $minutes = 0;
        $hours = 0;
        $days = 0;
        $weeks = 0;
        $months = 0;
        $years = 0;

        $additional = null;
        if ($seconds == 0) {
            $seconds = 1;
        }

        if ($seconds > 60) {
            $minutes = $seconds / 60;
            if (($seconds % 60) > 0) {
                $additional[] = ($seconds % 60) . ' second(s)';
            }

        } else {
            return $this->time_since_extended($seconds, 'second');
        }

        if ($minutes >= 60) {
            $hours = $minutes / 60;
            if (($minutes % 60) > 0) {
                $additional[] = ($minutes % 60) . ' minute(s)';
            }

        } else {
            return $this->time_since_extended($minutes, 'minute(s)');
        }

        if ($hours >= 24) {
            $days = $hours / 24;
            if (($hours % 24) > 0) {
                $additional[] = ($hours % 24) . ' hour(s)';
            }

        } else {
            return $this->time_since_extended($hours, 'hour(s)', $additional);
        }

        if ($days >= 7) {
            $weeks = $days / 7;
        } else {
            return $this->time_since_extended($days, 'day(s)', $additional);
        }

        if ($weeks >= 4) {
            $months = $weeks / 4;
        } else {
            return $this->time_since_extended($weeks, 'week(s)', $additional);
        }

        if ($months >= 12) {
            $years = $months / 12;
            return $this->time_since_extended($years, 'year(s)', $additional);

        } else {
            return $this->time_since_extended($months, 'month(s)', $additional);
        }

    }

    # connected with time_since function
    function time_since_extended($num, $word, $additional = null)
    {
        if ($additional) {
            krsort($additional);
            $additional = '&nbsp;' . implode('&nbsp;', $additional);
        }
        $num = floor($num);
        if ($num < 1) {
            return false;
        } else {
            return $num . ' ' . $word . $additional;
        }
    }

    function posted($timestamp)
    {
        return date('M j @ g:ia', strtotime($timestamp));
    }

    function tk($number = null)
    {
        $format = '#,##,#,#,###';
        $fraction = '';
        $negetive = null;
        if ($number < 0) {
            $negetive = '-';
            $number = substr($number, 1);
        }

        $number = round($number, 2);
        $len = strlen($number);
        $rt = null;

        if (strpos($number, '.')) {
            $fraction = substr($number, strpos($number, '.', 2));
            $number = substr($number, 0, strpos($number, '.', 2));
            $len = strlen($number);
        }

        $format = substr($format, $len * -1, $len);

        for ($i = 1; $i <= $len; $i++) {
            if (substr($format, $i * -1, 1) != '#')
                $rt = substr($format, $i * -1, 1) . $rt;

            $rt = substr($number, $i * -1, 1) . $rt;
        }

        if (!$fraction) {
            $fraction = '.00';
        }

        # taka sign in html &#2547;
        return $negetive . $rt . $fraction;
    }

    function currency_chooser($value)
    {
        if (!isset($_SESSION['currency'])) {
            $_SESSION['currency'] = 'AED'; //default currency
        }

        if (!isset($_SESSION['currency_rate'])) {
            $_SESSION['currency_rate'] = 1;
        }
        $currency_rate = $_SESSION['currency_rate'];

        switch ($_SESSION['currency']) {
            case 'USD':
                return '$' . round($value * $currency_rate, 2);
                break;

            case 'EUR':
                return '&euro; ' . round($value * $currency_rate, 2);
                break;

            case 'KWD':
                return 'KD ' . round($value * $currency_rate, 2);
                break;

            case 'SAR':
                return 'SR ' . round($value * $currency_rate, 2);
                break;

            case 'EGP':
                return 'EG&pound; ' . round($value * $currency_rate, 2);
                break;

            default:
                $_SESSION['currency'] = 'AED';
                return 'AED ' . round($value);
        }
    }

    function month_convert($number = null, $text = null)
    {
        if ($number) {
            switch ($number) {
                case '1':
                case '01':
                    $number = 'January';
                    break;
                case '2':
                case '02':
                    $number = 'February';
                    break;
                case '3':
                case '03':
                    $number = 'March';
                    break;
                case '4':
                case '04':
                    $number = 'April';
                    break;
                case '5':
                case '05':
                    $number = 'May';
                    break;
                case '6':
                case '06':
                    $number = 'June';
                    break;
                case '7':
                case '07':
                    $number = 'July';
                    break;
                case '8':
                case '08':
                    $number = 'August';
                    break;
                case '9':
                case '09':
                    $number = 'September';
                    break;
                case '10':
                    $number = 'October';
                    break;
                case '11':
                    $number = 'November';
                    break;
                case '12':
                    $number = 'December';
                    break;
            }
            return $number;
        }

        if ($text) {
            switch ($text) {
                case 'January':
                    $text = '01';
                    break;
                case 'February':
                    $text = '02';
                    break;
                case 'March':
                    $text = '03';
                    break;
                case 'April':
                    $text = '04';
                    break;
                case 'May':
                    $text = '05';
                    break;
                case 'June':
                    $text = '06';
                    break;
                case 'July':
                    $text = '07';
                    break;
                case 'August':
                    $text = '08';
                    break;
                case 'September':
                    break;
                    $text = '09';
                case 'October':
                    break;
                    $text = '10';
                case 'November':
                    break;
                    $text = '11';
                case 'December':
                    break;
                    $text = '12';
            }
            return $text;
        }

        return false;
    }

    function convert_number_to_words($number)
    {
        $hyphen = '-';
        $conjunction = ' and ';
        $separator = ', ';
        $negative = 'negative ';
        $decimal = ' point ';
        $dictionary = array(
            0 => 'zero',
            1 => 'one',
            2 => 'two',
            3 => 'three',
            4 => 'four',
            5 => 'five',
            6 => 'six',
            7 => 'seven',
            8 => 'eight',
            9 => 'nine',
            10 => 'ten',
            11 => 'eleven',
            12 => 'twelve',
            13 => 'thirteen',
            14 => 'fourteen',
            15 => 'fifteen',
            16 => 'sixteen',
            17 => 'seventeen',
            18 => 'eighteen',
            19 => 'nineteen',
            20 => 'twenty',
            30 => 'thirty',
            40 => 'fourty',
            50 => 'fifty',
            60 => 'sixty',
            70 => 'seventy',
            80 => 'eighty',
            90 => 'ninety',
            100 => 'hundred',
            1000 => 'thousand',
            1000000 => 'million',
            1000000000 => 'billion',
            1000000000000 => 'trillion',
            1000000000000000 => 'quadrillion',
            1000000000000000000 => 'quintillion'
        );

        if (!is_numeric($number)) {
            return false;
        }

        if (($number >= 0 && (int)$number < 0) || (int)$number < 0 - PHP_INT_MAX) {
            // overflow
            trigger_error(
                'convert_number_to_words only accepts numbers between -' . PHP_INT_MAX . ' and ' . PHP_INT_MAX,
                E_USER_WARNING
            );
            return false;
        }

        if ($number < 0) {
            return $negative . $this->convert_number_to_words(abs($number));
        }

        $string = $fraction = null;

        if (strpos($number, '.') !== false) {
            list($number, $fraction) = explode('.', $number);
        }

        switch (true) {
            case $number < 21:
                $string = $dictionary[$number];
                break;
            case $number < 100:
                $tens = ((int)($number / 10)) * 10;
                $units = $number % 10;
                $string = $dictionary[$tens];
                if ($units) {
                    $string .= $hyphen . $dictionary[$units];
                }
                break;
            case $number < 1000:
                $hundreds = $number / 100;
                $remainder = $number % 100;
                $string = $dictionary[$hundreds] . ' ' . $dictionary[100];
                if ($remainder) {
                    $string .= $conjunction . $this->convert_number_to_words($remainder);
                }
                break;
            default:
                $baseUnit = pow(1000, floor(log($number, 1000)));
                $numBaseUnits = (int)($number / $baseUnit);
                $remainder = $number % $baseUnit;
                $string = $this->convert_number_to_words($numBaseUnits) . ' ' . $dictionary[$baseUnit];
                if ($remainder) {
                    $string .= $remainder < 100 ? $conjunction : $separator;
                    $string .= $this->convert_number_to_words($remainder);
                }
                break;
        }

        if (null !== $fraction && is_numeric($fraction)) {
            $string .= $decimal;
            $words = array();
            foreach (str_split((string)$fraction) as $number) {
                $words[] = $dictionary[$number];
            }
            $string .= implode(' ', $words);
        }

        return $string;
    }

    # $reply_to is optional. If not defined, $from will be used
    # $html accepts 'html' which is optional. If not defined, plain text will be used
    function email($to, $subject, $message, $cc = NULL, $bcc = NULL, $attachment = NULL, $reply_to = NULL, $html = NULL)
    {
        $CI =& get_instance();

        # to send email using google's smtp server
        $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_user' => 'hrm@nns-solution.net',
            'smtp_pass' => 'nns@1212',
            'mailtype' => 'html',
            'charset' => 'iso-8859-1'
        );
        $CI->load->library('email', $config);
        # end smtp config

        /*
        $config = array(
            'wordwrap' => FALSE
        );

        if($html && $html=='html'){
            $config = array_merge( $config, array('mailtype' => 'html') );
        }
        */

        //load library if not previously loaded
        if (!isset($CI->email)) {
            $CI->load->library('email', $config);
        }

        $CI->email->clear(TRUE);
        $CI->email->set_newline("\r\n");
        $CI->email->from($this->settings()->email_from, $this->settings()->domain_name);
        $CI->email->to($to);
        $CI->email->subject($subject);
        $CI->email->message($message);

        if ($cc) {
            $CI->email->cc($cc);
        }

        if ($bcc) {
            $CI->email->bcc($bcc);
        }

        if ($attachment) {
            if (is_array($attachment)) {
                foreach ($attachment as $k222 => $v222) {
                    $CI->email->attach($v222);
                }

            } else {
                $CI->email->attach($attachment);
            }

        }

        if ($reply_to) {
            $CI->email->reply_to($reply_to);
        }

        if ($CI->email->send()) {
            return TRUE;
        } else {
            return FALSE;
        }

    }

    # send many emails using a single request
    # email addresses must be separated by comma
    function massmail($to, $subject, $message, $from_text = null, $from_email = null, $email_type = null)
    {
        if (!$from_text) $from_text = $this->settings()->domain_name;
        if (!$from_email) $from_email = $this->settings()->email_from;

        $headers = "MIME-Version: 1.0\r\n";
        if ($email_type) {
            $headers .= "Content-Type: text/plain; charset=US-ASCII\r\n";
        } else {
            $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
        }
        //$headers .= "To: $to\r\n";
        $headers .= "From: $from_text <$from_email>";

        $success = mail($to, $subject, $message, $headers, "-freturn@" . $this->settings()->domain_name);

        return $success;
    }

    function create_file($content = null, $file_path = null)
    {
        $f = fopen($file_path, "w");
        if (!$f) {
            return false;
        }

        # Now UTF-8 - Add byte order mark
        fwrite($f, pack("CCC", 0xef, 0xbb, 0xbf));
        fwrite($f, $content);
        fclose($f);

        /*		if (!$handle = fopen($file_path, 'w')) {
                     return FALSE;
                }
                if (fwrite($handle, $output) === FALSE) {
                    return FALSE;
                }

                fclose($handle);*/

        return TRUE;
    }

    function pager($totalRecords, $NumberOfRecordsToView = 10, $beginIndex, $uri, $totalLinksToView = 10)
    {

        /* IMPORTANT: $totalLinksToView must always be even numbers */

        $resultNevigator = "";
        $j = 0;

        if ($totalRecords > $NumberOfRecordsToView) {
            if ($beginIndex > 0)
                $resultNevigator .= "<a class='ggl_btn' href='{$uri}" . ($beginIndex - $NumberOfRecordsToView) . "'>&laquo; Prev</a>";
            else
                $resultNevigator .= "<a class='ggl_btn disabled'>&laquo; Prev</a>";

            $temp = (int)($totalRecords / $NumberOfRecordsToView);

            if ($temp > $totalLinksToView && $beginIndex > (($NumberOfRecordsToView * $totalLinksToView) / 2)) {
                $resultNevigator .= "<A class='ggl_btn' href='{$uri}0' title='Click to view record # 1 to " . (0 + $NumberOfRecordsToView) . "'>1 ...</A> ";
                $temp = $beginIndex - (int)(($NumberOfRecordsToView * $totalLinksToView) / 2);
                if ($temp > ($totalRecords - ($NumberOfRecordsToView * $totalLinksToView))) {
                    $temp = ((int)($totalRecords / $NumberOfRecordsToView) - $totalLinksToView) * $NumberOfRecordsToView;
                    if (($totalRecords / $NumberOfRecordsToView) - (int)($totalRecords / $NumberOfRecordsToView))
                        $temp = $temp + $NumberOfRecordsToView;
                }
            } else {
                $temp = 0;
            }

            for ($i = $temp; $i < $totalRecords; $i = $i + $NumberOfRecordsToView) {
                $j++;
                if ($j <= $totalLinksToView) {
                    if ($i == $beginIndex) {
                        $resultNevigator .= "<span class='ggl_btn selected'><b>" . (int)(($i / $NumberOfRecordsToView) + 1) . "</b></span> &nbsp;";
                    } else {
                        if (($i + $NumberOfRecordsToView) > $totalRecords) $upto = $totalRecords; else $upto = ($i + $NumberOfRecordsToView);

                        $resultNevigator .= "<A class='ggl_btn' href='{$uri}{$i}' title='Click to view record # " . ($i + 1) . " to " . $upto . "'>" . (int)(($i / $NumberOfRecordsToView) + 1) . " </A> &nbsp;";
                    }
                } else {
                    $last = " <A class='ggl_btn' href='{$uri}{$i}' title='Click to view record # " . ($i + 1) . " to " . $totalRecords . "'>... " . (int)(($i / $NumberOfRecordsToView) + 1) . "</A> &nbsp;";
                }
            }

            if ($j > $totalLinksToView) {
                $resultNevigator .= $last;
            }

            if ($beginIndex != ($i - $NumberOfRecordsToView))
                $resultNevigator .= "&nbsp;<a class='ggl_btn' href='{$uri}" . ($beginIndex + $NumberOfRecordsToView) . "' >Next &raquo;</a>";
            else
                $resultNevigator .= "<a class='ggl_btn disabled'>Next &raquo;</a>";
        }

        return $resultNevigator;
    }

    function user_verify($call, $callback)
    {
        # $call = must be a uri - !verify then redirect to this uri (call function)
        # $callback = must be a uri - call function executed successfully then redirect to this uri
        if (!$this->get_user_id()) {
            $this->login_callback($callback);
            $this->message_board('You have to login first to execute your request.');
            $this->force_redirect($call);
            exit;
        }

        return true;
    }

    function admin_verify($IsErrorPage = FALSE)
    {
        if (!$this->get_user_id() || $this->get_user('Status') != 9) {
            if (!$IsErrorPage) {
                return FALSE;
            } else {
                $this->page_not_found();
                exit;
            }

        }

        return true;
    }

    # User Role Verification
    function role_verify(array $roleID, $return = null, $callback = null, $CustomMessage = null)
    {
        /*
        - must have to create a session using 'user_role', when an user request for log-in
        - $roleID should be an array of user's role id(s)
        - $return should be return or null - if value provided then it will return TRUE or FALSE
        - $callback should be a route or null
        - $CustomMessage will show at your message_board
        */

        # Remove # from below line for go through without verify
        # return TRUE;

        $CI =& get_instance();
        $is_ok = null;

        if ($this->get_user_id()) {
            foreach ($roleID as $k => $v) {
                if ($v == $this->get_user('user_role')) {
                    $is_ok = TRUE;
                }
            }
        }

        if ($CustomMessage) {
            $this->message_board($CustomMessage);
        }

        # routing
        if ($return == 'return') {
            return $is_ok ? TRUE : FALSE;

        } elseif ($callback) {
            # if authorized then return true otherwise return to Callback link
            return $is_ok ? TRUE : $this->force_redirect($callback);

        } elseif (!$is_ok) {
            # if there is no return and no callback then send error page;
            $CI->load->view('error_404');
            return false;
        }

        return TRUE;
    }

    # user permission verify
    function permission_verify($permission_name = null, $IsReturn = FALSE)
    {
        # multiple permission check -> permission_name must be separated by comma
        # if the user id is an admin, then he/she can access everything

        $data = null;
        if ($this->get_user('Status') == 9) {
            # user status 9 for admin, admin can perform all operations
            return true;
        }

        if (!$permission_name || !$this->get_user_id() || !$this->get_user('PermissionName')) {
            # return false;
            if ($IsReturn) {
                return false;
            }

            $CI =& get_instance();
            $error_page = $CI->load->view('../errors/error_404', $data, true);
            echo($error_page);
            exit;
        }

        $permission_count = 0;
        $permission_name = explode(',', $permission_name);

        $user_permission = explode(',', $this->get_user('PermissionName'));
        foreach ($permission_name as $k => $v) {
            foreach ($user_permission as $k11 => $v11) {
                if (trim($v11) == trim($v)) {
                    $permission_count++;
                }
            }

        }

        if ($permission_count > 0) {
            return TRUE;
        }

        # if permission_count is still 0
        # return FALSE;
        if ($IsReturn) {
            return false;
        }

        $CI =& get_instance();
        $error_page = $CI->load->view('../errors/error_404', $data, true);
        echo($error_page);
        exit;
    }

    function page_not_found($data = null)
    {
        $CI =& get_instance();
        $string = $CI->load->view('../errors/error_404', $data, true);
        echo $string;
        exit;
    }

    function force_redirect($url = null, $new_window = false, $focus_to_new_window = false, $kill_operation = false)
    {
        # $url = URL to redirect
        # $new_window = if true then url will open in a new window/tab
        # $focus_to_new_window = if true then it will focus on new window/tab
        # $kill_operation = if true then php operation will stopped >> no more line will execute

        if (!$url) {
            $url = $this->settings()->site_url_prefix;
        }

        if ($new_window == true && $focus_to_new_window == true) {
            echo '
			<script>
		  var win = window.open("' . $url . '", "_blank");
		  win.focus();
		  </script>
		  ';

            if ($kill_operation) {
                exit;
            }
            return false;

        } elseif ($new_window == true) {
            echo '
			<script>
		  var new_window = window.open("' . $url . '", "_blank");
		  window.opener.focus();
		  </script>
		  ';
            if ($kill_operation) {
                exit;
            }
            return false;
        }

        echo '
    <script>
    window.location.href = "' . $url . '";
    </script>
    ';

        if ($kill_operation) {
            exit;
        }
        return false;
    }

    function message_board($value = null, $type = null)
    {
        //type can be get and get_and_destroy
        //if only value given then it perform set property

        if (!isset($_SESSION['message_board'])) {
            $_SESSION['message_board'] = null;
        }

        if ($type && $type == 'get') {
            return $_SESSION['message_board'];
        }

        if ($type && $type == 'get_and_destroy') {
            $value = $_SESSION['message_board'];
            $_SESSION['message_board'] = null;
            return $value;
        }

        $_SESSION['message_board'] = $value;
        return 'ok';
    }

    function view_message($data)
    {
        $CI =& get_instance();
        $string = $CI->load->view('view_message', $data, true);
        echo $string;
        exit;
    }

    function login_callback($value = null, $type = null)
    {
        //type can be get and get_and_destroy
        //if only value given then it perform set property

        if (!isset($_SESSION['login_callback'])) {
            $_SESSION['login_callback'] = null;
        }

        if ($type && $type == 'get') {
            return $_SESSION['login_callback'];
        }

        if ($type && $type == 'get_and_destroy') {
            $value = $_SESSION['login_callback'];
            $_SESSION['login_callback'] = null;
            return $value;
        }

        $_SESSION['login_callback'] = $value;
        return 'ok';
    }

    //facebook new edition graph API for access user facebook account information
    function get_fb_value($app_id, $app_secret, $type = 'user')
    {
        include_once FCPATH . "/global/static/facebook_api/facebook.php";

        $facebook = new Facebook(array(
            'appId' => $app_id,
            'secret' => $app_secret,
            'cookie' => true, // enable optional cookie support
        ));

        switch ($type) {
            case 'id':
                return $facebook->getUser();
                break;
            case 'user':
                return $facebook->api('/me');
                break;
            case 'friend':
                return $facebook->api('/me/friends');
                break;
            case 'token':
                return $facebook->getAccessToken();
                break;
            default:
                return FALSE;
        }
    }

    function manage_special_char($val, $special_char = array())
    {
        foreach ($val as $k => $v) {
            if (strtolower($v) == 'comma') {
                $val = str_replace('COMMA', ',', $val);
            } elseif ($v == '&') {
                $val = str_replace('&', 'And', $val);
            } elseif (strtolower($v) == 'and') {
                $val = str_replace('And', '&', $val);
                $val = str_replace('and', '&', $val);
                $val = str_replace('AND', '&', $val);
            }
        }
        return $val;
    }

    # get data from databse
    function get_custom_db($sql = null, $table_name = null, $field_name = null, $where = null, $type = null, $order_by = null, $limit = null)
    {
        # $type can be single or row
        # $sql - if sql > must be complete sql
        # $type - if type='single', must be provided field_name
        $CI =& get_instance();
        $CI->load->database();
        $new_sql = null;

        if (!$field_name) {
            $field_name = '*';
        }
        if ($where) {
            $where = ' WHERE ' . $where;
        }
        if ($order_by) {
            $order_by = ' ORDER BY ' . $order_by;
        }
        if ($limit) {
            $limit = ' LIMIT ' . $limit;
        }

        if ($sql) {
            $new_sql = $sql;
        } elseif ($table_name) {
            $new_sql = 'SELECT ' . $field_name . ' FROM ' . $table_name . $where . $order_by . $limit;
        } else {
            return FALSE;
        }

        $record = $CI->db->query($new_sql);
        $record = $record->result();

        if (!$record) {
            return false;
        } elseif ($record && $field_name && $type == 'single') {
            return $record[0]->$field_name;
        }

        return $record;
    }

    # get db data using secondary connection
    function get_data_secondary($sql)
    {
        # create secondary connection with MySQL
        # value will return as Array

        $conn = mysql_connect($this->settings()->secondary_host, $this->settings()->secondary_username, $this->settings()->secondary_password);
        if (!$conn) {
            # connection-failed
            mysql_close($conn);
            return false;
        }
        mysql_select_db($this->settings()->secondary_database);
        $result = mysql_query($sql);

        if (!empty($result)) {
            mysql_close($conn);
            while ($data = mysql_fetch_assoc($result)) {
                $row[] = $data;
            }
            return $row;
        }

        mysql_close($conn);
        return false;
    }

    # action execute
    function action_executer($TableName, $KeyField, $Key, $RedirectURL, $PermissionName = null, $StatusCheck = null, $ChangeStatus = null, $RemoveCache = null, $Log = null, $SecondaryUpdatedBy = null, $SecondaryUpdatedDate = null, $JoinFieldName = null, $EmailMessage = null, $SecondJoinFieldName = null)
    {
        # $KeyField - db table primary key
        # $Key - must be encrypted
        # $RedirectURL - without url-prefix
        # $StatusCheck - field name must be Status and the value must be tinyint like 1, -1
        # $ChangeStatus - field name must be Status and the value must be tinyint like 1, -1, also must have field name UpdatedBy
        # $RemoveCache - Cache group name
        # $Log - log message
        # $SecondaryUpdatedBy - by default updated by goes to UpdatedBy field
        # $SecondaryUpdatedDate - by default the updated date goes to UpdatedDate field

        # $JoinFieldName=null, $EmailMessage=null -> only for send an email - $JoinFieldName=$TableName.$JoinFieldName

        $CI =& get_instance();
        $CI->load->database();
        $Key = $this->encrypt_decrypt($Key, 'decrypt');

        # permission verified
        if ($PermissionName) {
            $this->permission_verify($PermissionName);
        }

        # status verified
        if ($StatusCheck) {
            $status = $CI->db->query("SELECT * FROM " . $TableName . " WHERE " . $KeyField . "=?", array($Key));
            $status = $status->result();
            if (!$status || $status[0]->Status != $StatusCheck) {
                $this->page_not_found();
                exit;
            }
        }

        # remove cache
        if ($RemoveCache) {
            $this->remove_cache($RemoveCache);
        }

        # update query
        $updated_set = null;
        $updated_set[] = "Status=" . $ChangeStatus;
        if ($SecondaryUpdatedBy) {
            $updated_set[] = $SecondaryUpdatedBy . "='" . $this->get_user_id() . "'";
        } else {
            $updated_set[] = "UpdatedBy='" . $this->get_user_id() . "'";
        }

        if ($SecondaryUpdatedDate) {
            $updated_set[] = $SecondaryUpdatedDate . "='" . $this->now() . "'";
        } else {
            $updated_set[] = "UpdatedDate='" . $this->now() . "'";
        }

        if ($ChangeStatus) {

            $CI->db->query("UPDATE " . $TableName . " SET " . implode(',', $updated_set) . " WHERE " . $KeyField . "=?", array($Key));
            if (!$CI->db->affected_rows()) {
                $this->page_not_found();
                exit;
            }
        }

        # notification send
        if ($JoinFieldName && $EmailMessage) {
            $TempSecondJoinFieldName = 'UserID';
            if ($SecondJoinFieldName) {
                $TempSecondJoinFieldName = $SecondJoinFieldName;
            }
            $get_user_info = $CI->db->query("SELECT tbl_user_information.*
																			FROM tbl_user_information
																			LEFT JOIN " . $TableName . " ON " . $TableName . "." . $JoinFieldName . "=tbl_user_information." . $TempSecondJoinFieldName . "
																			WHERE " . $TableName . "." . $KeyField . "=?", array($Key));
            $get_user_info = $get_user_info->result();

            $user_email_list = array();
            foreach ($get_user_info as $k333 => $v333) {
                $user_email_list[] = $v333->EmailAddress;
            }

            if ($user_email_list) {
                $user_email_list = implode(',', $user_email_list);
                $this->email($user_email_list, $this->settings()->domain_name . ": Notification", $EmailMessage, $cc = NULL, $bcc = NULL, $attachment = NULL, $reply_to = NULL, $html = 'html');
            }

        }

        # log
        if ($Log) {
            $this->log_me($Log);
        }

        # do operation
        $this->message_board('Request has been executed successfully.');
        $this->force_redirect($this->settings()->site_url_prefix . $RedirectURL);
        return false;
    }

    function random_id_generator()
    {
        $CI =& get_instance();
        $CI->load->database();
        $random_number = rand(0, 999999);
        if (strlen($random_number) == 1) {
            $temp_id = "00000" . $random_number;
        } elseif (strlen($random_number) == 2) {
            $temp_id = "0000" . $random_number;
        } elseif (strlen($random_number) == 3) {
            $temp_id = "000" . $random_number;
        } elseif (strlen($random_number) == 4) {
            $temp_id = "00" . $random_number;
        } elseif (strlen($random_number) == 5) {
            $temp_id = "0" . $random_number;
        } else {
            $temp_id = $random_number;
        }

        $get_user_id = $CI->db->query("SELECT tbl_user_information.UserID
										FROM tbl_user_information WHERE tbl_user_information.UserID = '" . $temp_id . "'");
        $get_user_id = $get_user_id->result();

        if ($get_user_id && isset($get_user_id[0]) && $get_user_id[0]->UserID) {
            $this->random_id_generator();
        } else {
            return $temp_id;
        }

    }

    # edit generator
    function edit_generator($TableName, $KeyField, $Key, $RedirectController, $RedirectFunction, $PermissionName = null, $StatusCheck = null, $Log = null)
    {
        # $KeyField - db table primary key
        # $Key - must be encrypted

        $CI =& get_instance();
        $CI->load->database();
        $Key = $this->encrypt_decrypt($Key, 'decrypt');

        # permission verified
        if ($PermissionName) {
            $this->permission_verify($PermissionName);
        }

        # status verified
        if ($StatusCheck) {
            $status = $CI->db->query("SELECT * FROM " . $TableName . " WHERE " . $KeyField . "=?", array($Key));
            $status = $status->result();
            if (!$status || $status[0]->Status != $StatusCheck) {
                $this->page_not_found();
                exit;
            }
        }

        # log
        if ($Log) {
            $this->log_me($Log);
        }

        $get_record = $CI->db->query("SELECT * FROM " . $TableName . " WHERE " . $KeyField . "=?", array($Key));
        $get_record = $get_record->result();
        if (!$get_record) {
            $this->page_not_found();
            exit;
        }

        if (count($get_record) == 1) {
            $get_record = $get_record[0];
        }
        $Input = array();
        foreach ($get_record as $k => $v) {
            $Input[$k] = $v;
        }

        $data['edit'] = $Input;

        require_once(APPPATH . 'controllers/' . $RedirectController . '.php'); # include controller
        $aObj = new $RedirectController(); # create object
        $aObj->$RedirectFunction($data); # call function
    }

    # filter generator
    function filter_generator($TableName, array $InputField, array $Keyword = null, $AdditionalWhere = null, array $DateBetween = null)
    {
        # $InputField - must be an array of db field name and db field name and input field name should be same
        # $Keyword - must be an array of db field name and input field name should be SearchKeyword
        # $DateBetween - must be an array and must have 3 offset, 1=DateFieldName, DateFromInputField, DateToInputField

        $CI =& get_instance();
        $temp_where = array();
        $temp_filter = array();
        $where = $filter_by = null;
        $DateFrom = $DateTo = null;

        if ($DateBetween && count($DateBetween) == 3) {
            $DateFrom = $CI->input->post($DateBetween[1]);
            $DateTo = $CI->input->post($DateBetween[2]);
            $tempTableName = $TableName . '.' . $DateBetween[0];
            if (strpos($DateBetween[0], '.')) {
                $tempTableName = $DateBetween[0];
            }

            if ($DateFrom && $DateTo) {
                $temp_where[] = "(" . $tempTableName . " BETWEEN '" . $DateFrom . "' AND '" . $DateTo . "')";
                $temp_filter[] = "Date Between - '" . $DateFrom . "' and '" . $DateTo . "'";
            } elseif ($DateFrom) {
                $temp_where[] = $tempTableName . " LIKE '%" . $DateFrom . "%'";
                $temp_filter[] = "Date Like - '" . $DateFrom . "'";
            } elseif ($DateTo) {
                $temp_where[] = $tempTableName . " LIKE '%" . $DateTo . "%'";
                $temp_filter[] = "Date Like - '" . $DateTo . "'";
            }

        }

        if ($AdditionalWhere) {
            $temp_where[] = $AdditionalWhere;
        }

        foreach ($InputField as $k => $v) {
            $value = $CI->input->post($v);

            if ($value) {
                $tempTableName = $TableName . '.' . $v;
                if (strpos($v, '.')) {
                    $tempTableName = $v;
                }

                $value = explode('|', $value);
                !isset($value[0]) ? $value[0] = 0 : $value[0] = $value[0];
                !isset($value[1]) ? $value[1] = 0 : $value[1] = $value[1];
                $temp_where[] = $tempTableName . "='" . $value[0] . "'";

                if ($value[1]) {
                    $temp_filter[] = ucwords($v) . ' - ' . ucwords($value[1]);
                } else {
                    $temp_filter[] = ucwords($v) . ' - ' . ucwords($value[0]);
                }

            } # end if

        }

        $SearchKeyword = $CI->db->escape_like_str($CI->input->post('SearchKeyword', TRUE));

        $tmpKeyWord = array();
        foreach ($Keyword as $k1 => $v1) {
            $LineClose = null;
            $tempTableName = $TableName . '.' . $v1;
            if (strpos($v1, '.')) {
                $tempTableName = $v1;
            }

            if (count($Keyword) == ($k1 + 1)) {
                $LineClose = ')';
            }

            if ($k1 == 0) {
                $tmpKeyWord[] = "(" . $tempTableName . " LIKE '%" . $SearchKeyword . "%'" . $LineClose;
            } else {
                $tmpKeyWord[] = $tempTableName . " LIKE '%" . $SearchKeyword . "%'" . $LineClose;
            }
        }

        if ($SearchKeyword) {
            $temp_where[] = implode(' OR ', $tmpKeyWord);
            $temp_filter[] = 'Keyword - ' . $SearchKeyword;
        }

        $temp_where ? $where = ' WHERE ' . implode(' AND ', $temp_where) : $temp_where = null;
        $temp_filter ? $filter_by = implode(', ', $temp_filter) : $temp_filter = null;
        return array('where' => $where, 'filter' => $filter_by);
    }

    # db field data duplicate test
    function db_field_duplicate_test($SQL, array $SQLParam, $ErrorMessage, $EditIdentifierField, $EditIdentifierValue, $AdditionalData, $ViewName)
    {
        # $SQL -> duplicate test sql (query)
        # $SQLParam -> if $SQL uses ? (parameter), then need to pass this variable value - multiple -> use comma separator
        # $DuplicateFieldName -> which field can not be duplicate - message purpose
        # $EditIdentifierField -> Primary field
        # $EditIdentifierValue -> Form (posted) Input Field Name - Edit Identifier
        # $AdditionalData -> tag with view
        # $ViewName -> Redirect to View

        $CI = &get_instance();
        $CI->load->database();
        if ($SQLParam) {
            $get_record = $CI->db->query($SQL, $SQLParam);
        } else {
            $get_record = $CI->db->query($SQL);
        }

        $get_record = $get_record->result();

        if (($get_record && !$EditIdentifierValue) || ($get_record && $get_record[0]->$EditIdentifierField != $EditIdentifierValue)) {
            $this->message_board($ErrorMessage);
            $string = $CI->load->view($ViewName, $AdditionalData, true);
            echo $string;
            exit;
        }

        return true;
    }

    # get posted value
    function get_input($key)
    {
        # $Input must be an array like $this->input->post()
        # $key = record identifier (encrypted) like user_id - to perform any action based on key

        $CI =& get_instance();

        if (!$CI->input->post()) {
            return false;
        }

        $Input = new stdClass();
        foreach ($CI->input->post() as $k => $v) {
            $Input->$k = $this->clean_input($v);
        }

        $Input->$key = $this->encrypt_decrypt($CI->input->post($key), 'decrypt');

        return $Input;
    }

    # clean onput/posted value
    function clean_input($value)
    {
        return addslashes(htmlspecialchars(strip_tags($value)));
    }

    # get user list(active user) under a supervisor or according to custom field like location
    function get_user_list($FieldValue, $CustomFieldName = 'SupervisorName')
    {
        $CI = &get_instance();

        $GetUser = $CI->db->query("SELECT * FROM tbl_user_information WHERE " . $CustomFieldName . "=? AND Status=7", array($FieldValue));
        $GetUser = $GetUser->result();
        if (!$GetUser) {
            return false;
        }

        $UserID = null;
        foreach ($GetUser as $k => $v) {
            $UserID[] = '"' . $v->UserID . '"';
        }

        return $UserID;
    }

    # get user information by user id from database
    function get_user_info($ID)
    {
        $CI =& get_instance();
        $GetUser = $CI->db->query("SELECT * FROM tbl_user_information WHERE UserID=?", array($ID));
        $GetUser = $GetUser->result();
        if (!$GetUser) {
            return false;
        }

        return $GetUser[0];
    }

    # get user information by user id from database
    function user_maker($ID, $output_filed, $tbl_name)
    {
        # $output_filed - db field name
        $CI =& get_instance();
        $CI->load->database();
        $get_record = $CI->db->query("SELECT " . $output_filed . " FROM " . $tbl_name . " WHERE ID = " . $ID . " LIMIT 1");
        $get_record = $get_record->row();
        if ($get_record) {
            return $get_record->$output_filed;
        } else {
            return false;
        }
    }

    # get user info based on created by
    function get_created_by_info($TableName, $KeyField, $Key, $IsReturn = false, $CustomJoinField = null)
    {
        # $CustomJoinField must be similar as employee table field

        $CI =& get_instance();
        $CI->load->database();
        $Key = $this->encrypt_decrypt($Key, 'decrypt');
        $TempCustomJoinField = 'CreatedBy';
        if ($CustomJoinField) {
            $TempCustomJoinField = $CustomJoinField;
        }

        $sql = "SELECT tbl_user_information.*
						FROM tbl_user_information
						LEFT JOIN " . $TableName . " ON " . $TableName . "." . $TempCustomJoinField . "=tbl_user_information." . $TempCustomJoinField . " WHERE " . $TableName . "." . $KeyField . "=?";
        $GetUser = $CI->db->query($sql, array($Key));
        $GetUser = $GetUser->result();

        if (!$GetUser) {
            if ($IsReturn) {
                return false;
            }

            $this->page_not_found();
            return false;
        }

        return $GetUser[0];
    }

    # auto mailer for mail to user(s)
    function email_by_user($id_list, $subject, $message, $attachment = NULL)
    {
        # $id_list - UserID List, if multiple then concate by comma
        # $search_by - serch by this field
        # $email_field - mentioned table's email field name

        $CI =& get_instance();
        $CI->load->database();

        $id_list = explode(',', $id_list);
        $id_list_temp = array();
        foreach ($id_list as $idk => $idv) {
            $id_list_temp[] = "'" . $idv . "'";
        }
        $id_list = implode(',', $id_list_temp);

        $sql = "SELECT tbl_user_information.* FROM tbl_user_information WHERE tbl_user_information.UserID IN(" . $id_list . ")";
        $GetUser = $CI->db->query($sql);
        $GetUser = $GetUser->result();

        if (!$GetUser) {
            return false;
        }

        $user_email = array();
        foreach ($GetUser as $k => $v) {
            $user_email[] = $v->EmailAddress;
        }
        $user_email = implode(',', $user_email);

        $email_send = $this->email($user_email, $subject, $message, $cc = NULL, $bcc = NULL, $attachment, $reply_to = NULL, $html = 'html');
        if ($email_send) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    # auto SMS sender for SMS to user(s)
    function sms_by_user($id_list, $message)
    {
        # $id_list - if multiple then concate by comma
        # $search_by - serch by this field
        # $number_field - mentioned table's contact number field name

        $CI =& get_instance();
        $CI->load->database();

        $id_list = explode(',', $id_list);
        $id_list_temp = array();
        foreach ($id_list as $idk => $idv) {
            $id_list_temp[] = "'" . $idv . "'";
        }
        $id_list = implode(',', $id_list_temp);

        $sql = "SELECT tbl_user_information.* FROM tbl_user_information WHERE tbl_user_information.UserID IN(" . $id_list . ")";
        $GetUser = $CI->db->query($sql);
        $GetUser = $GetUser->result();

        if (!$GetUser) {
            return false;
        }

        foreach ($GetUser as $k => $v) {
            # $sms_send = file('http://sms-gateway/?n='.$v->ContactNumber.'&m='.$message);
        }

        return true;
    }

    # Remove Cache
    function remove_cache($group_name)
    {
        $CI = &get_instance();

        $CI->load->library('cache');
        $CI->cache->remove_group($group_name);
    }

    # identify viewers
    function who_is($custom_ip = null)
    {
        $ip = $_SERVER['REMOTE_ADDR'];
        if ($custom_ip) {
            $ip = $custom_ip;
        }

        $details = json_decode(file_get_contents("http://ipinfo.io/{$ip}"));
        if (!isset($details->org)) {
            return false;
        }

        return 'ip: ' . $details->ip . ', City: ' . $details->city . ', Location: ' . $details->loc . ', Country: ' . $details->country . ', Org: ' . $details->org;
    }

    # create a log (activities)
    function log_me($process_name)
    {
        # create a log at 'log' folder

        if (!$this->get_path('log_full')) {
            return false;
        }

        $process_name = ucwords(str_replace('~', ' ', urlencode(strip_tags($process_name))));
        $user_id = $this->get_user_id();
        !$user_id ? $user_id = 'AMBIGUOUS' : $user_id = $user_id;

        $get_file = $this->get_path('log_full') . 'log_' . date("Y-m-d") . '.txt';
        if (!file_exists($get_file)) {
            $get_file = fopen($get_file, "w");
            $get_file = $this->get_path('log_full') . 'log_' . date("Y-m-d") . '.txt';
        }

        $current = file_get_contents($get_file);
        $current .= $process_name . "~" . $user_id . "~" . $this->now() . "\n";
        file_put_contents($get_file, $current);

        return true;
    }


    # form generator - under construction
    function form_generator(array $ParameterArray, $data)
    {
        # $Field[$k][0] = Field Type
        # $Field[$k][1] = Field Name
        # $Field[$k][2] = Label
        # $Field[$k][3] = true/null - tag with CI form return value or edit value (form call for edit)
        # $Field[$k][4] = value-from-function-cache
        # $Field[$k][5] = validation-by-comma-seperator
        # $Field[$k][6] = Select Option value / null,
        # -> Ex.: M,F|Male,Female, 2 param. by | seperator, one is option value (multiple value seperated by comma) and another is option text

        # $data = form parameter come from controller - form supportive data

        /*
        Example:
        $test = array('form-name'=>'form-name', 'action'=>$url_prefix.'test', 'validation-tag'=>'data-parsley-validate', 'key-field'=>'ID', 'field-array'=>
            array(
                array('text', 'UserName', 'Name', true, 'value-from-function-cache', 'validation-by-comma-seperator', null),
                array('email', 'UserEmail', 'EMail', true, 'value-from-function-cache', 'validation-by-comma-seperator', null),
                array('text', 'UserAge', 'Age', true, 'value-from-function-cache', 'required,digits', null),
                array('select', 'Gender', 'Gender', 'is-return-or-edit', 'value-from-function-cache', 'validation-by-comma-seperator', 'M,F|Male,Female'),
                array('text', 'UserPhone', 'Phone Number', true, 'value-from-function-cache', 'required', null),
                array('text', 'UserBloodGroup', 'Blood Group', false, 'value-from-function-cache', null, null),
                array('date', 'BirthDate', 'Birth Date', true, 'value-from-function-cache', null, null),
                array('text', 'FathersName', 'Fathers Name', false, 'value-from-function-cache', null, null)
            )
        );
        $this->webspice->form_generator($test, $edit);
        */

        $CI =& get_instance();

        # verify parameter
        if (!isset($ParameterArray['form-name']) || !isset($ParameterArray['action']) || !isset($ParameterArray['field-array']) || count($ParameterArray['field-array']) < 1) {
            return false;
        }

        $FormName = $ParameterArray['form-name'];
        $Action = $ParameterArray['action'];
        $ValidationTag = null;
        isset($ParameterArray['validation-tag']) ? $ValidationTag = $ParameterArray['validation-tag'] : $ValidationTag = $ValidationTag;
        $Field = $ParameterArray['field-array'];
        $FormBreak = 5; # form will be divided into two column - if form elements are more than 5
        (count($Field) / 2) > 5 ? $FormBreak = count($Field) / 2 : $FormBreak = $FormBreak;
        $KeyValue = null;
        if (isset($data[$ParameterArray['key-field']]) && $data[$ParameterArray['key-field']]) {
            $KeyValue = $this->webspice->encrypt_decrypt($data[$ParameterArray['key-field']], 'encrypt');
        }

        # form start
        $html = null;
        $html .= '<form id="frm_' . $FormName . '" method="post" enctype="multipart/form-data" action="' . $Action . '" ' . $ValidationTag . '>';
        $html .= '<input type="hidden" name="' . $CI->security->get_csrf_token_name() . '" value="' . $CI->security->get_csrf_hash() . '">';
        $html .= '<input type="hidden" name="' . $ParameterArray['key-field'] . '" value="' . $KeyValue . '">';
        $html .= '<div class="row">';
        $html .= '<div class="col-md-6">';
        foreach ($Field as $k => $v) {
            if (count($Field[$k]) < 7) {
                continue;
            } # field-array children must have 7 offset

            #validation generate
            $Validation = array();
            if ($Field[$k][5]) {
                $TempValidation = explode(',', $Field[$k][5]);
                foreach ($TempValidation as $ValidationKey => $ValidationValue) {
                    $Validation[] = $this->jq_validation($ValidationValue);
                }
            }
            $Validation ? $Validation = implode(' ', $Validation) : $Validation = null;

            # label generate
            $html .= '<div class="form-group"><label>' . $Field[$k][2] . '</label>';
            # verify field type and generate field
            switch ($Field[$k][0]) {
                case 'select':
                    $html .= '<select name="' . $Field[$k][1] . '" id="' . $Field[$k][1] . '" class="chzn-select input_full" ' . $Validation . '>';
                    $html .= '<option value="">Select One</option>';
                    $OptionValue = $OptionValueSegment1 = $OptionValueSegment2 = null;
                    if ($Field[$k][6]) {
                        $OptionValue = explode('|', $Field[$k][6]);
                    } # inline IF
                    if (count($OptionValue) == 2) {
                        $OptionValueSegment1 = explode(',', $OptionValue[0]);
                        $OptionValueSegment2 = explode(',', $OptionValue[1]);
                    } # inline IF
                    foreach ($OptionValueSegment1 as $OptionKey => $OptionValue) {
                        $IsSelectedOption = null;
                        if (!set_value($Field[$k][1]) && $data[$Field[$k][1]] == $OptionValue) {
                            $IsSelectedOption = 'selected="selected"';
                        } # inline IF
                        $html .= '<option value="' . $OptionValue . '" ' . set_select($Field[$k][1], $OptionValue) . $IsSelectedOption . '>';
                        if (isset($OptionValueSegment2[$OptionKey])) {
                            $html .= $OptionValueSegment2[$OptionKey];
                        } else {
                            $html .= 'no-data-given';
                        } # inline IF
                        $html .= '</option>';
                    }
                    $html .= '</select>';
                    break;

                case 'date':
                    $Fieldvalue = $FieldError = null;
                    if ($Field[$k][3] === true) {
                        $Fieldvalue = set_value($Field[$k][1], $data[$Field[$k][1]]);
                        $FieldError = form_error($Field[$k][1]);
                    }
                    $html .= '<input type="' . $Field[$k][0] . '" name="' . $Field[$k][1] . '" id="' . $Field[$k][1] . '" class="form-control date_picker" data-value="' . $Fieldvalue . '" value="' . $Fieldvalue . '" ' . $Validation . ' />';
                    $html .= '<span class="fred">' . $FieldError . '</span>';
                    break;

                default:
                    $Fieldvalue = $FieldError = null;
                    if ($Field[$k][3] === true) {
                        $Fieldvalue = set_value($Field[$k][1], $data[$Field[$k][1]]);
                        $FieldError = form_error($Field[$k][1]);
                    }
                    $html .= '<input type="' . $Field[$k][0] . '" name="' . $Field[$k][1] . '" id="' . $Field[$k][1] . '" class="form-control" value="' . $Fieldvalue . '" ' . $Validation . ' />';
                    $html .= '<span class="fred">' . $FieldError . '</span>';
                    break;
            }
            $html .= '</div><!--end .form-group-->';

            if ($FormBreak == ($k + 1)) {
                $html .= '</div><div class="col-md-6">';
            } # inline IF - new column
        }
        $html .= '<input type="submit" name="btn_submit" class="btn btn-success" />';
        $html .= '</div>';
        $html .= '</div><!--end .row-->';
        $html .= '</form>';
        return $html;
    }

    function jq_validation($Value)
    {
        switch ($Value) {
            case 'required':
                return 'required';
                break;
            case 'email':
                return 'data-parsley-type="email"';
                break;
            case 'digits':
                return 'data-parsley-type="digits"';
                break;
        }
    }

}
