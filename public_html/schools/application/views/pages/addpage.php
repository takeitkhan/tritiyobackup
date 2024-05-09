<div class="row">
    <div class="col-md-9 col-sm-9 col-xs-9">
        <?php echo form_start_divs($page_header, 'Add static webpages'); ?>
        <?php echo form_open_multipart('', array('class' => 'form-horizontal', 'id' => 'addPageForm', 'data-toggle' => 'validator')); ?>
        <?php if (isset($pageinformation->PageId)) { ?>
            <?php
            $data = array(
                'type' => 'hidden',
                'value' => (isset($pageinformation->PageId) ? $pageinformation->PageId : 'none'),
                'name' => 'page_id'
            );
            echo form_input($data);
            ?>
        <?php } ?>
        <div class="form-group">
            <label class="col-md-1">Page Title</label>

            <div class="col-md-11">
                <?php
                $data = array(
                    'name' => 'page_title',
                    'id' => 'page_title',
                    'class' => 'form-control',
                    'data-minlength' => '2',
                    'required' => 'required',
                    'value' => (isset($pageinformation->PageTitle) ? $pageinformation->PageTitle : '')
                );

                echo form_input($data);
                ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-1">Page Route</label>

            <div class="col-md-6">
                <?php
                $data = array(
                    'name' => 'page_route',
                    'id' => 'page_route',
                    'class' => 'form-control',
                    'data-minlength' => '3',
                    'required' => 'required',
                    'value' => (isset($pageinformation->PageRoute) ? $pageinformation->PageRoute : '')
                );
                echo form_input($data);
                ?>
            </div>
            <div class="col-md-3">
                <?php
                $data = array(
                    'id' => 'newportalurl',
                    'class' => 'form-control',
                    'data-minlength' => '4',
                    'readonly' => 'readonly',
                    'value' => (isset($pageinformation->PageRoute) ? $pageinformation->PageRoute : '')
                );
                echo form_input($data);
                ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-1"></label>

            <div class="col-md-5">
                <div id="urlsuggestions1"></div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-1">Parent Page</label>

            <div class="col-lg-5">
                <?php echo form_dropdown('parent_page', (isset($pages) ? $pages : 'None'), set_value('parent_page', (isset($pageinformation->ParentId) ? $pageinformation->ParentId : ''), TRUE), array('class' => 'form-control')); ?>
            </div>
            <label class="col-md-1">Menu Order</label>

            <div class="col-lg-5">
                <?php echo form_dropdown('page_order', (isset($pages) ? $pages : 'None'), set_value('page_order', (isset($pageinformation->PageOrder) ? $pageinformation->PageOrder : ''), TRUE), array('class' => 'form-control')); ?>
            </div>
        </div>
        <div class="form-group">

        </div>
        <div class="form-group">
            <label class="col-md-12">Page Content<br/></label>

            <div class="col-lg-12">
                <?php
                $data = array(
                    'name' => 'page_content',
                    'id' => 'wysiwyg',
                    'class' => 'form-control',
                    'rows' => '10',
                    'cols' => '10',
                    'value' => (isset($pageinformation->Description) ? $pageinformation->Description : '')
                );
                echo form_textarea($data);
                ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-1">Is Active?</label>

            <div class="col-lg-5">
                <label class="radio-inline">
                    <input type="radio" name="page_is_active"
                           value="1" <?php echo set_value('page_is_active', (isset($pageinformation->isActive) ? $pageinformation->isActive  == 1 ? "checked" : "" : '')); ?>>Active
                </label>
                <label class="radio-inline">
                    <input type="radio" name="page_is_active"
                           value="0" <?php echo set_value('page_is_active', (isset($pageinformation->isActive) ? $pageinformation->isActive == 0 ? "checked" : "" : '')); ?>>Deactive
                </label>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-1">Will Show?</label>

            <div class="col-lg-5">
                <label class="radio-inline">
                    <input type="radio" name="is_in_menu"
                           value="1" <?php echo set_value('is_in_menu', (isset($pageinformation->isInMenu) ? $pageinformation->isInMenu == 1 ? "checked" : "" : '')); ?>> Show
                </label>
                <label class="radio-inline">
                    <input type="radio" name="is_in_menu"
                           value="0" <?php echo set_value('is_in_menu', (isset($pageinformation->isInMenu) ? $pageinformation->isInMenu == 0 ? "checked" : "" : '')); ?>> Don't Show
                </label>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-1">Special Page?</label>

            <div class="col-lg-5">
                <label class="radio-inline">
                    <input type="radio" name="is_special"
                           value="1" <?php echo set_value('is_special', (isset($pageinformation->isSpecial) ? $pageinformation->isSpecial == 1 ? "checked" : "" : '')); ?>> Yes
                </label>
                <label class="radio-inline">
                    <input type="radio" name="is_special"
                           value="0" <?php echo set_value('is_special', (isset($pageinformation->isSpecial) ? $pageinformation->isSpecial == 0 ? "checked" : "" : 'checked')); ?>> No
                </label>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-12">
                <input name="addPageBtn" id="addPageBtn" class="btn btn-success" value="Save Changes"
                       type="submit">
                <span></span>
                <input class="btn btn-default" value="Cancel" type="reset">
            </div>
        </div>
        <?php echo form_close(); ?>
        <?php echo form_end_divs(); ?>
    </div>
    <div class="col-md-3 col-sm-3 col-xs-3">
        <?php echo form_start_divs('Latest Uploaded Photos', 'Copy & Paste'); ?>
        <ul>
            <?php foreach ((array)$posts as $post) { ?>
                <li>
                    <a href="<?php __e((isset($post['MediaFileName']) ? base_url() . 'uploads/posts/' . $post['MediaFileName'] : 'javascript:void(0)')); ?>"><?php __e((isset($post['MediaFileName']) ? $post['MediaFileName'] : '')); ?></a>
                </li>
            <?php } ?>
        </ul>
        <?php echo form_end_divs(); ?>
    </div>
</div>
