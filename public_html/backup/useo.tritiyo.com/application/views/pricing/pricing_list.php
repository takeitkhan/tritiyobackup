<div class="row mainbox">
    <table id="allposts" class="display" cellspacing="0" width="100%" class="table table-striped table-bordered">
        <thead>
        <tr>
            <th>Pricing ID</th>
            <th>Title</th>
            <th>Short Description</th>
            <th>Price(In TK.)</th>
            <th width="100">Actions</th>
        </tr>
        </thead>
        <?php foreach((array) $portfolios as $p) { ?>
            <tr>
                <td><?php __e(!empty($p['id']) ? $p['id'] : ''); ?></td>
                <td><?php __e(!empty($p['name']) ? $p['name'] : ''); ?></td>
                <td><?php __e(!empty($p['description']) ? $p['description'] : ''); ?></td>
                <td>&#2547; <?php __e(!empty($p['price']) ? $p['price'] : ''); ?></td>
               <td widtd="100">
                    <div class="btn-group btn-group-xs" role="group">
                        <a class="btn btn-default" href="<?php echo base_url() . 'edit_pricing/' . (!empty($p['id']) ? $p['id'] : ''); ?>" target="_blank">
                            <i class="fa fa-pencil fa-fw"></i>
                        </a>
                        <a class="btn btn-danger" onclick="ajaxRemoveFn(<?php __e(!empty($p['id']) ? $p['id'] : ''); ?>, 'delete_pricing/<?php __e(!empty($p['id']) ? $p['id'] : ''); ?>')" href="javascript:void(0)">
                            <i class="fa fa-trash-o fa-fw"></i>
                        </a>
                    </div>
                </td>
            </tr>
        <?php } ?>
        <tfoot>
        <tr>
            <th>Pricing ID</th>
            <th>Title</th>
            <th>Short Description</th>
            <th>Price(In TK.)</th>
            <th width="100">Actions</th>
        </tr>
        </tfoot>
    </table>
</div>