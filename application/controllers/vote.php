<?php

class Vote extends CI_Controller {
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
    function index() {
        $data['session'] = $this->session->userdata('login');
        $limit_point    =$this->user_model->select_user_type($data['session']['user_type_id']);
        $result['limit_point']   = $limit_point[0]->limit_point;
        
        $result['result']=$this->user_model->select_list_user_vote($data['session']);
        $result['history_monthly'] = $this->vote_model->history_monthly($data['session']);
        $result['history_year']    = $this->vote_model->history_year($data['session']);
        
        $user=$this->user_model->select();
        $result['user_id']=[];
        foreach($user as $k =>$v){
            $result['user_id'][$v->id] =$v->firstname." - ".$v->lastname ." (".$v->nickname.")";
        }
        $this->load->view('vote/index',$result);
        $this->load->view('footer');
    }
    function add() {
        if(!empty($_REQUEST)){
            $data = array();
            
            $data['user_id']= trim($this->input->post('user_id'));
            $data['vote_user_id']= trim($this->input->post('vote_user_id'));
            $data['comment']= trim($this->input->post('comment'));
            if(!empty($data['comment'])){
                $this->vote_model->add($data);
            }
            redirect('vote/index');
        }
    }
}

?>