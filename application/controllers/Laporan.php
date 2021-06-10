<?php
class Laporan extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    flashData();
    checklogin();
    checkAdmin();
    $this->load->model(['invoice_model', 'pembayaran_model']);
  }


  function index()
  {
    redirect('laporan/invoice');
  }

  function invoice()
  {
    $invoice    = $this->invoice_model->getall();
    $data = array(
      'invoice'   => $invoice,
    );
    $this->template->load('template', 'laporan/invoice_data', $data);
  }

  function peserta()
  {
    $peserta  = $this->invoice_model->tampil_peserta();
    $data = array(
      'invoice'   => $peserta,
    );
    $this->template->load('template', 'laporan/peserta_data', $data);
  }

  function process()
  {
    if (isset($_POST['filter'])) {
      if ($_POST['filterdata'] == '') {
        $invoice    = $this->invoice_model->getall();
      } else {
        $invoice    = $this->invoice_model->filter_data($_POST['filterdata']);
      }
    }
    $data = array(
      'invoice'   => $invoice,
    );
    $this->template->load('template', 'laporan/laporan_data', $data);
  }






  // function excel()
  // {
  //     $invoice    = $this->invoice_model->getall()->result();

  //     require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel.php');
  //     require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

  //     $object = new PHPExcel();

  //     $object->getProperties()->setCreator("Dev X");
  //     $object->getProperties()->setLastModifiedBy("Aplikasi Lomba");
  //     $object->getProperties()->setTitle("Daftar Invoice");

  //     $object->setActiveSheetIndex(0);

  //     $object->getActiveSheet()->setCellValue('A1', 'No');
  //     $object->getActiveSheet()->setCellValue('B1', 'No Invoice');
  //     $object->getActiveSheet()->setCellValue('C1', 'Nama Peserta');
  //     $object->getActiveSheet()->setCellValue('D1', 'NIK');
  //     $object->getActiveSheet()->setCellValue('E1', 'No Hp');
  //     $object->getActiveSheet()->setCellValue('F1', 'Nama Lomba');

  //     $baris = 2;
  //     $no = 1;

  //     foreach ($invoice as $key => $data) { 
  //         $object->getActiveSheet()->setCellValue('A' . $baris, $no++);
  //         $object->getActiveSheet()->setCellValue('B' . $baris, $data->invoice);
  //         $object->getActiveSheet()->setCellValue('C' . $baris, $data->invoice);
  //         $object->getActiveSheet()->setCellValue('D' . $baris, $data->invoice);
  //         $object->getActiveSheet()->setCellValue('E' . $baris, $data->invoice);
  //         $object->getActiveSheet()->setCellValue('F' . $baris, $data->invoice);

  //         $baris++;
  //     }

  //     $filename="Laporan".'xlsx';

  //     $object->getActiveSheet()->setTitle("Data Invoice");
  //     header('Content-Type : application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

  //     header('Content-Disposition: attachment;filename="'.$filename. '"');
  //     header('Cache-Control: max-age=0');

  //     $writer = PHPExcel_IOFactory::createWriter($object, 'Excel2007');
  //     $writer->save('php://output');

  //     exit;
  // }

  function export()
  {
    $invoice    = $this->invoice_model->getall()->result();
    // Load plugin PHPExcel nya
    include APPPATH . 'third_party/PHPExcel/PHPExcel.php';
    // Panggil class PHPExcel nya
    $excel = new PHPExcel();
    // Settingan awal fil excel
    $excel->getProperties()->setCreator('My Notes Code')
      ->setLastModifiedBy('My Notes Code')
      ->setTitle("Data Transaksi")
      ->setSubject("Transaksi")
      ->setDescription("Laporan Semua Data Transaksi")
      ->setKeywords("Data Transaksi");
    // Buat sebuah variabel untuk menampung pengaturan style dari header tabel
    $style_col = array(
      'font' => array('bold' => true), // Set font nya jadi bold
      'alignment' => array(
        'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
      ),
      'borders' => array(
        'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
        'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
        'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
        'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
      )
    );
    // Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
    $style_row = array(
      'alignment' => array(
        'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
      ),
      'borders' => array(
        'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
        'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
        'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
        'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
      )
    );
    // if(isset($_GET['filter']) && ! empty($_GET['filter'])){ // Cek apakah user telah memilih filter dan klik tombol tampilkan
    //     $filter = $_GET['filter']; // Ambil data filder yang dipilih user
    //     if($filter == '1'){ // Jika filter nya 1 (per tanggal)
    //         $tgl = $_GET['tanggal'];
    //         $label = 'Data Transaksi Tanggal '.date('d-m-y', strtotime($tgl));
    //         $transaksi = $this->TransaksiModel->view_by_date($tgl); // Panggil fungsi view_by_date yang ada di TransaksiModel
    //     }else if($filter == '2'){ // Jika filter nya 2 (per bulan)
    //         $bulan = $_GET['bulan'];
    //         $tahun = $_GET['tahun'];
    //         $nama_bulan = array('', 'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
    //         $label = 'Data Transaksi Bulan '.$nama_bulan[$bulan].' '.$tahun;
    //         $transaksi = $this->TransaksiModel->view_by_month($bulan, $tahun); // Panggil fungsi view_by_month yang ada di TransaksiModel
    //     }else{ // Jika filter nya 3 (per tahun)
    //         $tahun = $_GET['tahun'];
    //         $label = 'Data Transaksi Tahun '.$tahun;
    //         $transaksi = $this->TransaksiModel->view_by_year($tahun); // Panggil fungsi view_by_year yang ada di TransaksiModel
    //     }
    // }else{ // Jika user tidak mengklik tombol tampilkan
    //     $label = 'Semua Data Transaksi';
    //     $transaksi = $this->TransaksiModel->view_all(); // Panggil fungsi view_all yang ada di TransaksiModel
    // }

    $excel->setActiveSheetIndex(0);
    $excel->getActiveSheet()->setCellValue('A1', "DATA TRANSAKSI"); // Set kolom A1 dengan tulisan "DATA SISWA"
    $excel->getActiveSheet()->mergeCells('A1:E1'); // Set Merge Cell pada kolom A1 sampai E1
    $excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
    $excel->getActiveSheet()->setCellValue('A2', 'ok'); // Set kolom A2 sesuai dengan yang pada variabel $label
    $excel->getActiveSheet()->mergeCells('A2:E2'); // Set Merge Cell pada kolom A2 sampai E2
    // Buat header tabel nya pada baris ke 4
    $excel->getActiveSheet()->setCellValue('A4', "Tanggal"); // Set kolom A4 dengan tulisan "Tanggal"
    $excel->getActiveSheet()->setCellValue('B4', "Kode Transaksi"); // Set kolom B4 dengan tulisan "Kode Transaksi"
    $excel->getActiveSheet()->setCellValue('C4', "Barang"); // Set kolom C4 dengan tulisan "Barang"
    // $excel->getActiveSheet()->setCellValue('D4', "Jumlah"); // Set kolom D4 dengan tulisan "Jumlah"
    // $excel->getActiveSheet()->setCellValue('E4', "Total Harga"); // Set kolom E4 dengan tulisan "Total Harga"
    // Apply style header yang telah kita buat tadi ke masing-masing kolom header
    // $excel->getActiveSheet()->getStyle('A4')->applyFromArray($style_col);
    // $excel->getActiveSheet()->getStyle('B4')->applyFromArray($style_col);
    // $excel->getActiveSheet()->getStyle('C4')->applyFromArray($style_col);
    // $excel->getActiveSheet()->getStyle('D4')->applyFromArray($style_col);
    // $excel->getActiveSheet()->getStyle('E4')->applyFromArray($style_col);
    // Set height baris ke 1, 2, 3 dan 4
    $excel->getActiveSheet()->getRowDimension('1')->setRowHeight(20);
    $excel->getActiveSheet()->getRowDimension('2')->setRowHeight(20);
    $excel->getActiveSheet()->getRowDimension('3')->setRowHeight(20);
    // $excel->getActiveSheet()->getRowDimension('4')->setRowHeight(20);
    $no = 1; // Untuk penomoran tabel, di awal set dengan 1
    $numrow = 5; // Set baris pertama untuk isi tabel adalah baris ke 5

    // foreach ($invoice as $key => $data) { 
    //     $object->getActiveSheet()->setCellValue('A' . $baris, $no++);
    //     $object->getActiveSheet()->setCellValue('B' . $baris, $data->invoice);
    //     $object->getActiveSheet()->setCellValue('C' . $baris, $data->invoice);
    //     $object->getActiveSheet()->setCellValue('D' . $baris, $data->invoice);
    //     $object->getActiveSheet()->setCellValue('E' . $baris, $data->invoice);
    //     $object->getActiveSheet()->setCellValue('F' . $baris, $data->invoice);

    //     $baris++;
    // }

    foreach ($invoice as $data) { // Lakukan looping pada variabel transaksi
      //   $tgl = date('d-m-Y', strtotime($data->tgl)); // Ubah format tanggal jadi dd-mm-yyyy
      $excel->getActiveSheet()->setCellValue('A' . $numrow, $data->invoice);
      $excel->getActiveSheet()->setCellValue('B' . $numrow, $data->invoice);
      $excel->getActiveSheet()->setCellValue('C' . $data->invoice);
      //   $excel->getActiveSheet()->setCellValue('D'.$numrow, $data->jumlah);
      //   $excel->getActiveSheet()->setCellValue('E'.$numrow, $data->total_harga);
      // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
      $excel->getActiveSheet()->getStyle('A' . $numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('B' . $numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('C' . $numrow)->applyFromArray($style_row);
      //   $excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
      //   $excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getRowDimension($numrow)->setRowHeight(20);
      $no++; // Tambah 1 setiap kali looping
      $numrow++; // Tambah 1 setiap kali looping
    }
    // Set width kolom
    $excel->getActiveSheet()->getColumnDimension('A')->setWidth(15); // Set width kolom A
    $excel->getActiveSheet()->getColumnDimension('B')->setWidth(18); // Set width kolom B
    $excel->getActiveSheet()->getColumnDimension('C')->setWidth(25); // Set width kolom C
    // $excel->getActiveSheet()->getColumnDimension('D')->setWidth(20); // Set width kolom D
    // $excel->getActiveSheet()->getColumnDimension('E')->setWidth(20); // Set width kolom E
    // Set orientasi kertas jadi LANDSCAPE
    $excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
    // Set judul file excel nya
    $excel->getActiveSheet()->setTitle("Laporan Data Transaksi");
    $excel->getActiveSheet();
    // Proses file excel
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment; filename="Data Transaksi.xlsx"'); // Set nama file excel nya
    header('Cache-Control: max-age=0');
    $write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
    $write->save('php://output');
  }
}
