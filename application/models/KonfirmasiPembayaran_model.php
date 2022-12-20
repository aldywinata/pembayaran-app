<?php

class KonfirmasiPembayaran_model extends CI_Model{
    public function accPembayaran($kd){
        $status = "LUNAS";

        $data = [
            'status_pembayaran' => $status
        ];

        $this->db->where('kode_pembayaran', $kd);
        $this->db->update('tbl_pembayaran', $data);
    }

    public function rejectPembayaran($kd){
        $status = "PROSES";

        $data = [
            'status_pembayaran' => $status
        ];

        $this->db->where('kode_pembayaran', $kd);
        $this->db->update('tbl_pembayaran', $data);
    }
}