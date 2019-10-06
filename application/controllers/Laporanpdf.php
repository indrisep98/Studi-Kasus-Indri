<?php
Class Laporanpdf extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->library('pdf');
    }
    
    function index(){
        $pdf = new FPDF('l','mm','A5');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',16);
        // mencetak string 
        $pdf->Cell(190,7,'LAPORAN PENJUALAN MAKANAN DAN MINUMAN',0,1,'C');
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(40,6,'Kode Pemesanan',1,0);
        $pdf->Cell(55,6,'No Meja',1,0);
        $pdf->Cell(27,6,'Total Tagihan',1,0);
        $pdf->Cell(25,6,'Status',1,1);
        $pdf->SetFont('Arial','',10);
        $pemesanan = $this->db->get('pemesanan')->result();
        foreach ($pemesanan as $row){
            $pdf->Cell(40,6,$row->kode_pemesanan,1,0);
            $pdf->Cell(55,6,$row->no_meja,1,0);
            $pdf->Cell(27,6,$row->total_tagihan,1,0);
            $pdf->Cell(25,6,$row->status,1,1); 
        }
        $pdf->Output();
    }
}