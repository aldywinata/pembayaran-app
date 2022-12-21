<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RiwayatPembayaran extends CI_Controller{

    public function __construct(){
        parent::__construct();

        $this->load->model('RiwayatPembayaran_model');
        // $this->load->model('InputPembayaran_model');
        
    }
    
    public function index(){
        $data['title'] = "Data Kejuruan";
        $data['administrator'] = $this->db->get_where('tbl_user', ['nip' => $this->session->userdata('nip')])->row_array();
        
        $data['staPem'] = $this->RiwayatPembayaran_model->getPembayaran();


        $this->load->view('templates/header', $data);
        $this->load->view('dashboard/topbar', $data);
        $this->load->view('dashboard/administrator/sidebar', $data);
        $this->load->view('pembayaran/riwayat-pembayaran/index', $data);
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
        $this->load->view('pembayaran/riwayat-pembayaran/detailRiwayat', $data);
        $this->load->view('templates/footer');
    }

    public function print($kd){
        $data['title'] = "Print Laporan Pembayaran";
        $data['administrator'] = $this->db->get_where('tbl_user', ['nip' => $this->session->userdata('nip')])->row_array();
        
        $data['staLunas'] = $this->RiwayatPembayaran_model->getPembayaranByKode($kd);
        $data['dePem'] = $this->RiwayatPembayaran_model->getAllPembayaran();

        // panggil library yang kita buat sebelumnya yang bernama pdfgenerator
        $this->load->library('pdfgenerator');
        
        // title dari pdf
        $data['title_pdf'] = 'Laporan Pembayaran';
        
        // filename dari pdf ketika didownload
        $file_pdf = 'Laporan Pembayaran Siswa';
        // setting paper
        $paper = 'A4';
        //orientasi paper potrait / landscape
        $orientation = "portrait";
        
		$html = $this->load->view('pembayaran/riwayat-pembayaran/cetak',$data, true);	    
        
        // run dompdf
        $this->pdfgenerator->generate($html, $file_pdf,$paper,$orientation);
        // $this->load->view('templates/header', $data);
        // $this->load->view('pembayaran/riwayat-pembayaran/cetak', $data);
        // $this->load->view('templates/footer');
    }
}