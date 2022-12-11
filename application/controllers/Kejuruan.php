<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kejuruan extends CI_Controller{

    public function __construct(){
        parent::__construct();

        $this->load->model('Kejuruan_model');
    }

    public function index(){
        $data['title'] = "Data Kejuruan";
        $data['administrator'] = $this->db->get_where('tbl_user', ['nip' => $this->session->userdata('nip')])->row_array();
        $data['kejuruan'] = $this->Kejuruan_model->getAllKejuruan();

        $this->load->view('templates/header', $data);
        $this->load->view('dashboard/topbar', $data);
        $this->load->view('dashboard/administrator/sidebar', $data);
        $this->load->view('kejuruan/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah(){
        $this->Kejuruan_model->addKejuruan();
        redirect('Kejuruan');
    }

    public function ubah($kd){
        $data['administrator'] = $this->db->get_where('tbl_user', ['nip' => $this->session->userdata('nip')])->row_array();

        $data['kejuruan'] = $this->Kejuruan_model->getKejuruanById($kd);


        $this->load->view('templates/header', $data);
        $this->load->view('dashboard/topbar', $data);
        $this->load->view('dashboard/administrator/sidebar', $data);
        $this->load->view('kejuruan/ubah', $data);
        $this->load->view('templates/footer');
    }

    public function editKejuruan(){
        $data = [
            'kode_kejuruan' => $this->input->post('kodeKejuruan'),
            'nama_kejuruan' => $this->input->post('namaKejuruan', true)
        ];

        $this->db->where('kode_kejuruan', $this->input->post('kodeKejuruan'));
        $this->db->update('tbl_kejuruan', $data);

        redirect('Kejuruan');
    }

    public function hapus($kd){
        $this->Kejuruan_model->deleteKejuruan($kd);
        redirect('Kejuruan');
    }
}