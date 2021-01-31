<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rak_model extends CI_Model
{
    function hapus_rak($kode){
		$hsl=$this->db->query("DELETE FROM tbl_rak where rak_id='$kode'");
		return $hsl;
	}

	function update_rak($kode,$rak){
		$hsl=$this->db->query("UPDATE tbl_rak set rak_nama='$rak' where rak_id='$kode'");
		return $hsl;
	}

	function tampil_rak(){
		$hsl=$this->db->query("select * from tbl_rak order by rak_nama asc");
		return $hsl;
	}

	function simpan_rak($rak){
		$hsl=$this->db->query("INSERT INTO tbl_rak(rak_nama) VALUES ('$rak')");
		return $hsl;
    }
}

?>