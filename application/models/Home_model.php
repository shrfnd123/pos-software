<?php 
	
class Home_model extends CI_Model
{
		
	   public function resolve_user_login($username,$password) {
		$query=$this->db->query("select * from tbl_user where username='$username' and password='$password' and user_type='1' limit 1");
           if($query->num_rows() > 0)
           {
             return $query->result();
            }
            else
             {
             return false;
            }	
   }
	
}


 ?>