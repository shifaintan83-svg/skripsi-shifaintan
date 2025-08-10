<?php

namespace App\Models;

use CodeIgniter\Model;

class PenggunaModel extends Model
{
    protected $table            = 'pengguna';
    protected $primaryKey       = 'id';
    
    protected $useSoftDeletes = true;
    protected $useTimestamps = true;
    
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $allowedFields = [
        'nama_pengguna', 'user_name', 'password','id_level_pengguna','foto_profil','status_login','is_pelanggan','is_tenaga'
    ];
    
    public function check_login($var1,$var2)
    {
      $this->select('pengguna.*, level_pengguna.level_pengguna');
      $this->join('level_pengguna', 'level_pengguna.id = pengguna.id_level_pengguna','LEFT');
      $array = array('pengguna.user_name' => $var1,'pengguna.password' => $var2);
		  $data = $this->where($array)->find();
		  return $data;
    }
    public function get_all_data()
    {  
      $this->select('pengguna.*,level_pengguna.level_pengguna');
      $this->join('level_pengguna', 'pengguna.id_level_pengguna = level_pengguna.id','LEFT');
		  $data = $this->findAll();
		  return $data;
    }
    
    public function validasi($var1)
    {
      $array = array('user_name' => $var1);
		  $data = $this->where($array)->findAll();
		  return $data;
    }
    public function get_by_id($id)
    {
		  $data = $this->find($id);
		  return $data;
    }
    public function user_by_level($var1)
    {
      $array = array('id_level' => $var1);
      $data = $this->where($array)->find();
		  return $data;
    }
    public function add_data($data)
    {
      return $this->insert($data);
    } 
    
    public function add_data2($data)
    {
       $this->insert($data);
       return $this->insertID();
    } 
    public function ubah_data($data,$id)
    {
      return $this->update(['id' => $id],$data);
    
    } 
    public function hapus_data($id)
    {
      return $this->delete(['id' => $id]);
    } 
    
    public function hapus_data_by_username($username)
    {
      return $this->delete(['username' => $username]);
    } 
}
