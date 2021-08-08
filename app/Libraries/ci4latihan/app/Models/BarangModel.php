<?php

namespace App\Models;

use CodeIgniter\Model;

class BarangModel extends Model
{
    protected $table = 'tbl_barang';

    public function getBarang($id = false)
    {
        if ($id === false) {
            return $this->findAll();
        } else {
            return $this->getWhere(['id_barang' => $id])->getRowArray();
        }
    }

    public function addBarang($data)
    {
        return $this->db->table($this->table)->insert($data);
    }

    public function updateBarang($data, $id)
    {
        return $this->db->table($this->table)->update($data, ['id_barang' => $id]);
    }

    public function deleteBarang($id)
    {
        return $this->db->table($this->table)->delete(['id_barang' => $id]);
    }
}
