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

		public function viewCert(){
			$session_data = $this->session->userdata('logged_in');
			$username = $session_data['username'];
			if ($username=="admin") {
				$res = $this->db->query("CALL viewAllCert('$username')");
			}
			else
				$res = $this->db->query("CALL viewMyCert('$username')");
			
			return $res;
		}

		public function uploadCSR($data = array()){
			$session_data = $this->session->userdata('logged_in');
			$username = $session_data['username'];
			$filepath = $data['filepath']."csr";
			$ID = $data['ID'];

			$res = $this->db->query("CALL uploadCSR('$ID', '$username', '$filepath')");
			
			return $res;
		}

		public function signCert($data = array()){
			$session_data = $this->session->userdata('logged_in');
			$username = $session_data['username'];
			$filepath = $data['certpath'];
			$ID = $data['ID'];
			// echo $filepath;
			$res = $this->db->query("CALL signCert('$ID', '$username', '$filepath')");
			// echo $certpath;
			
			return $res;
		}

		public function download($data=array()){
			$session_data = $this->session->userdata('logged_in');
			$username = $session_data['username'];
			$ID = $data['ID'];
			$res = $this->db->query("CALL getCert('$ID', '$username')");
			return $res;
		}

	}

?>