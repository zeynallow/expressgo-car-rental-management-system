<?php
/**
 * mazZapp!
 * http://mazzapp.com
 * https://codecanyon.net/user/mazzapp
 * ExpressGo - Car Rental Management System 1.2
 * Controller: Clients
 **/


// Security file
defined('BASEPATH') OR exit('Not found');

class Clients extends CI_Controller{

  function __construct(){
    parent::__construct();

      //If Script installed, redirect change password
    if($this->expressgo->setup("install") == 0){
      redirect('/profile');
    }
    
    //Check login
    if(!$this->session->userdata('login')){redirect('/login');}

    // Load Model
    $this->load->model('Clients_Model');

     //Language
    $this->config->set_item('language', $this->expressgo->setup("language"));
    $this->lang->load('expressgo', $this->expressgo->setup("language"));
  }

   /**
     * Clients Index
     */

   public function index(){
    $data['title'] = $this->lang->line('clients_title');
    $data['js_code'] = NULL;
    $this->load->view('expressgo/static/header_view',$data);

    //get clients
    $data['clients'] = $this->Clients_Model->getClients();

    $this->load->view('expressgo/clients/clients',$data);
    $this->load->view('expressgo/static/footer_view');
  }


    /**
     * View Client
     */

    public function view($id){
      $data['title'] = ''.$this->lang->line('clients_title').' # '.$id.'';
      $data['js_code'] = NULL;
      $this->load->view('expressgo/static/header_view',$data);

    //get client data
      $data['clients'] = $this->Clients_Model->getClientInfo($id);
    //get driver data
      $data['drivers'] = $this->Clients_Model->getDriverInfo($id);

      $this->load->view('expressgo/clients/view_client',$data);
      $this->load->view('expressgo/static/footer_view');
    }


    /**
     * Edit clients
     */

