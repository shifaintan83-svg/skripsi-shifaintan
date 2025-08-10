<?php

namespace App\Controllers;
use App\Models\PemesananModel;
use App\Models\LayananModel;
use App\Models\PelangganModel;
use App\Models\TenagaModel;
use App\Models\PenggunaModel;
use CodeIgniter\RESTful\ResourceController;

use App\Controllers\BaseController;
use Dompdf\Dompdf;

class Laporan extends BaseController
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
    public function index(){
        
		$laporan_pemesanan = $this->pemesananModel->get_all_data();
        
        $filename = 'Laporan Pemesanan ';
		$data =[
            'judul' =>$filename,
            'laporan_pemesanan' => $laporan_pemesanan,
        ];
        // print_r($head_data);die;
		// return view('pdf_jurnal',$data);

        // instantiate and use the dompdf class
        $dompdf = new Dompdf();

        // load HTML content
        $dompdf->loadHtml(view('laporan_pemesanan',$data));

        // (optional) setup the paper size and orientation
        $dompdf->setPaper('A4', 'potrait');

        // render html as PDF
        $dompdf->render();

        // output the generated pdf
        $dompdf->stream($filename, array("Attachment" => false));  
        exit();
    
    
    }
    
    public function laporan_pembayaran(){
        
		$laporan_pemesanan = $this->pemesananModel->pembayaran();
        
        $filename = 'Laporan Pembayaran ';
		$data =[
            'judul' =>$filename,
            'laporan_pemesanan' => $laporan_pemesanan,
        ];
        // print_r($head_data);die;
		// return view('pdf_jurnal',$data);

        // instantiate and use the dompdf class
        $dompdf = new Dompdf();

        // load HTML content
        $dompdf->loadHtml(view('laporan_pemesanan',$data));

        // (optional) setup the paper size and orientation
        $dompdf->setPaper('A4', 'potrait');

        // render html as PDF
        $dompdf->render();

        // output the generated pdf
        $dompdf->stream($filename, array("Attachment" => false));  
        exit();
    
    
    }
    public function laporan_penyelesaian(){
        
		$laporan_pemesanan = $this->pemesananModel->done();
        
        $filename = 'Laporan Penyelesaian ';
		$data =[
            'judul' =>$filename,
            'laporan_pemesanan' => $laporan_pemesanan,
        ];
        // print_r($head_data);die;
		// return view('pdf_jurnal',$data);

        // instantiate and use the dompdf class
        $dompdf = new Dompdf();

        // load HTML content
        $dompdf->loadHtml(view('laporan_pemesanan',$data));

        // (optional) setup the paper size and orientation
        $dompdf->setPaper('A4', 'potrait');

        // render html as PDF
        $dompdf->render();

        // output the generated pdf
        $dompdf->stream($filename, array("Attachment" => false));  
        exit();
    
    
    }
}
