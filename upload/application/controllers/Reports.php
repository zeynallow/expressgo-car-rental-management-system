<?php
/**
 * mazZapp!
 * http://mazzapp.com
 * https://codecanyon.net/user/mazzapp
 * ExpressGo - Car Rental Management System 1.2
 * Controller: Reports
 **/

// Security file
defined('BASEPATH') OR exit('Not found');

class Reports extends CI_Controller{

  function __construct(){
    parent::__construct();

          //If Script installed, redirect change password
    if($this->expressgo->setup("install") == 0){
      redirect('/profile');
    }
    
    if(!$this->session->userdata('login')){redirect('/login');}
        // Load Model
    $this->load->model('Reports_Model');
         //Language
    $this->config->set_item('language', $this->expressgo->setup("language"));
    $this->lang->load('expressgo', $this->expressgo->setup("language"));
  }

    /**
     * Reports Index
     */
    public function index(){
      $data['title'] = $this->lang->line('reports_title');
      $data['js_code'] = NULL;
      $data['result']=NULL;

        //Post data
      if ($this->input->post()){
        $report_type = $this->input->post('report_type');
        $date_from = $this->input->post('date_from');
        $date_to = $this->input->post('date_to');

        if($report_type == "rentals"){

                        //Rentals Report
         $getAgreements = $this->Reports_Model->getAgreements($date_from,$date_to);

         $data['result'].='<table class="table table-striped" id="bootstrap-table" >
         <thead>
         <tr>
         <th>'.$this->lang->line('date').'</th>
         <th>'.$this->lang->line('client_name').'</th>
         <th>'.$this->lang->line('vehicle').'</th>
         <th>'.$this->lang->line('amount').'</th>
         <th>'.$this->lang->line('subtotal').'</th>
         <th>'.$this->lang->line('tax').'</th>
         <th>'.$this->lang->line('total').'</th>
         </tr>
         </thead>
         <tbody>';
         if(!empty($getAgreements)){      
          foreach ($getAgreements as $getAgreement) {
           $data['result'].='<tr>
           <td>'.$getAgreement['agreement_date'].'</td>
           <td>'.$getAgreement['first_name'].' '.$getAgreement['last_name'].'</td>
           <td>'.$getAgreement['license_plate'].' / '.$getAgreement['make'].' '.$getAgreement['model'].'</td>
           <td>'.$getAgreement['daily_desc'].' / '.$getAgreement['weekly_desc'].' / '.$getAgreement['monthly_desc'].'</td>
           <td>'.$getAgreement['subtotal'].'</td>
           <td>'.$getAgreement['tax'].'</td>
           <td>'.$getAgreement['total'].'</td>
           </tr>';
         }
       }
       $data['result'].='   
       </tbody>
       </table>';

     }elseif($report_type == "payments"){
                           //Payments Report
       $getPayments = $this->Reports_Model->getPayments($date_from,$date_to);

       $data['result'].='<table class="table table-striped" id="bootstrap-table" >
       <thead>
       <tr>
       <th>'.$this->lang->line('date').'</th>
       <th>'.$this->lang->line('client_name').'</th>
       <th>'.$this->lang->line('description').'</th>
       <th>'.$this->lang->line('vehicle').'</th>
       <th>'.$this->lang->line('amount').'</th>
       </tr>
       </thead>
       <tbody>';
       if(!empty($getPayments)){      
        foreach ($getPayments as $getPayment) {
         $data['result'].='<tr>
         <td>'.$getPayment['date'].'</td>
         <td>'.$getPayment['first_name'].' '.$getPayment['last_name'].'</td>
         <td>'.$getPayment['description'].'</td>
         <td>'.$getPayment['license_plate'].' / '.$getPayment['make'].' '.$getPayment['model'].'</td>
         <td>'.$getPayment['amount'].'</td>
         </tr>';
       }
     }
     $data['result'].='   
     </tbody>
     </table>';
   }elseif($report_type == "vehicle_list"){

                        //Vehicle Report
     $getVehicles = $this->Reports_Model->getAllVehicles();

     $data['result'].='<table class="table table-striped" id="bootstrap-table" >
     <thead>
     <tr>
     <th>'.$this->lang->line('license_plate').'</th>
     <th>'.$this->lang->line('make_model').'</th>
     <th>'.$this->lang->line('year').'</th>
     <th>'.$this->lang->line('color').'</th>
     <th>'.$this->lang->line('class').'</th>
     <th>'.$this->lang->line('branch').'</th>
     <th>'.$this->lang->line('price').'</th>
     </tr>
     </thead>
     <tbody>';
     if(!empty($getVehicles)){      
      foreach ($getVehicles as $getVehicle) {
       $data['result'].='<tr>
       <td>'.$getVehicle['license_plate'].'</td>
       <td>'.$getVehicle['make'].' / '.$getVehicle['model'].'</td>
       <td>'.$getVehicle['year'].'</td>
       <td>'.$getVehicle['color'].'</td>
       <td>'.$getVehicle['class'].'</td>
       <td>'.$this->expressgo->getBranchName($getVehicle['branch_id']).'</td>
       <td>One day: '.$getVehicle['1day'].', Weekly: '.$getVehicle['weekly'].', Monthly: '.$getVehicle['monthly'].'</td>
       </tr>';
     }
   }
   $data['result'].='   
   </tbody>
   </table>';

 }elseif($report_type == "vehicle_on_rent"){

                         //Vehicle Report
   $getVehicles = $this->Reports_Model->getOnRentVehicles("available");

   $data['result'].='<table class="table table-striped" id="bootstrap-table" >
   <thead>
   <tr>
   <th>'.$this->lang->line('license_plate').'</th>
   <th>'.$this->lang->line('make_model').'</th>
   <th>'.$this->lang->line('year').'</th>
   <th>'.$this->lang->line('color').'</th>
   <th>'.$this->lang->line('class').'</th>
   <th>'.$this->lang->line('branch').'</th>
   <th>'.$this->lang->line('price').'</th>
   </tr>
   </thead>
   <tbody>';
   if(!empty($getVehicles)){      
    foreach ($getVehicles as $getVehicle) {
     $data['result'].='<tr>
     <td>'.$getVehicle['license_plate'].'</td>
     <td>'.$getVehicle['make'].' / '.$getVehicle['model'].'</td>
     <td>'.$getVehicle['year'].'</td>
     <td>'.$getVehicle['color'].'</td>
     <td>'.$getVehicle['class'].'</td>
     <td>'.$this->expressgo->getBranchName($getVehicle['branch_id']).'</td>
     <td>One day: '.$getVehicle['1day'].', Weekly: '.$getVehicle['weekly'].', Monthly: '.$getVehicle['monthly'].'</td>
     </tr>';
   }
 }
 $data['result'].='   
 </tbody>
 </table>';

}elseif($report_type == "vehicle_available"){
                         //Vehicle Report
 $getVehicles = $this->Reports_Model->getAvailableVehicles("available");

 $data['result'].='<table class="table table-striped" id="bootstrap-table" >
 <thead>
 <tr>
 <th>'.$this->lang->line('license_plate').'</th>
 <th>'.$this->lang->line('make_model').'</th>
 <th>'.$this->lang->line('year').'</th>
 <th>'.$this->lang->line('color').'</th>
 <th>'.$this->lang->line('class').'</th>
 <th>'.$this->lang->line('branch').'</th>
 <th>'.$this->lang->line('price').'</th>
 </tr>
 </thead>
 <tbody>';
 if(!empty($getVehicles)){      
  foreach ($getVehicles as $getVehicle) {
   $data['result'].='<tr>
   <td>'.$getVehicle['license_plate'].'</td>
   <td>'.$getVehicle['make'].' / '.$getVehicle['model'].'</td>
   <td>'.$getVehicle['year'].'</td>
   <td>'.$getVehicle['color'].'</td>
   <td>'.$getVehicle['class'].'</td>
   <td>'.$this->expressgo->getBranchName($getVehicle['branch_id']).'</td>
   <td>One day: '.$getVehicle['1day'].', Weekly: '.$getVehicle['weekly'].', Monthly: '.$getVehicle['monthly'].'</td>
   </tr>';
 }
}
$data['result'].='   
</tbody>
</table>';
}
}




$this->load->view('expressgo/static/header_view',$data);
$this->load->view('expressgo/reports/reports',$data);
$this->load->view('expressgo/static/footer_view');
}



}

?>