<?php
/**
 * mazZapp!
 * http://mazzapp.com
 * https://codecanyon.net/user/mazzapp
 * ExpressGo - Car Rental Management System 1.2
 * Controller: Dashboard
 **/


// Security file
defined('BASEPATH') OR exit('Not found');

class Dashboard extends CI_Controller{

  function __construct(){
    parent::__construct();

      //If Script installed, redirect change password
    if($this->expressgo->setup("install") == 0){
      redirect('/profile');
    }
    
        //Check login
    if(!$this->session->userdata('login')){redirect('/login');}


        // Load Model
    $this->load->model('Dashboard_Model');

     //Language
    $this->config->set_item('language', $this->expressgo->setup("language"));
    $this->lang->load('expressgo', $this->expressgo->setup("language"));
  }

    /**
     * Dashboard Index
     */
    public function index(){
      $data['title'] = 'ExpressGo - Car Rental Management Systems';
      $data['js_code'] = NULL;
      $this->load->view('expressgo/static/header_view',$data);
      
      $data['AvailableVehicle']=$this->Dashboard_Model->Available_Vehicle();
      $data['OnRentsCount']=$this->Dashboard_Model->OnRentsCount();
      $data['onRents'] = $this->Dashboard_Model->getOnRents();
      
      $this->load->view('expressgo/home_view',$data);
      $this->load->view('expressgo/static/footer_view');
    }



    
  }

  ?>