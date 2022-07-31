<?php 

class Dashboard extends CI_controller{
	public function __construct()
	{
		parent::__construct();

		if($this->session->userdata('role_id') != '2')
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


	public function tambah_ke_keranjang($id)
	{
		$barang = $this->model_barang->find($id);
		$data = array(
	        'id'      => $barang->id_brg,
	        'qty'     => 1,
	        'price'   => $barang->harga,
	        'name'    => $barang->nama_brg
	        
		);

		$this->cart->insert($data);
		redirect('welcome');
	}

	public function detail_keranjang()
	{
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('keranjang');							
		$this->load->view('templates/footer');
	}

	public function hapus_keranjang()
	{
		$this->cart->destroy();
		redirect('welcome/index');
	}

	public function pembayaran()
	{
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('pembayaran');							
		$this->load->view('templates/footer');
	}

	public function proses_pesanan()
	{
		date_default_timezone_set('Asia/Jakarta');
		$nama	= $this->input->post('nama');
		$alamat	= $this->input->post('alamat');
		$gambar = $_FILES['gambar'];
		// $is_processed = $this->model_invoice->index();
		if ($gambar=''){}else{
			$config ['upload_path'] = './uploads';
			$config ['allowed_types'] = 'jpg|jpeg|png|gif';

			$this->load->library('upload', $config);
			if(!$this->upload->do_upload('gambar')){
				echo "Gambar gagal di upload"; die();
				$status = false;
			}else {
				$gambar = $this->upload->data('file_name');
				$status = true;
			}
		}

		

		$invoice = array (
			'nama'			=> $nama,
			'alamat'		=> $alamat,
			'tgl_pesan'		=> date('Y-m-d H:i:s'),              
			'batas_bayar'	=> date('Y-m-d H:i:s', mktime(date('H')+12, date('i'), date('s'), date('m'), date('d')+1, date('Y') )),
		);
		$this->db->insert('tb_invoice', $invoice);
		$id_invoice = $this->db->insert_id();

		foreach ($this->cart->contents() as $item)
		{
			$data = array(
				'id_invoice'			=> $id_invoice,
				'id_brg'				=> $item['id'],
				'nama_brg'				=> $item['name'],
				'jumlah'				=> $item['qty'],
				'harga'					=> $item['price'],
				'gambar'				=> $gambar,
			);
			$this->db->insert('tb_pesanan', $data);
		}

		if($status == true){
		$this->cart->destroy();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');		
		$this->load->view('proses_pesanan');								
		$this->load->view('templates/footer');
		} else {
			echo "Maaf, Pesanan anda gagal di proses";
		}
	}

	public function detail_produk($id_brg)
	{
		$data['barang'] = $this->model_barang->detail_brg($id_brg);
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');		
		$this->load->view('detail_produk',$data);								
		$this->load->view('templates/footer');
	}	
}

 ?>