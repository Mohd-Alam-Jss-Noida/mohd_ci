<?php
	Class Admin extends MY_Controller {

		public function __construct() {
			parent::__construct();
			$this->load->helper('form');
			$this->load->model('admin_model');
			if (! $this->session->has_userdata('username')) {
				return redirect('login');
			}
		}

		public function index() {
			if ($this->session->has_userdata('username')) {
				return redirect('admin/dashboard');
			}
			else {
				$this->load->view('public/admin_login');
			}
		}

		public function dashboard($offset=0) {
			$username = $this->session->userdata('username');
			$this->load->library('pagination');
			$config = [
				'base_url'		=> base_url('index.php/admin/dashboard'),
				'total_rows'	=> $this->admin_model->total_rows($username),
				'per_page'		=> 5,
				'offset'		=> $this->uri->segment(3),
			];
			$config['full_tag_open'] 	= '<ul class="pagination float-right">';
			$config['full_tag_close'] 	= '</ul>';
			$config['attributes'] 		= ['class' => 'page-link'];
			$config['first_link'] 		= false;
			$config['last_link'] 		= false;
			$config['first_tag_open'] 	= '<li class="page-item">';
			$config['first_tag_close'] 	= '</li>';
			$config['prev_link'] 		= 'Previous';//&laquo
			$config['prev_tag_open'] 	= '<li class="page-item">';
			$config['prev_tag_close'] 	= '</li>';
			$config['next_link'] 		= 'Next';//&raquo
			$config['next_tag_open'] 	= '<li class="page-item">';
			$config['next_tag_close'] 	= '</li>';
			$config['last_tag_open'] 	= '<li class="page-item">';
			$config['last_tag_close'] 	= '</li>';
			$config['cur_tag_open'] 	= '<li class="page-item active"><a href="#" class="page-link">';
			$config['cur_tag_close'] 	= '<span class="sr-only">(current)</span></a></li>';
			$config['num_tag_open'] 	= '<li class="page-item">';
			$config['num_tag_close'] 	= '</li>';
			
			$this->pagination->initialize($config);
			$article = $this->admin_model->dashboard($username, $config['per_page'], $config['offset']);
			$this->load->view('admin/admin_dashboard', ['data'=>$article]);
		}

		public function add_article() {
			$this->load->view('admin/add_article');
		}

		public function store_article() {
			$this->load->library('form_validation');
			$rules = $this->form_validation->run('add_article_rules');
			if ($rules) {
				//$title = $this->input->post('title');//Received one by one value
				//$body = $this->input->post('body');
				//$description = $this->input->post('description');
				$input_data = $this->input->post();//Received all the value at a time.
				unset($input_data['submit']);
				$result = $this->admin_model->store_article($input_data);
				if($result) {
					$this->session->set_flashdata('insert_data', 'Article Inserted Successfully.');
					$this->session->set_flashdata('alert_color', 'success');
				}
				else {
					$this->session->set_flashdata('insert_data', 'Article Inserted Failed. Please Try Again.');
					$this->session->set_flashdata('alert_color', 'danger');
				}
				return redirect('admin/dashboard');

			}
			else {
				$this->load->view('admin/add_article');
			}
		}

		public function edit_article($id) {
			$result = $this->admin_model->edit_article($id);
			if ($result) {
				$this->load->view('admin/edit_article', ['data' => $result['0']]);
			}
			else {

			}
			
		}

		public function update_article($article_id) {
			$this->load->library('form_validation');
			$rules = $this->form_validation->run('add_article_rules');
			if ($rules) {
				$input_data = $this->input->post();
				unset($input_data['submit']);
				$result = $this->admin_model->update_article($article_id, $input_data);
				if($result) {
					$this->session->set_flashdata('insert_data', 'Article Updated Successfully.');
					$this->session->set_flashdata('alert_color', 'success');
				}
				else {
					$this->session->set_flashdata('insert_data', 'Article Updated Failed. Please Try Again.');
					$this->session->set_flashdata('alert_color', 'danger');
				}
				return redirect('admin/dashboard');

			}
			else {
				$this->load->view('admin/edit_article');
			}
		}

		public function delete_article() {
			$article_id = $this->input->post('article_id');
			$result = $this->admin_model->delete_article($article_id);
				if($result) {
					$this->session->set_flashdata('insert_data', 'Article Deleted Successfully.');
					$this->session->set_flashdata('alert_color', 'success');
				}
				else {
					$this->session->set_flashdata('insert_data', 'Article Deleted Failed. Please Try Again.');
					$this->session->set_flashdata('alert_color', 'danger');
				}
				return redirect('admin/dashboard');
		}
	}
?>