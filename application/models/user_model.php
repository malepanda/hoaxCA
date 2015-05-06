<?php
	class User_model extends CI_Model {

		function __construct()
		{
			parent::__construct();
			$this->load->database();
		}

		public function login($data = array()){
			$username = $data['username'];
			$password = $data['password'];
			$res = $this->db->query("CALL Login('$username','$password')");
			return $res;
		}

		public function register($data = array()){
			$username = $data['username'];
			$password = $data['password'];
			$nama = $data['nama'];
			$alamat = $data['alamat'];
			$email = $data['email'];
			$nokontak = $data['nokontak'];

			$res = $this->db->query("CALL Register('$username','$password','$nama','$alamat','$email','$nokontak')");
			return $res;
		}

	}

?>