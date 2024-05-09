

<div class="container custom-container">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">

                <div class="x_title">
                    <h2><?php echo $title; ?> <?= @$this->input->get('client_type'); ?></h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-bars"></i></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="<?= base_url('customers?client_type=Customer') ?>">Customers</a></li>
                                <li><a href="<?= base_url('customers?client_type=Supplier') ?>">Suppliers</a></li>
                                <li><a href="<?= base_url('customers?client_type=Vendor') ?>">Vendors</a></li>
                                <li><a href="<?= base_url('customers?client_type=Manufacturer') ?>">Manufacturers</a></li>
                                <li><a href="javascript:history.back(1)">Back</a></li>
                            </ul>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content" style="display: block;">
                    <?php echo message_box('success'); ?>
                    <?php echo message_box('error'); ?>
                    <div class="row">
                        <form method="post" enctype="multipart/form-data">
                            <div class="col-md-6 col-sm-6 col-xs-12">


                                <div class="form-group ">
                                    <label class="control-label">
                                        Name 
                                         <span class="asteriskField">*</span>
                                    </label>
                                    <input class="form-control" name="name" placeholder="Name" value="" required type="text"/>
                                </div>
                                <div class="form-group ">
                                    <label class="control-label">
                                        Contact Number 
                                         <span class="asteriskField">*</span>
                                    </label>
                                    <input class="form-control" id="number" name="contact" value="" required placeholder="Number"
                                           type="number" pattern="[0-9]" minlength="11"/>
                                </div>
                                <div class="form-group ">
                                    <label class="control-label requiredField">
                                        Email
                                     
                                    </label>
                                    <input class="form-control" name="email" value="" placeholder="Mail Address"
                                           type="text" />
                                </div>
                                <div class="form-group ">
                                    <label class="control-label">
                                        Company Name
                                       
                                    </label>
                                    <input class="form-control" name="company_name" value="" placeholder="Company Name" type="text" />
                                </div>
                                <div class="form-group ">
                                    <label class="control-label">
                                        Office Address 
                                    </label>
                                    <input class="form-control" value="" name="office_address" placeholder="Office Address" type="text" />
                                </div>

                                <div class="form-group ">
                                    <label class="control-label">Investor Type</label>
                                    <select class="select form-control"  id="select" name="investor_type">
                                        <?php echo investor_type('Choose Company Type', $select = '', ''); ?>
                                    </select>
                                </div>
                                <div class="form-group ">
                                    <label class="control-label requiredField">Photo</label>
                                    <input class="form-control" name="upload_file" value="" placeholder="Client Photo" type="file">
                                </div>
                            </div>

                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group ">
                                    <label class="control-label">City</label>
                                    <input class="form-control" name="city" value="" placeholder="Enter your city name" type="text"/>
                                </div>
                                <div class="form-group ">
                                    <label class="control-label">
                                        State
                                    </label>
                                    <input class="form-control" name="state" value="" placeholder="Enter your state name" type="text"/>
                                </div>
                                <div class="form-group ">
                                    <label class="control-label">
                                        Zip Code
                                    </label>
                                    <input class="form-control" name="zip" value="" placeholder="Zip Code" type="text"/>
                                </div>
                                
                                
                                <div class="form-group ">
                                    <label class="control-label">Summary</label>
                                    <textarea class="form-control" placeholder="Summary" name="summary" id="" cols="30" rows="3"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div>
                                        <button class="btn btn-success" type="submit">
                                            Submit
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>