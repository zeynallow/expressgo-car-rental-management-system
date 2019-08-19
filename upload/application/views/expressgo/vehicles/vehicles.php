<?php defined('BASEPATH') OR exit('Not found'); ?>

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title"><?=$this->lang->line('vehicles');?></h4>
                            </div>
                            <div class="content">
                                

                            <div class="content table-responsive table-full-width">
                                <table class="table table-striped" id="bootstrap-table">
                                    <thead>
                                        <tr>
                                        <th>#</th>
                                        <th><?=$this->lang->line('license_plate');?></th>
                                        <th><?=$this->lang->line('make_model');?></th>
                                        <th><?=$this->lang->line('year');?></th>
                                        <th><?=$this->lang->line('color');?></th>
                                        <th><?=$this->lang->line('operation');?></th>
                                    </tr>
                                </thead>
                                    <tbody>
                                          <?php
                                if(!empty($vehicles)){
                                foreach($vehicles as $vehicle){
                            ?>
                                        <tr>
                                            <td><?php echo $vehicle['id']; ?></td>
                                            <td><?php echo $vehicle['license_plate']; ?></td>
                                            <td><?php echo $vehicle['make']; ?> <?php echo $vehicle['model']; ?> </td>
                                            <td><?php echo $vehicle['year']; ?></td>
                                            <td><?php echo $vehicle['color']; ?></td>
                                            <td>
                                                <a href="<?php echo site_url('vehicles/view/'.$vehicle['id'].''); ?>"><btn class="btn btn-sm btn-success btn-icon"><i class="fa fa-user"></i></btn></a>
                                                <a href="<?php echo site_url('vehicles/edit/'.$vehicle['id'].''); ?>"><btn class="btn btn-sm btn-info btn-icon"><i class="fa fa-edit"></i></btn></a>
                                                <btn class="btn btn-sm btn-danger btn-icon" onclick="expressGo.showSwal('delete','<?=site_url('vehicles/delete/'.$vehicle['id'].'');?>')"><i class="fa fa-remove"></i></btn>
                                            </td>
                                        </tr>
                            <?php }} ?>
                                    </tbody>
                                </table>
                        </div>

                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
