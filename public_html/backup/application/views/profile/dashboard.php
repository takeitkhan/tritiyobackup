<?php //owndebugger($yearly_sales); ?>


<?php //owndebugger($yearly_sales_report); ?>

<?php 
    $sum = 0;
    foreach ($yearly_sales_report as $key => $val) {
        //echo "Price: ". $val[0]->price.'<br />';
        $sum += $val[0]->price; 
    }
    
   // echo $sum;

?>


<div class="row">
    <div class="col-md-8">
        <div class="panel panel-default">
            <div class="panel-heading">Yearly Sales Report <strong><?php echo date('Y') ?></strong></div>
            <div class="panel-body">
                <div id="bar-example"></div>


                <div class="row text-center m-t-30 m-b-30 chart-table">
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <h4>
                            <?php
                            if (!empty($today_sale[0]->price)) {
                                echo '&#2547; ' . number_format($today_sale[0]->price, 2, '.', ',');
                            } else {
                                echo '&#2547; ' . '0.00';
                            }
                            ?>
                        </h4>
                        <small class="text-muted"> Today's Sales</small>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <h4>
                            <?php
                            if (!empty($weekly_sales[0]->price)) {
                                echo '&#2547; ' . number_format($weekly_sales[0]->price, 2, '.', ',');
                            } else {
                                echo '&#2547; ' . '0.00';
                            }
                            ?>
                        </h4>
                        <small class="text-muted">This Week's Sales</small>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <h4>

<?php
if (!empty($monthly_sales[0]->price)) {
    echo '&#2547; ' . number_format($monthly_sales[0]->price, 2, '.', ',');
} else {
    echo '&#2547; ' . '0.00';
}
?>

                        </h4>
                        <small class="text-muted">This Month's Sales</small>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">

                        <h4>
<?php
//if (!empty($yearly_sales[0]->price)) {
//    echo '&#2547; ' . number_format($yearly_sales[0]->price, 2, '.', ',');
//} else {
//    echo '&#2547; ' . '0.00';
//}


if (!empty($sum)) {
    echo '&#2547; ' . number_format($sum, 2, '.', ',');
} else {
    echo '&#2547; ' . '0.00';
}
?>
                        </h4>
                        <small class="text-muted">This Year's Sales</small>
                    </div>
                </div>


            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Top <strong>5</strong> Selling Product <strong><?php echo date('Y') ?></strong></h3>
            </div>
            <div class="panel-body">

                <table class="table no-margin">
                    <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Sku</th>
                            <th>Product Name</th>
                            <th>Qty</th>
                        </tr>
                    </thead>
                    <tbody>
<?php
if (!empty($top_sell_product_yearly)):
    $i = 1;
//owndebugger($top_sell_product_yearly);
    ?>
                            <?php foreach ($top_sell_product_yearly as $item): ?>
                                <tr>
                                    <td ><?php echo $i ?></td>
                                    <td class="highlight">
                                    <?php 
                                    if(!empty($item->sku))
                                       echo $item->sku;
                                    else
                                        echo $item->pre_sku;
                                    ?>
                                    
                                        
                                    </td>
                                    <td><?php echo $item->product_name ?></td>
                                    <td class="highlight"><strong><?php echo $item->total_qty ?></strong></td>
        <?php $i ++ ?>
                                </tr>
    <?php endforeach;
else:
    ?>
                            <tr style="column-span: 4">
                                <td><strong>No Records Found</strong></td>
                            </tr>

<?php endif ?>
                    </tbody>
                </table>

            </div>

        </div>
    </div>
</div>







