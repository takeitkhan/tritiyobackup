<div class="row top_tiles">
	<div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
		<div class="tile-stats">
		  <div class="icon"><i class="fa fa-cog"></i></div>
		  <div class="count">Settings</div>
		  <h3>Subject</h3>
		  <p><a href="<?= base_url()?>classwisesubjectassign" class="btn btn-info btn-block btn-sm">Click Here</a></p>
		</div>
	</div>
  	<div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
  			<div class="tile-stats">
  			  <div class="icon"><i class="fa fa-cogs"></i></div>
  			  <div class="count">Rule</div>
  			  <h3>Subjectwise</h3>
  			  <p><a href="<?= base_url()?>subjectrule" class="btn btn-warning btn-block btn-sm">Click Here</a></p>
  			</div>
  	</div>
  	<!-- <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
  			<div class="tile-stats">
  			  <div class="icon"><i class="fa fa-area-chart"></i></div>
  			  <div class="count"></div>
  			  <h3>Monthly Sales</h3>
  			  <p><a href="<?= base_url()?>reportshow?stratdate=<?= date('Y-m-d', strtotime('last month'))?>&enddate=<?= date('Y-m-d')?>" class="btn btn-default btn-block btn-sm">Click Here</a></p>
  			</div>
  	</div>
  	<div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
  			<div class="tile-stats">
  			  <div class="icon"><i class="fa fa-pie-chart"></i></div>
  			  <div class="count"></div>
  			  <h3>All Sales</h3>
  			  <p><a href="<?= base_url()?>sale-report" class="btn btn-success btn-block btn-sm">Click Here</a></p>
  			</div>
  	</div> -->
</div>

<?php if (!empty($result_groups)):?>
<div class="container">
    <div class="row">
        <div class="col-md-4 col-xs-12 col-sm-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Add Subject
                    </h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content" style="display: block;">
                    <?php echo message_box('success'); ?>
                    <?php echo message_box('error'); ?>
                    <div class="col-md-12 tableoutput" style="padding: 0;">
                        <div class="x_content" style="display: block;">
                            <form action="" method="post" class="">
                              <input type="hidden" value="<?= @$rule_group_subject->id ?>" name="id">
                            	<div class="form-group">
                            		<label for="">Year</label>
                            		<input type="text" name="ruleyear" value="<?= @$rule_group_subject->ruleyear ?>" class="form-control" id="yy" placeholder="Rules Year">
                            	</div>
                              <div class="form-group">
                                <label for="">Result Group</label>
                                <select name="result_group" class="form-control" id="">
                                  <?php foreach ($result_groups as $result_group): ?>
                                    <option <?php if(@$rule_group_subject->result_rule_group_id == $result_group->id) echo 'selected'?> value="<?= $result_group->id?>"><?= $result_group->group_name .' ( '.$result_group->limitation.' )';?></option>
                                  <?php endforeach; ?>
                                </select>
                              </div>
                              <div class="form-group">
                                <label for="">All Subjects</label>
                                <ul class="checkbox-parent">
                                    <?php  
                                      $selected_sub = explode(',', @$rule_group_subject->subjects);
                                      foreach ($subjects as $item){
                                    ?>
                                    <li class="checkbox">
                                        <label>
                                          <input type="checkbox" <?php if(in_array($item->SettingsId, @$selected_sub)) echo 'checked' ?>  value="<?= @$item->SettingsId ?>" name="subjects[]" id=""> <?= @$item->SettingsName ?> 
                                        </label>
                                      </li>
                                    <?php
                                      }
                                    ?>
                                </ul>
                              </div>
                                <div class="form-group">
                                  <input type="submit" value="Save" class="btn btn-success pull-right">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8 col-xs-12 col-sm-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2><?= @$title; ?>
                    </h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content" style="display: block;">
                    <div class="col-md-12 tableoutput" style="padding: 0;">
                        <div class="x_content" style="display: block;">
                           <div class="table-responsive">
                                    <table class="table table-striped talbe-bordered" id="post-list">
                                        <thead class="thead-inverse">
                                        <tr>
                                            <th>ID</th>
                                            <th>Rule Year</th>
                                            <th>Rule Group</th>
                                            <th width="25%">Subjects</th>
                                            <th width="15%">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        <?php foreach ($rule_group_subjects as $item): ?>
                                            <tr>
                                                <td><?= @$item->id ?></td>
                                                <td><?= @$item->ruleyear ?></td>
                                                <td><?= @tableSingleColumn('result_rule_group', 'group_name', ['id'=> @$item->result_rule_group_id] )?></td>
                                                <td>
                                                  <?php
                                                    $selected_subjects = explode(',', @$item->subjects);
                                                    foreach ($selected_subjects as $value) {
                                                      echo tableSingleColumn('initial_settings_info', 'SettingsName', ['SettingsId'=> $value ,'SettingsCategory'=> 4] ).'<br>';
                                                    }
                                                  ?>
                                                    
                                                  </td>
                                                <td>
                                                    <div class="btn-group btn-xs">
                                                        <a class="btn btn-xs btn-warning" href="<?php echo base_url("editgroupsubject/$item->id") ?>"><i class="fa fa-pencil fa-fw"></i></a>
                                                        <a href="<?php echo base_url("deletegroupsubject/$item->id") ?>" onclick="confirm('Are you Sure ?')" class="btn btn-xs btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>

                                        </tbody>
                                        <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Rule Year</th>
                                            <th>Rule Group</th>
                                            <th width="25%">Subjects</th>
                                            <th width="15%">Action</th>
                                        </tr>
                                        </thead>
                                    </table>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
  .checkbox-parent {
  list-style: none;
  padding: 0;
  height: 200px;
  overflow: auto;
  background: #f7f7f7;
  padding: 10px;
}
</style>
<?php endif; ?>

