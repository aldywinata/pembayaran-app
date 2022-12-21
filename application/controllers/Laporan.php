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
            $url_print = 'Laporan/print';
        }else{
            $data['pembayarans'] = $this->Laporan_model->getPembayaranFillterDate($startdate, $enddate);

            $tglAwal  = date('d-m-Y', strtotime($startdate));
            $tglakhir = date('d-m-Y', strtotime($enddate));
            $label    = 'Periode Tanggal '.$tglAwal.' s/d '.$tglakhir ;
            $url_print = 'Laporan/print?startdate='.$startdate.'&enddate='.$enddate;
        }

        $data['title'] = "Administrator";
        $data['administrator'] = $this->db->get_where('tbl_user', ['nip' => $this->session->userdata('nip')])->row_array();
        $data['label'] = $label;
        $data['url_print'] = base_url($url_print);

        $this->load->view('templates/header', $data);
        $this->load->view('dashboard/topbar', $data);
        $this->load->view('dashboard/administrator/sidebar', $data);
        $this->load->view('laporan/index', $data);
        $this->load->view('templates/footer');
    }

    public function print()
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

        $data['label'] = $label;

        // panggil library yang kita buat sebelumnya yang bernama pdfgenerator
        $this->load->library('pdfgenerator');
        
        // title dari pdf
        $this->data['title_pdf'] = 'Laporan Penjualan Toko Kita';
        
        // filename dari pdf ketika didownload
        $file_pdf = 'Laporan Pembayaran';
        // setting paper
        $paper = 'A4';
        //orientasi paper potrait / landscape
        $orientation = "portrait";
        
		$html = $this->load->view('Laporan/PrintLaporan',$data, true);	    
        
        // run dompdf
        $this->pdfgenerator->generate($html, $file_pdf,$paper,$orientation);
    }
}