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
        $this->load->model('MGuru');
        $this->load->model('MNilai');
        $this->load->model('MKriteria');
        $this->load->model('MSubKriteria');
        $this->page->setLoadJs('assets/js/guru');
    }

    public function index()
    {
        $data['teacher'] = $this->MGuru->getAll();
        loadPage('guru/index', $data);
    }

    public function tambah()
    {
        $this->form_validation->set_rules('guru', '', 'trim|required');
        if ($this->form_validation->run() == false) {
            loadPage('guru/tambah');
        } else {
            $this->MGuru->tambahData();
            $this->session->set_flashdata('message', 'Berhasil menambah data :)');
            redirect('guru');
        }
    }
    
    public function ubah($id) {

        $data['teacher'] = $this->MGuru->getGuruId($id);


        $this->form_validation->set_rules('guru', '', 'trim|required');

        if ($this->form_validation->run() == false) {
            loadPage('guru/ubah', $data);
        } else {
            $this->MGuru->update();
            $this->session->set_flashdata('message', 'Berhasil mengubah data :)');
            redirect('guru');
        }
    }
    public function hapus($id)
    {
        $this->MGuru->delete($id);
        $this->session->set_flashdata('message','Berhasil menghapus data :)');
        redirect('guru');
        // if($this->MNilai->delete($id) == true){
            // if($this->MGuru->delete($id) == true){
            // }
        // }
    }
}