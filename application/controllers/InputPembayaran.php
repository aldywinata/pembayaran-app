<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class InputPembayaran extends CI_Controller{

    public function __construct(){
        parent::__construct();

        $this->load->model('InputPembayaran_model');
        $this->load->model('Students_model');
        $this->load->model('Kelas_model');
        // $this->load->model('Kejuruan_model');
        $this->load->model('jenisTagihan_model');
        // $this->load->model('TahunAjaran_model');
    }

    

    public function index(){
        $data['title'] = "Data Kejuruan";
        $data['administrator'] = $this->db->get_where('tbl_user', ['nip' => $this->session->userdata('nip')])->row_array();
        // $data['jenisTagihan'] = $this->jenisTagihan_model->getAllJenisTagihan();
        // $data['kodeGenerate'] = $this->jenisTagihan_model->_createKode();
        // $data['tahunAjaran'] = $this->TahunAjaran_model->getAllTahunAjaran();
        $data['students'] = $this->Students_model->getAllStudents();
        $data['kelas'] = $this->Kelas_model->getAllKelas();


        $this->load->view('templates/header', $data);
        $this->load->view('dashboard/topbar', $data);
        $this->load->view('dashboard/administrator/sidebar', $data);
        $this->load->view('pembayaran/input-pembayaran/index', $data);
        $this->load->view('templates/footer');
    }

    public function pembayaran($kd){
        $data['title'] = "Data Kejuruan";
        $data['administrator'] = $this->db->get_where('tbl_user', ['nip' => $this->session->userdata('nip')])->row_array();
        $data['kodeGenerate'] = $this->InputPembayaran_model->_createCode();
        $data['kodeGenerateDP'] = $this->InputPembayaran_model->_createCodeDP();
        
        $data['jenis_tagihan'] = $this->jenisTagihan_model->getAllJenisTagihan();
        $data['students'] = $this->Students_model->getStudentsById($kd);
        // $data['cekStatus'] = $this->InputPembayaran_model->getStatusLunas($kd);

        $data['bulans'] = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

        $this->load->view('templates/header', $data);
        $this->load->view('dashboard/topbar', $data);
        $this->load->view('dashboard/administrator/sidebar', $data);
        $this->load->view('pembayaran/input-pembayaran/pembayaran', $data);
        $this->load->view('templates/footer');
    }

    public function add(){
        $this->InputPembayaran_model->addPembayaran();
        
    }

    public function detailPembayaran($kd){
        $data['title'] = "Data Kejuruan";
        $data['administrator'] = $this->db->get_where('tbl_user', ['nip' => $this->session->userdata('nip')])->row_array();
        // $data['kodeGenerateDP'] = $this->InputPembayaran_model->_createCodeDP();
        
        $data['dePem'] = $this->InputPembayaran_model->getAllDetailPembayaran($kd);

        $data['jenis_tagihan'] = $this->jenisTagihan_model->getAllJenisTagihan();
        $data['students'] = $this->Students_model->getStudentsById($kd);
        // $data['cekStatus'] = $this->InputPembayaran_model->getStatusLunas($kd);

        $data['bulans'] = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

        $this->load->view('templates/header', $data);
        $this->load->view('dashboard/topbar', $data);
        $this->load->view('dashboard/administrator/sidebar', $data);
        $this->load->view('pembayaran/input-pembayaran/detailPembayaran', $data);
        $this->load->view('templates/footer');
    }

}