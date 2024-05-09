<div class="x_panel">
    <div class="x_title">
        <h2><?=$title;?></h2>
        <?php //owndebugger($mysetting);?>
    <ul class="nav navbar-right panel_toolbox">
        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
        </li>
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
            <ul class="dropdown-menu" role="menu">
                <li><a href="#">Settings 1</a></li>
                <li><a href="#">Settings 2</a></li>
            </ul>
        </li>
        <li><a class="close-link"><i class="fa fa-close"></i></a>
        </li>
    </ul><div class="clearfix"></div>        <div class="clearfix"></div>
    </div>
    <div class="x_content" style="display: block;">
        <div class="page-header">
            <ul class="page-stats">
                <li>
                    <div class="animated flipInY summary">
                        <span>Total Send</span>
                        <h3>212</h3>
                    </div>
                </li>
                <li>
                    <div class="animated flipInY summary">
                        <span>Total Buy</span>
                        <h3></h3>
                    </div>
                </li>
                <li>
                    <div class="animated flipInY summary">
                        <span>Total Send</span>
                        <h3></h3>
                    </div>
                </li>
                <li>
                    <div class="animated flipInY summary text-success">
                        <span>Balance</span>
                        <h3><?=$mysetting->sms_limit;?></h3>
                    </div>
                </li>
                <li>
                    <div class="animated flipInY summary">
                        <span>Status</span>
                        <h4><?=$mysetting->status;?></h4>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
