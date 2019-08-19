<?php
/**
 * mazZapp!
 * http://mazzapp.com
 * https://codecanyon.net/user/mazzapp
 * ExpressGo - Car Rental Management System 1.2
 * Model: Services
 **/

// Security file
defined('BASEPATH') OR exit('Not found');

class Services_Model extends CI_Model{

    function __construct(){
        parent::__construct();
        // DB Load
        $this->load->database();
    }

   
    /**
     * get branch vehicle
     */

    public function getBranchVehicle($id){
        $this->db->select('*');
        $this->db->from('vehicles');
        $this->db->where('branch_id',$id);
        $this->db->where('available',0);
        $data = $this->db->get()->result_array();
        if($data){
            return $data;
        }else{
            return FALSE;
        }
    }

     /**
     * get client info
     */

    public function getClientInfo($search_by,$search){
        $this->db->select('*');
        $this->db->from('clients');
        $this->db->like("LOWER($search_by)",$search);
        $data = $this->db->get()->result_array();
        if($data) {
            return $data;
        }else{
            return FALSE;
        }
    }

     /**
     * get client drivers
     */
    public function getClientDrivers($id){
        $this->db->select('*');
        $this->db->from('drivers');
        $this->db->where("client_id",$id);
        $data = $this->db->get()->result_array();
        if($data) {
            return $data;
        }else{
            return FALSE;
        }
    }

   
}


?>