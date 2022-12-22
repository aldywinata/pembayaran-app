<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller{

    public function __construct(){
        parent::__construct();

        $this->load->model('Students_model');
        $this->load->model('Kejuruan_model');
        $this->load->model('Kelas_model');
        $this->load->model('TahunAjaran_model');
    }
    
    public function index(){

        $data['title'] = $this->session->userdata('level');
        $data['administrator'] = $this->db->get_where('tbl_user', ['nip' => $this->session->userdata('nip')])->row_array();
        $data['siswa'] = $this->db->get_where('tbl_siswa', ['nis' => $this->session->userdata('nis')])->row_array();        
        
        $this->load->view('templates/header', $data);
        $this->load->view('dashboard/topbar', $data);
        $this->load->view('dashboard/administrator/sidebar', $data);
        $this->load->view('dashboard/index', $data);
        $this->load->view('templates/footer');
    }

    public function student(){

        $data['title'] = $this->session->userdata('level');
        $data['administrator'] = $this->db->get_where('tbl_user', ['nip' => $this->session->userdata('nip')])->row_array();
        // $data['siswa'] = $this->db->get_where('tbl_siswa', ['nis' => $this->session->userdata('nis')])->row_array();        
        
        $kd = $this->session->userdata('nis');

        $data['siswa'] = $this->Students_model->getStudentsById($kd);
        $data['kejuruan'] = $this->Kejuruan_model->getAllKejuruan();
        $data['kelas'] = $this->Kelas_model->getAllKelas();
        $data['tahunAjaran'] = $this->TahunAjaran_model->getAllTahunAjaran();
        $data['j_kel'] = ['LAKI - LAKI', 'PEREMPUAN'];
        $data['status_siswa'] = ['AKTIF', 'PINDAH MASUK', 'PINDAH KELUAR', 'LULUS', 'DROP OUT'];

        $this->load->view('templates/header', $data);
        $this->load->view('dashboard/student/topbar', $data);
        $this->load->view('dashboard/student/sidebar', $data);
        $this->load->view('dashboard/student/index', $data);
        $this->load->view('templates/footer');
    }
}