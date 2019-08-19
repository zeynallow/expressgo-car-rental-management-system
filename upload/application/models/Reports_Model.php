<?php
/**
 * mazZapp!
 * http://mazzapp.com
 * https://codecanyon.net/user/mazzapp
 * ExpressGo - Car Rental Management System 1.2
 * Model: Reports
 **/

// Security file
defined('BASEPATH') OR exit('Not found');

class Reports_Model extends CI_Model{

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
   public function getAgreements($from,$to){
    $this->db->select('*,invoices.id as invoice_id,agreements.id as agreement_id');
    $this->db->from('agreements');
    $this->db->join('invoices','agreements.id = invoices.agr_id');
    $this->db->join('vehicles','agreements.vehicle_id = vehicles.id');
    $this->db->join('clients','agreements.client_id = clients.id');
    $this->db->where("agreements.agreement_date BETWEEN '$from' AND '$to'");
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
     * Join Invoices, Vehicles, Clients, Payments
     */
   public function getPayments($from,$to){
    $this->db->select('*');
    $this->db->from('agreements');
    $this->db->join('invoices','agreements.id = invoices.agr_id');
    $this->db->join('vehicles','agreements.vehicle_id = vehicles.id');
    $this->db->join('clients','agreements.client_id = clients.id');
    $this->db->join('payments','invoices.id = payments.invoice_id','right');
    $this->db->where("payments.date BETWEEN '$from' AND '$to'");
    $data = $this->db->get()->result_array();
    if($data){
      return $data;
    }else{
      return FALSE;
    }
  }

  /**
     * @return bool
     * get all vehicles
     */
   public function getAllVehicles(){
    $this->db->select('*');
    $this->db->from('vehicles');
    $data = $this->db->get()->result_array();
    if($data){
      return $data;
    }else{
      return FALSE;
    }
  }

   /**
     * @return bool
     * get on rent vehicles
     */
   public function getOnRentVehicles($where){
    $this->db->select('*');
    $this->db->from('vehicles');
    $this->db->where('available',1);
    $data = $this->db->get()->result_array();
    if($data){
      return $data;
    }else{
      return FALSE;
    }
  }

    /**
     * @return bool
     * get available vehicles
     */
   public function getAvailableVehicles($where){
    $this->db->select('*');
    $this->db->from('vehicles');
    $this->db->where('available',0);
    $data = $this->db->get()->result_array();
    if($data){
      return $data;
    }else{
      return FALSE;
    }
  }

}


?>