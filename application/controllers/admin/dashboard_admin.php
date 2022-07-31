<?php 

class Dashboard_admin extends CI_Controller{
	public function __construct()
	{
		parent::__construct();

		if($this->session->userdata('role_id') != '1')
		{
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
				  Anda Belum Login. Silahkan Login Terlebih Dahulu!
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				    <span aria-hidden="true">&times;</span>
				  </button>
				</div>');
			redirect('auth/login');
		}
	}

	public function index()
	{
		$data['totalTransaksi'] = $this->model_barang->totalDataTransaksi();
		$data['totalPengguna'] = $this->model_barang->totalDataPengguna();
		$data['totalBarang'] = $this->model_barang->totalDataBarang();
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/dashboard', $data);
		$this->load->view('templates_admin/footer');
	}

}

 ?>