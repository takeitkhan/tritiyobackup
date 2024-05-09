
<tr>

    <td><?php echo $order['order_id']; ?></td>
    <td width="2%">
        <label><input type="checkbox" class="checkbox" name="id[]"  value="<?php echo $order['order_id']; ?>" /> A </label> <br>
        <label><input type="checkbox" class="checkbox" name="sms[]"  value="<?php echo $order['order_id']; ?>" /> S </label>
    </td>
    <td>
        <div class="btn-group">

            <div class="btn-group">
                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    Action <span class="caret"></span></button>
                <ul  class="dropdown-menu pull-right" role="menu"><!-- id=move_order -->
                    <li><a target="_blank" href="<?php echo base_url("view_invoice/{$order['order_id']}/{$order['secret_key']}") ?>">View Invoice</a></li>
                    <?php //if ($this->ion_auth->in_group([1, 3, 6])) { ?>
                        <!--<li><a href="<?php //echo base_url('order/view_payment/' . $order['order_id'])  ?>" data-toggle="modal" data-target="#myModal" >View Payment</a></li>-->
                    <?php //} ?>
                    <?php if ($this->ion_auth->in_group([1, 3, 6])) { ?>

                    <?php if($order['order_status'] == 'order_placed') : ?>
                        <!-- <li id="move_order"><a  class="order_status_change" data-status="order_placed" data-id="<?php echo $order['order_id']; ?>"   href="<?php echo base_url("order/move_to_order_placed/{$order['order_id']}") ?>">Order placed</a></li> -->
                        <li id="move_order">
                            <a  class="order_status_change" data-status="production"  data-id="<?php echo $order['order_id']; ?>"  href="<?php echo base_url("order/move_to_production/{$order['order_id']}") ?>">Production</a>
                             <!-- Send SMS  -->
                        </li>
                        <li id="move_order"><a  class="order_status_change" data-status="distribution"  data-id="<?php echo $order['order_id']; ?>"  href="<?php echo base_url("order/move_to_distribution/{$order['order_id']}") ?>">Distribution</a></li>
                        <li id="move_order"><a  class="order_status_change" data-status="processing"  data-id="<?php echo $order['order_id']; ?>"  href="<?php echo base_url("order/move_to_processing/{$order['order_id']}") ?>">Processing</a></li>
                        <li id="move_order"><a  class="order_status_change" data-status="refund"  data-id="<?php echo $order['order_id']; ?>"  href="<?php echo base_url("order/move_to_refund/{$order['order_id']}") ?>">Refund</a></li>
                        <li id="move_order"><a class="order_status_change" data-status="done"  data-id="<?php echo $order['order_id']; ?>"  href="<?php echo base_url("order/move_to_done/{$order['order_id']}") ?>">Done</a></li>
                        <li id="move_order"><a  class="order_status_change" data-status="deleted"  data-id="<?php echo $order['order_id']; ?>"  href="<?php echo base_url("order/move_to_deleted/{$order['order_id']}") ?>">Delete Order</a></li>

                    <?php elseif($order['order_status'] == 'production'): ?>

                        
                        <li id="move_order"><a  class="order_status_change" data-status="distribution"  data-id="<?php echo $order['order_id']; ?>"  href="<?php echo base_url("order/move_to_distribution/{$order['order_id']}") ?>">Distribution</a></li>
                        <li id="move_order"><a  class="order_status_change" data-status="processing"  data-id="<?php echo $order['order_id']; ?>"  href="<?php echo base_url("order/move_to_processing/{$order['order_id']}") ?>">Processing</a></li>
                        <li id="move_order"><a  class="order_status_change" data-status="refund"  data-id="<?php echo $order['order_id']; ?>"  href="<?php echo base_url("order/move_to_refund/{$order['order_id']}") ?>">Refund</a></li>
                        <li id="move_order"><a class="order_status_change" data-status="done"  data-id="<?php echo $order['order_id']; ?>"  href="<?php echo base_url("order/move_to_done/{$order['order_id']}") ?>">Done</a></li>
                        <li id="move_order"><a  class="order_status_change" data-status="deleted"  data-id="<?php echo $order['order_id']; ?>"  href="<?php echo base_url("order/move_to_deleted/{$order['order_id']}") ?>">Delete Order</a></li>
                        <?php elseif($order['order_status'] == 'distribution'): ?>

                        
                        <li id="move_order"><a  class="order_status_change" data-status="processing"  data-id="<?php echo $order['order_id']; ?>"  href="<?php echo base_url("order/move_to_processing/{$order['order_id']}") ?>">Processing</a></li>
                        <li id="move_order"><a  class="order_status_change" data-status="refund"  data-id="<?php echo $order['order_id']; ?>"  href="<?php echo base_url("order/move_to_refund/{$order['order_id']}") ?>">Refund</a></li>
                        <li id="move_order"><a class="order_status_change" data-status="done"  data-id="<?php echo $order['order_id']; ?>"  href="<?php echo base_url("order/move_to_done/{$order['order_id']}") ?>">Done</a></li>
                        <li id="move_order"><a  class="order_status_change" data-status="deleted"  data-id="<?php echo $order['order_id']; ?>"  href="<?php echo base_url("order/move_to_deleted/{$order['order_id']}") ?>">Delete Order</a></li>

                        <?php elseif($order['order_status'] == 'processing'): ?>

                        
                        <li id="move_order"><a  class="order_status_change" data-status="refund"  data-id="<?php echo $order['order_id']; ?>"  href="<?php echo base_url("order/move_to_refund/{$order['order_id']}") ?>">Refund</a></li>
                        <li id="move_order"><a class="order_status_change" data-status="done"  data-id="<?php echo $order['order_id']; ?>"  href="<?php echo base_url("order/move_to_done/{$order['order_id']}") ?>">Done</a></li>
                        <li id="move_order"><a  class="order_status_change" data-status="deleted"  data-id="<?php echo $order['order_id']; ?>"  href="<?php echo base_url("order/move_to_deleted/{$order['order_id']}") ?>">Delete Order</a></li>

                        <?php elseif($order['order_status'] == 'refund'): ?>

                        
                        <li id="move_order"><a  class="order_status_change" data-status="deleted"  data-id="<?php echo $order['order_id']; ?>"  href="<?php echo base_url("order/move_to_deleted/{$order['order_id']}") ?>">Delete Order</a></li>
                    <?php elseif($order['order_status'] == 'done'): ?>

                        
                        <li id="move_order"><a  class="order_status_change" data-status="deleted"  data-id="<?php echo $order['order_id']; ?>"  href="<?php echo base_url("order/move_to_deleted/{$order['order_id']}") ?>">Delete Order</a></li>



                    <?php endif; ?>

                    <?php  } ?>
                </ul>
            </div>
        </div>
    </td>
    <td>
        <?php
        $json = $order['param'];
