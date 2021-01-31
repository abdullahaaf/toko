<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rak extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Rak_model');
    }

    function index()
    {
        $data['rak'] = $this->Rak_model->tampil_rak();
        $this->load->view('rak/index', $data);
    }

    function new()
    {
        $this->load->view('rak/new');
    }

    function create()
    {
        $rak_nama=$this->input->post('rak_nama');
        $this->Rak_model->simpan_rak($rak_nama);
        redirect('Rak');
    }

    function edit($id)
    {
        $data['rak'] = $this->Rak_model->tampil_rak_by_id($id);
        $this->load->view('rak/edit', $data);
    }

    function update()
    {
        $rak_id = $this->input->post('rak_id');
        $rak_nama = $this->input->post('rak_nama');
        $this->Rak_model->update_rak($rak_id,$rak_nama);
        redirect('Rak');
    }

    function delete($id)
    {
        $this->Rak_model->hapus_rak($id);
        redirect('Rak');
    }
}

?>