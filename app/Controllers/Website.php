<?php

namespace App\Controllers;
use App\Models\ProfileModel;
use App\Models\LayananModel;
use App\Models\PemesananModel;
use App\Models\PenggunaModel;
use App\Models\PelangganModel;
use CodeIgniter\RESTful\ResourceController;

use App\Controllers\BaseController;

class Website extends BaseController
{
    protected $session;
	public function __construct(){

		$this->profileModel = new ProfileModel();
		$this->layananModel = new LayananModel();
		$this->pemesananModel = new PemesananModel();
		$this->penggunaModel = new PenggunaModel();
		$this->pelangganModel = new PelangganModel();
        $this->session = \Config\Services::session();
        $this->validation = \Config\Services::validation();
        $this->uri = new \CodeIgniter\HTTP\URI(uri_string());
        
	}
    public function index()
    {   
		
        $data =[
			'active' => 'home'
			
        ];
		return view('fe_home',$data);
    }
    public function contact()
    {   
        $data =[
			'active' => 'contact'
        ];
		return view('fe_contact',$data);
    }
    
    public function services()
    {   
		$list_layanan = $this->layananModel->get_all_data();
        $data =[
			'active' => 'services',
            'list_layanan' =>$list_layanan
			
        ];
		return view('fe_services',$data);
    } 
    public function myorder()
    {   
        $row = $this->penggunaModel->get_by_id($this->session->get("id_pengguna"));
		$list_pemesanan = $this->pemesananModel->myorder($row['is_pelanggan'] );
        $data =[
			'active' => 'myorder',
            'list_pemesanan' =>$list_pemesanan
			
        ];
		return view('fe_my_order',$data);
    }
    

    function generateAlphanumericCode($length = 7) {
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $code = '';
        for ($i = 0; $i < $length; $i++) {
            $code .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $code;
    }
    public function pesan($id)
    {   
        if($this->session->get("id_level_pengguna") != 2){
			return redirect()->to(base_url().'/login');
        }else{
            $row = $this->penggunaModel->get_by_id($this->session->get("id_pengguna"));
            $layanan = $this->layananModel->get_by_id($id);
            $pelanggan = $this->pelangganModel->get_by_id($row['is_pelanggan']);
            $data =[
                'active' => 'myorder',
                'id' =>$id,
                'layanan' =>$layanan,
                'pelanggan' =>$pelanggan
                
            ];
            return view('fe_pesanan',$data);
        }
    }
    public function pesan_action()
    {   
       
        $row = $this->penggunaModel->get_by_id($this->session->get("id_pengguna"));
        $layanan = $this->layananModel->get_by_id($this->request->getPost('id_layanan'));
        $data =[
            'kode_pemesanan'            => $this->generateAlphanumericCode(),
            'id_pelanggan'              => $row['is_pelanggan'],
            'jadwal_pemesanan'          => $this->request->getPost('jadwal_pemesanan'),
            'status_order'              => "DRAFT",
            'id_layanan'                => $this->request->getPost('id_layanan'),
            'biaya'                     => $layanan['biaya'],
        ];
        $insert = $this->pemesananModel->add_data($data);
        if($insert){	
            return redirect()->to(base_url().'/myorder-web');
        }
    }
    
	public function delete_myorder($id)
	{
		$hapus = $this->pemesananModel->hapus_data($id);
		if($hapus){	
			return redirect()->to(base_url().'/myorder-web');
		}

    }
     public function pembayaran($total){
        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = 'SB-Mid-server-ULJ2oopUxiSqQf2o2N_DBhIQ';
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;
        
        $params = array(
            'transaction_details' => array(
                'order_id' => rand(),
                'gross_amount' => $total,
            )
        );
        

        $data =[
            'snapToken' 		=> \Midtrans\Snap::getSnapToken($params)
        ];
        
        header('Content-Type: application/json');
        echo json_encode( $data );
    }
    
    public function update_pembayaran($id)
    {       
        $data =[
            'status_order'              => "SCHEDULED",
            'status_pembayaran'              => 1,
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
        'message' => "Terima kasih sudah melakukan pembayaran atas pemesanan layanan ".$layanan['layanan']. " yang akan dilakukan pada ". date('d F Y H:i',strtotime($row['jadwal_pemesanan'])),
        'countryCode' => '62', //optional
        ),
        CURLOPT_HTTPHEADER => array(
            'Authorization: vk!JRp5Nop2DS3C42m6D' //change TOKEN to your actual token
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        echo json_encode('oke');
    }
}
