<?php

namespace App\Controllers;
use App\Models\PelangganModel;
use CodeIgniter\RESTful\ResourceController;

use App\Controllers\BaseController;

class Pelanggan extends BaseController
{
    protected $session;
	public function __construct(){

		$this->pelangganModel = new PelangganModel();
        $this->session = \Config\Services::session();
        $this->validation = \Config\Services::validation();
        $this->uri = new \CodeIgniter\HTTP\URI(uri_string());
        
	}
    public function index()
    {   
		$list_pelanggan = $this->pelangganModel->get_all_data();
        $data =[
			'judul_page' => 'Pelanggan',
			'list_pelanggan' => $list_pelanggan,
			'sub_judul_page' => 'Table Data',
			'add' => '/add_pelanggan',
			'update' => '/update_pelanggan',
			'url_delete' => 'hapus_pelanggan',
            'url' =>'pelanggan'
        ];
		return view('admin_pelanggan',$data);
    }
    public function create()
    {       
        $data =[
            'validation' => $this->validation,
			'action' => '/add_action_pelanggan',
			'judul_page' => 'Pelanggan',
			'sub_judul_page' => 'Tambah',
			'back' => '/pelanggan',
			'url_delete' => 'hapus_pelanggan',
            'nama_pelanggan' => old('nama_pelanggan'),
            'alamat_pelanggan' => old('alamat_pelanggan'),
            'hp_pelanggan' =>old('hp_pelanggan'),
			'id' => '',
            'url' =>'pelanggan',
        ];
		return view('admin_pelanggan_form',$data);
    }
    public function create_action()
    {   
        if(!$this->validate($this->rules())) {
            return redirect()->back()->withInput()->with('validation', $this->validation);
        }

        $data =[
            'nama_pelanggan'          => $this->request->getPost('nama_pelanggan'),
            'alamat_pelanggan'        => $this->request->getPost('alamat_pelanggan'),
            'hp_pelanggan'            => $this->request->getPost('hp_pelanggan'),
        ];
        $insert = $this->pelangganModel->add_data($data);
        if($insert){	
            return redirect()->to(base_url().'/pelanggan');
        }
    }
    public function update($id)
    {   
        $row = $this->pelangganModel->get_by_id($id);
        $data =[
            'validation' => $this->validation,
			'action' => '/update_action_pelanggan',
			'judul_page' => 'Pelanggan',
			'sub_judul_page' => 'Update',
			'back' => '/pelanggan',
			'url_delete' => 'hapus_pelanggan',
			'id' => $id,
            'nama_pelanggan' => $row['nama_pelanggan'],
            'alamat_pelanggan' => $row['alamat_pelanggan'],
            'hp_pelanggan' => $row['hp_pelanggan'],
            'url' =>'pelanggan',
        ];
		return view('admin_pelanggan_form',$data);
    }
    public function update_action()
    {           
        $id = $this->request->getPost('id');
        if(!$this->validate($this->rules())) {
            return redirect()->back()->withInput()->with('validation', $this->validation);
        }

       
        $data =[
            'nama_pelanggan'          => $this->request->getPost('nama_pelanggan'),
            'alamat_pelanggan'        => $this->request->getPost('alamat_pelanggan'),
            'hp_pelanggan'            => $this->request->getPost('hp_pelanggan'),
        ];
        
        $update = $this->pelangganModel->ubah_data($data,$id);
       
        if($update){	
            return redirect()->to(base_url().'/pelanggan');
        }
    }
    
	public function delete($id)
	{
		$hapus = $this->pelangganModel->hapus_data($id);
		if($hapus){	
			return redirect()->to(base_url().'/pelanggan');
		}

    }
    public function rules()
    {
        $rules= [
            'nama_pelanggan' => [
               'rules' => 'required',
               'errors' => [
                'required' => 'Nama Pelanggan is reqiured !!',
               ]
            ],
            'alamat_pelanggan' => [
               'rules' => 'required',
               'errors' => [
                'required' => 'Alamat Pelanggan is reqiured !!',
               ]
            ],
            'hp_pelanggan' => [
               'rules' => 'required',
               'errors' => [
                'required' => 'Hp Pelanggan is reqiured !!',
               ]
            ],
        ];
        
        return $rules;
    }
}
