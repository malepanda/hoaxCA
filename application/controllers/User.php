<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	// public function index()
	// {
	// 	$username = $this->input->post('username');
	// 	$password = $this->input->post('password');

	// 	$this->load->view('sukses');
	// }

	function __construct()
		{
			parent::__construct();
			$this->load->model('user_model');
		}

	public function login(){

		if($this->session->userdata('logged_in'))
		{
			// $session_data = $this->session->userdata('logged_in');
			// $data['username'] = $session_data['username'];
			redirect('homepage', 'refresh');
		}
		else
		{
			$userdata['username'] = $this->input->post('username');
			$userdata['password'] = $this->input->post('password');
			$res = $this->user_model->login($userdata);

			foreach ($res->result_array() as $row)
					{
					}

			if ($row['statuscode']==0) {

				if ($userdata['username']=='admin') {
					$sess_array = array(
						'username' => $userdata['username'],
						'loginas' => 'admin'
					);
					$this->session->set_userdata('logged_in', $sess_array);
					redirect('admin', 'refresh');
				}
				else{
					$sess_array = array(
							'username' => $userdata['username'],
							'loginas' => 'member'
							);
					$this->session->set_userdata('logged_in', $sess_array);
					redirect('homepage', 'refresh');
				}


			}
			else{
				echo $row['statusmsg'];
				redirect('user/login', 'refresh');
			}
		}
		
		
	}

	public function regist(){
		$userdata['username'] = $this->input->post('username');
		$userdata['password'] = $this->input->post('password');
		$userdata['nama'] = $this->input->post('nama');
		$userdata['alamat'] = $this->input->post('alamat');
		$userdata['email'] = $this->input->post('email');
		$userdata['nokontak'] = $this->input->post('nokontak');

		$res = $this->user_model->register($userdata);

		foreach ($res->result_array() as $row)
				{
				}

		if ($row['statuscode']==0) {
			$this->load->view('sukses');
		}
		else{
			echo $row['statusmsg'];
		}
	}

	public function register(){
		$this->load->view('register');
	}

<<<<<<< HEAD
	public function buatCSR(){
		$this->load->view('certificate_request');
	}
	
=======
>>>>>>> 1d9e011b2e6fa8e5f873f0650894a4d65b1610f2
	function logout()
	{
		$this->session->unset_userdata('logged_in');
		session_destroy();
		redirect('welcome', 'refresh');
	}
}
