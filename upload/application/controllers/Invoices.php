<?php
/**
 * mazZapp!
 * http://mazzapp.com
 * https://codecanyon.net/user/mazzapp
 * ExpressGo - Car Rental Management System 1.2
 * Controller: Invoices
 **/

// Security file
defined('BASEPATH') OR exit('Not found');

class Invoices extends CI_Controller{

  function __construct(){
    parent::__construct();

      //If Script installed, redirect change password
    if($this->expressgo->setup("install") == 0){
      redirect('/profile');
    }
    
    //Check login
    if(!$this->session->userdata('login')){redirect('/login');}

    // Load Model
    $this->load->model('Invoices_Model');

    //Language
    $this->config->set_item('language', $this->expressgo->setup("language"));
    $this->lang->load('expressgo', $this->expressgo->setup("language"));
  }


    /**
     * Invoice
     */
    public function invoice($id){
      $data['title'] = $this->lang->line('invoices_title');
      $data['js_code'] = NULL;

     //Company information
      $data['e_company_name'] = $this->expressgo->setup("company_name");
      $data['e_address'] = $this->expressgo->setup("address");
      $data['e_city'] = $this->expressgo->setup("city");
      $data['e_country'] = $this->expressgo->setup("country");
      $data['e_phone'] = $this->expressgo->setup("phone");
     //Company information end
      
      $this->load->view('expressgo/static/header_view',$data);


      $_invoices=$this->Invoices_Model->getInvoiceInfo($id);
      foreach ($_invoices as $invoice) {
        $data['invoice_id']=$invoice['id'];
        $data['subtotal']=$invoice['subtotal'];
        $data['tax']=$invoice['tax'];
        $data['total']=$invoice['total'];
        $data['agr_id']=$invoice['agr_id'];
        $data['status']=$invoice['status'];
      }

      $data['client_info'] = $this->Invoices_Model->getClientWithAgreement($data['agr_id']);

      $data['payments']=$this->Invoices_Model->getPaymentsInfo($id);  


      $this->load->view('expressgo/invoices/invoice',$data);
      $this->load->view('expressgo/static/footer_view');
    }

     /**
     * Make payment
     */
     public function make_payment($id){

      $data['title'] = $this->lang->line('invoices_title');
      $data['js_code'] = NULL;


     //Company information
      $data['e_company_name'] = $this->expressgo->setup("company_name");
      $data['e_address'] = $this->expressgo->setup("address");
      $data['e_city'] = $this->expressgo->setup("city");
      $data['e_country'] = $this->expressgo->setup("country");
      $data['e_phone'] = $this->expressgo->setup("phone");
     //Company information end
      



      if ($this->input->post()){

        //Check paid and void invoices
        $check_invoice=$this->Invoices_Model->getInvoiceInfo($id);
        foreach ($check_invoice as $c_invoice) {
          if($c_invoice['status'] == 1 OR $c_invoice['status'] == 2){
           redirect(site_url("/invoices/$id"));
         }
       }

       //add payment parameters
       $add_payment = $this->Invoices_Model->add('payments',array(
        'invoice_id'     => $id,
        'description'     => 'VehicleRental - Payment',
        'amount'     => abs($this->input->post('amount')),
        'after_add'     => 1
      ));

       $get_payments=$this->Invoices_Model->getPaymentsInfo($id);

       //Sum all payments
       $payment_sum=0;
       foreach ($get_payments as $payment) {
        $payment_sum+= $payment['amount'];
      }

      //if all amount paid then status change
      if($payment_sum == 0){
        $this->Invoices_Model->update("invoices",array(
          'status'=> 1
        ),$id,"id");

        
      }elseif($payment_sum > 0){
        $this->Invoices_Model->delete("payments",$add_payment,"id");
        $this->Invoices_Model->update("invoices",array(
          'status'=> 0
        ),$id,"id");
        $data['js_code'].= ' $.notify({
          icon: "ti-close",
          message: "'.$this->lang->line('invoices_check_amount').'"

        },{
          type: "danger",
          timer: 4000
        });';
      }

      $_invoices=$this->Invoices_Model->getInvoiceInfo($id);
      foreach ($_invoices as $invoice) {
        $data['invoice_id']=$invoice['id'];
        $data['subtotal']=$invoice['subtotal'];
        $data['tax']=$invoice['tax'];
        $data['total']=$invoice['total'];
        $data['status']=$invoice['status'];
        $data['agr_id']=$invoice['agr_id'];
      }

