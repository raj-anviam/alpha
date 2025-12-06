<?php
class Admin_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function get_user_payment_requests(){
         $this->db->where('payments.status_id', 2);
        $this->db->select('payments.*,ur.email,ur.full_name,ut.server,ut.td_id,ut.password as td_password,ut.email_id');
        $this->db->from('payments');
        $this->db->join("users as ur","ur.user_id = payments.user_id");
        $this->db->join("user_td_account as ut","ut.payment_id = payments.payment_id");
        $this->db->order_by('payments.created_at','DESC');
        $result = $this->db->get();
        return $result->result_array();
    }

    function get_introducing_requests(){
        $this->db->select('itroducing_alpha.*,ur.email,ur.full_name');
        $this->db->from('itroducing_alpha');
        $this->db->join("users as ur","ur.user_id = itroducing_alpha.user_id");
        $this->db->order_by('itroducing_alpha.created_on','DESC');
        $result = $this->db->get();
        return $result->result_array();
    }
    
    function get_user_tree($user_id){
        $this->db->select('itroducing_alpha.*,ur.email,ur.full_name,downline.email as downline_email,downline.full_name as downline_full_name,upline.level');
        $this->db->from('itroducing_alpha');
        $this->db->join("users as ur","ur.user_id = itroducing_alpha.user_id");
        $this->db->join("downline_matrix as upline","upline.itroducing_alpha_id = itroducing_alpha.itroducing_alpha_id");
        $this->db->join("users as downline","downline.user_id = upline.down_user_id");
        $this->db->order_by('upline.level','ASC');
        $this->db->where('ur.user_id',$user_id);
        $result = $this->db->get();
        return $result->result_array();
    }
}
?>