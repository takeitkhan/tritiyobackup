<?php //owndebugger($product); ?>

<?php echo form_start_divs($title, 'Different type of products from one place'); ?>
<?php echo $this->session->flashdata('msg'); ?>
<?php $fabrics = $this->db->get('fabrics')->result(); ?>


<!--<div class="col-md-12">-->
<!--    <form action="" method="get">-->
<!--        <input type="text" name="sku" value="--><?php //echo @$this->input->get('sku') ?><!--" placeholder="Enter Sofa Sku" class="form-control" required>-->
<!--    </form>-->
<!--</div>-->
<!--<div class="col-md-12">-->
<!--    <br />-->
<!--</div>-->
<?php if(!@$product->id) { ?>
        <div class="col-md-12">
            <p style="color: #ff0000;">Please Enter a Valid Sku for Sofa Category.</p>
        </div>

<!--    <style>-->
<!--        .x_panel:last-child { display: none; }-->
<!--    </style>-->
<?php } else { ?>
<?php echo form_open_multipart('', array('class' => 'form-horizontal', 'id' => 'productEditSofa')); ?>
<div class="row">
    <div class="col-sm-8">
        <?php
        $data = array(
            'type' => 'hidden',
            'name' => 'id',
            'value' => (isset($product->id) ? $product->id : 'none')
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
            <label class="col-sm-4">Product SKU</label>
            <div class="col-sm-8">
                <?php
                $data = array(
                    'type' => 'text',
                    'name' => 'SKU',
                    'id' => 'SKU',
                    'class' => 'form-control',
                    'placeholder' => (isset($product->sku) ? $product->pre_sku : ''),
                    'readonly' => 'readonly'
                );
                echo form_input($data);
                ?>
            </div>
        </div>

        <input type="hidden" name="pre_sku" value="<?php echo @$product->pre_sku; ?>" />
        <input type="hidden" name="pre_product" value="<?php echo @$product->pre_product; ?>" />


        <div class="form-group">
            <label class="col-sm-4">Product Name</label>
            <div class="col-sm-8">
                <?php
                $data = array(
                    'type' => 'text',
                    'name' => 'name',
                    'required' => 'required',
                    'id' => 'name',
                    'class' => 'form-control',
                    'value' => (isset($product->name) ? $product->name : '')
                );
                echo form_input($data);
                ?>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-4">Product Code</label>
            <div class="col-sm-8">
                <?php
                $data = array(
                    'type' => 'text',
                    'name' => 'code',
                    'required' => 'required',
                    'id' => 'product_code',
                    'class' => 'form-control',
                    'value' => (isset($product->code) ? $product->code : '')
                );
                echo form_input($data);
                ?>
            </div>
        </div>         
        <div class="form-group">
            <label class="col-sm-4">  Product Price</label>
            <div class="col-sm-8">
                <div class="input-group">
                    <span class="input-group-addon">Tk.</span>
                    <?php
                    $data = array(
                        'type' => 'text',
                        //'pattern'=>'(\d{3})([\.])(\d{2})',
                        'name' => 'price',
                        'required' => 'required',
                        'id' => 'color',
                        'class' => 'form-control',
                        //'onkeyup' =>"makeCurrency(this);",
                        'value' => (isset($product->price) ? $product->price : '')
                    );
                    echo form_input($data);
                    ?>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-4">  Discount (without percent)</label>
            <div class="col-sm-8">
                <div class="input-group">
                    <span class="input-group-addon">%</span>
                    <?php
                    $data = array(
                        'type' => 'text',
                        //'pattern'=>'(\d{3})([\.])(\d{2})',
                        'name' => 'discount',
                        'required' => 'required',
                        'id' => 'color',
                        'class' => 'form-control',
                        //'onkeyup' =>"makeCurrency(this);",
                        'value' => (isset($product->discount) ? $product->discount : '0')
                    );
                    echo form_input($data);
                    ?>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-12">Product Description</label>
            <div class="col-sm-12">
                <textarea name="product_description" cols="40" rows="40" type="text" id="wysiwyg" ><?php echo isset($product->description) ? $product->description : ''; ?></textarea>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-4">Material</label>
            <div class="col-sm-8">
                <?php
                $data = array(
                    'name' => 'material',
                    'required' => 'required',
                    'id' => 'material',
                    'class' => 'form-control',
                    'value' => (isset($product->material) ? $product->material : ''),
                    'style' => 'height:100px;max-width:100%;'
                );
                echo form_textarea($data);
                ?>
            </div>
        </div> 




        <div class="form-group">
            <label class="col-sm-4">Color</label>
            <div class="col-sm-8">
                <?php
                $data = array(
                    'type' => 'text',
                    'name' => 'color',
                    'required' => 'required',
                    'id' => 'color',
                    'class' => 'form-control',
                    'value' => (isset($product->color) ? $product->color : '')
                );
                echo form_input($data);
                ?>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-4">Dimension</label>
            <div class="col-sm-8">
                <?php
                $data = array(
                    'type' => 'text',
                    'name' => 'dimension',
                    'required' => 'required',
                    'id' => 'color',
                    'class' => 'form-control',
                    'value' => (isset($product->dimension) ? $product->dimension : '')
                );
                echo form_input($data);
                ?>
            </div>
        </div>



        <div class="form-group">
            <label class="col-sm-4">Delivery Area</label>
            <div class="col-sm-8">
                <?php
                $data = array(
                    'type' => 'text',
                    'name' => 'delivery_area',
                    'required' => 'required',
                    'id' => 'color',
                    'class' => 'form-control',
                    'value' => (isset($product->delivery_area) ? $product->delivery_area : '')
                );
                echo form_input($data);
                ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-4">  Delivery Charge</label>
            <div class="col-sm-8">
                <div class="input-group">
                    <span class="input-group-addon">Tk.</span>
                    <?php
                    $data = array(
                        'type' => 'text',
                        'name' => 'delivery_charge',
                        'required' => 'required',
                        //'pattern'=>'(\d{1})([\.])(\d{2})',
                        'id' => 'color',
                        'class' => 'form-control',
                        //'onkeyup' =>"makeCurrency(this);",
                        'value' => (isset($product->delivery_charge) ? $product->delivery_charge : '')
                    );
                    echo form_input($data);
                    ?>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-4">Delivery Time</label>
            <div class="col-sm-8">
                <?php
                $data = array(
                    'type' => 'text',
                    'name' => 'delivery_time',
                    'required' => 'required',
                    'id' => 'color',
                    'class' => 'form-control',
                    'value' => (isset($product->delivery_time) ? $product->delivery_time : '')
                );
                echo form_input($data);
                ?>
            </div>
        </div>
    </div>

    <div class="col-sm-4">
        <div class="row">
            <div class="col-sm-12">

                <style type="text/css">
                    .images-panel .img_list{
                        max-height: 300px;
                        overflow: auto;
                    }
                    .list-group-item img{
                        width:60px;
                        height:60px;
                        margin-right:15px;
                        float:left;
                    }
                    .list-group-item :after{
                        display: table;
                        content: " ";
                        clear: both;
                    }



                    .category-panel .panel-body{
                        max-height: 300px;
                        overflow: auto;
                    }
                    .category-panel ul{
                        list-style: none;
                        padding-left: 0px;
                    }
                    .category-panel ul ul{
                        list-style: none;
                        padding-left: 20px;
                    }

                </style>

                <div class="panel panel-default images-panel">
                    <div class="panel-heading">Product Images</div>
                    <ul class="list-group img_list">
                        <li class="list-group-item">
                            <input type="file" name="_uploadimage" id="_uploadimage" class="inputfile" />
                        </li>
                        <?php
                        if (isset($product->images)):
                            foreach ($product->images as $media):
                                ?>
                                <li class="list-group-item">
                                    <img src="<?php echo base_url($media['url']); ?>">
                                    <input type="hidden" name="imgs[]" value="<?php echo $media['idno']; ?>"> 
                                    <p><?php echo $media['file_name']; ?><br> <a class="btn btn-danger btn-xs remove"><i class="fa fa-remove" aria-hidden="true"></i> Remove</a> </p>
                                </li>
                                <?php
                            endforeach;
                        endif;
                        ?>
                    </ul>
                </div>

                <div class="panel panel-default category-panel">
                    <div class="panel-heading">Select Fabrics </div>
                    <div class="panel-body">
                        <?php  foreach($fabrics as $fabric):
                                $febric_img = $this->db->get_where('media_file', ['idno' => $fabric->fabric_image])->row();
                                $image_url = base_url($febric_img->upload_dir. '/' .$febric_img->idno. '.'. $febric_img->extension);
                            ?>
                        <label>
                            <input type="radio" name="fabrics"  value="<?php echo $fabric->id ?>"
                                <?php if (@$product->fabrics == $fabric->id)  { echo 'checked=checked'; }; ?>>
                            <?php echo $fabric->fabric_title ?> <img width="50" height="50" src="<?php echo $image_url; ?>">
                        </label><br/>
                       <?php endforeach; ?>
                    </div>
                </div>



                <div style="display: none;" class="panel panel-default category-panel">
                    <div class="panel-heading">Type of product</div>
                    <div class="panel-body">
                        <label><input type="radio" name="categorization"  value="1" <?php if (@$product->categorization == 1)  { echo 'checked=checked'; }; ?>> Laminated Board - 100 series</label><br/>
                        <label><input type="radio" name="categorization"  value="2" <?php if (@$product->categorization == 2)  { echo 'checked=checked'; }; ?>> Metal-200 series</label><br/>
                        <label><input type="radio" name="categorization"  value="3" <?php if (@$product->categorization == 3)  { echo 'checked=checked'; };?>> Wood -300 series</label><br/>
                    </div>
                </div>



                <div style="display: none;" class="panel panel-default category-panel">
                    <div class="panel-heading">Product Category</div>
                    <div class="panel-body">
                        <?php
                        //owndebugger($product->categories);
                        $selected_category_ids = (isset($product->categories) ? array_column($product->categories, 'id') : array());
                        category_h_checkbox_html($categories, 50, 'category_id', $selected_category_ids)
                        ?>                     
                    </div>
                </div>

                <div style="display: none;" class="panel panel-default category-panel">
                    <div class="panel-heading">Is it features product?</div>
                    <div class="panel-body">
                        <input type="radio" name="stricky"  value="1" <?php echo (isset($product->stricky) && $product->stricky) ? 'checked=checked' : ''; ?>> Yes<br>
                        <input type="radio" name="stricky"  value="0" <?php echo (isset($product->stricky) && $product->stricky) ? '' : 'checked=checked'; ?>> No<br>               
                    </div>
                </div>
                <div class="panel panel-default category-panel">
                    <div class="panel-heading">Stock Status</div>
                    <div class="panel-body">
                        <input type="radio" name="stock_status"  value="1" <?php echo (!empty($product->stock_status) && $product->stock_status == 1) ? 'checked=checked' : 'checked=checked'; ?>> Available<br>
                        <input type="radio" name="stock_status"  value="0" <?php echo (!empty($product->stock_status) && $product->stock_status == 0) ? 'checked=checked' : ''; ?>> Out of stock<br>               
                    </div>
                </div>


                <div>
                     <input type="submit" value="Update Product" id="postUploadBtn" class="btn btn-success">



                    <span></span>
<?php __resetbtn(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php echo form_close(); ?>
<?php echo form_end_divs(); ?>
<style>
    label { cursor: pointer; }
</style>

<?php } ?>
