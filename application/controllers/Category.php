<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller
{
    function __construct()
	{
		parent::__construct();
		$this->load->model('Category_model');
    }
    
    function index()
    {
        $data['category'] = $this->Category_model->tampil_kategori();
        $this->load->view('category/index', $data);
    }

    function new()
    {
        $this->load->view('category/new');
    }

    function create()
    {
        $kategori_nama=$this->input->post('kategori_nama');
        $this->Category_model->simpan_kategori($kategori_nama);
        redirect('Category');
    }

    function edit($id)
    {
        $data['category'] = $this->Category_model->tampil_kategori_by_id($id);
        $this->load->view('category/edit', $data);
    }

    function update()
    {
        $kategori_id = $this->input->post('kategori_id');
        $kategori_nama = $this->input->post('kategori_nama');
        $this->Category_model->update_kategori($kategori_id, $kategori_nama);
        return redirect('Category');
    }

    function delete($id)
    {
        $this->Category_model->hapus_kategori($id);
        return redirect('Category');
    }
}

?>