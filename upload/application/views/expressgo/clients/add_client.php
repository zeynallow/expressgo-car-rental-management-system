<?php defined('BASEPATH') OR exit('Not found'); ?>


<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title"><?=$this->lang->line('add_clients');?></h4>
                    </div>
                    <div class="content">

                        <?php echo form_open_multipart('clients/add'); ?>
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                   <div>
                                    <label><?=$this->lang->line('company_name');?></label>
                                    <input type="text" name="company_name" value="<?php echo $form_contents['company_name'];?>" class="form-control border-input" >
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <div>
                                    <label><?=$this->lang->line('first_name');?></label>
                                    <input type="text" name="first_name" value="<?php echo $form_contents['first_name'];?>" class="form-control border-input">
                                    <?php echo form_error('first_name', '<div class="alert alert-danger contact-warning">', '</div>'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                         <div class="form-group">
                            <div>
                                <label><?=$this->lang->line('last_name');?></label>
                                <input type="text" name="last_name"  value="<?php echo $form_contents['last_name'];?>" class="form-control border-input">
                               
                                <?php echo form_error('last_name', '<div class="alert alert-danger contact-warning">', '</div>'); ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <div>
                                <label><?=$this->lang->line('passport_id');?></label>
                                <input type="text" name="passport_id" value="<?php echo $form_contents['passport_id'];?>" class="form-control border-input">
                                <?php echo form_error('passport_id', '<div class="alert alert-danger contact-warning">', '</div>'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <div>
                                <label><?=$this->lang->line('birth_date');?></label>
                                <input type="date" name="birth_date" value="<?php echo $form_contents['birth_date'];?>" class="form-control border-input">
                                <?php echo form_error('birth_date', '<div class="alert alert-danger contact-warning">', '</div>'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label><?=$this->lang->line('place_of_birth');?></label>
                            <input type="text" name="place_of_birth" value="<?php echo $form_contents['place_of_birth'];?>" class="form-control border-input">

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label><?=$this->lang->line('home_address');?></label>
                            <input type="text" name="home_address" value="<?php echo $form_contents['home_address'];?>" class="form-control border-input">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label><?=$this->lang->line('city');?></label>
                            <input type="text" name="city" value="<?php echo $form_contents['city'];?>" class="form-control border-input">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label><?=$this->lang->line('country');?></label>
                            <input type="text" name="country" class="form-control border-input" value="<?php echo $form_contents['country'];?>"/>

                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label><?=$this->lang->line('postal_code');?></label>
                            <input type="text" name="postal_code" value="<?php echo $form_contents['postal_code'];?>" class="form-control border-input">
                        </div>
                    </div>
                </div>

              
                <h5 class="title"><?=$this->lang->line('contact_info');?></h5>
                <div class="clearfix"></div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label><?=$this->lang->line('home_phone');?></label>
                            <input type="text" name="home_phone" value="<?php echo $form_contents['home_phone'];?>" class="form-control border-input">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label><?=$this->lang->line('work_phone');?></label>
                            <input type="text" name="work_phone" value="<?php echo $form_contents['work_phone'];?>" class="form-control border-input">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label><?=$this->lang->line('local_phone');?></label>
                            <input type="text" name="local_phone" value="<?php echo $form_contents['local_phone'];?>" class="form-control border-input">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <div>
                                <label><?=$this->lang->line('cell_phone');?></label>
                                <input type="text" name="cell_phone" value="<?php echo $form_contents['cell_phone'];?>" class="form-control border-input">
                                <?php echo form_error('cell_phone', '<div class="alert alert-danger contact-warning">', '</div>'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label><?=$this->lang->line('e_mail');?></label>
                            <input type="text" name="e_mail" value="<?php echo $form_contents['e_mail'];?>" class="form-control border-input">
                        </div>
                    </div>
                </div>

                <hr/>
                <h5 class="title"><?=$this->lang->line('drivers_details');?></h5>
                <div class="clearfix"></div>

                <div id="drivers">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label><?=$this->lang->line('driving_license');?></label>
                                <input type="text" name="driving_license" value="<?php echo $form_contents['driving_license'];?>" class="form-control border-input">
                                <?php echo form_error('driving_license', '<div class="alert alert-danger contact-warning">', '</div>'); ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label><?=$this->lang->line('license_category');?></label>
                                <input type="text" name="license_category" value="<?php echo $form_contents['license_category'];?>" class="form-control border-input">
                                <?php echo form_error('license_category', '<div class="alert alert-danger contact-warning">', '</div>'); ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label><?=$this->lang->line('license_exp_d');?></label>
                                <input type="date" name="license_exp_d" value="<?php echo $form_contents['license_exp_d'];?>" class="form-control border-input">
                                <?php echo form_error('license_exp_d', '<div class="alert alert-danger contact-warning">', '</div>'); ?>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><?=$this->lang->line('first_name');?></label>
                                <input type="text" name="driver_firstname" value="<?php echo $form_contents['driver_firstname'];?>" class="form-control border-input">
                                <?php echo form_error('driver_firstname', '<div class="alert alert-danger contact-warning">', '</div>'); ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                         <div class="form-group">
                            <label><?=$this->lang->line('last_name');?></label>
                            <input type="text"  name="driver_lastname" value="<?php echo $form_contents['driver_lastname'];?>" class="form-control border-input">
                            <?php echo form_error('driver_lastname', '<div class="alert alert-danger contact-warning">', '</div>'); ?>
                        </div>
                    </div>

                </div>
            </div>

        <hr/>
                <h5 class="title"><?=$this->lang->line('optional_information');?></h5>
                <div class="clearfix"></div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label><?=$this->lang->line('flight_number');?></label>
                                <input type="text" name="flight_number" value="<?php echo $form_contents['flight_number'];?>" class="form-control border-input">
                               
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label><?=$this->lang->line('pickup');?></label>
                                <input type="text" name="pickup" value="<?php echo $form_contents['pickup'];?>" class="form-control border-input">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label><?=$this->lang->line('dropoff');?></label>
                                <input type="text" name="dropoff" value="<?php echo $form_contents['dropoff'];?>" class="form-control border-input">
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