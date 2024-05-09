<footer class="site-footer">
    <div class="text-center">
        20<?php echo date('y'); ?> &copy; <?php echo $this->db->get('settings')->row()->system_vendor; ?>
        by <a style="color: #fff; font-weight: bold;" href="http://tritiyo.com" target="_blank">Tritiyo Limited</a>.
        <a href="<?php echo current_full_url() . '#'; ?>" class="go-top">
            <i class="fa fa-angle-up"></i>
        </a>
    </div>
</footer>
<!--footer end-->
</section>



<!-- js placed at the end of the document so the pages load faster -->
<script src="common/js/jquery.js"></script>
<script src="common/js/jquery-1.8.3.min.js"></script>
<script src="common/js/bootstrap.min.js"></script>
<script src="common/js/jquery.scrollTo.min.js"></script>

<!--
<script src="common/js/jquery.nicescroll.js" type="text/javascript"></script>
-->

<script type="text/javascript" src="common/assets/data-tables/jquery.dataTables.js"></script>
<script type="text/javascript" src="common/assets/data-tables/jquery.dataTables1.min.js"></script>
<script type="text/javascript" src="common/assets/data-tables/DT_bootstrap.js"></script>
<script src="common/js/respond.min.js" ></script>
<script type="text/javascript" src="common/assets/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="common/assets/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script>
<script type="text/javascript" src="common/assets/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
<script type="text/javascript" src="common/assets/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>

<script type="text/javascript" src="common/assets/jquery-multi-select/js/jquery.multi-select.js"></script>
<script type="text/javascript" src="common/assets/jquery-multi-select/js/jquery.quicksearch.js"></script>
<script type="text/javascript" src="common/assets/ckeditor/ckeditor.js"></script>
<script src="common/js/advanced-form-components.js"></script>
<script src="common/js/jquery.cookie.js"></script>
<!--common script for all pages--> 
<script src="common/js/common-scripts.js"></script>
<script class="include" type="text/javascript" src="common/js/jquery.dcjqaccordion.2.7.js"></script>
<!--script for this page only-->
<script src="common/js/editable-table.js"></script>
<script src="common/assets/fullcalendar/fullcalendar/fullcalendar.min.js"></script>
<!-- END JAVASCRIPTS -->
<script>
    jQuery(document).ready(function () {
        EditableTable.init();
    });

</script>


<script>
    $('#calender').fullCalendar()
</script>


<script>
    $('.multi-select').multiSelect({
        selectableHeader: "<input type='text' class='search-input' autocomplete='off' placeholder=' search...'>",
        selectionHeader: "<input type='text' class='search-input' autocomplete='off' placeholder=''>",
        afterInit: function (ms) {
            var that = this,
                    $selectableSearch = that.$selectableUl.prev(),
                    $selectionSearch = that.$selectionUl.prev(),
                    selectableSearchString = '#' + that.$container.attr('id') + ' .ms-elem-selectable:not(.ms-selected)',
                    selectionSearchString = '#' + that.$container.attr('id') + ' .ms-elem-selection.ms-selected';

            that.qs1 = $selectableSearch.quicksearch(selectableSearchString)
                    .on('keydown', function (e) {
                        if (e.which === 40) {
                            that.$selectableUl.focus();
                            return false;
                        }
                    });

            that.qs2 = $selectionSearch.quicksearch(selectionSearchString)
                    .on('keydown', function (e) {
                        if (e.which == 40) {
                            that.$selectionUl.focus();
                            return false;
                        }
                    });
        },
        afterSelect: function () {
            this.qs1.cache();
            this.qs2.cache();
        },
        afterDeselect: function () {
            this.qs1.cache();
            this.qs2.cache();
        }
    });
</script>

<script>
    $('#my_multi_select3').multiSelect()
</script>

<script>
    $('.default-date-picker').datepicker({
        format: 'dd-mm-yyyy'
    });
</script>


<script type="text/javascript">

    $(document).ready(function () {
        $('#calendar').fullCalendar({
            lang: 'es',
            events: 'appointment/getAppointmentByJason',
            header:
                    {
                        left: 'prev,next today',
                        center: 'title',
                        right: 'month,agendaWeek,agendaDay',
                    },
            timeFormat: {// for event elements
                'month': 'h:mm TT A {h:mm TT}', // default
                'week': 'h:mm TT A {h:mm TT}', // default
                'day': 'h:mm TT A {h:mm TT}'  // default
            },
            eventRender: function (event, element) {
                element.find('.fc-event-time').html(element.find('.fc-event-time').text());
                element.find('.fc-event-title').html(element.find('.fc-event-title').text());

            },
            slotMinutes: 5,
            businessHours: false,
            slotEventOverlap: false,
            editable: true,
            selectable: true,
            lazyFetching: true,
            minTime: "00:00:00",
            maxTime: "24:00:00",
            defaultView: 'month',
            allDayDefault: false,

        });
    });

</script>

<script>
    $(document).ready(function () {
        $('.timepicker-default').timepicker({defaultTime: 'value'});

    });
</script>

<script type="text/javascript" src="common/assets/select2/js/select2.min.js"></script>


<script type="text/javascript">

    $(document).ready(function () {
        $(".js-example-basic-single").select2();

        $(".js-example-basic-multiple").select2();
    });

</script>


<script type="text/javascript">

    $(document).ready(function () {
        var windowH = $(window).height();
        var wrapperH = $('#container').height();
        if (windowH > wrapperH) {
            $('#sidebar').css('height', (windowH) + 'px');
        } else {
            $('#sidebar').css('height', (wrapperH) + 'px');
        }


    });
    
    
</script>

</body>
</html>
