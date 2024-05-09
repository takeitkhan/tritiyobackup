<div class="x_panel">
    <div class="x_title">
        <div class="col-sm-9"><h3><?php echo (isset($title))?$title:''; ?></h3></div>
        <div class="clearfix"></div>
    </div>
    <?php $edited_id = (isset($thisCategoriesInfo[0]))?$thisCategoriesInfo[0]->parent_id:''?>
    <div class="x_content" style="display: block;">
        <?php echo $this->session->flashdata('msg'); ?>

<!--        <form class="form-horizontal" role="form" id="add_new_category" enctype="multipart/form-data" >-->
        <form class="form-horizontal" role="form"  method="post" action="<?php echo base_url()?>term/save_category" enctype="multipart/form-data" >
            <?php
                $data = array(
                    'name' => 'cat_id',
                    'type' => 'hidden',
                    'value' => (isset($thisCategoriesInfo[0]))?$thisCategoriesInfo[0]->id:'none'
                );
                echo form_input($data);
            ?>
            <div class="form-group">
                <label class="control-label col-sm-2" for="email">Category name:</label>
                <div class="col-sm-10">
                    <input type="text" name="name"  pattern=".{3,50}"  required title="3 characters minimum" class="form-control" id="name" placeholder="Caterogy name" value="<?php echo (isset($thisCategoriesInfo[0]))?$thisCategoriesInfo[0]->name:"" ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="pwd">Description:</label>
                <div class="col-sm-10"> 
                    <textarea name="description" class="form-control"><?php echo (isset($thisCategoriesInfo[0]))?$thisCategoriesInfo[0]->description:"" ?></textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="pwd">Parents:</label>
                <div class="col-sm-10"> 
                    <select  name="parent_id" class="form-control">
                        <option selected="selected" value="0">No Parent</option>                             
                        <?php echo select_option_html($categories, $parent_id = 0, $seperator = '',$edited_id); ?>        
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-2" for="pwd">Category Image</label>
                <div class="col-sm-10">
                    <?php if(empty($thisCategoriesInfo[0]->img)){?>
                    <input type="file"  name="category_img">
                    <?php }else{ ?>
                        <div class="row ">
                            <div class="col-md-2">
                            <input type="hidden" name="edit_cat_img" value="<?php echo $thisCategoriesInfo[0]->img; ?>">
                                <a href="#" class="thumbnail">
                                    <img src="<?php echo site_url(CATEGORY_IMAGE.$thisCategoriesInfo[0]->img)?>">
                                </a>
                            </div>
                            <a data-original-title="<?= lang('delete') ?>" data-toggle="tooltip" title="" class="btn btn-xs btn-danger"
                               onClick="return confirm('Are you sure you want to delete?')"
                               href="<?php echo site_url('term/deleteImg').'/'. $thisCategoriesInfo[0]->id  ?>"><i class="fa fa-remove"></i></a>
                        </div>
                    <?php }?>
                </div>
            </div>

            <div class="form-group"> 
                <div class="col-sm-offset-2 col-sm-10">
                    <input type="submit" class="btn btn-default" value="Save Category"/>
                </div>
            </div>
        </form>
    </div>
</div>