      $data['client_info'] = $this->Invoices_Model->getClientWithAgreement($data['agr_id']);
      $data['payments']=$this->Invoices_Model->getPaymentsInfo($id);  
      
    }else{
      redirect(site_url("/invoices/$id"));
    }


    $this->load->view('expressgo/static/header_view',$data);
    $this->load->view('expressgo/invoices/invoice',$data);
    $this->load->view('expressgo/static/footer_view');
  }

     /**
     * Print invoice
     */
     public function print_invoice($id){
      $data['title']=$this->lang->line('print');

      
     //Company information
      $data['e_company_name'] = $this->expressgo->setup("company_name");
      $data['e_address'] = $this->expressgo->setup("address");
      $data['e_city'] = $this->expressgo->setup("city");
      $data['e_country'] = $this->expressgo->setup("country");
      $data['e_phone'] = $this->expressgo->setup("phone");
     //Company information end

      $_invoices=$this->Invoices_Model->getInvoiceInfo($id);
      foreach ($_invoices as $invoice) {
        $data['invoice_id']=$invoice['id'];
        $data['subtotal']=$invoice['subtotal'];
        $data['tax']=$invoice['tax'];
        $data['total']=$invoice['total'];
        $agr_id=$invoice['agr_id'];
      }



      $data['client_info'] = $this->Invoices_Model->getClientWithAgreement($agr_id);
      $data['payments']=$this->Invoices_Model->getPaymentsInfo($id); 

      


       //Sum all payments
      $payment_sum=0;
      foreach ($data['payments'] as $payment) {
        $payment_sum+= $payment['amount'];
      } 

      if($payment_sum == 0){
        $data['invoice_status']=$this->lang->line('paid');
      }else{
        $data['invoice_status']=$this->lang->line('unpaid');
      }

      $this->load->view('expressgo/invoices/print',$data);
    }



    /**
     * Sale invoice
     */
    public function sale($id){

        if ($this->input->post()){

          if($this->input->post('percent') > 100){
              $percent = 100;
          }else{
              $percent = (int)$this->input->post('percent');
          }
        

       //Check paid and void invoices
        $check_invoice=$this->Invoices_Model->getInvoiceInfo($id);
        foreach ($check_invoice as $c_invoice) {
          if($c_invoice['status'] == 1 OR $c_invoice['status'] == 2){
           redirect(site_url("/invoices/$id"));
         }
       }

       $get_payments=$this->Invoices_Model->getPaymentsInfo($id);

       //Sum all payments
       $payment_sum=0;
       foreach ($get_payments as $payment) {
        $payment_sum+= $payment['amount'];
      }

      //Calculate
      $amount = ($payment_sum*$percent)/100;

       //add payment parameters
       $add_payment = $this->Invoices_Model->add('payments',array(
        'invoice_id'     => $id,
        'description'     => 'VehicleRental - Sale '.$percent.'%',
        'amount'     => abs($amount),
        'after_add'     => 1
      ));

      //Check 
      $_get_payments=$this->Invoices_Model->getPaymentsInfo($id);

       //Sum all payments
       $_payment_sum=0;
       foreach ($_get_payments as $_payment) {
        $_payment_sum+= $_payment['amount'];
      }

      //if all amount paid then status change
      if($_payment_sum == 0){
        $this->Invoices_Model->update("invoices",array(
          'status'=> 1
        ),$id,"id");
      }

     } // end post

     redirect(site_url("/invoices/$id"));
   }

    /**
     * Void invoice
     */
    public function void($id){
      $this->Invoices_Model->update("invoices",array(
        'status'=> 2
      ),$id,"id");

      //get vehicle id with invoice id
      foreach ($this->Invoices_Model->getVehicleIdWithInvoice($id) as $getVehicleIdWithInvoice) {
       $vehicle_id=$getVehicleIdWithInvoice['vehicle_id'];
     }
        //vehicle available status change
     $this->Invoices_Model->update("vehicles",array("available"=>0),$vehicle_id,"id");
     $this->Invoices_Model->update("invoices",array("vehicle_status"=>0), $id,"id");

     redirect(site_url("/agreement"));
   }


  /**
     * delete payment
     */
  public function payment_delete($id){

    if ($this->input->post()){
      foreach ($this->input->post('del_payment') as $del_payment) {
        $delete =  $this->Invoices_Model->delete("payments",$del_payment,"id");

      }
      $this->Invoices_Model->update("invoices",array(
          'status'=> 0
        ),$id,"id");
    }
    redirect(site_url("/invoices/$id"));

  }

}

?>