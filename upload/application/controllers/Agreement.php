<?php
/**
 * mazZapp!
 * http://mazzapp.com
 * https://codecanyon.net/user/mazzapp
 * ExpressGo - Car Rental Management System 1.2
 * Controller: Agreement
 **/


// Security file
defined('BASEPATH') OR exit('Not found');

class Agreement extends CI_Controller{

	function __construct(){
		parent::__construct();

    //If Script installed, redirect change password
     if($this->expressgo->setup("install") == 0){
        redirect('/profile');
    }

     //Check login
		if(!$this->session->userdata('login')){redirect('/login');}
    // Load Model
		$this->load->model('Agreement_Model');
     //Language
    $this->config->set_item('language', $this->expressgo->setup("language"));
    $this->lang->load('expressgo', $this->expressgo->setup("language"));
 }

    /**
     * Agreement Index
     */
    public function index(){
    	$data['title'] = $this->lang->line('agreements_title');
    	$data['js_code'] = NULL;
    	$this->load->view('expressgo/static/header_view',$data);

    	//get vehicle data
    	$data['vehicle_data']=$this->expressgo->getVehicles();

    	$data['agreements'] = $this->Agreement_Model->getAgreements();

    	$this->load->view('expressgo/agreements/agreement',$data);
    	$this->load->view('expressgo/static/footer_view');
    }



     /**
     * New agreement
     */
     public function new_agreement(){
     	$data['title'] = $this->lang->line('new_agreement');
     	$data['js_code'] = NULL;
     	$data['form_contents'] = NULL;
     	$this->load->view('expressgo/static/header_view',$data);
        //get branch
     	$data['branch']=$this->expressgo->getBranch();

     	$this->load->view('expressgo/agreements/new_agreements_1',$data);
     	$this->load->view('expressgo/static/footer_view');
     }


