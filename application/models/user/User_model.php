<?php
class User_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}

    function getUserDetails($user_id){
        $this->db->select('users.*,countries.country_name,genders.gender_name');
        $this->db->from('users');
        $this->db->join('countries','countries.id = users.country_id','LEFT');
        $this->db->join('genders','genders.id = users.gender_id','LEFT');
        $this->db->where('users.user_id',$user_id);
        $result = $this->db->get();
        return $result->result_array();
    }
}
?>