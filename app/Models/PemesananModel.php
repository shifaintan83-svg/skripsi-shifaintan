<?php

namespace App\Models;

use CodeIgniter\Model;

class PemesananModel extends Model
{
    protected $table            = 'pemesanan';
    protected $primaryKey       = 'id';
    
    protected $useSoftDeletes = true;
    protected $useTimestamps = true;
    
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $allowedFields = [
        'kode_pemesanan','id_pelanggan','jadwal_pemesanan',
        'id_layanan','biaya','status_pembayaran','status_order',
        'id_tenaga_kerja','deskripsi_pemesanan'
    ];
    
    public function myorder($var1)
    {
      $this->select('pemesanan.*,pelanggan.nama_pelanggan,tenaga_kerja.nama as nama_tenaga_kerja,layanan.layanan');
      $this->join('pelanggan', 'pelanggan.id = pemesanan.id_pelanggan','LEFT');
      $this->join('tenaga_kerja', 'tenaga_kerja.id = pemesanan.id_tenaga_kerja','LEFT');
      $this->join('layanan', 'layanan.id = pemesanan.id_layanan','LEFT');
      $array = array('id_pelanggan' => $var1);
		  $data = $this->where($array)->findAll();
		  return $data;
    }
    public function order($var1)
    {
      $this->select('pemesanan.*,pelanggan.nama_pelanggan,tenaga_kerja.nama as nama_tenaga_kerja,layanan.layanan');
      $this->join('pelanggan', 'pelanggan.id = pemesanan.id_pelanggan','LEFT');
      $this->join('tenaga_kerja', 'tenaga_kerja.id = pemesanan.id_tenaga_kerja','LEFT');
      $this->join('layanan', 'layanan.id = pemesanan.id_layanan','LEFT');
      $array = array('id_tenaga_kerja' => $var1,'status_order' => 'SCHEDULED');
		  $data = $this->where($array)->findAll();
		  return $data;
    }
    
    public function pembayaran()
    {
      $this->select('pemesanan.*,pelanggan.nama_pelanggan,tenaga_kerja.nama as nama_tenaga_kerja,layanan.layanan');
      $this->join('pelanggan', 'pelanggan.id = pemesanan.id_pelanggan','LEFT');
      $this->join('tenaga_kerja', 'tenaga_kerja.id = pemesanan.id_tenaga_kerja','LEFT');
      $this->join('layanan', 'layanan.id = pemesanan.id_layanan','LEFT');
      $array = array('status_order !=' => 'DRAFT');
		  $data = $this->where($array)->findAll();
		  return $data;
    }
    public function done()
    {
      $this->select('pemesanan.*,pelanggan.nama_pelanggan,tenaga_kerja.nama as nama_tenaga_kerja,layanan.layanan');
      $this->join('pelanggan', 'pelanggan.id = pemesanan.id_pelanggan','LEFT');
      $this->join('tenaga_kerja', 'tenaga_kerja.id = pemesanan.id_tenaga_kerja','LEFT');
      $this->join('layanan', 'layanan.id = pemesanan.id_layanan','LEFT');
      $array = array('status_order ' => 'DONE');
		  $data = $this->where($array)->findAll();
		  return $data;
    }
    public function get_all_data()
    {  		  
      $this->select('pemesanan.*,pelanggan.nama_pelanggan,tenaga_kerja.nama as nama_tenaga_kerja,layanan.layanan');
      $this->join('pelanggan', 'pelanggan.id = pemesanan.id_pelanggan','LEFT');
      $this->join('tenaga_kerja', 'tenaga_kerja.id = pemesanan.id_tenaga_kerja','LEFT');
      $this->join('layanan', 'layanan.id = pemesanan.id_layanan','LEFT');
      $data = $this->findAll();
		  return $data;
    }
    
    public function get_by_id($id)
    {
      $this->select('pemesanan.*,pelanggan.nama_pelanggan,tenaga_kerja.nama as nama_tenaga_kerja,layanan.layanan');
      $this->join('pelanggan', 'pelanggan.id = pemesanan.id_pelanggan','LEFT');
      $this->join('tenaga_kerja', 'tenaga_kerja.id = pemesanan.id_tenaga_kerja','LEFT');
      $this->join('layanan', 'layanan.id = pemesanan.id_layanan','LEFT');
		  $data = $this->find($id);
		  return $data;
    }
    public function add_data($data)
    {
      return $this->insert($data);
    } 
    public function ubah_data($data,$id)
    {
      return $this->update(['id' => $id],$data);
    
    } 
    public function hapus_data($id)
    {
      return $this->delete(['id' => $id]);
    } 
}
