<?php
/**
 * Created by PhpStorm.
 */

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Guru extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->page->setTitle('Guru');
        $this->load->model('MKriteria');
        $this->load->model('MSubKriteria');
        $this->load->model('MGuru');
        $this->load->model('MNilai');
        $this->page->setLoadJs('assets/js/guru');
    }

    public function index()
    {
        $data['guru'] = $this->MGuru->getAll();
        loadPage('guru/index', $data);
    }

    public function tambah($id = null)
    {

        if ($id == null) {
            if (count($_POST)) {
                $this->form_validation->set_rules('guru', '', 'trim|required');
                if ($this->form_validation->run() == false) {
                    $errors = $this->form_validation->error_array();
                    $this->session->set_flashdata('errors', $errors);
                    redirect(current_url());
                } else {

                    $guru = $this->input->post('guru');
                    $nilai = $this->input->post('nilai');

                    $this->MGuru->guru = $guru;
                    if ($this->MGuru->insert() == true) {
                        $success = false;
                        $kdGuru = $this->MGuru->getLastID()->kdGuru;
                        foreach ($nilai as $item => $value) {
                            $this->MNilai->kdGuru = $kdGuru;
                            $this->MNilai->kdKriteria = $item;
                            $this->MNilai->nilai = $value;
                            if ($this->MNilai->insert()) {
                                $success = true;
                            }
                        }
                        if ($success == true) {
                            $this->session->set_flashdata('message', 'Berhasil menambah data :)');
                            redirect('guru');
                        } else {
                            echo 'gagal';
                        }
                    }
                }
                //-----
            }else{
                $data['dataView'] = $this->getDataInsert();
                loadPage('guru/tambah', $data);
            }
        }else{
            if(count($_POST)){
                $kdGuru = $this->uri->segment(3, 0);
                dump($kdGuru);
                if($kdGuru > 0){
                    $guru = $this->input->post('guru');
                    $nilai = $this->input->post('nilai');
                    $where = array('kdGuru' => $kdGuru);
                    $this->MGuru->guru = $guru;
                    dump($guru);
                    if($this->MGuru->update($where) == true){
                        $success = false;
                        foreach ($nilai as $item => $value) {
                            $this->MNilai->kdGuru = $kdGuru;
                            $this->MNilai->kdKriteria = $item;
                            $this->MNilai->nilai = $value;
                            if ($this->MNilai->update()) {
                                $success = true;
                            }
                        }
                        if ($success == true) {
                            $this->session->set_flashdata('message', 'Berhasil mengubah data :)');
                            redirect('guru');
                        } else {
                            echo 'gagal';
                        }
                    }
                }
            }
            $data['dataView'] = $this->getDataInsert();
            $data['nilaiGuru'] = $this->MNilai->getNilaiByGuru($id);
            loadPage('guru/tambah', $data);
        }

    }
    
    private function getDataInsert()
    {
        $dataView = array();
        $kriteria = $this->MKriteria->getAll();
        foreach ($kriteria as $item) {
            $this->MSubKriteria->kdKriteria = $item->kdKriteria;
            $dataView[$item->kdKriteria] = array(
                'nama' => $item->kriteria,
                'data' => $this->MSubKriteria->getById()
            );
        }

        return $dataView;
    }

    public function hapus($id)
    {
        if($this->MNilai->delete($id) == true){
            if($this->MGuru->delete($id) == true){
                $this->session->set_flashdata('message','Berhasil menghapus data :)');
                echo json_encode(array("status" => 'true'));
                redirect('guru');
            }
        }
    }
}