<?php
	Class Login extends MY_Controller {

		public function index() {
			$this->load->helper('form');
			if ($this->session->has_userdata('username')) {
				return redirect('admin/dashboard');
			}
			else {
				$this->load->view('public/admin_login');
			}
		}

		public function post_login() {
			$this->load->library('form_validation');
			$this->load->model('login_model');

			$this->form_validation->set_rules('username', 'User Name', 'required|alpha|trim');
			$this->form_validation->set_rules('password', 'Password', 'required|trim');

			if ($this->form_validation->run() == TRUE) {
				$username = $this->input->post('username');
				$password = $this->input->post('password');
				$res = $this->login_model->login_valid($username, $password);
				if($res) {
					$this->session->set_userdata('username', $username);
					return redirect('admin/dashboard');
				}
				else {
					$this->session->set_flashdata('invalid_login', 'Invalid User Name or Password');
					return redirect('login');
				}
            }
            else {
            	$this->load->view('public/admin_login');
            }
		}

		public function logout() {
			$this->session->unset_userdata('username');
			return redirect('login');
		}
	}
?>