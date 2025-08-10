<?php

namespace App\Controllers;
use App\Models\ProfileModel;
use CodeIgniter\RESTful\ResourceController;

use App\Controllers\BaseController;

class Profile extends BaseController
{
    protected $session;
	public function __construct(){

		$this->profileModel = new ProfileModel();
        $this->session = \Config\Services::session();
        $this->validation = \Config\Services::validation();
        $this->uri = new \CodeIgniter\HTTP\URI(uri_string());
        $this->session->start();
        if($this->session->get("level_name") == 'pelanggan'){
            return redirect()->to(base_url().'/user');
        }
        
	}
    public function index()
    {   
        $row = $this->profileModel->get_by_id(1);
        $data =[
			'name' => $this->session->get("displayname"),
			'level_name' => $this->session->get("level_name"),
            'photoProfile' =>$this->session->get("photoProfile"),
            'validation' => $this->validation,
			'action' => '/update_action_companyprofile',
			'judul_page' => 'Company Profile',
			'sub_judul_page' => 'Update',
			'back' => '/companyprofile',
			'url_delete' => 'hapus_companyprofile',
			'id' => 1,
            'CompanyName' => $row['CompanyName'],
            'CompanyLogo' => $row['CompanyLogo'],
            'CompanyMail' => $row['CompanyMail'],
            'CompanyPhone' => $row['CompanyPhone'],
            'CompanyAddress' => $row['CompanyAddress'],
            'url' =>'companyprofile',
        ];
		return view('admin_companyprofile_form',$data);
    }
    public function update_action()
    {           
        $id = $this->request->getPost('id'); 
        $validation = $this->validate([
			'file_upload' => 'uploaded[file_upload]|mime_in[file_upload,image/jpg,image/jpeg,image/gif,image/png]|max_size[file_upload,4096]'
		]);
		if ($validation) {
                $upload = $this->request->getFile('file_upload');
                $upload->move(WRITEPATH .'../assets/img/');
            $data =[
                'CompanyName'         => $this->request->getPost('CompanyName'),
                'CompanyMail'          => $this->request->getPost('CompanyMail'),
                'CompanyPhone'          => $this->request->getPost('CompanyPhone'),
                'CompanyAddress'          => $this->request->getPost('CompanyAddress'),
                'CompanyLogo'         => $upload->getName(),
            ];   
        
            $update = $this->profileModel->ubah_data($data,$id);
            if($update){	
                return redirect()->to(base_url().'/companyprofile');
            }
        }else{
            
            $data =[
                'CompanyName'         => $this->request->getPost('CompanyName'),
                'CompanyMail'          => $this->request->getPost('CompanyMail'),
                'CompanyPhone'          => $this->request->getPost('CompanyPhone'),
                'CompanyAddress'          => $this->request->getPost('CompanyAddress'),
            ];   
        
            $update = $this->profileModel->ubah_data($data,$id);
            if($update){	
                return redirect()->to(base_url().'/companyprofile');
            }
        }
    }
}
