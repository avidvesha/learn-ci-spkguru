<?php

/**
 * Created by PhpStorm.
 */
class MNilai extends CI_Model{

    public $kdGuru;
    public $kdKriteria;
    public $nilai;

    public function __construct(){
        parent::__construct();
    }

    private function getTable()
    {
        return 'grade';
    }

    private function getData()
    {
        $grades = array(
            'kdGuru' => $this->kdGuru,
            'kdKriteria' => $this->kdKriteria,
            'nilai' => $this->nilai
        );

        return $grades;
    }

    public function insert()
    {
        $status = $this->db->insert($this->getTable(), $this->getData());
        return $status;
    }

    public function getNilaiByGuru($id)
    {
        $query = $this->db->query(
            'select u.kdGuru, u.guru, k.kdKriteria, n.nilai from guru u, nilai n, kriteria k, subkriteria sk where u.kdGuru = n.kdGuru AND k.kdKriteria = n.kdKriteria and k.kdKriteria = sk.kdKriteria and u.kdGuru = '.$id.' GROUP by n.nilai '
        );
        if($query->num_rows() > 0){
            foreach ($query->result() as $row) {
                $grade[] = $row;
            }

            return $grade;
        }
    }

    public function getNilaiGuru()
    {
        $query = $this->db->query(
            'select u.kdGuru, u.guru, k.kdKriteria, k.kriteria ,n.nilai from guru u, nilai n, kriteria k where u.kdGuru = n.kdGuru AND k.kdKriteria = n.kdKriteria '
        );
        if($query->num_rows() > 0){
            foreach ($query->result() as $row) {
                $grade[] = $row;
            }

            return $grade;
        }
    }

    public function update()
    {
        $data = array('nilai' => $this->nilai);
        $this->db->where('kdGuru', $this->kdGuru);
        $this->db->where('kdKriteria', $this->kdKriteria);
        $this->db->update($this->getTable(), $data);
        return $this->db->affected_rows();
    }

    public function delete($id)
    {
        $this->db->where('kdGuru', $id);
        return $this->db->delete($this->getTable());
    }
}