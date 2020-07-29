<?php
class Report_model extends CI_Model{  
    function select($data=null) {
        
        $this->db->select('*');
        $this->db->from('transaction');
        if (!empty($data['user_id'])) {
            $this->db->where('user_id', $data['user_id']);
        }
        if ($data['start_date'] != "" AND $data['end_date'] != "") {
			$this->db->where('create_date >=', date_format(date_create($data['start_date']),"Y-m-d"));
            $this->db->where('create_date <=', date_format(date_create($data['end_date']),"Y-m-d"));
        }
        $this->db->order_by('id', 'desc');
        $q = $this->db->get(); 
        return $q->result();
    }
    function summary($data=null) {
        $this->db->select('user_id,count(user_id) as count');
        $this->db->from('transaction');
        if ($data['start_date'] != "" AND $data['end_date'] != "") {
			$this->db->where('create_date >=', date_format(date_create($data['start_date']),"Y-m-d"));
            $this->db->where('create_date <=', date_format(date_create($data['end_date']),"Y-m-d"));
        }
        $this->db->group_by('user_id');
        $this->db->order_by('count(user_id)', 'desc');
        $q = $this->db->get();
        return $q->result();
    }
}
?>