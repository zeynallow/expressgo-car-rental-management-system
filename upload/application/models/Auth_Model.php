<?php
/**
 * mazZapp!
 * http://mazzapp.com
 * https://codecanyon.net/user/mazzapp
 * ExpressGo - Car Rental Management System 1.2
 * Model: Auth
 **/

// Security file
defined('BASEPATH') OR exit('Not found');

class Auth_Model extends CI_Model{

    function __construct(){
        parent::__construct();
        // DB Load
        $this->load->database();
    }

    /**
     * @param $login
     * @param $password
     * @return Login check
     */
    public function login($login,$password){
        $this->db->select('*');
        $this->db->from('admin');
        $this->db->where('login',$login);
        $this->db->where('password',$password);
        $data = $this->db->get();
        if($data->num_rows()>0){
            return TRUE;
        }else{
            return FALSE;
        }
    }


    /**
     * @param $parameters
     * Update
     */
    public function update($parameters){
        $update = $this->db->update('admin',$parameters);
        if($update){
            return TRUE;
        }else{
            return FALSE;
        }
    }

      /**
     * @return bool
     * update info
     */
     public function s_update($table,$parameters,$id,$where){
        $this->db->where($where,$id);
        $update = $this->db->update($table,$parameters);
        if($update){
            return TRUE;
        }else{
            return FALSE;
        }
    }

}

?>