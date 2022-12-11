<?php

class Students_model extends CI_Model{

    public function getAllStudents(){
        return $this->db->get('tbl_siswa')->result_array();
    }

    public function getStudentsById($kd){
        $this->db->select('*');
        $this->db->from('tbl_siswa');
        $this->db->join('tbl_kejuruan', 'tbl_kejuruan.kode_kejuruan = tbl_siswa.kode_kejuruan');
        $this->db->join('tbl_tahun_ajaran', 'tbl_tahun_ajaran.kode_tahun_ajaran = tbl_siswa.kode_tahun_ajaran');
        $this->db->where('tbl_siswa.nis', $kd);

        return $this->db->get()->row_array();
        // return $this->db->get_where('tbl_siswa', ['nis' => $kd])->row_array();
    }

    function _createNIS(){
        $tahun = date("y");
        $kose  = 32160;

        $this->db->select('RIGHT(tbl_siswa.nis,3) as nis', FALSE);
        $this->db->order_by('nis', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('tbl_siswa');

            if( $query->num_rows() <> 0 ){
                $data = $query->row();
                $kode = intval($data->nis) + 1;
            }else{
                $kode = 1;
            }

        $batas = str_pad($kode, 3, "0", STR_PAD_LEFT);
        $nisTampil = $tahun.$kose.$batas ;

        return $nisTampil;

    }

    function _uploadImage(){

        $config['upload_path']          = './assets/imgs/img-siswa/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = 2048;
        $config['file_name']            = 'IMG-siswa'.substr(md5(rand()),0,20);

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('img_siswa')) {
            return $this->upload->data("file_name");
        }
        
        return $this->input->post('img_siswa_old',true);
    }

    public function addStudents(){

        $kelas = explode('_', $this->input->post('kode_kelas'));
        $pass = 'siswa123';
        $tahun_keluar = '-';
        $img = 'default_img.png';
        $nis = $this->_createNIS();

        $data = [
            'nis' => $this->input->post('nis'),
            'nama_siswa' => $this->input->post('nama_siswa'),
            'tempat_lahir' => $this->input->post('tempat_lahir'),
            'tanggal_lahir' => $this->input->post('tanggal_lahir'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'nope' => $this->input->post('nope'),
            'email' => $this->input->post('email'),
            'alamat' => $this->input->post('alamat'),
            'password' => password_hash($pass, PASSWORD_DEFAULT),
            'kode_kejuruan' => $this->input->post('kode_kejuruan'),
            'kode_tahun_ajaran' => $this->input->post('kode_tahun_ajaran'),
            'status_siswa' => $this->input->post('status_siswa'),
            'tahun_keluar' => $tahun_keluar,
            'img_siswa' => $img
        ];

        switch($kelas[0]){
            case 'X':
				$data['kelas_1'] = $this->input->post('kode_kelas');
				break;
			case 'XI':
				$data['kelas_2'] = $this->input->post('kode_kelas');
				break;
			case 'XII':
				$data['kelas_3'] = $this->input->post('kode_kelas');
				break;
        }

        $this->db->insert('tbl_siswa', $data);
    }

    public function editStudents(){
        $data = [
            'nis' => $this->input->post('nis'),
            'nama_siswa' => $this->input->post('nama_siswa'),
            'tempat_lahir' => $this->input->post('tempat_lahir'),
            'tanggal_lahir' => $this->input->post('tanggal_lahir'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'nope' => $this->input->post('nope'),
            'email' => $this->input->post('email'),
            'alamat' => $this->input->post('alamat'),
            // 'alamat' => $this->input->post('password'),
            'kode_kejuruan' => $this->input->post('kode_kejuruan'),
            'kelas_1' => $this->input->post('kelas_1'),
            'kelas_2' => $this->input->post('kelas_2'),
            'kelas_3' => $this->input->post('kelas_3'),
            'kode_tahun_ajaran' => $this->input->post('kode_tahun_ajaran'),
            'status_siswa' => $this->input->post('status_siswa'),
            'tahun_keluar' => $this->input->post('tahun_keluar'),
            'img_siswa' => $this->_uploadImage()
        ];

        $this->db->where('nis', $this->input->post('nis'));
        $this->db->update('tbl_siswa', $data);
    }

    public function editPassword(){
        $data = [
            'nis' => $this->input->post('nis'),
            'password' => password_hash( $this->input->post('newpassword'), PASSWORD_DEFAULT)
        ];

        $this->db->where('nis', $this->input->post('nis'));
        $this->db->update('tbl_siswa', $data);
    }

    public function deleteStudents($kd){
        $this->db->delete('tbl_siswa', ['nis' => $kd]);
    }

}