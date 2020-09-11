<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('M_Auth');
	}
	public function index(){
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		if($this->form_validation->run()==false){
		$this->load->view('template/header');
		$this->load->view('auth/login');
		$this->load->view('template/footer');
		}else{
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			$cekEmail = $this->M_Auth->cekEmail($email);
			
			//cek password
			if(password_verify($password, $cekEmail['password'])){
				$this->session->set_userdata('email', $email);
				redirect('user');
			} else {
				$this->session->set_flashdata('message', 'message("error", "Password Salah")');
				redirect('auth/index');
			}
		}
	}
	public function registrasi(){
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');
		$this->form_validation->set_rules('no_hp', 'No hp', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		if ($this->form_validation->run()==false) {
		$this->load->view('template/header');
		$this->load->view('auth/registrasi');
		$this->load->view('template/footer');
		}else{
		
			$nama = $this->input->post('nama');
			$email = $this->input->post('email');
			$alamat = $this->input->post('alamat');
			$no_hp = $this->input->post('no_hp');
			$password = $this->input->post('password');

			$data = [
				'nama' =>$nama,
				'email' =>$email,
				'alamat' =>$alamat,
				'no_hp' =>$no_hp,
				'role_id' => 2,
				'password' => password_hash($password,PASSWORD_DEFAULT),
			];

			$this->M_Auth->tambah($data);
			$this->session->set_flashdata('message','message("success", "Registrasi Berhasil")');
			redirect('auth/index');
		}
	}

	public function logout() {
		$this->session->unset_userdata('email');
		redirect('auth/index');
	}	
}