<?php
/**
 * mazZapp!
 * http://mazzapp.com
 * https://codecanyon.net/user/mazzapp
 * ExpressGo - Car Rental Management System 1.2
 * Controller: Services
 **/


// Security file
defined('BASEPATH') OR exit('Not found');

class Services extends CI_Controller{

    function __construct(){
        parent::__construct();

          //If Script installed, redirect change password
        if($this->expressgo->setup("install") == 0){
            redirect('/profile');
        }
        
        //Login check
        if(!$this->session->userdata('login')){redirect('/login');}
           // Load Model
        $this->load->model('Services_Model');

         //Language
        $this->config->set_item('language', $this->expressgo->setup("language"));
        $this->lang->load('expressgo', $this->expressgo->setup("language"));
    }

    /**
     * Service Index
     */
    public function index(){
        $data['title'] = $this->lang->line('services_title');
        $data['js_code'] = NULL;
        $this->load->view('expressgo/static/header_view',$data);

        $this->load->view('expressgo/static/footer_view');
    }

   /**
     * Get branch vehicles
     */

   public function getVehicle($branch){
    //get branch vehicles
    $data['vehicles'] = $this->Services_Model->getBranchVehicle($branch);
    echo json_encode($data['vehicles']);
}

   /**
     * Get client
     */

   public function getClient($select,$term){
    //get client data

    if($select != "first_name" and $select != "last_name" and $select != "company_name"){
        return false;
    }

    $data['getClient'] = $this->Services_Model->getClientInfo($select,strtolower($term));
    echo json_encode($data['getClient']);
}

     /**
     * Get client drivers
     */

     public function getClientDrivers($id){
    //get driver data
        $data['getClientDrivers'] = $this->Services_Model->getClientDrivers($id);
        echo json_encode($data['getClientDrivers']);
    }

    
}

?>