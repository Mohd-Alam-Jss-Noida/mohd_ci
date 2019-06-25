<?php
	Class Login_model extends MY_Model {

		public function login_valid($username, $password) {
			//USE STANDERD QUERY

			//$sql = $this->db->query('SELECT USER_CD, password FROM emp_login WHERE USER_CD="'.$username.'" AND password="'.$password.'" ');
			//return $count = $sql->num_rows();

			//USE ACTIVE RECORD

			$sql = $this->db->where(['USER_CD'=>$username, 'password'=>$password])->get('emp_login');
			return $count = $sql->num_rows();
		}
	}
?>