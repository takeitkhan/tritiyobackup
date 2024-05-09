<?php $this->load->view('header'); ?>
<?php //print_r($notice) ?>
        <div class="col-md-9 col-lg-9 col-sm-12 col-xs-12">
            <div class="leftinner_content leftinner_content_sub">
            <?php foreach ($notice as $item) :?>
                <h1 class="blue"><?php __e((isset($item->Title)) ? $item->Title : ''); ?></h1>

                <div class='subpagecon'>
                    <?php __e((isset($item->PostContent)) ? $item->PostContent : ''); ?>
                </div>
            <?php endforeach; ?>
            </div>
        </div>
        <div class="col-md-3 col-lg-3 col-sm-12 col-xs-12">
            <div class="leftMenu">
                <div class="impLinksWrap homelinks">
					<?php if (!empty($widget2)) : ?>
                        <div class="firstColumn">
                            <?php
                            __e('<h4 style="background: #278AF0">' . (isset($widget2['BlockTitle']) ? $widget2['BlockTitle'] : '') . '</h4>');
                            __e((isset($widget2['BlockContent']) ? $widget2['BlockContent'] : ''));
                            ?>
                        </div>
                    <?php endif; ?>
                    <div class="clear margin15"></div>
					<?php if (!empty($widget1)) : ?>
                        <div class="secondColumn">
                            <?php
                            __e('<h4 style="background: #7AB700">' . (isset($widget1['BlockTitle']) ? $widget1['BlockTitle'] : '') . '</h4>');
                            __e((isset($widget1['BlockContent']) ? $widget1['BlockContent'] : ''));
                            ?>
                        </div>
                    <?php endif; ?>
                    <div class="clear margin15"></div>
                    <div class="firstColumn">
                        <h4 style="background: #278AF0">নোটিশ বোর্ড</h4>
                        <?php
                        //owndebugger($notices);
                        ?>
                        <ul>
                            <?php
                            if (is_array($notices)) {
                                foreach ($notices as $notice) { ?>
                                    <?php //owndebugger($notice->PostId); ?>
                                    <li>
                                        <a href="<?php __menu('notice/'. $notice->PostId); ?>"><?php __e($notice->Title); ?></a>
                                    </li>
                                <?php }
                            }
                            ?>
                        </ul>
                    </div>
                    <div class="clear margin15"></div>
                    <div class="secondColumn">
                        <h4 style="background: #7AB700">ডাউনলোড কর্নার </h4>
                        <ul>
                            <?php
                            if (is_array($downloads)) {
                                foreach ((array)$downloads as $download) { ?>
                                    <li>
                                        <a href="<?php __menu('download/' . $download->PostId); ?>"><?php __e($download->Title); ?></a>
                                    </li>
                                <?php }
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
<?php $this->load->view('footer'); ?>