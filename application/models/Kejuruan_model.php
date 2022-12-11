<?php

class Kejuruan_model extends CI_Model{

    public function getAllKejuruan(){
        return $this->db->get('tbl_kejuruan')->result_array();
    }

    public function addKejuruan(){
        $data = [
            'kode_kejuruan' => $this->input->post('kodeKejuruan'),
            'nama_kejuruan' => $this->input->post('namaKejuruan')

        ];

        $this->db->insert('tbl_kejuruan', $data);
    }

    public function getKejuruanById($kd){
        return $this->db->get_where('tbl_kejuruan', ['kode_kejuruan' => $kd])->row_array();
    }

    public function deleteKejuruan($kd){
        $this->db->delete('tbl_kejuruan', ['kode_kejuruan' => $kd]);
    }
}