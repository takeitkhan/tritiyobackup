<?php
@ini_set('max_execution_time', 3000);
define('DONOTCACHEPAGE', true);
global $wpdb;
$db_api_settings = $wpdb->prefix . 'wp_api_settings';
$db_api_keys = $wpdb->prefix . 'wp_api_keys';
if (isset($_POST['download_key'], $_POST['datakey'])) {
    $dtk = $_POST['datakey'];
    $haskey = '';
    if (!preg_match('/^\d*$/', $dtk)) {
        foreach ($wpdb->get_results("SELECT * FROM $db_api_keys") as $key => $drow) {
            $haskey .= $drow->title . "\r\n";
        }
    } elseif ($dtk == 1) {
        foreach ($wpdb->get_results("SELECT * FROM $db_api_keys WHERE status='1'") as $key => $drow) {
            $haskey .= $drow->title . "\r\n";
        }
    } else {
        foreach ($wpdb->get_results("SELECT * FROM $db_api_keys WHERE status='0'") as $key => $drow) {
            $haskey .= $drow->title . "\r\n";
        }
    }
    $handle = fopen("Keywords_AutoPost.txt", "w");
    fwrite($handle, $haskey);
    fclose($handle);
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename=' . basename('Keywords_AutoPost.txt'));
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize('Keywords_AutoPost.txt'));
    readfile('Keywords_AutoPost.txt');
    unlink('Keywords_AutoPost.txt');
    exit();
}

include(plugin_dir_path(__FILE__) . 'fetch_api.php');
$siteurl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'] . "/";
$curr_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
header('Content-Type: text/html; charset=utf-8');
include(plugin_dir_path(__FILE__) . 'data-functions.php');

if (isset($_GET['inject_kw'])) {
    include(plugin_dir_path(__FILE__) . 'data-api.php');
    exit();
}
if (isset($_GET['data_results'])) {
    include(plugin_dir_path(__FILE__) . 'data_results.php');
    exit();
}

foreach ($wpdb->get_results("SELECT * FROM $db_api_settings WHERE id = '1'") as $key => $row) {
    $cron_status = $row->status_cron;
    $end_lang = $row->end_lang;
    $tot_lang = $row->tot_lang;
    $time_post = $row->time_post;
    $save_key = $row->char_key;
    $auto_key = $row->autosave_key;
    $word_post = $row->word_post;
    $competitors_key = $row->competitors_key;
    $posts_status = $row->post_status;
}

