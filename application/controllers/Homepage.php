<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class homepage extends CI_Controller {


	public function index()
	{
		if($this->session->userdata('logged_in'))
		{
			// $session_data = $this->session->userdata('logged_in');
			// $data['username'] = $session_data['username'];
			
			$this->load->view('homepage');
		}
		else
		{
			//Jika tidak ada session di kembalikan ke halaman login
			redirect('welcome', 'refresh');
		}
	}

}
