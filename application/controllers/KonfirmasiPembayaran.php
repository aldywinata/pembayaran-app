<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KonfirmasiPembayaran extends CI_Controller{
    public function __construct(){
        parent::__construct();

        $this->load->model('RiwayatPembayaran_model');
        $this->load->model('KonfirmasiPembayaran_model');
        // $this->load->model('InputPembayaran_model');
        
    }
    
    public function index(){
        $data['title'] = "Data Kejuruan";
        $data['administrator'] = $this->db->get_where('tbl_user', ['nip' => $this->session->userdata('nip')])->row_array();
        
        $data['staPem'] = $this->RiwayatPembayaran_model->getPembayaran();


        $this->load->view('templates/header', $data);
        $this->load->view('dashboard/topbar', $data);
        $this->load->view('dashboard/administrator/sidebar', $data);
        $this->load->view('pembayaran/konfirmasi-pembayaran/index', $data);
        $this->load->view('templates/footer');
    }

    public function detail($kd){
        $data['title'] = "Data Kejuruan";
        $data['administrator'] = $this->db->get_where('tbl_user', ['nip' => $this->session->userdata('nip')])->row_array();
        
        $data['staLunas'] = $this->RiwayatPembayaran_model->getPembayaranByKode($kd);
        $data['dePem'] = $this->RiwayatPembayaran_model->getAllPembayaran();

        $this->load->view('templates/header', $data);
        $this->load->view('dashboard/topbar', $data);
        $this->load->view('dashboard/administrator/sidebar', $data);
        $this->load->view('pembayaran/konfirmasi-pembayaran/detailKonfirmasi', $data);
        $this->load->view('templates/footer');
    }

    public function konfir($kd){
        $this->KonfirmasiPembayaran_model->accPembayaran($kd);
        redirect('KonfirmasiPembayaran');
    }

    public function tolak($kd){
        $this->KonfirmasiPembayaran_model->rejectPembayaran($kd);
        redirect('KonfirmasiPembayaran');
    }
}