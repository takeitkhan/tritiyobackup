<?php //owndebugger($orders); ?>
<br><br><br><br>
<div class="panel panel-default">
    <div class="panel-heading">
        Order Management
    </div>    
    <div class="panel-body">

        <div class="well well-sm">

            <form method="post" action="<?php echo site_url('order/all/list') ?>" >
                <div class="row form-group">
                    <div class="col-md-2">
                        From Date<br/>
                        <?php
                        $data = array(
                            'name' => 'startdate',
                            'id' => 'date11',
                            'class' => 'form-control',
                            'required' => 'required'
                        );
                        echo form_input($data);
                        ?>
                    </div>
                    <div class="col-md-2">
                        To Date<br/>
                        <?php
                        $data = array(
                            'name' => 'enddate',
                            'id' => 'date12',
                            'class' => 'form-control',
                            'required' => 'required'
                        );
                        echo form_input($data);
                        ?>
                    </div>
                    <div class="col-md-4">
                        Keywords<br/>
                        <input type="text" class="form-control" placeholder="Search: Order Id/Name/Mobile/Emergency Number/ Email" name="keyword" data-type="" id="search-order-input">
                    </div>

                    <div class="col-md-4">
                        <br/>
                        <button type="submit"  class="btn btn-success">Search</button>
                    </div>
                </div>
            </form>
        </div>

            <div class="row">
                <div class="form-group">
                    <div class="col-md-3">

                        <select name="order_status" id="ch_order_status" class="form-control">
                            <option value="">Select an Action</option>
                            <option value="order_placed">Order placed</option>
                            <option value="production">Production</option>
                            <option value="distribution">Distribution</option>
                            <option value="processing">Processing</option>
                            <option value="refund">Refund</option>
                            <option value="done">Done</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <input type="button" id="action_btn" class="btn btn-sm btn-default" value="Apply">
                    </div>
                </div>
            </div>
        <br/>
<!--            <table id="order-table" class="table table-bordered table-condensed table-hover table-striped">-->

        <table id="" class="table table-striped table-bordered">
            <thead>
                <tr>

                    <th>Order id</th>
                    <th></th>
                    <th>Action</th>
                    <th>Payment Status</th>
                    <th>Order Status</th>
                    <th>Payment Method</th>
                    <th>Order Date</th>
                    <th style="width:100px">Approximate <br>Delivery Date</th>
                    
                    <th>Name</th>
                    <th>Mobile</th>
                    <th>Delivery Address</th>
                    <!--<th>Product Code</th>-->
                    <!--<th>Product Price</th>-->                        
                   
                    
                    <!-- <th>Payment Status</th> -->
                    <!-- <th>Status</th> -->
                    <th>Total Price</th>
                    
                    <th>Emergency Contact</th>
                    
                    
                    <!-- <th>Email</th> -->
                </tr>
            </thead>
            <tbody>
                <?php
                //owndebugger($orders); 
                foreach ($orders as $order):
                    $this->load->view('order/table-row', compact('order'));
                endforeach;
                ?>
            </tbody>
        </table>

        <div class="pull-right">
         <!--start pagination-->
            <div class="row">
                <div class="col-lg-12 col-xs-12">
                    <ul class="pagination" style="display: table;margin:auto;">
                        <li class="for_active">
                            <?php
                                //echo $paging;
                            ?>
                        </li>
                    </ul>
                </div>
            </div>
            <!--/end pagination-->
            </div>
            <!--Style for pagination active btn-->
            <style>
                .for_active .active {
                    background: #3399ff none repeat scroll 0 0;
                    color: #fff;
                }
            </style>





            <!--            --><?php
//            echo $pagination;
//            
            ?>
        </div>
    </div>
</div>
<!-- Modal -->

<!--<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>css/dcalendar.picker.css" />
<script src="<?php echo base_url() ?>js/dcalendar.picker.js"></script>
<script>
    $('.datepicknew').dcalendarpicker({ format: 'yyyy-mm-dd'});
</script>-->


<div class="modal fade modal-small" id="modalSmall"  role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div id="product_modal" class="modal-dialog">
        <div class="modal-content">
        </div>
    </div>
</div>

