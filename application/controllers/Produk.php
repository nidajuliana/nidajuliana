<?php 

class Produk extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('M_Produk');
		if(!$this->session->userdata('email')){
			redirect('auth');
		}
	}

	public function index() {

		$email = $this->session->userdata('email');

		$data = [
			'result'=> $this->M_Produk->getProduk(),
			'user' => $this->db->get_where('user', ['email' => $email])->row_array(),
		];

		$this->load->view('template/header',$data);
		$this->load->view('template/navbar',$data);
		$this->load->view('template/sidebar',$data);
		$this->load->view('produk/index',$data);
		$this->load->view('template/footer');
	}

	public function tambah() {

		$this->form_validation->set_rules('judul', 'Judul', 'required');
		$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
		$this->form_validation->set_rules('tags','Tags', 'required');
		$this->form_validation->set_rules('harga', 'Harga', 'required');


		if($this->form_validation->run() == FALSE) {
			$email = $this->session->userdata('email');

			$jumlahProduk = $this->M_Produk->countProduk();
			$kodeBuku = 'B-'.str_pad($jumlahProduk + 1, 3, "0", STR_PAD_LEFT);

			$data = [
				'kode_buku'	=> $kodeBuku,
				'user' => $this->db->get_where('user', ['email' => $email])->row_array()
			];

			$this->load->view('template/header',$data);
			$this->load->view('template/navbar',$data);
			$this->load->view('template/sidebar',$data);
			$this->load->view('produk/tambah',$data);
			$this->load->view('template/footer');
		} else {

			$config['upload_path']          = FCPATH.'media/file';
            $config['allowed_types']        = 'gif|jpg|png';

            $this->load->library('upload', $config);

			$kode 		= $this->input->post('kode');
			$judul 		= $this->input->post('judul');
			$deskripsi 	= $this->input->post('deskripsi');
			$tags 		= $this->input->post('tags');
			$harga 		= $this->input->post('harga');
			$foto 		= $_FILES['foto'];

			$this->upload->do_upload('foto');
			$konten = $this->upload->data();

			$data = [
				'kode_buku' => $kode,
				'judul_buku'=> $judul,
				'deskripsi' => $deskripsi,
				'tags'		=> $tags,
				'harga' 	=> $harga,
				'foto_produk'=> $foto['name'],
			];

			$tambah = $this->M_Produk->tambah($data);

			$this->session->set_flashdata('message', 'message("success", "Berhasil Tambah Produk")');
			redirect('data-produk');
		}
		
	}

	public function edit($id) {

		$email = $this->session->userdata('email');

		$data = [
			'detail' => $this->M_Produk->getByRowProduk($id),
			'user'	 => $this->db->get_where('user', ['email' => $email])->row_array(),
		];

		$this->load->view('template/header',$data);
		$this->load->view('template/navbar',$data);
		$this->load->view('template/sidebar',$data);
		$this->load->view('produk/edit',$data);
		$this->load->view('template/footer');
	}

	public function update() {
		$config['upload_path']          = FCPATH.'media/file';
        $config['allowed_types']        = 'gif|jpg|png';

        $this->load->library('upload', $config);

        $id 		= $this->input->post('id');
		$kode 		= $this->input->post('kode');
		$judul 		= $this->input->post('judul');
		$deskripsi 	= $this->input->post('deskripsi');
		$tags 		= $this->input->post('tags');
		$harga 		= $this->input->post('harga');
		$foto 		= $_FILES['foto'];

		$cekDataProduk = $this->M_Produk->getByRowProduk($id);

		if($foto == $cekDataProduk){
			$nameFoto = $cekDataProduk['foto_produk'];
		} else {
			unlink(FCPATH.'media/file/'.$cekDataProduk['foto_produk']);
			$nameFoto = $foto['name'];
			$this->upload->do_upload('foto');
			$konten = $this->upload->data();
		}

		$data = [
			'kode_buku' => $kode,
			'judul_buku'=> $judul,
			'deskripsi' => $deskripsi,
			'tags'		=> $tags,
			'harga' 	=> $harga,
			'foto_produk'=> $nameFoto,
		];

		$tambah = $this->M_Produk->updateProduk($id, $data);

		$this->session->set_flashdata('message', 'message("success", "Berhasil Update Produk")');
		redirect('data-produk');
	}

	public function delete($id) {
		$this->M_Produk->deleteProduk($id);
		$this->session->set_flashdata('message', 'message("success", "Berhasil Hapus Produk")');
		redirect('data-produk');
	}

}
?>