<div class="container custom-container ">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2><?php echo $title;?></h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content" style="display: block;">
                    <?php echo message_box('success'); ?>
                    <?php echo message_box('error'); ?>
					<form  action="" method="post">
						<div class="col-md-7">
							<div class="row well">
								<div class="col-md-12">
									<div class="row">
                                        <h4 style="margin: 0;">Basic Information</h4>
                                        <hr />
                                        <div class="form-group ">
                                            <label class="control-label">Name</label>
                                            <input class="form-control" required name="name" placeholder="Name" required value="" type="text"/>
                                        </div>

                                        <div class="form-group ">
                                            <label class="control-label">Type</label>
                                            <div class="form-group form-inline">
                                                <div class="radio">
                                                    <label>
                                                        <input required name="type" value="Service" checked="" type="radio">
                                                        <span class="cr"><i class="cr-icon glyphicon glyphicon-ok-sign"></i></span>Service
                                                    </label>
                                                    <label>
                                                        <input required name="type" value="Product" checked="" type="radio">
                                                        <span class="cr"><i class="cr-icon glyphicon glyphicon-ok-sign"></i></span>Product
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group ">
                                            <label class="control-label">Manufacturer</label>
                                            <select name="manufacturer" class="form-control">
                                                <option>1</option>
                                            </select>
                                        </div>

                                        <div class="form-group ">
                                            <label class="control-label">Brand</label>
                                            <select name="brand" class="form-control">
                                                <option>1</option>
                                            </select>
                                        </div>

                                        <div class="form-group ">
                                            <label class="control-label">Vendor</label>
                                            <select name="vendor" class="form-control">
                                                <option>1</option>
                                            </select>
                                        </div>

                                        <div class="form-group ">
                                            <label class="control-label">Unit</label>
                                            <select name="unit" class="form-control">
                                                <option>1</option>
                                            </select>
                                        </div>

                                        <div class="form-group ">
                                            <label class="control-label">Sku</label>
                                            <input class="form-control"  name="sku" placeholder="Sku" required value="" type="text"/>
                                        </div>

                                        <div class="form-group ">
                                            <label class="control-label">Upc</label>
                                            <input class="form-control" name="upc" placeholder="Upc" value="" type="text"/>
                                        </div>

                                        <div class="form-group ">
                                            <label class="control-label">Mpn</label>
                                            <input class="form-control" name="mpn" placeholder="Mpn"  value="" type="text"/>
                                        </div>

                                        <div class="form-group ">
                                            <label class="control-label">Ean</label>
                                            <input class="form-control" name="ean" placeholder="Ean"  value="" type="text"/>
                                        </div>

                                        <div class="form-group ">
                                            <label class="control-label">Isbn</label>
                                            <input class="form-control" name="isbn" placeholder="Isbn"  value="" type="text"/>
                                        </div>
                                        <div class="form-group ">
                                            <label class="control-label">Image</label>
                                            <input type="file" name="image" class="form-control" />
                                        </div>
                                    </div>
								</div>
							</div>


						</div>
                        <div class="col-md-4 pull-right">
                            <div class="row well">
                                <div class="col-md-12">
                                    <h4 style="margin: 0;">Sales Information</h4>
                                    <hr />
                                    <div class="form-group ">
                                        <label class="control-label">Selling Price(BDT)</label>
                                        <input class="form-control" name="selling_price" placeholder="Selling Price" required value="" type="number" minlength="1" />
                                    </div>
                                    <div class="form-group ">
                                        <label class="control-label">Account</label>
                                        <select name="selling_account" class="form-control">
                                            <option>1</option>
                                        </select>
                                    </div>
                                    <div class="form-group ">
                                        <label class="control-label">Selling Description</label>
                                        <textarea name="selling_description" class="form-control" placeholder="Selling Description"></textarea>
                                    </div>
                                    <div class="form-group ">
                                        <label class="control-label">Selling Tax</label>
                                        <select name="selling_tax" class="form-control">
                                            <option>Selling Tax 0</option>
                                            <option>Selling Tax 1(10%)</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row well">
                                <div class="col-md-12">
                                    <h4 style="margin: 0;">Purchase Information</h4>
                                    <hr />
                                    <div class="form-group ">
                                        <label class="control-label">Purchase Price(BDT)</label>
                                        <input class="form-control" name="purchase_price" placeholder="Selling Price" required value="" type="number" minlength="1" />
                                    </div>
                                    <div class="form-group ">
                                        <label class="control-label">Account</label>
                                        <select name="purchase_account" class="form-control">
                                            <option>1</option>
                                        </select>
                                    </div>
                                    <div class="form-group ">
                                        <label class="control-label">Purchase Description</label>
                                        <textarea name="purchase_description" class="form-control" placeholder="Selling Description"></textarea>
                                    </div>
                                    <div class="form-group ">
                                        <label class="control-label">Purchase Tax</label>
                                        <select name="purchase_tax" class="form-control">
                                            <option>Selling Tax 0</option>
                                            <option>Selling Tax 1(10%)</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <!-- end row -->
                            <div class="row">
                                <div class="col-md-12">
                                    <button class="btn btn-success">Save</button>
                                    <button class="btn btn-primary">Cancel</button>
                                </div>
                            </div>
                        </div>
					</form>
                </div>
            </div>
        </div>
    </div>
</div>






