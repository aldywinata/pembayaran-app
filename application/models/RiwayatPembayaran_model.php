<?php

class RiwayatPembayaran_model extends CI_Model{

    public function getPembayaran(){
        $this->db->order_by('tanggal_pembayaran', 'desc');
        return $this->db->get('tbl_pembayaran')->result_array();
    }

    public function getAllPembayaran(){
        $this->db->select('*');
        $this->db->from('tbl_pembayaran_detail');
        $this->db->join('tbl_pembayaran', 'tbl_pembayaran.kode_pembayaran = tbl_pembayaran_detail.kode_pembayaran');
        $this->db->join('tbl_jenis_tagihan', 'tbl_jenis_tagihan.kode_tagihan = tbl_pembayaran_detail.kode_tagihan');
        $this->db->join('tbl_siswa', 'tbl_siswa.nis = tbl_pembayaran_detail.nis');
        

        return $this->db->get()->result_array();
    }

    public function getPembayaranByKode($kd){
        $this->db->select('*');
        $this->db->from('tbl_pembayaran_detail');
        $this->db->join('tbl_pembayaran', 'tbl_pembayaran.kode_pembayaran = tbl_pembayaran_detail.kode_pembayaran');
        $this->db->join('tbl_jenis_tagihan', 'tbl_jenis_tagihan.kode_tagihan = tbl_pembayaran_detail.kode_tagihan');
        $this->db->join('tbl_siswa', 'tbl_siswa.nis = tbl_pembayaran_detail.nis');
        $this->db->where('tbl_pembayaran_detail.kode_pembayaran', $kd);

        return $this->db->get()->row_array();
    }
}