<?php defined('BASEPATH') OR exit('Not found'); ?>

<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
         <div class="content">
           <?php
           if(!empty($agreements)){

            foreach ($agreements as $agreement) {
              ?>
              <div class="row">
               <div class="col-md-6">
                <div class="title">
                  <h2><?php echo $e_company_name;?></h2>
                  <p><?php echo $e_city;?>, <?php echo $e_country;?></p>
                  <p><?php echo $e_address;?></p>
                  <p><?php echo $e_phone;?></p>
                </div>

                <h3><?=$this->lang->line('vehicle_details');?></h3>
                <table class="table">
                  <tbody>
                    <tr>
                      <td><?=$this->lang->line('license_plate');?></td> <td><?php echo $agreement['license_plate'];?></td>
                    </tr>
                    <tr>
                      <td><?=$this->lang->line('make');?></td> <td><?php echo $agreement['make'];?></td>
                    </tr>
                    <tr>
                      <td><?=$this->lang->line('model');?></td> <td><?php echo $agreement['model'];?></td>
                    </tr>
                    <tr>
                      <td><?=$this->lang->line('year');?></td> <td><?php echo $agreement['year'];?></td>
                    </tr>
                    <tr>
                      <td><?=$this->lang->line('color');?></td> <td><?php echo $agreement['color'];?></td>
                    </tr>
                    <tr>
                      <td><?=$this->lang->line('class');?></td> <td><?php echo $agreement['class'];?></td>
                    </tr>
                    <tr>
                      <td><?=$this->lang->line('transmission');?></td> <td><?php echo $agreement['transmission'];?></td>
                    </tr>
                    <tr>
                      <td><?=$this->lang->line('engine');?></td> <td><?php echo $agreement['engine'];?></td>
                    </tr>
                    <tr>
                      <td><?=$this->lang->line('fuel_type');?></td> <td><?php echo $agreement['fuel_type'];?></td>
                    </tr>

                  </tbody>
                </table>
              </div>

              <div class="col-md-6">
                <h3><?=$this->lang->line('rental_agreement');?></h3>
                <table class="table">
                  <tbody>

                   <tr>
                    <td>Invoices ID</td> <td>#<?php echo $agreement['invoices_id'];?></td>
                  </tr>
                  <tr>
                    <td>Invoices Status</td> <td><?php
                    if($agreement['status'] == 0){
                      echo $this->lang->line('unpaid');
                    }elseif($agreement['status'] == 1){
                      echo $this->lang->line('paid');
                    }else{
                      echo $this->lang->line('void');
                    }

                    ?></td>
                  </tr>
                  <tr>
                    <td><?=$this->lang->line('start_date');?></td> <td><?php echo $agreement['date_from'];?></td>
                  </tr>
                  <tr>
                    <td><?=$this->lang->line('end_date');?></td> <td><?php echo $agreement['date_to'];?></td>
                  </tr>
                  <tr>
                    <td><?=$this->lang->line('branch');?></td> <td><?php echo $agreement['branch_id'];?></td>
                  </tr>
                  <tr>
                    <td><?=$this->lang->line('agreement_date');?></td> <td><?php echo $agreement['agreement_date'];?></td>
                  </tr>

                  <tr>
                    <td><?=$this->lang->line('fuel');?></td> <td><?php echo $agreement['fuel'];?></td>
                  </tr>
                  <tr>
                    <td><?=$this->lang->line('odometer');?></td> <td><?php echo $agreement['odometer'];?></td>
                  </tr>
                  <tr>
                    <td><?=$this->lang->line('monthly');?></td> <td><?php echo $agreement['monthly_desc'];?></td>
                  </tr>
                  <tr>
                    <td><?=$this->lang->line('weekly');?></td> <td><?php echo $agreement['weekly_desc'];?></td>
                  </tr>
                  <tr>
                    <td><?=$this->lang->line('daily');?></td> <td><?php echo $agreement['daily_desc'];?></td>
                  </tr>
                  <tr>
                    <td><?=$this->lang->line('deposit_method');?></td> <td><?php echo $agreement['deposit_method'];?></td>
                  </tr>
                  <tr>
                    <td><?=$this->lang->line('deposit_amount');?></td> <td><?php echo $agreement['deposit_amount'];?></td>
                  </tr>
                  <tr>
                    <td><?=$this->lang->line('subtotal');?></td> <td><?php echo $agreement['subtotal'];?> <?php echo $currency;?></td>
                  </tr>
                  <tr>
                    <td><?=$this->lang->line('tax');?></td> <td><?php echo $agreement['tax'];?> %</td>
                  </tr>
                  <tr>
                    <td><?=$this->lang->line('total');?></td> <td><?php echo $agreement['total'];?> <?php echo $currency;?></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">
              <h3><?=$this->lang->line('renter_details');?></h3>
              <table class="table">
                <tbody>
                  <tr>
                    <td><?=$this->lang->line('company_name');?></td> <td><?php echo $agreement['company_name'];?></td>
                  </tr>
                  <tr>
                    <td><?=$this->lang->line('first_name');?></td> <td><?php echo $agreement['first_name'];?></td>
                  </tr>
                  <tr>
                    <td><?=$this->lang->line('last_name');?></td> <td><?php echo $agreement['last_name'];?></td>
                  </tr>
                  <tr>
                    <td><?=$this->lang->line('passport_id');?></td> <td><?php echo $agreement['passport_id'];?></td>
                  </tr>
                  <tr>
                    <td><?=$this->lang->line('birth_date');?></td> <td><?php echo $agreement['birth_date'];?></td>
                  </tr>
                  <tr>
                    <td><?=$this->lang->line('place_of_birth');?></td> <td><?php echo $agreement['place_of_birth'];?></td>
                  </tr>
                  <tr>
                    <td><?=$this->lang->line('home_address');?></td> <td><?php echo $agreement['home_address'];?></td>
                  </tr>
                  <tr>
                    <td><?=$this->lang->line('city');?></td> <td><?php echo $agreement['city'];?></td>
                  </tr>
                  <tr>
                    <td><?=$this->lang->line('country');?></td> <td><?php echo $agreement['country'];?></td>
                  </tr>
                  <tr>
                    <td><?=$this->lang->line('home_phone');?></td> <td><?php echo $agreement['home_phone'];?></td>
                  </tr>
                  <tr>
                    <td><?=$this->lang->line('work_phone');?></td> <td><?php echo $agreement['work_phone'];?></td>
                  </tr>
                  <tr>
                    <td><?=$this->lang->line('local_phone');?></td> <td><?php echo $agreement['local_phone'];?></td>
                  </tr>
                  <tr>
                    <td><?=$this->lang->line('cell_phone');?></td> <td><?php echo $agreement['cell_phone'];?></td>
                  </tr>
                  <tr>
                    <td><?=$this->lang->line('e_mail');?></td> <td><?php echo $agreement['e_mail'];?></td>
                  </tr>

                </tbody>
              </table>
            </div>
            <div class="col-md-6">
              <h3><?=$this->lang->line('main_driver_details');?></h3>
              <table class="table">
                <tbody>
                  <tr>
                    <td><?=$this->lang->line('driving_license');?></td> <td><?php echo $agreement['driving_license'];?></td>
                  </tr>
                  <tr>
                    <td><?=$this->lang->line('license_category');?></td> <td><?php echo $agreement['license_category'];?></td>
                  </tr>
                  <tr>
                    <td><?=$this->lang->line('license_exp_d');?></td> <td><?php echo $agreement['license_exp'];?></td>
                  </tr>
                  <tr>
                    <td><?=$this->lang->line('first_name');?></td> <td><?php echo $agreement['driver_first_name'];?></td>
                  </tr>
                  <tr>
                    <td><?=$this->lang->line('last_name');?></td> <td><?php echo $agreement['driver_last_name'];?></td>
                  </tr>

                </tbody>
              </table>
            </div>
          </div>



          <?php
        }
      }

      ?>

    </div>
  </div>
</div>
</div>
</div>
</div>
