<?php
	Class User extends MY_Controller {

		public function __construct() {
			parent::__construct();
			$this->load->helper('form');
			$this->load->model('user_model');
		}

		public function index() {
			$this->load->library('pagination');
			$config = [
				'base_url'		=> base_url('index.php/user/index'),
				'total_rows'	=> $this->user_model->getArticleCount(),
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
			$article = $this->user_model->getAllArticle($config['per_page'], $config['offset']);
			$this->load->view('public/public_articles', compact('article'));
		}

		public function search() {
			$this->load->library('form_validation');
			$this->form_validation->set_rules('query', 'Search', 'required');
			if ($this->form_validation->run() == TRUE) {
				$query = $this->input->post('query');
				return redirect("user/search_results/".$query);
				//$article = $this->user_model->getSearchArticle($query);
				//$this->load->view('public/search_articles', ['article' => $article]);
			}
			else {
				//$this->index();
				$data['result'] = "The Search field is required";
				$this->load->view('public/public_header', $data);
			}
		}

		public function search_results($query) {
			$this->load->library('pagination');
			$config = [
				'base_url'		=> base_url("index.php/user/search_results/".$query),
				'total_rows'	=> $this->user_model->getSearchArticleCount($query),
				'per_page'		=> 2,
				'offset'		=> $this->uri->segment(4),
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
			$article = $this->user_model->getSearchArticle($query, $config['per_page'], $config['offset']);
			$this->load->view('public/search_articles', ['article' => $article]);

		}
	}
?>