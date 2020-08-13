<?php 
	
	class addMoneyModel extends CI_Model
	{
		
		public function getAllData($id)
		{
			$this->db->where("u_id",$id);
			return $this->db->get("tbl_user")->result();
		}

		public function addRupees($data)
		{
			return $this->db->insert("tbl_transfer",$data);
		}

		public function updateBalance($id,$data)
		{
			$this->db->where("u_id",$id);
			return $this->db->update("tbl_user",$data);
		}
	}
 ?>