<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class certificate_request extends CI_Controller {

	function __construct()
		{
			parent::__construct();
			$this->load->model('cert_model');
			$this->load->helper(array('form', 'url'));
		}
	
	public function index()
	{
		if($this->session->userdata('logged_in'))
		{
			// $session_data = $this->session->userdata('logged_in');
			// $data['username'] = $session_data['username'];
			$this->load->view('certificate_request');
		}
		else
		{
			//Jika tidak ada session di kembalikan ke halaman login
			redirect('welcome', 'refresh');
		}
	}


	public function request(){
	
		$userdata['domain'] = $this->input->post('domain');
		$userdata['namaOrganisasi'] = $this->input->post('namaOrganisasi');
		$userdata['unitOrganisasi'] = $this->input->post('unitOrganisasi');
		$userdata['kota'] = $this->input->post('kota');
		$userdata['prov'] = $this->input->post('prov');

		$tmp = str_replace(" ","",$userdata['domain']);
		$filename = str_replace(".","_",$tmp);

		$userdata['script'] = 'openssl req -new -newkey rsa:2048 -nodes -out '.$filename.'.csr -keyout '.$filename.'.key -subj "/C=ID/ST='.$userdata['prov'].'/L='.$userdata['kota'].'/O='.$userdata['namaOrganisasi'].'/OU='.$userdata['unitOrganisasi'].'/CN='.$userdata['domain'];
		// openssl req -new -newkey rsa:2048 -nodes -out hmtc_if_its_acid.csr -keyout hmtc_if_its_acid.key -subj "/C=ID/ST=Jawa timur/L=Surabaya/O=HMTC/OU=Information Media Department/CN=hmtc.if.its.acid"

		$res = $this->cert_model->request($userdata);

		foreach ($res->result_array() as $row)
				{
				}

		$data['script'] = 'openssl req -new -newkey rsa:2048 -nodes -out '.$filename.'.csr -keyout '.$filename.'.key -subj "/C=ID/ST='.$userdata['prov'].'/L='.$userdata['kota'].'/O='.$userdata['namaOrganisasi'].'/OU='.$userdata['unitOrganisasi'].'/CN='.$userdata['domain'];
		
		if ($row['statuscode']==0) {
			$this->load->view('CSRscript',$data);
		}
		else{
			echo $row['statusmsg'];
		}
	}

	public function uploadCSR()
	{
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'txt';
		$config['max_size']	= '100';

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());

			// $this->load->view('upload_form', $error);
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());

			// $this->load->view('upload_success', $data);
		}
	}

	public function view(){
		$res = $this->cert_model->view();

		foreach ($res->result_array() as $row)
				{
				}

		$data['certreq']=$res->result_array();
		if ($res->num_rows() > 0){
			if ($row['statuscode']==0) {
				$this->load->view('certificate_request_view', $data);
			}
			else{
				echo $row['statusmsg'];
			}
		}
		else
			echo "NOT FOUND!";
	}

}
