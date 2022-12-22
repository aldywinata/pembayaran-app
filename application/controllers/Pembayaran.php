<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembayaran extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('InputPembayaran_model');
        $this->load->model('Students_model');
        $this->load->model('Kelas_model');
        $this->load->model('jenisTagihan_model');
    }

    public function index()
    {
        $data['title'] = "Data Kejuruan";
        $data['siswa'] = $this->db->get_where('tbl_siswa', ['nis' => $this->session->userdata('nis')])->row_array();
        $data['kodeGenerate'] = $this->InputPembayaran_model->_createCode();
        
        $kd = $this->session->userdata('nis');

        $data['dePem'] = $this->InputPembayaran_model->getAllDetailPembayaran($kd);
        $data['jenis_tagihan'] = $this->jenisTagihan_model->getAllJenisTagihan();
        $data['bulans'] = $this->InputPembayaran_model->getBulan();
        $data['students'] = $this->Students_model->getStudentsById($kd);

        // $data['bulans'] = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

        $this->load->view('templates/header', $data);
        $this->load->view('dashboard/student/topbar', $data);
        $this->load->view('dashboard/student/sidebar', $data);
        $this->load->view('students/input-pembayaran/index', $data);
        $this->load->view('templates/footer');
    }

    public function add()
    {
        $this->Pembayaran_model->addPembayaran();
    }
}