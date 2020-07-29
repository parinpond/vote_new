<?php

class Report extends CI_Controller {
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
            $this->load->model('report_model'); 
        }
    }
    function transaction() {
        $this->load->model('report_model'); 
        $data = array();
        $data['start_date']= trim($this->input->post('start_date'));
        $data['end_date']  = trim($this->input->post('end_date'));
        $data['result']= $this->report_model->select($data);
        //print_r($data['result']); 
        $user=$this->user_model->select();
        $data['user_id']=[];
        foreach($user as $k =>$v){
            $data['user_id'][$v->id] =$v->firstname." - ".$v->lastname ." (".$v->nickname.")";
        }
        $this->load->view('report/transaction',$data);
        $this->load->view('footer');
    }
    function summary() {
        $data['start_date'] =trim($this->input->post('start_date_summary'));
        $data['end_date']   =trim($this->input->post('end_date_summary'));

        $data['result']     =$this->report_model->summary($data);
        $user=$this->user_model->select();
        $data['user_id']=[];
        foreach($user as $k =>$v){
            $data['user_id'][$v->id] =$v->firstname." - ".$v->lastname ." (".$v->nickname.")";
        }
        $this->load->view('report/summary',$data);
        $this->load->view('footer');
    }
}

?>