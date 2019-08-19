<?php
/**
 * mazZapp!
 * http://mazzapp.com
 * https://codecanyon.net/user/mazzapp
 * ExpressGo - Car Rental Management System 1.2
 * Library: ExpressGo
 **/

// Security file
defined('BASEPATH') OR exit('Not found!');

Class ExpressGo {

     /**
     * Setup information
     */
     
     public function setup($where){
        $ci = & get_instance();
        $ci->db->select('*');
        $ci->db->from('setup');
        $ci->db->where('parameter',$where);
        $data = $ci->db->get()->row('value');
        if($data){
            return $data;
        }else{
            return FALSE;
        }
    }

       /**
     * @return bool
     * get vehciles info
     */
       public function getVehicles(){
        $ci = & get_instance();
        $ci->db->select('*');
        $ci->db->from('vehicles');
        $data = $ci->db->get()->result_array();
        if($data){
            return $data;
        }else{
            return FALSE;
        }
    }



   /**
     * @return bool
     * get branch
     */
   public function getBranch(){
      $ci = & get_instance();
      $ci->db->select('*');
      $ci->db->from('branch');
      $data = $ci->db->get()->result_array();
      if($data){
        return $data;
    }else{
        return FALSE;
    }
}

   /**
     * @return bool
     * get class name
     */
   public function getClassName(){
      $ci = & get_instance();
      $ci->db->select('*');
      $ci->db->from('vehicle_class');
      $data = $ci->db->get()->result_array();
      if($data){
        return $data;
    }else{
        return FALSE;
    }
}

    /**
     * @return bool
     * get branch name
     */
    public function getBranchName($id){
      $ci = & get_instance();
      $ci->db->select('*');
      $ci->db->from('branch');
      $ci->db->where('id',$id);
      $data = $ci->db->get()->result_array();
      if($data){
        foreach ($data as $_data) {
           return $_data['name'];
       }
   }else{
    return FALSE;
}
}


}

?>