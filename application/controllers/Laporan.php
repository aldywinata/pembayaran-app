<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Laporan_model');
    }

    public function index()
    {
        $startdate = $this->input->get('startdate', TRUE);
        $enddate = $this->input->get('enddate', TRUE);
        

        if( empty($startdate) or empty($enddate) )
        {
            $data['pembayarans'] = $this->Laporan_model->getAllPembayaran();
            $label = 'Semua Data Pembayaran';

        }else{
            $data['pembayarans'] = $this->Laporan_model->getPembayaranFillterDate($startdate, $enddate);

            $tglAwal  = date('d-m-Y', strtotime($startdate));
            $tglakhir = date('d-m-Y', strtotime($enddate));
            $label    = 'Periode Tanggal '.$tglAwal.' s/d '.$tglakhir ;
        }

        

        $data['title'] = "Administrator";
        $data['administrator'] = $this->db->get_where('tbl_user', ['nip' => $this->session->userdata('nip')])->row_array();
        $data['label'] = $label;

        $this->load->view('templates/header', $data);
        $this->load->view('dashboard/topbar', $data);
        $this->load->view('dashboard/administrator/sidebar', $data);
        $this->load->view('laporan/index', $data);
        $this->load->view('templates/footer');
    }
}