<div class="x_panel">
    <div class="x_title">
        <?php settingHTML('Overview & Stats'); ?>
        <div class="clearfix"></div>
    </div>
    <div class="x_content" style="display: block;">
        <div class="page-header">
            <ul class="page-stats">
                <li>
                    <div class="animated flipInY summary">
                        <span>Total Students</span>
                        <h3><?php __e((isset($totalss[0]->totalstudents) ? $totalss[0]->totalstudents : '')); ?></h3>
                    </div>
                </li>
                <li>
                    <div class="animated flipInY summary">
                        <span>Total Boys</span>
                        <h3><?php __e((isset($totalss[0]->boys) ? $totalss[0]->boys : '')); ?></h3>
                    </div>
                </li>
                <li>
                    <div class="animated flipInY summary">
                        <span>Total Girls</span>
                        <h3><?php __e((isset($totalss[0]->girls) ? $totalss[0]->girls : '')); ?></h3>
                    </div>
                </li>
                <li>
                    <div class="animated flipInY summary text-danger">
                        <span>Updates Gender For</span>
                        <h3>
                            <?php
                            $ts = $totalss[0]->totalstudents;
                            $boy = $totalss[0]->boys;
                            $girl = $totalss[0]->girls;
                            $u = $boy + $girl;
                            __e($ts - $u);
                            ?>
                        </h3>
                    </div>
                </li>
                <li>
                    <div class="animated flipInY summary">
                        <span>Total Teachers</span>
                        <h3><?php __e((isset($totalss[0]->totalteachers) ? $totalss[0]->totalteachers : '')); ?></h3>
                    </div>
                </li>
                <li>
                    <div class="animated flipInY summary">
                        <span>Total Credit</span>
                        <h3><?php __e((isset($totalss[0]->allcredit) ? $totalss[0]->allcredit : '')); ?></h3>
                    </div>
                </li>
                <li>
                    <div class="animated flipInY summary">
                        <span>Total Debit</span>
                        <h3><?php __e((isset($totalss[0]->alldebit) ? $totalss[0]->alldebit : '')); ?></h3>
                    </div>
                </li>
                <li>
                    <?php
                    $ac = $totalss[0]->allcredit;
                    $ad = $totalss[0]->alldebit;
                    if ($ac < $ad) {
                        $cd = 'text-danger';
                    }
                    ?>
                    <div class="animated flipInY summary <?php __e((isset($cd) ? $cd : 'text-success')); ?>">
                        <span>Balance</span>
                        <h3>
                            <?php
                            __e($ac - $ad);
                            ?>
                        </h3>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
<div class="x_panel">
    <div class="x_title">
        <?php settingHTML('Class Wise Students'); ?>
        <div class="clearfix"></div>
    </div>
    <div class="x_content" style="display: block;">
        <div class="page-header">            
            <ul class="page-stats">
                <?php
                foreach ($infos as $i) {
                	echo $i;
                }
                ?>
            </ul>
            <br/>
            <br/>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <?php settingHTML('Students Management'); ?>
                <div class="clearfix"></div>
            </div>
            <div class="x_content" style="display: block;">
                <?php echo icons_menu3('fa-plus-square-o', 'usergenerator', 'Generate User'); ?>
                <?php echo icons_menu3('fa-list', 'viewstudents', 'All Students'); ?>
                <?php echo icons_menu3('fa-hourglass', 'admissionrequest', 'New Applicants'); ?>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <?php settingHTML('Teachers & Staffs Management'); ?>
                <div class="clearfix"></div>
            </div>
            <div class="x_content" style="display: block;">
                <?php echo icons_menu3('fa-plus-square', 'usergenerator', 'Generate User'); ?>
                <?php echo icons_menu3('fa-list', 'viewstudents', 'All Teachers'); ?>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <?php settingHTML('Accounts Management'); ?>
                <div class="clearfix"></div>
            </div>
            <div class="x_content" style="display: block;">
                <?php echo icons_menu3('fa-plus-square', 'newledgername', 'Add Ledger Name'); ?>
                <?php echo icons_menu3('fa-plus-square', 'newpayment', 'Add Payment'); ?>
                <?php echo icons_menu3('fa-plus-square', 'transactionidadder', 'New Transaction ID'); ?>
                <?php echo icons_menu3('fa-list', 'paymentlists', 'Payments'); ?>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <?php settingHTML('Quick Links'); ?>
                <div class="clearfix"></div>
            </div>
            <div class="x_content" style="display: block;">
                <?php echo icons_menu('fa-plus-square-o', 'addmedia', 'New Upload'); ?>
                <?php echo icons_menu('fa-picture-o', 'media', 'View Medias'); ?>
            </div>
        </div>
    </div>
</div>