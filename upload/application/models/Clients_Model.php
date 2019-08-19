<?php
/**
 * mazZapp!
 * http://mazzapp.com
 * https://codecanyon.net/user/mazzapp
 * ExpressGo - Car Rental Management System 1.2
 * Model: Clients
 **/

// Security file
defined('BASEPATH') OR exit('Not found');

class Clients_Model extends CI_Model{

    function __construct(){
        parent::__construct();
        // DB Load
        $this->load->database();
    }

     /**
     * @return int
     * add client query
     */
     public function add($table,$parameters){
        $add_client = $this->db->insert($table,$parameters);
        $insert_id = $this->db->insert_id();
        return  $insert_id;
    }


     /**
     * @return bool
     * get clients
     */
     public function getClients(){
        $this->db->select('*');
        $this->db->from('clients');
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
     * get driver info
     */
    public function getDriverInfo($id){
        $this->db->select('*');
        $this->db->from('drivers');
        $this->db->where('client_id',$id);
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
     * @param $id - Client id
     * Delete client
     */
     public function delete($id){
        $this->db->where('id',$id);
        $sil = $this->db->delete('clients');
        if($sil){
            return TRUE;
        }else{
            return FALSE;
        }
    }



}


?>