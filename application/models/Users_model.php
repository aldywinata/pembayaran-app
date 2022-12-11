<?php

class Users_model extends CI_Model{

    public function getAllUsers(){
        return $this->db->get('tbl_user')->result_array();
    }

    public function getUsersById($kd){
        return $this->db->get_where('tbl_user', ['nip' => $kd])->row_array();
    }

    function _uploadImage()
    {

        $config['upload_path']          = './assets/imgs/img-users/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = 2048;
        $config['file_name']            = 'IMG-user'.substr(md5(rand()),0,20);

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('img_user')) {
            return $this->upload->data("file_name");
        }
        
        return $this->input->post('img_user_old',true);
    }

    public function addUser(){

        $data = [
            'nip'       => $this->input->post('nip'),
            'nama_user' => $this->input->post('nama_user'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'nope'          => $this->input->post('nope'),
            'email'         => $this->input->post('email'),
            'alamat'        => $this->input->post('alamat'),
            'level'         => $this->input->post('level'),
            'password'      => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'img_user'      => $this->_uploadImage()
        ];

        $this->db->insert('tbl_user', $data);
    }

    public function editUser(){
        $data = [
            'nip'           => $this->input->post('nip'),
            'nama_user'     => $this->input->post('nama_user'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'nope'          => $this->input->post('nope'),
            'email'         => $this->input->post('email'),
            'alamat'        => $this->input->post('alamat'),
            'level'         => $this->input->post('level'),
            // 'password'      => $this->input->post('password'),
            'img_user'      => $this->_uploadImage()
        ];

        $this->db->where('nip', $this->input->post('nip'));
        $this->db->update('tbl_user', $data);
    }

    public function editPassword(){

        $data = [
            'nip' => $this->input->post('nip'),
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT)
        ];

        $this->db->where('nip', $this->input->post('nip'));
        $this->db->update('tbl_user', $data);
    }

    public function deleteUser($kd){
        $this->db->delete('tbl_user', ['nip' => $kd]);
    }

}