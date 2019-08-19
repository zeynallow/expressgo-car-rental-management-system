<?php defined('BASEPATH') OR exit('Not found'); ?>

<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
         <?php
         if(!empty($clients)){
          foreach($clients as $client){
            ?>
            <div class="header">
              <h4 class="title"><?=$this->lang->line('client');?> - #<?php echo $client['id']; ?></h4>
            </div>
            <div class="content">

             <table class="table">

              <tr>
                <td><?=$this->lang->line('company_name');?></td><td><?php echo $client['company_name']; ?></td>
              </tr>
              <tr>
                <td><?=$this->lang->line('first_name');?></td><td><?php echo $client['first_name']; ?></td>
              </tr>
              <tr>
                <td><?=$this->lang->line('last_name');?></td><td><?php echo $client['last_name']; ?></td>
              </tr>
              <tr>
                <td><?=$this->lang->line('passport_id');?></td><td><?php echo $client['passport_id']; ?></td>
              </tr>
              <tr>
                <td><?=$this->lang->line('birth_date');?></td><td><?php echo $client['birth_date']; ?></td>
              </tr>
              <tr>
                <td><?=$this->lang->line('place_of_birth');?></td><td><?php echo $client['place_of_birth']; ?></td>
              </tr>
              <tr>
                <td><?=$this->lang->line('home_address');?></td><td><?php echo $client['home_address']; ?></td>
              </tr>
              <tr>
                <td><?=$this->lang->line('city');?></td><td><?php echo $client['city']; ?></td>
              </tr>
              <tr>
                <td><?=$this->lang->line('country');?></td><td><?php echo $client['country']; ?></td>
              </tr>
              <tr>
                <td><?=$this->lang->line('postal_code');?></td><td><?php echo $client['postal_code']; ?></td>
              </tr>

              <tr>
                <td><?=$this->lang->line('home_phone');?></td><td><?php echo $client['home_phone']; ?></td>
              </tr>
              <tr>
                <td><?=$this->lang->line('work_phone');?></td><td><?php echo $client['work_phone']; ?></td>
              </tr>
              <tr>
                <td><?=$this->lang->line('local_phone');?></td><td><?php echo $client['local_phone']; ?></td>
              </tr>
              <tr>
                <td><?=$this->lang->line('cell_phone');?></td><td><?php echo $client['cell_phone']; ?></td>
              </tr>
              <tr>
                <td><?=$this->lang->line('e_mail');?></td><td><?php echo $client['e_mail']; ?></td>
              </tr>
            <h2><?=$this->lang->line('optional_information');?></h2>
              <tr>
                <td><?=$this->lang->line('flight_number');?></td><td><?php echo $client['flight_number']; ?></td>
              </tr>
              <tr>
                <td><?=$this->lang->line('pickup');?></td><td><?php echo $client['pickup']; ?></td>
              </tr>
              <tr>
                <td><?=$this->lang->line('dropoff');?></td><td><?php echo $client['dropoff']; ?></td>
              </tr>
            </table> 
            <?php }} ?>

            <div class="row">
              <div class="col-md-12">
                <label><?=$this->lang->line('drivers_details');?></label>
                <table class="table">
                 <?php
                 if(!empty($drivers)){
                  foreach($drivers as $driver){
                    ?>
                    <tr>
                      <td><?=$this->lang->line('first_name');?></td><td><?php echo $driver['first_name']; ?></td>
                    </tr>
                    <tr>
                      <td><?=$this->lang->line('last_name');?></td><td><?php echo $driver['last_name']; ?></td>
                    </tr>
                    <tr>
                      <td><?=$this->lang->line('driving_license');?></td><td><?php echo $driver['driving_license']; ?></td>
                    </tr>
                    <tr>
                      <td><?=$this->lang->line('license_category');?></td><td><?php echo $driver['license_category']; ?></td>
                    </tr>
                    <tr>
                      <td><?=$this->lang->line('license_exp_d');?></td><td><?php echo $driver['license_exp']; ?></td>
                    </tr>
                  </table>
                  <?php } } ?>
                </div>
              </div>

            </div>
          </div>
        </div>


      </div>
    </div>
  </div>
