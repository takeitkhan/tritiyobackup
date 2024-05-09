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

<?php 
if(base_url() == 'www.tritiyo.com/schools')
echo put_footer(); 
else 
echo put_local_footer(); 
?>
<script type="text/javascript" src="http://www.tritiyo.com/schools/footprints/js/cle/jquery.cleditor.min.js"></script>
<script src="https://www.tritiyo.com/schools/js/chartjs/chart.min.js"></script>
<script src="https://www.tritiyo.com/schools/js/progressbar/bootstrap-progressbar.min.js"></script>
<script src="https://www.tritiyo.com/schools/js/nicescroll/jquery.nicescroll.min.js"></script>
<script src="https://www.tritiyo.com/schools/js/icheck/icheck.min.js"></script>
<!-- daterangepicker -->
<script type="text/javascript" src="https://www.tritiyo.com/schools/js/moment.min.js"></script>
<script type="text/javascript" src="https://www.tritiyo.com/schools/js/datepicker/daterangepicker.js"></script>
<?php if($this->uri->segment(1) == 'basicinformation'): ?>
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
<?php endif; ?>
<!-- <script type="text/javascript" src="<?php echo base_url(); ?>/footprints/js/select2.js"></script> -->
<!-- <script src="<?php echo base_url(); ?>js/custom.js"></script> -->
<!--[if lte IE 8]>
<script type="text/javascript" src="<?php echo base_url(); ?>/js/excanvas.min.js"></script>
<![endif]-->

<script type="text/javascript">
    jQuery(document).ready(function ($) {
        $("#wysiwyg, #wysiwyg1, #wysiwyg2, #wysiwyg3, #wysiwyg4, #wysiwyg5").cleditor();
        $('.select2').select2();
    });
</script>
<?php if($this->uri->segment(1) == 'generateresultview' || $this->uri->segment(1) == 'semesterresult'): ?>
    <script src="http://www.tritiyo.com/schools/footprints/js/resultgenerate.js"></script>
<?php endif; ?>
<?php if($this->uri->segment(1) == 'studentpersonalinformation'): ?>
    <?php if(empty($selected)): //owndebugger($selected)?>
    <script type="text/javascript">
         jQuery(document).ready(function ($) {
            // groupWiseSubject();
//             $(function () {
//                 groupWiseSubject();
//                 $("select.group-subject").change(groupWiseSubject);
//             });

             //$("select.group-subject").change(groupWiseSubject);
         });
    </script>
    <?php endif; ?>
<?php endif; ?>
</body>
</html>