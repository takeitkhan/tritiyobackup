<?php if($this->ion_auth->in_group([1,3,4,5,6])) { ?>
<!-- <li class="vn">
    <a><i class="fa fa-cart-plus" aria-hidden="true"></i>Order management<span class="fa fa-chevron-down"></span></a>
    <ul style="display: none;" class="nav child_menu">
        <li><a href="<?php echo base_url('order/all/list'); ?>">All Order</a></li>
    <?php if($this->ion_auth->in_group([1,3,5,6])) { ?>
        <li><a href="<?php echo base_url('order/order_placed/list'); ?>">Order Placed</a></li> 
        <li><a href="<?php echo base_url('order/processing/list'); ?>">Order Processing</a></li>
        <li><a href="<?php echo base_url('order/done/list'); ?>">Order Done</a></li>
        <li><a href="<?php echo base_url('order/cash_on_delivery/list'); ?>">Cash On Delivery</a></li>
        <li><a href="<?php echo base_url('order/deleted/list'); ?>" class="danger">Order Deleted</a></li>
        <?php } ?>
        <?php if($this->ion_auth->in_group([1])) { ?>
        <li><a href="<?php echo base_url('order/temporary_orders'); ?>" class="danger">Temporary Orders List</a></li>
        <?php } ?>
    </ul>
</li> -->
<?php } ?>
<?php if($this->ion_auth->in_group([1,3])) { ?>
<li class="vn">
    <a href="<?php echo base_url('media'); ?>"><i class="fa fa-file-image-o"></i>Media </span></a>
</li>
<?php } ?>

<?php if($this->ion_auth->in_group([1,3,4])) { ?>
<!-- <li class="vn">
    <a><i class="fa fa-ship"></i> Products <span class="fa fa-chevron-down"></span></a>
    <ul style="display: none;" class="nav child_menu">
        <li><a href="<?php echo base_url('addnewproduct'); ?>">Add New Product</a></li>
        <li><a href="<?php echo base_url('addsofaproduct'); ?>">Add Sofa Product</a></li>
        <li><a href="<?php echo base_url('productlist'); ?>">All Products</a></li>
        <li><a href="<?php echo base_url('productbrand'); ?>">Product Brand</a></li>
        <li><a href="<?php echo base_url('addnewcategory'); ?>">Add New Category</a></li>
        <li><a href="<?php echo base_url('categories'); ?>">All Categories</a></li>
    </ul>
</li> -->
<?php } ?>
<?php if($this->ion_auth->in_group([1,3,])) { ?>
<!-- <li class="vn">
    <a><i class="fa fa-picture-o"></i> Fabrics Management <span class="fa fa-chevron-down"></span></a>
    <ul style="display: none;" class="nav child_menu">
        <li><a href="<?php echo base_url('addnewfabric'); ?>">Add New Fabrics</a></li>
        <li><a href="<?php echo base_url('fabriclist'); ?>">View Fabrics</a></li>
    </ul>
</li> -->
<!-- <li class="vn">
    <a><i class="fa fa-building"></i> Show Rooms <span class="fa fa-chevron-down"></span></a>
    <ul style="display: none;" class="nav child_menu">
        <li><a href="<?php echo base_url('showrooms'); ?>">Show Rooms</a></li>
    </ul>    
</li> -->
<?php } ?>
<?php if($this->ion_auth->in_group([1])) { ?>
<li class="vn">
    <a><i class="fa fa-picture-o"></i> Posts <span class="fa fa-chevron-down"></span></a>
    <ul style="display: none;" class="nav child_menu">
        <li><a href="<?php echo base_url("addpost"); ?>">Add new post</a></li>
        <li><a href="<?php echo base_url("searchandedit"); ?>">Search and Edit</a></li>
        <li><a href="<?php echo base_url("post"); ?>">View Posts</a></li>        
        <li><a href="<?php echo base_url("addcategory") ?>">Add new category</a></li>
        <li><a href="<?php echo base_url("viewcategories") ?>">View categories</a></li>
    </ul>
</li>
<li class="vn">
    <a><i class="fa fa-picture-o"></i> Pages <span class="fa fa-chevron-down"></span></a>
    <ul style="display: none;" class="nav child_menu">
        <li><a href="<?php echo base_url('addnewpage'); ?>">Add New Page</a></li>
        <li><a href="<?php echo base_url('viewpages'); ?>">All Pages</a></li>
    </ul>
</li>
    <li class="vn">
        <a><i class="fa fa-picture-o"></i> Portfolio <span class="fa fa-chevron-down"></span></a>
        <ul style="display: none;" class="nav child_menu">
            <li><a href="<?php echo base_url('portfolio_technos'); ?>">Portfolio Technologies</a></li>
            <li><a href="<?php echo base_url('portfolio_cats'); ?>">Portfolio Categories</a></li>
            <li><a href="<?php echo base_url('addnewportfolio'); ?>">Add New Portfolio</a></li>
            <li><a href="<?php echo base_url('portfolios'); ?>">All Portfolio</a></li>
        </ul>
    </li>
    <li class="vn">
        <a><i class="fa fa-picture-o"></i> Pricing <span class="fa fa-chevron-down"></span></a>
        <ul style="display: none;" class="nav child_menu">
            <li><a href="<?php echo base_url('addnewpricing'); ?>">Add New Pricing</a></li>
            <li><a href="<?php echo base_url('pricings'); ?>">All Pricing</a></li>
        </ul>
    </li>
<?php } ?>