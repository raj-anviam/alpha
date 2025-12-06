<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('common_model');
		$this->load->model('admin/admin_model');
	}

	function get_payment_requests()
	{
		$payRec = $this->admin_model->get_user_payment_requests();
		$data['payRec'] = $payRec;
		$this->load->view('admin/payment_requests',$data);
	}

	function get_introducing_requests()
	{
		$payRec = $this->admin_model->get_introducing_requests();
		$data['payRec'] = $payRec;
		$this->load->view('admin/introducing_requests',$data);
	}

	function change_alphaib_status()
	{
		$uri3 = (int)base64d($this->uri->segment(3));
		if($uri3 <=0){
			echo 'PLease contact Administrator.';
			exit;
		}
		$uri4 = (int)$this->uri->segment(4);
		$status_changed_date = date('Y-m-d');
		if($uri4 == 1){
			$ib_no = get_ibno();
			$uData = array('status'=>1,'referal_code'=>$ib_no,'status_changed_date'=>$status_changed_date);
		}else{
			$uData = array('status'=>2,'referal_code'=>'','status_changed_date'=>$status_changed_date);
		}
		$rData = $this->common_model->update($uri3,$uData,'itroducing_alpha_id','itroducing_alpha');
		if(is_numeric($rData)){
			if($uri4 == 1){
				$userData = $this->admin_model->get_introducing_requests($uri3);
				if(!empty($userData)){
					$email = $userData[0]['email'];
					$this->load->library('Email_lib');
					$mailMsg = '<h2>Congratulations Your request for affialiate program is approved.</h2><h3> Your Refferal code is - ' . $ib_no . '</h3>';
					$result = $this->email_lib->send_email(
						$email,
						'Refer & Earn application.',
						$mailMsg
					);
				}
			}
		}
		redirect('admin/get_introducing_requests');
	}
	
	function get_user_tree(){
		$user_id = 3;
		$user_tree_rec = $this->admin_model->get_user_tree($user_id);
		echo '<pre>'; print_r($user_tree_rec); exit;
		$this->load->view('admin/get_user_tree');
	}




}//End Class
