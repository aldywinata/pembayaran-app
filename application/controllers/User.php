<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller{

    public function __construct(){
        parent::__construct();

        $this->load->model('Users_model');
    }

    public function index(){

        $data['title'] = "Administrator";
        $data['administrator'] = $this->db->get_where('tbl_user', ['nip' => $this->session->userdata('nip')])->row_array();
        
        $data['users'] = $this->Users_model->getAllUsers();
        $data['j_kel'] = ['LAKI - LAKI', 'PEREMPUAN'];
        $data['lev'] = ['ADMINISTRATOR', 'PIMPINAN', 'PETUGAS']; 


        $this->load->view('templates/header', $data);
        $this->load->view('dashboard/topbar', $data);
        $this->load->view('dashboard/administrator/sidebar', $data);
        $this->load->view('users/index', $data);
        $this->load->view('templates/footer');
    }

    public function profil($kd){

        $data['title'] = "Administrator";
        $data['administrator'] = $this->db->get_where('tbl_user', ['nip' => $this->session->userdata('nip')])->row_array();
        
        $data['users'] = $this->Users_model->getUsersById($kd);
        $data['j_kel'] = ['LAKI - LAKI', 'PEREMPUAN'];
        $data['lev'] = ['ADMINISTRATOR', 'PIMPINAN', 'PETUGAS']; 

        $this->load->view('templates/header', $data);
        $this->load->view('dashboard/topbar', $data);
        $this->load->view('dashboard/administrator/sidebar', $data);
        $this->load->view('users/profil', $data);
        $this->load->view('templates/footer');
    }

    public function tambah(){
        $this->Users_model->addUser();
        redirect('User');
    }

    public function ubahUser(){
        $this->Users_model->editUser();
        redirect('User');
    }

    public function ubahPassword(){
        $this->Users_model->editPassword();
        redirect('User');
    }

    public function hapus($kd){
        $this->Users_model->deleteUser($kd);
        redirect('User');
    }
}