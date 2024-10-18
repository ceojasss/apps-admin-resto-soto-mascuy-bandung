<?php

class M_Proses extends CI_Model{
    public function __construct(){
        parent::__construct();
    }

    public function insertData($table, $data){
        return $this->db->insert($table, $data);
    }

    public function updateData($table, $data, $where){
        return $this->db->where($where)->update($table, $data);
    }

    public function deleteData($table, $where){
        return $this->db->where($where)->delete($table);
    }

    public function getData($table){
        return $this->db->get($table)->result();
    }

    public function getDataById($table, $where){
        return $this->db->where($where)->get($table)->result();
    }

    public function getQuery($query){
        return $this->db->query($query)->result();
    }

    public function cek_login($table, $where){
        return $this->db->get_where( $table , $where);
    }

    public function check_barcode($code , $id = null){
        $this->db->from('tb_item');
        $this->db->where('barcode' , $code);
        if($id != null){
            $this->db->where('id_item !=' , $id);
        }
        $query = $this->db->get();
        return $query;
    }
}