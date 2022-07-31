<?php 

class Model_barang extends CI_Model{
	public function tampil_data()
	{
		return $this->db->get('tb_barang');
	}

	public function tampil_produk($keyword=null)
	{
		$this->db->select('*');
		$this->db->from('tb_barang');
		if(!empty($keyword)){
			$this->db->like('nama_brg',$keyword);
		}
		return $this->db->get()->result();
	}

	public function totalDataTransaksi()
	{
		$totalData = $this->db->get_where('tb_pesanan')->num_rows();
        return $totalData;
	}

	public function totalDataPengguna()
	{
		$totalData = $this->db->get_where('tb_user', ['role_id' => '2'])->num_rows();
        return $totalData;
	}

	public function totalDataBarang()
	{
		$totalData = $this->db->get_where('tb_barang')->num_rows();
        return $totalData;
	}

	public function tambah_barang($data,$table)
	{
		return $this->db->insert($table,$data);
	}

	public function edit_barang($where,$table)
	{
		return $this->db->get_where($table,$where);
	}

	public function update_data($where,$data,$table)
	{
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	public function hapus_data($where,$table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}

	public function find($id)
	{
		$result = $this->db->where('id_brg', $id)
					   ->limit(1)
					   ->get('tb_barang');
		if($result->num_rows() > 0)
		{
			return $result->row();
		}else{
			return array();
		}
	}

	public function detail_data($id = NULL)
	{
		$query = $this->db->get_where('tb_barang', array('id_brg' => $id))->row();
		return $query;
	}

	public function detail_brg($id_brg)
	{
		$result = $this->db->where('id_brg', $id_brg)->get('tb_barang');
		if($result->num_rows() > 0)
		{
			return $result->result();
		}else{
			return FALSE;
		}
	}

}

 ?>