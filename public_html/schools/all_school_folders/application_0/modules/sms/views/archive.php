<div class="container custom-container">
    <div class="row">

        <?php //if(@$subjects): ?>
        <div class="col-md-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2><?= @$title?></h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content" style="display: block; min-height: 205px;">
                    <div class="col-md-12 pull-right">
                    	<form action="" method="get">
                    		<table class="table border-none">
                            <tbody>
                                <tr>

                                    <td>
                                        <div class="form-group ">
                                            <input value="" class="form-control" name="title"
                                                   placeholder="Search Subject Name" type="text"/>
                                        </div>
                                    </td>

                                    <td>
                                        <input class="btn btn-success" value="Search" type="submit">
                                        <span></span>
                                        <!-- <a class="btn btn-default" href="">Clear</a> -->
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    	</form>

                            <table class="table table-bordered table-hover table-condensed table-striped" id="">
                                <thead>
                                  <th>ID</th>
	                                <th>Type</th>
	                                <th>Name</th>
                                  <th>Mobile</th>
                                  <th>Message</th>
	                                <th>Date</th>
                                </thead>
                                <tbody>
                                <?php
                              //  owndebugger($archives);
                                foreach ($archives as $archive): ?>
                                <tr>
                                        <td><?=@$archive->id;?></td>
                                        <td><?=@$archive->id;?></td>
                                        <td><?php
                                          if($archive->user_id == ''){
                                            echo 'Unknown';
                                          }else {
                                            echo $archive->user_id;
                                          }

                                          ?></td>
                                        <td><?=@$archive->send_number;?></td>

                                        <td><?=@$archive->message;?></td>
                                        <td><?=@$archive->send_date;?></td>

                                </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                            <div class="row">
	                            <div class="col-lg-12 col-xs-12">
	                                <ul class="pagination" style="display: table;margin:auto;">
	                                    <?= @$paging; ?>
	                                </ul>
	                            </div>
	                        </div>

                    </div>

                </div>
            </div>
        </div>

        <?php //endif; ?>
    </div>

</div>
