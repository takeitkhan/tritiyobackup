<!-- slider and home info block -->
<div class="row">
    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
        <div class="topSlider">
                <ul class="bxslider">
                    <?php foreach ((array)$slideshows as $slide) { ?>
                        <?php
                        if (isset($slide->MediaFileName)) {
                            $url = base_url() . "uploads/posts/" . $slide->MediaFileName;
                        } else {
                            $url = base_url() . "uploads/posts/FacebookCover.jpg";
                        }
                        $id = '';
                        $class = '';
                        $alt = 'avatar';
                        $w = '400px';
                        $h = '250px';
                        ?>
                        <li><?php __img($url, $id, $class, $alt, $w); ?></li>
                    <?php } ?>
                    </li>
                </ul>
                <a href="#" class="pager-prev"><i class="icon-chevron-left"></i></a>
                <a href="#" class="pager-next"><i class="icon-chevron-right"></i></a>
            </div> 
    </div>
    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
        <div class="impLinksWrap homelinks">
            <?php if (!empty($widget1)) : ?>
                <div class="firstColumn">
                    <?php
                    __e('<h4 style="background: #278AF0">' . (isset($widget2['BlockTitle']) ? $widget2['BlockTitle'] : '') . '</h4>');
                    __e((isset($widget2['BlockContent']) ? $widget2['BlockContent'] : ''));
                    ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<div class="row marginTop30 homeLeft">

    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
        <div class="schoolSection bxShadow">
            <div class="map">
                <?php __e($settings->InstituteGoogleMaps); ?>
                <?php
                //__e($widget3->BlockContent);
                ?>
            </div>
            <div class="schooHeader">
                <div class="schoolLogo">
                </div>
                <div class="schoolName">
                    <h3 class="schoolnamesize"><?php __e($settings->InstituteName); ?></h3>

                    <p><span><?php __e($settings->InstituteSlogan); ?></span><br/>
                                <span><a class="btn btn-default btn-sm" href="">গ্যালারী</a>&nbsp;&nbsp;&nbsp;&nbsp;<a
                                        class="btn btn-default btn-sm" href="">যোগাযোগ</a></span></p>
                </div>
                <div class="clear"></div>
            </div>

            <div class="clear margin15"></div>
            <div class="schoolInfo">
                <p><?php __e($settings->ShortInformation); ?></p>
                <ul>
                    <li><b>স্থাপিত :</b> <?php __e($settings->InstituteEstablished); ?></li>
                    <li><b>ই আই আই এন:</b> <?php __e($settings->InstituteEIIN); ?></li>
                    <li><b>সময় :</b> <?php __e($settings->InstituteTime); ?></li>
                    <li><b>ফোন :</b> <?php __e($settings->InstitutePhone); ?></li>
                    <li><b>ইমেইল:</b> <?php __e($settings->InstituteEmail); ?></li>
                    <li><b>ঠিকানা :</b> <?php __e($settings->InstituteAddress); ?></li>
                </ul>
            </div>
            <br>
            <div class="customTab homeTabs">
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab"
                                                              data-toggle="tab">সর্বশেষ সংবাদ</a></li>
                    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">নোটিশ
                            বোর্ড</a></li>
                    <li role="presentation"><a href="#tab3" aria-controls="tab3" role="tab"
                                               data-toggle="tab">ডাউনলোড</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="home">
                        <ul>
                            <?php if (is_array($latestnews)) {
                                foreach ($latestnews as $news) { ?>
                                    <li>
                                        <a href="<?php __menu('content?post_id=' . $news->PostId .'&title='. $news->PostRoute ); ?>"><?php __e($news->Title); ?></a>
                                    </li>
                                <?php }
                            } ?>
                            <li><a href="">সকল সংবাদ</a></li>
                        </ul>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="profile">
                        <ul>
                            <?php if (is_array($notices)) {
                                foreach ($notices as $notice) { ?>
                                    <li>
                                        <a href="<?php __menu('notice/'. $notice->PostId); ?>"><?php __e($notice->Title); ?></a>
                                    </li>
                                <?php }
                            } ?>
                            <li><a href="">সকল নোটিশ</a></li>
                        </ul>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="tab3">
                        <ul>
                            <?php if (is_array($downloads)) {
                                foreach ($downloads as $download) { ?>
                                    <li>
                                        <a href="<?php __menu('download/' . $download->PostId); ?>"><?php __e($download->Title); ?></a>
                                    </li>
                                <?php }
                            } ?>
                            <li><a href="">সকল ডাউনলোড</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
        <div class="sliderSection">
            <!-- <div class="topSlider">
                <ul class="bxslider">
                    <?php foreach ((array)$slideshows as $slide) { ?>
                        <?php
                        if (isset ($slide->MediaFileName)) {
                            $url = base_url() . "uploads/posts/" . $slide->MediaFileName;
                        } else {
                            $url = base_url() . "uploads/posts/FacebookCover.jpg";
                        }
                        $id = '';
                        $class = '';
                        $alt = 'avatar';
                        $w = '400px';
                        $h = '250px';
                        ?>
                        <li><?php __img($url, $id, $class, $alt, $w); ?></li>
                    <?php } ?>
                    </li>
                </ul>
                <a href="#" class="pager-prev"><i class="icon-chevron-left"></i></a>
                <a href="#" class="pager-next"><i class="icon-chevron-right"></i></a>
            </div> -->


            <div class="headmasterQuote">
                <h1 class="blue">প্রতিষ্ঠান প্রধানের বার্তা - <?php __e($settings->AdminName); ?></h1>

                <div class="clear"></div>
                <p>
                    <?php
                    if (isset($settings->AdminPhoto)) {
                        $url = base_url() . "uploads/settings/" . $settings->AdminPhoto;
                    } else {
                        $url = base_url() . "uploads/settings/FacebookCover.jpg";
                    }
                    $id = '';
                    $class = '';
                    $alt = 'avatar';
                    $w = '190px';
                    $h = '';
                    __img($url, $id, $class, $alt, $w, $h);
                    ?>

                <div class="comment more">
                    <?php __e($settings->AdminMessage); ?>
                </div>
                </p>
            </div>
            <div class="clear"></div>
            <div class="schoolCorner">
                <h2>শিক্ষক, শিক্ষার্থী ও অভিভাবক কর্ণার</h2>
                <!-- <div class="clear margin15"></div> -->
                <div class="columnOne"><a href="<?php __menu('outlet'); ?>"><!-- <img src="http://tritiyo.com/schools/footprints/img/tcorner.jpg" alt="tcorner"> -->শিক্ষক কর্ণার</a></div>
                <div class="columnTwo"><a href="<?php __menu('outlet'); ?>"><!-- <img src="http://tritiyo.com/schools/footprints/img/stcorner.jpg" alt="stcorner"> -->শিক্ষার্থী কর্ণার</a></div>
                <div class="columnThree"><a href="<?php __menu('outlet'); ?>"><!-- <img src="http://tritiyo.com/schools/footprints/img/stacorner.jpg" alt="stacorner"> -->অভিভাবক কর্ণার</a></div>
<!--                --><?php //if (!empty($widget0)) : ?>
<!--                    --><?php
//                    __e('<h2>' . (isset($widget0['BlockTitle']) ? $widget0['BlockTitle'] : '') . '</h2>');
//                    __e((isset($widget0['BlockContent']) ? $widget0['BlockContent'] : ''));
//                    ?>
<!--                --><?php //endif; ?>
            </div>

            <div class="clear"></div>
            <br>

            <a href="<?php echo base_url(); ?>admission">
                <button class="admission">অনলাইন ভর্তির আবেদন</button>
            </a>
            <a href="<?php echo base_url(); ?>page/notice-board?page_id=3">
                <button class="formDownload">ভর্তির ফর্ম ডাউনলোড</button>
            </a>
            <a href="<?php echo base_url(); ?>page/governingbody?page_id=9">
                <button class="managingCommettee">পরিচালনা পর্ষদ</button>
            </a>
            <a href="<?php echo base_url(); ?>page/exam-statistics?page_id=18">
                <button class="statistics">বিভিন্ন পরীক্ষার পরিসংখ্যান</button>
            </a>
        </div>
    </div>
</div>