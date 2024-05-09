<div class="row mainbox">
    <table id="allposts" class="display" cellspacing="0" width="100%" class="table table-striped table-bordered">
        <thead>
        <tr>
            <th>Portfolio ID</th>
            <th>Media</th>
            <th>Title</th>
            <th>Category</th>
            <th>Technology</th>
            <th>Status</th>
            <th width="100">Actions</th>
        </tr>
        </thead>
        <?php foreach((array) $portfolios as $p) { ?>
            <tr>
                <td><?php __e(!empty($p['id']) ? $p['id'] : ''); ?></td>
                <td><?php __e(!empty($p['img']) ? '<img src="' . base_url() . 'uploads/portfolio/' . $p['img'] .'" width="60px" />' : '<img src="' . base_url() . 'uploads/posts/default.jpg"  width="60px" />'); ?></td>
                <td><?php __e(!empty($p['name']) ? $p['name'] : ''); ?></td>
                <td><p><?php echo getPortfolioCategory($p['category']); ?></p></td>
                <td><p><?php echo getPortfolioTechnology($p['technology']); ?></p></td>
                <td><?php if($p['status'] == 1) { echo 'Active';} else { echo 'Inactive';  } ?></td>
               <td widtd="20">
                    <div class="btn-group btn-group-xs" role="group">
                        <a class="btn btn-success" href="<?php __e(!empty($p['link']) ? $p['link'] : ''); ?>" target="_blank">
                            <i class="fa fa-eye" aria-hidden="true"></i>
                        </a>
                        <a class="btn btn-default" href="<?php echo base_url() . 'edit_portfolio/' . (!empty($p['id']) ? $p['id'] : ''); ?>" target="_blank">
                            <i class="fa fa-pencil fa-fw"></i>
                        </a>
                        <a class="btn btn-danger" onclick="ajaxRemoveFn(<?php __e(!empty($p['id']) ? $p['id'] : ''); ?>, 'delete_portfolio/<?php __e(!empty($p['id']) ? $p['id'] : ''); ?>')" href="javascript:void(0)">
                            <i class="fa fa-trash-o fa-fw"></i>
                        </a>
                    </div>
                </td>
            </tr>
        <?php } ?>
        <tfoot>
        <tr>
            <th>Portfolio ID</th>
            <th>Media</th>
            <th>Title</th>
            <th>Category</th>
            <th>Technology</th>
            <th>Status</th>
            <th width="100">Actions</th>
        </tr>
        </tfoot>
    </table>
</div>