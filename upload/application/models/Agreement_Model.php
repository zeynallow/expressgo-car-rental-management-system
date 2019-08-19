<?php
/**
 * mazZapp!
 * http://mazzapp.com
 * https://codecanyon.net/user/mazzapp
 * ExpressGo - Car Rental Management System 1.2
 * Model: Agreement
 **/

// Security file
defined('BASEPATH') OR exit('Not found');

class Agreement_Model extends CI_Model{

  function __construct(){
    parent::__construct();
        // DB Load
    $this->load->database();
  }

   /**
     * @return bool
     * get agreements info
     * Join Invoices, Vehicles, Clients
     */
   public function getAgreements(){
    $this->db->select('*,invoices.id as invoice_id,agreements.id as agreement_id');
    $this->db->from('agreements');
    $this->db->join('invoices','agreements.id = invoices.agr_id');
    $this->db->join('vehicles','agreements.vehicle_id = vehicles.id');
    $this->db->join('clients','agreements.client_id = clients.id');

    $data = $this->db->get()->result_array();
    if($data){
      return $data;
    }else{
      return FALSE;
    }
  }

   /**
     * @return bool
     * get agreements info
     */
   public function getAgreementInfo($id){
    $this->db->select('*');
    $this->db->from('agreements');
    $this->db->where('id',$id);

    
    $data = $this->db->get()->result_array();
    if($data){
      return $data;
    }else{
      return FALSE;
    }
  }

   /**
     * @return bool
     * get agreement info
     * Join Invoices, Vehicles, Clients
     */
   public function getAgreement($id){
    $this->db->select('*,
      drivers.first_name as driver_first_name,
      drivers.last_name as driver_last_name,
      invoices.id as invoices_id');

    $this->db->from('agreements');
    $this->db->join('vehicles','agreements.vehicle_id = vehicles.id');
    $this->db->join('clients','agreements.client_id = clients.id');
    $this->db->join('drivers','agreements.client_id = drivers.client_id');
    $this->db->join('invoices','agreements.id = invoices.agr_id');
    $this->db->where('agreements.id',$id);

    

    $data = $this->db->get()->result_array();
    if($data){
      return $data;
    }else{
      return FALSE;
    }
  }

    /**
     * @return bool
     * get payments info
     */
     public function getPaymentsInfo($id){
        $this->db->select('*');
        $this->db->from('payments');
        $this->db->where('invoice_id',$id);
        $data = $this->db->get()->result_array();
        if($data){
            return $data;
        }else{
            return FALSE;
        }
    }


    /**
     * @return int
     * add database
     */
    public function add($table,$parameters){
      $add_agreement = $this->db->insert($table,$parameters);
      $insert_id = $this->db->insert_id();
      return  $insert_id;
    }


      /**
     * @return bool
     * get vehicle info
     */
      public function getVehicleInfo($id){
        $this->db->select('*');
        $this->db->from('vehicles');
        $this->db->where('id',$id);
        $data = $this->db->get()->result_array();
        if($data){
          return $data;
        }else{
          return FALSE;
        }
      }

    /**
     * @return bool
     * get sales tax
     */
    public function getSalesTax(){
      $this->db->select('*');
      $this->db->from('setup');
      $this->db->where('parameter','tax');
      $data = $this->db->get()->result_array();
      if($data){
        return $data;
      }else{
        return FALSE;
      }
    }

   /**
     * @return bool
     * update info
     */
   public function update($table,$parameters,$id,$where){
    $this->db->where($where,$id);
    $update = $this->db->update($table,$parameters);
    if($update){
      return TRUE;
    }else{
      return FALSE;
    }
  }
  

     /**
     * Delete Agreements and invoices
     */
     public function delete($id){

       $this->db->delete('agreements', array('id' => $id)); 
       $this->db->delete('invoices', array('agr_id' => $id));
       
       return TRUE;

     }

   }


   ?>