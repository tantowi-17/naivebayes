<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	function __construct() {
        parent::__construct();

    }
	public function login(){
        $data = array(
            "user_name"=>$this->input->post("user_name"),
            "user_password"=>$this->input->post("user_password")
        );
				if($data['user_name']=="admin"&&$data['user_password']=="admin"){
					$data['login'] = true;
					$this->session->set_userdata('login', $data);
					redirect("naivebayes");
				}
        redirect("home");
    }
		public function logout(){
			if($this->session->userdata('login')['login']==true){
				$this->session->sess_destroy();
				redirect("home");
			}else{
				show_404();
			}
		}
		public function remdir(){
			if(unlink('./application/models/NaiveBayes_Model.php')){

			}
		}
}
