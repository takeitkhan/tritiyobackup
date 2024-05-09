<table class="table table-bordered">
    <?php
    echo '<tr>';
    echo '<th>';
    echo 'Temp ID';
    echo '</th>';
    echo '<th>';
    echo 'Order Details';
    echo '</th>';
    echo '<th>';
    echo 'Success Params';
    echo '</th>';
    echo '<th>';
    echo 'Added Time';
    echo '</th>';
    echo '<tr>';
    foreach ($latest as $key => $value) {
        $value = (object) $value;
        echo '<tr>';
        echo '<td>';
        echo $value->tmp_id;
        echo '</td>';
        echo '<td style="text-transform: capitalize;">';
        $array = json_decode($value->prepare_params, true);
//        owndebugger($array['delivery_details']);
//        owndebugger($array['items_details']);
//        owndebugger($array['payment_details']);
        echo '<div class="row">';
            echo '<div class="col-md-6">';
                echo '<h5 style="font-weight: bold;">Contact Details</h5>';
                foreach($array['delivery_details'] as $key => $v) {
                    echo strtolower(str_replace('_', ' ', $key)) .': '. $v . '<br/>';
                }
            echo '</div>';
            echo '<div class="col-md-6">';
                echo '<h5 style="font-weight: bold;">Payment Details</h5>';
                foreach($array['payment_details'] as $key => $v) {
                    echo strtolower(str_replace('_', ' ', $key)) .': '. $v . '<br/>';
                }
            echo '</div>';
        echo '</div>';
        echo '<hr/>';
        echo '<h5 style="font-weight: bold;">Item Details</h5>';
        echo '<table class="table table-responsive table-bordered">';
            echo '<tr>';
                echo '<th>ID</th>';
                echo '<th>QTY</th>';
                echo '<th>Price</th>';
                echo '<th>Regular Price</th>';                
                echo '<th>Name</th>';
                echo '<th>Code</th>';
                echo '<th>Img</th>';
                echo '<th>Discount</th>';
                echo '<th>SKU</th>';                
                echo '<th>Sub total</th>';
            echo '</tr>';
            foreach($array['items_details'] as $v) {
//                owndebugger($v);
                 echo '<tr>';
                    echo '<td>'. $v['id'] .'</td>';
                    echo '<td>'. $v['qty'] .'</td>';
                    echo '<td>'. $v['price'] .'</td>';
                    echo '<td>'. $v['regular_price'] .'</td>';
                    echo '<td>'. $v['name'] .'</td>';
                    echo '<td>'. $v['code'] .'</td>';
                    echo '<td>'. $v['img'] .'</td>';
                    echo '<td>'. $v['discount'] .'</td>';
                    echo '<td>'. $v['sku'] .'</td>';                    
                    echo '<td>'. $v['subtotal'] .'</td>';
                echo '</tr>';
            }
        echo '</table>';
        
        
        echo '</td>';
        echo '<td>';
        echo $value->success_params;
        echo '</td>';
        echo '<td>';
        echo $value->inserted_time;
        echo '</td>';
        echo '<tr>';
    }
    ?>
</table>