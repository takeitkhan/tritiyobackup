<?php echo form_start_divs($title, ''); ?>
<?php echo $this->session->flashdata('msg'); ?>
<?php echo form_open('', array('class' => 'form-horizontal', 'id' => 'add_brand')); ?>
    <div class="row">
        <div class="col-md-6">
            <input type="hidden" value="" name="brand_id">
            <div class="form-group">
                <label for="">Add New Product Brand</label>
                <input type="text" class="form-control" name="brandname" id="brandname">
            </div>
            <div class="form-group">
                <input type="submit" value="Add"  class="btn btn-sm btn-success">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
            <label for="">Product Brand List</label>
            <table class="table">
                
                    <tr>
                        <th width="80%">Name</th>
                        <th width="20%">Action</th>
                    </tr>
                    <?php foreach($brands as $brand): ?>
                    <tr>
                        <td><?php echo $brand->brand_name ?></td>
                        <td>
                            <a href="<?php echo base_url()?>productbrand/<?= $brand->brand_id ?>">
                                <span class="btn btn-sm btn-info"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></span>
                            </a>
                            <a href="<?php echo base_url()?>deletebrand/<?= $brand->brand_id ?>">
                                <span class="btn btn-sm btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></span>
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
            </table>
        </div>
        
    </div>
<?php echo form_close(); ?>
<?php echo form_end_divs(); ?>
<style>
    label { cursor: pointer; }
</style>
