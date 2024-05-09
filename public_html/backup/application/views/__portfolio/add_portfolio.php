<div class="x_panel">
    <div class="x_title">
        <div class="col-sm-9"><h3><?php echo (isset($title))?$title:''; ?></h3></div>
        <div class="clearfix"></div>
    </div>
    <?php $edited_id = (isset($thisPortfolioInfo[0]))?$thisPortfolioInfo[0]->id:''?>
    <div class="x_content" style="display: block;">
        <?php if($this->session->flashdata('portfolio_message')) { ?>
        <div class="alert alert-success fade in alert-dismissable" style="margin-top:18px;">
            <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
            <?php echo $this->session->flashdata('portfolio_message'); ?>
        </div>
        <?php } ?>
        <form class="form-horizontal" role="form"  method="post" action="<?php echo base_url()?>saveportfolio" enctype="multipart/form-data" >
            <?php
                $data = array(
                    'name' => 'portfolio_id',
                    'type' => 'hidden',
                    'value' => (isset($thisPortfolioInfo[0]))?$thisPortfolioInfo[0]->id:'none'
                );
                echo form_input($data);
            ?>
            <div class="form-group">
                <label class="control-label col-sm-2" for="email">Title:</label>
                <div class="col-sm-10">
                    <input type="text" name="name"  pattern=".{3,50}"  required title="3 characters minimum" class="form-control" id="name" placeholder="Portfolio Title" value="<?php echo (isset($thisPortfolioInfo[0]))?$thisPortfolioInfo[0]->name:"" ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2">Short Description:</label>
                <div class="col-sm-10"> 
                    <textarea name="description" placeholder="Short Description" class="form-control"><?php echo (isset($thisPortfolioInfo[0]))?$thisPortfolioInfo[0]->description:"" ?></textarea>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-2">Image</label>
                <div class="col-sm-10">
                    <?php if(empty($thisPortfolioInfo[0]->img)){?>
                    <input type="file"  name="portfolio_img">
                    <?php }else{ ?>
                        <div class="row ">
                            <div class="col-md-2">
                            <input type="hidden" name="edit_portfolio_img" value="<?php echo $thisPortfolioInfo[0]->img; ?>">
                                <a href="#" class="thumbnail">
                                    <img src="<?php echo site_url(PORTFOLIO_IMAGE.$thisPortfolioInfo[0]->img)?>">
                                </a>
                            </div>
                            <a data-original-title="<?= lang('delete') ?>" data-toggle="tooltip" title="" class="btn btn-xs btn-danger"
                               onClick="return confirm('Are you sure you want to delete?')"
                               href="<?php echo site_url('portfolio/deleteImg').'/'. $thisPortfolioInfo[0]->id  ?>"><i class="fa fa-remove"></i></a>
                        </div>
                    <?php }?>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-2" for="email">Link:</label>
                <div class="col-sm-10">
                    <input type="url" name="link" required title="Enter Valid Link" class="form-control" placeholder="Portfolio Link" value="<?php echo (isset($thisPortfolioInfo[0]))?$thisPortfolioInfo[0]->link:"" ?>">
                </div>
            </div>


            <?php //owndebugger($cats); ?>


            <div class="form-group">
                <label class="control-label col-sm-2">Category:</label>
                <div class="col-sm-10">
                    <select name="cat_id" class="form-control">
                        <?php foreach((array) $cats as $ca):


                            if($thisPortfolioInfo[0]->cat == $ca['id']) {
                                $sel = 'selected';
                            } else {
                                $sel = '';
                            }



                            ?>
                            <option value="<?php echo $ca['id'] ?>" <?php echo $sel?>><?php echo $ca['name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <div class="form-group"> 
                <div class="col-sm-offset-2 col-sm-10">
                    <input type="submit" class="btn btn-default" value="Save Portfolio"/>
                </div>
            </div>
        </form>
    </div>
</div>