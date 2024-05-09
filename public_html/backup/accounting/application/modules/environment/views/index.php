<div class="container">
    <div class="row">

        <div class="col-md-12 col-xs-12 col-sm-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Students <small>search students&nbsp;&nbsp; <a href="http://103.218.25.246:8080/campus/newstudent" class="btn btn-success">Add New</a></small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content" style="display: block;">
                    <br>
                    <!--        <h2>Students <small>search students</small> <a href="" class="btn btn-success">Add New</a></h2>-->
                    <form action="http://103.218.25.246:8080/campus/students" class="form-horizontal" id="studentSearch" method="get" data-toggle="validator" enctype="multipart/form-data" accept-charset="utf-8">
                        <div class="form-group">
                            <div class="col-md-2">
                                Status
                                <br>
                                <select class="form-control" name="status">
                                    <option value="1">Active</option>
                                    <option value="0" selected="">Inactive</option>
                                    <option value="" selected="">Choose Status</option>
                                </select>
                            </div>
                            <div class="col-md-2">
                                Name
                                <br>
                                <div class="form-group ">
                                  <input class="form-control" id="name2" name="name2" placeholder="Name" type="text"/>
                                 </div>
                            </div>
                            <div class="col-md-2">
                                Number
                                <br>
                                <div class="form-group ">
                                  <input class="form-control" id="name2" name="name2" placeholder="Number" type="text"/>
                                 </div>
                            </div>
                            <div class="col-md-2">
                                City
                                <br>
                                <div class="form-group ">
                                  <input class="form-control" id="name2" name="name2" placeholder="City" type="text"/>
                                 </div>
                            </div>
                            <div class="col-md-2">
                                Zip Code
                                <br>
                                <div class="form-group ">
                                  <input class="form-control" id="name2" name="name2" placeholder="Zip Code" type="text"/>
                                 </div>
                            </div>
                            <div class="col-md-2">
                                <br>
                                <input class="btn btn-success" value="Search" type="submit">
                                <span></span>
                                <a class="btn btn-default" href="http://103.218.25.246:8080/campus/students">Clear</a>
                            </div>
                        </div>
                    </form>
                    <div class="col-md-12 tableoutput">
                        <div class="x_content" style="display: block;">
                            <div class="table-responsive">
                                <div class="modal fade" id="modal_body_176011300" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <form></form>
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">
                                    Send Message
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                </h5>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label>Phone Number</label>
                                                    <input name="phonenumber" value="01712524596" class="form-control" readonly="readonly" type="text">
                                                </div>
                                                <div class="form-group">
                                                    <label>Message</label>
                                                    <textarea name="message" placeholder="Enter Your Message" cols="40" rows="2" class="form-control"></textarea>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary">Send Message</button>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="modal fade" id="modal_body_17691300" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <form></form>
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">
                                    Send Message
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                </h5>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label>Phone Number</label>
                                                    <input name="phonenumber" value="01737970838" class="form-control" readonly="readonly" type="text">
                                                </div>
                                                <div class="form-group">
                                                    <label>Message</label>
                                                    <textarea name="message" placeholder="Enter Your Message" cols="40" rows="2" class="form-control"></textarea>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary">Send Message</button>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="modal fade" id="modal_body_17681300" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <form></form>
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">
                                    Send Message
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                </h5>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label>Phone Number</label>
                                                    <input name="phonenumber" value="564685" class="form-control" readonly="readonly" type="text">
                                                </div>
                                                <div class="form-group">
                                                    <label>Message</label>
                                                    <textarea name="message" placeholder="Enter Your Message" cols="40" rows="2" class="form-control"></textarea>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary">Send Message</button>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="modal fade" id="modal_body_17671300" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <form></form>
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">
                                    Send Message
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                </h5>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label>Phone Number</label>
                                                    <input name="phonenumber" value="456688" class="form-control" readonly="readonly" type="text">
                                                </div>
                                                <div class="form-group">
                                                    <label>Message</label>
                                                    <textarea name="message" placeholder="Enter Your Message" cols="40" rows="2" class="form-control"></textarea>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary">Send Message</button>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="modal fade" id="modal_body_17661300" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <form></form>
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">
                                    Send Message
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                </h5>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label>Phone Number</label>
                                                    <input name="phonenumber" value="45476" class="form-control" readonly="readonly" type="text">
                                                </div>
                                                <div class="form-group">
                                                    <label>Message</label>
                                                    <textarea name="message" placeholder="Enter Your Message" cols="40" rows="2" class="form-control"></textarea>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary">Send Message</button>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="modal fade" id="modal_body_17651400" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <form></form>
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">
                                    Send Message
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                </h5>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label>Phone Number</label>
                                                    <input name="phonenumber" value="54676877985543" class="form-control" readonly="readonly" type="text">
                                                </div>
                                                <div class="form-group">
                                                    <label>Message</label>
                                                    <textarea name="message" placeholder="Enter Your Message" cols="40" rows="2" class="form-control"></textarea>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary">Send Message</button>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="modal fade" id="modal_body_17641400" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <form></form>
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">
                                    Send Message
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                </h5>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label>Phone Number</label>
                                                    <input name="phonenumber" value="453876990203" class="form-control" readonly="readonly" type="text">
                                                </div>
                                                <div class="form-group">
                                                    <label>Message</label>
                                                    <textarea name="message" placeholder="Enter Your Message" cols="40" rows="2" class="form-control"></textarea>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary">Send Message</button>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="modal fade" id="modal_body_17621400" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <form></form>
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">
                                    Send Message
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                </h5>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label>Phone Number</label>
                                                    <input name="phonenumber" value="01719565656" class="form-control" readonly="readonly" type="text">
                                                </div>
                                                <div class="form-group">
                                                    <label>Message</label>
                                                    <textarea name="message" placeholder="Enter Your Message" cols="40" rows="2" class="form-control"></textarea>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary">Send Message</button>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="modal fade" id="modal_body_17621300" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <form></form>
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">
                                    Send Message
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                </h5>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label>Phone Number</label>
                                                    <input name="phonenumber" value="01719565555" class="form-control" readonly="readonly" type="text">
                                                </div>
                                                <div class="form-group">
                                                    <label>Message</label>
                                                    <textarea name="message" placeholder="Enter Your Message" cols="40" rows="2" class="form-control"></textarea>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary">Send Message</button>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="modal fade" id="modal_body_17611400" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <form></form>
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">
                                    Send Message
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                </h5>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label>Phone Number</label>
                                                    <input name="phonenumber" value="017195656566" class="form-control" readonly="readonly" type="text">
                                                </div>
                                                <div class="form-group">
                                                    <label>Message</label>
                                                    <textarea name="message" placeholder="Enter Your Message" cols="40" rows="2" class="form-control"></textarea>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary">Send Message</button>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <table class="table table-striped talbe-bordered" id="post-list">
                                    <thead class="thead-inverse">
                                        <tr>
                                            <td>ID</td>
                                            <td>Action</td>
                                            <td>Name</td>
                                            <td>Mail Address</td>
                                            <td>Company Name</td>
                                            <td>Company Types</td>
                                            <td>City</td>
                                            <td>Zip Code</td>
                                            <td>Phone</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>176011300</td>
                                            <td>
                                                <a href="http://103.218.25.246:8080/campus/overview/176011300?userpage=true"><i class="fa fa-search-plus"></i></a>&nbsp;&nbsp;
                                                <a class="modalcursour" data-toggle="modal" data-target="#modal_body_176011300"><i class="fa fa-envelope"></i></a>&nbsp;&nbsp;
                                                <a href="http://103.218.25.246:8080/campus/basicinformation/176011300?userpage=true"><i class="fa fa-pencil fa-fw"></i></a>
                                                <a href="http://103.218.25.246:8080/campus/getindividualresult?uid=176011300"><i class="fa fa-eye fa-fw"></i></a>
                                            </td>
                                            <td>Muhammad Mustafa Kamal</td>
                                            <td>Muhammad Abdul Mannan</td>
                                            <td>a</td>
                                            <td>Seven</td>
                                            <td>1</td>
                                            <td>A</td>
                                            <td>01712524596</td>
                                        </tr>

                                        <tr>
                                            <td>17691300</td>
                                            <td>
                                                <a href="http://103.218.25.246:8080/campus/overview/17691300?userpage=true"><i class="fa fa-search-plus"></i></a>&nbsp;&nbsp;
                                                <a class="modalcursour" data-toggle="modal" data-target="#modal_body_17691300"><i class="fa fa-envelope"></i></a>&nbsp;&nbsp;
                                                <a href="http://103.218.25.246:8080/campus/basicinformation/17691300?userpage=true"><i class="fa fa-pencil fa-fw"></i></a>
                                                <a href="http://103.218.25.246:8080/campus/getindividualresult?uid=17691300"><i class="fa fa-eye fa-fw"></i></a>
                                            </td>
                                            <td>happy aktar</td>
                                            <td>jabbar ali</td>
                                            <td>shahina bagam</td>
                                            <td>Six</td>
                                            <td>9</td>
                                            <td>A</td>
                                            <td>01737970838</td>
                                        </tr>

                                        <tr>
                                            <td>17681300</td>
                                            <td>
                                                <a href="http://103.218.25.246:8080/campus/overview/17681300?userpage=true"><i class="fa fa-search-plus"></i></a>&nbsp;&nbsp;
                                                <a class="modalcursour" data-toggle="modal" data-target="#modal_body_17681300"><i class="fa fa-envelope"></i></a>&nbsp;&nbsp;
                                                <a href="http://103.218.25.246:8080/campus/basicinformation/17681300?userpage=true"><i class="fa fa-pencil fa-fw"></i></a>
                                                <a href="http://103.218.25.246:8080/campus/getindividualresult?uid=17681300"><i class="fa fa-eye fa-fw"></i></a>
                                            </td>
                                            <td>Shila akter</td>
                                            <td>fgfhffddx</td>
                                            <td>sdsdvs</td>
                                            <td>Six</td>
                                            <td>8</td>
                                            <td>A</td>
                                            <td>564685</td>
                                        </tr>

                                        <tr>
                                            <td>17671300</td>
                                            <td>
                                                <a href="http://103.218.25.246:8080/campus/overview/17671300?userpage=true"><i class="fa fa-search-plus"></i></a>&nbsp;&nbsp;
                                                <a class="modalcursour" data-toggle="modal" data-target="#modal_body_17671300"><i class="fa fa-envelope"></i></a>&nbsp;&nbsp;
                                                <a href="http://103.218.25.246:8080/campus/basicinformation/17671300?userpage=true"><i class="fa fa-pencil fa-fw"></i></a>
                                                <a href="http://103.218.25.246:8080/campus/getindividualresult?uid=17671300"><i class="fa fa-eye fa-fw"></i></a>
                                            </td>
                                            <td>Julia Akter</td>
                                            <td>fgdb</td>
                                            <td>fddvxxc</td>
                                            <td>Six</td>
                                            <td>7</td>
                                            <td>A</td>
                                            <td>456688</td>
                                        </tr>

                                        <tr>
                                            <td>17661300</td>
                                            <td>
                                                <a href="http://103.218.25.246:8080/campus/overview/17661300?userpage=true"><i class="fa fa-search-plus"></i></a>&nbsp;&nbsp;
                                                <a class="modalcursour" data-toggle="modal" data-target="#modal_body_17661300"><i class="fa fa-envelope"></i></a>&nbsp;&nbsp;
                                                <a href="http://103.218.25.246:8080/campus/basicinformation/17661300?userpage=true"><i class="fa fa-pencil fa-fw"></i></a>
                                                <a href="http://103.218.25.246:8080/campus/getindividualresult?uid=17661300"><i class="fa fa-eye fa-fw"></i></a>
                                            </td>
                                            <td>Tanjila</td>
                                            <td>weww</td>
                                            <td>sacsz</td>
                                            <td>Six</td>
                                            <td>6</td>
                                            <td>A</td>
                                            <td>45476</td>
                                        </tr>

                                        <tr>
                                            <td>17651400</td>
                                            <td>
                                                <a href="http://103.218.25.246:8080/campus/overview/17651400?userpage=true"><i class="fa fa-search-plus"></i></a>&nbsp;&nbsp;
                                                <a class="modalcursour" data-toggle="modal" data-target="#modal_body_17651400"><i class="fa fa-envelope"></i></a>&nbsp;&nbsp;
                                                <a href="http://103.218.25.246:8080/campus/basicinformation/17651400?userpage=true"><i class="fa fa-pencil fa-fw"></i></a>
                                                <a href="http://103.218.25.246:8080/campus/getindividualresult?uid=17651400"><i class="fa fa-eye fa-fw"></i></a>
                                            </td>
                                            <td>Dipa Sarkar</td>
                                            <td> Sarkar</td>
                                            <td>Anowara</td>
                                            <td>Six</td>
                                            <td>5</td>
                                            <td>B</td>
                                            <td>54676877985543</td>
                                        </tr>

                                        <tr>
                                            <td>17641400</td>
                                            <td>
                                                <a href="http://103.218.25.246:8080/campus/overview/17641400?userpage=true"><i class="fa fa-search-plus"></i></a>&nbsp;&nbsp;
                                                <a class="modalcursour" data-toggle="modal" data-target="#modal_body_17641400"><i class="fa fa-envelope"></i></a>&nbsp;&nbsp;
                                                <a href="http://103.218.25.246:8080/campus/basicinformation/17641400?userpage=true"><i class="fa fa-pencil fa-fw"></i></a>
                                                <a href="http://103.218.25.246:8080/campus/getindividualresult?uid=17641400"><i class="fa fa-eye fa-fw"></i></a>
                                            </td>
                                            <td>ami</td>
                                            <td>nam</td>
                                            <td>jani na</td>
                                            <td>Six</td>
                                            <td>4</td>
                                            <td>B</td>
                                            <td>453876990203</td>
                                        </tr>

                                        <tr>
                                            <td>17621400</td>
                                            <td>
                                                <a href="http://103.218.25.246:8080/campus/overview/17621400?userpage=true"><i class="fa fa-search-plus"></i></a>&nbsp;&nbsp;
                                                <a class="modalcursour" data-toggle="modal" data-target="#modal_body_17621400"><i class="fa fa-envelope"></i></a>&nbsp;&nbsp;
                                                <a href="http://103.218.25.246:8080/campus/basicinformation/17621400?userpage=true"><i class="fa fa-pencil fa-fw"></i></a>
                                                <a href="http://103.218.25.246:8080/campus/getindividualresult?uid=17621400"><i class="fa fa-eye fa-fw"></i></a>
                                            </td>
                                            <td>Tanjib Ahsan</td>
                                            <td>Mollik Birai</td>
                                            <td>Tahura</td>
                                            <td>Six</td>
                                            <td>2</td>
                                            <td>B</td>
                                            <td>01719565656</td>
                                        </tr>

                                        <tr>
                                            <td>17621300</td>
                                            <td>
                                                <a href="http://103.218.25.246:8080/campus/overview/17621300?userpage=true"><i class="fa fa-search-plus"></i></a>&nbsp;&nbsp;
                                                <a class="modalcursour" data-toggle="modal" data-target="#modal_body_17621300"><i class="fa fa-envelope"></i></a>&nbsp;&nbsp;
                                                <a href="http://103.218.25.246:8080/campus/basicinformation/17621300?userpage=true"><i class="fa fa-pencil fa-fw"></i></a>
                                                <a href="http://103.218.25.246:8080/campus/getindividualresult?uid=17621300"><i class="fa fa-eye fa-fw"></i></a>
                                            </td>
                                            <td>Mithila</td>
                                            <td>Akbar</td>
                                            <td>Maliha</td>
                                            <td>Six</td>
                                            <td>2</td>
                                            <td>A</td>
                                            <td>01719565555</td>
                                        </tr>

                                        <tr>
                                            <td>17611400</td>
                                            <td>
                                                <a href="http://103.218.25.246:8080/campus/overview/17611400?userpage=true"><i class="fa fa-search-plus"></i></a>&nbsp;&nbsp;
                                                <a class="modalcursour" data-toggle="modal" data-target="#modal_body_17611400"><i class="fa fa-envelope"></i></a>&nbsp;&nbsp;
                                                <a href="http://103.218.25.246:8080/campus/basicinformation/17611400?userpage=true"><i class="fa fa-pencil fa-fw"></i></a>
                                                <a href="http://103.218.25.246:8080/campus/getindividualresult?uid=17611400"><i class="fa fa-eye fa-fw"></i></a>
                                            </td>
                                            <td>Salman</td>
                                            <td>Mawla</td>
                                            <td>Misayel</td>
                                            <td>Six</td>
                                            <td>1</td>
                                            <td>B</td>
                                            <td>017195656566</td>
                                        </tr>

                                    </tbody>
                                    <thead>
                                        <tr>
                                            <td>ID</td>
                                            <td>Action</td>
                                            <td>Name</td>
                                            <td>Mail Address</td>
                                            <td>Company Name</td>
                                            <td>Company Types</td>
                                            <td>City</td>
                                            <td>Zip Code</td>
                                            <td>Phone</td>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-xs-12">
                                <ul class="pagination" style="display: table;margin:auto;">
                                    <li class="for_active">
                                        &nbsp;<a class="active">1</a><a href="http://103.218.25.246:8080/campus/students?per_page=10" data-ci-pagination-page="10" rel="start">2</a><a href="http://103.218.25.246:8080/campus/students?per_page=10" data-ci-pagination-page="10" rel="next">&gt;</a> </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>