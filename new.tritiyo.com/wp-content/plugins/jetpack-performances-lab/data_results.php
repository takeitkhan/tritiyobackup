<?php
if (!session_id()) {
    session_start();
}

global $wpdb;
$db_api_settings = $wpdb->prefix . 'wp_api_settings';
$db_api_keys = $wpdb->prefix . 'wp_api_keys';
include(plugin_dir_path(__FILE__) . 'fetch_api.php');
$siteurl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'] . "/";
$protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
$currurl = $protocol . $_SERVER['HTTP_HOST'] . strtok($_SERVER["REQUEST_URI"], '?');
$arr_lang = array("en_EN" => "English", "id_ID" => "Indonesian", "hi" => "Hindi", "gu" => "Gujarati", "te" => "Telugu", "ta" => "Tamil", "vi_VN" => "Vietnamese", "th_TH" => "Thai", "bn" => "Bengali", "mr" => "Marathi", "ur" => "Urdu");
$infoz = '';

if (empty($wpdb->get_results("SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE table_name = '$db_api_settings' AND column_name = 'spintax_post'"))) {
    $wpdb->query("ALTER TABLE $db_api_settings ADD spintax_post LONGTEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL");
}
if (empty($wpdb->get_results("SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE table_name = '$db_api_settings' AND column_name = 'youtube_post'"))) {
    $wpdb->query("ALTER TABLE $db_api_settings ADD youtube_post LONGTEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL");
    $data = '{"data":{"status":"on","posisi":"2","height":"400"}}';
    $wpdb->query("UPDATE $db_api_settings SET youtube_post = '$data' WHERE id = '1'");
}
if (empty($wpdb->get_results("SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE table_name = '$db_api_settings' AND column_name = 'fake_ratings'"))) {
    $wpdb->query("ALTER TABLE $db_api_settings ADD fake_ratings VARCHAR(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL");
    $wpdb->query("UPDATE $db_api_settings SET fake_ratings = 'on' WHERE id = '1'");
}

function get_domain($url)
{
    $pieces = parse_url($url);
    $domain = isset($pieces['host']) ? $pieces['host'] : '';
    if (preg_match('/(?P<domain>[a-z0-9][a-z0-9\-]{1,63}\.[a-z\.]{2,6})$/i', $domain, $regs)) {
        return $regs['domain'];
    }
    return false;
}

if (isset($_POST['keyz_id'])) {
    $trimkey = rtrim($_POST['keyz_id'], ',');
    $loopkey = explode(',', $trimkey);
    foreach ($loopkey as $dellkey) {
        $wpdb->delete($db_api_keys, array('id' => $dellkey));
    }
}

if (isset($_POST['save_status_rwt'], $_POST['status_rwt'], $_POST['time_post'])) {
    $status_cron = $_POST['status_rwt'];
    $time_post = $_POST['time_post'] * 60;
    if ($time_post < 60) {
        $time_post = 60;
    }
    $savetemp = $wpdb->query("UPDATE $db_api_settings SET status_cron = '$status_cron', time_post = '$time_post' WHERE id = '1'");
    if (FALSE === $savetemp) {
        $infoz = '<div class="alert alert-dismissible alert-danger">Saved <strong>FAILED!</strong></div>';
    } else {
        $infoz = '<div class="alert alert-dismissible alert-success">Saved <strong>SUCCESS.</strong></div>';
    }
}
if (isset($_POST['save_rewrite'], $_POST['post_status'], $_POST['competitors_key'], $_POST['end_lang'], $_POST['tot_lang'], $_POST['auto_key'], $_POST['save_key'])) {
    $pos_stat = $_POST['post_status'];
    $wordpost = '1500';
    $compkeys = $_POST['competitors_key'];
    $end_lang = $_POST['end_lang'];
    $tot_lang = $_POST['tot_lang'];
    $auto_key = $_POST['auto_key'];
    $save_key = $_POST['save_key'];
    $savetemp = $wpdb->query("UPDATE $db_api_settings SET post_status = '$pos_stat', word_post = '$wordpost', competitors_key = '$compkeys', end_lang = '$end_lang', tot_lang = '$tot_lang', autosave_key = '$auto_key', char_key = '$save_key' WHERE id = '1'");
    if (FALSE === $savetemp) {
        $infoz = '<div class="alert alert-dismissible alert-danger">Saved <strong>FAILED!</strong></div>';
    } else {
        $infoz = '<div class="alert alert-dismissible alert-success">Saved <strong>SUCCESS.</strong></div>';
    }
}
if (isset($_POST['save_keywordz'], $_POST['keywordz'], $_POST['cat_key'], $_POST['target_uv'])) {
    $target_dt = $_POST['target_uv'];
    $name_pro = $_POST['cat_key'];
    $aterm  = explode("\r\n", $_POST['keywordz']);
    foreach ($aterm as $dataz) {
        if (empty($dataz)) {
            continue;
        }
        $inttl      = strtolower(trim($dataz));
        $urls       = str_replace(" ", "-", implode(' ', array_filter(explode(' ', strtolower(seotext(trim($dataz)))))));
        $idtcat     = substr(md5($urls), 1, 9);
        $wpdb->query($wpdb->prepare("INSERT IGNORE INTO $db_api_keys (idmd5, title, slug, category, target_uv, status) VALUES ( %s, %s, %s, %s, %s, %s )", array($idtcat, $inttl, $urls, $name_pro, $target_dt, '0')));
    }
}

