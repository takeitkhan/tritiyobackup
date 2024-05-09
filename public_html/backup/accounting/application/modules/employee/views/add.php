<div class="container custom-container">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2><?php echo $title; ?></h2>
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
                    <?php if($this->session->flashdata('exist')){ echo $this->session->flashdata('exist');} ?>

                    <div class="row">
                        <form method="post">
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group ">
                                    <label class="control-label">
                                        Employee Number
                                    </label>
                                    <input class="form-control" name="employee_no" placeholder="Employee Number" value="" type="text" required />
                                </div>
                                <div class="form-group ">
                                    <label class="control-label">
                                        Name
                                    </label>
                                    <input class="form-control" name="name" placeholder="Name" value="" type="text"/>
                                </div>
                                <div class="form-group ">
                                    <label class="control-label">
                                        Contact Number
                                    </label>
                                    <input class="form-control" id="number" name="contact" value="" placeholder="Number"
                                           type="number" pattern="[0-9]" minlength="11"/>
                                </div>
                                <div class="form-group ">
                                    <label class="control-label requiredField">
                                        Email
                                        <span class="asteriskField">*</span>
                                    </label>
                                    <input class="form-control" name="email" value="" placeholder="Mail Address"
                                           type="text" required/>
                                </div>

                                <div class="form-group ">
                                    <label class="control-label">
                                        Address <span class="asteriskField">*</span>
                                    </label>
                                    <input class="form-control" value="" name="address" placeholder="Address" type="text" required/>
                                </div>
                                <div class="form-group">
                                    <div>
                                        <button class="btn btn-success" type="submit">
                                            Submit
                                        </button>
                                    </div>
                                </div>

                            </div>

                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group ">
                                    <label class="control-label " for="select">Employee Type</label>
                                    <select class="select form-control"  id="select" name="employee_type" required>
                                        <?php
                                        $value="";
                                        echo employee_type('employee_type');
                                        ?>
                                    </select>
                                </div>
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
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>