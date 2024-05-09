<div class="row">
    <div class="container">
        <table class="table table-bordered table-responsive">
            <tr>
                <th style="width: 250px;">
                    প্রতিষ্ঠানের তথ্য
                </th>
                <th>
                    প্রতিষ্ঠানের যোগাযোগ
                </th>
                <th>
                   প্রতিষ্ঠানের ওয়েবসাইট ঠিকানা 
                </th>
                <th>
                    এ্যাকশন
                </th>
            </tr>
            <?php foreach($institutes as $ins) : ?>
            <?php //owndebugger($ins); ?>
            <tr>
                <th style="width: 250px;">
                    <small>
                        নামঃ <?php echo $ins->institute_name; ?>
                        <br/>
                        ঠিকানাঃ <?php echo $ins->institute_address; ?>
                        <br/>
                        প্রধানঃ <?php echo $ins->institute_admin; ?>
                        <br/>
                        ইআইআইএন নম্বরঃ <?php echo $ins->institute_eiin; ?>
                    </small>
                </th>
                <th>
                    <small>
                        ফোনঃ <?php echo $ins->institute_phone; ?>
                        <br/>
                        ইমেইলঃ <?php echo $ins->institute_email; ?>
                        <br/>
                         <?php echo (!empty($ins->alternative_no) ? "বিকল্প ফোনঃ" . $ins->alternative_no : null); ?>
                    </small>
                </th>
                <th>
                    <small><a href="<?php echo $ins->institute_website; ?>" target="_blank"><?php echo $ins->institute_website; ?></a></small>
                </th>
                <th>
                    <a href="<?php echo base_url('edit_institute/' . $ins->id); ?>" class="btn btn-primary">
                        <i class="fa fa-edit"></i>
                    </a>
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#mySMSModal_<?php echo $ins->id; ?>"><i class="fa fa-comment"></i></button>
                    
                    <div class="modal fade" id="mySMSModal_<?php echo $ins->id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <form action="<?php echo base_url('send_message_to_admin'); ?>" method="post">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="myModalLabel">Send Short Message to Institute Head</h4>
                                    </div>
                                    <div class="modal-body">
                                        Type your message and hit Send button down below
                                        <br/>
                                        <div class="form-group">
                                            <label>To:</label>
                                            <input class="form-control" type="text" readonly="readonly" value="<?php echo $ins->institute_phone; ?>" name="receiver" />
                                        </div>
                                        <div class="form-group">
                                            <label>Message:</label>
                                            <textarea class="form-control" max-length="155" name="message"></textarea>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <input type="submit" class="btn btn-primary" value="Send" />
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myEmailModal_<?php echo $ins->id; ?>"><i class="fa fa-envelope"></i></button>
                    
                    <div class="modal fade" id="myEmailModal_<?php echo $ins->id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <form action="<?php echo base_url('send_email_to_admin'); ?>" method="post">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="myModalLabel">Send Short Message to Institute Head</h4>
                                    </div>
                                    <div class="modal-body">
                                        Type your email message and hit Send button down below
                                        <br/>
                                        <div class="form-group">
                                            <label>To:</label>
                                            <input class="form-control" type="text" readonly="readonly" value="<?php echo $ins->institute_email; ?>" name="receiver" />
                                        </div>
                                        <div class="form-group">
                                            <label>Subject:</label>
                                            <input class="form-control" type="text" value="Message from Upazilla Secondary Education Office" name="subject" />
                                        </div>
                                        <div class="form-group">
                                            <label>Message:</label>
                                            <textarea id="wysiwyg" class="form-control" max-length="1000" name="message" rows="10"></textarea>
                                        </div>
                                        
                                    </div>
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <input type="submit" class="btn btn-primary" value="Send" />
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </th>
            </tr>
            <?php endforeach; ?>
            
        </table>
    </div>
</div>