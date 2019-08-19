<?php defined('BASEPATH') OR exit('Not found'); ?>

       <div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="header">
            <div class="row">

              <div class="col-lg-8">
               <div class="title">
                  <h2><?php echo $e_company_name;?></h2>
                  <p><?php echo $e_city;?>, <?php echo $e_country;?></p>
                  <p><?php echo $e_address;?></p>
                  <p><?php echo $e_phone;?></p>
                </div>


              </div>


           <div class="col-lg-4">
              <div class="title">
                                <?php
if(!empty($client_info)){

      foreach ($client_info as $client) {
?>                <p><?php echo $client['company_name'];?></p>
                  <p><?php echo $client['first_name'];?>, <?php echo $client['last_name'];?></p>
                  <p><?php echo $client['city'];?>, <?php echo $client['country'];?></p>
                  <p><?php echo $client['home_address'];?></p>
                  <p><?php echo $client['home_phone'];?></p> 
                  <p><?php echo $client['cell_phone'];?></p>
                  <?php }} ?>
                </div>
           </div>

         </div>
       </div>
       <div class="content">
<?php
echo form_open("/invoices/$invoice_id/payment/delete",array('id' => 'delete-payment'));
?>
         <table class="table">
          <thead>
           <tr>
             <th></th><th><?=$this->lang->line('date');?></th><th><?=$this->lang->line('description');?></th><th><?=$this->lang->line('amount');?></th>
           </tr>
           </thead>
           <tbody>
            
            <?php
$balance_due=array();
if(!empty($payments)){

      foreach ($payments as $payment) {

        if($payment['after_add'] == 0){
          $after_add = "disabled";
        }else{
          $after_add = NULL;
        }
?>
           <tr>
             <td>
                 <div class="checkbox"> <input id="n_payment" type="checkbox" <?=$after_add;?> value="<?=$payment['id'];?>" name="del_payment[]"></div>
                </td><td><?=$payment['date'];?></td><td><?=$payment['description'];?></td> <td><?=$payment['amount'];?></td>
           </tr>
   <?php
         $balance_due[]=$payment['amount'];
      }
}

?>

           </tbody>
         </table>
<?php echo form_close();?>
     <hr/>


           <div class="row">
              <div class="col-lg-3">
                  <div class="form-group">
                   <label><?=$this->lang->line('subtotal');?></label>
                  <input type="text" class="form-control border-input" value="<?=$subtotal;?>">
                 </div>
              </div>
               <div class="col-lg-3">
                  <div class="form-group">
                 <label><?=$this->lang->line('tax');?></label>
                  <input type="text" class="form-control border-input" value="<?=$tax;?>">
                 </div>
              </div>
               <div class="col-lg-3">
                  <div class="form-group">
                 <label><?=$this->lang->line('total');?></label>
                  <input type="text" class="form-control border-input" value="<?=$total;?>">
                 </div>
              </div>
               <div class="col-lg-3">
                  <div class="form-group">
                 <label><?=$this->lang->line('balance_due');?></label>
                  <input type="text" class="form-control border-input" value="<?=array_sum($balance_due);?>">
                 </div>
              </div>
           </div>
         </div>

         <div class="row">
           <div class="col-lg-2">
                  <div class="form-group">
                     <button type="submit" onclick="expressGo.showSwal('delete-payment')"
                      class="btn btn-danger btn-fill btn-wd btn-disable"> <span class="ti-trash"></span> <?=$this->lang->line('delete_payment');?></button>
                 </div>
              </div>
              <div class="col-lg-2">
                  <div class="form-group">
                     <a href="<?=site_url("/agreement/$agr_id/print");?>"  class="btnPrint btn btn-info btn-fill btn-wd btn-icon"> <span class="ti-printer"></span> <?=$this->lang->line('print_agreement');?></a>
                 </div>
              </div>
               <div class="col-lg-2">
                  <div class="form-group">
                  <a href="<?=site_url("/invoices/$invoice_id/print");?>" class="btnPrint btn btn-info btn-fill btn-wd"> <span class="ti-printer"></span> <?=$this->lang->line('print_invoice');?></a>
                 </div>
              </div>
               <div class="col-lg-2">
                  <div class="form-group">
                     <button data-toggle="modal" data-target="#make_payment" type="button" class="btn btn-success btn-fill btn-wd"> <span class="ti-money"></span> <?=$this->lang->line('make_payment');?></button>
                 </div>
              </div>
              <div class="col-lg-2">
                  <div class="form-group">
                     <button data-toggle="modal" data-target="#sale" type="button" class="btn btn-warning btn-fill btn-wd"> <span class="fa fa-percent"></span> <?=$this->lang->line('sale');?></button>
                 </div>
              </div>
               <div class="col-lg-2">
                  <div class="form-group">
                     <button type="button" onclick="expressGo.showSwal('void-invoice','<?=site_url("/invoices/$invoice_id/void");?>')"  class="btn btn-warring btn-fill btn-wd"> <span class="ti-layout-placeholder"></span> <?=$this->lang->line('void_invoice');?></button>
                 </div>
              </div>
           </div>
         </div>

      


       </div>
     </div>
   </div>


 </div>
</div>
</div>


<div id="make_payment" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><?=$this->lang->line('make_payment');?></h4>
      </div>

      <div class="modal-body">
        	
        	<?php echo form_open("/invoices/$invoice_id/make_payment");?>
        		<div class="form-group">
        			<label><?=$this->lang->line('amount');?></label>
        			<input name="amount" class="form-control border-input" value="<?=abs(array_sum($balance_due));?>" required/>
        		
        			</div>
        			<div class="form-group">
        			 <button type="submit" class="btn btn-success btn-fill btn-wd"> <span class="ti-money"></span> <?=$this->lang->line('confirm');?></button>
        			</div>
        	<?php echo form_close();?>

      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"><?=$this->lang->line('close');?></button>
      </div>
    </div>

  </div>
</div>

<!--sale modal-->

<div id="sale" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><?=$this->lang->line('sale');?></h4>
      </div>

      <div class="modal-body">
          
          <?php echo form_open("/invoices/$invoice_id/sale");?>
            <div class="form-group">
              <label><?=$this->lang->line('percent');?></label>
              <input name="percent" class="form-control border-input" value="" required/>
              </div>
              <div class="form-group">
               <button type="submit" class="btn btn-success btn-fill btn-wd"> <span class="fa fa-percent"></span> <?=$this->lang->line('confirm');?></button>
              </div>
          <?php echo form_close();?>

      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"><?=$this->lang->line('close');?></button>
      </div>
    </div>

  </div>
</div>