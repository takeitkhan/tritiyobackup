<div class="row">
    <div class="col-md-4">
        <div class="x_panel">
            <div class="x_title">
                <h2>Recent
                    <small>Messages</small>
                </h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                           aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#">Settings 1</a>
                            </li>
                            <li><a href="#">Settings 2</a>
                            </li>
                        </ul>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div style="display: block;" class="x_content">
                <?php
                if (!empty($messages)) {
                    foreach ((array)$messages as $msg) {
                        //owndebugger($msg);
                        ?>
                        <article class="media event">
                            <a class="pull-left date"><p class="month"><?php __e(inttodatebdm($msg['time'], true)); ?></p>
                                <p class="day"><?php __e(inttodatebdd($msg['time'])); ?></p></a>
                            <div class="media-body">
                                <p><?php __e((isset($msg['message']) ? $msg['message'] : '')); ?></p>
                            </div>
                        </article>
                        <?php
                    }
                } else {
                    __e('You have not received any message yet');
                }
                ?>

            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="x_panel">
            <div class="x_title">
                <h2>Top Profiles
                    <small>Sessions</small>
                </h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                           aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#">Settings 1</a>
                            </li>
                            <li><a href="#">Settings 2</a>
                            </li>
                        </ul>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <article class="media event">
                    <a class="pull-left date">
                        <p class="month">April</p>
                        <p class="day">23</p>
                    </a>
                    <div class="media-body">
                        <a class="title" href="#">Item One Tittle</a>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </div>
                </article>
                <article class="media event">
                    <a class="pull-left date">
                        <p class="month">April</p>
                        <p class="day">23</p>
                    </a>
                    <div class="media-body">
                        <a class="title" href="#">Item Two Tittle</a>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </div>
                </article>
                <article class="media event">
                    <a class="pull-left date">
                        <p class="month">April</p>
                        <p class="day">23</p>
                    </a>
                    <div class="media-body">
                        <a class="title" href="#">Item Two Tittle</a>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </div>
                </article>
                <article class="media event">
                    <a class="pull-left date">
                        <p class="month">April</p>
                        <p class="day">23</p>
                    </a>
                    <div class="media-body">
                        <a class="title" href="#">Item Two Tittle</a>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </div>
                </article>
                <article class="media event">
                    <a class="pull-left date">
                        <p class="month">April</p>
                        <p class="day">23</p>
                    </a>
                    <div class="media-body">
                        <a class="title" href="#">Item Three Tittle</a>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </div>
                </article>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="x_panel">
            <div class="x_title">
                <h2>Top Profiles
                    <small>Sessions</small>
                </h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                           aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#">Settings 1</a>
                            </li>
                            <li><a href="#">Settings 2</a>
                            </li>
                        </ul>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <article class="media event">
                    <a class="pull-left date">
                        <p class="month">April</p>
                        <p class="day">23</p>
                    </a>
                    <div class="media-body">
                        <a class="title" href="#">Item One Tittle</a>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </div>
                </article>
                <article class="media event">
                    <a class="pull-left date">
                        <p class="month">April</p>
                        <p class="day">23</p>
                    </a>
                    <div class="media-body">
                        <a class="title" href="#">Item Two Tittle</a>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </div>
                </article>
                <article class="media event">
                    <a class="pull-left date">
                        <p class="month">April</p>
                        <p class="day">23</p>
                    </a>
                    <div class="media-body">
                        <a class="title" href="#">Item Two Tittle</a>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </div>
                </article>
                <article class="media event">
                    <a class="pull-left date">
                        <p class="month">April</p>
                        <p class="day">23</p>
                    </a>
                    <div class="media-body">
                        <a class="title" href="#">Item Two Tittle</a>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </div>
                </article>
                <article class="media event">
                    <a class="pull-left date">
                        <p class="month">April</p>
                        <p class="day">23</p>
                    </a>
                    <div class="media-body">
                        <a class="title" href="#">Item Three Tittle</a>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </div>
                </article>
            </div>
        </div>
    </div>
</div>