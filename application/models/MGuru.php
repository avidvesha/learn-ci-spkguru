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
        return 'teacher';
    }

    private function getData(){
        $data = array(
            'teacher' => $this->guru
        );

        return $data;
    }

    public function getAll()
    {
        $teachers = array();
        $query = $this->db->get($this->getTable());
        if($query->num_rows() > 0){
            foreach ($query->result() as $row) {
                $teachers[] = $row;
            }
        }
        return $teachers;
    }


    public function insert()
    {
        $this->db->insert($this->getTable(), $this->getData());
        return $this->db->insert_id();
    }

    public function tambahData(){
        $data = [
            "guru" => $this->input->post('guru', true)
        ];

        $this->db->insert('teacher', $data);
    }

    public function update()
    {
        $data = [
            "guru" => $this->input->post('guru', true)
        ];

        $this->db->where('kdGuru', $this->input->post('kdGuru'));
        $this->db->update('teacher', $data);

        // $status = $this->db->update($this->getTable(), $this->getData(), $where);
        // return $status;

    }

    public function delete($id)
    {
        $this->db->where('kdGuru', $id);
        $this->db->delete('teacher');
    }

    public function getGuruId($id) {
        return $this->db->get_where('teacher', ['kdGuru' => $id])->row_array();
    }

    // public function getLastID(){
    //     $this->db->select('kdGuru');
    //     $this->db->order_by('kdGuru', 'DESC');
    //     $this->db->limit(1);
    //     $query = $this->db->get($this->getTable());
    //     return $query->row();
    // }


}