<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Students extends CI_Controller{

    public function __construct(){
        parent::__construct();

        $this->load->model('Students_model');
        $this->load->model('Kejuruan_model');
        $this->load->model('Kelas_model');
        $this->load->model('TahunAjaran_model');
    }
    
    public function index(){

        $data['title'] = "Administrator";
        $data['administrator'] = $this->db->get_where('tbl_user', ['nip' => $this->session->userdata('nip')])->row_array();
        
        $data['students'] = $this->Students_model->getAllStudents(); 


        $this->load->view('templates/header', $data);
        $this->load->view('dashboard/topbar', $data);
        $this->load->view('dashboard/administrator/sidebar', $data);
        $this->load->view('students/index', $data);
        $this->load->view('templates/footer');
    }

    public function profil($kd){

        $data['title'] = "Administrator";
        $data['administrator'] = $this->db->get_where('tbl_user', ['nip' => $this->session->userdata('nip')])->row_array();
        
        $data['student'] = $this->Students_model->getStudentsById($kd); 
        $data['kejuruan'] = $this->Kejuruan_model->getAllKejuruan();
        $data['kelas'] = $this->Kelas_model->getAllKelas();
        $data['tahunAjaran'] = $this->TahunAjaran_model->getAllTahunAjaran();
        $data['j_kel'] = ['LAKI - LAKI', 'PEREMPUAN'];
        $data['status_siswa'] = ['AKTIF', 'PINDAH MASUK', 'PINDAH KELUAR', 'LULUS', 'DROP OUT'];

        $this->load->view('templates/header', $data);
        $this->load->view('dashboard/topbar', $data);
        $this->load->view('dashboard/administrator/sidebar', $data);
        $this->load->view('students/profil', $data);
        $this->load->view('templates/footer');
    }

    public function tambahSiswa(){
        $data['title'] = "Administrator";
        $data['administrator'] = $this->db->get_where('tbl_user', ['nip' => $this->session->userdata('nip')])->row_array();
        $data['nisGenerate'] = $this->Students_model->_createNIS();

        $data['kejuruan'] = $this->Kejuruan_model->getAllKejuruan();
        $data['kelas'] = $this->Kelas_model->getAllKelas();
        $data['tahunAjaran'] = $this->TahunAjaran_model->getAllTahunAjaran();
        $data['j_kel'] = ['LAKI - LAKI', 'PEREMPUAN'];
        $data['status_siswa'] = ['AKTIF', 'PINDAH MASUK'];


        $this->load->view('templates/header', $data);
        $this->load->view('dashboard/topbar', $data);
        $this->load->view('dashboard/administrator/sidebar', $data);
        $this->load->view('students/tambahSiswa', $data);
        $this->load->view('templates/footer');
    }

    public function add(){
        $this->Students_model->addStudents();
        redirect('Students');
    }

    public function ubahsiswa(){
        $this->Students_model->editStudents();
        redirect('Students');
    }

    public function ubahPassword(){
        $this->Students_model->editPassword();
        redirect('Students');
    }

    public function hapus($kd){
        $this->Students_model->deleteStudents($kd);
        redirect('Students');
    }

    

}