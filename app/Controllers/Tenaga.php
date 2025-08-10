<?php

namespace App\Controllers;
use App\Models\TenagaModel;
use CodeIgniter\RESTful\ResourceController;

use App\Controllers\BaseController;

class Tenaga extends BaseController
{
    protected $session;
	public function __construct(){

		$this->tenagaModel = new TenagaModel();
        $this->session = \Config\Services::session();
        $this->validation = \Config\Services::validation();
        $this->uri = new \CodeIgniter\HTTP\URI(uri_string());
        
	}
    public function index()
    {   
		$list_tenaga = $this->tenagaModel->get_all_data();
        $data =[
			'judul_page' => 'Tenaga Kerja',
			'list_tenaga' => $list_tenaga,
			'sub_judul_page' => 'Table Data',
			'add' => '/add_tenaga',
			'update' => '/update_tenaga',
			'url_delete' => 'hapus_tenaga',
            'url' =>'tenaga'
        ];
		return view('admin_tenaga',$data);
    }
    public function create()
    {       
        $data =[
            'validation' => $this->validation,
			'action' => '/add_action_tenaga',
			'judul_page' => 'Tenaga Kerja',
			'sub_judul_page' => 'Tambah',
			'back' => '/tenaga',
			'url_delete' => 'hapus_tenaga',
            'nama' => old('nama'),
            'hp' => old('hp'),
			'id' => '',
            'url' =>'tenaga',
        ];
		return view('admin_tenaga_form',$data);
    }
    public function create_action()
    {   
        $is_uniqe = 'is_unique[tenaga_kerja.nama]';
        if(!$this->validate($this->rules($is_uniqe))) {
            return redirect()->back()->withInput()->with('validation', $this->validation);
        }

       
        $data =[
            'nama'          => $this->request->getPost('nama'),
            'hp'            => $this->request->getPost('hp'),
        ];
        $insert = $this->tenagaModel->add_data($data);
        if($insert){	
            return redirect()->to(base_url().'/tenaga');
        }
    }
    public function update($id)
    {   
        $row = $this->tenagaModel->get_by_id($id);
        $data =[
            'validation' => $this->validation,
			'action' => '/update_action_tenaga',
			'judul_page' => 'Tenaga Kerja',
			'sub_judul_page' => 'Update',
			'back' => '/tenaga',
			'url_delete' => 'hapus_tenaga',
			'id' => $id,
            'nama' => $row['nama'],
            'hp' => $row['hp'],
            'url' =>'tenaga',
        ];
		return view('admin_tenaga_form',$data);
    }
    public function update_action()
    {           
        $id = $this->request->getPost('id');
        $row = $this->tenagaModel->get_by_id($id);
        if($this->request->getPost('nama') == $row['nama']){
            $is_uniqe = '';
        }else{
            $validasi = $this->tenagaModel->validasi($this->request->getPost('nama'));
            if(!empty($validasi)){
                $is_uniqe = 'is_unique[tenaga_kerja.nama]';
            }else{
                $is_uniqe = '';
    
            }

        }
        if(!$this->validate($this->rules($is_uniqe))) {
            return redirect()->back()->withInput()->with('validation', $this->validation);
        }

       
        $data =[
            'nama'          => $this->request->getPost('nama'),
            'hp'            => $this->request->getPost('hp'),
        ];
        
        $update = $this->tenagaModel->ubah_data($data,$id);
       
        if($update){	
            return redirect()->to(base_url().'/tenaga');
        }
    }
    
	public function delete($id)
	{
		$hapus = $this->tenagaModel->hapus_data($id);
		if($hapus){	
			return redirect()->to(base_url().'/tenaga');
		}

    }
    public function rules($is_uniqe)
    {
        $rules= [
            'nama' => [
               'rules' => 'required|'.$is_uniqe,
               'errors' => [
                'required' => 'Nama Tenaga Kerja is reqiured !!',
                'is_unique' => 'Nama Tenaga Kerja sudah terdaftar !!',
               ]
            ],
            'hp' => [
               'rules' => 'required',
               'errors' => [
                'required' => 'Hp Tenaga Kerja is reqiured !!',
               ]
            ],
        ];
        
        return $rules;
    }
}
