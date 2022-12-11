<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Kelas extends CI_Controller{

    public function __construct(){
        parent::__construct();

        $this->load->model('Kelas_model');
        $this->load->model('Kejuruan_model');
    }

    public function index(){
        $data['title'] = "Data Kelas";
        $data['administrator'] = $this->db->get_where('tbl_user', ['nip' => $this->session->userdata('nip')])->row_array();

        $data['kelas'] = $this->Kelas_model->getAllKelas();
        $data['kejuruan'] = $this->Kejuruan_model->getAllKejuruan();

        $this->load->view('templates/header', $data);
        $this->load->view('dashboard/topbar', $data);
        $this->load->view('dashboard/administrator/sidebar', $data);
        $this->load->view('kelas/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah(){
        $this->Kelas_model->addKelas();
        redirect('Kelas');
    }

    public function ubah($kd){
        $data['title'] = "Data Kelas";
        $data['administrator'] = $this->db->get_where('tbl_user', ['nip' => $this->session->userdata('nip')])->row_array();

        $data['kelas'] = $this->Kelas_model->getKelasById($kd);
        $data['kejuruan'] = $this->Kejuruan_model->getAllKejuruan();
        $data['nKelas'] = ['X', 'XI', 'XII'];

        $this->load->view('templates/header', $data);
        $this->load->view('dashboard/topbar', $data);
        $this->load->view('dashboard/administrator/sidebar', $data);
        $this->load->view('kelas/ubah', $data);
        $this->load->view('templates/footer');
    }

    public function editKelas(){
        $data = [
            'kode_kelas' => $this->input->post('kodeKelas'),
            'kelas' => $this->input->post('kelas'),
            'kode_kejuruan' => $this->input->post('kodeKejuruan'),
            'nama_kelas' => $this->input->post('namaKelas')
        ];

        $this->db->where('kode_kelas', $this->input->post('kodeKelas'));
        $this->db->update('tbl_kelas', $data);

        redirect('Kelas');
    }

    public function hapus($kd){
        $this->Kelas_model->deleteKelas($kd);
        redirect('Kelas');
    }

}