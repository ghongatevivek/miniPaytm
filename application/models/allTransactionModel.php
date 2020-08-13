<?php 
	
	class allTransactionModel extends CI_Model
	{
		
		public function getData($id)
		{
			$this->db->where("u_to",$id);		
			$this->db->or_where("u_from",$id);		
			return $this->db->get("tbl_transfer")->result();
		}

		
	}
 ?>