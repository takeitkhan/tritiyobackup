<div class="row margin15">
    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
        <h4>পাতাসমুহ</h4>
        <hr/>
        <?php
        $html = '<ul class="unstyled list-group" style="-moz-column-count: 2; -webkit-column-count: 2; column-count: 2;">';
        foreach ($pages as $menu) {
            if (!empty($menu->Childs)) {
                $html .= '<li><a href="' . base_url() . 'page/' . trim($menu->PageRoute) . '?page_id=' . trim($menu->PageId) . '">' . $menu->PageTitle . '</a>';
            } else {
                $html .= '<li><a href="' . base_url() . 'page/' . $menu->PageRoute . '?page_id=' . trim($menu->PageId) . '">' . trim($menu->PageTitle) . '</a></li>';
            }
            if (!empty($menu->Childs)) {
                $childs = explode('|', $menu->Childs);
                $html .= '<ul>';
                foreach ($childs as $child) {
                    $menu = explode(';', $child);
                    $html .= '<li><a href="' . base_url() . 'page/' . trim($menu[1]) . '?page_id=' . trim($menu[0]) . '">' . trim($menu[2]) . '</a></li>';
                }
                $html .= '</ul>';
            }
            if (!empty($menu->Childs)) {
                $html .= '</li>';
            } else {

            }
            $html .= '</li>';
        }
        $html .= '</ul>';
        echo $html;
        ?>
        <h4>খবর</h4>
        <hr/>
        <?php
        if(!empty($latestnews)) {
            echo '<ul class="unstyled list-group" style="-moz-column-count: 2; -webkit-column-count: 2; column-count: 2;">';
            foreach($latestnews as $news) {
                echo '<li><a href="'. base_url() . 'content?post_id=' . $news->PostId .'&title='. $news->PostRoute .'">' . $news->Title . '</a></li>';
            }
            echo '</ul>';
        }
        ?>        
    </div>
</div>