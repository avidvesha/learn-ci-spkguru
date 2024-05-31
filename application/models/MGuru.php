<?php
/**
 * Created by PhpStorm.
 */

class MGuru extends CI_Model{

    public $kdGuru;
    public $guru;

    public function __construct(){
        parent::__construct();
    }

    private function getTable(){
        return 'guru';
    }

    private function getData(){
        $data = array(
            'guru' => $this->guru
        );

        return $data;
    }

    public function getAll()
    {
        $guru = array();
        $query = $this->db->get($this->getTable());
        if($query->num_rows() > 0){
            foreach ($query->result() as $row) {
                $guru[] = $row;
            }
        }
        return $guru;
    }


    public function insert()
    {
        $this->db->insert($this->getTable(), $this->getData());
        return $this->db->insert_id();
    }

    public function update($where)
    {
        $status = $this->db->update($this->getTable(), $this->getData(), $where);
        return $status;

    }

    public function delete($id)
    {
        $this->db->where('kdGuru', $id);
        return $this->db->delete($this->getTable());
    }

    public function getLastID(){
        $this->db->select('kdGuru');
        $this->db->order_by('kdGuru', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get($this->getTable());
        return $query->row();
    }


}