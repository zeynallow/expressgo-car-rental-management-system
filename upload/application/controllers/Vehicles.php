<?php
/**
 * mazZapp!
 * http://mazzapp.com
 * https://codecanyon.net/user/mazzapp
 * ExpressGo - Car Rental Management System 1.2
 * Controller: Vehicles
 **/


// Security file
defined('BASEPATH') OR exit('Not found');

class Vehicles extends CI_Controller{

    function __construct(){
        parent::__construct();

          //If Script installed, redirect change password
        if($this->expressgo->setup("install") == 0){
            redirect('/profile');
        }
        
         //Check login
        if(!$this->session->userdata('login')){redirect('/login');}

        // Load Model
        $this->load->model('Vehicles_Model');

         //Language
        $this->config->set_item('language', $this->expressgo->setup("language"));
        $this->lang->load('expressgo', $this->expressgo->setup("language"));
    }

    /**
     * Vehicles Index
     */

    public function index(){
        $data['title'] = $this->lang->line('vehicles_title');
        $data['js_code'] = NULL;
        $this->load->view('expressgo/static/header_view',$data);

       //get vehicles
        $data['vehicles'] = $this->Vehicles_Model->getVehicles();

        $this->load->view('expressgo/vehicles/vehicles',$data);
        $this->load->view('expressgo/static/footer_view');
    }

   /**
     * View Vehicle
     */
   public function view($id){
    $data['title'] = $this->lang->line('view');
    $data['js_code'] = NULL;
    $this->load->view('expressgo/static/header_view',$data);

    $data['_id'] = $id;


    //get vehicle data
    $data['vehicles'] = $this->Vehicles_Model->getVehicleInfo($id);

    $data['rental_history'] = $this->Vehicles_Model->getRentalHistroy($id);

    $this->load->view('expressgo/vehicles/view_vehicle',$data);
    $this->load->view('expressgo/static/footer_view');
}



