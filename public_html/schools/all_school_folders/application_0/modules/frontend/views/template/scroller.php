<div class="inWrap">
    <div class="ticker">
        <span>সংবাদঃ </span>

        <div class="caroufredsel_wrapper">
            <ul>
                <?php
                if (!empty($scroller)) { ?>
                    <?php foreach ((array)$scroller as $scroll) { ?>
                        <li>
                            <a href="<?php __menu('content?post_id=' . $scroll->PostId .'&title='. $scroll->PostRoute); ?>"><?php __e($scroll->Title); ?></a>
                        </li>
                    <?php } ?>
                <?php } else { ?>
                    <li>এখনো কোন সংবাদ হালনাগাদ করা হয়নি</li>

                <?php } ?>
            </ul>
        </div>
    </div>
</div>