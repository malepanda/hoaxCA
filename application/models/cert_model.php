<?php
	class cert_model extends CI_Model {

		function __construct()
		{
			parent::__construct();
			$this->load->database();
		}

		public function request($data = array()){
			$session_data = $this->session->userdata('logged_in');
			$domain = $data['domain'];
			$username = $session_data['username'];
			$namaOrganisasi = $data['namaOrganisasi'];
			$unitOrganisasi = $data['unitOrganisasi'];
			$kota = $data['kota'];
			$prov = $data['prov'];
			$script = $data['script'];

			$res = $this->db->query("CALL RequestCertificate('$username', '$domain', '$namaOrganisasi', '$unitOrganisasi','$kota','$prov','$script')");
			return $res;
		}

		public function view(){
			$session_data = $this->session->userdata('logged_in');
			$username = $session_data['username'];
			if ($username=="admin") {
				$res = $this->db->query("CALL viewAllRequest('$username')");
			}
			else
				$res = $this->db->query("CALL viewMyRequest('$username')");
			
			return $res;
		}

<<<<<<< HEAD
=======
		public function uploadCSR($data = array()){
			$session_data = $this->session->userdata('logged_in');
			$username = $session_data['username'];
			$filepath = $data['filepath']."csr";
			$ID = $data['ID'];

			$res = $this->db->query("CALL uploadCSR('$ID', '$username', '$filepath')");
			
			return $res;
		}

>>>>>>> 1d9e011b2e6fa8e5f873f0650894a4d65b1610f2
	}

?>