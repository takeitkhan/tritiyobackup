<?php
    //owndebugger($single_post);    
?>
    <div class="row margin15">
        <div class="col-md-9 col-lg-9 col-sm-12 col-xs-12">
            <div class="leftinner_content leftinner_content_sub">
                <h1 class="blue"><?php __e((isset($single_post->Title)) ? $single_post->Title : ''); ?></h1>

                <div class='subpagecon'>                    
                    <?php
                        if(!empty($single_post->MediaFileName)) {
                            echo '<img src="uploads/posts/'. $single_post->MediaFileName .'" style="max-width: 100%;" /><br/>';
                        } else {

                        }
                        __e((isset($single_post->PostContent)) ? $single_post->PostContent : '');
                    ?>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-lg-3 col-sm-12 col-xs-12">
            <div class="leftMenu">
                <div class="impLinksWrap homelinks">
                    <?php if (!empty($widget1)) : ?>
                        <div class="firstColumn">
                            <?php
                            __e('<h4 style="background: #278AF0">' . (isset($widget1['BlockTitle']) ? $widget1['BlockTitle'] : '') . '</h4>');
                            __e((isset($widget1['BlockContent']) ? $widget1['BlockContent'] : ''));
                            ?>
                        </div>
                    <?php endif; ?>
                    <div class="clear margin15"></div>
                    <?php if (!empty($widget2)) : ?>
                        <div class="secondColumn">
                            <?php
                            __e('<h4 style="background: #7AB700">' . (isset($widget2['BlockTitle']) ? $widget2['BlockTitle'] : '') . '</h4>');
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
                                        <a href="<?php __menu('post/' . $notice->PostRoute . '?post_id=' . $notice->PostId); ?>"><?php __e($notice->Title); ?></a>
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
                                        <a href="<?php __menu('post/' . $download->PostRoute . '?post_id=' . $download->PostId); ?>"><?php __e($download->Title); ?></a>
                                    </li>
                                <?php }
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>