<div class="row">
    <div class="col-md-9 col-xs-9 col-sm-9">
        <?php echo form_start_divs($title, 'Different type of posts from one place'); ?>
        <?php echo form_open_multipart('', array('class' => 'form-horizontal', 'id' => 'postUploadForm')); ?>
        <?php
        $data = array(
            'type' => 'hidden',
            'name' => 'postid',
            'value' => (isset($post->PostId) ? $post->PostId : 'none')
        );
        echo form_input($data);
        ?>
        <?php
        $data = array(
            'type' => 'hidden',
            'name' => 'userid',
            'value' => (isset($userid) ? $userid : 'none')
        );
        echo form_input($data);
        ?>
        <div class="form-group">
            <label class="col-md-3">Title</label>

            <div class="col-md-8">
                <?php
                $data = array(
                    'type' => 'text',
                    'name' => 'posttitle',
                    'required' => 'required',
                    'id' => 'posttitle',
                    'class' => 'form-control',
                    'value' => (isset($post->PostId) ? $post->Title : '')
                );
                echo form_input($data);
                ?>
            </div>
        </div>
         <div class="form-group">
            <label class="col-md-3">Connection Link</label>
               <div class="col-md-8">
                 <?php
                $data = array(
                    'type' => 'url',
                    'name' => 'connection_link',
                    'id' => 'connection_link',
                    'class' => 'form-control',
                    'value' => (isset($post->ConnectionLink) ? $post->ConnectionLink : '')
                );
                echo form_input($data);
                ?>
            </div>
            
         </div>
        <div class="form-group">
            <label class="col-md-3">Route</label>

            <div class="col-md-6">
                <?php
                $data = array(
                    'type' => 'text',
                    'name' => 'postroute',
                    'id' => 'postroute',
                    'class' => 'form-control',
                    'readonly' => true,
                    'value' => (isset($post->PostId) ? $post->PostRoute : '')
                );
                echo form_input($data);
                ?>
                <?php __smallnote('All the text in english without space'); ?>
            </div>
            <div class="col-md-3">
                <div id="urlsuggestions1"></div>
            </div>
        </div>   
        <div class="form-group">
            <label class="col-md-3">Category</label>           

            <div class="col-md-8">
                <?php
                if (!empty($post->Category)) {
                    $selected = explode(',', $post->Category);
                    //owndebugger($selected);
                    foreach ($selected as $row) {
                        $selectie[] = $row;
                    }
                }
                echo form_multiselect('postcategory[]', $postcategory, set_value('postcategory', (isset($selectie) ? $selectie : ''), TRUE), array('multiple' => 'multiple', 'id' => 'multiopt', 'class' => 'form-control'));
                ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-11">Description</label>

            <div class="col-md-12">
                <?php
                $data = array(
                    'type' => 'text',
                    'name' => 'postcontent',
                    'id' => 'wysiwyg',
                    'class' => 'form-control',
                    'rows' => '40',
                    'value' => (isset($post->PostContent) ? $post->PostContent : '')
                );
                echo form_textarea($data);
                ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3">Select File</label>

            <div class="col-md-8">
                <div class="row">
                    <?php
                    $uri1 = $this->uri->segment(1);
                    $uri2 = $this->uri->segment(2);
                    if($uri1 == 'editpost' AND !empty($uri2)) { 
                        ?>
                        <input type="file" name="upload_media_edit" size="250" />
                    <?php } else { ?>
                        <input type="file" name="upload_media" size="250" />
                    <?php } ?>
                    <div class="tenpxm"></div>
                    <?php
                    $data = array(
                        'name' => 'userphoto',
                        'type' => 'hidden',
                        'id' => 'initiateUploadMedia',
                        'class' => 'form-control',
                        'value' => (isset($post->MediaFileName) ? $post->MediaFileName : '')
                    );
                    echo form_input($data);
                    ?>
                </div>
            </div>            
        </div>
        <div class="form-group">
            <label class="col-md-3">Current Photo</label>
            <div class="col-md-11">
                <?php
                if (isset($post->MediaFileName)) {
                    $url = base_url() . "uploads/posts/" . $post->MediaFileName;
                } else {
                    $url = '';
                }
                $class = 'avatar img-rounded img-thumbnail';
                $alt = 'avatar';
                __img($url, $class, $alt);
                ?>

            </div>
        </div>
        <div class="form-group">
            <div class="col-md-8">
                <?php __submitbtn('postUploadBtn'); ?>
                <span></span>
                <?php __resetbtn(); ?>
            </div>
        </div>
        <?php echo form_close(); ?>
        <?php echo form_end_divs(); ?>
    </div>
    <div class="col-md-3 col-xs-3 col-sm-3">
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
        <?php foreach ((array) $posts as $post) { ?>
            <div class="col-md-4" style="overflow: hidden; max-height: 70px; min-height: 70px; margin: 5px 0px 0px 0px;">
                <a href="<?php __e((isset($post['MediaFileName']) ? base_url() . 'uploads/posts/' . $post['MediaFileName'] : 'javascript:void(0)')); ?>">
                    <img class="img-responsive" style="width: 100%;" src="<?php __e((isset($post['MediaFileName']) ? base_url() . 'uploads/posts/' . $post['MediaFileName'] : 'javascript:void(0)')); ?>" />
                </a>
            </div>
        <?php } ?>

        <?php echo form_end_divs(); ?>
    </div>
</div>