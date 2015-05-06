<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Certificate_sign extends CI_Controller {

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

	 public function csr_sign() {

	 	
        // Let's assume that this script is set to receive a CSR that has
        // been pasted into a textarea from another page
        //$csrdata = $_POST["CSR"];
        $ID = $this->input->post('acc');
        // $csrdata = "file://./uploads/".$ID.".csr";
        
        $csrdata = "file://C:/xampp/htdocs/hoaxCA/uploads/".$ID.".csr";

        // echo $csrdata;
        
        // We will sign the request using our own "certificate authority"
        // certificate.  You can use any certificate to sign another, but
        // the process is worthless unless the signing certificate is trusted
        // by the software/users that will deal with the newly signed certificate
        
        // We need our CA cert and its private key
        
        $cacert = "file://C:/xampp/htdocs/hoaxCA/assets/ca.crt";
        $privkey = array("file://C:/xampp/htdocs/hoaxCA/assets/ca.key", "Megaphon3");


       	$usercert = openssl_csr_sign($csrdata, $cacert, $privkey, 365);
        
        // Now display the generated certificate so that the user can
        // copy and paste it into their local configuration (such as a file
        // to hold the certificate for their SSL server)
        openssl_x509_export($usercert, $certout);
        echo $certout;
        
        // openssl_x509_export_to_file ( $certout );
        // Show any errors that occurred here
        while (($e = openssl_error_string()) !== false) {
            echo $e . "\n";
        }
}
}
