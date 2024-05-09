<div class="row mainbox">
    <div class="col-md-6">
        <div class="x_panel">
            <div class="x_title">
                <div class="col-sm-9"><h3><?php echo (isset($title))?$title:''; ?></h3></div>
                <div class="clearfix"></div>
            </div>

            <?php

                $edited_id = (isset($singletechno[0]))?$singletechno[0]->id:'';
//                if(($singletechno[0]->status == 1) || empty($singletechno[0]->status) || ($singletechno[0]->status == 0)) {
//                    $checked = 'checked';
//                } else {
//                    $checked = '';
//                }



            ?>
            <div class="x_content" style="display: block;">
                <?php if($this->session->flashdata('portfolio_message')) { ?>
                    <div class="alert alert-success fade in alert-dismissable" style="margin-top:18px;">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
                        <?php echo $this->session->flashdata('portfolio_message'); ?>
                    </div>
                <?php } ?>
                <form class="form-horizontal" role="form"  method="post" action="<?php echo base_url()?>save_portfolio_technos" enctype="multipart/form-data" >
                    <?php
                    $data = array(
                        'name' => 'cat_id',
                        'type' => 'hidden',
                        'value' => (isset($singletechno[0]))?$singletechno[0]->id:'none'
                    );
                    echo form_input($data);
                    ?>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="email">Title:</label>
                        <div class="col-sm-10">
                            <input type="text" name="name"  pattern=".{3,50}"  required title="3 characters minimum" class="form-control" id="name" placeholder="Technology Title" value="<?php echo (isset($singletechno[0]))?$singletechno[0]->name:"" ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2">Summary:</label>
                        <div class="col-sm-10">
                            <textarea name="description" placeholder="Technology Summary" class="form-control"><?php echo (isset($singletechno[0]))?$singletechno[0]->description:"" ?></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="email">Status:</label>
                        <div class="col-sm-10">
                            <?php echo activeInactiveStatus(@$singletechno[0]->status); ?>

                            <!--<label><input type="radio" name="status" value="1" <?php echo $checked; ?>> Active</label>
                            <label><input type="radio" name="status" value="0"  <?php echo $checked; ?>> Inactive</label>-->

                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <input type="submit" class="btn btn-default" value="Save Technology"/>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="x_panel">
    <table id="allposts" class="display" cellspacing="0" width="100%" class="table table-striped table-bordered">
        <thead>
        <tr>
            <th>Techno ID</th>
            <th>Title</th>
            <th>Status</th>
            <th width="100">Actions</th>
        </tr>
        </thead>
        <?php foreach((array) $technologys as $p) { ?>
            <tr>
                <td><?php __e(!empty($p['id']) ? $p['id'] : ''); ?></td>
                <td><?php __e(!empty($p['name']) ? $p['name'] : ''); ?></td>
<!--                <td>--><?php //__e(!empty($p['description']) ? $p['description'] : ''); ?><!--</td>-->
                <td><?php if($p['status'] == 1) { echo 'Active';} else { echo 'Inactive';  } ?></td>
                <td widtd="100">
                    <div class="btn-group btn-group-xs" role="group">
                        <a class="btn btn-default" href="<?php echo base_url() . 'edit_portfolio_techno/' . (!empty($p['id']) ? $p['id'] : ''); ?>" target="_blank">
                            <i class="fa fa-pencil fa-fw"></i>
                        </a>
                        <a class="btn btn-danger" onclick="ajaxRemoveFn(<?php __e(!empty($p['id']) ? $p['id'] : ''); ?>, 'delete_port_techno/<?php __e(!empty($p['id']) ? $p['id'] : ''); ?>')" href="javascript:void(0)">
                            <i class="fa fa-trash-o fa-fw"></i>
                        </a>
                    </div>
                </td>
            </tr>
        <?php } ?>
        <tfoot>
        <tr>
            <th>Techno ID</th>
            <th>Title</th>
            <th>Status</th>
            <th width="100">Actions</th>
        </tr>
        </tfoot>
    </table>
        </div>
    </div>
</div>