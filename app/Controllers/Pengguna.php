<?php

namespace App\Controllers;
use App\Models\PenggunaModel;
use App\Models\LevelModel;
use App\Models\TenagaModel;
use CodeIgniter\RESTful\ResourceController;

use App\Controllers\BaseController;

class Pengguna extends BaseController
{
    protected $session;
	public function __construct(){

		$this->penggunaModel = new PenggunaModel();
		$this->levelModel = new LevelModel();
		$this->tenagaModel = new TenagaModel();
        $this->session = \Config\Services::session();
        $this->validation = \Config\Services::validation();
        $this->uri = new \CodeIgniter\HTTP\URI(uri_string());
        $this->session->start();
        
	}
    public function index()
    {   
		$list_pengguna = $this->penggunaModel->get_all_data();
        $data =[
			'judul_page' => 'Pengguna',
			'list_pengguna' => $list_pengguna,
			'sub_judul_page' => 'Table Data',
			'add' => '/add_pengguna',
			'update' => '/update_pengguna',
			'url_delete' => 'hapus_pengguna',
            'url' =>'pengguna'
        ];
		return view('admin_pengguna',$data);
    }
    public function create()
    {   
        $list_level = $this->levelModel->get_all_data();
		$list_tenaga = $this->tenagaModel->get_all_data();  
        $data =[
            'validation' => $this->validation,
            'list_level' => $list_level,
            'list_tenaga' => $list_tenaga,
			'action' => '/add_action_pengguna',
			'judul_page' => 'Pengguna',
			'sub_judul_page' => 'Add',
			'back' => '/pengguna',
			'url_delete' => 'hapus_pengguna',
            'nama_pengguna' => old('nama_pengguna'),
            'user_name' => old('user_name'),
            'password' => old('password'),
            'id_level_pengguna' => old('id_level_pengguna'),
            'id_tenaga_kerja' => old('id_tenaga_kerja'),
			'id' => '',
            'url' =>'pengguna',
        ];
		return view('admin_pengguna_form',$data);
    }
    public function create_action()
    {   
        $is_uniqe = 'is_unique[pengguna.nama_pengguna]';
        if(!$this->validate($this->rules($is_uniqe))) {
            return redirect()->back()->withInput()->with('validation', $this->validation);
        }

        $data =[
            'id_level_pengguna' => $this->request->getPost('id_level_pengguna'),
            'user_name'         => $this->request->getPost('user_name'),
            'is_tenaga'         => ($this->request->getPost('id_tenaga_kerja') ==0 ?NULL:$this->request->getPost('id_tenaga_kerja')),
            'password' 		    => hash('sha512', $this->request->getPost('password')),
            'nama_pengguna'     => strtoupper($this->request->getPost('nama_pengguna'))
        ];
        $insert = $this->penggunaModel->add_data($data);
        if($insert){	
            return redirect()->to(base_url().'/pengguna');
        }
    }
    public function update($id)
    {   
        $row = $this->penggunaModel->get_by_id($id);
        $list_level = $this->levelModel->get_all_data();
		$list_tenaga = $this->tenagaModel->get_all_data();  
        $data =[
            'validation' => $this->validation,
            'list_level' => $list_level,
            'list_tenaga' => $list_tenaga,
			'action' => '/update_action_pengguna',
			'judul_page' => 'Pengguna',
			'sub_judul_page' => 'Update',
			'back' => '/pengguna',
			'url_delete' => 'hapus_pengguna',
			'id' => $id,
            'nama_pengguna' => $row['nama_pengguna'],
            'user_name' => $row['user_name'],
            'password' => $row['password'],
            'id_level_pengguna' => $row['id_level_pengguna'],
            'id_tenaga_kerja' => $row['is_tenaga'],
            'url' =>'pengguna',
        ];
		return view('admin_pengguna_form',$data);
    }
    public function update_action()
    {           
        $id = $this->request->getPost('id');
        $row = $this->penggunaModel->get_by_id($id);
        if($this->request->getPost('nama_pengguna') == $row['nama_pengguna']){
            $is_uniqe = '';
        }else{
            $validasi = $this->penggunaModel->validasi($this->request->getPost('nama_pengguna'));
            if(!empty($validasi)){
                $is_uniqe = 'is_unique[pengguna.nama_pengguna]';
            }else{
                $is_uniqe = '';
            }
        }
        if(!$this->validate($this->rules($is_uniqe))) {
            return redirect()->back()->withInput()->with('validation', $this->validation);
        }

        if($row['password'] == $this->request->getPost('password')){
           
            $data =[
                'id_level_pengguna' => $this->request->getPost('id_level_pengguna'),
                'user_name'         => $this->request->getPost('user_name'),
                'is_tenaga'         => ($this->request->getPost('id_tenaga_kerja') ==0 ?NULL:$this->request->getPost('id_tenaga_kerja')),
                'nama_pengguna'     => strtoupper($this->request->getPost('nama_pengguna'))
            ];
        }else{
            $data =[
                'id_level_pengguna' => $this->request->getPost('id_level_pengguna'),
                'user_name'         => $this->request->getPost('user_name'),
                'is_tenaga'         => ($this->request->getPost('id_tenaga_kerja') ==0 ?NULL:$this->request->getPost('id_tenaga_kerja')),
                'password' 		    => hash('sha512', $this->request->getPost('password')),
                'nama_pengguna'     => strtoupper($this->request->getPost('nama_pengguna'))
            ];
        }
        
        $update = $this->penggunaModel->ubah_data($data,$id);
        if($update){	
            return redirect()->to(base_url().'/pengguna');
        }
    }
    
