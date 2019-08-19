<?php

error_reporting(0);
$system_path = '/';
if (($_temp = realpath($system_path)) !== FALSE){
    $system_path = $_temp.DIRECTORY_SEPARATOR;
}else{
    // Ensure there's a trailing slash
    $system_path = strtr(
        rtrim($system_path, '/\\'),
        '/\\',
        DIRECTORY_SEPARATOR.DIRECTORY_SEPARATOR
    ).DIRECTORY_SEPARATOR;
}

// Is the system path correct?
if ( ! is_dir($system_path)){
    header('HTTP/1.1 503 Service Unavailable.', TRUE, 503);
    echo 'Your system folder path does not appear to be set correctly. Please open the following file and correct this: '.pathinfo(__FILE__, PATHINFO_BASENAME);
        exit(3); // EXIT_CONFIG
    }
// Path to the system directory
    define('BASEPATH', $system_path);

    require_once('../application/config/config.php');

    $db_config_path = '../application/config/database.php';
    $_message=NULL; 
    if($_POST) {
        $message=NULL;
        require_once('includes/core_class.php');
        require_once('includes/database_class.php');

        $core = new Core();
        $database = new Database();

        if($core->validate_post($_POST) == true)
        {

            if($database->create_database($_POST) == false) {
                $message = $core->show_message('danger',"The database could not be created, please verify your settings.");
            } else if ($database->create_tables($_POST,'1.1-1.2') == false) {
                $message = $core->show_message('danger',"The database tables could not be created, please verify your settings.");
            } else if ($core->write_config($_POST) == false) {
                $message = $core->show_message('danger',"The database configuration file could not be written, please chmod application/config/database.php file to 777");
            }

            if(!isset($message)) {
                $core->deleteDir('../update');
                $core->deleteDir('../install');
                $_message = $core->show_message('success',"Please Wait...");
                echo '<meta http-equiv="refresh" content="3; url='.$config['base_url'].'index.php/dashboard" />';           
            }

        }
        else {
            $message = $core->show_message('danger','Not all fields have been filled in correctly. The host, username, password, and database name are required.');
        }
    }

    ?>
    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="utf-8" />
        <link rel="icon" type="image/png" sizes="96x96" href="<?php echo $config['base_url'];?>public/assets/img/favicon.png">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

        <title>ExpressGo - Update 1.1 to 1.2</title>

        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
        <meta name="viewport" content="width=device-width" />

        <!-- Bootstrap core CSS     -->
        <link href="<?php echo $config['base_url'];?>public/assets/css/bootstrap.min.css" rel="stylesheet" />
        <link href="<?php echo $config['base_url'];?>public/assets/css/bootstrap-table.css" rel="stylesheet" />

        <!--  Paper Dashboard core CSS    -->
        <link href="<?php echo $config['base_url'];?>public/assets/css/paper-dashboard.css" rel="stylesheet"/>

        <!-- default css-->
        <link href="<?php echo $config['base_url'];?>public/assets/css/expressgo.css" rel="stylesheet" />

        <!--  Fonts and icons     -->
        <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>

    </head>
    <body>

        <div class="wrapper wrapper-full-page">
            <div class="full-page login-page">
                <div class="content">
                    <div class="container">

                        <div class="row">
                            <div class="col-md-12 text-center">
                                <h2>ExpressGo</h2>
                                <span>Car Rental Management Systems v1.2</span>
                            </div>
                        </div>
                        <hr/>
                        <div class="row">
                            <div class="col-md-4 col-sm-6 col-md-offset-4 col-sm-offset-3">
                                <?php if(is_writable($db_config_path)){?>
                                <form id="install_form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                    <div class="card">
                                        <div class="header">
                                            <h3 class="title">Update 1.1 to 1.2</h3>
                                            <span><?php if(isset($message)) {echo '<p class="error">' . $message . '</p>';}?></span>
                                            <?php echo $_message;?>
                                        </div>
                                        <div class="content">
                                            <div class="form-group">
                                                <label>Hostname</label>
                                                <input type="text" name="hostname" value="localhost" placeholder="" class="form-control input-no-border">
                                            </div>
                                            <div class="form-group">
                                                <label>Database Username</label>
                                                <input type="text" name="username" placeholder="" class="form-control input-no-border">
                                            </div>
                                            <div class="form-group">
                                                <label>Database Password</label>
                                                <input type="password" name="password" placeholder="" class="form-control input-no-border">
                                            </div>
                                            <div class="form-group">
                                                <label>Database name</label>
                                                <input type="text" name="database" placeholder="" class="form-control input-no-border">
                                            </div>
                                            <div class="text-center">
                                                <button type="submit" class="btn btn-fill btn-wd ">Update</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <?php } else { 
                                    echo $core->show_message('danger',"Please make the application/config/database.php file writable.
                                      <strong>Example</strong>:<br /><br /><code>chmod 777 application/config/database.php</code>");
                                  } ?>
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
