<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('Product_model');
		$this->load->model('Category_model');
		$this->load->model('Rak_model');
		/*
		

		
		*/
	}

	public function index()
	{
		$data['data_barang'] = $this->Product_model->tampil_barang();
		$this->load->view('product/index', $data);
	}

	public function new()
	{
		/**
		 * get data kategori
		 */
		$kategori	= $this->Category_model->tampil_kategori();
		foreach ($kategori->result_array() as $value_kategori) {
			$data['kategori'][$value_kategori['kategori_id']] = $value_kategori['kategori_nama'];
		}

		/**
		 * get data rak
		 */
		$rak = $this->Rak_model->tampil_rak();
		foreach ($rak->result_array() as $value_rak) {
			$data['rak'][$value_rak['rak_id']] = $value_rak['rak_nama'];
		}
		$this->load->view('product/new', $data);
	}

	public function create()
	{

		$rules = array(
			array(
				'field' => 'barang_nama',
				'rules'	=> 'required',
				'errors'	=> array(
					'required'	=> 'Nama Produk wajib diisi!'
				)
			),
			array(
				'field'	=> 'barang_tipe_barang',
				'rules'	=> 'required',
				'erros'	=> array(
					'required'	=> 'Tipe Produk wajib diisi!'
				)
			),
			array(
				'field'	=> 'barang_harjul',
				'rules'	=> 'required',
				'errors'	=> array(
					'required'	=> 'Harga Jual produk wajib diisi!'
				)
			),
			array(
				'field'	=> 'barang_status',
				'rules'	=> 'required',
				'errors'	=> array(
					'required'	=> 'Status Produk wajib diisi!'
				)
			),
		);
		$this->form_validation->set_rules($rules);

		$barcode=$this->input->post('barang_barcode');

		if ($barcode == "") {
			$barcode = $this->Product_model->get_kobar();
		}

		$nabar=$this->input->post('barang_nama');
		$tipe=$this->input->post('barang_tipe_barang');
		$kat=$this->input->post('barang_kategori_id');
		$satuan=$this->input->post('barang_satuan');
		$harpok=str_replace(',', '', $this->input->post('barang_harpok'));
		$harjul=str_replace(',', '', $this->input->post('barang_harjul'));
		$harjul_grosir=str_replace(',', '', $this->input->post('barang_harjul_grosir'));
		$stok=$this->input->post('barang_stok');
		$min_stok=$this->input->post('barang_min_stok');
		$tanggal_kedaluarsa = $this->input->post('barang_tgl_kedaluarsa');
		$rak = $this->input->post('barang_rak_id');
		$status = $this->input->post('barang_status');

		if ($this->form_validation->run() != false) {
			$this->Product_model->simpan_barang($barcode,$nabar,$tipe,$kat,$satuan,$harpok,$harjul,$harjul_grosir,$stok,$min_stok,$tanggal_kedaluarsa,$rak,$status);
			echo "Penyimpanan berhasil";
		}else {
			redirect(base_url('Product/new'));
		}
	}

	public function show($id)
	{
		$data['barang'] = $this->Product_model->tampil_barang_by_id($id);
		$this->load->view('product/show',$data);
	}

	public function edit($id)
	{
		/**
		 * get data kategori
		 */
		$kategori	= $this->Category_model->tampil_kategori();
		foreach ($kategori->result_array() as $value_kategori) {
			$data['kategori'][$value_kategori['kategori_id']] = $value_kategori['kategori_nama'];
		}

		/**
		 * get data rak
		 */
		$rak = $this->Rak_model->tampil_rak();
		foreach ($rak->result_array() as $value_rak) {
			$data['rak'][$value_rak['rak_id']] = $value_rak['rak_nama'];
		}
		$data['barang'] = $this->Product_model->tampil_barang_by_id($id);
		$this->load->view('product/edit',$data);
	}

	public function update()
	{
		$kobar=$this->input->post('barang_id');
		$barcode=$this->input->post('barang_barcode');
		$nabar=$this->input->post('barang_nama');
		$tipe=$this->input->post('barang_tipe_barang');
		$kat=$this->input->post('barang_kategori_id');
		$satuan=$this->input->post('barang_satuan');
		$harpok=str_replace(',', '', $this->input->post('barang_harpok'));
		$harjul=str_replace(',', '', $this->input->post('barang_harjul'));
		$harjul_grosir=str_replace(',', '', $this->input->post('barang_harjul_grosir'));
		$stok=$this->input->post('barang_stok');
		$min_stok=$this->input->post('barang_min_stok');
		$tanggal_kedaluarsa = $this->input->post('barang_tgl_kedaluarsa');
		$rak = $this->input->post('barang_rak_id');
		$status = $this->input->post('barang_status');


		$this->Product_model->update_barang($kobar,$barcode,$nabar,$tipe,$kat,$satuan,$harpok,$harjul,$harjul_grosir,$stok,$min_stok,$rak,$tanggal_kedaluarsa, $status);
		redirect('Product');
	}

	public function delete($id)
	{
		$this->Product_model->hapus_barang($id);
		redirect('Product');
	}
}