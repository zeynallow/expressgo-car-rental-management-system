<?php defined('BASEPATH') OR exit('Not found'); ?>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title"><?=$this->lang->line('setup');?></h4>
                    </div>
                    <div class="content">


                        <ul class="nav nav-tabs">
                          <li class="active"><a data-toggle="tab" href="#main"><?=$this->lang->line('main');?></a></li>
                          <li><a data-toggle="tab" href="#branch"><?=$this->lang->line('branch');?></a></li>
                          <li><a data-toggle="tab" href="#class"><?=$this->lang->line('class');?></a></li>
                      </ul>

                      <div class="tab-content">
                          <div id="main" class="tab-pane fade in active">
                            <h3><?=$this->lang->line('main');?></h3>
                            <?php echo form_open('setup'); ?>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                     <div>
                                        <label><?=$this->lang->line('company_name');?></label>
                                        <input type="text" name="company_name" value="<?=$company_name;?>" class="form-control border-input" placeholder="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                 <div>
                                    <label><?=$this->lang->line('address');?></label>
                                    <input type="text" name="address" value="<?=$address;?>" class="form-control border-input" placeholder="">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                             <div>
                                <label><?=$this->lang->line('country');?></label>
                                <input type="text" name="country" value="<?=$country;?>" class="form-control border-input" placeholder="">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                         <div>
                            <label><?=$this->lang->line('city');?></label>
                            <input type="text" name="city" value="<?=$city;?>" class="form-control border-input" placeholder="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                     <div>
                        <label><?=$this->lang->line('s_language');?></label>
                        <select class="form-control" name="s_language">
                            <option></option>
                            <?php 
                            foreach (glob('application/language/*', GLOB_ONLYDIR) as $lang_dir) {
                                echo '<option value="'.basename($lang_dir).'">'.basename($lang_dir).'</option>';
                            }
                            ?>

                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                 <div>
                    <label><?=$this->lang->line('currency');?></label>
                    <select class="form-control" name="currency">
                        <option></option>
                        <option>AFN</option>
                        <option>EUR</option>
                        <option>ALL</option>
                        <option>DZD</option>
                        <option>USD</option>
                        <option>AOA</option>
                        <option>XCD</option>
                        <option>ARS</option>
                        <option>AMD</option>
                        <option>AWG</option>
                        <option>SHP</option>
                        <option>AUD</option>
                        <option>AZN</option>
                        <option>BSD</option>
                        <option>BHD</option>
                        <option>BDT</option>
                        <option>BBD</option>
                        <option>BYN</option>
                        <option>BZD</option>
                        <option>XOF</option>
                        <option>BMD</option>
                        <option>BTN</option>
                        <option>BOB</option>
                        <option>BAM</option>
                        <option>BWP</option>
                        <option>BRL</option>
                        <option>BND</option>
                        <option>BGN</option>
                        <option>BIF</option>
                        <option>CVE</option>
                        <option>KHR</option>
                        <option>XAF</option>
                        <option>CAD</option>
                        <option>KYD</option>
                        <option>NZD</option>
                        <option>CLP</option>
                        <option>CNY</option>
                        <option>COP</option>
                        <option>KMF</option>
                        <option>CDF</option>
                        <option>CRC</option>
                        <option>HRK</option>
                        <option>CUP</option>
                        <option>ANG</option>
                        <option>CZK</option>
                        <option>DKK</option>
                        <option>DJF</option>
                        <option>DOP</option>
                        <option>EGP</option>
                        <option>ERN</option>
                        <option>ETB</option>
                        <option>FKP</option>
                        <option>FJD</option>
                        <option>XPF</option>
                        <option>GMD</option>
                        <option>GEL</option>
                        <option>GHS</option>
                        <option>GIP</option>
                        <option>GTQ</option>
                        <option>GGP</option>
                        <option>GNF</option>
                        <option>GYD</option>
                        <option>HTG</option>
                        <option>HNL</option>
                        <option>HKD</option>
                        <option>HUF</option>
                        <option>ISK</option>
                        <option>INR</option>
                        <option>IDR</option>
                        <option>XDR</option>
                        <option>IRR</option>
                        <option>IQD</option>
                        <option>IMP</option>
                        <option>ILS</option>
                        <option>JMD</option>
                        <option>JPY</option>
                        <option>JEP</option>
                        <option>JOD</option>
                        <option>KZT</option>
                        <option>KES</option>
                        <option>KWD</option>
                        <option>KGS</option>
                        <option>LAK</option>
                        <option>LBP</option>
                        <option>LSL</option>
                        <option>LRD</option>
                        <option>LYD</option>
                        <option>CHF</option>
                        <option>MOP</option>
                        <option>MKD</option>
                        <option>MGA</option>
                        <option>MWK</option>
                        <option>MYR</option>
                        <option>MVR</option>
                        <option>MRO</option>
                        <option>MUR</option>
                        <option>MXN</option>
                        <option>MDL</option>
                        <option>MNT</option>
                        <option>MAD</option>
                        <option>MZN</option>
                        <option>MMK</option>
                        <option>NAD</option>
                        <option>NPR</option>
                        <option>NIO</option>
                        <option>NGN</option>
                        <option>KPW</option>
                        <option>NOK</option>
                        <option>OMR</option>
                        <option>PKR</option>
                        <option>PGK</option>
                        <option>PYG</option>
                        <option>PEN</option>
                        <option>PHP</option>
                        <option>PLN</option>
                        <option>QAR</option>
                        <option>RON</option>
                        <option>RUB</option>
                        <option>RWF</option>
                        <option>WST</option>
                        <option>STD</option>
                        <option>SAR</option>
                        <option>RSD</option>
                        <option>SCR</option>
                        <option>SLL</option>
                        <option>SGD</option>
                        <option>SBD</option>
                        <option>SOS</option>
                        <option>ZAR</option>
                        <option>GBP</option>
                        <option>KRW</option>
                        <option>SSP</option>
                        <option>LKR</option>
                        <option>SDG</option>
                        <option>SRD</option>
                        <option>SZL</option>
                        <option>SEK</option>
                        <option>SYP</option>
                        <option>TWD</option>
                        <option>TJS</option>
                        <option>TZS</option>
                        <option>THB</option>
                        <option>TOP</option>
                        <option>TTD</option>
                        <option>TND</option>
                        <option>TRY</option>
                        <option>TMT</option>
                        <option>UGX</option>
                        <option>UAH</option>
                        <option>AED</option>
                        <option>UYU</option>
                        <option>UZS</option>
                        <option>VUV</option>
                        <option>VEF</option>
                        <option>VND</option>
                        <option>YER</option>
                        <option>ZMW</option>

                    </select>
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
             <div>
                <label><?=$this->lang->line('phone');?></label>
                <input type="text" name="phone" value="<?=$phone;?>" class="form-control border-input" placeholder="">
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
         <div>
            <label><?=$this->lang->line('tax');?></label>
            <input type="text" name="tax" value="<?=$tax;?>" class="form-control border-input" placeholder="">
        </div>
    </div>
