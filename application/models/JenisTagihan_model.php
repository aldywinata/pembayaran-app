<?php

class jenisTagihan_model extends CI_Model{

    public function getAllJenisTagihan(){
        $this->db->select('*');
        $this->db->from('tbL_jenis_tagihan');
        $this->db->join('tbl_tahun_ajaran', 'tbl_tahun_ajaran.kode_tahun_ajaran = tbl_jenis_tagihan.kode_tahun_ajaran');
        $query = $this->db->get()->result_array();

        return $query;

        // return $this->db->get('tbl_jenis_tagihan')->result_array();
    }

    function getJenisTagihan(){
        return $this->db->get('tbl_jenis_tagihan')->row_array();
    }

    public function getJenisTagihanById($kd){
        return $this->db->get_where('tbl_jenis_tagihan', ['kode_tagihan' => $kd])->row_array();
    }

    function _createKode(){
        $tahun = date("y");

        $this->db->select('RIGHT(tbl_jenis_tagihan.kode_tagihan,3) as kode_tagihan', FALSE);
        $this->db->order_by('kode_tagihan', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('tbl_jenis_tagihan');

            if( $query->num_rows() <> 0 ){
                $data = $query->row();
                $kode = intval($data->kode_tagihan) + 1;
            }else{
                $kode = 1;
            }

        $batas = str_pad($kode, 3, "0", STR_PAD_LEFT);
        $kodeTampil = 'KT'.$tahun.$batas ;

        return $kodeTampil;
    }

    public function addTagihan(){
        $data = [
            'kode_tagihan' => $this->input->post('kode_tagihan'),
            'kode_tahun_ajaran' => $this->input->post('kode_tahun_ajaran'),
            'nama_tagihan' => $this->input->post('nama_tagihan'),
            'nominal' => $this->input->post('nominal'),
        ];

        $this->db->insert('tbl_jenis_tagihan', $data);
    }


    public function deleteTagihan($kd){
        $this->db->delete('tbl_jenis_tagihan', ['kode_tagihan' => $kd]);
    }

}