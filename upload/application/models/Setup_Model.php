<?php
/**
 * mazZapp!
 * http://mazzapp.com
 * https://codecanyon.net/user/mazzapp
 * ExpressGo - Car Rental Management System 1.2
 * Model: Setup
 **/

// Security file
defined('BASEPATH') OR exit('Not found');

class Setup_Model extends CI_Model{

    function __construct(){
        parent::__construct();
        // DB Load
        $this->load->database();
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
     * Delete 
     */
    public function delete_branch($id){

     $this->db->delete('branch', array('id' => $id)); 
     $this->db->delete('vehicles', array('branch_id' => $id));

     return TRUE;

 }

  /**
     * Delete 
     */
    public function delete_vehicle_class($id){

     $this->db->delete('vehicle_class', array('id' => $id)); 

     return TRUE;

 }



}


?>