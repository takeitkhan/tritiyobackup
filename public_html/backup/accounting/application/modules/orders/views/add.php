
<div class="container custom-container">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2><?php echo $title;?></h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#">Settings 1</a>
                                </li>
                                <li><a href="#">Settings 2</a>
                                </li>
                            </ul>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content" style="display: block;">
                    <form method="post">
                        <div class="row well">
                            <div class="col-md-2 col-sm-2 col-xs-12">Vendor Name</div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                  <select class="form-control" id="sel1">
                                    <option>Select list</option>
                                    <option>Select list</option>
                                    <option>Select list</option>
                                    <option>Select list</option>
                                    <option>Select list</option>
                                    <option>Select list</option>
                                  </select>
                                </div>
                            </div>
                        </div>
                        <div class="row well">
                            <div class="col-md-2 col-sm-2 col-xs-12">Deliver To</div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group form-inline">
							        <div class="radio">
							          <label>
							            <input type="radio" name="o1" value="">
							            <span class="cr"><i class="cr-icon glyphicon glyphicon-ok-sign"></i></span>
							            Option one 
							          </label>
							        </div>
							        <div class="radio">
							          <label>
							            <input type="radio" name="o1" value="" checked>
							            <span class="cr"><i class="cr-icon glyphicon glyphicon-ok-sign"></i></span>
							            Option two
							        </div>
                                    <ul class="list-unstyled fomr-userinfo">
                                        <li>Openoway</li>
                                        <li>Change destination to deliver</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->
                        <div class="row well">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-2 col-sm-2 col-xs-12">Purchase Order#</div>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div class="form-group">
                                            <div class="form-group">
                                                  <input type="text" class="form-control" id="usr">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                    <!-- end row -->
                                <div class="row">
                                    <div class="col-md-2 col-sm-2 col-xs-12">Reference#</div>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div class="form-group">
                                            <div class="form-group">
                                                  <input type="text" class="form-control" id="usr">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                    <!-- end row -->
                                <div class="row">
                                    <div class="col-md-2 col-sm-2 col-xs-12">Date</div>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                       <div class="row">
                                           <div class="col-md-6 col-sm-6 col-xs-12"><div class="form-group">
                                                  <input type="date" class="form-control" id="usr">
                                            </div></div>
                                           <div class="col-md-6 col-sm-6 col-xs-12"><div class="form-group">
                                                  <input type="date" class="form-control" id="usr">
                                            </div></div>
                                       </div>
                                    </div>
                                </div>
                                    <!-- end row -->
                                <div class="row">
                                    <div class="col-md-2 col-sm-2 col-xs-12">Shipment Preference</div>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div class="form-group">
                                            <div class="form-group">
                                                  <input type="text" class="form-control" id="usr" placeholder="Select or type to add">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                    <!-- end row -->
                            </div>
                        </div>
                            <!-- end row -->
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <ul class="list-inline">
                                    <li>Item Rats are</li>
                                    <li><b>Text exclusive</b></li>
                                </ul>
                            </div>
                            <div class="col-md-8 col-sm-12 col-xs-12">
                                <table class="table table-bordered item-center">
                                    <thead>
                                      <tr class="active">
                                        <th colspan="2">ITEM DETAILS</th>
                                        <th>ACCOUNT</th>
                                        <th>QUANTITY</th>
                                        <th>RATE</th>
                                        <th>TAX</th>
                                        <th>AMOUNT</th>
                                        <th colspan="2">ACTION</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <tr id="tr-clone">
                                        <td><img src="http://via.placeholder.com/60x50" width="60" height="50"></td>
                                        <td><input class="form-control" type="text" placeholder="Type a click to select to item"></td>
                                        <td>
                                            <div class="form-group">
                                              <select class="form-control" id="sel1">
                                                <option>Select list</option>
                                                <option>Select list</option>
                                                <option>Select list</option>
                                                <option>Select list</option>
                                                <option>Select list</option>
                                                <option>Select list</option>
                                              </select>
                                            </div>
                                        </td>
                                        <td>100</td>
                                        <td>0.00</td>
                                        <td>
                                            <div class="form-group">
                                              <select class="form-control" id="sel1">
                                                <option>Select list</option>
                                                <option>Select list</option>
                                                <option>Select list</option>
                                                <option>Select list</option>
                                                <option>Select list</option>
                                                <option>Select list</option>
                                              </select>
                                            </div>
                                        </td>
                                        <td>0.00</td>
                                        <td><i class="fa fa-minus-circle fa-lg" style="color: #47a9df;"></i></td>
                                        <td><i class="fa fa-times-circle fa-lg" style="color: #EB6C6A;"></i></td>
                                      </tr>
                                    </tbody>
                                  </table>
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="row">
                            <div class="col-md-2 col-sm-2 col-xs-12">
                                  <p class="add-another-item"><i class="fa fa-plus"></i> add another item</p>
                              </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="row">
                                     <div class="col-md-6 col-sm-6 col-xs-12">Sub Total</div>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div class="text-right">0.00</div></div>
                                </div>
                                <!-- end row -->
                                <hr>
                                <div class="row">
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <div class="form-inline">
                                            <div class="form-group">
                                                <input type="text" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-4 col-xs-12">
                                        <div class="text-right">0.00</div>
                                    </div>
                                </div>
                                <!-- end row -->
                            </div>
                        </div>
                        <!-- end row -->
                        <br>
                        <div class="row well">
                            <div class="col-md-2 col-sm-2 col-xs-12">
                                <div>
                                    <div class="form-group">
                                       Attach file: 
                                          <div class="input-file-container">  
										    <input class="input-file" id="my-file" type="file">
										    <label tabindex="0" for="my-file" class="input-file-trigger">Select a file...</label>
										  </div>
										  <p class="file-return"></p>   
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                  <label for="comment">Note</label>
                                  <textarea class="form-control" rows="2" id="comment" placeholder="Note"></textarea>
                                </div>
                                <div class="form-group">
                                  <label for="comment">Terms and condition</label>
                                  <textarea class="form-control" rows="5" id="comment" placeholder="Mention your company's terms and conditions."></textarea>
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
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>