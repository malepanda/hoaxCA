<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class admin extends CI_Controller {

	function __construct()
		{
			parent::__construct();
			$this->load->model('cert_model');
		}

	public function index()
	{
		if($this->session->userdata('logged_in'))
		{
			// $session_data = $this->session->userdata('logged_in');
			// $data['username'] = $session_data['username'];
			$this->load->view('adminpage');
		}
		else
		{
			//Jika tidak ada session di kembalikan ke halaman login
			redirect('welcome', 'refresh');
		}
	}

	public function viewCSR(){

		$res = $this->cert_model->view();
		foreach ($res->result_array() as $row)
				{
				}

		$data['certreq']=$res->result_array();
		if ($res->num_rows() > 0){
			if ($row['statuscode']==0) {
				$this->load->view('viewCSR', $data);
			}
			else{
				echo $row['statusmsg'];
			}
		}
		else
			echo "NOT FOUND!";
	}

	public function accCSR(){
		if ($this->input->post('dec')==null) {
			$ID = $this->input->post('acc');
		}
		else
			$ID = $this->input->post('dec');
		echo $ID;
	}
<<<<<<< HEAD
	public function kehome(){
		$this->load->view('homeadmin');
	}
=======
>>>>>>> 1d9e011b2e6fa8e5f873f0650894a4d65b1610f2

}
