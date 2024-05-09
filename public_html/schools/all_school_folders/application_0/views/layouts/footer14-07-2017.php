<?php if($this->ion_auth->logged_in()) { ?>
            </div>
        </div>
    </div>
</div>

<div id="custom_notifications" class="custom-notifications dsp_none">
    <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
    </ul>
    <div class="clearfix"></div>
    <div id="notif-group" class="tabbed_notifications"></div>
</div>
<?php } else { ?>
</div>
<?php } ?>
<?php echo put_footer(); ?>
<script type="text/javascript" src="http://www.tritiyo.com/schools/footprints/js/cle/jquery.cleditor.min.js"></script>
<script src="http://www.tritiyo.com/schools/js/chartjs/chart.min.js"></script>
<script src="http://www.tritiyo.com/schools/js/progressbar/bootstrap-progressbar.min.js"></script>
<script src="http://www.tritiyo.com/schools/js/nicescroll/jquery.nicescroll.min.js"></script>
<script src="http://www.tritiyo.com/schools/js/icheck/icheck.min.js"></script>
<!-- daterangepicker -->
<script type="text/javascript" src="http://www.tritiyo.com/schools/js/moment.min.js"></script>
<script type="text/javascript" src="http://www.tritiyo.com/schools/js/datepicker/daterangepicker.js"></script>

<script src="http://www.tritiyo.com/schools/js/custom.js"></script>
<!--[if lte IE 8]>
<script type="text/javascript" src="http://www.tritiyo.com/schools/js/excanvas.min.js"></script>
<![endif]-->

<script type="text/javascript">
    jQuery(document).ready(function ($) {
        $("#wysiwyg, #wysiwyg1, #wysiwyg2, #wysiwyg3, #wysiwyg4, #wysiwyg5").cleditor();
    });
    //$("#wysiwyg, #wysiwyg1, #wysiwyg2, #wysiwyg3, #wysiwyg4, #wysiwyg5").css("height", "100%").css("width", "100%").htmlbox({});
</script>
</body>
</html>