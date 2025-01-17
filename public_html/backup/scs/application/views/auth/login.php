<!DOCTYPE html>
<html lang="en">
    <head>
        <base href="<?php echo base_url(); ?>">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="Rizvi">
        <meta name="keyword" content="Php, Hospital, Clinic, Management, Software, Php, CodeIgniter, Hms, Accounting">
        <link rel="shortcut icon" href="uploads/favicon.png">

        <title>Login - <?php echo $this->db->get('settings')->row()->system_vendor; ?></title>

        <!-- Bootstrap core CSS -->
        <link href="common/css/bootstrap.min.css" rel="stylesheet">
        <link href="common/css/bootstrap-reset.css" rel="stylesheet">
        <!--external css-->
        <link href="common/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        <!-- Custom styles for this template -->
        <link href="common/css/style.css" rel="stylesheet">
        <link href="common/css/style-responsive.css" rel="stylesheet" />

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
        <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script>
        <![endif]-->
    </head>

    <body class="login-body">

        <div class="container">

            <style>


                form{

                    padding: 0px;
                    border: none;


                }


            </style>

            <form class="form-signin" method="post" action="auth/login">
                <h2 class="login form-signin-heading"><?php echo $this->db->get('settings')->row()->title; ?><br/><br/><img alt="" src="uploads/favicon.png"></h2>
                <div id="infoMessage"><?php echo $message; ?></div>
                <div class="login-wrap">
                    <input type="text" class="form-control" name="identity" placeholder="User Email" autofocus>
                    <input type="password" class="form-control" name="password" placeholder="Password">




                    <p><a data-toggle="modal" href="#myModal"> Forgot Password?</a></p>
                    <!--     
                          <label class="checkbox">
                              <input type="checkbox" value="remember-me"> Remember me
                              <span class="pull-right">
                                  <a data-toggle="modal" href="#myModal"> Forgot Password?</a>
              
                              </span>
                          </label> 
                    -->
                    <button class="btn btn-lg btn-login btn-block" type="submit">Sign in</button>



                </div>
            </form>
            <br />
            <div class="col-md-3">&nbsp;</div>
                <div class="col-md-6 login-wrap" style="background: #fff;">
                <h4>Demo User</h4>
                <table class="table">
                    <thead>
                    <tr>
                        <th>Role</th>
                        <th>User Name</th>
                        <th>Password</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>Administrator</td>
                        <td>admin@tritiyo.com</td>
                        <td>12345</td>
                    </tr>
                    <tr>
                        <td>Doctor</td>
                        <td>doctor@tritiyo.com</td>
                        <td>12345</td>
                    </tr>
                    <tr>
                        <td>Nurse</td>
                        <td>nurse@tritiyo.com</td>
                        <td>12345</td>
                    </tr>
                    <tr>
                        <td>Pharmacist</td>
                        <td>pharmacist@tritiyo.com</td>
                        <td>12345</td>
                    </tr>
                    <tr>
                        <td>Accountant</td>
                        <td>accountant@tritiyo.com</td>
                        <td>12345</td>
                    </tr>
                    <tr>
                        <td>Patient</td>
                        <td>patient@tritiyo.com</td>
                        <td>12345</td>
                    </tr>
                    <tr>
                        <td>Laboratorist</td>
                        <td>laboratorist@tritiyo.com</td>
                        <td>12345</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-md-3"></div>

        </div>









        <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form method="post" action="auth/forgot_password">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">Forgot Password ?</h4>
                        </div>

                        <div class="modal-body">
                            <p>Enter your e-mail address below to reset your password.</p>
                            <input type="text" name="email" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix">

                        </div>
                        <div class="modal-footer">
                            <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                            <input class="btn btn-success" type="submit" name="submit" value="submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>



        <!-- js placed at the end of the document so the pages load faster -->
        <script src="common/js/jquery.js"></script>
        <script src="common/js/bootstrap.min.js"></script>


    </body>
</html>
