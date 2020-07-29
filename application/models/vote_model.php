<?php
class Vote_model extends CI_Model{  
    function select($data=null) {
        $this->db->select('*');
        $this->db->from('transaction');
        if (!empty($data['user_id'])) {
            $this->db->where('user_id', $data['user_id']);
        }
        $this->db->order_by('id', 'desc');
        $q = $this->db->get();
        return $q->result();
    }
    function add($data) {
        if(!empty($data)){
            $this->db->insert('transaction', array(
                'user_id'=> $data['user_id'], 
                'vote_user_id' => $data['vote_user_id'],
                'comment' => $data['comment'],
                'create_date'=>date("Y-m-d"),
            ));
        }
    }
    function history_monthly($data) {
        $this->db->select('*');
        $this->db->from('transaction');
        if (!empty($data['user_id'])) {
            $this->db->where('user_id', $data['user_id']);
            $this->db->where('MONTH(create_date)', date("m"));
        }
        //$this->db->group_by('MONTH(create_date), YEAR(create_date)');
        $q = $this->db->get();
        return $q->result();
    }
    function history_year($data) {
        $this->db->select('*');
        $this->db->from('transaction');
        if (!empty($data['user_id'])) {
            $this->db->where('user_id', $data['user_id']);
            $this->db->where('YEAR(create_date)', date("Y"));
        }
        //$this->db->group_by('YEAR(create_date)');
        $q = $this->db->get();
        return $q->result();
    }
}
?>