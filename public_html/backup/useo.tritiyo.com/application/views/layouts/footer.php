<?php //owndebugger($yearly_sales_report); ?>


<?php if ($this->ion_auth->logged_in()) { ?>
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
<?php if ($this->uri->segment(1) === 'dashboard') { ?>
    <script src="<?php echo base_url('js/morris/raphael-min.js'); ?>"></script>
    <script src="<?php echo base_url('js/morris/morris-0.4.1.min.js'); ?>"></script>    
    <script type="text/javascript">
        Morris.Bar({
            element: 'bar-example',
            data: [
    <?php
    foreach ($yearly_sales_report as $key => $val) {
        $monthNum = 3;
        $dateObj = DateTime::createFromFormat('!m', $key);
        $monthName = $dateObj->format('M'); // March // get full name of month by date query
        ?>
                    {y: '<?php echo $monthName ?>', a: <?php echo round($val[0]->price) ?>},
    <?php } ?>
            ],
            xkey: 'y',
            ykeys: ['a'],
            labels: ['Sales']
        });
    </script>
<?php } ?>

<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>css/dpicker.css" />
<script src="<?php echo base_url() ?>js/dpicker.js"></script>
<script>
    $('.datepicknew').dcalendarpicker({ format: 'yyyy-mm-dd'});
</script>
<?php if($this->uri->segment(1) == 'addnewproduct'):?>
    <script>
        jQuery(document).ready(function($){
          $("li:has(li) > input[type='checkbox']").change(function() {
            $(this).siblings('ul').find("input[type='checkbox']").prop('checked', this.checked);
           
          });
          $("input[type='checkbox'] ~ ul input[type='checkbox']").change(function() {
             
            $(this).closest("li:has(li)").children("input[type='checkbox']").prop('checked', $(this).closest('ul').find("input[type='checkbox']").is(':checked'));
          });
        });
    </script>
<?php endif; ?>
</body>
</html>



