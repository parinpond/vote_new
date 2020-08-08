<?php

class Ajax extends CI_Controller {
    function __construct() {
        parent::__construct();
        if (!$this->session->userdata('login')) {
            redirect('login');
            exit();
        } else {
            $this->load->model('vote_model');
            $this->load->model('user_model'); 
            $this->load->model('report_model'); 
        }
    }
    function detail_summary() {
        $data['vote_user_id'] =$_GET['vote_user_id'];
        $user=$this->user_model->select();
        $user_list=[];
        foreach($user as $k =>$v){
            $user_list[$v->id] =$v->firstname." - ".$v->lastname ." (".$v->nickname.")";
        }
        if($data['vote_user_id'] != ""){
            $data['result']=$this->report_model->select($data);
            $result = [];
            foreach($data['result'] as $key =>$value){
                $result[$key]['user_id']=  $value->user_id;
                $result[$key]['vote_user_id']=  $value->vote_user_id;
                $result[$key]['name_vote_user'] = $user_list[$value->user_id];
                $result[$key]['comment']=  $value->comment;
                $result[$key]['create_date']=  $value->create_date;
            }
            echo json_encode($result);
        }
    }
    function summary_chart_bar() {
        $data['start_date'] =($_GET['start_date_summary'])?$_GET['start_date_summary']:"";
        $data['end_date']   =($_GET['end_date_summary'])?$_GET['start_date_summary']:"";
        $data['total']      =($_GET['total_summary'])?$_GET['total_summary']:"";
	    $user=$this->user_model->select();
        $user_list=[];
        foreach($user as $k =>$v){
            $user_list[$v->id] =$v->firstname." - ".$v->lastname ." (".$v->nickname.")";
        }
        $data['result']=$this->report_model->summary($data);
        $result = [];
        foreach($data['result'] as $key =>$value){
            if($value->count == $data['total']){
                $result[$key]['vote_user_id']=  $value->vote_user_id;
                $result[$key]['name_vote_user'] = $user_list[$value->vote_user_id];
                $result[$key]['count']=  $value->count;
            }else{
                $result[$key]['vote_user_id']=  $value->vote_user_id;
                $result[$key]['name_vote_user'] = $user_list[$value->vote_user_id];
                $result[$key]['count']=  $value->count;
            }
            
        }
        echo json_encode($result);
    }
}

?>