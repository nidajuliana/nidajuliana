<?php 

 class User extends CI_Controller {

 	public function __construct(){
 		parent::__construct();
 		if(!$this->session->userdata('email')){
 			redirect('auth');
 		}
 	}

 	public function index() {

 		$email = $this->session->userdata('email');
 		$user = $this->db->get_where('user', ['email' => $email])->row_array();

 		$data = [
 			'user' => $user,
 		];

 		$this->load->view('template/header',$data);
 		$this->load->view('template/navbar',$data);
 		$this->load->view('template/sidebar',$data);
 		$this->load->view('user/index',$data);
 		$this->load->view('template/footer');
 	}
 }
?>