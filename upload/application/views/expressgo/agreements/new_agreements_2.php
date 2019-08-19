<?php defined('BASEPATH') OR exit('Not found'); ?>

       
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title"><?=$this->lang->line('new_agreement');?></h4>
                    </div>
                    <div class="content">
                        <?php echo form_open("/agreement/new/finish");?>
                       <div class="clearfix"></div>
                       <div class="row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label><?=$this->lang->line('company_name');?></label>
                                <input type="text" id="n_agreements_c_name" name="company_name" class="form-control border-input" placeholder="<?=$this->lang->line('company_name');?>">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label><?=$this->lang->line('first_name');?></label>
                                <input type="text" name="first_name" id="n_agreements_f_name" class="form-control border-input" placeholder="<?=$this->lang->line('first_name');?>">
                            </div>
                        </div>
                        <div class="col-md-4">
                           <div class="form-group">
                            <label><?=$this->lang->line('last_name');?></label>
                            <input name="last_name" id="n_agreements_l_name" type="text" class="form-control border-input" placeholder="<?=$this->lang->line('last_name');?>">
                        </div>
                    </div>
                </div>

                <br/>
                <div class="alert alert-success" id="n_agreements_ok" style="display:none;">
                  <strong><?=$this->lang->line('selected_client');?>:</strong> <span id="n_agreements_ok_n"></span>
              </div>
              <div class="row">
                <div class="col-md-12">
                    <ul class="nav nav-tabs">
                     <li class="active"><a data-toggle="tab" href="#drivers_details"><?=$this->lang->line('selected_client');?></a></li>
                     <li><a data-toggle="tab" href="#rental_details"><?=$this->lang->line('rental_details');?></a></li>
                     <li><a data-toggle="tab" href="#rates_calculation"><?=$this->lang->line('rates_calculation');?></a></li>
                     <li><a data-toggle="tab" href="#fuel_milage"><?=$this->lang->line('fuel_milage');?></a></li>
                 </ul>

                 <div class="tab-content">
                    <div id="drivers_details" class="tab-pane fade in active">
                        <h5><?=$this->lang->line('drivers_details');?></h5>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label><?=$this->lang->line('select_drivers');?></label>
                                    <select class="form-control border-input" name="driver_id" id="n_client_drivers">
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="rental_details" class="tab-pane fade">
                        <h5><?=$this->lang->line('rental_details');?></h5>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><?=$this->lang->line('deposit_method');?></label>
                                    <select name="deposit_method" class="form-control border-input">
                                        <option value="cash"><?=$this->lang->line('cash');?></option>
                                        <option value="credit_card"><?=$this->lang->line('credit_card');?></option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><?=$this->lang->line('deposit_amount');?></label>
                                    <input type="text" id="n_deposit" name="deposit" class="form-control border-input">
                                </div>
                            </div>

                        </div>

                    </div>

                    <!--Rates & Calculation-->
                    <div id="rates_calculation" class="tab-pane fade">
                        <h5><?=$this->lang->line('rates_calculation');?></h5>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label><?=$this->lang->line('1day');?></label>
                                    <input type="text" id="n_one_day" name="one_day" value="<?=$r_one_day;?>" class="form-control border-input">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label><?=$this->lang->line('weekly');?></label>
                                    <input type="text" id="n_weekly" name="weekly" value="<?=$r_weekly;?>" class="form-control border-input">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label><?=$this->lang->line('monthly');?></label>
                                    <input type="text" id="n_monthly" name="monthly" value="<?=$r_monthly;?>" class="form-control border-input">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Rates & Calculation //end-->

                    <!--fuel & milage-->
                    <div id="fuel_milage" class="tab-pane fade">
                        <h5><?=$this->lang->line('fuel_milage');?></h5>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><?=$this->lang->line('fuel');?></label>
                                    <input type="text" name="fuel" class="form-control border-input">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><?=$this->lang->line('odometer');?></label>
                                    <input type="text" name="odometer" class="form-control border-input">
                                </div>
                            </div>
                        </div>



                    </div>
                    <!--fuel & milage //end-->


                </div>
            </div>
        </div>


    </div>
</div>
</div>
</div>

        <div class="card">
                    <div class="header">
                        <h4 class="title"><?=$this->lang->line('checkout');?></h4>
                    </div>
                    <div class="content">
        <div class="row"> 
            <div class="col-lg-6 col-lg-offset-3">

                  <table class="table">
                    <tr>
                      <th><?=$this->lang->line('total_days');?> </th><td><?=$total_day;?></td><td></td>
                  </tr>
                   <?=$monthly_rate;?>
                   <?=$weekly_rate;?> 
                   <?=$daily_rate;?>
                  <tr>
                      <th><?=$this->lang->line('subtotal');?> </th><td></td><td><span id="n_subtotal_amount"><?=$subtotal_amount;?></span> <?=$currency;?></td>
                  </tr>
                  <tr>
                      <th><?=$this->lang->line('deposit');?> </th><td></td><td><span id="n_deposit_amount"></span></td>
                  </tr>
                  <tr>
                      <th><?=$this->lang->line('tax');?> </th><td></td><td><span id="n_tax"><?=$tax;?></span> %</td>
                  </tr>
                  <tr>
                      <th><?=$this->lang->line('total');?> </th><td></td><td><span id="n_total_amount"><?=$total_amount;?></span> <?=$currency;?></td>
                  </tr>
                  <tr>
                      <th><?=$this->lang->line('amount_due');?></th><td></td><td><span id="n_amount_due"><?=$total_amount;?></span> <?=$currency;?></td>
                  </tr>
              </table>


      <div class="text-center">
        <?=$rates_value;?>
        <input type="hidden" name="total_day" value="<?=$total_day;?>"/>
        <input type="hidden" name="subtotal" value="<?=$subtotal_amount;?>"/>
        <input type="hidden" name="total" value="<?=$total_amount;?>"/>
        <input type="hidden" name="tax" value="<?=$tax;?>"/>
        <input type="hidden" name="from" value="<?=$from;?>"/>
        <input type="hidden" name="to" value="<?=$to;?>"/>
        <input type="hidden" name="branch_id" value="<?=$branch_id;?>"/>
        <input type="hidden" name="vehicle_id" value="<?=$vehicle_id;?>"/>
        <input type="hidden" name="client_id" id="client_id" value=""/>   
        <button type="submit" name="confirm" onclick="return expressGo.checkAgreement();" class="btn btn-info btn-fill btn-wd"><?=$this->lang->line('confirm');?></button>
    </div>
    <?php echo form_close();?>
    <div class="clearfix"></div>

</div>
</div>
</div>
</div>
</div>
</div>