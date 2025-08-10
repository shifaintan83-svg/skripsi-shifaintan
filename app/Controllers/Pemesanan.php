<?php

namespace App\Controllers;
use App\Models\PemesananModel;
use App\Models\LayananModel;
use App\Models\PelangganModel;
use App\Models\TenagaModel;
use App\Models\PenggunaModel;
use CodeIgniter\RESTful\ResourceController;

use App\Controllers\BaseController;

class Pemesanan extends BaseController
{
    protected $session;
	public function __construct(){

		$this->pemesananModel = new PemesananModel();
		$this->layananModel = new LayananModel();
		$this->pelangganModel = new PelangganModel();
		$this->tenagaModel = new TenagaModel();
		$this->penggunaModel = new PenggunaModel();
        $this->session = \Config\Services::session();
        $this->validation = \Config\Services::validation();
        $this->uri = new \CodeIgniter\HTTP\URI(uri_string());
        
	}
    public function index()
    {   
		$list_pemesanan = $this->pemesananModel->get_all_data();
        $data =[
			'judul_page' => 'Pemesanan',
			'list_pemesanan' => $list_pemesanan,
			'sub_judul_page' => 'Table Data',
			'add' => '/add_pemesanan',
			'update' => '/update_pemesanan',
			'url_delete' => 'hapus_pemesanan',
            'url' =>'pemesanan'
        ];
		return view('admin_pemesanan',$data);
    }
    public function create()
    {     
		$list_layanan = $this->layananModel->list();
		$list_pelanggan = $this->pelangganModel->get_all_data();
		$list_tenaga = $this->tenagaModel->get_all_data();  
        $data =[
            'validation' => $this->validation,
            'list_layanan' => $list_layanan,
            'list_pelanggan' => $list_pelanggan,
            'list_tenaga' => $list_tenaga,
			'action' => '/add_action_pemesanan',
			'judul_page' => 'Pemesanan',
			'sub_judul_page' => 'Tambah',
			'back' => '/pemesanan',
			'url_delete' => 'hapus_pemesanan',
            'id_pelanggan' => old('id_pelanggan'),
            'jadwal_pemesanan' =>  date('Y-m-d\TH:i'),
            'id_layanan' => old('id_layanan'),
            'biaya' => 0,
            'status_pembayaran' => old('status_pembayaran'),
            'status_order' => old('status_order'),
            'id_tenaga_kerja' => 0,
            'deskripsi_pemesanan' => old('deskripsi_pemesanan'),
			'id' => '',
            'url' =>'pemesanan',
        ];
		return view('admin_pemesanan_form',$data);
    }
    function generateAlphanumericCode($length = 7) {
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $code = '';
        for ($i = 0; $i < $length; $i++) {
            $code .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $code;
    }
    public function create_action()
    {   
       
        $data =[
            'kode_pemesanan'            => $this->generateAlphanumericCode(),
            'id_pelanggan'              => $this->request->getPost('id_pelanggan'),
            'jadwal_pemesanan'          => $this->request->getPost('jadwal_pemesanan'),
            'status_order'              => "DRAFT",
            'id_layanan'                => $this->request->getPost('id_layanan'),
            'id_tenaga_kerja'           => ($this->request->getPost('id_tenaga_kerja') ==0 ?NULL:$this->request->getPost('id_tenaga_kerja')),
            'biaya'                     => str_replace(".","",str_replace(",","",$this->request->getPost('biaya'))),
        ];
        $insert = $this->pemesananModel->add_data($data);
        if($insert){	
            return redirect()->to(base_url().'/pemesanan');
        }
    }
    public function update($id)
    {   
        $row = $this->pemesananModel->get_by_id($id);
		$list_layanan = $this->layananModel->get_all_data();
		$list_pelanggan = $this->pelangganModel->get_all_data();
		$list_tenaga = $this->tenagaModel->get_all_data();  
        $data =[
            'validation' => $this->validation,
            'list_layanan' => $list_layanan,
            'list_pelanggan' => $list_pelanggan,
            'list_tenaga' => $list_tenaga,
			'action' => '/update_action_pemesanan',
			'judul_page' => 'Pemesanan',
			'sub_judul_page' => 'Update',
			'back' => '/pemesanan',
			'url_delete' => 'hapus_pemesanan',
			'id' => $id,
            'id_pelanggan' => $row['id_pelanggan'],
            'jadwal_pemesanan' => $row['jadwal_pemesanan'],
            'id_layanan' => $row['id_layanan'],
            'biaya' => $row['biaya'],
            'status_pembayaran' => $row['status_pembayaran'],
            'status_order' => $row['status_order'],
            'id_tenaga_kerja' => $row['id_tenaga_kerja'],
            'deskripsi_pemesanan' => $row['deskripsi_pemesanan'],
            'url' =>'pemesanan',
        ];
		return view('admin_pemesanan_form',$data);
    }
    public function update_action()
    {           
        $id = $this->request->getPost('id');
        $row = $this->pemesananModel->get_by_id($id);
        $data =[
            'id_pelanggan'              => $this->request->getPost('id_pelanggan'),
            'jadwal_pemesanan'          => $this->request->getPost('jadwal_pemesanan'),
            'id_layanan'                => $this->request->getPost('id_layanan'),
            'id_tenaga_kerja'           => $this->request->getPost('id_tenaga_kerja'),
            'biaya'                     => str_replace(".","",str_replace(",","",$this->request->getPost('biaya'))),
        ];
        
        $update = $this->pemesananModel->ubah_data($data,$id);
       
        if($update){	
            return redirect()->to(base_url().'/pemesanan');
        }
    }
    
	public function delete($id)
	{
		$hapus = $this->pemesananModel->hapus_data($id);
		if($hapus){	
			return redirect()->to(base_url().'/pemesanan');
		}

    }
    
    public function catatan()
    {   
        $row = $this->penggunaModel->get_by_id($this->session->get("id_pengguna"));
		$list_pemesanan = $this->pemesananModel->order($row['is_tenaga'] );
        $data =[
			'judul_page' => 'Catatan Pekerjaan',
			'list_pemesanan' => $list_pemesanan,
			'sub_judul_page' => 'Table Data',
			'add' => '/add_pemesanan',
			'update' => '/update_catatan',
			'url_delete' => 'hapus_pemesanan',
            'url' =>'pemesanan'
        ];
		return view('admin_catatan',$data);
    }
    public function update_catatan($id)
    {   
        $row = $this->pemesananModel->get_by_id($id);
		$list_layanan = $this->layananModel->get_all_data();
		$list_pelanggan = $this->pelangganModel->get_all_data();
		$list_tenaga = $this->tenagaModel->get_all_data();  
        $data =[
            'validation' => $this->validation,
            'list_layanan' => $list_layanan,
            'list_pelanggan' => $list_pelanggan,
            'list_tenaga' => $list_tenaga,
			'action' => '/update_catatan_action',
			'judul_page' => 'Catatan Pekerjaan',
			'sub_judul_page' => 'Update',
			'back' => '/catatan',
			'url_delete' => 'hapus_pemesanan',
			'id' => $id,
            'id_pelanggan' => $row['id_pelanggan'],
            'jadwal_pemesanan' => $row['jadwal_pemesanan'],
            'id_layanan' => $row['id_layanan'],
            'biaya' => $row['biaya'],
            'status_pembayaran' => $row['status_pembayaran'],
            'status_order' => $row['status_order'],
            'id_tenaga_kerja' => $row['id_tenaga_kerja'],
            'deskripsi_pemesanan' => $row['deskripsi_pemesanan'],
            'url' =>'catatan',
        ];
		return view('admin_catatan_form',$data);
    }
    public function update_catatan_action()
    {           
        $id = $this->request->getPost('id');
        $data =[
            'deskripsi_pemesanan'       => $this->request->getPost('deskripsi_pemesanan'),
            'status_order'              => "DONE",
        ];
        
        $update = $this->pemesananModel->ubah_data($data,$id);
        $row = $this->pemesananModel->get_by_id($id);
        $pelanggan = $this->pelangganModel->get_by_id($row['id_pelanggan']);
        $layanan = $this->layananModel->get_by_id($row['id_layanan']);
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.fonnte.com/send',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => array(
        'target' => $pelanggan['hp_pelanggan'],
        'message' => "Terima kasih sudah menggunakan jasa kami. Pemesanan atas layanan ".$layanan['layanan']. " telah dilakukan",
        'countryCode' => '62', //optional
        ),
        CURLOPT_HTTPHEADER => array(
            'Authorization: vk!JRp5Nop2DS3C42m6D' //change TOKEN to your actual token
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        if($update){	
            return redirect()->to(base_url().'/catatan');
        }
    }
    
    public function view_catatan($id)
    {   
        $row = $this->pemesananModel->get_by_id($id);
		$list_layanan = $this->layananModel->get_all_data();
		$list_pelanggan = $this->pelangganModel->get_all_data();
		$list_tenaga = $this->tenagaModel->get_all_data();  
        $data =[
            'validation' => $this->validation,
            'list_layanan' => $list_layanan,
            'list_pelanggan' => $list_pelanggan,
            'list_tenaga' => $list_tenaga,
			'action' => '/update_catatan_action',
			'judul_page' => 'Pemesanan',
			'sub_judul_page' => 'Update',
			'back' => '/pemesanan',
			'url_delete' => 'hapus_pemesanan',
			'id' => $id,
            'id_pelanggan' => $row['id_pelanggan'],
            'jadwal_pemesanan' => $row['jadwal_pemesanan'],
            'id_layanan' => $row['id_layanan'],
            'biaya' => $row['biaya'],
            'status_pembayaran' => $row['status_pembayaran'],
            'status_order' => $row['status_order'],
            'id_tenaga_kerja' => $row['id_tenaga_kerja'],
            'deskripsi_pemesanan' => $row['deskripsi_pemesanan'],
            'url' =>'pemesanan',
        ];
		return view('admin_view_form',$data);
    }
}
