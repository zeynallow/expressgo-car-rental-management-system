<?php defined('BASEPATH') OR exit('Not found'); ?>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="content">
                        <div class="row">
                            <div class="col-xs-5">
                                <div class="icon-big icon-success text-center">
                                    <i class="ti-wallet"></i>
                                </div>
                            </div>
                            <div class="col-xs-7">
                                <div class="numbers">
                                    <p><?=$this->lang->line('vehicle_on_rent');?></p>
                                    <?=$OnRentsCount;?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="content">
                        <div class="row">
                            <div class="col-xs-5">
                                <div class="icon-big icon-danger text-center">
                                    <i class="ti-pulse"></i>
                                </div>
                            </div>
                            <div class="col-xs-7">
                                <div class="numbers">
                                    <p><?=$this->lang->line('vehicle_available');?></p>
                                    <?=$AvailableVehicle;?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title"><?=$this->lang->line('vehicle_on_rent');?></h4>
                    </div>
                    <div class="content">
                      <div class="content table-responsive table-full-width">
                        <table class="table table-striped" id="bootstrap-table">
                            <thead>
                                <tr>

                                    <th><?=$this->lang->line('first_name');?>/<?=$this->lang->line('last_name');?></th>
                                    <th><?=$this->lang->line('cell_phone');?></th>
                                    <th><?=$this->lang->line('start_date');?>/<?=$this->lang->line('end_date');?></th>
                                    <th><?=$this->lang->line('make');?>/<?=$this->lang->line('model');?></th>
                                    <th><?=$this->lang->line('license_plate');?></th>
                                    <th><?=$this->lang->line('operation');?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                if(!empty($onRents)){
                                    foreach ($onRents as $onRent) {
                                          if($onRent['date_to'] < date("Y-m-d H:i:s")){
                                                $expired='<i class="ti-time"></i> '.$this->lang->line('expired').' !';
                                            }else{
                                                $expired=null;
                                            }
                                        ?>

                                        <tr>
                                            <td><?=$onRent['first_name'];?> <?=$onRent['last_name'];?></td>
                                            <td><?=$onRent['cell_phone'];?></td>
                                            <td><?=date("d-m-Y", strtotime($onRent['date_from']));?> / <?=date("d-m-Y", strtotime($onRent['date_to']));?></td>
                                            <td><?=$onRent['make'];?> <?=$onRent['model'];?> </td>
                                            <td><?=$onRent['license_plate'];?></td>
                                            <td> <?=$expired;?>
                                                <btn class="btn btn-sm btn-success btn-icon" onclick="expressGo.showSwal('check_in','<?=site_url('/agreement/'.$onRent['agreement_id'].'/check_in');?>')"><?=$this->lang->line('check_in');?></btn>
                                                <a href="<?=site_url('/invoices/'.$onRent['invoice_id'].'');?>"><btn class="btn btn-sm btn-info btn-icon"><?=$this->lang->line('view_invoice');?></btn></a>
                                            </td>

                                        </tr>
                                        
                                        <?php
                                    }
                                }
                                ?>  

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
</div>