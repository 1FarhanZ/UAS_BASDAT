<?php 

class Auth extends CI_Controller
{
	public function login()
	{
		$this->form_validation->set_rules('username', 'Username','required',['required'		=> 'Data wajib diisi!']);
		$this->form_validation->set_rules('password', 'Password','required',['required'		=> 'Data wajib diisi!']);
		if($this->form_validation->run() == FALSE)
		{
			$this->load->view('templates/header');
			$this->load->view('form_login');						
			$this->load->view('templates/footer');
		}else{
			$auth = $this->model_auth->cek_login();

			if($auth == FALSE)
			{
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
				  Username atau password salah. Silahkan masukkan kombinasi yang benar!
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				    <span aria-hidden="true">&times;</span>
				  </button>
				</div>');
				redirect('auth/login');
			}else{
				$this->session->set_userdata('username',$auth->username);
				$this->session->set_userdata('role_id',$auth->role_id);

				switch($auth->role_id){
					case 1 : redirect('admin/dashboard_admin');
							 break;
					case 2 : redirect('welcome');
							 break;
					default : break;
				}

			}
		}
	}

	private function _sendEmail($token, $type)
    {
        $config = [
            'protocol'  => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'milestyle07@gmail.com', // your gmail
            'smtp_pass' => 'imkkelompok7', // your password gmail
            'smtp_port' => 465,
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'newline'   => "\r\n"
        ];
		$this->load->library('email', $config);
        $this->email->initialize($config);

        $this->email->from('milestyle07@gmail.com', 'MyleStyle Support'); // from('your email', 'Your Name');
        $this->email->to($this->input->post('email'));

        if ($type == 'verify') {
            $this->email->subject('Account Verification');
            $this->email->message('Click this link to verify your account : <a href="' . base_url() . 'auth/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '"> Activate </a> ');
        } else if ($type == 'forgotPass') {
            $this->email->subject('Reset Password');
            $this->email->message('Click this link to reset your password : <a href="' . base_url() . 'auth/resetpass?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '"> Reset Password </a> ');
        }

        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }

	public function lupasandi()
    {
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header');
			$this->load->view('lupasandi');						
			$this->load->view('templates/footer');
        } else {
            $email = $this->input->post('email');
            $user = $this->db->get_where('tb_user', ['email' => $email])->row_array();

            if ($user) {
                $token = base64_encode(random_bytes(32));
                $user_token = [
                    'email' => $email,
                    'token' => $token,
                    'date_created' => time()
                ];
                $this->db->insert('user_token', $user_token);
                $this->_sendEmail($token, 'forgotPass');
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Cek email dari kami untuk mereset passwordmu! </div>');
                redirect('auth/lupasandi');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email tersebut tidak terkaid dengan akun kami! </div>');
                redirect('auth/lupasandi');
            }
        }
    }

	public function resetpass()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('tb_user', ['email' => $email])->row_array();

        if ($user) {
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();
            if ($user_token) {
                $this->session->set_userdata('reset_email', $email);
                $this->changePassword();
            } else {
                // $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Reset Password failed! Invalid token </div>');
                // redirect('auth/lupasandi');
            }
        }
    }

	public function changePassword()
    {
        // if (!$this->session->userdata('reset-email')) {
        //     redirect('auth');
        // }

        $this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[5]|matches[password2]');
        $this->form_validation->set_rules('password2', 'Repeat Password', 'trim|required|min_length[5]|matches[password1]');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header');
			$this->load->view('gantipassword');						
			$this->load->view('templates/footer');
        } else {
            $password = $this->input->post('password1');
            $email = $this->session->userdata('reset_email');
            $this->db->set('password', $password);
            $this->db->where('email', $email);
            $this->db->update('tb_user');

            $this->session->unset_userdata('reset_email');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password berhasil diubah! Silahkan login. </div>');
            redirect('auth/login');
        }
    }

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('auth/login');
	}
}

 ?>