     /**
     * Add Vehicles
     */
     public function add(){
        $data['title'] = $this->lang->line('add_vehicle');
        $data['js_code'] = NULL;
        $data['form_contents'] = NULL;
        $data['currency'] = $this->expressgo->setup("currency");
        
        $this->load->view('expressgo/static/header_view',$data);
        $data['branch']=$this->expressgo->getBranch();
        $data['vehicle_class']=$this->expressgo->getClassName();
          //New vehicle add database
        if ($this->input->post()){

            //Form validation
            $this->load->library('form_validation');
            $this->form_validation->set_rules('license_plate', $this->lang->line('license_plate'), 'required');
            $this->form_validation->set_rules('vin', $this->lang->line('make'), 'required');
            $this->form_validation->set_rules('make', $this->lang->line('make'), 'required');
            $this->form_validation->set_rules('model', $this->lang->line('model'), 'required');
            $this->form_validation->set_rules('year', $this->lang->line('year'), 'required');
            $this->form_validation->set_rules('color', $this->lang->line('color'), 'required');
            $this->form_validation->set_rules('1day', $this->lang->line('1day'), 'required');
            $this->form_validation->set_rules('weekly', $this->lang->line('weekly'), 'required');
            $this->form_validation->set_rules('monthly', $this->lang->line('monthly'), 'required');
            //Form validation end


            if($this->form_validation->run() == TRUE){

                

            //vehicle parameters
                $vehicle_parameters = array(
                    'license_plate'     => html_escape($this->input->post('license_plate')),
                    'vin'     => html_escape($this->input->post('vin')),
                    'make'     => html_escape($this->input->post('make')),
                    'model'     => html_escape($this->input->post('model')),
                    'year'     => html_escape($this->input->post('year')),
                    'color'     => html_escape($this->input->post('color')),
                    'class'     => html_escape($this->input->post('class')),
                    'transmission'     => html_escape($this->input->post('transmission')),
                    'engine'     => html_escape($this->input->post('engine')),
                    'fuel_type'     => html_escape($this->input->post('fuel_type')),
                    'branch_id'     => html_escape($this->input->post('branch_id')),
                    '1day'     => html_escape($this->input->post('1day')),
                    'weekly'     => html_escape($this->input->post('weekly')),
                    'monthly'     => html_escape($this->input->post('monthly'))
                );


            // Add vehicle database
                $add_vehicle = $this->Vehicles_Model->add('vehicles',$vehicle_parameters);


                if($add_vehicle){
                    $data['js_code'].= ' $.notify({
                        icon: "ti-check",
                        message: "'.$this->lang->line('successful').'"

                    },{
                        type: "success",
                        timer: 4000
                    });
                    setTimeout(function(){window.location.href="'.base_url().'index.php/vehicles"},2000);
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

    $this->load->view('expressgo/vehicles/add_vehicle',$data);
    $this->load->view('expressgo/static/footer_view');
}


    /**
     * Edit Vehicles
     */
    public function edit($id){
        $data['title'] = $this->lang->line('edit_vehicle');
        $data['js_code'] = NULL;
        $data['form_contents'] = NULL;
        $this->load->view('expressgo/static/header_view',$data);
        $data['branch']=$this->expressgo->getBranch();
        $data['vehicle_class']=$this->expressgo->getClassName();
        
         //post update data
        if ($this->input->post()){

            //Form validation
            $this->load->library('form_validation');
            $this->form_validation->set_rules('license_plate', $this->lang->line('license_plate'), 'required');
            $this->form_validation->set_rules('vin', $this->lang->line('make'), 'required');
            $this->form_validation->set_rules('make', $this->lang->line('make'), 'required');
            $this->form_validation->set_rules('model', $this->lang->line('model'), 'required');
            $this->form_validation->set_rules('year', $this->lang->line('year'), 'required');
            $this->form_validation->set_rules('color', $this->lang->line('color'), 'required');
            $this->form_validation->set_rules('1day', $this->lang->line('1day'), 'required');
            $this->form_validation->set_rules('weekly', $this->lang->line('weekly'), 'required');
            $this->form_validation->set_rules('monthly', $this->lang->line('monthly'), 'required');
            //Form validation end


            if($this->form_validation->run() == TRUE){


            //vehicle parameters
                $vehicle_parameters = array(
                    'license_plate'     => html_escape($this->input->post('license_plate')),
                    'vin'     => html_escape($this->input->post('vin')),
                    'make'     => html_escape($this->input->post('make')),
                    'model'     => html_escape($this->input->post('model')),
                    'year'     => html_escape($this->input->post('year')),
                    'color'     => html_escape($this->input->post('color')),
                    'class'     => html_escape($this->input->post('class')),
                    'transmission'     => html_escape($this->input->post('transmission')),
                    'engine'     => html_escape($this->input->post('engine')),
                    'fuel_type'     => html_escape($this->input->post('fuel_type')),
                    'branch_id'     => html_escape($this->input->post('branch_id')),
                    '1day'     => html_escape($this->input->post('1day')),
                    'weekly'     => html_escape($this->input->post('weekly')),
                    'monthly'     => html_escape($this->input->post('monthly'))
                );


            // Update vehicle database
                $update_vehicle = $this->Vehicles_Model->update('vehicles',$vehicle_parameters,$id,'id');



                if($update_vehicle){
                    $data['js_code'].= ' $.notify({
                        icon: "ti-check",
                        message: "'.$this->lang->line('successful').'"

                    },{
                        type: "success",
                        timer: 4000
                    });
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

         } //validate end

         } //form end

          //get vehicle
         $getVehicleInfo = $this->Vehicles_Model->getVehicleInfo($id);
         if($getVehicleInfo){
            foreach($getVehicleInfo as $VehicleInfo){
                $data['form_contents'] = $VehicleInfo;
            }


        }else{
            redirect(site_url('/vehicles'));
        }



        $this->load->view('expressgo/vehicles/edit_vehicle',$data);
        $this->load->view('expressgo/static/footer_view');
    }


    /**
     * Delete Vehicle
     */
    public function delete($id){
        $delete = $this->Vehicles_Model->delete($id);
        if($delete){
            redirect(site_url('/vehicles'));
        }else{
            redirect(site_url('/vehicles'));
        }

    }
}

?>