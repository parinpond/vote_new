<?php

class Home extends CI_Controller {

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
        $this->load->view('home');
        $this->load->view('footer');
    }
    
    function logout() {
        $this->session->unset_userdata('login');
        session_destroy();
        redirect('login/index');
        exit();
    }

}

?>