<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: liemtd
 * Date: 8/25/14
 * Time: 3:07 PM
 */
class Group_m extends CI_Model
{
    protected $_table = "groups";

    public function __contruct()
    {
        parent::__construct();
    }

    public function get_all_ar()
    {
        return $this->db
                    ->get($this->_table)
                    ->result();
    }

    public function get_by_name_ar()
    {
        return $this->db
            ->select('id, name, description, status')
            ->get($this->_table)
            ->result();
    }

    public function get_by_id_ar($id = 0)
    {
        return $this->db
            ->where('id', $id)
            ->get($this->_table)
            ->result();
    }

    public function get_max_status_ar()
    {
        return $this->db
            ->select_max('id')
            ->select('name, description, status')
            ->get($this->_table)
            ->result();
    }

    function insert_ar($data = array())
    {
        return $this->db->insert($this->_table, $data);
    }

    function update_ar($id = 0, $data = array())
    {
        return $this->db
                    ->where('id', $id)
                    ->update($this->_table, $data);
    }

    function delete_ar($id = 0)
    {
        return $this->db
            ->where('id', $id)
            ->delete($this->_table);
    }





} 