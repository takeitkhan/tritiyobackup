<div class="row mainbox">
    <table id="allposts" class="display" cellspacing="0" width="100%" class="table table-striped table-bordered">
        <thead>
        <tr>
            <th>Post ID</th>
            <th>Title</th>
            <th>Category</th>
            <th>Content</th>
            <th>Media</th>
            <th width="20">Actions</th>
        </tr>
        </thead>
        <?php //owndebugger($posts); ?>
        <?php foreach((array) $posts as $p) { ?>
            <tr>
                <td><?php __e(!empty($p['PostId']) ? $p['PostId'] : ''); ?></td>
                <td><?php __e(!empty($p['Title']) ? $p['Title'] : ''); ?></td>
                <td><?php __e(!empty($p['CategoryName']) ? $p['CategoryName'] : ''); ?></td>
                <td><?php __e(!empty($p['PostContent']) ? text_limit($p['PostContent'], 110) : ''); ?></td>
                <td><?php __e(!empty($p['MediaFileName']) ? '<img src="' . base_url() . 'uploads/posts/' . $p['MediaFileName'] .'" width="60px" />' : '<img src="' . base_url() . 'uploads/posts/default.jpg"  width="60px" />'); ?></td>
                <td widtd="20">
                    <div class="btn-group btn-group-xs" role="group">
                        <a class="btn btn-default" href="<?php echo base_url() . 'editpost/' . (!empty($p['PostId']) ? $p['PostId'] : ''); ?>" target="_blank">
                            <i class="fa fa-pencil fa-fw"></i>
                        </a>
                        <a class="btn btn-danger" onclick="ajaxRemoveFn(<?php __e(!empty($p['PostId']) ? $p['PostId'] : ''); ?>, 'deletepost/<?php __e(!empty($p['PostId']) ? $p['PostId'] : ''); ?>')" href="javascript:void(0)">
                            <i class="fa fa-trash-o fa-fw"></i>
                        </a>
                    </div>
                </td>
            </tr>
        <?php } ?>
        <tfoot>
        <tr>
            <th>Post ID</th>
            <th>Title</th>
            <th>Category</th>
            <th>Content</th>
            <th>Media</th>
            <th width="20">Actions</th>
        </tr>
        </tfoot>
    </table>
</div>