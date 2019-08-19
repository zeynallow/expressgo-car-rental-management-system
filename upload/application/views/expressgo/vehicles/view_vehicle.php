<?php defined('BASEPATH') OR exit('Not found'); ?>
       
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <?php
             if(!empty($vehicles)){
              foreach($vehicles as $vehicle){
                ?>
                    <div class="header">
                        <h4 class="title"><?=$this->lang->line('vehicles');?></h4>
                    </div>

                    <div class="content">
                       <div class="row">
                        <div class="col-lg-4 col-md-5">
                                 <table class="table">
                                    <tbody>
                                    <tr>
                                       <td><?=$this->lang->line('make');?></td> <td><?php echo $vehicle['make']; ?></td>
                                   </tr> 
                                   <tr>
                                       <td><?=$this->lang->line('model');?></td> <td><?php echo $vehicle['model']; ?></td>
                                   </tr> 
                                   <tr>
                                       <td><?=$this->lang->line('license_plate');?></td> <td><?php echo $vehicle['license_plate']; ?></td>
                                   </tr>  
                                   <tr>
                                       <td><?=$this->lang->line('vin');?></td> <td><?php echo $vehicle['vin']; ?></td>
                                   </tr> 
                                   <tr>
                                       <td><?=$this->lang->line('year');?></td> <td><?php echo $vehicle['year']; ?></td>
                                   </tr> 
                                   <tr>
                                       <td><?=$this->lang->line('color');?></td> <td><?php echo $vehicle['color']; ?></td>
                                   </tr> 
                                   <tr>
                                       <td><?=$this->lang->line('class');?></td> <td><?php echo $vehicle['class']; ?></td>
                                   </tr> 
                                   <tr>
                                       <td><?=$this->lang->line('transmission');?></td> <td><?php echo $vehicle['transmission']; ?></td>
                                   </tr> 
                                   <tr>
                                       <td><?=$this->lang->line('engine');?></td> <td><?php echo $vehicle['engine']; ?></td>
                                   </tr> 
                                   <tr>
                                       <td><?=$this->lang->line('fuel_type');?></td> <td><?php echo $vehicle['fuel_type']; ?></td>
                                   </tr> 
                                   <tr>
                                       <td><?=$this->lang->line('branch');?></td> <td><?php echo $this->expressgo->getBranchName($vehicle['branch_id']); ?></td>
                                   </tr> 
                                      </tbody>
                               </table>
                          

                   </div>
                   <div class="col-lg-8 col-md-7">

                      <ul class="nav nav-tabs">
                          <li class="active"><a data-toggle="tab" href="#pricelist"><?=$this->lang->line('price_list');?></a></li>
                          <li><a data-toggle="tab" href="#rentalhistory"><?=$this->lang->line('rental_history');?></a></li>
                      </ul>


                      <div class="tab-content">

                        <div id="pricelist" class="tab-pane fade in active">
                            <h5><?=$this->lang->line('price_list');?></h5>
                             <table class="table">
                                    <tbody>
                                    <tr>
                                       <td><?=$this->lang->line('1day');?></td> <td> <?php echo $vehicle['1day']; ?></td>
                                   </tr>
                                    <tr>
                                       <td><?=$this->lang->line('weekly');?></td> <td> <?php echo $vehicle['weekly']; ?></td>
                                   </tr> 
                                    <tr>
                                       <td><?=$this->lang->line('monthly');?></td> <td> <?php echo $vehicle['monthly']; ?></td>
                                   </tr> 
                               </tbody>
                           </table>
                        </div>


                        <div id="rentalhistory" class="tab-pane fade in">
                            <h5><?=$this->lang->line('rental_history');?></h5>
                           <table class="table">
                                <thead>
                               <tr>
                                <th>AGR #</th><th><?=$this->lang->line('client');?></th><th><?=$this->lang->line('start_date');?></th><th><?=$this->lang->line('end_date');?></th>
                               </tr>
                               </thead>
                               <tbody>
                            <?php 
                            if(!empty($rental_history)){
                              foreach ($rental_history as $history) {
                              ?>
                             
                                <tr>
                                <td><?=$history['id'];?></td><td><a href="<?php echo site_url('clients/view/'.$history['client_id'].''); ?>"><?=$history['first_name'];?> <?=$history['last_name'];?></a></td><td><?=$history['date_from'];?></td><td><?=$history['date_to'];?></td>
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
    <?php }} ?>

</div>
</div>
</div>
