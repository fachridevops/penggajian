<?php

class DataJabatan extends CI_Controller{

    public function index()
    {
        $data['title'] = "Data Jabatan";
        $data['jabatan'] = $this->PenggajianModel->get_data('data_jabatan')->result();
        $this->load->view('templates_admin/header',$data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/dataJabatan');
        $this->load->view('templates_admin/footer');
    }
    public function tambahData()
    {
        $data['title'] = "Tambah Data Jabatan";
        $this->load->view('templates_admin/header',$data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/tambahDataJabatan');
        $this->load->view('templates_admin/footer');
    }
    public function tambahDataAksi()
    {
        $this->_rules();
        if($this->form_validation->run() == FALSE) {
            $this->tambahData();
        } else {
            $nama_jabatan = $this->input->post('nama_jabatan');
            $gaji_pokok = $this->input->post('gaji_pokok');
            $tj_struktural = $this->input->post('tj_struktural');
            $tj_akademik = $this->input->post('tj_akademik');
            $tj_pendidikan = $this->input->post('tj_pendidikan');
            $tj_kesehatan = $this->input->post('tj_kesehatan');
            $tj_keselamatan = $this->input->post('tj_keselamatan');
            $tj_kehadiran = $this->input->post('tj_kehadiran');

            $data = array (
                'nama_jabatan' => $nama_jabatan,
                'gaji_pokok' => $gaji_pokok,
                'tj_struktural' => $tj_struktural,
                'tj_akademik' => $tj_akademik,
                'tj_pendidikan' => $tj_pendidikan,
                'tj_kesehatan' => $tj_kesehatan,
                'tj_keselamatan' => $tj_keselamatan,
                'tj_kehadiran' => $tj_kehadiran,
            );

            $this->PenggajianModel->insert_data($data,'data_jabatan');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data berhasil ditambahkan!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
          redirect('admin/dataJabatan');
        }
    }
    public function updateData($id)
    {
        $where = array('id_jabatan' => $id);
        $data['jabatan'] = $this->db->query("SELECT * FROM data_jabatan WHERE id_jabatan='$id'")->result();
        $data['title'] = "Tambah Data Jabatan";
        $this->load->view('templates_admin/header',$data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/updateDataJabatan');
        $this->load->view('templates_admin/footer');
    }
    public function updateDataAksi()
    {
        $this->_rules();

        if($this->form_validation->run() == FALSE) {
            $this->updateData();
        } else {
            $id = $this->input->post('id_jabatan');
            $nama_jabatan = $this->input->post('nama_jabatan');
            $gaji_pokok = $this->input->post('gaji_pokok');
            $tj_struktural = $this->input->post('tj_struktural');
            $tj_akademik = $this->input->post('tj_akademik');
            $tj_pendidikan = $this->input->post('tj_pendidikan');
            $tj_kesehatan = $this->input->post('tj_kesehatan');
            $tj_keselamatan = $this->input->post('tj_keselamatan');
            $tj_kehadiran = $this->input->post('tj_kehadiran');

            $data = array (
                'nama_jabatan' => $nama_jabatan,
                'gaji_pokok' => $gaji_pokok,
                'tj_struktural' => $tj_struktural,
                'tj_akademik' => $tj_akademik,
                'tj_pendidikan' => $tj_pendidikan,
                'tj_kesehatan' => $tj_kesehatan,
                'tj_keselamatan' => $tj_keselamatan,
                'tj_kehadiran' => $tj_kehadiran,
            );
            $where = array(
                'id_jabatan' => $id


            );

            $this->PenggajianModel->update_data('data_jabatan', $data, $where);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data berhasil diupdate!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
          redirect('admin/dataJabatan');
        }
    }
    public function _rules()
    {
        $this->form_validation->set_rules('nama_jabatan','nama_jabatan','required');
        $this->form_validation->set_rules('gaji_pokok','gaji_pokok','required');
        $this->form_validation->set_rules('tj_struktural','tj_struktural','required');
        $this->form_validation->set_rules('tj_akademik','tj_akademik','required');
        $this->form_validation->set_rules('tj_pendidikan','tj_pendidikan','required');
        $this->form_validation->set_rules('tj_kesehatan','tj_kesehatan','required');
        $this->form_validation->set_rules('tj_keselamatan','tj_keselamatan','required');
        $this->form_validation->set_rules('tj_kehadiran','tj_kehadiran','required');
    }
    public function deleteData($id)
    {
        $where = array('id_jabatan' => $id);
        $this->penggajianModel->delete_data($where, 'data_jabatan');
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Data berhasil dihapus!</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
      redirect('admin/dataJabatan');
    }
}

?>