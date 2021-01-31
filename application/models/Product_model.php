<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model extends CI_Model
{
	/**
	 * auto-generate barcode barang jika barang
	 * tidak mempunyai barcode
	 */
	function get_kobar(){
		$q = $this->db->query("SELECT MAX(RIGHT(barang_barcode,6)) AS kd_max FROM tbl_barang");
        $kd = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%06s", $tmp);
            }
        }else{
            $kd = "000001";
        }
        return "BR".$kd;
	}

    function tampil_barang()
    {
		  $hsl=$this->db->query("SELECT barang_id,barang_nama,barang_barcode,barang_satuan,barang_harpok,barang_harjul,barang_harjul_grosir,barang_tipe_barang,barang_stok,barang_min_stok,barang_tgl_kedaluarsa,barang_kategori_id,kategori_nama, barang_rak_id, rak_nama, barang_status FROM tbl_barang JOIN tbl_kategori ON barang_kategori_id=kategori_id JOIN tbl_rak ON barang_rak_id=rak_id ORDER BY barang_nama ASC");
		  return $hsl;
    }
    
    function tampil_barang_by_id($id)
    {
	  	$hsl=$this->db->query("SELECT barang_id,barang_nama,barang_barcode,barang_satuan,barang_harpok,barang_harjul,barang_harjul_grosir,barang_tipe_barang,barang_stok,barang_min_stok,barang_tgl_kedaluarsa,barang_kategori_id,kategori_nama, barang_rak_id,barang_status, rak_nama FROM tbl_barang JOIN tbl_kategori ON barang_kategori_id=kategori_id JOIN tbl_rak ON barang_rak_id=rak_id WHERE barang_id='$id'");
		  return $hsl;
	}
	
	function simpan_barang($kobar,$nabar,$tipe_barang,$kat,$satuan,$harpok,$harjul,$harjul_grosir,$stok,$min_stok,$tgl_kedaluarsa,$rak,$status){
		$hsl=$this->db->query("INSERT INTO tbl_barang (barang_barcode,barang_nama,barang_tipe_barang,barang_satuan,barang_harpok,barang_harjul,barang_harjul_grosir,barang_stok,barang_min_stok,barang_tgl_kedaluarsa,barang_rak_id,barang_kategori_id,barang_status) VALUES ('$kobar','$nabar','$tipe_barang','$satuan','$harpok','$harjul','$harjul_grosir','$stok','$min_stok','$tgl_kedaluarsa','$rak','$kat','$status')");
		return $hsl;
	}
    
    function update_barang($kobar,$barcode,$nabar,$tipe,$kat,$satuan,$harpok,$harjul,$harjul_grosir,$stok,$min_stok,$rak,$tgl_kedaluarsa,$status){
		$user_id=$this->session->userdata('idadmin');
		$hsl=$this->db->query("UPDATE tbl_barang SET barang_nama='$nabar',barang_tipe_barang='$tipe',barang_barcode='$barcode',barang_satuan='$satuan',barang_harpok='$harpok',barang_harjul='$harjul',barang_harjul_grosir='$harjul_grosir',barang_stok='$stok',barang_min_stok='$min_stok',barang_tgl_kedaluarsa='$tgl_kedaluarsa',barang_status='$status',barang_rak_id='$rak',barang_tgl_last_update=NOW(),barang_kategori_id='$kat' WHERE barang_id='$kobar'");
		return $hsl;
	}

	function hapus_barang($kode){
		$hsl=$this->db->query("DELETE FROM tbl_barang where barang_id='$kode'");
		return $hsl;
	}
}

?>