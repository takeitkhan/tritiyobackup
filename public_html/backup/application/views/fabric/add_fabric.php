
<?php 
    if(!empty($fabric)){
    $fabric = (object)$fabric; 
    }
?>
<div class="row">
    <div class="col-md-7 col-xs-7 col-sm-7">
        <?php echo form_start_divs($title, 'Different type of posts from one place'); ?>
            <?php echo form_open_multipart('', array('class' => 'form-horizontal' ,'id' => 'fabricUploadForm' ));?>
            <?php
                $data = array(
                    'type' => 'hidden',
                    'name' => 'fabricid',
                    'value' => (isset($fabric->id) ? $fabric->id : 'none')
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
                <label class="col-md-3">Fabric Name</label>

                <div class="col-md-8">
                    <?php
                        $data = array(
                            'type' => 'text',
                            'name' => 'fabricname',
                            'required' => 'required',
                            'id' => 'posttitle',
                            'class' => 'form-control',
                            'value' => (isset($fabric->fabric_title) ? $fabric->fabric_title : '')
                        );
                        echo form_input($data);
                    ?>
                </div>
            </div>
         
       
            <div class="form-group">
                <label class="col-md-11">Fabric Description</label>

                <div class="col-md-12">
                    <?php
                        $data = array(
                            'type' => 'text',
                            'name' => 'fabricdetails',
                            'class' => 'form-control',
                            'rows' => '5',
                            'value' => (isset($fabric->fabric_details) ? $fabric->fabric_details : '')
                        );
                        echo form_textarea($data);
                    ?>
                </div>
            </div>
            <?php $fabric_icon = isset($fabric->fabric_icon) ? $fabric->fabric_icon : ''; ?>
            <div class="form-group">
                <label class="col-md-3">Fabric Icon ID</label>
                <div class="col-md-8">
                    <input type="number" required class="form-control" id="media_id_values" value="<?php echo (!empty($fabric_icon) ? $fabric_icon : 'none'); ?>" name="fabricicon" placeholder="" />
                </div>
                
            </div>
            <?php $fabric_image = isset($fabric->fabric_image) ? $fabric->fabric_image : ''; ?>
            <div class="form-group">
                <label class="col-md-3">Fabric Image ID</label>

                <div class="col-md-8">
                    <input type="number" class="form-control" required id="media_id_values" value="<?php echo (!empty($fabric_image) ? $fabric_image : 'none'); ?>" name="fabricimage" placeholder="" />
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
    <div class="col-md-5 col-xs-5 col-sm-5">
        <?php $this->load->view('media/media_list', $medias); ?>
    </div>
</div>