	public function delete($id)
	{
		$hapus = $this->penggunaModel->hapus_data($id);
		if($hapus){	
			return redirect()->to(base_url().'/pengguna');
		}

    }
    public function profile()
    {   
        $id= $this->session->get("id_pengguna");
        $row = $this->penggunaModel->get_by_id($id);
        $data =[
            'validation' => $this->validation,
			'action' => '/change_profile',
			'action2' => '/change_password',
			'judul_page' => 'Pengguna',
			'sub_judul_page' => 'Update',
			'back' => '/profilepengguna',
			'url_delete' => 'hapus_pengguna',
			'id' => $id,
            'foto_profil' =>$row['foto_profil'],
            'nama_pengguna' => $row['nama_pengguna'],
            'user_name' => $row['user_name'],
            'password' => $row['password'],
            'id_level_pengguna' => $row['id_level_pengguna'],
            'url' =>'profilepengguna',
        ];
		return view('admin_profil_pengguna',$data);
    }
    public function change_profile()
    {           
        $id= $this->session->get("id_pengguna");
        
        // $validation = $this->validate([
		// 	'file_upload' => 'uploaded[file_upload]|mime_in[file_upload,image/jpg,image/jpeg,image/gif,image/png]|max_size[file_upload,4096]'
		// ]);
        
        
        $data =[
            'user_name'             => $this->request->getPost('user_name'),
            'nama_pengguna' 		=> strtoupper($this->request->getPost('nama_pengguna'))
        ];
		if ($this->request->getFile('file_upload')->getSize() >0) {
            // if ($validation) {
                $upload = $this->request->getFile('file_upload');
                $photoProfile = "profile".str_replace(" ","",$this->request->getPost('nama_pengguna'));
                $file_delete =  WRITEPATH. '../public/assets/img/profile/'. $photoProfile;
                if (file_exists($file_delete)) {unlink($file_delete);} 
                $upload->move(WRITEPATH .'../public/assets/img/profile/',$photoProfile );
                
                $photoProfileArray =[
                    'foto_profil'       => $photoProfile
                ];
                $data = array_merge($data, $photoProfileArray);
                $this->session->set('foto_profil', $photoProfile);
            // }
        }
        
        $update = $this->penggunaModel->ubah_data($data,$id);
        $this->session->set('nama_pengguna', strtoupper($this->request->getPost('nama_pengguna')));
        if($update){	
            return redirect()->to(base_url().'/profilepengguna');
        }
		
    }
    public function change_password()
    {           
        $id= $this->session->get("id_pengguna");
        $row = $this->penggunaModel->get_by_id($id);
        if($row['password'] == hash('sha512', $this->request->getPost('currentPassword'))){
            
            $data =[
                'password' 		    => hash('sha512', $this->request->getPost('newPassword')),
            ];
            $update = $this->penggunaModel->ubah_data($data,$id);
            
            header('Content-Type: application/json');
            echo json_encode( 1 );
        }else{

            header('Content-Type: application/json');
            echo json_encode('failed' );
        }
    }
    public function rules($is_uniqe)
    {
        $rules= [
            'user_name' => [
               'rules' => 'required|'.$is_uniqe,
               'errors' => [
                'required' => 'User Name is reqiured !!',
                'is_unique' => 'User Name sudah terdaftar !!',
               ]
            ],
            'nama_pengguna' => [
               'rules' => 'required',
               'errors' => [
                'required' => 'Nama Pengguna is reqiured !!',
               ]
            ],
            'password' => [
               'rules' => 'required',
               'errors' => [
                'required' => 'Password is reqiured !!',
               ]
            ],
            'repassword' => [
               'rules' => 'required|matches[password]',
               'errors' => [
                'required' => 'Input ulang Password is reqiured !!',
                'matches' => 'Pasword tidak sama !!',
               ]
            ]
        ];
        
        return $rules;
    }
}
