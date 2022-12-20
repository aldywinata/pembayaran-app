<?php

class Laporan_model extends CI_Model
{
    public function getAllPembayaran()
    {
        return $this->db->get('tbl_pembayaran')->result();
    }

    public function getPembayaranFillterDate($startdate, $enddate)
    {
        $startdate = $this->db->escape($startdate);
        $enddate = $this->db->escape($enddate);

        $this->db->where('DATE(tanggal_pembayaran) BETWEEN '. $startdate . 'AND' . $enddate);

        return $this->db->get('tbl_pembayaran')->result();
    }
}