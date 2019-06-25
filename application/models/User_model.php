<?php
	Class User_model extends MY_Model {

		public function getAllArticle($limit, $offset) {
			$sql = $this->db->select('id, title, body, description, created_date, updated_date')->where(['deleted_at' => '1'])->order_by('id', 'DESC')->limit($limit, $offset)->get('mohd_ci');
			$count = $sql->num_rows();
			if ($count) {
				return $data = $sql->result();
			}
		}

		public function getArticleCount() {
			$sql = $this->db->select('id, title, body, description, created_date, updated_date')->where(['deleted_at' => '1'])->get('mohd_ci');
			$count = $sql->num_rows();
			if ($count) {
				return $data = $sql->num_rows();
			}
		}

		public function getSearchArticleCount($search) {
			$this->db->select('*');
			$this->db->from('mohd_ci');
			if($search != '') {
      			$this->db->like('title', $search);
      			$this->db->or_like('body', $search);
      			$this->db->or_like('description', $search);
    		}
    		$this->db->where(['deleted_at' => '1']);
			return $this->db->count_all_results();
		}

		public function getSearchArticle($search, $limit, $offset) {
			$this->db->select('*');
    		$this->db->from('mohd_ci');
    		if($search != '') {
      			$this->db->like('title', $search);
      			$this->db->or_like('body', $search);
      			$this->db->or_like('description', $search);
    		}
    		$this->db->where(['deleted_at' => '1']);
    		$this->db->limit($limit, $offset);
    		$this->db->order_by('title', 'ASC'); 
    		$query = $this->db->get();
    		return $query->result();
		}
	}
?>