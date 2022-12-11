<?php

class Kelas_model extends CI_Model{
    
    public function getAllKelas(){
        // $this->db->select('*');
        // $this->db->from('tbL_kelas');
        // $this->db->join('tbl_kejuruan', 'tbl_kejuruan.kode_kejuruan = tbl_kelas.kode_kejuruan');
        // $query = $this->db->get()->result_array();

        // return $query;

        return $this->db->get('tbl_kelas')->result_array();
        
    }

    public function getKelasById($kd){
        return $this->db->get_where('tbl_kelas', ['kode_kelas' => $kd])->row_array();
    }

    public function addKelas(){
        $data = [
            'kode_kelas' => $this->input->post('kodeKelas'),
            'kelas' => $this->input->post('kelas'),
            'kode_kejuruan' => $this->input->post('kodeKejuruan'),
            'nama_kelas' => $this->input->post('namaKelas')
        ];

        $this->db->insert('tbl_kelas', $data);
    }

    public function deleteKelas($kd){
        $this->db->delete('tbl_kelas', ['kode_kelas' => $kd]);
    }
}