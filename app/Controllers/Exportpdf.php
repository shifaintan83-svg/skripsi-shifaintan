<?php

namespace App\Controllers;
use App\Models\BulanModel;
use App\Models\JurnalModel;
use App\Models\UserModel;
use App\Models\MasteriuranModel;
use App\Controllers\BaseController;
use Dompdf\Dompdf;

class Exportpdf extends BaseController
{
    protected $session;
	public function __construct(){
		$this->bulanModel = new BulanModel();
		$this->jurnalModel = new JurnalModel();
		$this->userModel = new UserModel();
		$this->masteriuranModel = new MasteriuranModel();
        $this->session = \Config\Services::session();
        $this->validation = \Config\Services::validation();
        $this->session->start();
        
	}
    public function index()
    {   

    }
    public function kartu_iuran($tahun){
        $list_bulan = $this->bulanModel->get_all_data();
		$list_iuran = $this->jurnalModel->get_iuran();
		$iuran = $this->masteriuranModel->get_iuran($tahun);

        $data = [];

        foreach ($list_bulan as $key => $value) {
            $prefix = $this->session->get("id_user")."-". $value['bulan'] ."-".$tahun;
            $status= "Belum Bayar";
            $tglBayar = "-";
            foreach ($list_iuran as $key => $value2) {
                if($value2['isIuran'] == $prefix  ){
                    $tglBayar = $value2['jurnalDate'];
                    $status = "Lunas";
                    break;  
                }
            }
            $array = [
                'bulan' => $value['bulan'],
                'namaBulan' => $value['namaBulan'],
                'tglBayar' => $tglBayar,
                'jumlahIuran' => $iuran['0']['jumlahIuran'],
                'status' =>$status ,
                'prefix' =>$prefix ,
            ];
            $data[]= $array ;
        }
        $row = $this->userModel->get_by_id($this->session->get("id_user"));
        $data =[
			'name' => $this->session->get("displayname"),
			'level_name' => $this->session->get("level_name"),
            'photoProfile' =>$this->session->get("photoProfile"),
			'displayname' => $row['displayname'],
			'judul_page' => 'Iuran Bulanan Tahun '. $tahun,
			'list_bulan' => $data,
			'tahun' => $tahun,
			'sub_judul_page' => 'Table Data',
			'filter' => '/iuran',
			'add' => '/add_iuran',
			'update' => '/update_iuran',
			'url_delete' => 'hapus_iuran',
            'url' =>'iuran'
        ];
		// return view('pdf_jurnal',$data);
        $filename = 'Kartu Iuran Bulanan '.$tahun;

        // instantiate and use the dompdf class
        $dompdf = new Dompdf();

        // load HTML content
        $dompdf->loadHtml(view('pdf_kartu_iuran',$data));

        // (optional) setup the paper size and orientation
        $dompdf->setPaper('A4', 'potrait');

        // render html as PDF
        $dompdf->render();

        // output the generated pdf
        $dompdf->stream($filename, array("Attachment" => false));
        exit();  
    
    
    }
    public function kartu_iuran_admin($tahun,$id_user){
        $list_bulan = $this->bulanModel->get_all_data();
		$list_iuran = $this->jurnalModel->get_iuran();
		$iuran = $this->masteriuranModel->get_iuran($tahun);

        $data = [];

        foreach ($list_bulan as $key => $value) {
            $prefix = $id_user."-". $value['bulan'] ."-".$tahun;
            $status= "Belum Bayar";
            $tglBayar = "-";
            foreach ($list_iuran as $key => $value2) {
                if($value2['isIuran'] == $prefix  ){
                    $tglBayar = $value2['jurnalDate'];
                    $status = "Lunas";
                    break;  
                }
            }
            $array = [
                'bulan' => $value['bulan'],
                'namaBulan' => $value['namaBulan'],
                'tglBayar' => $tglBayar,
                'jumlahIuran' => $iuran['0']['jumlahIuran'],
                'status' =>$status ,
                'prefix' =>$prefix ,
            ];
            $data[]= $array ;
        }
        $row = $this->userModel->get_by_id($id_user);
        $data =[
			'name' => $this->session->get("displayname"),
			'level_name' => $this->session->get("level_name"),
            'photoProfile' =>$this->session->get("photoProfile"),
			'judul_page' => 'Iuran Bulanan Tahun '. $tahun,
			'displayname' => $row['displayname'],
			'list_bulan' => $data,
			'tahun' => $tahun,
			'sub_judul_page' => 'Table Data',
			'filter' => '/iuran',
			'add' => '/add_iuran',
			'update' => '/update_iuran',
			'url_delete' => 'hapus_iuran',
            'url' =>'iuran'
        ];
		// return view('pdf_jurnal',$data);
        $filename = 'Kartu Iuran Bulanan '.$tahun;

        // instantiate and use the dompdf class
        $dompdf = new Dompdf();

        // load HTML content
        $dompdf->loadHtml(view('pdf_kartu_iuran',$data));

        // (optional) setup the paper size and orientation
        $dompdf->setPaper('A4', 'potrait');

        // render html as PDF
        $dompdf->render();

        // output the generated pdf
        $dompdf->stream($filename, array("Attachment" => false));
        exit();  
    
    
    }
    
    
}
