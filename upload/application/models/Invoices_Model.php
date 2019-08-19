<?php
/**
 * mazZapp!
 * http://mazzapp.com
 * https://codecanyon.net/user/mazzapp
 * ExpressGo - Car Rental Management System 1.2
 * Model: Invoices
 **/

// Security file
defined('BASEPATH') OR exit('Not found');

class Invoices_Model extends CI_Model{

    function __construct(){
        parent::__construct();
        // DB Yükle
        $this->load->database();
    }

    
    /**
     * @return bool
     * get clients info
     */
    public function getClientWithAgreement($id){
        $this->db->select('*');
        $this->db->from('agreements');
        $this->db->join('clients','agreements.client_id = clients.id');
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
     * get vehicle id
     */
    public function getVehicleIdWithInvoice($id){
        $this->db->select('*');
        $this->db->from('invoices');
        $this->db->join('agreements','agreements.id = invoices.agr_id');
        $this->db->where('invoices.id',$id);


        $data = $this->db->get()->result_array();
        if($data){
            return $data;
        }else{
            return FALSE;
        }
    }

    /**
     * @return bool
     * get clients info
     */
    public function getClientInfo($id){
        $this->db->select('*');
        $this->db->from('clients');
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
     * get invoice info
     */
     public function getInvoiceInfo($id){
        $this->db->select('*');
        $this->db->from('invoices');
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
     * add query
     */
     public function add($table,$parameters){
        $add_client = $this->db->insert($table,$parameters);
        $insert_id = $this->db->insert_id();
        return  $insert_id;
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
     * @return bool
     * delete
     */

     public function delete($table,$id,$where){
        $this->db->where($where,$id);
        $update = $this->db->delete($table);
        if($update){
            return TRUE;
        }else{
            return FALSE;
        }
    }

    

}


?>