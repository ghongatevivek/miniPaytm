<?php 
	
	class sendMoneyModel extends CI_Model
	{
		
		public function getPhoneNo($data)
		{
			$this->db->where($data);
			return $this->db->get("tbl_user")->result();
		}

		public function updateBalance($id,$data)
		{
			$this->db->where("u_id",$id);
			return $this->db->update("tbl_user",$data);
		}

		public function addTransferData($data)
		{
			return $this->db->insert("tbl_transfer",$data);
		}
	}
 ?>