<?php defined('BASEPATH') OR exit ('Not Found'); ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
    <link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>ExpressGo - Login</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <!-- Bootstrap core CSS     -->
    <link href="<?php echo base_url('public/'); ?>assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?php echo base_url('public/'); ?>assets/css/bootstrap-table.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="<?php echo base_url('public/'); ?>assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Paper Dashboard core CSS    -->
    <link href="<?php echo base_url('public/'); ?>assets/css/paper-dashboard.css" rel="stylesheet"/>
    
    <link href="<?php echo base_url('public/'); ?>assets/autocomplete/easy-autocomplete.min.css" rel="stylesheet"/>
    <link href="<?php echo base_url('public/'); ?>assets/autocomplete/easy-autocomplete.themes.min.css" rel="stylesheet"/>

     <!-- default css-->
    <link href="<?php echo base_url('public/'); ?>assets/css/expressgo.css" rel="stylesheet" />

    <!--  Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
    <link href="<?php echo base_url('public/'); ?>assets/css/themify-icons.css" rel="stylesheet">

</head>
<body>

    <div class="wrapper wrapper-full-page">
        <div class="full-page login-page">
            <div class="content">
                <div class="container">

                    <div class="row">
                        <div class="col-md-12 text-center">
                            <h2>ExpressGo</h2>
                            <span>Car Rental Management Systems</span>
                        </div>
                    </div>
                    <hr/>
                    <div class="row">
                        <div class="col-md-4 col-sm-6 col-md-offset-4 col-sm-offset-3">
                           <?php echo form_open("/login");?>
                                <div class="card">
                                    <div class="header">
                                        <h3 class="title"><?=$this->lang->line('login');?></h3>
                                        <span><?=$alert;?></span>
                                    </div>
                                    <div class="content">
                                        <div class="form-group">
                                            <label><?=$this->lang->line('username');?></label>
                                            <input type="text" name="login" placeholder="" class="form-control input-no-border">
                                        </div>
                                        <div class="form-group">
                                            <label><?=$this->lang->line('password');?></label>
                                            <input type="password" name="password" placeholder="" class="form-control input-no-border">
                                        </div>
                                   
                                    <div class="text-center">
                                        <button type="submit" name="loginF" class="btn btn-fill btn-wd "><?=$this->lang->line('login');?></button>
                                    </div>
                                     </div>
                                </div>
                            <?php echo form_close();?>
                        </div>
                    </div>
                </div>
            </div>

            <footer class="footer footer-transparent">
                <div class="container">
                    <div class="copyright">
                        &copy; <script>document.write(new Date().getFullYear())</script>, made by <a href="http://www.mazzapp.com">mazZapp!</a>
                    </div>
                </div>
            </footer>
        </div>
    </div>
</body>


 

   

</html>
