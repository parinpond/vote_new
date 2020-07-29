<?php

class User extends CI_Controller {

    function __construct() {
        parent::__construct();
        if (!$this->session->userdata('login')) {
            redirect('login');
            exit();
        } else {
	        $this->load->model('vote_model');
            $data['session'] = $this->session->userdata('login');
            $data['count_point_monthly'] =$this->vote_model->history_monthly($data['session']);
            $this->load->view('header', $data);
            $this->load->view('menu', $data);
            $this->load->model('user_model');
        }
    }
    function index($status=null) {
	    $result['status']=$status;
        $result['result']=$this->user_model->select();
        $this->load->view('user/list',$result);
        $this->load->view('footer');
    }
    function add_user() {
        if(!empty($_REQUEST)){
            $data = array();
            $data['firstname']= trim($this->input->post('firstname'));
            $data['lastname'] = trim($this->input->post('lastname'));
            $data['nickname'] = trim($this->input->post('nickname'));
            $data['username'] = trim($this->input->post('username'));
            $data['password'] = trim($this->input->post('password'));
            $data['password'] = md5($data['password']);
            $data['user_type_id'] = trim($this->input->post('user_type_id'));
            if(empty($data['firstname']) OR empty($data['lastname']) OR empty($data['nickname']) OR empty($data['username']) OR empty($data['user_type_id'])){
	           redirect('user/index');
            }
            $username= explode('@', $data['username']);
            $data['username'] =(!empty($username))?$username[0]."@netpoleons.com":$data['username']."@netpoleons.com";
            $check_user = $this->user_model->select($data['username']);
            if(!empty($check_user)){
	            $this->user_model->add_user($data);
	            redirect('user/index');
            }else{
	            redirect('user/index/duplicate_user');
            }
            
            
        }
    } 
    function update_user() {
        if(!empty($_REQUEST)){
            $data = array();
            $data['id']       = trim($this->input->post('id'));
            $data['firstname']= trim($this->input->post('firstname'));
            $data['lastname'] = trim($this->input->post('lastname'));
            $data['nickname'] = trim($this->input->post('nickname'));
            $data['user_type_id'] = trim($this->input->post('user_type_id'));
            if(empty($data['firstname']) OR empty($data['lastname']) OR empty($data['nickname']) OR empty($data['user_type_id'])){
	           redirect('user/index');
            }
            if(!empty($data)){
	            $this->user_model->update_user($data);
	            redirect('user/index');
            }
        }
    } 
    function delete_user() {
        if(!empty($_REQUEST)){
            $data = array();
            $data['id']       = trim($this->input->post('id'));
            $this->user_model->delete_user($data);
	        redirect('user/index');
        }
    }
    function point() {
        $result['result']=$this->user_model->select_user_type();
        $this->load->view('user/point',$result);
        $this->load->view('footer');
    }
     function update_point() {
        if(!empty($_REQUEST)){
	        $data = array();
            $data['id'] = trim($this->input->post('id'));
            $data['limit_point'] = trim($this->input->post('limit_point'));
            //print_r($data); die;
            $this->user_model->update_point($data);
             redirect('user/point');
        }
    }
    function logout() {
        $this->session->unset_userdata('login');
        session_destroy();
        redirect('login/index');
        exit();
    }
    function select() {
        $result=$this->user_model->select();
        $data=[];
        foreach($result as $v){
            $data['id']= $v->id;
            $data['firstname']= $v->firstname;
            $data['lastname']= $v->lastname;
            $data['nickname']= $v->nickname;
        }
       print_r(json_encode($data)); die;
    }

}

?>