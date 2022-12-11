<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TahunAjaran extends CI_Controller{
    
    public function __construct(){
        parent::__construct();

        $this->load->model('TahunAjaran_model');
    }
    
    public function index(){

        $data['title'] = "Data Tahun Ajaran";
        $data['administrator'] = $this->db->get_where('tbl_user', ['nip' => $this->session->userdata('nip')])->row_array();
        $data['tahunAjaran'] = $this->TahunAjaran_model->getAllTahunAjaran();
        
        $this->load->view('templates/header', $data);
        $this->load->view('dashboard/topbar', $data);
        $this->load->view('dashboard/administrator/sidebar', $data);
        $this->load->view('tahun-ajaran/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah(){

        $this->TahunAjaran_model->addTahunAjaran();
        redirect('TahunAjaran');
    }

    public function ubah($kd){

        $data['administrator'] = $this->db->get_where('tbl_user', ['nip' => $this->session->userdata('nip')])->row_array();

        $data['getDetailTA'] =  $this->TahunAjaran_model->getDetailTahunAjaranById($kd);
        $data['statuss'] = ['AKTIF', 'TIDAK AKTIF'];

        $this->load->view('templates/header', $data);
        $this->load->view('dashboard/topbar', $data);
        $this->load->view('dashboard/administrator/sidebar', $data);
        $this->load->view('tahun-ajaran/ubah', $data);
        $this->load->view('templates/footer');
        
    }

    public function editTahunAjaran(){

        $data = [
            "tahun_ajaran" => $this->input->post('tahunAjaran', true),
            "status" => $this->input->post('status', true)
        ];

        $this->db->where('kode_tahun_ajaran', $this->input->post('kodeTahun'));
        $this->db->update('tbl_tahun_ajaran', $data);

        redirect('TahunAjaran');
        
    }

    public function hapus($kd){
        $this->TahunAjaran_model->deleteTahunAjaran($kd);
        redirect('TahunAjaran');
    }
}