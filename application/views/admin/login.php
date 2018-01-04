<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Admin | Log in</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!--Modal forgot password-->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link href="<?= base_url('assets/admin') ?>/css/admin_login.css" rel="stylesheet" type="text/css"/>
        <!-- Bootstrap 3.3.6 -->
        <link rel="stylesheet" href="<?= base_url('assets/admin') ?>/bootstrap/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?= base_url('assets/admin') ?>/dist/css/AdminLTE.min.css">
        <!-- iCheck -->
        <link rel="stylesheet" href="<?= base_url('assets/admin') ?>/plugins/iCheck/square/blue.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="hold-transition login-page">
        <div class="login-box">
            <div class="login-logo">
                <a><img src="<?= base_url('assets') ?>/images/images/logo.png" style="width:50%"></a>
            </div>
            <!-- /.login-logo -->
            <div class="login-box-body">
                <p class="login-box-msg"><strong>Administrator Login</strong></p>
                <?php flash(); ?>
                <form name="admin_login" action="<?php echo site_url('admin/index/login') ?>" method="post" class="forms">
                    <div class="form-group has-feedback">
                        <input type="text" name="username" class="form-control" placeholder="Username">
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        <label for="username" class="error"></label>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="password" name="password" class="form-control" placeholder="Password">
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                        <label for="password" class="error"></label>
                    </div>
                    <div class="row">
                        <div class="col-xs-8">
                            <div class="checkbox icheck">                                                              
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-xs-4">
                            <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

                <!--    <div class="social-auth-links text-center">
                      <p>- OR -</p>
                      <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using
                        Facebook</a>
                      <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using
                        Google+</a>
                    </div>-->
                <!-- /.social-auth-links -->

                <div class="container">                      
                    <a href="" data-toggle="modal" data-target="#myModal">I forgot my password</a>
                    <div class="modal fade" id="myModal" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">×</button>
                                    <h1 class="text-center">What's My Password?</h1>
                                </div>
                                <div class="modal-body">
                                    <div class="col-md-12">
                                        <div class="panel panel-default" style="margin-top: 25px;">
                                            <div class="panel-body">
                                                <div class="text-center">
                                                    <p>If you have forgotten your password you can reset it here.</p>
                                                    <div class="panel-body">
                                                        <fieldset>                                                                           
                                                            <form name="modal_login" action="<?= site_url('mail/forgot_email') ?>" method="post" class="forms">
                                                                <div class="form-group">
                                                                    <input class="form-control input-lg" placeholder="E-mail Address" name="email" type="email">
                                                                </div>
                                                                <input class="btn btn-lg btn-primary btn-block" value="Send My Password" type="submit">
                                                            </form>
                                                        </fieldset>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- /.login-box-body -->
        </div>
        <!-- /.login-box -->     


        <!-- jQuery 2.2.3 -->
        <script src="<?= base_url('assets/admin') ?>/plugins/jQuery/jquery-2.2.3.min.js"></script>
        <!-- Bootstrap 3.3.6 -->
        <script src="<?= base_url('assets/admin') ?>/bootstrap/js/bootstrap.min.js"></script>

        <!--JqyeryValidation-->
        <script type="text/javascript" src="<?= base_url('assets') ?>/admin/bower_components/jquery-validation/dist/jquery.validate.min.js"></script>
        <script type="text/javascript" src="<?= base_url('assets') ?>/js/form-validation.js"></script>
        <!-- iCheck -->
        <script src="<?= base_url('assets/admin') ?>/plugins/iCheck/icheck.min.js"></script>
        <script>
            $(function () {
                $('input').iCheck({
                    checkboxClass: 'icheckbox_square-blue',
                    radioClass: 'iradio_square-blue',
                    increaseArea: '20%' // optional
                });
            });
        </script> 

    </body>
</html>
