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
                        <td>Fabric ID</td>
                        <td>Fabric Name</td>
                        <td>Fabric Details</td>
                        <td>Fabric Icon</td>
                        <td>Fabric Image</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $i=1;
                        foreach ($fabrics as $fabric) {
                            /*$data = [];
                            $data['fabric'] = $fabric;
                            $data['id'] = $i;*/
                           $this->load->view('fabric/fabric_loop', $fabric);
                           $i++;
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>



