<?php
class DataPenggajian extends CI_Controller{
    
    public function index()
    {
        $data['title'] = "Data Gaji Pegawai";
        if((isset($_GET['bulan']) && $_GET['bulan']!='') && (isset($_GET['tahun']) && $_GET['tahun']!='')){
            $bulan = $_GET['bulan'];
            $tahun = $_GET['tahun'];
            $bulantahun = $bulan.$tahun;
        } else {
            $bulan = date('m');
            $tahun = date('Y');
            $bulantahun = $bulan.$tahun;
        }
        $data['potongan'] = $this->PenggajianModel->get_data('potongan_gaji')->result();

        $data['gaji'] = $this->db->query("SELECT data_pegawai.npp, data_pegawai.nama_pegawai,data_pegawai.jenis_kelamin
        ,data_jabatan.nama_jabatan, data_pegawai.jenis_pegawai, data_jabatan.gaji_pokok, data_jabatan.tj_struktural
        ,data_jabatan.tj_akademik, data_jabatan.tj_pendidikan, data_jabatan.tj_kesehatan, data_jabatan.tj_keselamatan
        ,data_jabatan.tj_kehadiran, data_kehadiran.alpha FROM data_pegawai INNER JOIN data_kehadiran ON data_kehadiran.npp=data_pegawai.npp
        INNER JOIN data_jabatan ON data_jabatan.nama_jabatan=data_pegawai.jabatan
        WHERE data_kehadiran.bulan='$bulantahun' ORDER BY data_pegawai.nama_pegawai ASC")->result();
            $this->load->view('templates_admin/header',$data);
            $this->load->view('templates_admin/sidebar');
            $this->load->view('admin/dataGaji');
            $this->load->view('templates_admin/footer');
    }
}

?>
