<?php

/**
 * Created by PhpStorm.
 */
class MSubKriteria extends CI_Model{

    public $kdSubKriteria;
    public $kdKriteria;
    public $subKriteria;
    public $value;


    public function __construct(){
        parent::__construct();
    }

    private function getTable()
    {
        return 'subkriteria';
    }

    private function getData(){
        $data = array(
            'kdKriteria' => $this->kdKriteria,
            'subKriteria' => $this->subKriteria,
            'value' => $this->value
        );
        return $data;
    }

    public function getAll()
    {
        $query = $this->db->get($this->getTable());
        if($query->num_rows() > 0){
            foreach ($query->result() as $row) {
                $subkriterias[] = $row;
            }

            return$subkriterias;
        }
    }

    public function getById()
    {
        $this->db->where('kdKriteria', $this->kdKriteria);
        $query = $this->db->get($this->getTable());

        if($query->num_rows() > 0){
            foreach ($query->result() as $row) {
                $subkriteria[] = $row;
            }

            return $subkriteria;
        }
    }

    public function insert()
    {
        $data = $this->getData();
        $this->db->insert($this->getTable(), $data);
        return $this->db->insert_id();
    }

    public function update()
    {
        // $data = $this->getData();
        // $this->db->where('kdSubKriteria', $this->kdSubKriteria);
        // $this->db->where('kdKriteria', $this->kdKriteria);
        // $this->db->update($this->getTable(), $data);
        // return $this->db->affected_rows();

        // $data = [
        //     array(
        //         array('subKriteria' => $this->input->post('itemKriteria1', true), 'value' => 1),
        //         array('subKriteria' => $this->input->post('itemKriteria2', true), 'value' => 2),
        //         array('subKriteria' => $this->input->post('itemKriteria3', true), 'value' => 3),
        //         array('subKriteria' => $this->input->post('itemKriteria4', true), 'value' => 4),
        //         array('subKriteria' => $this->input->post('itemKriteria5', true), 'value' => 5)
        //     )
        // ];

        $itemKriteria1 = $this->input->post('itemKriteria1', true);
        $this->db->where('kdKriteria', $this->input->post('kdKriteria'));
        $this->db->where('value', 1);
        $this->db->update('subkriteria', $itemKriteria1);

        $itemKriteria2 = $this->input->post('itemKriteria2', true);
        $this->db->where('kdKriteria', $this->input->post('kdKriteria'));
        $this->db->where('value', 2);
        $this->db->update('subkriteria', $itemKriteria2);

        $itemKriteria3 = $this->input->post('itemKriteria3', true);
        $this->db->where('kdKriteria', $this->input->post('kdKriteria'));
        $this->db->where('value', 3);
        $this->db->update('subkriteria', $itemKriteria3);

        $itemKriteria4 = $this->input->post('itemKriteria4', true);
        $this->db->where('kdKriteria', $this->input->post('kdKriteria'));
        $this->db->where('value', 4);
        $this->db->update('subkriteria', $itemKriteria4);
        
        $itemKriteria5 = $this->input->post('itemKriteria5', true);
        $this->db->where('kdKriteria', $this->input->post('kdKriteria'));
        $this->db->where('value', 5);
        $this->db->update('subkriteria', $itemKriteria5);
    }

    public function delete($id)
    {
        $this->db->where('kdKriteria', $id);
        return $this->db->delete($this->getTable());
    }

    public function getSubkriteriaId($id) {
        return $this->db->get_where('subKriteria', ['kdKriteria' => $id])->row_array();
    }

    public function getSubkriteriaVal($val, $id) {
        
        $this->db->select('subkriteria');
        $this->db->where('value =', $val);
        $this->db->where('kdKriteria =', $id);
        $query = $this->db->get('subkriteria');
        return $query->row_array();
    }
}