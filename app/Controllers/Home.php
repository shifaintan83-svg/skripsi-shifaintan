<?php

namespace App\Controllers;
use App\Models\PenggunaModel;
use App\Models\PelangganModel;
use CodeIgniter\RESTful\ResourceController;
use App\Controllers\BaseController;

class Home extends BaseController
{
    
    protected $session;
	public function __construct(){

		$this->penggunaModel = new PenggunaModel();
		$this->pelangganModel = new PelangganModel();
        $this->session = \Config\Services::session();
        $this->validation = \Config\Services::validation();
        $this->session->start();
        
	}

    public function index()
    {
        
        $data =[
            'validation' => $this->validation,
			'action_login' => '/login_action',
        ];
		return view('admin_login',$data);
    }
    
    public function login()
    {   
        if(!$this->validate($this->rules_login())) {
            return redirect()->back()->withInput()->with('validation', $this->validation);
        }
        $cek_login = $this->penggunaModel->check_login($this->request->getPost('user_name'),hash('sha512', $this->request->getPost('password')));

        if(!empty($cek_login)){ 
            
            $data =[
				'status_login' 		=> 1,
			];
            $update = $this->penggunaModel->ubah_data($data,$cek_login[0]['id']);
			if($update){	
                $cek_login = $this->penggunaModel->check_login($this->request->getPost('user_name'),hash('sha512', $this->request->getPost('password')));
                $data =  [
                    'nama_pengguna' => $cek_login[0]['nama_pengguna'],
                    'user_name' => $cek_login[0]['user_name'],
                    'status_login' => $cek_login[0]['status_login'],
                    'level_pengguna' => $cek_login[0]['level_pengguna'],
                    'id_level_pengguna' => $cek_login[0]['id_level_pengguna'],
                    'id_pengguna' => $cek_login[0]['id'],
                    'foto_profil' => $cek_login[0]['foto_profil'],

                ];
                $this->session->set($data);
                if($cek_login[0]['id_level_pengguna'] == 2){
                    return redirect()->to(base_url().'/');
                }else if($cek_login[0]['id_level_pengguna'] == 3){
                    return redirect()->to(base_url().'/catatan');
                }else{
                    return redirect()->to(base_url().'/pemesanan');
                }
            }else{
                return redirect()->back()->withInput()->with('validation', $this->validation);
            }
        }else{
            return redirect()->back()->withInput()->with('validation', $this->validation);

        }
    }
    
    public function logout()
	{
        $this->session->destroy();
        return redirect()->to(base_url());
    }
    

    public function register()
    {
        
        $data =[
            'validation' => $this->validation,
			'action_register' => '/register_action',
        ];
		return view('admin_register',$data);
    }
    public function register_action()
    {   
        $data =[
            'nama_pelanggan'          => $this->request->getPost('nama_pelanggan'),
            'alamat_pelanggan'        => $this->request->getPost('alamat'),
            'hp_pelanggan'            => $this->request->getPost('hp'),
        ];
        $insert_id = $this->pelangganModel->add_data_2($data);
        $data =[
            'id_level_pengguna' => 2,
            'user_name'         => $this->request->getPost('user_name'),
            'password' 		    => hash('sha512', $this->request->getPost('password')),
            'nama_pengguna'     => strtoupper($this->request->getPost('nama_pelanggan')),
            'is_pelanggan'      => $insert_id 
        ];
        $insert = $this->penggunaModel->add_data($data);
        
        if($insert){	
            return redirect()->to(base_url().'/login');
        }
    }
    public function rules_login()
    {
        $rules= [
            'user_name' => [
               'rules' => 'required',
               'errors' => [
                'required' => 'User Name is reqiured !!',
               ]
            ],
            'password' => [
               'rules' => 'required',
               'errors' => [
                'required' => 'Password is reqiured !!',
               ]
            ]
        ];
        
        return $rules;
    }
}

