<?php

namespace App\Models;

use CodeIgniter\Model;

class LevelModel extends Model
{
    protected $table            = 'level_pengguna';
    protected $primaryKey       = 'id';
    
    protected $useSoftDeletes = true;
    protected $useTimestamps = true;
    
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $allowedFields = [
        'level_pengguna'
    ];
    
    public function get_all_data()
    {  		  
      $data = $this->findAll();
		  return $data;
    }
    
    public function get_by_id($id)
    {
		  $data = $this->find($id);
		  return $data;
    }
    
    public function validasi($var1)
    {
      $array = array('level_pengguna' => $var1);
		  $data = $this->where($array)->findAll();
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
