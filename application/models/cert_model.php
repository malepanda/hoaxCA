<?php
	class cert_model extends CI_Model {

		function __construct()
		{
			parent::__construct();
			$this->load->database();
		}

		public function request($data = array()){
			$session_data = $this->session->userdata('logged_in');
			$username = $session_data['username'];
			$namaOrganisasi = $data['namaOrganisasi'];
			$unitOrganisasi = $data['unitOrganisasi'];
			$kota = $data['kota'];
			$prov = $data['prov'];
			$validTime = $data['validTime'];

			$res = $this->db->query("CALL RequestCertificate('$username','$namaOrganisasi', '$unitOrganisasi','$kota','$prov','$validTime')");
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

	}

?>