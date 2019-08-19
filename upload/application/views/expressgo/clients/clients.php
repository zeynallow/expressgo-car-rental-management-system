<?php defined('BASEPATH') OR exit('Not found'); ?>

         <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title"><?=$this->lang->line('clients');?></h4>
                            </div>
                            <div class="content">
                              

                            <div class="content table-responsive table-full-width">
                                <table class="table table-striped" id="bootstrap-table">
                                    <thead>
                                        <tr>
                                        <th>#</th>
                                        <th><?=$this->lang->line('company_name');?></th>
                                        <th><?=$this->lang->line('last_name');?> / <?=$this->lang->line('first_name');?></th>
                                        <th><?=$this->lang->line('birth_date');?></th>
                                        <th><?=$this->lang->line('operation');?></th>
                                    </tr>
                                </thead>
                                    <tbody>

                          <?php
                                if(!empty($clients)){
                                foreach($clients as $client){
                            ?>
                                        <tr>
                                            <td><?php echo $client['id']; ?></td>
                                            <td><?php echo $client['company_name']; ?></td>
                                            <td><?php echo $client['first_name']; ?> <?php echo $client['last_name']; ?> </td>
                                            <td><?php echo $client['birth_date']; ?></td>
                                            <td>
                                                <a href="<?php echo site_url('clients/view/'.$client['id'].''); ?>"><btn class="btn btn-sm btn-success btn-icon"><i class="fa fa-user"></i></btn></a>
                                                <a href="<?php echo site_url('clients/edit/'.$client['id'].''); ?>"><btn class="btn btn-sm btn-info btn-icon"><i class="fa fa-edit"></i></btn></a>
                                                <btn class="btn btn-sm btn-danger btn-icon" onclick="expressGo.showSwal('delete','<?=site_url('clients/delete/'.$client['id'].'');?>')"><i class="fa fa-remove"></i></btn>
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