   /**
     * New agreement step 2
     */
   public function step2(){
   	$data['title'] = $this->lang->line('new_agreement');
   	$data['js_code']=NULL;
    $data['currency'] = $this->expressgo->setup("currency");


   	$this->load->view('expressgo/static/header_view',$data);

            //post update data
   	if ($this->input->post()){

   		$this->load->library('form_validation');
   		$this->form_validation->set_rules('from', $this->lang->line('start_date'), 'required');
   		$this->form_validation->set_rules('to', $this->lang->line('end_date'), 'required');
      $po_vehicle_id=$this->input->post("vehicle_id");
   		if(empty($po_vehicle_id)){
   			redirect(site_url() . '/agreement/new');
   		}

   		if($this->form_validation->run() == TRUE){

   			$data['to'] = $this->input->post("to");
   			$data['from'] = $this->input->post("from");
   			$data['branch_id'] = $this->input->post("branch");
   			$data['vehicle_id'] = $this->input->post("vehicle_id");


                //get vehicle data
   			$vehicle_data=$this->Agreement_Model->getVehicleInfo($data['vehicle_id']);

   			foreach ($vehicle_data as $_vehicle_data) {
   				$data['r_one_day'] = $_vehicle_data['1day'];
   				$data['r_weekly'] = $_vehicle_data['weekly'];
   				$data['r_monthly'] = $_vehicle_data['monthly'];
   			}

			//calculate rates
   			$total_day = strtotime($data['to']) - strtotime($data['from']);
   			$data['total_day'] = floor($total_day / (60 * 60 * 24));

   			$datetime1 = new DateTime($data['from']);
   			$datetime2 = new DateTime($data['to']);
   			$interval = $datetime1->diff($datetime2);


   			$days  = $interval->format('%d');
   			$calc_month = $interval->format('%m');
   			$calc_weeks = floor($days/7);
   			$calc_days = $days-($calc_weeks*7);


   			if($calc_days > 0){
   				$r_one_day=$calc_days*$data['r_one_day'];
   				$data['daily_rate'] =' <tr>
   				<th>'.$this->lang->line('daily_rate').'</th><td>'.$calc_days.''.$this->lang->line('day_s').' ('.$data['r_one_day'].' '.$data['currency'].')</td><td>'.$r_one_day.' '.$data['currency'].' </td>
   				</tr>';

   			}else{
   				$data['daily_rate']= NULL;
   				$r_one_day=0;
   			}

   			if($calc_weeks > 0){
   				$r_weekly=$calc_weeks*$data['r_weekly'];
   				$data['weekly_rate'] ='<tr>
   				<th>'.$this->lang->line('weekly_rate').'</th><td>'.$calc_weeks.' '.$this->lang->line('week_s').' ('.$data['r_weekly'].' '.$data['currency'].')</td><td>'.$r_weekly.' '.$data['currency'].'</td>
   				</tr>
   				';

   			}else{
   				$data['weekly_rate'] = NULL;
   				$r_weekly=0;
   			}

   			if($calc_month > 0){
   				$r_monthly = $calc_month*$data['r_monthly'];
   				$data['monthly_rate']='<tr>
   				<th>'.$this->lang->line('monthly_rate').'</th><td>'.$calc_month.' '.$this->lang->line('month').' ('.$data['r_monthly'].' '.$data['currency'].')</td><td>'.$r_monthly.' '.$data['currency'].'</td>
   				</tr>';
   			}else{
   				$data['monthly_rate']=NULL;
   				$r_monthly=0;
   			}

        
			//calculate rates end

   			//calc subtotal_amount
   			$data['subtotal_amount'] =$r_one_day+$r_weekly+$r_monthly;

   			$data['rates_value']='
   			<input type="hidden" name="daily_rate" value="'.$r_one_day.'"/>
   			<input type="hidden" name="daily_desc" value="'.$calc_days.' day(s) ('.$data['r_one_day'].' '.$data['currency'].')"/>
   			<input type="hidden" name="monthly_rate" value="'.$r_monthly.'"/>
   			<input type="hidden" name="monthly_desc" value="'.$calc_month.' month ('.$data['r_monthly'].' '.$data['currency'].')"/>
   			<input type="hidden" name="weekly_rate" value="'.$r_weekly.'"/>
   			<input type="hidden" name="weekly_desc" value="'.$calc_weeks.' week(s) ('.$data['r_weekly'].' '.$data['currency'].')"/>';
   			//get sales tax
   			foreach ($this->Agreement_Model->getSalesTax() as $setup) {
   				$data['tax']= $setup['value'];
   			}
   			//total_amount
   			$data['total_amount'] = ($data['subtotal_amount']*$data['tax']/100)+$data['subtotal_amount'];

   			$this->load->view('expressgo/agreements/new_agreements_2',$data);


   		}else{
         $data['branch']=$this->expressgo->getBranch();
   			$this->load->view('expressgo/agreements/new_agreements_1',$data);
   		}
   	}else{
   		redirect(site_url() . '/agreement/new');
   	}

   	$this->load->view('expressgo/static/footer_view');
   }


  	/**
     * Finish agreement
     */
  	public function finish(){
  		$data['title'] = $this->lang->line('finish');
  		$data['js_code'] = NULL;
  		$data['form_contents'] = NULL;
  		$this->load->view('expressgo/static/header_view',$data);


  		if ($this->input->post()){
        $p_client_id = $this->input->post('client_id');
        $p_driver_id = $this->input->post('driver_id');
        if(empty($p_client_id) || empty($p_driver_id)){
          redirect(site_url() . '/agreement/new');
        }

        	//agreement parameters
        $agreement_parameters = array(
          'date_from'     => $this->input->post('from'),
          'date_to'     => $this->input->post('to'),
          'branch_id'     => $this->input->post('branch_id'),
          'vehicle_id'     => $this->input->post('vehicle_id'),
          'client_id'     => $this->input->post('client_id'),
          'fuel'     => $this->input->post('fuel'),
          'odometer'     => $this->input->post('odometer'),
          'monthly'     => $this->input->post('monthly'),
          'weekly'     => $this->input->post('weekly'),
          'one_day'     => $this->input->post('one_day'),
          'deposit_amount'     => $this->input->post('deposit'),
          'deposit_method'     => $this->input->post('deposit_method'),
          'monthly_desc'     => $this->input->post('monthly_desc'),
          'weekly_desc'     => $this->input->post('weekly_desc'),
          'daily_desc'     => $this->input->post('daily_desc')
        );


            // Add agreement database
        $add_agreement = $this->Agreement_Model->add('agreements',$agreement_parameters);

    		//invoice parameters
        $invoice_parameters = array(
          'status'     => 0,
          'agr_id'     => $add_agreement,
          'subtotal'     => $this->input->post('subtotal'),
          'total'     => $this->input->post('total'),
          'tax'     => $this->input->post('tax')
        );

        $add_invoice = $this->Agreement_Model->add('invoices',$invoice_parameters);

    			//payment parameters
        $add_payment = $this->Agreement_Model->add('payments',array(
          'invoice_id'     => $add_invoice,
          'description'     => 'VehicleRental - from '.$this->input->post('from').' to '.$this->input->post('to').' ('.$this->input->post('total_day').')',
          'amount'     => '-'.$this->input->post('total').''
        ));


     //vehicle available status change
        $this->Agreement_Model->update("vehicles",array("available"=>1),$this->input->post('vehicle_id'),"id");
        $this->Agreement_Model->update("invoices",array("vehicle_status"=>1), $add_invoice,"id");

     //check deposit
        if($this->input->post('deposit') > 0){

      //add deposit
          $payment_deposit = $this->Agreement_Model->add('payments',array(
           'invoice_id'     => $add_invoice,
           'description'     => 'Deposit',
           'amount'     => $this->input->post('deposit')
         ));

        }

        redirect(site_url("/invoices/$add_invoice"));

      }

      $this->load->view('expressgo/agreements/new_agreements_1',$data);
      $this->load->view('expressgo/static/footer_view');
    }


