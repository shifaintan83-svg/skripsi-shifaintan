<?php

namespace App\Models;

use CodeIgniter\Model;

class ProfileModel extends Model
{
    protected $table            = 'tblprofile';
    protected $primaryKey       = 'id';

    protected $allowedFields = [
        'CompanyName', 'CompanyLogo', 'CompanyMail','CompanyPhone','CompanyAddress','CompanyLatLng'
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
    public function ubah_data($data,$id)
    {
      return $this->update(['id' => $id],$data);
    
    } 
}
