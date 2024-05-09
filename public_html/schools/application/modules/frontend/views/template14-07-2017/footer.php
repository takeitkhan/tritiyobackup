</div>
</div>
</div>
</div>
<div class="footer">
    <div class="container">
        <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
            <h3 style="color: #727272">ফটো গ্যালারী</h3>
            <ul id="photoGallaryNew">
			<?php //owndebugger($photos); ?>
                <?php if(is_array($photos)) { foreach($photos as $photo) { ?>
                                <li><a href="<?php echo base_url(); ?>uploads/posts/<?php __e($photo['MediaFileName']); ?>">
                                        <img src="<?php echo base_url(); ?>uploads/posts/<?php __e($photo['MediaFileName']); ?>"
                            alt="<?php __e($photo['Title']); ?>"></a></li>
                 <?php } } ?>
            </ul>
        </div>
        <div class="col-lg-2 col-md-5 col-sm-12 col-xs-12">
            <h3 style="color: #727272">মোট পরিদর্শক</h3>

            <p>
                &raquo; <?php echo bn2enNumber($counts->todaytotal); ?> আজ<br>
                &raquo; <?php echo bn2enNumber($counts->yesterdaytotal); ?> গতকাল<br>                
                &raquo; <?php echo bn2enNumber($counts->weektotal); ?> সপ্তাহ<br>                
                &raquo; <?php echo bn2enNumber($counts->yeartotal); ?> বছর<br>
                &raquo; <?php echo bn2enNumber($counts->total); ?> মোট </p>
        </div>
        <div class="col-lg-3 col-md-5 col-sm-12 col-xs-12">
            <?php if (!empty($widget10)) : ?>
                <div class="secondColumn">
                    <?php
                    __e('<h3 style="color: #727272">' . (isset($widget10['BlockTitle']) ? $widget10['BlockTitle'] : '') . '</h3>');
                    __e((isset($widget10['BlockContent']) ? $widget10['BlockContent'] : ''));
                    ?>
                </div>
            <?php endif; ?>

        </div>
    </div>
    <div class="clear"></div>
    <div class="copyright">
        <a href="<?php echo base_url('sitemap'); ?>" target="_blank">সাইটম্যাপ</a> । 
        কপিরাইট © <?php __e((isset($settings->InstituteName) ? $settings->InstituteName : 'Powered by Smart Campus')); ?> । 
        কারিগরী সহায়তা <a href="http://www.tritiyo.com/" target="_blank">তৃতীয় লিমিটেড</a>
    </div>
</div>
<script src="http://www.tritiyo.com/schools/footprints/js/bootstrap.min.js"></script>
<script src="http://www.tritiyo.com/schools/footprints/js/bootstrapValidator.js"></script>
<script src="http://www.tritiyo.com/schools/footprints/js/jquery.datetimepicker.js"></script>
<script src="http://www.tritiyo.com/schools/footprints/js/jquery.dataTables.min.js"></script>
<script src="http://www.tritiyo.com/schools/footprints/js/__custom.js"></script>
<script src="http://www.tritiyo.com/schools/footprints/js/custom.js"></script>
<script type="text/javascript" src="http://www.tritiyo.com/schools/footprints/js/jquery.magnific-popup.min.js"></script>
<script type="text/javascript" src="http://www.tritiyo.com/schools/footprints/js/newsscroll.js"></script>
<script src="http://www.tritiyo.com/schools/footprints/js/readmore.js"></script>
<script src="http://www.tritiyo.com/schools/footprints/js/jquery.PrintArea.js" type="text/JavaScript"
        language="javascript"></script>
<script type="text/javascript">
    var pager = new Pager('teachlists', 4);
    pager.init();
    pager.showPageNav('pager', 'pageNavPosition');
    pager.showPage(1);
</script>
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
<style>
    .specialtable {
        font-family: 'arial', 'kalpurush', sans-serif;
        font-size: 12px !important;
    }
</style>
</body>
</html>