    /**
     * View agreements
     */
    public function view($id){
    	$data['title']=$this->lang->line('view');
    	$data['js_code'] = NULL;
       $data['currency'] = $this->expressgo->setup("currency");
          //Company information
    	$data['e_company_name'] = $this->expressgo->setup("company_name");
    	$data['e_address'] = $this->expressgo->setup("address");
    	$data['e_city'] = $this->expressgo->setup("city");
    	$data['e_country'] = $this->expressgo->setup("country");
    	$data['e_phone'] = $this->expressgo->setup("phone");
      //Company information end

    	$data['agreements'] = $this->Agreement_Model->getAgreement($id);

    	$this->load->view('expressgo/static/header_view',$data);
    	$this->load->view('expressgo/agreements/view_agreement',$data);
    	$this->load->view('expressgo/static/footer_view');
    }  



    /**
     * Check in
     */

    public function check_in($id){
    	$data['title']="Check In";
    	$data['js_code'] = NULL;

      //get vehicle id with invoice id
      foreach ($this->Agreement_Model->getAgreementInfo($id) as $getAgreementInfo) {
        $vehicle_id=$getAgreementInfo['vehicle_id'];
      }
      
    	  //vehicle available status change
      $this->Agreement_Model->update("vehicles",array("available"=>0),$vehicle_id,"id");
      $this->Agreement_Model->update("invoices",array("vehicle_status"=>0), $id,"agr_id");

      redirect(site_url("/dashboard"));
    }


    /**
     * Print agreements
     */
    public function print_agreement($id){
    	$data['title']="Print";
    	$data['js_code'] = NULL;
      $data['currency'] = $this->expressgo->setup("currency");
          //Company information
    	$data['e_company_name'] = $this->expressgo->setup("company_name");
    	$data['e_address'] = $this->expressgo->setup("address");
    	$data['e_city'] = $this->expressgo->setup("city");
    	$data['e_country'] = $this->expressgo->setup("country");
    	$data['e_phone'] = $this->expressgo->setup("phone");
      //Company information end

    	$data['agreements'] = $this->Agreement_Model->getAgreement($id);

    	$this->load->view('expressgo/agreements/print',$data);
    }  


   /**
     * Delete agreements
     */
   public function delete($id){

  //get vehicle id with invoice id
   	foreach ($this->Agreement_Model->getAgreementInfo($id) as $getAgreementInfo) {
   		$vehicle_id=$getAgreementInfo['vehicle_id'];
   	}

   //vehicle available status change
   	$this->Agreement_Model->update("vehicles",array("available"=>0), $vehicle_id,"id");
   	$this->Agreement_Model->update("invoices",array("vehicle_status"=>0), $id,"agr_id");

   	$delete = $this->Agreement_Model->delete($id);

   	redirect(site_url('/agreement'));


   }

 }

 ?>