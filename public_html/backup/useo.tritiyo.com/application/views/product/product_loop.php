

<?php
    $editurl =  !empty($pre_product) ? "editsofaproduct/$id" :  "editproduct/$id";
    //echo $editurl;
?>

<tr>
    <td><?php echo $id; ?></td>
    <td><a href="<?php echo base_url($product_image); ?>" target="_blank"><img src="<?php echo base_url($product_image); ?>" style="height: 50px;width:50px;"/></a></td>
    <td><?php echo $name; ?></td>
    <td><?php echo $code; ?></td>
    <td><?php if(!empty($sku)) echo $sku; else echo $pre_sku.' ('.'Parent Sofa-'.$pre_product.')' ;?>  <?php //echo
        // $products['items']; ?>
    </td>
    <td><?php echo $price; ?></td>
    <td>
        <div class="btn-group btn-xs">
            <a class="btn btn-default " href="<?php echo base_url("product/{$id}"); ?>/<?php echo url_title($name); ?>" target="_blank"><i class="fa fa-eye" aria-hidden="true"></i></a>
            <a class="btn btn-primary "  href="<?php echo $editurl //echo base_url("editproduct/{$id}"); ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
            <a class="btn btn-danger delete-product" data-id="<?php echo $id; ?>" data-name="<?php echo $name; ?>"><i class="fa fa-trash-o" aria-hidden="true"></i></a>                                    
        </div>
    </td>
</tr>
