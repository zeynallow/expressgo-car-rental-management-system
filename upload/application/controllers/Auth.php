<?php
/**
 * mazZapp!
 * http://mazzapp.com
 * https://codecanyon.net/user/mazzapp
 * ExpressGo - Car Rental Management System 1.2
 * Controller: Auth
 **/

// Security file
defined('BASEPATH') OR exit('Not found');

class Auth extends CI_Controller{

    function __construct(){
        parent::__construct();
          // Load Model
        $this->load->model('Auth_Model');

         //Language
        $this->config->set_item('language', $this->expressgo->setup("language"));
        $this->lang->load('expressgo', $this->expressgo->setup("language"));
        
    }

    /**
     * Login
     */
    public function login(){


        $data['alert']=NULL;
        // Post data
        if(isset($_POST['loginF'])){
           $_login   = $this->input->post('login');
           $password = $this->input->post('password');

         //check login data
           $login = $this->Auth_Model->login($_login,$password);
           if($login){
            // Save session
            $this->session->set_userdata('username',$_login);
            $this->session->set_userdata('password',$password);
            $this->session->set_userdata('login',TRUE);
            redirect('/dashboard');
        }else{
            $data['alert']='<br/><div class="alert alert-danger">
            <span><b> '.$this->lang->line('error').' - </b> '.$this->lang->line('login_password_wrong').'</span>
            </div>';
        }
    }

    $this->load->view('expressgo/auth/login_view',$data);
}

    /**
     * Logout
     */
    public function logout(){
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('password');
        $this->session->unset_userdata('login');
        redirect('/login');
    }




    /**
     * Password change
     */
    public function profile(){

       //If Script installed, check login
     if($this->expressgo->setup("install") == 1){
        if(!$this->session->userdata('login')){redirect('/login');}
    }


    $data['title'] = $this->lang->line('profile');
    $data['alert']=NULL;
    $data['js_code']=NULL;
    $this->load->view('expressgo/static/header_view',$data);

        //Post data
    if ($this->input->post()){

        $new_password = $this->input->post("new_password");
        $confirm_password = $this->input->post("confirm_password");
                //Check new password
        if(empty($new_password)){
            $data['alert']='<br/><div class="alert alert-danger">
            <span><b> '.$this->lang->line('error').' - </b> '.$this->lang->line('password_not_empty').'</span>
            </div>';
        }elseif($new_password == $confirm_password){

            $parameters = array(
                'password'=> $this->input->post('new_password')
            );
            $this->Auth_Model->update($parameters);

            $this->session->set_userdata('password',$this->input->post('new_password'));

            if($this->expressgo->setup("install") == 1){
                $data['alert']='<br/><div class="alert alert-success">
                <span><b> '.$this->lang->line('successful').' - </b> '.$this->lang->line('password_changed').'</span>
                </div>';
            }else{
                $this->Auth_Model->s_update('setup',array('value'=> 1),'install','parameter');
                redirect(site_url('/login'));
            }

            
        }else{
            $data['alert']='<br/><div class="alert alert-danger">
            <span><b> '.$this->lang->line('error').' - </b> '.$this->lang->line('password_not_same').'</span>
            </div>';
        }


    }



    $this->load->view('expressgo/auth/profile',$data);
    $this->load->view('expressgo/static/footer_view');
}

}

?>