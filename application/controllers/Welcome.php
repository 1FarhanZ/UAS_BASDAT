<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$keyword = $this->input->get('keyword');
		$data['barang'] = $this->model_barang->tampil_produk($keyword); //menampilkan data di dashboard
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('dashboard', $data);							//menampilkan data di dashboard
		$this->load->view('templates/footer');
	}

	public function cariProduk($produk)
	{
		$keyword = $this->input->get('keyword');
		$data['barang'] = $this->model_barang->tampil_produk(); //menampilkan data di dashboard
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('dashboard', $data);							//menampilkan data di dashboard
		$this->load->view('templates/footer');
	}
	
}