</div>
<div class="col-md-2">
    <div class="form-group">
     <div>
        <label>&nbsp;</label>
        <input type="text" value="%" class="form-control border-input" placeholder="" disabled="">
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

<div id="branch" class="tab-pane fade">
    <h3><?=$this->lang->line('add_branch');?></h3>
    <?php echo form_open('setup/branch/add'); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
             <div>
                <label><?=$this->lang->line('branch_name');?></label>
                <input type="text" name="branch_name" value="" class="form-control border-input" placeholder="">
                <?php echo form_error('branch_name', '<div class="alert alert-danger contact-warning">', '</div>'); ?>
            </div>
        </div>
    </div>

    <div class="text-center">
        <button type="submit" name="confirm" class="btn btn-info btn-fill btn-wd"><?=$this->lang->line('add_branch');?></button>
    </div>

</div>
<?php echo form_close();?>

<hr/>


<div class="row">
    <div class="col-md-12">
     <div class="content table-responsive table-full-width">
        <table class="table table-striped" id="bootstrap-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th><?=$this->lang->line('branch');?></th>
                    <th><?=$this->lang->line('operation');?></th>
                </tr>
            </thead>
            <tbody>
                <?php
                if(!empty($branches)){
                    foreach ($branches as $branch) {
                        ?>

                        <tr>
                            <td><?=$branch['id'];?></td>
                            <td><?=$branch['name'];?></td>
                            <td>

                               <btn class="btn btn-sm btn-info btn-icon"  data-toggle="modal" data-target="#branch_edit_<?=$branch['id'];?>"><i class="fa fa-edit"></i></btn>

                               <btn onclick="expressGo.showSwal('delete-branch','<?=site_url('setup/branch/delete/'.$branch['id'].'');?>')" class="btn btn-sm btn-danger btn-icon"><i class="fa fa-remove"></i></btn>
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
<!--branch end-->
<div id="class" class="tab-pane fade">
    <h3><?=$this->lang->line('class');?></h3>
    <?php echo form_open('setup/vehicle_class/add'); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
             <div>
                <label><?=$this->lang->line('class_name');?></label>
                <input type="text" name="class_name" value="" class="form-control border-input" placeholder="">
                <?php echo form_error('class_name', '<div class="alert alert-danger contact-warning">', '</div>'); ?>
            </div>
        </div>
    </div>

    <div class="text-center">
        <button type="submit" name="confirm" class="btn btn-info btn-fill btn-wd"><?=$this->lang->line('add');?></button>
    </div>

</div>
<hr/>
<?php echo form_close();?>




<div class="row">
    <div class="col-md-12">
     <div class="content table-responsive table-full-width">
        <table class="table table-striped" id="bootstrap-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th><?=$this->lang->line('class');?></th>
                    <th><?=$this->lang->line('operation');?></th>
                </tr>
            </thead>
            <tbody>
                <?php
                if(!empty($vehicle_class)){
                    foreach ($vehicle_class as $_vehicle_class) {
                        ?>

                        <tr>
                            <td><?=$_vehicle_class['id'];?></td>
                            <td><?=$_vehicle_class['name'];?></td>
                            <td>

                               <btn class="btn btn-sm btn-info btn-icon"  data-toggle="modal" data-target="#class_edit_<?=$_vehicle_class['id'];?>"><i class="fa fa-edit"></i></btn>

                               <btn onclick="expressGo.showSwal('delete-class','<?=site_url('setup/vehicle_class/delete/'.$_vehicle_class['id'].'');?>')" class="btn btn-sm btn-danger btn-icon"><i class="fa fa-remove"></i></btn>
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

<!--vehicle class end-->

</div>

</div>
</div>
</div>
</div>






</div>
</div>


</div>
<?php
if(!empty($branches)){
    foreach ($branches as $branch) {
        ?>

        <div id="branch_edit_<?=$branch['id'];?>" class="modal fade" role="dialog" >
          <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><?=$this->lang->line('edit');?></h4>
            </div>

            <div class="modal-body">

                <?php echo form_open("/setup/branch/edit/{$branch['id']}");?>
                <div class="form-group">
                    <label><?=$this->lang->line('branch');?></label>
                    <input name="branch_name" class="form-control border-input" value="" required/>

                </div>
                <div class="form-group">
                   <button type="submit" class="btn btn-success btn-fill btn-wd"> <span class="ti-check"></span> <?=$this->lang->line('confirm');?></button>
               </div>
               <?php echo form_close();?>

           </div>

           <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal"><?=$this->lang->line('close');?></button>
        </div>
    </div>

</div>
</div>

<?php   
}
}
?>



<?php
if(!empty($vehicle_class)){
    foreach ($vehicle_class as $_vehicle_class) {
        ?>

        <div id="class_edit_<?=$_vehicle_class['id'];?>" class="modal fade" role="dialog" >
          <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><?=$this->lang->line('edit');?></h4>
            </div>

            <div class="modal-body">

                <?php echo form_open("/setup/vehicle_class/edit/{$_vehicle_class['id']}");?>
                <div class="form-group">
                    <label><?=$this->lang->line('class_name');?></label>
                    <input name="class_name" class="form-control border-input" value="" required/>

                </div>
                <div class="form-group">
                   <button type="submit" class="btn btn-success btn-fill btn-wd"> <span class="ti-check"></span> <?=$this->lang->line('confirm');?></button>
               </div>
               <?php echo form_close();?>

           </div>

           <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal"><?=$this->lang->line('close');?></button>
        </div>
    </div>

</div>
</div>

<?php   
}
}
?>

