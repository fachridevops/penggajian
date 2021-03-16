<?php

class PotonganGaji extends CI_Controller{


    public function index()
    {

        $data['title'] = "Setting Potongan Gaji";
        $data['pot_gaji'] = $this->PenggajianModel->get_data('potongan_gaji')->result();
        $this->load->view('templates_admin/header',$data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/potonganGaji');
        $this->load->view('templates_admin/footer');
    }
    public function tambahData()
    {

        $data['title'] = "Tambah Potongan Gaji";
        $data['pot_gaji'] = $this->PenggajianModel->get_data('potongan_gaji')->result();
        $this->load->view('templates_admin/header',$data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/formPotonganGaji');
        $this->load->view('templates_admin/footer');
    }
    public function tambahDataAksi()
    {
        $this->_rules();
        if($this->form_validation->run() == FALSE) {
            $this->tambahData();
        }else{
            $potongan = $this->input->post('potongan');
            $jml_potongan = $this->input->post('jml_potongan');
            $data=array(
                'potongan' => $potongan,
                'jml_potongan' => $jml_potongan
            );

        $this->PenggajianModel->insert_data($data,'potongan_gaji');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Data berhasil ditambahkan!</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
      redirect('admin/potonganGaji');
        }
    }

    public function updateData($id)
    {
        $where = array ('id' => $id);
        $data['title'] = "Update Potongan Gaji";
        $data['pot_gaji'] = $this->db->query("SELECT * FROM potongan_gaji WHERE id='$id'")->result();
        $this->load->view('templates_admin/header',$data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/updatePotonganGaji',$data);
        $this->load->view('templates_admin/footer');
    }

    public function updateDataAksi()
    {
        $this->_rules();

        if($this->form_validation->run() == FALSE) {
            $this->updateData();
        }else{
            $id             = $this->input->post('id');
            $potongan       = $this->input->post('potongan');
            $jml_potongan   = $this->input->post('jml_potongan');

            $data=array(
                'potongan'       => $potongan,
                'jml_potongan'   => $jml_potongan
            );
            $where = array(
                'id' => $id
            );
            $this->PenggajianModel->update_data('potongan_gaji',$data,$where);
            $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data berhasil diupdate!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>');
            redirect('admin/potonganGaji');
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('potongan', 'jenispotongan', 'required');
        $this->form_validation->set_rules('jml_potongan', 'jumlahpotongan', 'required');
    }

    public function deleteData($id)
    {
        $where = array ('id' => $id);
        $this->PenggajianModel->delete_data($where,'potongan_gaji');
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('admin/potonganGaji');
    }

}

?>