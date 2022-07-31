<?php 

class Registrasi extends CI_Controller
{
	public function index()
	{
		$this->form_validation->set_rules('nama', 'Nama', 'required', ['required'	=> 'Data Wajib diisi']);
		$this->form_validation->set_rules('email', 'Email', 'required', ['required'	=> 'Data Wajib diisi']);
		$this->form_validation->set_rules('username', 'Nama', 'required', ['required'	=> 'Data Wajib diisi']);
		$this->form_validation->set_rules('password_1', 'Password', 'required|matches[password_2]', ['required'	=> 'Data Wajib diisi', 'matches'	=> 'Password Tidak Cocok']);
		$this->form_validation->set_rules('password_2', 'Password', 'required|matches[password_1]');


		if($this->form_validation->run() == FALSE)
		{
			$this->load->view('templates/header');	
			$this->load->view('registrasi');				
			$this->load->view('templates/footer');
		}else{
			$data = array(
				'id'			=> '',
				'nama'			=> $this->input->post('nama'),
				'email'			=> $this->input->post('email'),
				'username'		=> $this->input->post('username'),
				'password'		=> $this->input->post('password_1'),
				'role_id'		=> 2,
			);

			$this->db->insert('tb_user',$data);
			redirect('auth/login');
		}	
	}
}

 ?>