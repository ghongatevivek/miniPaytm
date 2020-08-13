<?php 
	
	class userRegisterModel extends CI_Model
	{
		
		public function addData($data)
		{
			return $this->db->insert("tbl_user",$data);
		}

		public function loginData($data)
		{
			$this->db->where($data);
			return $this->db->get("tbl_user");
		}

		public function editProfile($id)
		{
			$this->db->where("u_id",$id);
			return $this->db->get("tbl_user")->result();
		}

		public function getPassword($data)
		{
			$this->db->where($data);
			return $this->db->get("tbl_user")->result();
		}

		public function updatePassword($id,$data)
		{
			$this->db->where($id);
			return $this->db->update("tbl_user",$data);
		}
	}
 ?>