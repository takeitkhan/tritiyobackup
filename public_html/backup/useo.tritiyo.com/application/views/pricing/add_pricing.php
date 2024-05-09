<div class="x_panel">
    <div class="x_title">
        <div class="col-sm-9"><h3><?php echo (isset($title))?$title:''; ?></h3></div>
        <div class="clearfix"></div>
    </div>
    <?php $edited_id = (isset($thisPricingInfo[0]))?$thisPricingInfo[0]->id:''?>
    <div class="x_content" style="display: block;">
        <?php if($this->session->flashdata('pricing_message')) { ?>
        <div class="alert alert-success fade in alert-dismissable" style="margin-top:18px;">
            <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
            <?php echo $this->session->flashdata('pricing_message'); ?>
        </div>
        <?php } ?>
        <form class="form-horizontal" role="form"  method="post" action="<?php echo base_url()?>savepricing" enctype="multipart/form-data" >
            <?php
                $data = array(
                    'name' => 'pricing_id',
                    'type' => 'hidden',
                    'value' => (isset($thisPricingInfo[0]))?$thisPricingInfo[0]->id:'none'
                );
                echo form_input($data);
            ?>
            <div class="form-group">
                <label class="control-label col-sm-2" for="email">Title:</label>
                <div class="col-sm-10">
                    <input type="text" name="name"  pattern=".{3,50}"  required title="3 characters minimum" class="form-control" id="name" placeholder="Pricing Title" value="<?php echo (isset($thisPricingInfo[0]))?$thisPricingInfo[0]->name:"" ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2">Short Description:</label>
                <div class="col-sm-10"> 
                    <textarea name="description" placeholder="Short Pricing" class="form-control"><?php echo (isset($thisPricingInfo[0]))?$thisPricingInfo[0]->description:"" ?></textarea>
                </div>
            </div>


            <div class="form-group">
                <label class="control-label col-sm-2" for="email">Price(In TK.):</label>
                <div class="col-sm-10">
                    <input type="number" name="price"  pattern="\d*" required required title="Enter Number" class="form-control" placeholder="Price" value="<?php echo (isset($thisPricingInfo[0]))?$thisPricingInfo[0]->price:"" ?>">
                </div>
            </div>

            <div class="form-group"> 
                <div class="col-sm-offset-2 col-sm-10">
                    <input type="submit" class="btn btn-default" value="Save Pricing"/>
                </div>
            </div>
        </form>
    </div>
</div>