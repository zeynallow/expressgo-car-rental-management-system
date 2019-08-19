<?php
/**
 * mazZapp!
 * http://mazzapp.com
 * https://codecanyon.net/user/mazzapp
 * ExpressGo - Car Rental Management System 1.2
 * Controller: Setup
 **/


// Security file
defined('BASEPATH') OR exit('Not found');

class Setup extends CI_Controller{

  function __construct(){
    parent::__construct();

        //Check login
    if(!$this->session->userdata('login')){redirect('/login');}

        // Load Model
    $this->load->model('Setup_Model');
    $this->config->set_item('language', $this->expressgo->setup("language"));
    $this->lang->load('expressgo', $this->expressgo->setup("language"));
  }

    /**
     * Setup Index
     */
    public function index(){
      $data['title'] = $this->lang->line('setup_title');
      $data['js_code'] = NULL;

     //Company information
      $data['company_name'] = $this->expressgo->setup("company_name");
      $data['address'] = $this->expressgo->setup("address");
      $data['city'] = $this->expressgo->setup("city");
      $data['country'] = $this->expressgo->setup("country");
      $data['phone'] = $this->expressgo->setup("phone");
      $data['tax'] = $this->expressgo->setup("tax");
      //Company information end


      if ($this->input->post()){
            // Update setup
       $this->Setup_Model->update('setup',array('value'=> html_escape($this->input->post('company_name'))),'company_name','parameter');
       $this->Setup_Model->update('setup',array('value'=> html_escape($this->input->post('address'))),'address','parameter');
       $this->Setup_Model->update('setup',array('value'=> html_escape($this->input->post('city'))),'city','parameter');
       $this->Setup_Model->update('setup',array('value'=> html_escape($this->input->post('country'))),'country','parameter');
       $this->Setup_Model->update('setup',array('value'=> html_escape($this->input->post('phone'))),'phone','parameter');
       $this->Setup_Model->update('setup',array('value'=> html_escape(abs($this->input->post('tax')))),'tax','parameter');
      
       $p_s_language = $this->input->post('s_language');
       $p_currency = $this->input->post('currency');
       if(!empty($p_s_language)){
        $this->Setup_Model->update('setup',array('value'=> html_escape($this->input->post('s_language'))),'language','parameter');
      }
      if(!empty($p_currency)){
         $this->Setup_Model->update('setup',array('value'=> html_escape($this->input->post('currency'))),'currency','parameter');
      }
      
      redirect(site_url('setup'));
    }


    $data['branches']= $this->expressgo->getBranch();
    $data['vehicle_class']= $this->expressgo->getClassName();

    $this->load->view('expressgo/static/header_view',$data);
    $this->load->view('expressgo/setup/setup',$data);
    $this->load->view('expressgo/static/footer_view');
  }


    /**
     * Add branch
     */
    public function add_branch(){

     $data['title'] = $this->lang->line('setup_title');
     $data['js_code'] = NULL;


     if ($this->input->post()){

      $this->load->library('form_validation');
      $this->form_validation->set_rules('branch_name', $this->lang->line('branch_name'), 'required');
      if($this->form_validation->run() == TRUE){
       $this->Setup_Model->add('branch',array('name'=> $this->input->post('branch_name')));
     }
   }

        //Company information
   $data['company_name'] = $this->expressgo->setup("company_name");
   $data['address'] = $this->expressgo->setup("address");
   $data['city'] = $this->expressgo->setup("city");
   $data['country'] = $this->expressgo->setup("country");
   $data['phone'] = $this->expressgo->setup("phone");
   $data['tax'] = $this->expressgo->setup("tax");
      //Company information end

   $data['branches']= $this->expressgo->getBranch();
   $data['vehicle_class']= $this->expressgo->getClassName();

   $this->load->view('expressgo/static/header_view',$data);
   $this->load->view('expressgo/setup/setup',$data);
   $this->load->view('expressgo/static/footer_view');

 }


 /**
     * Add vehicle class
     */
    public function add_vehicle_class(){

     $data['title'] = $this->lang->line('setup_title');
     $data['js_code'] = NULL;


     if ($this->input->post()){

      $this->load->library('form_validation');
      $this->form_validation->set_rules('class_name', $this->lang->line('class_name'), 'required');
      if($this->form_validation->run() == TRUE){
       $this->Setup_Model->add('vehicle_class',array('name'=> $this->input->post('class_name')));
     }
   }

        //Company information
   $data['company_name'] = $this->expressgo->setup("company_name");
   $data['address'] = $this->expressgo->setup("address");
   $data['city'] = $this->expressgo->setup("city");
   $data['country'] = $this->expressgo->setup("country");
   $data['phone'] = $this->expressgo->setup("phone");
   $data['tax'] = $this->expressgo->setup("tax");
      //Company information end

   $data['vehicle_class']= $this->expressgo->getClassName();
   
   $this->load->view('expressgo/static/header_view',$data);
   $this->load->view('expressgo/setup/setup',$data);
   $this->load->view('expressgo/static/footer_view');

 }

    /**
     * Edit branch
     */
    public function edit_branch($id){

      $this->Setup_Model->update('branch',array('name'=> html_escape($this->input->post('branch_name'))),$id,'id');

      redirect(site_url('/setup'));


    }


 /**
     * Edit vehicle class
     */
    public function edit_vehicle_class($id){

      $this->Setup_Model->update('vehicle_class',array('name'=> html_escape($this->input->post('class_name'))),$id,'id');

      redirect(site_url('/setup'));


    }


   /**
     * Delete branch
     */
   public function delete_branch($id){
    $delete = $this->Setup_Model->delete_branch($id);

    redirect(site_url('/setup'));


  } 

  /**
     * Delete vehicle class
     */
   public function delete_vehicle_class($id){
    $delete = $this->Setup_Model->delete_vehicle_class($id);

    redirect(site_url('/setup'));


  }
  
}

?>