<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class JenisTagihan extends CI_Controller{

    public function __construct(){
        parent::__construct();

        $this->load->model('jenisTagihan_model');
        $this->load->model('TahunAjaran_model');
    }

    public function index(){
        $data['title'] = "Data Kejuruan";
        $data['administrator'] = $this->db->get_where('tbl_user', ['nip' => $this->session->userdata('nip')])->row_array();
        $data['jenisTagihan'] = $this->jenisTagihan_model->getAllJenisTagihan();
        $data['kodeGenerate'] = $this->jenisTagihan_model->_createKode();
        $data['tahunAjaran'] = $this->TahunAjaran_model->getAllTahunAjaran();

        $this->load->view('templates/header', $data);
        $this->load->view('dashboard/topbar', $data);
        $this->load->view('dashboard/administrator/sidebar', $data);
        $this->load->view('jenis-tagihan/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah(){
        $this->jenisTagihan_model->addTagihan();
        redirect('JenisTagihan');
    }

    public function ubah($kd){
        $data['title'] = "Ubah Data Tagihan";
        $data['administrator'] = $this->db->get_where('tbl_user', ['nip' => $this->session->userdata('nip')])->row_array();

        $data['jenisTagihan'] = $this->jenisTagihan_model->getJenisTagihanById($kd);
        $data['tahunAjaran'] = $this->TahunAjaran_model->getAllTahunAjaran();


        $this->load->view('templates/header', $data);
        $this->load->view('dashboard/topbar', $data);
        $this->load->view('dashboard/administrator/sidebar', $data);
        $this->load->view('Jenis-Tagihan/ubah', $data);
        $this->load->view('templates/footer');
    }

    public function editTagihan(){
        $data = [
            'kode_tagihan' => $this->input->post('kode_tagihan'),
            'kode_tahun_ajaran' => $this->input->post('kode_tahun_ajaran'),
            'nama_tagihan' => $this->input->post('nama_tagihan'),
            'nominal' => $this->input->post('nominal'),
        ];

        $this->db->where('kode_tagihan', $this->input->post('kode_tagihan'));
        $this->db->update('tbl_jenis_tagihan', $data);

        redirect('JenisTagihan');
    }

    public function hapus($kd){
        $this->jenisTagihan_model->deleteTagihan($kd);
        redirect('JenisTagihan');
    }

}