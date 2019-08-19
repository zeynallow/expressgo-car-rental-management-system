<?php defined('BASEPATH') OR exit('Not found'); ?>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title"><?=$this->lang->line('change_password');?></h4>
                    </div>
                    <div class="content">
                        <span><?=$alert;?></span>
                        <?php echo form_open('/profile'); ?>
                       
                <div class="row">
                    <div class="col-md-12">
                                <div class="form-group">
                                   <div>
                                    <label>Login</label>
                                    <input type="text" value="admin" class="form-control border-input" disabled="disabled">
                                </div>
                            </div>
                        </div>
                    </div>
                       <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                   <div>
                                    <label><?=$this->lang->line('new_password');?></label>
                                    <input type="password" name="new_password" value="" class="form-control border-input" placeholder="">
                                </div>
                            </div>
                        </div>
                         <div class="col-md-6">
                                <div class="form-group">
                                   <div>
                                    <label><?=$this->lang->line('confirm_password');?></label>
                                    <input type="password" name="confirm_password" value="" class="form-control border-input" placeholder="">
                                </div>
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

     
</div>
 




