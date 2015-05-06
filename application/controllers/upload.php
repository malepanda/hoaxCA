<?php

class Upload extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->model('cert_model');
	}

	function index()
	{
		$this->load->view('upload_form', array('error' => ' ' ));
	}

	function do_upload()
	{
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'csr';
		$config['file_name'] = $this->input->post('ID');
		// // $config['max_size']	= '100';
		// $config['max_width']  = '1024';
		// $config['max_height']  = '768';
		// echo $this->input->post('ID');
		$data['filepath'] = $config['upload_path'].$config['file_name'];
		$data['ID'] = $config['file_name'];
		$this->cert_model->uploadCSR($data);
		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());

			$this->load->view('upload_form', $error);
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());

			// $this->load->view('sukses');
			redirect(base_url().'certificate_request/view');
		}
	}
}
?>