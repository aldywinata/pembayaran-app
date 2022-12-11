<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	
	public function index()
	{
		$this->form_validation->set_rules('username', 'Username','required|trim|numeric', [
			'required' => 'NIP / NIS Harus diisi !',
			'trim' => 'Tidak Boleh Mengandung Space',
			'numeric' => 'Harap Cek NIP / NIS Anda !'
		]);
		$this->form_validation->set_rules('password', 'Password','required', [
			'required' => 'Password Harus diisi'
		]);

		if( $this->form_validation->run() != true){

			$this->load->view('templates/auth_header');
			$this->load->view('auth/index');
			$this->load->view('templates/auth_footer');

		}else{
			//Validation

			$this->_login();
		}
	}

	private function _login(){
		$username = $this->input->POST('username');
		$password = $this->input->POST('password');

		$students = $this->db->get_where('tbl_siswa', ['nis' => $username])->row_array();
		$users	  = $this->db->get_where('tbl_user', ['nip' => $username])->row_array();

		if( $users ){
			//Data Users Ada
			//Cek Level User

			if ( password_verify($password, $users['password'])  ){
				//Cek Password
				$data = [
					'nip' => $users['nip'],
					'level' => $users['level']
				];

				$this->session->set_userdata($data);

				if( $users['level'] == 'ADMINISTRATOR' ){
					redirect('dashboard');
				}elseif ( $users['level'] == 'PIMPINAN' ){
					redirect('pimpinan');
				}elseif( $users['level'] == 'PETUGAS' ){
					redirect('petugas');
				}else{
					$this->session->set_flashdata('message',
					'<div class="alert alert-danger" role="alert">
						Maaf Anda Tidak dapat Login, Harap Hubungi Admin Sekolah !
					</div>');
					redirect('auth');
				}
			}else{
				$this->session->set_flashdata('message',
				'<div class="alert alert-danger" role="alert">
					Password Salah, Harap Cek Kembali !
				</div>');
				redirect('auth');
			}

		}elseif( $students ){
			//Data Siswa Ada
			//Cek password
			// if( password_hash($password, $students['password']) )
			if( password_verify($password, $students['password']) ){
				$data = [
					'nis' => $students['nis'],
					'nama_siswa' => $students['nama_siswa']
				];

				$this->session->set_userdata($data);

				if( $students['status_siswa'] == 'AKTIF' || $students['status_siswa'] == 'PINDAH MASUK' ){
					redirect('students');
				}elseif( $students['status_siswa'] == 'LULUS' ){
					$this->session->set_flashdata('message',
					'<div class="alert alert-danger" role="alert">
						Maaf Anda Tidak dapat Login, Karena Anda Sudah Lulus !
					</div>');
					redirect('auth');
				}else{
					$this->session->set_flashdata('message',
					'<div class="alert alert-danger" role="alert">
						Maaf Anda Tidak dapat Login, Harap Hubungi Admin Sekolah !
					</div>');
					redirect('auth');
				}
			}else{
				$this->session->set_flashdata('message',
				'<div class="alert alert-danger" role="alert">
					Password Salah, Harap Cek Kembali !
				</div>');
				redirect('auth');
			}
		}else{
			$this->session->set_flashdata('message',
				'<div class="alert alert-danger" role="alert">
					NIP / NIS Tidak Ada, Harap Cek Kembali !
		  		</div>');
			redirect('auth');
		}
	}

	public function logout(){
		// $this->session->unset_userdata('nip');
		// $this->session->unset_userdata('level');

		$this->session->sess_destroy();
		
		$this->session->set_flashdata('message',
	 		'<div class="alert alert-success" role="alert">
				Berhasil Logout !
	  		</div>');
		redirect('auth');
	}
}
