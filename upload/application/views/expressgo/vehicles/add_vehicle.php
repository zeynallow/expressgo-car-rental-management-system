<?php defined('BASEPATH') OR exit('Not found'); ?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title"><?=$this->lang->line('add_vehicle');?></h4>
                    </div>
                    <div class="content">
                        <?php echo form_open_multipart('vehicles/add'); ?>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label><?=$this->lang->line('license_plate');?></label>
                                    <input type="text" value="<?php echo $form_contents['license_plate'];?>" name="license_plate" class="form-control border-input">
                                    <?php echo form_error('license_plate', '<div class="alert alert-danger contact-warning">', '</div>'); ?>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label><?=$this->lang->line('vin');?></label>
                                    <input type="text" value="<?php echo $form_contents['vin'];?>" name="vin" class="form-control border-input" >
                                    <?php echo form_error('vin', '<div class="alert alert-danger contact-warning">', '</div>'); ?>
                                </div>
                            </div>
                            <div class="col-md-3">
                             <div class="form-group">
                                <label><?=$this->lang->line('make');?></label>
                                <input type="text" value="<?php echo $form_contents['make'];?>" name="make" class="form-control border-input">
                                <?php echo form_error('make', '<div class="alert alert-danger contact-warning">', '</div>'); ?>
                            </div>
                        </div>
                        <div class="col-md-3">
                         <div class="form-group">
                            <label><?=$this->lang->line('model');?></label>
                            <input type="text" value="<?php echo $form_contents['model'];?>" name="model" class="form-control border-input">
                            <?php echo form_error('model', '<div class="alert alert-danger contact-warning">', '</div>'); ?>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label><?=$this->lang->line('year');?></label>
                            <input type="text" value="<?php echo $form_contents['year'];?>" name="year" class="form-control border-input">
                            <?php echo form_error('year', '<div class="alert alert-danger contact-warning">', '</div>'); ?>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label><?=$this->lang->line('color');?></label>
                            <input type="text" value="<?php echo $form_contents['color'];?>" name="color" class="form-control border-input">
                            <?php echo form_error('color', '<div class="alert alert-danger contact-warning">', '</div>'); ?>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                           <label><?=$this->lang->line('class');?></label>
                           <select name="class" class="form-control border-input">
                             <?php
                             if(!empty($vehicle_class)){
                                foreach($vehicle_class as $_vehicle_class){
                                    ?>

                                    <option value="<?=$_vehicle_class['name'];?>"><?=$_vehicle_class['name'];?></option>
                                    <?php } }?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                           <div class="form-group">
                               <label><?=$this->lang->line('transmission');?></label>
                               <select name="transmission" class="form-control border-input">
                                <option>Automotic</option>
                                <option>Manual</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                       <div class="form-group">
                           <label><?=$this->lang->line('engine');?></label>
                           <input value="<?php echo $form_contents['engine'];?>" name="engine" type="text" class="form-control border-input">
                       </div>
                   </div>
                   <div class="col-md-4">
                       <div class="form-group">
                           <label><?=$this->lang->line('fuel_type');?></label>
                           <select name="fuel_type" class="form-control border-input">
                            <option>Gasoline</option>
                            <option>Diesel</option>
                            <option>Gas</option>
                            <option>Electirc</option>
                            <option>Hybrid</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                 <div class="form-group">
                    <label><?=$this->lang->line('branch');?></label>
                    <select name="branch_id" class="form-control border-input">
                        <?php
                        if(!empty($branch)){
                            foreach($branch as $_branch){
                                ?>

                                <option value="<?=$_branch['id'];?>"><?=$_branch['name'];?></option>
                                <?php } }?>
                            </select>
                        </div>
                    </div>
                </div>
                
                <hr/>
                <h5 class="title"><?=$this->lang->line('rates');?></h5>
                <div class="clearfix"></div>
                
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label><?=$this->lang->line('1day');?> - <?=$currency;?></label>
                            <input value="<?php echo $form_contents['1day'];?>" name="1day" type="text" class="form-control border-input">
                            <?php echo form_error('1day', '<div class="alert alert-danger contact-warning">', '</div>'); ?>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label><?=$this->lang->line('weekly');?>  - <?=$currency;?></label>
                            <input value="<?php echo $form_contents['weekly'];?>" name="weekly" type="text" class="form-control border-input">
                            <?php echo form_error('weekly', '<div class="alert alert-danger contact-warning">', '</div>'); ?>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label><?=$this->lang->line('monthly');?>  - <?=$currency;?></label>
                            <input value="<?php echo $form_contents['monthly'];?>" name="monthly" type="text" class="form-control border-input">
                            <?php echo form_error('monthly', '<div class="alert alert-danger contact-warning">', '</div>'); ?>
                        </div>
                    </div>
                </div>


                <div class="text-center">
                    <button type="submit" name="confirm" class="btn btn-info btn-fill btn-wd"><?=$this->lang->line('confirm');?></button>
                </div>
                <div class="clearfix"></div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>


</div>
</div>
</div>
