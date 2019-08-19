<?php defined('BASEPATH') OR exit ('Not Found'); ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" sizes="96x96" href="<?php echo base_url('public/'); ?>assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title><?php echo $title; ?></title>

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
    <link href="<?php echo base_url('public/'); ?>assets/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
    <link href="<?php echo base_url('public/'); ?>assets/css/themify-icons.css" rel="stylesheet">

</head>
<body>

    <div class="wrapper">
        <div class="sidebar" data-active-color="danger">

    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="<?php echo site_url('/'); ?>" class="simple-text">
                ExpressGo
            </a>
            <span>Car Rental Management System</span>
        </div>

        <ul class="nav">
            <li class="<?=($this->uri->segment(1) == "dashboard") ? "active" : "" ?>">
                <a href="<?php echo site_url('/dashboard'); ?>">
                    <i class="ti-panel"></i>
                    <p><?=$this->lang->line('dashboard');?></p>
                </a>
            </li>
            <li class="<?=($this->uri->segment(1) == "clients") ? "active" : "" ?>">
                <a href="<?php echo site_url('/clients'); ?>">
                    <i class="ti-user"></i>
                    <p><?=$this->lang->line('clients');?></p>
                </a>
            </li>
            <li class="<?=($this->uri->segment(1) == "vehicles") ? "active" : "" ?>">
                <a href="<?php echo site_url('/vehicles'); ?>">
                    <i class="ti-car"></i>
                    <p><?=$this->lang->line('vehicles');?></p>
                </a>
            </li>
            <li class="<?=($this->uri->segment(1) == "agreement") ? "active" : "" ?>">
                <a href="<?php echo site_url('/agreement'); ?>">
                    <i class="ti-file"></i>
                    <p><?=$this->lang->line('agreement');?></p>
                </a>
            </li>
            <li class="<?=($this->uri->segment(1) == "reports") ? "active" : "" ?>">
                <a href="<?php echo site_url('/reports'); ?>">
                    <i class="ti-pie-chart"></i>
                    <p><?=$this->lang->line('reports');?></p>
                </a>
            </li>
            <li class="<?=($this->uri->segment(1) == "setup") ? "active" : "" ?>">
                <a href="<?php echo site_url('/setup'); ?>">
                    <i class="ti-settings"></i>
                    <p><?=$this->lang->line('setup');?></p>
                </a>
            </li>
        </ul>
    </div>
</div>

<div class="main-panel">
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar bar1"></span>
                    <span class="icon-bar bar2"></span>
                    <span class="icon-bar bar3"></span>
                </button>
                <a class="navbar-brand" href="#"><?=$this->lang->line('dashboard');?></a>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                   <li>
                     <a href="<?php echo site_url('/clients/add'); ?>"  class="btn btn-info btn-fill btn-wd">
                        <i class="ti-plus"></i> <?=$this->lang->line('add_client');?>
                    </a>
                </li>
                <li>
                 <a href="<?php echo site_url('/vehicles/add'); ?>"  class="btn btn-info btn-fill btn-wd">
                    <i class="ti-plus"></i> <?=$this->lang->line('add_vehicle');?>
                </a>
            </li>
            <li>
             <a href="<?php echo site_url('/agreement/new'); ?>"  class="btn btn-info btn-fill btn-wd">
                <i class="ti-plus"></i> <?=$this->lang->line('new_agreement');?>
            </a>
        </li>
        <li class="dropdown">
            <a href="#administrator" class="dropdown-toggle btn-rotate" data-toggle="dropdown" aria-expanded="false">
                <i class="ti-user"></i>  Administrator
            </a>
            <ul class="dropdown-menu">
                <li><a href="<?php echo site_url('/profile'); ?>"><?=$this->lang->line('profile');?></a></li>
                <li><a href="<?php echo site_url('/logout'); ?>"><?=$this->lang->line('logout');?></a></li>
            </ul>
        </li>
    </ul>

</div>
</div>
</nav>
