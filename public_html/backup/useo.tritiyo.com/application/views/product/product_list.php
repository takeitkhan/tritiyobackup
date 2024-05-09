<?php //owndebugger($products['items']); ?>

<div class="x_panel">
    <div class="x_title">
        <div class="col-sm-9"><h3>All Products</h3></div>
        <div class="col-sm-3 pull-right"> <input type="text" placeholder="Search by product name , product code or sku" class="form-control" id="search_key"></div>
        <div class="clearfix"></div>
    </div>
    <div class="x_content" style="display: block;">
        <div class="table-responsive">
            <table class="table talbe-bordered table-condensed table-striped" id="product-list">
                <thead>
                    <tr>
                        <td>Prdouct ID</td>
                        <td>Image</td>
                        <td>Name</td>
                        <td>Code</td>
                        <td>SKU</td>
                        <td>Regular Price</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($products['items'] as $product) {
                        $this->load->view('product/product_loop', $product);
                    }
                    ?>
                </tbody>
            </table>
           
            <center> <button data-nextpage="2" class="btn btn-default" id="load-more-product-btn"  <?php echo $products['total'] > count($products['items']) ? 'style="display:inline-block;"' : 'style="display:none;"'; ?>>Load more..</button></center>
        </div>
    </div>
</div>