<?php if(!empty(@$rulegroups)): ?>
  <div class="container">
    <div class="row">
        <div class="col-md-12">
          <div class="x_panel">
                <div class="x_title">
                    <h2>SET Rule
                    </h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content" style="display: block;">
                    <div class="col-md-12 tableoutput" style="padding: 0;">
                        <div class="x_content" style="display: block;">
                          <div class="row">
                            <form action="" method="get" class="">
                              <table class="table border-none">
                                <tbody>
                                  <tr>
                                    <td>
                                      <div class="from-group">
                                        <!-- <label for=""></label> -->
                                        <select class="form-control" name="rulegroup" id="">
                                          <option value="">Select Rule Group</option>
                                          <?php foreach ($rulegroups as $rulegroup): ?>
                                            <option <?php if(@$this->input->get('rulegroup') == $rulegroup->id) echo 'Selected';?> value="<?= $rulegroup->id?>"><?= $rulegroup->group_name .' ( '.$rulegroup->limitation.' )';?></option>
                                          <?php endforeach; ?>
                                        </select>
                                      </div>
                                    </td>
                                    <td>
                                      <div class="form-group">
                                         <input type="submit" value="Click" class="btn btn-sm btn-success">
                                      </div>
                                    </td>
                                  </tr>
                              </tbody>
                            </table>
                            </form>
                          </div>
                            <?php if(!empty($rule_subjects)): ?>
                           <div class="table-responsive">
                              <table class="table table-striped talbe-bordered" id="post-list">
                                <thead class="thead-inverse">
                                <tr>
                                    <th>Subjects</th>
                                    <th>CQ</th>
                                    <th>MCQ</th>
                                    <th>Practical</th>
                                    <th>Pass (%)</th>
                                    <th width="15%">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($rule_subjects as $item): ?>
                                <?php
                                  $selected_subjects = explode(',', @$item->subjects);
                                  foreach ($selected_subjects as $value) {
                                   
                                ?>
                                <tr>
                                  <td><?php  echo tableSingleColumn('initial_settings_info', 'SettingsName', ['SettingsId'=> $value ,'SettingsCategory'=> 4] ).'<br>'; ?>
                                    
                                  </td>
                                  <td><input type="text"></td>
                                  <td><input type="text"></td>
                                  <td><input type="text"></td>
                                  <td><input type="text"></td>
                                  <td>
                                      <div class="btn-group btn-xs">
                                          <a class="btn btn-xs btn-warning" href="<?php echo base_url("editgroupsubject/$item->id") ?>"><i class="fa fa-pencil fa-fw"></i></a>
                                          <a href="<?php echo base_url("deletegroupsubject/$item->id") ?>" onclick="confirm('Are you Sure ?')" class="btn btn-xs btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                      </div>
                                  </td>
                                </tr>
                                <?php
                                  }
                                ?>
                                    
                                <?php endforeach; ?>
                                </tbody>
                                <thead>
                                <tr>
                                    <th>Subjects</th>
                                    <th>CQ</th>
                                    <th>MCQ</th>
                                    <th>Practical</th>
                                    <th>Pass (%)</th>
                                    <th width="15%">Action</th>
                                </tr>
                                </thead>
                              </table>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>  