    public function edit($id){
      $data['title'] = $this->lang->line('edit');
      $data['js_code'] = NULL;
      $this->load->view('expressgo/static/header_view',$data);

      //post update data
      if ($this->input->post()){

          //Form validation
        $this->load->library('form_validation');
        $this->form_validation->set_rules('cell_phone', $this->lang->line('cell_phone'), 'required');
        $this->form_validation->set_rules('passport_id', $this->lang->line('passport_id'), 'required');
        $this->form_validation->set_rules('birth_date', $this->lang->line('birth_date'), 'required');
        $this->form_validation->set_rules('first_name', $this->lang->line('first_name'), 'required');
        $this->form_validation->set_rules('driving_license', $this->lang->line('driving_license'), 'required');
        $this->form_validation->set_rules('license_category', $this->lang->line('license_category'), 'required');
        $this->form_validation->set_rules('license_exp_d', $this->lang->line('license_exp_d'), 'required');
        $this->form_validation->set_rules('driver_firstname', $this->lang->line('first_name'), 'required');
        $this->form_validation->set_rules('driver_lastname', $this->lang->line('last_name'), 'required');
          //Form validation end



        if($this->form_validation->run() == TRUE){

        //client parameters
          $client_parameters = array(
            'company_name'     => html_escape($this->input->post('company_name')),
            'first_name'     => html_escape($this->input->post('first_name')),
            'last_name'     => html_escape($this->input->post('last_name')),
            'passport_id'     => html_escape($this->input->post('passport_id')),
            'birth_date'     => html_escape($this->input->post('birth_date')),
            'place_of_birth'     => html_escape($this->input->post('place_of_birth')),
            'home_address'     => html_escape($this->input->post('home_address')),
            'city'     => html_escape($this->input->post('city')),
            'country'     => html_escape($this->input->post('country')),
            'postal_code'     => html_escape($this->input->post('postal_code')),
            'home_phone'     => html_escape($this->input->post('home_phone')),
            'work_phone'     => html_escape($this->input->post('work_phone')),
            'local_phone'     => html_escape($this->input->post('local_phone')),
            'cell_phone'     => html_escape($this->input->post('cell_phone')),
            'e_mail'     => html_escape($this->input->post('e_mail')),
            'flight_number'     => html_escape($this->input->post('flight_number')),
            'pickup'     => html_escape($this->input->post('pickup')),
            'dropoff'     => html_escape($this->input->post('dropoff'))
          );


          // Add client database
          $add_client = $this->Clients_Model->update('clients',$client_parameters,$id,'id');

        //driver parameters
          $driver_parameters = array(
            'driving_license'     => html_escape($this->input->post('driving_license')),
            'license_category'     => html_escape($this->input->post('license_category')),
            'first_name'     => html_escape($this->input->post('driver_firstname')),
            'last_name'     => html_escape($this->input->post('driver_lastname')),
            'client_id'     => $add_client,
            'license_exp'     => html_escape($this->input->post('license_exp_d'))
          );

        //add driver database
          $add_driver = $this->Clients_Model->update('drivers',$driver_parameters,$id,'client_id');


          if($add_client){
            $data['js_code'].= ' $.notify({
              icon: "ti-check",
              message: "'.$this->lang->line('successful').'"

            },{
              type: "success",
              timer: 4000
            });
            ';

          }

         } //validation end
       }
    //end post

    //get client
       $getClientInfo = $this->Clients_Model->getClientInfo($id);
    //get driver
       $getDriverInfo = $this->Clients_Model->getDriverInfo($id);

       if($getClientInfo){
        foreach($getClientInfo as $ClientInfo){
          $data['client_contents'] = $ClientInfo;
        }
      }else{
        redirect(site_url('/clients'));
      }

      if($getDriverInfo){
        foreach($getDriverInfo as $DriverInfo){
          $data['driver_contents'] = $DriverInfo;
        }
      }else{
        $data['driver_contents']=NULL;
      }


      $this->load->view('expressgo/clients/edit_client',$data);
      $this->load->view('expressgo/static/footer_view');
    }


    /**
     * Add client
     */
    public function add(){
      $data['title'] = $this->lang->line('add_client');
      $data['js_code'] = NULL;
      $data['form_contents'] = NULL;
      $this->load->view('expressgo/static/header_view',$data);


        //New client add database
      if ($this->input->post()){

        //Form validation
        $this->load->library('form_validation');
        $this->form_validation->set_rules('cell_phone', $this->lang->line('cell_phone'), 'required');
        $this->form_validation->set_rules('passport_id', $this->lang->line('passport_id'), 'required');
        $this->form_validation->set_rules('birth_date', $this->lang->line('birth_date'), 'required');
        $this->form_validation->set_rules('first_name', $this->lang->line('first_name'), 'required');
        $this->form_validation->set_rules('driving_license', $this->lang->line('driving_license'), 'required');
        $this->form_validation->set_rules('license_category', $this->lang->line('license_category'), 'required');
        $this->form_validation->set_rules('license_exp_d', $this->lang->line('license_exp_d'), 'required');
        $this->form_validation->set_rules('driver_firstname', $this->lang->line('first_name'), 'required');
        $this->form_validation->set_rules('driver_lastname', $this->lang->line('last_name'), 'required');
        //Form validation end


        if($this->form_validation->run() == TRUE){


        //client parameters
          $client_parameters = array(
            'company_name'     => $this->input->post('company_name'),
            'first_name'     => $this->input->post('first_name'),
            'last_name'     => $this->input->post('last_name'),
            'passport_id'     => $this->input->post('passport_id'),
            'birth_date'     => $this->input->post('birth_date'),
            'place_of_birth'     => $this->input->post('place_of_birth'),
            'home_address'     => $this->input->post('home_address'),
            'city'     => $this->input->post('city'),
            'country'     => $this->input->post('country'),
            'postal_code'     => $this->input->post('postal_code'),
            'home_phone'     => $this->input->post('home_phone'),
            'work_phone'     => $this->input->post('work_phone'),
            'local_phone'     => $this->input->post('local_phone'),
            'cell_phone'     => $this->input->post('cell_phone'),
            'e_mail'     => $this->input->post('e_mail'),
            'flight_number'     => $this->input->post('flight_number'),
            'pickup'     => $this->input->post('pickup'),
            'dropoff'     => $this->input->post('dropoff')
          );


          // Add client database
          $add_client = $this->Clients_Model->add('clients',$client_parameters);

        //driver parameters
          $driver_parameters = array(
            'driving_license'     => $this->input->post('driving_license'),
            'license_category'     => $this->input->post('license_category'),
            'first_name'     => $this->input->post('driver_firstname'),
            'last_name'     => $this->input->post('driver_lastname'),
            'client_id'     => $add_client,
            'license_exp'     => $this->input->post('license_exp_d')
          );

        //add driver database
          $add_driver = $this->Clients_Model->add('drivers',$driver_parameters);

          if($add_client){
            $data['js_code'].= ' $.notify({
              icon: "ti-check",
              message: "'.$this->lang->line('successful').'"

            },{
              type: "success",
              timer: 4000
            });
            setTimeout(function(){window.location.href="'.base_url().'index.php/clients"},3000);
            ';

          }else{

            $data['js_code'].= ' $.notify({
              icon: "ti-close",
              message: "'.$this->lang->line('unsuccessful').'"

            },{
              type: "danger",
              timer: 4000
            });';

          }

         }else{  //confirm end
          //save form inputs
          $data['form_contents'] = $this->input->post();
        } 

      }

      $this->load->view('expressgo/clients/add_client',$data);
      $this->load->view('expressgo/static/footer_view');

    }

   /**
     * Delete client
     */

   public function delete($id){
    $delete = $this->Clients_Model->delete($id);
    if($delete){
      redirect(site_url('/clients'));
    }else{
      redirect(site_url('/clients'));
    }

  }


}

?>