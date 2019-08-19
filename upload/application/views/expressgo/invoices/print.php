<?php defined('BASEPATH') OR exit('Not found'); ?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
  <link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

  <title><?php echo $title; ?></title>

  <!-- Bootstrap core CSS -->
  <link href="<?php echo base_url('public/'); ?>assets/css/bootstrap.min.css" rel="stylesheet" />

<style type="text/css">
  div.stamp{
  width:200px;
  height:200px;
  float: right;
  display:inline-block;
  vertical-align:top;
  box-sizing:border-box;
  padding:10px;
  color:#999;
  position:relative;
}

div.stamp.invoice_status:after{
    content:"<?php echo $invoice_status;?>";
    position:absolute;
    top:70px;
    left:10px;
    z-index:1;
    font-family:Arial,sans-serif;
    -webkit-transform: rotate(-45deg); /* Safari */
    -moz-transform: rotate(-45deg); /* Firefox */
    -ms-transform: rotate(-45deg); /* IE */
    -o-transform: rotate(-45deg); /* Opera */
    transform: rotate(-45deg);
    font-size:40px;
    color:#c00;
    background:#fff;
    border:solid 4px #c00;
    padding:5px;
    border-radius:5px;
    zoom:1;
    filter:alpha(opacity=20);
    opacity:0.2;
    -webkit-text-shadow: 0 0 2px #c00;
    text-shadow: 0 0 2px #c00;
    box-shadow: 0 0 2px #c00;
}

body .container{
  width:960px;
}
.col-print-1 {width:8%;  float:left;}
.col-print-2 {width:16%; float:left;}
.col-print-3 {width:25%; float:left;}
.col-print-4 {width:33%; float:left;}
.col-print-5 {width:42%; float:left;}
.col-print-6 {width:50%; float:left;}
.col-print-7 {width:58%; float:left;}
.col-print-8 {width:66%; float:left;}
.col-print-9 {width:75%; float:left;}
.col-print-10{width:83%; float:left;}
.col-print-11{width:92%; float:left;}
.col-print-12{width:100%; float:left;}
</style>
</head>
<body>

  <div class="container">

 <div class="row">

              <div class="col-print-8">
               <div class="title">
                  <h2><?php echo $e_company_name;?></h2>
                  <p><?php echo $e_city;?>, <?php echo $e_country;?></p>
                  <p><?php echo $e_address;?></p>
                  <p><?php echo $e_phone;?></p>
                </div>


              </div>


           <div class="col-print-4">
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


<table class="table">
  <thead>
   <tr>
   <th><?=$this->lang->line('date');?></th><th><?=$this->lang->line('description');?></th><th><?=$this->lang->line('amount');?></th>
           </tr>
</thead>
<tbody>

  <?php
  $balance_due=array();
  if(!empty($payments)){

    foreach ($payments as $payment) {
      ?>
      <tr>
       <td><?=$payment['date'];?></td><td><?=$payment['description'];?></td> <td><?=$payment['amount'];?></td>
     </tr>
     <?php
     $balance_due[]=$payment['amount'];
   }
 }

 ?>

</tbody>
</table>


    <div class="row">
      <div class="col-print-3">
        <div class="form-group">
         <label><?=$this->lang->line('subtotal');?></label>
         <div><?=$subtotal;?></div>
       </div>
     </div>
     <div class="col-print-3">
      <div class="form-group">
       <label><?=$this->lang->line('tax');?></label>
       <div><?=$tax;?>%</div>
     </div>
   </div>
   <div class="col-print-3">
    <div class="form-group">
     <label><?=$this->lang->line('total');?></label>
     <div><?=$total;?></div>
   </div>
 </div>
 <div class="col-print-3">
  <div class="form-group">
   <label><?=$this->lang->line('balance_due');?></label>
   <div><?=array_sum($balance_due);?></div>
 </div>
</div>
</div>

<div class="stamp invoice_status"></div>

</div>



</div>
</body>
</html>
