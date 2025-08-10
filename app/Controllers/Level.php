<?php

namespace App\Controllers;
use App\Models\LevelModel;
use CodeIgniter\RESTful\ResourceController;

use App\Controllers\BaseController;

class Level extends BaseController
{
    protected $session;
	public function __construct(){

		$this->levelModel = new LevelModel();
        $this->session = \Config\Services::session();
        $this->validation = \Config\Services::validation();
        $this->uri = new \CodeIgniter\HTTP\URI(uri_string());
        
	}
    public function index()
    {   
		$list_level = $this->levelModel->get_all_data();
        $data =[
			'judul_page' => 'Level Pengguna',
			'list_level' => $list_level,
			'sub_judul_page' => 'Table Data',
			'add' => '/add_level',
			'update' => '/update_level',
			'url_delete' => 'hapus_level',
            'url' =>'level'
        ];
		return view('admin_level',$data);
    }
    public function create()
    {       
        $data =[
            'validation' => $this->validation,
			'action' => '/add_action_level',
			'judul_page' => 'Level Pengguna',
			'sub_judul_page' => 'Tambah',
			'back' => '/level',
			'url_delete' => 'hapus_level',
            'level_pengguna' => old('level_pengguna'),
			'id' => '',
            'url' =>'level',
        ];
		return view('admin_level_form',$data);
    }
    public function create_action()
    {   
        $is_uniqe = 'is_unique[level_pengguna.level_pengguna]';
        if(!$this->validate($this->rules($is_uniqe))) {
            return redirect()->back()->withInput()->with('validation', $this->validation);
        }

        $data =[
            'level_pengguna'          => $this->request->getPost('level_pengguna'),
        ];
        $insert = $this->levelModel->add_data($data);
        if($insert){	
            return redirect()->to(base_url().'/level');
        }
    }
    public function update($id)
    {   
        $row = $this->levelModel->get_by_id($id);
        $data =[
            'validation' => $this->validation,
			'action' => '/update_action_level',
			'judul_page' => 'Level Pengguna',
			'sub_judul_page' => 'Update',
			'back' => '/level',
			'url_delete' => 'hapus_level',
			'id' => $id,
            'level_pengguna' => $row['level_pengguna'],
            'url' =>'level',
        ];
		return view('admin_level_form',$data);
    }
    public function update_action()
    {           
        $id = $this->request->getPost('id');
        $row = $this->levelModel->get_by_id($id);
        if($this->request->getPost('level_pengguna') == $row['level_name']){
            $is_uniqe = '';
        }else{
            $validasi = $this->levelModel->validasi($this->request->getPost('level_pengguna'));
            if(!empty($validasi)){
                $is_uniqe = 'is_unique[level_pengguna.level_pengguna]';
            }else{
                $is_uniqe = '';
    
            }

        }
        if(!$this->validate($this->rules($is_uniqe))) {
            return redirect()->back()->withInput()->with('validation', $this->validation);
        }

       
        $data =[
            'level_pengguna'          => $this->request->getPost('level_pengguna'),
        ];
        
        $update = $this->levelModel->ubah_data($data,$id);
       
        if($update){	
            return redirect()->to(base_url().'/level');
        }
    }
    
	public function delete($id)
	{
		$hapus = $this->levelModel->hapus_data($id);
		if($hapus){	
			return redirect()->to(base_url().'/level');
		}

    }
    public function rules($is_uniqe)
    {
        $rules= [
            'level_pengguna' => [
               'rules' => 'required|'.$is_uniqe,
               'errors' => [
                'required' => 'Level Pengguna is reqiured !!',
                'is_unique' => 'Level Pengguna sudah terdaftar !!',
               ]
            ],
        ];
        
        return $rules;
    }
}
