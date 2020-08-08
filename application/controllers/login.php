<?php
define('SecretKey', "6Ldk-7EZAAAAAFRYzkQQMT5MlqbTx-jPQo-mwIKw");
session_start();

class Login extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('user_model');
    }

    function index($status = null) {
		$data['status'] = $status;
        $this->load->view('login', $data);
    }
    function authen() {
	    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		  $query_params = [
		    'secret' => SecretKey,
		    'response' => filter_input(INPUT_POST, 'g-recaptcha-response'),
		    'remoteip' => $_SERVER['REMOTE_ADDR']
		  ];
		  $url = 'https://www.google.com/recaptcha/api/siteverify?'.http_build_query($query_params);
		  $result = json_decode(file_get_contents($url), true);
		 
		  if ($result['success']) {
		    // TODO, when reCAPTCHA verify successfully
		    
			$data = array();
	        $data['remember_me'] = trim($this->input->post('remember_me'));
	        $data['username'] = trim($this->input->post('username'));
	        $password 		  = trim($this->input->post('password'));
	        $data['password'] = md5($password);
	       //print_r( $data); die;
	       if(!empty($data['username']) AND !empty($data['password'])){
	        
	        $check = $this->user_model->select($data);
	        //print_r($check); die;
	       }else{
	        redirect('login/index/empty');
	       }
	        if($check[0]->password == $data['password']){
	            $session_array = array(
	                'user_id'   => $check[0]->id,
	                'user_type_id' => $check[0]->user_type_id,
	                'username'  => $check[0]->username,
	                'firstname' => $check[0]->firstname,
	                'lastname'  => $check[0]->lastname,
					'nickname'  => $check[0]->nickname,
					'path_img_profile'=> base_url().$check[0]->path_img_profile,
					);
	                $this->session->set_userdata('login', $session_array);
	                if($data['remember_me'] == 'on'){
	                    $this->session->set_userdata('remember', 1);
	                    $this->load->helper('cookie');
	                    $cookie = $this->input->cookie('ci_sess'); // we get the cookie
	                    $this->input->set_cookie('ci_sess', $cookie, '604800'); // and add one week to it's expiration
					}
					redirect('vote/index');
	        }else{
	            redirect('login/index/empty');
	        }
		    
		  } else {
		    // TODO, when reCAPTCHA failed
			//die("reCAPTCHA failed");
			redirect('login/index/reCAPTCHA');
		  }
		}

        
      
    }
    function forgot_password($status = null) {
        $data['status'] = $status;
        $this->load->view('forgot_password', $data);
    }
    function change_password() {
        $data['username'] = trim($this->input->post('username'));
        $password 		  = trim($this->input->post('password'));
        $data['password'] = md5($password);
        $check = $this->user_model->select($data);
        if(!empty($check)){
           $data['user_id'] =$check[0]->id;
           $this->user_model->change_password($data);
           redirect('login/index');
        }else{
            redirect('login/forgot_password/empty');
        }
    }

}

?>