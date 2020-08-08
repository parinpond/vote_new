<?php
class Report_model extends CI_Model{  
    function select($data=null) {
        
        $this->db->select('*');
        $this->db->from('transaction');
        if (!empty($data['user_id'])) {
            $this->db->where('user_id', $data['user_id']);
        }
        if (!empty($data['vote_user_id'])) {
            $this->db->where('vote_user_id', $data['vote_user_id']);
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
        $this->db->select('vote_user_id,count(vote_user_id) as count');
        $this->db->from('transaction');
        if ($data['start_date'] != "" AND $data['end_date'] != "") {
			$this->db->where('create_date >=', date_format(date_create($data['start_date']),"Y-m-d"));
            $this->db->where('create_date <=', date_format(date_create($data['end_date']),"Y-m-d"));
        }
        $this->db->group_by('vote_user_id');
        $this->db->order_by('count(vote_user_id)', 'desc');
       // print_r($this->db->last_query());
        $q = $this->db->get();
        return $q->result();
    }
}
?>