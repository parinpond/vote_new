<?php
class User_model extends CI_Model{  
    function select($data=null) {
        $this->db->select('*');
        $this->db->from('user');
        if (!empty($data['username'])) {
            $this->db->where('username', $data['username']);
        }
        if (!empty($data['user_id'])) {
            $this->db->where('id', $data['user_id']);
        }
        $this->db->order_by('id', 'desc');
        $q = $this->db->get();
        //print_r($this->db->last_query());
        return $q->result();
    }
    function add_user($data) {
        if(!empty($data)){
            $this->db->insert('user', array(
                'firstname'=> $data['firstname'], 
                'lastname' => $data['lastname'],
                'nickname' => $data['nickname'],
                'username' => $data['username'],
                'password' => $data['password'],
                'user_type_id' => $data['user_type_id'],
                'create_date'=>date("Y-m-d"),
		'path_img_profile'=>""
            ));
        }
    }
    function upload_picture_user($data) {
        if(!empty($data)){
            $id =($data['user_id'] !="")?$data['user_id']:$data['id'];
			$data=['path_img_profile'=> $data['path']];
			$this->db->where('id',$id);
			$this->db->update('user',$data);
        }
    }
    function update_user($data) {
        if(!empty($data)){
            $id =$data['id'];
			$data=[
				'firstname'=> $data['firstname'], 
                'lastname' => $data['lastname'],
                'nickname' => $data['nickname'],
                'user_type_id' => $data['user_type_id'],
                'path_img_profile'=> $data['path']
            ];
			$this->db->where('id',$id);
			$this->db->update('user',$data);
		
        }
    }
    function delete_user($data) {
	    $id =$data['id'];
	    $this->db->delete('user', array('id' => $id)); 
    }
    function change_password($data) {
	    $id =$data['user_id'];
		$data=['password'=>$data['password'],];
		$this->db->where('id',$id);
		$this->db->update('user',$data);
    }
    function update_point($data) {
	    $id =$data['id'];
		$data=['limit_point'=>$data['limit_point'],];
		$this->db->where('id',$id);
		$this->db->update('user_type',$data);
    }
    function select_list_user_vote($data=null) {
        $this->db->select('*');
        $this->db->from('user');
        if (!empty($data['user_id'])) {
            $this->db->where('id !=', $data['user_id']);
        }
        $this->db->order_by('id', 'desc');
        $q = $this->db->get();
        //print_r($this->db->last_query());
        return $q->result();
    }
    
    function select_user_type($user_type_id=null) {
        $this->db->select('*');
        $this->db->from('user_type');
        if (!empty($user_type_id)) {
            $this->db->where('id',$user_type_id);
        }
        $this->db->order_by('id', 'desc');
        $q = $this->db->get();
        //print_r($this->db->last_query());
        return $q->result();
    }
}
?>
