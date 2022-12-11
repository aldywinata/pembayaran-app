<?php

class InputPembayaran_model extends CI_Model{

    function _createCode(){
        $tahun = date("y");
        $bulan = date("m");
        $tgl   = date("d");

        $this->db->select('RIGHT(tbl_pembayaran.kode_pembayaran,3) as kode_pembayaran', FALSE);
        $this->db->order_by('kode_pembayaran', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('tbl_pembayaran');

            if( $query->num_rows() <> 0 ){
                $data = $query->row();
                $kode = intval($data->kode_pembayaran) + 1;
            }else{
                $kode = 1;
            }

        $batas = str_pad($kode, 4, "0", STR_PAD_LEFT);
        $kodeTampil = $tahun.$bulan.$tgl.$batas ;

        return $kodeTampil;
    }

    function _createCodeDP(){
        $tahun = date("y");
        $bulan = date("m");

        $this->db->select('RIGHT(tbl_pembayaran_detail.kode_pembayaran_detail,3) as kode_pembayaran_detail', FALSE);
        $this->db->order_by('kode_pembayaran_detail', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('tbl_pembayaran_detail');

            if( $query->num_rows() <> 0 ){
                $data = $query->row();
                $kode = intval($data->kode_pembayaran_detail) + 1;
            }else{
                $kode = 1;
            }

        $batas = str_pad($kode, 4, "0", STR_PAD_LEFT);
        $kodeTampil = 'PD'.$tahun.$bulan.$batas ;

        return $kodeTampil;
    }

    public function addDetailPembayaran($kd){
        return $this->db->insert_batch('tbl_pembayaran_detail', $kd);
    }

    public function addPembayaran(){
        $status = "PROSES";
        $data = [
            'kode_pembayaran' => $this->input->post('kode_pembayaran'),
            'status_pembayaran' => $status
        ];

        $this->db->insert('tbl_pembayaran', $data);

        $kode_pembayaran_detail = $this->input->post('kode_pembayaran_detail');
        $kode_pembayaran = $this->input->post('kode_pembayaran');
        $kode_tagihan = $this->input->post('kode_tagihan');
        $nis = $this->input->post('nis');
        $nama_tagihan = $this->input->post('keterangan');
        
        $nominal = $this->input->post('nominal');
        $data2 = array();

        $index = 0;
        foreach( $kode_tagihan as $tagihan ){
            array_push($data2, array(
                'kode_pembayaran_detail' => $kode_pembayaran_detail,
                'kode_pembayaran' => $kode_pembayaran,
                'kode_tagihan' => $kode_tagihan[$index],
                'nis' => $nis,
                'keterangan' => $nama_tagihan[$index],
                'nominal' => $nominal[$index]
            ));

            $index++;
        }

        $this->InputPembayaran_model->addDetailPembayaran($data2);

        $kd = $this->input->post('nis');
        redirect('InputPembayaran/detailPembayaran/'.$kd);
    }

    

    public function getTagihanLunas($kd){
        $this->db->select('*');
        $this->db->from('tbl_pembayaran_detail');
        $this->db->join('tbl_pembayaran', 'tbl_pembayaran.kode_pembayaran = tbl_pembayaran_detail.kode_pembayaran');
        $this->db->join('tbl_jenis_tagihan', 'tbl_jenis_tagihan.kode_tagihan = tbl_pembayaran_detail.kode_pembayaran');
        $this->db->where('tbl_pembayaran.nis', $kd);

        return $this->db->get()->row_array();
    }

    public function getAllPembayaran(){
        $this->db->select('*');
        $this->db->from('tbl_pembayaran');
        $this->db->join('tbl_siswa', 'tbl_siswa.nis = tbl_pembayaran.nis');
        $this->db->where('tbl_pembayaran.kode_pembayaran');

        return $this->db->get()->row_array();
    }

    public function getAllDetailPembayaran($kd){
        // $this->db->select('*');
        // $this->db->from('tbl_pembayaran_detail');
        // $this->db->join('tbl_pembayaran', 'tbl_pembayaran.kode_pembayaran = tbl_pembayaran_detail.kode_pembayaran');
        // $this->db->join('tbl_jenis_tagihan', 'tbl_jenis_tagihan.kode_tagihan = tbl_pembayaran_detail.kode_tagihan');
        // $this->db->join('tbl_siswa', 'tbl_siswa.nis = tbl_pembayaran_detail.nis');
        // $this->db->join('tbl_angsuran', 'tbl_angsuran.kode_angsuran = tbl_pembayaran_detail.kode_angsuran');
        // $this->db->where('tbl_pembayaran_detail.nis',$kd);
        // $this->db->order_by('tbl_pembayaran_detail.kode_pembayaran_detail');

        // return $this->db->get()->result_array();

        // $this->db->select('*');
        // $this->db->from('tbl_pembayaran_detail');
        // $this->db->join('tbl_pembayaran', 'tbl_pembayaran.kode_pembayaran = tbl_pembayaran_detail.kode_pembayaran');
        // $this->db->join('tbl_jenis_tagihan', 'tbl_jenis_tagihan.kode_tagihan = tbl_pembayaran_detail.kode_tagihan');
        // $this->db->join('tbl_siswa', 'tbl_siswa.nis = tbl_pembayaran_detail.nis');
        // $this->db->join('tbl_angsuran', 'tbl_angsuran.kode_angsuran = tbl_pembayaran_detail.kode_angsuran');
        // $this->db->where('tbl_pembayaran_detail.nis', $kd);
        // $this->db->order_by('tbl_pembayaran_detail.kode_pembayaran_detail');

        // $result = $this->db->where('nis', $kd)->limit(1)->get('tbl_pembayaran_detail');

        // if ($result->num_rows() > 0){
        //     return $result->row();
        // }else{
        //     return $result;
        // }


        return $this->db->get_where('tbl_pembayaran_detail', ['nis' => $kd])->result_array();

        
    }

    public function getDePem(){
        
        $data['kode_pembayaran'] = $this->getAllPembayaran();
        // $data['kode_pembayaran'] = $this->getAllDetailPembayaran();

        if( $data['kode_pembayaran'] == $data['kode_pembayaran'] ){
            $this->db->select('*');
            $this->db->from('tbl_pembayaran_detail');
            $this->db->join('tbl_jenis_tagihan', '$tbl_jenis_tagihan.kode_tagihan = tbl_pembayaran_detail.kode_tagihan');
            $this->db->where('tbl_pembayaran_detail');

            return $this->db->get()->row_array();
        };
    }

    public function getDetailPembayaran($kd){
        $this->db->select('*');
        $this->db->from('tbl_pembayaran_detail');
        $this->db->join('tbl_pembayaran', 'tbl_pembayaran.kode_pembayaran = tbl_pembayaran_detail.kode_pembayaran');
        $this->db->join('tbl_jenis_tagihan', 'tbl_jenis_tagihan.kode_tagihan = tbl_pembayaran_detail.kode_tagihan');
        $this->db->join('tbl_angsuran', 'tbl_angsuran.kode_angsuran = tbl_pembayaran_detail.kode_angsuran');
        // $this->db->from('tbl_pembayaran');
        // $this->db->join('tbl_siswa', 'tbl_siswa.nis = tbl_pembayaran.nis');
        $this->db->where('tbl_pembayaran.nis', $kd);

        return $this->db->get()->row_array();
        // return $this->db->get_where('tbl_pembayaran_detail', ['kode_pembayaran_detail' => $kd])->row_array();
    }

    public function getStatusLunas($kd){
        return $this->db->get_where('tbl_pembayaran', ['nis' => $kd])->row_array();
    }

}