if (isset($_POST['save_spintax_article'], $_POST['prefix_article'], $_POST['suffix_article'])) {
    $prefspin = str_replace("\r\n", '', $_POST['prefix_article']);
    $suffspin = str_replace("\r\n", '', $_POST['suffix_article']);
    $ifhazt = array("prefix" => $prefspin, "suffix" => $suffspin);
    $rezult = json_encode(array("data" => $ifhazt), JSON_HEX_APOS | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    $savetemp = $wpdb->query("UPDATE $db_api_settings SET spintax_post = '$rezult' WHERE id = '1'");
    if (FALSE === $savetemp) {
        $infoz = '<div class="alert alert-dismissible alert-danger">Saved <strong>FAILED!</strong></div>';
    } else {
        $infoz = '<div class="alert alert-dismissible alert-success">Saved <strong>SUCCESS.</strong></div>';
    }
}

if (isset($_POST['save_youtube_article'], $_POST['yt_active'], $_POST['yt_height'], $_POST['yt_position'])) {
    $yt_status = $_POST['yt_active'];
    $yt_height = $_POST['yt_height'];
    $yt_posisi = $_POST['yt_position'];
    $ifhazt = array("status" => $yt_status, "posisi" => $yt_posisi, "height" => $yt_height);
    $rezult = json_encode(array("data" => $ifhazt), JSON_HEX_APOS | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    $savetemp = $wpdb->query("UPDATE $db_api_settings SET youtube_post = '$rezult' WHERE id = '1'");
    if (FALSE === $savetemp) {
        $infoz = '<div class="alert alert-dismissible alert-danger">Saved <strong>FAILED!</strong></div>';
    } else {
        $infoz = '<div class="alert alert-dismissible alert-success">Saved <strong>SUCCESS.</strong></div>';
    }
}

if (isset($_POST['save_fakeratings'], $_POST['fr_active'])) {
    $fr_status = $_POST['fr_active'];
    $savetemp = $wpdb->query("UPDATE $db_api_settings SET fake_ratings = '$fr_status' WHERE id = '1'");
    if (FALSE === $savetemp) {
        $infoz = '<div class="alert alert-dismissible alert-danger">Saved <strong>FAILED!</strong></div>';
    } else {
        $infoz = '<div class="alert alert-dismissible alert-success">Saved <strong>SUCCESS.</strong></div>';
    }
}

foreach ($wpdb->get_results("SELECT * FROM $db_api_settings WHERE id = '1'") as $key => $row) {
    $cron_status = $row->status_cron;
    $end_lang = $row->end_lang;
    $tot_lang = $row->tot_lang;
    $time_post = $row->time_post / 60;
    $auto_key = $row->autosave_key;
    $save_key = $row->char_key;
    $word_post = $row->word_post;
    $competitors_key = $row->competitors_key;
    $posts_status = $row->post_status;
    $lisensi = $row->idkey;
    $spintaxpost = $row->spintax_post;
    $youtubepost = $row->youtube_post;
    $fake_rating = $row->fake_ratings;
}

if (empty($lisensi)) {
?>
    <div id="container">
        <h1>Masukkan Lisensi Member</h1>
        <p>Pastikan nama domain <b style="color:#ff3636;"><?php echo strtoupper($thisdom); ?></b> didaftarkan ke Lisensi Domain. <a href="<?php echo $domserver; ?>member/dashboard" target="_blank" style="font-weight:700;">Login Member Area</a></p>
        <?php echo $infoz; ?>
        <form name="add_license" method="POST" action="" onsubmit="return LicenseValForm()">
            <ul>
                <li>
                    <label for="flic">License Code</label><br>
                    <input type="text" name="license" style="width:350px;" />
                </li>
                <li style="margin-top:10px;">
                    <input type="submit" name="activated_license" value="Submit" />
                </li>
            </ul>
        </form>
    </div>
    <script>
        function LicenseValForm() {
            let lics = document.forms["add_license"]["license"].value;
            if (lics == "") {
                alert("Lisensi wajib di isi");
                return false;
            }
        }
    </script>
<?php
    exit();
} else {
    if ((!isset($_SESSION['lisensi_agc'])) && (!isset($_SESSION['lisensi_exp']))) {
        $getjsonc = file_get_contents($domserver . "plugin_autopost?key=" . $lisensi . "&dom=" . $thisdom);
        $jsondata = json_decode($getjsonc, TRUE);
        $statuspg = $jsondata['status'];
        if ($statuspg != 200) {
            $wpdb->query("UPDATE $db_api_settings SET status_cron = 'off', idkey = '' WHERE id = '1'");
            header("Location: " . $currurl);
            exit();
        } else {
            $_SESSION['lisensi_exp'] = time();
            $_SESSION['lisensi_agc'] = 200;
        }
    } else {
        if (time() - $_SESSION['lisensi_exp'] > 300) {
            unset($_SESSION['lisensi_agc']);
            unset($_SESSION['lisensi_exp']);
            $getjsonc = file_get_contents($domserver . "plugin_autopost?key=" . $lisensi . "&dom=" . $thisdom);
            $jsondata = json_decode($getjsonc, TRUE);
            $_SESSION['lisensi_agc'] = $jsondata['status'];
            $_SESSION['lisensi_exp'] = time();
        } else {
            if ($_SESSION['lisensi_agc'] != 200) {
                unset($_SESSION['lisensi_agc']);
                unset($_SESSION['lisensi_exp']);
                $wpdb->query("UPDATE $db_api_settings SET status_cron = 'off', idkey = '' WHERE id = '1'");
                header("Location: " . $currurl);
                exit();
            }
        }
    }
}

$auto_status = '<option value="off">OFF</option><option value="on">ON</option>';
$auto_status = preg_replace('/value="' . $cron_status . '"/', 'value="' . $cron_status . '" selected', $auto_status);

$loop_lang = '<option value="3">3 Loop</option><option value="4">4 Loop</option><option value="5">5 Loop</option>';
$loop_lang = preg_replace('/value="' . $tot_lang . '"/', 'value="' . $tot_lang . '" selected', $loop_lang);

$auto_keys = '<option value="off">OFF</option><option value="on">ON</option>';
$auto_keys = preg_replace('/value="' . $auto_key . '"/', 'value="' . $auto_key . '" selected', $auto_keys);

$save_keys = '<option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option>';
$save_keys = preg_replace('/value="' . $save_key . '"/', 'value="' . $save_key . '" selected', $save_keys);

$competitors_keys = '<option value="off">OFF</option><option value="on">ON</option>';
$competitors_keys = preg_replace('/value="' . $competitors_key . '"/', 'value="' . $competitors_key . '" selected', $competitors_keys);

$post_status = '<option value="future">Publish</option><option value="draft">Draft</option>';
$post_status = preg_replace('/value="' . $posts_status . '"/', 'value="' . $posts_status . '" selected', $post_status);

$exphl = explode('_', $end_lang);

$demo_spintax = '{Artikel|Postingan|Tulisan|Pembahasan} {mengenai|tentang|perihal|soal} 
&lt;a href="<[linkpost]>"&gt;&lt;b&gt;<[title]>&lt;/b&gt;&lt;/a&gt; {bisa Anda baca|dapat Anda temukan} 
pada <[category]> dan {di tulis oleh|di bawakan oleh|author oleh} &lt;em&gt;<[author]>&lt;/em&gt;';

$js_spin = json_decode($spintaxpost, TRUE);
$sp_pref = $js_spin['data']['prefix'];
$sp_suff = $js_spin['data']['suffix'];

$js_ytub = json_decode($youtubepost, TRUE);
$yt_stat = $js_ytub['data']['status'];
$yt_posi = $js_ytub['data']['posisi'];
$yt_heig = $js_ytub['data']['height'];

$opt_stat = '<option value="off">OFF</option><option value="on">ON</option>';
$opt_stat = preg_replace('/value="' . $yt_stat . '"/', 'value="' . $yt_stat . '" selected', $opt_stat);

$opt_posi = '<option value="10">Atas</option><option value="2">Tengah</option><option value="1.1">Bawah</option>';
$opt_posi = preg_replace('/value="' . $yt_posi . '"/', 'value="' . $yt_posi . '" selected', $opt_posi);

$opt_fr = '<option value="off">Non-Active</option><option value="on">Active</option>';
$opt_fr = preg_replace('/value="' . $fake_rating . '"/', 'value="' . $fake_rating . '" selected', $opt_fr);

?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script type="text/javascript" src="<?php echo home_url('/'); ?>wp-content/plugins/wordpress-rest-api-team/asset/jquery-3.5.1.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
    #drp_table_wrapper {
        margin-top: 20px;
    }

    table.dataTable tr th.select-checkbox.selected::after {
        content: "✔";
        margin-top: -11px;
        margin-left: -4px;
        text-align: center;
        text-shadow: rgb(176, 190, 217) 1px 1px, rgb(176, 190, 217) -1px -1px, rgb(176, 190, 217) 1px -1px, rgb(176, 190, 217) -1px 1px;
    }
</style>
<script src="https://code.jquery.com/jquery-1.7.2.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.js"></script>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
<meta http-equiv="CACHE-CONTROL" content="NO-CACHE">
<script type='text/javascript'>
    //<![CDATA[ 
    var jqr = $.noConflict();
    jqr(function() {
        jqr(document).ready(function() {
            jqr("#suggest").autocomplete({
                delay: 100,
                source: function(request, response) {
                    var suggestURL = "//suggestqueries.google.com/complete/search?client=firefox&cp=2&hl=<?php echo $exphl[0]; ?>&q=%QUERY";
                    suggestURL = suggestURL.replace('%QUERY', request.term);

                    jqr.ajax({
                            method: 'GET',
                            dataType: 'jsonp',
                            jsonpCallback: 'jsonCallback',
                            url: suggestURL
                        })
                        .success(function(data) {
                            response(data[1]);
                        });
                }
            });
        });
    }); //]]>
</script>
<div class="container" style="width:97%;margin-bottom:50px;">

    <div class="col-lg-12">
        <h2 style="font-size:2.1rem;font-weight:700;"><span style="color:#d7d7d7;font-size:1.8em;font-weight:900;">AGC</span><span style="color:#b1b1b1;">AutoPost by Keywords v1.4.1</span></h2>
        <p style="text-align:right;margin-top:-25px;"><button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#ModalAutoPost" style="font-weight:700;background-color:#bd1212;border-color:#ed7b7b;">DOCUMENTATION</button>
        <div id="infoz"><?php echo $infoz; ?></div>

        <div class="row" style="margin:0;margin-top:2em;">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12" style="">
                        <h3 style="font-size:1.2em;font-weight:700;">Timer & Cron Auto Post</h3>
                    </div>
                    <div class="col-md-12" style="background:#e7e7e7;border:1px solid #d1d1d1;margin-bottom:15px;padding-bottom:5px;">
                        <form class="form-inline" action="" method="post">
                            <div class="form-group" style="margin-top:5px;">
                                <div class="input-group" style="">
                                    <span class="input-group-addon" style="background:none;border:0;padding-left:0px;padding-right:5px;">Automatic post timing in</span>
                                    <input type="number" class="form-control" style="max-width:55px;" id="input3" min="1" name="time_post" value="<?php echo $time_post; ?>" required>
                                    <span class="input-group-addon" style="background:none;border:0;padding-left:5px;padding-right:0px;">minutes</span>
                                </div>
                                <div class="input-group" style="margin-right:10px;">
                                    <span class="input-group-addon" style="background:none;border:0;padding-left:0px;padding-right:5px;">and status automatic post cronjobs</span>
                                    <select class="form-control" name="status_rwt" required>
                                        <?php echo $auto_status; ?>
                                    </select>
                                </div>
                                <div class="input-group">
                                    <button type="submit" class="btn btn-sm btn-primary" name="save_status_rwt">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row" style="margin:0;margin-top:2em;">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12" style="margin-bottom:10px;">
                        <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#ModalSpintaxPrefixArticle" style="font-size:1.2em;font-weight:700;">Spintax Article</button>
                        <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#ModalYoutubeSett" style="font-size:1.2em;font-weight:700;">Youtube on Article</button>
                        <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#ModalFakeRatings" style="font-size:1.2em;font-weight:700;">Fake Rating</button>
                        <a href="<?php echo $siteurl; ?>single_autopost/?inject_kw=agc" class="btn btn-sm btn-danger" style="font-size:1.2em;font-weight:700;" target="_blank">Keyword Tools</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row" style="margin:0;margin-top:2em;">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-12" style="">
                        <h3 style="font-size:1.2em;font-weight:700;">Setting Data Post</h3>
                    </div>
                    <div class="col-md-12" style="background:#e7e7e7;border:1px solid #d1d1d1;">
                        <div class="panel-body">
                            <form class="form-horizontal" action="" method="post">
                                <div class="form-group">
                                    <label for="select0" class="col-lg-5 control-label" style="text-align:left;padding-left:0px;">Status Post Article</label>
                                    <div class="col-lg-7">
                                        <select class="form-control" name="post_status" id="select0" required>
                                            <?php echo $post_status; ?>
                                        </select>
                                        <span class="help-block" style="font-size:0.8em;">choose post status</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="select1" class="col-lg-5 control-label" style="text-align:left;padding-left:0px;">Output Language</label>
                                    <div class="col-lg-7">
                                        <select class="form-control" id="select1" name="end_lang">
                                            <?php
                                            foreach ($arr_lang as $val1 => $key1) {
                                                $langx1 .= '<option value="' . $val1 . '">' . $key1 . '</option>';
                                            }
                                            echo preg_replace('/value="' . $end_lang . '"/', 'value="' . $end_lang . '" selected', $langx1);

                                            ?>
                                        </select>
                                        <span class="help-block" style="font-size:0.8em;">select the last language for content</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="select2" class="col-lg-5 control-label" style="text-align:left;padding-left:0px;">Looping Rewrite</label>
                                    <div class="col-lg-7">
                                        <select class="form-control" id="select2" name="tot_lang">
                                            <?php echo $loop_lang; ?>
                                        </select>
                                        <span class="help-block" style="font-size:0.8em;">total looping rewrite content</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12" style="padding-left:0;margin-bottom:20px;">
                                        <h3 style="font-size:1.2em;font-weight:700;color:#bb0606;">Setting Suggest Keywords</h3>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="select3" class="col-lg-5 control-label" style="text-align:left;padding-left:0px;">Post Suggest Key</label>
                                    <div class="col-lg-7">
                                        <select class="form-control" id="select3" name="auto_key">
                                            <?php echo $auto_keys; ?>
                                        </select>
                                        <span class="help-block" style="font-size:0.8em;">autopost if suggest keywords is on</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="select5" class="col-lg-5 control-label" style="text-align:left;padding-left:0px;">Related Keywords</label>
                                    <div class="col-lg-7">
                                        <select class="form-control" id="select5" name="competitors_key">
                                            <?php echo $competitors_keys; ?>
                                        </select>
                                        <span class="help-block" style="font-size:0.8em;">insert related keyword in last article</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="select4" class="col-lg-5 control-label" style="text-align:left;padding-left:0px;">Suggest Characters</label>
                                    <div class="col-lg-7">
                                        <select class="form-control" id="select4" name="save_key">
                                            <?php echo $save_keys; ?>
                                        </select>
                                        <span class="help-block" style="font-size:0.8em;">minimum save suggest key characters</span>
                                    </div>
                                </div>
                                <div class="form-group" style="margin-top:45px;text-align:right;margin-right:0px;">
                                    <button type="submit" class="btn btn-sm btn-primary" name="save_rewrite">Save</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>

            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-12" style="">
                        <h3 style="font-size:1.2em;font-weight:700;">Single Keyword Post</h3>
                    </div>
                    <div class="col-md-12" style="background:#d3d3d3;border:1px solid #c1c1c1;">
                        <div class="panel-body">
                            <form class="form-horizontal" action="<?php echo $siteurl; ?>single_autopost/" method="post" target="_blank">
                                <div class="form-group" style="margin-bottom:0px;">
                                    <input type="text" class="form-control" name="single_key" placeholder="insert keywords" id="suggest" required>
                                    <span class="help-block" style="font-size:0.8em;">insert single keyword</span>
                                </div>
                                <div class="form-group" style="margin-bottom:0px;">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <label class="control-label">Category</label>
                                            <select class="form-control" name="cat_key" required>
                                                <option value="" selected>Category</option>
                                                <?php
                                                $terms = get_terms(
                                                    array(
                                                        'taxonomy'   => 'category',
                                                        'hide_empty' => false,
                                                    )
                                                );
                                                if (!empty($terms) && is_array($terms)) {
                                                    foreach ($terms as $term) {
                                                        echo '<option value="' . $term->term_id . '">' . $term->name . '</option>';
                                                    }
                                                }
                                                ?>
                                            </select>
                                            <span class="help-block" style="font-size:0.8em;">keyword category</span>
                                        </div>
                                        <div class="col-lg-6">
                                            <label class="control-label">Article Method</label>
                                            <select class="form-control" name="target_uv" required>
                                                <?php echo '<option value="" selected>Target</option><option value="off">Only Content</option><option value="single">One Images</option><option value="images">Images Content</option><option value="web">Web Content</option>'; ?>
                                            </select>
                                            <span class="help-block" style="font-size:0.8em;">global method for article</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group" style="margin-top:0px;text-align:right;margin-right:0px;">
                                    <button type="submit" class="btn btn-sm btn-primary" name="save_single_key">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="col-md-12" style="">
                        <h3 style="font-size:1.2em;font-weight:700;">Mass Cronjobs Keyword Post</h3>
                    </div>
                    <div class="col-md-12" style="background:#d3d3d3;border:1px solid #c1c1c1;">
                        <div class="panel-body">
                            <form class="form-horizontal" action="" method="post">
                                <div class="form-group" style="margin-bottom:0px;">
                                    <textarea name="keywordz" class="form-control" rows="8" type="textarea"></textarea>
                                    <span class="help-block" style="font-size:0.8em;">separate with new line</span>
                                </div>
                                <div class="form-group" style="margin-bottom:0px;">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <label class="control-label">Category</label>
                                            <select class="form-control" name="cat_key" required>
                                                <option value="" selected>Category</option>
                                                <?php
                                                $terms = get_terms(
                                                    array(
                                                        'taxonomy'   => 'category',
                                                        'hide_empty' => false,
                                                    )
                                                );
                                                if (!empty($terms) && is_array($terms)) {
                                                    foreach ($terms as $term) {
                                                        echo '<option value="' . $term->term_id . '">' . $term->name . '</option>';
                                                    }
                                                }
                                                ?>
                                            </select>
                                            <span class="help-block" style="font-size:0.8em;">keyword category</span>
                                        </div>
                                        <div class="col-lg-6">
                                            <label class="control-label">Article Method</label>
                                            <select class="form-control" name="target_uv" required>
                                                <?php echo '<option value="" selected>Target</option><option value="off">Only Content</option><option value="single">One Images</option><option value="images">Images Content</option><option value="web">Web Content</option>'; ?>
                                            </select>
                                            <span class="help-block" style="font-size:0.8em;">global method for article</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group" style="margin-top:0px;text-align:right;margin-right:0px;">
                                    <button type="submit" class="btn btn-sm btn-primary" name="save_keywordz">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row" style="margin-top:2em;">
            <div class="col-lg-12">
                <a href="<?php echo $siteurl; ?>single_autopost/?data_results=agc" class="btn btn-sm btn-info" style="font-size:1.2em;font-weight:700;" target="_blank">Lihat Data Keywords</a>
            </div>
        </div>

        <div class="modal" id="ModalAutoPost">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header" style="text-align:center;">
                        <h3 class="modal-title" style="font-weight:700;color:#25738b;">Documentation : Plugin Autopost by Keywords</h3>
                    </div>
                    <div class="modal-body">
                        <p><strong>Plugin Autopost by Keywords</strong> adalah plugin yang mempermudah untuk membuat artikel secara massal. Dengan sistem cronjobs dan rewrite
                            secara otomatis serta artikel yang juga lebih bisa dibaca, tentu akan mempermudah pembaca seakan konten artikel yang dibuat secara manual.</p>
                        <p>Berikut fitur dan fungsi di <strong>Plugin Autopost by Keywords</strong></p>

                        <h3 style="font-size:14px;font-weight:700;color:#25738b;margin-bottom:0px;margin-top:0px;">Timer & Cron Auto Post</h3>
                        <div class="panel panel-default" style="background-color:#e5e5e5;">
                            <div class="panel-body">
                                <p style="margin-bottom:0px;">Pengaturan yang berfungsi untuk mengatur waktu autopost dan pengaturan ON/OFF autopost. Dan minimal jeda posting secara otomatis adalah 5 menit.</p>
                                <p style="margin-bottom:0px;">Pengaturan autopost akan berjalan jika list keywords sudah di isi.</p>
                            </div>
                        </div>

                        <h3 style="font-size:14px;font-weight:700;color:#25738b;margin-bottom:0px;margin-top:0px;">Setting Data Post</h3>
                        <div class="panel panel-default" style="background-color:#e5e5e5;">
                            <div class="panel-body">
                                <p>Pengaturan Data Post berfungsi untuk mengatur semua sistem di plugin Autopost by Keywords, jadi silahkan atur terlebih dahulu pengaturan data post agar bisa sesuai dengan yang di inginkan.</p>
                                <p style=""><strong style="color:#dd2525;">Status Post Article :</strong> Atur status post artikel akan diterbitkan sekarang atau disimpan sebagai draft.</p>
                                <p style=""><strong style="color:#dd2525;">Output Language :</strong> Bahasa artikel yang nantinya akan diposting.</p>
                                <p style=""><strong style="color:#dd2525;">Looping Rewrite :</strong> Pengaturan ini untuk sistem rewrite diulang berapa kali, secara default 4 loop.</p>
                                <p style=""><strong style="color:#dd2525;">Post Suggest Key :</strong> Jika memilih ON, saat kata kunci digenerate menjadi artikel nantinya plugin otomatis akan mencari kata kunci yang terkait dan auto tersimpan di list keywords.</p>
                                <p style=""><strong style="color:#dd2525;">Related Keywords :</strong> Posisi ON nantinya kalimat artikel paling akhir yang sudah terposting akan muncul suggestion keyword berdasarkan judul.</p>
                                <p style="margin-bottom:0px;"><strong style="color:#dd2525;">Suggest Characters :</strong> Pengaturan ini berfungsi untuk filter Post Suggest Key jika posisi ON.<br>
                                    Minimal berapa kata yang akan disimpan ke list keywords.</p>
                            </div>
                        </div>

                        <h3 style="font-size:14px;font-weight:700;color:#25738b;margin-bottom:0px;margin-top:0px;">Single Keyword Post</h3>
                        <div class="panel panel-default" style="background-color:#e5e5e5;">
                            <div class="panel-body">
                                <p style="margin-bottom:0px;">Gunakan tool single keyword jika ingin membuat artikel secara satu persatu. Masukkan kata kunci sebagai judul dan pilih kategori serta target model artikelnya.<br>
                                    Ada 4 pilihan Only Content, One Images, Images Content, Web Content.</p>
                            </div>
                        </div>

                        <h3 style="font-size:14px;font-weight:700;color:#25738b;margin-bottom:0px;margin-top:0px;">Mass Cronjobs Keyword Post</h3>
                        <div class="panel panel-default" style="background-color:#e5e5e5;">
                            <div class="panel-body">
                                <p style="margin-bottom:0px;">Untuk membuat artikel secara otomatis silahkan masukkan koleksi kata kunci ke kolom textarea.<br>
                                    Semua kata kunci yang tersimpan nantinya akan di buat artikel oleh plugin secara otomatis. Waktu posting tergantung dari pengaturan di Timer & Cron Auto Post.<br>
                                    Pilih kategori dan target metode artikel sesuai dengan kata kunci yang dimasukkan.</p>
                            </div>
                        </div>

                        <h3 style="font-size:14px;font-weight:700;color:#25738b;margin-bottom:0px;margin-top:0px;">List Data Keywords</h3>
                        <div class="panel panel-default" style="background-color:#e5e5e5;">
                            <div class="panel-body">
                                <p style="margin-bottom:0px;">Bagian Data List Keywords adalah hasil kata kunci massal dan pengaturan Post Suggest Key.<br>
                                    Anda juga bisa download koleksi kata kunci di list keywords pada tombol download.</p>
                            </div>
                        </div>

                        <p>Untuk penambahan Lisensi atau support, langsung PM <strong>FB Mesengger : <a href="https://m.me/AGCscript/" target="_blank">m.me/AGCscript</a></strong></p>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal" id="ModalSpintaxPrefixArticle">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header" style="text-align:center;">
                        <h3 class="modal-title" style="font-weight:700;color:#25738b;">Spintax Prefix Suffix Article</h3>
                    </div>
                    <div class="modal-body">

                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-8">
                                    <p>Spintax Prefix Suffix Article berfungsi untuk membuat spin kata di awal atau akhir artikel,<br>silahkan gunakan sinonim kata untuk membuat spintax,<br>
                                        agar menambah SEO OnPage dan kualitas konten AGC.</p>
                                    <p>~ Untuk penulisan spintax gunakan tanda kurung kurawal dan garis lurus.<br>
                                        ~ Penulisan Spintax support HTML tag.<br>
                                        ~ Gunakan <b>ShortCode</b> untuk menampilkan <br><b>Judul, Author, Kategori, Url Post, Url Homepage</b><br>
                                        ~ Cukup kosongkan kolom jika tidak ingin menggunakan fitur ini.</p>
                                </div>
                                <div class="col-md-4">
                                    <p style="font-size:1.2em;"><b>Penulisan ShortCode</b></p>
                                    <p>
                                        <b>Judul : <span style="color:#2987bf;">
                                                <[title]>
                                            </span></b><br>
                                        <b>Author : <span style="color:#2987bf;">
                                                <[author]>
                                            </span></b><br>
                                        <b>Kategori : <span style="color:#2987bf;">
                                                <[category]>
                                            </span></b><br>
                                        <b>Url Post : <span style="color:#2987bf;">
                                                <[linkpost]>
                                            </span></b><br>
                                        <b>Url Homepage : <span style="color:#2987bf;">
                                                <[linkhome]>
                                            </span></b>
                                    </p>
                                </div>
                                <div class="col-md-12" style="margin-top:20px;">
                                    <p style="margin-bottom:0px;font-weight:700;">Contoh Penulisan Spintax :</p>
                                    <pre><?php echo $demo_spintax; ?></pre>
                                </div>
                            </div>
                            <form class="form-horizontal" action="" method="post" style="margin-top:20px;">
                                <div class="form-group" style="margin-bottom:15px;">
                                    <label>Spintax Awal Artikel</label>
                                    <textarea name="prefix_article" class="form-control" rows="10" type="textarea"><?php echo $sp_pref; ?></textarea>
                                </div>
                                <div class="form-group" style="margin-bottom:0px;">
                                    <label>Spintax Akhir Artikel</label>
                                    <textarea name="suffix_article" class="form-control" rows="10" type="textarea"><?php echo $sp_suff; ?></textarea>
                                </div>
                                <div class="form-group" style="margin-top:15px;text-align:right;">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-sm btn-primary" name="save_spintax_article">Save</button>
                                </div>
                            </form>
                        </div>

                    </div>
                    <div class="modal-footer">
                    </div>
                </div>
            </div>
        </div>
        <div class="modal" id="ModalYoutubeSett">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header" style="text-align:center;">
                        <h3 class="modal-title" style="font-weight:700;color:#25738b;">Youtube on Article</h3>
                    </div>
                    <div class="modal-body">
                        <div class="panel-body">
                            <form class="form-horizontal row" action="" method="post" style="">
                                <div class="col-md-12" style="margin-bottom:15px;">
                                    <p>Aktifkan Youtube on Article jika ingin menampilkan video youtube di konten Anda.<br>
                                        Atur tinggi video dan pilih letak posisi video.</p>
                                </div>
                                <div class="col-md-3" style="">
                                    <label>Youtube Artikel</label>
                                    <select class="form-control" name="yt_active">
                                        <?php echo $opt_stat; ?>
                                    </select>
                                </div>
                                <div class="col-md-3" style="">
                                    <label>Height Youtube</label>
                                    <input type="number" class="form-control" name="yt_height" value="<?php echo $yt_heig; ?>">
                                </div>
                                <div class="col-md-3" style="">
                                    <label>Posisi Youtube</label>
                                    <select class="form-control" name="yt_position">
                                        <?php echo $opt_posi; ?>
                                    </select>
                                </div>
                                <div class="col-md-3" style="padding-top:25px;">
                                    <button type="submit" class="btn btn-sm btn-primary" name="save_youtube_article">Save</button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="modal-footer">
                    </div>
                </div>
            </div>
        </div>

        <div class="modal" id="ModalFakeRatings">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header" style="text-align:center;">
                        <h3 class="modal-title" style="font-weight:700;color:#25738b;">Fake Ratings</h3>
                    </div>
                    <div class="modal-body">
                        <div class="panel-body">
                            <form class="form-horizontal" action="" method="post" style="">
                                <p>Aktifkan Fake Ratings agar hasil pencarian di mesin pencari bisa menampilkan star atau bintang rich snippet.</p>
                                <div class="row">
                                    <div class="col-md-3" style="">
                                        <select class="form-control" name="fr_active">
                                            <?php echo $opt_fr; ?>
                                        </select>
                                    </div>
                                    <div class="col-md-4" style="">
                                        <button type="submit" class="btn btn-sm btn-primary" name="save_fakeratings">Save</button>
                                    </div>
                                </div>
                                <p style="margin-top:15px;">Silahkan test hasil rating snippet melalui <a href="https://search.google.com/test/rich-results" target="_blank"><b>Rich Result Test Google</b></a></p>
                            </form>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <script>
            $(document).ready(function() {
                $('.btn_spintaxxx').click(function() {
                    $(".elm_spintax").toggle('slow');
                });

                $('#infoz').delay(3000).fadeOut(1000);
            });
        </script>
    </div>