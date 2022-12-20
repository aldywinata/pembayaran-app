<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class InputPembayaran extends CI_Controller{

    public function __construct(){
        parent::__construct();

        $this->load->model('InputPembayaran_model');
        $this->load->model('Students_model');
        $this->load->model('Kelas_model');
        $this->load->model('jenisTagihan_model');
    }

    public function index(){
        $data['title'] = "Data Kejuruan";
        $data['administrator'] = $this->db->get_where('tbl_user', ['nip' => $this->session->userdata('nip')])->row_array();
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
        
        $data['dePem'] = $this->InputPembayaran_model->getAllDetailPembayaran($kd);
        $data['jenis_tagihan'] = $this->jenisTagihan_model->getAllJenisTagihan();
        $data['bulans'] = $this->InputPembayaran_model->getBulan();
        $data['students'] = $this->Students_model->getStudentsById($kd);

        // $data['bulans'] = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

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
        
        $data['dePem'] = $this->InputPembayaran_model->getAllDetailPembayaran($kd);

        $data['jenis_tagihan'] = $this->jenisTagihan_model->getAllJenisTagihan();
        $data['students'] = $this->Students_model->getStudentsById($kd);

        // $data['bulans'] = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

        $this->load->view('templates/header', $data);
        $this->load->view('dashboard/topbar', $data);
        $this->load->view('dashboard/administrator/sidebar', $data);
        $this->load->view('pembayaran/input-pembayaran/detailPembayaran', $data);
        $this->load->view('templates/footer');
    }

    public function bayar(){
        $total = $this->input->post('total');
        $nominal_bayar = $this->input->post('nominal_bayar');

        if( $nominal_bayar < $total ){
            $this->session->set_flashdata('Info', 'Nominal Pembayaran Kurang !');
            $kd = $this->input->post('nis');
            $this->detailPembayaran($kd);
        }else{
            $this->InputPembayaran_model->konBayar();
            redirect('InputPembayaran');
        }


    }

}