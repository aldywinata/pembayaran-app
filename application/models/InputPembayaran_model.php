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
        
        $kode_pembayaran = $this->input->post('kode_pembayaran');
        $kode_tagihan = $this->input->post('kode_tagihan');
        $nis = $this->input->post('nis');
        $nama_tagihan = $this->input->post('keterangan');
        
        $nominal = $this->input->post('nominal');
        
        $data2 = array();

        $index = 0;
        foreach( $kode_tagihan as $tagihan ){
            array_push($data2, array(
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

    public function getAllDetailPembayaran($kd){
        $this->db->select('*');
        $this->db->from('tbl_pembayaran_detail');
        $this->db->join('tbl_pembayaran', 'tbl_pembayaran.kode_pembayaran = tbl_pembayaran_detail.kode_pembayaran');
        $this->db->join('tbl_jenis_tagihan', 'tbl_jenis_tagihan.kode_tagihan = tbl_pembayaran_detail.kode_tagihan');
        $this->db->join('tbl_siswa', 'tbl_siswa.nis = tbl_pembayaran_detail.nis');
        // $this->db->join('tbl_angsuran', 'tbl_angsuran.kode_angsuran = tbl_pembayaran_detail.kode_angsuran');
        $this->db->where('tbl_pembayaran_detail.nis',$kd);
        // $this->db->order_by('tbl_pembayaran_detail.kode_pembayaran_detail');

        return $this->db->get()->result_array();


        // return $this->db->get_where('tbl_pembayaran_detail', ['nis' => $kd])->result_array();
        
    }

    public function konBayar(){

        $tgl = date('Y-m-d');
        $total = $this->input->post('total');
        $bayar = $this->input->post('nominal_bayar');
        $kembalian = $bayar - $total;
        $status = "LUNAS";


        $data = [
            'kode_pembayaran' => $this->input->post('kode_pembayaran'),
            'tanggal_pembayaran' => $tgl,
            'total' => $total,
            'bayar' => $bayar,
            'kembalian' => $kembalian,
            'status_pembayaran' => $status
        ];

        $this->db->where('kode_pembayaran', $this->input->post('kode_pembayaran'));
        $this->db->update('tbl_pembayaran', $data);
    }

    public function getBulan(){
        $this->db->select('*');
        $this->db->from('tbl_bulan');
        $this->db->join('tbl_jenis_tagihan', 'tbl_jenis_tagihan.kode_tagihan = tbl_bulan.kode_tagihan');

        return $this->db->get()->result_array();

        // return $this->db->get('tbl_bulan')->result_array();
    }

}