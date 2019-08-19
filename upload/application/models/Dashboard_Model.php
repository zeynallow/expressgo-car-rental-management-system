<?php
/**
 * mazZapp!
 * http://mazzapp.com
 * https://codecanyon.net/user/mazzapp
 * ExpressGo - Car Rental Management System 1.2
 * Model: Dashboard
 **/

// Security file
defined('BASEPATH') OR exit('Not found');

class Dashboard_Model extends CI_Model{

    function __construct(){
        parent::__construct();
        // DB Load
        $this->load->database();
    }


     /**
     * @return int
     * On rents conut
     */
     public function OnRentsCount(){
        $this->db->select('*');
        $this->db->from('invoices');
        $this->db->where('vehicle_status',1);
        $data = $this->db->count_all_results();
        if($data){
            return $data;
        }else{
            return 0 ;
        }
    }

     /**
     * @return int
     * available vehicle count
     */
     public function Available_Vehicle(){
        $this->db->select('*');
        $this->db->from('vehicles');
        $this->db->where('available',0);
        $data = $this->db->count_all_results();
        if($data){
            return $data;
        }else{
            return 0 ;
        }
    }

    /**
     * get on rents
     */

    public function getOnRents(){
        $this->db->select('*,invoices.id as invoice_id, agreements.id as agreement_id');
        $this->db->from('agreements');
        $this->db->join('invoices','agreements.id = invoices.agr_id');
        $this->db->join('vehicles','agreements.vehicle_id = vehicles.id');
        $this->db->join('clients','agreements.client_id = clients.id');
        $this->db->where('vehicle_status',1);

        $data = $this->db->get()->result_array();
        if($data){
            return $data;
        }else{
            return FALSE;
        }
    }



}


?>