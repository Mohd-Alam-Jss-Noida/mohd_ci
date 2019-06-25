<?php
	Class Admin_model extends MY_Model {

		public function dashboard($username, $limit, $offset) {
			$sql = $this->db->select('id, title, body, description, created_date, updated_date')->where(['username' => $username, 'deleted_at' => '1'])->order_by('id', 'DESC')->limit($limit, $offset)->get('mohd_ci');
			$count = $sql->num_rows();
			if ($count) {
				return $data = $sql->result();//data fatch in OBJECT form
				//return $data = $sql->result_array();//data fatch in array form
			}
		}

		public function total_rows($username) {
			$sql = $this->db->select('id, title, body, description, created_date, updated_date')->where(['username' => $username, 'deleted_at' => '1'])->get('mohd_ci');
			$count = $sql->num_rows();
			if ($count) {
				return $data = $sql->num_rows();
			}
		}

		public function store_article($input_data) {
			//return $this->db->insert('mohd_ci', ['username' => $input_data['username'], 'title' => $input_data['title'], 'body' => $input_data['body'], 'description' => $input_data['description']]);
			return $this->db->insert('mohd_ci', $input_data);
		}

		public function edit_article($id) {
			$sql = $this->db->select(['id', 'title', 'body', 'description'])->where('id', $id)->get('mohd_ci');
			$count = $sql->num_rows();
			if ($count) {
				return $data = $sql->result_array();//data fatch in array form
			}
		}

		public function update_article($article_id, $input_data) {
			return $this->db->where('id', $article_id)->update('mohd_ci', $input_data);
		}

		public function delete_article($article_id) {
			return $this->db->where('id', $article_id)->update('mohd_ci', ['deleted_at' => '0']);
		}		
	}
?>