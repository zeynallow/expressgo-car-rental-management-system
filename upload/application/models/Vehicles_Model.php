<?php
/**
 * mazZapp!
 * http://mazzapp.com
 * https://codecanyon.net/user/mazzapp
 * ExpressGo - Car Rental Management System 1.2
 * Model: Vehicles
 **/

// Security file
defined('BASEPATH') OR exit('Not found');

class Vehicles_Model extends CI_Model{

    function __construct(){
        parent::__construct();
        // DB Load
        $this->load->database();
    }


    /**
     * @return int
     * add vehicle query
     */
    public function add($table,$parameters){
        $add_client = $this->db->insert($table,$parameters);
        $insert_id = $this->db->insert_id();
        return  $insert_id;
    }

    /**
     * @return bool
     * get vehicles
     */
    public function getVehicles(){
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
     * get rental history
     */
    public function getRentalHistroy($id){
        $this->db->select('*');
        $this->db->from('agreements');
        $this->db->join('clients','agreements.client_id = clients.id');
        $this->db->where('vehicle_id',$id);
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
     * Delete vehicle
     */

    public function delete($id){
        $this->db->where('id',$id);
        $sil = $this->db->delete('vehicles');
        if($sil){
            return TRUE;
        }else{
            return FALSE;
        }
    }



}


?>