if (isset($_POST['save_single_key'], $_POST['single_key'], $_POST['cat_key'], $_POST['target_uv'])) {
    $query = strtolower(trim($_POST['single_key']));
    $urlslug = str_replace(" ", "-", implode(' ', array_filter(explode(' ', strtolower(seotext(trim($query)))))));
    $md5ttl = substr(md5($urlslug), 1, 9);
    $id_cat = $_POST['cat_key'];
    $target_dt = $_POST['target_uv'];

    $totlang = $tot_lang;
    $endlang = preg_replace('/_.*/', '', $end_lang);
    if (preg_match('/^images$/', $target_dt)) {
        $numb_hed = 3;
        $totimg = 2;
    } else {
        $numb_hed = 4;
        $totimg = 8;
    }
    $cookiez = plugin_dir_path(__FILE__) . '__cookiez2.txt';
    $myTXT = 'MyTranslate2.txt';
    unlink($myTXT);

    $DT_img = json_decode(images_data($query), TRUE);
    $js_img = array();
    foreach ($DT_img['image'] as $jz_img) {
        $js_img[] = $jz_img;
    }
    shuffle($js_img);
    $js_ttl = $DT_img['title'];
    $js_tmb = $DT_img['thumb'];

    $datasrcv = $DT_img['source'];
    $dataxhed = $js_ttl;
    $datahed = array();
    foreach ($dataxhed as $datazhed) {
        $exphd = explode(' ', trim($datazhed));
        if (count($exphd) < 3) {
            continue;
        }
        $datahed[] = strtolower($datazhed);
    }
    $dataxtag = $js_ttl;
    shuffle($dataxtag);
    $tgnm = 0;
    foreach ($dataxtag as $dataztag) {
        if ($tgnm == 14) {
            break;
        }
        $datatagz = $dataztag;
        if ($tgnm <= 5) {
            $datatop .= ucfirst(strtolower($datatagz)) . ', ';
        }
        if ($tgnm >= 5) {
            $datatag .= $datatagz . ', ';
        }
        $tgnm++;
    }
    $datatop = rtrim($datatop, ', ');
    $datatag = rtrim($datatag, ', ');

    $ifkx = urlencode($query);
    $cks3 = plugin_dir_path(__FILE__) . '__cksv3.txt';
    $gstr = parse_key($ifkx, $end_lang, $cks3);
    if (!empty($gstr)) {
        if ($gstr->find('li.related-terms__item a', 0)) {
            $iftgz = array();
            foreach ($gstr->find('li.related-terms__item a') as $tgz) {
                $iftgz[] = strtolower(trim($tgz->title));
            }
            $tgexp = array_unique($iftgz);
            shuffle($tgexp);
            foreach ($tgexp as $dtz) {
                if (empty($dtz)) {
                    continue;
                }
                $suggtag .= strtolower(trim($dtz)) . ', ';
            }
        }
    }
    $suggtag = rtrim($suggtag, ', ');

    $konten = '';
    $e = 0;
    $datasrc = array();
    for ($v = 0; $v < 5; $v++) {
        $datasrc[] = $datasrcv[$v];
    }
    shuffle($datasrc);
    foreach ($datasrc as $dtsrc) {
        if (preg_grep('/\.pinterest\.|\.facebook\.|\.youtube\.|\.twitter\.|\.instagram\.|\.tiktok\./', $datasrc)) {
            continue;
        }
        $data_desc = contents_web($dtsrc, 18, 80);
        $exp_datax = explode('<br>', $data_desc);
        $str_datax = explode(' ', str_replace("<br>", " ", $data_desc));
        if (count($exp_datax) > 2) {
            if (count($str_datax) > 200) {
                $konten .= str_replace("<br>", "\r\n", $data_desc);
            } else {
                continue;
            }
            $contz = str_replace("\r\n", " ", rtrim($konten, "\r\n"));
            $exhas = explode(' ', $contz);
            if (count($exhas) > 1700) {
                break;
            }
        } else {
            continue;
        }
        $e++;
    }
    $konten = rtrim($konten, "\r\n");
    $konten = str_replace("\r\n", "<br>", $konten);
    $konten = str_replace("<br>", "\r\n", potong_kata($konten, 1500));

    if (!empty($konten)) {

        $langTR = array("af", "sq", "am", "ar", "hy", "az", "eu", "be", "bn", "bs", "bg", "ca", "ceb", "ny", "zh-CN", "zh-TW", "co", "hr", "cs", "da", "nl", "en", "eo", "et", "tl", "fi", "fr", "fy", "gl", "ka", "de", "el", "gu", "ht", "ha", "haw", "iw", "hi", "hmn", "hu", "is", "ig", "id", "ga", "it", "ja", "jw", "kn", "kk", "km", "rw", "ko", "ku", "ky", "lo", "la", "lv", "lt", "lb", "mk", "mg", "ms", "ml", "mt", "mi", "mr", "mn", "my", "ne", "no", "or", "ps", "fa", "pl", "pt", "pa", "ro", "ru", "sm", "gd", "sr", "st", "sn", "sd", "si", "sk", "sl", "so", "es", "su", "sw", "sv", "tg", "ta", "tt", "te", "th", "tr", "tk", "uk", "ur", "ug", "uz", "vi", "cy", "xh", "yi", "yo", "zu");
        $langTRx = array_search($endlang, $langTR, true);
        if ($langTRx !== false) {
            array_splice($langTR, $langTRx, 1);
        }
        shuffle($langTR);

        for ($i = 0; $i < $totlang; $i++) {
            $numlast = $totlang - 2;
            $langTRG = $langTR[$i];
            if ($i == $numlast) {
                $langTRG = $endlang;
            }
            $nsrc = $i - 1;
            $langSRC = $langTR[$nsrc];
            if ($i == 0) {
                $langSRC = 'auto';
            }

            if (file_exists($myTXT)) {
                $konten = file_get_contents($myTXT);
            }

            $endbr = $totlang - 1;
            if ($i == $endbr) {
                break;
            }

            $translation = GoogleTranslate::translate($langSRC, $langTRG, $konten);
            $fp = fopen($myTXT, "wb");
            fwrite($fp, $translation);
            fclose($fp);

            if ($i == $numlast) {
            }
            sleep(7);
        }

        $resultx = file_get_contents($myTXT);
        $exphaz = explode("\r\n", $resultx);
        $thedesc = array();
        $nm = 0;
        foreach ($exphaz as $hasz) {
            $thedesc[] = '<p>' . ucfirst($hasz) . '</p>';
            $nm++;
        }

        $totthedesc = count($exphaz);
        $hazcimg = $totthedesc / $totimg;

        $s = 0;
        $e = 0;
        $i = 0;
        $len = count($thedesc);
        shuffle($datahed);
        foreach ($thedesc as $get_kontenv) {

            $haz_konten .= $get_kontenv;

            if ($i == 1) {
                $haz_konten .= '<h2>' . ucwords($query) . '</h2>';
            }

            if (!preg_match('/^off$|^single$/', $target_dt)) {
                if ($i % $totimg == 1) {
                    $ie = $e + 1;
                    $ps_imgz = preg_replace('/(https:\/\/)|(http:\/\/)|(.*?(wp\.com\/))|\?.*/', '', $js_img[$ie]);
                    $posimgz = 'https://i' . rand(0, 3) . '.wp.com/' . $ps_imgz . '?strip=all';
                    $haz_konten .= '<p><img src="' . $posimgz . '" alt="' . ucwords($query) . '" title="' . ucwords($query) . '" style="width:100%;text-align:center;" onerror="this.onerror=null;this.src=\'' . $js_tmb[$ie] . '\';" /></p>';
                    $e++;
                }
            }

            if ($i % $numb_hed == 2) {
                $nm_sub = $s + 1;
                $ished = rand(2, 4);
                $haz_konten .= '<h' . $ished . '>' . ucwords($datahed[$nm_sub]) . '</h' . $ished . '>';
                $s++;
            }

            if ($i == $len - 1) {
                if (preg_match('/^on$/', $competitors_key)) {
                    $haz_konten .= '<p>' . ucfirst($suggtag) . '</p>';
                }
            }

            $i++;
        }

        $has_konten = preg_replace('/^(.*?)<p>/', '<p><strong>' . ucwords($query) . '</strong> - ', $haz_konten);

        $args = [
            'blog_id' => 1,
            'orderby' => 'nicename',
            'order' => 'ASC',
            'fields' => 'all',
        ];
        $users = get_users($args);
        shuffle($users);
        $uzerID = $users[0]->ID;

        require_once(ABSPATH . 'wp-load.php');
        // require_once WP_ROOT . DS . "wp-load.php";
        $userID = $uzerID;
        $categoryID = $id_cat;
        $leadTitle = ucwords($query);
        $leadContent = $has_konten;

        date_default_timezone_set(get_option('timezone_string'));
        $timeStamp = $minuteCounter = 0;  // set all timers to 0;
        $iCounter = 1; // number use to multiply by minute increment;
        $minuteIncrement = 0; // increment which to increase each post time for future schedule
        $adjustClockMinutes = 0; // add 1 hour or 60 minutes - daylight savings
        $minuteCounter = $iCounter * $minuteIncrement; // setting how far out in time to post if future.
        $minuteCounter = $minuteCounter + $adjustClockMinutes; // adjusting for server timezone
        $timeStamp = date('Y-m-d H:i:s', strtotime("+$minuteCounter min")); // format needed for WordPress
        $new_post = array(
            'post_title' => $leadTitle,
            'post_content' => $leadContent,
            'post_status' => $posts_status,
            'post_date' => $timeStamp,
            'post_author' => $userID,
            'post_type' => 'doflamingo',
            'post_name' => $urlslug,
            'post_category' => array($categoryID)
        );
        $post_id = wp_insert_post($new_post);
        if (!preg_match('/^off$/', $target_dt)) {
            $feadimg = $DT_img['image'];
            shuffle($feadimg);
            foreach ($feadimg as $if_imgz) {
                $if_imgz = preg_replace('/(https:\/\/)|(http:\/\/)|(.*?(wp\.com\/))|\?.*/', '', $if_imgz);
                $imgfile = 'https://i' . rand(0, 3) . '.wp.com/' . $if_imgz . '?strip=all&w=800';
                $handle = curl_init($imgfile);
                curl_setopt($handle, CURLOPT_HEADER, 0);
                curl_setopt($handle, CURLOPT_RETURNTRANSFER, TRUE);
                curl_setopt($handle, CURLOPT_BINARYTRANSFER, 1);
                $response = curl_exec($handle);
                $httpCode = curl_getinfo($handle, CURLINFO_HTTP_CODE);
                curl_close($handle);
                if ($httpCode == 200) {
                    $image_url        = $imgfile;
                    $image_name       = $urlslug . '_' . $md5ttl . '.jpg';
                    $upload_dir       = wp_upload_dir();
                    $image_data       = file_get_contents($image_url);
                    $unique_file_name = wp_unique_filename($upload_dir['path'], $image_name);
                    $filename         = basename($unique_file_name);
                    if (wp_mkdir_p($upload_dir['path'])) {
                        $file = $upload_dir['path'] . '/' . $filename;
                    } else {
                        $file = $upload_dir['basedir'] . '/' . $filename;
                    }
                    file_put_contents($file, $image_data);
                    $wp_filetype = wp_check_filetype($filename, null);
                    $attachment = array(
                        'post_mime_type' => $wp_filetype['type'],
                        'post_title'     => sanitize_file_name($filename),
                        'post_content'   => '',
                        'post_status'    => 'inherit'
                    );
                    $attach_id = wp_insert_attachment($attachment, $file, $post_id);
                    require_once(ABSPATH . 'wp-admin/includes/image.php');
                    $attach_data = wp_generate_attachment_metadata($attach_id, $file);
                    wp_update_attachment_metadata($attach_id, $attach_data);
                    set_post_thumbnail($post_id, $attach_id);
                    break;
                }
            }
        }

        if ($post_id && !is_wp_error($post_id)) {
            global $wpdb;
            if (preg_match('/^on$/', $auto_key)) {
                $locale = $end_lang;
                $ifkeyx = urlencode($query);
                $cookies = plugin_dir_path(__FILE__) . '__cksv2.txt';
                $getstr = parse_key($ifkeyx, $locale, $cookies);
                $minkey = $save_key - 1;
                if (!empty($getstr)) {
                    if ($getstr->find('li.related-terms__item a', 0)) {
                        $iftagz = array();
                        foreach ($getstr->find('li.related-terms__item a') as $tagz) {
                            $iftagz[] = strtolower(trim($tagz->title));
                        }
                        $tagexp = array_unique($iftagz);
                        foreach ($tagexp as $dataz) {
                            if (empty($dataz)) {
                                continue;
                            }
                            $expkey     = explode(' ', $dataz);
                            if (count($expkey) <= $minkey) {
                                continue;
                            }
                            $inttl      = strtolower(trim($dataz));
                            $urls       = str_replace(" ", "-", implode(' ', array_filter(explode(' ', strtolower(seotext(trim($dataz)))))));
                            $idtcat     = substr(md5($urls), 1, 9);
                            $wpdb->query($wpdb->prepare("INSERT IGNORE INTO $db_api_keys (idmd5, title, slug, category, target_uv, status) VALUES ( %s, %s, %s, %s, %s, %s )", array($idtcat, $inttl, $urls, $id_cat, $target_dt, '0')));
                        }
                    }
                }
            }
            $wpdb->query($wpdb->prepare("INSERT IGNORE INTO $db_api_keys (idmd5, title, slug, category, target_uv, status) VALUES ( %s, %s, %s, %s, %s, %s )", array($md5ttl, $query, $urlslug, $id_cat, $target_dt, '1')));
            unlink($myTXT);
            echo "<script>alert('Post Single Keyword Success...');window.close();</script>";
        } else {
            unlink($myTXT);
            echo "<script>alert('Upsss... FAILED Post');window.close();</script>";
        }
    } else {
        echo "<script>alert('Upsss... EMPTY Content');window.close();</script>";
    }
    exit();
} else {
    echo "<script>alert('Upsss... ERROR Data');window.close();</script>";
    exit();
}
