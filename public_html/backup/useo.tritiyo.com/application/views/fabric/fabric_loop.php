<tr>
    <td><?php echo $id; ?></td>
    <td><a href="<?php echo base_url($fab_icon); ?>" target="_blank"><img src="<?php echo base_url($fab_icon); ?>" style="height: 50px;width:50px;"/></a></td>
    <td><a href="<?php echo base_url($fab_img); ?>" target="_blank"><img src="<?php echo base_url($fab_img); ?>" style="height: 50px;width:50px;"/></a></td>
    <td><?php echo $fabric_title; ?></td>
    <td><?php echo $fabric_details; ?></td>
    
    <td>
        <div class="btn-group btn-xs">
            <!-- <a class="btn btn-default " href="<?php echo base_url("product/{$id}"); ?>/<?php echo url_title($fabric_title); ?>" target="_blank"><i class="fa fa-eye" aria-hidden="true"></i></a> -->
            <a class="btn btn-primary "  href="<?php echo base_url("editfabric/{$id}"); ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
            <!-- <a class="btn btn-danger delete-product" data-id="<?php echo $id; ?>" data-name="<?php echo $fabric_title; ?>"><i class="fa fa-trash-o" aria-hidden="true"></i></a> -->

            <a 
                onclick="ajaxRemoveFn('<?php echo $id;; ?>', '<?php echo 'deletefabric/' . $id; ?>')"
                href="javascript:void(0)" 
                data-id="<?php echo $id; ?>" 
                class="btn btn-danger delete-product"> <i class="fa fa-trash-o" aria-hidden="true"></i>
            </a>                                    
        </div>
    </td>
</tr>
