<div class="row">
    <div class="container">
        
        <form action="<?php echo base_url('add_institute_save'); ?>" method="post">
            <div class="panel row">
                <div class="panel-body">

                    <input class="form-control" type="hidden" required="required" value="<?php echo !empty($institute->id) ? $institute->id : 'none'; ?>" name="id" />
                    
                    <div class="form-group">
                        <label>Institute Name:</label>
                        <input class="form-control" type="text" required="required" value="<?php echo !empty($institute->institute_name) ? $institute->institute_name : null; ?>" name="institute_name" />
                    </div>
                    <div class="form-group">
                        <label>Institute Head:</label>
                        <input class="form-control" type="text" required="required" value="<?php echo !empty($institute->institute_admin) ? $institute->institute_admin : null; ?>" name="institute_admin" />
                    </div>
                    
                    <div class="form-group">
                        <label>Institute Address:</label>
                        <input class="form-control" type="text" required="required" value="<?php echo !empty($institute->institute_address) ? $institute->institute_address : null; ?>" name="institute_address" />
                    </div>
                    
                    <div class="form-group">
                        <label>Institute Phone:</label>
                        <input class="form-control" type="text" required="required" value="<?php echo !empty($institute->institute_phone) ? $institute->institute_phone : null; ?>" name="institute_phone" />
                    </div>
                    
                    <div class="form-group">
                        <label>Institute Website:</label>
                        <input class="form-control" type="text" required="required" value="<?php echo !empty($institute->institute_website) ? $institute->institute_website : null; ?>" name="institute_website" />
                    </div>
                    
                    <div class="form-group">
                        <label>Institute Email:</label>
                        <input class="form-control" type="text" required="required" value="<?php echo !empty($institute->institute_email) ? $institute->institute_email : null; ?>" name="institute_email" />
                    </div>
                    
                    <div class="form-group">
                        <label>Institute EIIN:</label>
                        <input class="form-control" type="text" required="required" value="<?php echo !empty($institute->institute_eiin) ? $institute->institute_eiin : null; ?>" name="institute_eiin" />
                    </div>
                    
                    <div class="form-group">
                        <label>Institute Alternative No:</label>
                        <input class="form-control" type="text" value="<?php echo !empty($institute->institute_alternative_no) ? $institute->institute_alternative_no : null; ?>" name="institute_alternative_no" />
                    </div>
                    
                    <div class="form-group">
                        <label>Institute Login User:</label>
                        <input class="form-control" type="text" value="<?php echo !empty($institute->institute_login_user) ? $institute->institute_login_user : null; ?>" name="institute_login_user" />
                    </div>
                    
                    <div class="form-group">
                        <label>Institute Login Password:</label>
                        <input class="form-control" type="text" value="<?php echo !empty($institute->institute_login_password) ? $institute->institute_login_password : null; ?>" name="institute_login_password" />
                    </div>
                    
                    
                    <div class="form-group">
                        <label>Institute Established:</label>
                        <input class="form-control" type="text" value="<?php echo !empty($institute->institute_established) ? $institute->institute_established : null; ?>" name="institute_established" />
                    </div>
                    
                    
                    <div class="form-group">
                        <input class="form-control" type="hidden" required="required" value="1" name="is_active" />
                    </div>
                    
                    
                    
                </div>
                <div class="panel-footer">
                    <input type="submit" class="btn btn-primary" value="Save" />
                </div>
            </div>
        </form>
        
    </div>
</div>