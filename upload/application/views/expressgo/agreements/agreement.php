<?php defined('BASEPATH') OR exit('Not found'); ?>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title"><?=$this->lang->line('agreements');?></h4>
                    </div>
                    <div class="content">
                       

            <div class="content table-responsive table-full-width">
                <table class="table table-striped" id="bootstrap-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th><?=$this->lang->line('date');?></th>
                            <th><?=$this->lang->line('vehicle');?></th>
                            <th><?=$this->lang->line('first_name');?></th>
                            <th><?=$this->lang->line('last_name');?></th>
                            <th>Status</th>
                            <th><?=$this->lang->line('operation');?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if(!empty($agreements)){
                            foreach ($agreements as $agreement) {
                                ?>

                                <tr>
                                    <td><?=$agreement['agreement_id'];?></td>
                                    <td><?=$agreement['agreement_date'];?></td>
                                    <td><?=$agreement['make'];?> <?=$agreement['model'];?></td>
                                    <td><?=$agreement['first_name'];?></td>
                                    <td><?=$agreement['last_name'];?></td>
                                    <td><?php
                                    if($agreement['status'] == 0){
                                        echo '<label class="label label-danger white">'.$this->lang->line('unpaid').'</label>';
                                    }elseif($agreement['status'] == 1){
                                        echo '<label class="label label-success white">'.$this->lang->line('paid').'</label>';
                                    }else{
                                        echo '<label class="label label-primary white">'.$this->lang->line('void').'</label>';
                                    }
                                    ?></td>
                                    <td>
                                        <a href="<?=site_url('/invoices/'.$agreement['invoice_id'].'');?>">
                                            <btn class="btn btn-sm btn-success btn-icon">View invoice</btn>
                                        </a>
                                        <a href="<?=site_url('/agreement/view/'.$agreement['agreement_id'].'');?>"><btn class="btn btn-sm btn-info btn-icon"><i class="fa fa-eye"></i></btn></a>
                                        <btn onclick="expressGo.showSwal('agreement-delete','<?=site_url('agreement/delete/'.$agreement['agreement_id'].'');?>')" class="btn btn-sm btn-danger btn-icon"><i class="fa fa-remove"></i></btn>
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
