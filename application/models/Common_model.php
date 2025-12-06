<?php
class Common_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}

	function getRecordData($table, $custom_where = '', $select_column = '', $order_by = array(), $join_array = array(), $group_by = '', $excludeIds = array(),    $limit = '')
	{
		if ($select_column != '') {
			$this->db->select($select_column);
		}
		$this->db->from($table);
		if (is_array($join_array)) {
			foreach ($join_array as $val) {
				$this->db->join($val['table1'], $val['table1Val'] . '=' . $val['table2Val'], $val['joinType']);
			}
		}
		if ($custom_where != '') {
			$this->db->where($custom_where);
		}
		if (is_array($excludeIds)) {
			if (!empty($excludeIds)) {
				$this->db->where_not_in($excludeIds[0], $excludeIds[1]);
			}
		}
		if (is_array($order_by)) {
			foreach ($order_by as $key => $val) {
				$this->db->order_by($key, $val);
			}
		}
		if ($group_by != '') {
			$this->db->group_by($group_by);
		}
		if ($limit != '') {
			$this->db->limit($limit);
		}
		$query = $this->db->get();
		//echo '<br>'.$this->db->last_query();	
		return $query->result_array();
	}
	/* Insert data in table */
	function insert($data, $table)
	{
		$this->db->insert($table, $this->security->xss_clean($data));
		$error = $this->db->error();
		if ($error['code'] == 00000 && trim($error['message']) == '') {
			$rData = $this->db->insert_id();
		} else {
			$rData = '<div class="alert alert-danger">[Error:' . $error['code'] . '] unable to insert data</div>';
		}

		return $rData;
	}
	/* //Insert data in table */
	function insert_batch($data, $table, $xss_clean = true)
	{
		if ($xss_clean == true) {
			$data = $this->security->xss_clean($data);
		}
		$this->db->insert_batch($table, $data);
		$error = $this->db->error();
		if ($error['code'] == 00000 && trim($error['message']) == '') {
			$rData = $this->db->insert_id();
		} else {
			$rData = '<div class="alert alert-danger">[Error:' . $error['code'] . '] unable to insert data</div>';
		}
		return $rData;
	}


	/* update data in table */
	function update($id, $data, $colum_name, $table)
	{
		$colum_name = (string)$colum_name;
		$id = (int)$id;
		$this->db->where($colum_name, $id);
		$this->db->update($table, $this->security->xss_clean($data));
		$error = $this->db->error();
		if ($error['code'] == 00000 && trim($error['message']) == '') {
			$rData = 1;
		} else {
			$rData = '<div class="alert alert-danger">[Error:' . $error['code'] . '] unable to update data</div>';
		}
		return $rData;
	}
	/* //update data in table */

	function delete($ID, $colum_name, $table)
	{
		$colum_name = (string)$colum_name;
		$ID = (int)$ID;
		$this->db->where($colum_name, $ID);
		$this->db->delete($table);
		$error = $this->db->error();
		if ($error['code'] == 00000 && trim($error['message']) == '') {
			$rData = 1;
		} else {
			$rData = '<div class="alert alert-danger">[Error:' . $error['code'] . '] Unable to delete data</div>';
		}
		return $rData;
	}


	function get_all_with_paging($limit, $offset, $table, $contact_name = "", $phone_number = "", $contact_email = "", $enquiry_from = "", $enquiry_to = "", $enquiry_status = "")
	{
		if ($contact_name != '') {
			$this->db->like('contact_name', $contact_name);
		}
		if ($phone_number != '') {
			$this->db->like('contact_mobile', $phone_number);
		}
		if ($contact_email != '') {
			$this->db->like('contact_email', $contact_email);
		}
		if ($enquiry_from != '' && $enquiry_to == '') {
			$this->db->where('DATE(submission_date_time)', date("Y-m-d", strtotime($enquiry_from)));
		}
		if ($enquiry_to != '' && $enquiry_from == '') {
			$this->db->where('DATE(submission_date_time)', date("Y-m-d", strtotime($enquiry_to)));
		}
		if ($enquiry_from != '' && $enquiry_to != '') {
			$this->db->where('DATE(submission_date_time) >=', date("Y-m-d", strtotime($enquiry_from)));
			$this->db->where('DATE(submission_date_time) <=', date("Y-m-d", strtotime($enquiry_to)));
		}
		if ($enquiry_status != '') {
			$this->db->where('enquiry_status', $enquiry_status);
		}
		$this->db->limit($limit, $offset);
		$query = $this->db->get($table);
		return $query->result_array();
	}

	function get_totleforpaging($table, $column, $contact_name = "", $phone_number = "", $contact_email = "", $enquiry_from = "", $enquiry_to = "", $enquiry_status = "")
	{
		if ($contact_name != '') {
			$this->db->like('contact_name', $contact_name);
		}
		if ($phone_number != '') {
			$this->db->like('contact_mobile', $phone_number);
		}
		if ($contact_email != '') {
			$this->db->like('contact_email', $contact_email);
		}

		if ($enquiry_from != '' && $enquiry_to == '') {
			$this->db->where('DATE(submission_date_time)', date("Y-m-d", strtotime($enquiry_from)));
		}
		if ($enquiry_to != '' && $enquiry_from == '') {
			$this->db->where('DATE(submission_date_time)', date("Y-m-d", strtotime($enquiry_to)));
		}
		if ($enquiry_from != '' && $enquiry_to != '') {
			$this->db->where('DATE(submission_date_time) >=', date("Y-m-d", strtotime($enquiry_from)));
			$this->db->where('DATE(submission_date_time) <=', date("Y-m-d", strtotime($enquiry_to)));
		}
		if ($enquiry_status != '') {
			$this->db->where('enquiry_status', $enquiry_status);
		}
		$this->db->select($column);
		$this->db->from($table);
		$query = $this->db->get();
		return $query->num_rows();
	}

	function validate_login($usr, $pass)
	{

		$this->db->group_start();
		$this->db->where('ur.email', $usr);
		$this->db->or_where('ur.username', $usr);
		$this->db->group_end();
		$this->db->where('ur.password', $pass);
		$this->db->where('ur.status', 1);
		$this->db->select('ur.*,ut.user_token_id');
		$this->db->from('users as ur');
		$this->db->join("user_token as ut","ut.user_id = ur.user_id","left");
		$this->db->limit(1);
		$result = $this->db->get();
		return $result->result_array();
	}
}
