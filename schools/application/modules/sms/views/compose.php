<div class="container custom-container">
    <div class="row">
        <div class="col-md-5">
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
                <div class="x_content" style="display: block;">
                    <?php echo message_box('success'); ?>
                    <?php echo message_box('error');
                  //  owndebugger($template);
                    ?>
                        <form action="<?= base_url('send-single-compose');?>" method="post">
                            <div class="form-group ">
                                <label class="control-label">Number</label>
                                <input class="form-control" name="send_number" placeholder="Send Number" required type="text"/>
                                <input name='post_url_routs' value="<?=base_url('sms-compose');?>" type='hidden'>
                            </div>



                            <div class="form-group">
                                <label class="control-label">Default Message</label>
                                <select class="form-control lavelSelect" name="send_message_temp" >
                                    <option value="" >Select</option>

                                    <?php
                                    foreach ($template as $temp) {
                                      echo '<option value="'.$temp->message.'" >'.$temp->name.'</option>';
                                    }

                                    ?>

                                </select>
                            </div>


                            <div class="formgroup">
                                <label class="control-label">Message</label>
                                <textarea name="messages"  cols="30" rows="3" class="form-control compose_sms" maxlength="170"></textarea>
                            </div>

                            <br>
                            <div class="form-group">
                                <div class="pull-right">
                                    <button class="btn btn-success" type="submit">
                                        Send
                                    </button>
                                </div>
                                <div>
                                   <a href="<?= base_url('subjectssettings')?>" class="btn btn-default">Cancel</a>
                                </div>
                            </div>
                        </form>
                </div>
            </div>
        </div>

    </div>

</div>
