<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Download extends CI_Controller {

	function __construct()
		{
			parent::__construct();
			$this->load->model('cert_model');
		}

	public function index()
	{
		if($this->session->userdata('logged_in'))
		{
			$this->load->helper('download');
            $data['ID'] = $this->input->post('download');
            $res = $this->cert_model->download($data);
            foreach ($res->result_array() as $row)
                        {
                        }
            echo "lalalalala: ".$row['certFilePath'];
            $download = file_get_contents($row['certFilePath']); // Read the file's contents
            $name = 'cert-hoaxCA-'.$data['ID'].".crt";

            force_download($name, $download);
			// $this->load->view('certificate_view');
		}
		else
		{
			//Jika tidak ada session di kembalikan ke halaman login
			redirect('welcome', 'refresh');
		}
	}

	 
}