//        owndebugger($json);
        $returnValue = json_decode($json);
        if ($returnValue->status == 1) {
            echo '<i class="btn btn-xs fa fa-check-circle alert-success" aria-hidden="true"></i>';
        } else if ($returnValue->status == 2) {
            echo '<i class="btn btn-xs fa fa-times-circle alert-danger" aria-hidden="true"></i>';
        } else {
            echo '';
        }
        ?>
    </td>

    
    <td id="order_statue_<?php echo $order['order_id']; ?>"><?php echo ucfirst(str_replace('_', ' ', $order['order_status'])); ?></td>
    <td><?php echo $order['payment_method_name']; ?></td>
   
    <td><?php echo date("F j, Y, g:i a", strtotime($order['order_time'])); ?></td>
    <td>
        <?php if ($order['delivery_date']) { ?>
            <?php if ($this->ion_auth->in_group([1])) { ?>
        <input  value="<?php echo $order['delivery_date'] ?>" class="form-control" style="width:80px!important; padding: 5px; float:left;"  required="required" type="text" readonly>
                <!--<input type="button" class="btn btn-success  btn-xs checkbutton"  style="width:30px!important; margin-top: 5px;  float:left;"   name="<?php echo $order['id'] ?>"  id="<?php echo $order['id'] ?>" value="Go"  > -->
            <?php } else { ?>
                <?php echo $order['delivery_date'] ?>
            <?php } ?>
        <?php
        } else {
            if ($this->ion_auth->in_group([1, 3])) {
                ?>
                <input  class="form-control datepicknew" id="order_<?php echo $order['order_id']; ?>" style="width:94px!important;"  required="required" type="text">
                <input type="button" data-id ="<?php echo $order['order_id']; ?>" class="btn btn-success btn-xs checkbutton order_delivery" style="width:40px!important; margin-top: 5px;"   name="<?php echo $order['id'] ?>"  id="<?php echo $order['id'] ?>" value="Go"   >
                <?php
            }
        }
        ?>

    </td>
    <td><?php echo $order['customer_name']; ?></td>
    <td><?php echo $order['contuct_number']; ?></td>
     <td><?php echo $order['shiping_address']; ?></td>

    <!--<td><?php // echo $order['product_code'];    ?></td>-->
    <!--<td><?php // echo makeCurrency($order['price']);    ?></td>-->


    <?php
    $result = $this->db->get_where('ecommerce_order_details', array(
                'master_id' => $order['id']
            ))->result();
    ?>

<!--    <td>--><?php //echo $order['qty'];    ?><!--</td>-->
   <!-- <td>
        <?php
        // foreach ($result as $item) {
        //     echo $item->product_code . '(' . $item->qty . ')';
        //     echo '<br>';
        // }
        ?>
    </td>-->
    
    


    
    <td><?php echo makeCurrency($order['total']); ?></td>
    
    
    <td><?php echo $order['alternative_mobile']; ?></td>
    <!-- <td><?php //echo $order['email_address']; ?></td> -->
    
    

</tr>





<!-- Modal -->
<div class="modal fade modal-small" id="myModal"  role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div id="product_modal" class="modal-dialog">
        <div class="modal-content">

        </div>
    </div>
</div>


<style>
    
</style>