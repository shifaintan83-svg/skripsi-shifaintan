<?php

namespace App\Controllers;
use App\Models\LayananModel;
use CodeIgniter\RESTful\ResourceController;

use App\Controllers\BaseController;

class Layanan extends BaseController
{
    protected $session;
	public function __construct(){

		$this->layananModel = new LayananModel();
        $this->session = \Config\Services::session();
        $this->validation = \Config\Services::validation();
        $this->uri = new \CodeIgniter\HTTP\URI(uri_string());
        
	}
    public function index()
    {   
		$list_layanan = $this->layananModel->get_all_data();
        $data =[
			'judul_page' => 'Layanan',
			'list_layanan' => $list_layanan,
			'sub_judul_page' => 'Table Data',
			'add' => '/add_layanan',
			'update' => '/update_layanan',
			'url_delete' => 'hapus_layanan',
            'url' =>'layanan'
        ];
		return view('admin_layanan',$data);
    }
    public function create()
    {       
        $data =[
            'validation' => $this->validation,
			'action' => '/add_action_layanan',
			'judul_page' => 'Layanan',
			'sub_judul_page' => 'Tambah',
			'back' => '/layanan',
			'url_delete' => 'hapus_layanan',
            'layanan' => old('layanan'),
            'deskripsi' => old('deskripsi'),
            'biaya' => old('biaya'),
			'id' => '',
            'url' =>'layanan',
        ];
		return view('admin_layanan_form',$data);
    }
    public function create_action()
    {   
        $is_uniqe = 'is_unique[layanan.layanan]';
        if(!$this->validate($this->rules($is_uniqe))) {
            return redirect()->back()->withInput()->with('validation', $this->validation);
        }

       
        $data =[
            'layanan'          => $this->request->getPost('layanan'),
            'deskripsi'        => $this->request->getPost('deskripsi'),
            'biaya'            => str_replace(".","",str_replace(",","",$this->request->getPost('biaya'))),
        ];
        $insert = $this->layananModel->add_data($data);
        if($insert){	
            return redirect()->to(base_url().'/layanan');
        }
    }
    public function update($id)
    {   
        $row = $this->layananModel->get_by_id($id);
        $data =[
            'validation' => $this->validation,
			'action' => '/update_action_layanan',
			'judul_page' => 'Layanan',
			'sub_judul_page' => 'Update',
			'back' => '/layanan',
			'url_delete' => 'hapus_layanan',
			'id' => $id,
            'layanan' => $row['layanan'],
            'deskripsi' => $row['deskripsi'],
            'biaya' => $row['biaya'],
            'url' =>'layanan',
        ];
		return view('admin_layanan_form',$data);
    }
    public function update_action()
    {           
        $id = $this->request->getPost('id');
        $row = $this->layananModel->get_by_id($id);
        if($this->request->getPost('layanan') == $row['layanan']){
            $is_uniqe = '';
        }else{
            $validasi = $this->layananModel->validasi($this->request->getPost('layanan'));
            if(!empty($validasi)){
                $is_uniqe = 'is_unique[layanan.layanan]';
            }else{
                $is_uniqe = '';
    
            }

        }
        if(!$this->validate($this->rules($is_uniqe))) {
            return redirect()->back()->withInput()->with('validation', $this->validation);
        }

        $data =[
            'layanan'          => $this->request->getPost('layanan'),
            'deskripsi'        => $this->request->getPost('deskripsi'),
            'biaya'            => str_replace(".","",str_replace(",","",$this->request->getPost('biaya'))),
        ];
        
        $update = $this->layananModel->ubah_data($data,$id);
       
        if($update){	
            return redirect()->to(base_url().'/layanan');
        }
    }
    
	public function delete($id)
	{
		$hapus = $this->layananModel->hapus_data($id);
		if($hapus){	
			return redirect()->to(base_url().'/layanan');
		}

    }
    public function rules($is_uniqe)
    {
        $rules= [
            'layanan' => [
               'rules' => 'required|'.$is_uniqe,
               'errors' => [
                'required' => 'Nama Layanan is reqiured !!',
                'is_unique' => 'Nama Layanan sudah terdaftar !!',
               ]
            ]
        ];
        
        return $rules;
    }
}
