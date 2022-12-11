<?php

class TahunAjaran_model extends CI_Model{
    
    public function getAllTahunAjaran(){
        return $this->db->get('tbl_tahun_ajaran')->result_array();
    }

    public function addTahunAjaran(){

        $data = [
            "kode_tahun_ajaran" => $this->input->post('kodeTahun', true),
            "tahun_ajaran" => $this->input->post('tahunAjaran', true),
            "status" => $this->input->post('status', true)
        ];

        $this->db->insert('tbl_tahun_ajaran', $data);
        
    }

    public function getDetailTahunAjaranById($kd){
        return $this->db->get_where('tbl_tahun_ajaran', ['kode_tahun_ajaran' => $kd])->row_array();
    }

    

    public function deleteTahunAjaran($kd){
        // $this->db->where('kode_tahun_ajaran', $kd);
        $this->db->delete('tbl_tahun_ajaran', ['kode_tahun_ajaran' => $kd]);
    }
}