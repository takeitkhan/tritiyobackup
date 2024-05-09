<div class="row">
    <div class="col-md-8 col-sm-8 col-xs-8">
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
            <label class="col-md-12">Page Title</label>

            <div class="col-md-12">
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
            <label class="col-md-12">Page Route</label>

            <div class="col-md-12">
                <?php
                $data = array(
                    'id' => 'newportalurl',
                    'name' => 'page_route',
                    'class' => 'form-control',
                    'data-minlength' => '4',
                    'readonly' => 'readonly',
                    'value' => (isset($pageinformation->PageRoute) ? $pageinformation->PageRoute : '')
                );
                echo form_input($data);
                ?>
                <?php
                $data = array(                    
                    'id' => 'page_route',
                    'class' => 'form-control',
                    'type' => 'hidden',
                    'data-minlength' => '3',
                    //'required' => 'required',
                    'value' => (isset($pageinformation->PageRoute) ? $pageinformation->PageRoute : '')
                );
                echo form_input($data);
                ?>
            </div>
            <div class="col-md-3">
                <div id="urlsuggestions1"></div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-12">SEO Title</label>

            <div class="col-md-12">
                <?php
                $data = array(
                    'name' => 'seo_title',
                    'id' => 'seo_title',
                    'class' => 'form-control',
                    'data-minlength' => '2',
                    'value' => (isset($pageinformation->SeoTitle) ? $pageinformation->SeoTitle : '')
                );

                echo form_input($data);
                ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-12">Meta Keyword</label>

            <div class="col-md-12">
                <?php
                $data = array(
                    'name' => 'metakeyword',
                    'class' => 'form-control',
                    'rows' => '3',
                    'cols' => '5',
                    'value' => (isset($pageinformation->MetaKeyword) ? $pageinformation->MetaKeyword : '')
                );
                echo form_textarea($data);
                // $data = array(
                //     'name' => 'metakeyword',
                //     'id' => 'metakeyword',
                //     'class' => 'form-control',
                //     'data-minlength' => '2',
                //     'value' => (isset($pageinformation->MetaKeyword) ? $pageinformation->MetaKeyword : '')
                // );

                // echo form_input($data);
                ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-12">Meta Description</label>

            <div class="col-md-12">
                <?php
                $data = array(
                    'name' => 'meta_description',
                    'class' => 'form-control',
                    'rows' => '3',
                    'cols' => '5',
                    'value' => (isset($pageinformation->MetaDescription) ? $pageinformation->MetaDescription : '')
                );
                echo form_textarea($data);
                // $data = array(
                //     'name' => 'meta_description',
                //     'id' => 'meta_description',
                //     'class' => 'form-control',
                //     'data-minlength' => '2',
                //     'value' => (isset($pageinformation->MetaDescription) ? $pageinformation->MetaDescription : '')
                // );

                // echo form_input($data);
                ?>
            </div>
        </div>        
        <div class="form-group">
            <label class="col-md-1">Parent Page</label>

            <div class="col-lg-5">
                <?php echo form_dropdown('parent_page', (isset($pages) ? $pages : 'None'), set_value('parent_page', (isset($pageinformation->ParentId) ? $pageinformation->ParentId : ''), TRUE), array('class' => 'form-control')); ?>
            </div>
            <label class="col-md-1">Menu Order</label>

            <div class="col-lg-5">
            	<?php $pagess = array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50)?>
                <?php echo form_dropdown('page_order', (isset($pagess) ? $pagess : 'None'), set_value('page_order', (isset($pageinformation->PageOrder) ? $pageinformation->PageOrder : ''), TRUE), array('class' => 'form-control')); ?>
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
            <label class="col-md-2">Is Active?</label>

            <div class="col-lg-5">
                <label class="radio-inline">
                    <input type="radio" name="page_is_active"
                           value="1" <?php echo set_value('page_is_active', (isset($pageinformation->isActive) ? $pageinformation->isActive  == 1 ? "checked" : "" : 'checked')); ?>>Active
                </label>
                <label class="radio-inline">
                    <input type="radio" name="page_is_active"
                           value="0" <?php echo set_value('page_is_active', (isset($pageinformation->isActive) ? $pageinformation->isActive == 0 ? "checked" : "" : '')); ?>>Deactive
                </label>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-2">Will Show?</label>

            <div class="col-lg-5">
                <label class="radio-inline">
                    <input type="radio" name="is_in_menu"
                           value="1" <?php echo set_value('is_in_menu', (isset($pageinformation->isInMenu) ? $pageinformation->isInMenu == 1 ? "checked" : "" : 'checked')); ?>> Show
                </label>
                <label class="radio-inline">
                    <input type="radio" name="is_in_menu"
                           value="0" <?php echo set_value('is_in_menu', (isset($pageinformation->isInMenu) ? $pageinformation->isInMenu == 0 ? "checked" : "" : '')); ?>> Don't Show
                </label>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-2">Special Page?</label>

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
            <?php
            	
            ?>
        </div>
        <div class="form-group">
            <label class="col-md-2">Is Mega Menu?</label>

            <div class="col-lg-5">
                <label class="radio-inline">
                    <input type="radio" name="is_mega_menu"
                           value="1" <?php echo set_value('is_mega_menu', (isset($pageinformation->isMegaMenu) ? $pageinformation->isMegaMenu == 1 ? "checked" : "" : "")); ?>> Yes
                </label>
                <label class="radio-inline">
                    <input type="radio" name="is_mega_menu"
                           value="0" <?php echo set_value('is_mega_menu', (isset($pageinformation->isMegaMenu) ? $pageinformation->isMegaMenu == 0 ? "checked" : "" : "checked")); ?>> No
                </label>
            </div>
            <?php
            	
            ?>
        </div>
        <div class="form-group">
            <label class="col-md-2">On Menu</label>

            <div class="col-lg-5">
                <label class="radio-inline">
                    <input type="radio" name="is_secondary"
                           value="1" <?php echo set_value('is_secondary', (isset($pageinformation->isSecondary) ? $pageinformation->isSecondary == 1 ? "checked" : "" : 'checked')); ?>> Primary
                </label>
                <label class="radio-inline">
                    <input type="radio" name="is_secondary"
                           value="2" <?php echo set_value('is_secondary', (isset($pageinformation->isSecondary) ? $pageinformation->isSecondary == 2 ? "checked" : "" : '')); ?>> Secondary
                </label>
            </div>
            <?php
            	
            ?>
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
    <div class="col-md-4 col-sm-4 col-xs-4">
        <?php echo form_open_multipart('', array('class' => 'form-horizontal', 'id' => 'addMediaForm')); ?>
            <div class="modal-body">
            	<?php
		        $data = array(
		            'type' => 'hidden',
		            'name' => 'postid',
		            'value' => (isset($post->PostId) ? $post->PostId : 'none')
		        );
		        echo form_input($data);
		        ?>
                <input name="userid" type="hidden"
                       value="<?php __e((isset($userid) ? $userid : 0)); ?>">
                <input name="postcategory" type="hidden"
                       value="47">

                <div class="form-group">
                    <div class="col-md-7">
                        <input type="file" name="upload_media" />
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <input id="addMediaBtn" class="btn btn-success" value="Add Media"
                       type="submit">
                <input class="btn btn-default" value="Cancel" type="reset">
            </div>
        <?php echo form_close(); ?>
        
		<?php echo form_start_divs('Latest Uploaded Photos', 'Copy & Paste'); ?>
            <?php foreach ((array)$posts as $post) { ?>
                <div class="col-md-4" style="overflow: hidden; max-height: 70px; min-height: 70px; margin: 5px 0px 0px 0px;">
                    <a href="<?php __e((isset($post['MediaFileName']) ? base_url() . 'uploads/posts/' . $post['MediaFileName'] : 'javascript:void(0)')); ?>">
                    	<img class="img-responsive" style="width: 100%;" src="<?php __e((isset($post['MediaFileName']) ? base_url() . 'uploads/posts/' . $post['MediaFileName'] : 'javascript:void(0)')); ?>" />
                    </a>
                </div>
            <?php } ?>
        
        <?php echo form_end_divs(); ?>
    </div>
</div>
