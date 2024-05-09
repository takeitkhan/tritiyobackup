<?php
// error_reporting(0);
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
        <h2 style="font-size:2.1rem;font-weight:700;"><span style="color:#d7d7d7;font-size:1.8em;font-weight:900;">Akagami</span><span style="color:#b1b1b1;">Kaizoku-dan</span></h2>
        <p style="text-align:right;margin-top:-25px;"><button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#ModalAutoPost" style="font-weight:700;background-color:#bd1212;border-color:#ed7b7b;">DOCUMENTATION</button>
        <div id="infoz"><?php echo $infoz; ?></div>

        <div class="row" style="margin:0;margin-top:2em;">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <h3 style="font-size:1.2em;font-weight:700;">Timer & Cron Auto Post</h3>
                    </div>
                    <div class="col-md-12" style="background:#e7e7e7;border:1px solid #d1d1d1;margin-bottom:15px;padding-bottom:5px;">
                        <form class="form-inline" action="" method="post">
                            <div class="form-group" style="margin-top:5px;">
                                <div class="input-group">
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


        <script>
            $(document).ready(function() {
                $('.btn_spintaxxx').click(function() {
                    $(".elm_spintax").toggle('slow');
                });

                $('#infoz').delay(3000).fadeOut(1000);
            });
        </script>
    </div>